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

        $id_pengguna = $_GET['id_pengguna'];

        $sql = "DELETE FROM pengguna WHERE id_pengguna='$id_pengguna'";

        $query = mysqli_query($connect,$sql);

        if ($query) {
            
echo "<script language=\"Javascript\">\n";
echo "alert('Data berhasil dihapus');
window.location='adminpenggunalist.php'";
echo "</script>";
        }else{
            echo"Gagal menghapus";
        }

    ?>