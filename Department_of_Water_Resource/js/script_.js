let url = "/pea"; //"http://emtrontech.com/pea"; 
let urlLogin = url + "/user_authen.php";
let urlTable = url + "/peaGetSiteEvent.php";
let urlReg = url + "/peaGetSiteJson.php?cmd=2";
let url_graph = url + "/peaGetSiteData.php"
let inputX = [], inputY = [], outputX = [], outputY = [], tempX = [], tempY = [], battX = [], battY = [], lbm = [], lbm_avg = [], bar_background = [];
let navName, provinceVal, idVal_graph;
let currentReg = "";

window.onload = function () {
    $("#login-form input").keypress(function (e) {
        if ((e.keyCode && e.keyCode == 13)) {
            if (document.getElementById("username").value == "" || document.getElementById("password").value == "") {
                call_blurback();
                $("#alertFillForm").modal("show");
            } else $('button[type=button]').click();
        }
    });

    let page = location.pathname.split('/').pop();

    if ((page == "index.html") || (page == "")) {
        if (!localStorage.getItem('userClass')) location.href = "/pea/login.html";
        else {
            document.getElementById("mainpage").classList.remove("hideObj")
            navName = localStorage.getItem('userClass');
            document.getElementById("user_name").innerHTML = navName;

            fetch_region();
            loadHTML_table();
            document.getElementById("logOut").onclick = function () {
                localStorage.clear();
                location.href = 'login.html';
            }
        }

    }
}

function fetch_login() {
    let username = document.getElementById("username").value;
    let passW = document.getElementById("password").value;
    let pass = sha256(passW);

    fetch(urlLogin, {
        method: "POST",
        body: "user=" + username + "&pass=" + pass,
        headers: { "Content-type": "application/x-www-form-urlencoded" }
    })
        .then(response => response.json())
        .then(json => {
            navName = json.name;

            if (json.res == 1) {
                location.href = 'index.html';
                localStorage.setItem('userClass', navName);
            } else {
                call_blurback();
                $("#wrongPass").modal("show");
            }
        }).catch((error) => {
            console.log("Error", error);
        });
}

function fetch_region() {
    fetch(urlReg, {
        method: "POST",
        headers: { "Content-type": "application/x-www-form-urlencoded" }
    })
        .then(response => response.json())
        .then(reg => {

            let region = "";
            let regNpro = "";
            let rId = [], pId = [], proVal = [];

            reg.forEach((k, v) => {
                let regionVal = k.region;
                let province = k.province;

                region += '<div><button id="region_' + v + '" value="' + regionVal + '" data-index="' + v + '" class="myButton" onclick="regionButton(this);">'
                    + regionVal + '</button></div>'

                regNpro += '<div id="zoneSub_r' + v + '" class="zoneSub_parent">' + regionVal
                    + '<i class="fas fa-caret-down"></i></div><div id="zoneSub_p' + v
                    + '" class="zoneSub">' + '<ul>';

                Object.entries(province).forEach((k1) => {
                    regNpro += '<li id="' + k1[0] + '" data-region="' + k.region + '" data-index="' + v + '" onclick="proClickReg(this)">' + k1[1] + '</li>';
                })

                regNpro += '</ul></div>';

                rId.push('zoneSub_r' + v);
                pId.push('zoneSub_p' + v);
                proVal.push(k);
            })
            document.getElementById("mainLeft").innerHTML = regNpro;
            document.getElementById("button_zone").innerHTML = region;
            provinceVal = proVal;

            for (i = 0; i < rId.length; i++) {
                navSHide(rId[i], pId[i]);
            }
        })
}

