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
        var Gen1_total,Gen2_total,Gen3_total,Sum_Total,Batt_V1,Batt_V3,PVV;
        var GCI1_AC,GCI2_AC,GCI3_AC,GCI4_AC;
		var SCC1_total,SCC2_total,SCC3_total,Sum_SCC,chk_SCC1,chk_SCC2,chk_SCC3;
        var AC_load_kVA1,AC_load_kVA2,AC_load_kVA3,SLoad,LD1_total,LD2_total,LD3_total;
        var Sum_GD,sum_Load_kVA,sum_Load_kW,Solar_1,Solar_2,PV,Batt_I1,Batt_I3,LoadU,BDI_kW1,BDI_kW2;
		var AC1,AC2,AC3,AC4;       
        var chk_GD1,chk_GD2,chk_GD3,chk_GD4,chk_PV,chk_GCI1_AC,chk_GCI2_AC,chk_GCI3_AC,chk_Load1,chk_Load2,chk_Load3=new Boolean();
        var BDI1_1_total,BDI1_2_total,BDI1_3_total,Sum_BDI1;
        var BDI2_1_total,BDI2_2_total,BDI2_3_total,Sum_BDI2;
        var BDI3_1_total,BDI3_2_total,BDI3_3_total,Sum_BDI3;
        var BDI4_1_total,BDI4_2_total,BDI4_3_total,Sum_BDI4;
        var BDI5_1_total,BDI5_2_total,BDI5_3_total,Sum_BDI5;
        var BDI6_1_total,BDI6_2_total,BDI6_3_total,Sum_BDI6;
        var chk_BDI1_1,chk_BDI1_2,chk_BDI1_3=new Boolean();
        var chk_BDI2_1,chk_BDI2_2,chk_BDI2_3=new Boolean();
        var chk_BDI3_1,chk_BDI3_2,chk_BDI3_3=new Boolean();
        var chk_BDI4_1,chk_BDI4_2,chk_BDI4_3=new Boolean();
        var chk_BDI5_1,chk_BDI5_2,chk_BDI5_3=new Boolean();
        var chk_BDI6_1,chk_BDI6_2,chk_BDI6_3=new Boolean();
        var chk_Solar1,chk_Solar2,chk_Solar=new Boolean();
         var chk_PV1,chk_PV2=new Boolean();
         var chk_Batt_I3,chk_Batt_I1,chk_Load,chk_BDI_kW1,chk_BDI_kW2,chk_Batt3_kW1,chk3_Batt_kW=new Boolean();
         var d = new Date();
         var n = d.getSeconds();
         $.ajax({	
         type: "GET",
         url: "xml/main.xml",
         dataType: "xml",
         	success: function(xml) {
			   chk_Load1 = !(isNaN($(xml).find('Load_PM_Power_P1_kW').text()));
         	   chk_Load2 = !(isNaN($(xml).find('Load_PM_Power_P2_kW').text()));
         	   chk_Load3 = !(isNaN($(xml).find('Load_PM_Power_P3_kW').text()));
         	    if(chk_Load1){LD1_total = parseFloat($(xml).find('Load_PM_Power_P1_kW').text());}else{LD1_total =0;}
         		if(chk_Load2){LD2_total = parseFloat($(xml).find('Load_PM_Power_P2_kW').text());}else{LD2_total =0;}
         		if(chk_Load3){LD3_total = parseFloat($(xml).find('Load_PM_Power_P3_kW').text());}else{LD3_total =0;}
         		Sum_Load = ((LD1_total)+(LD2_total)+(LD3_total));
				
				chk_SCC1 = !(isNaN($(xml).find('SCC1_Chg_Power_kW').text()));
         	    chk_SCC2 = !(isNaN($(xml).find('SCC2_Chg_Power_kW').text()));
				if(chk_SCC1){SCC1_total = parseFloat($(xml).find('SCC1_Chg_Power_kW').text());}else{SCC1_total =0;}
         		if(chk_SCC2){SCC2_total = parseFloat($(xml).find('SCC2_Chg_Power_kW').text());}else{SCC2_total =0;}
				Sum_SCC = ((SCC1_total)+(SCC2_total));
				
			   chk_BDI1_1 = !(isNaN($(xml).find('BDI1_BDI_Total_Power_kW').text()));
         	   chk_BDI1_2 = !(isNaN($(xml).find('BDI2_BDI_Total_Power_kW').text()));
         	   //chk_BDI1_3 = !(isNaN($(xml).find('BDI1_P3_kW').text()));
         	   if(chk_BDI1_1){BDI1_1_total = parseFloat($(xml).find('BDI1_BDI_Total_Power_kW').text());}else{BDI1_1_total =0;}
         	   if(chk_BDI1_2){BDI1_2_total = parseFloat($(xml).find('BDI2_BDI_Total_Power_kW').text());}else{BDI1_2_total =0;}
         		//if(chk_BDI1_3){BDI1_3_total = parseFloat($(xml).find('BDI1_P3_kW').text());}else{BDI1_3_total =0;}
         		Sum_BDI1=	((BDI1_1_total)+(BDI1_2_total));//
				
         	   chk_GD1 = !(isNaN($(xml).find('Gen1_Total_Power_kW').text()));
         	   chk_GD2 = !(isNaN($(xml).find('Gen2_Total_Power_kW').text()));
         	   //chk_GD3 = !(isNaN($(xml).find('AC_Input_P3_kW').text()));
         	    if(chk_GD1){Gen1_total = parseFloat($(xml).find('Gen1_Total_Power_kW').text());}else{Gen1_total =0;}
         		if(chk_GD2){Gen2_total = parseFloat($(xml).find('Gen2_Total_Power_kW').text());}else{Gen2_total =0;}
         		//if(chk_GD3){Gen3_total = parseFloat($(xml).find('AC_Input_P3_kW').text());}else{Gen3_total =0;}
         		Sum_GD = ((Gen1_total)+(Gen2_total));

			   chk_GCI1_AC = !(isNaN($(xml).find('GCI1_AC_Power_kW').text()));
         	   chk_GCI2_AC = !(isNaN($(xml).find('GCI2_AC_Power_kW').text()));
         	   chk_GCI3_AC = !(isNaN($(xml).find('GCI3_AC_Power_kW').text()));
			   chk_GCI4_AC = !(isNaN($(xml).find('GCI4_AC_Power_kW').text()));
         	    if(chk_GCI1_AC){GCI1_AC = parseFloat($(xml).find('GCI1_AC_Power_kW').text());}else{GCI1_AC =0;}
         		if(chk_GCI2_AC){GCI2_AC = parseFloat($(xml).find('GCI2_AC_Power_kW').text());}else{GCI2_AC =0;}
         		if(chk_GCI3_AC){GCI3_AC = parseFloat($(xml).find('GCI3_AC_Power_kW').text());}else{GCI3_AC =0;}
				if(chk_GCI4_AC){GCI4_AC = parseFloat($(xml).find('GCI4_AC_Power_kW').text());}else{GCI4_AC =0;}
				AC1=GCI1_AC;
				AC2=GCI2_AC;
				AC3=GCI3_AC;
				AC4=GCI4_AC;				
				PV = ((GCI1_AC)+(GCI2_AC)+(GCI3_AC)+(GCI4_AC));//$(xml).find('GCI_Sum_PV_Power_kW').text();*/
         		chk_PV=!(isNaN(PV));
         		if(chk_PV){PVV=PV;}else{PVV=0;}
				
				LoadU =Sum_Load;
         		chk_Load=!(isNaN(LoadU));
         		if(chk_Load){SLoad=LoadU;}else{SLoad=0;}
				
				Solar_1=Sum_SCC;
         		chk_Solar1=!(isNaN(Solar_1));
         		/*Solar_2=$(xml).find('SCC2_Chg_Power_kW').text();
         		chk_Solar2=!(isNaN(Solar_2));*/
				
				BDI_kW1 = $(xml).find('BDI1_BDI_Total_Power_kW').text();
         		chk_BDI_kW1=!(isNaN(BDI_kW1));
				
				BDI_kW2 = $(xml).find('BDI2_BDI_Total_Power_kW').text();
         		chk_BDI_kW2=!(isNaN(BDI_kW2));
				
	
			 sym.$("RH").html(($(xml).find('RH').text()));
         	 sym.$("PV_temp").html(($(xml).find('Tmod').text()));
         	 sym.$("Temp1").html(($(xml).find('Tamb').text()));
			 sym.$("Irr").html(($(xml).find('Irradiance_W_m2').text()));
			 
			 sym.$("Load_kW").html(Sum_Load.toFixed(1));
			 //sym.$("Load_kW").html(($(xml).find('Load_PM_Total_P_kW').text()));
			 sym.$("Load_output1").html(($(xml).find('Load_PM_Voltage_L1').text()));
         	 sym.$("Load_output2").html(($(xml).find('Load_PM_Voltage_L2').text()));
         	 sym.$("Load_output3").html(($(xml).find('Load_PM_Voltage_L3').text()));
			 sym.$("Load_I1").html(($(xml).find('Load_PM_Current_I1').text()));
         	 sym.$("Load_I2").html(($(xml).find('Load_PM_Current_I2').text()));
         	 sym.$("Load_I3").html(($(xml).find('Load_PM_Current_I3').text()));
			 //sym.$("Load_fac").html(($(xml).find('AC_Load_PF').text()));
			 
			 sym.$("Solar_kW").html(Sum_SCC.toFixed(1)); 
			 sym.$("Scc_1kW").html(($(xml).find('SCC1_Chg_Power_kW').text()));
			 sym.$("Scc_2kW").html(($(xml).find('SCC2_Chg_Power_kW').text()));
			  
         	 sym.$("BDI_kW").html(Sum_BDI1.toFixed(1));
			 sym.$("BDI_1kW").html(($(xml).find('BDI1_BDI_Total_Power_kW').text()));
			 sym.$("BDI_2kW").html(($(xml).find('BDI2_BDI_Total_Power_kW').text()));
			 
			 sym.$("GD_kW").html(Sum_GD.toFixed(1));
			 sym.$("DG1").html(($(xml).find('Gen1_Total_Power_kW').text()));
         	 sym.$("DG2").html(($(xml).find('Gen2_Total_Power_kW').text()));
			 
			 sym.$("GCI_kW").html(PV.toFixed(1));
			 sym.$("GCI_1").html(AC1.toFixed(1));
			 sym.$("GCI_2").html(AC2.toFixed(1));
			 sym.$("GCI_3").html(AC3.toFixed(1));
			 sym.$("GCI_4").html(AC4.toFixed(1));
			 /*sym.$("GCI_1").html(($(xml).find('GCI1_AC_Power_kW').text()));
         	 sym.$("GCI_2").html(($(xml).find('GCI2_AC_Power_kW').text()));
			 sym.$("GCI_3").html(($(xml).find('GCI3_AC_Power_kW').text()));
         	 sym.$("GCI_4").html(($(xml).find('GCI4_AC_Power_kW').text()));*/

         	 //------------------------------------------------------------
         	sym.$("L_gen").hide();
         	sym.$("Toload1").hide();
         	sym.$("Toload2").hide();
         	sym.$("Toload3").hide();
         	sym.$("solar1").hide();
         	sym.$("Solar2").hide();			
			sym.$("batt2BDIMTPs").hide();
			sym.$("Batt2BDISTP2").hide();
			sym.$("pv2BDIMTP").hide();
			sym.$("PV2BDISTP").hide();
			sym.$("PV2").hide();
			sym.$("pv2BDI1").hide();
			sym.$("PV2BDI22").hide();
			sym.$("nodex2batt").hide();			
			sym.$("batt2Slave").hide();
			sym.$("Slave2batt").hide();

         	//--------------------------------
         	if(Sum_GD>0.3){sym.$("L_gen").show();sym.$("Toload1").show();sym.$("Toload2").show();}
			if(chk_Load){
         		if(Sum_Load>0.3) {
					sym.$("Toload3").show();
				}	
         	}
			if(chk_PV){	
			    if(PV>0.3){
					sym.$("PV2").show();
				}	
			}
			
			if(chk_Solar1){	
			    if(Solar_1>0.3){
					sym.$("solar1").show();
				}	
			}
			
			if(chk_BDI_kW1){
				if(BDI_kW1>0.3){
         			sym.$("batt2BDIMTPs").show();
         			sym.$("Toload1").show();
         		}else if((BDI_kW1<-0.3)){
         			sym.$("pv2BDIMTP").show();
         			if(Sum_GD<=0){
         				sym.$("PV2BDI22").show();
         			}
         		}	
				
			}
			if(chk_BDI_kW2){	
         		if(BDI_kW2>0.3){
         			sym.$("Batt2BDISTP2").show();
					sym.$("batt2Slave").show();
					sym.$("Toload2").show();
         		}else if((BDI_kW2<-0.3)){
         				sym.$("PV2BDISTP").show();
         				if(Sum_GD<=0){
         					if(BDI_kW1<-0.3){
         						//sym.$("pv2BDI1").show(); //not use this line
								sym.$("Slave2batt").show();
         						}
         				}
         		}	
         	}
         	/*if(chk_Solar2){	if(Solar_2>0.3){sym.$("Solar2").show();}	}*/
         	
         	}//------------end function	
         }); 
         //------------------
		 $.ajax({	
         
         type: "GET",
         url: "xml2/Main.xml",
         dataType: "xml",
         success: function(xml) {
			sym.$("BattDown").hide();
			sym.$("BattUp").hide();
		//------------------
		 	 sym.$("Batt1_v").html(($(xml).find('HVB1_Avg_V').text()));
			 sym.$("Batt1_I").html(($(xml).find('HVB1_Batt_I').text()));
         	 sym.$("Batt1_soc").html(($(xml).find('HVB1_SOC').text()));
		
		//------------------- Check Batt
         	    Batt_I1 = $(xml).find('HVB1_Batt_I').text();
         		chk_Batt_I1=!(isNaN(Batt_I1));

         		/*Sum_Total=parseFloat(Sum_GD)+parseFloat(PVV);//Load_kVA*/
         		if(Batt_I1>0){sym.$("txt_batt1").html("Discharg");}else{sym.$("txt_batt1").html("Charging");}
	
		//---------- Check 
			if(chk_Batt_I1){
			  if(Batt_I1>0.3){
				sym.$("BattDown").show();
			  }else if((Batt_I1<-0.3)){
				sym.$("BattUp").show();
			  }
			}	
		 }//------------end function
		 });
		 //-------------------------------
      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "document", "compositionReady", function(sym, e) {
          var youtubevid = $("<iframe/>");
          sym.$("G_irr").append(youtubevid);
          youtubevid.attr('type','text/html');
          youtubevid.attr('width','286');
          youtubevid.attr('height','120');
          youtubevid.attr('src','./graph/irr.php');  
          youtubevid.attr('frameborder','0');	   
          youtubevid.attr('allowfullscreen','0');   
          youtubevid.attr('scrolling','no');
          //--
		  var Grap_load= $("<iframe/>");
          sym.$("G_load").append(Grap_load);
          Grap_load.attr('type','text/html');
          Grap_load.attr('width','253');
          Grap_load.attr('height','150');
          Grap_load.attr('src','./graph/load.php'); 
          Grap_load.attr('frameborder','0');
          Grap_load.attr('allowfullscreen','0'); 
          Grap_load.attr('scrolling','no');  
          //--
		  var Grap_Solar= $("<iframe/>");
          sym.$("G_solar").append(Grap_Solar);
          Grap_Solar.attr('type','text/html');
          Grap_Solar.attr('width','253');
          Grap_Solar.attr('height','120');
          Grap_Solar.attr('src','./graph/solar.php'); 
          Grap_Solar.attr('frameborder','0');	
          Grap_Solar.attr('allowfullscreen','0'); 
          Grap_Solar.attr('scrolling','no'); 
          //--
		  var Grap_Batt1= $("<iframe/>");
          sym.$("G_bdi").append(Grap_Batt1);
          Grap_Batt1.attr('type','text/html');
          Grap_Batt1.attr('width','253');
          Grap_Batt1.attr('height','120');
          Grap_Batt1.attr('src','./graph/bdi.php');  
          Grap_Batt1.attr('frameborder','0');
          Grap_Batt1.attr('allowfullscreen','0');
          Grap_Batt1.attr('scrolling','no'); 
		  //--
		  var Grap_Batt2= $("<iframe/>");
          sym.$("G_soc").append(Grap_Batt2);
          Grap_Batt2.attr('type','text/html');
          Grap_Batt2.attr('width','253');
          Grap_Batt2.attr('height','120');
          Grap_Batt2.attr('src','./graph/SOC.php'); 
          Grap_Batt2.attr('frameborder','0');
          Grap_Batt2.attr('allowfullscreen','0');
          Grap_Batt2.attr('scrolling','no');
          //
          var Grap_Gen = $("<iframe/>");
          sym.$("G_gen").append(Grap_Gen);
          Grap_Gen.attr('type','text/html');
          Grap_Gen.attr('width','255');
          Grap_Gen.attr('height','150');
          Grap_Gen.attr('src','./graph/gen.php');  
          Grap_Gen.attr('frameborder','0');	   
          Grap_Gen.attr('allowfullscreen','0'); 
          Grap_Gen.attr('scrolling','no'); 
          //--
          var Grap_PV = $("<iframe/>");
          sym.$("G_pv").append(Grap_PV);
          Grap_PV.attr('type','text/html');
          Grap_PV.attr('width','255');
          Grap_PV.attr('height','120');
          Grap_PV.attr('src','./graph/pv.php');  
          Grap_PV.attr('frameborder','0');	
          Grap_PV.attr('allowfullscreen','0'); 
          Grap_PV.attr('scrolling','no'); 
          //-- 
          /*var Grap_nodex1= $("<iframe/>");
          sym.$("G_nodex1").append(Grap_nodex1);
          Grap_nodex1.attr('type','text/html');
          Grap_nodex1.attr('width','253');
          Grap_nodex1.attr('height','120');
          Grap_nodex1.attr('src','./graph/batt.php'); 
          Grap_nodex1.attr('frameborder','0');
          Grap_nodex1.attr('allowfullscreen','0'); 
          Grap_nodex1.attr('scrolling','no'); 
          //--
          var Grap_nodex2= $("<iframe/>");
          sym.$("G_nodex2").append(Grap_nodex2);
          Grap_nodex2.attr('type','text/html');
          Grap_nodex2.attr('width','253');
          Grap_nodex2.attr('height','120');
          Grap_nodex2.attr('src','./graph/batt.php'); 
          Grap_nodex2.attr('frameborder','0');
          Grap_nodex2.attr('allowfullscreen','0'); 
          Grap_nodex2.attr('scrolling','no'); */
      });
      //Edge binding end

   })("stage");
   //Edge symbol end:'stage'

  //=========================================================
   
   //Edge symbol: 'line1'
   (function(symbolName) {   
   
      

      

      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("P2");

      });
      //Edge binding end

   })("LG1");
   //Edge symbol end:'LG1'


   //=========================================================
   
   //Edge symbol: 'BDI2load'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         
         sym.play("P2");

      });
      //Edge binding end

   })("BDI2load");
   //Edge symbol end:'BDI2load'


   //=========================================================
   
   //Edge symbol: 'BDI_STP2Load'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("BDI_STP2Load");
   //Edge symbol end:'BDI_STP2Load'
   
    //=========================================================
   
   //Edge symbol: 'batt2Slave'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         
         sym.play("P2");

      });
      //Edge binding end

   })("batt2Slave");
   //Edge symbol end:'batt2Slave'

   //=========================================================
   
   //Edge symbol: 'solar1'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("P2");

      });
      //Edge binding end

   })("solar1");
   //Edge symbol end:'solar1'

   //=========================================================
   
   //Edge symbol: 'batt2BDIMTPs'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 5228, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

   })("batt2BDIMTPs");
   //Edge symbol end:'batt2BDIMTPs'

   //=========================================================
   
   //Edge symbol: 'Batt2BDISTP'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("Batt2BDISTP");
   //Edge symbol end:'Batt2BDISTP'

   //=========================================================
   
   //Edge symbol: 'PV'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 4000, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

   })("PV");
   //Edge symbol end:'PV'

   //=========================================================
   
   //Edge symbol: 'BattUp'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 4000, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

   })("BattUp");
   //Edge symbol end:'BattUp'

   //=========================================================
   
    //Edge symbol: 'BattDown'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 4000, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

   })("BattDown");
   //Edge symbol end:'BattDown'

   //=========================================================
   
   //Edge symbol: 'nodex1'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("nodex1");
   //Edge symbol end:'nodex1'

   //=========================================================
   
   //Edge symbol: 'nodex2'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("p1");

      });
      //Edge binding end

   })("nodex2");
   //Edge symbol end:'nodex2'

   //=========================================================
   
   //Edge symbol: 'pv2BDIMTP'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 12074, function(sym, e) {
         sym.play("P2");

      });
      //Edge binding end

   })("pv2BDIMTP");
   //Edge symbol end:'pv2BDIMTP'

  //=========================================================
   
   //Edge symbol: 'PV2BDISTP'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 12073, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("PV2BDISTP");
   //Edge symbol end:'PV2BDISTP'

   //=========================================================
   
   //Edge symbol: 'Toload3'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("Toload3");
   //Edge symbol end:'Toload3'

   //=========================================================
   
   //Edge symbol: 'pv2BDI1'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 12073, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("pv2BDI1");
   //Edge symbol end:'pv2BDI1'

    //=========================================================
   
   //Edge symbol: 'PV2BDI2'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 12073, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("PV2BDI2");
   //Edge symbol end:'PV2BDI2'
   
   //=========================================================
   
   //Edge symbol: 'Slave2batt'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 12073, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("Slave2batt");
   //Edge symbol end:'Slave2batt'

   //=========================================================
   
   //Edge symbol: 'nodex_in1'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 10500, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("nodex_in1");
   //Edge symbol end:'nodex_in1'

   //=========================================================
   
   //Edge symbol: 'nodex_in2'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 10500, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("nodex_in2");
   //Edge symbol end:'nodex_in2'

   //=========================================================
   
   //Edge symbol: 'nodex_in2_2'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 5250, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("nodex_in2_2");
   //Edge symbol end:'nodex_in2_2'

   //=========================================================
   
   //Edge symbol: 'nodex11'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("nodex11");
   //Edge symbol end:'nodex11'

   //=========================================================
   
   //Edge symbol: 'nodex2batt'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 12073, function(sym, e) {
         sym.play("P1");

      });
      //Edge binding end

   })("nodex2batt");
   //Edge symbol end:'nodex2batt'

   //=========================================================
   
   //Edge symbol: 'Solar2'
   (function(symbolName) {   
   
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 8000, function(sym, e) {
         sym.play("P2");

      });
      //Edge binding end

   })("Solar2");
   //Edge symbol end:'Solar2'

})(jQuery, AdobeEdge, "EDGE-174488029");