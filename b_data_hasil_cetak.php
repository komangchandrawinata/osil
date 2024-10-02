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
        $no_rm=$row['no_rm'];

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

        $kode_lab=$row['kode_lab'];

        $sq = "SELECT * FROM profile WHERE kode_lab = $kode_lab";
        $resul = mysqli_query($connect, $sq);

        $ro = mysqli_fetch_array($resul);

        

        // Logo 1
        $image_file = K_PATH_IMAGES.'dinasbandarlampung.jpg';
        $this->Image($image_file, 10, 10, 25, '', 'JPG', '', 'T', false, 500, '', false, false, 0, false, false, false);
        
        // Logo 2
        $image_file = K_PATH_IMAGES.'osil.jpg';
        $this->Image($image_file, 173, 12, 25, '', 'JPG', '', 'T', false, 500, '', false, false, 0, false, false, false);

        $this->Ln(6);
        // Set font
        $this->SetFont('times', 'B', 16);
        // Title
        $this->Cell(0, 10, 'DINAS KESEHATAN KOTA BANDAR LAMPUNG', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
        $this->Ln(6);
        $this->Cell(0, 15, $ro['nama_puskes'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(6);

        $this->SetFont('times', '', 10);
        // Title
        $this->Cell(0, 15, $ro['alamat'].'. Kode Pos: '.$ro['kode_pos'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(6);
        $this->Cell(0, 15,'Telp: '.$ro['telp'].'. Email: '.$ro['email'], 0, false, 'C', 0, '', 0, false, 'M', 'M');


        //Line
        $style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

        //Keterangan
        $this->Line(10, 45, 200, 45, $style);
        $this->RoundedRect(10, 50, 190, 10, '0000', null);
        $this->Ln(19);
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 10, 'Hasil Pemeriksaan Laboratorium', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(8);


        //Header Table
        $this->SetFillColor(148, 148, 148);
        $this->SetTextColor(255);
        $this->SetDrawColor(148, 148, 148);
        $this->SetLineWidth(0.5);
        $this->SetFont('', 'B' , 10);
        // Header
        $w = array(54.5, 35.5, 90);
        $header =array('JENIS PEMERIKSAAN', 'HASIL', 'NILAI NORMAL');
        $num_headers = count( $header );
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 6, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        $this->Cell(0,array_sum($w), '', 'T');




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


    //multirow

    public function MultiRow( ) {
        // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0)

        $page_start = $this->getPage();
        $y_start = $this->GetY();

        // write the left cell
    

        $page_end_1 = $this->getPage();
        $y_end_1 = $this->GetY();

        $this->setPage($page_start);

        // write the right cell
        $this->MultiCell(0, 0, $right, 1, 'J', 0, 1, $this->GetX() ,$y_start, true, 0);

        $page_end_2 = $this->getPage();
        $y_end_2 = $this->GetY();

        // set the new row position by case
        if (max($page_end_1,$page_end_2) == $page_start) {
            $ynew = max($y_end_1, $y_end_2);
        } elseif ($page_end_1 == $page_end_2) {
            $ynew = max($y_end_1, $y_end_2);
        } elseif ($page_end_1 > $page_end_2) {
            $ynew = $y_end_1;
        } else {
            $ynew = $y_end_2;
        }

        $this->setPage(max($page_end_1,$page_end_2));
        $this->SetXY($this->GetX(),$ynew);
    }

}

// create new PDF document
$pdf = new MYPDF('P', 'mm', array('210','297'), true, 'UTF-8', false);









// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);







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

$sq_he = "SELECT * FROM hematologi WHERE id_hasil = $id_hasil";
$dt_he = mysqli_query($connect, $sq_he);
$he = mysqli_fetch_array($dt_he);

if(isset($he)){





$content_he = '
<br>
<br>
<br>
<br>
<br>

<div align = "center" >




<br>
<br>
<br>



<table>




<tbody>
<hr>
<tr>
<td width="30%" > Haemoglobin </td>
<td width = "20%">'.$he['haemoglobin'].'</td>
<td width = "25%"> L: 13 - 16 g/dL </td>
<td width = "25%">P: 12 - 14 g/dL</td>
</tr>
<hr>

<tr>
<td >Hematokrit</td>
<td>'.$he['hematokrit'].'</td>
<td>L: 40 - 48 %</td>
<td>P: 37 - 43 %</td>
</tr>
<hr>

<tr>
<td >Eritrosit</td>
<td >'.$he['eritrosit_h'].'</td>
<td>L: 4,0 - 5,0 juta</td>
<td>P: 4,5 - 5,5 juta</td>
</tr>
<hr>

<tr>
<td >Leukosit</td>
<td >'.$he['leukosit_h'].'</td>
<td colspan="2">3,5 - 10,0 10³/mikroliter</td>
</tr>
<hr>

<tr>
<td >Trombosit</td>
<td >'.$he['trombosit'].'</td>
<td colspan="2">100 - 400 10³/mikroliter</td>
</tr>
<hr>

<tr>
<td >Laju Endap Darah</td>
<td >'.$he['laju_endap'].'</td>
<td>L: < 10 Mm/Jam</td>
<td>P: < 15 Mm/Jam</td>
</tr>
<hr>

<tr>
<td colspan="3"><b>Hitung Jenis Leukosit</b></td>
</tr>
<hr>

<tr>
<td >- Basofil</td>
<td >'.$he['basofil'].'</td>
<td colspan="2">0 - 1</td>
</tr>
<hr>

<tr>
<td >- Eosinofil</td>
<td >'.$he['eosinofil'].'</td>
<td colspan="2">1 - 3</td>
</tr>
<hr>

<tr>
<td >- Staf</td>
<td >'.$he['staf'].'</td>
<td colspan="2">2 - 5</td>
</tr>
<hr>

<tr>
<td >- Segmen</td>
<td >'.$he['segmen'].'</td>
<td colspan="2">50 - 70</td>
</tr>
<hr>

<tr>
<td >- Limfosit</td>
<td >'.$he['limfosit'].'</td>
<td colspan="2">20 - 40</td>
</tr>
<hr>

<tr>
<td >- Monosit</td>
<td >'.$he['monosit'].'</td>
<td colspan="2">2 - 8</td>
</tr>
<hr>

<tr>
<td width="30%" > Haemoglobin </td>
<td width = "20%">'.$he['haemoglobin'].'</td>
<td width = "25%"> L: 13 - 16 g/dL </td>
<td width = "25%">P: 12 - 14 g/dL</td>
</tr>
<hr>

<tr>
<td >Hematokrit</td>
<td>'.$he['hematokrit'].'</td>
<td>L: 40 - 48 %</td>
<td>P: 37 - 43 %</td>
</tr>
<hr>

<tr>
<td >Eritrosit</td>
<td >'.$he['eritrosit_h'].'</td>
<td>L: 4,0 - 5,0 juta</td>
<td>P: 4,5 - 5,5 juta</td>
</tr>
<hr>

<tr>
<td >Leukosit</td>
<td >'.$he['leukosit_h'].'</td>
<td colspan="2">3,5 - 10,0 10³/mikroliter</td>
</tr>
<hr>

<tr>
<td >Trombosit</td>
<td >'.$he['trombosit'].'</td>
<td colspan="2">100 - 400 10³/mikroliter</td>
</tr>
<hr>

<tr>
<td >Laju Endap Darah</td>
<td >'.$he['laju_endap'].'</td>
<td>L: < 10 Mm/Jam</td>
<td>P: < 15 Mm/Jam</td>
</tr>
<hr>

<tr>
<td colspan="3"><b>Hitung Jenis Leukosit</b></td>
</tr>
<hr>

<tr>
<td >- Basofil</td>
<td >'.$he['basofil'].'</td>
<td colspan="2">0 - 1</td>
</tr>
<hr>

<tr>
<td >- Eosinofil</td>
<td >'.$he['eosinofil'].'</td>
<td colspan="2">1 - 3</td>
</tr>
<hr>

<tr>
<td >- Staf</td>
<td >'.$he['staf'].'</td>
<td colspan="2">2 - 5</td>
</tr>
<hr>

<tr>
<td >- Segmen</td>
<td >'.$he['segmen'].'</td>
<td colspan="2">50 - 70</td>
</tr>
<hr>

<tr>
<td >- Limfosit</td>
<td >'.$he['limfosit'].'</td>
<td colspan="2">20 - 40</td>
</tr>
<hr>

<tr>
<td >- Monosit</td>
<td >'.$he['monosit'].'</td>
<td colspan="2">2 - 8</td>
</tr>
<hr>



<tr>
<td width="30%" > Haemoglobin </td>
<td width = "20%">'.$he['haemoglobin'].'</td>
<td width = "25%"> L: 13 - 16 g/dL </td>
<td width = "25%">P: 12 - 14 g/dL</td>
</tr>
<hr>

<tr>
<td >Hematokrit</td>
<td>'.$he['hematokrit'].'</td>
<td>L: 40 - 48 %</td>
<td>P: 37 - 43 %</td>
</tr>
<hr>

<tr>
<td >Eritrosit</td>
<td >'.$he['eritrosit_h'].'</td>
<td>L: 4,0 - 5,0 juta</td>
<td>P: 4,5 - 5,5 juta</td>
</tr>
<hr>

<tr>
<td >Leukosit</td>
<td >'.$he['leukosit_h'].'</td>
<td colspan="2">3,5 - 10,0 10³/mikroliter</td>
</tr>
<hr>

<tr>
<td >Trombosit</td>
<td >'.$he['trombosit'].'</td>
<td colspan="2">100 - 400 10³/mikroliter</td>
</tr>
<hr>

<tr>
<td >Laju Endap Darah</td>
<td >'.$he['laju_endap'].'</td>
<td>L: < 10 Mm/Jam</td>
<td>P: < 15 Mm/Jam</td>
</tr>
<hr>

<tr>
<td colspan="3"><b>Hitung Jenis Leukosit</b></td>
</tr>
<hr>

<tr>
<td >- Basofil</td>
<td >'.$he['basofil'].'</td>
<td colspan="2">0 - 1</td>
</tr>
<hr>

<tr>
<td >- Eosinofil</td>
<td >'.$he['eosinofil'].'</td>
<td colspan="2">1 - 3</td>
</tr>
<hr>

<tr>
<td >- Staf</td>
<td >'.$he['staf'].'</td>
<td colspan="2">2 - 5</td>
</tr>
<hr>

<tr>
<td >- Segmen</td>
<td >'.$he['segmen'].'</td>
<td colspan="2">50 - 70</td>
</tr>
<hr>

<tr>
<td >- Limfosit</td>
<td >'.$he['limfosit'].'</td>
<td colspan="2">20 - 40</td>
</tr>
<hr>

<tr>
<td >- Monosit</td>
<td >'.$he['monosit'].'</td>
<td colspan="2">2 - 8</td>
</tr>
<hr>

</tbody>
</table>
<br>
<br>


</div>';
};

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
