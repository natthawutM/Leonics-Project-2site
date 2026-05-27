<?php
ob_start();
$yy=$_GET['y'];
$mm=$_GET['m'];
$dd=$_GET['d'];
$N_date=$_GET["y"]."-".$_GET["m"]."-".$_GET["d"];
//$N_date=$yy."-".$mm;
//print $N_date."<br>";
$N_month=$yy."-".$mm;
$date1_=$N_date;
if($N_month!=date('Y-m')){
	$now_T1  =  new DateTime($N_date);	
	$clone_T1 = clone $now_T1;  
	$clone_T1->modify( '+1 month' );
	$dateT1_=$clone_T1->format( 'Ym' );
	$date_name1= $dateT1_;
	$N_month=$dateT1_;
}else{
	$N_month=$yy."-".$mm;
}
// Header----
$data1=array('DatetimeServer,BDI1_BDI_percent_Load_L1,BDI1_BDI_percent_Load_L2,BDI1_BDI_percent_Load_L3,BDI1_BDI_Voltage_L1,BDI1_BDI_Voltage_L2,BDI1_BDI_Voltage_L3,BDI1_BDI_Current_I1,BDI1_BDI_Current_I2,BDI1_BDI_Current_I3,BDI1_BDI_Power_P1_kW,BDI1_BDI_Power_P2_kW,BDI1_BDI_Power_P3_kW,BDI1_BDI_Freq,BDI1_BDI_PF,BDI1_BDI_Heat_Sink_Temp,BDI1_BDI_Batt_Voltage,BDI1_BDI_DC_Current,BDI1_BDI_Ext_DC_Current,BDI1_BDI_Battery_Current,BDI1_BDI_DC_Power_kW,BDI1_BDI_Ext_DC_kW,BDI1_BDI_Batt_kW,BDI1_BDI_SOC,BDI2_BDI_percent_Load_L1,BDI2_BDI_percent_Load_L2,BDI2_BDI_percent_Load_L3,BDI2_BDI_Voltage_L1,BDI2_BDI_Voltage_L2,BDI2_BDI_Voltage_L3,BDI2_BDI_Current_I1,BDI2_BDI_Current_I2,BDI2_BDI_Current_I3,BDI2_BDI_Power_P1_kW,BDI2_BDI_Power_P2_kW,BDI2_BDI_Power_P3_kW,BDI2_BDI_Freq,BDI2_BDI_PF,BDI2_BDI_Heat_Sink_Temp,BDI2_BDI_Batt_Voltage,BDI2_BDI_DC_Current,BDI2_BDI_Ext_DC_Current,BDI2_BDI_Battery_Current,BDI2_BDI_DC_Power_kW,BDI2_BDI_Ext_DC_kW,BDI2_BDI_Batt_kW,BDI2_BDI_SOC,SCC1_PV_Voltage,SCC1_PV_Current,SCC1_PV_Power_kW,SCC1_Chg_Voltage,SCC1_Chg_Current,SCC1_Chg_Power_kW,SCC1_Heat_Sink_Temp,SCC1_Batt_Temp,SCC2_PV_Current,SCC2_PV_Power_kW,SCC2_Chg_Voltage,SCC2_Chg_Current,SCC2_Chg_Power_kW,SCC2_Heat_Sink_Temp,SCC2_Batt_Temp,Load_PM_Voltage_L2,Load_PM_Voltage_L3,Load_PM_Current_I1,Load_PM_Current_I2,Load_PM_Current_I3,Load_PM_Power_P1_kW,Load_PM_Power_P2_kW,Load_PM_Power_P3_kW,Load_PM_Freq,Load_PM_PF,Ctrl_PM_Voltage_L1,Ctrl_PM_Voltage_L2,Ctrl_PM_Voltage_L3,Ctrl_PM_Current_I1,Ctrl_PM_Current_I2,Ctrl_PM_Current_I3,Ctrl_PM_Power_P1_kW,Ctrl_PM_Power_P2_kW,Ctrl_PM_Power_P3_kW,Ctrl_PM_Freq,Ctrl_PM_PF,GCI1_PV1_Voltage,GCI1_PV2_Voltage,GCI1_PV3_Voltage,GCI1_PV1_Current,GCI1_PV2_Current,GCI1_PV3_Current,GCI1_PV1_Power_kW,GCI1_PV2_Power_kW,GCI1_PV3_Power_kW,GCI1_AC_Voltage_L1,GCI1_AC_Voltage_L2,GCI1_AC_Voltage_L3,GCI1_Freq_L1_Hz,GCI1_Freq_L2_Hz,GCI1_Freq_L3_Hz,GCI1_AC_Current_I1,GCI1_AC_Current_I2,GCI1_AC_Current_I3,GCI1_AC_Power_kW,GCI1_Heat_Sink_Temp,GCI2_PV1_Voltage,GCI2_PV2_Voltage,GCI2_PV3_Voltage,GCI2_PV1_Current,GCI2_PV2_Current,GCI2_PV3_Current,GCI2_PV1_Power_kW,GCI2_PV2_Power_kW,GCI2_PV3_Power_kW,GCI2_AC_Voltage_L1,GCI2_AC_Voltage_L2,GCI2_AC_Voltage_L3,GCI2_Freq_L1_Hz,GCI2_Freq_L2_Hz,GCI2_Freq_L3_Hz,GCI2_AC_Current_I1,GCI2_AC_Current_I2,GCI2_AC_Current_I3,GCI2_AC_Power_kW,GCI2_Heat_Sink_Temp,Gen1_Total_Power_kW,Gen1_I1,Gen1_I2,Gen1_I3,Gen1_V1n,Gen1_V2n,Gen1_V3n,Gen1_Power_factor,Gen2_Total_Power_kW,Gen2_I1,Gen2_I2,Gen2_I3,Gen2_V1n,Gen2_V2n,Gen2_V3n,Gen2_Power_factor,Tmod,Tamb,RH,Irradiance_W_m2,Irradiation_kWh_m2');
//------------end Header
$hostdb = 'localhost';   // MySQl host
$userdb = 'root';    // MySQL username
$passdb = '';    // MySQL password
$namedb = 'terusan_mys'; // MySQL database name
$link = mysql_connect ($hostdb, $userdb, $passdb);
mysql_select_db($namedb);//smu4
$name_Table="download";//download_20250206_092431
//----------------------------------------------------------------
if (!$link) {
        die('Could not connect: ' . mysql_error());		
    }

    $db_selected = mysql_select_db($namedb);
