<?php
if($_POST==NULL){
	$date1_=date( 'Y-m-d' );
	$d_1=date('d');
	$m_1=date('m');
	$m_2=date('M');
	$y_1=date('Y');
}else{
	
	$d_1=$_POST["d"];
	$m_1=$_POST["m"];
	$y_1=$_POST["y"];
	$date1_=$y_1."-".$m_1."-".$d_1;
	switch ($m_1){
	case "01":
		$m_2="Jan";
	break;
	case "02":
		$m_2="Feb";
	break;
	case "03":
		$m_2="Mar";
	break;
	case "04":
		$m_2="Apr";
	break;
	case "05":
		$m_2="May";
	break;
	case "06":
		$m_2="Jun";
	break;
	case "07":
		$m_2="Jul";
	break;
	case "08":
		$m_2="Aug";
	break;
	case "09":
		$m_2="Sep";
	break;
	case "10":
		$m_2="Oct";
	break;
	case "11":
		$m_2="Nov";
	break;
	case "12":
		$m_2="Dec";
	break;
}
}
//$d_1="13";
/*$date1_="2021-05-25";
$d_1="25";
$m_1="05";
$m_2="May";
$y_1="2021";*/
$Date_Total = array();
for($i=0;$i<24;$i++){
		if($i<10){
			$i_="0".$i;
		}else{
			$i_=$i;
		}
		for($ii=0;$ii<60;$ii++){
			if($ii<10){
				$ii_="0".$ii;
			}else{
				$ii_=$ii;
			}
			$dateT[$i][$ii]=$date1_." ".$i_.":".$ii_;
			array_push($Date_Total, $dateT[$i][$ii]);	
		}
	}	
$nn_Pv1_kW_1="";
$nn_Pv2_kW_2="";
$nn_Pv3_kW_3="";
$nn_Pv4_kW_4="";
//$nn_Pv5_kW_5="";

$nn_Pv_kW1_1="";
$nn_Pv_kW2_2="";
$nn_Pv_kW3_3="";
$nn_Pv_kW4_4="";
//$nn_Pv_kW5_5="";

$nn_Pv1_="";
$nn_Pv2_="";
$nn_Pv3_="";
$nn_Pv4_="";
//$nn_Pv5_="";

$AllPV=0;
$irr=0;
$GD=0;
$AllLoad=0;
$AllESS=0;
$TotalPV=0;

$latest_PV=0;
$latest_GD=0;
$latest_AllLoad=0;
$latest_irr=0;

include("../Includes/DBConn.php");
$link = connectToDB();

	/*$strSQL = "SELECT DatetimeLocal,Sum_SCC_PV_kW,AC_Load_Total_Power_kW,AC_Input_Total_Power_kW,BDI_Battery_Voltage,Inverter_Output_Total_Power_kW FROM graph_table where  year(DatetimeLocal)= $y_1 and month(DatetimeLocal)= $m_1 and day(DatetimeLocal)= $d_1 order by DatetimeLocal ASC";*/
	
	$strSQL = "SELECT DatetimeLocal,Sum_AC_Input_kW,Sum_AC_Load_kW,Sum_GCI_PV_kW,Sum_SCC_PV_kW,Irradiance_W_m2 FROM graph where year(DatetimeLocal)= $y_1 and month(DatetimeLocal)= $m_1 and day(DatetimeLocal)= $d_1 order by DatetimeLocal ASC";

			$objQuery = mysql_query($strSQL) or die("query error".mysql_error());
			$i=0;
			$num_row=mysql_num_rows($objQuery);
			//print $num_row."<br>";
			while($objResult = mysql_fetch_array($objQuery))
			{
				$dateTimeServer=$objResult['DatetimeLocal'];
				$dateTime_=substr($objResult['DatetimeLocal'],0,10);
				$dateTimeServer_=substr($objResult['DatetimeLocal'],0,17);	
				$Year1=substr($objResult['DatetimeLocal'],0,4);
				$Month1=substr($objResult['DatetimeLocal'],5,2);	
				$day1=substr($objResult['DatetimeLocal'],8,2);
				$H1=substr($objResult['DatetimeLocal'],11,2);
				$M1=substr($objResult['DatetimeLocal'],14,2);
				$S1=substr($objResult['DatetimeLocal'],17,2);
				
				//print $objResult['DatetimeServer']."=".$objResult['Load_Total_P_kW']."<br>";
	            
				if(($objResult['Sum_AC_Input_kW']==-0.999)||($objResult['Sum_AC_Input_kW']==NULL)){$GD=0;}else{$GD=$objResult['Sum_AC_Input_kW'];}
				if(($objResult['Sum_AC_Load_kW']==-0.999)||($objResult['Sum_AC_Load_kW']==NULL)){$AllLoad=0;}else{$AllLoad=$objResult['Sum_AC_Load_kW'];}
				if(($objResult['Irradiance_W_m2']==-0.999)||($objResult['Irradiance_W_m2']==NULL)){$irr=0;}else{$irr=$objResult['Irradiance_W_m2'];}
				
				if(($objResult['Sum_GCI_PV_kW']==-0.999)||($objResult['Sum_GCI_PV_kW']==NULL)){$AllPV=0;}else{$AllPV=$objResult['Sum_GCI_PV_kW'];}
				if(($objResult['Sum_SCC_PV_kW']==-0.999)||($objResult['Sum_SCC_PV_kW']==NULL)){$AllESS=0;}else{$AllESS=$objResult['Sum_SCC_PV_kW'];}
				
				$TotalPV=$AllPV+$AllESS;

				$latest_PV=$TotalPV;
				$latest_GD=$GD;
				$latest_AllLoad=$AllLoad;
				$latest_irr=$irr;

				$nn_Pv_kW1_1.="[Date.UTC(".$Year1.",". $Month1.",". $day1.",". $H1.",". $M1.",". $S1."),".$TotalPV."],";
				$nn_Pv_kW2_2.="[Date.UTC(".$Year1.",". $Month1.",". $day1.",". $H1.",". $M1.",". $S1."),".$GD."],";
			    $nn_Pv_kW3_3.="[Date.UTC(".$Year1.",". $Month1.",". $day1.",". $H1.",". $M1.",". $S1."),".$AllLoad."],";
			    $nn_Pv_kW4_4.="[Date.UTC(".$Year1.",". $Month1.",". $day1.",". $H1.",". $M1.",". $S1."),".$irr."],";
				//$nn_Pv_kW5_5.="[Date.UTC(".$Year1.",". $Month1.",". $day1.",". $H1.",". $M1.",". $S1."),".$AllESS."],";
				
				//print $objResult['DatetimeServer']."=".$Load_Total_P_kW."<br>";
				$i++;
		} //print "[Date.UTC(".$y_1.",". $m_1.",". $d_1.",". $H1[$num_row-1].",". $M1[$num_row-1].",". $S1[$num_row-1]."),null],"."<br>";;
		mysql_close($link);
