<?php
// ============================================================
// proxy.php — Cross-origin XML fetch for feet.php
// Fetches Main.xml (or alarmweb.xml) from a remote MOC site.
//
// Usage:
//   ?type=UPS|Charger             → returns Main.xml (default)
//   ?type=UPS|Charger&what=alarm  → returns alarmweb.xml
// ============================================================
header('Content-Type: text/xml; charset=utf-8');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
// Allow same-origin and our own domains; adjust if you tighten CORS.
header('Access-Control-Allow-Origin: *');

$type = isset($_GET['type'])  ? $_GET['type']  : '';
$what = isset($_GET['what'])  ? $_GET['what']  : 'main';   // 'main' (default) | 'main_test' | 'alarm'

// Choose which file to fetch on the remote site
if ($what === 'alarm') {
  $file = 'Xml/alarmweb.xml';
} elseif ($what === 'main_test') {
  $file = 'Xml/Main_test.xml';
} else {
  $file = 'Xml/Main.xml';
}

// Map type → site base URL
switch ($type) {
  case 'UPS':
    $source = 'http://www.leonics-moc.com:52080/UPS_Parallels/f1/' . $file;
    break;
  case 'Charger':
    $source = 'http://www.leonics-moc.com:51080/Charger110v75A/f1/' . $file;
    break;
  case 'Tetabuan':
    $source = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Tetabuan_MYS' . DIRECTORY_SEPARATOR . 'f1' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $file);
    break;
  case 'Terusan':
    $source = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Terusan_MYS' . DIRECTORY_SEPARATOR . 'f1' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $file);
    break;
  default:
    echo '<error>Invalid type. Expected UPS, Charger, Tetabuan, or Terusan.</error>';
    exit;
}

// Use a short timeout so a hung site doesn't stall the bell poll
// (long array syntax for PHP 5.3 compatibility)
if (preg_match('#^https?://#i', $source)) {
  $ctx = stream_context_create(array(
    'http' => array('timeout' => 4, 'ignore_errors' => true),
  ));
  $body = @file_get_contents($source, false, $ctx);
} else {
  $body = @file_get_contents($source);
}

if ($body === false || $body === '') {
  // Return empty-but-valid XML so the JS parser doesn't blow up
  echo '<Main><error>Unable to reach ' . htmlspecialchars($type) . ' site</error></Main>';
  exit;
}

echo $body;
