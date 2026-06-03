<?php
ob_start();
$yy=$_GET['y'];
$mm=$_GET['m'];

	
// Header
$data1=array('DatetimeServer,PV_kWh,ACin_kWh,Load_kWh,LoadPM_Import_kWh,WindPM_Import_kWh,BDI_Supply_AC_kWh,BDI_AC_Charge_kWh,BDI_Chg_DC_kWh,BDI_DisChg_DC_kWh,BDI_Ext_DC_kWh,BDI_Ext_DC2Load_kWh,BDI_AC_Feed2Grid_kWh,Max_Load_kW,Max_LoadPM_kW,Max_WindPM_kW,Batt_Chg_kWh,Batt_DisChg_kWh,SCC_Chg_kWh,SCC_PV_kWh,GCI1_AC_kWh,GCI1_PV_kWh,GCI2_AC_kWh,GCI2_PV_kWh,HVB1_Today_DisChg_kWh,HVB1_Today_Chg_kWh,HVB2_Today_DisChg_kWh,HVB2_Today_Chg_kWh,Today_Max_Batt_V,Today_Max_Batt_SOC,Today_CO2_emission_kgCO2e,Todate_CO2_emission_TonCO2e,Today_max_ana2,Irradiation_kWh_m2');
//------------end Header
$hostdb = 'localhost';   // MySQl host
$userdb = 'root';    // MySQL username
$passdb = '';    // MySQL password
$namedb = 'dwr_rbr'; // MySQL database name
$link = mysql_connect ($hostdb, $userdb, $passdb);
mysql_select_db($namedb);//smu4
//----------------------------------------------------------------
if (!$link) {
        die('Could not connect: ' . mysql_error());		
    }
	$qry = "SELECT DatetimeLocal,PV_kWh,ACin_kWh,Load_kWh,LoadPM_Import_kWh,WindPM_Import_kWh,BDI_Supply_AC_kWh,BDI_AC_Charge_kWh,BDI_Chg_DC_kWh,BDI_DisChg_DC_kWh,BDI_Ext_DC_kWh,BDI_Ext_DC2Load_kWh,BDI_AC_Feed2Grid_kWh,Max_Load_kW,Max_LoadPM_kW,Max_WindPM_kW,Batt_Chg_kWh,Batt_DisChg_kWh,SCC_Chg_kWh,SCC_PV_kWh,GCI1_AC_kWh,GCI1_PV_kWh,GCI2_AC_kWh,GCI2_PV_kWh,HVB1_Today_DisChg_kWh,HVB1_Today_Chg_kWh,HVB2_Today_DisChg_kWh,HVB2_Today_Chg_kWh,Today_Max_Batt_V,Today_Max_Batt_SOC,Today_CO2_emission_kgCO2e,Todate_CO2_emission_TonCO2e,Today_max_ana2,Irrt_kWh_m2 FROM energylog where year(DatetimeLocal)=$yy and month(DatetimeLocal)=$mm  order by DatetimeLocal ASC ";
//print $qry."<br>";
//exit();
        $objQuery1 = mysql_query($qry) or die("query error".mysql_error());


//	while($objResult = mysql_fetch_array($objQuery1))
	$num_rows = mysql_num_rows($objQuery1);	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery1)) {
		 $data[$i]= $objResult['DatetimeLocal'].",".
$objResult['PV_kWh'].",".
$objResult['ACin_kWh'].",".
$objResult['Load_kWh'].",".
$objResult['LoadPM_Import_kWh'].",".
$objResult['WindPM_Import_kWh'].",".
$objResult['BDI_Supply_AC_kWh'].",".
$objResult['BDI_AC_Charge_kWh'].",".
$objResult['BDI_Chg_DC_kWh'].",".
$objResult['BDI_DisChg_DC_kWh'].",".
$objResult['BDI_Ext_DC_kWh'].",".
$objResult['BDI_Ext_DC2Load_kWh'].",".
$objResult['BDI_AC_Feed2Grid_kWh'].",".
$objResult['Max_Load_kW'].",".
$objResult['Max_LoadPM_kW'].",".
$objResult['Max_WindPM_kW'].",".
$objResult['Batt_Chg_kWh'].",".
$objResult['Batt_DisChg_kWh'].",".
$objResult['SCC_Chg_kWh'].",".
$objResult['SCC_PV_kWh'].",".
$objResult['GCI1_AC_kWh'].",".
$objResult['GCI1_PV_kWh'].",".
$objResult['GCI2_AC_kWh'].",".
$objResult['GCI2_PV_kWh'].",".
$objResult['HVB1_Today_DisChg_kWh'].",".
$objResult['HVB1_Today_Chg_kWh'].",".
$objResult['HVB2_Today_DisChg_kWh'].",".
$objResult['HVB2_Today_Chg_kWh'].",".
$objResult['Today_Max_Batt_V'].",".
$objResult['Today_Max_Batt_SOC'].",".
$objResult['Today_CO2_emission_kgCO2e'].",".
$objResult['Todate_CO2_emission_TonCO2e'].",".
$objResult['Today_max_ana2'].",".
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
    $fp = fopen($csv_filename,'w');
    foreach($data1 as $line){
             $val = explode(",",$line);
             fputcsv($fp, $val);
    }
	
header('Content-disposition: attachment; filename='.$Zip_filename);
header('Content-type: text/csv');
 include("zip.lib.php");
     if (file_exists("c:/wamp/www/Department_of_Water_Resource/f1/data/Download/".$Zip_filename))
    unlink("c:/wamp/www/Department_of_Water_Resource/f1/data/Download/".$Zip_filename);
    $ziper = new zipfile(); 
    $ziper->addFiles(array($csv_filename));  //array of files 
    $ziper->output($Zip_filename); 
    readfile($Zip_filename);
	exit();
?>


