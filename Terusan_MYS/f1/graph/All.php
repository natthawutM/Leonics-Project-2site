<?php
if($_POST==NULL){
    $date1_=date('Y-m-d');
    $d_1=date('d');
    $m_1=date('m');
    $m_2=date('M');
    $y_1=date('Y');
}else{
    $d_1=$_POST["d"];
    $m_1=$_POST["m"];
    $y_1=$_POST["y"];
    $date1_=$y_1."-".$m_1."-".$d_1;
    $months=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
    $m_2=isset($months[$m_1])?$months[$m_1]:$m_1;
}
if(!isset($m_2)){
    $months=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
    $m_2=isset($months[$m_1])?$months[$m_1]:$m_1;
}

include(__DIR__ . "/../Includes/DBConn.php");
$link1 = connectToDB1(false);
$db1Warning = '';
$db2Warning = '';

if($link1){
    if($_POST==NULL){
        $latestSql = "SELECT DATE(MAX(DatetimeLocal)) AS latest_date
                      FROM graph
                      WHERE COALESCE(PV_kW,0) > 0
                         OR COALESCE(Gen_kW,0) > 0
                         OR COALESCE(Load_PM_Total_P_kW,0) > 0
                         OR COALESCE(Ctrl_PM_Total_P_kW,0) > 0
                         OR COALESCE(Irradiance_W_m2,0) > 0";
        $latestQuery = mysql_query($latestSql, $link1);
        if($latestQuery && ($latestRow = mysql_fetch_array($latestQuery)) && !empty($latestRow['latest_date'])){
            $date1_ = $latestRow['latest_date'];
            $y_1 = substr($date1_, 0, 4);
            $m_1 = substr($date1_, 5, 2);
            $d_1 = substr($date1_, 8, 2);
            $months=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
            $m_2=isset($months[$m_1])?$months[$m_1]:$m_1;
        } elseif(!$latestQuery) {
            $db1Warning = 'Primary graph query failed.';
        }
    }

    $sql1 = "SELECT DatetimeLocal,PV_kW,Gen_kW,Load_PM_Total_P_kW,Ctrl_PM_Total_P_kW,Irradiance_W_m2
             FROM graph
             WHERE year(DatetimeLocal)=$y_1 AND month(DatetimeLocal)=$m_1 AND day(DatetimeLocal)=$d_1
             ORDER BY DatetimeLocal ASC";
    $q1 = mysql_query($sql1, $link1);
    if(!$q1){
        $db1Warning = 'Primary graph query failed.';
    }
} else {
    $db1Warning = 'Primary database connection unavailable.';
    $q1 = false;
}

$nnPv=$nnGen=$nnLoad=$nnCtrl=$nnIrr="";
$totalPoints=0;
$meaningfulPoints=0;
$sumPv=0;
$sumGen=0;
$sumLoad=0;
$sumCtrl=0;
$lastIrr=0;

if($q1){
    while($r = mysql_fetch_array($q1)){
        $Y=substr($r['DatetimeLocal'],0,4);
        $M=substr($r['DatetimeLocal'],5,2);
        $D=substr($r['DatetimeLocal'],8,2);
        $H=substr($r['DatetimeLocal'],11,2);
        $Mi=substr($r['DatetimeLocal'],14,2);
        $S=substr($r['DatetimeLocal'],17,2);
        $ts="Date.UTC($Y,".((int)$M-1).",$D,$H,$Mi,$S)";

        $pv  = ($r['PV_kW']==-0.999 || $r['PV_kW']===NULL) ? 0 : (float)$r['PV_kW'];
        $gen = ($r['Gen_kW']==-0.999 || $r['Gen_kW']===NULL) ? 0 : (float)$r['Gen_kW'];
        $ld  = ($r['Load_PM_Total_P_kW']==-0.999 || $r['Load_PM_Total_P_kW']===NULL) ? 0 : (float)$r['Load_PM_Total_P_kW'];
        $cl  = ($r['Ctrl_PM_Total_P_kW']==-0.999 || $r['Ctrl_PM_Total_P_kW']===NULL) ? 0 : (float)$r['Ctrl_PM_Total_P_kW'];
        $ir  = ($r['Irradiance_W_m2']==-0.999 || $r['Irradiance_W_m2']===NULL) ? 0 : (float)$r['Irradiance_W_m2'];

        if($pv > 0 || $gen > 0 || $ld > 0 || $cl > 0 || $ir > 0){
            $meaningfulPoints++;
        }

        if($pv > 0){ $sumPv += $pv * (5/60); }
        if($gen > 0){ $sumGen += $gen * (5/60); }
        if($ld > 0){ $sumLoad += $ld * (5/60); }
        if($cl > 0){ $sumCtrl += $cl * (5/60); }
        $lastIrr = $ir;

        $nnPv  .="[$ts,$pv],";
        $nnGen .="[$ts,$gen],";
        $nnLoad.="[$ts,$ld],";
        $nnCtrl.="[$ts,$cl],";
        $nnIrr .="[$ts,$ir],";
        $totalPoints++;
    }
}
if($link1){
    mysql_close($link1);
}

