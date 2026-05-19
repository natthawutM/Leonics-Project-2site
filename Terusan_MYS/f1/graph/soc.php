<?php
/*$site=$_REQUEST['p2'];
switch ($site) {
	case "1":
		$name_site="1id1";
	break;
	case "2":
		$name_site="1id2";
	break;
}*/
$date1_=date( 'Y-m-d' );
$d_1=date('d');
$m_1=date('m');
$m_2=date('M');
$y_1=date('Y');
//$d_1="13";
/*$date1_="2021-05-23";
$d_1="23";
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
$sum=0;
include("../Includes/DBConn2.php");
$link2 = connectToDB2();
	$strSQL = "SELECT DatetimeLocal,Batt_Avg_SOC FROM graph where  year(DatetimeLocal)= $y_1 and month(DatetimeLocal)= $m_1 and day(DatetimeLocal)= $d_1 order by DatetimeLocal ASC";
			$objQuery = mysql_query($strSQL) or die("query error".mysql_error());
			$i=0;
			$num_row=mysql_num_rows($objQuery);
			//print $num_row."<br>";
			while($objResult = mysql_fetch_array($objQuery))
			{
				$dateTimeServer[$i]=$objResult['DatetimeLocal'];
				$dateTime_[$i]=substr($objResult['DatetimeLocal'],0,10);
			 	$dateTimeServer_[$i]=substr($objResult['DatetimeLocal'],0,17);	
				$Year1[$i]=substr($objResult['DatetimeLocal'],0,4);
				$Month1[$i]=substr($objResult['DatetimeLocal'],5,2);	
				$day1[$i]=substr($objResult['DatetimeLocal'],8,2);
				$H1[$i]=substr($objResult['DatetimeLocal'],11,2);
				$M1[$i]=substr($objResult['DatetimeLocal'],14,2);
				$S1[$i]=substr($objResult['DatetimeLocal'],17,2);
				if($objResult['Batt_Avg_SOC']==-0.999||($objResult['Batt_Avg_SOC']==NULL)){$Input_V1=0;}else{$Input_V1=$objResult['Batt_Avg_SOC'];}
				
				$nn_Pv_kW1_1.="[Date.UTC(".$Year1[$i].",". $Month1[$i].",". $day1[$i].",". $H1[$i].",". $M1[$i].",". $S1[$i]."),".$Input_V1."],";
				$i++;
		} //print "[Date.UTC(".$y_1.",". $m_1.",". $d_1.",". $H1[$num_row-1].",". $M1[$num_row-1].",". $S1[$num_row-1]."),null],"."<br>";;
		mysql_close($link2);
////-------------------------------------
/*for($i=$num_row;$i<=5750;$i++){
	//print $i."<br>";
	$nn_Pv_kW1_.="[Date.UTC(".$y_1.",". $m_1.",". $d_1.",". $H1[$num_row-1].",". $M1[$num_row-1].",". $S1[$num_row-1]."),null],";
	$nn_Pv_kW2_.="[Date.UTC(".$y_1.",". $m_1.",". $d_1.",". $H1[$num_row-1].",". $M1[$num_row-1].",". $S1[$num_row-1]."),null],";
	$nn_Pv_kW3_.="[Date.UTC(".$y_1.",". $m_1.",". $d_1.",". $H1[$num_row-1].",". $M1[$num_row-1].",". $S1[$num_row-1]."),null],";
}*/
$nn_Pv1_=$nn_Pv_kW1_1;
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

        <style type="text/css">
        body {
	background-color: transparent;
}
        </style>
	</head>
	<body>
     
<script src="../../../../highchart/js/jquery-3.1.1.min.js"></script>
<script src="../../../../highchart/code/highcharts.js"></script>
<script src="../../../../highchart/code/modules/annotations.js"></script>
<script src="../../../../highchart/code/modules/exporting.js"></script>
<script src="../../../../highchart/js/loadxmldoc.js"></script>
<script src="../../../../highchart/js/jquery.min.js"></script>

<!--div id="container" style="height: 400px; min-width: 380px"></div-->

<script type="text/javascript">

