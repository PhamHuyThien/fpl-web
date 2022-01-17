<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once "inc/sidebar.php";
include_once "config/config.php";
include_once "api/system.call.php";

$sql = "SELECT COUNT(id) AS count FROM log WHERE id_tool=%d";
$countCMS = _fetch(sprintf($sql, 1))["count"];
$countLMS = _fetch(sprintf($sql, 2))["count"];
$day = __system_getDay();
$month = __system_getMonth();
$countToday = _system_getCounterDay($day, $month, "log/counter");
$counterMonth = _system_getCounterMonth($month, "log/counter");
?>
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <!-- Main content starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="main-header">
                <h4>Dashboard</h4>
            </div>
        </div>
        <!-- 4-blocks row start -->
        <div class="row dashboard-header">
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Truy cập hôm nay</span>
                    <h2 class="dashboard-total-products"><?php echo $countToday; ?></h2>
                    <span class="label label-success">UP</span> Người truy cập
                    <div class="side-box">
                        <i class="ti-signal text-warning-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Truy cập tháng này</span>
                    <h2 class="dashboard-total-products"><?php echo $counterMonth; ?></h2>
                    <span class="label label-danger">DOWN</span>Người truy cập
                    <div class="side-box ">
                        <i class="ti-gift text-primary-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>FPL@utoCMS Tool</span>
                    <h2 class="dashboard-total-products"><span><?php echo $countCMS; ?></span></h2>
                    <span class="label label-success">UP</span>Người sử dụng
                    <div class="side-box">
                        <i class="ti-rocket text-success-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>FPL@utoLMS Tool</span>
                    <h2 class="dashboard-total-products"><span><?php echo $countLMS; ?></span></h2>
                    <span class="label label-success">UP</span>Người sử dụng
                    <div class="side-box">
                        <i class="ti-rocket text-danger-color"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- 4-blocks row end -->

        <!-- 1-3-block row start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="https://i.imgur.com/SUx7VQV.jpg" style="width: 100%;">
                    <div class="card-img-overlay text-center" style="background-color: fade(#FFFFFF, 50%);">
                        <img src="assets/images/avatar-1.png" class="card-img" width="100" style="border-radius: 100%;" />
                        <h5 class="card-title">Mọi thứ trở lên đơn giản hơn bao giờ hết!</h5>
                        <p class="card-text">Tự động làm quiz LMS & CMS giúp bạn bớt deadline, dành thời gian vào những việc khác...</p>
                        <br />
                        <button onclick="window.location.href='https://www.facebook.com/ThienDz.SystemError'" class="btn btn-facebook waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Theo dõi tôi trên facebook.">
                            <span><i class="icofont icofont-social-facebook"></i></span>Follow Me
                        </button>
                        <button onclick="window.location.href='https://www.youtube.com/channel/UCixTxaXh6Iwv0X1Svf2-3sw'" type="button" class="btn btn-youtube waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Theo dõi tôi trên youtube.">
                            <span><i class="icofont icofont-social-youtube"></i></span>Follow Me
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- 1-3-block row end -->

    </div>
    <!-- Main content ends -->
</div>
<script>
    $(document).ready(function() {
        $.get("./api/?c=counter-inc");
    });
</script>
<?php
include_once "inc/footer.php";
