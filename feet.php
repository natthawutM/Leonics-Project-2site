<?php
// ============================================================
// feet.php — Master menu (TNBES-style) for Johor Port fleet
// Wraps two sites: UPS_Parallels (port 52080) + Charger110v75A (port 51080)
// Replaces the legacy Johor_Port/menu.php
// ============================================================
if ($_COOKIE['id'] == "") {
  header("Location: http://www.leonics-moc.com/index22.php");
  exit();
}
if (!(($_COOKIE['mocs'] == "company166" || $_COOKIE['mocs'] == "allcompany"))) {
  header("Location: http://www.leonics-moc.com/index22.php");
  exit();
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<title>Leonics MOC · Johor Port</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
  --bg-main:#f5f5f0;
  --bg-card:#ffffff;
  --bg-panel:#fafaf7;
  --bg-dark:#1a1a1a;
  --border-default:#e8e6df;
  --text-primary:#1a1a1a;
  --text-secondary:#888;
  --text-tertiary:#aaa;
  --text-on-dark:#f5f5f0;
  --success:#22c55e;
  --warning:#f59e0b;
  --danger:#ef4444;
  --info:#3b82f6;
  --radius-md:8px;
  --radius-lg:12px;
  --font-sans:'DM Sans',system-ui,-apple-system,sans-serif;
  --font-mono:'DM Mono',ui-monospace,monospace;
  --header-h:48px;
  --site-h:42px;
  --nav-h:42px;
  --switch-h:38px;
}
*{box-sizing:border-box}
html,body{margin:0;padding:0;height:100%}
body{
  font-family:var(--font-sans);
  background:var(--bg-main);
  color:var(--text-primary);
  font-size:13px;
  line-height:1.5;
  overflow:hidden;
}
.mono{font-family:var(--font-mono);font-feature-settings:"tnum" 1}