////-------------------------------------
/*for($i=$num_row;$i<=5750;$i++){
	//print $i."<br>";
	$nn_Pv_kW1_.="[Date.UTC(".$y_1.",". $m_1.",". $d_1.",". $H1[$num_row-1].",". $M1[$num_row-1].",". $S1[$num_row-1]."),null],";
	$nn_Pv_kW2_.="[Date.UTC(".$y_1.",". $m_1.",". $d_1.",". $H1[$num_row-1].",". $M1[$num_row-1].",". $S1[$num_row-1]."),null],";
	$nn_Pv_kW3_.="[Date.UTC(".$y_1.",". $m_1.",". $d_1.",". $H1[$num_row-1].",". $M1[$num_row-1].",". $S1[$num_row-1]."),null],";
}*/
$nn_Pv1_=$nn_Pv_kW1_1;
$nn_Pv2_=$nn_Pv_kW2_2;
$nn_Pv3_=$nn_Pv_kW3_3;
$nn_Pv4_=$nn_Pv_kW4_4;
//$nn_Pv5_=$nn_Pv_kW5_5;
//print $nn_Pv3_."<br>";
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

  /* legend tiles below chart */
  .legend-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-top:14px}
  .lg-tile{background:var(--bg-panel);border-radius:var(--radius-md);padding:10px 12px;display:flex;align-items:center;gap:10px}
  .lg-tile .swatch{width:10px;height:10px;border-radius:2px;flex-shrink:0}
  .lg-tile .name{font-size:11px;color:var(--text-secondary);font-weight:500;text-transform:uppercase;letter-spacing:0.3px}
  .lg-tile .desc{font-size:11px;color:var(--text-tertiary);margin-top:2px}

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
    <div class="card-title"><span class="dot"></span>Power Graph · Jambongan</div>

    <div class="toolbar">
      <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
        <span class="label">Date</span>
        <form method="POST" action="All.php" id="dateform" style="display:flex;gap:8px;align-items:center">
          <input type="date" id="datepick" name="datepick" value="<?php echo $date1_; ?>" />
          <input type="hidden" name="d" id="d" value="<?php echo $d_1; ?>" />
          <input type="hidden" name="m" id="m" value="<?php echo $m_1; ?>" />
          <input type="hidden" name="y" id="y" value="<?php echo $y_1; ?>" />
          <button type="submit">Apply</button>
        </form>
      </div>
      <div class="range-info">Showing <?php echo $d_1."-".$m_2."-".$y_1; ?></div>
    </div>

    <div id="chart-container"></div>

    <div class="legend-grid">
      <div class="lg-tile"><span class="swatch" style="background:#ef4444"></span><div><div class="name" style="color:#ef4444">All PV (kW)</div><div class="desc"><?php echo number_format($latest_PV, 2); ?> kW</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#8b5cf6"></span><div><div class="name" style="color:#8b5cf6">Gen (kW)</div><div class="desc"><?php echo number_format($latest_GD, 2); ?> kW</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#06b6d4"></span><div><div class="name" style="color:#06b6d4">Load (kW)</div><div class="desc"><?php echo number_format($latest_AllLoad, 2); ?> kW</div></div></div>
      <div class="lg-tile"><span class="swatch" style="background:#f59e0b"></span><div><div class="name" style="color:#f59e0b">Irradiance (W/m2)</div><div class="desc"><?php echo number_format($latest_irr, 2); ?> W/m²</div></div></div>
    </div>
  </div>
