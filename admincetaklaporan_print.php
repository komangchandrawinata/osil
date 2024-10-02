<?php 

session_start();
$username= $_SESSION['username'];

if($_SESSION['status']!="loginadmin"){
    echo "<script language=\"Javascript\">\n";
    echo "alert('Anda harus login');
    window.location='index.php'";
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

$content_h .= '
<div align="center"> 
<h3>LAPORAN REKAPITULASI HASIL PEMERIKSAAN LABORATORIUM</h3>
<h4>Periode '.TanggalIndo($tgl_awal).' - '.TanggalIndo($tgl_akhir).'</h4>
<br>
<br>
<table width = "100%" border="1">  

<tr>
<th  width="4%" rowspan="2">No.</th>
<th width="6%" rowspan="2">Tanggal Hasil</th>
<th  width="10%" rowspan="2">No. RM</th>
<th  width="15%" rowspan="2">Nama Pasien</th>
<th  width="6%" rowspan="2">Jenis Pasien</th>
<th  width="49%" colspan="5">Jumlah Pemeriksaan</th>
<th  width="10%" rowspan="2">Jumlah Hasil</th>
</tr>

<tr>
<th  width="10%">Hematologi</th>
<th  width="7%">Urinalisa</th>
<th  width="10%">Bakteriologi</th>
<th  width="12%">Imunoserologi</th>
<th  width="10%">Kimia Klinik</th>
</tr>'; 


$qr_h = "SELECT tgl_hasil,no_rm,kode_lab,COUNT(no_rm) as norm,SUM(hematologi) as hema,SUM(urinalisa) as urin,SUM(bakteriologi) as bakteri,SUM(imunoserologi) as imun,SUM(kimia_klinik) as kim FROM hasil WHERE kode_lab = '$kode_lab' AND tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY tgl_hasil,no_rm ORDER BY tgl_hasil,no_rm ASC";
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

        $content_h .='
        <tr>
        <td align="center">';
        if ($dsn != $tgl_hasil) {
            $content_h .=$lapor;
        }
        else{
            $lapor--;
        }
        
        $content_h .='
        </td>
        <td align="center">';
        if ($dsn != $tgl_hasil) {
            $content_h .=TanggalIndo($tgl_hasil);
        }
        $dsn = $tgl_hasil;

        $content_h .='
        </td>
        <td align="center">'.$no_rm.'</td>
        <td align="center">'.$dt['nama_pasien'].'</td>
        
        <td align="center">'.$dt['j_pasien'].'</td>
        <td align="center">'.$hema.'</td>
        <td align="center">'.$urin.'</td>
        <td align="center">'.$bakteri.'</td>
        <td align="center">'.$imun.'</td>
        <td align="center">'.$kim.'</td>
        <td align="center">'.$norm.'</td>
        </tr>
        ';
    }

    $lapor++;
}

//Rekap Hasil lab
$qr = "SELECT * FROM hasil WHERE kode_lab = '$kode_lab' AND tgl_hasil BETWEEN '$tgl_awal' AND '$tgl_akhir'";
$mysqls = mysqli_query($connect,$qr);
$total = 0;
while ($date=mysqli_fetch_array($mysqls)) {

    $total++;

}

$content_h .= '
</table>
</div>
<br>
<br>
<br>
Total Pemeriksaan Laboratorium :  '.$total.' Hasil';

// output the HTML content
$pdf->writeHTML($content_h, true, true, true, true, '');





// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------



// ---------------------------------------------------------


ob_clean();



//Close and output PDF document
$pdf->Output('LAPORAN HASIL PEMERIKSAAN LABORATORIUM '.TanggalIndo($tgl_awal).' '. TanggalIndo($tgl_akhir).'.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
