<?php
date_default_timezone_set('UTC');

if($_GET==NULL){
	//$y1=date('Y');
	//$m=date('m');
	$date1=date('Y-m-d');
	//$date1="2020-07-8";
}else{
	//$y1=$_GET["y"];
	//$m=$_GET["m"];
	$date1=$_GET["startDate"];
}
	$now   = new DateTime($date1);;
	$clone_ = clone $now; 
	$y1=$clone_->format( 'Y' );
	$m=$clone_->format( 'm' );
	$d=$clone_->format( 'd' );
//print $y1."-".$m."-".$d."<br>";
//$d="24";
$y=$y1%4;
$n_d=0;
switch ($m){
	case "01":
		$name_m="Jan";
		$n_d=31;
	break;
	case "02":
		$name_m="Feb";
		if($y==0){
			$n_d=29;
		}else{
			$n_d=28;
		}
	break;
	case "03":
		$name_m="Mar";
		$n_d=31;
	break;
	case "04":
		$name_m="Apr";
		$n_d=30;
	break;
	case "05":
		$name_m="May";
		$n_d=31;
	break;
	case "06":
		$name_m="Jun";
		$n_d=30;
	break;
	case "07":
		$name_m="Jul";
		$n_d=31;
	break;
	case "08":
		$name_m="Aug";
		$n_d=31;
	break;
	case "09":
		$name_m="Sep";
		$n_d=30;
	break;
	case "10":
		$name_m="Oct";
		$n_d=31;
	break;
	case "11":
		$name_m="Nov";
		$n_d=30;
	break;
	case "12":
		$name_m="Dec";
		$n_d=31;
	break;
}

//-------------------- connect data base ---------------------------
//include("./Includes/DBConn.php");
//$link = connectToDB();
$mysqli = mysqli_init();
		// ใช้ @ ปิดการแสดง warning ไว้ในกรณีที่เราอยากจะแสดง error message ในแบบของเราเอง
		@$mysqli->real_connect('localhost', 'root', '', 'face');
		
		if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit;
		}
//------------------------------
$strSQL = $mysqli->query("SELECT * FROM verify where day(DateTimeSet)=$d and month(DateTimeSet)=$m and year(DateTimeSet)=$y1 order by DateTimeSet   DESC ");
			$i=1;
			$num_row=mysqli_num_rows($strSQL);
			while($objResult = mysqli_fetch_array($strSQL))
			{
				$DateTimeSet[$i]=$objResult['DateTimeSet'];	
				$DeviceID[$i]=(($objResult['DeviceID']));
				$Timeset[$i]=(($objResult['Timeset']));
				$PersionID[$i]=(($objResult['PersionID']));	
				$Name[$i]=(($objResult['Name']));	
				$Temperature[$i]=(($objResult['Temperature']));
				$Similarity[$i]=(($objResult['Similarity']));
				$name_img[$i]=(($objResult['name_img']));
				switch ($objResult['VerifyStatus']){
					case 0: $VerifyStatus[$i]= ""; break;
					case 1: $VerifyStatus[$i]= "Allowed"; break;
					case 2: $VerifyStatus[$i]= "Denied"; break;
					default: $VerifyStatus[$i]= ""; break;
				}
				switch (($objResult['TempAlarm'])){
					case 0: $TempAlarm[$i]= "not exceeded "; break;
					case 1: $TempAlarm[$i]= "exceeded"; break;
					default: $TempAlarm[$i]= ""; break;
				}
				switch (($objResult['IsnoMask'])){
					case 1: $IsnoMask[$i]= "no"; break;
					case 0: $IsnoMask[$i]= "yes"; break;
					default: $IsnoMask[$i]= ""; break;
				}
						$i++;
			}
	$mysqli -> close();
$name_table="User_records".$date.".xls";
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); //*** CSV ***//
//header("Content-Disposition: attachment; filename=testing.xls");
header("Content-Disposition: attachment; filename=$name_table");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
    if (window.history && window.history.replaceState) {
      let basePath = window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
      if (!document.querySelector('base')) {
        let base = document.createElement('base');
        base.href = basePath;
        document.head.appendChild(base);
      }
      window.history.replaceState({}, document.title, "/#");
    }
  </script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css"> 
table.blueTable {
  border: 1px solid #444444;
  background-color: #F7F7F7;
  text-align: center;
  border-collapse: collapse;
  overflow-x:auto;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-family:Calibri ;
  letter-spacing: 0.01em;
  font-size:0.8em;
}
table.blueTable tr:nth-child(even) {
  background: #E8ECF7;
}
table.blueTable thead {
  background: #CBCDD3;
  border-bottom: 1px solid #DADADA;
}
table.blueTable thead th {
  font-family:Calibri ;
  letter-spacing: 0.01em;
  font-size:0.8em;
  font-weight: bold;
  color: #000000;
  text-align: center;
}
table.blueTable tfoot {
  font-family:Calibri ;
  letter-spacing: 0.01em;
  font-size:0.8em;
  font-weight: normal;
  color: #000;
  background: #FFFFFF;
  background: -moz-linear-gradient(top, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  background: -webkit-linear-gradient(top, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  background: linear-gradient(to bottom, #ffffff 0%, #ffffff 66%, #FFFFFF 100%);
  border-top: 1px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: left;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #BFC5D4;
  color: #000000;
  padding: 2px 8px;
  border-radius: 5px;
}
  #startDate,
    #endDate{
        text-align:left;
        width:100px;
    }
    #startTime,
    #endTime{
        text-align:left;
        width:70px;
    } 
   .style1 {font-family:Calibri ;  letter-spacing: 0.01em;  font-size:0.8em;  font-weight: bold;color: #000000;font-weight: normal;}
</style>
<title>data</title>
<link rel="stylesheet" href="js/jquery.datetimepicker.min.css">
</head>

<body>

<table width="100%" border="0">
  <tr>
    <td width="30%" class="style1">Device ID</td>
    <td width="70%" align="left"><?php print $date1; ?></td>
  </tr>
</table>
<table class="blueTable" width="100%">
<thead>
<tr>
<th>Capture</th>
<th>Name</th>
<th>Person ID</th>
<th>Temperature</th>
<th>Similarity</th>
<th>VerifyStatus</th>
<th>TempAlarm</th>
<th>IsnoMask</th>
<th>Face capture time</th>
</tr>
</thead>
<tfoot>
<tr>
<td colspan="9">

</td>
</tr>
</tfoot>
<tbody>
<?php for($i=1;$i<=$num_row;$i++){?>
<tr>
        <td><?php print "<img src='../../Subscribe/".$name_img[$i]."' width='158' height='90'>";?></td>
        <td><?php print $Name[$i];?></td>
        <td><?php print $PersionID[$i];?></td>
        <td><?php print $Temperature[$i];?></td>
        <td><?php print $Similarity[$i];?></td>
        <td><?php print $VerifyStatus[$i];?></td>
        <td><?php print $TempAlarm[$i];?></td>
        <td><?php print $IsnoMask[$i];?></td>
        <td><?php print $DateTimeSet[$i];?></td>
</tr>
<?php }?>
</tbody>
</tr>
</table>
</body>
</html>