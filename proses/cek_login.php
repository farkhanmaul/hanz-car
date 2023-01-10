<?php
include "../koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$login = mysqli_query($con, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if ($ketemu > 0) {
    session_start();
    $_SESSION['username'] = $r['username'];
    $_SESSION['level'] = $r['level'];

    header('Location: ../index.php');
} else {
    echo "<center>Login gagal! username & password tidak benar<br>";
    echo "<a href=../form_login.php><b>ULANGI LAGI</b></a></center>";
}
mysqli_close($con);
