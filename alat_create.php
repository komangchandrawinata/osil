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

// Periksa apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil data dari form
  $nama_alat = $_POST['nama_alat'];
  $no_alat = $_POST['no_alat'];
  $tanggal_datang = $_POST['tanggal_datang'];
  $keadaan_alat = $_POST['keadaan_alat'];
  $keterangan = $_POST['keterangan'];

  // Query untuk insert data
  $sql = "INSERT INTO alat (nama_alat, no_alat, tanggal_datang, keadaan_alat, keterangan) 
          VALUES ('$nama_alat', '$no_alat', '$tanggal_datang', '$keadaan_alat', '$keterangan')";

  if ($connect->query($sql) === TRUE) {
      echo "Data berhasil disimpan";
      header("Location: alat_index.php");
  } else {
      echo "Error: " . $sql . "<br>" . $connect->error;
  }
}

// Tutup koneksi setelah query SELECT
mysqli_close($connect);

?>

<?php
include 'template_sidebar.php';
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Alat</h1>
  </div>
  
  <br>  

  <form class="control-user"  action="alat_create.php" method="post">
    <div class="row">
        <label class="col-sm-3 col-form-label">Nama Alat</label>
        <div class="form-group col-lg-6">
            <input type="text" class="form-control form-control-user" id="nama_alat" name="nama_alat" required>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-3 col-form-label">Nomor Alat</label>
        <div class="form-group col-lg-6">
            <input type="text" class="form-control form-control-user" id="no_alat" name="no_alat" required>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-3 col-form-label">Tanggal Datang</label>
        <div class="form-group col-lg-6">
            <input type="date" class="form-control form-control-user" id="tanggal_datang" name="tanggal_datang" required>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-3 col-form-label">Keadaan Alat</label>
        <div class="form-group col-lg-6">
            <input type="text" class="form-control form-control-user" id="keadaan_alat" name="keadaan_alat" required>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-3 col-form-label">Keterangan</label>
        <div class="form-group col-lg-6">
            <textarea type="text" class="form-control form-control-user" id="keterangan" name="keterangan" required> </textarea>
        </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
          <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>



</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php
include 'template_footer.php';
?>