$nnBattV=$nnSoc="";
$lastSoc=null;
$lastBatt=0;
include_once(__DIR__ . "/../Includes/DBConn2.php");
$link2 = function_exists('connectToDB2') ? @connectToDB2(false) : false;
if($link2){
    $sql2 = "SELECT DatetimeLocal,Batt_Avg_Voltage,Batt_Avg_SOC
             FROM graph
             WHERE year(DatetimeLocal)=$y_1 AND month(DatetimeLocal)=$m_1 AND day(DatetimeLocal)=$d_1
             ORDER BY DatetimeLocal ASC";
    $q2 = @mysql_query($sql2, $link2);
    if($q2){
        while($r = mysql_fetch_array($q2)){
            $Y=substr($r['DatetimeLocal'],0,4);
            $M=substr($r['DatetimeLocal'],5,2);
            $D=substr($r['DatetimeLocal'],8,2);
            $H=substr($r['DatetimeLocal'],11,2);
            $Mi=substr($r['DatetimeLocal'],14,2);
            $S=substr($r['DatetimeLocal'],17,2);
            $ts="Date.UTC($Y,".((int)$M-1).",$D,$H,$Mi,$S)";

            $bv  = ($r['Batt_Avg_Voltage']==-0.999 || $r['Batt_Avg_Voltage']===NULL) ? 0 : (float)$r['Batt_Avg_Voltage'];
            $soc = ($r['Batt_Avg_SOC']==-0.999 || $r['Batt_Avg_SOC']===NULL) ? null : (float)$r['Batt_Avg_SOC'];

            $nnBattV.="[$ts,$bv],";
            $lastBatt = $bv;
            if($soc!==null){
                $nnSoc.="[$ts,$soc],";
                $lastSoc=$soc;
            }
        }
    } else {
        $db2Warning = 'Battery data query failed.';
    }
    @mysql_close($link2);
} else {
    $db2Warning = 'Battery database connection unavailable.';
}

