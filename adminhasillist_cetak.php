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

        $sq = "SELECT * FROM admin WHERE kode_lab = $kode_lab";
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
        $this->Cell(0, 0, $ro['username'], 0, false, 'L', 0, '', 0, false, 'M', 'M');

       
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
Tanggal Lahir
</td>
<td width="5%">:</td>
<td width="30%">
'.TanggalIndo($ro['tgl_lahir']).'
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
Umur
</td>
<td width="5%">:</td>
<td width="30%">
'.$y.' Tahun '. $m.' Bulan ' . $d.'
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
Jenis Kelamin
</td>
<td width="5%">:</td>
<td width="30%">
'.$ro['j_kelamin'].'
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

<tr>
<td width="15%">
Alamat
</td>
<td width="5%">:</td>
<td width="30%">
'.$ro['alamat'].'
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
<td >Basofil</td>
<td >'.$he['basofil'].'</td>
<td>0 - 1</td>
</tr>

<tr>
<td >Eosinofil</td>
<td >'.$he['eosinofil'].'</td>
<td>1 - 3</td>
</tr>

<tr>
<td >Staf</td>
<td >'.$he['staf'].'</td>
<td>2 - 5</td>
</tr>

<tr>
<td >Segmen</td>
<td >'.$he['segmen'].'</td>
<td>50 - 70</td>
</tr>

<tr>
<td >Limfosit</td>
<td >'.$he['limfosit'].'</td>
<td>20 - 40</td>
</tr>

<tr>
<td >Monosit</td>
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

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

include 'config.php';
$id_hasil = $_GET["id_hasil"];

$sql = "SELECT * FROM hasil WHERE id_hasil = $id_hasil";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$no_rm=$row['no_rm'];

$sq_ur = "SELECT * FROM urinalisa WHERE id_hasil = $id_hasil";
$dt_ur = mysqli_query($connect, $sq_ur);
$ur = mysqli_fetch_array($dt_ur);


if(isset($ur)){

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



$content_ur = '
<br>
<br>
<br>
<br>
<hr height="2">
<div align = "center" > <h4>HASIL LABORATORIUM PEMERIKSAAN URINALISA</h4>
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
'.$y.' Tahun '. $m.' Bulan ' . $d.'
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
<td colspan="3"><b>Makroskopis</b></td>
</tr>

<tr>
<td >Warna</td>
<td >'.$ur['warna'].'</td>
<td>Kuning</td>
</tr>

<tr>
<td >Kejernihan</td>
<td >'.$ur['kejernihan'].'</td>
<td>Kejernihan</td>
</tr>

<tr>
<td colspan="3"></td>
</tr>

<tr>
<td >Leukosit</td>
<td >'.$ur['leukosit_u'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >Keton</td>
<td >'.$ur['keton'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >Nitrit</td>
<td >'.$ur['nitrit'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >Urobilinogen</td>
<td >'.$ur['urobilinogen'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >Bilirubin</td>
<td >'.$ur['bilirubin'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >Protein</td>
<td >'.$ur['protein'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >Glukosa / Reduksi</td>
<td >'.$ur['glukosa_r'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >Berat Jenis</td>
<td >'.$ur['berat_jenis'].'</td>
<td>1,005 - 1,030</td>
</tr>

<tr>
<td >pH</td>
<td >'.$ur['ph'].'</td>
<td>5,00 - 7,00</td>
</tr>

<tr>
<td colspan="3"><b>Sedimen</b></td>
</tr>

<tr>
<td >Leukosit</td>
<td >'.$ur['leukosit_u'].'</td>
<td>0 - 5/LPB</td>
</tr>

<tr>
<td >Eritrosit</td>
<td >'.$ur['eritrosit_s'].'</td>
<td>0 - 1/LPB</td>
</tr>

<tr>
<td >Epitel</td>
<td >'.$ur['epitel'].'</td>
<td>< 10/LPK</td>
</tr>

</tbody>
</table>
<br>
<br>


</div>';
}

// output the HTML content
$pdf->writeHTML($content_ur, true, true, true, true, '');

// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

include 'config.php';
$id_hasil = $_GET["id_hasil"];

$sql = "SELECT * FROM hasil WHERE id_hasil = $id_hasil";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$no_rm=$row['no_rm'];

$sq_ba = "SELECT * FROM bakteriologi WHERE id_hasil = $id_hasil";
$dt_ba = mysqli_query($connect, $sq_ba);
$ba = mysqli_fetch_array($dt_ba);


if(isset($ba)){

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



$content_ba = '
<br>
<br>
<br>
<br>
<hr height="2">
<div align = "center" > <h4>HASIL LABORATORIUM PEMERIKSAAN BAKTERIOLOGI / PARASITOLOGI</h4>
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
'.$y.' Tahun '. $m.' Bulan ' . $d.'
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
<td >Gonorhea (GO)</td>
<td >'.$ba['gonorhae'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >PMM</td>
<td >'.$ba['pmm'].'</td>
<td>-</td>
</tr>

<tr>
<td >Malaria</td>
<td >'.$ba['malaria'].'</td>
<td>Negatif</td>
</tr>



</tbody>
</table>
<br>
<br>


</div>';
}

// output the HTML content
$pdf->writeHTML($content_ba, true, true, true, true, '');

// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

include 'config.php';
$id_hasil = $_GET["id_hasil"];

$sql = "SELECT * FROM hasil WHERE id_hasil = $id_hasil";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$no_rm=$row['no_rm'];

$sq_se = "SELECT * FROM serologi WHERE id_hasil = $id_hasil";
$dt_se = mysqli_query($connect, $sq_se);
$se = mysqli_fetch_array($dt_se);


