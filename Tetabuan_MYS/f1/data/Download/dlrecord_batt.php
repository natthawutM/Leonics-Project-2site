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
$data1=array('DatetimeServer,HVB1_Avg_Tamb,HVB1_Avg_V,HVB1_Batt_I,HVB1_SOC,HVB1_SOH,HVB1_Remain_Batt_Ah,HVB1_Batt_kW,HVB2_Avg_Tamb,HVB2_Avg_V,HVB2_Batt_I,HVB2_SOC,HVB2_SOH,HVB2_Remain_Batt_Ah,HVB2_Batt_kW,HVB3_Avg_Tamb,HVB3_Avg_V,HVB3_Batt_I,HVB3_SOC,HVB3_SOH,HVB3_Remain_Batt_Ah,HVB3_Batt_kW,HVB4_Avg_Tamb,HVB4_Avg_V,HVB4_Batt_I,HVB4_SOC,HVB4_SOH,HVB4_Remain_Batt_Ah,HVB4_Batt_kW,HVB5_Avg_Tamb,HVB5_Avg_V,HVB5_Batt_I,HVB5_SOC,HVB5_SOH,HVB5_Remain_Batt_Ah,HVB5_Batt_kW,HVB6_Avg_Tamb,HVB6_Avg_V,HVB6_Batt_I,HVB6_SOC,HVB6_SOH,HVB6_Remain_Batt_Ah,HVB6_Batt_kW,HVB7_Avg_Tamb,HVB7_Avg_V,HVB7_Batt_I,HVB7_SOC,HVB7_SOH,HVB7_Remain_Batt_Ah,HVB7_Batt_kW');
//------------end Header
$hostdb = 'localhost';   // MySQl host
$userdb = 'root';    // MySQL username
$passdb = '';    // MySQL password
$namedb = 'tetabuanbattery_mys'; // MySQL database name
$link = mysql_connect ($hostdb, $userdb, $passdb);
mysql_select_db($namedb);//smu4
$name_Table="download";//download_20250804_163839
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
			//	exit();;
//----------------------------------------
	$qry = "SELECT DatetimeLocal,HVB1_Avg_Tamb,HVB1_Avg_V,HVB1_Batt_I,HVB1_SOC,HVB1_SOH,HVB1_Remain_Batt_Ah,HVB1_Batt_kW,HVB2_Avg_Tamb,HVB2_Avg_V,HVB2_Batt_I,HVB2_SOC,HVB2_SOH,HVB2_Remain_Batt_Ah,HVB2_Batt_kW,HVB3_Avg_Tamb,HVB3_Avg_V,HVB3_Batt_I,HVB3_SOC,HVB3_SOH,HVB3_Remain_Batt_Ah,HVB3_Batt_kW,HVB4_Avg_Tamb,HVB4_Avg_V,HVB4_Batt_I,HVB4_SOC,HVB4_SOH,HVB4_Remain_Batt_Ah,HVB4_Batt_kW,HVB5_Avg_Tamb,HVB5_Avg_V,HVB5_Batt_I,HVB5_SOC,HVB5_SOH,HVB5_Remain_Batt_Ah,HVB5_Batt_kW,HVB6_Avg_Tamb,HVB6_Avg_V,HVB6_Batt_I,HVB6_SOC,HVB6_SOH,HVB6_Remain_Batt_Ah,HVB6_Batt_kW,HVB7_Avg_Tamb,HVB7_Avg_V,HVB7_Batt_I,HVB7_SOC,HVB7_SOH,HVB7_Remain_Batt_Ah,HVB7_Batt_kW FROM $name_Table where year(DatetimeLocal)=$yy and month(DatetimeLocal)=$mm and day(DatetimeLocal)=$dd  order by DatetimeLocal ASC ";
	print $qry."<br>";
    $objQuery1 = mysql_query($qry) or die("query error".mysql_error());
	$num_rows = mysql_num_rows($objQuery1);	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery1)) {
		 $data[$i]= $objResult['DatetimeLocal'].",".
$objResult['HVB1_Avg_Tamb'].",".
$objResult['HVB1_Avg_V'].",".
$objResult['HVB1_Batt_I'].",".
$objResult['HVB1_SOC'].",".
$objResult['HVB1_SOH'].",".
$objResult['HVB1_Remain_Batt_Ah'].",".
$objResult['HVB1_Batt_kW'].",".
$objResult['HVB2_Avg_Tamb'].",".
$objResult['HVB2_Avg_V'].",".
$objResult['HVB2_Batt_I'].",".
$objResult['HVB2_SOC'].",".
$objResult['HVB2_SOH'].",".
$objResult['HVB2_Remain_Batt_Ah'].",".
$objResult['HVB2_Batt_kW'].",".
$objResult['HVB3_Avg_Tamb'].",".
$objResult['HVB3_Avg_V'].",".
$objResult['HVB3_Batt_I'].",".
$objResult['HVB3_SOC'].",".
$objResult['HVB3_SOH'].",".
$objResult['HVB3_Remain_Batt_Ah'].",".
$objResult['HVB3_Batt_kW'].",".
$objResult['HVB4_Avg_Tamb'].",".
$objResult['HVB4_Avg_V'].",".
$objResult['HVB4_Batt_I'].",".
$objResult['HVB4_SOC'].",".
$objResult['HVB4_SOH'].",".
$objResult['HVB4_Remain_Batt_Ah'].",".
$objResult['HVB4_Batt_kW'].",".
$objResult['HVB5_Avg_Tamb'].",".
$objResult['HVB5_Avg_V'].",".
$objResult['HVB5_Batt_I'].",".
$objResult['HVB5_SOC'].",".
$objResult['HVB5_SOH'].",".
$objResult['HVB5_Remain_Batt_Ah'].",".
$objResult['HVB5_Batt_kW'].",".
$objResult['HVB6_Avg_Tamb'].",".
$objResult['HVB6_Avg_V'].",".
$objResult['HVB6_Batt_I'].",".
$objResult['HVB6_SOC'].",".
$objResult['HVB6_SOH'].",".
$objResult['HVB6_Remain_Batt_Ah'].",".
$objResult['HVB6_Batt_kW'].",".
$objResult['HVB7_Avg_Tamb'].",".
$objResult['HVB7_Avg_V'].",".
$objResult['HVB7_Batt_I'].",".
$objResult['HVB7_SOC'].",".
$objResult['HVB7_SOH'].",".
$objResult['HVB7_Remain_Batt_Ah'].",".
$objResult['HVB7_Batt_kW'];
        $i++;
	
	}
	
	 mysql_close($link);
//$name_Table="main_hccu_table";
$Zip_filename="battery_".$yy.$mm.$dd.".zip";
$csv_filename="battery_".$yy.$mm.$dd.".csv";
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
     if (file_exists("c:/wamp/www/Tetabuan_MYS/f1/data/Download/".$Zip_filename))
    unlink("c:/wamp/www/Tetabuan_MYS/f1/data/Download/".$Zip_filename);
    $ziper = new zipfile(); 
    $ziper->addFiles(array($csv_filename));  //array of files 
    $ziper->output($Zip_filename); 
    readfile($Zip_filename);
	exit();
?>