// Data generated from http://www.bikeforums.net/professional-cycling-fans/1113087-2017-tour-de-france-gpx-tcx-files.html
var PM1 = [<?php print substr($nn_Pv_kW1_1, 0, strlen($nn_Pv_kW1_1)-1);?>];
// Now create the chart
window.onload = function(){
    var button = document.getElementById('update');
    setInterval(function(){
        update.click();
    },7000);  // this will make it click again every 1000 miliseconds
};	
//--------------------------------------------------
var start = + new Date();
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		
//Highcharts.chart('container', {
    chart: {
	renderTo: 'container',
           
        type: 'area',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
	marginBottom: 90,
	zoomType: 'xy',
	Width:100,
	height: 130,
	borderColor: '#EAEAEA',
	borderRadius: 1,
	borderWidth: 0,
	backgroundColor:'transparent',
    },
	credits: {
            enabled: false
        },

    title: {
        text: '',
	style: {
			fontFamily: 'Calibri',
			color: '#000000',
            fontWeight: 'bold',
			fontSize: '12px'
        	}
    },

    subtitle: {
        text: ''
    },

    xAxis: {
	    type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
	    second: '%H:%M:%S',
	    day: '%e . %b',
        },
        minRange: 5,
	    gridLineColor: 'transparent',
            lineColor: 'transparent',
            tickColor: 'transparent',
        title: {
            text: ''
        },
        labels: {
            format: '',
	    style: {
			fontFamily: 'Calibri',
			color: 'transparent',
			fontSize: '1px'
        	},
        }
    },

    yAxis: {
        startOnTick: true,
        endOnTick: false,
       maxPadding: 0.35,
        title: {
            text: null
        },gridLineColor: 'transparent',
        labels: {
            format: '',
	    style: {
			fontFamily: 'Calibri',
			color: '#fff',
			fontSize: '1px'
        	},
        }
    },
    tooltip: {
        headerFormat: 'Time: {point.x:%H:%M:%S} ',
        pointFormat: '<span style="font-family:Courier; color:transparent; font-size: 7px;">&nbsp;&nbsp;</span>{point.y:,.2f} %  ',
        shared: false,
	style: {
			fontFamily: 'Calibri',
			color: '#000',
			fontSize: '12px',
        	},
	positioner: function () {
            return { x: 32, y: 72 };
        },
	shadow: false,
        borderWidth: 0,
	backgroundColor:'transparent',
        fillOpacity: 0,
    },
    legend: {
        layout: 'horizontal',
        align: 'center',
	enabled: false
    },
    series: [{
        data: PM1,
        lineColor:'#fce997',
	    lineWidth: 1.5,
        opacity: 0.8,
        color: '#fce997',
        fillOpacity: 0.5,
        name: 'SOC',
        marker: {
            enabled: false
        },
        threshold: null
    }],
    exporting: {enabled: false}
  });
  
	i = 1;

//  $('#update').click(function() {change
$('#update').click(function() {
	//alert("cc");
	 var currentdate = new Date();
	   var vv=currentdate.getHours();
	   var vv2=currentdate.getDate();
//alert("vvv");
		xmlDoc=loadXMLDoc("../xml/Xml_soc.php");
		var Y=new Number();
		var Y=Number(xmlDoc.getElementsByTagName("Year1")[0].childNodes[0].nodeValue);
		var MM=new Number();
		var MM=Number(xmlDoc.getElementsByTagName("Month1")[0].childNodes[0].nodeValue);
		var D=new Number();
		var D=Number(xmlDoc.getElementsByTagName("day1")[0].childNodes[0].nodeValue);
		var H=new Number();
		var H=Number(xmlDoc.getElementsByTagName("H1")[0].childNodes[0].nodeValue);
		var m=new Number();
		var m=Number(xmlDoc.getElementsByTagName("M1")[0].childNodes[0].nodeValue);
		var s=new Number();
		var s=Number(xmlDoc.getElementsByTagName("S1")[0].childNodes[0].nodeValue);
		var G1_PV=new Number();
		var G1_PV=Number(xmlDoc.getElementsByTagName("PM1")[0].childNodes[0].nodeValue);
		var p1=[Date.UTC(Y, MM, D, H, m, s), G1_PV];
		//alert(p1);
		chart.series[0].addPoint(p1, true, false);
    	
	});
});

		</script>
        <div id="container" style="min-width: 100px; height: 80px; margin: 0 auto"></div>
         <button id="update" hidden="true">.</button></div></center>
	</body>
</html>
