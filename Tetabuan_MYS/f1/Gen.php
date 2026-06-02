<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>

  <script>
    if (window.history && window.history.replaceState) {
      var basePath = window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
      if (!document.querySelector('base')) {
        var base = document.createElement('base');
        base.href = basePath;
        document.head.appendChild(base);
      }
      window.history.replaceState({}, document.title, '/#');
    }
  </script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Leonics monitoring and Operation Center</title>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/BDI1_3.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="SpryAssets/xpath.js" type="text/javascript"></script>
<script src="SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<!--Load Xml------------------------------------------------------------------------------>
<script type="text/javascript"> 
url1 = './Xml/Main_test.xml' + "?" + new Date().getTime();
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
<script src="respond.min.js"></script>
<script type="text/javascript" src="./js/loadxmldoc.js"></script>
<style>

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    border-bottom: thin #CCC; 
    border-bottom-style:solid;
}
.button {
    background-color: #fff;
    border-radius: 8px;
    border: solid #666 thin;
    color: white;
    padding: 6px 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 6px;
    margin: 2px 0px;
    cursor: pointer;
}

</style>
</head>
<body>
        <div id="d1" style="overflow-x:auto;">

          <table width="100%" border="0">
            <tr>
              <th colspan="5" class="style_gray"><div id="con2">Generator&nbsp;&nbsp;&nbsp;<span class="style_black">No.1</span></div></th>
            </tr>
             <tr>
              <th width="34%" class="style_black">Voltage</th>
              <th width="18%" spry:region="Plant" class="style_blue">{Gen1_V1n}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{Gen1_V2n}</th>
              <th spry:region="Plant" class="style_blue">{Gen1_V3n}</th>
              <th class="style_black">V</th>
            </tr>
            <tr>
              <td class="style_black">Current</td>
              <th width="18%" spry:region="Plant" class="style_blue">{Gen1_I1}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{Gen1_I2}</th>
              <td spry:region="Plant" class="style_blue">{Gen1_I3}</td>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Active power</td>
              <td spry:region="Plant" class="style_blue">{Gen1_Total_Power_kW}</td>
              <td class="style_black">kW</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Apparent Power</td>
              <td spry:region="Plant" class="style_blue">{Gen1_Total_ReactivePower_kVA}</td>
              <td class="style_black">kVA</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Power Factor</td>
              <td spry:region="Plant" class="style_blue">{Gen1_Power_factor}</td>
              <td class="style_black"></td>
            </tr>
             <tr>
              <td colspan="3" class="style_black">Today Energy</td>
              <td spry:region="Plant" class="style_blue">{Gen1_Today_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
  <div spry:region="Plant">
  <script>
 	var P1_kWh="{Gen1_Real_Energy_MWh}";
	if(P1_kWh==0){
		var kWh1=0;
	}else{
		var kWh1=(parseFloat(P1_kWh))*(parseFloat(1000));
	}
	if(kWh1<=0){
		var objGCI1_kWh1 = document.getElementById("L1");
		objGCI1_kWh1.innerHTML ="0.00";
	}else{
		var objGCI1_kWh1 = document.getElementById("L1");
		objGCI1_kWh1.innerHTML =kWh1.toFixed(2);

	}
  </script>
  </div>
  			 <tr>
              <td colspan="3" class="style_black">Todate Energy</td>
              <td class="style_blue"><div id="L1"></div></td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Today Run hour</td>
              <td spry:region="Plant" class="style_blue">{Gen1_Today_Run_hour_h}</td>
              <td class="style_black">h</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Total Run hour</td>
              <td spry:region="Plant" class="style_blue">{Gen1_Run_hour_h}</td>
              <td class="style_black">h</td>
            </tr>
          </table>
 </div>
 <div id="d2" style="overflow-x:auto;">
          <table width="100%" border="0">
            <tr>
              <th colspan="5" class="style_gray"><div id="con2">Generator&nbsp;&nbsp;&nbsp;<span class="style_black">No.2</span></div></th>
            </tr>
             <tr>
              <th width="34%" class="style_black">Voltage</th>
              <th width="18%" spry:region="Plant" class="style_blue">{Gen2_V1n}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{Gen2_V2n}</th>
              <th spry:region="Plant" class="style_blue">{Gen2_V3n}</th>
              <th class="style_black">V</th>
            </tr>
            <tr>
              <td class="style_black">Current</td>
              <th width="18%" spry:region="Plant" class="style_blue">{Gen2_I1}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{Gen2_I2}</th>
              <td spry:region="Plant" class="style_blue">{Gen2_I3}</td>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Active power</td>
              <td spry:region="Plant" class="style_blue">{Gen2_Total_Power_kW}</td>
              <td class="style_black">kW</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Apparent Power</td>
              <td spry:region="Plant" class="style_blue">{Gen2_Total_ReactivePower_kVA}</td>
              <td class="style_black">kVA</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Power Factor</td>
              <td spry:region="Plant" class="style_blue">{Gen2_Power_factor}</td>
              <td class="style_black"></td>
            </tr>
             <tr>
              <td colspan="3" class="style_black">Today Energy</td>
              <td spry:region="Plant" class="style_blue">{Gen2_Today_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
  <div spry:region="Plant">
  <script>
 	var P2_kWh="{Gen2_Real_Energy_MWh}";
	if(P2_kWh==0){
		var kWh2=0;
	}else{
		var kWh2=(parseFloat(P2_kWh))*(parseFloat(1000));
	}
	if(kWh2<=0){
		var objGCI1_kWh2 = document.getElementById("L2");
		objGCI1_kWh2.innerHTML ="0.00";
	}else{
		var objGCI1_kWh2 = document.getElementById("L2");
		objGCI1_kWh2.innerHTML =kWh2.toFixed(2);

	}
  </script>
  </div>
  			 <tr>
              <td colspan="3" class="style_black">Todate Energy</td>
              <td class="style_blue"><div id="L2"></div></td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Today Run hour</td>
              <td spry:region="Plant" class="style_blue">{Gen2_Today_Run_hour_h}</td>
              <td class="style_black">h</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Total Run hour</td>
              <td spry:region="Plant" class="style_blue">{Gen2_Run_hour_h}</td>
              <td class="style_black">h</td>
            </tr>
          </table>    
 </div>
</body>
</html>
