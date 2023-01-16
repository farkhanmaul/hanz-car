<?php
// Memanggil file koneksi.php
include_once("koneksi.php");

// Perkondisian untuk mengecek apakah tombol submit sudah ditekan.
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $transmisi = $_POST['transmisi'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];

    // Syntax untuk mengupdate data user berdasarkan id
    $result = mysqli_query($con, "UPDATE mobil SET tipe='$tipe',transmisi='$transmisi',tahun='$tahun',harga='$harga' WHERE id='$id'");

    // Redirect ke index.php
    header("Location: index.php");
}
?>
<?php
// Menampilkan data berdasarkan data yang kita pilih.

// Mengambil id dari url
$id = $_GET['id'];

// Syntax untuk mengambil data berdasarkan id
$result = mysqli_query($con, "SELECT * FROM mobil WHERE id='$id'");
while ($user_data = mysqli_fetch_array($result)) {
    $tipe = $user_data['tipe'];
    $transmisi = $user_data['transmisi'];
    $tahun = $user_data['tahun'];
    $harga = $user_data['harga'];
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
                            <h2>Edit Mobil</h2>
                        </div>
                    </div>
                </div>


                <form action="mobil_edit.php" method="post" class="php-email-form">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="tipe" placeholder="Nama Mobil" value=<?php echo $tipe; ?>>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="transmisi" placeholder="Transmisi" value=<?php echo $transmisi; ?>>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="tahun" placeholder="Tahun Mobil" value=<?php echo $tahun; ?>>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="harga" placeholder="Harga" value=<?php echo $harga; ?>>
                    </div>

                    <input type="hidden" name="id" value=<?php echo $id ?>>
                    <button type="submit" class="text-center" name="update" value="update">Update</button>
                    <a href="admin_show_mobil.php">Cancel</a>
                </form>
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