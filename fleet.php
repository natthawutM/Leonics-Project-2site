<?php
$COOKIE_NAME = 'moc_user';
function isLoggedIn(){
  global $COOKIE_NAME;
  if(!isset($_COOKIE[$COOKIE_NAME]) || $_COOKIE[$COOKIE_NAME] === '') return false;
  $parts = explode('|', $_COOKIE[$COOKIE_NAME]);
  if(count($parts) !== 2) return false;
  return $parts[1] === md5($parts[0] . 'leonics_moc_salt_2024');
}
function getUsername(){
  global $COOKIE_NAME;
  if(!isset($_COOKIE[$COOKIE_NAME])) return '';
  $parts = explode('|', $_COOKIE[$COOKIE_NAME]);
  return $parts[0];
}
// ปิดการใช้งาน login: อนุญาตให้เข้าใช้งานหน้า fleet/dashboard ได้ทันทีโดยไม่ต้องล็อกอิน
// if(!isLoggedIn()){ header('Location: /BELB_Sabah/login.php'); exit(); }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Leonics MOC - Fleet Overview</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#f5f5f0;--card:#fff;--panel:#fafaf7;--border:#e8e6df;--text:#1a1a1a;--sub:#888;--hint:#aaa;--success:#22c55e;--danger:#ef4444;--warning:#f59e0b;--info:#3b82f6;--radius:12px;--font:'DM Sans',system-ui,sans-serif;--mono:'DM Mono',monospace}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:var(--font);background:var(--bg);color:var(--text);font-size:13px;line-height:1.5;min-height:100vh}
.header{background:#1a1a1a;color:#f5f5f0;padding:0 24px;height:48px;display:flex;align-items:center;justify-content:space-between}
.header .brand{display:flex;align-items:center;gap:10px;font-size:14px;font-weight:500}
.header .nav{display:flex;gap:4px}
.header .nav a{color:#999;text-decoration:none;font-size:13px;font-weight:500;padding:6px 14px;border-radius:8px;transition:all .12s}
.header .nav a:hover{color:#fff;background:rgba(255,255,255,.08)}
.header .nav a.active{color:#fff;background:rgba(255,255,255,.15)}
.page{max-width:1000px;margin:0 auto;padding:24px 20px}
h1{font-size:22px;font-weight:700;margin-bottom:4px}
.subtitle{font-size:13px;color:var(--sub);margin-bottom:20px}
.grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.site-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:16px 18px;cursor:pointer;transition:box-shadow .15s,border-color .15s;text-decoration:none;color:inherit;display:block}
.site-card:hover{box-shadow:0 2px 12px rgba(0,0,0,.06);border-color:#ccc}
.site-card.offline{opacity:.55}
.sc-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}
.sc-badge{font-size:11px;padding:3px 9px;border-radius:10px;font-weight:500}
.sc-badge-offgrid{background:rgba(245,158,11,.1);color:var(--warning)}
.sc-type{font-size:11px;color:var(--sub)}
.sc-name{font-size:15px;font-weight:600;margin-bottom:2px}
.sc-loc{font-size:12px;color:var(--sub);margin-bottom:12px}
.sc-kpis{display:grid;grid-template-columns:repeat(4,1fr);gap:6px;margin-bottom:10px}
.sc-kpi{background:var(--panel);border-radius:6px;padding:7px 9px}
.sc-kpi .lbl{font-size:10px;font-weight:500;color:var(--hint);text-transform:uppercase;letter-spacing:.3px}
.sc-kpi .val{font-family:var(--mono);font-size:15px;font-weight:600;margin-top:1px}
.sc-kpi .val .u{font-size:10px;color:var(--sub);margin-left:1px}
.sc-status{display:flex;justify-content:space-between;align-items:center}
.sc-pill{display:flex;align-items:center;gap:6px;font-size:12px;font-weight:500}
.sc-dot{width:6px;height:6px;border-radius:50%}
.sc-dot-ok{background:var(--success)}
.sc-dot-err{background:var(--danger)}
.sc-time{font-size:11px;color:var(--hint);font-family:var(--mono)}
@media(max-width:700px){.grid{grid-template-columns:1fr}.sc-kpis{grid-template-columns:repeat(2,1fr)}}
@media(max-width:480px){.page{padding:16px 12px}.header{padding:0 12px}}
</style>
</head>
<body>

<div class="header">
  <div class="brand">Leonics MOC</div>
  <div style="display:flex;align-items:center;gap:16px;">
    <div class="nav">
      <a href="fleet.php" class="active">My sites</a>
      <a href="compare.php">Compare</a>
    </div>
    <span style="color:#888;font-size:12px"><?php echo htmlspecialchars(getUsername()); ?></span>
    <a href="/BELB_Sabah/logout.php" style="color:#888;font-size:12px;text-decoration:none;padding:4px 10px;border:1px solid #555;border-radius:6px;">Logout</a>
  </div>
</div>

<div class="page">
  <h1>My sites</h1>
  <div class="subtitle">2 sites - BELB Off-Grid Hybrid - Sabah, Malaysia</div>
  <div class="grid" id="fleet"></div>
</div>

<script>
const SITES = [
  { id: 1, name: 'Tetabuan', loc: 'Sabah, Malaysia', path: '/BELB_Sabah/Tetabuan_MYS/f1/', proxyType: 'Tetabuan' },
  { id: 2, name: 'Terusan', loc: 'Sabah, Malaysia', path: '/BELB_Sabah/Terusan_MYS/f1/', proxyType: 'Terusan' },
];

function num(xml, tag){
  const el = xml.querySelector(tag);
  if(!el) return null;
  const t = el.textContent.trim();
  if(t === '' || t === 'err' || t === 'Err' || isNaN(parseFloat(t))) return null;
  return parseFloat(t);
}

function fmt(v, d=1){
  return v === null ? '-' : Number(v).toFixed(d);
}

function buildProxyUrl(site, what){
  const suffix = what === 'alarm' ? '&what=alarm' : '&what=main';
  return `f1/proxy.php?type=${encodeURIComponent(site.proxyType)}${suffix}&_=${Date.now()}`;
}

function sumNums(xml, tags){
  let total = 0;
  let found = false;
  tags.forEach(tag => {
    const value = num(xml, tag);
    if(value !== null){
      total += value;
      found = true;
    }
  });
  return found ? total : null;
}

function firstNum(xml, tags){
  for(const tag of tags){
    const value = num(xml, tag);
    if(value !== null) return value;
  }
  return null;
}

function hasXmlError(xml){
  const err = xml && xml.querySelector('error');
  return !!(err && err.textContent.trim());
}

function extractSiteMetrics(xml){
  if(!xml || hasXmlError(xml)) return null;

  const solar = firstNum(xml, ['PV_kW'])
    ?? sumNums(xml, ['SCC1_Chg_Power_kW', 'SCC2_Chg_Power_kW', 'SCC3_Chg_Power_kW', 'SCC4_Chg_Power_kW'])
    ?? sumNums(xml, ['GCI1_Sum_PV_kW', 'GCI2_Sum_PV_kW', 'GCI3_Sum_PV_kW', 'GCI4_Sum_PV_kW']);

  const gen = sumNums(xml, ['Gen1_Total_Power_kW', 'Gen2_Total_Power_kW'])
    ?? firstNum(xml, ['ACin_PM_Total_P_kW', 'Ctrl_PM_Total_P_kW']);

  const load = firstNum(xml, ['Load_PM_Total_P_kW'])
    ?? sumNums(xml, ['BDI1_Load_Total_Power_kW', 'BDI2_Load_Total_Power_kW']);

  let soc = num(xml, 'BDI_BDI_SOC');
  if(soc === null){
    const socValues = ['BDI1_BDI_SOC', 'BDI2_BDI_SOC']
      .map(tag => num(xml, tag))
      .filter(v => v !== null);
    soc = socValues.length ? socValues.reduce((a, b) => a + b, 0) / socValues.length : null;
  }

  const ts = xml.querySelector('TimeServer');
  return {
    solar,
    gen,
    load,
    soc,
    timeServer: ts ? ts.textContent.trim() : ''
  };
}

async function fetchAlarm(site){
  try{
    const res = await fetch(buildProxyUrl(site, 'alarm'), {cache:'no-store'});
    if(!res.ok) return null;
    const xml = new DOMParser().parseFromString(await res.text(), 'text/xml');
    const countEl = xml.querySelector('Count');
    const msgEl = xml.querySelector('AlarmRun');
    return {
      count: countEl ? parseInt(countEl.textContent, 10) || 0 : 0,
      msg: msgEl ? msgEl.textContent.trim() : ''
    };
  }catch(e){
    return null;
  }
}

function buildCard(site, data, alarm){
  const metrics = extractSiteMetrics(data);
  const online = metrics !== null;
  const solar = online ? metrics.solar : null;
  const gen = online ? metrics.gen : null;
  const load = online ? metrics.load : null;
  const soc = online ? metrics.soc : null;
  const timeStr = online && metrics.timeServer ? metrics.timeServer : '-';

  const hasAlarm = alarm && alarm.count > 0;
  const alarmBadge = hasAlarm
    ? `<div style="background:#fef2f2;border:1px solid #fecaca;border-radius:6px;padding:5px 10px;margin-top:8px;font-size:11px;color:#b91c1c;display:flex;align-items:center;gap:6px"><span style="font-size:14px">&#9888;</span>${alarm.msg}</div>`
    : '';

  return `<a class="site-card ${online?'':'offline'}" href="/BELB_Sabah/menu.html?site=${site.id}" target="_top">
    <div class="sc-top">
      <span class="sc-badge sc-badge-offgrid">Off-Grid</span>
      <span class="sc-type">Solar+Bat+Gen</span>
    </div>
    <div class="sc-name">${site.name}</div>
    <div class="sc-loc">${site.loc}</div>
    <div class="sc-kpis">
      <div class="sc-kpi"><div class="lbl">Solar</div><div class="val" style="color:${solar > 0.5 ? '#f59e0b' : ''}">${fmt(solar)}<span class="u">kW</span></div></div>
      <div class="sc-kpi"><div class="lbl">Gen</div><div class="val" style="color:${gen > 0.5 ? '#ea580c' : ''}">${fmt(gen)}<span class="u">kW</span></div></div>
      <div class="sc-kpi"><div class="lbl">Load</div><div class="val" style="color:${load > 0.5 ? '#3b82f6' : ''}">${fmt(load)}<span class="u">kW</span></div></div>
      <div class="sc-kpi"><div class="lbl">SOC</div><div class="val" style="color:${soc !== null ? (soc < 20 ? '#ef4444' : soc < 50 ? '#f59e0b' : '#22c55e') : ''}">${soc !== null ? Math.round(soc) : '-'}<span class="u">%</span></div></div>
    </div>
    <div class="sc-status">
      <div class="sc-pill"><span class="sc-dot ${online?'sc-dot-ok':'sc-dot-err'}"></span>${online?'Online':'Offline'}</div>
      <div class="sc-time">${timeStr}</div>
    </div>
    ${alarmBadge}
  </a>`;
}

async function fetchSite(site){
  try{
    const res = await fetch(buildProxyUrl(site, 'main'), {cache:'no-store'});
    if(!res.ok) return null;
    const text = await res.text();
    const xml = new DOMParser().parseFromString(text, 'text/xml');
    return hasXmlError(xml) ? null : xml;
  }catch(e){
    return null;
  }
}

async function refresh(){
  const results = await Promise.all(SITES.map(s => fetchSite(s)));
  const alarms = await Promise.all(SITES.map(s => fetchAlarm(s)));
  let html = '';
  SITES.forEach((site, i) => {
    html += buildCard(site, results[i], alarms[i]);
  });
  document.getElementById('fleet').innerHTML = html;
}

refresh();
setInterval(refresh, 5000);
</script>
</body>
</html>
