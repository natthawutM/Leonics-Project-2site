<?php
// ── Auth check — include at top of protected pages ──
// Usage: <?php include('auth_check.php'); ?>
$COOKIE_NAME = 'moc_user';

function isLoggedIn(){
  global $COOKIE_NAME;
  if(!isset($_COOKIE[$COOKIE_NAME]) || $_COOKIE[$COOKIE_NAME] === '') return false;
  $parts = explode('|', $_COOKIE[$COOKIE_NAME]);
  if(count($parts) !== 2) return false;
  $user = $parts[0];
  $hash = $parts[1];
  // Verify hash
  return $hash === md5($user . 'leonics_moc_salt_2024');
}

function getUsername(){
  global $COOKIE_NAME;
  if(!isset($_COOKIE[$COOKIE_NAME])) return '';
  $parts = explode('|', $_COOKIE[$COOKIE_NAME]);
  return $parts[0];
}

if(!isLoggedIn()){
  header('Location: /BELB_Sabah/login.php');
  exit();
}
?>
