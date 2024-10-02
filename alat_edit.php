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

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM alat WHERE id = $id";
  $result = $connect->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
  } else {
      echo "Data tidak ditemukan";
      exit;
  }
}

// Tangani pengiriman form update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $nama_alat = $_POST['nama_alat'];
  $no_alat = $_POST['no_alat'];
  $tanggal_datang = $_POST['tanggal_datang'];
  $keadaan_alat = $_POST['keadaan_alat'];
  $keterangan = $_POST['keterangan'];

  $sql_update = "UPDATE alat SET 
                  nama_alat='$nama_alat', 
                  no_alat='$no_alat', 
                  tanggal_datang='$tanggal_datang', 
                  keadaan_alat='$keadaan_alat', 
                  keterangan='$keterangan' 
                  WHERE id=$id";

  if ($connect->query($sql_update) === TRUE) {
      echo "Data berhasil diupdate";
      header("Location: alat_index.php");
      exit;
  } else {
      echo "Error: " . $sql_update . "<br>" . $connect->error;
  }
}

mysqli_close($connect);

?>

<?php
include 'template_sidebar.php';
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Alat</h1>
  </div>
  
  <br>  

  <form class="control-user"  action="alat_edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="row">
        <label class="col-sm-3 col-form-label">Nama Alat</label>
        <div class="form-group col-lg-6">
            <input type="text" class="form-control form-control-user" id="nama_alat" name="nama_alat" value="<?php echo $row['nama_alat']; ?>" required>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-3 col-form-label">Nomor Alat</label>
        <div class="form-group col-lg-6">
            <input type="text" class="form-control form-control-user" id="no_alat" name="no_alat" value="<?php echo $row['no_alat']; ?>" required>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-3 col-form-label">Tanggal Datang</label>
        <div class="form-group col-lg-6">
            <input type="date" class="form-control form-control-user" id="tanggal_datang" name="tanggal_datang" value="<?php echo $row['tanggal_datang']; ?>" required>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-3 col-form-label">Keadaan Alat</label>
        <div class="form-group col-lg-6">
            <input type="text" class="form-control form-control-user" id="keadaan_alat" name="keadaan_alat" value="<?php echo $row['keadaan_alat']; ?>" required>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-3 col-form-label">Keterangan</label>
        <div class="form-group col-lg-6">
            <textarea type="text" class="form-control form-control-user" id="keterangan" name="keterangan" required><?php echo $row['keterangan']; ?></textarea>
        </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-6">
          <button type="submit" class="btn btn-primary">Update</button>
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