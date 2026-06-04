<?php
function connectToDB() {
    $hostdb = 'localhost';
    $userdb = 'root';
    $passdb = '';
    $namedb = 'dwr_rbr';

    if (function_exists('mysql_connect')) {
        $link = mysql_connect($hostdb, $userdb, $passdb);
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }

        $db_selected = mysql_select_db($namedb);
        if (!$db_selected) {
            die("Can't use database : " . mysql_error());
        }

        return $link;
    }

    $link = mysqli_connect($hostdb, $userdb, $passdb, $namedb);
    if (!$link) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    return $link;
}
?>
