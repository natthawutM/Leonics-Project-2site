<?php
// ============================================================
// Yearly Energy Report — Tetabuan
// Monthly energy bars from `tetabuan_mys.energylog` table.
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
include(__DIR__ . "/../Includes/DBConn.php");
$link = connectToDB1(false);
$dbWarning = '';
$rows = array();
if($link){
    $sql = "SELECT DatetimeLocal, Gen_kWh, Load_kWh, PV_kWh, Irrt_kWh_m2
            FROM energylog
            WHERE year(DatetimeLocal)='$y_1'
            ORDER BY DatetimeLocal ASC";
    $q = mysql_query($sql, $link);
    if($q){
        while($r = mysql_fetch_array($q)){
            $rows[] = array(
                'month' => (int)substr($r['DatetimeLocal'],5,2),
                'gen'   => (float)$r['Gen_kWh'],
                'load'  => (float)$r['Load_kWh'],
                'pv'    => (float)$r['PV_kWh'],
                'irr'   => (float)$r['Irrt_kWh_m2'],
            );
        }
    } else {
        $dbWarning = 'Energy data query failed.';
    }
    mysql_close($link);
} else {
    $dbWarning = 'Database connection unavailable.';
}

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
$hasChartData = $totalSupply > 0 || $totalLoad > 0;
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/log.css" rel="stylesheet" type="text/css">
  <style type="text/css">
  :root {
    --bg-main:#f5f5f0;
    --bg-card:#fff;
    --bg-panel:#fafaf7;
    --border-default:#e8e6df;
    --text-primary:#1a1a1a;
    --text-secondary:#888;
    --text-tertiary:#aaa;
    --info:#3b82f6;
    --cyan:#06b6d4;
    --purple:#8b5cf6;
    --warning:#f59e0b;
    --danger:#ef4444;
    --success:#10b981;
    --radius-md:8px;
    --radius-lg:12px;
    --font-sans:'DM Sans',system-ui,-apple-system,sans-serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
  }
  *{box-sizing:border-box}
  html,body{margin:0;padding:0}
  body{font-family:var(--font-sans);background:var(--bg-main);color:var(--text-primary);font-size:13px;line-height:1.5;min-height:100vh}
  .wrap{max-width:1400px;margin:0 auto;padding:0 16px 16px}
  .card{background:var(--bg-card);border:1px solid var(--border-default);border-radius:var(--radius-lg);padding:16px}
  .card-title{font-size:11px;font-weight:500;color:var(--text-secondary);text-transform:uppercase;letter-spacing:0.3px;margin:0 0 12px;display:flex;align-items:center;gap:8px}
  .card-title .dot{width:6px;height:6px;border-radius:50%;background:var(--cyan)}

  .toolbar{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:14px;padding-bottom:12px;border-bottom:1px solid var(--bg-panel)}
  .toolbar .label{font-size:11px;color:var(--text-secondary);text-transform:uppercase;letter-spacing:0.3px;font-weight:500;margin-right:6px}
  .toolbar select{
    font-family:var(--font-sans);font-size:13px;padding:7px 12px;
    border:1px solid var(--border-default);border-radius:var(--radius-md);
    background:#fff;color:var(--text-primary);
  }
  .toolbar button{
    font-family:var(--font-sans);font-size:13px;font-weight:500;
    padding:7px 16px;border:none;border-radius:var(--radius-md);
    background:var(--text-primary);color:#fff;cursor:pointer;transition:background .15s;
  }
  .toolbar button:hover{background:#333}
  .range-info{font-size:12px;color:var(--text-secondary);font-family:var(--font-mono)}

  #chart-container{width:100%;height:380px;min-width:0}
  .no-data{
    text-align:center;padding:60px 20px;color:var(--text-secondary);font-size:14px;
  }
  .no-data .icon{font-size:30px;color:var(--text-tertiary);margin-bottom:8px}
  .notice{margin-top:12px;padding:10px 12px;border:1px solid #f3d6a0;background:#fff8e8;border-radius:var(--radius-md);color:#9a6700;font-size:12px}

  /* legend tiles below chart */
  .legend-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:10px;margin-top:14px}
  .lg-tile{background:var(--bg-panel);border-radius:var(--radius-md);padding:10px 12px;display:flex;align-items:center;gap:10px}
  .lg-tile .swatch{width:10px;height:10px;border-radius:2px;flex-shrink:0}
  .lg-tile .name{font-size:11px;color:var(--text-secondary);font-weight:500;text-transform:uppercase;letter-spacing:0.3px}
  .lg-tile .desc{font-size:11px;color:var(--text-tertiary);margin-top:2px}

  @media (max-width:992px){
    .legend-grid{grid-template-columns:repeat(3,1fr)}
  }
  @media (max-width:768px){
    .wrap{padding:0 12px 12px}
    #chart-container{height:320px}
    .legend-grid{grid-template-columns:repeat(2,1fr)}
    .toolbar{flex-direction:column;align-items:stretch}
  }
  @media (max-width:480px){
    .wrap{padding:0 10px 10px}
    .card{padding:12px;border-radius:10px}
    #chart-container{height:280px}
    .legend-grid{grid-template-columns:1fr}
  }

  /* Highcharts overrides for cleaner look */
  .highcharts-background{fill:transparent}
  .highcharts-grid-line{stroke:var(--border-default)}
  .highcharts-axis-line{stroke:var(--border-default)}
  .highcharts-tick{stroke:var(--border-default)}
  .highcharts-axis-labels text{font-family:var(--font-mono) !important;font-size:11px !important;fill:var(--text-secondary) !important}
  .highcharts-legend-item text{font-family:var(--font-sans) !important;font-size:12px !important;fill:var(--text-primary) !important}
  .highcharts-tooltip{font-family:var(--font-sans) !important}
  </style>
</head>
<body>

<div class="wrap">
  <div class="card">
    <div class="card-title"><span class="dot"></span>Yearly Energy System Report Graph · Tetabuan</div>

    <div class="toolbar">
      <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
        <form method="POST" action="yearly.php" id="dateform" style="display:flex;gap:8px;align-items:center">
          <span class="label">Year</span>
          <select name="y" id="y">
            <?php for($i=2020;$i<=date('Y');$i++){
              echo '<option value="'.$i.'"'.($i==$y_1?' selected':'').'>'.$i.'</option>';
            } ?>
          </select>
          <button type="submit">Apply</button>
        </form>
        <div style="display:inline-flex;gap:4px;">
          <button type="button" id="btnPrev" style="font-family:var(--font-sans);font-size:13px;font-weight:500;padding:7px 12px;border:none;border-radius:var(--radius-md);background:var(--bg-panel);border:1px solid var(--border-default);color:var(--text-primary);cursor:pointer;">‹ Prev year</button>
          <button type="button" id="btnThis" style="font-family:var(--font-sans);font-size:13px;font-weight:500;padding:7px 12px;border:none;border-radius:var(--radius-md);background:var(--bg-panel);border:1px solid var(--border-default);color:var(--text-primary);cursor:pointer;">This year</button>
          <button type="button" id="btnNext" style="font-family:var(--font-sans);font-size:13px;font-weight:500;padding:7px 12px;border:none;border-radius:var(--radius-md);background:var(--bg-panel);border:1px solid var(--border-default);color:var(--text-primary);cursor:pointer;">Next year ›</button>
        </div>
      </div>
      <div class="range-info">Showing <?php echo $y_1; ?></div>
    </div>

    <?php if(!$hasChartData): ?>
      <div class="no-data">
        <div class="icon">&#9888;</div>
        <div>No energy data for <?php echo $y_1;?></div>
      </div>
    <?php else: ?>
      <div id="chart-container"></div>
    <?php endif; ?>

    <?php if($dbWarning !== ''): ?>
      <div class="notice"><?php echo $dbWarning; ?></div>
    <?php endif; ?>

    <div class="legend-grid">
      <div class="lg-tile"><span class="swatch" style="background:#ef4444"></span><div><div class="name" style="color:#ef4444">Solar (kWh)</div><div class="desc"><?php echo number_format($totalPV, 0); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#8b5cf6"></span><div><div class="name" style="color:#8b5cf6">Gen (kWh)</div><div class="desc"><?php echo number_format($totalGen, 0); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#06b6d4"></span><div><div class="name" style="color:#06b6d4">Load (kWh)</div><div class="desc"><?php echo number_format($totalLoad, 0); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#f59e0b"></span><div><div class="name" style="color:#f59e0b">Irradiation (kWh/m2)</div><div class="desc"><?php echo number_format($totalIrr, 1); ?> kWh/m²</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#10b981"></span><div><div class="name" style="color:#10b981">CO₂ Saved</div><div class="desc"><?php echo number_format($co2Saved, 0); ?> kg</div></div></div>
    </div>
  </div>
</div>

<?php if($hasChartData): ?>
<script src="/highstock/js/jquery.min.js"></script>
<script src="/highstock/js/highstock.js"></script>
<script src="/highstock/js/modules/exporting.js"></script>

<script type="text/javascript">
var chart;
$(document).ready(function() {
  chart = new Highcharts.Chart({
    chart: {
        renderTo: 'chart-container',
        zoomType: 'x',
        backgroundColor: 'transparent',
        style: { fontFamily: "'DM Sans', sans-serif" },
        spacing: [16, 8, 10, 8]
    },
    credits: { enabled: false },
    exporting: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },

    xAxis: {
        categories: [<?php echo rtrim($labels,',');?>],
        lineColor: '#e8e6df',
        tickColor: '#e8e6df',
        labels: { style: { color: '#888', fontFamily: "'DM Mono'" } }
    },

    yAxis: [{
        title: { text: null },
        labels: { format: '{value} kWh', style: { color: '#888', fontFamily: "'DM Mono'" } },
        gridLineColor: '#e8e6df',
        opposite: false
    }, {
        title: { text: null },
        labels: { format: '{value} kWh/m2', style: { color: '#f59e0b', fontFamily: "'DM Mono'" } },
        gridLineColor: 'transparent',
        opposite: true
    }],

    tooltip: {
        shared: true,
        backgroundColor: '#fff',
        borderColor: '#e8e6df',
        borderRadius: 8,
        borderWidth: 1,
        shadow: { color: 'rgba(0,0,0,0.08)', width: 6, opacity: 0.6 },
        style: { color: '#1a1a1a', fontFamily: "'DM Sans'", fontSize: '12px' },
        valueDecimals: 1,
        headerFormat: '<span style="font-family:DM Mono;color:#888;font-size:11px">{point.key}</span><br/>'
    },

    legend: { enabled: false },

    plotOptions: {
        column: {
            pointPadding: 0.1,
            borderWidth: 0,
            borderRadius: 3
        },
        spline: {
            lineWidth: 2,
            marker: { enabled: false },
            states: { hover: { lineWidth: 3 } }
        }
    },

    series: [{
        type: 'column',
        name: 'Solar',
        color: '#ef4444',
        data: [<?php echo rtrim($PVn,',');?>],
        tooltip: { valueSuffix: ' kWh' }
    }, {
        type: 'column',
        name: 'Gen',
        color: '#8b5cf6',
        data: [<?php echo rtrim($Genn,',');?>],
        tooltip: { valueSuffix: ' kWh' }
    }, {
        type: 'spline',
        name: 'Load',
        color: '#06b6d4',
        data: [<?php echo rtrim($Loadn,',');?>],
        tooltip: { valueSuffix: ' kWh' }
    }, {
        type: 'spline',
        name: 'Irradiation',
        color: '#f59e0b',
        yAxis: 1,
        data: [<?php echo rtrim($Irrn,',');?>],
        tooltip: { valueSuffix: ' kWh/m2' }
    }]
  });
});
</script>
<?php endif; ?>