</div>

<script src="../../../highstock/js/jquery.min.js"></script>
<script src="../../../highstock/js/highstock.js"></script>
<script src="../../../highstock/js/modules/exporting.js"></script>
<script src="../../../../highchart/js/loadxmldoc.js"></script>

<script type="text/javascript">
document.getElementById('datepick').addEventListener('change', function(){
    var parts = this.value.split('-');
    document.getElementById('y').value = parts[0];
    document.getElementById('m').value = parts[1];
    document.getElementById('d').value = parts[2];
});
document.getElementById('dateform').addEventListener('submit', function(){
    var parts = document.getElementById('datepick').value.split('-');
    document.getElementById('y').value = parts[0];
    document.getElementById('m').value = parts[1];
    document.getElementById('d').value = parts[2];
});

document.getElementById('datepick').addEventListener('change', function(){
    setTimeout(function(){ document.getElementById('dateform').submit(); }, 50);
});

Highcharts.setOptions({
    lang: { rangeSelectorZoom: '' },
    global: { useUTC: true }
});

var PM1 = [<?php print substr($nn_Pv_kW1_1, 0, strlen($nn_Pv_kW1_1)-1);?>];
var PM2 = [<?php print substr($nn_Pv_kW2_2, 0, strlen($nn_Pv_kW2_2)-1);?>];
var PM3 = [<?php print substr($nn_Pv_kW3_3, 0, strlen($nn_Pv_kW3_3)-1);?>];
var PM4 = [<?php print substr($nn_Pv_kW4_4, 0, strlen($nn_Pv_kW4_4)-1);?>];

window.onload = function(){
    setInterval(function(){
        var btn = document.getElementById('update');
        if (btn) btn.click();
    },7000);
};

var chart;
$(document).ready(function() {
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
            { type: 'day', count: 1, text: '1d' },
            { type: 'day', count: 2, text: '2d' },
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

    yAxis: [{
        title: { text: null },
        labels: { format: '{value} kW', style: { color: '#888', fontFamily: "'DM Mono'" } },
        gridLineColor: '#e8e6df',
        opposite: false
    }, {
        title: { text: null },
        labels: { format: '{value} W/m2', style: { color: '#888', fontFamily: "'DM Mono'" } },
        gridLineColor: 'transparent',
        opposite: true,
        min: 0
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
        name: 'All PV',
        color: '#ef4444',
        data: PM1,
        tooltip: { valueSuffix: ' kW' }
    }, {
        name: 'Gen',
        color: '#8b5cf6',
        data: PM2,
        tooltip: { valueSuffix: ' kW' }
    }, {
        name: 'Load',
        color: '#06b6d4',
        data: PM3,
        tooltip: { valueSuffix: ' kW' }
    }, {
        name: 'Irradiance',
        color: '#f59e0b',
        data: PM4,
        yAxis: 1,
        tooltip: { valueSuffix: ' W/m2' }
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

  $('#update').click(function() {
    xmlDoc=loadXMLDoc("../xml/Xml_all.php?y=<?php print $y_1;?>&m=<?php print $m_1;?>&d=<?php print $d_1;?>");
    var Y=new Number(xmlDoc.getElementsByTagName("Year1")[0].childNodes[0].nodeValue);
    var MM=new Number(xmlDoc.getElementsByTagName("Month1")[0].childNodes[0].nodeValue);
    var D=new Number(xmlDoc.getElementsByTagName("day1")[0].childNodes[0].nodeValue);
    var H=new Number(xmlDoc.getElementsByTagName("H1")[0].childNodes[0].nodeValue);
    var m=new Number(xmlDoc.getElementsByTagName("M1")[0].childNodes[0].nodeValue);
    var s=new Number(xmlDoc.getElementsByTagName("S1")[0].childNodes[0].nodeValue);
    var G1_PV=new Number(xmlDoc.getElementsByTagName("PM1")[0].childNodes[0].nodeValue);
    var G2_PV=new Number(xmlDoc.getElementsByTagName("PM2")[0].childNodes[0].nodeValue);
    var G3_PV=new Number(xmlDoc.getElementsByTagName("PM3")[0].childNodes[0].nodeValue);
    var G4_PV=new Number(xmlDoc.getElementsByTagName("PM4")[0].childNodes[0].nodeValue);
    
    var p1=[Date.UTC(Y, MM, D, H, m, s), G1_PV];
    var p2=[Date.UTC(Y, MM, D, H, m, s), G2_PV];
    var p3=[Date.UTC(Y, MM, D, H, m, s), G3_PV];
    var p4=[Date.UTC(Y, MM, D, H, m, s), G4_PV];
    
    chart.series[0].addPoint(p1, true, false);
    chart.series[1].addPoint(p2, true, false);
    chart.series[2].addPoint(p3, true, false);  
    chart.series[3].addPoint(p4, true, false);
  });
});
</script>

<div style="display:none"><button id="update">.</button></div>
</body>
</html>
