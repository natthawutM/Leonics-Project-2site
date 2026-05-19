<?php
setcookie('moc_user', '', time() - 3600, '/');
setcookie('moc_site', '', time() - 3600, '/');
header('Location: /BELB_Sabah/login.php');
exit();
?>
