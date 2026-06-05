<?php
// Future main entry for login/session gate.
// Change this target when the real post-login landing page changes.
$nextPath = './fleet.html';

header('Location: ' . $nextPath);
exit();
?>