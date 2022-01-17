<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once "inc/sidebar.php";
include_once "config/config.php";

$id = 2;
$sql = "SELECT * FROM tools WHERE id=$id";
$data = _fetch($sql);

$name = $data["name"];
$version = $data["version"];
$status = $data["status"];

if (_isset($_POST, "update") !== false) {
    $name = _isset($_POST, "name");
    $version = _isset($_POST, "version");
    $status = _isset($_POST, "status");
    $sql  = "UPDATE tools SET name='$name', version='$version', status=$status WHERE id=$id";
    _query($sql);
}
?>


<!-- Sidebar chat end-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <!-- Row Starts -->
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>Quản lý Phiên bản FPL@utoLMS <span style="font-size: 15px;">/ 10 Quiz 10 point easy.</span></h4>
                </div>
            </div>
        </div>
        <!-- Row end -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="md-card-block">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="">Id</label>
                                    <input type="number" class="form-control" name="id" value="<?php echo $id; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên Tool LMS:</label>
                                    <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo $name; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Phiên bản:</label>
                                    <input type="text" name="version" class="form-control" placeholder="version" value="<?php echo $version; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Đóng mở sử dụng:</label>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php echo $status == 1 ? "selected" : "" ?>>Kích hoạt</option>
                                        <option value="0" <?php echo $status == 0 ? "selected" : "" ?>>Bỏ kích hoạt</option>
                                    </select>
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
                            </form>
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
