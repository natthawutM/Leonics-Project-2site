<?php
error_reporting(E_ALL);
$nn_BattV_="";
$nn_PV_="";
$nn_Gen_="";
$nn_Ld_="";
$nn_WT_="";
$nn_Irrd_="";
$nn_SOC_="";

$dateTimeServer=array();
$dateH_=array();
$dateTimeServer_=array();
$BattV=array();
$PV=array();
$Gen=array();
$Ld=array();
$WT=array();
$Irrd=array();
$SOC=array();

$Date_Total=array();
$date_Time=array();
$BattV_=array();
$PV_=array();
$Gen_=array();
$Ld_=array();
$WT_=array();
$Irrd_=array();
$SOC_=array();

//$date=date(Y."-".m."-".d." ");
if($_POST ==null){
	$date1=date( 'Ymd' );
	$date1_=date( 'Y-m-d' );
	$d1=date('d');
	$m1=date('m');
	$m2=date('M');
	$y1=date('Y');

	$now   = new DateTime;
	$clone_2 = clone $now;
	$clone_2->modify( '-1 day' );
	$date2_=$clone_2->format( 'Y-m-d' );

	$clone = clone $now;
	$clone->modify( '-2 day' );
	$date3=$clone->format( 'Ymd');
	$date3_=$clone->format( 'Y-m-d');

	$clone_4 = clone $now;
	$clone_4->modify( '+1 day' );
	$date4=$clone_4->format( 'Ymd');
	$date4_=$clone_4->format( 'Y-m-d');

	$d_1=$clone->format('d');
	$m_1=$clone->format('m');
	$m_2=$clone->format('M');
	$y_1=$clone->format('Y');

	$date2_C = clone $now;
	$date2=$date2_C->format( 'Ymd' );
	$date_=$date2_C->format( 'Y-m-d' );
	$y1=$date2_C->format( 'Y' );
	$m1=$date2_C->format( 'm' );
	$m2=$date2_C->format( 'M' );
	$d1=$date2_C->format( 'd' );

}else{///////////////////// date select
	$N_date=$_POST["y1"]."-".$_POST["m1"]."-".$_POST["d1"];
	$date1_=$N_date;
	$now   =  new DateTime($N_date);
	$clone_2 = clone $now;
	$clone_2->modify( '-1 day' );
	$date2_=$clone_2->format( 'Y-m-d' );

	$clone = clone $now;
	$clone->modify( '-2 day' );
	$date3=$clone->format( 'Ymd');
	$date3_=$clone->format( 'Y-m-d');

	$clone_4 = clone $now;
	$clone_4->modify( '+1 day' );
	$date4=$clone_4->format( 'Ymd');
	$date4_=$clone_4->format( 'Y-m-d');

	$d_1=$clone->format('d');
	$m_1=$clone->format('m');
	$m_2=$clone->format('M');
	$y_1=$clone->format('Y');

	$y1=$_POST["y1"];
	$m1=$_POST["m1"];
	//$m2=$date2_C->format( 'M' );
	$d1=$_POST["d1"];
	switch ($m1){
		case "01": $mm="Jan"; break;
		case "02": $mm="Feb"; break;
		case "03": $mm="Mar"; break;
		case "04": $mm="Apr"; break;
		case "05": $mm="May"; break;
		case "06": $mm="Jun"; break;
		case "07": $mm="Jul"; break;
		case "08": $mm="Aug"; break;
		case "09": $mm="Sep"; break;
		case "10": $mm="Oct"; break;
		case "11": $mm="Nov"; break;
		case "12": $mm="Dec"; break;
	}
	$m2=$mm;

}
//$date_array=array($date3_,$date2_,$date1_);
$date_array=array($date3_,$date2_,$date1_);
$dateT=array(array(array()));
////////////////////////////////////////////
for($k=0;$k<3;$k++){
	for($ii=0;$ii<24;$ii++){
		if($ii<10){
			$ii_="0".$ii;
		}else{
			$ii_=$ii;
		}
		for($iii=0;$iii<60;$iii++){
			if($iii<10){
				$iii_="0".$iii;
			}else{
				$iii_=$iii;
			}
			$dateT[$k][$ii][$iii]=$date_array[$k]." ".$ii_.":".$iii_;
			array_push($Date_Total, $dateT[$k][$ii][$iii]);
		}

	}
}
/*  for($k=0;$k<=4320;$k++){

	print $Date_Total[$k];
	print "<br>";
 }
exit(); */
//-------------------- connect data base ---------------------------
/*  mysql_connect ("localhost","root","")
or die ("can not connect to your hosting");
mysql_select_db ("labian")or die ("can not connect to your database");
	$strSQL = "SELECT * FROM cal_labian where  DatetimeHccu>='$date3' and DatetimeHccu <'$date4' group by date_format(DatetimeHccu,'%Y%m%d %H%i')  order by DatetimeHccu asc";
	$objQuery = mysql_query($strSQL) or die("query error".mysql_error()); */

