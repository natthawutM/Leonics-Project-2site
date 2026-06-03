<?php
include_once(__DIR__ . "/mysql_compat.php");

function connectToDB2($fatal = true) {
    $hostdb = 'localhost';   // MySQl host
    $userdb = 'root';    // MySQL username
    $passdb = '';    // MySQL password
    $namedb = 'tetabuanbattery_mys';// MySQL database name

    $link = mysql_connect ($hostdb, $userdb, $passdb);

    if (!$link) {
        if ($fatal) {
            die('Could not connect: ' . mysql_error());
        }
        return false;
    }

    $db_selected = mysql_select_db($namedb);
    if (!$db_selected) {
        if ($fatal) {
            die ('Can\'t use database : ' . mysql_error());
        }
        mysql_close($link);
        return false;
    }
    return $link;
}
?>
