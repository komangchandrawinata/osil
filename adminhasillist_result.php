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
include "indo.php";

?>



<?php

$id_hasil = $_GET["id_hasil"];

$sql= "SELECT * FROM hasil WHERE id_hasil=$id_hasil";

$query = mysqli_query($connect,$sql);

while($data = mysqli_fetch_assoc($query)) {

    $tgl_hasil=$data['tgl_hasil'];
    $no_rm=$data['no_rm'];


    


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
                        <?php $sq = mysqli_query($connect,"SELECT * FROM pasien WHERE no_rm ='$no_rm'");
                        $dt = mysqli_fetch_assoc($sq);
                        $nama_pasien=$dt['nama_pasien'];
                        ?>

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Rincian Hasil Lab</h1>
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



                        <div class="card shadow mb-4">
<br>
                            <div class="col-md-12 row">
                                <div class="col-md-10"></div>

                                <a class="col-sm-2" href="adminhasillist_cetak.php?id_hasil=<?php echo"$id_hasil";?>"><button type="submit" class="btn btn-primary btn-form"><i class="fa fa-print" aria-hidden="true"></i>   Cetak Hasil</button></a>

                            </div>
<br>


                            <!-- collapse 001 -->
                            <?php $sq_he = mysqli_query($connect,"SELECT * FROM hematologi WHERE id_hasil ='$id_hasil'");
                            $dt_he = mysqli_fetch_assoc($sq_he);

                            if(isset($dt_he)){
                                ?>



                                <div class="d-block card-header">

            
                                        <a href="#collapse1" class="d-block card-header py-3 border-left-warning col-md-12" data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">HEMATOLOGI</h6></a>
                                        


                        

                                    <div id="collapse1" class="panel-collapse collapse in ">
                                        <div class="card-body">
                                            <?php
                                            if($dt_he['haemoglobin']!="")
                                            {
                                                ?>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Hemoglobin</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['haemoglobin']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(g/dL)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['hematokrit']!="")
                                            {
                                                ?>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Hematokrit</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['hematokrit']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(%)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['eritrosit_h']!="")
                                            {
                                                ?>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Eritrosit</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['eritrosit_h']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(10<sup>6</sup> sel/mm³)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['leukosit_h']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Leukosit</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['leukosit_h']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(sel/mm³)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['trombosit']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Trombosit</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['trombosit']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(sel/mm³)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['laju_endap']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Laju Endap Darah</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['laju_endap']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(mm/jam)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['basofil']!=""||$dt_he['eosinofil']!=""||$dt_he['staf']!=""||$dt_he['segmen']!=""||$dt_he['limfosit']!=""||$dt_he['monosit']!="")
                                            {
                                                ?>

                                                <hr>

                                                <h6 class="m-0 font-weight-bold text-gray-600">Hitung Jenis Leukosit</h6>
                                                <br>
                                                <?php
                                            }

                                            if($dt_he['basofil']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Basofil</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['basofil']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(%)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['eosinofil']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Eosinofil</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['eosinofil']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(%)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['staf']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Neutrofil Batang</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['staf']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(%)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['segmen']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Neutrofil Segmen</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['segmen']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(%)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['limfosit']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Limfosit</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['limfosit']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(%)</label>
                                                </div>
                                                <?php
                                            }

                                            if($dt_he['monosit']!="")
                                            {
                                                ?>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Monosit</label>
                                                    <div class="form-group col-lg-6">
                                                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['monosit']; ?>" disabled>
                                                    </div>
                                                    <label class="col-sm-3 col-form-label">(%)</label>
                                                </div>
                                                <?php
                                            }

                                            ?>
                                        </div>
                                    </div>

                                </div>

                                <?php

                            }

                            ?>


                            <!-- collapse 002 -->
                            <?php $sq_ur = mysqli_query($connect,"SELECT * FROM urinalisa WHERE id_hasil ='$id_hasil'");
                            $dt_ur = mysqli_fetch_assoc($sq_ur);

                            if(isset($dt_ur)){

                                ?>

                                <div class="d-block card-header">

                        
                                        <a href="#collapse2" class="d-block card-header py-3 border-left-warning col-md-12" data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">URINALISA</h6></a>



                     


                                    <div id="collapse2" class="panel-collapse collapse in">
                                        <div class="card-body">

                                         <?php
                                         if($dt_ur['warna']!=""||$dt_ur['kejernihan']!="")
                                         {
                                            ?>
                                            <h6 class="m-0 font-weight-bold text-gray-600">Makrokopis</h6>
                                            <br>
                                            <?php
                                        }

                                        if($dt_ur['warna']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Warna</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user" value="<?php echo $dt_ur['warna']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['kejernihan']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Kejernihan</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['kejernihan']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        ?>

                                        <hr>
                                        <?php


                                        if($dt_ur['leukosit_u']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Leukosit</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['leukosit_u']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['keton']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Keton</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['keton']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['nitrit']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Nitrit</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['nitrit']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }
                                        if($dt_ur['urobilinogen']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Urobilinogen</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['urobilinogen']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['bilirubin']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Bilirubin</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['bilirubin']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['protein']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Protein</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['protein']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['glukosa_r']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Glukosa/Reduksi</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['glukosa_r']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['berat_jenis']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Berat Jenis</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['berat_jenis']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['ph']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">pH</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['ph']; ?>" disabled>
                                                </div>

                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['leukosit_s']!=""||$dt_ur['eritrosit_s']!=""||$dt_ur['epitel']!="")
                                        {
                                            ?>

                                            <hr>

                                            <h6 class="m-0 font-weight-bold text-gray-600">Sedimen</h6>
                                            <br>
                                            <?php
                                        }

                                        if($dt_ur['leukosit_s']!="")
                                        {
                                            ?>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Leukosit</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user" value="<?php echo $dt_ur['leukosit_s']; ?>" disabled>
                                                </div>
                                                <label class="col-sm-3 col-form-label">(/LPB)</label>
                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['eritrosit_s']!="")
                                        {
                                            ?>
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Eritrosit</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['eritrosit_s']; ?>" disabled>
                                                </div>
                                                <label class="col-sm-3 col-form-label">(/LPB)</label>
                                            </div>
                                            <?php
                                        }

                                        if($dt_ur['epitel']!="")
                                        {
                                            ?>
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Epitel</label>
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['epitel']; ?>" disabled>
                                                </div>
                                                <label class="col-sm-3 col-form-label">(/LPK)</label>
                                            </div>

                                            <?php
                                        }


                                        ?>

                                    </div>
                                </div>
                            </div>

                            <?php

                        }




                        ?>


                        <!-- collapse 003 -->
                        <?php $sq_ba = mysqli_query($connect,"SELECT * FROM bakteriologi WHERE id_hasil ='$id_hasil'");
                        $dt_ba = mysqli_fetch_assoc($sq_ba);

                        if(isset($dt_ba)){

                            ?>

                            <div class="d-block card-header">

                
                                    <a href="#collapse3" class="d-block card-header py-3 border-left-warning col-md-12" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">BAKTERIOLOGI / PARASITOLOGI</h6></a>



                  

                                <div id="collapse3" class="panel-collapse collapse in">
                                    <div class="card-body">

                                       <?php


                                       if($dt_ba['m_tbc']!="")
                                       {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Mikroskopi TBC</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_ba['m_tbc']; ?>" disabled>


                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_ba['tcm_tbc']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Tes Cepat Molekuler TBC</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_ba['tcm_tbc']; ?>" disabled>


                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_ba['gonorhae']!="")
                                    {
                                        ?>

                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Gonorhea (GO)</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ba['gonorhae']; ?>" disabled>
                                            </div>
                                        </div>

                                        <?php
                                    }

                                    if($dt_ba['malaria']!="")
                                    {
                                        ?>



                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Malaria</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ba['malaria']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    ?>

                                </div>
                            </div>
                        </div>

                        <?php

                    }



                    ?>

                    <!-- collapse 004 -->
                    <?php $sq_se = mysqli_query($connect,"SELECT * FROM imunoserologi WHERE id_hasil ='$id_hasil'");
                    $dt_se = mysqli_fetch_assoc($sq_se);

                    if(isset($dt_se)){

                        ?>

                        <div class="d-block card-header">

          
                                <a href="#collapse4" class="d-block card-header py-3 border-left-warning col-md-12" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">IMUNOSEROLOGI</h6></a>



            


                            <div id="collapse4" class="panel-collapse collapse in">
                                <div class="card-body">
                                    <?php


                                    if($dt_se['hcg']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">HCG</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['hcg']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['igg_dengue']!=""||$dt_se['igm_dengue']!="")
                                    {
                                        ?>
                                        <hr>


                                        <h6 class="m-0 font-weight-bold text-gray-600">Anti Dengue</h6>

                                        <br>
                                        <?php
                                    }

                                    if($dt_se['igg_dengue']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- IgG</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['igg_dengue']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['igm_dengue']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- IgM</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['igm_dengue']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }


                                    ?>
                                    <hr>
                                    <?php


                                    if($dt_se['hbsag']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">HbsAg</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['hbsag']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['hiv']!="")
                                    {
                                        ?>


                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Anti HIV</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['hiv']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['rdt_syphilis']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">RDT Sifilis</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['rdt_syphilis']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['rpr']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">RPR</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['rpr']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['hcv']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Anti HCV</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['hcv']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['gol_darah']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Golongan Darah</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user"value="<?php echo $dt_se['gol_darah']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['s_thiphi_o']!=""||$dt_se['s_parathipy_ao']!=""||$dt_se['s_parathipy_bo']!=""||$dt_se['s_parathipy_co']!=""||$dt_se['s_thiphi_h']!=""||$dt_se['s_parathipy_ah']!=""||$dt_se['s_parathipy_bh']!=""||$dt_se['s_parathipy_ch']!="")
                                    {
                                        ?>
                                        <hr>

                                        <h6 class="m-0 font-weight-bold text-gray-600">Widal</h6>

                                        <br>
                                        <?php
                                    }

                                    if($dt_se['s_thiphi_o']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- S.Typhi O</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_thiphi_o']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['s_parathipy_ao']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- S.Parathyphi AO</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_parathipy_ao']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    if($dt_se['s_parathipy_bo']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- S.Parathyphi BO</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_parathipy_bo']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                     if($dt_se['s_parathipy_co']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- S.Parathyphi CO</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_parathipy_co']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['s_thiphi_h']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- S.Typhi H</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user"value="<?php echo $dt_se['s_thiphi_h']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['s_parathipy_ah']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- S.Parathyphi AH</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_parathipy_ah']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    if($dt_se['s_parathipy_bh']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- S.Parathyphi BH</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_parathipy_bh']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                     if($dt_se['s_parathipy_ch']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- S.Parathyphi CH</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_parathipy_ch']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['igg_covid']!=""||$dt_se['igm_covid']!="")
                                    {
                                        ?>
                                        <hr>
                                        <h6 class="m-0 font-weight-bold text-gray-600">Anti Covid-19</h6>

                                        <br>
                                        <?php
                                    }

                                    if($dt_se['igg_covid']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- IgG</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['igg_covid']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['igm_covid']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">- IgM</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['igm_covid']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }


                                    ?>
                                    <hr>
                                    <br>
                                    <?php


                                    if($dt_se['agcovid']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Antigen Covid-19</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['agcovid']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    if($dt_se['tifoid']!="")
                                    {
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">IgM Tifoid</label>
                                            <div class="form-group col-lg-6">
                                                <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['tifoid']; ?>" disabled>
                                            </div>
                                        </div>
                                        <?php
                                    }


                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php

                    }
                    ?>

                    <!-- collapse 005 -->
                    <?php $sq_kd = mysqli_query($connect,"SELECT * FROM kimia_klinik WHERE id_hasil ='$id_hasil'");
                    $dt_kd = mysqli_fetch_assoc($sq_kd);

                    if(isset($dt_kd)){


                        ?>

                        <div class="d-block card-header">

      
                                <a href="#collapse5" class="d-block card-header py-3 border-left-warning col-md-12" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">KIMIA KLINIK</h6></a>



           

                            <div id="collapse5" class="panel-collapse collapse in">
                                <div class="card-body">
                                   <?php


                                   if($dt_kd['gl_sewaktu']!="")
                                   {
                                    ?>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Glukosa Sewaktu</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['gl_sewaktu']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>
                                    <?php
                                }

                                if($dt_kd['gl_puasa']!="")
                                {
                                    ?>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Glukosa Puasa</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['gl_puasa']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>
                                    <?php
                                }
                                if($dt_kd['gl_pp']!="")
                                {
                                    ?>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Glukosa 2 Jam PP</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['gl_pp']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>

                                    <?php
                                }
                                if($dt_kd['cholesterol']!="")
                                {
                                    ?>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Cholesterol Total</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['cholesterol']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>
                                    <?php
                                }

                                if($dt_kd['hdl']!="")
                                {
                                    ?>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">HDL</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['hdl']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>

                                    <?php
                                }

                                if($dt_kd['ldl']!="")
                                {
                                    ?>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">LDL</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['ldl']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>
                                    <?php
                                }

                                if($dt_kd['trigliserida']!="")
                                {
                                    ?>


                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Trigliserida</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['trigliserida']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>

                                    <?php
                                }

                                if($dt_kd['sgot']!="")
                                {
                                    ?>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">SGOT / AST</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['sgot']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(U/L)</label>
                                    </div>
                                    <?php
                                }

                                if($dt_kd['sgpt']!="")
                                {
                                    ?>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">SGPT / ALT</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['sgpt']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(U/L)</label>
                                    </div>
                                    <?php
                                }

                                if($dt_kd['ureum']!="")
                                {
                                    ?>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Ureum</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['ureum']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>
                                    <?php
                                }
                                if($dt_kd['creatinin']!="")
                                {
                                    ?>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Kreatinin</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['creatinin']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>
                                    <?php
                                }

                                if($dt_kd['asam_urat']!="")
                                {
                                    ?>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Asam Urat</label>
                                        <div class="form-group col-lg-6">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['asam_urat']; ?>" disabled>
                                        </div>
                                        <label class="col-sm-3 col-form-label">(mg/dL)</label>
                                    </div>

                                    <?php
                                }


                                ?>

                            </div>
                        </div>
                    </div>

                    <?php

                }
                ?>

                <br>





                <div class="row">

                    <div class="col-sm-12 col-md-2 px-5">
                        <a href="admin_addhasil.php?no_rm=<?php echo"$no_rm";?>" class="btn btn-success form-group">
                            Ubah
                        </a>


                    </div>
                </div>





            </div>










        </div>

        <!-- End of Main Content -->
                
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