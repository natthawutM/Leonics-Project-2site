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
html,body{height:100%;background:#f5f5f0;overflow:hidden}
.container{height:100%;overflow-y:auto;-webkit-overflow-scrolling:touch}
iframe{width:100%;border:0;display:block;background:#f5f5f0}
</style>
</head>
<body>
  <div class="container">
    <iframe src="graph/monthly.php" style="height:560px" scrolling="no"></iframe>
    <iframe src="graph/yearly.php" style="height:560px" scrolling="no"></iframe>
  </div>
</body>
</html>
