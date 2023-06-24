-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 08:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `responsi_280`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `transmisi` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `tipe`, `transmisi`, `tahun`, `harga`) VALUES
(1, 'Ferrari Lamborgini', 'AT', 2022, 600000),
(2, 'Toyota Alphard', 'AT', 2022, 1000000),
(3, 'Kijang Innova', 'MT', 2022, 700000),
(5, 'Honda Civic Type R', 'MT', 2020, 9000000),
(7, 'Honda Brio Satya 1.2 CVT', 'AT', 2017, 700000),
(8, 'Toyota Avanza', 'MT', 2015, 600000),
(9, 'Honda CR-V', 'MT', 2014, 700000),
(10, 'Toyota Yaris', 'MT', 2013, 500000),
(11, 'Lamborgini Innova', 'AT', 2022, 800000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `penyewa` varchar(50) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL,
  `tgl_sewa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `penyewa`, `nama_mobil`, `tgl_sewa`) VALUES
(4, 'Suminahh', 'Toyota Alphard', '2023-01-24'),
(5, 'budiarto', 'Ferrari', '2023-01-25'),
(6, 'budiarto', 'Toyota Alphard', '2023-01-16'),
(7, 'budiarto', 'Kijang Innova', '2023-01-26'),
(8, 'fafafifi', 'Kijang Innova', '2023-01-31'),
(9, 'User', 'Toyota Alphard', '2023-01-24'),
(10, 'Lololi', 'Honda Civic Type R', '2023-01-12'),
(11, 'User', 'Toyota Alphard', '2023-01-17'),
(12, 'User', 'Toyota Alphard', '2023-01-26'),
(13, 'User', 'Toyota Alphard', '2023-01-18'),
(14, 'User', 'Ferrari Lamborgini', '2023-01-31'),
(15, 'User', 'Honda Civic Type R', '2023-01-25'),
(16, 'andidingding', 'Ferrari Lamborgini', '2023-02-01'),
(17, 'User', 'Honda Brio Satya 1.2 CVT', '2023-02-01'),
(18, '', '', '0000-00-00'),
(19, 'andidingding', 'Ferrari Lamborgini', '2023-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('ADMIN','USER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `password`, `level`) VALUES
(1, 'admin', 'Admin Ganteng', 'L', 'Yogyakarta', '2022-11-30', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN'),
(2, 'user', 'User', 'P', 'Yogyakarta', '2022-11-30', 'ee11cbb19052e40b07aac0ca060c23ee', 'USER'),
(3, 'alex', 'Alex', 'L', 'Yogyakarta', '2022-11-30', 'b75bd008d5fecb1f50cf026532e8ae67', 'USER'),
(15, 'sumi', 'Suminahh', 'W', 'Kayangan', '2023-01-27', '41008f06b76981093c7aa369d83c08ea', 'USER'),
(27, 'lali', 'lalilu', 'L', 'Jakarta', '2023-01-27', '443099d7d69bb4a92aa9db7547c216dd', 'USER'),
(29, 'budi', 'budiarto', 'L', 'Surabaya', '2023-01-10', '00dfc53ee86af02e742515cdcf075ed3', 'USER'),
(30, 'fafa', 'fafafifiui', 'W', 'Frindavan', '2023-01-17', '05d251ea28c5be9426611a121db0c92a', 'USER'),
(31, 'lolo', 'Lololi', 'W', 'Jogja', '2023-01-09', 'd6581d542c7eaf801284f084478b5fcc', 'USER'),
(32, 'andi', 'andidingding', 'W', 'Lampung', '2023-01-03', 'ce0e5bf55e4f71749eade7a8b95c4e46', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
