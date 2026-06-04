
(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play(0);});
//Edge binding end
Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",0,function(sym,e){var Gen1_total,Gen2_total,Gen3_total,Sum_GD,Batt_;var BDI1_,BDI2_,BDI3_,Sum_BDI;var Load1_,Load2_,Load3_,Sum_Load;var VBatt_I,V_Solar1,V_Solar2,V_Solar3,V_Solar4;var chk_V_Solar1,chk_V_Solar2,chk_V_Solar3,chk_V_Solar4=new Boolean();var chk_Batt1,chk_Batt2,chk_Batt3=new Boolean();var chk_GD1,chk_GD2,chk_GD3,chk_Batt=new Boolean();var chk_BDI1,chk_BDI2,chk_BDI3=new Boolean();var chk_Load1,chk_Load2,chk_Load3=new Boolean();var d=new Date();var n=d.getSeconds();$.ajax({type:"GET",url:"xml/Main.xml",dataType:"xml",success:function(xml){chk_GD1=!(isNaN($(xml).find('AC_Input_Total_Power_kW').text()));chk_Batt=!(isNaN($(xml).find('BDI_Battery_Current').text()));if(chk_GD1){Gen1_total=parseFloat($(xml).find('AC_Input_Total_Power_kW').text());}else{Gen1_total=0;}
if(chk_Batt){Batt_=parseFloat($(xml).find('BDI_Battery_Current').text());}else{Batt_=0;}
chk_BDI1=!(isNaN($(xml).find('Inverter_Output_Total_Power_kW').text()));if(chk_BDI1){BDI1_=parseFloat($(xml).find('Inverter_Output_Total_Power_kW').text());}else{BDI1_=0;}
chk_Load1=!(isNaN($(xml).find('AC_Load_Total_Power_kW').text()));if(chk_Load1){Load1_=parseFloat($(xml).find('AC_Load_Total_Power_kW').text());}else{Load1_=0;}
Sum_Load=((Load1_));Sum_BDI=((BDI1_));Sum_GD=((Gen1_total));sym.$("GD_kW").html(Sum_GD.toFixed(2)+"  kW");sym.$("DG1").html($(xml).find('AC_Input_Voltage_L1').text()+"  V");sym.$("DG2").html($(xml).find('AC_Input_Voltage_L2').text()+"  V");sym.$("DG3").html($(xml).find('AC_Input_Voltage_L3').text()+"  V");sym.$("Solar_kW1").html($(xml).find('SCC1_PV_Power_kW').text()+"  kW");sym.$("txt_PV_I1").html($(xml).find('SCC1_PV_Current').text()+"  A");sym.$("txt_Chg_I1").html($(xml).find('SCC1_Chg_Current').text()+"  A");sym.$("Solar_kW2").html($(xml).find('SCC2_PV_Power_kW').text()+"  kW");sym.$("txt_PV_I2").html($(xml).find('SCC2_PV_Current').text()+"  A");sym.$("txt_Chg_I2").html($(xml).find('SCC2_Chg_Current').text()+"  A");sym.$("Solar_kW3").html($(xml).find('SCC3_PV_Power_kW').text()+"  kW");sym.$("txt_PV_I3").html($(xml).find('SCC3_PV_Current').text()+"  A");sym.$("txt_Chg_I3").html($(xml).find('SCC3_Chg_Current').text()+"  A");sym.$("Solar_kW4").html($(xml).find('SCC4_PV_Power_kW').text()+"  kW");sym.$("txt_PV_I4").html($(xml).find('SCC4_PV_Current').text()+"  A");sym.$("txt_Chg_I4").html($(xml).find('SCC4_Chg_Current').text()+"  A");sym.$("txt_Batt_V").html($(xml).find('BDI_Battery_Voltage').text()+"  V");sym.$("Batt_I").html($(xml).find('BDI_Battery_Current').text()+"  A");sym.$("SOC").html($(xml).find('BDI_SOC').text()+"  %");sym.$("txt_BDI").html($(xml).find('Inverter_Output_Total_Power_kW').text()+"  kW");sym.$("Load_output1").html($(xml).find('AC_Load_Voltage_L1').text()+"  V");sym.$("Load_output2").html($(xml).find('AC_Load_Voltage_L2').text()+"  V");sym.$("Load_output3").html($(xml).find('AC_Load_Voltage_L3').text()+"  V");sym.$("Load_kW").html(Sum_Load.toFixed(2)+"  kW");sym.$("PV_temp").html("PV Temp: "+$(xml).find('PV_temp').text()+"  &#8451;");sym.$("txt_Irr").html(($(xml).find('Irradiance_W_m2').text())+"  W/m<sup>2</sup>");sym.$("txt_Irrt").html(($(xml).find('Irradiation_kWh_m2').text())+"  kWh/m<sup>2</sup>");sym.$("Amb_Temp").html("Amb Temp: "+$(xml).find('Ambient_temp').text()+"  &#8451;");sym.$("L_solar2").hide();sym.$("L_solar3").hide();sym.$("L_solar4").hide();sym.$("Lsolar_main1").hide();sym.$("Lsolar_main2").hide();sym.$("Lsolar_main3").hide();sym.$("Lsolar_main4").hide();sym.$("L_batt_in").hide();sym.$("L_load").hide();sym.$("L_grid").hide();sym.$("L_batt_out").hide();sym.$("L_bdi2grid").hide();sym.$("L_in_batt").hide();if(Sum_GD>1){sym.$("L_grid").show();}else if(Sum_GD<-1){sym.$("L_bdi2grid").show();}
if(Sum_Load>2){sym.$("L_load").show();}
chk_V_Solar1=!(isNaN($(xml).find('SCC1_PV_Power_kW').text()));V_Solar1=parseFloat($(xml).find('SCC1_PV_Power_kW').text());if(chk_V_Solar1){if(V_Solar1>1){sym.$("Lsolar_main1").show();sym.$("Lsolar_main2").show();sym.$("Lsolar_main3").show();sym.$("Lsolar_main4").show();}}
chk_V_Solar2=!(isNaN($(xml).find('SCC2_PV_Power_kW').text()));V_Solar2=parseFloat($(xml).find('SCC2_PV_Power_kW').text());if(chk_V_Solar2){if(V_Solar2>1){sym.$("L_solar2").show();sym.$("Lsolar_main2").show();sym.$("Lsolar_main3").show();sym.$("Lsolar_main4").show();}}
chk_V_Solar3=!(isNaN($(xml).find('SCC3_PV_Power_kW').text()));V_Solar3=parseFloat($(xml).find('SCC3_PV_Power_kW').text());if(chk_V_Solar3){if(V_Solar3>1){sym.$("L_solar3").show();sym.$("Lsolar_main3").show();sym.$("Lsolar_main4").show();}}
chk_V_Solar4=!(isNaN($(xml).find('SCC4_PV_Power_kW').text()));V_Solar4=parseFloat($(xml).find('SCC4_PV_Power_kW').text());if(chk_V_Solar4){if(V_Solar4>1){sym.$("L_solar4").show();sym.$("Lsolar_main4").show();}}
if(Batt_>0){sym.$("txt_charg").html("Discharg");if(Batt_>0.5){sym.$("L_batt_out").show();}}else{sym.$("txt_charg").html("Charging");if(Batt_<-0.5){sym.$("L_batt_in").show();if(Sum_GD>0&&Sum_BDI>0){sym.$("L_in_batt").show();}}}}});$.ajax({type:"GET",url:"xml/Energylog.xml",dataType:"xml",success:function(xml){sym.$("txt_co2").html($(xml).find('CO2_kg').text()+"  kg/day");}});});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"document","compositionReady",function(sym,e){var youtubevid=$("<iframe/>");sym.$("G_grid").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','265');youtubevid.attr('height','120');youtubevid.attr('src','./graph/grid.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');var youtubevid=$("<iframe/>");sym.$("G_Solar1").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','260');youtubevid.attr('height','120');youtubevid.attr('src','./graph/solar1.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');var youtubevid=$("<iframe/>");sym.$("G_Solar2").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','260');youtubevid.attr('height','120');youtubevid.attr('src','./graph/solar2.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');var youtubevid=$("<iframe/>");sym.$("G_Solar3").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','260');youtubevid.attr('height','120');youtubevid.attr('src','./graph/solar2.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');var youtubevid=$("<iframe/>");sym.$("G_Solar4").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','260');youtubevid.attr('height','120');youtubevid.attr('src','./graph/solar2.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');var youtubevid=$("<iframe/>");sym.$("G_batt").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','260');youtubevid.attr('height','120');youtubevid.attr('src','./graph/BDI1.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');var youtubevid=$("<iframe/>");sym.$("G_Load").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','260');youtubevid.attr('height','120');youtubevid.attr('src','./graph/load.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');var youtubevid=$("<iframe/>");sym.$("G_irr").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','390');youtubevid.attr('height','120');youtubevid.attr('src','./graph/irr.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');});
//Edge binding end
})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'line_fire'
(function(symbolName){})("line_fire");
//Edge symbol end:'line_fire'