if(isset($se)){

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



$content_se = '
<br>
<br>
<br>
<br>
<hr height="2">
<div align = "center" > <h4>HASIL LABORATORIUM PEMERIKSAAN SEROLOGI / IMUNOLOGI</h4>
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
'.$y.' Tahun '. $m.' Bulan ' . $d.'
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
<td >Tes Kehamilan</td>
<td >'.$se['tes_kehamilan'].'</td>
<td>-</td>
</tr>

<tr>
<td colspan="3"><b>Dengue</b></td>
</tr>


<tr>
<td >IgG</td>
<td >'.$se['ig_g'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >IgM</td>
<td >'.$se['ig_m'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td colspan="3"></td>
</tr>

<tr>
<td >HbsAg</td>
<td >'.$se['hbsag'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >HIV</td>
<td >'.$se['hiv'].'</td>
<td>Non Reaktif</td>
</tr>

<tr>
<td >RDT Syphilis</td>
<td >'.$se['rdt_syphilis'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >RPR</td>
<td >'.$se['rpr'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >HCV</td>
<td >'.$se['hcv'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >Golongan Darah</td>
<td >'.$se['gol_darah'].'</td>
<td>-</td>
</tr>

<tr>
<td colspan="3"><b>Widal</b></td>
</tr>

<tr>
<td >- S. Thiphi O</td>
<td >'.$se['s_thiphi_o'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >S. Parathiphy AO</td>
<td >'.$se['s_parathipy_ao'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >S. Parathiphy BO</td>
<td >'.$se['s_parathipy_bo'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td >S. Thiphi H</td>
<td >'.$se['s_thiphi_h'].'</td>
<td>Negatif</td>
</tr>

<tr>
<td colspan="2"><b>Ab Covid-19</b></td>
<td></td>
</tr>

<tr>
<td >IgG</td>
<td >'.$se['igg'].'</td>
<td>Non Reaktif</td>
</tr>

<tr>
<td >IgM</td>
<td >'.$se['igm'].'</td>
<td>Non Reaktif</td>
</tr>

<tr>
<td colspan="3"></td>
</tr>

<tr>
<td >Ag Covid-19</td>
<td >'.$se['agcovid'].'</td>
<td>Non Reaktif</td>
</tr>

<tr>
<td >IGM Tifoid</td>
<td >'.$se['tifoid'].'</td>
<td>Negatif</td>
</tr>

</tbody>
</table>
<br>
<br>


</div>';
}

// output the HTML content
$pdf->writeHTML($content_se, true, true, true, true, '');

// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

include 'config.php';
$id_hasil = $_GET["id_hasil"];

$sql = "SELECT * FROM hasil WHERE id_hasil = $id_hasil";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$no_rm=$row['no_rm'];

$sq_kd = "SELECT * FROM kimia_darah WHERE id_hasil = $id_hasil";
$dt_kd = mysqli_query($connect, $sq_kd);
$kd = mysqli_fetch_array($dt_kd);


if(isset($kd)){

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



$content_kd = '
<br>
<br>
<br>
<br>
<hr height="2">
<div align = "center" > <h4>HASIL LABORATORIUM PEMERIKSAAN KIMIA DARAH</h4>
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
'.$y.' Tahun '. $m.' Bulan ' . $d.'
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
<td >Glukosa Puasa</td>
<td >'.$kd['gl_puasa'].'</td>
<td>75 - 115 mg/dL</td>
</tr>

<tr>
<td >Glukosa 2 Jam PP</td>
<td >'.$kd['gl_pp'].'</td>
<td>70 - 140 mg/dL</td>
</tr>

<tr>
<td >Glukosa Sewaktu</td>
<td >'.$kd['gl_sewaktu'].'</td>
<td>80 - 200 mg/dL</td>
</tr>

<tr>
<td >Cholesterol Total</td>
<td >'.$kd['cholesterol'].'</td>
<td>< 200 mg/dL</td>
</tr>

<tr>
<td rowspan="2">Asam Urat</td>
<td rowspan="2">'.$kd['asam_urat'].'</td>
<td>L: 3,4 - 7,0 mg/dL</td>
</tr>
<tr>
<td>P: 2,4 - 5,7 mg/dL</td>
</tr>

<tr>
<td >Trigliserida</td>
<td >'.$kd['trigliserida'].'</td>
<td>0 - 200 mg/dL</td>
</tr>

<tr>
<td >Ureum</td>
<td >'.$kd['ureum'].'</td>
<td>10 - 50 mg/dL</td>
</tr>

<tr>
<td rowspan="2">Creatinin</td>
<td rowspan="2">'.$kd['creatinin'].'</td>
<td>L: 0,6 - 1,1 mg/dL</td>
</tr>
<tr>
<td>P: 0,5 - 0,9 mg/dL</td>
</tr>

<tr>
<td rowspan="2">SGOT</td>
<td rowspan="2">'.$kd['sgot'].'</td>
<td>L: 18 U/L</td>
</tr>
<tr>
<td>P: 15 U/L</td>
</tr>

<tr>
<td rowspan="2">SGPT</td>
<td rowspan="2">'.$kd['sgpt'].'</td>
<td>L: 22 U/L</td>
</tr>
<tr>
<td>P: 17 U/L</td>
</tr>

</tbody>
</table>
<br>
<br>


</div>';
}

// output the HTML content
$pdf->writeHTML($content_kd, true, true, true, true, '');

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
$pdf->Output('hasil lab '.$nama_pasien.' '.date('d F Y',strtotime($tgl_hasil)).'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
