<?php
include "../koneksi.php";
$sql = "SELECT * FROM user ORDER BY level";
$tampil = mysqli_query($con, $sql);

session_start();

if (!isset($_SESSION['username']) and !isset($_SESSION['username'])) {
    header('Location: form_login.php');
    die();
}

if ($_SESSION['level'] != 'ADMIN') {
    header('Location: proses/page_error.php');

    die();
}

// Syntax untuk mengambil semua data dari table mahasiswa
$result = mysqli_query($con, "SELECT * FROM user ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESSPONSI PWD</title>
</head>

<body>
    <h2>User</h2>
    <a href="../proses/user_logout.php">Logout</a> |
    <a href="../cetak_user.php">Cetak Tabel User</a><br /><br /><br /><br />
    <form action="" method="GET" style="margin-top: 1em">
        <input style="padding:1em 2em; width:80%;" type="text" name="cari_user" placeholder="Cari Data Berdasarkan Nama" defaultValue="">
    </form>


    <?php
    if (isset($_GET['cari_user'])) :
        $cari_user = $_GET['cari_user'];
        $result = mysqli_query($con, "SELECT * FROM user WHERE nama LIKE '%$cari_user%'  ");
    endif; ?>

    <?php if ($result->num_rows > 0) :

    ?>
        <table width='80%' border=1>
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['username'] . "</td>";
                echo "<td>" . $user_data['nama'] . "</td>";
                echo "<td>" . $user_data['jenis_kelamin'] . "</td>";
                echo "<td>" . $user_data['alamat'] . "</td>";
                echo "<td>" . $user_data['tgl_lahir'] . "</td>";
                echo "<td><a href='user_edit.php?id=$user_data[id]'>Edit</a> | <a href='tampil_transaksi.php?id=$user_data[id]'>Cek Transaksi</a> 
                    </td></tr>";
            }
            ?>
        </table>
    <?php else : ?>
        <table width='80%' border=1>
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
            </tr>
            <tr>
                <td colspan="5" align="center">Data tidak di temukan!</td>
            </tr>
        </table>
    <?php endif; ?>


</body>

</html>