function fetch_table(region, siteid, status, callback) {
    if (region == "" && siteid == "" && status == "") {
        document.getElementById("provinceInput").disabled = true;
    } else document.getElementById("provinceInput").disabled = false;

    fetch(urlTable, {
        method: "POST",
        body: "region=" + region + "&siteid=" + siteid + "&status=" + status,
        headers: { "Content-type": "application/x-www-form-urlencoded" }
    })
        .then(response => response.json())
        .then(ta => {

            ta.forEach((k, v) => {
                Object.keys(k).forEach((k1) => {
                    if (ta[v][k1] == null) ta[v][k1] = "";
                });
            });

            let rows = [];

            ta.forEach((k) => {
                if (k.status == "0") {
                    k.status = '<i class="fas fa-power-off"></i>'
                } else if (k.status == "1") {
                    k.status = '<i class="fas fa-exclamation-triangle"></i>'
                } else if (k.status == "2") {
                    k.status = '<i class="fas fa-exclamation-circle"></i>'
                } else if (k.status == "3") {
                    k.status = '<i class="far fa-check-square"</i>'
                }

                rows += "<tr value='" + k.ID + "'><td class='w-4vw'>" + k.status + "</td><td class='w-8vw'>" + k.Region
                    + "</td><td class='w-8vw'>" + k.Provinces + "</td><td class='w-11vw'>" + k.PEA_CodeName + "</td><td class='w-6vw click_graph' data-id='"
                    + k.ID + "' onclick='openGraph(this)'>" + k.UPS_ID + "</td><td class='w-11vw'>" + k.Datetime_NBIoT + "</td><td class='w-8vw'>"
                    + k.event_name + "</td><td class='w-6vw'>" + k.Input_V + "</td><td class='w-6vw'>" + k.Output_V + "</td><td class='w-6vw'>"
                    + k.Output_I_percent + "</td><td class='w-6vw'>" + k.Sum_Batt_V + "</td><td class='w-6vw'>" + k.HS_Temp + "</td></tr>"
            })

            let thead = '<thead class="d-block"><tr><th class="w-4vw" style="border-top-left-radius: 0.2vw;">Status</th><th class="w-8vw">Region</th>\
            <th class="w-8vw">Provinces</th><th class="w-11vw">PEA Code Name</th><th class="w-6vw">UPS ID</th><th class="w-11vw">Last Signal Updated</th>\
            <th class="w-8vw">Last Event</th><th class="w-6vw">Input voltage</th><th class="w-6vw">Output voltage</th><th class="w-6vw">% Load</th>\
            <th class="w-6vw">Battery voltage</th><th class="w-6vw" style="border-top-right-radius: 0.2vw;">UPS Heat sink Temp</th></tr></thead>'

            let addTbody = thead + "<tbody>" + rows + "</tbody>";

            let noInfo = '<thead class="w-100">' + "<tr><th style='font-size: 2vw;'>ไม่มีข้อมูล</th></tr>" + '</thead>';
            if (ta == "") {
                document.getElementById("filterTable").innerHTML = noInfo;
                document.getElementById("filterNum").innerHTML = "<span>Site (" + ta.length + ")</span>";
                document.getElementById("filterTable").style.width = "100%"
            } else {
                document.getElementById("filterTable").innerHTML = addTbody;
                document.getElementById("filterNum").innerHTML = "<span>Site (" + ta.length + ")</span>";
                document.getElementById("filterTable").style.width = "max-content"
            }
            if (callback) callback();

        })
    document.getElementById("loader").classList.add("hideObj")
}

function openGraph(el) {
    idVal_graph = el.attributes[1].value;

    loadHTML_graph(idVal_graph);
    document.getElementById("button_zone").classList.add("hideObj");
    document.getElementById("tab_graph").classList.remove("hideObj")
    localStorage.setItem('idVal', idVal_graph);
}

function regionButton(val) {
    document.getElementById("resetSearch").click()
    fetch_provine(val);
    Object.entries(document.querySelectorAll("#mainLeft li")).forEach((k) => {
        k[1].classList.remove("active")
    })

    if (document.getElementById(val.id).classList.contains("active") == false) {
        Object.entries(document.querySelectorAll("#button_zone button")).forEach((k) => {
            k[1].classList.remove("active")
        })
        val.classList.add("active")
        currentReg = val.value;
        document.getElementById("applySearch").click();
    } else {
        val.classList.remove("active")
        currentReg = "";
        document.getElementById("applySearch").click();
    }
}

