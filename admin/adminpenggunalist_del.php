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

$id_pengguna = $_GET['id_pengguna'];





$sql = "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'";

$query = mysqli_query($connect,$sql);
$data=mysqli_fetch_assoc($query);



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

<body>



    <!-- Logout Modal-->

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <h6 class="modal-body">Apakah Anda Ingin Menghapus <?php echo $data['username']; ?> ?</h6>
            <div class="modal-footer">
                <a class="btn btn-secondary" href="adminpenggunalist.php">Kembali</a>
                <a class="btn btn-primary" href="adminpenggunalist_del_pcs.php?id_pengguna=<?php echo"$id_pengguna";?>">Hapus</a>
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