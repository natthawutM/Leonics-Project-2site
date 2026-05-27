
<?php

//คำสั่ง connect db เขียนเพิ่มเองนะ
//include("cn_db.php");


header ( "Content-type: application/vnd.ms-excel" );
header ( "Content-Disposition: attachment; filename=ddd.xls" );


/* $sql=mysql_query("select godate, gomonth, goyear, gotime, backdate, backmonth, backyear, backtime, place,		        
							,user, mgo, mback, distance, authorized, carnumber, cardriver, otherdrive, note 
							from tbl_cartimeline order by godate desc");
$num=mysql_num_rows($sql); */
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<strong>รายงานการใช้รถยนต์ส่วนราชการ วันที่ <?php echo date("d/m/Y");?> </strong><br>
<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">

<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
<tr>
		   <td width="90" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">วันไป</font></td>
           <td width="90" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">เดือนไป</font></td>
           <td width="90" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">ปีไป</font></td>
           <td width="90" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">เวลาไป</font></td>
           <td width="90" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">วันกลับ</font></td>
            <td width="90" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">เดือนกลับ</font></td>
           <td width="90" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">ปีกลับ</font></td>
           <td width="90" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">เวลากลับ</font></td>
           <td width="100" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">สถานที่ไป</font></td>
           <td width="100" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">ผู้ขอใช้รถยนต์</font></td>
           <td width="100" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">ไมค์ไป</font></td>
           <td width="100" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">ไมค์กลับ</font></td>
           <td width="100" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">ระยะทาง</font></td>
           <td width="50" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">ผู้อนุมัติ</font></td>
           <td width="100" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">ทะเบียนรถยนต์</font></td>
           <td width="130" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">พนักงานขับรถยนต์</font></td>
           <td width="130" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">คนขับรถอื่นๆ</font></td>
           <td width="250" align="center" bgcolor="#CCCCCC"><font color="#000000" size="2">หมายเหตุ</font></td>
</tr>

<?php
if($num>0){
while($row=mysql_fetch_array($sql)){
?>

<tr>

        <td ><?php echo strip($row['godate']);?></td>
        <td ><?php echo strip($row['gomonth']);?></td>
        <td ><?php echo strip($row['goyear']);?></td>
        <td ><?php echo strip($row['gotime']);?></td> 
        <td ><?php echo strip($row['backdate']);?></td>
        <td ><?php echo strip($row['backmonth']);?></td>
        <td ><?php echo strip($row['backyear']);?></td>
        <td ><?php echo strip($row['backtime']);?></td> 
		<td ><?php echo strip($row['place']);?></td>
		<td ><?php echo strip($row['user']);?></td>
		<td ><?php echo strip($row['mgo']);?></td>
		<td ><?php echo strip($row['mback']);?></td>
		<td ><?php echo strip($row['distance']);?></td>				
		<td ><?php echo strip($row['authorized']);?></td>				
		<td ><?php echo strip($row['carnumber']);?></td>				
		<td ><?php echo strip($row['cardriver']);?></td>
		<td ><?php echo strip($row['otherdrive']);?></td>			
		<td ><?php echo strip($row['note']);?></td>				

    </tr>
<?php

}

}

?>

</table>
</div>

</body>
</html>