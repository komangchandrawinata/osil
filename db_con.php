<?php
$servername = "localhost";
$database = "devusaha_osil_puskesmas";
$username = "devusaha_osil_puskesmas";
$password = "devusaha_osil_puskesmas";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
echo "Connected successfully";
mysqli_close($conn);
?>