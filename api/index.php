<?php
include_once "../config/config.php";
include_once "database.call.php";
include_once "system.call.php";


$c = _isset($_GET, "c");
$r = ["status" => 0, "msg" => "command not found!"];

switch ($c) {
    case "get-feedbacks":
        $tool_id = _isset($_GET, "tool_id", null);
        $order = _isset($_GET, "order", "DESC");
        $order_by = _isset($_GET, "order_by", "time");
        $limit = _isset($_GET, "limit", 10);
        $r["status"] = 1;
        $r["msg"] = "success.";
        $r["data"] = _db_getFeedback($tool_id, $order, $order_by, $limit);
        break;
    case "feedback":
        $username =  _isset($_GET, "username");
        $tool_id = _isset($_GET, "tool_id");
        $feedback = _isset($_POST, "feedback");
        $time = time();
        if (_db_insertFeedback($tool_id, $username, $feedback)) {
            $r["status"] = 1;
            $r["msg"] = "feedback success.";
        } else {
            $r["msg"] = "feedback error.";
        }
        break;
    case "get-quiz-question":
        $course_md5_id = _isset($_GET, "course_md5_id");
        $data_b64 = _system_read("../data/" . $course_md5_id);
        if ($data_b64 !== false) {
            $r["status"] = 1;
            $r["msg"] = "get quiz question success!";
            $r["data"]["data_b64"] = $data_b64;
        } else {
            $r["msg"] = "get quiz question error, may be quiz not exists.";
        }
        break;
    case "push-quiz-question":
        $course_md5_id = _isset($_GET, "course_md5_id");
        $data_b64 = _isset($_POST, "data_b64");
        if (_system_overwrite("../data/" . $course_md5_id, $data_b64)) {
            $r["status"] = 1;
            $r["msg"] = "push quiz question success!";
        } else {
            $r["msg"] = "push quiz question error!";
        }
        break;
    case "counter-inc":
        _system_counterInc();
        $r["status"] = 1;
        $r["msg"] = "counter inc success!";
        break;
    case "get-tool-info":
        $name = _isset($_POST, "name");
        $r["status"] = 1;
        $r["msg"] = "get tool info success!";
        $r["data"] = _db_getToolInfo($name);
        break;
    case "push-analysis":
        $id_tool = _isset($_GET, "id-tool");
        $user = _isset($_POST, "user");
        $ip = _isset($_POST, "ip");
        $city = _isset($_POST, "city");
        $region = _isset($_POST, "region");
        $country = _isset($_POST, "country");
        $timezone = _isset($_POST, "timezone");
        if (_db_pushAnalysis($id_tool, $user, $ip, $city, $region, $country, $timezone)) {
            $r["status"] = 1;
            $r["msg"] = "push analysis success!";
        } else {
            $r["msg"] = "push analysis error!";
        }
        break;
    case "push-course":
        $idCourse = _isset($_POST, "id-course");
        $totalQuiz = _isset($_POST, "total-quiz");
        if (_db_pushCourse($idCourse, $totalQuiz)) {
            $r["status"] = 1;
            $r["msg"] = "push course success!";
        } else {
            $r["msg"] = "push course fail!";
        }
        break;
    case "get-course":
        $idCourse = _isset($_POST, "id-course");
        $r["status"] = 1;
        $r["msg"] = "get course success!";
        $r["data"] = _db_getCourse($idCourse);
        break;
}

header("content-type: application/json");
die(json_encode($r));
