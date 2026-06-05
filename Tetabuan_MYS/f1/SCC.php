<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>

  <script src="js/path-mask.js"></script>
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
              <th colspan="5" class="style_gray"><div id="con2">Solar Charge Controller&nbsp;&nbsp;&nbsp;<span class="style_black">No.1</span></div></th>
            </tr>
            <tr>
              <th colspan="3" class="style_black">PV Voltage</th>
              <th width="18%" spry:region="Plant" class="style_blue">{SCC1_PV_Voltage}</th>
              <th width="14%" class="style_black">V</th>
            </tr>
            <tr>
              <td colspan="3" class="style_black">PV Current</td>
              <td spry:region="Plant" class="style_blue">{SCC1_PV_Current}</td>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">PV Power</td>
              <td spry:region="Plant" class="style_blue">{SCC1_PV_Power_kW}</td>
              <td class="style_black">kW</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Charge Voltage</td>
              <td spry:region="Plant" class="style_blue">{SCC1_Chg_Voltage}</td>
              <td class="style_black">V</td>
            </tr>
             <tr>
              <td colspan="3" class="style_black">Charge Current</td>
              <td spry:region="Plant" class="style_blue">{SCC1_Chg_Current}</td>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Charge Power</td>
              <td spry:region="Plant" class="style_blue">{SCC1_Chg_Power_kW}</td>
              <td class="style_black">kW</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Today PV Energy</td>
              <td spry:region="Plant" class="style_blue">{SCC1_Today_PV_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Todate PV Energy</td>
              <td spry:region="Plant" class="style_blue">{SCC1_Todate_PV_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Today Chg Energy</td>
              <td spry:region="Plant" class="style_blue">{SCC1_Today_Chg_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Todate Chg Energy</td>
              <td spry:region="Plant" class="style_blue">{SCC1_Todate_Chg_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
          </table>
 </div>
 <div id="d2" style="overflow-x:auto;">
          <table width="100%" border="0">
             <tr>
              <th colspan="5" class="style_gray"><div id="con2">Solar Charge Controller&nbsp;&nbsp;&nbsp;<span class="style_black">No.2</span></div></th>
            </tr>
            <tr>
              <th colspan="3" class="style_black">PV Voltage</th>
              <th width="18%" spry:region="Plant" class="style_blue">{SCC2_PV_Voltage}</th>
              <th width="14%" class="style_black">V</th>
            </tr>
            <tr>
              <td colspan="3" class="style_black">PV Current</td>
              <td spry:region="Plant" class="style_blue">{SCC2_PV_Current}</td>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">PV Power</td>
              <td spry:region="Plant" class="style_blue">{SCC2_PV_Power_kW}</td>
              <td class="style_black">kW</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Charge Voltage</td>
              <td spry:region="Plant" class="style_blue">{SCC2_Chg_Voltage}</td>
              <td class="style_black">V</td>
            </tr>
             <tr>
              <td colspan="3" class="style_black">Charge Current</td>
              <td spry:region="Plant" class="style_blue">{SCC2_Chg_Current}</td>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Charge Power</td>
              <td spry:region="Plant" class="style_blue">{SCC2_Chg_Power_kW}</td>
              <td class="style_black">kW</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Today PV Energy</td>
              <td spry:region="Plant" class="style_blue">{SCC2_Today_PV_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Todate PV Energy</td>
              <td spry:region="Plant" class="style_blue">{SCC2_Todate_PV_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Today Chg Energy</td>
              <td spry:region="Plant" class="style_blue">{SCC2_Today_Chg_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Todate Chg Energy</td>
              <td spry:region="Plant" class="style_blue">{SCC2_Todate_Chg_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
          </table>
    
 </div>
</body>
</html>
