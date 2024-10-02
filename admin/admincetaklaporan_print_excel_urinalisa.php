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
include("indo.php");




// Check post value
if(isset($_POST['cetak'])) {
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $kategori = $_POST['kategori'];

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan Rekapitulasi Hasil Laboratorium Pemeriksaan Urinalisa Periode $tgl_awal _ $tgl_akhir.xls");

    $mysql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($connect, $mysql);

    // output data of each row
    $row = mysqli_fetch_array($result);
    $kode_lab = $row['kode_lab'];


    $sql = "SELECT * FROM profile WHERE kode_lab = '$kode_lab'";
    $resul = mysqli_query($connect, $sql);

    // output data of each row
    $ros = mysqli_fetch_array($resul);







//Semua Kategori



    $content_h = '
    <div align="center"> 
    <h3>LAPORAN REKAPITULASI HASIL LABORATORIUM PEMERIKSAAN URINALISA</h3>
    <h4>Periode '.TanggalIndo($tgl_awal).' - '.TanggalIndo($tgl_akhir).'</h4>
    <br>
    <br>
    <table width = "100%" border="1">  

    <tr>
    <th  width="5%" >No.</th>
    <th width="10%" >Tanggal Hasil</th>
    <th  width="10%" >No. RM</th>
    <th  width="14%" >Nama Pasien</th>
    <th  width="13%" >Umur</th>
    <th  width="10%" >Jenis Kelamin</th>
    <th  width="10%" >Jenis Pasien</th>
    <th  width="15%" >Jumlah Pemeriksaan</th>

    </tr>'; 
    echo $content_h;

    $qr_h = "SELECT tgl_hasil,no_rm,kode_lab,COUNT(no_rm) as norm,SUM(urinalisa) as urin FROM hasil WHERE kode_lab = '$kode_lab' AND tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' AND urinalisa = '1' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC";
    $sq_h = mysqli_query($connect,$qr_h);
    $lapor='1';
    $dsn = " ";
    while ($dt_h=mysqli_fetch_array($sq_h)) {
        $tgl_hasil = $dt_h['tgl_hasil'];
        $no_rm = $dt_h['no_rm'];
        $norm = $dt_h['norm'];
        $hema = $dt_h['hema'];
        $urin = $dt_h['urin'];
        $bakteri = $dt_h['bakteri'];
        $imun = $dt_h['imun'];
        $kim = $dt_h['kim'];

        $qry = "SELECT * FROM pasien WHERE no_rm = '$no_rm'";
        $sqls = mysqli_query($connect,$qry);
        while ($dt=mysqli_fetch_array($sqls)) {
            $nama_pasien = $dt['nama_pasien'];

            $birthDate = new DateTime($dt['tgl_lahir']);
            $today = new DateTime("today");
            if ($birthDate > $today) { 
                exit("0 tahun 0 bulan 0 hari");
            }
            $y = $today->diff($birthDate)->y;
            $m = $today->diff($birthDate)->m;
            $d = $today->diff($birthDate)->d;

            $content_h ='
            <tr>
            <td align="center">';
            echo $content_h;
            if ($dsn != $tgl_hasil) {
                $content_h =$lapor;
                echo $content_h;

            }

            else{
                $lapor--;
            }


            $content_h ='
            </td>
            <td align="center">';
            echo $content_h;
            if ($dsn != $tgl_hasil) {
                $content_h =TanggalIndo($tgl_hasil);
                echo $content_h;
            }
            $dsn = $tgl_hasil;


            $content_h ='
            </td>
            <td align="center">'.$no_rm.'</td>
            <td align="center">'.$dt['nama_pasien'].'</td>
            <td align="center">'.$y.' Tahun '. $m.' Bulan ' . $d.' Hari</td>
            <td align="center">'.$dt['j_kelamin'].'</td>
            <td align="center">'.$dt['j_pasien'].'</td>
            <td align="center">'.$urin.'</td>
 
            </tr>
            ';
            echo $content_h;
        }

        $lapor++;
    }



    $content_h = '
    </table>
    </div>
    <br>
    <br>
    <br>
  ';

    echo $content_h;
}


?>