function proClickReg(th) {
    if (document.getElementById("button_zone").classList.contains("hideObj") == false) {
        let region = th.attributes[1].value;
        let provinceID = th.id;
        fetch_provine(th);

        document.querySelectorAll("#button_zone button").forEach((k) => {
            if (region == k.value) {
                document.getElementById("provinceInput").value = provinceID;
                if (th.classList.value == "active") return false;

                Object.entries(document.querySelectorAll("#button_zone button")).forEach((k) => {
                    k[1].classList.remove("active")
                })

                document.getElementById(k.id).classList.add("active")
                Object.entries(document.querySelectorAll("#mainLeft li")).forEach((k) => {
                    k[1].classList.remove("active");
                })

                th.classList.add("active");
                currentReg = region;
                document.getElementById("applySearch").click();
            }
        })
    } else {
        document.getElementById("button_zone").classList.remove("hideObj");
        document.getElementById("tab_graph").classList.add("hideObj");

        loadHTML_table(th.id, th.attributes[1].value, th.innerHTML);
        Object.entries(document.querySelectorAll("#mainLeft li")).forEach((k) => {
            k[1].classList.remove("active");
        })
        th.classList.add("active");
        Object.entries(document.querySelectorAll("#button_zone button")).forEach((k) => {
            k[1].classList.remove("active")

            if (k[1].value == th.attributes[1].value) {
                k[1].classList.add("active")
            }
        })
    }
}
function fetch_provine(val, callback) {
    let proVal = provinceVal[val.attributes[2].value].province;
    let province = [];

    Object.entries(proVal).forEach((k) => {
        province += '<option value="' + k[0] + '">' + k[1] + '</option>'
    })
    document.getElementById("provinceInput").innerHTML = '<option value="">-- Select Provinces --</option>' + province;

    if (callback) callback();
}

function call_blurback() {
    document.getElementById("mainpage").classList.add("blurBack");
}
function remove_blurback() {
    document.getElementById("mainpage").classList.remove("blurBack");
}
function filterHide() {
    document.getElementById("filterHead").onclick = function () {
        if (document.getElementById("filterInput").style.display == "block") {
            document.getElementById("filterInput").style.display = "none"
            document.getElementById("filterNum").style.display = "block"
            document.getElementById("filter_zone").style.height = "5vw"
            document.getElementById("table_zone").style.height = "calc(100% - 7.5vw)"
            document.getElementById("filterHead").children[0].classList.replace("fa-caret-down", "fa-caret-right")
        } else {
            document.getElementById("filterInput").style.display = "block"
            document.getElementById("filterNum").style.display = "none"
            document.getElementById("filter_zone").style.height = "10vw"
            document.getElementById("table_zone").style.height = "calc(100% - 12.5vw)"
            document.getElementById("filterHead").children[0].classList.replace("fa-caret-right", "fa-caret-down")
        }
    }
}
function navSHide(parent, child) {
    document.getElementById(parent).onclick = function () {
        if (document.getElementById(child).style.display == "block") {
            document.getElementById(child).style.display = "none"
            document.getElementById(parent).children[0].classList.replace("fa-caret-up", "fa-caret-down")
        } else {
            document.getElementById(child).style.display = "block"
            document.getElementById(parent).children[0].classList.replace("fa-caret-down", "fa-caret-up")
        }
    }
}

function loadHTML_table(th, region, province) {
    fetch('table.html')
        .then(data => data.text())
        .then(html => {

            document.getElementById('main_switch').innerHTML = html
            const urlParams = new URLSearchParams(window.location.search);
            const map_reg = urlParams.get('region');
            const map_id = urlParams.get('mapid');

            filterHide();
            if (th !== undefined) {
                fetch_table("", th, "");
                document.getElementById("filterHead").innerHTML = '<i class="fas fa-caret-right"></i>Filter (' + region + " , " + province + ')'
            } else if (map_id !== null) {
                fetch_table(map_reg, map_id, "", function () {
                    Object.entries(document.querySelectorAll("#button_zone button")).forEach((k) => {
                        k[1].classList.remove("active")

                        if (k[1].value == map_reg) {
                            k[1].classList.add("active")
                            fetch_provine(k[1], function () {
                                document.getElementById("provinceInput").value = map_id;

                                let siteid = document.getElementById("provinceInput")
                                let siteText = " , " + siteid.options[siteid.selectedIndex].innerHTML;
                                currentReg = map_reg

                                document.getElementById("filterHead").innerHTML = '<i class="fas fa-caret-right"></i>Filter (' + currentReg + siteText + ')'
                            })
                        }
                    })
                })

            } else fetch_table("", "", "");

            document.getElementById("applySearch").onclick = function () {
                document.getElementById("loader").classList.remove("hideObj")
                let siteid = document.getElementById("provinceInput");
                let status = document.getElementById("statusInput");

                let siteText = " , " + siteid.options[siteid.selectedIndex].innerHTML;
                let statusText = " , " + status.options[status.selectedIndex].innerHTML;
                let noText = ""

                if (siteid.options[siteid.selectedIndex].value == "") siteText = "";
                if (status.options[status.selectedIndex].value == "") statusText = "";
                if (currentReg == "" && status.options[status.selectedIndex].value !== "")
                    statusText = status.options[status.selectedIndex].innerHTML;
                if (currentReg == "" && siteText == "" && statusText == "") noText = "no active filter"

                fetch_table(currentReg, siteid.value, status.value);

                document.getElementById("filterHead").innerHTML = '<i class="fas fa-caret-right"></i>Filter (' + currentReg + siteText
                    + statusText + noText + ')'
            }
        })
}


