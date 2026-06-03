<?php
ob_start();
$yy=$_GET['y'];
$mm=$_GET['m'];
$dd=$_GET['d'];
//$N_date=$_GET["y"]."-".$_GET["m"]."-".$_GET["d"];
$N_date=$yy."-".$mm;
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
$data1=array('DatetimeServer,ACin_Voltage_L1,ACin_Voltage_L2,ACin_Voltage_L3,ACin_Current_I1,ACin_Current_I2,ACin_Current_I3,ACin_Power_P1_kW,ACin_Power_P2_kW,ACin_Power_P3_kW,ACin_Freq,ACin_PF,BDI_percent_Load_L1,BDI_percent_Load_L2,BDI_percent_Load_L3,BDI_Voltage_L1,BDI_Voltage_L2,BDI_Voltage_L3,BDI_Current_I1,BDI_Current_I2,BDI_Current_I3,BDI_Power_P1_kW,BDI_Power_P2_kW,BDI_Power_P3_kW,BDI_Freq,BDI_PF,BDI_Heat_Sink_Temp,BDI_Batt_Voltage,BDI_DC_Current,BDI_Ext_DC_Current,BDI_Battery_Current,BDI_DC_Power_kW,BDI_Ext_DC_kW,BDI_Batt_kW,BDI_SOC,SCC_PV_Voltage,SCC_PV_Current,SCC_PV_Power_kW,SCC_Chg_Voltage,SCC_Chg_Current,SCC_Chg_Power_kW,SCC_Heat_Sink_Temp,SCC_Batt_Temp,LoadPM_Voltage_L1,LoadPM_Voltage_L2,LoadPM_Voltage_L3,LoadPM_Current_I1,LoadPM_Current_I2,LoadPM_Current_I3,LoadPM_Power_P1_kW,LoadPM_Power_P2_kW,LoadPM_Power_P3_kW,LoadPM_Freq,LoadPM_PF,WindPM_Voltage_L1,WindPM_Voltage_L2,WindPM_Voltage_L3,WindPM_Current_I1,WindPM_Current_I2,WindPM_Current_I3,WindPM_Power_P1_kW,WindPM_Power_P2_kW,WindPM_Power_P3_kW,WindPM_Freq,WindPM_PF,GCI1_PV1_Voltage,GCI1_PV2_Voltage,GCI1_PV3_Voltage,GCI1_PV4_Voltage,GCI1_PV1_Current,GCI1_PV2_Current,GCI1_PV3_Current,GCI1_PV4_Current,GCI1_PV1_Power_kW,GCI1_PV2_Power_kW,GCI1_PV3_Power_kW,GCI1_PV4_Power_kW,GCI1_AC_Voltage_L1,GCI1_AC_Voltage_L2,GCI1_AC_Voltage_L3,GCI1_AC_Freq_L1_Hz,GCI1_AC_Freq_L2_Hz,GCI1_AC_Freq_L3_Hz,GCI1_AC_Current_I1,GCI1_AC_Current_I2,GCI1_AC_Current_I3,GCI1_AC_Power_kW,GCI1_Heat_Sink_Temp,GCI1_Module_Temp,GCI2_PV1_Voltage,GCI2_PV2_Voltage,GCI2_PV3_Voltage,GCI2_PV4_Voltage,GCI2_PV1_Current,GCI2_PV2_Current,GCI2_PV3_Current,GCI2_PV4_Current,GCI2_PV1_Power_kW,GCI2_PV2_Power_kW,GCI2_PV3_Power_kW,GCI2_PV4_Power_kW,GCI2_AC_Voltage_L1,GCI2_AC_Voltage_L2,GCI2_AC_Voltage_L3,GCI2_AC_Freq_L1_Hz,GCI2_AC_Freq_L2_Hz,GCI2_AC_Freq_L3_Hz,GCI2_AC_Current_I1,GCI2_AC_Current_I2,GCI2_AC_Current_I3,GCI2_AC_Power_kW,GCI2_Heat_Sink_Temp,GCI2_Module_Temp,ana2,ana3,ana4,ana5,Irradiance_W_m2,Irradiation_kWh_m2,Todate_Irrt_kWh_m2,temp');
//------------end Header
$hostdb = 'localhost';   // MySQl host
$userdb = 'root';    // MySQL username
$passdb = '';    // MySQL password
$namedb = 'dwr_rbr'; // MySQL database name
$link = mysql_connect ($hostdb, $userdb, $passdb);
mysql_select_db($namedb);//smu4
$name_Table="download";//download_20230602_135623
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
				//print $name_Table."<br>";
				//exit();;
