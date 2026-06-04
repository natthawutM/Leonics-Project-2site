/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='images/';

var fonts = {};
var opts = {
    'gAudioPreloadPreference': 'auto',

    'gVideoPreloadPreference': 'auto'
};
var resources = [
];
var symbols = {
"stage": {
    version: "4.0.1",
    minimumCompatibleVersion: "4.0.1",
    build: "4.0.1.365",
    baseState: "Base State",
    scaleToFit: "width",
    centerStage: "none",
    initialState: "Base State",
    gpuAccelerate: false,
    resizeInstances: false,
    content: {
            dom: [
            {
                id: 'new12',
                type: 'image',
                rect: ['0px', '0px','1180px','600px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/new3.png','0px','0px']
            },
			{
                id: 'Gride_LineCopy2',
                type: 'text',
                rect: ['386px', '15px','250px','auto','auto', 'auto'],
                text: "Bi-Directional Inverter",
                align: "center",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "600", "none", ""]
            },
			{
                id: 'AC_Grid_LineCopy2',
                type: 'text',
                rect: ['386px', '45px','280px','auto','auto', 'auto'],
                text: "APOLLO MTP-4110K(Li) (120 kVA/120 kW)",
                align: "center",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(143, 140, 136,1.00)", "400", "none", ""]
            },
			{
                id: 'line_Gen',
                type: 'image',
                rect: ['-10px', '204px','290px','10px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/line.png','0px','0px']
            },
			{
                id: 'Gride_Line',
                type: 'text',
                rect: ['0px', '70px','auto','auto','auto', 'auto'],
                text: "Grid Line ",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "600", "none", ""]
            },
			{
                id: 'AC_Grid_Line',
                type: 'text',
                rect: ['15px', '141px','auto','auto','auto', 'auto'],
                text: "AC Grid Line",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(143, 140, 136,1.00)", "400", "none", ""]
            },
			{
                id: 'GL_V',
                type: 'text',
                rect: ['243px', '130px','auto','auto','auto', 'auto'],
                text: "V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'GL_A',
                type: 'text',
                rect: ['243px', '155px','auto','auto','auto', 'auto'],
                text: "A",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'GL_kW',
                type: 'text',
                rect: ['243px', '180px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },			
			{
                id: 'G_V',
                type: 'text',
                rect: ['0px', '130px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
				id: 'G_V2',
                type: 'text',
                rect: ['0px', '155px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'G_V3',
                type: 'text',
                rect: ['0px', '180px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'G_A',
                type: 'text',
                rect: ['85px', '130px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'G_A2',
                type: 'text',
                rect: ['85px', '155px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'G_A3',
                type: 'text',
                rect: ['85px', '180px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'G_kW',
                type: 'text',
                rect: ['173px', '130px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'G_kW2',
                type: 'text',
                rect: ['173px', '155px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            }, 
			{
                id: 'G_kW3',
                type: 'text',
                rect: ['173px', '180px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Total_Grid',
                type: 'text',
                rect: ['75px', '70px','auto','auto','auto', 'auto'],
                text: "Total",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'TotalGrid_kW',
                type: 'text',
                rect: ['131px', '70px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "600", "none", ""]
            },
			{
                id: 'GridkW',
                type: 'text',
                rect: ['174px', '70px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Total_Gen',
                type: 'text',
                rect: ['0px', '220px','auto','auto','auto', 'auto'],
                text: "Today Energy In",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Total_GenkWh',
                type: 'text',
                rect: ['0px', '245px','auto','auto','auto', 'auto'],
                text: "Today Energy Out",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'GenkW',
                type: 'text',
                rect: ['243px', '220px','auto','auto','auto', 'auto'],
                text: "kWh",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'GenkWh',
                type: 'text',
                rect: ['243px', '245px','auto','auto','auto', 'auto'],
                text: "kWh",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Gen_kW3_2',
                type: 'text',
                rect: ['173x', '220px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,54, 149,1.00)", "600", "none", ""]
            },
			{
                id: 'Gen_kW2_2',
                type: 'text',
                rect: ['173px', '245px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,54, 149,1.00)", "600", "none", ""]
            },
			{
                id: 'AC_Grid_LineCopy3',
                type: 'text',
                rect: ['585px', '70px','auto','auto','auto', 'auto'],
                text: "Inverter Output",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "600", "none", ""]
            },
			{
                id: 'INV_V',
                type: 'text',
                rect: ['805px', '100px','auto','auto','auto', 'auto'],
                text: "V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'INV_A',
                type: 'text',
                rect: ['805px', '128px','auto','auto','auto', 'auto'],
                text: "A",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'INV_kW',
                type: 'text',
                rect: ['805px', '155px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Inv_V',
                type: 'text',
                rect: ['585px', '100px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Inv_V2',
                type: 'text',
                rect: ['585px', '128px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Inv_V3',
                type: 'text',
                rect: ['585px', '155px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Inv_A',
                type: 'text',
                rect: ['660px', '100px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
            {
                id: 'Inv_A2',
                type: 'text',
                rect: ['660px', '128px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Inv_A3',
                type: 'text',
                rect: ['660px', '155px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Inv_kW',
                type: 'text',
                rect: ['737px', '100px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
            {
                id: 'Inv_kW2',
                type: 'text',
                rect: ['737px', '128px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Inv_kW3',
                type: 'text',
                rect: ['737px', '155px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Total_Inv',
                type: 'text',
                rect: ['715px', '70px','auto','auto','auto', 'auto'],
                text: "Total",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'TotalInv_kW',
                type: 'text',
                rect: ['777px', '70px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "600", "none", ""]
            },
			{
                id: 'INVkW',
                type: 'text',
                rect: ['830px', '70px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'line_Load',
                type: 'image',
                rect: ['905px', '180px','283px','10px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/line.png','0px','0px']
            },
			{
                id: 'AC_load',
                type: 'text',
                rect: ['909px', '70px','auto','auto','auto', 'auto'],
                text: "Water Pump",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "600", "none", ""]
            },
			{
                id: 'LD_V',
                type: 'text',
                rect: ['1156px', '100px','auto','auto','auto', 'auto'],
                text: "V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'LD_A',
                type: 'text',
                rect: ['1156px', '128px','auto','auto','auto', 'auto'],
                text: "A",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'LD_kW',
                type: 'text',
                rect: ['1156px', '155px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Load_V',
                type: 'text',
                rect: ['909px', '100px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Load_V2',
                type: 'text',
                rect: ['909px', '130px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Load_V3',
                type: 'text',
                rect: ['909px', '160px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Load_A',
                type: 'text',
                rect: ['995px', '100px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Load_A2',
                type: 'text',
                rect: ['995px', '128px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Load_A3',
                type: 'text',
                rect: ['995px', '155px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Load_kW',
                type: 'text',
                rect: ['1080px', '100px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Load_kW2',
                type: 'text',
                rect: ['1080px', '128px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Load_kW3',
                type: 'text',
                rect: ['1080px', '155px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Total_Load',
                type: 'text',
                rect: ['909px', '195px','auto','auto','auto', 'auto'],
                text: "Total Power",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Total_LoadkWh',
                type: 'text',
                rect: ['909px', '220px','auto','auto','auto', 'auto'],
                text: "Today Energy",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'LDkW',
                type: 'text',
                rect: ['1156px', '195px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'LDkWh',
                type: 'text',
                rect: ['1156px', '220px','auto','auto','auto', 'auto'],
                text: "kWh",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Load_kW3_2',
                type: 'text',
                rect: ['1080px', '195px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "600", "none", ""]
            },
			{
                id: 'Load_kW2_2',
                type: 'text',
                rect: ['1080px', '220px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,54, 149,1.00)", "600", "none", ""]
            },
			/*{
                id: 'LOad_con',
                type: 'text',
                rect: ['909px', '100px','auto','auto','auto', 'auto'],
                text: "Load Consumption",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(143, 140, 136,1.00)", "400", "none", ""]
            },*/
			{
                id: 'line_Scc',
                type: 'image',
                rect: ['-10px', '450px','290px','10px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/line.png','0px','0px']
            },
			{
                id: 'Solar_18',
                type: 'text',
                rect: ['0px', '312px','auto','auto','auto', 'auto'],
                text: "Solar Charger 145 kWp",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "600", "none", ""]
            },
			{
                id: 'PV_Input',
                type: 'text',
                rect: ['0px', '342px','auto','auto','auto', 'auto'],
                text: "PV Input",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(143, 140, 136,1.00)", "400", "none", ""]
            },
			{
                id: 'PV1Copy',
                type: 'text',
                rect: ['173px', '342px','auto','auto','auto', 'auto'],
                text: "DC Output",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(143, 140, 136,1.00)", "400", "none", ""]
            },
			{
                id: 'PV1_V',
                type: 'text',
                rect: ['85px', '372px','auto','auto','auto', 'auto'],
                text: "V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'PV1_A',
                type: 'text',
                rect: ['85px', '397px','auto','auto','auto', 'auto'],
                text: "A",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'PV1_kW',
                type: 'text',
                rect: ['85px', '422px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'PV3_V',
                type: 'text',
                rect: ['243px', '372px','auto','auto','auto', 'auto'],
                text: "V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'PV3_A',
                type: 'text',
                rect: ['243px', '397px','auto','auto','auto', 'auto'],
                text: "A",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'PV3_kW',
                type: 'text',
                rect: ['243px', '422px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'PV1',
                type: 'text',
                rect: ['0px', '372px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
            {
                id: 'PV1_In',
                type: 'text',
                rect: ['0px', '397px','74px','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
            {
                id: 'PV1_Out',
                type: 'text',
                rect: ['0px', '422px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'PV1Copy2',
                type: 'text',
                rect: ['173px', '372px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
            {
                id: 'PV3_In',
                type: 'text',
                rect: ['173px', '397px','74px','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
            {
                id: 'PV3_Out',
                type: 'text',
                rect: ['173px', '422px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Total_SCCPVkwh',
                type: 'text',
                rect: ['0px', '462px','auto','auto','auto', 'auto'],
                text: "Today PV Energy",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Total_SCCChgkwh',
                type: 'text',
                rect: ['0px', '487px','auto','auto','auto', 'auto'],
                text: "Today Chg Energy",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'SCCPVkWh',
                type: 'text',
                rect: ['243px', '462px','auto','auto','auto', 'auto'],
                text: "kWh",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'SCCChgkWh',
                type: 'text',
                rect: ['243px', '487px','auto','auto','auto', 'auto'],
                text: "kWh",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'SCC_A2_2',
                type: 'text',
                rect: ['995px', '462px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,54, 149,1.00)", "600", "none", ""]
            },
			{
                id: 'SCC_A3_2',
                type: 'text',
                rect: ['995px', '487px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,54, 149,1.00)", "600", "none", ""]
            },			
			{
                id: 'line_WT',
                type: 'image',
                rect: ['905px', '450px','283px','10px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/line.png','0px','0px']
            },
			{
                id: 'WT',
                type: 'text',
                rect: ['909px', '342px','auto','auto','auto', 'auto'],
                text: "Wind Turbine 10 kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "600", "none", ""]
            },
			{
                id: 'WT_V',
                type: 'text',
                rect: ['1156px', '372px','auto','auto','auto', 'auto'],
                text: "V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'WT_A',
                type: 'text',
                rect: ['1156px', '397px','auto','auto','auto', 'auto'],
                text: "A",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'WT_kW',
                type: 'text',
                rect: ['1156px', '422px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Wind_V',
                type: 'text',
                rect: ['909px', '372px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Wind_V2',
                type: 'text',
                rect: ['909px', '397px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Wind_V3',
                type: 'text',
                rect: ['909px', '422px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Wind_A',
                type: 'text',
                rect: ['995px', '372px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Wind_A2',
                type: 'text',
                rect: ['995px', '397px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Wind_A3',
                type: 'text',
                rect: ['995px', '422px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Wind_kW',
                type: 'text',
                rect: ['1080px', '372px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Wind_kW2',
                type: 'text',
                rect: ['1080px', '397px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Wind_kW3',
                type: 'text',
                rect: ['1080px', '422px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Total_Wind',
                type: 'text',
                rect: ['909px', '462px','auto','auto','auto', 'auto'],
                text: "Total Power",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Total_WindkWh',
                type: 'text',
                rect: ['909px', '487px','auto','auto','auto', 'auto'],
                text: "Today Energy",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'WTkW',
                type: 'text',
                rect: ['1156px', '462px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'WTkWh',
                type: 'text',
                rect: ['1156px', '487px','auto','auto','auto', 'auto'],
                text: "kWh",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Wind_kW3_2',
                type: 'text',
                rect: ['1080px', '462px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "600", "none", ""]
            },
			{
                id: 'Wind_kW2_2',
                type: 'text',
                rect: ['1080px', '487px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,54, 149,1.00)", "600", "none", ""]
            },
			{
                id: 'GCI',
                type: 'text',
                rect: ['909px', '250px','auto','auto','auto', 'auto'],
                text: "Solar Inverter 50 kWp",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "600", "none", ""]
            },
			{
                id: 'GCI-1',
                type: 'text',
                rect: ['909px', '280px','auto','auto','auto', 'auto'],
                text: "GCI No.1",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(143, 140, 136,1.00)", "400", "none", ""]
            },
			{
                id: 'GCI-2',
                type: 'text',
                rect: ['909px', '310px','auto','auto','auto', 'auto'],
                text: "GCI No.2",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(143, 140, 136,1.00)", "400", "none", ""]
            },
			{
                id: 'GCI1_kW',
                type: 'text',
                rect: ['1156px', '280px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'GCI2_kW',
                type: 'text',
                rect: ['1156px', '310px','auto','auto','auto', 'auto'],
                text: "kW",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'G1_kW',
                type: 'text',
                rect: ['1080px', '280px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'G2_kW',
                type: 'text',
                rect: ['1080px', '310px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Redox',
                type: 'text',
                rect: ['409px', '437px','auto','auto','auto', 'auto'],
                text: "Battery 716.8 Vdc 450.15 kWh",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1)", "600", "none", ""]
            },
			{
                id: 'Batteryy',
                type: 'text',
                rect: ['409px', '462px','auto','auto','auto', 'auto'],
                text: "LFP Battery",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(143, 140, 136,1.00)", "400", "none", ""]
            },
			{
                id: 'Battery_V',
                type: 'text',
                rect: ['409px', '487px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
			{
                id: 'Battery_A',
                type: 'text',
                rect: ['498px', '487px','90px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(33,170, 204,1.00)", "400", "none", ""]
            },
            {
                id: 'Battery_SOC',
                type: 'text',
                rect: ['610px', '487px','auto','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.9, "em"], "rgba(0,0,0,1.00)", "400", "none", ""]
            },
			/*{
                id: 'Today_CO2',
                type: 'text',
                rect: ['565px', '362px','auto','auto','auto', 'auto'],
                text: "Today CO&#8322; Reduction",
                font: ['Arial, Helvetica, sans-serif', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Total_CO2',
                type: 'text',
                rect: ['565px', '387px','auto','auto','auto', 'auto'],
                text: "Total CO&#8322; Reduction",
                font: ['Arial, Helvetica, sans-serif', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Ton1',
                type: 'text',
                rect: ['810px', '362px','auto','auto','auto', 'auto'],
                text: "kgCO&#8322;e",
                font: ['Arial, Helvetica, sans-serif', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Ton2',
                type: 'text',
                rect: ['810px', '387px','auto','auto','auto', 'auto'],
                text: "TonCO&#8322;e",
                font: ['Arial, Helvetica, sans-serif', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Co2_A2_2',
                type: 'text',
                rect: ['734px', '362px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.8, "em"], "rgba(0,54, 149,1.00)", "600", "none", ""]
            },
			{
                id: 'Co2',
                type: 'text',
                rect: ['734px', '387px','60px','auto','auto', 'auto'],
                text: "230.00  V",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', [0.8, "em"], "rgba(0,54, 149,1.00)", "600", "none", ""]
            },*/	
			{
                id: 'Batt_in', // check Batt
                type: 'rect',
                rect: ['530', '452','auto','auto','auto', 'auto']
            },
			{
                id: 'AC_BattIn',
                type: 'ellipse',
                rect: ['545px', '307px','7px','7px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(41,201,197,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
			{
                id: 'Batt_out', // // check Batt
                type: 'rect',
                rect: ['530', '452','auto','auto','auto', 'auto']
            },
			{
                id: 'AC_BattOut',
                type: 'ellipse',
                rect: ['545px', '362px','7px','7px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(245,141,140,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
			{
                id: 'Logo1',
                type: 'image',
                rect: ['995px', '0px','60px','80px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'images/pic1.png','0px','0px']
            },
			{
                id: 'Logo2',
                type: 'image',
                rect: ['1078px', '0px','60px','80px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'images/pic2.png','0px','0px']
            },
			{
                id: 'pv1', // check Gen > 0
                type: 'ellipse',
                rect: ['264px', '140px','6px','6px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(216,110,4,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
			{
                id: 'INV2Grid', // check Gen < 0
                type: 'ellipse',
                rect: ['620px', '247px','6px','6px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(216,110,4,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
			{
                id: 'pv2',  // check LoadPM
                type: 'ellipse',
                rect: ['620px', '209px','6px','6px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(216,110,4,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
			{
                id: 'wind', // check Solar 145 kWp
                type: 'ellipse',
                rect: ['265px', '354px','6px','6px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(216,110,4,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
			{
                id: 'wind2', // check Solar 50 kWp * 2 Units
                type: 'ellipse',
                rect: ['620px', '173px','6px','6px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(216,110,4,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
			{
                id: 'wt1', // check Wind Turbine
                type: 'ellipse',
                rect: ['620px', '373px','6px','6px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(216,110,4,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            }
			],
            symbolInstances: [
            {
                id: 'Batt_out',
                symbolName: 'Batt_out',
                autoPlay: {

                }
            },
            {
                id: 'Batt_in',
                symbolName: 'Batt_in',
                autoPlay: {

                }
            }
            ]
        },
    states: {
        "Base State": {
			 "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,0.00)'],
                ["style", "width", '1188px'],
                ["style", "height", '602px'],
                ["style", "overflow", 'auto']
            ],
			"${_Gride_LineCopy2}": [
                ["style", "top", '15px'],
                ["style", "text-align", 'center'],
                ["style", "font-size", '0.9em'],
                ["style", "font-weight", '600'],
                ["style", "left", '386px'],
                ["style", "width", '250px']
            ],
            "${_AC_Grid_LineCopy2}": [
                ["style", "top", '45px'],
                ["style", "text-align", 'center'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(143, 140, 136,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '386px'],
                ["style", "width", '280px']
            ],
			"${_line_Gen}": [
                ["style", "left", '-10px'],
                ["style", "top", '204px']
            ],
			"${_Gride_Line}": [
                ["style", "top", '70px'],
                ["style", "font-weight", '600'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
            "${_AC_Grid_Line}": [
                ["style", "top", '100px'],
                ["color", "color", 'rgba(143, 140, 136,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			"${_G_V}": [
                ["style", "top", '130px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_G_V2}": [
                ["style", "top", '155px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_G_V3}": [
                ["style", "top", '180px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			"${_G_A}": [
                ["style", "top", '130px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '85px'],
                ["style", "width", '60px']
            ], 
			"${_G_A2}": [
                ["style", "top", '155px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '85px'],
                ["style", "width", '60px']
            ],    
			"${_G_A3}": [
                ["style", "top", '180px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '85px'],
                ["style", "width", '60px']
            ],
			"${_G_kW}": [
                ["style", "top", '130px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '173px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_G_kW2}": [
                ["style", "top", '155px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '173px'],
                ["style", "font-size", '0.9em']
            ],  
			 "${_G_kW3}": [
                ["style", "top", '180px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '173px'],
                ["style", "font-size", '0.9em']
            ],
			"${_TotalGrid_kW}": [
                ["style", "top", '70px'],
                ["style", "text-align", 'left'],
                ["style", "right", 'auto'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '600'],
                ["style", "left", '131px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Gen_kW3_2}": [
                ["style", "top", '220px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '600'],
                ["color", "color", 'rgba(0,54, 149,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '173px'],
                ["style", "font-size", '0.9em']
            ],    
			"${_Gen_kW2_2}": [
                ["style", "top", '245px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '600'],
                ["color", "color", 'rgba(0,54, 149,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '173px'],
                ["style", "font-size", '0.9em']
            ],
			/*"${_AC_Grid_LineCopy3}": [
                ["style", "top", '70px'],
                ["color", "color", 'rgba(0,0,0,1)'],
                ["style", "font-weight", '600'],
                ["style", "left", '585px'],
                ["style", "font-size", '0.9em']
            ],*/
			 "${_Inv_V}": [
                ["style", "top", '100px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '585px'],
                ["style", "font-size", '0.9em']
            ], 
             "${_Inv_V2}": [
                ["style", "top", '128px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '585px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Inv_V3}": [
                ["style", "top", '155px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '585px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Inv_A}": [
                ["style", "top", '100px'],
                ["style", "text-align", 'left'],
                ["style", "width", '60px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '660px'],
                ["style", "font-size", '0.9em']  
            ],  
            "${_Inv_A2}": [
                ["style", "top", '128px'],
                ["style", "text-align", 'left'],
                ["style", "width", '60px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '660px'],
                ["style", "font-size", '0.9em']
            ],   
			"${_Inv_A3}": [
                ["style", "top", '155px'],
                ["style", "text-align", 'left'],
                ["style", "width", '60px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '660px'],
                ["style", "font-size", '0.9em']
            ],       
			"${_Inv_kW}": [
                ["style", "top", '100px'],
                ["style", "text-align", 'left'],
                ["style", "right", 'auto'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '737px'],
                ["style", "font-size", '0.9em']
            ],
           "${_Inv_kW2}": [
                ["style", "top", '128px'],
                ["style", "text-align", 'left'],
                ["style", "right", 'auto'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '737px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Inv_kW3}": [
                ["style", "top", '155px'],
                ["style", "text-align", 'left'],
                ["style", "right", 'auto'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '737px'],
                ["style", "font-size", '0.9em']
            ],
			"${_TotalInv_kW}": [
                ["style", "top", '70px'],
                ["style", "text-align", 'left'],
                ["style", "right", 'auto'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '600'],
                ["style", "left", '777px'],
                ["style", "font-size", '0.9em']
            ],
			"${_line_Load}": [
                ["style", "left", '905px'],
                ["style", "top", '180px']
            ],
			"${_Load_V}": [
                ["style", "top", '100px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Load_V2}": [
                ["style", "top", '128px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Load_V3}": [
                ["style", "top", '155px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
            "${_Load_A}": [
                ["style", "top", '100px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '995px'],
                ["style", "width", '60px']
            ],
			"${_Load_A2}": [
                ["style", "top", '128px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '995px'],
                ["style", "width", '60px']
            ],
			"${_Load_A3}": [
                ["style", "top", '155px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '995px'],
                ["style", "width", '60px']
            ],
			"${_Load_kW}": [
                ["style", "top", '100px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Load_kW2}": [
                ["style", "top", '128px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Load_kW3}": [
                ["style", "top", '155px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Load_kW2_2}": [
                ["style", "top", '220px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '600'],
                ["color", "color", 'rgba(0, 54, 149,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Load_kW3_2}": [
                ["style", "top", '195px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '600'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			"${_line_Scc}": [
                ["style", "left", '-10px'],
                ["style", "top", '445px']
            ], 
			 "${_Solar_18}": [
                ["style", "top", '312px'],
                ["style", "font-weight", '600'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_PV_Input}": [
                ["style", "top", '342px'],
                ["color", "color", 'rgba(143, 140, 136,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			"${_PV1}": [
                ["style", "top", '372px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_PV1_In}": [
                ["style", "top", '397px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			"${_PV1_Out}": [
                ["style", "top", '422px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '0px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_PV1Copy2}": [
                ["style", "top", '372px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '173px'],
                ["style", "font-size", '0.9em']
            ],			
			"${_PV3_In}": [
                ["style", "top", '397px'],
                ["style", "width", '74px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '173px'],
                ["style", "font-size", '0.9em']
            ],
            "${_PV3_Out}": [
                ["style", "top", '422px'],
                ["style", "right", 'auto'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '173px'],
                ["style", "font-size", '0.9em']
            ],
			"${_SCC_A2_2}": [
                ["style", "top", '462px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(0,54, 149,1.00)'],
                ["style", "font-weight", '600'],
                ["style", "left", '173px'],
                ["style", "width", '60px']
            ],
			"${_SCC_A3_2}": [
                ["style", "top", '487px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(0,54, 149,1.00)'],
                ["style", "font-weight", '600'],
                ["style", "left", '173px'],
                ["style", "width", '60px']
            ],
			"${_line_WT}": [
                ["style", "left", '905px'],
                ["style", "top", '445px']
            ],
			"${_WT}": [
                ["style", "top", '342px'],
                ["style", "font-weight", '600'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Wind_V}": [
                ["style", "top", '372px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Wind_V2}": [
                ["style", "top", '397px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Wind_V3}": [
                ["style", "top", '422px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Wind_A}": [
                ["style", "top", '372px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '995px'],
                ["style", "width", '60px']
            ],
			"${_Wind_A2}": [
                ["style", "top", '397px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '995px'],
                ["style", "width", '60px']
            ],
			"${_Wind_A3}": [
                ["style", "top", '422px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.9em'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '995px'],
                ["style", "width", '60px']
            ],
			"${_Wind_kW}": [
                ["style", "top", '372px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Wind_kW2}": [
                ["style", "top", '397px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Wind_kW3}": [
                ["style", "top", '422px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Wind_kW2_2}": [
                ["style", "top", '487px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '600'],
                ["color", "color", 'rgba(0, 54, 149,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Wind_kW3_2}": [
                ["style", "top", '462px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '600'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			"${_GCI}": [
                ["style", "top", '250px'],
                ["style", "font-weight", '600'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
           "${_GCI-1}": [
                ["style", "top", '280px'],
                ["color", "color", 'rgba(143, 140, 136,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
			"${_GCI-2}": [
                ["style", "top", '310px'],
                ["color", "color", 'rgba(143, 140, 136,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '909px'],
                ["style", "font-size", '0.9em']
            ],
            "${_G1_kW}": [
                ["style", "top", '280px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			"${_G2_kW}": [
                ["style", "top", '310px'],
                ["style", "text-align", 'left'],
                ["style", "font-weight", '400'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "right", 'auto'],
                ["style", "left", '1080px'],
                ["style", "font-size", '0.9em']
            ],
			 "${_Redox}": [
                ["style", "top", '437px'],
                ["style", "font-weight", '600'],
                ["style", "left", '409px'],
                ["style", "font-size", '0.9em']
            ],
           "${_Batteryy}": [
                ["style", "top", '462px'],
                ["color", "color", 'rgba(143, 140, 136,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '409px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Battery_V}": [
                ["style", "top", '487px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '409px'],
                ["style", "font-size", '0.9em']
            ],
			"${_Battery_A}": [
                ["style", "top", '487px'],
                ["style", "text-align", 'left'],
                ["style", "width", '90px'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '498px'],
                ["style", "font-size", '0.9em']
            ],
           "${_Battery_SOC}": [
                ["style", "top", '487px'],
                ["style", "text-align", 'left'],
                ["style", "right", 'auto'],
                ["color", "color", 'rgba(33,170, 204,1.00)'],
                ["style", "font-weight", '400'],
                ["style", "left", '595px'],
                ["style", "font-size", '0.9em']
            ],
			/*"${_Co2_A2_2}": [
                ["style", "top", '363px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.82em'],
                ["color", "color", 'rgba(0,54, 149,1.00)'],
                ["style", "font-weight", '600'],
                ["style", "left", '734px'],
                ["style", "width", '60px']
            ],
			"${_Co2}": [
                ["style", "top", '388px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.82em'],
                ["color", "color", 'rgba(0,54, 149,1.00)'],
                ["style", "font-weight", '600'],
                ["style", "left", '734px'],
                ["style", "width", '60px']
            ],*/
			 "${_Batt_in}": [
                ["style", "left", '509.5px'],
                ["style", "top", '406px']
            ],
			"${_AC_BattIn}": [
                ["style", "top", '206px'],
                ["style", "opacity", '1'],
                ["style", "left", '524.5px'],
                ["color", "background-color", 'rgba(41,201,197,1.00)']
            ],
			"${_Batt_out}": [
                ["style", "left", '509.5px'],
                ["style", "top", '406px']
            ],
			"${_AC_BattOut}": [
                ["style", "top", '206px'],
                ["style", "opacity", '1'],
                ["style", "left", '524.5px'],
                ["color", "background-color", 'rgba(245,141,140,1.00)']
            ],
			"${_Logo1}": [
                ["style", "left", '1045px'],
                ["style", "top", '10px']
            ],
			"${_Logo2}": [
                ["style", "left", '1110px'],
                ["style", "top", '21px']
            ],
			"${_pv1}": [
                ["color", "background-color", 'rgba(216,110,4,1.00)'],
                ["style", "height", '7px'],
                ["style", "top", '173px'],
                ["motion", "location", '267.84px 143.67px'],
                ["style", "opacity", '1'],
                ["style", "left", '265px'],
                ["style", "width", '7px']
            ],
			"${_INV2Grid}": [
                ["color", "background-color", 'rgba(216,110,4,1)'],
                ["motion", "location", '417.5px 210.49995px'],
                ["style", "height", '7px'],
                ["style", "opacity", '1'],
                ["style", "width", '7px']
            ], 
			"${_pv2}": [
                ["color", "background-color", 'rgba(216,110,4,1.00)'],
                ["style", "height", '7px'],
                ["style", "top", '209px'],
                ["motion", "location", '592.17px 209.8px'],
                ["style", "opacity", '1'],
                ["style", "left", '285px'],
                ["style", "width", '7px']
            ],
			"${_wind}": [
                ["color", "background-color", 'rgba(4,156,216,1.00)'],
                ["style", "height", '7px'],
                ["style", "top", '173px'],
                ["motion", "location", '268.5px 357.5px'],
                ["style", "opacity", '1'],
                ["style", "left", '265px'],
                ["style", "width", '7px']
            ],
			"${_wind2}": [
                ["color", "background-color", 'rgba(216,110,4,1.00)'],
                ["style", "height", '7px'],
                ["style", "top", '173px'],
                ["motion", "location", '268.5px 357.5px'],
                ["style", "opacity", '1'],
                ["style", "left", '620px'],
                ["style", "width", '7px']
            ],		
			"${_wt1}": [
                ["color", "background-color", 'rgba(216,110,4,1.00)'],
                ["style", "height", '7px'],
                ["style", "top", '33px'],
                ["motion", "location", '268.5px 357.5px'],
                ["style", "opacity", '1'],
                ["style", "left", '620px'],
                ["style", "width", '7px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 10021,
            autoPlay: true,
            timeline: [
                { id: "eid450", tween: [ "style", "${_pv2}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 27 },
                { id: "eid451", tween: [ "style", "${_pv2}", "opacity", '1', { fromValue: '0'}], position: 5000, duration: 21 },
                { id: "eid452", tween: [ "style", "${_pv2}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 27 },
                { id: "eid453", tween: [ "style", "${_pv2}", "opacity", '1', { fromValue: '0'}], position: 10000, duration: 21 },
                { id: "eid445", tween: [ "motion", "${_wind}", [[274.5, 313.5, 0, 0],[272.29, 313.38, 12.58, -0.95, 29.18, -2.19],[304.54, 307.2, 0.41, -42.69, 0.13, -13.73],[306.14, 244.74, 0.34, -12.48, 1.51, -55.03],[316.28, 239.85, 145.16, -1.45, 12.72, -0.13],[418.5, 239.87, 0, 0]]], position: 0, duration: 3000 },
                { id: "eid447", tween: [ "motion", "${_wind}", [[274.5, 313.5, 0, 0],[272.29, 313.38, 12.58, -0.95, 29.18, -2.19],[304.54, 307.2, 0.41, -42.69, 0.13, -13.73],[306.14, 244.74, 0.34, -12.48, 1.51, -55.03],[316.28, 239.85, 145.16, -1.45, 12.72, -0.13],[418.5, 239.87, 0, 0]]], position: 5000, duration: 3000 },
                { id: "eid418", tween: [ "style", "${_Batt_out}", "top", '406px', { fromValue: '406px'}], position: 0, duration: 0 },
                { id: "eid433", tween: [ "style", "${_wind}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 27 },
                { id: "eid434", tween: [ "style", "${_wind}", "opacity", '1', { fromValue: '0'}], position: 5000, duration: 21 },
                { id: "eid435", tween: [ "style", "${_wind}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 27 },
                { id: "eid436", tween: [ "style", "${_wind}", "opacity", '1', { fromValue: '0'}], position: 10000, duration: 21 },
                { id: "eid419", tween: [ "style", "${_Batt_in}", "top", '406px', { fromValue: '406px'}], position: 0, duration: 0 },
                { id: "eid417", tween: [ "style", "${_Batt_out}", "left", '494.8px', { fromValue: '494.8px'}], position: 0, duration: 0 },
                { id: "eid212", tween: [ "style", "${_AC_BattIn}", "opacity", '0', { fromValue: '1'}], position: 2000, duration: 25 },
                { id: "eid427", tween: [ "style", "${_AC_BattIn}", "opacity", '1', { fromValue: '0'}], position: 3977, duration: 23 },
                { id: "eid430", tween: [ "style", "${_AC_BattIn}", "opacity", '0', { fromValue: '1'}], position: 6000, duration: 19 },
                { id: "eid420", tween: [ "style", "${_Batt_in}", "left", '494.8px', { fromValue: '494.8px'}], position: 0, duration: 0},
                { id: "eid443", tween: [ "color", "${_wind}", "background-color", 'rgba(4,156,216,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(4,156,216,1.00)'}], position: 0, duration: 0 },
                { id: "eid480", tween: [ "style", "${_INV2Grid}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 27 },
                { id: "eid483", tween: [ "style", "${_INV2Grid}", "opacity", '1', { fromValue: '0'}], position: 5000, duration: 21 },
                { id: "eid486", tween: [ "style", "${_INV2Grid}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 27 },
				{ id: "eid480", tween: [ "style", "${_wind2}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 27 },
                { id: "eid483", tween: [ "style", "${_wind2}", "opacity", '1', { fromValue: '0'}], position: 5000, duration: 21 },
                { id: "eid486", tween: [ "style", "${_wind2}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 27 },
				{ id: "eid480", tween: [ "style", "${_wt1}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 27 },
                { id: "eid483", tween: [ "style", "${_wt1}", "opacity", '1', { fromValue: '0'}], position: 5000, duration: 21 },
                { id: "eid486", tween: [ "style", "${_wt1}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 27 },
				
                { id: "eid361", tween: [ "style", "${_pv1}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 27 },
                { id: "eid364", tween: [ "style", "${_pv1}", "opacity", '1', { fromValue: '0'}], position: 5000, duration: 21 },
                { id: "eid413", tween: [ "style", "${_pv1}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 27 },
                { id: "eid414", tween: [ "style", "${_pv1}", "opacity", '1', { fromValue: '0'}], position: 10000, duration: 21 },
                 { id: "eid475", tween: [ "motion", "${_INV2Grid}", [[417.5, 165.5, 0, 0],[315.98, 165.07, -53.1, 0.14, -158.48, 0.41],[303.16, 103.55, -17.15, -34.71, -17.36, -35.15],[269.69, 98.67, 0, 0]]], position: 0, duration: 3000 },
                { id: "eid476", tween: [ "motion", "${_INV2Grid}", [[417.5, 165.5, 0, 0],[315.98, 165.07, -53.1, 0.14, -158.48, 0.41],[303.16, 103.55, -17.15, -34.71, -17.36, -35.15],[269.69, 98.67, 0, 0]]], position: 5000, duration: 3000 },
				{ id: "eid475", tween: [ "motion", "${_wind2}", [[759.5, 291.0, 0, 0],[740.98, 291.02, -53.1, 0.14, -158.48, 0.41],[731.16, 225.55, -17.15, -34.71, -17.36, -35.15],[622.69, 219.67, 0, 0]]], position: 0, duration: 3000 },
				{ id: "eid476", tween: [ "motion", "${_wind2}", [[759.5, 291.0, 0, 0],[740.98, 291.02, -53.1, 0.14, -158.48, 0.41],[731.16, 225.55, -17.15, -34.71, -17.36, -35.15],[622.69, 219.67, 0, 0]]], position: 5000, duration: 3000 },
				
				{ id: "eid475", tween: [ "motion", "${_wt1}", [[764.5, 395.0, 0, 0],[714.98, 396.02, -53.1, 0.14, -158.48, 0.41],[706.16, 245.55, -17.15, -34.71, -17.36, -35.15],[620.69, 240.67, 0, 0]]], position: 0, duration: 3000 },
				{ id: "eid476", tween: [ "motion", "${_wt1}", [[764.5, 395.0, 0, 0],[714.98, 396.02, -53.1, 0.14, -158.48, 0.41],[706.16, 245.55, -17.15, -34.71, -17.36, -35.15],[620.69, 240.67, 0, 0]]], position: 5000, duration: 3000 },
				
                { id: "eid356", tween: [ "motion", "${_pv1}", [[269.84, 98.67, 0, 0],[299.79, 98.36, 9.59, 0.66, 43.14, 2.96],[304.47, 106.51, 3.25, 39.36, 0.83, 10.12],[305.16, 157.66, 2.37, 12.42, 5.59, 29.29],[315.98, 164.75, 196.9, -0.2, 12.62, -0.01],[417.66, 164.67, 0, 0]]], position: 0, duration: 3000 },
                { id: "eid412", tween: [ "motion", "${_pv1}", [[269.84, 98.67, 0, 0],[299.79, 98.36, 9.59, 0.66, 43.14, 2.96],[304.47, 106.51, 3.25, 39.36, 0.83, 10.12],[305.16, 157.66, 2.37, 12.42, 5.59, 29.29],[315.98, 164.75, 196.9, -0.2, 12.62, -0.01],[417.66, 164.67, 0, 0]]], position: 5000, duration: 3000 },
                { id: "eid470", tween: [ "motion", "${_pv2}", [[602.17, 189.8, 0, 0],[758.5, 189.8, 0, 0]]], position: 0, duration: 3000 },
                { id: "eid472", tween: [ "motion", "${_pv2}", [[602.17, 189.8, 0, 0],[758.5, 189.8, 0, 0]]], position: 5000, duration: 3000 },
                 { id: "eid202", tween: [ "style", "${_AC_BattOut}", "opacity", '0', { fromValue: '1'}], position: 2000, duration: 25 },
                { id: "eid205", tween: [ "style", "${_AC_BattOut}", "opacity", '1', { fromValue: '0'}], position: 3977, duration: 23 },
                { id: "eid222", tween: [ "style", "${_AC_BattOut}", "opacity", '0', { fromValue: '1'}], position: 6000, duration: 19 },
                { id: "eid208", tween: [ "style", "${_AC_BattIn}", "top", '322px', { fromValue: '260px'}], position: 0, duration: 2000 },
                { id: "eid424", tween: [ "style", "${_AC_BattIn}", "top", '322px', { fromValue: '260px'}], position: 4000, duration:2000 },
                { id: "eid422", tween: [ "style", "${_AC_BattOut}", "left", '509.5px', { fromValue: '509.5px'}], position: 0, duration: 0 },
                { id: "eid197", tween: [ "style", "${_AC_BattOut}", "top", '260px', { fromValue: '322px'}], position: 0, duration: 2000 },
                { id: "eid423", tween: [ "style", "${_AC_BattOut}", "top", '260px', { fromValue: '322px'}], position: 4000, duration: 2000 },
                { id: "eid421", tween: [ "style", "${_AC_BattIn}", "left", '509.5px', { fromValue: '509.5px'}], position: 0, duration: 0 }            ]
        }
    }
},
"Batt_in": {
    version: "4.0.1",
    minimumCompatibleVersion: "4.0.1",
    build: "4.0.1.365",
    baseState: "Base State",
    scaleToFit: "none",
    centerStage: "none",
    initialState: "Base State",
    gpuAccelerate: false,
    resizeInstances: false,
    content: {
            dom: [
                {
                    rect: ['0px', '0px', '37px', '10px', 'auto', 'auto'],
                    id: 'b1',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-12px', '37px', '10px', 'auto', 'auto'],
                    id: 'b2',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-24px', '37px', '10px', 'auto', 'auto'],
                    id: 'b3',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-36px', '37px', '10px', 'auto', 'auto'],
                    id: 'b4',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-48px', '37px', '10px', 'auto', 'auto'],
                    id: 'b5',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-61px', '37px', '10px', 'auto', 'auto'],
                    id: 'b6',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_b1}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(41,201,197,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${_b4}": [
                ["style", "top", '-36px'],
                ["color", "background-color", 'rgba(41,201,197,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '0.000000'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${_b2}": [
                ["style", "top", '-12px'],
                ["color", "background-color", 'rgba(41,201,197,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '0.000000'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${_b6}": [
                ["style", "top", '-61px'],
                ["color", "background-color", 'rgba(41,201,197,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '0.000000'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${symbolSelector}": [
                ["style", "height", '10px'],
                ["style", "width", '37px']
            ],
            "${_b3}": [
                ["style", "top", '-24px'],
                ["color", "background-color", 'rgba(41,201,197,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '0.000000'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${_b5}": [
                ["style", "top", '-48px'],
                ["color", "background-color", 'rgba(41,201,197,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '0.000000'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 1500,
            autoPlay: true,
            timeline: [
                { id: "eid132", tween: [ "style", "${_b5}", "opacity", '1', { fromValue: '0.000000'}], position: 1000, duration: 250 },
                { id: "eid192", tween: [ "color", "${_b2}", "background-color", 'rgba(41,201,197,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(41,201,197,1.00)'}], position: 1500, duration: 0 },
                { id: "eid190", tween: [ "color", "${_b6}", "background-color", 'rgba(41,201,197,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(41,201,197,1.00)'}], position: 1500, duration: 0 },
                { id: "eid189", tween: [ "color", "${_b1}", "background-color", 'rgba(41,201,197,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(41,201,197,1.00)'}], position: 1500, duration: 0 },
                { id: "eid194", tween: [ "color", "${_b4}", "background-color", 'rgba(41,201,197,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(41,201,197,1.00)'}], position: 1500, duration: 0 },
                { id: "eid193", tween: [ "color", "${_b3}", "background-color", 'rgba(41,201,197,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(41,201,197,1.00)'}], position: 1500, duration: 0 },
                { id: "eid123", tween: [ "style", "${_b2}", "opacity", '1', { fromValue: '0.000000'}], position: 250, duration: 250 },
                { id: "eid135", tween: [ "style", "${_b6}", "opacity", '1', { fromValue: '0.000000'}], position: 1250, duration: 250 },
                { id: "eid191", tween: [ "color", "${_b5}", "background-color", 'rgba(41,201,197,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(41,201,197,1.00)'}], position: 1500, duration: 0 },
                { id: "eid120", tween: [ "style", "${_b1}", "opacity", '1', { fromValue: '1'}], position: 250, duration: 0 },
                { id: "eid126", tween: [ "style", "${_b3}", "opacity", '1', { fromValue: '0.000000'}], position: 500, duration: 250 },
                { id: "eid129", tween: [ "style", "${_b4}", "opacity", '1', { fromValue: '0.000000'}], position: 750, duration: 250 }            ]
        }
    }
},
"Batt_out": {
    version: "4.0.1",
    minimumCompatibleVersion: "4.0.1",
    build: "4.0.1.365",
    baseState: "Base State",
    scaleToFit: "none",
    centerStage: "none",
    initialState: "Base State",
    gpuAccelerate: false,
    resizeInstances: false,
    content: {
            dom: [
                {
                    rect: ['0px', '0px', '37px', '10px', 'auto', 'auto'],
                    id: 'b1Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-12px', '37px', '10px', 'auto', 'auto'],
                    id: 'b2Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-24px', '37px', '10px', 'auto', 'auto'],
                    id: 'b3Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-36px', '37px', '10px', 'auto', 'auto'],
                    id: 'b4Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-48px', '37px', '10px', 'auto', 'auto'],
                    id: 'b5Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                },
                {
                    rect: ['0px', '-61px', '37px', '10px', 'auto', 'auto'],
                    id: 'b6Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(14,179,3,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_b3Copy}": [
                ["style", "top", '-24px'],
                ["color", "background-color", 'rgba(245,141,140,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${_b5Copy}": [
                ["style", "top", '-48px'],
                ["color", "background-color", 'rgba(245,141,140,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${symbolSelector}": [
                ["style", "height", '10px'],
                ["style", "width", '37px']
            ],
            "${_b2Copy}": [
                ["style", "top", '-12px'],
                ["color", "background-color", 'rgba(245,141,140,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${_b1Copy}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(245,141,140,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${_b4Copy}": [
                ["style", "top", '-36px'],
                ["color", "background-color", 'rgba(245,141,140,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ],
            "${_b6Copy}": [
                ["style", "top", '-61px'],
                ["color", "background-color", 'rgba(245,141,140,1.00)'],
                ["style", "height", '10px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '37px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 1250,
            autoPlay: true,
            timeline: [
                { id: "eid171", tween: [ "style", "${_b4Copy}", "opacity", '0', { fromValue: '1'}], position: 500, duration: 250 },
                { id: "eid186", tween: [ "color", "${_b6Copy}", "background-color", 'rgba(245,141,140,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(245,141,140,1.00)'}], position: 0, duration: 0 },
                { id: "eid184", tween: [ "color", "${_b2Copy}", "background-color", 'rgba(245,141,140,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(245,141,140,1.00)'}], position: 0, duration: 0 },
                { id: "eid169", tween: [ "style", "${_b5Copy}", "opacity", '0', { fromValue: '1'}], position: 250, duration: 250 },
                { id: "eid175", tween: [ "style", "${_b2Copy}", "opacity", '0', { fromValue: '1'}], position: 1000, duration: 250 },
                { id: "eid166", tween: [ "style", "${_b6Copy}", "opacity", '0', { fromValue: '1'}], position: 0, duration: 250 },
                { id: "eid148", tween: [ "style", "${_b1Copy}", "opacity", '1', { fromValue: '1'}], position: 1250, duration: 0 },
                { id: "eid188", tween: [ "color", "${_b5Copy}", "background-color", 'rgba(245,141,140,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(245,141,140,1.00)'}], position: 0, duration: 0 },
                { id: "eid173", tween: [ "style", "${_b3Copy}", "opacity", '0', { fromValue: '1'}], position: 750, duration: 250 },
                { id: "eid187", tween: [ "color", "${_b4Copy}", "background-color", 'rgba(245,141,140,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(245,141,140,1.00)'}], position: 0, duration: 0 },
                { id: "eid185", tween: [ "color", "${_b3Copy}", "background-color", 'rgba(245,141,140,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(245,141,140,1.00)'}], position: 0, duration: 0 },
                { id: "eid183", tween: [ "color", "${_b1Copy}", "background-color", 'rgba(245,141,140,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(245,141,140,1.00)'}], position: 0, duration: 0 }            ]
        }
    }
}
};


Edge.registerCompositionDefn(compId, symbols, fonts, resources, opts);

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     Edge.launchComposition(compId);
});
})(jQuery, AdobeEdge, "EDGE-174488029");
