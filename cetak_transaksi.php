<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'RENTAL MOBIL PT. HANZ CAR', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR TRANSAKSI', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 6, 'Nama Penyewa', 1, 0);
$pdf->Cell(55, 6, 'Tipe Mobil ', 1, 0);
$pdf->Cell(25, 6, 'Tanggal Sewa', 1, 1);
$pdf->SetFont('Arial', '', 10);
include 'koneksi.php';
$mahasiswa = mysqli_query($con, "select * from transaksi order by tgl_sewa");
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(35, 6, $row['penyewa'], 1, 0);
    $pdf->Cell(55, 6, $row['nama_mobil'], 1, 0);
    $pdf->Cell(25, 6, $row['tgl_sewa'], 1, 1);
}
$pdf->Output();
