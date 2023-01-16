<?php
include "koneksi.php";
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
$result = mysqli_query($con, "SELECT * FROM mobil order by tipe ");
?>

<html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Hanz Car</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.php">Hanz<span>Car</span></a></h1>
                <div class="container">
                </div>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>


        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container">
                <div class="info-wrap mt-5">

                    <div class="row">
                        <div class="section-title">
                            <h2>List Mobil</h2>
                        </div>
                    </div>
                </div>

                <form action="" method="GET" style="margin-top: 1em">
                    <input style="padding:1em 2em; width:100%;" type="text" name="cari_user" placeholder="Cari Data Berdasarkan Nama" defaultValue="">
                </form>
                <form action="admin_show_user.php" class="php-email-form">

                    <?php
                    if (isset($_GET['cari_user'])) :
                        $cari_user = $_GET['cari_user'];
                        $result = mysqli_query($con, "SELECT * FROM mobil WHERE tipe LIKE '%$cari_user%' order by tipe ASC");
                    endif; ?>

                    <?php if ($result->num_rows > 0) :

                    ?>


                        <table width='80%' border=1 class="table table-striped">
                            <tr>
                                <th>Tipe</th>
                                <th>Transmisi</th>
                                <th>Tahun</th>
                                <th>Harga (Rp.)</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            while ($user_data = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $user_data['tipe'] . "</td>";
                                echo "<td>" . $user_data['transmisi'] . "</td>";
                                echo "<td>" . $user_data['tahun'] . "</td>";
                                echo "<td>" . $user_data['harga'] . "</td>";
                                echo "<td><a href='mobil_edit.php?id=$user_data[id]'>Edit</a> | <a href='mobil_delete.php?id=$user_data[id]'>Hapus</a>
                    </td></tr>";
                            }
                            ?>
                        </table>
                    <?php else : ?>
                        <table width='80%' border=1>
                            <tr>
                                <th>Tipe</th>
                                <th>Transmisi</th>
                                <th>Tahun</th>
                                <th>Harga (Rp.)</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td colspan="5" align="center">Data tidak di temukan!</td>
                            </tr>
                        </table>
                    <?php endif; ?>

                </form>
                <a href="index.php"><button class="btn btn-danger">Back</button></a>
                <a href="cetak_mobil.php"><button class="btn btn-primary">Cetak Tabel Mobil</button></a>
                <a href="form_tambah_mobil.php"><button class="btn btn-primary"> Tambah Mobil</button></a>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>