// Query DB1
		$mysqli = mysqli_init();
		// ใช้ @ ปิดการแสดง warning ไว้ในกรณีที่เราอยากจะแสดง error message ในแบบของเราเอง
		@$mysqli->real_connect('localhost', 'root', '', 'dwr_rbr');

		if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit;
		}

       $strSQL = $mysqli->query("SELECT DatetimeLocal,Batt_Avg_Voltage,PV_kW,ACin_Total_Power_kW,LoadPM_Total_Power_kW,WindPM_Total_Power_kW,Irradiance_W_m2,Batt_Avg_SOC FROM graph where DatetimeLocal>='$date3' and DatetimeLocal <'$date4' group by date_format(DatetimeLocal,'%Y%m%d %H%i') order by DatetimeLocal asc");

			$i=0;
			$num_row=0;
			$num_row=mysqli_num_rows($strSQL);
		//	$num_row = $strSQL->fetch_array();
			//print $num_row;
			//exit();
		//	$num_row=mysql_num_rows($objQuery);
			//while($objResult = mysql_fetch_array($objQuery))
		//	$objResult = $result->fetch_array();

			while($objResult = mysqli_fetch_array($strSQL))
			{
				$dateTimeServer[$i]=$objResult['DatetimeLocal'];
				$dateH_[$i]=substr($objResult['DatetimeLocal'],0,10);
				$dateTimeServer_[$i]=substr($objResult['DatetimeLocal'],0,16);
				$BattV[$i]=$objResult['Batt_Avg_Voltage'];
				$PV[$i]=$objResult['PV_kW'];
				$Gen[$i]=$objResult['ACin_Total_Power_kW'];
				$Ld[$i]=$objResult['LoadPM_Total_Power_kW'];
				$WT[$i]=$objResult['WindPM_Total_Power_kW'];
				$Irrd[$i]=$objResult['Irradiance_W_m2'];
				$SOC[$i]=$objResult['Batt_Avg_SOC'];
				//print $dateTimeServer_[$i]."<br>";
				$i++;
		}

$i=0;
 for($k=0;$k<count($Date_Total);$k++){
	// print $i."===".$num_row."<br>";
	if($i<$num_row){
	//	print $Date_Total[$k]."=".$dateTimeServer_[$i]."<br>";
		if($Date_Total[$k]==$dateTimeServer_[$i]){
			$date_Time[$k]=$dateTimeServer[$i];
			$BattV_[$k]=$BattV[$i];
			$PV_[$k]=$PV[$i];
			$Gen_[$k]=$Gen[$i];
			$Ld_[$k]=$Ld[$i];
			$WT_[$k]=$WT[$i];
			$Irrd_[$k]=$Irrd[$i];
			$SOC_[$k]=$SOC[$i];
							if($BattV[$i]=="-0.999" || $BattV[$i]==""){
								$BattV_[$k]="null";
							}else{
								$BattV_[$k]=$BattV[$i];
							}
							if($PV[$i]=="-0.999" || $PV[$i]==""){
								$PV_[$k]="null";
							}else{
								$PV_[$k]=$PV[$i];
							}
							if($Gen[$i]=="-0.999" || $Gen[$i]==""){
								$Gen_[$k]="null";
							}else{
								$Gen_[$k]=$Gen[$i];
							}
							if($Ld[$i]=="-0.999" || $Ld[$i]==""){
								$Ld_[$k]="null";
							}else{
								$Ld_[$k]=$Ld[$i];
							}
							if($WT[$i]=="-0.999" || $WT[$i]==""){
								$WT_[$k]="null";
							}else{
								$WT_[$k]=$WT[$i];
							}
							if($Irrd[$i]=="-0.999" || $Irrd[$i]==""){
								$Irrd_[$k]="null";
							}else{
								$Irrd_[$k]=$Irrd[$i];
							}
							if($SOC[$i]=="-0.999" || $SOC[$i]==""){
								$SOC_[$k]="null";
							}else{
								$SOC_[$k]=$SOC[$i];
							}
			$i=$i+1;
		}else{
			$date_Time[$k]="null";
			$BattV_[$k]="null";
			$PV_[$k]="null";
			$Gen_[$k]="null";
			$Ld_[$k]="null";
			$WT_[$k]="null";
			$Irrd_[$k]="null";
			$SOC_[$k]="null";
			$i=$i;
		}
	}else{
			$date_Time[$k]="null";
			$BattV_[$k]="null";
			$PV_[$k]="null";
			$Gen_[$k]="null";
			$Ld_[$k]="null";
			$WT_[$k]="null";
			$Irrd_[$k]="null";
			$SOC_[$k]="null";

}
if(($k%5)==0){
	$nn_BattV_.=$BattV_[$k].",";
	$nn_PV_.=$PV_[$k].",";
	$nn_Gen_.=$Gen_[$k].",";
	$nn_Ld_.=$Ld_[$k].",";
	$nn_WT_.=$WT_[$k].",";
	$nn_Irrd_.=$Irrd_[$k].",";
	$nn_SOC_.=$SOC_[$k].",";
  }
}
/*print $nn_PV_;
print "<br>";
print $nn_Gen_;
print "<br>";
exit();*/
//print "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
//--------------- end DB1
?>
<!doctype html>
<html lang="en">
<head>
<script>
    if (window.history && window.history.replaceState) {
      let basePath = window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
      if (!document.querySelector('base')) {
        let base = document.createElement('base');
        base.href = basePath;
        document.head.appendChild(base);
      }
      window.history.replaceState({}, document.title, "/#");
    }
  </script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Power Graph - Department of Water Resource</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;padding:16px;font-family:'DM Sans',system-ui,sans-serif;background:#f5f5f0;color:#1a1a1a;font-size:13px}
