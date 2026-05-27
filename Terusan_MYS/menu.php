<?php
if($_COOKIE['id'] == "")
 {
  header( "Location: http://www.leonics-moc.com/index22.php");
  exit();
 }

 if (!(($_COOKIE['mocs'] == "company160"  or $_COOKIE['mocs'] == "allcompany" )))
{
	header( "Location: http://www.leonics-moc.com/index22.php");
    exit();
}  

?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Leonics monitoring and Operation Center</title>
<style type="text/css">
a:focus{color:#fff;
}
.active {
  background-color: transparent;
  border-color:transparent; 
}
.visited {
  background-color: transparent;
  border-color:transparent; 
}
</style>

<script src="f1/js/jquery-latest.js"></script>
<script>
$(function(){
	
    $("nav").click(function(){ 
  // alert($(window).width());    
 	 if(($(window).width())<=1031){ 
	//  alert($(window).width()); 
      	  $(".me_1").toggleClass('closed');
  	}
    });
});
/*function myFunction(a) {
	
	switch(a) {
	  case 1:
	      var objtxt = document.getElementById("txt");
	      objtxt.innerHTML ="Nodex System 1 phase, Indonesia";
	    break;
	  case 2:
	      var objtxt = document.getElementById("txt");
	      objtxt.innerHTML ="Nodex System 3 phase, Indonesia";
	    break;
	  default:
	     var objtxt = document.getElementById("txt");
	      objtxt.innerHTML ="Nodex System 3 phase, Indonesia";
}
}*/
</script>
<link href="f1/boilerplate.css" rel="stylesheet" type="text/css">
<link href="f1/menu.css" rel="stylesheet" type="text/css">
<script src="f1/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="f1/SpryAssets/xpath.js" type="text/javascript"></script>
<script src="f1/SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="f1/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!--Load Xml------------------------------------------------------------------------------>
<script type="text/javascript"> 
url1 = 'f1/Xml/Main.xml' + "?" + new Date().getTime();
var Plant = new Spry.Data.XMLDataSet(url1,"Main",{method:"POST",useCache:false,loadInterval:2000});
</script>
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="f1/respond.min.js"></script>
</head>
<body>
<div id="logo"><img src="f1/image/leo.svg"> Monitoring and Operation Center</div>
<div id="logo2"></div>
<div id="line"><hr class="new1"></div>
<div id="menu" >
<nav>
	<div id="pic" align="center"></div>
        <div class="menu_1">
          <div class="openbtn"  >☰</div>
                  <div class="me_1">
                   <ul class="m-list">
                   <li> <a href="f1/plant.html" target="IF_m">Dashboard</a></li>
                   <li> <a href="f1/BDI3.php" target="IF_m">BDI</a></li>
                   <li> <a href="f1/GCI.php" target="IF_m">GCI</a></li>
                   <li> <a href="f1/SCC.php" target="IF_m">SCC</a></li>
                   <li> <a href="f1/Meter.php" target="IF_m">Meter</a></li>
                   <li> <a href="f1/Gen.php" target="IF_m">Gen</a></li>  
                   <li> <a href="f1/Graph_batt/Batt.html" target="IF_m">Battery</a></li>
                   <li> <a href="f1/graph.php" target="IF_m">Power</a></li>
                   <li> <a href="f1/graph_energy.php" target="IF_m">Energy</a></li>
                   <li> <a href="f1/data/data.php" target="IF_m">Download</a></li>
            </ul>
           </div>
          </div>
</nav>
</div>
<div id="Tim" spry:region="Plant"><a href="../logout.php"  target="_parent"><img src="f1/image/logout2.png"></a></div>
<div id="Txt_head"><table width="100%" border="0">
 <tr>
  <td class="styleL" align="left" width="45%">Site name</td>
  <td class="styleL" align="left" width="10%">&nbsp;</td>
  <td class="styleL" align="right" width="35%">Last updated&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 </tr>
 <tr>
  <td class="styleL2" align="left" width="45%">Terusan, Sabah, Malaysia</td>
  <td class="styleL2" align="left" width="10%">&nbsp;</td>
  <td class="styleL2" align="right" width="35%" spry:region="Plant">{DateServer}&nbsp;{TimeServer}</td>
 </tr>
</table>       
</div>
<div id="main">
  <iframe  Name="IF_m" src="f1/plant.html"  width="100%" height="100%" scrolling="no" frameborder="0"></iframe>
</div>
</body>
</html>
