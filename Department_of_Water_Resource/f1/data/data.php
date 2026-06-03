<?php
if($_POST==null){
	$y1=date('Y');
	$m=date('m');
	$d=date('d');
	$table="";
}else{
	$y1=$_POST["y"];
	$m=$_POST["m"];
	$d=$_POST["d"];
	$table=$_POST["txt_table"];
} 
$nd=0;
switch ($m){
	case "01":
		$m1="Jan";
		$nd=31;
	break;
	case "02":
		$m1="Feb";
		if(($y1%4)==0){$nd=29;}else{$nd=28;}
	break;
	case "03":
		$m1="Mar";
		$nd=31;
	break;
	case "04":
		$m1="Apr";
		$nd=30;
	break;
	case "05":
		$m1="May";
		$nd=31;
	break;
	case "06":
		$m1="Jun";
		$nd=30;
	break;
	case "07":
		$m1="Jul";
		$nd=31;
	break;
	case "08":
		$m1="Aug";
		$nd=31;
	break;
	case "09":
		$m1="Sep";
		$nd=30;
	break;
	case "10":
		$m1="Oct";
		$nd=31;
	break;
	case "11":
		$m1="Nov";
		$nd=30;
	break;
	case "12":
		$m1="Dec";
		$nd=31;
	break;
}
$yy1=date('Y');
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
<link href="../boilerplate.css" rel="stylesheet" type="text/css">
<link href="../css/log.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
	input[type=text] , select {
	    width: 90%;
	    border: 1px solid #22869f;
	    padding: 3px 3px;
	    margin: 2px 0;
	    box-sizing: border-box;
	    border-radius: 3px;
	    background-color:#c6effa;
	}
	input[type=submit] {
	  width: 70px;
	  background-color: #0984b2;
	  color: white;
	  text-align:center;
	  padding: 4px 4px;
	  margin: 2px 0;
	  border: none;
	  border-radius: 2px;
	  cursor: pointer;
	}
	input[type=submit]:hover { background-color: #0ba2da;}
	.style1 {font-family:Arial, Helvetica, sans-serif ;  letter-spacing: 0.01em;  font-size:0.6em;  font-weight: bold;color: #000000;font-weight: normal;}

@media only screen and (min-width: 700px) {
	input[type=text] , select {
	    width: 90%;
	    border: 1px solid #22869f;
	    padding: 7px 7px;
	    margin: 4px 0;
	    box-sizing: border-box;
	    border-radius: 3px;
	    background-color:#c6effa;
	}
	input[type=submit] {
	  width: 70px;
	  background-color: #0984b2;
	  color: white;
	  text-align:center;
	  padding: 9px 9px;
	  margin: 4px 0;
	  border: none;
	  border-radius: 2px;
	  cursor: pointer;
	}
	input[type=submit]:hover { background-color: #0ba2da;}
	.style1 {font-family:Arial, Helvetica, sans-serif ;  letter-spacing: 0.01em;  font-size:1.05em;  font-weight: bold;color: #000000;font-weight: normal;}
}
</style>

<title>data</title>
<script>
function myFunction() {
    setTimeout(function () {
        window.history.back();
    }, 500);
}
</script>
</head>
<body>
<div id="head">
<form id="form1" name="form1" method="POST" action="data.php">
<table width="100%" border="0">
  <tr>
    <td colspan="5" class="style1"><strong>Select Historical Data table to download</strong></td>
  </tr>
  <tr>
    <td  class="style1" align="left">&nbsp;&nbsp;Table</td>
    <td  class="style1" align="left"><div id="day_txt">&nbsp;&nbsp;Day</div></td>
    <td  class="style1" align="left">&nbsp;&nbsp;Month</td>
    <td  class="style1" align="left">&nbsp;&nbsp;Year</td>
    <td  class="style1" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td class="style1" >
      <select name="txt_table" id="txt_table"  onchange="myFunction();">
        <option value="Main">Main</option>
        <option value="Battery1">String1 Battery</option>
        <option value="Battery2">String2 Battery</option>
        <option value="Energylog">Energylog</option>
      </select>
    </td>
    <script>
function myFunction() {
  var x = document.getElementById("txt_table").value;
  if(x=="Energylog"){
 	 document.getElementById("txt_day").style.display = "none";
 	 document.getElementById("day_txt").style.display  = "none";
  }else{
  	 document.getElementById("txt_day").style.display  = "block";
 	 document.getElementById("day_txt").style.display  = "block";
  }
}
</script>
    <!--td class="style1" align="left">
  	<div id="txt_day">
        	<select name="d" id="d" >
                <option value="<--?php print $d; ?>"><--?php print $d; ?></option>
                <--?php for($i=1;$i<=$nd;$i++){?>
                <option value="<--?php print $i;?>"><--?php print $i;?></option>
                <--?php }?>
              </select>
        </div>
    </td-->
    <td class="style1" align="left">
  	<div id="txt_day">
        	<select name="d" id="d" > 
        	<option value="<?php print $d; ?>"><?php print $d; ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
        </div>
    </td>
    <td class="style1" align="left">
      <select name="m" id="m" >
        <option value="<?php print $m; ?>"><?php print $m1; ?></option>
        <option value="01">Jan</option>
        <option value="02">Feb</option>
        <option value="03">Mar</option>
        <option value="04">Apr</option>
        <option value="05">May</option>
        <option value="06">Jun</option>
        <option value="07">Jul</option>
        <option value="08">Aug</option>
        <option value="09">Sep</option>
        <option value="10">Oct</option>
        <option value="11">Nov</option>
        <option value="12">Dec</option>
      </select>
    </td>
    
     <td class="style1" align="left">
      <select name="y" id="y" >
        <option value="<?php print $y1; ?>"><?php print $y1; ?></option>
        <?php for($i=2026;$i<=$yy1;$i++){?>
        <option value="<?php print $i;?>"><?php print $i;?></option>
        <?php }?>
      </select></td>
    <td class="style1" align="left">
      <input type="submit" name="button" id="button" value="Submit" />
    </td>
  </tr>
</table>
</form>
</div>
<div id="data">
 <?php
 switch ($table) {
	case "Main":
 ?>      
  <iframe   src="Download/dlrecord_data.php?y=<?php print $y1;?>&m=<?php print $m;?>&d=<?php print $d;?>" scrolling="no" frameborder="0"></iframe>
  <?php	
    break;
	case "Battery1":
  ?>
  <iframe   src="Download/dlrecord_battery1.php?y=<?php print $y1;?>&m=<?php print $m;?>&d=<?php print $d;?>"  scrolling="no" frameborder="0"></iframe>
  <?php	
    break;
	case "Battery2":
  ?>
  <iframe   src="Download/dlrecord_battery2.php?y=<?php print $y1;?>&m=<?php print $m;?>&d=<?php print $d;?>"  scrolling="no" frameborder="0"></iframe>
  <?php	
    break;
	case "Energylog":
  ?>
  <iframe   src="Download/dlrecord_log.php?y=<?php print $y1;?>&m=<?php print $m;?>" scrolling="no" frameborder="0"></iframe>  <?php	
    break;
     default:
  ?>

  <iframe   src=""  scrolling="no" frameborder="0"></iframe>
  <?php     
     break;
}
  ?>
</div>
</body>
</html>
