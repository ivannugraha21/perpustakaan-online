<?php
	if (!isset($this->session->userdata['logged_in'])) {
		header("location: " . site_url() . "login");
	} 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8" />
	  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/icon.png">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	  <title>Perpustakaan Online</title>
	  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	  <!--     Fonts and icons     -->
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	  <!-- CSS Files -->
	  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
	  <link href="<?php echo base_url();?>assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
	  <!-- CSS Just for demo purpose, don't include it in your project -->
	  <link href="<?php echo base_url();?>assets/demo/demo.css" rel="stylesheet" />
	</head>
	<body class="landing-page sidebar-collapse">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg bg-primary fixed-top">
			<div class="container">
				<div class="navbar-translate">
					<a class="navbar-brand" href="<?php echo base_url();?>">
						<b>Perpustakaan Online</b>
					</a>
					<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar top-bar"></span>
						<span class="navbar-toggler-bar middle-bar"></span>
						<span class="navbar-toggler-bar bottom-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="<?php echo base_url();?>assets/img/blurred-image-1.jpg">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>buku" onclick="scrollToDownload()">
								<i class="now-ui-icons files_single-copy-04"></i>
								<p>Data Buku</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>transaksi" onclick="scrollToDownload()">
								<i class="now-ui-icons business_money-coins"></i>
								<p>Transaksi</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url();?>logout" onclick="scrollToDownload()">
								<i class="now-ui-icons media-1_button-power"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->
		<div class="wrapper">
			<div class="section section-about-us">
				<div class="container">
					<br><br>
					<div class="row">
						<div class="col-md-8 ml-auto mr-auto text-center">
							<h2 class="title" style="margin-bottom: 0px;">Selamat Datang di Perpustakaan Online</h2>
						</div>
					</div>
					<div class="separator separator-primary"></div>
						<div class="section-story-overview">
							<div class="row">
								<div class="col-md-12">
									<div class="image-container" style="background-image: url('<?php echo base_url();?>assets/img/image1.png')">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<footer class="footer footer-default">
				<div class=" container ">
					<div class="copyright" id="copyright">
						Perpustakaan Online &copy; 2022
					</div>
				</div>
			</footer>
		</div>
		<!--   Core JS Files   -->
		<script src="<?php echo base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/popper.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
		<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
		<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-switch.js"></script>
		<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
		<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
		<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
		<script src="<?php echo base_url();?>assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
	</body>
</html>