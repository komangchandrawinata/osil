<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($connect,"SELECT * from admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "loginadmin";
	echo "<script language=\"Javascript\">\n";
echo "alert('Login berhasil');
window.location='admindashboard.php'";
echo "</script>";
}else{
	header("location:index.php?pesan=gagal");
}
?>



