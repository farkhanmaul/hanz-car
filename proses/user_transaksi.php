<?php
include "../koneksi.php";

$nama = $_POST['nama'];
$tipe = $_POST['tipe'];
$tgl_sewa = $_POST['tgl_sewa'];


$sql = "INSERT INTO transaksi (penyewa, nama_mobil, tgl_sewa) VALUES ('$nama','$tipe', '$tgl_sewa')";
$query = mysqli_query($con, $sql);
mysqli_close($con);

header("Location: ../form_transaksi_sukses.php");