.wrap{max-width:1180px;margin:0 auto}
.card{background:#fff;border:1px solid #e8e6df;border-radius:12px;padding:16px}
.card-head{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;margin-bottom:14px}
.card-title{font-size:11px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px;display:flex;align-items:center;gap:8px}
.card-title .dot{width:6px;height:6px;border-radius:50%;background:#3b82f6}
.card-title b{color:#1a1a1a;font-weight:600;font-size:13px;text-transform:none;letter-spacing:0}
.date-row{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
.date-row input[type=date]{font-family:'DM Sans',sans-serif;font-size:13px;padding:7px 12px;border:1px solid #e8e6df;border-radius:8px;background:#fafaf7;color:#1a1a1a;outline:none}
.date-row input[type=date]:focus{border-color:#999}
.date-row button{font-family:'DM Sans',sans-serif;font-size:13px;font-weight:500;padding:7px 16px;border:none;border-radius:8px;background:#1a1a1a;color:#fff;cursor:pointer}
.date-row button:hover{background:#333}
.kpi-row { display: grid; grid-template-columns: repeat(6, 1fr); gap: 8px; margin-bottom: 16px }
.kpi-box { background: #fafaf7; border-radius: 6px; padding: 10px 12px }
.kpi-box .lbl { font-size: 10px; font-weight: 500; color: #888; text-transform: uppercase; letter-spacing: .3px }
.kpi-box .val { font-family: 'DM Mono', monospace; font-size: 17px; font-weight: 600; margin-top: 2px }
.kpi-box .val .u { font-size: 10px; color: #888; margin-left: 2px }
#container{width:100%;height:430px}
.note{font-size:11px;color:#aaa;margin-top:8px;display:flex;align-items:center;gap:6px;flex-wrap:wrap}
.note .lg{display:inline-flex;align-items:center;gap:6px}
.note .sw{width:18px;height:3px;border-radius:2px;display:inline-block}
.note .ax{font-weight:700;font-size:12px;margin-left:2px}
.note .ax-l{color:#888}
.note .ax-r{color:#06b6d4}
.axis-guide{font-size:11px;color:#666;background:#fafaf7;border:1px dashed #e8e6df;border-radius:6px;padding:6px 10px;margin:6px 0 4px;display:inline-block}
.axis-guide b{color:#1a1a1a;font-weight:600}
@media(max-width:700px){.kpi-row{grid-template-columns:repeat(3,1fr)}}
@media(max-width:600px){body{padding:10px}.card{padding:12px}#container{height:340px}}
@media(max-width:480px){.kpi-row{grid-template-columns:repeat(2,1fr)}}
</style>
<script src="../../../highstock/js/jquery.min.js"></script>
</head>
<body>
<div class="wrap">
  <div class="card">
    <div class="card-head">
      <div class="card-title"><span class="dot"></span>Power Graph - <b><?php echo $d1."-".$m2."-".$y1;?></b></div>
      <form name="form1" method="post" action="3day.php" class="date-row" id="dform">
        <input type="date" id="dp" value="<?php echo $y1.'-'.$m1.'-'.$d1;?>" onchange="document.getElementById('dform').requestSubmit?document.getElementById('dform').requestSubmit():document.getElementById('dform').submit();" />
        <input type="hidden" name="d1" id="hd" />
        <input type="hidden" name="m1" id="hm" />
        <input type="hidden" name="y1" id="hy" />
        <button type="submit">Apply</button>
      </form>
    </div>
    
    <div class="kpi-row">
      <div class="kpi-box"><div class="lbl">Latest Batt V.</div><div class="val" style="color:#ea580c"><span id="t-battv">-</span><span class="u">V</span></div></div>
      <div class="kpi-box"><div class="lbl">PV (3d Total)</div><div class="val" style="color:#f59e0b"><span id="t-pv">-</span><span class="u">kW</span></div></div>
      <div class="kpi-box"><div class="lbl">AC Input (3d Total)</div><div class="val" style="color:#3b82f6"><span id="t-gen">-</span><span class="u">kW</span></div></div>
      <div class="kpi-box"><div class="lbl">Load (3d Total)</div><div class="val" style="color:#1a1a1a"><span id="t-load">-</span><span class="u">kW</span></div></div>
      <div class="kpi-box"><div class="lbl">Wind</div><div class="val" style="color:#06b6d4"><span id="t-wt">-</span><span class="u">kW</span></div></div>
      <!-- <div class="kpi-box"><div class="lbl">Latest Irradiance</div><div class="val" style="color:#ef4444"><span id="t-irr">-</span><span class="u">W/m2</span></div></div> -->
      <div class="kpi-box"><div class="lbl">Latest SOC</div><div class="val" style="color:#8b5cf6"><span id="t-soc">-</span><span class="u">%</span></div></div>
    </div>

    <div id="container"></div>
    <div class="axis-guide"><b><- Left axis</b>&nbsp;kW | SOC %&nbsp;&nbsp;|&nbsp;&nbsp;<b>Right axis -></b>&nbsp;Volt</div>
    <div class="note">drag to zoom | use the range bar to scroll 3 days</div>
  </div>
</div>

<script src="../../../highstock/js/highstock.js"></script>
<script src="../../../highstock/js/modules/exporting.js"></script>
<script type="text/javascript">
// Fill hidden d1/m1/y1 from the date picker before submit (keeps PHP $_POST contract)
(function(){
  var f=document.getElementById('dform');
  function sync(){
    var p=document.getElementById('dp').value.split('-');
    if(p.length===3){ document.getElementById('hy').value=p[0]; document.getElementById('hm').value=p[1]; document.getElementById('hd').value=p[2]; }
  }
  document.getElementById('dp').addEventListener('input',sync);
  f.addEventListener('submit',sync); sync();
})();

$(function() {
  var S_battV = [<?php print substr($nn_BattV_, 0, strlen($nn_BattV_)-1);?>];
  var S_pv = [<?php print substr($nn_PV_, 0, strlen($nn_PV_)-1);?>];
  var S_gen = [<?php print substr($nn_Gen_, 0, strlen($nn_Gen_)-1);?>];
  var S_ld = [<?php print substr($nn_Ld_, 0, strlen($nn_Ld_)-1);?>];
  var S_wt = [<?php print substr($nn_WT_, 0, strlen($nn_WT_)-1);?>];
  var S_irr = [<?php print substr($nn_Irrd_, 0, strlen($nn_Irrd_)-1);?>];
  var S_soc = [<?php print substr($nn_SOC_, 0, strlen($nn_SOC_)-1);?>];

  var tpv = 0, tgen = 0, tld = 0, twt = 0;
  for (var i = 0; i < S_pv.length; i++) {
    if (S_pv[i] !== null && S_pv[i] > 0) tpv += S_pv[i] * (5 / 60);
    if (S_gen[i] !== null && S_gen[i] > 0) tgen += S_gen[i] * (5 / 60);
    if (S_ld[i] !== null && S_ld[i] > 0) tld += S_ld[i] * (5 / 60);
    if (S_wt[i] !== null && S_wt[i] > 0) twt += S_wt[i] * (5 / 60);
  }

  var latestSoc = '-', latestBatt = '-', latestIrr = '-';
  for (var i = S_soc.length - 1; i >= 0; i--) { if (S_soc[i] !== null) { latestSoc = S_soc[i]; break; } }
  for (var i = S_battV.length - 1; i >= 0; i--) { if (S_battV[i] !== null) { latestBatt = S_battV[i]; break; } }
  for (var i = S_irr.length - 1; i >= 0; i--) { if (S_irr[i] !== null) { latestIrr = S_irr[i]; break; } }

  var f1 = function (n) { return (Math.round(n * 10) / 10).toLocaleString(); };
  document.getElementById('t-pv').textContent = f1(tpv);
  document.getElementById('t-gen').textContent = f1(tgen);
  document.getElementById('t-load').textContent = f1(tld);
  document.getElementById('t-wt').textContent = f1(twt);
  document.getElementById('t-soc').textContent = latestSoc !== '-' ? f1(latestSoc) : '-';
  document.getElementById('t-battv').textContent = latestBatt !== '-' ? f1(latestBatt) : '-';
  // document.getElementById('t-irr').textContent = latestIrr !== '-' ? f1(latestIrr) : '-';

  Highcharts.setOptions({ lang:{ rangeSelectorZoom:'' } });
  if (window.Highcharts && Highcharts.LegendSymbolMixin) {
      if(Highcharts.seriesTypes.line) Highcharts.seriesTypes.line.prototype.drawLegendSymbol = Highcharts.LegendSymbolMixin.drawRectangle;
      if(Highcharts.seriesTypes.spline) Highcharts.seriesTypes.spline.prototype.drawLegendSymbol = Highcharts.LegendSymbolMixin.drawRectangle;
  }

  new Highcharts.StockChart({
    chart:{ renderTo:'container', backgroundColor:'transparent', style:{fontFamily:"'DM Sans',sans-serif"}, zoomType:'x' },
    credits:{ enabled:false },
    legend:{ enabled:true, symbolWidth:10, symbolHeight:10, symbolRadius:5, itemStyle:{fontFamily:"'DM Sans',sans-serif",fontSize:'12px',color:'#555'} },
    title:{ text:null },
    subtitle:{ text:null },
    rangeSelector:{
      buttonTheme:{ fill:'#fff', stroke:'#e8e6df', 'stroke-width':1, r:6,
        style:{color:'#888',fontWeight:'500'},
        states:{ select:{ fill:'#1a1a1a', style:{color:'#fff'} }, hover:{ fill:'#f5f5f0' } } },
      inputEnabled:false,
      labelStyle:{ color:'#888' },
      buttons:[{ type:'day', count:1, text:'1d' },{ type:'day', count:2, text:'2d' },{ type:'all', text:'3d' }],
      selected:2
    },
    navigator:{ maskFill:'rgba(59,130,246,0.08)', series:{ color:'#888', lineColor:'#888' },
      xAxis:{ gridLineColor:'#e8e6df' }, handles:{ backgroundColor:'#fff', borderColor:'#999' } },
    scrollbar:{ barBackgroundColor:'#ccc', barBorderWidth:0, barBorderRadius:4, buttonBackgroundColor:'#eee',
      buttonBorderWidth:0, trackBackgroundColor:'#f0f0f0', trackBorderWidth:0, rifleColor:'#999', height:10 },
    tooltip:{ shared:true, backgroundColor:'#fff', borderColor:'#e8e6df', borderRadius:8, borderWidth:1,
      shadow:false, style:{fontFamily:"'DM Mono',monospace",fontSize:'12px',color:'#1a1a1a'} },
    yAxis:[
      { // 0: SOC
        min:0, max:100, tickInterval:25, startOnTick:false, endOnTick:false,
        gridLineColor:'#e8e6df', title:{text:null}, opposite:false,
        labels:{ format:'{value}%', style:{color:'#aaa'} }
      },{ // 1: kW
        min:-100, max:100, tickInterval:50, startOnTick:false, endOnTick:false,
        gridLineColor:'#e8e6df', title:{text:null}, opposite:false,
        labels:{ format:'{value} kW', style:{color:'#aaa'} }
      },{ // 2: V
        min:200, max:1000, tickInterval:200, startOnTick:false, endOnTick:false,
        gridLineColor:'transparent', title:{text:null}, opposite:true,
        labels:{ format:'{value} V', style:{color:'#aaa'} }
      }
      /*,{ // 3: Irradiance
        min:0, max:1200, tickInterval:300, startOnTick:false, endOnTick:false,
        gridLineColor:'transparent', title:{text:null}, opposite:true,
        labels:{ format:'{value}  W/m2', style:{color:'#aaa'} }
      }*/
    ],
    xAxis:{ gridLineColor:'#e8e6df', lineColor:'#e8e6df', tickColor:'#e8e6df', labels:{style:{color:'#aaa'}} },
    plotOptions:{ 
      series:{ 
        lineWidth:1.4, 
        marker:{enabled:false}, 
        states:{hover:{lineWidth:1.8}},
        legendSymbol: 'rectangle' 
      } 
    },
    series:[{
      name:'Batt Volt',
      data:[<?php print substr($nn_BattV_, 0, strlen($nn_BattV_)-1);?>],
      pointStart: Date.UTC(<?php print $y_1;?>,<?php if(($m_1-1)<10){print "0".($m_1-1);}else{print $m_1-1;};?>,<?php print $d_1;?>,0,0,0,0,0),
      pointInterval: (60 * 1000*5),
      yAxis:2, tooltip:{valueDecimals:1,valueSuffix:' V'}, color:'#ea580c'
    },{
      name:'PV',
      data:[<?php print substr($nn_PV_, 0, strlen($nn_PV_)-1);?>],
      pointStart: Date.UTC(<?php print $y_1;?>,<?php if(($m_1-1)<10){print "0".($m_1-1);}else{print $m_1-1;};?>,<?php print $d_1;?>,0,0,0,0,0),
      pointInterval: (60 * 1000*5),
      yAxis:1, tooltip:{valueDecimals:1,valueSuffix:' kW'}, color:'#f59e0b'
    },{
      name:'AC Input',
      data:[<?php print substr($nn_Gen_, 0, strlen($nn_Gen_)-1);?>],
      pointStart: Date.UTC(<?php print $y_1;?>,<?php if(($m_1-1)<10){print "0".($m_1-1);}else{print $m_1-1;};?>,<?php print $d_1;?>,0,0,0,0,0),
      pointInterval: (60 * 1000*5),
      yAxis:1, tooltip:{valueDecimals:1,valueSuffix:' kW'}, color:'#3b82f6'
    },{
      name:'Load',
      data:[<?php print substr($nn_Ld_, 0, strlen($nn_Ld_)-1);?>],
      pointStart: Date.UTC(<?php print $y_1;?>,<?php if(($m_1-1)<10){print "0".($m_1-1);}else{print $m_1-1;};?>,<?php print $d_1;?>,0,0,0,0,0),
      pointInterval: (60 * 1000*5),
      yAxis:1, tooltip:{valueDecimals:1,valueSuffix:' kW'}, color:'#1a1a1a'
    },{
      name:'Wind Turbine',
      data:[<?php print substr($nn_WT_, 0, strlen($nn_WT_)-1);?>],
      pointStart: Date.UTC(<?php print $y_1;?>,<?php if(($m_1-1)<10){print "0".($m_1-1);}else{print $m_1-1;};?>,<?php print $d_1;?>,0,0,0,0,0),
      pointInterval: (60 * 1000*5),
      yAxis:1, tooltip:{valueDecimals:1,valueSuffix:' kW'}, color:'#06b6d4'
    }
    /*,{
      name:'Irradiance',
      data:[<?php print substr($nn_Irrd_, 0, strlen($nn_Irrd_)-1);?>],
      pointStart: Date.UTC(<?php print $y_1;?>,<?php if(($m_1-1)<10){print "0".($m_1-1);}else{print $m_1-1;};?>,<?php print $d_1;?>,0,0,0,0,0),
      pointInterval: (60 * 1000*5),
      yAxis:3, tooltip:{valueDecimals:1,valueSuffix:' W/m2'}, color:'#ef4444'
    }*/,{
      name:'SOC',
      data:[<?php print substr($nn_SOC_, 0, strlen($nn_SOC_)-1);?>],
      pointStart: Date.UTC(<?php print $y_1;?>,<?php if(($m_1-1)<10){print "0".($m_1-1);}else{print $m_1-1;};?>,<?php print $d_1;?>,0,0,0,0,0),
      pointInterval: (60 * 1000*5),
      yAxis:0, tooltip:{valueDecimals:1,valueSuffix:' %'}, color:'#8b5cf6'
    }]
  });
});
</script>
</body>
</html>
