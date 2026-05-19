<?php
// ============================================================
// Yearly Energy Report — Terusan
// Monthly energy bars from `terusan_mys.energylog` table.
// Uses mysql_* (PHP 5.x).
// ============================================================
if($_POST==NULL){
    $y_1 = date('Y');
}else{
    $y_1 = $_POST["y"];
}
$months_full = array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December');
$months_short = array(1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');

// ── DB query ──
include("../Includes/DBConn.php");
$link = connectToDB1();

$sql = "SELECT DatetimeLocal, Gen_kWh, Load_kWh, PV_kWh, Irrt_kWh_m2
        FROM energylog
        WHERE year(DatetimeLocal)='$y_1'
        ORDER BY DatetimeLocal ASC";
$q = mysql_query($sql) or die("Query error: ".mysql_error());

$rows = array();
while($r = mysql_fetch_array($q)){
    $rows[] = array(
        'month' => (int)substr($r['DatetimeLocal'],5,2),
        'gen'   => (float)$r['Gen_kWh'],
        'load'  => (float)$r['Load_kWh'],
        'pv'    => (float)$r['PV_kWh'],
        'irr'   => (float)$r['Irrt_kWh_m2'],
    );
}
mysql_close($link);

// Aggregate per month (1..12)
$labels=$Genn=$PVn=$Loadn=$Irrn="";
$totalGen=$totalPV=$totalLoad=$totalIrr=0;
$peakMonthPV=0; $peakMonthName='';

for($m=1; $m<=12; $m++){
    $g=$p=$l=$ir=0;
    foreach($rows as $row){
        if($row['month'] == $m){
            $g  += $row['gen'];
            $p  += $row['pv'];
            $l  += $row['load'];
            $ir += $row['irr'];
        }
    }
    if($p > $peakMonthPV){ $peakMonthPV = $p; $peakMonthName = $months_short[$m]; }

    $labels .= "'".$months_short[$m]."',";
    $Genn   .= round($g,1).",";
    $PVn    .= round($p,1).",";
    $Loadn  .= round($l,1).",";
    $Irrn   .= round($ir,2).",";
    $totalGen += $g; $totalPV += $p; $totalLoad += $l; $totalIrr += $ir;
}
$totalSupply = $totalGen + $totalPV;
$solarRatio = $totalSupply > 0 ? round($totalPV / $totalSupply * 100, 1) : 0;
$avgMonthPV = round($totalPV / 12, 1);

// CO2 saved estimate (1 kWh PV = ~0.5 kg CO2 saved vs grid)
$co2Saved = round($totalPV * 0.5, 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yearly Energy — Terusan MOC</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
html,body{margin:0;padding:0;max-width:100vw;overflow-x:hidden}
body{padding:16px;font-family:'DM Sans',system-ui,sans-serif;background:#f5f5f0;color:#1a1a1a;font-size:13px}
.wrap{max-width:1200px;margin:0 auto}
.card{background:#fff;border:1px solid #e8e6df;border-radius:12px;padding:16px;margin-bottom:12px}
.card-title{font-size:11px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px;margin:0 0 12px;display:flex;align-items:center;gap:8px}
.card-title .dot{width:6px;height:6px;border-radius:50%;display:inline-block}

.kpi-row{display:grid;grid-template-columns:repeat(5, minmax(0,1fr));gap:8px;margin-bottom:16px}
.kpi-box{background:#fafaf7;border-radius:6px;padding:10px 12px;min-width:0;overflow:hidden}
.kpi-box .lbl{font-size:10px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.kpi-box .val{font-family:'DM Mono',monospace;font-size:18px;font-weight:600;margin-top:2px;white-space:nowrap}
.kpi-box .val .u{font-size:11px;color:#888;margin-left:2px;font-weight:500}
.kpi-box .sub{font-size:10px;color:#aaa;margin-top:1px}

.date-row{display:flex;align-items:center;gap:8px;margin-bottom:12px;flex-wrap:wrap}
.date-row select,.date-row button{font-family:'DM Sans',sans-serif;font-size:13px;padding:7px 12px;border:1px solid #e8e6df;border-radius:8px;background:#fff;color:#1a1a1a}
.date-row button{background:#1a1a1a;color:#fff;border:none;cursor:pointer;font-weight:500}
.date-row button:hover{background:#333}
.date-row .quick{display:inline-flex;gap:4px;margin-left:auto}
.date-row .quick button{background:#fff;color:#666;border:1px solid #e8e6df;font-weight:400;padding:6px 10px;font-size:12px}
.date-row .quick button:hover{background:#fafaf7;color:#1a1a1a}

#chart-container{width:100%;height:380px}
.no-data{text-align:center;padding:50px 20px;color:#888;font-size:14px}
.no-data .icon{font-size:30px;color:#ccc;margin-bottom:8px}

@media(max-width:768px){
  .kpi-row{grid-template-columns:repeat(3, minmax(0,1fr))}
}
@media(max-width:600px){
  body{padding:10px}
  .card{padding:12px}
  .kpi-row{grid-template-columns:repeat(2, minmax(0,1fr))}
  #chart-container{height:280px}
  .date-row .quick{margin-left:0;width:100%}
}
</style>
</head>
<body>
<div class="wrap">
  <div class="card">
    <div class="card-title"><span class="dot" style="background:#3b82f6"></span>Yearly Energy Report — <?php echo $y_1;?></div>

    <div class="kpi-row">
      <div class="kpi-box">
        <div class="lbl">Solar total</div>
        <div class="val" style="color:#f59e0b"><?php echo number_format($totalPV,1);?><span class="u">kWh</span></div>
        <div class="sub">avg <?php echo $avgMonthPV;?> kWh/mo</div>
      </div>
      <div class="kpi-box">
        <div class="lbl">Gen total</div>
        <div class="val" style="color:#ea580c"><?php echo number_format($totalGen,1);?><span class="u">kWh</span></div>
      </div>
      <div class="kpi-box">
        <div class="lbl">Load total</div>
        <div class="val" style="color:#3b82f6"><?php echo number_format($totalLoad,1);?><span class="u">kWh</span></div>
      </div>
      <div class="kpi-box">
        <div class="lbl">Solar ratio</div>
        <div class="val" style="color:#22c55e"><?php echo $solarRatio;?><span class="u">%</span></div>
        <div class="sub">PV / (PV+Gen)</div>
      </div>
      <div class="kpi-box">
        <div class="lbl">CO₂ saved</div>
        <div class="val" style="color:#06b6d4"><?php echo number_format($co2Saved,1);?><span class="u">kg</span></div>
        <div class="sub"><?php echo $peakMonthName ? 'peak: '.$peakMonthName : '—';?></div>
      </div>
    </div>

    <form method="POST" action="yearly.php" class="date-row">
      <select name="y">
        <?php for($i=2020;$i<=date('Y');$i++){
          echo '<option value="'.$i.'"'.($i==$y_1?' selected':'').'>'.$i.'</option>';
        } ?>
      </select>
      <button type="submit">Go</button>
      <div class="quick">
        <button type="button" id="btnPrev">‹ Prev year</button>
        <button type="button" id="btnThis">This year</button>
        <button type="button" id="btnNext">Next year ›</button>
      </div>
    </form>

    <?php if($totalSupply == 0 && $totalLoad == 0): ?>
      <div class="no-data">
        <div class="icon">&#9888;</div>
        <div>No energy data for <?php echo $y_1;?></div>
      </div>
    <?php else: ?>
      <div id="chart-container"></div>
    <?php endif; ?>
  </div>
</div>

<?php if($totalSupply > 0 || $totalLoad > 0): ?>
<script src="/highchart/code/highcharts.js"></script>
<script>
function showChartError(message){
  var el = document.getElementById('chart-container');
  if(!el) return;
  el.innerHTML = '<div style="padding:24px;color:#b91c1c;font:13px DM Sans, sans-serif">Chart render error: ' + String(message) + '</div>';
}

if(!window.Highcharts){
  showChartError('Highcharts library not loaded');
} else {
try {
new Highcharts.Chart({
  chart:{renderTo:'chart-container',backgroundColor:'transparent',style:{fontFamily:'DM Sans, system-ui, sans-serif'}},
  credits:{enabled:false},
  title:{text:null},
  xAxis:{
    categories:[<?php echo rtrim($labels,',');?>],
    title:{text:'Month of <?php echo $y_1;?>',style:{color:'#666'}},
    gridLineColor:'#e8e6df', lineColor:'#cfd6df',
    labels:{style:{color:'#666',fontSize:'11px'}}
  },
  yAxis:[
    {min:0, title:{text:'Energy (kWh)',style:{color:'#666'}},
     labels:{format:'{value}',style:{color:'#666',fontSize:'11px'}},
     gridLineColor:'#e8e6df'},
    {min:0, title:{text:'Irradiation (kWh/m²)',style:{color:'#f9c66b'}},
     labels:{format:'{value}',style:{color:'#f9c66b',fontSize:'11px'}},
     opposite:true, gridLineColor:'transparent'}
  ],
  tooltip:{shared:true, style:{fontFamily:'DM Mono, monospace',fontSize:'12px'}},
  legend:{itemStyle:{fontFamily:'DM Sans',fontSize:'12px',color:'#444'},itemHoverStyle:{color:'#1a1a1a'}},
  plotOptions:{
    column:{pointPadding:0.05, borderWidth:0, borderRadius:3, groupPadding:0.12},
    spline:{lineWidth:2, marker:{enabled:false}}
  },
  series:[
    {type:'column', name:'Solar (kWh)',  data:[<?php echo rtrim($PVn,',');?>],   color:'#f59e0b'},
    {type:'column', name:'Gen (kWh)',    data:[<?php echo rtrim($Genn,',');?>],  color:'#ea580c'},
    {type:'spline', name:'Load (kWh)',   data:[<?php echo rtrim($Loadn,',');?>], color:'#3b82f6', lineWidth:2.5},
    {type:'spline', name:'Irradiation (kWh/m²)', data:[<?php echo rtrim($Irrn,',');?>],
     color:'#f9c66b', yAxis:1, lineWidth:1.5, dashStyle:'Dot', visible:false}
  ],
  exporting:{enabled:true, buttons:{contextButton:{menuItems:['downloadPNG','downloadCSV','downloadXLS']}}}
});
} catch (err) {
  showChartError(err && err.message ? err.message : err);
}
}
</script>
<?php endif; ?>

<script>
function reload(y){
  const f = document.querySelector('form.date-row');
  f.querySelector('[name=y]').value = y;
  f.submit();
}
const curY = parseInt('<?php echo $y_1;?>');
document.getElementById('btnThis').addEventListener('click', () => reload(new Date().getFullYear()));
document.getElementById('btnPrev').addEventListener('click', () => reload(curY - 1));
document.getElementById('btnNext').addEventListener('click', () => {
  if(curY >= new Date().getFullYear()){ alert('Cannot go beyond current year'); return; }
  reload(curY + 1);
});
</script>
</body>
</html>
