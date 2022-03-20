<?php
include_once "config/config.php";
$name = "Chào bạn";
if (_is_admin()) {
    $name = "Phạm Huy Thiên";
}
?>
<div class="wrapper">
    <!-- Loader -->
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <!-- Navbar-->
    <header class="main-header-top hidden-print">
        <a href="./" class="logo"><img class="img-fluid able-logo" src="https://ap.poly.edu.vn/images/logo.png" alt="Theme-logo" style="width:  110px;"></a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">
                <ul class="top-nav">
                    <!--Notification Menu-->

                    <li class="dropdown notification-menu">
                        <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <i class="icon-bell" ></i>
                            <span class="badge badge-danger header-badge">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="not-head">Bạn có 1 thông báo mới.</li>
                            <li class="bell-notification">
                                <a href="javascript:;" class="media">
                                    <span class="media-left media-icon">
                                        <img class="img-circle" src="assets/images/avatar-1.png" alt="User Image">
                                    </span>
                                    <div class="media-body"><span class="block">Wellcome!</span><span class="text-muted block-time">2 phút trước</span></div>
                                </a>
                            </li>
                            <li class="not-footer">
                                <a href="#!">Đánh dấu tất cả là đã xem.</a>
                            </li>
                        </ul>
                    </li>
                    <!-- chat dropdown -->
                    <li class="pc-rheader-submenu ">
                        <a href="#!" class="drop icon-circle displayChatbox">
                            <i class="icon-bubbles"></i>
                            <span class="badge badge-danger header-badge">1</span>
                        </a>

                    </li>
                    <!-- window screen -->
                    <li class="pc-rheader-submenu">
                        <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                            <i class="icon-size-fullscreen"></i>
                        </a>

                    </li>
                    <!-- User Menu-->
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                            <span><img class="img-circle " src="assets/images/avatar-1.png" style="width:40px;" alt="User Image"></span>
                            <span> <?php echo $name ?> <i class=" icofont icofont-simple-down"></i></span>

                        </a>
                        <ul class="dropdown-menu settings-menu">
                            <?php
                            if (!_is_admin()) {
                            ?>
                                <li><a href="login.php"><i class="icon-login"></i> Đăng nhập</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="logout.php"><i class="icon-logout"></i> Đăng xuất</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>

                <!-- /morphsearch-content -->
                <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
            </div>
            <!-- search end -->
</div>
</nav>
</header>
<!-- Side-Nav-->
<aside class="main-sidebar hidden-print ">
    <section class="sidebar" id="sidebar-scroll">
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="nav-level">--- Trang chủ</li>
            <li class="active treeview">
                <a class="waves-effect waves-dark" href="./">
                    <i class="icon-speedometer"></i><span> Dashboard</span>
                </a>
            </li>
            <li class="nav-level">--- Sản phẩm</li>
            <li class="treeview"><a class="waves-effect waves-dark" href="#"><i class="icofont icofont-company"></i><span> FPL@utoCMS</span><i class="icon-arrow-down"></i></a>
                <ul class="treeview-menu">
                    <li><a class="waves-effect waves-dark" href="cms.php"><i class="icon-arrow-right"></i> Thông tin</a></li>
                    <li><a class="waves-effect waves-dark" href="https://www.youtube.com/watch?v=kJQZ7rn1YXg"><i class="icon-arrow-right"></i> Hướng dẫn dùng</a></li>
                    <li><a class="waves-effect waves-dark" href="https://github.com/PhamHuyThien/fpl-auto-cms-4"><i class="icon-arrow-right"></i> Mã nguồn</a></li>
                    <li><a class="waves-effect waves-dark" href="https://github.com/PhamHuyThien/fpl-auto-cms-4/releases"><i class="icon-arrow-right"></i> Tải về</a></li>
                </ul>
            </li>

            <li class="treeview"><a class="waves-effect waves-dark" href="#"><i class="icofont icofont-company"></i><span> FPL@utoLMS</span><span class="label label-success menu-caption">New</span><i class="icon-arrow-down"></i></a>
                <ul class="treeview-menu">
                    <li><a class="waves-effect waves-dark" href="lms.php"><i class="icon-arrow-right"></i> Thông tin</a></li>
                    <li><a class="waves-effect waves-dark" href="https://youtu.be/TYhdLhFD3j8"><i class="icon-arrow-right"></i> Hướng dẫn dùng</a></li>
                    <li><a class="waves-effect waves-dark" href="https://github.com/PhamHuyThien/fpl-auto-lms-2"><i class="icon-arrow-right"></i> Mã nguồn </a></li>
                    <li><a class="waves-effect waves-dark" href="https://github.com/PhamHuyThien/fpl-auto-lms-2/releases"><i class="icon-arrow-right"></i> Tải về</a></li>
                </ul>
            </li>
            <?php
            if (_is_admin()) {
            ?>
                <li class="nav-level">--- Admin Panel</li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span> FPL@utoCMS Manager</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="admin_cms.php"><i class="icon-arrow-right"></i> Quản lý phiên bản</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span> FPL@utoLMS Manager</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="admin_lms.php"><i class="icon-arrow-right"></i> Quản lý phiên bản</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-docs"></i><span>Log Manager</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="#"><i class="icon-arrow-right"></i> Quản lý Log Counter</a></li>
                    </ul>
                </li>
            <?php
            }
            ?>
            <li class="nav-level">--- Về tác giả</li>
            <li class="treeview"><a class="waves-effect waves-dark" href="https://www.facebook.com/ThienDz.SystemError"><i class="icofont icofont-social-facebook"></i><span> Facebook</span>
            <li class="treeview"><a class="waves-effect waves-dark" href="https://www.facebook.com/ThienDz.SystemError"><i class="icofont icofont-social-instagram"></i><span> Instagram</span>
            <li class="treeview"><a class="waves-effect waves-dark" href="https://www.facebook.com/ThienDz.SystemError"><i class="icofont icofont-social-twitter"></i><span> Twitter</span>
            <li class="treeview"><a class="waves-effect waves-dark" href="https://www.youtube.com/channel/UCixTxaXh6Iwv0X1Svf2-3sw"><i class="icofont icofont-social-youtube"></i><span> Youtube</span>
            </li>
        </ul>
    </section>
</aside>