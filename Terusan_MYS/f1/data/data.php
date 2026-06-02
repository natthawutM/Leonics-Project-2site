<?php
if($_POST==null){
	$y1=date('Y'); $m=date('m'); $d=date('d');
}else{
	$y1=$_POST["y"]; $m=$_POST["m"]; $d=$_POST["d"];
}
$months=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
$m1=isset($months[$m])?$months[$m]:$m;
$yy1=date('Y');
?>
<!doctype html>
<html lang="en">
<head>

  <script>
    if (window.history && window.history.replaceState) {
      var basePath = window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);
      if (!document.querySelector('base')) {
        var base = document.createElement('base');
        base.href = basePath;
        document.head.appendChild(base);
      }
      window.history.replaceState({}, document.title, '/#');
    }
  </script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reports — Leonics MOC</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#f5f5f0;--card:#fff;--panel:#fafaf7;--border:#e8e6df;--text:#1a1a1a;--sub:#888;--radius:12px;--font:'DM Sans',system-ui,sans-serif;--mono:'DM Mono',monospace}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:var(--font);background:var(--bg);color:var(--text);font-size:13px;line-height:1.5;padding:20px;min-height:100vh}
.page{max-width:860px;margin:0 auto}

h1{font-size:22px;font-weight:700;margin-bottom:4px}
.subtitle{font-size:13px;color:var(--sub);margin-bottom:24px}

/* Select card */
.sel-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:20px;margin-bottom:20px}
.sel-title{font-size:14px;font-weight:600;margin-bottom:14px}
.sel-row{display:flex;gap:12px;align-items:flex-end;flex-wrap:wrap}
.sel-group label{display:block;font-size:11px;font-weight:500;color:var(--sub);text-transform:uppercase;letter-spacing:.3px;margin-bottom:4px}
.sel-group select{font-family:var(--font);font-size:13px;padding:9px 14px;border:1px solid var(--border);border-radius:8px;background:var(--card);color:var(--text);min-width:100px;cursor:pointer;appearance:auto}
.sel-group select:focus{outline:none;border-color:#999}

/* Report cards grid */
.grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}

.report-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:20px;display:flex;flex-direction:column;transition:box-shadow .15s}
.report-card:hover{box-shadow:0 2px 12px rgba(0,0,0,.06)}
.rc-header{display:flex;align-items:flex-start;gap:12px;margin-bottom:14px}
.rc-icon{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
.rc-info{flex:1}
.rc-title{font-size:14px;font-weight:600;margin-bottom:2px}
.rc-desc{font-size:12px;color:var(--sub);line-height:1.4}
.rc-btn{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:11px 0;border:none;border-radius:8px;font-family:var(--font);font-size:13px;font-weight:600;cursor:pointer;background:var(--text);color:#fff;transition:background .15s;margin-top:auto}
.rc-btn:hover{background:#333}
.rc-btn svg{width:16px;height:16px}

@media(max-width:600px){.grid{grid-template-columns:1fr}.sel-row{flex-direction:column;align-items:stretch}body{padding:12px}}
</style>
</head>
<body>
<div class="page">

  <h1>Reports</h1>
  <div class="subtitle">Export data as CSV (open in Excel)</div>

  <!-- Select site & range -->
  <div class="sel-card">
    <div class="sel-title">Select date range</div>
    <div class="sel-row">
      <div class="sel-group">
        <label>Day</label>
        <select id="sel_d">
          <?php for($i=1;$i<=31;$i++){echo '<option value="'.str_pad($i,2,'0',STR_PAD_LEFT).'"'.($i==$d?' selected':'').'>'.$i.'</option>';}?>
        </select>
      </div>
      <div class="sel-group">
        <label>Month</label>
        <select id="sel_m">
          <?php foreach($months as $k=>$v){echo '<option value="'.$k.'"'.($k==$m?' selected':'').'>'.$v.'</option>';}?>
        </select>
      </div>
      <div class="sel-group">
        <label>Year</label>
        <select id="sel_y">
          <?php for($i=2020;$i<=$yy1;$i++){echo '<option value="'.$i.'"'.($i==$y1?' selected':'').'>'.$i.'</option>';}?>
        </select>
      </div>
    </div>
  </div>

  <!-- Report cards -->
  <div class="grid">

    <!-- Real-time data (Main) -->
    <div class="report-card">
      <div class="rc-header">
        <div class="rc-icon" style="background:#eff6ff;color:#3b82f6">📊</div>
        <div class="rc-info">
          <div class="rc-title">Real-time data</div>
          <div class="rc-desc">All sensor readings per minute — BDI, SCC, PM, Gen, Weather for selected day</div>
        </div>
      </div>
      <button class="rc-btn" onclick="dl('Main')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Download CSV
      </button>
    </div>

    <!-- Energy log -->
    <div class="report-card">
      <div class="rc-header">
        <div class="rc-icon" style="background:#fef3c7;color:#f59e0b">⚡</div>
        <div class="rc-info">
          <div class="rc-title">Energy log</div>
          <div class="rc-desc">Daily energy summary (kWh) — Solar, Gen, Load, Battery for selected month</div>
        </div>
      </div>
      <button class="rc-btn" onclick="dl('Energylog')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Download CSV
      </button>
    </div>

  </div>

</div>

<iframe id="dlFrame" style="display:none"></iframe>
<script>
function dl(table){
  const y=document.getElementById('sel_y').value;
  const m=document.getElementById('sel_m').value;
  const d=document.getElementById('sel_d').value;
  let url;
  if(table==='Main'){
    url='Download/dlrecord_data.php?y='+y+'&m='+m+'&d='+d;
  }else{
    url='Download/dlrecord_log.php?y='+y+'&m='+m;
  }
  document.getElementById('dlFrame').src=url;
}
</script>
</body>
</html>
