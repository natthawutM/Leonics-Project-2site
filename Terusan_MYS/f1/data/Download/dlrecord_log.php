<?php
ob_start();
$yy=$_GET['y'];
$mm=$_GET['m'];

	
// Header
$data1=array('DatetimeServer,PV_kWh,Gen_kWh,Load_kWh,From_Batt_kWh,To_Batt_kWh,Ein_kWh,Euse_kWh,Yr,YA,Yf,PR,BDI1_Supply_AC_kWh,BDI1_AC_Charge_kWh,BDI1_Charge_DC_kWh,BDI1_DisChg_DC_kWh,BDI1_Ext_DC_kWh,BDI1_Ext_DC2Load_kWh,BDI2_Supply_AC_kWh,BDI2_AC_Charge_kWh,BDI2_Charge_DC_kWh,BDI2_DisChg_DC_kWh,BDI2_Ext_DC_kWh,BDI2_Ext_DC2Load_kWh,Max_Load_PM_kW,Max_Ctrl_PM_kW,BDI1_Batt_Chg_kWh,BDI1_Batt_DisChg_kWh,BDI2_Batt_Chg_kWh,BDI2_Batt_DisChg_kWh,SCC1_Chg_kWh,SCC1_PV_kWh,SCC2_Chg_kWh,SCC2_PV_kWh,GCI1_AC_kWh,GCI1_PV_kWh,GCI2_AC_kWh,GCI2_PV_kWh,Load_PM_Import_kWh,Load_PM_Export_kWh,Ctrl_PM_Import_kWh,Ctrl_PM_Export_kWh,DatetimeScu,Gen1_Today_kWh,Gen1_Today_Run_hour_h,Gen2_Today_kWh,Gen2_Today_Run_hour_h,Irrt_kWh_m2');
//------------end Header
$hostdb = 'localhost';   // MySQl host
$userdb = 'root';    // MySQL username
$passdb = '';    // MySQL password
$namedb = 'terusan_mys'; // MySQL database name
$link = mysql_connect ($hostdb, $userdb, $passdb);
mysql_select_db($namedb);//smu4
//----------------------------------------------------------------
if (!$link) {
        die('Could not connect: ' . mysql_error());		
    }
	$qry = "SELECT DatetimeLocal,PV_kWh,Gen_kWh,Load_kWh,From_Batt_kWh,To_Batt_kWh,Ein_kWh,Euse_kWh,Yr,YA,Yf,PR,BDI1_Supply_AC_kWh,BDI1_AC_Charge_kWh,BDI1_Charge_DC_kWh,BDI1_DisChg_DC_kWh,BDI1_Ext_DC_kWh,BDI1_Ext_DC2Load_kWh,BDI2_Supply_AC_kWh,BDI2_AC_Charge_kWh,BDI2_Charge_DC_kWh,BDI2_DisChg_DC_kWh,BDI2_Ext_DC_kWh,BDI2_Ext_DC2Load_kWh,Max_Load_PM_kW,Max_Ctrl_PM_kW,BDI1_Batt_Chg_kWh,BDI1_Batt_DisChg_kWh,BDI2_Batt_Chg_kWh,BDI2_Batt_DisChg_kWh,SCC1_Chg_kWh,SCC1_PV_kWh,SCC2_Chg_kWh,SCC2_PV_kWh,GCI1_AC_kWh,GCI1_PV_kWh,GCI2_AC_kWh,GCI2_PV_kWh,Load_PM_Import_kWh,Load_PM_Export_kWh,Ctrl_PM_Import_kWh,Ctrl_PM_Export_kWh,DatetimeScu,Gen1_Today_kWh,Gen1_Today_Run_hour_h,Gen2_Today_kWh,Gen2_Today_Run_hour_h,Irrt_kWh_m2 FROM energylog where year(DatetimeLocal)=$yy and month(DatetimeLocal)=$mm  order by DatetimeLocal ASC ";
