<?php
include "../koneksi.php";
$tipe = $_POST['tipe'];
$transmisi = $_POST['transmisi'];
$tahun = $_POST['tahun'];
$harga = $_POST['harga'];

$sql = "INSERT INTO mobil (tipe, transmisi, tahun, harga) VALUES ('$tipe','$transmisi', '$tahun', '$harga')";
$query = mysqli_query($con, $sql);
mysqli_close($con);

header("Location: ../index.php");
