<?php
include 'koneksi.php';

if (isset($_POST['update'])){
    $aidi = $_POST['aidi'];
    $jam = $_POST['jam'];
    $sound = $_POST['sound'];
    $nama   = $_POST['nama'];
    $hari   = $_POST['hari'];
    
    $query = mysqli_query($conn, "UPDATE jadwal SET jam = '$jam', sound = '$sound', hari = '$hari', nama = '$nama' WHERE id = $aidi");
    if ($query) {
        header("location:index.php");
    } 
  }

?>