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
                <center><img style="width: 100px; margin: 5px;" src="osil_white.png"><center>
                </li>

                <hr class="sidebar-divider my-0">

                <!-- Menus -->

               <!-- Dashboard -->
                <li class="nav-item active">
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

                        <!-- Tambah Reagen -->
                        <li class="nav-item">
                            <a class="nav-link" href="proses_tambah_reagen.php">
                                <i class="fas fa-fw fa-user-plus"></i>
                                <span>Tambah Reagen</span></a>
                            </li>

                            <!-- Database Pasien -->
                            <li class="nav-item">
                                <a class="nav-link" href="adminpasienlist.php">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Database Pasien</span></a>
                                </li>

                                <!-- Database Hasil Lab-->
                                <li class="nav-item">
                                    <a class="nav-link" href="adminhasillist.php">
                                        <i class="fas fa-fw fa-medkit"></i>
                                        <span>Database Hasil Lab</span>
                                    </a>

                                </li>

                                <!-- Cetak Laporan -->
                                <li class="nav-item">
                                    <a class="nav-link" href="admincetaklaporan.php">
                                        <i class="fas fa-fw fa-medkit"></i>
                                        <span>Cetak Laporan</span>
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
                                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Petugas <?php echo $username ?></span>
                                                    <img class="img-profile rounded-circle"
                                                    src="logo_pemkotbdl.png">
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
                                        <h1 class="h3 mb-0 text-gray-800">Selamat Datang di Orange Sistem Informasi Laboratorium</h1>
                                    </div>
                                    <br>

                                    <!-- Content Row -->
                                    <div class="row">

                                        <!-- Jumlah Pasien Terdaftar -->
                                        <div class="col-xl-3 col-md-6 mb-4">

                                            <div class="card bg-primary text-white shadow">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">




                                                            <?php
                                                            $sq = mysqli_query($connect,"SELECT kode_lab FROM pengguna WHERE username='$username'");
                                                            $data = mysqli_fetch_assoc($sq);
                                                            $kode_lab=$data['kode_lab'];


                                                            $pasien=0;
                                                            $sql = mysqli_query($connect,"SELECT * FROM pasien WHERE kode_lab ='$kode_lab'");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                $pasien++;
                                                            }
                                                            ?>

                                                            <div class="text-white font-weight-bold text-uppercase mb-1">
                                                                <?php echo"$pasien"; ?> Pasien</div>
                                                                <div class="text-white-50 medium">Pasien Terdaftar</div>
                                                            </div>
                                                            <div class="col-auto">

                                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Jumlah Hasil Lab -->
                                            <div class="col-xl-3 col-md-6 mb-4">

                                                <div class="card bg-success text-white shadow">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">

                                                                <?php
                                                                $sq = mysqli_query($connect,"SELECT kode_lab FROM pengguna WHERE username='$username'");
                                                                $data = mysqli_fetch_assoc($sq);
                                                                $kode_lab=$data['kode_lab'];


                                                                $hasil=0;
                                                                $sql = mysqli_query($connect,"SELECT * FROM hasil WHERE kode_lab ='$kode_lab'");
                                                                while ($data = mysqli_fetch_assoc($sql)) {
                                                                    $hasil++;
                                                                }
                                                                ?>

                                                                <div class="text-white font-weight-bold text-uppercase mb-1">
                                                                    <?php echo "$hasil"; ?> Hasil</div>
                                                                    <div class="text-white-50 medium">Hasil Lab</div>
                                                                </div>
                                                                <div class="col-auto">

                                                                    <i class="fas fa-medkit fa-2x text-gray-300"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                               



                                                    <!-- Content Row -->
                                                    <div class="row">

                                                        <!-- Content Column -->
                                                        <div class="col-lg-6 mb-4">




                                                        </div>

                                                        <div class="col-lg-6 mb-4">


                                                        </div>

                                                    </div>


                                                    


                                                </div>
                                                <!-- /.container-fluid -->




                                            </div>
                                            <!-- End of Main Content -->





                                        </div>
                                        <!-- End of Content Wrapper -->


                                        <!-- Footer -->
                                        <footer class="sticky-footer bg-white">
                                            <div class="container my-auto">
                                                <div class="copyright text-center my-auto">
                                                    <span>Copyright &copy; POLITEKNIK KESEHATAN TANJUNGKARANG 2021</span>
                                                </div>
                                            </div>
                                        </footer>
                                        <!-- End of Footer -->



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