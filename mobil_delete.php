<?php
include "koneksi.php";
$sql = "DELETE FROM mobil WHERE id= '$_GET[id]'";
mysqli_query($con, $sql);
mysqli_close($con);

header('Location: admin_show_mobil.php');