//------------------------------------------ ตรวจสอบชื่อตารางใน database
	$sql = "SHOW TABLES FROM $namedb";
	$result = mysql_query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
			   $number_i=0;
			   $number_i2=0;
			   while ($row = mysql_fetch_row($result)) {
					 $table_n[$i]="{$row[0]}";
					 $table_n1[$i]=substr($table_n[$i],0,(15));
					// print $table_n[$i]."=".$table_n1[$i]."=".$name_Table."_".$date_name1."<br>";
					 if($table_n1[$i]==($name_Table."_".$date_name1)){
							$number_i=$i;
							
						 }
					 $i++;
				}
				if($N_month!=date('Y-m')){
					$name_Table=$table_n[$number_i];
				}else{
					$name_Table=$name_Table;
				}
			//	print $name_Table."<br>";
			//	exit();;
//----------------------------------------
	$qry = "SELECT DatetimeLocal,BDI1_BDI_percent_Load_L1,BDI1_BDI_percent_Load_L2,BDI1_BDI_percent_Load_L3,BDI1_BDI_Voltage_L1,BDI1_BDI_Voltage_L2,BDI1_BDI_Voltage_L3,BDI1_BDI_Current_I1,BDI1_BDI_Current_I2,BDI1_BDI_Current_I3,BDI1_BDI_Power_P1_kW,BDI1_BDI_Power_P2_kW,BDI1_BDI_Power_P3_kW,BDI1_BDI_Freq,BDI1_BDI_PF,BDI1_BDI_Heat_Sink_Temp,BDI1_BDI_Batt_Voltage,BDI1_BDI_DC_Current,BDI1_BDI_Ext_DC_Current,BDI1_BDI_Battery_Current,BDI1_BDI_DC_Power_kW,BDI1_BDI_Ext_DC_kW,BDI1_BDI_Batt_kW,BDI1_BDI_SOC,BDI2_BDI_percent_Load_L1,BDI2_BDI_percent_Load_L2,BDI2_BDI_percent_Load_L3,BDI2_BDI_Voltage_L1,BDI2_BDI_Voltage_L2,BDI2_BDI_Voltage_L3,BDI2_BDI_Current_I1,BDI2_BDI_Current_I2,BDI2_BDI_Current_I3,BDI2_BDI_Power_P1_kW,BDI2_BDI_Power_P2_kW,BDI2_BDI_Power_P3_kW,BDI2_BDI_Freq,BDI2_BDI_PF,BDI2_BDI_Heat_Sink_Temp,BDI2_BDI_Batt_Voltage,BDI2_BDI_DC_Current,BDI2_BDI_Ext_DC_Current,BDI2_BDI_Battery_Current,BDI2_BDI_DC_Power_kW,BDI2_BDI_Ext_DC_kW,BDI2_BDI_Batt_kW,BDI2_BDI_SOC,SCC1_PV_Voltage,SCC1_PV_Current,SCC1_PV_Power_kW,SCC1_Chg_Voltage,SCC1_Chg_Current,SCC1_Chg_Power_kW,SCC1_Heat_Sink_Temp,SCC1_Batt_Temp,SCC2_PV_Current,SCC2_PV_Power_kW,SCC2_Chg_Voltage,SCC2_Chg_Current,SCC2_Chg_Power_kW,SCC2_Heat_Sink_Temp,SCC2_Batt_Temp,Load_PM_Voltage_L2,Load_PM_Voltage_L3,Load_PM_Current_I1,Load_PM_Current_I2,Load_PM_Current_I3,Load_PM_Power_P1_kW,Load_PM_Power_P2_kW,Load_PM_Power_P3_kW,Load_PM_Freq,Load_PM_PF,Ctrl_PM_Voltage_L1,Ctrl_PM_Voltage_L2,Ctrl_PM_Voltage_L3,Ctrl_PM_Current_I1,Ctrl_PM_Current_I2,Ctrl_PM_Current_I3,Ctrl_PM_Power_P1_kW,Ctrl_PM_Power_P2_kW,Ctrl_PM_Power_P3_kW,Ctrl_PM_Freq,Ctrl_PM_PF,GCI1_PV1_Voltage,GCI1_PV2_Voltage,GCI1_PV3_Voltage,GCI1_PV1_Current,GCI1_PV2_Current,GCI1_PV3_Current,GCI1_PV1_Power_kW,GCI1_PV2_Power_kW,GCI1_PV3_Power_kW,GCI1_AC_Voltage_L1,GCI1_AC_Voltage_L2,GCI1_AC_Voltage_L3,GCI1_Freq_L1_Hz,GCI1_Freq_L2_Hz,GCI1_Freq_L3_Hz,GCI1_AC_Current_I1,GCI1_AC_Current_I2,GCI1_AC_Current_I3,GCI1_AC_Power_kW,GCI1_Heat_Sink_Temp,GCI2_PV1_Voltage,GCI2_PV2_Voltage,GCI2_PV3_Voltage,GCI2_PV1_Current,GCI2_PV2_Current,GCI2_PV3_Current,GCI2_PV1_Power_kW,GCI2_PV2_Power_kW,GCI2_PV3_Power_kW,GCI2_AC_Voltage_L1,GCI2_AC_Voltage_L2,GCI2_AC_Voltage_L3,GCI2_Freq_L1_Hz,GCI2_Freq_L2_Hz,GCI2_Freq_L3_Hz,GCI2_AC_Current_I1,GCI2_AC_Current_I2,GCI2_AC_Current_I3,GCI2_AC_Power_kW,GCI2_Heat_Sink_Temp,Gen1_Total_Power_kW,Gen1_I1,Gen1_I2,Gen1_I3,Gen1_V1n,Gen1_V2n,Gen1_V3n,Gen1_Power_factor,Gen2_Total_Power_kW,Gen2_I1,Gen2_I2,Gen2_I3,Gen2_V1n,Gen2_V2n,Gen2_V3n,Gen2_Power_factor,Tmod,Tamb,RH,Irradiance_W_m2,Irradiation_kWh_m2 FROM $name_Table where year(DatetimeLocal)=$yy and month(DatetimeLocal)=$mm and day(DatetimeLocal)=$dd  order by DatetimeLocal ASC ";
    $objQuery1 = mysql_query($qry) or die("query error".mysql_error());
	$num_rows = mysql_num_rows($objQuery1);	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery1)) {
		 $data[$i]= $objResult['DatetimeLocal'].",".
$objResult['BDI1_BDI_percent_Load_L1'].",".
$objResult['BDI1_BDI_percent_Load_L2'].",".
$objResult['BDI1_BDI_percent_Load_L3'].",".
$objResult['BDI1_BDI_Voltage_L1'].",".
$objResult['BDI1_BDI_Voltage_L2'].",".
$objResult['BDI1_BDI_Voltage_L3'].",".
$objResult['BDI1_BDI_Current_I1'].",".
$objResult['BDI1_BDI_Current_I2'].",".
$objResult['BDI1_BDI_Current_I3'].",".
$objResult['BDI1_BDI_Power_P1_kW'].",".
$objResult['BDI1_BDI_Power_P2_kW'].",".
$objResult['BDI1_BDI_Power_P3_kW'].",".
$objResult['BDI1_BDI_Freq'].",".
$objResult['BDI1_BDI_PF'].",".
$objResult['BDI1_BDI_Heat_Sink_Temp'].",".
$objResult['BDI1_BDI_Batt_Voltage'].",".
$objResult['BDI1_BDI_DC_Current'].",".
$objResult['BDI1_BDI_Ext_DC_Current'].",".
$objResult['BDI1_BDI_Battery_Current'].",".
$objResult['BDI1_BDI_DC_Power_kW'].",".
$objResult['BDI1_BDI_Ext_DC_kW'].",".
$objResult['BDI1_BDI_Batt_kW'].",".
$objResult['BDI1_BDI_SOC'].",".
$objResult['BDI2_BDI_percent_Load_L1'].",".
$objResult['BDI2_BDI_percent_Load_L2'].",".
$objResult['BDI2_BDI_percent_Load_L3'].",".
$objResult['BDI2_BDI_Voltage_L1'].",".
$objResult['BDI2_BDI_Voltage_L2'].",".
$objResult['BDI2_BDI_Voltage_L3'].",".
$objResult['BDI2_BDI_Current_I1'].",".
$objResult['BDI2_BDI_Current_I2'].",".
$objResult['BDI2_BDI_Current_I3'].",".
$objResult['BDI2_BDI_Power_P1_kW'].",".
$objResult['BDI2_BDI_Power_P2_kW'].",".
$objResult['BDI2_BDI_Power_P3_kW'].",".
$objResult['BDI2_BDI_Freq'].",".
$objResult['BDI2_BDI_PF'].",".
$objResult['BDI2_BDI_Heat_Sink_Temp'].",".
$objResult['BDI2_BDI_Batt_Voltage'].",".
$objResult['BDI2_BDI_DC_Current'].",".
$objResult['BDI2_BDI_Ext_DC_Current'].",".
$objResult['BDI2_BDI_Battery_Current'].",".
$objResult['BDI2_BDI_DC_Power_kW'].",".
$objResult['BDI2_BDI_Ext_DC_kW'].",".
$objResult['BDI2_BDI_Batt_kW'].",".
$objResult['BDI2_BDI_SOC'].",".
$objResult['SCC1_PV_Voltage'].",".
$objResult['SCC1_PV_Current'].",".
$objResult['SCC1_PV_Power_kW'].",".
$objResult['SCC1_Chg_Voltage'].",".
$objResult['SCC1_Chg_Current'].",".
$objResult['SCC1_Chg_Power_kW'].",".
$objResult['SCC1_Heat_Sink_Temp'].",".
$objResult['SCC1_Batt_Temp'].",".
$objResult['SCC2_PV_Current'].",".
$objResult['SCC2_PV_Power_kW'].",".
$objResult['SCC2_Chg_Voltage'].",".
$objResult['SCC2_Chg_Current'].",".
$objResult['SCC2_Chg_Power_kW'].",".
$objResult['SCC2_Heat_Sink_Temp'].",".
$objResult['SCC2_Batt_Temp'].",".
$objResult['Load_PM_Voltage_L2'].",".
$objResult['Load_PM_Voltage_L3'].",".
$objResult['Load_PM_Current_I1'].",".
$objResult['Load_PM_Current_I2'].",".
$objResult['Load_PM_Current_I3'].",".
$objResult['Load_PM_Power_P1_kW'].",".
$objResult['Load_PM_Power_P2_kW'].",".
$objResult['Load_PM_Power_P3_kW'].",".
$objResult['Load_PM_Freq'].",".
$objResult['Load_PM_PF'].",".
$objResult['Ctrl_PM_Voltage_L1'].",".
$objResult['Ctrl_PM_Voltage_L2'].",".
$objResult['Ctrl_PM_Voltage_L3'].",".
$objResult['Ctrl_PM_Current_I1'].",".
$objResult['Ctrl_PM_Current_I2'].",".
$objResult['Ctrl_PM_Current_I3'].",".
$objResult['Ctrl_PM_Power_P1_kW'].",".
$objResult['Ctrl_PM_Power_P2_kW'].",".
$objResult['Ctrl_PM_Power_P3_kW'].",".
$objResult['Ctrl_PM_Freq'].",".
$objResult['Ctrl_PM_PF'].",".
$objResult['GCI1_PV1_Voltage'].",".
$objResult['GCI1_PV2_Voltage'].",".
$objResult['GCI1_PV3_Voltage'].",".
$objResult['GCI1_PV1_Current'].",".
$objResult['GCI1_PV2_Current'].",".
$objResult['GCI1_PV3_Current'].",".
$objResult['GCI1_PV1_Power_kW'].",".
$objResult['GCI1_PV2_Power_kW'].",".
$objResult['GCI1_PV3_Power_kW'].",".
$objResult['GCI1_AC_Voltage_L1'].",".
$objResult['GCI1_AC_Voltage_L2'].",".
$objResult['GCI1_AC_Voltage_L3'].",".
$objResult['GCI1_Freq_L1_Hz'].",".
$objResult['GCI1_Freq_L2_Hz'].",".
$objResult['GCI1_Freq_L3_Hz'].",".
$objResult['GCI1_AC_Current_I1'].",".
$objResult['GCI1_AC_Current_I2'].",".
$objResult['GCI1_AC_Current_I3'].",".
$objResult['GCI1_AC_Power_kW'].",".
$objResult['GCI1_Heat_Sink_Temp'].",".
$objResult['GCI2_PV1_Voltage'].",".
$objResult['GCI2_PV2_Voltage'].",".
$objResult['GCI2_PV3_Voltage'].",".
$objResult['GCI2_PV1_Current'].",".
$objResult['GCI2_PV2_Current'].",".
$objResult['GCI2_PV3_Current'].",".
$objResult['GCI2_PV1_Power_kW'].",".
$objResult['GCI2_PV2_Power_kW'].",".
$objResult['GCI2_PV3_Power_kW'].",".
$objResult['GCI2_AC_Voltage_L1'].",".
$objResult['GCI2_AC_Voltage_L2'].",".
$objResult['GCI2_AC_Voltage_L3'].",".
$objResult['GCI2_Freq_L1_Hz'].",".
$objResult['GCI2_Freq_L2_Hz'].",".
$objResult['GCI2_Freq_L3_Hz'].",".
$objResult['GCI2_AC_Current_I1'].",".
$objResult['GCI2_AC_Current_I2'].",".
$objResult['GCI2_AC_Current_I3'].",".
$objResult['GCI2_AC_Power_kW'].",".
$objResult['GCI2_Heat_Sink_Temp'].",".
$objResult['Gen1_Total_Power_kW'].",".
$objResult['Gen1_I1'].",".
$objResult['Gen1_I2'].",".
$objResult['Gen1_I3'].",".
$objResult['Gen1_V1n'].",".
$objResult['Gen1_V2n'].",".
$objResult['Gen1_V3n'].",".
$objResult['Gen1_Power_factor'].",".
$objResult['Gen2_Total_Power_kW'].",".
$objResult['Gen2_I1'].",".
$objResult['Gen2_I2'].",".
$objResult['Gen2_I3'].",".
$objResult['Gen2_V1n'].",".
$objResult['Gen2_V2n'].",".
$objResult['Gen2_V3n'].",".
$objResult['Gen2_Power_factor'].",".
$objResult['Tmod'].",".
$objResult['Tamb'].",".
$objResult['RH'].",".
$objResult['Irradiance_W_m2'].",".
$objResult['Irradiation_kWh_m2'];
        $i++;
	
	}
	
	 mysql_close($link);
//$name_Table="main_hccu_table";
$Zip_filename="main_".$yy.$mm.$dd.".zip";
$csv_filename="main_".$yy.$mm.$dd.".csv";
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

