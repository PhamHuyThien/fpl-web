<?php

$PATH = "../log/counter";

function _system_counterInc()
{
    global $PATH;
    $month = __system_getMonth();
    $day = __system_getDay();
    $path = $PATH . "/$month";
    if (!file_exists($path)) {
        $eol = PHP_EOL;
        $data = "";
        for ($i = 0; $i < 31; $i++) {
            $data .= "0$eol";
        }
        _system_overwrite($path, $data);
    }
    $data = _system_read($path);
    $exp = explode(PHP_EOL, $data);
    $exp[$day - 1] = (int) $exp[$day - 1] + 1;
    $exp = implode(PHP_EOL, $exp);
    return _system_overwrite($path, $exp);
}


function _system_getCounterDay($day, $month, $path="../log/counter")
{
    $path = $path . "/$month";
    if (!file_exists($path)) {
        $eol = PHP_EOL;
        $data = "";
        for ($i = 0; $i < 31; $i++) {
            $data .= "0$eol";
        }
        _system_overwrite($path, $data);
    }
    $data = _system_read($path);
    $exp = explode(PHP_EOL, $data);
    return (int) $exp[$day - 1];
}

function _system_getCounterMonth($month, $path="../log/counter")
{
    $path = $path . "/$month";
    if (!file_exists($path)) {
        $eol = PHP_EOL;
        $data = "";
        for ($i = 0; $i < 31; $i++) {
            $data .= "0$eol";
        }
        _system_overwrite($path, $data);
    }
    $data = _system_read($path);
    $exp = explode(PHP_EOL, $data);
    $c = 0;
    foreach ($exp as $count) {
        $c += (int) $count;
    }
    return $c;
}

function _system_overwrite($path, $data)
{
    $f = @fopen($path, "w+");
    if ($f) {
        $d = @fwrite($f, $data);
        @fclose($f);
        return $d;
    }
    return false;
}

function _system_read($path)
{
    $f = @fopen($path, "r");
    if ($f) {
        $d = @fread($f, filesize($path));
        @fclose($f);
        return $d;
    }
    return false;
}

function __system_getLastMonth($month)
{
    if ($month == 0) {
        return 12;
    }
    return $month - 1;
}

function __system_getDay()
{
    return date("d");
}

function __system_getMonth()
{
    return date("m");
}
