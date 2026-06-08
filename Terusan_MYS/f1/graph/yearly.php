<?php
// ============================================================
// Yearly Energy Report — Terusan
// Monthly energy bars from `terusan_mys.energylog` table.
// Uses mysql_* (PHP 5.x).
// ============================================================
$reqY = isset($_POST["y"]) ? $_POST["y"] : (isset($_GET["y"]) ? $_GET["y"] : null);
$isDataRequest = isset($_GET['data']) && $_GET['data'] == '1';
if($reqY===NULL){
    $y_1 = date('Y');
}else{
    $y_1 = $reqY;
}
$months_full = array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December');
$months_short = array(1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');

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
$co2Saved = round($totalPV * 0.5, 1);
$hasChartData = $totalSupply > 0 || $totalLoad > 0;

function series_json_mixed($csv){
    $csv = rtrim($csv, ',');
    if($csv === '') return array();
    $parts = explode(',', $csv);
    $out = array();
    foreach($parts as $part){
        $part = trim($part);
        if($part === '') {
            $out[] = 0;
        } elseif($part[0] === "'") {
            $out[] = trim($part, "'");
        } else {
            $out[] = (float)$part;
        }
    }
    return $out;
}

if($isDataRequest){
    header('Content-Type: application/json; charset=utf-8');
    $pvArr = series_json_mixed($PVn);
    $genArr = series_json_mixed($Genn);
    $loadArr = series_json_mixed($Loadn);
    $irrArr = series_json_mixed($Irrn);
    $totalPvNow = array_sum($pvArr);
    echo json_encode(array(
        'pv' => $pvArr,
        'gen' => $genArr,
        'load' => $loadArr,
        'irr' => $irrArr,
        'cat' => series_json_mixed($labels),
        'kpi' => array(
            'pv' => round($totalPvNow, 0),
            'gen' => round(array_sum($genArr), 0),
            'load' => round(array_sum($loadArr), 0),
            'irr' => round(array_sum($irrArr), 1),
            'co2' => round($totalPvNow * 0.5, 0)
        )
    ));
    exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yearly Energy — Terusan</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link href="../css/log.css" rel="stylesheet" type="text/css">
  <style type="text/css">
  *{box-sizing:border-box}
  body{margin:0;padding:16px;font-family:'DM Sans',system-ui,sans-serif;background:#f5f5f0;color:#1a1a1a;font-size:13px}
  .wrap{max-width:1180px;margin:0 auto}
  .card{background:#fff;border:1px solid #e8e6df;border-radius:12px;padding:16px}
  .card-head{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;margin-bottom:14px}
  .card-title{font-size:11px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px;display:flex;align-items:center;gap:8px}
  .card-title .dot{width:6px;height:6px;border-radius:50%;background:#ea580c}
  .card-title b{color:#1a1a1a;font-weight:600;font-size:13px;text-transform:none;letter-spacing:0}
  .date-row{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
  .date-row select{
    font-family:'DM Sans',sans-serif;font-size:13px;padding:7px 12px;
    border:1px solid #e8e6df;border-radius:8px;background:#fafaf7;color:#1a1a1a;outline:none;
  }
  .date-row select:focus{border-color:#999}
  .date-row button{
    font-family:'DM Sans',sans-serif;font-size:13px;font-weight:500;
    padding:7px 16px;border:none;border-radius:8px;background:#1a1a1a;color:#fff;cursor:pointer;
  }
  .date-row button:hover{background:#333}
  .kpi-row{display:grid;grid-template-columns:repeat(5,1fr);gap:8px;margin-bottom:16px}
  .kpi-box{background:#fafaf7;border-radius:6px;padding:10px 12px}
  .kpi-box .lbl{font-size:10px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px}
  .kpi-box .val{font-family:'DM Mono',monospace;font-size:17px;font-weight:600;margin-top:2px}
  .kpi-box .val .u{font-size:10px;color:#888;margin-left:2px}
  #container{width:100%;height:340px}
  .notice{margin-top:12px;padding:10px 12px;border:1px solid #f3d6a0;background:#fff8e8;border-radius:8px;color:#9a6700;font-size:12px}
  @media(max-width:900px){.kpi-row{grid-template-columns:repeat(3,1fr)}}
  @media(max-width:600px){body{padding:10px}.card{padding:12px}#container{height:300px}}
  @media(max-width:480px){.kpi-row{grid-template-columns:repeat(2,1fr)}}
  </style>
</head>
<body>

<div class="wrap">
  <div class="card">
    <div class="card-head">
      <div class="card-title"><span class="dot"></span>Yearly Energy Report — <b><?php echo $y_1; ?></b></div>
      <div class="date-row">
        <form method="POST" action="yearly.php" id="dateform" style="display:flex;gap:8px;align-items:center;flex-wrap:wrap">
          <select name="y" id="y">
            <?php for($i=2020;$i<=date('Y');$i++){
              echo '<option value="'.$i.'"'.($i==$y_1?' selected':'').'>'.$i.'</option>';
            } ?>
          </select>
          <button type="submit">Apply</button>
        </form>
      </div>
    </div>

    <div class="kpi-row">
      <div class="kpi-box"><div class="lbl">Solar</div><div class="val" style="color:#ef4444"><span id="kpi-pv"><?php echo number_format($totalPV,0); ?></span><span class="u">kWh</span></div></div>
      <div class="kpi-box"><div class="lbl">Gen</div><div class="val" style="color:#8b5cf6"><span id="kpi-gen"><?php echo number_format($totalGen,0); ?></span><span class="u">kWh</span></div></div>
      <div class="kpi-box"><div class="lbl">Load</div><div class="val" style="color:#06b6d4"><span id="kpi-load"><?php echo number_format($totalLoad,0); ?></span><span class="u">kWh</span></div></div>
      <div class="kpi-box"><div class="lbl">Irradiation</div><div class="val" style="color:#f59e0b"><span id="kpi-irr"><?php echo number_format($totalIrr,1); ?></span><span class="u">kWh/m²</span></div></div>
      <div class="kpi-box"><div class="lbl">CO₂ Saved</div><div class="val" style="color:#10b981"><span id="kpi-co2"><?php echo number_format($co2Saved,0); ?></span><span class="u">kg</span></div></div>
    </div>

    <div id="container"></div>

    <?php if($dbWarning !== ''): ?>
      <div class="notice"><?php echo $dbWarning; ?></div>
    <?php endif; ?>
  </div>
</div>

<!-- <script src="../../../../highchart/js/jquery-3.1.1.min.js"></script>
<script src="../../../../highchart/code/highcharts.js"></script>
<script src="../../../../highchart/code/modules/exporting.js"></script> -->
<script src="/highstock/js/jquery.min.js"></script>
<script src="/highstock/js/highstock.js"></script>
<script src="/highstock/js/modules/exporting.js"></script>

<script type="text/javascript">
var chart;
var _cat=[<?php echo rtrim($labels,',');?>];
var _pv=[<?php echo rtrim($PVn,',');?>];
var _gen=[<?php echo rtrim($Genn,',');?>];
var _load=[<?php echo rtrim($Loadn,',');?>];
var _irr=[<?php echo rtrim($Irrn,',');?>];
$(document).ready(function() {
  chart = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        zoomType: 'x',
        backgroundColor: 'transparent',
        style: { fontFamily: "'DM Sans', sans-serif" },
        spacing: [16, 8, 10, 8]
    },
    credits: { enabled: false },
    title: { text: '' },
    xAxis:{ categories:_cat, title:{text:'Month',style:{color:'#888'}},
      gridLineColor:'#e8e6df', lineColor:'#e8e6df', tickColor:'#e8e6df', labels:{style:{color:'#aaa'}} },

    yAxis: [{
        min:0, startOnTick:true, endOnTick:false, gridLineColor:'#e8e6df',
        tickInterval:100,
        title:{text:'kWh',style:{color:'#888'}}, labels:{style:{color:'#aaa'}}
    }, {
        min:0, startOnTick:false, endOnTick:false, opposite:true, gridLineColor:'transparent',
        tickInterval:1.0,
        title:{text:'kWh/m²',style:{color:'#888'}}, labels:{style:{color:'#aaa'}}
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

    legend:{ layout:'horizontal', align:'center', symbolWidth:10, symbolHeight:10, symbolRadius:5, itemStyle:{fontFamily:"'DM Sans',sans-serif",fontSize:'12px',color:'#555'} },

    plotOptions: {
        series:{ legendSymbol:'rectangle' },
        column: {
            pointPadding: 0.04,
            borderWidth: 0,
            borderRadius: 3
        },
        spline:{ lineWidth:2, marker:{enabled:false}, states:{hover:{lineWidth:3}} }
    },

    series: [{
        type:'column', color:'#ef4444', name:'Solar (kWh)', data:_pv
    }, {
        type:'column', color:'#8b5cf6', name:'Gen (kWh)', data:_gen
    }, {
        type:'column', color:'#06b6d4', name:'Load (kWh)', data:_load
    }, {
        type:'spline', color:'#f59e0b', name:'Irradiation (kWh/m²)', yAxis:1, data:_irr
    }]
  });

  var AUTO_REFRESH_MS = 300000;
  var fmt0 = function(n){ return Number(Math.round(n)).toLocaleString(); };
  var fmt1 = function(n){ return Number(n).toLocaleString(undefined, {minimumFractionDigits:1, maximumFractionDigits:1}); };
  window.setInterval(function(){
    var y = document.getElementById('y');
    if(!y) return;
    var url = 'yearly.php?data=1&y=' + encodeURIComponent(y.value);
    fetch(url, { cache: 'no-store' })
      .then(function(res){ return res.json(); })
      .then(function(data){
        if(!data) return;
        _cat = data.cat || [];
        _pv = data.pv || [];
        _gen = data.gen || [];
        _load = data.load || [];
        _irr = data.irr || [];
        chart.xAxis[0].setCategories(_cat, false);
        chart.series[0].setData(_pv, false, false, false);
        chart.series[1].setData(_gen, false, false, false);
        chart.series[2].setData(_load, false, false, false);
        chart.series[3].setData(_irr, false, false, false);
        if(data.kpi){
          document.getElementById('kpi-pv').textContent = fmt0(data.kpi.pv || 0);
          document.getElementById('kpi-gen').textContent = fmt0(data.kpi.gen || 0);
          document.getElementById('kpi-load').textContent = fmt0(data.kpi.load || 0);
          document.getElementById('kpi-irr').textContent = fmt1(data.kpi.irr || 0);
          document.getElementById('kpi-co2').textContent = fmt0(data.kpi.co2 || 0);
        }
        chart.redraw();
        reportFrameHeight();
      })
      .catch(function(err){
        console.error('yearly auto refresh failed', err);
      });
  }, AUTO_REFRESH_MS);
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
