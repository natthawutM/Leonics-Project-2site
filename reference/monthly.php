<?php
	$name="";
	$Genn="";
	$Loadn="";
	$PVn="";
	$Irrn="";
if($_POST==NULL){
	$date1_=date( 'Y-m' );
	$m_1=date('m');
	$m_2=date('M');
	$y_1=date('Y');
}else{
	$m_1=$_POST["m"];
	$y_1=$_POST["y"];
	$date1_=$y_1."-".$m_1;
	
}
switch ($m_1){
	case "01":
		$m_2="Jan";
		$n_d=31;
	break;
	case "02":
		$m_2="Feb";
		if($y==0){
			$n_d=29;
		}else{
			$n_d=28;
		}
	break;
	case "03":
		$m_2="Mar";
		$n_d=31;
	break;
	case "04":
		$m_2="Apr";
		$n_d=30;
	break;
	case "05":
		$m_2="May";
		$n_d=31;
	break;
	case "06":
		$m_2="Jun";
		$n_d=30;
	break;
	case "07":
		$m_2="Jul";
		$n_d=31;
	break;
	case "08":
		$m_2="Aug";
		$n_d=31;
	break;
	case "09":
		$m_2="Sep";
		$n_d=30;
	break;
	case "10":
		$m_2="Oct";
		$n_d=31;
	break;
	case "11":
		$m_2="Nov";
		$n_d=30;
	break;
	case "12":
		$m_2="Dec";
		$n_d=31;
	break;
}
$date_name=$y_1."-".$m_2;
//-------------------- connect data base ---------------------------

mysql_connect ("localhost","root","")
or die ("can not connect to your hosting");
mysql_select_db ("jambongan")or die ("can not connect to your database");
	//$strSQL = "SELECT DatetimeServer,Grid_kWh,Load_kWh,PV_kWh,Yr FROM energylog_table where year(DatetimeServer)='$y_1' and month(DatetimeServer)='$m_1'   order by DatetimeServer asc";
	
	$strSQL = "SELECT DatetimeLocal,Gen_kWh,Load_kWh,PV_kWh,Irradiation_kWh_m2 FROM energylog where year(DatetimeLocal)='$y_1' and month(DatetimeLocal)='$m_1'  order by DatetimeLocal asc";
			$objQuery = mysql_query($strSQL) or die("query error".mysql_error());
			//print $strSQL;
			$i=0;
			$num_row=mysql_num_rows($objQuery);
			while($objResult = mysql_fetch_array($objQuery))
			{
				$dateTimeServer[$i]=$objResult['DatetimeLocal'];
				$dateH_[$i]=substr($objResult['DatetimeLocal'],0,10);
				$Gen[$i]=$objResult['Gen_kWh'];
				$Load[$i]=$objResult['Load_kWh'];
				$PV[$i]=$objResult['PV_kWh'];
				$Irr[$i]=$objResult['Irradiation_kWh_m2'];
				//print $dateH_[$i]."<br>";
				$i++;
		} 
for($i=1;$i<=$n_d;$i++){
	$Gen1[$i]=0;
	$PV1[$i]=0;
	$Load1[$i]=0;
	$Irr1[$i]=0;
	$name1[$i]=$i;
	if ($i<10){
		$date_n=$y_1."-".$m_1."-0".$i;
	}else{
		$date_n=$y_1."-".$m_1."-".$i;
	}
	for($k=0;$k<$num_row;$k++){
		//print $date_n."==".$dateH_[$k]."<br>";
		if($date_n==$dateH_[$k]){
			$Gen1[$i]=$Gen1[$i]+$Gen[$k];
			$PV1[$i]=$PV1[$i]+$PV[$k];
			$Load1[$i]=$Load1[$i]+$Load[$k];
			$Irr1[$i]=$Irr1[$i]+$Irr[$k];
		}else{
			$Gen1[$i]=$Gen1[$i];
			$PV1[$i]=$PV1[$i];
			$Load1[$i]=$Load1[$i];
			$Irr1[$i]=$Irr1[$i];
			
		}
	}
	$name.=$name1[$i].",";
	$Genn.=$Gen1[$i].",";	
	$PVn.=$PV1[$i].",";
	$Loadn.=$Load1[$i].",";
	$Irrn.=$Irr1[$i].",";
	
	
}
/*print $Genn."<br>";
print $PVn."<br>";*/

