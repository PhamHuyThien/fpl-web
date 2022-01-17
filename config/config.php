<?php
session_start();
set_time_limit(0);
date_default_timezone_set("Asia/Ho_Chi_Minh");

$CONFIG = [
    "admin" => [
        "username" => "thien",
        "password" => "dz"
    ],
    // "db" => [
    //     "host" => "localhost",
    //     "name" => "poly",
    //     "username" => "root",
    //     "password" => ""
    // ]
    "db" => [
        "host" => "localhost",
        "name" => "xxyz_poly",
        "username" => "xxyz_thiendz",
        "password" => "thien1107"
    ]
];

//
try {
    $connect = new PDO(
        "mysql:host=" . $CONFIG["db"]["host"] . ";dbname=" . $CONFIG["db"]["name"],
        $CONFIG["db"]["username"],
        $CONFIG["db"]["password"]
    );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}
//
function _query($sql)
{
    global $connect;
    return $connect->query($sql);
}
function _fetch($sql)
{
    return _query($sql)->fetch(PDO::FETCH_ASSOC);
}
function _fetchs($sql)
{
    return _query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
function _isset($var, $key, $def = false)
{
    return isset($var[$key]) ? $var[$key] : $def;
}

function _is_admin()
{
    return isset($_SESSION["admin"]);
}
