/***********************
* Adobe Edge Animate Composition Actions
*
* Edit this file with caution, being careful to preserve 
* function signatures and comments starting with 'Edge' to maintain the 
* ability to interact with these actions from within Adobe Edge Animate
*
***********************/
(function($, Edge, compId){
var Composition = Edge.Composition, Symbol = Edge.Symbol; // aliases for commonly used Edge classes

   //Edge symbol: 'stage'
   (function(symbolName) {
      

      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 0, function(sym, e) {
         // insert code here
		 var TEST,MC1,MC2,MC3,MC4,WTMC,EMER;
         var Load1,PV1,PV2,Wind,Batt1,Sum_PV,GCI1,Wind2,WT1;
         var chk_Gen,chk_3Gen,chk_3Gen1,chk_3Gen2=new Boolean()
         var chk_1PV,chk_1PV1,chk_1PV2,chk_1PV3,chk_1PV4=new Boolean();
         var chk_2PV,chk_2PV1,chk_2PV2=new Boolean();
         var chk_PV_1,chk_PV_2,chk_PV_3=new Boolean();
         var chk_1Load,chk_1Load1,chk_1Load2=new Boolean();
		 var chk_1GCI,chk_1GCI1,chk_1GCI2=new Boolean();
         var chk_1Batt,chk_1Batt1,chk_1Batt2,chk_1Batt3,chk_1Batt4,total1=new Boolean();
		 var chk_1WT,chk_1WT1,chk_1WT2=new Boolean();
		 		 
         var d = new Date();
         var n = d.getSeconds();
		 	sym.$("pv1").hide();
         	sym.$("pv2").hide();
         	sym.$("wind").hide();
			sym.$("INV2Grid").hide();
			sym.$("wind2").hide();
			sym.$("wt1").hide();
			
		$.ajax({	
         
         type: "GET",
         url: "Xml/Main.xml",
         dataType: "xml",
         success: function(xml) {
         	sym.$("pv1").hide();
         	sym.$("pv2").hide();
         	sym.$("wind").hide();
         	sym.$("INV2Grid").hide();
			sym.$("wind2").hide();
			sym.$("wt1").hide();
						
         //------------------
		 
		 	 sym.$("G_V").html(($(xml).find('ACin_Voltage_L1').text()));
			 sym.$("G_V2").html(($(xml).find('ACin_Current_I1').text()));
			 sym.$("G_V3").html(($(xml).find('ACin_Power_P1_kW').text()));
			 sym.$("G_A").html(($(xml).find('ACin_Voltage_L2').text()));
			 sym.$("G_A2").html(($(xml).find('ACin_Current_I2').text()));
			 sym.$("G_A3").html(($(xml).find('ACin_Power_P2_kW').text()));
			 sym.$("G_kW").html(($(xml).find('ACin_Voltage_L3').text()));
			 sym.$("G_kW2").html(($(xml).find('ACin_Current_I3').text()));
			 sym.$("G_kW3").html(($(xml).find('ACin_Power_P3_kW').text()));
			 sym.$("Gen_kW3_2").html(($(xml).find('BDI_Today_ACin_kWh').text()));
			 sym.$("Gen_kW2_2").html(($(xml).find('BDI_Today_AC_Feed2Grid_kWh').text()));
			 sym.$("TotalGrid_kW").html(($(xml).find('ACin_Total_Power_kW').text()));		 			 
			 
			 sym.$("Inv_V").html(($(xml).find('BDI_Voltage_L1').text()));
         	 sym.$("Inv_V2").html(($(xml).find('BDI_Current_I1').text()));
             sym.$("Inv_V3").html(($(xml).find('BDI_Power_P1_kW').text()));
			 sym.$("Inv_A").html(($(xml).find('BDI_Voltage_L2').text()));
         	 sym.$("Inv_A2").html(($(xml).find('BDI_Current_I2').text()));
			 sym.$("Inv_A3").html(($(xml).find('BDI_Power_P2_kW').text()));
			 sym.$("Inv_kW").html(($(xml).find('BDI_Voltage_L3').text()));
         	 sym.$("Inv_kW2").html(($(xml).find('BDI_Current_I3').text()));
			 sym.$("Inv_kW3").html(($(xml).find('BDI_Power_P3_kW').text()));
			 sym.$("TotalInv_kW").html(($(xml).find('BDI_Total_Power_kW').text()));
			 
			 sym.$("Load_V").html(($(xml).find('LoadPM_Voltage_L1').text()));
			 sym.$("Load_V2").html(($(xml).find('LoadPM_Current_I1').text()));
			 sym.$("Load_V3").html(($(xml).find('LoadPM_Power_P1_kW').text()));
			 sym.$("Load_A").html(($(xml).find('LoadPM_Voltage_L2').text()));
			 sym.$("Load_A2").html(($(xml).find('LoadPM_Current_I2').text()));
			 sym.$("Load_A3").html(($(xml).find('LoadPM_Power_P2_kW').text()));
			 sym.$("Load_kW").html(($(xml).find('LoadPM_Voltage_L3').text()));
			 sym.$("Load_kW2").html(($(xml).find('LoadPM_Current_I3').text()));
			 sym.$("Load_kW3").html(($(xml).find('LoadPM_Power_P3_kW').text()));
			 sym.$("Load_kW3_2").html(($(xml).find('LoadPM_Total_P_kW').text()));
			 sym.$("Load_kW2_2").html(($(xml).find('LoadPM_Today_Import_kWh').text()));
			 
			 sym.$("PV1").html(($(xml).find('SCC_PV_Voltage').text()));
         	 sym.$("PV1_In").html(($(xml).find('SCC_PV_Current').text()));
         	 sym.$("PV1_Out").html(($(xml).find('SCC_PV_Power_kW').text()));
			 sym.$("PV1Copy2").html(($(xml).find('SCC_Chg_Voltage').text()));
         	 sym.$("PV3_In").html(($(xml).find('SCC_Chg_Current').text()));
         	 sym.$("PV3_Out").html(($(xml).find('SCC_Chg_Power_kW').text()));
			 sym.$("SCC_A2_2").html(($(xml).find('SCC_Today_PV_kWh').text()));
			 sym.$("SCC_A3_2").html(($(xml).find('SCC_Today_Chg_kWh').text()));
			 			 
			 sym.$("Wind_V").html(($(xml).find('WindPM_Voltage_L1').text()));
			 sym.$("Wind_V2").html(($(xml).find('WindPM_Current_I1').text()));
			 sym.$("Wind_V3").html(($(xml).find('WindPM_Power_P1_kW').text()));			 
			 sym.$("Wind_A").html(($(xml).find('WindPM_Voltage_L2').text()));
			 sym.$("Wind_A2").html(($(xml).find('WindPM_Current_I2').text()));
			 sym.$("Wind_A3").html(($(xml).find('WindPM_Power_P2_kW').text()));
			 sym.$("Wind_kW").html(($(xml).find('WindPM_Voltage_L3').text()));
			 sym.$("Wind_kW2").html(($(xml).find('WindPM_Current_I3').text()));
			 sym.$("Wind_kW3").html(($(xml).find('WindPM_Power_P3_kW').text()));
			 sym.$("Wind_kW3_2").html(($(xml).find('WindPM_Total_P_kW').text()));
			 sym.$("Wind_kW2_2").html(($(xml).find('WindPM_Today_Import_kWh').text()));
			 
			 sym.$("G1_kW").html(($(xml).find('GCI1_AC_Power_kW').text()));
			 sym.$("G2_kW").html(($(xml).find('GCI2_AC_Power_kW').text()));
			 
							 
			 //---------------- Check Gen
         	PV1 = $(xml).find('ACin_Total_Power_kW').text();
         		chk_1PV1 = !(isNaN(PV1));
         		chk_1PV2 = (PV1> 0);
         		chk_1PV3 = (PV1< -0.1);
         		chk_1PV4 = (PV1> 0.1);
         		chk_1PV = chk_1PV1 && chk_1PV2;
					
         //---------------- Check Load
         	Load1 = $(xml).find('LoadPM_Total_P_kW').text();
         		chk_1Load1 =!(isNaN(Load1));
         		chk_1Load2 =(Load1> 0);
         		chk_1Load = chk_1Load1 && chk_1Load2;
					
         //---------------- Check Solar 145 kWp
         	/*chk_PV_1 = !(isNaN($(xml).find('SCC1_PV_Power_kW').text()));
         	chk_PV_2 = !(isNaN($(xml).find('SCC2_PV_Power_kW').text()));
         	chk_PV_3 = !(isNaN($(xml).find('SCC3_PV_Power_kW').text()));
         	if(chk_PV_1){PV1_total = parseFloat($(xml).find('SCC1_PV_Power_kW').text());}else{PV1_total =0;}
         	if(chk_PV_2){PV2_total = parseFloat($(xml).find('SCC2_PV_Power_kW').text());}else{PV2_total =0;}
         	if(chk_PV_3){PV3_total = parseFloat($(xml).find('SCC3_PV_Power_kW').text());}else{PV3_total =0;}
         		Sum_PV=((PV1_total)+(PV2_total));
         		chk_2PV2 = (Sum_PV> 0);*/
			Sum_PV = $(xml).find('SCC_PV_Power_kW').text();
				chk_PV_1 =!(isNaN(Sum_PV));
				chk_PV_2 =(Sum_PV> 0);
				chk_2PV2 = chk_PV_1 && chk_PV_2;
		
		//---------------- Check Solar 50 kWp * 2 Units
         	GCI1 = $(xml).find('GCI_Sum_AC_kW').text();
         		chk_1GCI1 =!(isNaN(GCI1));
         		chk_1GCI2 =(GCI1> 0);
         		chk_1GCI = chk_1GCI1 && chk_1GCI2;
				
		//---------------- Check Wind turbine
           WT1 = $(xml).find('WindPM_Total_P_kW').text();
			    chk_1WT1 = !(isNaN(WT1));
         		chk_1WT2 = (WT1> 0);
         		chk_1WT = chk_1WT1 && chk_1WT2;
				
		 //---------- Check 
         
         			if(chk_1PV){
         				if(chk_1PV4){
         					sym.$("pv1").show(); // Gen>0
         				}
         			}else{
         				if(chk_1PV3){
         					sym.$("INV2Grid").show(); // Gen<0
         				}
         			}
					/////
         			if(chk_1Load){// (LoadPM>0) 
         				sym.$("pv2").show();
         			}
					/////
         			if(chk_2PV2){// > Solar 145 kWp
         				sym.$("wind").show();
         			}
					/////
					if(chk_1GCI){// (GCI>0)  
         				sym.$("wind2").show();
         			}					
					/////
					if(chk_1WT){// (WindPM>0) 
					    sym.$("wt1").show();
					}
					
         }//------------end function
		 });
		 //-------------------------------
         $.ajax({	
         
         type: "GET",
         url: "xml/Battery.xml",
         dataType: "xml",
         success: function(xml) {
			sym.$("AC_BattIn").hide();
         	sym.$("AC_BattOut").hide();
         	sym.$("Batt_out").hide();
         	sym.$("Batt_in").hide();
		//------------------
		 	sym.$("Battery_V").html(($(xml).find('Batt_Avg_Voltage').text())+"  V");
         	sym.$("Battery_A").html(($(xml).find('Batt_Sum_Power_kW').text())+"  kW");
         	sym.$("Battery_SOC").html(($(xml).find('Batt_Avg_SOC').text())+"  %");
		
		//------------------- Check Batt
         	Batt1 = $(xml).find('Batt_Sum_Current').text();
         		chk_1Batt1 =!(isNaN(Batt1));
         		chk_1Batt2 =(Batt1< 0);
         		chk_1Batt3 =(Batt1 < -0.1);
         		chk_1Batt4 =(Batt1 > 0.1);
         		chk_1Batt= chk_1Batt1 && chk_1Batt2;
				
		//---------- Check 
         			if(chk_1Batt2){//----------Batt1 <0
         				if(chk_1Batt3){
         					sym.$("Batt_out").show();
         					sym.$("AC_BattOut").show();
         				}
         			}else{
         				if(chk_1Batt4){ //----------Batt1 > 0.1
							sym.$("Batt_in").show();
         					sym.$("AC_BattIn").show();
         
         				}
         			}
		 }//------------end function
		 });
		 //-------------------------------
         $.ajax({	
         
         type: "GET",
         url: "Xml/Energylog.xml",
         dataType: "xml",
         success: function(xml) {
			 sym.$("Co2_A2_2").html(($(xml).find('Today_CO2_emission_kgCO2e').text()));
			 sym.$("Co2").html(($(xml).find('Todate_CO2_emission_TonCO2e').text())); 
			  }//------------end function	
         });
		 
		 
	});
      //Edge binding end

   })("stage");
   //Edge symbol end:'stage'

   //=========================================================
   
   //Edge symbol: 'Batt_in'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 1500, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

   })("Batt_in");
   //Edge symbol end:'Batt_in'

   //=========================================================
   
   //Edge symbol: 'Batt_out'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 1250, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

   })("Batt_out");
   //Edge symbol end:'Batt_out'

})(jQuery, AdobeEdge, "EDGE-174488029");