
(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play(0);});
//Edge binding end
Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",0,function(sym,e){var Gen1_total,Gen2_total,Gen3_total,Sum_Total,Batt_V1,Batt_V3,PVV;var GCI1_AC,GCI2_AC,GCI3_AC;var AC_load_kVA1,AC_load_kVA2,AC_load_kVA3,SLoad;var Sum_GD,sum_Load_kVA,sum_Load_kW,Solar1,PV,Batt_I1,Batt_I3,LoadU;var chk_GD1,chk_GD2,chk_GD3,chk_PV=new Boolean();var chk_Solar1,chk_Solar2,chk_Solar=new Boolean();var chk_PV1,chk_PV2=new Boolean();var chk_Batt_I3,chk_Batt_I1,chk_Load,chk_Batt_kW1,chk_Batt_kW2,chk_Batt3_kW1,chk3_Batt_kW=new Boolean();var d=new Date();var n=d.getSeconds();$.ajax({type:"GET",url:"xml/main.xml",dataType:"xml",success:function(xml){chk_GD1=!(isNaN($(xml).find('Gen1_Total_Power_W').text()));chk_GD2=!(isNaN($(xml).find('Gen2_Total_Power_W').text()));chk_GD3=!(isNaN($(xml).find('Gen3_Total_Power_W').text()));if(chk_GD1){Gen1_total=parseInt($(xml).find('Gen1_Total_Power_W').text())/1000;}else{Gen1_total=0;}
if(chk_GD2){Gen2_total=parseInt($(xml).find('Gen2_Total_Power_W').text())/1000;}else{Gen2_total=0;}
if(chk_GD3){Gen3_total=parseInt($(xml).find('Gen3_Total_Power_W').text())/1000;}else{Gen3_total=0;}
GCI1_AC=parseInt($(xml).find('GCI1_AC_Power_kW').text());GCI2_AC=parseInt($(xml).find('GCI2_AC_Power_kW').text());GCI3_AC=parseInt($(xml).find('GCI3_AC_Power_kW').text());Sum_GD=((Gen1_total)+(Gen2_total)+(Gen3_total));Solar1=$(xml).find('SCC_Sum_PV_kW').text();chk_Solar=!(isNaN(Solar1));PV=$(xml).find('GCI_Sum_PV_Power_kW').text();chk_PV=!(isNaN(PV));if(chk_PV){PVV=PV;}else{PVV=0;}
Batt_I1=$(xml).find('Sum_Batt_I').text();chk_Batt_I1=!(isNaN(Batt_I1));Batt_I3=$(xml).find('BDI3_Batt_I').text();chk_Batt_I3=!(isNaN(Batt_I3));LoadU=$(xml).find('Load_Total_P_kW').text();chk_Load=!(isNaN(LoadU));if(chk_Load){SLoad=LoadU;}else{SLoad=0;}
Sum_Total=parseInt(Sum_GD)+parseInt(PVV);if(Batt_I1>0){sym.$("txt_batt1").html("Discharg");}else{sym.$("txt_batt1").html("Charging");}
if(Batt_I3>0){sym.$("txt_batt2").html("Discharg");}else{sym.$("txt_batt2").html("Charging");}
sym.$("Load_kVA").html("");sym.$("GD_kW").html(Sum_GD.toFixed(2)+"  kW");sym.$("DG1").html(Gen1_total.toFixed(2)+"  kW");sym.$("DG2").html(Gen2_total.toFixed(2)+"  kW");sym.$("DG3").html(Gen3_total.toFixed(2)+"  kW");sym.$("Amb").html(($(xml).find('Ambient_temp').text())+"  &#8451;");sym.$("Irr").html(($(xml).find('Irradiance_W_m2').text())+"  W/m<sup>2</sup>");sym.$("Irrt").html(($(xml).find('Irradiation_kWh_m2').text())+"  kWh/m<sup>2</sup>");sym.$("PV_kW").html(PV+"  kW");sym.$("GCI_1").html((GCI1_AC)+"  kW");sym.$("GCI_2").html((GCI2_AC)+"  kW");sym.$("GCI_3").html((GCI3_AC)+"  kW");sym.$("Load_kW").html(($(xml).find('Load_Total_P_kW').text())+"  kW");sym.$("Load_output1").html(($(xml).find('AC_Load_L1').text())+"  V");sym.$("Load_output2").html(($(xml).find('AC_Load_L2').text())+"  V");sym.$("Load_output3").html(($(xml).find('AC_Load_L3').text())+"  V");sym.$("Solar_kW").html((Solar1)+" kW");sym.$("Scc_1kW").html(($(xml).find('SCC1_PV_Power_kW').text())+" kW");sym.$("Scc_2kW").html(($(xml).find('SCC2_PV_Power_kW').text())+" kW");sym.$("Batt1_v").html(($(xml).find('Avg_BDI_DC_V').text())+" V");sym.$("Batt1_I").html(Batt_I1+" A");sym.$("Batt1_soc").html(($(xml).find('Avg_SOC').text())+" %");sym.$("Batt1_BDI1").html(($(xml).find('BDI1_Sum_P_kW').text())+" kW");sym.$("Batt1_BDI2").html(($(xml).find('BDI2_Sum_P_kW').text())+" kW");sym.$("Batt3_v").html(($(xml).find('BDI3_Batt_V').text())+" V");sym.$("Batt3_I").html(Batt_I3+" A");sym.$("Batt3_soc").html(($(xml).find('BDI3_SOC').text())+" %");sym.$("Batt1_BDI3").html(($(xml).find('BDI3_Sum_P_kW').text())+" kW");sym.$("L_gen").hide();sym.$("Toload1").hide();sym.$("Toload2").hide();sym.$("Toload3").hide();sym.$("solar1").hide();sym.$("batt2BDIMTPs").hide();sym.$("Batt2BDISTP2").hide();sym.$("pv2BDIMTP").hide();sym.$("PV2BDISTP").hide();sym.$("PV2").hide();sym.$("pv2BDI1").hide();sym.$("PV2BDI22").hide();if(Sum_GD>2){sym.$("L_gen").show();}
if(chk_PV){if(PV>2){sym.$("PV2").show();}}
if(chk_Batt_I1){if(Batt_I1>2){sym.$("batt2BDIMTPs").show();}else if((Batt_I1<-2)){sym.$("pv2BDIMTP").show();}}
if(chk_Batt_I3){if(Batt_I3>2){sym.$("Batt2BDISTP2").show();}else if((Batt_I3<-2)){sym.$("PV2BDISTP").show();}}
if(chk_Solar){if(Solar1>2){sym.$("solar1").show();}}
if(chk_Load){if(LoadU>2){sym.$("Toload3").show();}}
if(LoadU>Sum_Total){sym.$("Toload1").show();sym.$("Toload2").show();}else{if(Batt_I1>2){sym.$("Toload1").show();}else if((Batt_I1<-2)){sym.$("PV2BDI22").show();if((!chk_Batt_I3)){sym.$("pv2BDI1").show();}}
if(Batt_I3>2){sym.$("Toload2").show();}else if((Batt_I3<-2)){if(PVV>0){sym.$("pv2BDI1").show();}}}}});var Nodex_v1,Nodex_v2,Nodex_v3,Sum_nodex1,Per1;var Nodex_L1,Nodex_L2,Nodex_L3,Sum_nodexL;var Sumnodex1,Sumnodex2=new Boolean();var Nodex2_v1,Nodex2_v2,Nodex2_v3,Sum_nodex2,Per2;var Nodex2_L1,Nodex2_L2,Nodex2_L3,Sum_nodexL2;var chk1_Nodex1,chk1_Nodex2,chk1_Nodex3=new Boolean();var chk2_Nodex2,chk2_Nodex2,chk2_Nodex3=new Boolean();var chk1_No1,chk1_No2,chk1_No3=new Boolean();var chk2_No2,chk2_No2,chk2_No3=new Boolean();$.ajax({type:"GET",url:"Xml_Nodex/main.xml",dataType:"xml",success:function(xml){sym.$("nodex1").hide();sym.$("nodex2").hide();sym.$("nodex_in1").hide();sym.$("nodex_in2").hide();sym.$("nodex_in2_2").hide();chk1_Nodex1=!(isNaN($(xml).find('Nodex1_AC_Input_P1_kW').text()));chk1_Nodex2=!(isNaN($(xml).find('Nodex1_AC_Input_P2_kW').text()));chk1_Nodex3=!(isNaN($(xml).find('Nodex1_AC_Input_P3_kW').text()));if(chk1_Nodex1){Nodex_v1=($(xml).find('Nodex1_AC_Input_P1_kW').text())}else{Nodex_v1=0;}
if(chk1_Nodex2){Nodex_v2=($(xml).find('Nodex1_AC_Input_P2_kW').text())}else{Nodex_v2=0;}
if(chk1_Nodex3){Nodex_v3=($(xml).find('Nodex1_AC_Input_P3_kW').text())}else{Nodex_v3=0;}
Sum_nodex1=parseInt(Nodex_v1)+parseInt(Nodex_v2)+parseInt(Nodex_v3);Sumnodex1=!(isNaN(Sum_nodex1));if(Sumnodex1){Sum_nodex1=Sum_nodex1;}else{Sum_nodex1=0;}
chk1_No1=!(isNaN($(xml).find('Nodex1_AC_Load_P1_kW').text()));chk1_No2=!(isNaN($(xml).find('Nodex1_AC_Load_P2_kW').text()));chk1_No3=!(isNaN($(xml).find('Nodex1_AC_Load_P3_kW').text()));if(chk1_No1){Nodex_L1=($(xml).find('Nodex1_AC_Load_P1_kW').text())}else{Nodex_L1=0;}
if(chk1_No2){Nodex_L2=($(xml).find('Nodex1_AC_Load_P2_kW').text())}else{Nodex_L2=0;}
if(chk1_No3){Nodex_L3=($(xml).find('Nodex1_AC_Load_P3_kW').text())}else{Nodex_L3=0;}
Sum_nodexL=parseInt(Nodex_L1)+parseInt(Nodex_L2)+parseInt(Nodex_L3);sym.$("node2_w_in").html((Sum_nodex1).toFixed(2)+"  kW");sym.$("node2_w_load").html((Sum_nodexL).toFixed(2)+"  kW");sym.$("nodex2_p").html(($(xml).find('Nodex1_Avg_SOC').text())+"  %");sym.$("node2_v").html(($(xml).find('Nodex1_Avg_BDI_DC_V').text())+"  V");sym.$("node2_I").html(($(xml).find('Nodex1_Sum_Batt_I').text())+"  A");chk2_Nodex1=!(isNaN($(xml).find('Nodex2_AC_Input_P1_kW').text()));chk2_Nodex2=!(isNaN($(xml).find('Nodex2_AC_Input_P2_kW').text()));chk2_Nodex3=!(isNaN($(xml).find('Nodex2_AC_Input_P3_kW').text()));if(chk2_Nodex1){Nodex2_v1=($(xml).find('Nodex2_AC_Input_P1_kW').text())}else{Nodex2_v1=0;}
if(chk2_Nodex2){Nodex2_v2=($(xml).find('Nodex2_AC_Input_P2_kW').text())}else{Nodex2_v2=0;}
if(chk2_Nodex3){Nodex2_v3=($(xml).find('Nodex2_AC_Input_P3_kW').text())}else{Nodex2_v3=0;}
Sum_nodex2=parseInt(Nodex2_v1)+parseInt(Nodex2_v2)+parseInt(Nodex2_v3);Sumnodex2=!(isNaN(Sum_nodex2));if(Sumnodex2){Sum_nodex2=Sum_nodex2;}else{Sum_nodex2=0;}
chk2_No1=!(isNaN($(xml).find('Nodex2_AC_Load_P1_kW').text()));chk2_No2=!(isNaN($(xml).find('Nodex2_AC_Load_P2_kW').text()));chk2_No3=!(isNaN($(xml).find('Nodex2_AC_Load_P3_kW').text()));if(chk2_No1){Nodex_L1=($(xml).find('Nodex2_AC_Load_P1_kW').text())}else{Nodex2_L1=0;}
if(chk2_No2){Nodex_L2=($(xml).find('Nodex2_AC_Load_P2_kW').text())}else{Nodex2_L2=0;}
if(chk2_No3){Nodex_L3=($(xml).find('Nodex2_AC_Load_P3_kW').text())}else{Nodex2_L3=0;}
Sum_nodexL2=parseInt(Nodex2_L1)+parseInt(Nodex2_L2)+parseInt(Nodex2_L3);SumnodexL2=!(isNaN(Sum_nodexL2));if(SumnodexL2){Sum_nodexL2=Sum_nodexL2;}else{Sum_nodexL2=0;}
sym.$("node1_w_in").html((Sum_nodex2).toFixed(2)+"  kW");sym.$("node1_w_load").html((Sum_nodexL2).toFixed(2)+"  kW");sym.$("nodex1_p").html(($(xml).find('Nodex2_Avg_SOC').text())+"  %");sym.$("node1_v").html(($(xml).find('Nodex2_Avg_BDI_DC_V').text())+"  V");sym.$("node1_I").html(($(xml).find('Nodex2_Sum_Batt_I').text())+"  A");if(Sum_nodex1<=-2){sym.$("nodex2").show();}else{sym.$("nodex2").hide();}
if(Sum_nodex2<=-2){sym.$("nodex1").show();}else{sym.$("nodex1").hide();}
if(Sum_nodex1>=2){sym.$("nodex_in2").show();sym.$("nodex_in2_2").show();}else{sym.$("nodex_in2").hide();sym.$("nodex_in2_2").hide();}
if(Sum_nodex2>=2){sym.$("nodex_in1").show();sym.$("nodex_in2").show();}else{sym.$("nodex_in1").hide();}}});});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"document","compositionReady",function(sym,e){var youtubevid=$("<iframe/>");sym.$("G_irr").append(youtubevid);youtubevid.attr('type','text/html');youtubevid.attr('width','280');youtubevid.attr('height','120');youtubevid.attr('src','./graph/irr.php');youtubevid.attr('frameborder','0');youtubevid.attr('allowfullscreen','0');youtubevid.attr('scrolling','no');var Grap_Gen=$("<iframe/>");sym.$("G_gen").append(Grap_Gen);Grap_Gen.attr('type','text/html');Grap_Gen.attr('width','265');Grap_Gen.attr('height','120');Grap_Gen.attr('src','./graph/gen.php');Grap_Gen.attr('frameborder','0');Grap_Gen.attr('allowfullscreen','0');Grap_Gen.attr('scrolling','no');var Grap_PV=$("<iframe/>");sym.$("G_pv").append(Grap_PV);Grap_PV.attr('type','text/html');Grap_PV.attr('width','260');Grap_PV.attr('height','120');Grap_PV.attr('src','./graph/pv.php');Grap_PV.attr('frameborder','0');Grap_PV.attr('allowfullscreen','0');Grap_PV.attr('scrolling','no');var Grap_Solar=$("<iframe/>");sym.$("G_solar").append(Grap_Solar);Grap_Solar.attr('type','text/html');Grap_Solar.attr('width','240');Grap_Solar.attr('height','120');Grap_Solar.attr('src','./graph/solar.php');Grap_Solar.attr('frameborder','0');Grap_Solar.attr('allowfullscreen','0');Grap_Solar.attr('scrolling','no');var Grap_Batt1=$("<iframe/>");sym.$("G_batt1").append(Grap_Batt1);Grap_Batt1.attr('type','text/html');Grap_Batt1.attr('width','240');Grap_Batt1.attr('height','120');Grap_Batt1.attr('src','./graph/BDI1.php');Grap_Batt1.attr('frameborder','0');Grap_Batt1.attr('allowfullscreen','0');Grap_Batt1.attr('scrolling','no');var Grap_Batt2=$("<iframe/>");sym.$("G_batt2").append(Grap_Batt2);Grap_Batt2.attr('type','text/html');Grap_Batt2.attr('width','240');Grap_Batt2.attr('height','120');Grap_Batt2.attr('src','./graph/BDI2.php');Grap_Batt2.attr('frameborder','0');Grap_Batt2.attr('allowfullscreen','0');Grap_Batt2.attr('scrolling','no');var Grap_load=$("<iframe/>");sym.$("G_load").append(Grap_load);Grap_load.attr('type','text/html');Grap_load.attr('width','265');Grap_load.attr('height','120');Grap_load.attr('src','./graph/load.php');Grap_load.attr('frameborder','0');Grap_load.attr('allowfullscreen','0');Grap_load.attr('scrolling','no');var Grap_nodex1=$("<iframe/>");sym.$("G_nodex1").append(Grap_nodex1);Grap_nodex1.attr('type','text/html');Grap_nodex1.attr('width','265');Grap_nodex1.attr('height','120');Grap_nodex1.attr('src','./graph/nodex1.php');Grap_nodex1.attr('frameborder','0');Grap_nodex1.attr('allowfullscreen','0');Grap_nodex1.attr('scrolling','no');var Grap_nodex2=$("<iframe/>");sym.$("G_nodex2").append(Grap_nodex2);Grap_nodex2.attr('type','text/html');Grap_nodex2.attr('width','265');Grap_nodex2.attr('height','120');Grap_nodex2.attr('src','./graph/nodex2.php');Grap_nodex2.attr('frameborder','0');Grap_nodex2.attr('allowfullscreen','0');Grap_nodex2.attr('scrolling','no');});
//Edge binding end
})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'line1'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play("P2");});
//Edge binding end
})("LG1");
//Edge symbol end:'LG1'

