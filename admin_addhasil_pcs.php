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

	$tgl_hasil=date("Y-m-d");
	$no_rm = $_POST['no_rm'];


	if (isset($_POST['hematologi'])) {
		$hematologi = $_POST['hematologi'];
	} else {
		$hematologi ="";
	}


	if (isset($_POST['urinalisa'])) {
		$urinalisa = $_POST['urinalisa'];
	} else {
		$urinalisa ="";
	}

	

	if (isset($_POST['bakteriologi'])) {
		$bakteriologi = $_POST['bakteriologi'];
	} else {
		$bakteriologi ="";
	}
	


	if (isset($_POST['imunoserologi'])) {
		$imunoserologi = $_POST['imunoserologi'];
	} else {
		$imunoserologi ="";
	}


	if (isset($_POST['kimia_klinik'])) {
		$kimia_klinik = $_POST['kimia_klinik'];
	} else {
		$kimia_klinik ="";
	}
	
	
	
	

	$kode_lab = $_POST['kode_lab'];
	



	if (empty($no_rm)) {
		echo "<script language=\"Javascript\">\n";
		echo "alert('Data gagal ditambahkan');
		window.location='adminpasienlist.php'";
		echo "</script>";
	}else

	$sql= "INSERT INTO hasil (
		id_hasil,tgl_hasil,hematologi,urinalisa,bakteriologi,imunoserologi,kimia_klinik,no_rm,kode_lab) VALUES ('','$tgl_hasil','$hematologi','$urinalisa','$bakteriologi','$imunoserologi','$kimia_klinik','$no_rm','$kode_lab')";

	$query=mysqli_query($connect,$sql);

	if($query){

		$sq_h= mysqli_query($connect,"SELECT max(id_hasil) as idhasilterbesar FROM hasil");
		$qry_h=mysqli_fetch_assoc($sq_h);
		$idhasilterbesar=$qry_h['idhasilterbesar'];
		$id_hasil=$idhasilterbesar++;

		header('Location: admin_addhasil_check.php?id_hasil='.$id_hasil);

	}
}

?>
