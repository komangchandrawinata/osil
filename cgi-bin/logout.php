<?php 
// mengaktifkan session
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
echo "<script language=\"Javascript\">\n";
echo "alert('Anda telah logout');
window.location='index.php'";
echo "</script>";
?>