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
    scaleToFit: "height",
    centerStage: "none",
    initialState: "Base State",
    gpuAccelerate: false,
    resizeInstances: false,
    content: {
            dom: [
            {
                id: 'img1',
                type: 'image',
                rect: ['0', '0','1134px','601px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/main_terusan.png','0px','0px']
            },
			{
                id: 'G_irr',
                type: 'rect',
                rect: ['230px', '78px','229px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
			{
                id: 'G_load',
                type: 'rect',
                rect: ['853px', '180px','229px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
			{
                id: 'G_solar',
                type: 'rect',
                rect: ['63px', '472px','191px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
			{
                id: 'G_bdi',
                type: 'rect',
                rect: ['221px', '443px','191px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
			{
                id: 'G_gen',
                type: 'rect',
                rect: ['-7px', '50px','229px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
			{
                id: 'G_soc',
                type: 'rect',
                rect: ['560px', '56px','229px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
			{
                id: 'G_pv',
                type: 'rect',
                rect: ['560px', '56px','229px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
			{
                id: 'RH',
                type: 'text',
                rect: ['420px', '157px','94px','auto','auto', 'auto'],
                text: "RH:xx %",
                align: "right",
                font: ['Calibri', [0.79, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'PV_temp',
                type: 'text',
                rect: ['420px', '120px','76px','auto','auto', 'auto'],
                text: "xxx C",
                align: "right",
                font: ['Calibri', [0.79, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Temp1',
                type: 'text',
                rect: ['420px', '139px','94px','auto','auto', 'auto'],
                text: "Temp xxx C",
                align: "right",
                font: ['Calibri', [0.79, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Irr',
                type: 'text',
                rect: ['319px', '107px','84px','auto','auto', 'auto'],
                text: "DG-3",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Load_kW',
                type: 'text',
                rect: ['913px', '185px','139px','auto','auto', 'auto'],
                text: "xx  kW",
                font: ['Calibri', [1, "em"], "rgba(0,0,0,1)", "700", "none", ""]
            },
			 {
                id: 'Load_output1',
                type: 'text',
                rect: ['913px', '242px','58px','auto','auto', 'auto'],
                text: "GCI-1",
                align: "center",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
            {
                id: 'Load_output2',
                type: 'text',
                rect: ['969px', '242px','55px','auto','auto', 'auto'],
                text: "GCI-1",
                align: "center",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
            {
                id: 'Load_output3',
                type: 'text',
                rect: ['1025px', '242px','55px','auto','auto', 'auto'],
                text: "GCI-1",
                align: "center",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Load_I1',
                type: 'text',
                rect: ['913px', '260px','58px','auto','auto', 'auto'],
                text: "GCI-1",
                align: "center",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
            {
                id: 'Load_I2',
                type: 'text',
                rect: ['969px', '260px','55px','auto','auto', 'auto'],
                text: "GCI-1",
                align: "center",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
            {
                id: 'Load_I3',
                type: 'text',
                rect: ['1025px', '260px','55px','auto','auto', 'auto'],
                text: "GCI-1",
                align: "center",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Solar_kW',
                type: 'text',
                rect: ['80px', '438px','139px','auto','auto', 'auto'],
                text: "xx  kW",
                font: ['Calibri', [1, "em"], "rgba(0,0,0,1)", "700", "none", ""]
            },
			{
                id: 'Scc_1kW',
                type: 'text',
                rect: ['211px', '520px','64px','auto','auto', 'auto'],
                text: "GCI-1",
                align: "left",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Scc_2kW',
                type: 'text',
                rect: ['211px', '539px','64px','auto','auto', 'auto'],
                text: "GCI-2",
                align: "left",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'BDI_kW',
                type: 'text',
                rect: ['685px', '458px','139px','auto','auto', 'auto'],
                text: "xx  kW",
                font: ['Calibri', [1, "em"], "rgba(0,0,0,1)", "700", "none", ""]
            },
			{
                id: 'BDI_1kW',
                type: 'text',
                rect: ['688px', '522px','64px','auto','auto', 'auto'],
                text: "GCI-1",
                align: "left",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'BDI_2kW',
                type: 'text',
                rect: ['688px', '540px','64px','auto','auto', 'auto'],
                text: "GCI-2",
                align: "left",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'Batt1_v',
                type: 'text',
                rect: ['452px', '522px','84px','auto','auto', 'auto'],
                text: "DG-3",
                align: "left",
                font: ['Calibri', [1, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
            {
                id: 'Batt1_I',
                type: 'text',
                rect: ['452px', '540px','84px','auto','auto', 'auto'],
                text: "DG-3",
                align: "left",
                font: ['Calibri', [1, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
            {
                id: 'Batt1_soc',
                type: 'text',
                rect: ['442px', '448px','73px','auto','auto', 'auto'],
                text: "xx  kW",
                font: ['Calibri', [1.1, "em"], "rgba(0,0,0,1)", "700", "none", ""]
            },
			{
                id: 'GD_kW',
                type: 'text',
                rect: ['138px', '57px','auto','auto','auto', 'auto'],
                text: "xx  kW",
                font: ['Calibri', [1, "em"], "rgba(0,0,0,1)", "700", "none", ""]
            },
			{
                id: 'DG1',
                type: 'text',
                rect: ['39px', '134px','68px','auto','auto', 'auto'],
                text: "DG-1",
				align: "left",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
            {
                id: 'DG2',
                type: 'text',
                rect: ['106px', '134px','62px','auto','auto', 'auto'],
                text: "DG-2",
                align: "left",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "400", "none", ""]
            },
			{
                id: 'GCI_kW',
                type: 'text',
                rect: ['668px', '57px','auto','auto','auto', 'auto'],
                text: "xx  kW",
                font: ['Calibri', [1, "em"], "rgba(0,0,0,1)", "700", "none", ""]
            },
			{
                id: 'GCI_1',
                type: 'text',
                rect: ['603px', '139px','40px','auto','auto', 'auto'],
                text: "DG-1",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "100", "none", ""]
            },
            {
                id: 'GCI_2',
                type: 'text',
                rect: ['673px', '139px','40px','auto','auto', 'auto'],
                text: "DG-2",
                align: "center",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "100", "none", ""]
            },
			/*{
                id: 'GCI_3',
                type: 'text',
                rect: ['653px', '139px','40px','auto','auto', 'auto'],
                text: "DG-1",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "100", "none", ""]
            },
            {
                id: 'GCI_4',
                type: 'text',
                rect: ['693px', '139px','40px','auto','auto', 'auto'],
                text: "DG-2",
                align: "center",
                font: ['Calibri', [0.8, "em"], "rgba(0,0,0,1)", "100", "none", ""]
            },*/
			 {
                id: 'L_gen',
                type: 'rect',
                rect: ['126', '180','auto','auto','auto', 'auto']
            },
			{
                id: 'Toload1',
                type: 'rect',
                rect: ['159', '184','auto','auto','auto', 'auto']
            },
			{
                id: 'Toload2',
                type: 'rect',
                rect: ['159', '184','auto','auto','auto', 'auto']
            },
			{
                id: 'Toload3',
                type: 'rect',
                rect: ['711', '216','auto','auto','auto', 'auto']
            },
			{
                id: 'PV2',
                type: 'rect',
                rect: ['660', '180','auto','auto','auto', 'auto']
            },
			{
                id: 'solar1',
                type: 'rect',
                rect: ['196', '414','auto','auto','auto', 'auto']
            },
			{
                id: 'batt2BDIMTPs',
                type: 'rect',
                rect: ['422', '413','auto','auto','auto', 'auto']
            },
			{
                id: 'pv2BDIMTP',
                type: 'rect',
                rect: ['741', '225','auto','auto','auto', 'auto']
            },
			{
                id: 'PV2BDI22',
                type: 'rect',
                rect: ['750', '224','auto','auto','auto', 'auto']
            },
			{
                id: 'BattDown',
                type: 'rect',
                rect: ['422', '393','auto','auto','auto', 'auto']
            },
			{
                id: 'BattUp',
                type: 'rect',
                rect: ['422', '393','auto','auto','auto', 'auto']
            },
			{
                id: 'Batt2BDISTP2',
                type: 'rect',
                rect: ['668', '416','auto','auto','auto', 'auto']
            },
			{
                id: 'batt2Slave',
                type: 'rect',
                rect: ['169', '351','auto','auto','auto', 'auto']
            },
			{
                id: 'PV2BDISTP',
                type: 'rect',
                rect: ['776', '224','auto','auto','auto', 'auto']
            },
			/*{
                id: 'pv2BDI1',
                type: 'rect',
                rect: ['771', '524','auto','auto','auto', 'auto']
            },
			{
                id: 'Solar2',
                type: 'rect',
                rect: ['894', '414','auto','auto','auto', 'auto']
            },*/
			{
                id: 'Slave2batt',
                type: 'rect',
                rect: ['773', '392','auto','auto','auto', 'auto']
            },
			/*{
                id: 'G_nodex1',
                type: 'rect',
                rect: ['150px', '443px','191px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            }, 
			{
                id: 'G_nodex2',
                type: 'rect',
                rect: ['450px', '443px','191px','70px','auto', 'auto'],
                opacity: 1,
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },			
            {
                id: 'L_gen',
                type: 'rect',
                rect: ['126', '180','auto','auto','auto', 'auto']
            },
			{
                id: 'RoundRect',
                type: 'rect',
                rect: ['33px', '98px','204px','78px','auto', 'auto'],
                borderRadius: ["0px", "0px", "10px", "10px"],
                fill: ["rgba(192,192,192,0.06)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'RoundRectCopy2',
                type: 'rect',
                rect: ['598px', '102px','204px','73px','auto', 'auto'],
                borderRadius: ["0px", "0px", "10px", "10px"],
                fill: ["rgba(192,192,192,0.06)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'RoundRectCopy3',
                type: 'rect',
                rect: ['876px', '233px','208px','63px','auto', 'auto'],
                borderRadius: ["0px", "0px", "10px", "10px"],
                fill: ["rgba(192,192,192,0.06)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'RoundRectCopy6',
                type: 'rect',
                rect: ['49px', '481px','183px','63px','auto', 'auto'],
                borderRadius: ["0px", "0px", "10px", "10px"],
                fill: ["rgba(192,192,192,0.06)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'RoundRectCopy7',
                type: 'rect',
                rect: ['259px', '481px','183px','65px','auto', 'auto'],
                borderRadius: ["0px", "0px", "10px", "10px"],
                fill: ["rgba(192,192,192,0.06)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'RoundRectCopy8',
                type: 'rect',
                rect: ['488px', '481px','183px','63px','auto', 'auto'],
                borderRadius: ["0px", "0px", "10px", "10px"],
                fill: ["rgba(192,192,192,0.06)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'RoundRectCopy4',
                type: 'rect',
                rect: ['731px', '481px','183px','63px','auto', 'auto'],
                borderRadius: ["0px", "0px", "10px", "10px"],
                fill: ["rgba(192,192,192,0.06)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'RoundRectCopy',
                type: 'rect',
                rect: ['311px', '105px','224px','48px','auto', 'auto'],
                borderRadius: ["0px", "0px", "10px", "10px"],
                fill: ["rgba(192,192,192,0.06)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            }, 
            {
                id: 'nodex2batt',
                type: 'rect',
                rect: ['804', '217','auto','auto','auto', 'auto']
            },
            {
                id: 'batt',
                type: 'image',
                rect: ['246px', '393px','54px','42px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/batt.svg','0px','0px']
            },
            {
                id: 'battCopy',
                type: 'image',
                rect: ['476px', '393px','54px','42px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/batt.svg','0px','0px']
            },
            {
                id: 'sun',
                type: 'image',
                rect: ['601px', '16px','30px','30px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/sun.svg','0px','0px']
            },
            {
                id: 'sunCopy',
                type: 'image',
                rect: ['50px', '398px','30px','30px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/sun.svg','0px','0px']
            }, 
            {
                id: 'sunCopy2',
                type: 'image',
                rect: ['731px', '398px','30px','30px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/sun.svg','0px','0px']
            },
            {
                id: 'location',
                type: 'image',
                rect: ['315px', '46px','30px','30px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/location.svg','0px','0px']
            },
            {
                id: 'load_x',
                type: 'image',
                rect: ['880px', '149px','30px','30px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/load_x.svg','0px','0px']
            },
            {
                id: 'gen',
                type: 'image',
                rect: ['35px', '19px','30px','30px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/gen.svg','0px','0px']
            },
            {
                id: 'nodexx',
                type: 'image',
                rect: ['290px', '270px','118px','30px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/nodexx.svg','0px','0px']
            },
            {
                id: 'nodexxCopy',
                type: 'image',
                rect: ['498px', '270px','118px','30px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",'image/nodexx.svg','0px','0px']
            },
           */],
            symbolInstances: [
            {
                id: 'pv2BDIMTP',
                symbolName: 'pv2BDIMTP',
                autoPlay: {

                }
            },
            {
                id: 'solar1',
                symbolName: 'solar1',
                autoPlay: {

                }
            },
            {
                id: 'Toload2',
                symbolName: 'BDI_STP2Load',
                autoPlay: {

                }
            },
			 {
                id: 'batt2Slave',
                symbolName: 'batt2Slave',
                autoPlay: {

                }
            },
            {
                id: 'PV2BDI22',
                symbolName: 'PV2BDI2',
                autoPlay: {

                }
            },
			 {
                id: 'Slave2batt',
                symbolName: 'Slave2batt',
                autoPlay: {

                }
            },
            {
                id: 'pv2BDI1',
                symbolName: 'pv2BDI1',
                autoPlay: {

                }
            },
            {
                id: 'PV2',
                symbolName: 'PV',
                autoPlay: {

                }
            },
            {
                id: 'L_gen',
                symbolName: 'LG1',
                autoPlay: {

                }
            },
            {
                id: 'Batt2BDISTP2',
                symbolName: 'Batt2BDISTP',
                autoPlay: {

                }
            },
            {
                id: 'batt2BDIMTPs',
                symbolName: 'batt2BDIMTPs',
                autoPlay: {

                }
            },
            {
                id: 'Toload1',
                symbolName: 'BDI2load',
                autoPlay: {

                }
            },
            {
                id: 'Toload3',
                symbolName: 'Toload3',
                autoPlay: {

                }
            },
            {
                id: 'PV2BDISTP',
                symbolName: 'PV2BDISTP',
                autoPlay: {

                }
            },
            {
                id: 'Solar2',
                symbolName: 'Solar2',
                autoPlay: {

                }
            },
            {
                id: 'nodex2batt',
                symbolName: 'nodex2batt',
                autoPlay: {

                }
            },
			{
                id: 'BattUp',
                symbolName: 'BattUp',
                autoPlay: {

                }
            },
			{
                id: 'BattDown',
                symbolName: 'BattDown',
                autoPlay: {

                }
            }, 
            ]
        },
    states: {
        "Base State": {
			"${_img1}": [
                ["style", "height", '601px'],
                ["style", "width", '1134px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1.00)'],
                ["style", "min-width", '0px'],
                ["style", "overflow", 'visible'],
                ["style", "height", '602px'],
                ["style", "width", '1134px']
            ],
			"${_G_irr}": [
                ["style", "top", '78px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '230px'],
                ["style", "width", '229px']
            ],
			"${_G_load}": [
                ["style", "top", '180px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '853px'],
                ["style", "width", '229px']
            ],
			"${_G_solar}": [
                ["style", "top", '472px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '63px'],
                ["style", "width", '229px']
            ],
			"${_G_bdi}": [
                ["style", "top", '472px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '537px'],
                ["style", "width", '229px']
            ],
			"${_G_soc}": [
                ["style", "top", '472px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '289px'],
                ["style", "width", '191px']
            ],	
			"${_G_gen}": [
                ["style", "top", '63px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '-7px'],
                ["style", "width", '229px']
            ],
			"${_G_pv}": [
                ["style", "top", '73px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '526px'],
                ["style", "width", '230px']
            ],
			"${_RH}": [
                ["style", "top", '157px'],
                ["style", "text-align", 'left'],
                ["style", "width", '94px'],
                ["style", "font-weight", '400'],
                ["style", "left", '420px'],
                ["style", "font-size", '0.98em']
            ],
			 "${_PV_temp}": [
                ["style", "top", '120px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.98em'],
                ["style", "font-weight", '400'],
                ["style", "left", '420px'],
                ["style", "width", '76px']
            ], 
            "${_Temp1}": [
                ["style", "top", '139px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.98em'],
                ["style", "font-weight", '400'],
                ["style", "left", '420px'],
                ["style", "width", '94px']
            ],
             "${_Irr}": [
                ["style", "top", '58px'],
                ["style", "font-size", '1.1em'],
                ["style", "font-weight", '700'],
                ["style", "left", '398px'],
                ["style", "width", '84px']
            ],
			"${_Load_kW}": [
                ["style", "top", '167px'],
                ["style", "width", '139px'],
                ["style", "font-weight", '700'],
                ["style", "left", '997px'],
                ["style", "font-size", '1.1em']
            ],
            "${_Load_output1}": [
                ["style", "top", '242px'],
                ["style", "text-align", 'left'],
                ["style", "width", '58px'],
                ["style", "font-weight", '400'],
                ["style", "left", '913px'],
                ["style", "font-size", '0.96em']
            ],
			"${_Load_output2}": [
                ["style", "top", '242px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.96em'],
                ["style", "font-weight", '400'],
                ["style", "left", '969px'],
                ["style", "width", '55px']
            ],
			 "${_Load_output3}": [
                ["style", "top", '242px'],
                ["style", "text-align", 'left'],
                ["style", "width", '55px'],
                ["style", "font-weight", '400'],
                ["style", "left", '1025px'],
                ["style", "font-size", '0.96em']
            ],
			 "${_Load_I1}": [
                ["style", "top", '260px'],
                ["style", "text-align", 'left'],
                ["style", "width", '58px'],
                ["style", "font-weight", '400'],
                ["style", "left", '913px'],
                ["style", "font-size", '0.96em']
            ],
			"${_Load_I2}": [
                ["style", "top", '260px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '0.96em'],
                ["style", "font-weight", '400'],
                ["style", "left", '969px'],
                ["style", "width", '55px']
            ],
			 "${_Load_I3}": [
                ["style", "top", '260px'],
                ["style", "text-align", 'left'],
                ["style", "width", '55px'],
                ["style", "font-weight", '400'],
                ["style", "left", '1025px'],
                ["style", "font-size", '0.96em']
            ],
			 "${_Solar_kW}": [
                ["style", "top", '458px'],
                ["style", "font-size", '1.1em'],
                ["style", "font-weight", '700'],
                ["style", "left", '207px'],
                ["style", "width", '139px']
            ],
			"${_Scc_1kW}": [
                ["style", "top", '520px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '1em'],
                ["style", "font-weight", '400'],
                ["style", "left", '211px'],
                ["style", "width", '64px']
            ],
			"${_Scc_2kW}": [
                ["style", "top", '539px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '1em'],
                ["style", "font-weight", '400'],
                ["style", "left", '211px'],
                ["style", "width", '64px']
            ],
			 "${_BDI_kW}": [
                ["style", "top", '458px'],
                ["style", "width", '139px'],
                ["style", "font-weight", '700'],
                ["style", "left", '685px'],
                ["style", "font-size", '1.1em']
            ],
			"${_BDI_1kW}": [
                ["style", "top", '522px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '1em'],
                ["style", "font-weight", '400'],
                ["style", "left", '688px'],
                ["style", "width", '64px']
            ],
			"${_BDI_2kW}": [
                ["style", "top", '540px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '1em'],
                ["style", "font-weight", '400'],
                ["style", "left", '688px'],
                ["style", "width", '64px']
            ],
			 "${_Batt1_v}": [
                ["style", "top", '522px'],
				["style", "text-align", 'left'],
                ["style", "width", '64px'],
                ["style", "font-weight", '400'],
                ["style", "left", '452px'],
                ["style", "font-size", '1em']
            ],
			 "${_Batt1_I}": [
                ["style", "top", '540px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '1em'],
                ["style", "font-weight", '400'],
                ["style", "left", '452px'],
                ["style", "width", '64px']
            ],
			 "${_Batt1_soc}": [
                ["style", "top", '458px'], 
                ["style", "width", '84px'],
                ["style", "font-weight", '700'],
                ["style", "left", '442px'],
                ["style", "font-size", '1.1em']
            ],
			"${_GD_kW}": [
                ["style", "top", '57px'],
                ["style", "font-weight", '700'],
                ["style", "left", '138px'],
                ["style", "font-size", '1.1em']
            ],
			"${_DG1}": [
                ["style", "top", '137px'],
				["style", "text-align", 'left'],
                ["style", "width", '68px'],
                ["style", "font-weight", '400'],
                ["style", "left", '65px'],
                ["style", "font-size", '0.98em']
            ],
			"${_DG2}": [
                ["style", "top", '137px'],
                ["style", "text-align", 'left'],
                ["style", "width", '62px'],
                ["style", "font-weight", '400'],
                ["style", "left", '138px'],
                ["style", "font-size", '0.98em']
            ],
			"${_GCI_kW}": [
                ["style", "top", '57px'],
                ["style", "font-weight", '700'],
                ["style", "left", '666px'],
                ["style", "font-size", '1.1em']
            ],
			 "${_GCI_1}": [
                ["style", "top", '139px'],
				["style", "text-align", 'left'],
                ["style", "width", '40px'],
                ["style", "font-weight", '100'],
                ["style", "left", '603px'],
                ["style", "font-size", '1em']
            ],
            "${_GCI_2}": [
                ["style", "top", '139px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '1em'],
                ["style", "font-weight", '100'],
                ["style", "left", '673px'],
                ["style", "width", '40px']
            ],
			/*"${_GCI_3}": [
                ["style", "top", '139px'],
				["style", "text-align", 'left'],
                ["style", "width", '40px'],
                ["style", "font-weight", '100'],
                ["style", "left", '653px'],
                ["style", "font-size", '1em']
            ],
            "${_GCI_4}": [
                ["style", "top", '139px'],
                ["style", "text-align", 'left'],
                ["style", "font-size", '1em'],
                ["style", "font-weight", '100'],
                ["style", "left", '693px'],
                ["style", "width", '40px']
            ],*/
			"${_Toload3}": [
                ["style", "left", '94px'],
                ["style", "top", '176px']
            ],
			 /*
			"${_G_nodex1}": [
                ["style", "top", '474px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '290px'],
                ["style", "width", '191px']
            ],
			"${_G_nodex2}": [
                ["style", "top", '474px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "height", '70px'],
                ["style", "opacity", '1'],
                ["style", "left", '537px'],
                ["style", "width", '191px']
            ],
             /* "${_RoundRectCopy3}": [
                ["style", "top", '233px'],
                ["style", "height", '63px'],
                ["color", "background-color", 'rgba(192,192,192,0.06)'],
                ["style", "left", '876px'],
                ["style", "width", '208px']
            ],
            "${_RoundRectCopy8}": [
                ["style", "top", '481px'],
                ["style", "height", '63px'],
                ["color", "background-color", 'rgba(192,192,192,0.06)'],
                ["style", "left", '488px'],
                ["style", "width", '183px']
            ],
            "${_nodexx}": [
                ["style", "height", '30px'],
                ["style", "top", '270px'],
                ["style", "left", '290px'],
                ["style", "width", '118px']
            ],
            "${_sun}": [
                ["style", "left", '601px'],
                ["style", "top", '16px']
            ],
            "${_gen}": [
                ["style", "left", '35px'],
                ["style", "top", '19px']
            ],           
            "${_load_x}": [
                ["style", "left", '880px'],
                ["style", "top", '149px']
            ],
            "${_RoundRectCopy7}": [
                ["style", "top", '481px'],
                ["style", "height", '65px'],
                ["color", "background-color", 'rgba(192,192,192,0.06)'],
                ["style", "left", '259px'],
                ["style", "width", '183px']
            ],
            "${_sunCopy}": [
                ["style", "left", '50px'],
                ["style", "top", '398px']
            ],
            "${_RoundRectCopy}": [
                ["style", "top", '105px'],
                ["style", "height", '48px'],
                ["color", "background-color", 'rgba(192,192,192,0.06)'],
                ["style", "left", '311px'],
                ["style", "width", '224px']
            ],  		
            "${_RoundRectCopy4}": [
                ["style", "top", '481px'],
                ["style", "height", '63px'],
                ["color", "background-color", 'rgba(192,192,192,0.06)'],
                ["style", "left", '731px'],
                ["style", "width", '183px']
            ],
            "${_location}": [
                ["style", "left", '315px'],
                ["style", "top", '46px']
            ],                           
            "${_RoundRectCopy6}": [
                ["style", "top", '481px'],
                ["style", "height", '63px'],
                ["color", "background-color", 'rgba(192,192,192,0.06)'],
                ["style", "left", '49px'],
                ["style", "width", '183px']
            ], 
            "${_RoundRectCopy2}": [
                ["style", "height", '73px'],
                ["color", "background-color", 'rgba(192,192,192,0.06)'],
                ["style", "left", '598px'],
                ["style", "top", '102px']
            ],
            "${_RoundRect}": [
                ["style", "top", '98px'],
                ["style", "height", '78px'],
                ["color", "background-color", 'rgba(192,192,192,0.06)']
            ],
            "${_batt}": [
                ["style", "left", '246px'],
                ["style", "top", '393px']
            ],
            "${_sunCopy2}": [
                ["style", "left", '731px'],
                ["style", "top", '398px']
            ],
            "${_pv2BDI1}": [
                ["style", "left", '674px']
            ],
            "${_battCopy}": [
                ["style", "left", '476px'],
                ["style", "top", '393px']
            ],                     
            "${_nodexxCopy}": [
                ["style", "height", '30px'],
                ["style", "top", '270px'],
                ["style", "left", '498px'],
                ["style", "width", '118px']
            ]*/
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 16000,
            autoPlay: true,
             timeline: [
                { id: "eid1718", tween: [ "style", "${_pv2BDI1}", "left", '674px', { fromValue: '674px'}], position: 0, duration: 0 },
                { id: "eid1665", tween: [ "style", "${_Toload3}", "left", '146px', { fromValue: '146px'}], position: 0, duration: 0 },
                { id: "eid1669", tween: [ "style", "${_Toload3}", "top", '184px', { fromValue: '184px'}], position: 0, duration: 0 }            ]
        }
    }
},
"LG1": {
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
                    rect: ['0px', '0px', '6px', '20px', 'auto', 'auto'],
                    id: 'Rectangle',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy2',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy5',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy10',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy3',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy4',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy6',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy7',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy8',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy9',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy6}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy3}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy5}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '262px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy4}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy9}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy8}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${symbolSelector}": [
                ["style", "height", '18px'],
                ["style", "width", '6px']
            ],
            "${_RectangleCopy2}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_Rectangle}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${_RectangleCopy10}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(17,17,237,1)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '262px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy7}": [
                ["style", "top", '45px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8000,
            autoPlay: true,
            labels: {
                "p1": 0,
                "p2": 1000,
                "P2": 5000
            },
            timeline: [
                { id: "eid1905", tween: [ "color", "${_RectangleCopy9}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 7500, duration: 0 },
                { id: "eid1446", tween: [ "style", "${_RectangleCopy5}", "opacity", '1', { fromValue: '0'}], position: 963, duration: 37 },
                { id: "eid1456", tween: [ "style", "${_RectangleCopy5}", "opacity", '0', { fromValue: '1'}], position: 1202, duration: 38 },
                { id: "eid633", tween: [ "style", "${_RectangleCopy6}", "opacity", '1', { fromValue: '0'}], position: 4003, duration: 38 },
                { id: "eid1634", tween: [ "style", "${_RectangleCopy6}", "opacity", '0', { fromValue: '1'}], position: 6201, duration: 38 },
                { id: "eid634", tween: [ "style", "${_RectangleCopy7}", "opacity", '1', { fromValue: '0'}], position: 5000, duration: 38 },
                { id: "eid1635", tween: [ "style", "${_RectangleCopy7}", "opacity", '0', { fromValue: '1'}], position: 7202, duration: 38 },
                { id: "eid1900", tween: [ "color", "${_RectangleCopy4}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 3204, duration: 0 },
                { id: "eid598", tween: [ "style", "${_RectangleCopy8}", "left", '262px', { fromValue: '6px'}], position: 6000, duration: 2000 },
                { id: "eid1448", tween: [ "style", "${_RectangleCopy10}", "left", '802px', { fromValue: '262px'}], position: 0, duration: 5000 },
                { id: "eid1901", tween: [ "color", "${_RectangleCopy7}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 6500, duration: 0 },
                { id: "eid587", tween: [ "style", "${_RectangleCopy}", "left", '802px', { fromValue: '6px'}], position: 1000, duration: 7000 },
                { id: "eid600", tween: [ "style", "${_RectangleCopy9}", "left", '154px', { fromValue: '6px'}], position: 7000, duration: 1000 },
                { id: "eid606", tween: [ "style", "${_Rectangle}", "top", '28px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid607", tween: [ "style", "${_Rectangle}", "top", '28px', { fromValue: '0px'}], position: 1000, duration: 1000 },
                { id: "eid638", tween: [ "style", "${_Rectangle}", "top", '28px', { fromValue: '0px'}], position: 2000, duration: 1000 },
                { id: "eid639", tween: [ "style", "${_Rectangle}", "top", '28px', { fromValue: '0px'}], position: 3000, duration: 1000 },
                { id: "eid640", tween: [ "style", "${_Rectangle}", "top", '28px', { fromValue: '0px'}], position: 4000, duration: 1000 },
                { id: "eid641", tween: [ "style", "${_Rectangle}", "top", '28px', { fromValue: '0px'}], position: 5000, duration: 1000 },
                { id: "eid642", tween: [ "style", "${_Rectangle}", "top", '28px', { fromValue: '0px'}], position: 6000, duration: 1000 },
                { id: "eid643", tween: [ "style", "${_Rectangle}", "top", '28px', { fromValue: '0px'}], position: 7000, duration: 1000 },
                { id: "eid637", tween: [ "style", "${_RectangleCopy9}", "opacity", '1', { fromValue: '0'}], position: 7000, duration: 38 },
                { id: "eid631", tween: [ "style", "${_RectangleCopy3}", "opacity", '1', { fromValue: '0'}], position: 2000, duration: 38 },
                { id: "eid1628", tween: [ "style", "${_RectangleCopy3}", "opacity", '0', { fromValue: '1'}], position: 4205, duration: 51 },
                { id: "eid636", tween: [ "style", "${_RectangleCopy8}", "opacity", '1', { fromValue: '0'}], position: 6000, duration: 38 },
                { id: "eid591", tween: [ "style", "${_RectangleCopy4}", "left", '586px', { fromValue: '6px'}], position: 3000, duration: 5000 },
                { id: "eid1447", tween: [ "style", "${_RectangleCopy5}", "left", '802px', { fromValue: '262px'}], position: 1000, duration: 5000 },
                { id: "eid1898", tween: [ "color", "${_RectangleCopy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1500, duration: 0 },
                { id: "eid1897", tween: [ "color", "${_RectangleCopy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1500, duration: 0 },
                { id: "eid594", tween: [ "style", "${_RectangleCopy6}", "left", '478px', { fromValue: '6px'}], position: 4000, duration: 4000 },
                { id: "eid1902", tween: [ "color", "${_RectangleCopy8}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 6500, duration: 0 },
                { id: "eid589", tween: [ "style", "${_RectangleCopy3}", "left", '694px', { fromValue: '6px'}], position: 2000, duration: 6000 },
                { id: "eid1441", tween: [ "style", "${_RectangleCopy2}", "left", '802px', { fromValue: '6px'}], position: 0, duration: 7000 },
                { id: "eid1442", tween: [ "style", "${_RectangleCopy2}", "opacity", '1', { fromValue: '0'}], position: 3, duration: 37 },
                { id: "eid1455", tween: [ "style", "${_RectangleCopy2}", "opacity", '0', { fromValue: '1'}], position: 2196, duration: 47 },
                { id: "eid596", tween: [ "style", "${_RectangleCopy7}", "left", '370px', { fromValue: '6px'}], position: 5000, duration: 3000 },
                { id: "eid1899", tween: [ "color", "${_RectangleCopy3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 3204, duration: 0 },
                { id: "eid1903", tween: [ "color", "${_RectangleCopy6}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 5187, duration: 0 },
                { id: "eid1904", tween: [ "color", "${_RectangleCopy5}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1000, duration: 0 },
                { id: "eid632", tween: [ "style", "${_RectangleCopy4}", "opacity", '1', { fromValue: '0'}], position: 3000, duration: 38 },
                { id: "eid1631", tween: [ "style", "${_RectangleCopy4}", "opacity", '0', { fromValue: '1'}], position: 5187, duration: 44 },
                { id: "eid1449", tween: [ "style", "${_RectangleCopy10}", "opacity", '1', { fromValue: '0'}], position: 1, duration: 37 },
                { id: "eid1452", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '1'}], position: 188, duration: 38 },
                { id: "eid626", tween: [ "style", "${_RectangleCopy}", "opacity", '1', { fromValue: '0'}], position: 1003, duration: 37 },
                { id: "eid1625", tween: [ "style", "${_RectangleCopy}", "opacity", '0', { fromValue: '1'}], position: 3204, duration: 44 },
                { id: "eid621", tween: [ "style", "${_Rectangle}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 38 }            ]
        }
    }
},
"BDI2load": {
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
                    rect: ['0px', '0px', '6px', '20px', 'auto', 'auto'],
                    id: 'RectangleCopy15',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy14',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy13',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy12',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy11',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy10',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy9',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy8',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy9}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy15}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${_RectangleCopy8}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy12}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${symbolSelector}": [
                ["style", "height", '16px'],
                ["style", "width", '6px']
            ],
            "${_RectangleCopy13}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy14}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy10}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy11}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8038,
            autoPlay: true,
            labels: {
                "P1": 3250,
                "P2": 5000
            },
            timeline: [
                { id: "eid763", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid764", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 1000, duration: 1000 },
                { id: "eid765", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 2000, duration: 1000 },
                { id: "eid766", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 3000, duration: 1000 },
                { id: "eid767", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 4000, duration: 1000 },
                { id: "eid768", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 5000, duration: 1000 },
                { id: "eid769", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 6000, duration: 1000 },
                { id: "eid770", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 7000, duration: 1000 },
                { id: "eid759", tween: [ "style", "${_RectangleCopy13}", "left", '654px', { fromValue: '6px'}], position: 2000, duration: 6000 },
                { id: "eid751", tween: [ "style", "${_RectangleCopy9}", "left", '222px', { fromValue: '6px'}], position: 6000, duration: 2000 },
                { id: "eid1986", tween: [ "color", "${_RectangleCopy9}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid749", tween: [ "style", "${_RectangleCopy8}", "left", '114px', { fromValue: '6px'}], position: 7000, duration: 1000 },
                { id: "eid761", tween: [ "style", "${_RectangleCopy14}", "left", '762px', { fromValue: '6px'}], position: 1000, duration: 7000 },
                { id: "eid758", tween: [ "style", "${_RectangleCopy12}", "opacity", '1', { fromValue: '0'}], position: 5373, duration: 38 },
                { id: "eid1622", tween: [ "style", "${_RectangleCopy12}", "opacity", '0', { fromValue: '1'}], position: 7147, duration: 30 },
                { id: "eid752", tween: [ "style", "${_RectangleCopy9}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 38 },
                { id: "eid750", tween: [ "style", "${_RectangleCopy8}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 38 },
                { id: "eid757", tween: [ "style", "${_RectangleCopy12}", "left", '546px', { fromValue: '6px'}], position: 3000, duration: 5000 },
                { id: "eid762", tween: [ "style", "${_RectangleCopy14}", "opacity", '1', { fromValue: '0'}], position: 3400, duration: 34 },
                { id: "eid1616", tween: [ "style", "${_RectangleCopy14}", "opacity", '0', { fromValue: '1'}], position: 5137, duration: 87 },
                { id: "eid756", tween: [ "style", "${_RectangleCopy11}", "opacity", '1', { fromValue: '0'}], position: 6374, duration: 38 },
                { id: "eid771", tween: [ "style", "${_RectangleCopy15}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 38 },
                { id: "eid1987", tween: [ "color", "${_RectangleCopy8}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid754", tween: [ "style", "${_RectangleCopy10}", "opacity", '1', { fromValue: '0'}], position: 7375, duration: 38 },
                { id: "eid755", tween: [ "style", "${_RectangleCopy11}", "left", '438px', { fromValue: '6px'}], position: 4000, duration: 4000 },
                { id: "eid753", tween: [ "style", "${_RectangleCopy10}", "left", '330px', { fromValue: '6px'}], position: 5000, duration: 3000 },
                { id: "eid760", tween: [ "style", "${_RectangleCopy13}", "opacity", '1', { fromValue: '0'}], position: 4385, duration: 38 },
                { id: "eid1619", tween: [ "style", "${_RectangleCopy13}", "opacity", '0', { fromValue: '1'}], position: 6144, duration: 36 },
                { id: "eid1906", tween: [ "color", "${_RectangleCopy14}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 4000, duration: 0 },
                { id: "eid1907", tween: [ "color", "${_RectangleCopy13}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 5000, duration: 0 },
                { id: "eid1908", tween: [ "color", "${_RectangleCopy12}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 6000, duration: 0 },
                { id: "eid1909", tween: [ "color", "${_RectangleCopy11}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 7000, duration: 0 },
                { id: "eid1910", tween: [ "color", "${_RectangleCopy10}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 7413, duration: 0 }            ]
        }
    }
},
"BDI_STP2Load": {
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
                    rect: ['0px', '0px', '6px', '20px', 'auto', 'auto'],
                    id: 'RectangleCopy23',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy22',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy21',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy20',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy19',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy24',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'Rectangle',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy24}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '438px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy19}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy22}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '438px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy20}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${symbolSelector}": [
                ["style", "height", '16px'],
                ["style", "width", '6px']
            ],
            "${_Rectangle}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '438px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy21}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy23}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8500,
            autoPlay: true,
            labels: {
                "P1": 5000
            },
            timeline: [
                { id: "eid785", tween: [ "style", "${_RectangleCopy22}", "opacity", '1', { fromValue: '0'}], position: 5341, duration: 37 },
                { id: "eid1610", tween: [ "style", "${_RectangleCopy22}", "opacity", '0', { fromValue: '1'}], position: 6323, duration: 59 },
                { id: "eid779", tween: [ "style", "${_RectangleCopy19}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 38 },
                { id: "eid784", tween: [ "style", "${_RectangleCopy22}", "left", '762px', { fromValue: '6px'}], position: 1000, duration: 7000 },
                { id: "eid780", tween: [ "style", "${_RectangleCopy20}", "left", '546px', { fromValue: '6px'}], position: 3000, duration: 5000 },
                { id: "eid826", tween: [ "style", "${_RectangleCopy}", "left", '762px', { fromValue: '438px'}], position: 4000, duration: 3000 },
                { id: "eid786", tween: [ "style", "${_RectangleCopy23}", "top", '28px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid787", tween: [ "style", "${_RectangleCopy23}", "top", '28px', { fromValue: '0px'}], position: 1000, duration: 1000 },
                { id: "eid788", tween: [ "style", "${_RectangleCopy23}", "top", '28px', { fromValue: '0px'}], position: 2000, duration: 1000 },
                { id: "eid789", tween: [ "style", "${_RectangleCopy23}", "top", '28px', { fromValue: '0px'}], position: 3000, duration: 1000 },
                { id: "eid790", tween: [ "style", "${_RectangleCopy23}", "top", '28px', { fromValue: '0px'}], position: 4000, duration: 1000 },
                { id: "eid791", tween: [ "style", "${_RectangleCopy23}", "top", '28px', { fromValue: '0px'}], position: 5000, duration: 1000 },
                { id: "eid792", tween: [ "style", "${_RectangleCopy23}", "top", '28px', { fromValue: '0px'}], position: 6000, duration: 1000 },
                { id: "eid793", tween: [ "style", "${_RectangleCopy23}", "top", '28px', { fromValue: '0px'}], position: 7000, duration: 1000 },
                { id: "eid808", tween: [ "style", "${_Rectangle}", "left", '762px', { fromValue: '438px'}], position: 3137, duration: 3000 },
                { id: "eid809", tween: [ "style", "${_Rectangle}", "opacity", '1', { fromValue: '0'}], position: 3298, duration: 37 },
                { id: "eid810", tween: [ "style", "${_Rectangle}", "opacity", '0', { fromValue: '1'}], position: 4500, duration: 38 },
                { id: "eid803", tween: [ "style", "${_RectangleCopy24}", "left", '762px', { fromValue: '438px'}], position: 5000, duration: 3000 },
                { id: "eid783", tween: [ "style", "${_RectangleCopy21}", "opacity", '1', { fromValue: '0'}], position: 6137, duration: 38 },
                { id: "eid1613", tween: [ "style", "${_RectangleCopy21}", "opacity", '0', { fromValue: '1'}], position: 7357, duration: 24 },
                { id: "eid827", tween: [ "style", "${_RectangleCopy}", "opacity", '1', { fromValue: '0'}], position: 4161, duration: 37 },
                { id: "eid828", tween: [ "style", "${_RectangleCopy}", "opacity", '0', { fromValue: '1'}], position: 5340, duration: 38 },
                { id: "eid778", tween: [ "style", "${_RectangleCopy19}", "left", '438px', { fromValue: '6px'}], position: 4000, duration: 4000 },
                { id: "eid2090", tween: [ "color", "${_RectangleCopy24}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1911", tween: [ "color", "${_Rectangle}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 3500, duration: 0 },
                { id: "eid1913", tween: [ "color", "${_RectangleCopy22}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 2250, duration: 0 },
                { id: "eid794", tween: [ "style", "${_RectangleCopy23}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 38 },
                { id: "eid1914", tween: [ "color", "${_RectangleCopy21}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 6323, duration: 0 },
                { id: "eid1912", tween: [ "color", "${_RectangleCopy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 4500, duration: 0 },
                { id: "eid1606", tween: [ "style", "${_RectangleCopy24}", "opacity", '1', { fromValue: '0'}], position: 5341, duration: 39 },
                { id: "eid807", tween: [ "style", "${_RectangleCopy24}", "opacity", '0', { fromValue: '1'}], position: 6323, duration: 38 },
                { id: "eid1915", tween: [ "color", "${_RectangleCopy20}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 7750, duration: 0 },
                { id: "eid1916", tween: [ "color", "${_RectangleCopy19}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 8500, duration: 0 },
                { id: "eid781", tween: [ "style", "${_RectangleCopy20}", "opacity", '1', { fromValue: '0'}], position: 7145, duration: 38 },
                { id: "eid782", tween: [ "style", "${_RectangleCopy21}", "left", '654px', { fromValue: '6px'}], position: 2000, duration: 6000 }            ]
        }
    }
},
"batt2Slave": {
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
                    rect: ['0px', '0px', '6px', '20px', 'auto', 'auto'],
                    id: 'RectangleCopy15',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy14',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy13',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy12',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy11',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy10',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy9',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy8',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy9}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy15}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${_RectangleCopy8}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy12}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${symbolSelector}": [
                ["style", "height", '16px'],
                ["style", "width", '6px']
            ],
            "${_RectangleCopy13}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy14}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy10}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy11}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8038,
            autoPlay: true,
            labels: {
                "P1": 3250,
                "P2": 5000
            },
               timeline: [
                { id: "eid763", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid764", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 1000, duration: 1000 },
                { id: "eid765", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 2000, duration: 1000 },
                { id: "eid766", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 3000, duration: 1000 },
                { id: "eid767", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 4000, duration: 1000 },
                { id: "eid768", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 5000, duration: 1000 },
                { id: "eid769", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 6000, duration: 1000 },
                { id: "eid770", tween: [ "style", "${_RectangleCopy15}", "top", '28px', { fromValue: '0px'}], position: 7000, duration: 1000 },
                { id: "eid759", tween: [ "style", "${_RectangleCopy13}", "left", '694px', { fromValue: '6px'}], position: 2000, duration: 6000 },
                { id: "eid751", tween: [ "style", "${_RectangleCopy9}", "left", '222px', { fromValue: '6px'}], position: 6000, duration: 2000 },
                { id: "eid1986", tween: [ "color", "${_RectangleCopy9}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid749", tween: [ "style", "${_RectangleCopy8}", "left", '114px', { fromValue: '6px'}], position: 7000, duration: 1000 },
                //{ id: "eid761", tween: [ "style", "${_RectangleCopy14}", "left", '762px', { fromValue: '6px'}], position: 1000, duration: 7000 },
                { id: "eid758", tween: [ "style", "${_RectangleCopy12}", "opacity", '1', { fromValue: '0'}], position: 5173, duration: 38 },
                { id: "eid1622", tween: [ "style", "${_RectangleCopy12}", "opacity", '0', { fromValue: '1'}], position: 6947, duration: 30 },
                { id: "eid752", tween: [ "style", "${_RectangleCopy9}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 38 },
                { id: "eid750", tween: [ "style", "${_RectangleCopy8}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 38 },
                { id: "eid757", tween: [ "style", "${_RectangleCopy12}", "left", '586px', { fromValue: '6px'}], position: 3000, duration: 5000 },
          //{ id: "eid762", tween: [ "style", "${_RectangleCopy14}", "opacity", '1', { fromValue: '0'}], position: 3400, duration: 34 },
          //{ id: "eid1616", tween: [ "style", "${_RectangleCopy14}", "opacity", '0', { fromValue: '1'}], position: 5137, duration: 87 },
                { id: "eid756", tween: [ "style", "${_RectangleCopy11}", "opacity", '1', { fromValue: '0'}], position: 6174, duration: 38 },
                { id: "eid771", tween: [ "style", "${_RectangleCopy15}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 38 },
                { id: "eid1987", tween: [ "color", "${_RectangleCopy8}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
           		{ id: "eid754", tween: [ "style", "${_RectangleCopy10}", "opacity", '1', { fromValue: '0'}], position: 7175, duration: 38 },
                { id: "eid755", tween: [ "style", "${_RectangleCopy11}", "left", '478px', { fromValue: '6px'}], position: 4000, duration: 4000 },
                { id: "eid753", tween: [ "style", "${_RectangleCopy10}", "left", '350px', { fromValue: '6px'}], position: 5000, duration: 3000 },
             	{ id: "eid760", tween: [ "style", "${_RectangleCopy13}", "opacity", '1', { fromValue: '0'}], position: 4185, duration: 38 },
             	{ id: "eid1619", tween: [ "style", "${_RectangleCopy13}", "opacity", '0', { fromValue: '1'}], position: 5944, duration: 36 },
                { id: "eid1906", tween: [ "color", "${_RectangleCopy14}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 4000, duration: 0 },
                { id: "eid1907", tween: [ "color", "${_RectangleCopy13}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 5000, duration: 0 },
                { id: "eid1908", tween: [ "color", "${_RectangleCopy12}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 6000, duration: 0 },
                { id: "eid1909", tween: [ "color", "${_RectangleCopy11}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 7000, duration: 0 },
                { id: "eid1910", tween: [ "color", "${_RectangleCopy10}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 7413, duration: 0 }            ]
        }
    }
},
"solar1": {
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
                    rect: ['0px', '0px', '6px', '18px', 'auto', 'auto'],
                    id: 'Solar',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '-23px', '18px', '6px', 'auto', 'auto'],
                    id: 'SolarCopy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '-23px', '18px', '6px', 'auto', 'auto'],
                    id: 'SolarCopy2',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '-23px', '18px', '6px', 'auto', 'auto'],
                    id: 'SolarCopy3',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '-23px', '18px', '6px', 'auto', 'auto'],
                    id: 'SolarCopy4',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_SolarCopy}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '-23px'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '18px']
            ],
            "${_SolarCopy2}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '-23px'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '18px']
            ],
            "${symbolSelector}": [
                ["style", "height", '18px'],
                ["style", "width", '6px']
            ],
            "${_SolarCopy3}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '-23px'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '18px']
            ],
            "${_Solar}": [
                ["style", "top", '0px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_SolarCopy4}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '-23px'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '18px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 10076,
            autoPlay: true,
            labels: {
                "P1": 1250,
                "P2": 1959
            },
            timeline: [
                { id: "eid877", tween: [ "style", "${_SolarCopy2}", "left", '161px', { fromValue: '6px'}], position: 2538, duration: 2712 },
                { id: "eid892", tween: [ "style", "${_SolarCopy2}", "left", '206px', { fromValue: '161px'}], position: 5250, duration: 788 },
                { id: "eid849", tween: [ "style", "${_SolarCopy}", "opacity", '1', { fromValue: '0'}], position: 462, duration: 38 },
                { id: "eid852", tween: [ "style", "${_SolarCopy}", "opacity", '0', { fromValue: '1'}], position: 4000, duration: 38 },
                { id: "eid884", tween: [ "style", "${_SolarCopy4}", "opacity", '1', { fromValue: '0'}], position: 6500, duration: 38 },
                { id: "eid885", tween: [ "style", "${_SolarCopy4}", "opacity", '0', { fromValue: '1'}], position: 10038, duration: 38 },
                { id: "eid844", tween: [ "style", "${_SolarCopy}", "left", '206px', { fromValue: '6px'}], position: 500, duration: 3500 },
                { id: "eid1893", tween: [ "color", "${_SolarCopy4}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 569, duration: 0 },
                { id: "eid1894", tween: [ "color", "${_SolarCopy3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 4529, duration: 0 },
                { id: "eid880", tween: [ "style", "${_SolarCopy3}", "left", '118px', { fromValue: '6px'}], position: 4538, duration: 1962 },
                { id: "eid891", tween: [ "style", "${_SolarCopy3}", "left", '206px', { fromValue: '118px'}], position: 6500, duration: 1538 },
                { id: "eid881", tween: [ "style", "${_SolarCopy3}", "opacity", '1', { fromValue: '0'}], position: 4500, duration: 38 },
                { id: "eid882", tween: [ "style", "${_SolarCopy3}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 38 },
                { id: "eid1896", tween: [ "color", "${_SolarCopy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 3186, duration: 0 },
                { id: "eid1895", tween: [ "color", "${_SolarCopy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 },
                { id: "eid883", tween: [ "style", "${_SolarCopy4}", "left", '75px', { fromValue: '6px'}], position: 6538, duration: 1212 },
                { id: "eid890", tween: [ "style", "${_SolarCopy4}", "left", '206px', { fromValue: '75px'}], position: 7750, duration: 2288 },
                { id: "eid878", tween: [ "style", "${_SolarCopy2}", "opacity", '1', { fromValue: '0'}], position: 2500, duration: 38 },
                { id: "eid879", tween: [ "style", "${_SolarCopy2}", "opacity", '0', { fromValue: '1'}], position: 6000, duration: 38 },
                { id: "eid896", tween: [ "style", "${_Solar}", "opacity", '0', { fromValue: '1'}], position: 500, duration: 29 },
                { id: "eid901", tween: [ "style", "${_Solar}", "opacity", '1', { fromValue: '0'}], position: 2000, duration: 41 },
                { id: "eid897", tween: [ "style", "${_Solar}", "opacity", '0', { fromValue: '1'}], position: 2500, duration: 29 },
                { id: "eid903", tween: [ "style", "${_Solar}", "opacity", '1', { fromValue: '0'}], position: 4000, duration: 41 },
                { id: "eid898", tween: [ "style", "${_Solar}", "opacity", '0', { fromValue: '1'}], position: 4500, duration: 29 },
                { id: "eid904", tween: [ "style", "${_Solar}", "opacity", '1', { fromValue: '0'}], position: 6000, duration: 41 },
                { id: "eid841", tween: [ "style", "${_Solar}", "opacity", '0', { fromValue: '1'}], position: 6500, duration: 29 },
                { id: "eid834", tween: [ "style", "${_Solar}", "top", '-23px', { fromValue: '0px'}], position: 0, duration: 500 },
                { id: "eid836", tween: [ "style", "${_Solar}", "top", '-23px', { fromValue: '0px'}], position: 2000, duration: 500 },
                { id: "eid893", tween: [ "style", "${_Solar}", "top", '-23px', { fromValue: '0px'}], position: 4000, duration: 500 },
                { id: "eid895", tween: [ "style", "${_Solar}", "top", '-23px', { fromValue: '0px'}], position: 6000, duration: 500 }            ]
        }
    }
},
"batt2BDIMTPs": {
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
                    rect: ['0px', '0px', '6px', '18px', 'auto', 'auto'],
                    id: 'Batt2BDIMTP',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '18px', 'auto', 'auto'],
                    id: 'Batt2BDIMTPCopy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Batt2BDIMTP}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${_Batt2BDIMTPCopy}": [
                ["style", "top", '-137px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${symbolSelector}": [
                ["style", "height", '18px'],
                ["style", "width", '6px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 5228,
            autoPlay: true,
            labels: {
                "p1": 1750
            },
            timeline: [
                { id: "eid907", tween: [ "style", "${_Batt2BDIMTPCopy}", "top", '-185px', { fromValue: '-137px'}], position: 2037, duration: 696 },
                { id: "eid1196", tween: [ "style", "${_Batt2BDIMTPCopy}", "top", '-185px', { fromValue: '-137px'}], position: 3782, duration: 704 },
                { id: "eid906", tween: [ "style", "${_Batt2BDIMTP}", "top", '-52px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid1193", tween: [ "style", "${_Batt2BDIMTP}", "top", '-52px', { fromValue: '0px'}], position: 2000, duration: 1000 },
                { id: "eid1199", tween: [ "style", "${_Batt2BDIMTP}", "top", '-52px', { fromValue: '0px'}], position: 3750, duration: 1000 },
                { id: "eid931", tween: [ "style", "${_Batt2BDIMTPCopy}", "opacity", '1', { fromValue: '0'}], position: 2000, duration: 37 },
                { id: "eid917", tween: [ "style", "${_Batt2BDIMTPCopy}", "opacity", '0', { fromValue: '1'}], position: 2734, duration: 16 },
                { id: "eid1197", tween: [ "style", "${_Batt2BDIMTPCopy}", "opacity", '1', { fromValue: '0'}], position: 3750, duration: 32 },
                { id: "eid1198", tween: [ "style", "${_Batt2BDIMTPCopy}", "opacity", '0', { fromValue: '1'}], position: 4486, duration: 14 },
                { id: "eid1191", tween: [ "style", "${_Batt2BDIMTP}", "opacity", '1', { fromValue: '0'}], position: 685, duration: 38 },
                { id: "eid915", tween: [ "style", "${_Batt2BDIMTP}", "opacity", '0', { fromValue: '1'}], position: 1000, duration: 39 },
                { id: "eid1194", tween: [ "style", "${_Batt2BDIMTP}", "opacity", '1', { fromValue: '0'}], position: 2685, duration: 38 },
                { id: "eid1195", tween: [ "style", "${_Batt2BDIMTP}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 39 },
                { id: "eid1200", tween: [ "style", "${_Batt2BDIMTP}", "opacity", '1', { fromValue: '0'}], position: 4435, duration: 38 },
                { id: "eid1201", tween: [ "style", "${_Batt2BDIMTP}", "opacity", '0', { fromValue: '1'}], position: 4750, duration: 39 },
                { id: "eid1922", tween: [ "color", "${_Batt2BDIMTPCopy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 2500, duration: 0 },
                { id: "eid1921", tween: [ "color", "${_Batt2BDIMTP}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 250, duration: 0 }            ]
        }
    }
},
"Batt2BDISTP": {
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
                    type: 'rect',
                    id: 'Batt2BDISTP',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['0px', '0px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Batt2BDISTPCopy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['0px', '0px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Batt2BDISTPCopy}": [
                ["style", "top", '-114px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${_Batt2BDISTP}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${symbolSelector}": [
                ["style", "height", '18px'],
                ["style", "width", '6px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8025,
            autoPlay: true,
            labels: {
                "P1": 5000
            },
            timeline: [
                //{ id: "eid1210", tween: [ "style", "${_Batt2BDISTP}", "top", '-58px', { fromValue: '-34px'}], position: 2750, duration: 750 },
                { id: "eid1223", tween: [ "style", "${_Batt2BDISTP}", "top", '-58px', { fromValue: '-34px'}], position: 4250, duration: 750 },
                { id: "eid1262", tween: [ "style", "${_Batt2BDISTP}", "top", '-58px', { fromValue: '-34px'}], position: 5750, duration: 750 },
                { id: "eid1265", tween: [ "style", "${_Batt2BDISTP}", "top", '-58px', { fromValue: '-34px'}], position: 7250, duration: 750 },
                //{ id: "eid1253", tween: [ "style", "${_Batt2BDISTP}", "opacity", '1', { fromValue: '0'}], position: 2750, duration: 29 },
                //{ id: "eid1261", tween: [ "style", "${_Batt2BDISTP}", "opacity", '0', { fromValue: '1'}], position: 3500, duration: 25 },
                { id: "eid1254", tween: [ "style", "${_Batt2BDISTP}", "opacity", '1', { fromValue: '0'}], position: 4250, duration: 29 },
                { id: "eid1226", tween: [ "style", "${_Batt2BDISTP}", "opacity", '0', { fromValue: '1'}], position: 5000, duration: 25 },
                { id: "eid1263", tween: [ "style", "${_Batt2BDISTP}", "opacity", '1', { fromValue: '0'}], position: 5750, duration: 29 },
                { id: "eid1264", tween: [ "style", "${_Batt2BDISTP}", "opacity", '0', { fromValue: '1'}], position: 6500, duration: 25 },
                { id: "eid1266", tween: [ "style", "${_Batt2BDISTP}", "opacity", '1', { fromValue: '0'}], position: 7250, duration: 29 },
                { id: "eid1267", tween: [ "style", "${_Batt2BDISTP}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 25 },
                { id: "eid1923", tween: [ "color", "${_Batt2BDISTP}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 3000, duration: 0 },
                //{ id: "eid1256", tween: [ "style", "${_Batt2BDISTPCopy}", "opacity", '1', { fromValue: '0'}], position: 3000, duration: 51 },
                //{ id: "eid1257", tween: [ "style", "${_Batt2BDISTPCopy}", "opacity", '0', { fromValue: '1'}], position: 3460, duration: 40 },
                { id: "eid1259", tween: [ "style", "${_Batt2BDISTPCopy}", "opacity", '1', { fromValue: '0'}], position: 4500, duration: 51 },
                { id: "eid1260", tween: [ "style", "${_Batt2BDISTPCopy}", "opacity", '0', { fromValue: '1'}], position: 4960, duration: 40 },
                { id: "eid1269", tween: [ "style", "${_Batt2BDISTPCopy}", "opacity", '1', { fromValue: '0'}], position: 6000, duration: 51 },
                { id: "eid1270", tween: [ "style", "${_Batt2BDISTPCopy}", "opacity", '0', { fromValue: '1'}], position: 6485, duration: 40 },
                { id: "eid1272", tween: [ "style", "${_Batt2BDISTPCopy}", "opacity", '1', { fromValue: '0'}], position: 7500, duration: 51 },
                { id: "eid1273", tween: [ "style", "${_Batt2BDISTPCopy}", "opacity", '0', { fromValue: '1'}], position: 7985, duration: 40 },
                //{ id: "eid1255", tween: [ "style", "${_Batt2BDISTPCopy}", "top", '-185px', { fromValue: '-92px'}], position: 2500, duration: 960 },
                { id: "eid1258", tween: [ "style", "${_Batt2BDISTPCopy}", "top", '-185px', { fromValue: '-92px'}], position: 4000, duration: 960 },
                { id: "eid1268", tween: [ "style", "${_Batt2BDISTPCopy}", "top", '-185px', { fromValue: '-92px'}], position: 5500, duration: 985 },
                { id: "eid1271", tween: [ "style", "${_Batt2BDISTPCopy}", "top", '-185px', { fromValue: '-92px'}], position: 7000, duration: 985 },
				{ id: "eid1924", tween: [ "color", "${_Batt2BDISTPCopy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 3000, duration: 0 }]
        }
    }
},
"PV": {
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
                    type: 'rect',
                    id: 'PV',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_PV}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '18px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${symbolSelector}": [
                ["style", "height", '18px'],
                ["style", "width", '6px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 4000,
            autoPlay: true,
            timeline: [
                { id: "eid966", tween: [ "style", "${_PV}", "top", '28px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid975", tween: [ "style", "${_PV}", "top", '28px', { fromValue: '0px'}], position: 2000, duration: 1000 },
                { id: "eid970", tween: [ "style", "${_PV}", "opacity", '0', { fromValue: '1'}], position: 1000, duration: 55 },
               { id: "eid982", tween: [ "style", "${_PV}", "opacity", '1', { fromValue: '0'}], position: 2000, duration: 28 },
                { id: "eid984", tween: [ "style", "${_PV}", "opacity", '0', { fromValue: '1'}], position: 2963, duration: 37 },
                { id: "eid1925", tween: [ "color", "${_PV}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 250, duration: 0 }            ]
        }
    }
},
"BattUp": {
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
                    type: 'rect',
                    id: 'BattUp',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_BattUp}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '18px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${symbolSelector}": [
                ["style", "height", '18px'],
                ["style", "width", '6px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 4000,
            autoPlay: true,
            timeline: [
                { id: "eid966", tween: [ "style", "${_BattUp}", "top", '0px', { fromValue: '20px'}], position: 0, duration: 1000 },
                { id: "eid975", tween: [ "style", "${_BattUp}", "top", '0px', { fromValue: '20px'}], position: 2000, duration: 1000 },
                { id: "eid970", tween: [ "style", "${_BattUp}", "opacity", '0', { fromValue: '1'}], position: 1000, duration: 55 },
               { id: "eid982", tween: [ "style", "${_BattUp}", "opacity", '1', { fromValue: '0'}], position: 2000, duration: 28 },
                { id: "eid984", tween: [ "style", "${_BattUp}", "opacity", '0', { fromValue: '1'}], position: 2963, duration: 37 },
                { id: "eid1925", tween: [ "color", "${_BattUp}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 250, duration: 0 }            ]
        }
    }
},
"BattDown": {
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
                    type: 'rect',
                    id: 'BattDown',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_BattDown}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '18px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${symbolSelector}": [
                ["style", "height", '18px'],
                ["style", "width", '6px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 4000,
            autoPlay: true,
            timeline: [
                { id: "eid966", tween: [ "style", "${_BattDown}", "top", '20px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid975", tween: [ "style", "${_BattDown}", "top", '20px', { fromValue: '0px'}], position: 2000, duration: 1000 },
                { id: "eid970", tween: [ "style", "${_BattDown}", "opacity", '0', { fromValue: '1'}], position: 1000, duration: 55 },
               { id: "eid982", tween: [ "style", "${_BattDown}", "opacity", '1', { fromValue: '0'}], position: 2000, duration: 28 },
                { id: "eid984", tween: [ "style", "${_BattDown}", "opacity", '0', { fromValue: '1'}], position: 2963, duration: 37 },
                { id: "eid1925", tween: [ "color", "${_BattDown}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 250, duration: 0 }            ]
        }
    }
},
"nodex1": {
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
                    type: 'rect',
                    id: 'Nodex1',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['0px', '0px', '16px', '6px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Nodex1Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Nodex1Copy2',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Nodex1Copy3',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Nodex1Copy4',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Nodex1Copy}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${_Nodex1Copy3}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${_Nodex1Copy4}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '16px']
            ],
            "${_Nodex1Copy2}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${_Nodex1}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '16px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8046,
            autoPlay: true,
            labels: {
                "P1": 4000
            },
            timeline: [
                { id: "eid1034", tween: [ "style", "${_Nodex1Copy4}", "top", '-66px', { fromValue: '-16px'}], position: 7000, duration: 1000 },
                { id: "eid991", tween: [ "style", "${_Nodex1Copy}", "top", '-265px', { fromValue: '-16px'}], position: 1000, duration: 5000 },
                { id: "eid1016", tween: [ "style", "${_Nodex1Copy}", "opacity", '1', { fromValue: '0'}], position: 1000, duration: 43 },
                { id: "eid1019", tween: [ "style", "${_Nodex1Copy}", "opacity", '0', { fromValue: '1'}], position: 3750, duration: 48 },
                { id: "eid1040", tween: [ "style", "${_Nodex1}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 32 },
                { id: "eid1006", tween: [ "style", "${_Nodex1}", "opacity", '0', { fromValue: '1'}], position: 960, duration: 40 },
                { id: "eid1015", tween: [ "style", "${_Nodex1}", "opacity", '1', { fromValue: '0'}], position: 2000, duration: 43 },
                { id: "eid1007", tween: [ "style", "${_Nodex1}", "opacity", '0', { fromValue: '1'}], position: 2960, duration: 35 },
                { id: "eid1014", tween: [ "style", "${_Nodex1}", "opacity", '1', { fromValue: '0'}], position: 4000, duration: 52 },
                { id: "eid1008", tween: [ "style", "${_Nodex1}", "opacity", '0', { fromValue: '1'}], position: 4952, duration: 36 },
                { id: "eid1013", tween: [ "style", "${_Nodex1}", "opacity", '1', { fromValue: '0'}], position: 6000, duration: 43 },
                { id: "eid1009", tween: [ "style", "${_Nodex1}", "opacity", '0', { fromValue: '1'}], position: 6960, duration: 40 },
                { id: "eid1035", tween: [ "style", "${_Nodex1Copy4}", "opacity", '1', { fromValue: '0'}], position: 7000, duration: 48 },
                { id: "eid1081", tween: [ "style", "${_Nodex1Copy4}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 46 },
                { id: "eid1027", tween: [ "style", "${_Nodex1Copy2}", "opacity", '1', { fromValue: '0'}], position: 2960, duration: 40 },
                { id: "eid1030", tween: [ "style", "${_Nodex1Copy2}", "opacity", '0', { fromValue: '1'}], position: 5750, duration: 46 },
                { id: "eid1929", tween: [ "color", "${_Nodex1Copy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 },
                { id: "eid987", tween: [ "style", "${_Nodex1}", "left", '-40px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid988", tween: [ "style", "${_Nodex1}", "left", '-40px', { fromValue: '0px'}], position: 2000, duration: 1000 },
                { id: "eid992", tween: [ "style", "${_Nodex1}", "left", '-40px', { fromValue: '0px'}], position: 4000, duration: 1000 },
                { id: "eid993", tween: [ "style", "${_Nodex1}", "left", '-40px', { fromValue: '0px'}], position: 6000, duration: 1000 },
                { id: "eid1928", tween: [ "color", "${_Nodex1}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 },
                { id: "eid1931", tween: [ "color", "${_Nodex1Copy3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 },
                { id: "eid999", tween: [ "style", "${_Nodex1Copy2}", "top", '-265px', { fromValue: '-16px'}], position: 3000, duration: 5000 },
                { id: "eid1932", tween: [ "color", "${_Nodex1Copy4}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 },
                { id: "eid1000", tween: [ "style", "${_Nodex1Copy3}", "top", '-165px', { fromValue: '-16px'}], position: 5000, duration: 3000 },
                { id: "eid1033", tween: [ "style", "${_Nodex1Copy3}", "opacity", '1', { fromValue: '0'}], position: 4952, duration: 48 },
                { id: "eid1084", tween: [ "style", "${_Nodex1Copy3}", "opacity", '0', { fromValue: '1'}], position: 7750, duration: 46 },
                { id: "eid1930", tween: [ "color", "${_Nodex1Copy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 }            ]
        }
    }
},
"nodex2": {
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
                    rect: ['0px', '0px', '16px', '6px', 'auto', 'auto'],
                    id: 'Nodex1Copy14',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    id: 'Nodex1Copy13',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    id: 'Nodex1Copy12',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Nodex1Copy13}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${_Nodex1Copy12}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${_Nodex1Copy14}": [
                ["style", "top", '-160px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '16px']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '16px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8040,
            autoPlay: true,
            labels: {
                "p1": 4000
            },
            timeline: [
                { id: "eid1159", tween: [ "style", "${_Nodex1Copy14}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 32 },
                { id: "eid1160", tween: [ "style", "${_Nodex1Copy14}", "opacity", '0', { fromValue: '1'}], position: 960, duration: 40 },
                { id: "eid1163", tween: [ "style", "${_Nodex1Copy14}", "opacity", '1', { fromValue: '0'}], position: 3250, duration: 52 },
                { id: "eid1164", tween: [ "style", "${_Nodex1Copy14}", "opacity", '0', { fromValue: '1'}], position: 4202, duration: 36 },
                { id: "eid1187", tween: [ "style", "${_Nodex1Copy14}", "opacity", '1', { fromValue: '0'}], position: 5250, duration: 52 },
                { id: "eid1188", tween: [ "style", "${_Nodex1Copy14}", "opacity", '0', { fromValue: '1'}], position: 6202, duration: 36 },
                { id: "eid1183", tween: [ "style", "${_Nodex1Copy14}", "opacity", '1', { fromValue: '0'}], position: 7250, duration: 52 },
                { id: "eid1184", tween: [ "style", "${_Nodex1Copy14}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 22 },
                { id: "eid1155", tween: [ "style", "${_Nodex1Copy14}", "left", '-40px', { fromValue: '0px'}], position: 0, duration: 1000 },
                { id: "eid1157", tween: [ "style", "${_Nodex1Copy14}", "left", '-40px', { fromValue: '0px'}], position: 3250, duration: 1000 },
                { id: "eid1186", tween: [ "style", "${_Nodex1Copy14}", "left", '-40px', { fromValue: '0px'}], position: 5250, duration: 1000 },
                { id: "eid1182", tween: [ "style", "${_Nodex1Copy14}", "left", '-30px', { fromValue: '0px'}], position: 7250, duration: 750 },
                { id: "eid1150", tween: [ "style", "${_Nodex1Copy12}", "opacity", '1', { fromValue: '0'}], position: 8000, duration: 40 },
                { id: "eid1149", tween: [ "style", "${_Nodex1Copy12}", "top", '-265px', { fromValue: '-16px'}], position: 3000, duration: 5000 },
                { id: "eid2023", tween: [ "style", "${_Nodex1Copy13}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1933", tween: [ "color", "${_Nodex1Copy14}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1934", tween: [ "color", "${_Nodex1Copy13}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1935", tween: [ "color", "${_Nodex1Copy12}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1152", tween: [ "style", "${_Nodex1Copy13}", "top", '-265px', { fromValue: '-16px'}], position: 1000, duration: 5000 }            ]
        }
    }
},
"pv2BDIMTP": {
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
                    type: 'rect',
                    id: 'Rectangle',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy2',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy3',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy4',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy5',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy2',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy3',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy3}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_Rectangle4Copy3}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-319px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_RectangleCopy4}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy2}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0.0081302121402771'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_Rectangle4Copy}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-319px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_RectangleCopy}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '15px']
            ],
            "${_RectangleCopy5}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_Rectangle}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_Rectangle4}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-319px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle4Copy2}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-319px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 16000,
            autoPlay: true,
            labels: {
                "P2": 8073
            },
            timeline: [
                { id: "eid1465", tween: [ "style", "${_RectangleCopy5}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1464", tween: [ "style", "${_RectangleCopy3}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1963", tween: [ "color", "${_Rectangle4}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1962", tween: [ "color", "${_RectangleCopy5}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1360", tween: [ "style", "${_Rectangle4}", "opacity", '1', { fromValue: '0'}], position: 5926, duration: 74 },
                { id: "eid1335", tween: [ "style", "${_Rectangle4}", "opacity", '0', { fromValue: '1'}], position: 6460, duration: 34 },
                { id: "eid1338", tween: [ "style", "${_Rectangle4}", "opacity", '1', { fromValue: '0'}], position: 7380, duration: 74 },
                { id: "eid1341", tween: [ "style", "${_Rectangle4}", "opacity", '0', { fromValue: '1'}], position: 7600, duration: 34 },
                { id: "eid1959", tween: [ "color", "${_RectangleCopy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1362", tween: [ "style", "${_Rectangle4Copy2}", "opacity", '1', { fromValue: '0'}], position: 9926, duration: 74 },
                { id: "eid1353", tween: [ "style", "${_Rectangle4Copy2}", "opacity", '0', { fromValue: '1'}], position: 10476, duration: 39 },
                { id: "eid1354", tween: [ "style", "${_Rectangle4Copy2}", "opacity", '1', { fromValue: '0'}], position: 11380, duration: 74 },
                { id: "eid1355", tween: [ "style", "${_Rectangle4Copy2}", "opacity", '0', { fromValue: '1'}], position: 11600, duration: 34},
                { id: "eid1300", tween: [ "style", "${_RectangleCopy}", "left", '-319px', { fromValue: '-3px'}], position: 3000, duration: 5000 },
                { id: "eid1466", tween: [ "style", "${_RectangleCopy4}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1961", tween: [ "color", "${_RectangleCopy4}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1966", tween: [ "color", "${_Rectangle4Copy3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1361", tween: [ "style", "${_Rectangle4Copy}", "opacity", '1', { fromValue: '0'}], position: 7926, duration: 74 },
                { id: "eid1349", tween: [ "style", "${_Rectangle4Copy}", "opacity", '0', { fromValue: '1'}], position: 8476, duration: 34 },
                { id: "eid1350", tween: [ "style", "${_Rectangle4Copy}", "opacity", '1', { fromValue: '0'}], position: 9380, duration: 74 },
                { id: "eid1351", tween: [ "style", "${_Rectangle4Copy}", "opacity", '0', { fromValue: '1'}], position: 9600, duration: 34 },
                { id: "eid1345", tween: [ "style", "${_RectangleCopy5}", "left", '-319px', { fromValue: '-3px'}], position: 11000, duration: 5000 },
                { id: "eid1299", tween: [ "style", "${_Rectangle}", "left", '-319px', { fromValue: '-3px'}], position: 1000, duration: 5000 },
                { id: "eid1958", tween: [ "color", "${_RectangleCopy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1957", tween: [ "color", "${_Rectangle}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1352", tween: [ "style", "${_Rectangle4Copy2}", "top", '189px', { fromValue: '6px'}], position: 10000, duration: 2000 },
                { id: "eid1964", tween: [ "color", "${_Rectangle4Copy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1356", tween: [ "style", "${_Rectangle4Copy3}", "top", '189px', { fromValue: '6px'}], position: 12000, duration: 2000 },
                { id: "eid1331", tween: [ "style", "${_Rectangle4}", "top", '189px', { fromValue: '6px'}], position: 6000, duration: 2000 },
                { id: "eid1301", tween: [ "style", "${_RectangleCopy2}", "left", '-319px', { fromValue: '-3px'}], position: 5000, duration: 5000 },
                { id: "eid1463", tween: [ "style", "${_RectangleCopy2}", "opacity", '0.0081302121402771', { fromValue: '0.0081302121402771'}], position: 0, duration: 0 },
                { id: "eid1302", tween: [ "style", "${_RectangleCopy3}", "left", '-319px', { fromValue: '-3px'}], position: 7000, duration: 5000 },
                { id: "eid1348", tween: [ "style", "${_Rectangle4Copy}", "top", '189px', { fromValue: '6px'}], position: 8000, duration: 2000 },
                { id: "eid1965", tween: [ "color", "${_Rectangle4Copy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1342", tween: [ "style", "${_RectangleCopy4}", "left", '-319px', { fromValue: '-3px'}], position: 9000, duration: 5000 },
                { id: "eid1367", tween: [ "style", "${_Rectangle4Copy3}", "opacity", '1', { fromValue: '0'}], position: 11926, duration: 74 },
                { id: "eid1357", tween: [ "style", "${_Rectangle4Copy3}", "opacity", '0', { fromValue: '1'}], position: 12764, duration: 39 },
                { id: "eid1358", tween: [ "style", "${_Rectangle4Copy3}", "opacity", '1', { fromValue: '0'}], position: 13804, duration: 74 },
                { id: "eid1359", tween: [ "style", "${_Rectangle4Copy3}", "opacity", '0', { fromValue: '1'}], position: 13600, duration: 34 },
               { id: "eid1960", tween: [ "color", "${_RectangleCopy3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
               { id: "eid1461", tween: [ "style", "${_RectangleCopy}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
               { id: "eid1459", tween: [ "style", "${_Rectangle}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 }           ]
        }
    }
},
"PV2BDISTP": {
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
                    type: 'rect',
                    id: 'RectangleCopy11',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy10',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy9',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy8',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy7',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy6',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy8',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy9',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy10',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy11',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy12',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    type: 'rect',
                    id: 'Rectangle4Copy13',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['-319px', '6px', '6px', '18px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Rectangle4Copy11}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-108px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_RectangleCopy9}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_Rectangle4Copy8}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-108px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_RectangleCopy7}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_Rectangle4Copy12}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-108px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle4Copy13}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-108px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_RectangleCopy8}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_Rectangle4Copy9}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-108px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '16px']
            ],
            "${_Rectangle4Copy10}": [
                ["style", "top", '6px'],
                ["style", "height", '18px'],
                ["style", "opacity", '0'],
                ["style", "left", '-108px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_RectangleCopy6}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy10}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy11}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 15000,
            autoPlay: true,
            labels: {
                "P1": 8073
            },
            timeline: [
                { id: "eid1403", tween: [ "style", "${_RectangleCopy11}", "left", '-319px', { fromValue: '-3px'}], position: 0, duration: 5000 },
                { id: "eid1408", tween: [ "style", "${_Rectangle4Copy9}", "opacity", '1', { fromValue: '0'}], position: 3571, duration: 74 },
                { id: "eid1409", tween: [ "style", "${_Rectangle4Copy9}", "opacity", '0', { fromValue: '1'}], position: 4125, duration: 71 },
           		{ id: "eid1410", tween: [ "style", "${_Rectangle4Copy9}", "opacity", '1', { fromValue: '0'}], position: 4955, duration: 74 },
           		{ id: "eid1411", tween: [ "style", "${_Rectangle4Copy9}", "opacity", '0', { fromValue: '1'}], position: 5265, duration: 73 },
                { id: "eid1397", tween: [ "style", "${_RectangleCopy9}", "left", '-319px', { fromValue: '-3px'}], position: 4000, duration: 5000 },
                { id: "eid1469", tween: [ "style", "${_RectangleCopy7}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1470", tween: [ "style", "${_RectangleCopy7}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1383", tween: [ "style", "${_Rectangle4Copy8}", "top", '189px', { fromValue: '6px'}], position: 1651, duration: 2000 },
                { id: "eid1978", tween: [ "color", "${_Rectangle4Copy13}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1427", tween: [ "style", "${_Rectangle4Copy12}", "top", '189px', { fromValue: '6px'}], position: 9574, duration: 2000 },
                { id: "eid1407", tween: [ "style", "${_Rectangle4Copy9}", "top", '189px', { fromValue: '6px'}], position: 3645, duration: 2000 },
                { id: "eid1413", tween: [ "style", "${_Rectangle4Copy10}", "opacity", '1', { fromValue: '0'}], position: 5577, duration: 74 },
                { id: "eid1414", tween: [ "style", "${_Rectangle4Copy10}", "opacity", '0', { fromValue: '1'}], position: 6091, duration: 71 },
                { id: "eid1415", tween: [ "style", "${_Rectangle4Copy10}", "opacity", '1', { fromValue: '0'}], position: 6951, duration: 74 },
                { id: "eid1416", tween: [ "style", "${_Rectangle4Copy10}", "opacity", '0', { fromValue: '1'}], position: 7271, duration: 73 },
                { id: "eid1384", tween: [ "style", "${_Rectangle4Copy8}", "opacity", '1', { fromValue: '0'}], position: 1577, duration: 74 },
                { id: "eid1385", tween: [ "style", "${_Rectangle4Copy8}", "opacity", '0', { fromValue: '1'}], position: 2131, duration: 71 },
         		{ id: "eid1386", tween: [ "style", "${_Rectangle4Copy8}", "opacity", '1', { fromValue: '0'}], position: 3001, duration: 74 },
         		{ id: "eid1387", tween: [ "style", "${_Rectangle4Copy8}", "opacity", '0', { fromValue: '1'}], position: 3271, duration: 73 },
                { id: "eid1412", tween: [ "style", "${_Rectangle4Copy10}", "top", '189px', { fromValue: '6px'}], position: 5651, duration: 2000 },
                { id: "eid1391", tween: [ "style", "${_RectangleCopy7}", "left", '-319px', { fromValue: '-3px'}], position: 8000, duration: 5000 },
                { id: "eid1974", tween: [ "color", "${_Rectangle4Copy9}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1972", tween: [ "color", "${_RectangleCopy6}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1394", tween: [ "style", "${_RectangleCopy8}", "left", '-319px', { fromValue: '-3px'}], position: 6000, duration: 5000 },
                { id: "eid1973", tween: [ "color", "${_Rectangle4Copy8}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1473", tween: [ "style", "${_RectangleCopy9}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1474", tween: [ "style", "${_RectangleCopy9}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1388", tween: [ "style", "${_RectangleCopy6}", "left", '-319px', { fromValue: '-3px'}], position: 10000, duration: 5000 },
   				{ id: "eid1471", tween: [ "style", "${_RectangleCopy8}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
        		{ id: "eid1472", tween: [ "style", "${_RectangleCopy8}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1400", tween: [ "style", "${_RectangleCopy10}", "left", '-319px', { fromValue: '-3px'}], position: 2000, duration: 5000 },
                { id: "eid1968", tween: [ "color", "${_RectangleCopy10}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1970", tween: [ "color", "${_RectangleCopy8}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1477", tween: [ "style", "${_RectangleCopy11}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1478", tween: [ "style", "${_RectangleCopy11}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1971", tween: [ "color", "${_RectangleCopy7}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1969", tween: [ "color", "${_RectangleCopy9}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
               { id: "eid1433", tween: [ "style", "${_Rectangle4Copy13}", "opacity", '1', { fromValue: '0'}], position: 11500, duration: 74 },
                { id: "eid1434", tween: [ "style", "${_Rectangle4Copy13}", "opacity", '0', { fromValue: '1'}], position: 12024, duration: 71 },
                { id: "eid1435", tween: [ "style", "${_Rectangle4Copy13}", "opacity", '1', { fromValue: '0'}], position: 13074, duration: 74 },
                { id: "eid1436", tween: [ "style", "${_Rectangle4Copy13}", "opacity", '0', { fromValue: '1'}], position: 13574, duration: 73 },
                { id: "eid1976", tween: [ "color", "${_Rectangle4Copy11}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
               	{ id: "eid1975", tween: [ "color", "${_Rectangle4Copy10}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1977", tween: [ "color", "${_Rectangle4Copy12}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1432", tween: [ "style", "${_Rectangle4Copy13}", "top", '189px', { fromValue: '6px'}], position: 11574, duration: 2000 },
                { id: "eid1967", tween: [ "color", "${_RectangleCopy11}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1417", tween: [ "style", "${_Rectangle4Copy11}", "top", '189px', { fromValue: '6px'}], position: 7636, duration: 2000 },
                { id: "eid1418", tween: [ "style", "${_Rectangle4Copy11}", "opacity", '1', { fromValue: '0'}], position: 7562, duration: 74 },
                { id: "eid1419", tween: [ "style", "${_Rectangle4Copy11}", "opacity", '0', { fromValue: '1'}], position: 8086, duration: 71 },
                { id: "eid1420", tween: [ "style", "${_Rectangle4Copy11}", "opacity", '1', { fromValue: '0'}], position: 8986, duration: 74 },
                { id: "eid1421", tween: [ "style", "${_Rectangle4Copy11}", "opacity", '0', { fromValue: '1'}], position: 9256, duration: 73 },
                { id: "eid1475", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1476", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1467", tween: [ "style", "${_RectangleCopy6}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1428", tween: [ "style", "${_Rectangle4Copy12}", "opacity", '1', { fromValue: '0'}], position: 9500, duration: 74 },
                { id: "eid1429", tween: [ "style", "${_Rectangle4Copy12}", "opacity", '0', { fromValue: '1'}], position: 10024, duration: 71 },
                { id: "eid1430", tween: [ "style", "${_Rectangle4Copy12}", "opacity", '1', { fromValue: '0'}], position: 10924, duration: 74 },
                { id: "eid1431", tween: [ "style", "${_Rectangle4Copy12}", "opacity", '0', { fromValue: '1'}], position: 11194, duration: 73 }]
        }
    }
},
"Toload3": {
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
                    rect: ['0px', '0px', '6px', '20px', 'auto', 'auto'],
                    id: 'RectangleCopy7',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy6',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy5',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy2',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '438px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy6}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '15px']
            ],
            "${_RectangleCopy7}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '6px']
            ],
            "${_RectangleCopy2}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '438px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy5}": [
                ["style", "top", '41px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '5px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '20px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8000,
            autoPlay: true,
            labels: {
                "P1": 5000
            },
         timeline: [
                { id: "eid1647", tween: [ "style", "${_RectangleCopy5}", "opacity", '1', { fromValue: '0'}], position: 7500, duration: 54 },
                { id: "eid1648", tween: [ "style", "${_RectangleCopy5}", "opacity", '0', { fromValue: '1'}], position: 7642, duration: 24 },
                { id: "eid1917", tween: [ "color", "${_RectangleCopy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 5000, duration: 0 },
                { id: "eid1639", tween: [ "style", "${_RectangleCopy2}", "left", '762px', { fromValue: '438px'}], position: 3137, duration: 3000 },
                { id: "eid1640", tween: [ "style", "${_RectangleCopy2}", "opacity", '1', { fromValue: '0'}], position: 4616, duration: 37 },
                { id: "eid1641", tween: [ "style", "${_RectangleCopy2}", "opacity", '0', { fromValue: '1'}], position: 5817, duration: 38 },
                { id: "eid1650", tween: [ "style", "${_RectangleCopy6}", "opacity", '1', { fromValue: '0'}], position: 6463, duration: 37 },
                { id: "eid1651", tween: [ "style", "${_RectangleCopy6}", "opacity", '0', { fromValue: '1'}], position: 7642, duration: 38 },
                { id: "eid1636", tween: [ "style", "${_RectangleCopy}", "left", '762px', { fromValue: '438px'}], position: 4000, duration: 3000 },
                { id: "eid1646", tween: [ "style", "${_RectangleCopy5}", "left", '654px', { fromValue: '6px'}], position: 2000, duration: 6000 },
                { id: "eid1918", tween: [ "color", "${_RectangleCopy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 6000, duration: 0 },
                { id: "eid1919", tween: [ "color", "${_RectangleCopy6}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 7000, duration: 0 },
                { id: "eid1649", tween: [ "style", "${_RectangleCopy6}", "left", '762px', { fromValue: '6px'}], position: 1000, duration: 7000 },
                { id: "eid1637", tween: [ "style", "${_RectangleCopy}", "opacity", '1', { fromValue: '0'}], position: 5471, duration: 37 },
                { id: "eid1638", tween: [ "style", "${_RectangleCopy}", "opacity", '0', { fromValue: '1'}], position: 6680, duration: 38 },
                { id: "eid1920", tween: [ "color", "${_RectangleCopy5}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 7962, duration: 0 }            ]
        }
    }
},
"pv2BDI1": {
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
                    type: 'rect',
                    id: 'RectangleCopy13',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy12',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy11',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy10',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy9',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy8',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy8}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy12}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy9}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy13}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '19px']
            ],
            "${_RectangleCopy10}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy11}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 15000,
            autoPlay: true,
            labels: {
                "P1": 8073
            },
            timeline: [
                { id: "eid1709", tween: [ "style", "${_RectangleCopy11}", "left", '-319px', { fromValue: '-3px'}], position: 4000, duration: 5000 },
                { id: "eid1715", tween: [ "style", "${_RectangleCopy13}", "left", '-319px', { fromValue: '-3px'}], position: 0, duration: 5000 },
                { id: "eid1703", tween: [ "style", "${_RectangleCopy9}", "left", '-319px', { fromValue: '-3px'}], position: 8000, duration: 5000 },
                { id: "eid1712", tween: [ "style", "${_RectangleCopy12}", "left", '-319px', { fromValue: '-3px'}], position: 2000, duration: 5000 },
                { id: "eid1701", tween: [ "style", "${_RectangleCopy8}", "left", '-319px', { fromValue: '-3px'}], position: 10000, duration: 5000 },
                { id: "eid1713", tween: [ "style", "${_RectangleCopy12}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1714", tween: [ "style", "${_RectangleCopy12}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1725", tween: [ "style", "${_RectangleCopy12}", "opacity", '1', { fromValue: '0'}], position: 1972, duration: 28 },
                { id: "eid1728", tween: [ "style", "${_RectangleCopy12}", "opacity", '0', { fromValue: '1'}], position: 3916, duration: 50 },
                { id: "eid1704", tween: [ "style", "${_RectangleCopy9}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1705", tween: [ "style", "${_RectangleCopy9}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1735", tween: [ "style", "${_RectangleCopy9}", "opacity", '1', { fromValue: '0'}], position: 7957, duration: 37 },
                { id: "eid1736", tween: [ "style", "${_RectangleCopy9}", "opacity", '0', { fromValue: '1'}], position: 9913, duration: 50 },
                { id: "eid1702", tween: [ "style", "${_RectangleCopy8}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1737", tween: [ "style", "${_RectangleCopy8}", "opacity", '1', { fromValue: '0'}], position: 9963, duration: 37 },
                { id: "eid1738", tween: [ "style", "${_RectangleCopy8}", "opacity", '0', { fromValue: '1'}], position: 11894, duration: 50 },
                { id: "eid1710", tween: [ "style", "${_RectangleCopy11}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1711", tween: [ "style", "${_RectangleCopy11}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1731", tween: [ "style", "${_RectangleCopy11}", "opacity", '1', { fromValue: '0'}], position: 3966, duration: 37 },
                { id: "eid1732", tween: [ "style", "${_RectangleCopy11}", "opacity", '0', { fromValue: '1'}], position: 5922, duration: 50 },
                { id: "eid1706", tween: [ "style", "${_RectangleCopy10}", "left", '-319px', { fromValue: '-3px'}], position: 6000, duration: 5000 },
                { id: "eid1984", tween: [ "color", "${_RectangleCopy8}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1982", tween: [ "color", "${_RectangleCopy10}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1739", tween: [ "style", "${_RectangleCopy13}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 28 },
                { id: "eid1722", tween: [ "style", "${_RectangleCopy13}", "opacity", '0', { fromValue: '1'}], position: 1899, duration: 35 },
                { id: "eid1983", tween: [ "color", "${_RectangleCopy9}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1981", tween: [ "color", "${_RectangleCopy11}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1707", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1708", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1733", tween: [ "style", "${_RectangleCopy10}", "opacity", '1', { fromValue: '0'}], position: 5972, duration: 37 },
                { id: "eid1734", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '1'}], position: 7907, duration: 50 },
                { id: "eid1980", tween: [ "color", "${_RectangleCopy12}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1979", tween: [ "color", "${_RectangleCopy13}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 }            ]
        }
    }
},
"PV2BDI2": {
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
                    type: 'rect',
                    id: 'RectangleCopy19',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy18',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy17',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy16',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy15',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy14',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy15}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy16}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '16px']
            ],
            "${_RectangleCopy18}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy19}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy17}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy14}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 15000,
            autoPlay: true,
            labels: {
                "P1": 8073
            },
            timeline: [
                { id: "eid1754", tween: [ "style", "${_RectangleCopy17}", "left", '-319px', { fromValue: '-3px'}], position: 4000, duration: 5000 },
                { id: "eid1765", tween: [ "style", "${_RectangleCopy19}", "opacity", '1', { fromValue: '0'}], position: 1913, duration: 28 },
                { id: "eid1766", tween: [ "style", "${_RectangleCopy19}", "opacity", '0', { fromValue: '1'}], position: 5000, duration: 35 },
                { id: "eid1744", tween: [ "style", "${_RectangleCopy15}", "left", '-319px', { fromValue: '-3px'}], position: 8000, duration: 5000 },
                { id: "eid1755", tween: [ "style", "${_RectangleCopy17}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1756", tween: [ "style", "${_RectangleCopy17}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1757", tween: [ "style", "${_RectangleCopy17}", "opacity", '1', { fromValue: '0'}], position: 5910, duration: 37 },
                { id: "eid1758", tween: [ "style", "${_RectangleCopy17}", "opacity", '0', { fromValue: '1'}], position: 9000, duration: 50 },
                { id: "eid1740", tween: [ "style", "${_RectangleCopy14}", "left", '-319px', { fromValue: '-3px'}], position: 10000, duration: 5000 },
                { id: "eid1760", tween: [ "style", "${_RectangleCopy18}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1761", tween: [ "style", "${_RectangleCopy18}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1762", tween: [ "style", "${_RectangleCopy18}", "opacity", '1', { fromValue: '0'}], position: 3922, duration: 28 },
                { id: "eid1763", tween: [ "style", "${_RectangleCopy18}", "opacity", '0', { fromValue: '1'}], position: 7000, duration: 50 },
                { id: "eid1741", tween: [ "style", "${_RectangleCopy14}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1742", tween: [ "style", "${_RectangleCopy14}", "opacity", '1', { fromValue: '0'}], position: 11909, duration: 37 },
                { id: "eid1743", tween: [ "style", "${_RectangleCopy14}", "opacity", '0', { fromValue: '1'}], position: 14971, duration: 29 },
                { id: "eid1745", tween: [ "style", "${_RectangleCopy15}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1746", tween: [ "style", "${_RectangleCopy15}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1747", tween: [ "style", "${_RectangleCopy15}", "opacity", '1', { fromValue: '0'}], position: 9940, duration: 23 },
                { id: "eid1748", tween: [ "style", "${_RectangleCopy15}", "opacity", '0', { fromValue: '1'}], position: 13000, duration: 50 },
                { id: "eid1749", tween: [ "style", "${_RectangleCopy16}", "left", '-319px', { fromValue: '-3px'}], position: 6000, duration: 5000 },
                { id: "eid1943", tween: [ "color", "${_RectangleCopy19}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1759", tween: [ "style", "${_RectangleCopy18}", "left", '-319px', { fromValue: '-3px'}], position: 2000, duration: 5000 },
                { id: "eid1750", tween: [ "style", "${_RectangleCopy16}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1751", tween: [ "style", "${_RectangleCopy16}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1752", tween: [ "style", "${_RectangleCopy16}", "opacity", '1', { fromValue: '0'}], position: 7905, duration: 37 },
                { id: "eid1753", tween: [ "style", "${_RectangleCopy16}", "opacity", '0', { fromValue: '1'}], position: 11000, duration: 44 },
                { id: "eid1764", tween: [ "style", "${_RectangleCopy19}", "left", '-319px', { fromValue: '-3px'}], position: 0, duration: 5000 },
                { id: "eid1944", tween: [ "color", "${_RectangleCopy18}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1945", tween: [ "color", "${_RectangleCopy17}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1947", tween: [ "color", "${_RectangleCopy15}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1946", tween: [ "color", "${_RectangleCopy16}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1948", tween: [ "color", "${_RectangleCopy14}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 }            ]
        }
    }
},
"Slave2batt": {
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
                    type: 'rect',
                    id: 'RectangleCopy19',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy18',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy17',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy16',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy15',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    type: 'rect',
                    id: 'RectangleCopy14',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['6px', '41px', '20px', '5px', 'auto', 'auto'],
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy15}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy16}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '20px']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy18}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy19}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy17}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '20px']
            ],
            "${_RectangleCopy14}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '20px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 15000,
            autoPlay: true,
            labels: {
                "P1": 8073
            },
            timeline: [
                { id: "eid1754", tween: [ "style", "${_RectangleCopy17}", "left", '-343px', { fromValue: '-3px'}], position: 4000, duration: 5000 },
        		{ id: "eid1765", tween: [ "style", "${_RectangleCopy19}", "opacity", '1', { fromValue: '0'}], position: 1813, duration: 28 },
                { id: "eid1766", tween: [ "style", "${_RectangleCopy19}", "opacity", '0', { fromValue: '1'}], position: 5000, duration: 35 },
                { id: "eid1744", tween: [ "style", "${_RectangleCopy15}", "left", '-343px', { fromValue: '-3px'}], position: 8000, duration: 5000 },
                { id: "eid1755", tween: [ "style", "${_RectangleCopy17}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1756", tween: [ "style", "${_RectangleCopy17}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1757", tween: [ "style", "${_RectangleCopy17}", "opacity", '1', { fromValue: '0'}], position: 5910, duration: 37 },
                { id: "eid1758", tween: [ "style", "${_RectangleCopy17}", "opacity", '0', { fromValue: '1'}], position: 9000, duration: 50 },
                { id: "eid1740", tween: [ "style", "${_RectangleCopy14}", "left", '-343px', { fromValue: '-3px'}], position: 10000, duration: 5000 },
                { id: "eid1760", tween: [ "style", "${_RectangleCopy18}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1761", tween: [ "style", "${_RectangleCopy18}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1762", tween: [ "style", "${_RectangleCopy18}", "opacity", '1', { fromValue: '0'}], position: 3922, duration: 28 },
                { id: "eid1763", tween: [ "style", "${_RectangleCopy18}", "opacity", '0', { fromValue: '1'}], position: 7000, duration: 50 },
                { id: "eid1741", tween: [ "style", "${_RectangleCopy14}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1742", tween: [ "style", "${_RectangleCopy14}", "opacity", '1', { fromValue: '0'}], position: 11909, duration: 37 },
                { id: "eid1743", tween: [ "style", "${_RectangleCopy14}", "opacity", '0', { fromValue: '1'}], position: 14971, duration: 29 },
                { id: "eid1745", tween: [ "style", "${_RectangleCopy15}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1746", tween: [ "style", "${_RectangleCopy15}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1747", tween: [ "style", "${_RectangleCopy15}", "opacity", '1', { fromValue: '0'}], position: 9940, duration: 23 },
                { id: "eid1748", tween: [ "style", "${_RectangleCopy15}", "opacity", '0', { fromValue: '1'}], position: 13000, duration: 50 },
                { id: "eid1749", tween: [ "style", "${_RectangleCopy16}", "left", '-343px', { fromValue: '-3px'}], position: 6000, duration: 5000 },
                { id: "eid1943", tween: [ "color", "${_RectangleCopy19}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1759", tween: [ "style", "${_RectangleCopy18}", "left", '-343px', { fromValue: '-3px'}], position: 2000, duration: 5000 },
                { id: "eid1750", tween: [ "style", "${_RectangleCopy16}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid1751", tween: [ "style", "${_RectangleCopy16}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid1752", tween: [ "style", "${_RectangleCopy16}", "opacity", '1', { fromValue: '0'}], position: 7905, duration: 37 },
                { id: "eid1753", tween: [ "style", "${_RectangleCopy16}", "opacity", '0', { fromValue: '1'}], position: 11000, duration: 44 },
                { id: "eid1764", tween: [ "style", "${_RectangleCopy19}", "left", '-343px', { fromValue: '-3px'}], position: 0, duration: 5000 },
                { id: "eid1944", tween: [ "color", "${_RectangleCopy18}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1945", tween: [ "color", "${_RectangleCopy17}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1947", tween: [ "color", "${_RectangleCopy15}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1946", tween: [ "color", "${_RectangleCopy16}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1948", tween: [ "color", "${_RectangleCopy14}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 }]
        }
    }
},
"nodex_in1": {
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
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['6px', '266px', '16px', '6px', 'auto', 'auto'],
                    id: 'Rectangle3',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy2',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy3',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy4',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy5',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy6',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Rectangle2Copy4}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy3}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle3}": [
                ["style", "top", '266px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy2}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy5}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${symbolSelector}": [
                ["style", "height", '16px'],
                ["style", "width", '6px']
            ],
            "${_Rectangle2Copy6}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 15046,
            autoPlay: true,
            labels: {
                "P1": 7500
            },
            timeline: [

                { id: "eid1781", tween: [ "style", "${_Rectangle2Copy4}", "opacity", '1', { fromValue: '0'}], position: 8143, duration: 28 },
                { id: "eid1793", tween: [ "style", "${_Rectangle2Copy4}", "opacity", '0', { fromValue: '1'}], position: 12000, duration: 18 },
                { id: "eid1796", tween: [ "style", "${_Rectangle3}", "opacity", '1', { fromValue: '0'}], position: 5972, duration: 28 },
                { id: "eid1795", tween: [ "style", "${_Rectangle3}", "opacity", '0', { fromValue: '1'}], position: 7000, duration: 18 },
                { id: "eid1798", tween: [ "style", "${_Rectangle3}", "opacity", '1', { fromValue: '0'}], position: 7500, duration: 28 },
                { id: "eid1799", tween: [ "style", "${_Rectangle3}", "opacity", '0', { fromValue: '1'}], position: 8528, duration: 18 },
                { id: "eid1810", tween: [ "style", "${_Rectangle3}", "opacity", '1', { fromValue: '0'}], position: 9000, duration: 28 },
                { id: "eid1811", tween: [ "style", "${_Rectangle3}", "opacity", '0', { fromValue: '1'}], position: 10028, duration: 18 },
                { id: "eid1783", tween: [ "style", "${_Rectangle2Copy}", "opacity", '1', { fromValue: '0'}], position: 3628, duration: 28 },
                { id: "eid1790", tween: [ "style", "${_Rectangle2Copy}", "opacity", '0', { fromValue: '1'}], position: 7500, duration: 18 },
                { id: "eid1804", tween: [ "style", "${_Rectangle2Copy6}", "opacity", '1', { fromValue: '0'}], position: 11158, duration: 28 },
                { id: "eid1805", tween: [ "style", "${_Rectangle2Copy6}", "opacity", '0', { fromValue: '1'}], position: 15028, duration: 18 },
                { id: "eid1800", tween: [ "style", "${_Rectangle2Copy5}", "top", '256px', { fromValue: '0px'}], position: 7528, duration: 6000 },
                { id: "eid1785", tween: [ "style", "${_Rectangle2Copy2}", "opacity", '1', { fromValue: '0'}], position: 5136, duration: 28 },
                { id: "eid1791", tween: [ "style", "${_Rectangle2Copy2}", "opacity", '0', { fromValue: '1'}], position: 9000, duration: 18 },
                { id: "eid1778", tween: [ "style", "${_Rectangle2Copy4}", "top", '256px', { fromValue: '0px'}], position: 6000, duration: 6000 },
                { id: "eid1774", tween: [ "style", "${_Rectangle3}", "left", '40px', { fromValue: '6px'}], position: 6000, duration: 1000 },
                { id: "eid1812", tween: [ "style", "${_Rectangle3}", "left", '6px', { fromValue: '40px'}], position: 7000, duration: 528 },
                { id: "eid1797", tween: [ "style", "${_Rectangle3}", "left", '40px', { fromValue: '6px'}], position: 7528, duration: 1000 },
                { id: "eid1813", tween: [ "style", "${_Rectangle3}", "left", '6px', { fromValue: '40px'}], position: 8528, duration: 500 },
                { id: "eid1809", tween: [ "style", "${_Rectangle3}", "left", '40px', { fromValue: '6px'}], position: 9028, duration: 1000 },
                { id: "eid1956", tween: [ "color", "${_Rectangle2Copy6}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1955", tween: [ "color", "${_Rectangle2Copy5}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1786", tween: [ "style", "${_Rectangle2Copy3}", "opacity", '1', { fromValue: '0'}], position: 6631, duration: 28 },
                { id: "eid1792", tween: [ "style", "${_Rectangle2Copy3}", "opacity", '0', { fromValue: '1'}], position: 10500, duration: 18 },
                { id: "eid1950", tween: [ "color", "${_Rectangle3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1954", tween: [ "color", "${_Rectangle2Copy4}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1776", tween: [ "style", "${_Rectangle2Copy2}", "top", '256px', { fromValue: '0px'}], position: 3000, duration: 6000 },
                { id: "eid1801", tween: [ "style", "${_Rectangle2Copy5}", "opacity", '1', { fromValue: '0'}], position: 9660, duration: 28 },
                { id: "eid1802", tween: [ "style", "${_Rectangle2Copy5}", "opacity", '0', { fromValue: '1'}], position: 13528, duration: 18 },
                { id: "eid1771", tween: [ "style", "${_Rectangle2}", "top", '256px', { fromValue: '0px'}], position: 0, duration: 6000 },
                { id: "eid1777", tween: [ "style", "${_Rectangle2Copy3}", "top", '256px', { fromValue: '0px'}], position: 4500, duration: 6000 },
                { id: "eid1953", tween: [ "color", "${_Rectangle2Copy3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1803", tween: [ "style", "${_Rectangle2Copy6}", "top", '256px', { fromValue: '0px'}], position: 9028, duration: 6000 },
                { id: "eid1952", tween: [ "color", "${_Rectangle2Copy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1782", tween: [ "style", "${_Rectangle2}", "opacity", '1', { fromValue: '0'}], position: 2138, duration: 28 },
                { id: "eid1789", tween: [ "style", "${_Rectangle2}", "opacity", '0', { fromValue: '1'}], position: 6000, duration: 18 },
                { id: "eid1775", tween: [ "style", "${_Rectangle2Copy}", "top", '256px', { fromValue: '0px'}], position: 1500, duration: 6000 },
                { id: "eid1951", tween: [ "color", "${_Rectangle2Copy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid1949", tween: [ "color", "${_Rectangle2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 }            ]
        }
    }
},
"nodex_in2": {
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
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy20',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy19',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy18',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy17',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy16',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy15',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['0px', '0px', '6px', '16px', 'auto', 'auto'],
                    id: 'Rectangle2Copy14',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Rectangle2Copy14}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy20}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy15}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${symbolSelector}": [
                ["style", "height", '16px'],
                ["style", "width", '6px']
            ],
            "${_Rectangle2Copy17}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy19}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy18}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_Rectangle2Copy16}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 15028,
            autoPlay: true,
            labels: {
                "P1": 7500
            },
            timeline: [
                { id: "eid1875", tween: [ "style", "${_Rectangle2Copy20}", "top", '256px', { fromValue: '0px'}], position: 0, duration: 6000 },
                { id: "eid1856", tween: [ "style", "${_Rectangle2Copy17}", "opacity", '1', { fromValue: '0'}], position: 4472, duration: 28 },
                { id: "eid1857", tween: [ "style", "${_Rectangle2Copy17}", "opacity", '0', { fromValue: '1'}], position: 6750, duration: 18 },
                { id: "eid1855", tween: [ "style", "${_Rectangle2Copy17}", "top", '256px', { fromValue: '0px'}], position: 4500, duration: 6000 },
                { id: "eid1852", tween: [ "style", "${_Rectangle2Copy16}", "top", '256px', { fromValue: '0px'}], position: 6000, duration: 6000 },
                { id: "eid1937", tween: [ "color", "${_Rectangle2Copy19}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1000, duration: 0 },
                { id: "eid1861", tween: [ "style", "${_Rectangle2Copy19}", "top", '256px', { fromValue: '0px'}], position: 1500, duration: 6000 },
                { id: "eid1849", tween: [ "style", "${_Rectangle2Copy15}", "top", '256px', { fromValue: '0px'}], position: 7528, duration: 6000 },
                { id: "eid1859", tween: [ "style", "${_Rectangle2Copy18}", "opacity", '1', { fromValue: '0'}], position: 2972, duration: 28 },
                { id: "eid1860", tween: [ "style", "${_Rectangle2Copy18}", "opacity", '0', { fromValue: '1'}], position: 5250, duration: 18 },
                { id: "eid1858", tween: [ "style", "${_Rectangle2Copy18}", "top", '256px', { fromValue: '0px'}], position: 3000, duration: 6000 },
                { id: "eid1862", tween: [ "style", "${_Rectangle2Copy19}", "opacity", '1', { fromValue: '0'}], position: 1472, duration: 28 },
                { id: "eid1863", tween: [ "style", "${_Rectangle2Copy19}", "opacity", '0', { fromValue: '1'}], position: 3750, duration: 18 },
                { id: "eid1876", tween: [ "style", "${_Rectangle2Copy20}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 28 },
                { id: "eid1877", tween: [ "style", "${_Rectangle2Copy20}", "opacity", '0', { fromValue: '1'}], position: 2250, duration: 18 },
                { id: "eid1939", tween: [ "color", "${_Rectangle2Copy17}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1000, duration: 0 },
                { id: "eid1847", tween: [ "style", "${_Rectangle2Copy14}", "opacity", '1', { fromValue: '0'}], position: 9000, duration: 28 },
                { id: "eid1848", tween: [ "style", "${_Rectangle2Copy14}", "opacity", '0', { fromValue: '1'}], position: 11250, duration: 18 },
                { id: "eid1850", tween: [ "style", "${_Rectangle2Copy15}", "opacity", '1', { fromValue: '0'}], position: 7500, duration: 28 },
                { id: "eid1851", tween: [ "style", "${_Rectangle2Copy15}", "opacity", '0', { fromValue: '1'}], position: 9750, duration: 18 },
                { id: "eid1942", tween: [ "color", "${_Rectangle2Copy14}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1000, duration: 0 },
                { id: "eid1846", tween: [ "style", "${_Rectangle2Copy14}", "top", '256px', { fromValue: '0px'}], position: 9028, duration: 6000 },
                { id: "eid1938", tween: [ "color", "${_Rectangle2Copy18}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1000, duration: 0 },
                { id: "eid1853", tween: [ "style", "${_Rectangle2Copy16}", "opacity", '1', { fromValue: '0'}], position: 5972, duration: 28 },
                { id: "eid1854", tween: [ "style", "${_Rectangle2Copy16}", "opacity", '0', { fromValue: '1'}], position: 8250, duration: 18 },
                { id: "eid1940", tween: [ "color", "${_Rectangle2Copy16}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1000, duration: 0 },
                { id: "eid1936", tween: [ "color", "${_Rectangle2Copy20}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1000, duration: 0 },
                { id: "eid1941", tween: [ "color", "${_Rectangle2Copy15}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 1000, duration: 0 }            ]
        }
    }
},
"nodex_in2_2": {
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

                    type: 'rect',
                    id: 'Rectangle5',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    rect: ['0px', '0px', '16px', '6px', 'auto', 'auto'],
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Rectangle5}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '16px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 5250,
            autoPlay: true,
            labels: {
                "P1": 2250
            },
            timeline: [
                { id: "eid1880", tween: [ "style", "${_Rectangle5}", "left", '34px', { fromValue: '0px'}], position: 2250, duration: 1000 },
                { id: "eid1891", tween: [ "style", "${_Rectangle5}", "left", '0px', { fromValue: '34px'}], position: 3250, duration: 500 },
                { id: "eid1881", tween: [ "style", "${_Rectangle5}", "left", '34px', { fromValue: '0px'}], position: 3750, duration: 1000 },
                { id: "eid1884", tween: [ "style", "${_Rectangle5}", "opacity", '1', { fromValue: '0'}], position: 2196, duration: 54 },
                { id: "eid1888", tween: [ "style", "${_Rectangle5}", "opacity", '0', { fromValue: '1'}], position: 3250, duration: 31 },
                { id: "eid1885", tween: [ "style", "${_Rectangle5}", "opacity", '1', { fromValue: '0'}], position: 3750, duration: 54 },
                { id: "eid1890", tween: [ "style", "${_Rectangle5}", "opacity", '0', { fromValue: '1'}], position: 4750, duration: 31 },
                { id: "eid1985", tween: [ "color", "${_Rectangle5}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 }            ]
        }
    }
},
"nodex11": {
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
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    id: 'Nodex1Copy3',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    id: 'Nodex1Copy2',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                },
                {
                    rect: ['-40px', '-16px', '6px', '16px', 'auto', 'auto'],
                    id: 'Nodex1Copy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(17,17,237,1)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Nodex1Copy}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${_Nodex1Copy3}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${_Nodex1Copy2}": [
                ["style", "top", '-16px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '16px'],
                ["style", "opacity", '0'],
                ["style", "left", '-40px'],
                ["style", "width", '6px']
            ],
            "${symbolSelector}": [
                ["style", "height", '6px'],
                ["style", "width", '37px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 8046,
            autoPlay: true,
            labels: {
                "P1": 4000
            },
            timeline: [
                { id: "eid1993", tween: [ "style", "${_Nodex1Copy}", "opacity", '1', { fromValue: '0'}], position: 7952, duration: 48 },
                { id: "eid1994", tween: [ "style", "${_Nodex1Copy}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 46 },
                { id: "eid1995", tween: [ "color", "${_Nodex1Copy}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 },
                { id: "eid1999", tween: [ "color", "${_Nodex1Copy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 },
                { id: "eid2003", tween: [ "color", "${_Nodex1Copy3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 750, duration: 0 },
                { id: "eid1996", tween: [ "style", "${_Nodex1Copy2}", "top", '-265px', { fromValue: '-16px'}], position: 3000, duration: 5000 },
                { id: "eid1992", tween: [ "style", "${_Nodex1Copy}", "top", '-165px', { fromValue: '-16px'}], position: 5000, duration: 3000 },
                { id: "eid2000", tween: [ "style", "${_Nodex1Copy3}", "top", '-265px', { fromValue: '-16px'}], position: 1000, duration: 5000 },
                { id: "eid2001", tween: [ "style", "${_Nodex1Copy3}", "opacity", '1', { fromValue: '0'}], position: 4095, duration: 43 },
                { id: "eid2002", tween: [ "style", "${_Nodex1Copy3}", "opacity", '0', { fromValue: '1'}], position: 6003, duration: 48 },
                { id: "eid1997", tween: [ "style", "${_Nodex1Copy2}", "opacity", '1', { fromValue: '0'}], position: 6051, duration: 40 },
                { id: "eid1998", tween: [ "style", "${_Nodex1Copy2}", "opacity", '0', { fromValue: '1'}], position: 8000, duration: 46 }            ]
        }
    }
},
"nodex2batt": {
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
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy12',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy11',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy10',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy9',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy8',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '41px', '18px', '5px', 'auto', 'auto'],
                    id: 'RectangleCopy7',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_RectangleCopy8}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy12}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy9}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${symbolSelector}": [
                ["style", "height", '5px'],
                ["style", "width", '16px']
            ],
            "${_RectangleCopy7}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy10}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ],
            "${_RectangleCopy11}": [
                ["style", "top", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-3px'],
                ["style", "width", '18px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 15000,
            autoPlay: true,
            labels: {
                "P1": 8073
            },
            timeline: [
                { id: "eid2085", tween: [ "style", "${_RectangleCopy11}", "left", '-319px', { fromValue: '-3px'}], position: 2000, duration: 5000 },
                { id: "eid2073", tween: [ "style", "${_RectangleCopy9}", "left", '-319px', { fromValue: '-3px'}], position: 6000, duration: 5000 },
                { id: "eid2058", tween: [ "style", "${_RectangleCopy7}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid2059", tween: [ "style", "${_RectangleCopy7}", "opacity", '1', { fromValue: '0'}], position: 9963, duration: 37 },
                { id: "eid2060", tween: [ "style", "${_RectangleCopy7}", "opacity", '0', { fromValue: '1'}], position: 13641, duration: 50 },
                { id: "eid2062", tween: [ "color", "${_RectangleCopy8}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid2067", tween: [ "style", "${_RectangleCopy8}", "left", '-319px', { fromValue: '-3px'}], position: 8000, duration: 5000 },
                { id: "eid2087", tween: [ "style", "${_RectangleCopy12}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 28 },
                { id: "eid2088", tween: [ "style", "${_RectangleCopy12}", "opacity", '0', { fromValue: '1'}], position: 3750, duration: 35 },
                { id: "eid2069", tween: [ "style", "${_RectangleCopy9}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid2070", tween: [ "style", "${_RectangleCopy9}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid2071", tween: [ "style", "${_RectangleCopy9}", "opacity", '1', { fromValue: '0'}], position: 5972, duration: 37 },
                { id: "eid2072", tween: [ "style", "${_RectangleCopy9}", "opacity", '0', { fromValue: '1'}], position: 9636, duration: 50 },
                { id: "eid2063", tween: [ "style", "${_RectangleCopy8}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid2064", tween: [ "style", "${_RectangleCopy8}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid2065", tween: [ "style", "${_RectangleCopy8}", "opacity", '1', { fromValue: '0'}], position: 7957, duration: 37 },
                { id: "eid2066", tween: [ "style", "${_RectangleCopy8}", "opacity", '0', { fromValue: '1'}], position: 11633, duration: 50 },
                { id: "eid2081", tween: [ "style", "${_RectangleCopy11}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid2082", tween: [ "style", "${_RectangleCopy11}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid2083", tween: [ "style", "${_RectangleCopy11}", "opacity", '1', { fromValue: '0'}], position: 1972, duration: 28 },
                { id: "eid2084", tween: [ "style", "${_RectangleCopy11}", "opacity", '0', { fromValue: '1'}], position: 5631, duration: 50 },
                { id: "eid2086", tween: [ "color", "${_RectangleCopy12}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid2061", tween: [ "style", "${_RectangleCopy7}", "left", '-319px', { fromValue: '-3px'}], position: 10000, duration: 5000 },
                { id: "eid2089", tween: [ "style", "${_RectangleCopy12}", "left", '-319px', { fromValue: '-3px'}], position: 0, duration: 5000 },
                { id: "eid2080", tween: [ "color", "${_RectangleCopy11}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid2057", tween: [ "color", "${_RectangleCopy7}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid2068", tween: [ "color", "${_RectangleCopy9}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 },
                { id: "eid2075", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid2076", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '0'}], position: 79, duration: 0 },
                { id: "eid2077", tween: [ "style", "${_RectangleCopy10}", "opacity", '1', { fromValue: '0'}], position: 3966, duration: 37 },
                { id: "eid2078", tween: [ "style", "${_RectangleCopy10}", "opacity", '0', { fromValue: '1'}], position: 7637, duration: 50 },
                { id: "eid2079", tween: [ "style", "${_RectangleCopy10}", "left", '-319px', { fromValue: '-3px'}], position: 4000, duration: 5000 },
                { id: "eid2074", tween: [ "color", "${_RectangleCopy10}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 0, duration: 0 }            ]
        }
    }
},
"Solar2": {
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
                    rect: ['0px', '0px', '6px', '18px', 'auto', 'auto'],
                    id: 'SolarCopy',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '-23px', '18px', '6px', 'auto', 'auto'],
                    id: 'Solar',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '-23px', '18px', '6px', 'auto', 'auto'],
                    id: 'SolarCopy2',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '-23px', '18px', '6px', 'auto', 'auto'],
                    id: 'SolarCopy3',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                },
                {
                    rect: ['6px', '-23px', '18px', '6px', 'auto', 'auto'],
                    id: 'SolarCopy5',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    type: 'rect',
                    fill: ['rgba(31,116,167,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_SolarCopy}": [
                ["style", "top", '0px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["color", "background-color", 'rgba(31,116,167,1.00)']
            ],
            "${_SolarCopy2}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '-22px'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-12px'],
                ["style", "width", '18px']
            ],
            "${symbolSelector}": [
                ["style", "height", '18px'],
                ["style", "width", '6px']
            ],
            "${_SolarCopy5}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '-22px'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-12px'],
                ["style", "width", '18px']
            ],
            "${_SolarCopy3}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '-22px'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-12px'],
                ["style", "width", '18px']
            ],
            "${_Solar}": [
                ["color", "background-color", 'rgba(31,116,167,1.00)'],
                ["style", "top", '-22px'],
                ["style", "height", '6px'],
                ["style", "opacity", '0'],
                ["style", "left", '-12px'],
                ["style", "width", '18px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 10076,
            autoPlay: true,
            labels: {
                "P2": 2000
            },
            timeline: [
                { id: "eid2123", tween: [ "style", "${_SolarCopy5}", "opacity", '1', { fromValue: '0'}], position: 6500, duration: 38 },
                { id: "eid2124", tween: [ "style", "${_SolarCopy5}", "opacity", '0', { fromValue: '1'}], position: 10038, duration: 38 },
                { id: "eid2103", tween: [ "style", "${_Solar}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 38 },
                { id: "eid2104", tween: [ "style", "${_Solar}", "opacity", '0', { fromValue: '1'}], position: 3538, duration: 38 },
                { id: "eid2125", tween: [ "style", "${_SolarCopy5}", "left", '-220px', { fromValue: '-12px'}], position: 6538, duration: 3500 },
                { id: "eid2112", tween: [ "color", "${_SolarCopy3}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 4788, duration: 0 },
                { id: "eid2105", tween: [ "style", "${_Solar}", "left", '-220px', { fromValue: '-12px'}], position: 38, duration: 3500 },
                { id: "eid2126", tween: [ "style", "${_SolarCopy5}", "top", '-22px', { fromValue: '-22px'}], position: 10038, duration: 0 },
                { id: "eid2107", tween: [ "color", "${_SolarCopy2}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 2788, duration: 0 },
                { id: "eid2113", tween: [ "style", "${_SolarCopy3}", "opacity", '1', { fromValue: '0'}], position: 4500, duration: 38 },
                { id: "eid2114", tween: [ "style", "${_SolarCopy3}", "opacity", '0', { fromValue: '1'}], position: 8038, duration: 38 },
                { id: "eid2106", tween: [ "style", "${_Solar}", "top", '-22px', { fromValue: '-22px'}], position: 3538, duration: 0 },
                { id: "eid2110", tween: [ "style", "${_SolarCopy2}", "left", '-220px', { fromValue: '-12px'}], position: 2538, duration: 3500 },
                { id: "eid2108", tween: [ "style", "${_SolarCopy2}", "opacity", '1', { fromValue: '0'}], position: 2500, duration: 38 },
                { id: "eid2109", tween: [ "style", "${_SolarCopy2}", "opacity", '0', { fromValue: '1'}], position: 6038, duration: 38 },
                { id: "eid2091", tween: [ "style", "${_SolarCopy}", "top", '-23px', { fromValue: '0px'}], position: 0, duration: 500 },
                { id: "eid2092", tween: [ "style", "${_SolarCopy}", "top", '-23px', { fromValue: '0px'}], position: 2000, duration: 500 },
                { id: "eid2093", tween: [ "style", "${_SolarCopy}", "top", '-23px', { fromValue: '0px'}], position: 4000, duration: 500 },
                { id: "eid2094", tween: [ "style", "${_SolarCopy}", "top", '-23px', { fromValue: '0px'}], position: 6000, duration: 500 },
                { id: "eid2111", tween: [ "style", "${_SolarCopy2}", "top", '-22px', { fromValue: '-22px'}], position: 6038, duration: 0 },
               { id: "eid2116", tween: [ "style", "${_SolarCopy3}", "top", '-22px', { fromValue: '-22px'}], position: 8038, duration: 0 },
                { id: "eid2102", tween: [ "color", "${_Solar}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 288, duration: 0 },
                { id: "eid2122", tween: [ "color", "${_SolarCopy5}", "background-color", 'rgba(31,116,167,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(31,116,167,1.00)'}], position: 6788, duration: 0 },
                { id: "eid2095", tween: [ "style", "${_SolarCopy}", "opacity", '0', { fromValue: '1'}], position: 500, duration: 29 },
                { id: "eid2096", tween: [ "style", "${_SolarCopy}", "opacity", '1', { fromValue: '0'}], position: 2000, duration: 41 },
                { id: "eid2097", tween: [ "style", "${_SolarCopy}", "opacity", '0', { fromValue: '1'}], position: 2500, duration: 29 },
                { id: "eid2098", tween: [ "style", "${_SolarCopy}", "opacity", '1', { fromValue: '0'}], position: 4000, duration: 41 },
                { id: "eid2099", tween: [ "style", "${_SolarCopy}", "opacity", '0', { fromValue: '1'}], position: 4500, duration: 29 },
                { id: "eid2100", tween: [ "style", "${_SolarCopy}", "opacity", '1', { fromValue: '0'}], position: 6000, duration: 41 },
                { id: "eid2101", tween: [ "style", "${_SolarCopy}", "opacity", '0', { fromValue: '1'}], position: 6500, duration: 29 },
                { id: "eid2115", tween: [ "style", "${_SolarCopy3}", "left", '-220px', { fromValue: '-12px'}], position: 4538, duration: 3500 } ]
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
