<!DOCTYPE html>
<html lang="en">

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

    <meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Water Resource</title>
    <script type="text/javascript" src="./pass.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css?v2" media="screen">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css" media="screen">
    <link href="f1/css/menu.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.5.1.min.js"></script>
   
    <script src="js/fontawesome.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sha256.js"></script>
<script src="f1/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="f1/SpryAssets/xpath.js" type="text/javascript"></script>
<script src="f1/SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="f1/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!--Load Xml------------------------------------------------------------------------------>
<script type="text/javascript"> 
url1 = 'f1/Xml/Main.xml' + "?" + new Date().getTime();
var Plant = new Spry.Data.XMLDataSet(url1,"Main",{method:"POST",useCache:false,loadInterval:2000});

</script>
</head>
<style type="text/css"> 
<!--
<!--
.mainFr{
   margin-left: 0px;
   margin-top:10px	
}
body {
	margin-top: 0px;
	background-color: #000;
}
/* Mobile Layout: 480px and below. */
.pic{
	padding-left:5vw;
	padding-top:25px;
	background:#fff;
}
#main {
	clear: both;
	float: left;
	margin-left: 15px;
	width: 95vw;
	display: block;
	padding-top:0px;
	height:1500px;	
}
.style3 {font-family: Arial, Helvetica, sans-serif ;font-size: 4px;color: #FFF;font-weight: normal;}
.style2 {font-family: Arial, Helvetica, sans-serif ;font-size: 4px;color: #000;font-weight: normal;}
.style1 {font-family:Arial, Helvetica, sans-serif ;font-size: 4px; color:#0ca0cb;font-weight: normal;}
}
@media only screen and (min-width: 481px) {
.pic{
	padding-left:5vw;
	padding-top:25px;
	background:#fff;
}
#main {
	clear: both;
	float: left;
	margin-left: 15px;
	width: 95vw;
	display: block;
	padding-top:0px;
	height:1500px;	
}
.style3 {font-family: Arial, Helvetica, sans-serif ;font-size: 6px;color: #FFF;font-weight: normal;}
.style2 {font-family: Arial, Helvetica, sans-serif ;font-size: 6px;color: #000;font-weight: normal;}
.style1 {font-family:Arial, Helvetica, sans-serif ;font-size: 6px; color:#0ca0cb;font-weight: normal;}
}
@media only screen and (min-width: 550px) {
.pic{
	padding-left:6vw;
	padding-top:35px;
	background:#fff;
}
#main {
	clear: both;
	float: left;
	margin-left: 20px;
	width: 100vw;
	display: block;
	top:0px;
	height:1500px;
}
.style3 {font-family: Arial, Helvetica, sans-serif ;font-size: 8px;color: #FFF;font-weight: normal;}
.style2 {font-family: Arial, Helvetica, sans-serif ;font-size: 8px;color: #000;font-weight: normal;}
.style1 {font-family:Arial, Helvetica, sans-serif ;font-size: 8px; color:#0ca0cb;font-weight: normal;}
}
@media only screen and (min-width: 800px) {
.pic{
	padding-left:6vw;
	padding-top:45px;
	background:#fff;
}
#main {
	clear: both;
	float: left;
	margin-left: 40px;
	width: 100vw;
	display: block;
	margin-top:0px;
	height:1500px;
}
.style3 {font-family: Arial, Helvetica, sans-serif ;font-size: 12px;color: #FFF;font-weight: normal;}
.style2 {font-family: Arial, Helvetica, sans-serif ;font-size: 12px;color: #000;font-weight: normal;}
.style1 {font-family:Arial, Helvetica, sans-serif ;font-size: 12px; color:#0ca0cb;font-weight: normal;}
}
@media only screen and (min-width: 900px) {
.pic{
	padding-left:6vw;
	padding-top:45px;
	background:#fff;
}
#main {
	clear: both;
	float: left;
	margin-left: 80px;
	width: 100vw;
	display: block;
	margin-top:-14px;
	height:1500px;
}
.style3 {font-family: Arial, Helvetica, sans-serif ;font-size: 16px;color: #FFF;font-weight: normal;}
.style2 {font-family: Arial, Helvetica, sans-serif ;font-size: 16px;color: #000;font-weight: normal;}
.style1 {font-family:Arial, Helvetica, sans-serif ;font-size: 16px; color:#0ca0cb;font-weight: normal;}
}
@media only screen and (min-width: 1300px) {
.pic{
	padding-left:6vw;
	padding-top:45px;
	background:#fff;
}
#main {
	clear: both;
	float: left;
	margin-left: 80px;
	width: 100vw;
	display: block;
	margin-top:-14px;
	height:1500px;
}
.style3 {font-family: Arial, Helvetica, sans-serif ;font-size: 16px;color: #FFF;font-weight: normal;}
.style2 {font-family: Arial, Helvetica, sans-serif ;font-size: 16px;color: #000;font-weight: normal;}
.style1 {font-family:Arial, Helvetica, sans-serif ;font-size: 16px; color:#0ca0cb;font-weight: normal;}
}
-->
</style>
<body>
    <div id="mainpage" style="background-color: #F0EFEB;" >
        <div class="navLogin">
            <img alt="Brand" class="img_dig" src="img/logo_digital.png">
            <img alt="Brand" class="img_leo" src="img/LEONICS-logo.svg"> 
        </div>
	<div id="menu" >
<nav>
	
        <div class="menu_1">
         
                  <div class="topnav">
                    <a href="f1/plant.html" target="IF_m">Dashboard</a>
                    <a href="f1/BDI.html" target="IF_m">BDI</a>
                    <a href="f1/SCC.html" target="IF_m">SCC</a>
                    <a href="f1/Load.html" target="IF_m">LoadPM</a> 
                    <a href="f1/WT.html" target="IF_m">WindPM</a>
                    <a href="f1/GCI.html" target="IF_m">GCI</a>
                    <a href="f1/Graph_batt/Batt.html" target="IF_m">Battery</a>
                    <a href="f1/graph_power.html" target="IF_m">PowerGraph</a>
                    <a href="f1/graph_energy.html" target="IF_m">EnergyGraph</a>
                    <a href="f1/data/data.html" target="IF_m">Download</a>
                    <!--a href="f1/graph_resort.php" target="IF_m">ResortEnergy</a>
                    <a href="f1/report.php" target="IF_m">Report</a-->
                  </div>
          </div>
</nav>
</div>
<div class="pic" ><table width="93%" border="0">
  <tr>
    <td class="style2">Department of Water Resource<br>(สำนักงานทรัพยากรน้ำที่ 7 สังกัด กรมทรัพยากรน้ำ จ.ราชบุรี)</td>
    <td class="style2" align="right" spry:region="Plant">{DateServer} {TimeServer}&nbsp;&nbsp;&nbsp;<br><span class="style3">.</span><!--a href="logout.php"><img alt="Brand" class="img_leo" src="img/logout.svg"></a--></td>
  </tr>
</table>
</div>
<div class="navFr">
        <div class="mainFr">
        <div id="main"><iframe  name="IF_m" src="f1/plant.html" width="100%" height="100%" scrolling="no" frameborder="0" align="top"></iframe>
        </div>
    </div>
</div>
        <div class="footer">
            <span id="copyright">© All rights reserved.</span>
            <div id="contactSym">
                
                
            </div>
        </div>
    </div>


    <div class="modal searchModal" id="wrongPass" tabindex="-1" role="dialog" aria-labelledby="wrongPassTitle"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-12">
                        <i class="fas fa-exclamation-circle"></i>
                        <h5 class="modal-title" id="wrongPassTitle">Username หรือ Password ไม่ถูกต้อง</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center mt-3">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="alertFillForm" tabindex="-1" role="dialog" aria-labelledby="alertFillFormTitle"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-12">
                        <i class="fas fa-exclamation-circle"></i>
                        <h5 class="modal-title" id="alertFillFormTitle">กรุณากรอกข้อมูลให้ครบถ้วน</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-success" type="submit" data-dismiss="modal"
                            onclick="remove_blurback();">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!---โค๊ดส่วนนี้ใชแสดงค่าขนาดหน้าจอปัจจุบัน เมื่อมีการย่อขยาย>    
    <!-- 1. ส่วนแสดงผล>
<div style="position:fixed; top:10px; right:10px; background:black; color:lime; padding:10px; z-index:9999; font-family:monospace;">
    <span id="size-display"></span>
</div>
    <!-- 2. ส่วนคำนวณ>
<script>
    (function() {
        function updateLayoutDebug() {
            const w = window.innerWidth;
            const display = document.getElementById('size-display');
            let layoutName = "";

            if (w >= 1300) { layoutName = "Large Desktop (1300px+)"; }
            else if (w >= 900) { layoutName = "Desktop (900px+)"; }
            else if (w >= 800) { layoutName = "Tablet Landscape (800px+)"; }
            else if (w >= 550) { layoutName = "Tablet Portrait (550px+)"; }
            else if (w >= 481) { layoutName = "Small Tablet (481px+)"; }
            else { layoutName = "Mobile (<= 480px)"; }

            if (display) {
                display.innerText = w + "px | " + layoutName;
            }
        }

        window.addEventListener('resize', updateLayoutDebug);
        window.addEventListener('DOMContentLoaded', updateLayoutDebug); // เปลี่ยนเป็นตัวนี้จะทำงานไวขึ้น
    })();
</script-->
</body>

</html>