//=========================================================

//Edge symbol: 'BDI2load'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play("P2");});
//Edge binding end
})("BDI2load");
//Edge symbol end:'BDI2load'

//=========================================================

//Edge symbol: 'BDI_STP2Load'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play("P1");});
//Edge binding end
})("BDI_STP2Load");
//Edge symbol end:'BDI_STP2Load'

//=========================================================

//Edge symbol: 'solar1'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play("P2");});
//Edge binding end
})("solar1");
//Edge symbol end:'solar1'

//=========================================================

//Edge symbol: 'batt2BDIMTPs'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",5228,function(sym,e){sym.play(0);});
//Edge binding end
})("batt2BDIMTPs");
//Edge symbol end:'batt2BDIMTPs'

//=========================================================

//Edge symbol: 'Batt2BDISTP'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play("P1");});
//Edge binding end
})("Batt2BDISTP");
//Edge symbol end:'Batt2BDISTP'

//=========================================================

//Edge symbol: 'PV'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",4000,function(sym,e){sym.play(0);});
//Edge binding end
})("PV");
//Edge symbol end:'PV'

//=========================================================

//Edge symbol: 'nodex1'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play("P1");});
//Edge binding end
})("nodex1");
//Edge symbol end:'nodex1'

//=========================================================

//Edge symbol: 'nodex2'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play("p1");});
//Edge binding end
})("nodex2");
//Edge symbol end:'nodex2'

