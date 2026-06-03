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
$data1=array('DatetimeServer,HVB2_Avg_Tamb,HVB2_Avg_V,HVB2_Batt_I,HVB2_SOC,HVB2_SOH,HVB2_Remain_Batt_Ah,HVB2_Batt_kW,HVB2_Batt1_SOH,HVB2_Batt1_cV1,HVB2_Batt1_cV2,HVB2_Batt1_cV3,HVB2_Batt1_cV4,HVB2_Batt1_cV5,HVB2_Batt1_cV6,HVB2_Batt1_cV7,HVB2_Batt1_cV8,HVB2_Batt1_cV9,HVB2_Batt1_cV10,HVB2_Batt1_cV11,HVB2_Batt1_cV12,HVB2_Batt1_cV13,HVB2_Batt1_cV14,HVB2_Batt1_cV15,HVB2_Batt1_cV16,HVB2_Batt1_cT1,HVB2_Batt1_cT2,HVB2_Batt1_cT3,HVB2_Batt1_cT4,HVB2_Batt1_cT5,HVB2_Batt1_cT6,HVB2_Batt1_Ah,HVB2_Batt2_SOH,HVB2_Batt2_cV1,HVB2_Batt2_cV2,HVB2_Batt2_cV3,HVB2_Batt2_cV4,HVB2_Batt2_cV5,HVB2_Batt2_cV6,HVB2_Batt2_cV7,HVB2_Batt2_cV8,HVB2_Batt2_cV9,HVB2_Batt2_cV10,HVB2_Batt2_cV11,HVB2_Batt2_cV12,HVB2_Batt2_cV13,HVB2_Batt2_cV14,HVB2_Batt2_cV15,HVB2_Batt2_cV16,HVB2_Batt2_cT1,HVB2_Batt2_cT2,HVB2_Batt2_cT3,HVB2_Batt2_cT4,HVB2_Batt2_cT5,HVB2_Batt2_cT6,HVB2_Batt2_Ah,HVB2_Batt3_SOH,HVB2_Batt3_cV1,HVB2_Batt3_cV2,HVB2_Batt3_cV3,HVB2_Batt3_cV4,HVB2_Batt3_cV5,HVB2_Batt3_cV6,HVB2_Batt3_cV7,HVB2_Batt3_cV8,HVB2_Batt3_cV9,HVB2_Batt3_cV10,HVB2_Batt3_cV11,HVB2_Batt3_cV12,HVB2_Batt3_cV13,HVB2_Batt3_cV14,HVB2_Batt3_cV15,HVB2_Batt3_cV16,HVB2_Batt3_cT1,HVB2_Batt3_cT2,HVB2_Batt3_cT3,HVB2_Batt3_cT4,HVB2_Batt3_cT5,HVB2_Batt3_cT6,HVB2_Batt3_Ah,HVB2_Batt4_SOH,HVB2_Batt4_cV1,HVB2_Batt4_cV2,HVB2_Batt4_cV3,HVB2_Batt4_cV4,HVB2_Batt4_cV5,HVB2_Batt4_cV6,HVB2_Batt4_cV7,HVB2_Batt4_cV8,HVB2_Batt4_cV9,HVB2_Batt4_cV10,HVB2_Batt4_cV11,HVB2_Batt4_cV12,HVB2_Batt4_cV13,HVB2_Batt4_cV14,HVB2_Batt4_cV15,HVB2_Batt4_cV16,HVB2_Batt4_cT1,HVB2_Batt4_cT2,HVB2_Batt4_cT3,HVB2_Batt4_cT4,HVB2_Batt4_cT5,HVB2_Batt4_cT6,HVB2_Batt4_Ah,HVB2_Batt5_SOH,HVB2_Batt5_cV1,HVB2_Batt5_cV2,HVB2_Batt5_cV3,HVB2_Batt5_cV4,HVB2_Batt5_cV5,HVB2_Batt5_cV6,HVB2_Batt5_cV7,HVB2_Batt5_cV8,HVB2_Batt5_cV9,HVB2_Batt5_cV10,HVB2_Batt5_cV11,HVB2_Batt5_cV12,HVB2_Batt5_cV13,HVB2_Batt5_cV14,HVB2_Batt5_cV15,HVB2_Batt5_cV16,HVB2_Batt5_cT1,HVB2_Batt5_cT2,HVB2_Batt5_cT3,HVB2_Batt5_cT4,HVB2_Batt5_cT5,HVB2_Batt5_cT6,HVB2_Batt5_Ah,HVB2_Batt6_SOH,HVB2_Batt6_cV1,HVB2_Batt6_cV2,HVB2_Batt6_cV3,HVB2_Batt6_cV4,HVB2_Batt6_cV5,HVB2_Batt6_cV6,HVB2_Batt6_cV7,HVB2_Batt6_cV8,HVB2_Batt6_cV9,HVB2_Batt6_cV10,HVB2_Batt6_cV11,HVB2_Batt6_cV12,HVB2_Batt6_cV13,HVB2_Batt6_cV14,HVB2_Batt6_cV15,HVB2_Batt6_cV16,HVB2_Batt6_cT1,HVB2_Batt6_cT2,HVB2_Batt6_cT3,HVB2_Batt6_cT4,HVB2_Batt6_cT5,HVB2_Batt6_cT6,HVB2_Batt6_Ah,HVB2_Batt7_SOH,HVB2_Batt7_cV1,HVB2_Batt7_cV2,HVB2_Batt7_cV3,HVB2_Batt7_cV4,HVB2_Batt7_cV5,HVB2_Batt7_cV6,HVB2_Batt7_cV7,HVB2_Batt7_cV8,HVB2_Batt7_cV9,HVB2_Batt7_cV10,HVB2_Batt7_cV11,HVB2_Batt7_cV12,HVB2_Batt7_cV13,HVB2_Batt7_cV14,HVB2_Batt7_cV15,HVB2_Batt7_cV16,HVB2_Batt7_cT1,HVB2_Batt7_cT2,HVB2_Batt7_cT3,HVB2_Batt7_cT4,HVB2_Batt7_cT5,HVB2_Batt7_cT6,HVB2_Batt7_Ah,HVB2_Batt8_SOH,HVB2_Batt8_cV1,HVB2_Batt8_cV2,HVB2_Batt8_cV3,HVB2_Batt8_cV4,HVB2_Batt8_cV5,HVB2_Batt8_cV6,HVB2_Batt8_cV7,HVB2_Batt8_cV8,HVB2_Batt8_cV9,HVB2_Batt8_cV10,HVB2_Batt8_cV11,HVB2_Batt8_cV12,HVB2_Batt8_cV13,HVB2_Batt8_cV14,HVB2_Batt8_cV15,HVB2_Batt8_cV16,HVB2_Batt8_cT1,HVB2_Batt8_cT2,HVB2_Batt8_cT3,HVB2_Batt8_cT4,HVB2_Batt8_cT5,HVB2_Batt8_cT6,HVB2_Batt8_Ah,HVB2_Batt9_SOH,HVB2_Batt9_cV1,HVB2_Batt9_cV2,HVB2_Batt9_cV3,HVB2_Batt9_cV4,HVB2_Batt9_cV5,HVB2_Batt9_cV6,HVB2_Batt9_cV7,HVB2_Batt9_cV8,HVB2_Batt9_cV9,HVB2_Batt9_cV10,HVB2_Batt9_cV11,HVB2_Batt9_cV12,HVB2_Batt9_cV13,HVB2_Batt9_cV14,HVB2_Batt9_cV15,HVB2_Batt9_cV16,HVB2_Batt9_cT1,HVB2_Batt9_cT2,HVB2_Batt9_cT3,HVB2_Batt9_cT4,HVB2_Batt9_cT5,HVB2_Batt9_cT6,HVB2_Batt9_Ah,HVB2_Batt10_SOH,HVB2_Batt10_cV1,HVB2_Batt10_cV2,HVB2_Batt10_cV3,HVB2_Batt10_cV4,HVB2_Batt10_cV5,HVB2_Batt10_cV6,HVB2_Batt10_cV7,HVB2_Batt10_cV8,HVB2_Batt10_cV9,HVB2_Batt10_cV10,HVB2_Batt10_cV11,HVB2_Batt10_cV12,HVB2_Batt10_cV13,HVB2_Batt10_cV14,HVB2_Batt10_cV15,HVB2_Batt10_cV16,HVB2_Batt10_cT1,HVB2_Batt10_cT2,HVB2_Batt10_cT3,HVB2_Batt10_cT4,HVB2_Batt10_cT5,HVB2_Batt10_cT6,HVB2_Batt10_Ah,HVB2_Batt11_SOH,HVB2_Batt11_cV1,HVB2_Batt11_cV2,HVB2_Batt11_cV3,HVB2_Batt11_cV4,HVB2_Batt11_cV5,HVB2_Batt11_cV6,HVB2_Batt11_cV7,HVB2_Batt11_cV8,HVB2_Batt11_cV9,HVB2_Batt11_cV10,HVB2_Batt11_cV11,HVB2_Batt11_cV12,HVB2_Batt11_cV13,HVB2_Batt11_cV14,HVB2_Batt11_cV15,HVB2_Batt11_cV16,HVB2_Batt11_cT1,HVB2_Batt11_cT2,HVB2_Batt11_cT3,HVB2_Batt11_cT4,HVB2_Batt11_cT5,HVB2_Batt11_cT6,HVB2_Batt11_Ah,HVB2_Batt12_SOH,HVB2_Batt12_cV1,HVB2_Batt12_cV2,HVB2_Batt12_cV3,HVB2_Batt12_cV4,HVB2_Batt12_cV5,HVB2_Batt12_cV6,HVB2_Batt12_cV7,HVB2_Batt12_cV8,HVB2_Batt12_cV9,HVB2_Batt12_cV10,HVB2_Batt12_cV11,HVB2_Batt12_cV12,HVB2_Batt12_cV13,HVB2_Batt12_cV14,HVB2_Batt12_cV15,HVB2_Batt12_cV16,HVB2_Batt12_cT1,HVB2_Batt12_cT2,HVB2_Batt12_cT3,HVB2_Batt12_cT4,HVB2_Batt12_cT5,HVB2_Batt12_cT6,HVB2_Batt12_Ah,HVB2_Batt13_SOH,HVB2_Batt13_cV1,HVB2_Batt13_cV2,HVB2_Batt13_cV3,HVB2_Batt13_cV4,HVB2_Batt13_cV5,HVB2_Batt13_cV6,HVB2_Batt13_cV7,HVB2_Batt13_cV8,HVB2_Batt13_cV9,HVB2_Batt13_cV10,HVB2_Batt13_cV11,HVB2_Batt13_cV12,HVB2_Batt13_cV13,HVB2_Batt13_cV14,HVB2_Batt13_cV15,HVB2_Batt13_cV16,HVB2_Batt13_cT1,HVB2_Batt13_cT2,HVB2_Batt13_cT3,HVB2_Batt13_cT4,HVB2_Batt13_cT5,HVB2_Batt13_cT6,HVB2_Batt13_Ah,HVB2_Batt14_SOH,HVB2_Batt14_cV1,HVB2_Batt14_cV2,HVB2_Batt14_cV3,HVB2_Batt14_cV4,HVB2_Batt14_cV5,HVB2_Batt14_cV6,HVB2_Batt14_cV7,HVB2_Batt14_cV8,HVB2_Batt14_cV9,HVB2_Batt14_cV10,HVB2_Batt14_cV11,HVB2_Batt14_cV12,HVB2_Batt14_cV13,HVB2_Batt14_cV14,HVB2_Batt14_cV15,HVB2_Batt14_cV16,HVB2_Batt14_cT1,HVB2_Batt14_cT2,HVB2_Batt14_cT3,HVB2_Batt14_cT4,HVB2_Batt14_cT5,HVB2_Batt14_cT6,HVB2_Batt14_Ah');
//------------end Header
$hostdb = 'localhost';   // MySQl host
$userdb = 'root';    // MySQL username
$passdb = '';    // MySQL password
$namedb = 'dwr_rbr'; // MySQL database name
$link = mysql_connect ($hostdb, $userdb, $passdb);
mysql_select_db($namedb);//smu4
$name_Table="download_battery";//download_battery_20260429_165040
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
					 $table_n1[$i]=substr($table_n[$i],0,(23));
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
	$qry = "SELECT DatetimeLocal,HVB2_Avg_Tamb,HVB2_Avg_V,HVB2_Batt_I,HVB2_SOC,HVB2_SOH,HVB2_Remain_Batt_Ah,HVB2_Batt_kW,HVB2_Batt1_SOH,HVB2_Batt1_cV1,HVB2_Batt1_cV2,HVB2_Batt1_cV3,HVB2_Batt1_cV4,HVB2_Batt1_cV5,HVB2_Batt1_cV6,HVB2_Batt1_cV7,HVB2_Batt1_cV8,HVB2_Batt1_cV9,HVB2_Batt1_cV10,HVB2_Batt1_cV11,HVB2_Batt1_cV12,HVB2_Batt1_cV13,HVB2_Batt1_cV14,HVB2_Batt1_cV15,HVB2_Batt1_cV16,HVB2_Batt1_cT1,HVB2_Batt1_cT2,HVB2_Batt1_cT3,HVB2_Batt1_cT4,HVB2_Batt1_cT5,HVB2_Batt1_cT6,HVB2_Batt1_Ah,HVB2_Batt2_SOH,HVB2_Batt2_cV1,HVB2_Batt2_cV2,HVB2_Batt2_cV3,HVB2_Batt2_cV4,HVB2_Batt2_cV5,HVB2_Batt2_cV6,HVB2_Batt2_cV7,HVB2_Batt2_cV8,HVB2_Batt2_cV9,HVB2_Batt2_cV10,HVB2_Batt2_cV11,HVB2_Batt2_cV12,HVB2_Batt2_cV13,HVB2_Batt2_cV14,HVB2_Batt2_cV15,HVB2_Batt2_cV16,HVB2_Batt2_cT1,HVB2_Batt2_cT2,HVB2_Batt2_cT3,HVB2_Batt2_cT4,HVB2_Batt2_cT5,HVB2_Batt2_cT6,HVB2_Batt2_Ah,HVB2_Batt3_SOH,HVB2_Batt3_cV1,HVB2_Batt3_cV2,HVB2_Batt3_cV3,HVB2_Batt3_cV4,HVB2_Batt3_cV5,HVB2_Batt3_cV6,HVB2_Batt3_cV7,HVB2_Batt3_cV8,HVB2_Batt3_cV9,HVB2_Batt3_cV10,HVB2_Batt3_cV11,HVB2_Batt3_cV12,HVB2_Batt3_cV13,HVB2_Batt3_cV14,HVB2_Batt3_cV15,HVB2_Batt3_cV16,HVB2_Batt3_cT1,HVB2_Batt3_cT2,HVB2_Batt3_cT3,HVB2_Batt3_cT4,HVB2_Batt3_cT5,HVB2_Batt3_cT6,HVB2_Batt3_Ah,HVB2_Batt4_SOH,HVB2_Batt4_cV1,HVB2_Batt4_cV2,HVB2_Batt4_cV3,HVB2_Batt4_cV4,HVB2_Batt4_cV5,HVB2_Batt4_cV6,HVB2_Batt4_cV7,HVB2_Batt4_cV8,HVB2_Batt4_cV9,HVB2_Batt4_cV10,HVB2_Batt4_cV11,HVB2_Batt4_cV12,HVB2_Batt4_cV13,HVB2_Batt4_cV14,HVB2_Batt4_cV15,HVB2_Batt4_cV16,HVB2_Batt4_cT1,HVB2_Batt4_cT2,HVB2_Batt4_cT3,HVB2_Batt4_cT4,HVB2_Batt4_cT5,HVB2_Batt4_cT6,HVB2_Batt4_Ah,HVB2_Batt5_SOH,HVB2_Batt5_cV1,HVB2_Batt5_cV2,HVB2_Batt5_cV3,HVB2_Batt5_cV4,HVB2_Batt5_cV5,HVB2_Batt5_cV6,HVB2_Batt5_cV7,HVB2_Batt5_cV8,HVB2_Batt5_cV9,HVB2_Batt5_cV10,HVB2_Batt5_cV11,HVB2_Batt5_cV12,HVB2_Batt5_cV13,HVB2_Batt5_cV14,HVB2_Batt5_cV15,HVB2_Batt5_cV16,HVB2_Batt5_cT1,HVB2_Batt5_cT2,HVB2_Batt5_cT3,HVB2_Batt5_cT4,HVB2_Batt5_cT5,HVB2_Batt5_cT6,HVB2_Batt5_Ah,HVB2_Batt6_SOH,HVB2_Batt6_cV1,HVB2_Batt6_cV2,HVB2_Batt6_cV3,HVB2_Batt6_cV4,HVB2_Batt6_cV5,HVB2_Batt6_cV6,HVB2_Batt6_cV7,HVB2_Batt6_cV8,HVB2_Batt6_cV9,HVB2_Batt6_cV10,HVB2_Batt6_cV11,HVB2_Batt6_cV12,HVB2_Batt6_cV13,HVB2_Batt6_cV14,HVB2_Batt6_cV15,HVB2_Batt6_cV16,HVB2_Batt6_cT1,HVB2_Batt6_cT2,HVB2_Batt6_cT3,HVB2_Batt6_cT4,HVB2_Batt6_cT5,HVB2_Batt6_cT6,HVB2_Batt6_Ah,HVB2_Batt7_SOH,HVB2_Batt7_cV1,HVB2_Batt7_cV2,HVB2_Batt7_cV3,HVB2_Batt7_cV4,HVB2_Batt7_cV5,HVB2_Batt7_cV6,HVB2_Batt7_cV7,HVB2_Batt7_cV8,HVB2_Batt7_cV9,HVB2_Batt7_cV10,HVB2_Batt7_cV11,HVB2_Batt7_cV12,HVB2_Batt7_cV13,HVB2_Batt7_cV14,HVB2_Batt7_cV15,HVB2_Batt7_cV16,HVB2_Batt7_cT1,HVB2_Batt7_cT2,HVB2_Batt7_cT3,HVB2_Batt7_cT4,HVB2_Batt7_cT5,HVB2_Batt7_cT6,HVB2_Batt7_Ah,HVB2_Batt8_SOH,HVB2_Batt8_cV1,HVB2_Batt8_cV2,HVB2_Batt8_cV3,HVB2_Batt8_cV4,HVB2_Batt8_cV5,HVB2_Batt8_cV6,HVB2_Batt8_cV7,HVB2_Batt8_cV8,HVB2_Batt8_cV9,HVB2_Batt8_cV10,HVB2_Batt8_cV11,HVB2_Batt8_cV12,HVB2_Batt8_cV13,HVB2_Batt8_cV14,HVB2_Batt8_cV15,HVB2_Batt8_cV16,HVB2_Batt8_cT1,HVB2_Batt8_cT2,HVB2_Batt8_cT3,HVB2_Batt8_cT4,HVB2_Batt8_cT5,HVB2_Batt8_cT6,HVB2_Batt8_Ah,HVB2_Batt9_SOH,HVB2_Batt9_cV1,HVB2_Batt9_cV2,HVB2_Batt9_cV3,HVB2_Batt9_cV4,HVB2_Batt9_cV5,HVB2_Batt9_cV6,HVB2_Batt9_cV7,HVB2_Batt9_cV8,HVB2_Batt9_cV9,HVB2_Batt9_cV10,HVB2_Batt9_cV11,HVB2_Batt9_cV12,HVB2_Batt9_cV13,HVB2_Batt9_cV14,HVB2_Batt9_cV15,HVB2_Batt9_cV16,HVB2_Batt9_cT1,HVB2_Batt9_cT2,HVB2_Batt9_cT3,HVB2_Batt9_cT4,HVB2_Batt9_cT5,HVB2_Batt9_cT6,HVB2_Batt9_Ah,HVB2_Batt10_SOH,HVB2_Batt10_cV1,HVB2_Batt10_cV2,HVB2_Batt10_cV3,HVB2_Batt10_cV4,HVB2_Batt10_cV5,HVB2_Batt10_cV6,HVB2_Batt10_cV7,HVB2_Batt10_cV8,HVB2_Batt10_cV9,HVB2_Batt10_cV10,HVB2_Batt10_cV11,HVB2_Batt10_cV12,HVB2_Batt10_cV13,HVB2_Batt10_cV14,HVB2_Batt10_cV15,HVB2_Batt10_cV16,HVB2_Batt10_cT1,HVB2_Batt10_cT2,HVB2_Batt10_cT3,HVB2_Batt10_cT4,HVB2_Batt10_cT5,HVB2_Batt10_cT6,HVB2_Batt10_Ah,HVB2_Batt11_SOH,HVB2_Batt11_cV1,HVB2_Batt11_cV2,HVB2_Batt11_cV3,HVB2_Batt11_cV4,HVB2_Batt11_cV5,HVB2_Batt11_cV6,HVB2_Batt11_cV7,HVB2_Batt11_cV8,HVB2_Batt11_cV9,HVB2_Batt11_cV10,HVB2_Batt11_cV11,HVB2_Batt11_cV12,HVB2_Batt11_cV13,HVB2_Batt11_cV14,HVB2_Batt11_cV15,HVB2_Batt11_cV16,HVB2_Batt11_cT1,HVB2_Batt11_cT2,HVB2_Batt11_cT3,HVB2_Batt11_cT4,HVB2_Batt11_cT5,HVB2_Batt11_cT6,HVB2_Batt11_Ah,HVB2_Batt12_SOH,HVB2_Batt12_cV1,HVB2_Batt12_cV2,HVB2_Batt12_cV3,HVB2_Batt12_cV4,HVB2_Batt12_cV5,HVB2_Batt12_cV6,HVB2_Batt12_cV7,HVB2_Batt12_cV8,HVB2_Batt12_cV9,HVB2_Batt12_cV10,HVB2_Batt12_cV11,HVB2_Batt12_cV12,HVB2_Batt12_cV13,HVB2_Batt12_cV14,HVB2_Batt12_cV15,HVB2_Batt12_cV16,HVB2_Batt12_cT1,HVB2_Batt12_cT2,HVB2_Batt12_cT3,HVB2_Batt12_cT4,HVB2_Batt12_cT5,HVB2_Batt12_cT6,HVB2_Batt12_Ah,HVB2_Batt13_SOH,HVB2_Batt13_cV1,HVB2_Batt13_cV2,HVB2_Batt13_cV3,HVB2_Batt13_cV4,HVB2_Batt13_cV5,HVB2_Batt13_cV6,HVB2_Batt13_cV7,HVB2_Batt13_cV8,HVB2_Batt13_cV9,HVB2_Batt13_cV10,HVB2_Batt13_cV11,HVB2_Batt13_cV12,HVB2_Batt13_cV13,HVB2_Batt13_cV14,HVB2_Batt13_cV15,HVB2_Batt13_cV16,HVB2_Batt13_cT1,HVB2_Batt13_cT2,HVB2_Batt13_cT3,HVB2_Batt13_cT4,HVB2_Batt13_cT5,HVB2_Batt13_cT6,HVB2_Batt13_Ah,HVB2_Batt14_SOH,HVB2_Batt14_cV1,HVB2_Batt14_cV2,HVB2_Batt14_cV3,HVB2_Batt14_cV4,HVB2_Batt14_cV5,HVB2_Batt14_cV6,HVB2_Batt14_cV7,HVB2_Batt14_cV8,HVB2_Batt14_cV9,HVB2_Batt14_cV10,HVB2_Batt14_cV11,HVB2_Batt14_cV12,HVB2_Batt14_cV13,HVB2_Batt14_cV14,HVB2_Batt14_cV15,HVB2_Batt14_cV16,HVB2_Batt14_cT1,HVB2_Batt14_cT2,HVB2_Batt14_cT3,HVB2_Batt14_cT4,HVB2_Batt14_cT5,HVB2_Batt14_cT6,HVB2_Batt14_Ah FROM $name_Table where year(DatetimeLocal)=$yy and month(DatetimeLocal)=$mm and day(DatetimeLocal)=$dd  order by DatetimeLocal ASC ";
	//print $qry;
	$objQuery1 = mysql_query($qry) or die("query error".mysql_error());

	$num_rows = mysql_num_rows($objQuery1);	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery1)) {
		 $data[$i]= $objResult['DatetimeLocal'].",".
$objResult['HVB2_Avg_Tamb'].",".
$objResult['HVB2_Avg_V'].",".
$objResult['HVB2_Batt_I'].",".
$objResult['HVB2_SOC'].",".
$objResult['HVB2_SOH'].",".
$objResult['HVB2_Remain_Batt_Ah'].",".
$objResult['HVB2_Batt_kW'].",".
$objResult['HVB2_Batt1_SOH'].",".
$objResult['HVB2_Batt1_cV1'].",".
$objResult['HVB2_Batt1_cV2'].",".
$objResult['HVB2_Batt1_cV3'].",".
$objResult['HVB2_Batt1_cV4'].",".
$objResult['HVB2_Batt1_cV5'].",".
$objResult['HVB2_Batt1_cV6'].",".
$objResult['HVB2_Batt1_cV7'].",".
$objResult['HVB2_Batt1_cV8'].",".
$objResult['HVB2_Batt1_cV9'].",".
$objResult['HVB2_Batt1_cV10'].",".
$objResult['HVB2_Batt1_cV11'].",".
$objResult['HVB2_Batt1_cV12'].",".
$objResult['HVB2_Batt1_cV13'].",".
$objResult['HVB2_Batt1_cV14'].",".
$objResult['HVB2_Batt1_cV15'].",".
$objResult['HVB2_Batt1_cV16'].",".
$objResult['HVB2_Batt1_cT1'].",".
$objResult['HVB2_Batt1_cT2'].",".
$objResult['HVB2_Batt1_cT3'].",".
$objResult['HVB2_Batt1_cT4'].",".
$objResult['HVB2_Batt1_cT5'].",".
$objResult['HVB2_Batt1_cT6'].",".
$objResult['HVB2_Batt1_Ah'].",".
$objResult['HVB2_Batt2_SOH'].",".
$objResult['HVB2_Batt2_cV1'].",".
$objResult['HVB2_Batt2_cV2'].",".
$objResult['HVB2_Batt2_cV3'].",".
$objResult['HVB2_Batt2_cV4'].",".
$objResult['HVB2_Batt2_cV5'].",".
$objResult['HVB2_Batt2_cV6'].",".
$objResult['HVB2_Batt2_cV7'].",".
$objResult['HVB2_Batt2_cV8'].",".
$objResult['HVB2_Batt2_cV9'].",".
$objResult['HVB2_Batt2_cV10'].",".
$objResult['HVB2_Batt2_cV11'].",".
$objResult['HVB2_Batt2_cV12'].",".
$objResult['HVB2_Batt2_cV13'].",".
$objResult['HVB2_Batt2_cV14'].",".
$objResult['HVB2_Batt2_cV15'].",".
$objResult['HVB2_Batt2_cV16'].",".
$objResult['HVB2_Batt2_cT1'].",".
$objResult['HVB2_Batt2_cT2'].",".
$objResult['HVB2_Batt2_cT3'].",".
$objResult['HVB2_Batt2_cT4'].",".
$objResult['HVB2_Batt2_cT5'].",".
$objResult['HVB2_Batt2_cT6'].",".
$objResult['HVB2_Batt2_Ah'].",".
$objResult['HVB2_Batt3_SOH'].",".
$objResult['HVB2_Batt3_cV1'].",".
$objResult['HVB2_Batt3_cV2'].",".
$objResult['HVB2_Batt3_cV3'].",".
$objResult['HVB2_Batt3_cV4'].",".
$objResult['HVB2_Batt3_cV5'].",".
$objResult['HVB2_Batt3_cV6'].",".
$objResult['HVB2_Batt3_cV7'].",".
$objResult['HVB2_Batt3_cV8'].",".
$objResult['HVB2_Batt3_cV9'].",".
$objResult['HVB2_Batt3_cV10'].",".
$objResult['HVB2_Batt3_cV11'].",".
$objResult['HVB2_Batt3_cV12'].",".
$objResult['HVB2_Batt3_cV13'].",".
$objResult['HVB2_Batt3_cV14'].",".
$objResult['HVB2_Batt3_cV15'].",".
$objResult['HVB2_Batt3_cV16'].",".
$objResult['HVB2_Batt3_cT1'].",".
$objResult['HVB2_Batt3_cT2'].",".
$objResult['HVB2_Batt3_cT3'].",".
$objResult['HVB2_Batt3_cT4'].",".
$objResult['HVB2_Batt3_cT5'].",".
$objResult['HVB2_Batt3_cT6'].",".
$objResult['HVB2_Batt3_Ah'].",".
$objResult['HVB2_Batt4_SOH'].",".
$objResult['HVB2_Batt4_cV1'].",".
$objResult['HVB2_Batt4_cV2'].",".
$objResult['HVB2_Batt4_cV3'].",".
$objResult['HVB2_Batt4_cV4'].",".
$objResult['HVB2_Batt4_cV5'].",".
$objResult['HVB2_Batt4_cV6'].",".
$objResult['HVB2_Batt4_cV7'].",".
$objResult['HVB2_Batt4_cV8'].",".
$objResult['HVB2_Batt4_cV9'].",".
$objResult['HVB2_Batt4_cV10'].",".
$objResult['HVB2_Batt4_cV11'].",".
$objResult['HVB2_Batt4_cV12'].",".
$objResult['HVB2_Batt4_cV13'].",".
$objResult['HVB2_Batt4_cV14'].",".
$objResult['HVB2_Batt4_cV15'].",".
$objResult['HVB2_Batt4_cV16'].",".
$objResult['HVB2_Batt4_cT1'].",".
$objResult['HVB2_Batt4_cT2'].",".
$objResult['HVB2_Batt4_cT3'].",".
$objResult['HVB2_Batt4_cT4'].",".
$objResult['HVB2_Batt4_cT5'].",".
$objResult['HVB2_Batt4_cT6'].",".
$objResult['HVB2_Batt4_Ah'].",".
$objResult['HVB2_Batt5_SOH'].",".
$objResult['HVB2_Batt5_cV1'].",".
$objResult['HVB2_Batt5_cV2'].",".
$objResult['HVB2_Batt5_cV3'].",".
$objResult['HVB2_Batt5_cV4'].",".
$objResult['HVB2_Batt5_cV5'].",".
$objResult['HVB2_Batt5_cV6'].",".
$objResult['HVB2_Batt5_cV7'].",".
$objResult['HVB2_Batt5_cV8'].",".
$objResult['HVB2_Batt5_cV9'].",".
$objResult['HVB2_Batt5_cV10'].",".
$objResult['HVB2_Batt5_cV11'].",".
$objResult['HVB2_Batt5_cV12'].",".
$objResult['HVB2_Batt5_cV13'].",".
$objResult['HVB2_Batt5_cV14'].",".
$objResult['HVB2_Batt5_cV15'].",".
$objResult['HVB2_Batt5_cV16'].",".
$objResult['HVB2_Batt5_cT1'].",".
$objResult['HVB2_Batt5_cT2'].",".
$objResult['HVB2_Batt5_cT3'].",".
$objResult['HVB2_Batt5_cT4'].",".
$objResult['HVB2_Batt5_cT5'].",".
$objResult['HVB2_Batt5_cT6'].",".
$objResult['HVB2_Batt5_Ah'].",".
$objResult['HVB2_Batt6_SOH'].",".
$objResult['HVB2_Batt6_cV1'].",".
$objResult['HVB2_Batt6_cV2'].",".
$objResult['HVB2_Batt6_cV3'].",".
$objResult['HVB2_Batt6_cV4'].",".
$objResult['HVB2_Batt6_cV5'].",".
$objResult['HVB2_Batt6_cV6'].",".
$objResult['HVB2_Batt6_cV7'].",".
$objResult['HVB2_Batt6_cV8'].",".
$objResult['HVB2_Batt6_cV9'].",".
$objResult['HVB2_Batt6_cV10'].",".
$objResult['HVB2_Batt6_cV11'].",".
$objResult['HVB2_Batt6_cV12'].",".
$objResult['HVB2_Batt6_cV13'].",".
$objResult['HVB2_Batt6_cV14'].",".
$objResult['HVB2_Batt6_cV15'].",".
$objResult['HVB2_Batt6_cV16'].",".
$objResult['HVB2_Batt6_cT1'].",".
$objResult['HVB2_Batt6_cT2'].",".
$objResult['HVB2_Batt6_cT3'].",".
$objResult['HVB2_Batt6_cT4'].",".
$objResult['HVB2_Batt6_cT5'].",".
$objResult['HVB2_Batt6_cT6'].",".
$objResult['HVB2_Batt6_Ah'].",".
$objResult['HVB2_Batt7_SOH'].",".
$objResult['HVB2_Batt7_cV1'].",".
$objResult['HVB2_Batt7_cV2'].",".
$objResult['HVB2_Batt7_cV3'].",".
$objResult['HVB2_Batt7_cV4'].",".
$objResult['HVB2_Batt7_cV5'].",".
$objResult['HVB2_Batt7_cV6'].",".
$objResult['HVB2_Batt7_cV7'].",".
$objResult['HVB2_Batt7_cV8'].",".
$objResult['HVB2_Batt7_cV9'].",".
$objResult['HVB2_Batt7_cV10'].",".
$objResult['HVB2_Batt7_cV11'].",".
$objResult['HVB2_Batt7_cV12'].",".
$objResult['HVB2_Batt7_cV13'].",".
$objResult['HVB2_Batt7_cV14'].",".
$objResult['HVB2_Batt7_cV15'].",".
$objResult['HVB2_Batt7_cV16'].",".
$objResult['HVB2_Batt7_cT1'].",".
$objResult['HVB2_Batt7_cT2'].",".
$objResult['HVB2_Batt7_cT3'].",".
$objResult['HVB2_Batt7_cT4'].",".
$objResult['HVB2_Batt7_cT5'].",".
$objResult['HVB2_Batt7_cT6'].",".
$objResult['HVB2_Batt7_Ah'].",".
$objResult['HVB2_Batt8_SOH'].",".
$objResult['HVB2_Batt8_cV1'].",".
$objResult['HVB2_Batt8_cV2'].",".
$objResult['HVB2_Batt8_cV3'].",".
$objResult['HVB2_Batt8_cV4'].",".
$objResult['HVB2_Batt8_cV5'].",".
$objResult['HVB2_Batt8_cV6'].",".
$objResult['HVB2_Batt8_cV7'].",".
$objResult['HVB2_Batt8_cV8'].",".
$objResult['HVB2_Batt8_cV9'].",".
$objResult['HVB2_Batt8_cV10'].",".
$objResult['HVB2_Batt8_cV11'].",".
$objResult['HVB2_Batt8_cV12'].",".
$objResult['HVB2_Batt8_cV13'].",".
$objResult['HVB2_Batt8_cV14'].",".
$objResult['HVB2_Batt8_cV15'].",".
$objResult['HVB2_Batt8_cV16'].",".
$objResult['HVB2_Batt8_cT1'].",".
$objResult['HVB2_Batt8_cT2'].",".
$objResult['HVB2_Batt8_cT3'].",".
$objResult['HVB2_Batt8_cT4'].",".
$objResult['HVB2_Batt8_cT5'].",".
$objResult['HVB2_Batt8_cT6'].",".
$objResult['HVB2_Batt8_Ah'].",".
$objResult['HVB2_Batt9_SOH'].",".
$objResult['HVB2_Batt9_cV1'].",".
$objResult['HVB2_Batt9_cV2'].",".
$objResult['HVB2_Batt9_cV3'].",".
$objResult['HVB2_Batt9_cV4'].",".
$objResult['HVB2_Batt9_cV5'].",".
$objResult['HVB2_Batt9_cV6'].",".
$objResult['HVB2_Batt9_cV7'].",".
$objResult['HVB2_Batt9_cV8'].",".
$objResult['HVB2_Batt9_cV9'].",".
$objResult['HVB2_Batt9_cV10'].",".
$objResult['HVB2_Batt9_cV11'].",".
$objResult['HVB2_Batt9_cV12'].",".
$objResult['HVB2_Batt9_cV13'].",".
$objResult['HVB2_Batt9_cV14'].",".
$objResult['HVB2_Batt9_cV15'].",".
$objResult['HVB2_Batt9_cV16'].",".
$objResult['HVB2_Batt9_cT1'].",".
$objResult['HVB2_Batt9_cT2'].",".
$objResult['HVB2_Batt9_cT3'].",".
$objResult['HVB2_Batt9_cT4'].",".
$objResult['HVB2_Batt9_cT5'].",".
$objResult['HVB2_Batt9_cT6'].",".
$objResult['HVB2_Batt9_Ah'].",".
$objResult['HVB2_Batt10_SOH'].",".
$objResult['HVB2_Batt10_cV1'].",".
$objResult['HVB2_Batt10_cV2'].",".
$objResult['HVB2_Batt10_cV3'].",".
$objResult['HVB2_Batt10_cV4'].",".
$objResult['HVB2_Batt10_cV5'].",".
$objResult['HVB2_Batt10_cV6'].",".
$objResult['HVB2_Batt10_cV7'].",".
$objResult['HVB2_Batt10_cV8'].",".
$objResult['HVB2_Batt10_cV9'].",".
$objResult['HVB2_Batt10_cV10'].",".
$objResult['HVB2_Batt10_cV11'].",".
$objResult['HVB2_Batt10_cV12'].",".
$objResult['HVB2_Batt10_cV13'].",".
$objResult['HVB2_Batt10_cV14'].",".
$objResult['HVB2_Batt10_cV15'].",".
$objResult['HVB2_Batt10_cV16'].",".
$objResult['HVB2_Batt10_cT1'].",".
$objResult['HVB2_Batt10_cT2'].",".
$objResult['HVB2_Batt10_cT3'].",".
$objResult['HVB2_Batt10_cT4'].",".
$objResult['HVB2_Batt10_cT5'].",".
$objResult['HVB2_Batt10_cT6'].",".
$objResult['HVB2_Batt10_Ah'].",".
$objResult['HVB2_Batt11_SOH'].",".
$objResult['HVB2_Batt11_cV1'].",".
$objResult['HVB2_Batt11_cV2'].",".
$objResult['HVB2_Batt11_cV3'].",".
$objResult['HVB2_Batt11_cV4'].",".
$objResult['HVB2_Batt11_cV5'].",".
$objResult['HVB2_Batt11_cV6'].",".
$objResult['HVB2_Batt11_cV7'].",".
$objResult['HVB2_Batt11_cV8'].",".
$objResult['HVB2_Batt11_cV9'].",".
$objResult['HVB2_Batt11_cV10'].",".
$objResult['HVB2_Batt11_cV11'].",".
$objResult['HVB2_Batt11_cV12'].",".
$objResult['HVB2_Batt11_cV13'].",".
$objResult['HVB2_Batt11_cV14'].",".
$objResult['HVB2_Batt11_cV15'].",".
$objResult['HVB2_Batt11_cV16'].",".
$objResult['HVB2_Batt11_cT1'].",".
$objResult['HVB2_Batt11_cT2'].",".
$objResult['HVB2_Batt11_cT3'].",".
$objResult['HVB2_Batt11_cT4'].",".
$objResult['HVB2_Batt11_cT5'].",".
$objResult['HVB2_Batt11_cT6'].",".
$objResult['HVB2_Batt11_Ah'].",".
$objResult['HVB2_Batt12_SOH'].",".
$objResult['HVB2_Batt12_cV1'].",".
$objResult['HVB2_Batt12_cV2'].",".
$objResult['HVB2_Batt12_cV3'].",".
$objResult['HVB2_Batt12_cV4'].",".
$objResult['HVB2_Batt12_cV5'].",".
$objResult['HVB2_Batt12_cV6'].",".
$objResult['HVB2_Batt12_cV7'].",".
$objResult['HVB2_Batt12_cV8'].",".
$objResult['HVB2_Batt12_cV9'].",".
$objResult['HVB2_Batt12_cV10'].",".
$objResult['HVB2_Batt12_cV11'].",".
$objResult['HVB2_Batt12_cV12'].",".
$objResult['HVB2_Batt12_cV13'].",".
$objResult['HVB2_Batt12_cV14'].",".
$objResult['HVB2_Batt12_cV15'].",".
$objResult['HVB2_Batt12_cV16'].",".
$objResult['HVB2_Batt12_cT1'].",".
$objResult['HVB2_Batt12_cT2'].",".
$objResult['HVB2_Batt12_cT3'].",".
$objResult['HVB2_Batt12_cT4'].",".
$objResult['HVB2_Batt12_cT5'].",".
$objResult['HVB2_Batt12_cT6'].",".
$objResult['HVB2_Batt12_Ah'].",".
$objResult['HVB2_Batt13_SOH'].",".
$objResult['HVB2_Batt13_cV1'].",".
$objResult['HVB2_Batt13_cV2'].",".
$objResult['HVB2_Batt13_cV3'].",".
$objResult['HVB2_Batt13_cV4'].",".
$objResult['HVB2_Batt13_cV5'].",".
$objResult['HVB2_Batt13_cV6'].",".
$objResult['HVB2_Batt13_cV7'].",".
$objResult['HVB2_Batt13_cV8'].",".
$objResult['HVB2_Batt13_cV9'].",".
$objResult['HVB2_Batt13_cV10'].",".
$objResult['HVB2_Batt13_cV11'].",".
$objResult['HVB2_Batt13_cV12'].",".
$objResult['HVB2_Batt13_cV13'].",".
$objResult['HVB2_Batt13_cV14'].",".
$objResult['HVB2_Batt13_cV15'].",".
$objResult['HVB2_Batt13_cV16'].",".
$objResult['HVB2_Batt13_cT1'].",".
$objResult['HVB2_Batt13_cT2'].",".
$objResult['HVB2_Batt13_cT3'].",".
$objResult['HVB2_Batt13_cT4'].",".
$objResult['HVB2_Batt13_cT5'].",".
$objResult['HVB2_Batt13_cT6'].",".
$objResult['HVB2_Batt13_Ah'].",".
$objResult['HVB2_Batt14_SOH'].",".
$objResult['HVB2_Batt14_cV1'].",".
$objResult['HVB2_Batt14_cV2'].",".
$objResult['HVB2_Batt14_cV3'].",".
$objResult['HVB2_Batt14_cV4'].",".
$objResult['HVB2_Batt14_cV5'].",".
$objResult['HVB2_Batt14_cV6'].",".
$objResult['HVB2_Batt14_cV7'].",".
$objResult['HVB2_Batt14_cV8'].",".
$objResult['HVB2_Batt14_cV9'].",".
$objResult['HVB2_Batt14_cV10'].",".
$objResult['HVB2_Batt14_cV11'].",".
$objResult['HVB2_Batt14_cV12'].",".
$objResult['HVB2_Batt14_cV13'].",".
$objResult['HVB2_Batt14_cV14'].",".
$objResult['HVB2_Batt14_cV15'].",".
$objResult['HVB2_Batt14_cV16'].",".
$objResult['HVB2_Batt14_cT1'].",".
$objResult['HVB2_Batt14_cT2'].",".
$objResult['HVB2_Batt14_cT3'].",".
$objResult['HVB2_Batt14_cT4'].",".
$objResult['HVB2_Batt14_cT5'].",".
$objResult['HVB2_Batt14_cT6'].",".
$objResult['HVB2_Batt14_Ah'];
        $i++;
	
	}
	
	 mysql_close($link);	
//$name_Table="main_hccu_table";
$Zip_filename="string2_battery_".$yy.$mm.$dd.".zip";
$csv_filename="string2_battery_".$yy.$mm.$dd.".csv";
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