/* ---------- TOP HEADER (dark) ---------- */
.app-header{
  height:var(--header-h);
  background:var(--bg-dark);
  color:var(--text-on-dark);
  display:flex;align-items:center;justify-content:space-between;
  padding:0 20px;position:relative;z-index:30;
}
.brand{display:flex;align-items:center;gap:10px}
.brand-logo{
  width:26px;height:26px;border-radius:6px;
  background:var(--bg-card);padding:4px;display:flex;align-items:center;justify-content:center;
}
.brand-logo img{width:100%;height:100%;object-fit:contain;display:block}
.brand-text{font-size:13px;font-weight:500;letter-spacing:0.2px}
.brand-text .sub{color:#888;font-weight:400;margin-left:6px}

.header-right{display:flex;align-items:center;gap:12px}
.live-stamp{display:flex;align-items:center;gap:8px;font-size:11px;color:#bbb}
.live-stamp .live-dot{
  width:7px;height:7px;border-radius:50%;background:var(--success);
  animation:pulse 1.6s ease-in-out infinite;
}
.live-stamp .ts{font-family:var(--font-mono);color:#f5f5f0}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.4;transform:scale(.7)}}

/* Bell button */
.bell-wrap{position:relative}
.bell-btn{
  appearance:none;border:none;cursor:pointer;
  background:rgba(255,255,255,0.08);
  color:#f5f5f0;width:34px;height:30px;border-radius:var(--radius-md);
  display:inline-flex;align-items:center;justify-content:center;
  transition:background .15s;
  position:relative;
}
.bell-btn:hover{background:rgba(255,255,255,0.16)}
.bell-btn svg{width:15px;height:15px}
.bell-btn.warn{background:rgba(245,158,11,0.25);color:#fbbf24}
.bell-btn.crit{background:rgba(239,68,68,0.30);color:#fca5a5;animation:bellpulse 1.2s ease-in-out infinite}
@keyframes bellpulse{
  0%,100%{box-shadow:0 0 0 0 rgba(239,68,68,0.4)}
  50%{box-shadow:0 0 0 6px rgba(239,68,68,0)}
}
.bell-badge{
  position:absolute;top:-3px;right:-3px;
  min-width:16px;height:16px;padding:0 4px;border-radius:8px;
  background:var(--danger);color:#fff;
  font-family:var(--font-mono);font-size:10px;font-weight:600;
  display:flex;align-items:center;justify-content:center;
  border:1.5px solid var(--bg-dark);
}
.bell-badge.warn{background:var(--warning)}
.bell-badge.hidden{display:none}

/* Bell dropdown panel */
.bell-panel{
  position:absolute;top:38px;right:0;
  width:340px;max-height:420px;
  background:var(--bg-card);color:var(--text-primary);
  border:1px solid var(--border-default);border-radius:var(--radius-lg);
  box-shadow:0 8px 24px rgba(0,0,0,0.18);
  overflow:hidden;display:none;z-index:50;
}
.bell-panel.open{display:flex;flex-direction:column}
.bell-panel-head{
  padding:10px 14px;border-bottom:1px solid var(--border-default);
  display:flex;justify-content:space-between;align-items:center;
}
.bell-panel-head .t{font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:0.4px}
.bell-panel-head .c{font-size:11px;color:var(--text-secondary)}
.bell-panel-list{flex:1;overflow-y:auto;padding:4px 0}
.bell-item{
  padding:10px 14px;border-bottom:1px solid var(--bg-panel);
  display:flex;align-items:flex-start;gap:10px;cursor:pointer;
  transition:background .12s;
}
.bell-item:hover{background:var(--bg-panel)}
.bell-item:last-child{border-bottom:none}
.bell-item .sev{
  flex-shrink:0;width:8px;height:8px;border-radius:50%;margin-top:5px;
}
.bell-item .sev.crit{background:var(--danger)}
.bell-item .sev.warn{background:var(--warning)}
.bell-item .sev.info{background:var(--info)}
.bell-item .body{flex:1;min-width:0}
.bell-item .src{font-size:10px;font-weight:500;color:var(--text-secondary);text-transform:uppercase;letter-spacing:0.3px}
.bell-item .msg{font-size:12px;font-weight:500;margin-top:2px;color:var(--text-primary)}
.bell-item .when{font-size:10px;color:var(--text-tertiary);font-family:var(--font-mono);margin-top:2px}
.bell-empty{padding:24px;text-align:center;color:var(--text-tertiary);font-size:12px}
.bell-foot{
  padding:8px 14px;border-top:1px solid var(--border-default);
  text-align:center;
}
.bell-foot a{color:var(--info);font-size:12px;text-decoration:none;font-weight:500}
.bell-foot a:hover{text-decoration:underline}

/* Logout */
.logout-btn{
  display:flex;align-items:center;gap:6px;
  padding:6px 12px;border-radius:var(--radius-md);
  background:rgba(255,255,255,0.08);color:#f5f5f0;
  text-decoration:none;font-size:12px;font-weight:500;
  transition:background .15s;
}
.logout-btn:hover{background:rgba(255,255,255,0.16)}
.logout-btn svg{width:14px;height:14px}

/* ---------- CRITICAL ALARM BANNER (Tier 2) ---------- */
.crit-banner{
  background:#7f1d1d;color:#fef2f2;
  padding:8px 20px;display:none;align-items:center;justify-content:space-between;
  gap:12px;font-size:12px;font-weight:500;
  border-bottom:1px solid #991b1b;
  position:relative;z-index:20;
  animation:critslide .25s ease-out;
}
@keyframes critslide{from{transform:translateY(-100%)}to{transform:translateY(0)}}
.crit-banner.show{display:flex}
.crit-banner .left{display:flex;align-items:center;gap:10px;flex:1;min-width:0}
.crit-banner .icon{
  width:22px;height:22px;border-radius:50%;background:rgba(239,68,68,0.4);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
  animation:pulse 1.4s ease-in-out infinite;
}
.crit-banner .icon svg{width:13px;height:13px;color:#fff}
.crit-banner .msg{flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.crit-banner .msg b{color:#fff;margin-right:4px}
.crit-banner .actions{display:flex;gap:6px;flex-shrink:0}
.crit-banner .btn{
  background:rgba(255,255,255,0.12);color:#fff;border:none;
  padding:4px 10px;border-radius:6px;font-size:11px;font-weight:500;
  cursor:pointer;text-decoration:none;font-family:inherit;
}
.crit-banner .btn:hover{background:rgba(255,255,255,0.22)}

/* ---------- SITE BAR ---------- */
.site-bar{
  background:var(--bg-card);
  border-bottom:1px solid var(--border-default);
  padding:8px 20px;
  display:flex;align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:8px;
  min-height:var(--site-h);
  position:relative;z-index:10;
}
.site-info{display:flex;align-items:center;gap:10px;flex-wrap:wrap;flex:1;min-width:0}
.type-badge{
  display:inline-flex;align-items:center;gap:5px;
  padding:3px 9px;border-radius:10px;
  background:rgba(59,130,246,0.10);color:var(--info);
  font-size:11px;font-weight:500;
}
.site-name{font-size:14px;font-weight:600;color:var(--text-primary)}
.site-loc{font-size:12px;color:var(--text-secondary)}
.status-pill{
  display:inline-flex;align-items:center;gap:6px;
  padding:3px 9px;border-radius:10px;
  background:rgba(34,197,94,0.10);color:var(--success);
  font-size:11px;font-weight:500;
}
.status-pill .dot{width:6px;height:6px;border-radius:50%;background:var(--success)}
.status-pill.offline{background:rgba(239,68,68,0.10);color:var(--danger)}
.status-pill.offline .dot{background:var(--danger)}

/* ---------- ROW 1: SITE SWITCHER ---------- */
.switch-bar{
  background:var(--bg-card);
  border-bottom:1px solid var(--border-default);
  height:var(--switch-h);
  padding:0 20px;
  display:flex;align-items:center;gap:6px;
  position:relative;z-index:10;
}
.switch-label{
  font-size:10px;color:var(--text-secondary);
  text-transform:uppercase;letter-spacing:0.4px;font-weight:500;
  margin-right:8px;
}
.switch-btn{
  appearance:none;border:1px solid var(--border-default);
  background:transparent;color:var(--text-secondary);
  font-family:inherit;font-size:12px;font-weight:500;
  padding:5px 12px;border-radius:14px;cursor:pointer;
  display:inline-flex;align-items:center;gap:6px;
  transition:background .12s,border-color .12s,color .12s;
}
.switch-btn:hover{background:var(--bg-panel);color:var(--text-primary)}
.switch-btn.active{background:var(--bg-dark);color:#fff;border-color:var(--bg-dark)}
.switch-btn .ico{width:13px;height:13px}
.switch-btn .alarm-dot{
  width:6px;height:6px;border-radius:50%;background:var(--danger);
  margin-left:2px;animation:pulse 1.4s ease-in-out infinite;
}
.switch-btn .alarm-dot.warn{background:var(--warning)}
.switch-btn .alarm-dot.hidden{display:none}

/* ---------- ROW 2: NAV TABS ---------- */
.nav-bar{
  background:var(--bg-card);
  border-bottom:1px solid var(--border-default);
  height:var(--nav-h);
  padding:0 20px;
  display:flex;align-items:center;gap:4px;
  overflow-x:auto;
  -webkit-overflow-scrolling:touch;
  scrollbar-width:none;
}
.nav-bar::-webkit-scrollbar{display:none}
.nav-btn{
  appearance:none;background:transparent;border:none;
  color:var(--text-secondary);
  font-family:inherit;font-size:13px;font-weight:500;
  padding:7px 14px;border-radius:var(--radius-md);
  cursor:pointer;white-space:nowrap;
  transition:background .12s,color .12s;
  text-decoration:none;display:inline-flex;align-items:center;gap:6px;
}
.nav-btn:hover{background:var(--bg-panel);color:var(--text-primary)}
.nav-btn.active{background:var(--bg-dark);color:#fff}
.nav-btn .ico{width:14px;height:14px;display:inline-flex}
.nav-btn .ico svg{width:100%;height:100%}

/* ---------- MAIN IFRAME ---------- */
.app-main{
  position:absolute;
  top:var(--header-h);
  left:0;right:0;bottom:0;
  display:flex;flex-direction:column;
}
.app-main > .crit-banner,
.app-main > .site-bar,
.app-main > .switch-bar,
.app-main > .nav-bar{flex:0 0 auto}
.frame-wrap{
  flex:1 1 auto;
  background:var(--bg-main);
  overflow:hidden;
  min-height:0;
}
.frame-wrap iframe{
  width:100%;height:100%;border:0;display:block;background:var(--bg-main);
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 1024px){
  .nav-btn{padding:7px 12px}
  .bell-panel{width:300px}
}
@media (max-width: 768px){
  .brand-text .sub{display:none}
  .site-bar{padding:7px 12px}
  .switch-bar{padding:0 12px}
  .nav-bar{padding:0 12px;gap:2px}
  .nav-btn{padding:6px 11px;font-size:12px}
  .switch-label{display:none}
  .logout-btn{padding:5px 10px;font-size:11px}
  .crit-banner{padding:7px 12px;font-size:11px}
}
@media (max-width: 600px){
  :root{--header-h:44px;--site-h:38px;--nav-h:38px;--switch-h:34px}
  .app-header{padding:0 10px}
  .brand-logo{width:22px;height:22px}
  .brand-text{font-size:12px}
  .live-stamp .ts{font-size:10px}
  .live-stamp .label{display:none}
  .site-loc{display:none}
  .site-bar{padding:6px 10px;gap:6px}
  .site-name{font-size:13px}
  .type-badge,.status-pill{font-size:10px;padding:2px 7px}
  .switch-bar{padding:0 10px;gap:4px}
  .switch-btn{padding:4px 10px;font-size:11px}
  .nav-bar{padding:0 10px;gap:2px}
  .nav-btn{padding:5px 10px;font-size:12px;gap:5px}
  .nav-btn .ico{width:12px;height:12px}
  .logout-btn{padding:5px 9px}
  .bell-panel{width:calc(100vw - 20px);right:-10px}
  .crit-banner .actions .btn{padding:3px 8px;font-size:10px}
}
@media (max-width: 420px){
  .brand-text{font-size:11px}
  .live-stamp{gap:4px}
  .live-stamp .ts{font-size:9px}
  .logout-btn{padding:6px 8px;font-size:0}
  .logout-btn svg{width:14px;height:14px}
  .nav-btn{padding:5px 9px;font-size:11px}
  .crit-banner .msg{font-size:10px}
}
</style>
</head>
<body>

<header class="app-header">
  <div class="brand">
    <div class="brand-logo"><img src="f1/image/leo.svg" alt="Leonics"></div>
    <div class="brand-text">
      Leonics MOC <span class="sub">· Johor Port</span>
    </div>
  </div>

  <div class="header-right">
    <div class="live-stamp">
      <span class="live-dot"></span>
      <span class="label">Live</span>
      <span class="ts" id="header-ts">—</span>
    </div>

    <!-- Bell (Tier 1 alarm) -->
    <div class="bell-wrap">
      <button id="bell-btn" class="bell-btn" title="Alarms" aria-label="Alarms">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
        <span id="bell-badge" class="bell-badge hidden">0</span>
      </button>
      <div id="bell-panel" class="bell-panel">
        <div class="bell-panel-head">
          <span class="t">Active alarms</span>
          <span class="c" id="bell-panel-count">0 total</span>
        </div>
        <div class="bell-panel-list" id="bell-panel-list">
          <div class="bell-empty">No active alarms</div>
        </div>
        <div class="bell-foot">
          <a href="#" id="bell-view-all" target="IF_m">View full alarm log →</a>
        </div>
      </div>
    </div>

    <a href="../logout.php" target="_parent" class="logout-btn" title="Logout">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
        <polyline points="16 17 21 12 16 7"/>
        <line x1="21" y1="12" x2="9" y2="12"/>
      </svg>
      Logout
    </a>
  </div>
</header>

<div class="app-main">

  <!-- Critical alarm banner (Tier 2) — hidden by default -->
  <div class="crit-banner" id="crit-banner">
    <div class="left">
      <div class="icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      </div>
      <div class="msg" id="crit-msg"><b>CRITICAL</b> Alarm detected</div>
    </div>
    <div class="actions">
      <a href="#" id="crit-details" class="btn" target="IF_m">Details</a>
      <button class="btn" onclick="document.getElementById('crit-banner').classList.remove('show')">Dismiss</button>
    </div>
  </div>

  <!-- Site bar -->
  <div class="site-bar">
    <div class="site-info">
      <span class="type-badge" id="site-type">—</span>
      <span class="site-name" id="site-name">—</span>
      <span class="site-loc" id="site-sub">—</span>
    </div>
    <span class="status-pill" id="site-status"><span class="dot"></span>online</span>
  </div>

  <!-- Row 1: Site switcher -->
  <div class="switch-bar">
    <span class="switch-label">Site</span>
    <button class="switch-btn" data-site="ups">
      <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="11" rx="2"/><line x1="6" y1="11" x2="6" y2="14"/><line x1="10" y1="11" x2="10" y2="14"/><line x1="14" y1="11" x2="14" y2="14"/></svg>
      UPS Parallel
      <span class="alarm-dot hidden" id="switch-alarm-ups"></span>
    </button>
    <button class="switch-btn" data-site="charger">
      <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3l14 9-14 9V3z"/></svg>
      110Vdc Charger
      <span class="alarm-dot hidden" id="switch-alarm-charger"></span>
    </button>
  </div>

  <!-- Row 2: Page tabs -->
  <nav class="nav-bar" id="navbar"></nav>

  <!-- iframe -->
  <div class="frame-wrap">
    <iframe name="IF_m" id="IF_m" scrolling="auto"></iframe>
  </div>

</div>

<script>
// ============================================================
// SITE CONFIGURATION
// ============================================================
const SITES = {
  ups: {
    name: 'UPS Wisma A (Server Room)',
    sub:  'Two UPS in parallel · shared SoNick battery bank',
    type: '3-Phase Parallel UPS',
    base: 'http://www.leonics-moc.com:52080/UPS_Parallels/f1/',
    proxyType: 'UPS',
    pages: [
      { label:'Dashboard', file:'dash.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>' },
      { label:'UPS-1', file:'ups.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="11" rx="2"/><line x1="6" y1="11" x2="6" y2="14"/><line x1="10" y1="11" x2="10" y2="14"/><line x1="14" y1="11" x2="14" y2="14"/></svg>' },
      { label:'UPS-2', file:'ups2.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="11" rx="2"/><line x1="6" y1="11" x2="6" y2="14"/><line x1="10" y1="11" x2="10" y2="14"/><line x1="14" y1="11" x2="14" y2="14"/></svg>' },
      { label:'Battery', file:'batt.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="18" height="12" rx="2"/><line x1="22" y1="11" x2="22" y2="13"/></svg>' },
      { label:'Power', file:'graph.php',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 17 9 11 13 15 21 7"/><polyline points="14 7 21 7 21 14"/></svg>' },
      { label:'Alarms', file:'alarms.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>' },
      { label:'Download', file:'data/data.php',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>' },
    ]
  },
  charger: {
    name: 'Charger 110Vdc 75A System',
    sub:  'DC charger · 10 battery modules · 2 racks',
    type: 'DC Charger System',
    base: 'http://www.leonics-moc.com:51080/Charger110v75A/f1/',
    proxyType: 'Charger',
    pages: [
      { label:'Dashboard', file:'dash.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>' },
      { label:'Charger', file:'charger.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3l14 9-14 9V3z"/></svg>' },
      { label:'Battery 1-5', file:'batt1-5.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="18" height="12" rx="2"/><line x1="22" y1="11" x2="22" y2="13"/></svg>' },
      { label:'Battery 6-10', file:'batt6-10.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="18" height="12" rx="2"/><line x1="22" y1="11" x2="22" y2="13"/></svg>' },
      { label:'Power', file:'graph.php',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 17 9 11 13 15 21 7"/><polyline points="14 7 21 7 21 14"/></svg>' },
      { label:'Alarms', file:'alarms.html',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>' },
      { label:'Download', file:'data/data.php',
        icon:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>' },
    ]
  }
};

// ============================================================
// COOKIE HELPERS
// ============================================================
function getCookie(name){
  var m = document.cookie.match(new RegExp('(?:^|;\\s*)' + name + '=([^;]+)'));
  return m ? decodeURIComponent(m[1]) : '';
}
function setCookie(name, val, days){
  document.cookie = name + '=' + encodeURIComponent(val) + '; path=/; max-age=' + (days||30)*86400;
}

// ============================================================
// STATE
// ============================================================
const state = {
  site: getCookie('moc_site_jp') || 'ups',
  page: getCookie('moc_page_jp') || 'dash.html',
  alarms: { ups: [], charger: [] },  // { sev:'crit'|'warn'|'info', src, msg, when }
};

// ============================================================
// RENDERING
// ============================================================
function renderSiteBar(){
  const s = SITES[state.site];
  document.getElementById('site-name').textContent = s.name;
  document.getElementById('site-sub').textContent = s.sub;
  document.getElementById('site-type').textContent = s.type;
}

function renderSwitcher(){
  document.querySelectorAll('.switch-btn').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.site === state.site);
  });
}

function renderNavbar(){
  const s = SITES[state.site];
  const nav = document.getElementById('navbar');
  nav.innerHTML = s.pages.map(p =>
    `<a href="#" class="nav-btn${p.file === state.page ? ' active' : ''}" data-page="${p.file}">
       <span class="ico">${p.icon}</span>${p.label}
     </a>`
  ).join('');

  nav.querySelectorAll('a[data-page]').forEach(a => {
    a.addEventListener('click', e => {
      e.preventDefault();
      navigateToPage(a.dataset.page);
    });
  });
}

function navigateToPage(file){
  state.page = file;
  setCookie('moc_page_jp', file);
  const s = SITES[state.site];
  document.getElementById('IF_m').src = s.base + file;
  document.querySelectorAll('#navbar .nav-btn').forEach(b => {
    b.classList.toggle('active', b.dataset.page === file);
  });
}

function switchSite(siteKey){
  if (!SITES[siteKey] || siteKey === state.site) return;
  state.site = siteKey;
  // Reset to first page on site switch
  state.page = SITES[siteKey].pages[0].file;
  setCookie('moc_site_jp', siteKey);
  setCookie('moc_page_jp', state.page);
  renderSiteBar();
  renderSwitcher();
  renderNavbar();
  document.getElementById('IF_m').src = SITES[siteKey].base + state.page;
  // Update bell-view-all and crit-details targets to current site's alarms.html (if available)
  updateAlarmLinks();
}

function updateAlarmLinks(){
  const s = SITES[state.site];
  const hasAlarms = s.pages.some(p => p.file === 'alarms.html');
  const link = hasAlarms ? s.base + 'alarms.html' : '#';
  document.getElementById('bell-view-all').href = link;
  document.getElementById('crit-details').href = link;
}

// ============================================================
// ALARM POLLING (Tier 1+2)
// ============================================================
function decodeFlags(hexStr, prefix){
  // Decode 16-bit hex flags into list of bit names. For now generic "<prefix> bit N".
  if (!hexStr || hexStr === 'err' || hexStr === '0000') return [];
  const v = parseInt(hexStr, 16);
  if (isNaN(v) || v === 0) return [];
  const bits = [];
  for (let i = 0; i < 16; i++) {
    if (v & (1 << i)) bits.push(prefix + ' bit ' + i);
  }
  return bits;
}

function parseAlarmsFromXml(xml, siteKey){
  const list = [];
  const now = new Date();
  const ts = String(now.getHours()).padStart(2,'0') + ':' +
             String(now.getMinutes()).padStart(2,'0') + ':' +
             String(now.getSeconds()).padStart(2,'0');

  // 1. Free-text AlarmRun (legacy alarmweb.xml field, may be in Main.xml too)
  const ar = xml.querySelector('AlarmRun');
  if (ar && ar.textContent.trim()) {
    ar.textContent.split(/\s*error\s*/i).forEach(line => {
      const t = line.trim();
      if (t) list.push({ sev:'warn', src:'System', msg:t, when:ts });
    });
  }

  // 2. UPS Fault flags
  ['UPS1', 'UPS2'].forEach(u => {
    const fl = xml.querySelector(u + '_Fault_Flag0246');
    if (fl) decodeFlags(fl.textContent.trim(), u + ' fault')
      .forEach(m => list.push({ sev:'crit', src:u, msg:m, when:ts }));
    const al = xml.querySelector(u + '_Alarm_Flag0246');
    if (al) decodeFlags(al.textContent.trim(), u + ' alarm')
      .forEach(m => list.push({ sev:'warn', src:u, msg:m, when:ts }));
  });

  // 3. Battery alarm/warning flags (Batt1..Batt10)
  for (let i = 1; i <= 10; i++) {
    for (let j = 0; j < 4; j++) {
      const a = xml.querySelector('Batt' + i + '_AlarmFlags' + j);
      if (a) decodeFlags(a.textContent.trim(), 'Batt' + i + ' alarm' + j)
        .forEach(m => list.push({ sev:'crit', src:'Batt'+i, msg:m, when:ts }));
      const w = xml.querySelector('Batt' + i + '_WarningFlags' + j);
      if (w) decodeFlags(w.textContent.trim(), 'Batt' + i + ' warn' + j)
        .forEach(m => list.push({ sev:'warn', src:'Batt'+i, msg:m, when:ts }));
    }
  }

  return list;
}

async function fetchSiteAlarms(siteKey){
  try {
    const url = 'f1/proxy.php?type=' + SITES[siteKey].proxyType + '&_=' + Date.now();
    const res = await fetch(url, { cache:'no-store' });
    if (!res.ok) throw new Error('HTTP ' + res.status);
    const text = await res.text();
    const xml = new DOMParser().parseFromString(text, 'text/xml');
    state.alarms[siteKey] = parseAlarmsFromXml(xml, siteKey);
    // Update header timestamp from current site's XML
    if (siteKey === state.site) {
      const ds = xml.querySelector('DateServer');
      const ts = xml.querySelector('TimeServer');
      if (ds && ts) {
        document.getElementById('header-ts').textContent =
          ds.textContent.trim() + ' ' + ts.textContent.trim();
      }
    }
  } catch (e) {
    console.warn('Alarm fetch failed for', siteKey, e);
    state.alarms[siteKey] = [];
  }
}

function renderBell(){
  const all = [...state.alarms.ups, ...state.alarms.charger];
  const crit = all.filter(a => a.sev === 'crit');
  const warn = all.filter(a => a.sev === 'warn');
  const total = all.length;

  const btn = document.getElementById('bell-btn');
  const badge = document.getElementById('bell-badge');
  btn.classList.remove('warn', 'crit');
  if (crit.length > 0) btn.classList.add('crit');
  else if (warn.length > 0) btn.classList.add('warn');

  if (total > 0) {
    badge.textContent = total > 99 ? '99+' : total;
    badge.classList.remove('hidden');
    badge.classList.toggle('warn', crit.length === 0 && warn.length > 0);
  } else {
    badge.classList.add('hidden');
  }

  // Per-site dots in switch bar
  ['ups', 'charger'].forEach(sk => {
    const dot = document.getElementById('switch-alarm-' + sk);
    const list = state.alarms[sk];
    const cr = list.filter(a => a.sev === 'crit').length;
    const wn = list.filter(a => a.sev === 'warn').length;
    if (cr > 0) { dot.className = 'alarm-dot'; }
    else if (wn > 0) { dot.className = 'alarm-dot warn'; }
    else { dot.className = 'alarm-dot hidden'; }
  });

  // Panel content
  document.getElementById('bell-panel-count').textContent = total + ' total';
  const list = document.getElementById('bell-panel-list');
  if (total === 0) {
    list.innerHTML = '<div class="bell-empty">No active alarms</div>';
  } else {
    // Sort: crit first, then warn, then info
    const sorted = [...crit, ...warn, ...all.filter(a => a.sev === 'info')];
    list.innerHTML = sorted.slice(0, 30).map(a => {
      const siteName = state.alarms.ups.includes(a) ? 'UPS' : 'Charger';
      return `<div class="bell-item" data-site="${siteName.toLowerCase()}">
        <div class="sev ${a.sev}"></div>
        <div class="body">
          <div class="src">${siteName} · ${a.src}</div>
          <div class="msg">${a.msg}</div>
          <div class="when">${a.when}</div>
        </div>
      </div>`;
    }).join('');
    // Click bell item → switch to that site, open alarms page
    list.querySelectorAll('.bell-item').forEach(el => {
      el.addEventListener('click', () => {
        const target = el.dataset.site === 'ups' ? 'ups' : 'charger';
        if (target !== state.site) switchSite(target);
        // Try to navigate to alarms page if available
        const s = SITES[state.site];
        const ap = s.pages.find(p => p.file === 'alarms.html');
        if (ap) navigateToPage('alarms.html');
        document.getElementById('bell-panel').classList.remove('open');
      });
    });
  }

  // Tier 2: Critical banner
  const banner = document.getElementById('crit-banner');
  if (crit.length > 0) {
    const first = crit[0];
    const siteLabel = state.alarms.ups.includes(first) ? 'UPS' : 'Charger';
    document.getElementById('crit-msg').innerHTML =
      '<b>CRITICAL</b> ' + siteLabel + ' · ' + first.src + ' — ' + first.msg +
      (crit.length > 1 ? ' <span style="opacity:.7">(+' + (crit.length-1) + ' more)</span>' : '');
    banner.classList.add('show');
  } else {
    banner.classList.remove('show');
  }
}

async function pollAlarms(){
  await Promise.all([fetchSiteAlarms('ups'), fetchSiteAlarms('charger')]);
  renderBell();
}

// Bell panel toggle
document.getElementById('bell-btn').addEventListener('click', e => {
  e.stopPropagation();
  document.getElementById('bell-panel').classList.toggle('open');
});
document.addEventListener('click', e => {
  const panel = document.getElementById('bell-panel');
  if (!panel.contains(e.target) && e.target.id !== 'bell-btn' &&
      !document.getElementById('bell-btn').contains(e.target)) {
    panel.classList.remove('open');
  }
});

// Switcher click handlers
document.querySelectorAll('.switch-btn').forEach(btn => {
  btn.addEventListener('click', () => switchSite(btn.dataset.site));
});

// ============================================================
// INIT
// ============================================================
renderSiteBar();
renderSwitcher();
renderNavbar();
updateAlarmLinks();
document.getElementById('IF_m').src = SITES[state.site].base + state.page;

pollAlarms();
setInterval(pollAlarms, 10000);  // Every 10s
</script>

</body>
</html>
