<?php
include "../koneksi.php";
$username = $_POST['username'];

$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];

$password = md5($_POST['password']);
$level = $_POST['level'];

$sql = "INSERT INTO user (username, nama, jenis_kelamin, alamat, tgl_lahir ,password, level) VALUES ('$username','$nama', '$jenis_kelamin', '$alamat','$tgl_lahir' ,'$password', 'USER')";
$query = mysqli_query($con, $sql);
mysqli_close($con);

header("Location: ../index.php");