<script>
function reload(y){
  document.getElementById('y').value = y;
  document.getElementById('dateform').submit();
}
const curY = parseInt('<?php echo $y_1;?>');
document.getElementById('btnThis').addEventListener('click', () => reload(new Date().getFullYear()));
document.getElementById('btnPrev').addEventListener('click', () => reload(curY - 1));
document.getElementById('btnNext').addEventListener('click', () => {
  if(curY >= new Date().getFullYear()){ alert('Cannot go beyond current year'); return; }
  reload(curY + 1);
});
</script>
<script>
function reportFrameHeight() {
  var body = document.body;
  var html = document.documentElement;
  var height = Math.max(
    body ? body.scrollHeight : 0,
    body ? body.offsetHeight : 0,
    html ? html.clientHeight : 0,
    html ? html.scrollHeight : 0,
    html ? html.offsetHeight : 0
  );
  window.parent.postMessage({ type: 'graph-frame-height', height: height }, '*');
}

window.addEventListener('load', function() {
  reportFrameHeight();
  setTimeout(reportFrameHeight, 50);
  setTimeout(reportFrameHeight, 150);
  setTimeout(reportFrameHeight, 600);
  setTimeout(reportFrameHeight, 1200);
  setTimeout(reportFrameHeight, 2000);
});

window.addEventListener('DOMContentLoaded', reportFrameHeight);

window.addEventListener('resize', reportFrameHeight);
window.addEventListener('message', function(event) {
  if (event.data && event.data.type === 'request-graph-frame-height') {
    reportFrameHeight();
  }
});

if (window.ResizeObserver) {
  var frameObserver = new ResizeObserver(reportFrameHeight);
  frameObserver.observe(document.body);
  frameObserver.observe(document.documentElement);
}
</script>
</body>
</html>
