<?php
include_once "config/config.php";
include_once "inc/header.php";

if (_is_admin()) {
	header("location: ./");
}
$error = "none";
if (_isset($_POST, "login") !== false) {
	$username = _isset($_POST, "username");
	$password = _isset($_POST, "password");
	$admin_username = $CONFIG["admin"]["username"];
	$admin_password = $CONFIG["admin"]["password"];
	if ($username == $admin_username && $password = $admin_password) {
		$_SESSION["admin"] = "ThienDepTrai!";
		header("location: ./");
	}
	$error = "block";
}
?>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" action="" method="POST">
						<div class="text-center">
							<a href="./">
								<img src="https://ap.poly.edu.vn/images/logo.png" alt="logo">
							</a>
						</div>
						<h3 class="text-center txt-primary">
							Khu vực dành cho quản trị viên
						</h3>
						<div class="alert alert-danger" role="alert" style="display: <?php echo $error ?>">
							Tài khoản mật khẩu không chính xác!
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="text" name="username" class="md-form-control" required="required" />
									<label>Tài khoản</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="password" name="password" class="md-form-control" required="required" />
									<label>Mật khẩu</label>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
								<div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
									<label class="input-checkbox checkbox-primary">
										<input type="checkbox" id="checkbox">
										<span class="checkbox"></span>
									</label>
									<div class="captions">Ghi nhớ đăng nhập</div>

								</div>
							</div>
							<div class="col-sm-6 col-xs-12 forgot-phone text-right">
								<a href="#" class="text-right f-w-600"> Quên mật khẩu?</a>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button name="login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
						<!-- <div class="card-footer"> -->
						<div class="col-sm-12 col-xs-12 text-center">
							<span class="text-muted">Bạn chưa có tài khoản?</span>
							<a href="#" class="f-w-600 p-l-5">Đăng kí ngay!</a>
						</div>

						<!-- </div> -->
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>

<?php
include_once "inc/footer.php";
