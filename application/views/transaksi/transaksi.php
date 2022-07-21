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
		<title>Data Transaksi</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--Fonts and icons-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS Files -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
		<link href="<?php echo base_url();?>assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
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
							<div id="noty-holder">
							<?php 
								if (isset($this->session->userdata['notif'])) {
									$type  = $this->session->userdata['notif']['type'];
									$msg   = $this->session->userdata['notif']['msg'];
									echo '
										<div class="alert alert-' . $type . ' alert-dismissable page-alert">
											<button type="button" class="close">
												<span aria-hidden="true">×</span>
												<span class="sr-only">Close</span>
											</button>
											' . $msg . '
										</div>';
									$this->session->unset_userdata('notif');
								}
							?>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="tab-content text-center">
										<div class="row">
											<div class="col-sm-12 col-lg-12">
												<h4>TRANSAKSI PEMINJAMAN DAN PENGEMBALIAN</h4>
												<hr>
											</div>
										</div>
										<table id="table_id" class="display table-bordered">
											<thead>
												<tr>
													<th>Judul Buku</th>
													<th>Nama Peminjam</th>
													<th>Tanggal Pinjam</th>
													<th>Estimasi Kembali</th>
													<th>Tanggal Kembali</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
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
				<div class="copyright" id="copyright" style="width: 100%; text-align: center;">
					Perpustakaan Online &copy; 2022
				</div>
			</div>
		</footer>
		<!--   Core JS Files   -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   	
		<script src="<?php echo base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/popper.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
		<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
		<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-switch.js"></script>
		<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
		<script src="<?php echo base_url();?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
		<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
		<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
		<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
		<script src="<?php echo base_url();?>assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
		<script>
			$(document).ready( function () {
				//
				var table = $('#table_id').DataTable({
					autoWidth: false,
					pageLength : 5,
					scrollX: true,
					dom: 'Bfrtip',
					buttons: [{
					  text: 'Pinjam Buku',
					  attr: {
						'id': 'btn-inputbuku',
						'class': 'btn btn-primary',
						'style': 'margin: 0'
					  },
					  action: function(e, dt, node, config) {
						window.location.href = '<?php echo base_url();?>transaksi/input'
					  }
					}]
				});
				// Post
				$.ajax({
					type: "POST",
					dataType: "json", 
					data: {},
					url: "<?php echo base_url();?>transaksi/getDataTransaksi",
					success: function(data) {
						console.log(data);	
						// Remove Data from DataTable
						$('#table_id').DataTable().clear().draw();
						//
						for (var i = 0; i < data.length; i++) {
							var dateAr = '-';
							var Action = '<button onclick="update(' + data[i].id + ')" class="btn btn-primary">Pengembalian</button>';
							if (data[i].tanggal_kembali != null) {
								dateAr = moment(data[i].tanggal_kembali).format('DD MMMM YYYY');
								Action = '';
							}
							var Date1 = moment(data[i].tanggal_pinjam).format('DD MMMM YYYY');
							var Date2 = moment(data[i].estimasi_pengembalian).format('DD MMMM YYYY');
							//
							$('#table_id').DataTable().row.add([data[i].buku.judul_buku, data[i].nama_peminjam, Date1, Date2, dateAr, Action]).draw(false);
						}
						
					}
				});
				//
				$('.page-alert .close').click(function(e) {
						e.preventDefault();
						$(this).closest('.page-alert').slideUp();
					});
			} );
			// Function Area
			function update(x) {
				$.ajax({
					type: "POST",
					dataType: "json", 
					data: {id: x, ArrDate: moment().format('YYYY-MM-DD')},
					url: "<?php echo base_url();?>transaksi/Pengembalian",
					success: function(data) {
						location.reload();
					}
				});
			}
		</script>		
	</body>
</html>