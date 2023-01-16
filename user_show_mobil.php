<?php
include "koneksi.php";
$sql = "SELECT * FROM user ORDER BY level";
$tampil = mysqli_query($con, $sql);

session_start();

if (!isset($_SESSION['username']) and !isset($_SESSION['username'])) {
  header('Location: form_login.php');
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
        <h1><a href="index.php">Hanz<span>Car</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>

          <?php $user_data = mysqli_fetch_array($result)
          ?>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="about.php">About</a></li>
          <li><a class="nav-link scrollto" href="user_show_mobil.php">List Mobil</a></li>
          <li><a class="nav-link scrollto  " href="form_transaksi.php?id=<?php echo "$user_data[id]" ?>"> <button class="btn btn-outline-primary navbar-btn">Reservasi</button></a></li>
          <li><a class=" nav-link scrollto" href="proses/user_logout.php"><button type="button" class="btn btn-outline-danger">Logout</button></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <section id="about">

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Pilihan Mobil</span>
          <h2>Pilihan Mobil</h2>
          <p>Kami menyediakan berbagai tipe mobil sesuai kebutuhan anda</p>
        </div>
        <form action="" method="GET" style="margin-top: 1em">
          <input style="padding:1em 2em; width:100%;" type="text" name="cari_user" placeholder="Cari Data Berdasarkan Nama" defaultValue="">
        </form>
        <form action="admin_show_user.php" class="php-email-form">

          <?php
          if (isset($_GET['cari_user'])) :
            $cari_user = $_GET['cari_user'];
            $result = mysqli_query($con, "SELECT * FROM mobil WHERE tipe LIKE '%$cari_user%' order by tipe ASC ");
          endif; ?>

          <?php if ($result->num_rows > 0) :

          ?>


            <table width='80%' border=1 class="table table-striped">
              <tr>
                <th>Tipe</th>
                <th>Transmisi</th>
                <th>Tahun</th>
                <th>Harga (Rp.)</th>
              </tr>
              <?php
              while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['tipe'] . "</td>";
                echo "<td>" . $user_data['transmisi'] . "</td>";
                echo "<td>" . $user_data['tahun'] . "</td>";
                echo "<td>" . $user_data['harga'] . "</td>";
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
              </tr>
              <tr>
                <td colspan="4" align="center">Data tidak di temukan!</td>
              </tr>
            </table>
          <?php endif; ?>

        </form>
        <a href="index.php"><button class="btn btn-danger">Back</button></a>
        <a href="cetak_mobil.php"><button class="btn btn-primary">Cetak Tabel Mobil</button></a>


      </div>

      </div>
    </section><!-- End Portfolio Section -->

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