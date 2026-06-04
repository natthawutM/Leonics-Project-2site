<?php
if (empty($_COOKIE['id']) || empty($_COOKIE['user'])) {
  header("Location: ./login.html");
  exit();
}

if (
  !isset($_COOKIE['mocs']) ||
  !($_COOKIE['mocs'] === "company171" || $_COOKIE['mocs'] === "allcompany")
) {
  header("Location: ./login.html");
  exit();
}

?>
<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Department of Water Resource — Leonics MOC</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
/* ============================================================
   Solar Monitor Design System — menu.php (MOC-portal shell)
   Department of Water Resource — Ratchaburi, Thailand
   ============================================================ */
:root{
  --bg-main:#f5f5f0;
  --bg-card:#ffffff;
  --bg-panel:#fafaf7;
  --bg-dark:#1a1a1a;
  --border-default:#e8e6df;
  --border-hover:#ccc;
  --text-primary:#1a1a1a;
  --text-secondary:#888;
  --text-tertiary:#aaa;
  --text-on-dark:#f5f5f0;
  --success:#22c55e;
  --info:#3b82f6;
  --radius-md:8px;
  --radius-lg:12px;
  --font-sans:'DM Sans',system-ui,-apple-system,sans-serif;
  --font-mono:'DM Mono',ui-monospace,monospace;

  --header-h:48px;
  --nav-h:44px;
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

/* ---------- TOP HEADER (dark bar) ---------- */
.app-header{
  height:var(--header-h);
  background:var(--bg-dark);
  color:var(--text-on-dark);
  display:flex;align-items:center;justify-content:space-between;
  padding:0 20px;
  position:relative;z-index:10;
}
.brand{display:flex;align-items:center;gap:10px}
.brand-logo{
  width:26px;height:26px;border-radius:6px;
  background:var(--bg-card);padding:4px;display:flex;align-items:center;justify-content:center;
}
.brand-logo img{width:100%;height:100%;object-fit:contain;display:block}
.brand-text{font-size:13px;font-weight:500;letter-spacing:0.2px}
.brand-text .sub{color:#888;font-weight:400;margin-left:6px}

.header-right{display:flex;align-items:center;gap:14px}
.live-stamp{
  display:flex;align-items:center;gap:8px;
  font-size:11px;color:#bbb;
}
.live-stamp .live-dot{
  width:7px;height:7px;border-radius:50%;background:var(--success);
  animation:pulse 1.6s ease-in-out infinite;
}
.live-stamp .ts{font-family:var(--font-mono);color:#f5f5f0}
@keyframes pulse{
  0%,100%{opacity:1;transform:scale(1)}
  50%{opacity:.4;transform:scale(.7)}
}
.logout-btn{
  display:flex;align-items:center;gap:6px;
  padding:6px 12px;border-radius:var(--radius-md);
  background:rgba(255,255,255,0.08);color:#f5f5f0;
  text-decoration:none;font-size:12px;font-weight:500;
  transition:background .15s;
}
.logout-btn:hover{background:rgba(255,255,255,0.16)}
.logout-btn svg{width:14px;height:14px}

/* ---------- SITE BAR ---------- */
.site-bar{
  background:var(--bg-card);
  border-bottom:1px solid var(--border-default);
  padding:10px 20px;
  display:flex;align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:8px;
}
.site-info{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
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
.site-right{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
.client-logos{display:inline-flex;align-items:center;gap:6px}
.client-logos img{height:28px;width:auto;display:block;object-fit:contain;background:#fff;padding:2px 4px;border-radius:6px;border:1px solid var(--border-default)}
@media(max-width:600px){.client-logos img{height:22px;padding:1px 3px}}
@media(max-width:420px){.client-logos img{height:18px}}

/* ---------- NAV TABS ---------- */
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
  appearance:none;
  background:transparent;border:none;
  color:var(--text-secondary);
  font-family:inherit;font-size:13px;font-weight:500;
  padding:7px 14px;border-radius:var(--radius-md);
  cursor:pointer;white-space:nowrap;
  transition:background .12s,color .12s;
  text-decoration:none;display:inline-flex;align-items:center;gap:6px;
}
.nav-btn:hover{background:var(--bg-panel);color:var(--text-primary)}
.nav-btn.active{background:var(--bg-dark);color:#fff}
.nav-btn .ico{
  width:14px;height:14px;display:inline-flex;align-items:center;justify-content:center;
}
.nav-btn .ico svg{width:100%;height:100%}

/* ---------- MAIN IFRAME ---------- */
.app-main{
  position:absolute;
  top:var(--header-h);
  left:0;right:0;bottom:0;
  display:flex;flex-direction:column;
}
.app-main > .site-bar{flex:0 0 auto}
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
}
@media (max-width: 768px){
  .brand-text .sub{display:none}
  .site-bar{padding:8px 12px}
  .nav-bar{padding:0 12px;gap:2px}
  .nav-btn{padding:6px 11px;font-size:12px}
  .logout-btn{padding:5px 10px;font-size:11px}
}
@media (max-width: 600px){
  :root{--header-h:44px;--nav-h:40px}
  .app-header{padding:0 10px}
  .brand-logo{width:22px;height:22px}
  .brand-text{font-size:12px}
  .live-stamp .ts{font-size:10px}
  .live-stamp .label{display:none}
  .site-loc{display:none}
  .site-bar{padding:7px 10px;gap:6px}
  .site-name{font-size:13px}
  .type-badge,.status-pill{font-size:10px;padding:2px 7px}
  .nav-bar{padding:0 10px;gap:2px}
  .nav-btn{padding:5px 10px;font-size:12px;gap:5px}
  .nav-btn .ico{width:12px;height:12px}
  .logout-btn{padding:5px 9px}
  .logout-btn svg{width:13px;height:13px}
}
@media (max-width: 420px){
  .brand-text{font-size:11px}
  .live-stamp{gap:4px}
  .live-stamp .ts{font-size:9px}
  .logout-btn{padding:6px 8px;font-size:0}
  .logout-btn svg{width:14px;height:14px}
  .nav-btn{padding:5px 9px;font-size:11px}
}
</style>
<script>if(/[?&]sim=1\b/.test(location.search))document.write('<script src="f1/sim.js?_='+Date.now()+'"><\/script>');</script>
</head>
<body>

<!-- ======================================================
     TOP DARK HEADER
     ====================================================== -->
<header class="app-header">
  <div class="brand">
    <div class="brand-logo"><img src="img/LEONICS-logo.svg" alt="Leonics"></div>
    <div class="brand-text">
      Leonics MOC <span class="sub">&middot; Monitoring and Operation Center</span>
    </div>
  </div>

  <div class="header-right">
    <div class="live-stamp">
      <span class="live-dot"></span>
      <span class="label">Live</span>
      <span class="ts" id="menu-ts">&mdash;</span>
    </div>
    <a href="./logout.php" target="_self" class="logout-btn" title="Logout">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
        <polyline points="16 17 21 12 16 7"/>
        <line x1="21" y1="12" x2="9" y2="12"/>
      </svg>
      Logout
    </a>
  </div>
</header>

<!-- ======================================================
     MAIN AREA (site bar + nav tabs + iframe)
     ====================================================== -->
<div class="app-main">

  <div class="site-bar">
    <div class="site-info">
      <span class="type-badge">
        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><line x1="12" y1="2" x2="12" y2="4"/><line x1="12" y1="20" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="6.34" y2="6.34"/><line x1="2" y1="12" x2="4" y2="12"/></svg>
        Solar + Wind Hybrid
      </span>
      <span class="site-name">Department of Water Resource</span>
      <span class="site-loc">สำนักงานทรัพยากรน้ำที่ 7 — กรมทรัพยากรน้ำ จ.ราชบุรี</span>
    </div>
    <div class="site-right"><span class="status-pill"><span class="dot"></span>online</span><span class="client-logos"><img src="img/logo.svg" alt="Royal emblem" title="ตราครุฑ" onerror="this.style.display='none'"><img src="img/logo_digital.png" alt="Department of Water Resource" title="กรมทรัพยากรน้ำ" onerror="this.style.display='none'"></span></div>
  </div>

  <nav class="nav-bar" id="navbar">
    <a href="f1/plant.html"          target="IF_m" class="nav-btn active" data-nav="dashboard">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg></span>
      Dashboard
    </a>
    <a href="f1/BDI.html"             target="IF_m" class="nav-btn" data-nav="bdi">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="18" height="10" rx="2"/><line x1="22" y1="11" x2="22" y2="13"/><line x1="6" y1="10" x2="6" y2="14"/></svg></span>
      BDI
    </a>
    <a href="f1/SCC.html"             target="IF_m" class="nav-btn" data-nav="scc">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><line x1="12" y1="2" x2="12" y2="4"/><line x1="12" y1="20" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="6.34" y2="6.34"/><line x1="17.66" y1="17.66" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="4" y2="12"/><line x1="20" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="6.34" y2="17.66"/><line x1="17.66" y1="6.34" x2="19.07" y2="4.93"/></svg></span>
      SCC
    </a>
    <a href="f1/Load.html"            target="IF_m" class="nav-btn" data-nav="load">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
      Load PM
    </a>
    <a href="f1/WT.html"              target="IF_m" class="nav-btn" data-nav="wind">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.59 4.59A2 2 0 1 1 11 8H2"/><path d="M12.59 19.41A2 2 0 1 0 14 16H2"/><path d="M17.73 7.73A2.5 2.5 0 1 1 19.5 12H2"/></svg></span>
      Wind PM
    </a>
    <a href="f1/GCI.html"             target="IF_m" class="nav-btn" data-nav="gci">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="14" rx="2"/><line x1="7" y1="22" x2="17" y2="22"/><line x1="12" y1="18" x2="12" y2="22"/></svg></span>
      GCI
    </a>
    <a href="f1/Graph_batt/Batt.html" target="IF_m" class="nav-btn" data-nav="battery">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="6" width="18" height="12" rx="2"/><line x1="23" y1="10" x2="23" y2="14"/><line x1="6" y1="10" x2="6" y2="14"/><line x1="10" y1="10" x2="10" y2="14"/></svg></span>
      Battery
    </a>
    <a href="f1/graph_power.html"     target="IF_m" class="nav-btn" data-nav="power">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 17 9 11 13 15 21 7"/><polyline points="14 7 21 7 21 14"/></svg></span>
      Power Graph
    </a>
    <a href="f1/graph_energy.html"    target="IF_m" class="nav-btn" data-nav="energy">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></span>
      Energy Graph
    </a>
    <a href="f1/data/data.html"       target="IF_m" class="nav-btn" data-nav="download">
      <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg></span>
      Download
    </a>
  </nav>

  <div class="frame-wrap">
    <iframe name="IF_m" id="IF_m" src="f1/plant.html" scrolling="auto"></iframe>
  </div>

</div>

<script>
// Simulation mode: keep ?sim=1 across the iframe + nav links
(function(){
  if(!/[?&]sim=1\b/.test(location.search)) return;
  const withSim = (u)=> u + (u.indexOf('?')>=0 ? '&' : '?') + 'sim=1';
  const fr = document.getElementById('IF_m');
  if(fr) fr.src = withSim(fr.getAttribute('src'));
  document.querySelectorAll('.nav-btn[target="IF_m"]').forEach(a=>{
    a.setAttribute('href', withSim(a.getAttribute('href')));
  });
})();

// Active state for nav tabs
(function(){
  const buttons = document.querySelectorAll('.nav-btn');
  buttons.forEach(btn => {
    btn.addEventListener('click', function(){
      buttons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
    });
  });
})();

// Fetch timestamp from XML (no Spry, no jQuery needed)
async function updateTimestamp(){
  try{
    const res = await fetch('f1/Xml/Main.xml?_=' + Date.now(), {cache:'no-store'});
    if(!res.ok) return;
    const text = await res.text();
    const xml = new DOMParser().parseFromString(text, 'text/xml');
    const ds = xml.querySelector('DateServer');
    const ts = xml.querySelector('TimeServer');
    const el = document.getElementById('menu-ts');
    if(el && ds && ts){
      el.textContent = ds.textContent.trim() + ' ' + ts.textContent.trim();
    }
  }catch(e){}
}
updateTimestamp();
setInterval(updateTimestamp, 2000);
</script>

</body>
</html>
