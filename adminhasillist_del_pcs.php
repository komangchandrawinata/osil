<?php 
session_start();
$username= $_SESSION['username'];
if($_SESSION['status']!="loginadmin"){
    echo "<script language=\"Javascript\">\n";
    echo "alert('Anda harus login');
    window.location='loginadmin.php'";
    echo "</script>";
}

include 'config.php';

?>


<?php

$id_hasil = $_GET['id_hasil'];

$sq_he = "DELETE FROM hematologi WHERE id_hasil='$id_hasil'";
$qry_hem = mysqli_query($connect,$sq_he);

$sq_ur = "DELETE FROM urinalisa WHERE id_hasil='$id_hasil'";
$qry_ur = mysqli_query($connect,$sq_ur);

$sq_ba = "DELETE FROM bakteriologi WHERE id_hasil='$id_hasil'";
$qry_ba = mysqli_query($connect,$sq_ba);

$sq_se = "DELETE FROM serologi WHERE id_hasil='$id_hasil'";
$qry_se = mysqli_query($connect,$sq_se);

$sq_kd = "DELETE FROM kimia_darah WHERE id_hasil='$id_hasil'";
$qry_kd = mysqli_query($connect,$sq_kd);

$sql = "DELETE FROM hasil WHERE id_hasil='$id_hasil'";

$query = mysqli_query($connect,$sql);

if ($query) {

    echo "<script language=\"Javascript\">\n";
    echo "alert('Data berhasil dihapus');
    window.location='adminhasillist.php'";
    echo "</script>";
}else{
    echo"Gagal menghapus";
}

?>