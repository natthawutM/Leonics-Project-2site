<?php

date_default_timezone_set("Asia/Bangkok");

$Y=$_GET["y"];
$m=$_GET["m"];
$d=$_GET["d"];
/*$date1=date('Y-m-d H:i:s');
$date2=date('Y-m');
$Y=date('Y');
$m=date('m');
$d=date('d');*/
$BattV=0;
$PV=0;
$Gen=0;
$Load=0;
$Ctrl=0;
$irr=0;
$soc=0;

// Query DB1
	$database1 = "tetabuan_mys"; 
	$connection1=mysql_connect("localhost","root",""); 
	//echo mysql_error();
	$selectdb1=mysql_select_db($database1) or 
	die("Database1 could not be selected");
	mysql_query("SET NAMES utf8");
	
	$strSQL1 = "SELECT DatetimeLocal,PV_kW,Gen_kW,Load_PM_Total_P_kW,Ctrl_PM_Total_P_kW,Irradiance_W_m2 FROM graph where  year(DatetimeLocal)= $Y and month(DatetimeLocal)= $m and day(DatetimeLocal)= $d order by DatetimeLocal  DESC LIMIT 1 ";

	//print $strSQL1."<br>";
			$objQuery1 = mysql_query($strSQL1) or die("query error".mysql_error());
			while($objResult = mysql_fetch_array($objQuery1))
			{
				$DateTimeServer=$objResult['DatetimeLocal'];
				$date_s=substr($objResult['DatetimeLocal'],0,10);
				$Year1=substr($objResult['DatetimeLocal'],0,4);
				$Month1=substr($objResult['DatetimeLocal'],5,2);	
				$day1=substr($objResult['DatetimeLocal'],8,2);
				$H1=substr($objResult['DatetimeLocal'],11,2);
				$M1=substr($objResult['DatetimeLocal'],14,2);
				$S1=substr($objResult['DatetimeLocal'],17,2);
						        
				 if(($objResult['PV_kW']==-0.999)||($objResult['PV_kW']==NULL)){$PV=0;}else{$PV=$objResult['PV_kW'];}
    if(($objResult['Gen_kW']==-0.999)||($objResult['Gen_kW']==NULL)){$Gen=0;}else{$Gen=$objResult['Gen_kW'];}
    if(($objResult['Load_PM_Total_P_kW']==-0.999)||($objResult['Load_PM_Total_P_kW']==NULL)){$Load=0;}else{$Load=$objResult['Load_PM_Total_P_kW'];}
    if(($objResult['Ctrl_PM_Total_P_kW']==-0.999)||($objResult['Ctrl_PM_Total_P_kW']==NULL)){$Ctrl=0;}else{$Ctrl=$objResult['Ctrl_PM_Total_P_kW'];}
    if(($objResult['Irradiance_W_m2']==-0.999)||($objResult['Irradiance_W_m2']==NULL)){$irr=0;}else{$irr=$objResult['Irradiance_W_m2'];}
}
mysql_close($connection1);

// Query DB2
	$database2 = "tetabuanbattery_mys"; 
	$connection2=mysql_connect("localhost","root",""); 
	//echo mysql_error();
	$selectdb2=mysql_select_db($database2) or 
	die("Database2 could not be selected");
	mysql_query("SET NAMES utf8");
	
	$strSQL2 = "SELECT DatetimeLocal,Batt_Avg_Voltage,Batt_Avg_SOC FROM graph where  year(DatetimeLocal)= $Y and month(DatetimeLocal)= $m and day(DatetimeLocal)= $d order by DatetimeLocal  DESC LIMIT 1 ";
	
	//print $strSQL2."<br>";
			$objQuery2 = mysql_query($strSQL2) or die("query error".mysql_error());
			while($objResult_V = mysql_fetch_array($objQuery2))
			{
				$DateTimeServer_V=$objResult_V['DatetimeLocal'];
				$date_s_V=substr($objResult_V['DatetimeLocal'],0,10);
				$Year1_V=substr($objResult_V['DatetimeLocal'],0,4);
				$Month1_V=substr($objResult_V['DatetimeLocal'],5,2);	
				$day1_V=substr($objResult_V['DatetimeLocal'],8,2);
				$H1_V=substr($objResult_V['DatetimeLocal'],11,2);
				$M1_V=substr($objResult_V['DatetimeLocal'],14,2);
				$S1_V=substr($objResult_V['DatetimeLocal'],17,2);
				
				if(($objResult_V['Batt_Avg_Voltage']==-0.999)||($objResult_V['Batt_Avg_Voltage']==NULL)){$BattV=0;}else{$BattV=$objResult_V['Batt_Avg_Voltage'];}
	            if(($objResult_V['Batt_Avg_SOC']==-0.999)||($objResult_V['Batt_Avg_SOC']==NULL)){$soc=0;}else{$soc=$objResult_V['Batt_Avg_SOC'];}
				}
mysql_close($connection2);
//---------------------------------------------------

	$xml = new SimpleXMLElement('<Plant/>');
    $track = $xml->addChild('DatetimeLocal',$DateTimeServer);
    $track = $xml->addChild("Year1",$Year1);
	$track = $xml->addChild("Month1",$Month1);
	$track = $xml->addChild("day1",$day1);
	$track = $xml->addChild("H1",$H1);
	$track = $xml->addChild("M1",$M1);
	$track = $xml->addChild("S1",$S1);
	$track = $xml->addChild('PM1',number_format($PV, 2, '.', ''));
	$track = $xml->addChild('PM2',number_format($Gen, 2, '.', ''));
	$track = $xml->addChild('PM3',number_format($Load, 2, '.', ''));
	$track = $xml->addChild('PM4',number_format($Ctrl, 2, '.', ''));
	$track = $xml->addChild('PM5',number_format($irr, 2, '.', ''));
	$track = $xml->addChild('PM6',number_format($BattV, 2, '.', ''));
	$track = $xml->addChild('PM7',number_format($soc, 2, '.', ''));
	
Header('Content-type: text/xml');
echo($xml->asXML());

?>
