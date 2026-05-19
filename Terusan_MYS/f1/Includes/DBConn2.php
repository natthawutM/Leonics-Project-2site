<?php
function connectToDB2() {
    $hostdb = 'localhost';   // MySQl host
    $userdb = 'root';    // MySQL username
    $passdb = '';    // MySQL password
    $namedb = 'terusanbattery_mys';// MySQL database name

    $link = mysql_connect ($hostdb, $userdb, $passdb);

    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db($namedb);
    if (!$db_selected) {
        die ('Can\'t use database : ' . mysql_error());
    }
    return $link;
}
?>