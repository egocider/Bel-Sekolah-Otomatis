<?php
$conn = mysqli_connect("localhost", "root", "rosebud", "bell");
date_default_timezone_set("Asia/Jakarta");

$hari = date('N');

$arrayHari = [
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu",
    "Minggu",
];

?>