$total_PV = array_sum($PV1);
$total_Gen = array_sum($Gen1);
$total_Load = array_sum($Load1);
$total_Irr = array_sum($Irr1);
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
    <div class="card-title"><span class="dot"></span>Daily Energy System Report Graph</div>

    <div class="toolbar">
      <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
        <form method="POST" action="monthly.php" id="dateform" style="display:flex;gap:8px;align-items:center">
          <span class="label">Month</span>
          <select name="m" id="m">
            <option value="<?php print $m_1; ?>"><?php print $m_2; ?></option>
            <option value="01">Jan</option>
            <option value="02">Feb</option>
            <option value="03">Mar</option>
            <option value="04">Apr</option>
            <option value="05">May</option>
            <option value="06">Jun</option>
            <option value="07">Jul</option>
            <option value="08">Aug</option>
            <option value="09">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
          </select>
          <span class="label">Year</span>
          <select name="y" id="y">
            <option value="<?php print $y_1; ?>"><?php print $y_1; ?></option>
            <?php for($i=2025;$i<=date('Y');$i++){?>
            <option value="<?php print $i;?>"><?php print $i;?></option>
            <?php }?>
          </select>
          <button type="submit">Apply</button>
        </form>
      </div>
      <div class="range-info">Showing <?php echo $date_name; ?></div>
    </div>

    <div id="chart-container"></div>

    <div class="legend-grid">
      <div class="lg-tile"><span class="swatch" style="background:#ef4444"></span><div><div class="name" style="color:#ef4444">PV (kWh)</div><div class="desc"><?php echo number_format($total_PV, 2); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#8b5cf6"></span><div><div class="name" style="color:#8b5cf6">Gen (kWh)</div><div class="desc"><?php echo number_format($total_Gen, 2); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#06b6d4"></span><div><div class="name" style="color:#06b6d4">Load (kWh)</div><div class="desc"><?php echo number_format($total_Load, 2); ?> kWh</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#f59e0b"></span><div><div class="name" style="color:#f59e0b">Irradiation (kWh/m2)</div><div class="desc"><?php echo number_format($total_Irr, 2); ?> kWh/m²</div></div></div>
    </div>
  </div>
</div>

<script src="../../../highstock/js/jquery.min.js"></script>
<script src="../../../highstock/js/highstock.js"></script>
<script src="../../../highstock/js/modules/exporting.js"></script>

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
        categories: [<?php print substr($name, 0, strlen($name)-1);?>],
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
        type: 'spline',
        name: 'PV',
        color: '#ef4444',
        data: [<?php print substr($PVn, 0, strlen($PVn)-1);?>],
        tooltip: { valueSuffix: ' kWh' }
    }, {
        type: 'spline',
        name: 'Gen',
        color: '#8b5cf6',
        data: [<?php print substr($Genn, 0, strlen($Genn)-1);?>],
        tooltip: { valueSuffix: ' kWh' }
    }, {
        type: 'spline',
        name: 'Load',
        color: '#06b6d4',
        data: [<?php print substr($Loadn, 0, strlen($Loadn)-1);?>],
        tooltip: { valueSuffix: ' kWh' }
    }, {
        type: 'spline',
        name: 'Irrt',
        color: '#f59e0b',
        yAxis: 1,
        data: [<?php print substr($Irrn, 0, strlen($Irrn)-1);?>],
        tooltip: { valueSuffix: ' kWh/m2' }
    }]
  });
});
</script>
</body>
</html>
