<?php 
session_start();
$username= $_SESSION['username'];
if($_SESSION['status']!="loginadmin"){
	echo "<script language=\"Javascript\">\n";
	echo "alert('Anda harus login');
	window.location='index.php'";
	echo "</script>";
}

include 'config.php';


?>


<?php
include "config.php";

if(isset($_POST['submit'])) {

	$no_rm = $_POST['no_rm'];
	$kode_lab = $_POST['kode_lab'];
	$tgl_hasil=date("Y-m-d");



	if (empty($no_rm)) {
		echo "<script language=\"Javascript\">\n";
		echo "alert('Data gagal ditambahkan');
		window.location='adminpasienlist.php'";
		echo "</script>";
	}else

	$sql= "INSERT INTO hasil (
		id_hasil,tgl_hasil,no_rm,kode_lab) VALUES ('','$tgl_hasil','$no_rm','$kode_lab')";

	$query=mysqli_query($connect,$sql);

	if($query){

		echo "<script language=\"Javascript\">\n";
		echo "alert('Silahkan Pilih Jenis Pemeriksaan untuk Menambahkan Hasil');";
		echo "</script>";
		?>


		<?php
		include 'config.php';

		$no_rm = $_GET["no_rm"];

		$sq= mysqli_query($connect,"SELECT nama_pasien,kode_lab FROM pasien WHERE no_rm='$no_rm'");
		$qry=mysqli_fetch_assoc($sq);
		$nama_pasien=$qry['nama_pasien'];
		$kode_lab=$qry['kode_lab'];

		?>


		<!DOCTYPE html>
		<html lang="en">

		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="description" content="">
			<meta name="author" content="">

			<title>O-SIL PUSKESMAS BANDAR LAMPUNG</title>
			<link rel="icon" type="image/png" href="osil_bdl.jpg">

			<!-- Custom fonts for this template-->
			<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
			<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">

			<!-- Custom styles for this template-->
			<link href="css/sb-admin-2.min.css" rel="stylesheet">

		</head>

		<body id="page-top">

			<!-- Page Wrapper -->
			<div id="wrapper">

				<!-- Sidebar -->
				<ul style="background-color: #e65c00;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

					<!-- Sidebar - Brand -->
					<li class="nav-item active">
						<a class="nav-link">
							<center><font size="6"><b>O-SIL</b></font></center>
							<center class="text-white"><font size="2">PUSKESMAS BANDAR LAMPUNG</font></center></a>
						</li>

						<hr class="sidebar-divider my-0">

						<!-- Menus -->

						<!-- Dashboard -->
						<li class="nav-item">
							<a class="nav-link" href="admindashboard.php">
								<i class="fas fa-fw fa-tachometer-alt"></i>
								<span>Dashboard</span></a>
							</li>

							

							<!-- Input Data Pasien -->
							<li class="nav-item">
								<a class="nav-link" href="adminpasienadd.php">
									<i class="fas fa-fw fa-user-plus"></i>
									<span>Input Pasien</span></a>
								</li>

								<!-- List Data Pasien -->
								<li class="nav-item active">
									<a class="nav-link" href="adminpasienlist.php">
										<i class="fas fa-fw fa-users"></i>
										<span>List Data Pasien</span></a>
									</li>

									<!-- List Data Lab -->
									<li class="nav-item">
										<a class="nav-link" href="adminhasillist.php">
											<i class="fas fa-fw fa-medkit"></i>
											<span>List Data Lab</span>
										</a>

									</li>


									<!-- Divider -->
									<hr class="sidebar-divider d-none d-md-block">

									<!-- Sidebar Toggler (Sidebar) -->
									<div class="text-center d-none d-md-inline">
										<button class="rounded-circle border-0" id="sidebarToggle"></button>
									</div>



								</ul>
								<!-- End of Sidebar -->

								<!-- Content Wrapper -->
								<div id="content-wrapper" class="d-flex flex-column">

									<!-- Main Content -->
									<div id="content">

										<!-- Topbar -->
										<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

											<!-- Sidebar Toggle (Topbar) -->
											<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
												<i class="fa fa-bars"></i>
											</button>

											<!-- Topbar Search -->


											<!-- Topbar Navbar -->
											<ul class="navbar-nav ml-auto">

												<!-- Nav Item - User Information -->
												<li class="nav-item dropdown no-arrow">
													<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin <?php echo $username ?></span>
													<img class="img-profile rounded-circle" src="logo_pemkotbdl.png">
												</a>
												<!-- Dropdown - User Information -->
												<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
												aria-labelledby="userDropdown">

												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
													<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
													Logout
												</a>
											</div>
										</li>

									</ul>

								</nav>
								<!-- End of Topbar -->

								<!-- Begin Page Content -->
								<div class="container-fluid">

									<!-- Page Heading -->
									<div class="d-sm-flex align-items-center justify-content-between mb-4">
										<h1 class="h3 mb-0 text-gray-800">Input Hasil Lab <?php echo $nama_pasien; ?></h1>
									</div>
									<br>


									<div class="card-body">


										<div class="row">
											<label class="col-sm-3 col-form-label">Tanggal Hasil</label>
											<label class="col-sm-3 col-form-label"> : <?php echo date("d-F-Y"); ?></label>
										</div>



									</div>




									<!-- DataTales Example -->
									



									<?php


									$sq_h= mysqli_query($connect,"SELECT max(id_hasil) as idhasilterbesar FROM hasil");
									$qry_h=mysqli_fetch_assoc($sq_h);
									$idhasilterbesar=$qry_h['idhasilterbesar'];
									$id_hasil=$idhasilterbesar++;?>






									<div class="row ">

										<!-- Menu 1 -->

										<div class="card shadow mb-1">

											<a href="admin_addhematologi.php?id_hasil=<?php echo "$id_hasil";?>">
												<div class="card-body  d-block card-header py-3">
													<h6 class="m-0 font-weight-bold text-gray-600">HEMATOLOGI</h6>

												</div>
											</a>

										</div>

										<!-- Menu 2 -->

										<div class="card shadow mb-1">

											<a href="admin_addurinalisa.php?id_hasil=<?php echo "$id_hasil";?>">
												<div class="card-body  d-block card-header py-3 ">
													<h6 class="m-0 font-weight-bold text-gray-600">URINALISA</h6>

												</div>
											</a>

										</div>

										<!-- Menu 3 -->

										<div class="card shadow mb-1">

											<a href="admin_addbakteriologi.php?id_hasil=<?php echo "$id_hasil";?>">
												<div class="card-body  d-block card-header py-3 ">
													<h6 class="m-0 font-weight-bold text-gray-600">BAKTERIOLOGI / PARASITOLOGI</h6>

												</div>
											</a>

										</div>

										<!-- Menu 4 -->

										<div class="card shadow mb-1">

											<a href="admin_addserologi.php?id_hasil=<?php echo "$id_hasil";?>">
												<div class="card-body  d-block card-header py-3 ">
													<h6 class="m-0 font-weight-bold text-gray-600">SEROLOGI / IMUNOLOGI</h6>

												</div>
											</a>

										</div>

										<!-- Menu 5 -->

										<div class="card shadow mb-1">

											<a href="admin_addkimia_darah.php?id_hasil=<?php echo "$id_hasil";?>">
												<div class="card-body  d-block card-header py-3 ">
													<h6 class="m-0 font-weight-bold text-gray-600">KIMIA DARAH</h6>

												</div>
											</a>

										</div>


									</div>

									<br>
									<br>
									<!--akhir menu-->

									<?php
								}


							}


							?>







						</div>

						<!-- End of Main Content -->

						<!-- Footer -->
						<footer class="sticky-footer bg-white">
							<div class="container my-auto">
								<div class="copyright text-center my-auto">
									<span>Copyright &copy; O-SIL PUSKESMAS BANDAR LAMPUNG 2021</span>
								</div>
							</div>
						</footer>
						<!-- End of Footer -->

					</div>
					<!-- End of Content Wrapper -->

				</div>
				<!-- End of Page Wrapper -->

				<!-- Scroll to Top Button-->
				<a class="scroll-to-top rounded" href="#page-top">
					<i class="fas fa-angle-up"></i>
				</a>

				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">

							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<h5 class="modal-body">Apakah Anda Ingin Logout?</h5>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
							<a class="btn btn-primary" href="logout.php">Logout</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Bootstrap core JavaScript-->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			<!-- Core plugin JavaScript-->
			<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

			<!-- Custom scripts for all pages-->
			<script src="js/sb-admin-2.min.js"></script>

			<!-- Page level plugins -->
			<script src="vendor/chart.js/Chart.min.js"></script>

			<!-- Page level custom scripts -->
			<script src="js/demo/chart-area-demo.js"></script>
			<script src="js/demo/chart-pie-demo.js"></script>



		</body>

		</html>
