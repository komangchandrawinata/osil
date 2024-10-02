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

    $id_hasil = $_POST['id_hasil'];


    $haemoglobin = $_POST['haemoglobin'];
    $hematokrit = $_POST['hematokrit'];
    $eritrosit_h = $_POST['eritrosit_h'];
    $leukosit_h = $_POST['leukosit_h'];
    $trombosit = $_POST['trombosit'];
    $laju_endap = $_POST['laju_endap'];
    $basofil = $_POST['basofil'];
    $eosinofil = $_POST['eosinofil'];
    $staf = $_POST['staf'];
    $segmen = $_POST['segmen'];
    $limfosit = $_POST['limfosit'];
    $monosit = $_POST['monosit'];



    $sq_hem= "INSERT INTO hematologi (
        id_hematologi,haemoglobin,hematokrit,eritrosit_h,leukosit_h,trombosit,laju_endap,basofil,eosinofil,staf,segmen,limfosit,monosit,id_hasil)
    VALUES
    ('','$haemoglobin','$hematokrit','$eritrosit_h','$leukosit_h','$trombosit','$laju_endap','$basofil','$eosinofil','$staf','$segmen','$limfosit','$monosit','$id_hasil')";

    $qry_hem=mysqli_query($connect,$sq_hem);


    if($qry_hem){

        echo "<script language=\"Javascript\">\n";
        echo "alert('Data Hasil Lab Pemeriksaan Hematologi Berhasil ditambahkan');";
        echo "</script>";

        ?>




        <?php

        $id_hasil = $_GET["id_hasil"];

        $sql= "SELECT * FROM hasil WHERE id_hasil=$id_hasil";

        $query = mysqli_query($connect,$sql);
        $dt = mysqli_fetch_assoc($query);
        $no_rm=$dt['no_rm'];
        

        $sq= "SELECT * FROM pasien WHERE no_rm=$no_rm";

        $query = mysqli_query($connect,$sq);




        while($data = mysqli_fetch_assoc($query)) {

            $nama_pasien=$data['nama_pasien'];
            $tgl_lahir=$data['tgl_lahir'];
            $j_kelamin=$data['j_kelamin'];
            $alamat=$data['alamat'];
            $j_pasien=$data['j_pasien'];
            $ruangan=$data['ruangan'];

            $dokter_rujukan=$data['dokter_rujukan'];


        }

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

                            <!-- Database Pasien -->
                            <li class="nav-item">
                                <a class="nav-link" href="adminpasienlist.php">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Database Pasien</span></a>
                                </li>

                                <!-- Database Hasil Lab-->
                                <li class="nav-item active">
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
                                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                                    <h1 class="h3 mb-0 text-gray-800">Input Hasil Lab Pemeriksaan Hematologi</h1>
                                </div>


                                <div class="card-body">


                                    <div class="row">

                                <label class="col-sm-3 col-form-label">Pasien</label>
                                <label class="col-sm-3 col-form-label"> : <?php echo $nama_pasien; ?></label>

                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">Tanggal Hasil</label>
                                <label class="col-sm-3 col-form-label"> : <?php echo date("d-M-Y"); ?></label>
                                
                            </div>



                                </div>




                                <div class="row ">

                                   <!-- Menu 1 -->

                                   <div class="card shadow mb-1">

                                    <div class="card-body  d-block card-header py-3 border-left-warning">
                                        <h6 class="m-0 font-weight-bold text-gray-600">HEMATOLOGI</h6>

                                    </div>

                                </div>

                                <!-- Menu 2 URINALISA-->

                                <?php
                                if($dt['urinalisa']!="")
                                {
                                    ?>

                                    <div class="card shadow mb-1">
                                        <?php
                                        $sql_u= "SELECT * FROM urinalisa WHERE id_hasil=$id_hasil";

                                        $query = mysqli_query($connect,$sql_u);
                                        $dt_u = mysqli_fetch_assoc($query);

                                        if(isset($dt_u)){

                                            ?>
                                            <div class="card-body  d-block card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-600">URINALISA</h6>

                                            </div>

                                            <?php

                                        }


                                        else {

                                            ?>

                                            <a href="admin_addurinalisa.php?id_hasil=<?php echo "$id_hasil";?>">
                                                <div class="card-body  d-block card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-gray-600">URINALISA</h6>

                                                </div>
                                            </a>

                                            <?php

                                        }
                                        ?>





                                    </div>

                                    <?php
                                }
                                ?>




                                <!-- Menu 3 BAKTERIOLOGI / PARASITOLOGI-->

                                <?php
                                if($dt['bakteriologi']!="")
                                {
                                    ?>

                                    <div class="card shadow mb-1">
                                        <?php
                                        $sql_u= "SELECT * FROM bakteriologi WHERE id_hasil=$id_hasil";

                                        $query = mysqli_query($connect,$sql_u);
                                        $dt_u = mysqli_fetch_assoc($query);

                                        if(isset($dt_u)){

                                            ?>
                                            <div class="card-body  d-block card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-600">BAKTERIOLOGI / PARASITOLOGI</h6>

                                            </div>

                                            <?php

                                        }


                                        else {

                                            ?>

                                            <a href="admin_addbakteriologi.php?id_hasil=<?php echo "$id_hasil";?>">
                                                <div class="card-body  d-block card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-gray-600">BAKTERIOLOGI / PARASITOLOGI</h6>

                                                </div>
                                            </a>

                                            <?php

                                        }
                                        ?>


                                    </div>

                                    <?php
                                }
                                ?>



                                <!-- Menu 4 IMUNOSEROLOGI-->

                                <?php
                                if($dt['imunoserologi']!="")
                                {
                                    ?>

                                    <div class="card shadow mb-1">
                                        <?php
                                        $sql_u= "SELECT * FROM imunoserologi WHERE id_hasil=$id_hasil";

                                        $query = mysqli_query($connect,$sql_u);
                                        $dt_u = mysqli_fetch_assoc($query);

                                        if(isset($dt_u)){

                                            ?>
                                            <div class="card-body  d-block card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-600">IMUNOSEROLOGI</h6>

                                            </div>

                                            <?php

                                        }


                                        else {

                                            ?>

                                            <a href="admin_addserologi.php?id_hasil=<?php echo "$id_hasil";?>">
                                                <div class="card-body  d-block card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-gray-600">IMUNOSEROLOGI</h6>

                                                </div>
                                            </a>

                                            <?php

                                        }
                                        ?>





                                    </div>

                                    <?php

                                }
                                ?>



                                <!-- Menu 5 KIMIA KLINIK-->

                                <?php
                                if($dt['kimia_klinik']!="")
                                {
                                    ?>

                                    <div class="card shadow mb-1">
                                        <?php
                                        $sql_u= "SELECT * FROM kimia_klinik WHERE id_hasil=$id_hasil";

                                        $query = mysqli_query($connect,$sql_u);
                                        $dt_u = mysqli_fetch_assoc($query);

                                        if(isset($dt_u)){

                                            ?>
                                            <div class="card-body  d-block card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-600">KIMIA KLINIK</h6>

                                            </div>

                                            <?php

                                        }


                                        else {

                                            ?>

                                            <a href="admin_addkimia_darah.php?id_hasil=<?php echo "$id_hasil";?>">
                                                <div class="card-body  d-block card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-gray-600">KIMIA KLINIK</h6>

                                                </div>
                                            </a>

                                            <?php

                                        }
                                        ?>





                                    </div>


                                    <?php

                                }
                                ?>







                            </div>
                            <!--akhir menu-->




                            <!--Awal Form-->










                            <div class="card-body shadow mb-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <a href="adminhasillist_result.php?id_hasil=<?php echo"$id_hasil";?>"><button class="btn btn-primary form-group">Lihat Hasil Lab Lengkap</button></a>

                                    </div>
                                    <i> atau pilih jenis pemeriksaan lain </i>

                                </div>

                            </div>

                            <?php

                        }
                    }
                    ?>





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