<?php
// ============================================================
// Power Graph (Test version for PHP 7+) — Tetabuan
// Queries: tetabuan_mys (PV, Gen, Load, Ctrl, Irradiance)
//          tetabuanbattery_mys (Batt voltage, SOC)
// Uses mysqli_* (PHP 7.x / 8.x).
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
$hostdb = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'tetabuan_mys';

$link1 = mysqli_connect($hostdb, $userdb, $passdb, $namedb);
if (!$link1) {
    die("Connection failed (DB1): " . mysqli_connect_error());
}

if($_POST==NULL){
    $latestSql = "SELECT DATE(MAX(DatetimeLocal)) AS latest_date
                  FROM graph
                  WHERE COALESCE(PV_kW,0) > 0
                     OR COALESCE(Gen_kW,0) > 0
                     OR COALESCE(Load_PM_Total_P_kW,0) > 0
                     OR COALESCE(Ctrl_PM_Total_P_kW,0) > 0
                     OR COALESCE(Irradiance_W_m2,0) > 0";
    $latestQuery = mysqli_query($link1, $latestSql);
    if($latestQuery && ($latestRow = mysqli_fetch_array($latestQuery, MYSQLI_ASSOC)) && !empty($latestRow['latest_date'])){
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
$q1 = mysqli_query($link1, $sql1) or die("Query error (DB1): " . mysqli_error($link1));

$nnPv=$nnGen=$nnLoad=$nnCtrl=$nnIrr="";
$maxPv=$maxGen=$maxLoad=$maxIrr=0;
$totalPoints=0;
$meaningfulPoints=0;

while($r = mysqli_fetch_array($q1, MYSQLI_ASSOC)){
    $Y=substr($r['DatetimeLocal'],0,4);
    $M=substr($r['DatetimeLocal'],5,2);
    $D=substr($r['DatetimeLocal'],8,2);
    $H=substr($r['DatetimeLocal'],11,2);
    $Mi=substr($r['DatetimeLocal'],14,2);
    $S=substr($r['DatetimeLocal'],17,2);
    $ts="Date.UTC($Y,".((int)$M-1).",$D,$H,$Mi,$S)";

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
mysqli_close($link1);

// ── DB2: battery data (Voltage, SOC) — graceful: skip if DB missing ──
$nnBattV=$nnSoc="";
$lastSoc=null;
$link2 = @mysqli_connect('localhost','root','', 'tetabuanbattery_mys');
if($link2){
    $sql2 = "SELECT DatetimeLocal,Batt_Avg_Voltage,Batt_Avg_SOC
             FROM graph
             WHERE year(DatetimeLocal)=$y_1 AND month(DatetimeLocal)=$m_1 AND day(DatetimeLocal)=$d_1
             ORDER BY DatetimeLocal ASC";
    $q2 = @mysqli_query($link2, $sql2);
    if($q2){
        while($r = mysqli_fetch_array($q2, MYSQLI_ASSOC)){
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
    @mysqli_close($link2);
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
  .toolbar input[type=date]{
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

  #chart-container{width:100%;height:480px;min-width:0}
  .no-data{
    text-align:center;padding:60px 20px;color:var(--text-secondary);font-size:14px;
  }
  .no-data .icon{font-size:30px;color:var(--text-tertiary);margin-bottom:8px}

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
    body{padding:12px}
    #chart-container{height:380px}
    .legend-grid{grid-template-columns:repeat(2,1fr)}
    .toolbar{flex-direction:column;align-items:stretch}
  }
  @media (max-width:480px){
    body{padding:10px}
    .card{padding:12px;border-radius:10px}
    #chart-container{height:320px}
    .legend-grid{grid-template-columns:1fr}
  }

  /* Highstock overrides for cleaner look */
  .highcharts-background{fill:transparent}
  .highcharts-grid-line{stroke:var(--border-default)}
  .highcharts-axis-line{stroke:var(--border-default)}
  .highcharts-tick{stroke:var(--border-default)}
  .highcharts-axis-labels text{font-family:var(--font-mono) !important;font-size:11px !important;fill:var(--text-secondary) !important}
  .highcharts-range-selector-buttons text{font-family:var(--font-sans) !important;font-size:12px !important}
  .highcharts-button rect{fill:var(--bg-panel) !important;stroke:var(--border-default) !important}
  .highcharts-button-pressed rect{fill:var(--text-primary) !important;stroke:var(--text-primary) !important}
  .highcharts-button-pressed text{fill:#fff !important}
  .highcharts-input-group text{font-family:var(--font-sans) !important;font-size:12px !important;fill:var(--text-secondary) !important}
  .highcharts-legend-item text{font-family:var(--font-sans) !important;font-size:12px !important;fill:var(--text-primary) !important}
  .highcharts-tooltip{font-family:var(--font-sans) !important}
  .highcharts-navigator-mask-inside{fill:rgba(59,130,246,0.10) !important}
  .highcharts-navigator-handle{fill:var(--info) !important;stroke:var(--info) !important}
  .highcharts-navigator-outline{stroke:var(--border-default) !important}
  .highcharts-scrollbar-track,.highcharts-scrollbar-button{display:none !important}
  </style>
</head>
<body>

<div class="wrap">
  <div class="card">
    <div class="card-title"><span class="dot"></span>Power Graph · Tetabuan</div>

    <div class="toolbar">
      <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
        <span class="label">Date</span>
        <form method="POST" action="All_test.php" id="dateform" style="display:flex;gap:8px;align-items:center">
          <input type="date" id="datepick" name="datepick" value="<?php echo $dateValue; ?>" />
          <input type="hidden" name="d" id="hd" value="<?php echo $d_1; ?>" />
          <input type="hidden" name="m" id="hm" value="<?php echo $m_1; ?>" />
          <input type="hidden" name="y" id="hy" value="<?php echo $y_1; ?>" />
          <button type="submit">Apply</button>
        </form>
        <div style="display:inline-flex;gap:4px;">
          <button type="button" id="btnPrev" style="font-family:var(--font-sans);font-size:13px;font-weight:500;padding:7px 12px;border:none;border-radius:var(--radius-md);background:var(--bg-panel);border:1px solid var(--border-default);color:var(--text-primary);cursor:pointer;">‹ Prev</button>
          <button type="button" id="btnToday" style="font-family:var(--font-sans);font-size:13px;font-weight:500;padding:7px 12px;border:none;border-radius:var(--radius-md);background:var(--bg-panel);border:1px solid var(--border-default);color:var(--text-primary);cursor:pointer;">Today</button>
          <button type="button" id="btnNext" style="font-family:var(--font-sans);font-size:13px;font-weight:500;padding:7px 12px;border:none;border-radius:var(--radius-md);background:var(--bg-panel);border:1px solid var(--border-default);color:var(--text-primary);cursor:pointer;">Next ›</button>
        </div>
      </div>
      <div class="range-info">Showing <?php echo $dateLabel; ?></div>
    </div>

    <?php if(!$hasChartData): ?>
      <div class="no-data">
        <div class="icon">&#9888;</div>
        <div>No data for <?php echo $dateLabel;?></div>
        <div style="font-size:12px;margin-top:4px;color:var(--text-tertiary)">Try a different date</div>
      </div>
    <?php else: ?>
      <div id="chart-container"></div>
    <?php endif; ?>

    <div class="legend-grid">
      <div class="lg-tile"><span class="swatch" style="background:#f59e0b"></span><div><div class="name" style="color:#f59e0b">Solar (Peak)</div><div class="desc"><?php echo number_format($maxPv, 2); ?> kW</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#ea580c"></span><div><div class="name" style="color:#ea580c">Gen (Peak)</div><div class="desc"><?php echo number_format($maxGen, 2); ?> kW</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#3b82f6"></span><div><div class="name" style="color:#3b82f6">Load (Peak)</div><div class="desc"><?php echo number_format($maxLoad, 2); ?> kW</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#f9c66b"></span><div><div class="name" style="color:#f9c66b">Irradiance (Peak)</div><div class="desc"><?php echo number_format($maxIrr, 0); ?> W/m²</div></div></div>
      <?php if($lastSoc!==null): ?>
      <div class="lg-tile"><span class="swatch" style="background:#8b5cf6"></span><div><div class="name" style="color:#8b5cf6">Last SOC</div><div class="desc"><?php echo number_format($lastSoc, 0); ?> %</div></div></div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php if($hasChartData): ?>
<script src="/highstock/js/jquery.min.js"></script>
<script src="/highstock/js/highstock.js"></script>
<script src="/highstock/js/modules/exporting.js"></script>

<script type="text/javascript">
function showChartError(message){
  var el = document.getElementById('chart-container');
  if(!el) return;
  el.innerHTML = '<div style="padding:24px;color:#b91c1c;font:13px DM Sans, sans-serif">Chart render error: ' + String(message) + '</div>';
}

if(!window.Highcharts){
  showChartError('Highcharts library not loaded');
} else {
try {
  Highcharts.setOptions({
      lang: { rangeSelectorZoom: '' },
      global: { useUTC: true }
  });

  var PM1 = [<?php echo rtrim($nnPv,',');?>];
  var PM2 = [<?php echo rtrim($nnGen,',');?>];
  var PM3 = [<?php echo rtrim($nnLoad,',');?>];
  var PM4 = [<?php echo rtrim($nnCtrl,',');?>];
  var PM5 = [<?php echo rtrim($nnIrr,',');?>];
  var PM6 = [<?php echo rtrim($nnSoc,',');?>];

  chart = new Highcharts.StockChart({
    chart: {
        renderTo: 'chart-container',
        zoomType: 'x',
        backgroundColor: 'transparent',
        style: { fontFamily: "'DM Sans', sans-serif" },
        spacing: [16, 8, 10, 8]
    },
    credits: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },

    rangeSelector: {
        buttons: [
            { type: 'hour', count: 6, text: '6h' },
            { type: 'hour', count: 12, text: '12h' },
            { type: 'all', text: 'All' }
        ],
        selected: 2,
        inputEnabled: false,
        buttonTheme: {
            r: 8,
            padding: 6,
            style: { color: '#888', fontWeight: 500 }
        }
    },

    xAxis: {
        type: 'datetime',
        gridLineWidth: 1,
        gridLineColor: '#e8e6df',
        lineColor: '#e8e6df',
        tickColor: '#e8e6df',
        labels: { style: { color: '#888', fontFamily: "'DM Mono'" } }
    },

    yAxis: [{ // 0: kW (left)
        title: { text: null },
        labels: { format: '{value} kW', style: { color: '#888', fontFamily: "'DM Mono'" } },
        gridLineColor: '#e8e6df',
        opposite: false
    }, { // 1: Irradiance (right)
        title: { text: null },
        labels: { format: '{value} W/m2', style: { color: '#f9c66b', fontFamily: "'DM Mono'" } },
        gridLineColor: 'transparent',
        opposite: true,
        min: 0
    }, { // 2: SOC % (far right)
        title: { text: null },
        labels: { format: '{value}%', style: { color: '#8b5cf6', fontFamily: "'DM Mono'" } },
        gridLineColor: 'transparent',
        opposite: true,
        min: 0,
        max: 100
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
        series: {
            lineWidth: 2,
            marker: { enabled: false },
            states: { hover: { lineWidth: 3 } }
        }
    },

    series: [{
        name: 'PV (Solar)',
        color: '#f59e0b',
        data: PM1,
        tooltip: { valueSuffix: ' kW' }
    }, {
        name: 'Gen',
        color: '#ea580c',
        data: PM2,
        tooltip: { valueSuffix: ' kW' }
    }, {
        name: 'Load',
        color: '#3b82f6',
        data: PM3,
        tooltip: { valueSuffix: ' kW' }
    }, {
        name: 'Ctrl PM',
        color: '#06b6d4',
        data: PM4,
        visible: false,
        dashStyle: 'ShortDash',
        tooltip: { valueSuffix: ' kW' }
    }, {
        name: 'Irradiance',
        color: '#f9c66b',
        data: PM5,
        yAxis: 1,
        tooltip: { valueSuffix: ' W/m2' }
    }, {
        name: 'SOC',
        color: '#8b5cf6',
        data: PM6,
        yAxis: 2,
        tooltip: { valueSuffix: '%' }
    }],

    navigator: {
        height: 40,
        outlineColor: '#e8e6df',
        maskFill: 'rgba(59,130,246,0.10)',
        series: { color: '#3b82f6', lineWidth: 1 },
        xAxis: { labels: { style: { color: '#aaa', fontFamily: "'DM Mono'", fontSize: '10px' } } }
    },

    scrollbar: { enabled: false },

    exporting: {
        enabled: false
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
const datePick = document.getElementById('datepick');
const form = document.getElementById('dateform');

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
