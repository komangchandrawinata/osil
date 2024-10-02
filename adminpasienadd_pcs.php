<?php

include "config.php";


if(isset($_POST['submit'])) {

	$no_rm = $_POST['no_rm'];
	$nama_pasien = $_POST['nama_pasien'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$j_kelamin = $_POST['j_kelamin'];
	$alamat = $_POST['alamat'];
	$j_pasien = $_POST['j_pasien'];
	$ruangan = $_POST['ruangan'];

	$dokter_rujukan = $_POST['dokter_rujukan'];
	$kode_lab = $_POST['kode_lab'];



	$sq= mysqli_query($connect,"SELECT * FROM pasien WHERE no_rm='$no_rm'");
	
	$qry=mysqli_fetch_assoc($sq);

	if (isset($qry)) {

		//no_rm sudah tersedia langsung ke hasil lab
		header('Location: admin_addhasil.php?no_rm='.$no_rm);


	}else{

		//no_rm tidak diinputkan

		if (empty($no_rm)) {
			echo "<script language=\"Javascript\">\n";
			echo "alert('Data gagal ditambahkan');
			window.location='adminpasienadd.php'";
			echo "</script>";
		} else

		//no_rm belum maka insert data pasien baru



		$sql= "INSERT INTO pasien (
              no_rm,nama_pasien,tgl_lahir,j_kelamin,alamat,j_pasien,ruangan,dokter_rujukan,kode_lab)
          VALUES
          ('$no_rm','$nama_pasien','$tgl_lahir','$j_kelamin','$alamat','$j_pasien','$ruangan','$dokter_rujukan','$kode_lab')";

		$query=mysqli_query($connect,$sql);

		if($query){



			echo "<script language=\"Javascript\">\n";
			echo "alert('Data ".$nama_pasien." berhasil ditambahkan');";

			echo "</script>";

			header('Location: admin_addhasil.php?no_rm='.$no_rm);

		}



	}

}
?>