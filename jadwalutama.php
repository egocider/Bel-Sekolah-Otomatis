<?php
include 'koneksi.php';
$truncate = mysqli_query($conn, "TRUNCATE table jadwal");
$ubahjadwal = mysqli_query ($conn, "INSERT INTO jadwal SELECT * FROM jadwalutama");

echo "<script> location.replace ('index.php') </script>";

?>