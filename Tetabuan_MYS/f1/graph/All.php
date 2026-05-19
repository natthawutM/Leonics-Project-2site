<?php
// ============================================================
// Power Graph — Tetabuan
// Queries: tetabuan_mys (PV, Gen, Load, Ctrl, Irradiance)
//          tetabuanbattery_mys (Batt voltage, SOC)
// Uses mysql_* (PHP 5.x). Migrate to mysqli_* when upgrading PHP.
// ============================================================
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

// ── DB1: main data (PV, Gen, Load, Ctrl, Irr) ──
include("../Includes/DBConn.php");
$link1 = connectToDB1();

if($_POST==NULL){
    $latestSql = "SELECT DATE(MAX(DatetimeLocal)) AS latest_date
                  FROM graph
                  WHERE COALESCE(PV_kW,0) > 0
                     OR COALESCE(Gen_kW,0) > 0
                     OR COALESCE(Load_PM_Total_P_kW,0) > 0
                     OR COALESCE(Ctrl_PM_Total_P_kW,0) > 0
                     OR COALESCE(Irradiance_W_m2,0) > 0";
    $latestQuery = mysql_query($latestSql);
    if($latestQuery && ($latestRow = mysql_fetch_array($latestQuery)) && !empty($latestRow['latest_date'])){
        $date1_ = $latestRow['latest_date'];
        $y_1 = substr($date1_, 0, 4);
        $m_1 = substr($date1_, 5, 2);
        $d_1 = substr($date1_, 8, 2);
        $months=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
        $m_2=isset($months[$m_1])?$months[$m_1]:$m_1;
    }
}

$sql1 = "SELECT DatetimeLocal,PV_kW,Gen_kW,Load_PM_Total_P_kW,Ctrl_PM_Total_P_kW,Irradiance_W_m2
         FROM graph
         WHERE year(DatetimeLocal)=$y_1 AND month(DatetimeLocal)=$m_1 AND day(DatetimeLocal)=$d_1
         ORDER BY DatetimeLocal ASC";
$q1 = mysql_query($sql1) or die("Query error (DB1): ".mysql_error());

$nnPv=$nnGen=$nnLoad=$nnCtrl=$nnIrr="";
$maxPv=$maxGen=$maxLoad=$maxIrr=0;
$totalPoints=0;
$meaningfulPoints=0;

while($r = mysql_fetch_array($q1)){
    $Y=substr($r['DatetimeLocal'],0,4);
    $M=substr($r['DatetimeLocal'],5,2);
    $D=substr($r['DatetimeLocal'],8,2);
    $H=substr($r['DatetimeLocal'],11,2);
    $Mi=substr($r['DatetimeLocal'],14,2);
    $S=substr($r['DatetimeLocal'],17,2);
    // Highcharts months are 0-indexed
    $ts="Date.UTC($Y,".((int)$M-1).",$D,$H,$Mi,$S)";

    // -0.999 / NULL = no-data sentinel
    $pv  = ($r['PV_kW']==-0.999            || $r['PV_kW']===NULL)            ? 0 : (float)$r['PV_kW'];
    $gen = ($r['Gen_kW']==-0.999           || $r['Gen_kW']===NULL)           ? 0 : (float)$r['Gen_kW'];
    $ld  = ($r['Load_PM_Total_P_kW']==-0.999 || $r['Load_PM_Total_P_kW']===NULL) ? 0 : (float)$r['Load_PM_Total_P_kW'];
    $cl  = ($r['Ctrl_PM_Total_P_kW']==-0.999 || $r['Ctrl_PM_Total_P_kW']===NULL) ? 0 : (float)$r['Ctrl_PM_Total_P_kW'];
    $ir  = ($r['Irradiance_W_m2']==-0.999    || $r['Irradiance_W_m2']===NULL)    ? 0 : (float)$r['Irradiance_W_m2'];

    if($pv>$maxPv)   $maxPv=$pv;
    if($gen>$maxGen) $maxGen=$gen;
    if($ld>$maxLoad) $maxLoad=$ld;
    if($ir>$maxIrr)  $maxIrr=$ir;
    if($pv > 0 || $gen > 0 || $ld > 0 || $cl > 0 || $ir > 0){
        $meaningfulPoints++;
    }

    $nnPv  .="[$ts,$pv],";
    $nnGen .="[$ts,$gen],";
    $nnLoad.="[$ts,$ld],";
    $nnCtrl.="[$ts,$cl],";
    $nnIrr .="[$ts,$ir],";
    $totalPoints++;
}
mysql_close($link1);

