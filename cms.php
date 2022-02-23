<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once "inc/sidebar.php";
include_once "config/config.php";


$sql_analysisTotalRecord = "SELECT COUNT(id) AS count FROM log WHERE id_tool=%d"; // tổng bản ghi
$sql_analysisTotalUser = "SELECT COUNT(DISTINCT username) AS count FROM log WHERE id_tool=%d"; //tổng người sử dụng
$sql_analysisNewUser = "SELECT username, time FROM log WHERE id_tool=%d ORDER BY time DESC"; // người dùng mới nhất
$sql_analysisMostRegion = "SELECT region, COUNT(region) AS count, country FROM log WHERE id_tool=%d GROUP BY region ORDER BY count DESC LIMIT 1"; //thành phố sử dụng nhiều nhất
$sql_analysisTimeFetch = "SELECT time FROM log WHERE id = (SELECT id FROM log WHERE id_tool=%d ORDER BY (time) ASC LIMIT 1) OR id = (SELECT id FROM log WHERE id_tool=%d ORDER BY (time) DESC LIMIT 1)";

$totalRecord = _fetch(sprintf($sql_analysisTotalRecord, 1))["count"];
$totalUser = _fetch(sprintf($sql_analysisTotalUser, 1))["count"];
$newUsers = _fetch(sprintf($sql_analysisNewUser, 1));
$mostRegions = _fetch(sprintf($sql_analysisMostRegion, 1));
$timeFetchs = _fetchs(sprintf($sql_analysisTimeFetch, 1, 1, 1));

$newUser = $newUsers["username"];
$newUserTime = date("H:i:s - d/m/Y", isset($newUsers["time"]) ? $newUsers["time"] : 0);

$countMost = isset($mostRegions["count"]) ? $mostRegions["count"] : 0;
$region = isset($mostRegions["region"]) ? $mostRegions["region"] : "Sao hỏa";
$country = isset($mostRegions["country"]) ? $mostRegions["country"] : "Sao hỏa";

$timeFirst = 0;
$timeLast = 0;
if (count($timeFetchs) > 1) {
    $timeFirst = $timeFetchs[0]["time"];
    $timeLast = $timeFetchs[1]["time"];
}
$totalSecord = $timeLast - $timeFirst;
$dayFetch = (int) ($totalSecord / 60 / 60 / 24);
?>


<!-- Sidebar chat end-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Row Starts -->
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>Thông tin FPL@utoCMS <span style="font-size: 15px;">/ 10 Quiz 10 point easy.</span></h4>
                </div>
            </div>
        </div>
        <!-- Row end -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="md-card-block">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="m-auto d-block">
                                        <img src="assets/images/app.png" alt="" class="img-fluid" style="margin-bottom: 10px;">
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <p class="m-b-20">
                                        <span class="f-w-600 f-16 d-block m-b-10">
                                            FPLAutoCMS là gì?
                                        </span>
                                        Là phần mềm tự động giải tất cả các bài tập trên tất cả các khóa học trong hệ thống CMS của trường FPT POLYTECHNIC.
                                    </p>
                                    <p class="m-b-20">
                                        <span class="f-w-600 f-16 d-block m-b-10">
                                            Nó có thể giải được hết tất cả các quiz chứ?
                                        </span>
                                        Trừ các câu hỏi có chứa các đáp án tự luận ra còn lại có thể giải được hết.
                                    </p>
                                    <p class="m-b-20">
                                        <span class="f-w-600 f-16 d-block m-b-10">
                                            Tôi sẽ làm các câu tự luận ra sao?
                                        </span>
                                        Tìm các câu hỏi tự luận và điền đáp vào, sau đó submit kết quả ( không được làm lại các câu hỏi khác!)
                                    </p>
                                    <div class="dropdown-divider"></div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tổng lượt truy cập:</td>
                                                <td><?php echo $totalRecord; ?> lượt</td>
                                            </tr>
                                            <tr>
                                                <td>Tổng số người dùng:</td>
                                                <td><?php echo $totalUser; ?> người</td>
                                            </tr>
                                            <tr>
                                                <td>Người dùng mới nhất:</td>
                                                <td><?php echo $newUser; ?> ( lúc <?php echo $newUserTime; ?> )</td>
                                            </tr>
                                            <tr>
                                                <td>Khu vực dùng nhiều nhất:</td>
                                                <td><?php echo $region; ?> - <?php echo $country; ?> (<?php echo $countMost; ?> lần sử dụng)</td>
                                            </tr>
                                            <tr>
                                                <td>Tổng thời gian phân tích:</td>
                                                <td><?php echo $dayFetch; ?> ngày</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <p class="m-b-20">
                                        <span class="f-w-600 f-16 d-block m-b-10">
                                            Phản hồi từ người dùng:
                                        </span>
                                    <div>
                                        <?php
                                        $sql = "SELECT * FROM feedbacks WHERE tool_id = 1 ORDER BY (time) DESC LIMIT 10";
                                        $feedbacks = _fetchs($sql);
                                        foreach ($feedbacks as $fb) {
                                            $username = $fb["username"];
                                            $text = $fb["text"];
                                            $time = date("d/m/Y - H:i:s", $fb["time"]);
                                        ?>
                                            <div>
                                                <span style="color: green">[<?= $time ?>]</span>
                                                <span style="color: red"><?= $username ?>:</span>
                                                <span style="color: blue; font-size: 14px"> <?= $text ?></span>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid ends -->
</div>
</div>


<?php
include_once "inc/footer.php";
