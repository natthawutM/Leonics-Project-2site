/* ============================================================
   sim.js — client-side SCADA simulator for Department of Water Resource
   Activates ONLY when the page URL contains ?sim=1 (opt-in).
   Monkey-patches window.fetch so requests for Main.xml / Battery.xml /
   Energylog.xml return realistic, time-of-day generated XML.
   No PHP, no server changes, zero effect on production default.
   ============================================================ */
(function(){
  'use strict';
  if(!/[?&]sim=1\b/.test(location.search)) return;   // opt-in guard

  const pad = (n)=>String(n).padStart(2,'0');
  const clamp = (v,a,b)=>Math.max(a,Math.min(b,v));
  const r = (lo,hi)=>lo + Math.random()*(hi-lo);

  // Solar bell curve: 0 before 6:00 / after 18:00, peak at noon
  function solarFactor(h){
    if(h<6 || h>18) return 0;
    return Math.pow(Math.sin(Math.PI*(h-6)/12), 1.15);
  }

  // ---- one coherent system snapshot for the current clock time ----
  function model(){
    const d = new Date();
    const h = d.getHours() + d.getMinutes()/60 + d.getSeconds()/3600;
    const sf = solarFactor(h);
    const jit = (a)=> (Math.sin(Date.now()/3000)+1)/2 * a;   // smooth 0..a wobble

    const irr   = sf*1000 + (sf>0 ? r(-25,25) : 0);
    const gciAC = sf*35 + jit(1.2);                 // grid-tie AC out (kW)
    const gciPV = gciAC>0 ? gciAC*1.045 : 0;        // DC side
    const sccPV = sf*6.5 + (sf>0?jit(0.3):0);       // SCC PV (kW)
    const sccChg= sccPV*0.94;                       // SCC charge to battery
    const wind  = clamp(2.4 + 3.2*Math.sin(h*0.7+1) + jit(1.4), 0, 11);
    const load  = 10 + 9*clamp(Math.sin(Math.PI*(h-7)/13),0,1) + jit(2.2);

    // Battery: charge on midday surplus, discharge in evening
    const soc   = clamp(56 + 22*Math.sin(Math.PI*(h-8.5)/12), 33, 95);
    const supply= gciAC + wind;
    const net   = supply - load;                    // +surplus / -deficit
    let batDC;                                       // BDI DC power: + discharge / - charge
    if(net > 0.5 && soc < 93)      batDC = -clamp(net*0.55, 0, 28);   // charging
    else if(net < -0.5 && soc > 35) batDC =  clamp(-net*0.7, 0, 24);  // discharging
    else                            batDC =  r(-0.3,0.3);
    const batAC = batDC * 0.97;
    const battV = 720 + (soc-60)*0.35;
    const battI = batDC*1000 / Math.max(battV,1);

    // Grid (AC input) makes up the remaining balance (+ import / - export)
    const grid  = clamp(load - gciAC - wind + (batDC<0? -batDC : 0) - (batDC>0? batDC : 0), -20, 60);

    const prog  = clamp((h-6)/12, 0, 1);            // day progress for energy totals
    return {
      d, h, sf, irr, gciAC, gciPV, sccPV, sccChg, wind, load,
      soc, batDC, batAC, battV, battI, grid, prog,
      eSolar: 175*prog, eWind: 58*prog, eLoad: 250*prog, eGrid: 120*prog, eCO2: 175*prog*0.5,
      ds: pad(d.getDate())+'-'+['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][d.getMonth()]+'-'+d.getFullYear(),
      ts: pad(d.getHours())+':'+pad(d.getMinutes())+':'+pad(d.getSeconds())
    };
  }

  const f = (v,n=2)=>Number(v).toFixed(n);
  const tag = (k,v)=>`<${k}>${v}</${k}>`;

  function mainXml(){
    const m = model();
    const ph = (tot)=>[tot*0.34, tot*0.33, tot*0.33];
    const acP = ph(m.grid), ldP = ph(m.load), wtP = ph(m.wind);
    const V = ()=>f(228+r(-3,4),1);
    let s = '<Main>';
    s += tag('DateServer',m.ds)+tag('TimeServer',m.ts)+tag('DatetimeSCU',m.ds+' '+m.ts);
    // AC input (grid)
    s += tag('ACin_Voltage_L1',V())+tag('ACin_Voltage_L2',V())+tag('ACin_Voltage_L3',V());
    s += tag('ACin_Current_I1',f(Math.abs(acP[0])*1000/230,2))+tag('ACin_Current_I2',f(Math.abs(acP[1])*1000/230,2))+tag('ACin_Current_I3',f(Math.abs(acP[2])*1000/230,2));
    s += tag('ACin_Total_Current_I',f(Math.abs(m.grid)*1000/230,2));
    s += tag('ACin_Power_P1_kW',f(acP[0]))+tag('ACin_Power_P2_kW',f(acP[1]))+tag('ACin_Power_P3_kW',f(acP[2]));
    s += tag('ACin_Total_Power_kW',f(m.grid))+tag('ACin_PF',f(0.97+r(-0.02,0.02),2));
    // Load PM
    s += tag('LoadPM_Voltage_L1',V())+tag('LoadPM_Voltage_L2',V())+tag('LoadPM_Voltage_L3',V());
    s += tag('LoadPM_Current_I1',f(ldP[0]*1000/230,2))+tag('LoadPM_Current_I2',f(ldP[1]*1000/230,2))+tag('LoadPM_Current_I3',f(ldP[2]*1000/230,2));
    s += tag('LoadPM_Power_P1_kW',f(ldP[0]))+tag('LoadPM_Power_P2_kW',f(ldP[1]))+tag('LoadPM_Power_P3_kW',f(ldP[2]));
    s += tag('LoadPM_PF1',f(0.96+r(-0.03,0.02),2))+tag('LoadPM_PF2',f(0.96+r(-0.03,0.02),2))+tag('LoadPM_PF3',f(0.96+r(-0.03,0.02),2));
    s += tag('LoadPM_Total_P_kW',f(m.load))+tag('LoadPM_Freq',f(50+r(-0.05,0.05),2))+tag('LoadPM_Today_Import_kWh',f(m.eLoad,1));
    // Solar — GCI grid-tie + SCC
    s += tag('GCI_Sum_PV_kW',f(m.gciPV))+tag('GCI_Sum_AC_kW',f(m.gciAC));
    s += tag('GCI_Sum_Today_AC_kWh',f(m.eSolar*0.8,1))+tag('GCI_Sum_Today_PV_kWh',f(m.eSolar*0.83,1));
    s += tag('SCC_PV_Voltage',f(m.sf>0?305+r(-8,12):0,1))+tag('SCC_PV_Current',f(m.sf>0?m.sccPV*1000/310:0,2));
    s += tag('SCC_PV_Power_kW',f(m.sccPV))+tag('SCC_Chg_Power_kW',f(m.sccChg))+tag('SCC_Today_PV_kWh',f(m.eSolar*0.2,1));
    // Wind PM
    s += tag('WindPM_Voltage_L1',V())+tag('WindPM_Voltage_L2',V())+tag('WindPM_Voltage_L3',V());
    s += tag('WindPM_Current_I1',f(wtP[0]*1000/230,2))+tag('WindPM_Current_I2',f(wtP[1]*1000/230,2))+tag('WindPM_Current_I3',f(wtP[2]*1000/230,2));
    s += tag('WindPM_Power_P1_kW',f(wtP[0]))+tag('WindPM_Power_P2_kW',f(wtP[1]))+tag('WindPM_Power_P3_kW',f(wtP[2]));
    s += tag('WindPM_PF1',f(0.94+r(-0.03,0.03),2))+tag('WindPM_PF2',f(0.94+r(-0.03,0.03),2))+tag('WindPM_PF3',f(0.94+r(-0.03,0.03),2));
    s += tag('WindPM_Total_P_kW',f(m.wind))+tag('WindPM_Freq',f(50+r(-0.05,0.05),2))+tag('WindPM_Today_Import_kWh',f(m.eWind,1));
    // Battery (BDI)
    s += tag('BDI_Batt_Voltage',f(m.battV,1))+tag('BDI_Battery_Current',f(m.battI,2));
    s += tag('BDI_Total_Power_kW',f(m.batAC))+tag('BDI_DC_Power_kW',f(m.batDC));
    s += tag('BDI_SOC',f(m.soc,1))+tag('Batt_Avg_SOC',f(m.soc,1))+tag('Batt_Avg_Voltage',f(m.battV,1));
    s += tag('BDI_Today_ACin_kWh',f(m.eGrid,1));
    // Weather + CO2
    s += tag('Irradiance_W_m2',f(Math.max(0,m.irr),0))+tag('Irradiation_kWh_m2',f(m.eSolar/40,2));
    s += tag('temp',f(28+8*m.sf+r(-1,1),1))+tag('ana3',f(27+6*m.sf+r(-1,1),1));
    s += tag('Today_CO2_emission_kgCO2e',f(m.eCO2,1));

    // ---- device-page detail fields (BDI / SCC / LoadPM / WindPM / GCI) ----
    var p3=function(t){return [t*0.34,t*0.33,t*0.33];};
    // BDI battery + inverter output
    s += tag('BDI_Batt_kW',f(m.batAC))+tag('BDI_DC_Current',f(m.battI,2));
    s += tag('BDI_Ext_DC_Current',f(0,2))+tag('BDI_Ext_DC_kW',f(0,2));
    s += tag('BDI_Heat_Sink_Temp',f(32+Math.abs(m.batAC)*0.4+r(-1,1),1));
    s += tag('BDI_Voltage_L1',V())+tag('BDI_Voltage_L2',V())+tag('BDI_Voltage_L3',V());
    var bdiP=p3(Math.abs(m.batAC));
    [1,2,3].forEach(function(n){var P=bdiP[n-1],Q=P*0.12,S=Math.sqrt(P*P+Q*Q);
      s+=tag('BDI_Current_I'+n,f(Math.abs(P)*1000/230,2))+tag('BDI_Power_P'+n+'_kW',f(P))
        +tag('BDI_Power_Q'+n+'_kVAr',f(Q))+tag('BDI_Power_S'+n+'_kVA',f(S));});
    s += tag('BDI_Freq',f(50+r(-0.05,0.05),2))+tag('BDI_PF',f(0.98,2));
    s += tag('BDI_Todate_ACin_kWh',f(m.eGrid*30,1));
    s += tag('BDI_Today_AC_Feed2Grid_kWh',f(Math.max(0,-m.grid)*0.5,1))+tag('BDI_Todate_AC_Feed2Grid_kWh',f(80,1));
    s += tag('BDI_Today_Supply_AC_kWh',f(Math.abs(m.batAC)*5+20,1))+tag('BDI_Todate_Supply_AC_kWh',f(2400,1));
    // ACin Q/S + frequency
    var acP2=p3(m.grid);
    [1,2,3].forEach(function(n){var P=acP2[n-1],Q=P*0.10,S=Math.sqrt(P*P+Q*Q);
      s+=tag('ACin_Power_Q'+n+'_kVAr',f(Q))+tag('ACin_Power_S'+n+'_kVA',f(S));});
    s += tag('ACin_Freq',f(50+r(-0.05,0.05),2));
    // SCC charge side + todate
    var chgV=720+(m.soc-60)*0.3;
    s += tag('SCC_Chg_Voltage',f(chgV,1))+tag('SCC_Chg_Current',f(m.sf>0?m.sccChg*1000/chgV:0,2))
       + tag('SCC_Todate_PV_kWh',f(m.eSolar*0.2*60,1))
       + tag('SCC_Today_Chg_kWh',f(m.eSolar*0.2*0.94,1))+tag('SCC_Todate_Chg_kWh',f(m.eSolar*0.2*0.94*60,1));
    // LoadPM Q/S/totals/todate
    var ldP2=p3(m.load),lQt=0,lSt=0;
    [1,2,3].forEach(function(n){var P=ldP2[n-1],Q=P*0.30,S=Math.sqrt(P*P+Q*Q);lQt+=Q;lSt+=S;
      s+=tag('LoadPM_Power_Q'+n+'_kVAr',f(Q))+tag('LoadPM_Power_S'+n+'_kVA',f(S));});
    s += tag('LoadPM_Total_Q_kVAr',f(lQt))+tag('LoadPM_Total_S_kVA',f(lSt))+tag('LoadPM_Import_kWh',f(m.eLoad*30,1));
    // WindPM Q/S/totals/todate
    var wtP2=p3(m.wind),wQt=0,wSt=0;
    [1,2,3].forEach(function(n){var P=wtP2[n-1],Q=P*0.20,S=Math.sqrt(P*P+Q*Q);wQt+=Q;wSt+=S;
      s+=tag('WindPM_Power_Q'+n+'_kVAr',f(Q))+tag('WindPM_Power_S'+n+'_kVA',f(S));});
    s += tag('WindPM_Total_Q_kVAr',f(wQt))+tag('WindPM_Total_S_kVA',f(wSt))+tag('WindPM_Import_kWh',f(m.eWind*30,1));
    // GCI1 / GCI2 detail (split the combined GCI between the two units)
    var split=[0.55,0.45];
    [1,2].forEach(function(g){
      var acKW=m.gciAC*split[g-1], pvKW=m.gciPV*split[g-1];
      s+=tag('GCI'+g+'_Sum_PV_kW',f(pvKW))+tag('GCI'+g+'_AC_Power_kW',f(acKW));
      for(var st=1;st<=4;st++){
        var sp=pvKW/4*(0.9+0.2*Math.random()), sv2=m.sf>0?(580+r(-20,30)):0;
        s+=tag('GCI'+g+'_PV'+st+'_Voltage',f(sv2,1))
          +tag('GCI'+g+'_PV'+st+'_Current',f(sv2>0?sp*1000/sv2:0,2))
          +tag('GCI'+g+'_PV'+st+'_Power_kW',f(sp));
      }
      [1,2,3].forEach(function(n){s+=tag('GCI'+g+'_AC_Voltage_L'+n,V())
        +tag('GCI'+g+'_AC_Current_I'+n,f(acKW*1000/3/230,2));});
      s+=tag('GCI'+g+'_Today_PV_kWh',f(m.eSolar*0.8*split[g-1],1))
        +tag('GCI'+g+'_Todate_PV_kWh',f(m.eSolar*0.8*split[g-1]*60,1));
    });

    s += '</Main>';
    return s;
  }

  function energyXml(){
    const m = model();
    let s = '<Energylog>';
    s += tag('DateServer',m.ds)+tag('TimeServer',m.ts);
    s += tag('PV_kWh',f(m.eSolar,1))+tag('GCI1_AC_kWh',f(m.eSolar*0.4,2))+tag('GCI2_AC_kWh',f(m.eSolar*0.4,2));
    s += tag('SCC_PV_kWh',f(m.eSolar*0.2,2))+tag('WindPM_Import_kWh',f(m.eWind,2));
    s += tag('LoadPM_Import_kWh',f(m.eLoad,2))+tag('Load_kWh',f(m.eLoad,2))+tag('ACin_kWh',f(m.eGrid,2));
    s += tag('Today_CO2_emission_kgCO2e',f(m.eCO2,1))+tag('Today_CO2_kg',f(m.eCO2,1));
    s += '</Energylog>';
    return s;
  }

  function batteryXml(){
    const m = model();
    let s = '<Battery>'+tag('DateServer',m.ds)+tag('TimeServer',m.ts);
    [['HVB1', m.soc, m.batDC<0?Math.abs(m.battI)*0.5+8 : -(Math.abs(m.battI)*0.5+6)],
     ['HVB2', clamp(m.soc-4,30,95), m.batDC<0?Math.abs(m.battI)*0.5+6 : -(Math.abs(m.battI)*0.5+5)]
    ].forEach(([P, soc, cur])=>{
      const baseV = 3.300 + 0.015*Math.sin(Date.now()/9000);
      const avgT  = 30 + 8*m.sf + r(-0.5,0.5);
      s += tag(P+'_SOC',f(soc,1))+tag(P+'_SOH',f(96+r(-1,1),0));
      s += tag(P+'_Bus_V',f(m.battV+r(-1,1),1))+tag(P+'_Avg_V',f(m.battV,1));
      s += tag(P+'_Batt_I',f(cur,1))+tag(P+'_Batt_kW',f(cur*m.battV/1000,2));
      s += tag(P+'_Avg_cV',f(baseV,3))+tag(P+'_Avg_cT',f(avgT,1));
      s += tag(P+'_Max_cV',f(baseV+0.11,3))+tag(P+'_Min_cV',f(baseV-0.09,3))+tag(P+'_Max_Diff_cV',f(0.20,3));
      s += tag(P+'_Max_cT',f(avgT+9,1));
      s += tag(P+'_Lo_Mx_cV_MD','2')+tag(P+'_Lo_Mx_cV_Cell','9');
      s += tag(P+'_Lo_Mn_cV_MD','3')+tag(P+'_Lo_Mn_cV_Cell','13');
      s += tag(P+'_Lo_Mx_cT_MD','1')+tag(P+'_Lo_Mx_cT_Cell','5');
      s += tag(P+'_Control_Status', cur>=0?'Charging':'Discharging')+tag(P+'_state','Run');
      s += tag(P+'_N_Alarm','0')+tag(P+'_N_Flault','0')+tag('Datetime_'+P, m.ds+' '+m.ts);
      // HVB box controller probe (string-level, 1 sensor inside the HV box)
      const _bt = (avgT - 3) + r(-1.5,1.5);
      s += tag(`${P}_cT1`, f(_bt,1));
      for(let mod=1;mod<=14;mod++){
        for(let c=1;c<=16;c++){
          let v = baseV + r(-0.025,0.025);
          if(c===4)  v = baseV + 0.07;     // drift → yellow
          if(c===9)  v = baseV + 0.11;     // imbalanced → orange
          if(c===13) v = baseV - 0.09;     // imbalanced → orange
          s += tag(`${P}_Batt${mod}_cV${c}`, f(v,3));
        }
        // cT1..cT6 = the 6 cell-temperature probes inside each battery module
        for(let c=1;c<=6;c++){
          let t = avgT + r(-1.5,1.5);
          if(c===5) t = avgT + 9;   // one hotspot for visibility
          s += tag(`${P}_Batt${mod}_cT${c}`, f(t,1));
        }
        s += tag(`${P}_Batt${mod}_SOH`, f(95+r(-2,3),0))+tag(`${P}_Batt${mod}_Ah`, f(103+r(0,3),1));
        s += tag(`${P}_Batt${mod}_FET`,'ON')+tag(`${P}_Batt${mod}_Control_State`,'Normal');
      }
    });
    s += '</Battery>';
    return s;
  }

  const _fetch = window.fetch.bind(window);
  window.fetch = function(input, init){
    const url = (typeof input === 'string') ? input : (input && input.url) || '';
    let body = null;
    if(/Main\.xml/i.test(url))           body = mainXml();
    else if(/Battery\.xml/i.test(url))   body = batteryXml();
    else if(/Energylog\.xml/i.test(url)) body = energyXml();
    if(body !== null){
      return Promise.resolve(new Response(body, {
        status: 200, headers: { 'Content-Type': 'application/xml' }
      }));
    }
    return _fetch(input, init);
  };

  // Visible "SIMULATION" ribbon so it's never mistaken for live data
  document.addEventListener('DOMContentLoaded', function(){
    const b = document.createElement('div');
    b.textContent = 'SIMULATION MODE — generated data (?sim=1)';
    b.style.cssText = 'position:fixed;top:0;left:0;right:0;z-index:9999;background:#f59e0b;color:#1a1a1a;'
      + 'font:600 11px/1.6 DM Sans,system-ui,sans-serif;text-align:center;letter-spacing:.4px;'
      + 'padding:3px 8px;text-transform:uppercase';
    document.body.appendChild(b);
    document.body.style.paddingTop = '26px';
  });

  console.info('[sim.js] SIMULATION MODE active — fetch() patched for Main/Battery/Energylog XML');
})();
