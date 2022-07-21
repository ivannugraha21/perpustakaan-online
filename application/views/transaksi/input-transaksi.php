<?php
	if (!isset($this->session->userdata['logged_in'])) {
		header("location: " . site_url() . "login");
	} 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>
			Perpustakaan Online
		</title>
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
							<div class="card">
								<div class="card-body">
									<div class="tab-content text-center">
										<div class="row">
											<div class="col-sm-12 col-lg-12">
												<h4>PEMINJAMAN BUKU</h4>
												<hr>
											</div>
										</div>
										<div class="row">
											<form id="form-input" class="col-md-12 col-lg-8">
												
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 15px 0 0 0;">Judul Buku</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group" style="text-align:left;">
															<select name="judul_buku" class="selectpicker " data-style="btn-primary" data-width="100%">
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Penulis</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<p id="lblPenulis" style="margin: 5px 0 15px 0;">-</p>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Rak Buku</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<p id="lblRakBuku" style="margin: 0 0 15px 0;">-</p>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Peminjam</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input name="peminjam" type="text" placeholder="Masukan Nama Peminjam" class="form-control" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Umur Peminjam</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input name="umur_peminjam" type="number" min="1" value="1" placeholder="Masukan Nama Peminjam" class="form-control" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Tanggal Pinjam Buku</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input onkeydown="return false" name="tanggal_pinjam_buku" id="date1" type="text" class="form-control date-picker" data-datepicker-color="primary">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 col-lg-4">
														<p style="margin: 5px 0 0 0;">Estimasi Pengembalian</p>
													</div>
													<div class="col-sm-8 col-lg-8">
														<div class="form-group">
															<input onkeydown="return false" name="estimasi_pengembalian" id="date2" type="text" class="form-control date-picker" data-datepicker-color="primary">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 col-lg-12" style="text-align: left;">
														<hr>
														<button class="btn btn-primary">Simpan</button>
														<a href="<?php echo base_url();?>transaksi" class="btn btn-warning">Kembali</a>
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
		<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
		<script src="<?php echo base_url();?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
		<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>   
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
		<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
		<script src="<?php echo base_url();?>assets/js/now-ui-kit.js" type="text/javascript"></script>
		<script>
			$(document).ready(function () {
				// Global Variable
				var GlobalVar = [];
				// Config DatePicker
				$('#date1').datepicker({
					format: 'yyyy-mm-dd',
					startDate: new Date(new Date().getTime() + 86400000),
					autoclose: true,
				}).on("change", function() {
					var minDate = new Date(this.value);
						minDate = new Date(minDate.getTime() + 86400000);
					$('#date2').datepicker('setStartDate', minDate);
				});
				
				$('#date2').datepicker({
					format: 'yyyy-mm-dd',
					startDate: new Date(new Date().getTime() + (2 * 86400000)),
					autoclose: true,
				}).on("change", function() {
					var maxDate  = new Date(this.value);
						maxDate = new Date(maxDate.getTime() - 86400000);
					$('#date1').datepicker('setEndDate', maxDate);
				});
				// Get Data Buku
				$.ajax({
					type: "POST",
					dataType: "json", 
					data: {},
					url: "<?php echo base_url();?>buku/get_buku_all",
					success: function(data) {
						//console.log(data);
						for (var i = 0; i < data.length; i++) {
							if (+data[i].status != 0) {
								GlobalVar.push(data[i]);
								$('[name="judul_buku"]').append('<option value="' + data[i].judul_buku + '">' + data[i].judul_buku + '</option>');
							}
						}
						// Update Input
						$('[name="judul_buku"]').val(GlobalVar[0].judul_buku);
						$('[name="judul_buku"]').selectpicker("refresh");
						$('#lblPenulis').text(GlobalVar[0].penulis);
						$('#lblRakBuku').text(GlobalVar[0].rak_buku);
						//
						$('[name="judul_buku"]').on('change', function(){
						   var selected = $('.selectpicker option:selected').val();
						   //
						   for (var i = 0; i < GlobalVar.length; i++) {
							   if (GlobalVar[i].judul_buku == selected) {
								   $('#lblPenulis').text(GlobalVar[i].penulis);
								   $('#lblRakBuku').text(GlobalVar[i].rak_buku);
							   }
						   }   
						});
					}
				});
				// Form Validate	
				$("#form-input").validate({
					rules: {
						peminjam: {
							required: true,
						},
						umur_peminjam: {
							required: true,
							number: true,
							min: 8,							
							max: 70
						},
						tanggal_pinjam_buku: {
							required: true,
						},
						estimasi_pengembalian: {
							required: true,
						},
						
					},
					submitHandler: function (form, event) {
						event.preventDefault();
						var data = $("#form-input").serialize();
						for (var i = 0; i < GlobalVar.length; i++) {
							console.log();
							if ($('[name="judul_buku"]').val() == GlobalVar[i].judul_buku) {
								data += '&buku_id=' + GlobalVar[i].id;
							}
						}
						//console.log(data);	
						$.ajax({
							type: "POST",
							dataType: "json", 
							data: data,
							url: "<?php echo base_url();?>transaksi/pinjam_buku",
							success: function(data) {
								window.location.href = '<?php echo base_url();?>transaksi'
							}
						});
					}
				});
			});
		</script>       	
	</body>
</html>