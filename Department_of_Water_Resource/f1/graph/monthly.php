<?php
	$name="";
	$Genn="";
	$Loadn="";
	$PVn="";
	$WTn="";
	$Outn="";
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
		if((($y_1 % 4) == 0) && ((($y_1 % 100) != 0) || (($y_1 % 400) == 0))){
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
mysql_select_db ("dwr_rbr")or die ("can not connect to your database");

	$strSQL = "SELECT DatetimeLocal,PV_kWh,ACin_kWh,LoadPM_Import_kWh,WindPM_Import_kWh,BDI_AC_Feed2Grid_kWh,Irrt_kWh_m2 FROM energylog where year(DatetimeLocal)='$y_1' and month(DatetimeLocal)='$m_1'  order by DatetimeLocal asc";
			$objQuery = mysql_query($strSQL) or die("query error".mysql_error());
			//print $strSQL;
			$i=0;
			$num_row=mysql_num_rows($objQuery);
			while($objResult = mysql_fetch_array($objQuery))
			{
				$dateTimeServer[$i]=$objResult['DatetimeLocal'];
				$dateH_[$i]=substr($objResult['DatetimeLocal'],0,10);
				$PV[$i]=$objResult['PV_kWh'];
				$Gen[$i]=$objResult['ACin_kWh'];
				$Load[$i]=$objResult['LoadPM_Import_kWh'];
				$WT[$i]=$objResult['WindPM_Import_kWh'];
				$Out[$i]=$objResult['BDI_AC_Feed2Grid_kWh'];
				$Irr[$i]=$objResult['Irrt_kWh_m2'];
				//print $PV[$i]."<br>";
				$i++;
		}
for($i=1;$i<=$n_d;$i++){
	$name1[$i]=$i;
	$PV1[$i]=0;
	$Gen1[$i]=0;
	$Load1[$i]=0;
	$WT1[$i]=0;
	$Out1[$i]=0;
	$Irr1[$i]=0;
	if ($i<10){
		$date_n=$y_1."-".$m_1."-0".$i;
	}else{
		$date_n=$y_1."-".$m_1."-".$i;
	}
	for($k=0;$k<$num_row;$k++){
		//print $date_n."==".$dateH_[$k]."<br>";
		if($date_n==$dateH_[$k]){
			$PV1[$i]=$PV1[$i]+$PV[$k];
			$Gen1[$i]=$Gen1[$i]+$Gen[$k];
			$Load1[$i]=$Load1[$i]+$Load[$k];
			$WT1[$i]=$WT1[$i]+$WT[$k];
			$Out1[$i]=$Out1[$i]+$Out[$k];
			$Irr1[$i]=$Irr1[$i]+$Irr[$k];
		}else{
			$PV1[$i]=$PV1[$i];
			$Gen1[$i]=$Gen1[$i];
			$Load1[$i]=$Load1[$i];
			$WT1[$i]=$WT1[$i];
			$Out1[$i]=$Out1[$i];
			$Irr1[$i]=$Irr1[$i];
		}
	}
	$name.=$name1[$i].",";
	$PVn.=$PV1[$i].",";
	$Genn.=$Gen1[$i].",";
	$Loadn.=$Load1[$i].",";
	$WTn.=$WT1[$i].",";
	$Outn.=$Out1[$i].",";
	$Irrn.=$Irr1[$i].",";

}
/*print $PVn."<br>";
print $Genn."<br>";
print $Loadn."<br>";
print $WTn."<br>";
print $Outn."<br>";
print $Irrn."<br>";*/
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
<title>Monthly Energy - Department of Water Resource</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
body{margin:0;padding:16px;font-family:'DM Sans',system-ui,sans-serif;background:#f5f5f0;color:#1a1a1a;font-size:13px}
.wrap{max-width:1180px;margin:0 auto}
.card{background:#fff;border:1px solid #e8e6df;border-radius:12px;padding:16px}
.card-head{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;margin-bottom:14px}
.card-title{font-size:11px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px;display:flex;align-items:center;gap:8px}
.card-title .dot{width:6px;height:6px;border-radius:50%;background:#f59e0b}
.card-title b{color:#1a1a1a;font-weight:600;font-size:13px;text-transform:none;letter-spacing:0}
.date-row{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
.date-row select{font-family:'DM Sans',sans-serif;font-size:13px;padding:7px 12px;border:1px solid #e8e6df;border-radius:8px;background:#fafaf7;color:#1a1a1a;outline:none}
.date-row select:focus{border-color:#999}
.date-row button{font-family:'DM Sans',sans-serif;font-size:13px;font-weight:500;padding:7px 16px;border:none;border-radius:8px;background:#1a1a1a;color:#fff;cursor:pointer}
.date-row button:hover{background:#333}
.kpi-row{display:grid;grid-template-columns:repeat(6,1fr);gap:8px;margin-bottom:16px}
.kpi-box{background:#fafaf7;border-radius:6px;padding:10px 12px}
.kpi-box .lbl{font-size:10px;font-weight:500;color:#888;text-transform:uppercase;letter-spacing:.3px}
.kpi-box .val{font-family:'DM Mono',monospace;font-size:17px;font-weight:600;margin-top:2px}
.kpi-box .val .u{font-size:10px;color:#888;margin-left:2px}
#container{width:100%;height:340px}
@media(max-width:700px){.kpi-row{grid-template-columns:repeat(3,1fr)}body{padding:10px}.card{padding:12px}#container{height:300px}}
</style>
</head>
<body>
<div class="wrap">
  <div class="card">
    <div class="card-head">
      <div class="card-title"><span class="dot"></span>Monthly Energy Report - <b><?php echo $date_name;?></b></div>
      <form id="form1" name="form1" method="POST" action="monthly.php" class="date-row">
        <select name="m" id="m">
          <option value="<?php print $m_1; ?>"><?php print $m_2; ?></option>
          <option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option>
          <option value="04">Apr</option><option value="05">May</option><option value="06">Jun</option>
          <option value="07">Jul</option><option value="08">Aug</option><option value="09">Sep</option>
          <option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
        </select>
        <select name="y" id="y">
          <option value="<?php print $y_1; ?>"><?php print $y_1; ?></option>
          <?php for($i=2026;$i<=$y_1;$i++){?><option value="<?php print $i;?>"><?php print $i;?></option><?php }?>
        </select>
        <button type="submit" name="button" id="button">Apply</button>
      </form>
    </div>

    <div class="kpi-row">
      <div class="kpi-box"><div class="lbl">PV</div><div class="val" style="color:#f59e0b"><span id="t-pv">-</span><span class="u">kWh</span></div></div>
      <div class="kpi-box"><div class="lbl">AC Input</div><div class="val" style="color:#3b82f6"><span id="t-gen">-</span><span class="u">kWh</span></div></div>
      <div class="kpi-box"><div class="lbl">Load</div><div class="val" style="color:#1a1a1a"><span id="t-load">-</span><span class="u">kWh</span></div></div>
      <div class="kpi-box"><div class="lbl">Wind</div><div class="val" style="color:#06b6d4"><span id="t-wt">-</span><span class="u">kWh</span></div></div>
      <div class="kpi-box"><div class="lbl">AC to Grid</div><div class="val" style="color:#22c55e"><span id="t-out">-</span><span class="u">kWh</span></div></div>
      <div class="kpi-box"><div class="lbl">Renewable %</div><div class="val" style="color:#22c55e"><span id="t-ratio">-</span><span class="u">%</span></div></div>
    </div>

    <div id="container"></div>
  </div>
</div>

<script src="../../../../highchart/js/jquery-3.1.1.min.js"></script>
<script src="../../../../highchart/code/highcharts.js"></script>
<script src="../../../../highchart/code/modules/exporting.js"></script>

<script type="text/javascript">
var _pv=[<?php print substr($PVn, 0, strlen($PVn)-1);?>];
var _gen=[<?php print substr($Genn, 0, strlen($Genn)-1);?>];
var _load=[<?php print substr($Loadn, 0, strlen($Loadn)-1);?>];
var _wt=[<?php print substr($WTn, 0, strlen($WTn)-1);?>];
var _out=[<?php print substr($Outn, 0, strlen($Outn)-1);?>];
var _irr=[<?php print substr($Irrn, 0, strlen($Irrn)-1);?>];
var _cat=[<?php print substr($name, 0, strlen($name)-1);?>];

(function(){
  var sum=function(a){var s=0;for(var i=0;i<a.length;i++){var v=parseFloat(a[i]);if(!isNaN(v))s+=v;}return s;};
  var tpv=sum(_pv),tgen=sum(_gen),tld=sum(_load),twt=sum(_wt),tout=sum(_out);
  var f1=function(n){return (Math.round(n*10)/10).toLocaleString();};
  document.getElementById('t-pv').textContent=f1(tpv);
  document.getElementById('t-gen').textContent=f1(tgen);
  document.getElementById('t-load').textContent=f1(tld);
  document.getElementById('t-wt').textContent=f1(twt);
  document.getElementById('t-out').textContent=f1(tout);
  var renew=tpv+twt, supply=renew+tgen;
  document.getElementById('t-ratio').textContent= supply>0.1 ? Math.round(renew/supply*100) : 0;
})();

$(document).ready(function() {
  Highcharts.chart('container', {
    chart:{ backgroundColor:'transparent', style:{fontFamily:"'DM Sans',sans-serif"}, zoomType:'xy' },
    credits:{ enabled:false },
    title:{ text:null },
    xAxis:{ categories:_cat, title:{text:'Day',style:{color:'#888'}},
      gridLineColor:'#e8e6df', lineColor:'#e8e6df', tickColor:'#e8e6df', labels:{style:{color:'#aaa'}} },
    yAxis:[
      { min:0, startOnTick:true, endOnTick:false, gridLineColor:'#e8e6df',
        title:{text:'kWh',style:{color:'#888'}}, labels:{style:{color:'#aaa'}} }
      /*,{ min:0, max:8, tickInterval:2, startOnTick:false, endOnTick:false, opposite:true,
        gridLineColor:'transparent', title:{text:'kWh/m2',style:{color:'#888'}}, labels:{style:{color:'#aaa'}} }*/
    ],
    legend:{ layout:'horizontal', align:'center', itemStyle:{fontFamily:"'DM Sans',sans-serif",fontSize:'12px',color:'#555'} },
    tooltip:{ shared:true, backgroundColor:'#fff', borderColor:'#e8e6df', borderRadius:8, borderWidth:1,
      shadow:false, style:{fontFamily:"'DM Mono',monospace",fontSize:'12px',color:'#1a1a1a'} },
    plotOptions:{ column:{ pointPadding:0.04, borderWidth:0, borderRadius:3 } },
    series:[
      { type:'column', color:'#f59e0b', name:'PV (kWh)',          data:_pv },
      { type:'column', color:'#3b82f6', name:'AC Input (kWh)',     data:_gen },
      { type:'column', color:'#1a1a1a', name:'Load (kWh)',         data:_load },
      { type:'column', color:'#06b6d4', name:'Wind (kWh)',         data:_wt },
      { type:'column', color:'#22c55e', name:'AC to Grid (kWh)',   data:_out }
      //,{ type:'spline', color:'#ea580c', yAxis:1, name:'Irradiation (kWh/m2)', data:_irr, lineWidth:1.6, dashStyle:'Dot', marker:{enabled:false} }
    ]
  });
});
</script>
</body>
</html>
