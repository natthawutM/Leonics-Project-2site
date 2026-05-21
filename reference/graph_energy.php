<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Energy Reports - Jambongan MOC</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box}
html,body{margin:0;padding:0;height:100%;font-family:'DM Sans',system-ui,sans-serif;background:#f5f5f0}

.tab-bar{
  background:#fff;border-bottom:1px solid #e8e6df;
  padding:8px 16px;display:flex;align-items:center;gap:6px;
  position:sticky;top:0;z-index:5;
}
.tab-btn{
  appearance:none;background:transparent;border:none;
  font-family:inherit;font-size:13px;font-weight:500;color:#888;
  padding:7px 14px;border-radius:8px;cursor:pointer;
  transition:background .12s,color .12s;
  display:inline-flex;align-items:center;gap:6px;
}
.tab-btn:hover{background:#fafaf7;color:#1a1a1a}
.tab-btn.active{background:#1a1a1a;color:#fff}
.tab-btn .ico{width:14px;height:14px;display:inline-flex}
.tab-btn .ico svg{width:100%;height:100%}

.frame-wrap{
  width:100%;height:calc(100vh - 50px);
  background:#f5f5f0;
  overflow:hidden;
}
.frame-wrap iframe{
  width:100%;height:100%;border:0;display:block;background:#f5f5f0;
}

@media(max-width:600px){
  .tab-bar{padding:6px 10px;gap:4px}
  .tab-btn{padding:6px 11px;font-size:12px}
  .frame-wrap{height:calc(100vh - 46px)}
}
</style>
</head>
<body>

<nav class="tab-bar" id="tabbar">
  <button class="tab-btn active" data-src="graph/monthly.php">
    <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
    Monthly (daily bars)
  </button>
  <button class="tab-btn" data-src="graph/yearly.php">
    <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></span>
    Yearly (monthly bars)
  </button>
</nav>

<div class="frame-wrap">
  <iframe id="energy-frame" src="graph/monthly.php"></iframe>
</div>

<script>
const buttons = document.querySelectorAll('.tab-btn');
const frame = document.getElementById('energy-frame');
buttons.forEach(btn => {
  btn.addEventListener('click', () => {
    buttons.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    frame.src = btn.dataset.src;
  });
});
</script>
</body>
</html>
