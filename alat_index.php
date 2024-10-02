<?php
include 'config.php';

$connect = mysqli_connect($host, $user, $pass, $db);
if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $jumlah = $_POST['jumlah'];
  $tanggal_input = $_POST['tanggal_input'];
  $tanggal_expired = $_POST['tanggal_expired'];
  $keterangan = $_POST['keterangan'];

  if (isset($_POST['id'])) {
      // Jika ada id, lakukan update
      $id = $_POST['id'];
      $sql_update = "UPDATE reagen SET 
                      nama='$nama', 
                      jumlah='$jumlah', 
                      tanggal_input='$tanggal_input', 
                      tanggal_expired='$tanggal_expired', 
                      keterangan='$keterangan' 
                      WHERE id=$id";

      if ($connect->query($sql_update) === TRUE) {
          echo "Data berhasil diupdate";
      } else {
          echo "Error: " . $sql_update . "<br>" . $connect->error;
      }
  } else {
      // Jika tidak ada id, lakukan insert
      $sql_insert = "INSERT INTO reagen (nama, jumlah, tanggal_input, tanggal_expired, keterangan) 
                    VALUES ('$nama', '$jumlah', '$tanggal_input', '$tanggal_expired', '$keterangan')";

      if ($connect->query($sql_insert) === TRUE) {
          echo "Data berhasil disimpan";
      } else {
          echo "Error: " . $sql_insert . "<br>" . $connect->error;
      }
  }
}

// Periksa apakah ada parameter `edit` untuk menampilkan data yang akan diedit
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $sql_edit = "SELECT * FROM alat WHERE id = $id";
  $result_edit = $connect->query($sql_edit);
  $row_edit = $result_edit->fetch_assoc();
}

// Periksa apakah ada parameter `id` untuk menghapus data
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];

  // Query untuk menghapus data berdasarkan id
  $sql_delete = "DELETE FROM alat WHERE id = $id";
  if ($connect->query($sql_delete) === TRUE) {
      echo "Data berhasil dihapus";
  } else {
      echo "Error: " . $connect->error;
  }
}

// Ambil data dari tabel sebelum koneksi ditutup
$sql = "SELECT * FROM alat";
$result = $connect->query($sql);

// Tutup koneksi setelah query SELECT
mysqli_close($connect);
?>

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

?>

<?php
include 'template_sidebar.php';
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alat</h1>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button> -->
        <a href="alat_create.php" class="btn btn-primary">Tambah</a>
    </div>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
          <!-- table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Alat</th>
                <th scope="col">Nomor Alat</th>
                <th scope="col">Tanggal Datang</th>
                <th scope="col">Keadaan Alat</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama_alat'] . "</td>";
                        echo "<td>" . $row['no_alat'] . "</td>";
                        echo "<td>" . $row['tanggal_datang'] . "</td>";
                        echo "<td>" . $row['keadaan_alat'] . "</td>";
                        echo "<td>" . $row['keterangan'] . "</td>";
                        echo "<td>
                                <a href='reagen_form_edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                                <a href='?hapus=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data ditemukan</td></tr>";
                }
              ?>
            </tbody>
          </table>

    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form class="control-user"  action="proses_tambah_reagen.php" method="post">
            <div class="row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="form-group col">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" required>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label">Jumlah</label>
                <div class="form-group col">
                    <input type="number" class="form-control form-control-user" id="jumlah" name="jumlah" required>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label">Tanggal Input</label>
                <div class="form-group col">
                    <input type="date" class="form-control form-control-user" id="tanggal_input" name="tanggal_input" required>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label">Tanggal Kadaluarsa</label>
                <div class="form-group col">
                    <input type="date" class="form-control form-control-user" id="tanggal_expired" name="tanggal_expired" required>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label">Keterangan</label>
                <div class="form-group col">
                    <textarea type="text" class="form-control form-control-user" id="keterangan" name="keterangan" required> </textarea>
                </div>
            </div>
            <div class="row">
              <div class="form-group col">
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form class="control-user"  action="proses_tambah_reagen.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="form-group col">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label">Jumlah</label>
                <div class="form-group col">
                    <input type="number" class="form-control form-control-user" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label">Tanggal Input</label>
                <div class="form-group col">
                    <input type="date" class="form-control form-control-user" id="tanggal_input" name="tanggal_input" value="<?php echo $row['tanggal_input']; ?>" required>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label">Tanggal Kadaluarsa</label>
                <div class="form-group col">
                    <input type="date" class="form-control form-control-user" id="tanggal_expired" name="tanggal_expired" value="<?php echo $row['tanggal_expired']; ?>" required>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 col-form-label">Keterangan</label>
                <div class="form-group col">
                    <textarea type="text" class="form-control form-control-user" id="keterangan" name="keterangan" required><?php echo $row['keterangan']; ?></textarea>
                </div>
            </div>
            <div class="row">
              <div class="form-group col">
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>



</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php
include 'template_footer.php';
?>
