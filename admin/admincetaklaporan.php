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
include("indo.php");
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
               <center><img style="width: 60px; margin: 25px;" src="osil_white.png"><center>
                </li>

                <hr class="sidebar-divider my-0">

            <!-- Menus -->

            <!-- Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="admindashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Daftar Pengguna -->
            <li class="nav-item">
                <a class="nav-link" href="adminpenggunalist.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Daftar Pengguna</span>
                </a>
            </li>

         

             <!-- List Data Pasien -->
                            <li class="nav-item">
                                <a class="nav-link" href="adminpasienlist.php">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Database Pasien</span></a>
                                </li>

                                <!-- List Data Lab -->
                                <li class="nav-item">
                                    <a class="nav-link" href="adminhasillist.php">
                                        <i class="fas fa-fw fa-medkit"></i>
                                        <span>Database Hasil Lab</span>
                                    </a>

                                </li>

            <!-- Unduh Laporan -->
            <li class="nav-item active">
                <a class="nav-link" href="admincetaklaporan.php">
                    <i class="fas fa-fw fa-print"></i>
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
                <h1 class="h3 mb-0 text-gray-800">Cetak Laporan</h1>
            </div>
            <br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">


                 <form class="control-user" method="post" action="admincetaklaporan.php">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                        <div class="form-group col-lg-6">
                            <input type="date" class="form-control form-control-user" name="tgl_awal">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                        <div class="form-group col-lg-6">
                            <input type="date" class="form-control form-control-user" name="tgl_akhir">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Berdasarkan</label>
                        <div class="form-group col-lg-6">
                            <select class="form-control form-control-user" name="kategori">
                                <option value="Semua Kategori">Semua Kategori</option>
                                <option value="Hematologi">Hematologi</option>
                                <option value="Urinalisa">Urinalisa</option>
                                <option value="Bakteriologi / Parasitologi">Bakteriologi / Parasitologi</option>
                                <option value="Imunoserologi">Imunoserologi</option>
                                <option value="Kimia Klinik">Kimia Klinik</option>

                            </select>
                        </div>
                    </div>


                    <br>

                    <hr>

                    <div class="row">

                       <button type="submit" class="btn btn-success btn-md " name="submit">
                           Submit
                       </button>

                   </div>





               </form>


           </div>
       </div>


       <?php

                               if(isset($_POST['submit'])){ // cek nilai Tombol Submit
                                $tgl_awal = $_POST['tgl_awal'];
                                $tgl_akhir = $_POST['tgl_akhir'];
                                $kategori = $_POST['kategori'];

                                if (empty($tgl_awal||$tgl_akhir)) {// seleksi tgl awal - tgl akhir
                                  echo "<script language=\"Javascript\">\n";
                                  echo "alert('Tanggal Awal dan Tanggal Akihr harap diisi');
                                  window.location='admincetaklaporan.php'";
                                  echo "</script>";

                              }

                              if ($tgl_awal==$tgl_akhir) {// seleksi tgl awal - tgl akhir
                                  echo "<script language=\"Javascript\">\n";
                                  echo "alert('Harap mengisi Tanggal Awal dan Tanggal Akhir yang berbeda');
                                  window.location='admincetaklaporan.php'";
                                  echo "</script>";

                              }

                              $rm=0;
                              $sq = mysqli_query($connect,"SELECT kode_lab FROM admin WHERE username='$username'");
                              $dt = mysqli_fetch_assoc($sq);
                              $kode_lab=$dt['kode_lab'];


                              if ($kategori=="Semua Kategori")
                              {//menampilkan semua hasil sesuai tgl awal - tgl akhir

                                  $sql = mysqli_query($connect,"SELECT tgl_hasil,no_rm,COUNT(no_rm) as norm,SUM(hematologi) as hema,SUM(urinalisa) as urin,SUM(bakteriologi) as bakteri,SUM(imunoserologi) as imun,SUM(kimia_klinik) as kim FROM hasil WHERE tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC");

                                  ?>

                                  <div class="card-body shadow mb-4">

                                   <div class="row">
                                    <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                                    <label class="col-sm-10 col-form-label"> : <?php echo $tgl_awal; ?></label>

                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                    <label class="col-sm-10 col-form-label"> : <?php echo $tgl_akhir; ?></label>

                                </div>


                                <div class="row">

                                    <label class="col-sm-2 col-form-label">Berdasarkan</label>
                                    <label class="col-sm-10 col-form-label"> : <?php echo $kategori; ?></label>

                                </div>


                                <div align="right">
                                    

                                   <form method="post" action="admincetaklaporan_print_excel.php">
                                    <input type="hidden" name="tgl_awal" value=<?php echo $tgl_awal;?>>
                                    <input type="hidden" name="tgl_akhir" value=<?php echo $tgl_akhir;?>>
                                    <input type="hidden" name="kategori" value=<?php echo $kategori;?>>

                                    <button type="submit" class="btn btn-primary btn-md " name="cetak"><i class="fa fa-download"></i>
                                       Unduh Laporan Excel
                                   </button>
                               </form>
                               </div>

                               <br>


                               <div class="table-responsive" style="height: 350px;" >
                                 <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">                                <table class="table  table-bordered ">
                                    <thead>
                                        <tr>
                                            <th  width="5%" rowspan="2">No.</th>
                                            <th width="8%" rowspan="2">Tanggal Hasil</th>
                                            <th  width="12%" rowspan="2">No. RM</th>
                                            <th  width="17%" rowspan="2">Nama Pasien</th>
                                            <th  width="8%" rowspan="2">Jenis Pasien</th>
                                            <th  width="50%" colspan="5"><center>Jumlah Pemeriksaan</center></th>
                                            
                                        </tr>

                                        <tr>
                                            <th  width="10%">Hematologi</th>
                                            <th  width="7%">Urinalisa</th>
                                            <th  width="10%">Bakteriologi</th>
                                            <th  width="12%">Imunoserologi</th>
                                            <th  width="10%">Kimia Klinik</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                     $lapor='1';
                                     $dsn = " ";
                                             while ($data = mysqli_fetch_assoc($sql)) {//pengulangan data hasil lab

                                                $tgl_hasil = $data['tgl_hasil'];
                                                $no_rm = $data['no_rm'];
                                                $norm = $data['norm'];
                                                $hema = $data['hema'];
                                                $urin = $data['urin'];
                                                $bakteri = $data['bakteri'];
                                                $imun = $data['imun'];
                                                $kim = $data['kim'];

                                                $sq = mysqli_query($connect,"SELECT * FROM pasien  WHERE no_rm='$no_rm'");

                                                while ($dt = mysqli_fetch_assoc($sq)) { //Pengulangan data pasien
                                                 ?>

                                                 <tr>
                                                    <td align="center">
                                                        <?php
                                                        if ($dsn != $tgl_hasil) {
                                                            echo $lapor;
                                                        }
                                                        else{
                                                            $lapor--;
                                                        }

                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        if ($dsn != $tgl_hasil) {
                                                            echo TanggalIndo($tgl_hasil);
                                                        }
                                                        $dsn = $tgl_hasil;

                                                        ?>
                                                    </td>
                                                    <td align="center"><?php echo$no_rm?></td>
                                                    <td align="center"><?php echo$dt['nama_pasien']?></td>

                                                    <td align="center"><?php echo$dt['j_pasien']?></td>
                                                    <td align="center"><?php echo$hema?></td>
                                                    <td align="center"><?php echo$urin?></td>
                                                    <td align="center"><?php echo$bakteri?></td>
                                                    <td align="center"><?php echo$imun?></td>
                                                    <td align="center"><?php echo$kim?></td>
                                                    
                                                </tr>
                                                <?php 

                                            } //Akhir pengulangan data pasien
                                            $lapor++;
                                        }  //akhir pengulangan data hasil lab

                                        

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        

                        <?php
                             } //akhir menampilkan semua hasil sesuai tgl awal - tgl akhir




//HEMATOLOGI
                             elseif ($kategori=="Hematologi")
                                    {//menampilkan hematologi hasil sesuai tgl awal - tgl akhir


                                      $sql = mysqli_query($connect,"SELECT tgl_hasil,no_rm,COUNT(no_rm) as norm,SUM(hematologi) as hema FROM hasil WHERE tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' AND hematologi = '1' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC");

                                      ?>

                                      <div class="card-body shadow mb-4">

                                       <div class="row">
                                        <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                                        <label class="col-sm-10 col-form-label"> : <?php echo $tgl_awal; ?></label>

                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                        <label class="col-sm-10 col-form-label"> : <?php echo $tgl_akhir; ?></label>

                                    </div>


                                    <div class="row">

                                        <label class="col-sm-2 col-form-label">Berdasarkan</label>
                                        <label class="col-sm-10 col-form-label"> : <?php echo $kategori; ?></label>

                                    </div>


                                    <div align="right">
                                       

                                       <form method="post" action="admincetaklaporan_print_excel_hematologi.php">
                                    <input type="hidden" name="tgl_awal" value=<?php echo $tgl_awal;?>>
                                    <input type="hidden" name="tgl_akhir" value=<?php echo $tgl_akhir;?>>
                                    <input type="hidden" name="kategori" value=<?php echo $kategori;?>>

                                    <button type="submit" class="btn btn-primary btn-md " name="cetak"><i class="fa fa-download"></i>
                                       Unduh Laporan Excel
                                   </button>
                               </form>

                                   </div>

                                   <br>


                                   <div class="table-responsive p-2" style="height: 350px;" >
                                     <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">     

                                        <table id="bootstrap-data-table-export" class="table  table-bordered">
                                            <thead>
                                                <tr>
                                                    <th  width="5%" >No.</th>
                                                    <th width="10%" >Tanggal Hasil</th>
                                                    <th  width="10%" >No. RM</th>
                                                    <th  width="14%" >Nama Pasien</th>
                                                    <th  width="13%" >Umur</th>
                                                    <th  width="10%" >Jenis Kelamin</th>
                                                    <th  width="10%" >Jenis Pasien</th>
                                                    <th  width="15%" >Jumlah Pemeriksaan</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php
                                             $lapor='1';
                                             $dsn = " ";
                                             while ($data = mysqli_fetch_assoc($sql)) {//pengulangan data hasil lab

                                                $tgl_hasil = $data['tgl_hasil'];
                                                $no_rm = $data['no_rm'];
                                                $norm = $data['norm'];
                                                $hema = $data['hema'];
                                                

                                                $sq = mysqli_query($connect,"SELECT * FROM pasien  WHERE no_rm='$no_rm'");

                                                while ($dt = mysqli_fetch_assoc($sq)) { //Pengulangan data pasien

                                                   $birthDate = new DateTime($dt['tgl_lahir']);
                                                   $today = new DateTime("today");
                                                   if ($birthDate > $today) { 
                                                    exit("0 tahun 0 bulan 0 hari");
                                                }
                                                $y = $today->diff($birthDate)->y;
                                                $m = $today->diff($birthDate)->m;
                                                $d = $today->diff($birthDate)->d; ?>

                                                <tr>
                                                    <td align="center"><?php
                                                    if ($dsn != $tgl_hasil) {
                                                        echo $lapor;
                                                    }
                                                    else{
                                                        $lapor--;
                                                    }?>


                                                </td>
                                                <td align="center"><?php
                                                if ($dsn != $tgl_hasil) {
                                                    echo TanggalIndo($tgl_hasil);
                                                }
                                                $dsn = $tgl_hasil;
                                                ?>
                                            </td>
                                            <td align="center"><?php echo$no_rm?></td>
                                            <td align="center"><?php echo$dt['nama_pasien']?></td>
                                            <td align="center"><?php echo$y?> Tahun <?php echo$m?> Bulan <?php echo$d?> Hari</td>
                                            <td align="center"><?php echo$dt['j_kelamin']?></td>
                                            <td align="center"><?php echo$dt['j_pasien']?></td>
                                            <td align="center"><?php echo$hema?></td>
                                            
                                        </tr>
                                        <?php 

                                            } //Akhir pengulangan data pasien
                                            $lapor++;
                                        }  //akhir pengulangan data hasil lab

                                        

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                       
                        <?php               
                            }//akhir menampilkan hematologi hasil sesuai tgl awal - tgl akhir


//URINALISA
                            elseif ($kategori=="Urinalisa")
                                    {//menampilkan urinalisa hasil sesuai tgl awal - tgl akhir


                                        $sql = mysqli_query($connect,"SELECT tgl_hasil,no_rm,COUNT(no_rm) as norm,SUM(urinalisa) as urin FROM hasil WHERE tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' AND urinalisa = '1' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC");

                                        ?>

                                        <div class="card-body shadow mb-4">

                                           <div class="row">
                                            <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $tgl_awal; ?></label>

                                        </div>


                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $tgl_akhir; ?></label>

                                        </div>


                                        <div class="row">

                                            <label class="col-sm-2 col-form-label">Berdasarkan</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $kategori; ?></label>

                                        </div>


                                        <div align="right">
                                           

                                           <form method="post" action="admincetaklaporan_print_excel_urinalisa.php">
                                    <input type="hidden" name="tgl_awal" value=<?php echo $tgl_awal;?>>
                                    <input type="hidden" name="tgl_akhir" value=<?php echo $tgl_akhir;?>>
                                    <input type="hidden" name="kategori" value=<?php echo $kategori;?>>

                                    <button type="submit" class="btn btn-primary btn-md " name="cetak"><i class="fa fa-download"></i>
                                       Unduh Laporan Excel
                                   </button>
                               </form>

                                       </div>

                                       <br>


                                       <div class="table-responsive p-2" style="height: 350px;" >
                                         <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">     

                                            <table id="bootstrap-data-table-export" class="table  table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th  width="5%" >No.</th>
                                                        <th width="10%" >Tanggal Hasil</th>
                                                        <th  width="10%" >No. RM</th>
                                                        <th  width="14%" >Nama Pasien</th>
                                                        <th  width="13%" >Umur</th>
                                                        <th  width="10%" >Jenis Kelamin</th>
                                                        <th  width="10%" >Jenis Pasien</th>
                                                        <th  width="15%" >Jumlah Pemeriksaan</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php
                                                 $lapor='1';
                                                 $dsn = " ";
                                             while ($data = mysqli_fetch_assoc($sql)) {//pengulangan data hasil lab

                                                $tgl_hasil = $data['tgl_hasil'];
                                                $no_rm = $data['no_rm'];
                                                $norm = $data['norm'];
                                                $urin = $data['urin'];
                                                

                                                $sq = mysqli_query($connect,"SELECT * FROM pasien  WHERE no_rm='$no_rm'");

                                                while ($dt = mysqli_fetch_assoc($sq)) { //Pengulangan data pasien

                                                   $birthDate = new DateTime($dt['tgl_lahir']);
                                                   $today = new DateTime("today");
                                                   if ($birthDate > $today) { 
                                                    exit("0 tahun 0 bulan 0 hari");
                                                }
                                                $y = $today->diff($birthDate)->y;
                                                $m = $today->diff($birthDate)->m;
                                                $d = $today->diff($birthDate)->d; ?>

                                                <tr>
                                                    <td align="center"><?php
                                                    if ($dsn != $tgl_hasil) {
                                                        echo $lapor;
                                                    }
                                                    else{
                                                        $lapor--;
                                                    }?>


                                                </td>
                                                <td align="center"><?php
                                                if ($dsn != $tgl_hasil) {
                                                    echo TanggalIndo($tgl_hasil);
                                                }
                                                $dsn = $tgl_hasil;
                                                ?>
                                            </td>
                                            <td align="center"><?php echo$no_rm?></td>
                                            <td align="center"><?php echo$dt['nama_pasien']?></td>
                                            <td align="center"><?php echo$y?> Tahun <?php echo$m?> Bulan <?php echo$d?> Hari</td>
                                            <td align="center"><?php echo$dt['j_kelamin']?></td>
                                            <td align="center"><?php echo$dt['j_pasien']?></td>
                                            <td align="center"><?php echo$urin?></td>
                                            
                                        </tr>
                                        <?php 

                                            } //Akhir pengulangan data pasien
                                            $lapor++;
                                        }  //akhir pengulangan data hasil lab

                                       

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                      
                        <?php 

                                    }//akhir menampilkan urinalisa hasil sesuai tgl awal - tgl akhir


//BAKTERIOLOGI / PARASITOLOGI
                                    elseif ($kategori=="Bakteriologi / Parasitologi")
                                    {//menampilkan bakteriologi hasil sesuai tgl awal - tgl akhir

                                        $sql = mysqli_query($connect,"SELECT tgl_hasil,no_rm,COUNT(no_rm) as norm,SUM(bakteriologi) as bakteri FROM hasil WHERE tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' AND bakteriologi = '1' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC");

                                        ?>

                                        <div class="card-body shadow mb-4">

                                           <div class="row">
                                            <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $tgl_awal; ?></label>

                                        </div>


                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $tgl_akhir; ?></label>

                                        </div>


                                        <div class="row">

                                            <label class="col-sm-2 col-form-label">Berdasarkan</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $kategori; ?></label>

                                        </div>


                                        <div align="right">
                                            

                                           <form method="post" action="admincetaklaporan_print_excel_bakteriologi.php">
                                    <input type="hidden" name="tgl_awal" value=<?php echo $tgl_awal;?>>
                                    <input type="hidden" name="tgl_akhir" value=<?php echo $tgl_akhir;?>>
                                    <input type="hidden" name="kategori" value=<?php echo $kategori;?>>

                                    <button type="submit" class="btn btn-primary btn-md " name="cetak"><i class="fa fa-download"></i>
                                       Unduh Laporan Excel
                                   </button>
                               </form>

                                       </div>

                                       <br>


                                       <div class="table-responsive p-2" style="height: 350px;" >
                                         <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">     

                                            <table id="bootstrap-data-table-export" class="table  table-bordered">
                                                <thead >
                                                    <tr>
                                                        <th  width="5%" >No.</th>
                                                        <th width="10%" >Tanggal Hasil</th>
                                                        <th  width="10%" >No. RM</th>
                                                        <th  width="14%" >Nama Pasien</th>
                                                        <th  width="13%" >Umur</th>
                                                        <th  width="10%" >Jenis Kelamin</th>
                                                        <th  width="10%" >Jenis Pasien</th>
                                                        <th  width="15%" >Jumlah Pemeriksaan</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php
                                                 $lapor='1';
                                                 $dsn = " ";
                                             while ($data = mysqli_fetch_assoc($sql)) {//pengulangan data hasil lab

                                                $tgl_hasil = $data['tgl_hasil'];
                                                $no_rm = $data['no_rm'];
                                                $norm = $data['norm'];
                                                $bakteri = $data['bakteri'];
                                                

                                                $sq = mysqli_query($connect,"SELECT * FROM pasien  WHERE no_rm='$no_rm'");

                                                while ($dt = mysqli_fetch_assoc($sq)) { //Pengulangan data pasien

                                                   $birthDate = new DateTime($dt['tgl_lahir']);
                                                   $today = new DateTime("today");
                                                   if ($birthDate > $today) { 
                                                    exit("0 tahun 0 bulan 0 hari");
                                                }
                                                $y = $today->diff($birthDate)->y;
                                                $m = $today->diff($birthDate)->m;
                                                $d = $today->diff($birthDate)->d; ?>

                                                <tr>
                                                    <td align="center"><?php
                                                    if ($dsn != $tgl_hasil) {
                                                        echo $lapor;
                                                    }
                                                    else{
                                                        $lapor--;
                                                    }?>


                                                </td>
                                                <td align="center"><?php
                                                if ($dsn != $tgl_hasil) {
                                                    echo TanggalIndo($tgl_hasil);
                                                }
                                                $dsn = $tgl_hasil;
                                                ?>
                                            </td>
                                            <td align="center"><?php echo$no_rm?></td>
                                            <td align="center"><?php echo$dt['nama_pasien']?></td>
                                            <td align="center"><?php echo$y?> Tahun <?php echo$m?> Bulan <?php echo$d?> Hari</td>
                                            <td align="center"><?php echo$dt['j_kelamin']?></td>
                                            <td align="center"><?php echo$dt['j_pasien']?></td>
                                            <td align="center"><?php echo$bakteri?></td>
                                            
                                        </tr>
                                        <?php 

                                            } //Akhir pengulangan data pasien
                                            $lapor++;
                                        }  //akhir pengulangan data hasil lab

                                       

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                       
                        <?php 
                            }//akhir menampilkan bakteriologi hasil sesuai tgl awal - tgl akhir


//IMUNOSEROLOGI
                            elseif ($kategori=="Imunoserologi")
                                    {//menampilkan imunoserologi hasil sesuai tgl awal - tgl akhir

                                        $sql = mysqli_query($connect,"SELECT tgl_hasil,no_rm,COUNT(no_rm) as norm,SUM(imunoserologi) as imun FROM hasil WHERE tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' AND imunoserologi = '1' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC");

                                        ?>

                                        <div class="card-body shadow mb-4">

                                           <div class="row">
                                            <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $tgl_awal; ?></label>

                                        </div>


                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $tgl_akhir; ?></label>

                                        </div>


                                        <div class="row">

                                            <label class="col-sm-2 col-form-label">Berdasarkan</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $kategori; ?></label>

                                        </div>


                                        <div align="right">
                                            

                                           <form method="post" action="admincetaklaporan_print_excel_imunoserologi.php">
                                    <input type="hidden" name="tgl_awal" value=<?php echo $tgl_awal;?>>
                                    <input type="hidden" name="tgl_akhir" value=<?php echo $tgl_akhir;?>>
                                    <input type="hidden" name="kategori" value=<?php echo $kategori;?>>

                                    <button type="submit" class="btn btn-primary btn-md " name="cetak"><i class="fa fa-download"></i>
                                       Unduh Laporan Excel
                                   </button>
                               </form>


                                       </div>

                                       <br>


                                       <div class="table-responsive p-2" style="height: 350px;" >
                                         <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">     

                                            <table id="bootstrap-data-table-export" class="table  table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th  width="5%" >No.</th>
                                                        <th width="10%" >Tanggal Hasil</th>
                                                        <th  width="10%" >No. RM</th>
                                                        <th  width="14%" >Nama Pasien</th>
                                                        <th  width="13%" >Umur</th>
                                                        <th  width="10%" >Jenis Kelamin</th>
                                                        <th  width="10%" >Jenis Pasien</th>
                                                        <th  width="15%" >Jumlah Pemeriksaan</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php
                                                 $lapor='1';
                                                 $dsn = " ";
                                             while ($data = mysqli_fetch_assoc($sql)) {//pengulangan data hasil lab

                                                $tgl_hasil = $data['tgl_hasil'];
                                                $no_rm = $data['no_rm'];
                                                $norm = $data['norm'];
                                                $imun = $data['imun'];
                                                

                                                $sq = mysqli_query($connect,"SELECT * FROM pasien  WHERE no_rm='$no_rm'");

                                                while ($dt = mysqli_fetch_assoc($sq)) { //Pengulangan data pasien

                                                   $birthDate = new DateTime($dt['tgl_lahir']);
                                                   $today = new DateTime("today");
                                                   if ($birthDate > $today) { 
                                                    exit("0 tahun 0 bulan 0 hari");
                                                }
                                                $y = $today->diff($birthDate)->y;
                                                $m = $today->diff($birthDate)->m;
                                                $d = $today->diff($birthDate)->d; ?>

                                                <tr>
                                                    <td align="center"><?php
                                                    if ($dsn != $tgl_hasil) {
                                                        echo $lapor;
                                                    }
                                                    else{
                                                        $lapor--;
                                                    }?>


                                                </td>
                                                <td align="center"><?php
                                                if ($dsn != $tgl_hasil) {
                                                    echo TanggalIndo($tgl_hasil);
                                                }
                                                $dsn = $tgl_hasil;
                                                ?>
                                            </td>
                                            <td align="center"><?php echo$no_rm?></td>
                                            <td align="center"><?php echo$dt['nama_pasien']?></td>
                                            <td align="center"><?php echo$y?> Tahun <?php echo$m?> Bulan <?php echo$d?> Hari</td>
                                            <td align="center"><?php echo$dt['j_kelamin']?></td>
                                            <td align="center"><?php echo$dt['j_pasien']?></td>
                                            <td align="center"><?php echo$imun?></td>
                                            
                                        </tr>
                                        <?php 

                                            } //Akhir pengulangan data pasien
                                            $lapor++;
                                        }  //akhir pengulangan data hasil lab

                                      

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                      
                        <?php 

                            }//akhir menampilkan imunoserologi hasil sesuai tgl awal - tgl akhir


//KIMIA KLINIK
                            elseif ($kategori=="Kimia Klinik")
                                    {//menampilkan kimia_klinik hasil sesuai tgl awal - tgl akhir

                                        $sql = mysqli_query($connect,"SELECT tgl_hasil,no_rm,COUNT(no_rm) as norm,SUM(kimia_klinik) as kim FROM hasil WHERE tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' AND kimia_klinik = '1' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC");

                                        ?>

                                        <div class="card-body shadow mb-4">

                                           <div class="row">
                                            <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $tgl_awal; ?></label>

                                        </div>


                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $tgl_akhir; ?></label>

                                        </div>


                                        <div class="row">

                                            <label class="col-sm-2 col-form-label">Berdasarkan</label>
                                            <label class="col-sm-10 col-form-label"> : <?php echo $kategori; ?></label>

                                        </div>


                                        <div align="right">
                                           

                                           <form method="post" action="admincetaklaporan_print_excel_kimia_klinik.php">
                                    <input type="hidden" name="tgl_awal" value=<?php echo $tgl_awal;?>>
                                    <input type="hidden" name="tgl_akhir" value=<?php echo $tgl_akhir;?>>
                                    <input type="hidden" name="kategori" value=<?php echo $kategori;?>>

                                    <button type="submit" class="btn btn-primary btn-md " name="cetak"><i class="fa fa-download"></i>
                                       Unduh Laporan Excel
                                   </button>
                               </form>

                                       </div>

                                       <br>


                                       <div class="table-responsive p-2" style="height: 350px;" >
                                         <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">     

                                            <table id="bootstrap-data-table-export" class="table  table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th  width="5%" >No.</th>
                                                        <th width="10%" >Tanggal Hasil</th>
                                                        <th  width="10%" >No. RM</th>
                                                        <th  width="14%" >Nama Pasien</th>
                                                        <th  width="13%" >Umur</th>
                                                        <th  width="10%" >Jenis Kelamin</th>
                                                        <th  width="10%" >Jenis Pasien</th>
                                                        <th  width="15%" >Jumlah Pemeriksaan</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php
                                                 $lapor='1';
                                                 $dsn = " ";
                                             while ($data = mysqli_fetch_assoc($sql)) {//pengulangan data hasil lab

                                                $tgl_hasil = $data['tgl_hasil'];
                                                $no_rm = $data['no_rm'];
                                                $norm = $data['norm'];
                                                $kim = $data['kim'];
                                                

                                                $sq = mysqli_query($connect,"SELECT * FROM pasien  WHERE no_rm='$no_rm'");

                                                while ($dt = mysqli_fetch_assoc($sq)) { //Pengulangan data pasien

                                                   $birthDate = new DateTime($dt['tgl_lahir']);
                                                   $today = new DateTime("today");
                                                   if ($birthDate > $today) { 
                                                    exit("0 tahun 0 bulan 0 hari");
                                                }
                                                $y = $today->diff($birthDate)->y;
                                                $m = $today->diff($birthDate)->m;
                                                $d = $today->diff($birthDate)->d; ?>

                                                <tr>
                                                    <td align="center"><?php
                                                    if ($dsn != $tgl_hasil) {
                                                        echo $lapor;
                                                    }
                                                    else{
                                                        $lapor--;
                                                    }?>


                                                </td>
                                                <td align="center"><?php
                                                if ($dsn != $tgl_hasil) {
                                                    echo TanggalIndo($tgl_hasil);
                                                }
                                                $dsn = $tgl_hasil;
                                                ?>
                                            </td>
                                            <td align="center"><?php echo$no_rm?></td>
                                            <td align="center"><?php echo$dt['nama_pasien']?></td>
                                            <td align="center"><?php echo$y?> Tahun <?php echo$m?> Bulan <?php echo$d?> Hari</td>
                                            <td align="center"><?php echo$dt['j_kelamin']?></td>
                                            <td align="center"><?php echo$dt['j_pasien']?></td>
                                            <td align="center"><?php echo$kim?></td>
                                            <td align="center"><?php echo$norm?></td>
                                        </tr>
                                        <?php 

                                            } //Akhir pengulangan data pasien
                                            $lapor++;
                                        }  //akhir pengulangan data hasil lab

                                      

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                      
                        <?php 

                                    }//akhir menampilkan kimia_klinik hasil sesuai tgl awal - tgl akhir


                                } //Akhir Tombol submit
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
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



        </div>
        <!-- End of Main Content -->



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