function loadHTML_graph() {
    fetch('graph.html')
        .then(data => data.text())
        .then(html => {

            document.getElementById('main_switch').innerHTML = html

            idVal_graph = localStorage.getItem('idVal');
            document.getElementById("dashboard_graph").click();

            mouseoverOut("input_chart", "input_Gtext");
            mouseoverOut("output_chart", "output_Gtext")
            mouseoverOut("temp_chart", "temp_Gtext")
            mouseoverOut("batt_chart", "batt_Gtext")
        })
}

function mouseoverOut(id, text) {
    document.getElementById(id).onmouseout = function () {
        document.getElementById(text).classList.add("hideObj")
    }

    document.getElementById(id).onmouseover = function () {
        document.getElementById(text).classList.remove("hideObj")
    }
}

function fetch_graph(el) {
    let cmdV = el.value;
    let siteN = idVal_graph;

    if (cmdV == 1) document.querySelectorAll("#tab_graph .myButton")[Number(cmdV)].classList.remove("active");
    else document.querySelectorAll("#tab_graph .myButton")[Number(cmdV) - 2].classList.remove("active");

    el.classList.add("active");

    fetch(url_graph, {
        method: "POST",
        body: "cmd=" + cmdV + "&siteid=" + siteN,
        headers: { "Content-type": "application/x-www-form-urlencoded" }
    })
        .then(response => response.json())
        .then(json => {

            document.getElementById("graph_siteName").innerHTML = json.dat.PEA_SiteName;
            document.getElementById("graph_upsId").innerHTML = json.dat.UPS_ID;
            document.getElementById("graph_update").innerHTML = json.dat.Datetime_NBIoT;
            document.getElementById("graph_status").innerHTML = json.dat.ststus;

            if (cmdV == 1) {
                document.getElementById("bar_main").classList.add("hideObj")
                document.getElementById("graph_main").classList.remove("hideObj")

                Object.entries(json.dat).forEach((k) => {
                    if (json.dat[k[0]] == null) json.dat[k[0]] = "0"
                })

                let inputV = json.Input_V;
                let outputV = json.Output_I_percent;
                let tempV = json.Temp;
                let battV = json.Sum_Batt_V;



                document.getElementById("input_v").innerHTML = json.dat.Input_V + " V";
                document.getElementById("input_text").innerHTML = json.dat.Input_V + " V";
                document.getElementById("output_v").innerHTML = json.dat.Output_I_percent + " %";
                document.getElementById("output_text").innerHTML = json.dat.Output_V + " V";
                document.getElementById("temp_v").innerHTML = json.dat.Temp + "&#176C";
                document.getElementById("hudmit_v").innerHTML = json.dat.RH + "%";
                document.getElementById("batt_text").innerHTML = json.dat.LBM_I + " A";
                document.getElementById("battTemp_text").innerHTML = json.dat.LBM_BattTemp + "&#176C";
                document.getElementById("batt_v").innerHTML = json.dat.Sum_Batt_V + " V";

                if (Number(json.dat.Input_V) < 200) {
                    Object.entries(document.querySelectorAll("#dotsLeft-list .dot")).forEach((k) => {
                        k[1].style.height = 0;
                    })
                    Object.entries(document.querySelectorAll("#dotDown-list .dotDown")).forEach((k) => {
                        k[1].style.width = 0;
                    })
                } else {
                    Object.entries(document.querySelectorAll("#dotsLeft-list .dot")).forEach((k) => {
                        k[1].style.height = "100%";
                    })
                    Object.entries(document.querySelectorAll("#dotDown-list .dotDown")).forEach((k) => {
                        k[1].style.width = "100%";
                    })
                }

                if (Number(json.dat.Output_V) < 200) {
                    Object.entries(document.querySelectorAll("#dotsRight-list .dot")).forEach((k) => {
                        k[1].style.height = 0;
                    })
                    Object.entries(document.querySelectorAll("#dotUp-list .dotUp")).forEach((k) => {
                        k[1].style.width = 0;
                    })
                } else {
                    Object.entries(document.querySelectorAll("#dotsRight-list .dot")).forEach((k) => {
                        k[1].style.height = "100%";
                    })
                    Object.entries(document.querySelectorAll("#dotUp-list .dotUp")).forEach((k) => {
                        k[1].style.width = "100%";
                    })
                }

                if (Number(json.dat.LBM_BattTemp) < -0.5) {
                    Object.entries(document.querySelectorAll("#charge-list .dotCharge")).forEach((k) => {
                        k[1].style.width = "100%";
                        k[1].style.animationDirection = "normal";
                        document.getElementById("batt_display").innerHTML = "Charging";
                    })

                } else if (Number(json.dat.LBM_BattTemp) > 0.5) {
                    Object.entries(document.querySelectorAll("#charge-list .dotCharge")).forEach((k) => {
                        k[1].style.width = "100%";
                        k[1].style.animationDirection = "reverse";
                        document.getElementById("batt_display").innerHTML = "Discharging";
                    })
                } else {
                    Object.entries(document.querySelectorAll("#charge-list .dotCharge")).forEach((k) => {
                        k[1].style.width = 0;
                        document.getElementById("batt_display").innerHTML = "";
                    })
                }


                inputV.forEach((k) => {
                    inputX.push(k.x);
                    inputY.push(k.y);
                });

                outputV.forEach((k) => {
                    outputX.push(k.x);
                    outputY.push(k.y);
                });

                tempV.forEach((k) => {
                    tempX.push(k.x);
                    tempY.push(k.y);
                });

                battV.forEach((k) => {
                    battX.push(k.x);
                    battY.push(k.y);
                });

                chartJS();         
                    
            } else {
                document.getElementById("bar_main").classList.remove("hideObj")
                document.getElementById("graph_main").classList.add("hideObj")

                let lbmV = json.dat
                for (val in lbmV) {
                    if (lbmV[val] == null) {
                        lbmV[val] = "0";
                    }
                }

                let backG1, backG2, backG3, backG4, backG5, backG6;

                bar_background = [backG1, backG2, backG3, backG4, backG5, backG6];
                lbm = [lbmV.LBM_Batt1_V, lbmV.LBM_Batt2_V, lbmV.LBM_Batt3_V, lbmV.LBM_Batt4_V, lbmV.LBM_Batt5_V, lbmV.LBM_Batt6_V]
                lbm_avg = [lbmV.Avg_Batt_V, lbmV.Avg_Batt_V, lbmV.Avg_Batt_V, lbmV.Avg_Batt_V, lbmV.Avg_Batt_V, lbmV.Avg_Batt_V];

                document.getElementById("avg_text").innerHTML = lbmV.Avg_Batt_V + " V";
                document.getElementById("total_text").innerHTML = lbmV.Sum_Batt_V + " V";
                document.getElementById("curr_text").innerHTML = lbmV.LBM_I + " A";
                document.getElementById("bTemp_text").innerHTML = lbmV.LBM_BattTemp + "&#176C";

                lbm.forEach((k, v) => {
                    document.getElementById("bar_text" + (v+1)).innerHTML = k + " V";
                })

                // Object.entries(lbm).forEach((k) => {
                //     if (k[1] > (Number(lbm_avg[0]) + 0.18) && k[1] < (Number(lbm_avg[0]) + 0.24) || k[1] < (Number(lbm_avg[0]) - 0.18) && k[1] > (Number(lbm_avg[0]) - 0.24)) {
                //         bar_background[k[0]] = "#E5E004"
                //     } else if (k[1] <= (Number(lbm_avg[0]) + 0.18) && k[1] >= (Number(lbm_avg[0]) - 0.18)) {
                //         bar_background[k[0]] = "#2CB8AE"
                //     } else {
                //         bar_background[k[0]] = "#D96172"
                //     }
                // })

                barJs();
            }



        })
}

