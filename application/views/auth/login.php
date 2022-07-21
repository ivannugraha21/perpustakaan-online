<?php
	if (isset($this->session->userdata['logged_in'])) {
		header("location: " . site_url());
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/icon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Perpustakaan Online - Login</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!-- Fonts and icons -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS Files -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/now-ui-kit.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
	</head>
	<body class="login-page sidebar-collapse">
		<div class="page-header clear-filter" filter-color="orange">
			<div class="page-header-image"></div>
			<div class="content auth-content">
				<div class="container">
					<div class="col-md-4 ml-auto mr-auto">
						<div class="card card-login card-plain">
							<form class="form" id="login-form" method="post" action="">
								<div class="card-header text-center">
									<div class="logo-container">
										<img src="<?php echo base_url();?>assets/img/now-logo.png" alt="">
									</div>
								</div>
								<div class="card-body">
									<div class="input-group no-border input-lg">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="now-ui-icons users_circle-08"></i>
											</span>
										</div>
										<input id="email" name="email" type="text" class="form-control" placeholder="Email">
									</div>
									<div class="input-group no-border input-lg">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="now-ui-icons objects_key-25"></i>
											</span>
										</div>
										<input id="password" name="password" type="password" placeholder="Kata Sandi" class="form-control">
									</div>
								</div>
								<div class="card-footer text-center">
									<button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Login</button>
									<div class="pull-left">
										<h6>
											<a href="<?php echo base_url();?>register" class="link">Buat Akun Baru</a>
										</h6>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		
			<footer class="footer">
				<div class=" container ">
					<div class="copyright" id="copyright">
						Perpustakaan Online &copy; 2022
					</div>
				</div>
			</footer>
		</div>
		<div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header justify-content-center">
						<div class="modal-profile">
							<i class="now-ui-icons travel_info"></i>
						</div>
					</div>
					<div class="modal-body">
						<p id="modal-msg">Always have an access to your profile</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-block btn-link btn-neutral" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!--   Core JS Files   --> 
		<script src="<?php echo base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/popper.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
		<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
		<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-switch.js"></script>
		<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
		<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
		<!-- Plugin for Form Validation -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<!-- Custom JS -->
		<script> 
		$(document).ready(function () {
			$("#login-form").validate({
				rules: {
					email : {
						required: true,
						email: true
					},
					password: {
						required: true,
					}
				},
				submitHandler: function (form, event) {
					console.log('test');
					event.preventDefault();
					$.ajax({
						type: "POST",
						dataType: "json", 
						data: $("#login-form").serialize(),
						url: "<?php echo base_url();?>auth/post_login",
						success: function(data) {
							console.log(data);	
							//
							if (data.status != false) {
								location.reload();
							} else {
								$('#modal-msg').text(data.msg);
								$("#myModal1").modal('show');
							}							
						}
					});
				}
			});
		});
		</script>
	</body>
</html>