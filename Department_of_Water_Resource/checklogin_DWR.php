<?php
ob_start();

mysql_connect ("localhost","root","")
//mysql_connect ("192.168.30.10","root","leonics")
or die ("can not connect to your hosting");
mysql_select_db ("dwr_rbr")
//mysql_select_db ("memberleo")
or die ("can not connect to your database");

//include ("f1/Includes/DBConn.php");
$user1 = mysql_real_escape_string($_POST["username"]);
$password1 = mysql_real_escape_string($_POST["password"]);
//print $user1."=".$password1;
//exit();
if ($user1 == "" or $password1 == "" ) 
{			//print "sss";exit();
		header("location: login.html");
}else{
		
		$strSQL = "SELECT * FROM login WHERE user = '$user1' and password = '$password1' ";
		$objQuery = mysql_query($strSQL)
		or die("query error".mysql_error());
		
		$objResult = mysql_fetch_array($objQuery);
		
		$id = $objResult["id"];
		$auth = $objResult["auth"];
		$user = $objResult["user"];
		// password cookie removed for security
		
		if($id==null)
		{
				header("location: login.html");
				exit();
		}
		
		setcookie ('id',$id);
		setcookie ('auth',$auth);
		setcookie ('user',$user);
		
		
				if ($user == $user1)
				{
					//print $user ."==".$user1 ."==". $password."==".$password1; 
					header("location: ./index.php");
				}else{
					//print $user ."==".$user1 ."==". $password."==".$password1; 
					//exit();
					header("location: ./login.html");
				}

}

?>