//print $qry."<br>";
//exit();
    $objQuery1 = mysql_query($qry) or die("query error".mysql_error());


//	while($objResult = mysql_fetch_array($objQuery1))
	$num_rows = mysql_num_rows($objQuery1);	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery1)) {
		 $data[$i]= $objResult['DatetimeLocal'].",".
$objResult['PV_kWh'].",".
$objResult['Gen_kWh'].",".
$objResult['Load_kWh'].",".
$objResult['From_Batt_kWh'].",".
$objResult['To_Batt_kWh'].",".
$objResult['Ein_kWh'].",".
$objResult['Euse_kWh'].",".
$objResult['Yr'].",".
$objResult['YA'].",".
$objResult['Yf'].",".
$objResult['PR'].",".
$objResult['BDI1_Supply_AC_kWh'].",".
$objResult['BDI1_AC_Charge_kWh'].",".
$objResult['BDI1_Charge_DC_kWh'].",".
$objResult['BDI1_DisChg_DC_kWh'].",".
$objResult['BDI1_Ext_DC_kWh'].",".
$objResult['BDI1_Ext_DC2Load_kWh'].",".
$objResult['BDI2_Supply_AC_kWh'].",".
$objResult['BDI2_AC_Charge_kWh'].",".
$objResult['BDI2_Charge_DC_kWh'].",".
$objResult['BDI2_DisChg_DC_kWh'].",".
$objResult['BDI2_Ext_DC_kWh'].",".
$objResult['BDI2_Ext_DC2Load_kWh'].",".
$objResult['Max_Load_PM_kW'].",".
$objResult['Max_Ctrl_PM_kW'].",".
$objResult['BDI1_Batt_Chg_kWh'].",".
$objResult['BDI1_Batt_DisChg_kWh'].",".
$objResult['BDI2_Batt_Chg_kWh'].",".
$objResult['BDI2_Batt_DisChg_kWh'].",".
$objResult['SCC1_Chg_kWh'].",".
$objResult['SCC1_PV_kWh'].",".
$objResult['SCC2_Chg_kWh'].",".
$objResult['SCC2_PV_kWh'].",".
$objResult['GCI1_AC_kWh'].",".
$objResult['GCI1_PV_kWh'].",".
$objResult['GCI2_AC_kWh'].",".
$objResult['GCI2_PV_kWh'].",".
$objResult['Load_PM_Import_kWh'].",".
$objResult['Load_PM_Export_kWh'].",".
$objResult['Ctrl_PM_Import_kWh'].",".
$objResult['Ctrl_PM_Export_kWh'].",".
$objResult['DatetimeScu'].",".
$objResult['Gen1_Today_kWh'].",".
$objResult['Gen1_Today_Run_hour_h'].",".
$objResult['Gen2_Today_kWh'].",".
$objResult['Gen2_Today_Run_hour_h'].",".
$objResult['Irrt_kWh_m2'];

 $i++;
	
	}
	
	 mysql_close($link);	
$Zip_filename="energylog_".$yy.$mm.$dd.".zip";
$csv_filename="energylog_".$yy.$mm.$dd.".csv";
array_splice( $data1, 1, 0, $data );
//print_r($data1);
//exit();
//$data=array($data1);
    $fp = fopen($csv_filename, 'w');
    foreach($data1 as $line){
             $val = explode(",",$line);
             fputcsv($fp, $val);
    }
	
header('Content-disposition: attachment; filename='.$Zip_filename);
header('Content-type: text/csv');
 include("zip.lib.php");
     if (file_exists("c:/wamp/www/Terusan_MYS/f1/data/Download/".$Zip_filename))
    unlink("c:/wamp/www/Terusan_MYS/f1/data/Download/".$Zip_filename);
    $ziper = new zipfile(); 
    $ziper->addFiles(array($csv_filename));  //array of files 
    $ziper->output($Zip_filename); 
    readfile($Zip_filename);
	exit();
?>