//=========================================================

//Edge symbol: 'L_solar1'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("L_solar1");
//Edge symbol end:'L_solar1'

//=========================================================

//Edge symbol: 'Lsolar_main'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("Lsolar_main");
//Edge symbol end:'Lsolar_main'

//=========================================================

//Edge symbol: 'Lsolar_main2'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("Lsolar_main2");
//Edge symbol end:'Lsolar_main2'

//=========================================================

//Edge symbol: 'Lsolar_main3'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("Lsolar_main3");
//Edge symbol end:'Lsolar_main3'

//=========================================================

//Edge symbol: 'Lsolar_main4'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("Lsolar_main4");
//Edge symbol end:'Lsolar_main4'

//=========================================================

//Edge symbol: 'L_solar3'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("L_solar3");
//Edge symbol end:'L_solar3'

//=========================================================

//Edge symbol: 'L_solar4'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("L_solar4");
//Edge symbol end:'L_solar4'

//=========================================================

//Edge symbol: 'L_batt_out'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("L_batt_out");
//Edge symbol end:'L_batt_out'

//=========================================================

//Edge symbol: 'L_grid'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("L_grid");
//Edge symbol end:'L_grid'

//=========================================================

//Edge symbol: 'L_load'
(function(symbolName){})("L_load");
//Edge symbol end:'L_load'

//=========================================================

//Edge symbol: 'batt_in'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("batt_in");
//Edge symbol end:'batt_in'

//=========================================================

//Edge symbol: 'L_in_batt'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("L_in_batt");
//Edge symbol end:'L_in_batt'

//=========================================================

//Edge symbol: 'L_bdi2grid'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",14000,function(sym,e){sym.play("P1");});
//Edge binding end
})("L_bdi2grid");
//Edge symbol end:'L_bdi2grid'
})(jQuery,AdobeEdge,"EDGE-174488029");