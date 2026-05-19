<?php
// ============================================================
// menu.php — Legacy URL, now redirects to feet.php (new TNBES-style master menu)
//
// Why: The MOC login system stores the post-login landing URL in the
// `webmocs` cookie, which is hardcoded to /Johor_Port/menu.php for existing
// users. Rather than touch the login DB, we keep this filename alive and
// just bounce users to the new wrapper.
//
// To roll back to the legacy sidebar dashboard:
//   copy menu.php.bak menu.php   (or restore from your backup)
// ============================================================

// Don't let proxies/browsers cache the redirect itself,
// otherwise rolling back wouldn't take effect immediately.
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Same auth check as feet.php — keeps the login flow consistent.
// (If a user lands here without a valid session, send them to login,
//  not into feet.php just to be redirected again.)
if ($_COOKIE['id'] == "") {
    header("Location: http://www.leonics-moc.com/index22.php");
    exit();
}
if (!(($_COOKIE['mocs'] == "company166" || $_COOKIE['mocs'] == "allcompany"))) {
    header("Location: http://www.leonics-moc.com/index22.php");
    exit();
}

// Authenticated — bounce to the new master menu (302 = temporary,
// so we can revert this file later without permanent browser caching).
header('Location: feet.php', true, 302);
exit;
?>
