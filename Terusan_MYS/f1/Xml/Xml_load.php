<?php
date_default_timezone_set("Asia/Bangkok");
$date1=date('Y-m-d H:i:s');
$date2=date('Y-m');
$Y=date('Y');
$m=date('m');
$d=date('d');
$PV1=0;
$PV2=0;
$PV3=0;
$sum=0;
	$database = "terusan_mys"; 
	$connection=mysql_connect("localhost","root",""); 
	echo mysql_error();
	$selectdb=mysql_select_db($database) or 
	die("Database could not be selected");
	$strSQL1 = "SELECT DatetimeLocal,Load_PM_Total_P_kW FROM graph where  year(DatetimeLocal)= $Y and month(DatetimeLocal)= $m and day(DatetimeLocal)= $d  order by DatetimeLocal  DESC LIMIT 1 ";
	//print $strSQL1."<br>";
			$objQuery1 = mysql_query($strSQL1) or die("query error".mysql_error());
			while($objResult = mysql_fetch_array($objQuery1))
			{
				//$date_s[$i]=substr($objResult['DateTimeMeter'],0,10)
				$DateTimeServer=$objResult['DatetimeLocal'];
				$date_s=substr($objResult['DatetimeLocal'],0,10);
				$Year1=substr($objResult['DatetimeLocal'],0,4);
				$Month1=substr($objResult['DatetimeLocal'],5,2);	
				$day1=substr($objResult['DatetimeLocal'],8,2);
				$H1=substr($objResult['DatetimeLocal'],11,2);
				$M1=substr($objResult['DatetimeLocal'],14,2);
				$S1=substr($objResult['DatetimeLocal'],17,2);
				if(($objResult['Load_PM_Total_P_kW']==-0.999)||($objResult['Load_PM_Total_P_kW']==NULL)){$PV1=0;}else{$PV1=$objResult['Load_PM_Total_P_kW'];}
			}
			
//---------------------------------------------------
mysql_close($connection);
$xml = new SimpleXMLElement('<Plant/>');
    $track = $xml->addChild('DateTimeServer',$DateTimeServer);
    $track = $xml->addChild("Year1",$Year1);
	$track = $xml->addChild("Month1",$Month1);
	$track = $xml->addChild("day1",$day1);
	$track = $xml->addChild("H1",$H1);
	$track = $xml->addChild("M1",$M1);
	$track = $xml->addChild("S1",$S1);
	$track = $xml->addChild('PM1',number_format($PV1, 2, '.', ''));
Header('Content-type: text/xml');
echo($xml->asXML());

?>