$dateLabel = $d_1."-".$m_2."-".$y_1;
$dateValue = $y_1."-".$m_1."-".$d_1;
$hasChartData = $totalPoints > 0 && $meaningfulPoints > 0;
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/log.css" rel="stylesheet" type="text/css">
  <style type="text/css">
  *{box-sizing:border-box}
  body{margin:0;font-family:'DM Sans',system-ui,sans-serif;background:#f5f5f0;color:#1a1a1a;font-size:13px}
  .wrap{max-width:1180px;margin:0 auto;padding:0 16px 16px}
  .card{background:#fff;border:1px solid #e8e6df;border-radius:12px;padding:16px}
  .card-head{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;margin-bottom:14px}
  .card-title{font-size:11px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px;display:flex;align-items:center;gap:8px}
  .card-title .dot{width:6px;height:6px;border-radius:50%;background:#3b82f6}
  .card-title b{color:#1a1a1a;font-weight:600;font-size:13px;text-transform:none;letter-spacing:0}
  .date-row{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
  .date-row input[type=date]{font-family:'DM Sans',sans-serif;font-size:13px;padding:7px 12px;border:1px solid #e8e6df;border-radius:8px;background:#fafaf7;color:#1a1a1a;outline:none}
  .date-row input[type=date]:focus{border-color:#999}
  .kpi-row{display:grid;grid-template-columns:repeat(6,1fr);gap:8px;margin-bottom:16px}
  .kpi-box{background:#fafaf7;border-radius:6px;padding:10px 12px}
  .kpi-box .lbl{font-size:10px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px}
  .kpi-box .val{font-family:'DM Mono',monospace;font-size:17px;font-weight:600;margin-top:2px}
  .kpi-box .val .u{font-size:10px;color:#888;margin-left:2px}
  #chart-container{width:100%;height:430px}
  .axis-guide{font-size:11px;color:#666;background:#fafaf7;border:1px dashed #e8e6df;border-radius:6px;padding:6px 10px;margin:6px 0 4px;display:inline-block}
  .axis-guide b{color:#1a1a1a;font-weight:600}
  .note{font-size:11px;color:#aaa;margin-top:8px;display:flex;align-items:center;gap:6px;flex-wrap:wrap}
  .empty{padding:60px 20px;text-align:center;color:#888}
  .notice{margin-top:12px;padding:10px 12px;border:1px solid #f3d6a0;background:#fff8e8;border-radius:8px;color:#9a6700;font-size:12px}
  @media(max-width:900px){.kpi-row{grid-template-columns:repeat(3,1fr)}}
  @media(max-width:600px){.wrap{padding:0 10px 10px}.card{padding:12px}#chart-container{height:340px}}
  @media(max-width:480px){.kpi-row{grid-template-columns:repeat(2,1fr)}}
  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <div class="card-head">
        <div class="card-title"><span class="dot"></span>Power Graph — <b><?php echo $dateLabel; ?></b></div>
        <div class="date-row">
          <form method="POST" action="All.php" id="dateform" style="display:flex;gap:8px;align-items:center">
            <input type="date" id="datepick" name="datepick" value="<?php echo $dateValue; ?>" />
            <input type="hidden" name="d" id="hd" value="<?php echo $d_1; ?>" />
            <input type="hidden" name="m" id="hm" value="<?php echo $m_1; ?>" />
            <input type="hidden" name="y" id="hy" value="<?php echo $y_1; ?>" />
          </form>
        </div>
      </div>

      <div class="kpi-row">
        <div class="kpi-box"><div class="lbl">Latest Batt V.</div><div class="val" style="color:#ea580c"><?php echo number_format($lastBatt,1); ?><span class="u">V</span></div></div>
        <div class="kpi-box"><div class="lbl">PV Total</div><div class="val" style="color:#f59e0b"><?php echo number_format($sumPv,1); ?><span class="u">kWh</span></div></div>
        <div class="kpi-box"><div class="lbl">AC Input Total</div><div class="val" style="color:#3b82f6"><?php echo number_format($sumGen,1); ?><span class="u">kWh</span></div></div>
        <div class="kpi-box"><div class="lbl">Load Total</div><div class="val" style="color:#1a1a1a"><?php echo number_format($sumLoad,1); ?><span class="u">kWh</span></div></div>
        <div class="kpi-box"><div class="lbl">Latest Irradiance</div><div class="val" style="color:#ef4444"><?php echo number_format($lastIrr,1); ?><span class="u">W/m²</span></div></div>
        <div class="kpi-box"><div class="lbl">Latest SOC</div><div class="val" style="color:#8b5cf6"><?php echo $lastSoc!==null?number_format($lastSoc,1):'0.0'; ?><span class="u">%</span></div></div>
      </div>

      <?php if(!$hasChartData): ?>
      <div class="empty">No data for <?php echo $dateLabel; ?></div>
      <?php else: ?>
      <div id="chart-container"></div>
      <div class="axis-guide"><b>← Left axis</b>&nbsp;kW · SOC %&nbsp;&nbsp;|&nbsp;&nbsp;<b>Right axis →</b>&nbsp;Volt · W/m²</div>
      <div class="note">real data · same query logic · updated UI</div>
      <?php endif; ?>

      <?php if($db1Warning !== '' || $db2Warning !== ''): ?>
      <div class="notice"><?php echo trim($db1Warning . ' ' . $db2Warning); ?></div>
      <?php endif; ?>
    </div>
  </div>

<?php if($hasChartData): ?>
<script src="/highstock/js/jquery.min.js"></script>
<script src="/highstock/js/highstock.js"></script>
<script src="/highstock/js/modules/exporting.js"></script>
<script type="text/javascript">
Highcharts.setOptions({ lang: { rangeSelectorZoom: '' }, global: { useUTC: true } });
var PM1 = [<?php echo rtrim($nnPv,',');?>];
var PM2 = [<?php echo rtrim($nnGen,',');?>];
var PM3 = [<?php echo rtrim($nnLoad,',');?>];
var PM4 = [<?php echo rtrim($nnCtrl,',');?>];
var PM5 = [<?php echo rtrim($nnIrr,',');?>];
var PM6 = [<?php echo rtrim($nnSoc,',');?>];
var PM7 = [<?php echo rtrim($nnBattV,',');?>];
new Highcharts.StockChart({
  chart:{renderTo:'chart-container',backgroundColor:'transparent',style:{fontFamily:"'DM Sans',sans-serif"},zoomType:'x'},
  credits:{enabled:false},
  title:{text:null},
  subtitle:{text:null},
  rangeSelector:{
    inputEnabled:false,
    selected:2,
    buttonTheme:{
      fill:'#fff',stroke:'#e8e6df','stroke-width':1,r:6,
      style:{color:'#888',fontWeight:'500'},
      states:{select:{fill:'#1a1a1a',style:{color:'#fff'}},hover:{fill:'#f5f5f0'}}
    },
    buttons:[{type:'hour',count:6,text:'6h'},{type:'hour',count:12,text:'12h'},{type:'all',text:'All'}]
  },
  navigator:{
    maskFill:'rgba(59,130,246,0.08)',
    series:{color:'#888',lineColor:'#888'},
    xAxis:{gridLineColor:'#e8e6df'},
    handles:{backgroundColor:'#fff',borderColor:'#999'}
  },
  scrollbar:{enabled:false},
  legend:{enabled:true,symbolWidth:10,symbolHeight:10,symbolRadius:5,itemStyle:{fontFamily:"'DM Sans',sans-serif",fontSize:'12px',color:'#555'}},
  xAxis:{type:'datetime',gridLineColor:'#e8e6df',lineColor:'#e8e6df',tickColor:'#e8e6df',labels:{style:{color:'#aaa'}}},
  yAxis:[
    {min:0,max:100,tickInterval:25,startOnTick:false,endOnTick:false,gridLineColor:'#e8e6df',title:{text:null},opposite:false,labels:{format:'{value}%',style:{color:'#aaa'}}},
    {min:-100,max:100,tickInterval:50,startOnTick:false,endOnTick:false,gridLineColor:'#e8e6df',title:{text:null},opposite:false,labels:{format:'{value} kW',style:{color:'#aaa'}}},
    {min:200,max:1000,tickInterval:200,startOnTick:false,endOnTick:false,gridLineColor:'transparent',title:{text:null},opposite:true,labels:{format:'{value} V',style:{color:'#aaa'}}},
    {min:0,max:1200,tickInterval:300,startOnTick:false,endOnTick:false,gridLineColor:'transparent',title:{text:null},opposite:true,labels:{format:'{value} W/m²',style:{color:'#aaa'}}}
  ],
  tooltip:{shared:true,backgroundColor:'#fff',borderColor:'#e8e6df',borderRadius:8,borderWidth:1,shadow:false,style:{fontFamily:"'DM Mono',monospace",fontSize:'12px',color:'#1a1a1a'}},
  plotOptions:{series:{lineWidth:1.4,marker:{enabled:false},states:{hover:{lineWidth:1.8}},legendSymbol:'rectangle'}},
  series:[
    {name:'Batt Volt',data:PM7,yAxis:2,tooltip:{valueDecimals:1,valueSuffix:' V'},color:'#ea580c'},
    {name:'PV',data:PM1,yAxis:1,tooltip:{valueDecimals:1,valueSuffix:' kW'},color:'#f59e0b'},
    {name:'AC Input',data:PM2,yAxis:1,tooltip:{valueDecimals:1,valueSuffix:' kW'},color:'#3b82f6'},
    {name:'Load',data:PM3,yAxis:1,tooltip:{valueDecimals:1,valueSuffix:' kW'},color:'#1a1a1a'},
    {name:'Ctrl PM',data:PM4,yAxis:1,tooltip:{valueDecimals:1,valueSuffix:' kW'},color:'#06b6d4'},
    {name:'Irradiance',data:PM5,yAxis:3,tooltip:{valueDecimals:1,valueSuffix:' W/m²'},color:'#ef4444'},
    {name:'SOC',data:PM6,yAxis:0,tooltip:{valueDecimals:1,valueSuffix:' %'},color:'#8b5cf6'}
  ]
});
</script>
<?php endif; ?>
<script>
var datePick = document.getElementById('datepick');
var form = document.getElementById('dateform');
if(datePick){
  datePick.addEventListener('change', function(){
    var parts = this.value.split('-');
    document.getElementById('hy').value = parts[0];
    document.getElementById('hm').value = parts[1];
    document.getElementById('hd').value = parts[2];
    form.submit();
  });
}
</script>
</body>
</html>
