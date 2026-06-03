<?php
if (function_exists('mysql_connect')) {
    return;
}

if (function_exists('mysqli_report')) {
    mysqli_report(MYSQLI_REPORT_OFF);
}

if (!defined('MYSQL_ASSOC')) {
    define('MYSQL_ASSOC', MYSQLI_ASSOC);
}
if (!defined('MYSQL_NUM')) {
    define('MYSQL_NUM', MYSQLI_NUM);
}
if (!defined('MYSQL_BOTH')) {
    define('MYSQL_BOTH', MYSQLI_BOTH);
}

$GLOBALS['mysql_compat_last_link'] = isset($GLOBALS['mysql_compat_last_link']) ? $GLOBALS['mysql_compat_last_link'] : null;
$GLOBALS['mysql_compat_last_error'] = isset($GLOBALS['mysql_compat_last_error']) ? $GLOBALS['mysql_compat_last_error'] : '';

function mysql_connect($server = null, $username = null, $password = null)
{
    try {
        $link = @mysqli_connect($server, $username, $password);
    } catch (Exception $e) {
        $GLOBALS['mysql_compat_last_error'] = $e->getMessage();
        return false;
    }

    if ($link) {
        $GLOBALS['mysql_compat_last_link'] = $link;
        $GLOBALS['mysql_compat_last_error'] = '';
    } else {
        $GLOBALS['mysql_compat_last_error'] = mysqli_connect_error();
    }

    return $link;
}

function mysql_select_db($database_name, $link_identifier = null)
{
    $link = $link_identifier ? $link_identifier : (isset($GLOBALS['mysql_compat_last_link']) ? $GLOBALS['mysql_compat_last_link'] : null);
    if (!$link) {
        $GLOBALS['mysql_compat_last_error'] = 'No active MySQL connection';
        return false;
    }

    try {
        $ok = @mysqli_select_db($link, $database_name);
        $GLOBALS['mysql_compat_last_error'] = $ok ? '' : mysqli_error($link);
    } catch (Exception $e) {
        $GLOBALS['mysql_compat_last_error'] = $e->getMessage();
        return false;
    }
    return $ok;
}

function mysql_query($query, $link_identifier = null)
{
    $link = $link_identifier ? $link_identifier : (isset($GLOBALS['mysql_compat_last_link']) ? $GLOBALS['mysql_compat_last_link'] : null);
    if (!$link) {
        $GLOBALS['mysql_compat_last_error'] = 'No active MySQL connection';
        return false;
    }

    try {
        $result = @mysqli_query($link, $query);
        $GLOBALS['mysql_compat_last_error'] = $result === false ? mysqli_error($link) : '';
    } catch (Exception $e) {
        $GLOBALS['mysql_compat_last_error'] = $e->getMessage();
        return false;
    }
    return $result;
}

function mysql_fetch_array($result, $result_type = null)
{
    if ($result_type === null) {
        $result_type = MYSQLI_BOTH;
    }

    return mysqli_fetch_array($result, $result_type);
}

function mysql_fetch_row($result)
{
    return mysqli_fetch_row($result);
}

function mysql_num_rows($result)
{
    return mysqli_num_rows($result);
}

function mysql_close($link_identifier = null)
{
    $link = $link_identifier ? $link_identifier : (isset($GLOBALS['mysql_compat_last_link']) ? $GLOBALS['mysql_compat_last_link'] : null);
    if (!$link) {
        return false;
    }

    if ((isset($GLOBALS['mysql_compat_last_link']) ? $GLOBALS['mysql_compat_last_link'] : null) === $link) {
        $GLOBALS['mysql_compat_last_link'] = null;
    }

    return mysqli_close($link);
}

function mysql_error($link_identifier = null)
{
    $link = $link_identifier ? $link_identifier : (isset($GLOBALS['mysql_compat_last_link']) ? $GLOBALS['mysql_compat_last_link'] : null);
    if ($link) {
        return mysqli_error($link);
    }

    return isset($GLOBALS['mysql_compat_last_error']) ? $GLOBALS['mysql_compat_last_error'] : mysqli_connect_error();
}
?>
