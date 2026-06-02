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
              <th colspan="5" class="style_gray"><div id="con2">Bi-Directional Inverter (BDI)&nbsp;&nbsp;&nbsp;<span class="style_black">No.1</span></div></th>
            </tr>
            <tr>
              <td colspan="5" class="style_black"><strong>Battery System</strong></td>
            </tr>
            <tr>
              <th colspan="3" class="style_black">Batt Volt</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_BDI_Batt_Voltage}</th>
              <th width="14%" class="style_black">V</th>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Batt Current</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Battery_Current}
                </th>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Batt Power</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Batt_kW}
                </th>
              <td class="style_black">kW</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">DC Current</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_DC_Current}
                </th>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">DC Power</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_DC_Power_kW}
                </th>
              <td class="style_black">kW</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">External DC Current</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Ext_DC_Current}
                </th>
              <td class="style_black">A</td>
            </tr>
             <tr>
              <td colspan="3" class="style_black">External DC Power</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Ext_DC_kW}
                </th>
              <td class="style_black">kW</td>
            </tr>
             <tr>
              <td colspan="3" class="style_black">Head Sink Temperature</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Ext_DC_Current}
                </th>
              <td class="style_black">°C</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">SOC</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_SOC}
                </th>
              <td class="style_black">%</td>
            </tr> 
            <tr>
              <td colspan="5" class="style_black"><strong>AC Generator</strong></td>
            </tr>
            <tr>
              <th width="34%" class="style_black">Voltage</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_ACin_Voltage_L1}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_ACin_Voltage_L2}</th>
              <th spry:region="Plant" class="style_blue">{BDI1_ACin_Voltage_L3}</th>
              <th class="style_black">V</th>
            </tr> 
            <tr>
              <td class="style_black">Current</td>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_ACin_Current_I1}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_ACin_Current_I2}</th>
              <td spry:region="Plant" class="style_blue">{BDI1_ACin_Current_I3}</td>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <th width="34%" class="style_black">Active power</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_ACin_Power_P1_kW}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_ACin_Power_P2_kW}</th>
              <th spry:region="Plant" class="style_blue">{BDI1_ACin_Power_P3_kW}</th>
              <th class="style_black">kW</th>
            </tr>
            <tr>
              <th width="34%" class="style_black">Reactive power</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_ACin_Power_Q1_kVAr}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_ACin_Power_Q2_kVAr}</th>
              <th spry:region="Plant" class="style_blue">{BDI1_ACin_Power_Q3_kVAr}</th>
              <th class="style_black">kVAr</th>
            </tr>
            <tr>
              <th width="34%" class="style_black">Apparent Power</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_ACin_Power_S1_kVA}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_ACin_Power_S2_kVA}</th>
              <th spry:region="Plant" class="style_blue">{BDI1_ACin_Power_S3_kVA}</th>
              <th class="style_black">kVA</th>
            </tr>
            <tr>
              <th colspan="3" class="style_black">AC Frequency</th>
              <th  class="style_blue" spry:region="Plant" >{BDI1_ACin_Freq}</th>
              <th class="style_black">Hz</th>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Power Factor</td>
              <td spry:region="Plant" class="style_blue">{BDI1_ACin_PF}</td>
              <td class="style_black"></td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Today Energy</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Today_Gen_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Todate Energy</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Todate_Gen_kWh}</td>
              <td class="style_black">kWh</td>
            </tr> 
          </table>
 </div>
 <div id="d2" style="overflow-x:auto;">
          <table width="100%" border="0">
            <tr>
              <td colspan="5" class="style_black">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5" class="style_black"><strong>Inverter Output</strong></td>
            </tr>
            <tr>
              <th width="34%" class="style_black">Voltage</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_BDI_Voltage_L1}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_BDI_Voltage_L2}</th>
              <th spry:region="Plant" class="style_blue">{BDI1_BDI_Voltage_L3}</th>
              <th class="style_black">V</th>
            </tr>
            <tr>
              <td class="style_black">Current</td>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_BDI_Current_I1}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_BDI_Current_I2}</th>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Current_I3}</td>
              <td class="style_black">A</td>
            </tr>
            <tr>
              <th width="34%" class="style_black">Active power</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_BDI_Power_P1_kW}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_BDI_Power_P2_kW}</th>
              <th spry:region="Plant" class="style_blue">{BDI1_BDI_Power_P3_kW}</th>
              <th class="style_black">kW</th>
            </tr>
            <tr>
              <th width="34%" class="style_black">Reactive power</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_BDI_Power_Q1_kVAr}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_BDI_Power_Q2_kVAr}</th>
              <th spry:region="Plant" class="style_blue">{BDI1_BDI_Power_Q3_kVAr}</th>
              <th class="style_black">kVAr</th>
            </tr>
             <tr>
              <th width="34%" class="style_black">Apparent Power</th>
              <th width="18%" spry:region="Plant" class="style_blue">{BDI1_BDI_Power_S1_kVA}</th>
              <th width="16%" spry:region="Plant" class="style_blue">{BDI1_BDI_Power_S2_kVA}</th>
              <th spry:region="Plant" class="style_blue">{BDI1_BDI_Power_S3_kVA}</th>
              <th class="style_black">kVA</th>
            </tr>
            <tr>
              <th colspan="3" class="style_black">AC Frequency</th>
              <th  class="style_blue" spry:region="Plant" >{BDI1_BDI_Freq}</th>
              <th class="style_black">Hz</th>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Power Factor</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_PF}</td>
              <td class="style_black"></td>
            </tr> 
            <tr>
              <td colspan="3" class="style_black">Today Energy</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Today_Supply_AC_kWh}</td>
              <td class="style_black">kWh</td>
            </tr>
            <tr>
              <td colspan="3" class="style_black">Todate Energy</td>
              <td spry:region="Plant" class="style_blue">{BDI1_BDI_Todate_Supply_AC_kWh}</td>
              <td class="style_black">kWh</td>
            </tr> 
          </table>
    
 </div>
</body>
</html>