//----------------------------------------
	$qry = "SELECT * FROM $name_Table where year(DatetimeLocal)=$yy and month(DatetimeLocal)=$mm and day(DatetimeLocal)=$dd  order by DatetimeLocal ASC ";
	$objQuery1 = mysql_query($qry) or die("query error".mysql_error());

	$num_rows = mysql_num_rows($objQuery1);	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery1)) {
		 $data[$i]= $objResult['DatetimeLocal'].",".
$objResult['ACin_Voltage_L1'].",".
$objResult['ACin_Voltage_L2'].",".
$objResult['ACin_Voltage_L3'].",".
$objResult['ACin_Current_I1'].",".
$objResult['ACin_Current_I2'].",".
$objResult['ACin_Current_I3'].",".
$objResult['ACin_Power_P1_kW'].",".
$objResult['ACin_Power_P2_kW'].",".
$objResult['ACin_Power_P3_kW'].",".
$objResult['ACin_Freq'].",".
$objResult['ACin_PF'].",".
$objResult['BDI_percent_Load_L1'].",".
$objResult['BDI_percent_Load_L2'].",".
$objResult['BDI_percent_Load_L3'].",".
$objResult['BDI_Voltage_L1'].",".
$objResult['BDI_Voltage_L2'].",".
$objResult['BDI_Voltage_L3'].",".
$objResult['BDI_Current_I1'].",".
$objResult['BDI_Current_I2'].",".
$objResult['BDI_Current_I3'].",".
$objResult['BDI_Power_P1_kW'].",".
$objResult['BDI_Power_P2_kW'].",".
$objResult['BDI_Power_P3_kW'].",".
$objResult['BDI_Freq'].",".
$objResult['BDI_PF'].",".
$objResult['BDI_Heat_Sink_Temp'].",".
$objResult['BDI_Batt_Voltage'].",".
$objResult['BDI_DC_Current'].",".
$objResult['BDI_Ext_DC_Current'].",".
$objResult['BDI_Battery_Current'].",".
$objResult['BDI_DC_Power_kW'].",".
$objResult['BDI_Ext_DC_kW'].",".
$objResult['BDI_Batt_kW'].",".
$objResult['BDI_SOC'].",".
$objResult['SCC_PV_Voltage'].",".
$objResult['SCC_PV_Current'].",".
$objResult['SCC_PV_Power_kW'].",".
$objResult['SCC_Chg_Voltage'].",".
$objResult['SCC_Chg_Current'].",".
$objResult['SCC_Chg_Power_kW'].",".
$objResult['SCC_Heat_Sink_Temp'].",".
$objResult['SCC_Batt_Temp'].",".
$objResult['LoadPM_Voltage_L1'].",".
$objResult['LoadPM_Voltage_L2'].",".
$objResult['LoadPM_Voltage_L3'].",".
$objResult['LoadPM_Current_I1'].",".
$objResult['LoadPM_Current_I2'].",".
$objResult['LoadPM_Current_I3'].",".
$objResult['LoadPM_Power_P1_kW'].",".
$objResult['LoadPM_Power_P2_kW'].",".
$objResult['LoadPM_Power_P3_kW'].",".
$objResult['LoadPM_Freq'].",".
$objResult['LoadPM_PF'].",".
$objResult['WindPM_Voltage_L1'].",".
$objResult['WindPM_Voltage_L2'].",".
$objResult['WindPM_Voltage_L3'].",".
$objResult['WindPM_Current_I1'].",".
$objResult['WindPM_Current_I2'].",".
$objResult['WindPM_Current_I3'].",".
$objResult['WindPM_Power_P1_kW'].",".
$objResult['WindPM_Power_P2_kW'].",".
$objResult['WindPM_Power_P3_kW'].",".
$objResult['WindPM_Freq'].",".
$objResult['WindPM_PF'].",".
$objResult['GCI1_PV1_Voltage'].",".
$objResult['GCI1_PV2_Voltage'].",".
$objResult['GCI1_PV3_Voltage'].",".
$objResult['GCI1_PV4_Voltage'].",".
$objResult['GCI1_PV1_Current'].",".
$objResult['GCI1_PV2_Current'].",".
$objResult['GCI1_PV3_Current'].",".
$objResult['GCI1_PV4_Current'].",".
$objResult['GCI1_PV1_Power_kW'].",".
$objResult['GCI1_PV2_Power_kW'].",".
$objResult['GCI1_PV3_Power_kW'].",".
$objResult['GCI1_PV4_Power_kW'].",".
$objResult['GCI1_AC_Voltage_L1'].",".
$objResult['GCI1_AC_Voltage_L2'].",".
$objResult['GCI1_AC_Voltage_L3'].",".
$objResult['GCI1_AC_Freq_L1_Hz'].",".
$objResult['GCI1_AC_Freq_L2_Hz'].",".
$objResult['GCI1_AC_Freq_L3_Hz'].",".
$objResult['GCI1_AC_Current_I1'].",".
$objResult['GCI1_AC_Current_I2'].",".
$objResult['GCI1_AC_Current_I3'].",".
$objResult['GCI1_AC_Power_kW'].",".
$objResult['GCI1_Heat_Sink_Temp'].",".
$objResult['GCI1_Module_Temp'].",".
$objResult['GCI2_PV1_Voltage'].",".
$objResult['GCI2_PV2_Voltage'].",".
$objResult['GCI2_PV3_Voltage'].",".
$objResult['GCI2_PV4_Voltage'].",".
$objResult['GCI2_PV1_Current'].",".
$objResult['GCI2_PV2_Current'].",".
$objResult['GCI2_PV3_Current'].",".
$objResult['GCI2_PV4_Current'].",".
$objResult['GCI2_PV1_Power_kW'].",".
$objResult['GCI2_PV2_Power_kW'].",".
$objResult['GCI2_PV3_Power_kW'].",".
$objResult['GCI2_PV4_Power_kW'].",".
$objResult['GCI2_AC_Voltage_L1'].",".
$objResult['GCI2_AC_Voltage_L2'].",".
$objResult['GCI2_AC_Voltage_L3'].",".
$objResult['GCI2_AC_Freq_L1_Hz'].",".
$objResult['GCI2_AC_Freq_L2_Hz'].",".
$objResult['GCI2_AC_Freq_L3_Hz'].",".
$objResult['GCI2_AC_Current_I1'].",".
$objResult['GCI2_AC_Current_I2'].",".
$objResult['GCI2_AC_Current_I3'].",".
$objResult['GCI2_AC_Power_kW'].",".
$objResult['GCI2_Heat_Sink_Temp'].",".
$objResult['GCI2_Module_Temp'].",".
$objResult['ana2'].",".
$objResult['ana3'].",".
$objResult['ana4'].",".
$objResult['ana5'].",".
$objResult['Irradiance_W_m2'].",".
$objResult['Irradiation_kWh_m2'].",".
$objResult['Todate_Irrt_kWh_m2'].",".
$objResult['temp'];
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
     if (file_exists("c:/wamp/www/Department_of_Water_Resource/f1/data/Download/".$Zip_filename))
    unlink("c:/wamp/www/Department_of_Water_Resource/f1/data/Download/".$Zip_filename);
    $ziper = new zipfile(); 
    $ziper->addFiles(array($csv_filename));  //array of files 
    $ziper->output($Zip_filename); 
    readfile($Zip_filename);
	exit();
?>

