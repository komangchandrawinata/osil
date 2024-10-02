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
// create new PDF document
$pdf = new TCPDF('P', 'mm', array('210','297'), true, 'UTF-8', false);




$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);




// set margins
$pdf->SetMargins(20, 20, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, 20);










// ---------------------------------------------------------

// set font


// add a page
$pdf->AddPage();



// Check connection

include 'config.php';
include("indo.php");
$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($connect, $sql);

    // output data of each row
$row = mysqli_fetch_array($result);
$kode_lab = $row['kode_lab'];


$sq = "SELECT * FROM profile WHERE kode_lab = '$kode_lab'";
$resul = mysqli_query($connect, $sq);

    // output data of each row
$ros = mysqli_fetch_array($resul);

$pdf->SetFont('times', '', 12);



// Check connection
if(isset($_POST['cetak'])) {
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

}

$content .= '

<div align="center"> 
<h3>LAPORAN HASIL PEMERIKSAAN LABORATORIUM</h3>
<h4>Periode '.TanggalIndo($tgl_awal).' - '.TanggalIndo($tgl_akhir).'</h4>
<br>
<br>
<table border="1" width = "100%">  
<tr>
<th  width="5%">No.</th>
<th width="18%">Tanggal Hasil</th>
<th  width="10%">No. RM</th>
<th  width="21%">Nama Pasien</th>
<th  width="15%">Umur</th>
<th  width="18%">Jenis Kelamin</th>
<th  width="15%">Jenis Pasien</th>


</tr>'; 


$sq = "SELECT * FROM pasien WHERE kode_lab = '$kode_lab'";
$resul = mysqli_query($connect, $sq);

    // output data of each row
while($ros = mysqli_fetch_assoc($resul)) {
    $no_rm=$ros['no_rm'];


    $lapor++;

    $birthDate = new DateTime($ros['tgl_lahir']);
    $today = new DateTime("today");
    if ($birthDate > $today) { 
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;

    $sql = "SELECT * FROM hasil WHERE no_rm = '$no_rm' AND tgl_hasil BETWEEN '$tgl_awal AND' AND '$tgl_akhir' ORDER BY no_rm,tgl_hasil";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($result)) {  


        $content .='
        <tr>
        <td align="center">'.$lapor.'</td>
        <td align="center">'.TanggalIndo($row['tgl_hasil']).'</td>
        <td align="center">'.$no_rm.'</td>
        <td align="center">'.$ros['nama_pasien'].'</td>
        <td align="center">'.$y.' Tahun '. $m.' Bulan ' . $d.' Hari</td>
        <td align="center">'.$ros['j_kelamin'].'</td>
        <td align="center">'.$ros['j_pasien'].'</td>
        </tr>
 

        ';








    }
}


$content .= '
</table>';



// output the HTML content
$pdf->writeHTML($content, true, true, true, true, '');

// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------



// ---------------------------------------------------------


ob_clean();



//Close and output PDF document
$pdf->Output('LAPORAN HASIL PEMERIKSAAN LABORATORIUM '.TanggalIndo($tgl_awal).' '. TanggalIndo($tgl_akhir).'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
