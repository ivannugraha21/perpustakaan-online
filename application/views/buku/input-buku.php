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
		<title>Input Buku</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS Files -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-select.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
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
							<!-- Nav tabs -->
							<div class="card">
								<div class="card-body">
								<!-- Tab panes -->
									<div class="tab-content text-center">
										<div class="row">
											<div class="col-sm-12 col-lg-12">
												<h4>INPUT BUKU</h4>
												<hr>
											</div>
										</div>
										<div class="row">
											<form id="form-input" class="col-md-12 col-lg-8">
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Judul Buku</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input name="judul_buku" type="text" placeholder="Masukan Judul Buku" class="form-control" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Penulis</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input name="penulis" type="text" placeholder="Masukan Nama Penulis" class="form-control" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Tahun Terbit</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input name="tahun_terbit" type="text" placeholder="Masukan Tahun (number)" class="form-control" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Penerbit</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input name="penerbit" type="text" placeholder="Masukan Nama Penerbit" class="form-control" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 15px 0 0 0;">Jenis Buku</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group" style="text-align:left;">
															<select name="jenis_buku" class="selectpicker " data-style="btn-primary" data-width="100%">
																<option value="Dongeng">Dongeng</option>
																<option value="Komik">Komik</option>
																<option value="Majalah">Majalah</option>
																<option value="Buku">Buku Ilmiah</option>
																<option value="Novel">Novel</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Tanggal Input Buku</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input onkeydown="return false" name="tanggal_input_buku" id="datepicker" type="text" class="form-control date-picker" data-datepicker-color="primary">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Sumber Buku</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input name="sumber_buku" type="text" placeholder="Masukan Sumber Buku" class="form-control" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Buku Lama</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-check form-check-radio" style="margin: 5px 10px;">
															<label class="form-check-label" style="float: left; margin-bottom: 13px;">
																<input class="form-check-input" type="radio" name="buku_lama" id="exampleRadios1" value="1" checked>
																<span class="form-check-sign"></span>
																Ya
															</label>
															<label class="form-check-label" style="float: right; margin-bottom: 13px;">
																<input class="form-check-input" type="radio" name="buku_lama" id="exampleRadios1" value="0">
																<span class="form-check-sign"></span>
																Tidak
															</label>
														</div>  
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 15px 0 0 0;">Rak Buku</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<select name="rak_buku" class="selectpicker " data-style="btn-primary" data-width="100%">
																<option value="Dongeng Anak">Dongeng Anak</option>
																<option value="Novel">Novel</option>
																<option value="Umum">Umum</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 col-lg-12" style="text-align: left;">
														<hr>
														<button class="btn btn-primary">Simpan</button>
														<a href="<?php echo base_url();?>buku" class="btn btn-warning">Kembali</a>
													</div>
												</div>
											</form>
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
		<!--   Core JS Files   -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
		<script src="<?php echo base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/popper.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/bootstrap-select.min.js" type="text/javascript"></script>
		<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
		<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-switch.js"></script>
		<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>   
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
		<script src="<?php echo base_url();?>assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
		<script>
			$(document).ready(function () {
				$('#datepicker').datepicker({
					format: 'yyyy-mm-dd',
				});
				$("#form-input").validate({
					rules: {
						judul_buku : {
							required: true,
						},
						penulis: {
							required: true,
						},
						tahun_terbit: {
							required: true,
							number: true,
						},
						penerbit: {
							required: true,
						},
						tanggal_input_buku: {
							required: true,
						},
						sumber_buku: {
							required: true,
						}
					},
					submitHandler: function (form, event) {
						event.preventDefault();
						$.ajax({
							type: "POST",
							dataType: "json", 
							data: $("#form-input").serialize(),
							url: "input_buku",
							success: function(data) {
								window.location.href = "<?php echo base_url();?>buku";
							}
						});
					}
				});
			});
		</script>       	
	</body>
</html>