function barJs() {
    let font_size = 8;
    let w = window.innerWidth;
    if (w > 1440) font_size = 13;
    else if (w > 1280) font_size = 12;
    else if (w > 1024) font_size = 12;

    let maxV = Math.round(lbm_avg[0]) + Math.round((lbm_avg[0]) / 4);
    let minV = Math.round(lbm_avg[0]) - Math.round((lbm_avg[0]) / 4);

    let ctx = document.getElementById('bar_chart').getContext('2d');
    let chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ["C1", "C2", "C3", "C4", "C5", "C6"],
            datasets: [{
                label: 'Cell battery volt',
                data: lbm,
                backgroundColor: "#2CB8AE"
                // backgroundColor: bar_background,
            }, {
                type: 'line',
                label: 'Average Cell battery volt',
                data: lbm_avg,
                backgroundColor: "transparent",
                borderColor: 'orange',
                pointRadius: 0,
                pointHoverRadius: 0,
                borderWidth: 2,
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Battery Cell Voltage'
            },
            lineAt: 14,
            scales: {
                xAxes: [{
                    barPercentage: 0.6,
                    ticks: {
                        fontSize: font_size,
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontSize: font_size,
                        max: maxV,
                        min: minV,
                    }
                }]
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    boxWidth: 15,
                    fontSize: font_size,
                }
            },
        }
    });
}



