<?php

//membuat koneksi ke database
include 'config.php';

//variabel nim yang dikirimkan form.php
$no_rm = $_GET['no_rm'];

//mengambil data
$query = mysqli_query($connect, "select * from pasien where no_rm='$no_rm'");
$biodata = mysqli_fetch_array($query);
$data = array(
    'nama_pasien'      =>  @$biodata['nama_pasien'],
    
    'tgl_lahir'   =>  @$biodata['tgl_lahir'],

    'j_kelamin'      =>  @$biodata['j_kelamin'],

    'alamat'      =>  @$biodata['alamat'],

    'j_pasien'      =>  @$biodata['j_pasien'],

    'ruangan'      =>  @$biodata['ruangan'],

    'dokter_rujukan'      =>  @$biodata['dokter_rujukan'],);



//tampil data
echo json_encode($data);
?>
