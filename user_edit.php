<?php
// Memanggil file koneksi.php
include_once("koneksi.php");

// Perkondisian untuk mengecek apakah tombol submit sudah ditekan.
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];

    // Syntax untuk mengupdate data user berdasarkan id
    $result = mysqli_query($con, "UPDATE user SET nama='$nama',jenis_kelamin='$jenis_kelamin',alamat='$alamat',tgl_lahir='$tgl_lahir' WHERE id='$id'");

    // Redirect ke index.php
    header("Location: index.php");
}
?>
<?php
// Menampilkan data berdasarkan data yang kita pilih.

// Mengambil id dari url
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
                            <h2>Edit User</h2>
                        </div>
                    </div>
                </div>


                <form action="user_edit.php" method="post" class="php-email-form">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" value=<?php echo $username; ?>>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value=<?php echo $nama; ?>>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin" value=<?php echo $jenis_kelamin; ?>>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" value=<?php echo $alamat; ?>>
                    </div>

                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" value=<?php echo $tgl_lahir; ?>>
                    </div>
                    <input type="hidden" name="id" value=<?php echo $id ?>>
                    <button type="submit" class="text-center" name="update" value="update">Update</button>
                    <a href="index.php">Cancel</a>
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