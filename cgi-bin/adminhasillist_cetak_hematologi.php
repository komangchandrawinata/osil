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
        include 'config.php';
        $id_hasil = $_GET["id_hasil"];
        $sql = "SELECT * FROM hasil WHERE id_hasil = $id_hasil";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_array($result);

        $kode_lab=$row['kode_lab'];

        $sq = "SELECT * FROM profile WHERE kode_lab = $kode_lab";
        $resul = mysqli_query($connect, $sq);

        $ro = mysqli_fetch_array($resul);

        

        // Logo
        $image_file = K_PATH_IMAGES.'dinasbandarlampung.jpg';
        $this->Image($image_file, 10, 10, 25, '', 'JPG', '', 'T', false, 500, '', false, false, 0, false, false, false);
        // Logo

        $image_file = K_PATH_IMAGES.'osil.jpg';
        $this->Image($image_file, 173, 12, 25, '', 'JPG', '', 'T', false, 500, '', false, false, 0, false, false, false);

        $this->Ln(4);
        // Set font
        $this->SetFont('times', 'B', 16);
        // Title
        $this->Cell(0, 10, 'PEMERINTAHAN KOTA BANDAR LAMPUNG ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(6);
        $this->Cell(0, 10, 'DINAS KESEHATAN', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(6);
        $this->Cell(0, 15, $ro['nama_puskes'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(6);

        $this->SetFont('times', 'B', 10);
        // Title
        $this->Cell(0, 15, $ro['alamat'].'. Kode Pos: '.$ro['kode_pos'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(4);
        $this->Cell(0, 15,'Telp: '.$ro['telp'].'. Email: '.$ro['email'], 0, false, 'C', 0, '', 0, false, 'M', 'M');




    }

    // Page footer
    public function Footer() {
        include 'config.php';




        $id_hasil = $_GET["id_hasil"];
        $sql = "SELECT * FROM hasil WHERE id_hasil = $id_hasil";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_array($result);
        $tgl_hasil = $row['tgl_hasil'];

        $date=$tgl_hasil;

        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);

        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

        $kode_lab=$row['kode_lab'];

        $username= $_SESSION['username'];

        $sq = "SELECT * FROM pengguna WHERE username = '$username'";
        $resul = mysqli_query($connect, $sq);

        $ro = mysqli_fetch_array($resul);
        // Position at 15 mm from bottom
        $this->SetY(-56);
        // Position at 15 mm from bottom
        $this->SetX(-80);
        
        

        // Set font
        $this->SetFont('times', '', 12);
        // Title
        $this->Cell(0, 0, 'Bandar Lampung, '.$result, 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $this->Ln(35);

        $this->SetY(-50);
        $this->SetX(-80);
       $this->Cell(0, 0, 'Petugas Laboratorium', 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $this->Ln(30);
        $this->SetX(-80);
        $this->Cell(0, 0, $ro['petugas_lab'], 0, false, 'L', 0, '', 0, false, 'M', 'M');

       
    }

}

// create new PDF document
$pdf = new MYPDF('P', 'mm', array('210','297'), true, 'UTF-8', false);









// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);








// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

include 'config.php';
include("indo.php");
$id_hasil = $_GET["id_hasil"];

$sql = "SELECT * FROM hasil WHERE id_hasil = $id_hasil";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$no_rm=$row['no_rm'];

$sq_he = "SELECT * FROM hematologi WHERE id_hasil = $id_hasil";
$dt_he = mysqli_query($connect, $sq_he);
$he = mysqli_fetch_array($dt_he);

if(isset($he)){

$sq = "SELECT * FROM pasien WHERE no_rm = $no_rm";
$resul = mysqli_query($connect, $sq);
$ro = mysqli_fetch_array($resul);


$birthDate = new DateTime($ro['tgl_lahir']);
    $today = new DateTime("today");
    if ($birthDate > $today) { 
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;



$content_he = '
<br>
<br>
<br>
<br>
<hr height="2">
<div align = "center" > <h4>HASIL LABORATORIUM PEMERIKSAAN HEMATOLOGI</h4>
<br>

<table align="left" width="100%">
<tr>
<td width="15%">
Nama
</td>
<td width="5%">:</td>
<td width="30%">
'.$ro['nama_pasien'].'
</td>
<td width="5%">
</td>
<td width="17%">
No. RM
</td>
<td width="3%">:</td>
<td width="30%">
'.$ro['no_rm'].'
</td>
</tr>

<tr>
<td width="15%">
Umur
</td>
<td width="5%">:</td>
<td width="30%">
'.$y.' Tahun '. $m.' Bulan ' . $d.' Hari
</td>
<td width="5%">
</td>
<td width="17%">
Jenis Pasien
</td>
<td width="3%">:</td>
<td width="30%">
'.$ro['j_pasien'].'
</td>
</tr>

<tr>
<td width="15%">
Jenis Kelamin
</td>
<td width="5%">:</td>
<td width="30%">
'.$ro['j_kelamin'].'
</td>
<td width="5%">
</td>
<td width="17%">
Ruangan
</td>
<td width="3%">:</td>
<td width="30%">
'.$ro['ruangan'].'
</td>
</tr>

<tr>
<td width="15%">
Alamat
</td>
<td width="5%">:</td>
<td width="30%">
'.$ro['alamat'].'
</td>
<td width="5%">
</td>
<td width="17%">
Dokter Rujukan
</td>
<td width="3%">:</td>
<td width="30%">
'.$ro['dokter_rujukan'].'
</td>
</tr>

</table>

<br>
<br>



<table border="1">

<tr>
<td><b>JENIS PEMERIKSAAN</b></td>
<td><b>HASIL</b></td>
<td><b>NILAI NORMAL</b></td>
</tr>


<tbody>
<tr>
<td rowspan="2"> Haemoglobin </td>
<td rowspan="2">'.$he['haemoglobin'].'</td>
<td> L: 13 - 16 g/dL </td>
</tr>
<tr>
<td>P: 12 - 14 g/dL</td>
</tr>

<tr>
<td rowspan="2">Hematokrit</td>
<td rowspan="2">'.$he['hematokrit'].'</td>
<td>L: 40 - 48 %</td>
</tr>
<tr>
<td>P: 37 - 43 %</td>
</tr>

<tr>
<td rowspan="2">Eritrosit</td>
<td rowspan="2">'.$he['eritrosit_h'].'</td>
<td>L: 4,0 - 5,0 juta</td>
</tr>
<tr>
<td>P: 4,5 - 5,5 juta</td>
</tr>

<tr>
<td >Leukosit</td>
<td >'.$he['leukosit_h'].'</td>
<td>3,5 - 10,0 10³/mikroliter</td>
</tr>

<tr>
<td >Trombosit</td>
<td >'.$he['trombosit'].'</td>
<td>100 - 400 10³/mikroliter</td>
</tr>

<tr>
<td rowspan="2">Laju Endap Darah</td>
<td rowspan="2">'.$he['laju_endap'].'</td>
<td>L: < 10 Mm/Jam</td>
</tr>
<tr>
<td>P: < 15 Mm/Jam</td>
</tr>

<tr>
<td colspan="3"><b>Hitung Jenis Leukosit</b></td>
</tr>

<tr>
<td >- Basofil</td>
<td >'.$he['basofil'].'</td>
<td>0 - 1</td>
</tr>

<tr>
<td >- Eosinofil</td>
<td >'.$he['eosinofil'].'</td>
<td>1 - 3</td>
</tr>

<tr>
<td >- Staf</td>
<td >'.$he['staf'].'</td>
<td>2 - 5</td>
</tr>

<tr>
<td >- Segmen</td>
<td >'.$he['segmen'].'</td>
<td>50 - 70</td>
</tr>

<tr>
<td >- Limfosit</td>
<td >'.$he['limfosit'].'</td>
<td>20 - 40</td>
</tr>

<tr>
<td >- Monosit</td>
<td >'.$he['monosit'].'</td>
<td>2 - 8</td>
</tr>

</tbody>
</table>
<br>
<br>


</div>';

}else{};

// output the HTML content
$pdf->writeHTML($content_he, true, true, true, true, '');

// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------



ob_clean();

include 'config.php';

$id_hasil = $_GET["id_hasil"];
$sl = "SELECT * FROM hasil WHERE id_hasil = $id_hasil";
$rsult = mysqli_query($connect, $sl);

    // output data of each row
$rw = mysqli_fetch_array($rsult);
$tgl_hasil = $rw['tgl_hasil'];
$no_rm = $rw['no_rm'];

$s = "SELECT * FROM pasien WHERE no_rm = $no_rm";
$rsul = mysqli_query($connect, $s);

    // output data of each row
$r = mysqli_fetch_array($rsul);

$nama_pasien = $r['nama_pasien'];

//Close and output PDF document
$pdf->Output('Hasil Lab '.$nama_pasien.' Hematologi '.date('d F Y',strtotime($tgl_hasil)).'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
