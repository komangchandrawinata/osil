<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "osil";
$connect = mysqli_connect($host,$user,$pass,$db);

if ($connect) {
	
}else{
	echo "Gagal";
}

 ?>