//=========================================================

//Edge symbol: 'pv2BDIMTP'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",12074,function(sym,e){sym.play("P2");});
//Edge binding end
})("pv2BDIMTP");
//Edge symbol end:'pv2BDIMTP'

//=========================================================

//Edge symbol: 'PV2BDISTP'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",12073,function(sym,e){sym.play("P1");});
//Edge binding end
})("PV2BDISTP");
//Edge symbol end:'PV2BDISTP'

//=========================================================

//Edge symbol: 'Toload3'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",8000,function(sym,e){sym.play("P1");});
//Edge binding end
})("Toload3");
//Edge symbol end:'Toload3'

//=========================================================

//Edge symbol: 'pv2BDI1'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",12073,function(sym,e){sym.play("P1");});
//Edge binding end
})("pv2BDI1");
//Edge symbol end:'pv2BDI1'

//=========================================================

//Edge symbol: 'PV2BDI2'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",12073,function(sym,e){sym.play("P1");});
//Edge binding end
})("PV2BDI2");
//Edge symbol end:'PV2BDI2'

//=========================================================

//Edge symbol: 'nodex_in1'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",10500,function(sym,e){sym.play("P1");});
//Edge binding end
})("nodex_in1");
//Edge symbol end:'nodex_in1'

//=========================================================

//Edge symbol: 'nodex_in2'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",10500,function(sym,e){sym.play("P1");});
//Edge binding end
})("nodex_in2");
//Edge symbol end:'nodex_in2'

//=========================================================

//Edge symbol: 'nodex_in2_2'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",5250,function(sym,e){sym.play("P1");});
//Edge binding end
})("nodex_in2_2");
//Edge symbol end:'nodex_in2_2'
})(jQuery,AdobeEdge,"EDGE-174488029");