function chartJS() {
    Chart.Tooltip.positioners.custom = function () {
        return {
            x: -50,
            y: -50
        };
    };

    let ctx = document.getElementById('input_chart').getContext('2d');
    let chart = new Chart(ctx, {
        type: 'line',

        data: {
            labels: inputX,
            datasets: [{
                label: 'Input_V',
                data: inputY,
                backgroundColor: '#FEF1F1',
                borderColor: '#FCB8B7',
                pointRadius: 0,
                borderWidth: 1,
            }]
        },

        options: option_chart('#input_Gtext', " V")
    });

    let ctx1 = document.getElementById('output_chart').getContext('2d');
    let chart1 = new Chart(ctx1, {
        type: 'line',

        data: {
            labels: outputX,
            datasets: [{
                label: 'Output_V',
                data: outputY,
                backgroundColor: '#F3FAEF',
                borderColor: '#CBE7BA',
                pointRadius: 0,
                borderWidth: 1,
            }]
        },

        options: option_chart('#output_Gtext', " %")
    });


    let ctx2 = document.getElementById('temp_chart').getContext('2d');
    let chart2 = new Chart(ctx2, {
        type: 'line',

        data: {
            labels: tempX,
            datasets: [{
                label: 'Temp_V',
                data: tempY,
                backgroundColor: '#EDF4FA',
                borderColor: '#C8DEF0',
                pointRadius: 0,
                borderWidth: 1,
            }]
        },

        options: option_chart('#temp_Gtext', "&#176C")
    });


    let ctx3 = document.getElementById('batt_chart').getContext('2d');
    let chart3 = new Chart(ctx3, {
        type: 'line',

        data: {
            labels: battX,
            datasets: [{
                label: 'Batt_V',
                data: battY,
                backgroundColor: '#EDF4FA',
                borderColor: '#C8DEF0',
                pointRadius: 0,
                borderWidth: 1,
            }]
        },

        options: option_chart('#batt_Gtext', " V")
    });
}

function option_chart(textV, unit) {
    let option = {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                top: -10,
                left: -10,
                bottom: -10
            }
        },
        scales: {
            xAxes: [{
                ticks: {
                    display: false
                },
                gridLines: {
                    display: false,
                    color: 'transparent',
                }
            }],
            yAxes: [{
                ticks: {
                    display: false,
                    min: 0,
                },
                gridLines: {
                    display: false,
                    color: 'transparent',
                },
            }]
        },
        tooltips: {
            position: 'custom',
            mode: 'index',
            intersect: false,
            callbacks: {
                label: function (tooltipItem, data) {
                    $(textV).html("<div class='d-flex justify-content-between w-100'><div>" + data['labels'][tooltipItem['index']] + "</div><div>" + data['datasets'][0]['data']
                    [tooltipItem['index']] + unit + "</div></div>");
                    return data['datasets'][0]['data'][tooltipItem['index']];
                },
            }
        },
        legend: {
            display: false
        },
        hover: {
            intersect: false,
        }
    }
    return option;
}
