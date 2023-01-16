<?php
include "koneksi.php";
$sql = "SELECT * FROM mobil";
$tampil = mysqli_query($con, $sql);

session_start();

if (!isset($_SESSION['username']) and !isset($_SESSION['username'])) {
    header('Location: form_login.php');
    die();
}

$id = $_GET['id'];
// Syntax untuk mengambil data berdasarkan id
$result = mysqli_query($con, "SELECT * FROM user WHERE id='$id'");
while ($user_data = mysqli_fetch_array($result)) {
    $username = $user_data['username'];
    $nama = $user_data['nama'];
    $jenis_kelamin = $user_data['jenis_kelamin'];
    $alamat = $user_data['alamat'];
    $tgl_lahir = $user_data['tgl_lahir'];
}

$sql = "SELECT * FROM transaksi where id=$id";
$tampil = mysqli_query($con, $sql);
// Syntax untuk mengambil semua data dari table mahasiswa
$result1 = mysqli_query($con, "SELECT * FROM transaksi WHERE penyewa='$username' order by tgl_sewa");

?>

<?php


$query = "SELECT tipe, harga FROM mobil";
$result = $con->query($query);
if ($result->num_rows > 0) {
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

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
                            <h2>Reservasi</h2>
                        </div>
                    </div>
                </div>
                <form action="" class="php-email-form">

                    <?php if ($result1->num_rows > 0) :

                    ?>


                        <table width='80%' border=1 class="table table-striped">
                            <tr>
                                <th>Riwayat Transaksi</th>
                                <th>Tipe Mobil</th>
                                <th>Tanggal Sewa</th>
                            </tr>
                            <?php
                            while ($user_data = mysqli_fetch_array($result1)) {
                                echo "<tr>";
                                echo "<td>" . $user_data['penyewa'] . "</td>";
                                echo "<td>" . $user_data['nama_mobil'] . "</td>";
                                echo "<td>" . $user_data['tgl_sewa'] . "</td>";
                            }
                            ?>
                        </table>
                    <?php else : ?>
                        <table width='80%' border=1 class="table table-striped">
                            <tr>
                                <th>Riwayat Transaksi</th>
                                <th>Tipe Mobil</th>
                                <th>Tanggal Sewa</th>
                            </tr>
                            <tr>
                                <td colspan=" 3" align="center">Belum ada riwayat transaksi</td>
                            </tr>
                        </table>
                    <?php endif; ?>

                </form>


                <form action="proses/user_transaksi.php" method="post" class="php-email-form">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" value=<?php echo $username; ?> disabled>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" value=<?php echo $nama; ?> disabled>
                    </div>

                    <div class="input-group mb-3">
                        <select name="tipe" class="form-control">
                            <option>Pilih Mobil</option>
                            <?php
                            foreach ($options as $option) {
                            ?>
                                <option value="<?php echo $option['tipe']; ?>"><?php echo $option['tipe']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>


                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="tgl_sewa" placeholder="Tanggal Sewa" required>
                    </div>
                    <input type="hidden" name="id_user" value=<?php echo $id ?>>

                    <input type="hidden" name="nama" value=<?php echo $nama ?>>
                    <button type="submit" class="text-center">Reservasi</button>


                </form>
                <a href="index.php"><button class="btn btn-danger">Back</button></a>
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