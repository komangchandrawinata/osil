<?php 

session_start();
$username= $_SESSION['username'];

if($_SESSION['status']!="loginadmin"){
    echo "<script language=\"Javascript\">\n";
    echo "alert('Anda harus login');
    window.location='loginadmin.php'";
    echo "</script>";
}


require_once('tcpdf.php');
ob_start();
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
       
        

    }

    // Page footer
    public function Footer() {
        include 'config.php';




        
        // Position at 15 mm from bottom
        $this->SetY(-15);
        $this->SetFont('times', '', 12);
       $this->Cell(0, 0, ''.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');


    }


    

}

// create new PDF document
$pdf = new MYPDF('L', 'mm', array('210','297'), true, 'UTF-8', false);









// set margins left top right
$pdf->SetMargins(20, 10, 20);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 19);









// ---------------------------------------------------------

// set font


// add a page
$pdf->AddPage();



// Check connection

include 'config.php';
include("indo.php");

// Check post value
if(isset($_POST['cetak'])) {
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $kategori = $_POST['kategori'];

}

$mysql = "SELECT * FROM pengguna WHERE username = '$username'";
$result = mysqli_query($connect, $mysql);

    // output data of each row
$row = mysqli_fetch_array($result);
$kode_lab = $row['kode_lab'];


$sql = "SELECT * FROM profile WHERE kode_lab = '$kode_lab'";
$resul = mysqli_query($connect, $sql);

    // output data of each row
$ros = mysqli_fetch_array($resul);

$pdf->SetFont('times', '', 12);





//Semua Kategori

$content_ba .= '
<div align="center"> 
<h3>LAPORAN REKAPITULASI HASIL LABORATORIUM PEMERIKSAAN BAKTERIOLOGI / PARASITOLOGI</h3>
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
<th  width="13%" >Jumlah Hasil Lab</th>
</tr>'; 


$qr_ba = "SELECT tgl_hasil,no_rm,COUNT(no_rm) as norm,SUM(bakteriologi) as bakteri FROM hasil WHERE tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' AND bakteriologi = '1' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC";
$sq_ba = mysqli_query($connect,$qr_ba);
$lapor='1';
$dsn = " ";
while ($dt_ba=mysqli_fetch_array($sq_ba)) {
    $tgl_hasil = $dt_ba['tgl_hasil'];
    $no_rm = $dt_ba['no_rm'];
    $norm = $dt_ba['norm'];
    $bakteri = $dt_ba['bakteri'];
    $urin = $dt_ba['urin'];
    $bakteri = $dt_ba['bakteri'];
    $imun = $dt_ba['imun'];
    $kim = $dt_ba['kim'];
 
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

        $content_ba .='
        <tr>
        <td align="center">';
        if ($dsn != $tgl_hasil) {
            $content_ba .=$lapor;
        }
        else{
            $lapor--;
        }
        
        $content_ba .='
        </td>
        <td align="center">';
        if ($dsn != $tgl_hasil) {
            $content_ba .=TanggalIndo($tgl_hasil);
        }
        $dsn = $tgl_hasil;

        $content_ba .='
        </td>
        <td align="center">'.$no_rm.'</td>
        <td align="center">'.$dt['nama_pasien'].'</td>
        <td align="center">'.$y.' Tahun '. $m.' Bulan ' . $d.' Hari</td>
        <td align="center">'.$dt['j_kelamin'].'</td>
        <td align="center">'.$dt['j_pasien'].'</td>
        <td align="center">'.$bakteri.'</td>
        <td align="center">'.$norm.'</td>
        </tr>
        ';
    }

    $lapor++;
}

//Rekap Hasil lab
$qr = "SELECT * FROM hasil WHERE tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' AND bakteriologi = '1'";
$mysqls = mysqli_query($connect,$qr);
$total = 0;
while ($date=mysqli_fetch_array($mysqls)) {

    $total++;

}

$content_ba .= '
</table>
</div>
<br>
<br>
<br>
Total Pemeriksaan Laboratorium :  '.$total.' Hasil';

// output the HTML content
$pdf->writeHTML($content_ba, true, true, true, true, '');





// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------



// ---------------------------------------------------------


ob_clean();



//Close and output PDF document
$pdf->Output('LAPORAN HASIL LABORATORIUM PEMERIKSAAN BAKTERIOLOGI / PARASITOLOGI '.TanggalIndo($tgl_awal).' '. TanggalIndo($tgl_akhir).'.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
