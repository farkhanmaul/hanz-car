<?php
include "../koneksi.php";
$sql = "DELETE FROM user WHERE id= '$_GET[id]'";
mysqli_query($con, $sql);
mysqli_close($con);

header('Location: ../index.php');
