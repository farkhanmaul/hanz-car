<?php
include "koneksi.php";
$sql = "SELECT * FROM mobil";
$tampil = mysqli_query($con, $sql);

session_start();

if (!isset($_SESSION['username']) and !isset($_SESSION['username'])) {
    header('Location: form_login.php');
    die();
}

if ($_SESSION['level'] == 'ADMIN') {
    header('Location: admin_home.php');
    die();
}

$result = mysqli_query($con, "SELECT * FROM user WHERE username = '$_SESSION[username]'");

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

    <!-- =======================================================
  * Template Name: MyBiz - v4.10.0
  * Template URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="fixed-top d-flex align-items-center">

    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html">Hanz<span>Car</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>

                    <?php $user_data = mysqli_fetch_array($result)
                    ?>
                    <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" active href="about.php">About</a></li>
                    <li><a class="nav-link scrollto" href="user_show_mobil.php">Daftar Mobil</a></li>
                    <li><a class="nav-link scrollto" href="form_transaksi.php?id=<?php echo "$user_data[id]\">Reservasi</a></li>" ?>

          <li><a class=" nav-link scrollto" href="proses/user_logout.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <section id="about">

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row content">
                    <div class="col-lg-6">
                        <h2>Hanz Car</h2>
                        <h3>Menyediakan berbagai macam jenis armada mobil sesuai kebutuhan anda</h3>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Hanz Car merupakan jasa sewa mobil terbaik se-Indonesia, Kami Menyediakan service terbaik untuk anda. Kami sudah berpengalaman menyediakan jasa sewa mobil selama lebih dari 10 tahun.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Pelayanan Cepat</li>
                            <li><i class="ri-check-double-line"></i> Armada Memadai</li>
                            <li><i class="ri-check-double-line"></i> Bonus melimpah untuk pelanggan</li>
                        </ul>
                        <p class="fst-italic">
                            Kami adalah penyedia jasa sewa mobil terbaik se-Indonesia.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= About List Section ======= -->
        <section id="about-list" class="about-list">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="icon-box mt-5 mt-lg-0">
                            <i class="bx bx-receipt"></i>
                            <h4>Pelayanan Cepat</h4>
                            <p>Kami menyediakan pelayanan yang cepat dan efisien</p>
                        </div>
                        <div class="icon-box mt-5">
                            <i class="bx bx-cube-alt"></i>
                            <h4>Armada Memadai</h4>
                            <p>Kami menyediakan berbagai macam armada yang lengkap dan terbaik</p>
                        </div>
                        <div class="icon-box mt-5">
                            <i class="bx bx-images"></i>
                            <h4>Bonus melimpah untuk pelanggan</h4>
                            <p>Kami menyediakan bonus yang melimpah untuk para pelanggan kami</p>
                        </div>
                        <div class="icon-box mt-5">
                            <i class="bx bx-shield"></i>
                            <h4>Asuransi Kendaraan</h4>
                            <p>Kami menyediakan asuransi untuk kendaraan kami supaya pelanggan lebih tenang saat meminjam mobil di kami</p>
                        </div>
                    </div>
                    <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/about-list-img.jpg");'></div>
                </div>

            </div>
        </section><!-- End About List Section -->






        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">



            <div class="container">
                <div class="section-title">
                    <span>Lokasi</span>
                    <h2>Lokasi</h2>
                    <p>Kunjungi showroom kami untuk informasi lebih lanjut</p>
                </div>
            </div>

            <div class="map">
                <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1172.6956943196872!2d110.37666626205022!3d-7.813087696377578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a579dd88a573b%3A0xd54ce52303e66d0c!2sAhass%20Tamsis%20Jaya%20Baru!5e0!3m2!1sid!2snl!4v1673392339944!5m2!1sid!2snl" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="container">

                <div class="info-wrap mt-5">
                    <div class="row">
                        <div class="col-lg-4 info">
                            <i class="ri-map-pin-line"></i>
                            <h4>Lokasi:</h4>
                            <p>Jalan Taman Siswa<br>Yogyakarta, YK 535022</p>
                        </div>

                        <div class="col-lg-4 info mt-4 mt-lg-0">
                            <i class="ri-mail-line"></i>
                            <h4>Email:</h4>
                            <p>info@hanzcar.com<br>contact@hanzcar.com</p>
                        </div>

                        <div class="col-lg-4 info mt-4 mt-lg-0">
                            <i class="ri-phone-line"></i>
                            <h4>Call:</h4>
                            <p>+6281661273<br>+621661273</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">

        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright. All Rights Reserved
            </div>
            <div class="credits">

                Modified by <a href="https://github.com/farkhanmaul">Farkhan Maulana</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>