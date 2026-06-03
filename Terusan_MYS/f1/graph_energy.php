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
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Energy Reports — Terusan MOC</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
html,body{height:100%;margin:0;padding:0;background:#f5f5f0;overflow:hidden}
.container{height:100%;display:flex;flex-direction:column;gap:12px;padding:0 0 12px;overflow-y:auto;-webkit-overflow-scrolling:touch}
iframe{width:100%;border:0;display:block;background:#f5f5f0}
.report-frame{width:100%;overflow:auto}
.report-frame--monthly{height:640px;flex:0 0 640px}
.report-frame--yearly{height:980px;flex:0 0 980px}
</style>
</head>
<body>
  <div class="container">
    <iframe class="report-frame report-frame--monthly" src="graph/monthly.php" scrolling="auto"></iframe>
    <iframe class="report-frame report-frame--yearly" src="graph/yearly.php" scrolling="auto"></iframe>
  </div>
</body>
</html>
