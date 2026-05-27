<?php
$n_rec = $_POST["RadioGroup1"];
$d1 = $_POST["d1"];
$m1 = $_POST["m1"];
$y1 = $_POST["y1"];
$d2 = $_POST["d2"];
$m2 = $_POST["m2"];
$y2 = $_POST["y2"];
$dx = $y1.$m1.$d1."000000";
$dy = $y2.$m2.$d2."235959";
header('Content-disposition: attachment; filename=Kampong.csv');
header('Content-type: text/csv');
//Set Proper output content-type
    include("DBConn.php");
//Connect to the DB
    $link = connectToDB();
// delete outfile if exist
    if (file_exists("c:/wamp/www/Kampong/f1/Download/Kampong.csv"))
    unlink("c:/wamp/www/Kampong/f1/Download/Kampong.csv");
// Fetch records to file
   if ($n_rec == 9)
   {
    $strQuery = "select Datetimeserverhccu,SCM1_PvV,SCM1_PvI,SCM1_BatV,SCM1_ChgI,SCM1_CGPwr_kW,SCM2_PvV".
",SCM2_PvI,SCM2_BatV,SCM2_ChgI,SCM2_CGPwr_kW,Batt_V,Batt_I,ISC_ExtCG_I,Gen_Voltage_L1,Gen_Voltage_L2,".
"Gen_Voltage_L3,Gen_Current_I1,Gen_Current_I2,Gen_Current_I3,Gen_Power1_kW,Gen_Power2_kW,Gen_Power3_kW,LoadVoltage_L1,".
"LoadVoltage_L2,LoadVoltage_L3,LoadCurrent_I1,LoadCurrent_I2,LoadCurrent_I3,LoadPower_kW1,LoadPower_kW2,LoadPower_kW3,".
"GTP1_PvV,GTP1_PvI,GTP1_PvP_kW_cal,GTP1_Voltage_L1,GTP1_Voltage_L2,GTP1_Voltage_L3,GTP1_Current_I1,GTP1_Current_I2,".
"GTP1_Current_I3,GTP1_Power1_kW,GTP1_Power2_kW,GTP1_Power3_kW,GTP2_PvV,GTP2_PvI,GTP2_Voltage_L1,".
"GTP2_Voltage_L2,GTP2_Voltage_L3,GTP2_Current_I1,GTP2_Current_I2,GTP2_Current_I3,GTP2_Power1_kW,GTP2_Power2_kW,".
"GTP2_Power3_kW,Aload_Voltage_L1,Aload_Voltage_L2,Aload_Voltage_L3,Aload_Current_I1,Aload_Current_I2,Aload_Current_I3,".
"Aload_Power1_kW,Aload_Power2_kW,Aload_Power3_kW".
" from main_server_table where Datetimeserverhccu >= $dx and Datetimeserverhccu <= $dy order by Datetimeserverhccu asc into outfile 'c:/wamp/www/Kampong/f1/Download/Kampong.csv' fields terminated by ' ' LINES TERMINATED BY '\r\n'";
    $result = mysql_query($strQuery) or die(mysql_error());
    mysql_close($link);
   }
   else
   {
    $strQuery = "select select Datetimeserverhccu,SCM1_PvV,SCM1_PvI,SCM1_BatV,SCM1_ChgI,SCM1_CGPwr_kW,SCM2_PvV".
",SCM2_PvI,SCM2_BatV,SCM2_ChgI,SCM2_CGPwr_kW,Batt_V,Batt_I,ISC_ExtCG_I,Gen_Voltage_L1,Gen_Voltage_L2,".
"Gen_Voltage_L3,Gen_Current_I1,Gen_Current_I2,Gen_Current_I3,Gen_Power1_kW,Gen_Power2_kW,Gen_Power3_kW,LoadVoltage_L1,".
"LoadVoltage_L2,LoadVoltage_L3,LoadCurrent_I1,LoadCurrent_I2,LoadCurrent_I3,LoadPower_kW1,LoadPower_kW2,LoadPower_kW3,".
"GTP1_PvV,GTP1_PvI,GTP1_PvP_kW_cal,GTP1_Voltage_L1,GTP1_Voltage_L2,GTP1_Voltage_L3,GTP1_Current_I1,GTP1_Current_I2,".
"GTP1_Current_I3,GTP1_Power1_kW,GTP1_Power2_kW,GTP1_Power3_kW,GTP2_PvV,GTP2_PvI,GTP2_Voltage_L1,".
"GTP2_Voltage_L2,GTP2_Voltage_L3,GTP2_Current_I1,GTP2_Current_I2,GTP2_Current_I3,GTP2_Power1_kW,GTP2_Power2_kW,".
"GTP2_Power3_kW,Aload_Voltage_L1,Aload_Voltage_L2,Aload_Voltage_L3,Aload_Current_I1,Aload_Current_I2,Aload_Current_I3,".
"Aload_Power1_kW,Aload_Power2_kW,Aload_Power3_kW".
" from main_server_table order by Datetimeserverhccu desc limit $n_rec into outfile 'c:/wamp/www/Kampong/f1/Download/Kampong.csv' fields terminated by ' ' LINES TERMINATED BY '\r\n'";
    $result = mysql_query($strQuery) or die(mysql_error());
    mysql_close($link);
   }

   if (filesize("c:/wamp/www/Kampong/f1/Download/Kampong.csv") == 0)
   {
    echo "No data found";
   }
   else
   {
    readfile("c:/wamp/www/Kampong/f1/Download/Kampong.csv");
   }

?>