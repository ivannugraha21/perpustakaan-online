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
		<title>
			Perpustakaan Online
		</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS Files -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
							<div id="noty-holder">
							<!-- Notif ambil data dari session -->
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
												<h4>DATA BUKU</h4>
												<hr>
											</div>
										</div>
										<table id="table_id" class="display table-bordered">
											<thead>
												<tr>
													<th>Judul Buku</th>
													<th>Penulis</th>
													<th>Jenis Buku</th>
													<th>Status</th>
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
						<a id="modal-btnDel" href="#" class="btn btn-block btn-danger">Hapus</a>
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
		<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
		<script src="<?php echo base_url();?>assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>	
		<!-- Custom JS -->
		<script>
			$(document).ready( function () {
				// DataTable
				var table = $('#table_id').DataTable({
					autoWidth: false,
					pageLength : 5,
					scrollX: true,
					dom: 'Bfrtip',
					buttons: [{
					  text: 'Input Buku',
					  attr: {
						'id': 'btn-inputbuku',
						'class': 'btn btn-primary',
						'style': 'margin: 0'
					  },
					  action: function(e, dt, node, config) {
						window.location.href = '<?php echo base_url();?>buku/input'
					  }
					}]
				});
				// Post
				$.ajax({
					type: "POST",
					dataType: "json", 
					data: {},
					url: "<?php echo base_url();?>buku/get_buku_all",
					success: function(data) {
						// Remove Data from DataTable
						$('#table_id').DataTable().clear().draw();
						// Creating element
						var succ = '<span class="badge badge-success">Tersedia</span>';
						var fail = '<span class="badge badge-danger">Dipinjam</span>';
						//
						for (var i = 0; i < data.length; i++) {
							var btn = '<a href="<?php echo base_url();?>buku/detail/' + data[i].id + '" class="btn btn-primary">Detail</a>';
								btn += '<a href="<?php echo base_url();?>buku/edit/' + data[i].id + '" class="btn btn-primary">Edit</a>';
								btn += (+data[i].status != 1) ? '' : '<button onclick="PopAlert(' + data[i].id + ')" class="btn btn-danger">Delete</button>';
							var label = (+data[i].status == 1) ? succ : fail;
							//
							$('#table_id').DataTable().row.add([data[i].judul_buku, data[i].penulis, data[i].jenis_buku, label, btn]).draw(false);
						}						
					}
				});
				// Notif Event
				$('.page-alert .close').click(function(e) {
					e.preventDefault();
					$(this).closest('.page-alert').slideUp();
				});
			});
			// Function Area
			function PopAlert(x) {
				$("#modal-btnDel").attr("href", "<?php echo base_url();?>buku/delete/" + x);
				$("#myModal1").modal('show');
			}	
		</script>	
	</body>
</html>