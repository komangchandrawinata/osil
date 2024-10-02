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
                                <h1 class="h3 mb-0 text-gray-800">List Data Pasien</h1>
                            </div>
                            <br>


                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">

                                <div class="card-body">




                                    <form method="get" action="adminpasienlist.php">

                                        <div class="row">
                                            <div class="col-sm-12 col-md-3">
                                                <input type="text" class="form-control form-control-sm" placeholder="Ketik No RM di Sini" aria-controls="dataTable" name="cari">
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <input type="submit" class="form-control form-control-sm" placeholder="" aria-controls="dataTable" value ="cari">
                                            </div>
                                        </div>

                                    </form>



                                    <br>
                                    <br>
                                    
                                    <div class="table-responsive p-0" style="height: 300px;">
                                       <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" >
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">No
                                                </th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >No RM
                                                </th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nama Pasien
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Tanggal Lahir
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Umur
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Jenis Kelamin
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Alamat
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Jenis Pasien
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Ruangan
                                                </th>
                                                
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Dokter Rujukan
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="3" aria-label="Salary: activate to sort column ascending" >
                                                </th>
                                            </tr>
                                            <?php

                                            if(isset($_GET['cari'])){
                                                $cari = $_GET['cari'];
                                                $pasien=0;
                                                $sq = mysqli_query($connect,"SELECT kode_lab FROM pengguna WHERE username='$username'");

                                                $data = mysqli_fetch_assoc($sq);
                                                $kode_lab=$data['kode_lab'];

                                                $sql = mysqli_query($connect,"SELECT * FROM pasien WHERE kode_lab ='$kode_lab' AND no_rm LIKE '%".$cari."%' ");

                                            } else{
                                                $pasien=0;


                                                $sq = mysqli_query($connect,"SELECT kode_lab FROM pengguna WHERE username='$username'");
                                                $data = mysqli_fetch_assoc($sq);
                                                $kode_lab=$data['kode_lab'];

                                                $sql = mysqli_query($connect,"SELECT * FROM pasien WHERE kode_lab ='$kode_lab' ORDER BY no_rm");
                                            }
                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                $pasien++;
                                                ?>
                                                <tr class="odd">
                                                    <td><?php echo $pasien;?></td>
                                                    <td><?php echo $data['no_rm'];?></td>
                                                    <td><?php echo $data['nama_pasien'];?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($data['tgl_lahir']));?></td>
                                                    <td>
                                                        <?php

                                                        $birthDate = new DateTime($data['tgl_lahir']);
                                                        $today = new DateTime("today");
                                                        if ($birthDate > $today) { 
                                                            exit("0 tahun 0 bulan 0 hari");
                                                        }
                                                        $y = $today->diff($birthDate)->y;
                                                        $m = $today->diff($birthDate)->m;
                                                        $d = $today->diff($birthDate)->d;

                                                        echo $y." Tahun ", $m." Bulan ", $d." Hari";


                                                        ?>
                                                    </td>
                                                    <td><?php echo $data['j_kelamin'];?></td>
                                                    <td><?php echo $data['alamat'];?></td>
                                                    <td><?php echo $data['j_pasien'];?></td>
                                                    <td><?php echo $data['ruangan'];?></td>
                                                    <td><?php echo $data['dokter_rujukan'];?></td>

                                                    <td><a href="admin_addhasil.php?no_rm=<?php echo"$data[no_rm]";?>"><button type="submit"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-medkit" aria-hidden="true"></i></button></a>
                                                    </td>
                                                    <td><a href="adminpasienlist_edit.php?no_rm=<?php echo"$data[no_rm]";?>"><button type="submit"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-pen" aria-hidden="true"></i></button></a>
                                                    </td>
                                                    <td><a href="adminpasienlist_del.php?no_rm=<?php echo"$data[no_rm]";?>"><button type="submit"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                                    </td>
                                                    
                                                </tr>
                                                
<?php } ?>
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>



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