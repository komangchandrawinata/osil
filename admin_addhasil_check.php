<?php

include 'config.php';

$id_hasil = $_GET["id_hasil"];

$sql= "SELECT * FROM hasil WHERE id_hasil=$id_hasil";

$query = mysqli_query($connect,$sql);
$dt = mysqli_fetch_assoc($query);
$no_rm= $dt['no_rm'];
$hematologi = $dt['hematologi'];
$urinalisa = $dt['urinalisa'];
$bakteriologi = $dt['bakteriologi'];
$imunoserologi = $dt['imunoserologi'];
$kimia_klinik = $dt['kimia_klinik'];

if($hematologi!="1"&&$urinalisa!="1"&&$bakteriologi!="1"&&$imunoserologi!="1"&&$kimia_klinik!="1"){


        header('Location: admin_addhasil.php?no_rm='.$no_rm);
}else{
header('Location: admin_addhematologi.php?id_hasil='.$id_hasil);
}
?>