// ── DB2: battery data (Voltage, SOC) — graceful: skip if DB missing ──
$nnBattV=$nnSoc="";
$lastSoc=null;
$link2 = @mysql_connect('localhost','root','');
$db2_ok = $link2 && @mysql_select_db('tetabuanbattery_mys', $link2);
if($db2_ok){
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
            $soc = ($r['Batt_Avg_SOC']==-0.999     || $r['Batt_Avg_SOC']===NULL)     ? null : (float)$r['Batt_Avg_SOC'];

            $nnBattV.="[$ts,$bv],";
            if($soc!==null){
                $nnSoc.="[$ts,$soc],";
                $lastSoc=$soc;
            }
        }
    }
    @mysql_close($link2);
}

$dateLabel = $d_1."-".$m_2."-".$y_1;
$dateValue = $y_1."-".$m_1."-".$d_1;
$hasChartData = $totalPoints > 0 && $meaningfulPoints > 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Power Graph — Tetabuan MOC</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
html,body{margin:0;padding:0;max-width:100vw;overflow-x:hidden}
body{padding:16px;font-family:'DM Sans',system-ui,sans-serif;background:#f5f5f0;color:#1a1a1a;font-size:13px}
.wrap{max-width:1200px;margin:0 auto}
.card{background:#fff;border:1px solid #e8e6df;border-radius:12px;padding:16px;margin-bottom:12px}
.card-title{font-size:11px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px;margin:0 0 12px;display:flex;align-items:center;gap:8px}
.card-title .dot{width:6px;height:6px;border-radius:50%;display:inline-block}

/* Top bar: date picker + summary */
.top-bar{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:14px}
.date-row{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
.date-row label{font-size:12px;color:#666;font-weight:500}
.date-row input[type=date]{
  font-family:'DM Sans',sans-serif;font-size:13px;padding:7px 12px;
  border:1px solid #e8e6df;border-radius:8px;background:#fff;color:#1a1a1a;
}
.date-row .quick{
  display:inline-flex;gap:4px;
}
.date-row .quick button{
  font-family:'DM Sans',sans-serif;font-size:12px;padding:6px 10px;
  border:1px solid #e8e6df;border-radius:6px;background:#fff;color:#666;
  cursor:pointer;transition:.15s;
}
.date-row .quick button:hover{background:#fafaf7;color:#1a1a1a}

.summary{display:flex;gap:8px;flex-wrap:wrap}
.sum-pill{
  display:inline-flex;align-items:center;gap:6px;
  padding:5px 10px;border-radius:8px;
  background:#fafaf7;border:1px solid #e8e6df;
  font-size:11px;font-weight:500;color:#666;
}
.sum-pill .v{font-family:'DM Mono',monospace;font-weight:600;color:#1a1a1a}
.sum-pill .dot{width:6px;height:6px;border-radius:50%;display:inline-block}

#chart-container{width:100%;height:480px}
.no-data{
  text-align:center;padding:60px 20px;color:#888;font-size:14px;
}
.no-data .icon{font-size:30px;color:#ccc;margin-bottom:8px}

@media(max-width:600px){
  body{padding:10px}
  .card{padding:12px}
  #chart-container{height:340px}
  .top-bar{gap:8px}
  .summary .sum-pill{font-size:10px;padding:4px 8px}
}
</style>
</head>
<body>
<div class="wrap">
  <div class="card">
    <div class="card-title"><span class="dot" style="background:#3b82f6"></span>Power Graph — Tetabuan</div>

    <div class="top-bar">
      <form method="POST" action="All.php" class="date-row" id="dateForm">
        <label>Date</label>
        <input type="date" id="datePick" value="<?php echo $dateValue;?>" max="<?php echo date('Y-m-d');?>" />
        <input type="hidden" name="d" id="hd" /><input type="hidden" name="m" id="hm" /><input type="hidden" name="y" id="hy" />
        <div class="quick">
          <button type="button" id="btnPrev">‹ Prev</button>
          <button type="button" id="btnToday">Today</button>
          <button type="button" id="btnNext">Next ›</button>
        </div>
      </form>

      <div class="summary">
        <div class="sum-pill"><span class="dot" style="background:#f59e0b"></span>Peak Solar <span class="v"><?php echo number_format($maxPv,2);?></span> kW</div>
        <div class="sum-pill"><span class="dot" style="background:#ea580c"></span>Peak Gen <span class="v"><?php echo number_format($maxGen,2);?></span> kW</div>
        <div class="sum-pill"><span class="dot" style="background:#3b82f6"></span>Peak Load <span class="v"><?php echo number_format($maxLoad,2);?></span> kW</div>
        <div class="sum-pill"><span class="dot" style="background:#f9c66b"></span>Peak Irr <span class="v"><?php echo number_format($maxIrr,0);?></span> W/m²</div>
        <?php if($lastSoc!==null): ?>
        <div class="sum-pill"><span class="dot" style="background:#8b5cf6"></span>Last SOC <span class="v"><?php echo number_format($lastSoc,0);?></span> %</div>
        <?php endif; ?>
      </div>
    </div>

    <?php if(!$hasChartData): ?>
      <div class="no-data">
        <div class="icon">&#9888;</div>
        <div>No data for <?php echo $dateLabel;?></div>
        <div style="font-size:12px;margin-top:4px;color:#aaa">Try a different date</div>
      </div>
    <?php else: ?>
      <div id="chart-container"></div>
    <?php endif; ?>
  </div>
</div>

<?php if($hasChartData): ?>
<script src="/highchart/code/highcharts.js"></script>
<script src="/highchart/code/modules/exporting.js"></script>
<script>
function showChartError(message){
  var el = document.getElementById('chart-container');
  if(!el) return;
  el.innerHTML = '<div style="padding:24px;color:#b91c1c;font:13px DM Sans, sans-serif">Chart render error: ' + String(message) + '</div>';
}

if(!window.Highcharts){
  showChartError('Highcharts library not loaded');
} else if(typeof Highcharts.StockChart !== 'function'){
  showChartError('Highcharts.StockChart is not available');
} else {
try {
new Highcharts.Chart({
  chart:{
    renderTo:'chart-container',
    type:'area', zoomType:'x', panning:true, panKey:'shift',
    backgroundColor:'transparent',
    style:{fontFamily:'DM Sans, system-ui, sans-serif'}
  },
  rangeSelector:{enabled:false},
  navigator:{enabled:false},
  scrollbar:{enabled:false},
  credits:{enabled:false},
  title:{
    text:'Power Graph — <?php echo $dateLabel;?>',
    style:{fontSize:'15px',fontWeight:'600',color:'#1a1a1a'}
  },
  subtitle:{
    text:'Drag to zoom · Hold Shift to pan · <?php echo $totalPoints;?> data points',
    style:{fontSize:'11px',color:'#888'}
  },
  xAxis:{
    type:'datetime',
    dateTimeLabelFormats:{second:'%H:%M',minute:'%H:%M',hour:'%H:%M'},
    title:{text:'Time',style:{color:'#666'}},
    gridLineColor:'#e8e6df', lineColor:'#cfd6df', tickColor:'#cfd6df',
    labels:{style:{color:'#666',fontSize:'11px'}}
  },
  yAxis:[
    { // 0: kW (left)
      title:{text:'Power (kW)',style:{color:'#666'}},
      labels:{format:'{value}',style:{color:'#666',fontSize:'11px'}},
      gridLineColor:'#e8e6df'
    },
    { // 1: W/m² (right)
      title:{text:'Irradiance (W/m²)',style:{color:'#f9c66b'}},
      labels:{format:'{value}',style:{color:'#f9c66b',fontSize:'11px'}},
      opposite:true, gridLineColor:'transparent', min:0
    },
    { // 2: SOC % (far right, hidden axis title)
      title:{text:'SOC (%)',style:{color:'#8b5cf6'}},
      labels:{format:'{value}%',style:{color:'#8b5cf6',fontSize:'11px'}},
      opposite:true, gridLineColor:'transparent', min:0, max:100
    }
  ],
  tooltip:{
    shared:true,
    headerFormat:'<b>{point.x:%H:%M:%S}</b><br/>',
    style:{fontFamily:'DM Mono, monospace',fontSize:'12px'}
  },
  legend:{
    layout:'horizontal', align:'center', verticalAlign:'bottom',
    itemStyle:{fontFamily:'DM Sans',fontSize:'12px',color:'#444'},
    itemHoverStyle:{color:'#1a1a1a'}
  },
  plotOptions:{
    area:{fillOpacity:0.10, lineWidth:2, marker:{enabled:false}, threshold:null},
    line:{lineWidth:2, marker:{enabled:false}}
  },
  series:[
    {name:'PV (Solar AC + DC)',     type:'area', data:[<?php echo rtrim($nnPv,',');?>],   color:'#f59e0b', lineColor:'#f59e0b'},
    {name:'Generator',               type:'area', data:[<?php echo rtrim($nnGen,',');?>],  color:'#ea580c', lineColor:'#ea580c'},
    {name:'Load',                    type:'area', data:[<?php echo rtrim($nnLoad,',');?>], color:'#3b82f6', lineColor:'#3b82f6'},
    {name:'Ctrl PM (AC input)',      type:'line', data:[<?php echo rtrim($nnCtrl,',');?>], color:'#06b6d4', lineColor:'#06b6d4', dashStyle:'ShortDash', visible:false},
    {name:'Irradiance (W/m²)',       type:'line', data:[<?php echo rtrim($nnIrr,',');?>],  color:'#f9c66b', lineColor:'#f9c66b', yAxis:1},
    {name:'SOC (%)',                 type:'line', data:[<?php echo rtrim($nnSoc,',');?>],  color:'#8b5cf6', lineColor:'#8b5cf6', yAxis:2, visible:true}
  ],
  exporting:{
    enabled:true,
    buttons:{contextButton:{menuItems:['downloadPNG','downloadJPEG','downloadPDF','downloadCSV','downloadXLS']}}
  }
});
} catch (err) {
  showChartError(err && err.message ? err.message : err);
}
}
</script>
<?php endif; ?>

<script>
// ── Date controls ──
const datePick = document.getElementById('datePick');
const form = document.getElementById('dateForm');

function submitDate(d){
  const parts = d.split('-');
  document.getElementById('hy').value = parts[0];
  document.getElementById('hm').value = parts[1];
  document.getElementById('hd').value = parts[2];
  form.submit();
}
datePick.addEventListener('change', e => submitDate(e.target.value));

document.getElementById('btnToday').addEventListener('click', () => {
  const t = new Date(), pad = n => String(n).padStart(2,'0');
  submitDate(t.getFullYear()+'-'+pad(t.getMonth()+1)+'-'+pad(t.getDate()));
});
document.getElementById('btnPrev').addEventListener('click', () => {
  const d = new Date(datePick.value); d.setDate(d.getDate()-1);
  const pad = n => String(n).padStart(2,'0');
  submitDate(d.getFullYear()+'-'+pad(d.getMonth()+1)+'-'+pad(d.getDate()));
});
document.getElementById('btnNext').addEventListener('click', () => {
  const d = new Date(datePick.value); d.setDate(d.getDate()+1);
  const today = new Date(); today.setHours(0,0,0,0);
  if(d > today){ alert('Cannot go beyond today'); return; }
  const pad = n => String(n).padStart(2,'0');
  submitDate(d.getFullYear()+'-'+pad(d.getMonth()+1)+'-'+pad(d.getDate()));
});
</script>
</body>
</html>
