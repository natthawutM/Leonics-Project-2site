<?php
// ============================================================
// Monthly Energy Report (Test version for PHP 7+) — Tetabuan
// Daily energy bars from `tetabuan_mys.energylog` table.
// Uses mysqli_* (PHP 7.x / 8.x).
// ============================================================
if($_POST==NULL){
    $m_1 = date('m');
    $y_1 = date('Y');
}else{
    $m_1 = $_POST["m"];
    $y_1 = $_POST["y"];
}
$months=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
$m_2 = isset($months[$m_1]) ? $months[$m_1] : $m_1;
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, (int)$m_1, (int)$y_1);
$date_name = $m_2." ".$y_1;

// ── DB query (mysqli version) ──
$hostdb = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'tetabuan_mys';

$link = mysqli_connect($hostdb, $userdb, $passdb, $namedb);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DatetimeLocal, Gen_kWh, Load_kWh, PV_kWh, Irrt_kWh_m2
        FROM energylog
        WHERE year(DatetimeLocal)='$y_1' AND month(DatetimeLocal)='$m_1'
        ORDER BY DatetimeLocal ASC";
$q = mysqli_query($link, $sql) or die("Query error: ".mysqli_error($link));

$rows = array();
while($r = mysqli_fetch_array($q, MYSQLI_ASSOC)){
    $rows[] = array(
        'date' => substr($r['DatetimeLocal'],0,10),
        'gen'  => (float)$r['Gen_kWh'],
        'load' => (float)$r['Load_kWh'],
        'pv'   => (float)$r['PV_kWh'],
        'irr'  => (float)$r['Irrt_kWh_m2'],
    );
}
mysqli_close($link);

// Aggregate per day
$labels=$Genn=$PVn=$Loadn=$Irrn="";
$totalGen=$totalPV=$totalLoad=$totalIrr=0;

for($i=1; $i<=$daysInMonth; $i++){
    $date_n = $y_1."-".$m_1."-".str_pad($i, 2, '0', STR_PAD_LEFT);
    $g=$p=$l=$ir=0;
    foreach($rows as $row){
        if($row['date'] == $date_n){
            $g  += $row['gen'];
            $p  += $row['pv'];
            $l  += $row['load'];
            $ir += $row['irr'];
        }
    }
    $labels .= $i.",";
    $Genn   .= round($g,2).",";
    $PVn    .= round($p,2).",";
    $Loadn  .= round($l,2).",";
    $Irrn   .= round($ir,2).",";
    $totalGen += $g; $totalPV += $p; $totalLoad += $l; $totalIrr += $ir;
}
$totalSupply = $totalGen + $totalPV;
$solarRatio = $totalSupply > 0 ? round($totalPV / $totalSupply * 100, 1) : 0;
$avgDayPV   = $daysInMonth > 0 ? round($totalPV / $daysInMonth, 1) : 0;
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
    --radius-md:8px;
    --radius-lg:12px;
    --font-sans:'DM Sans',system-ui,-apple-system,sans-serif;
    --font-mono:'DM Mono',ui-monospace,monospace;
  }
  *{box-sizing:border-box}
  html,body{margin:0;padding:0}
  body{font-family:var(--font-sans);background:var(--bg-main);color:var(--text-primary);font-size:13px;line-height:1.5;padding:16px;min-height:100vh}
  .wrap{max-width:1400px;margin:0 auto}
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

  /* legend tiles below chart */
  .legend-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-top:14px}
  .lg-tile{background:var(--bg-panel);border-radius:var(--radius-md);padding:10px 12px;display:flex;align-items:center;gap:10px}
  .lg-tile .swatch{width:10px;height:10px;border-radius:2px;flex-shrink:0}
  .lg-tile .name{font-size:11px;color:var(--text-secondary);font-weight:500;text-transform:uppercase;letter-spacing:0.3px}
  .lg-tile .desc{font-size:11px;color:var(--text-tertiary);margin-top:2px}

  @media (max-width:768px){
    body{padding:12px}
    #chart-container{height:320px}
    .legend-grid{grid-template-columns:repeat(2,1fr)}
    .toolbar{flex-direction:column;align-items:stretch}
  }
  @media (max-width:480px){
    body{padding:10px}
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
    <div class="card-title"><span class="dot"></span>Daily Energy System Report Graph · Tetabuan</div>

    <div class="toolbar">
      <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
        <form method="POST" action="monthly_test.php" id="dateform" style="display:flex;gap:8px;align-items:center">
          <span class="label">Month</span>
          <select name="m" id="m">
            <?php foreach($months as $k=>$v){
              echo '<option value="'.$k.'"'.($k==$m_1?' selected':'').'>'.$v.'</option>';
            } ?>
          </select>
          <span class="label">Year</span>
          <select name="y" id="y">
            <?php for($i=2020;$i<=date('Y');$i++){
              echo '<option value="'.$i.'"'.($i==$y_1?' selected':'').'>'.$i.'</option>';
            } ?>
          </select>
          <button type="submit">Apply</button>
        </form>
      </div>
      <div class="range-info">Showing <?php echo $date_name; ?></div>
    </div>

    <div id="chart-container"></div>

    <div class="legend-grid">
      <div class="lg-tile"><span class="swatch" style="background:#ef4444"></span><div><div class="name" style="color:#ef4444">Solar (kWh)</div><div class="desc"><?php echo number_format($totalPV, 2); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#8b5cf6"></span><div><div class="name" style="color:#8b5cf6">Gen (kWh)</div><div class="desc"><?php echo number_format($totalGen, 2); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#06b6d4"></span><div><div class="name" style="color:#06b6d4">Load (kWh)</div><div class="desc"><?php echo number_format($totalLoad, 2); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#f59e0b"></span><div><div class="name" style="color:#f59e0b">Irradiation (kWh/m2)</div><div class="desc"><?php echo number_format($totalIrr, 2); ?> kWh/m²</div></div></div>
    </div>
  </div>
</div>

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
        valueDecimals: 2,
        headerFormat: '<span style="font-family:DM Mono;color:#888;font-size:11px">Day {point.key}</span><br/>'
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
</body>
</html>
