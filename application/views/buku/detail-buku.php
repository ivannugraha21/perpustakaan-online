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
		<title>Detail Buku</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS Files -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/now-ui-kit.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
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
			<div class="section section-tabs">
				<div class="container">
					<div class="row">
						<div class="col-md-12 ml-auto col-xl-12 mr-auto">
							<br><br>
							<div class="card">
								<div class="card-body">
									<div class="tab-content text-center">
										<div class="row">
											<div class="col-sm-12 col-lg-12">
												<h4>DETAIL BUKU</h4>	
												<hr>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4 col-lg-4">
												<p> Judul Buku </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; <?php echo $judul_buku;?> </p>
											</div>
											<div class="col-sm-4 col-lg-4">
												<p> Penulis </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; <?php echo $penulis;?> </p>
											</div>
											<div class="col-sm-4 col-lg-4">
												<p> Tahun Terbit </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; <?php echo $tahun_terbit;?> </p>
											</div>
											<div class="col-sm-4 col-lg-4">
												<p> Penerbit </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; <?php echo $penerbit;?> </p>
											</div>
											<div class="col-sm-4 col-lg-4">
												<p> Jenis Buku </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; <?php echo $jenis_buku;?> </p>
											</div>
											<div class="col-sm-4 col-lg-4">
												<p> Tanggal Input Buku </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; 
												<?php 
													$date = explode('-', $tanggal_input_buku);
													$monthName = strftime('%B', mktime(0, 0, 0, intval($date[1])));
													echo $date[2] . ' ' .  $monthName . ' ' . $date[0];
												?> 
												</p>
											</div>
											<div class="col-sm-4 col-lg-4">
												<p> Sumber Buku </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; <?php echo $sumber_buku;?> </p>
											</div>
											<div class="col-sm-4 col-lg-4">
												<p> Buku Lama </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; 
												<?php 
													if ($buku_lama != 0) {
														echo "Iya";
													} else {
														echo "Tidak";
													}
												?> 
												</p>
											</div><div class="col-sm-4 col-lg-4">
												<p> Rak Buku </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; <?php echo $rak_buku;?> </p>
											</div>
											<div class="col-sm-4 col-lg-4">
												<p> Status </p>
											</div>	
											<div class="col-sm-8 col-lg-8">
												<p> : &nbsp; 
												<?php
													if ($status != 0) {
														echo '<span class="badge badge-success">Tersedia</span>';
													} else {
														echo '<span class="badge badge-danger">Dipinjam</span> ';
													}
												?>
													
												</p>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12 col-lg-12">
												<hr>
												<a href="<?php echo base_url();?>buku" class="btn btn-warning">Kembali</a>
												<button id="btn-delete" class="btn btn-danger" style="float:right;">Hapus</button>
												<button class="btn btn-success" style="float:right;">Edit</button>
											</div>
										</div>
									</div>
								</div>
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
		<div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<p id="modal-msg">Apa Anda Yakin?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Batal</button>
						<a href="<?php echo base_url() . 'buku/delete/' . $id;?>>" class="btn btn-block btn-danger">Hapus</a>
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
		<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
		<script src="<?php echo base_url();?>assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
		<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
		<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
		<!-- Custom JS -->
		<script> 
		$(document).ready(function () {
			$("#btn-delete").on('click', function() {
				$("#myModal1").modal('show');
			});
		});
		</script>
	</body>
</html>