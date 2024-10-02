<?php 

$host = "localhost";
// $user = "devusaha_osil_puskesmas";
// $pass = "devusaha_osil_puskesmas";
// $db = "devusaha_osil_puskesmas";

$user = "root";
$pass = "";
$db = "devusaha_osil_puskesmas";
$connect = mysqli_connect($host,$user,$pass,$db);

if ($connect) {
	
}else{
	echo "Gagal";
}

 ?>