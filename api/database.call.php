<?php
include_once "../config/config.php";


function _db_insertFeedback($tool_id, $username, $text)
{
    $time = time();
    $sql = "INSERT INTO feedbacks(tool_id, username, text, time) VALUE($tool_id, '$username', '$text', '$time');";
    return _query($sql);
}

function _db_getToolInfo($name)
{
    $sql = "SELECT * FROM tools WHERE name='$name'";
    return _fetch($sql);
}


function _db_pushAnalysis($idTool, $user, $ip, $city, $region, $country, $timezone)
{
    $sql = "INSERT INTO log (id_tool, username, ip, city, region, country, timezone, time) VALUES (%d, '%s', '%s', '%s', '%s', '%s', '%s', %d)";
    $sql = sprintf($sql, $idTool, $user, $ip, $city, $region, $country, $timezone, time());
    return _query($sql);
}

function _db_pushCourse($idCourse, $totalQuiz)
{
    $time = time();
    $sql = "SELECT id, safety FROM cms_course WHERE code='$idCourse'";
    $fetch = _fetch($sql);
    if ($fetch == false) {
        $sql = "INSERT INTO cms_course (code, total, safety, upd, time) VALUES ('%s', %d, %d, %d, %d)";
        $sql = sprintf($sql, $idCourse, $totalQuiz, 1, $time, $time);
        return _query($sql);
    }
    $id = $fetch["id"];
    $safety = $fetch["safety"];
    $sql = "UPDATE cms_course SET safety=%d, upd=%d WHERE id=%d";
    $sql = sprintf($sql, $safety + 1, $time, $id);
    return _query($sql);
}


function _db_getCourse($idCourse)
{
    $sql = "SELECT total, safety FROM cms_course WHERE code='$idCourse'";
    return _fetch($sql);
}
