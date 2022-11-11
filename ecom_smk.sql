-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 08:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliasi`
--

CREATE TABLE `affiliasi` (
  `id_affiliasi` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `affiliasi`
--

INSERT INTO `affiliasi` (`id_affiliasi`, `kode_produk`, `username`) VALUES
(4, '202210210359112', 'K3514003'),
(5, '202210210356432', 'K3514003'),
(7, '202211020815142', '101'),
(8, '202211020808112', '101'),
(9, '202211020805362', '101');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `kode_transaksi` varchar(70) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `penjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `kode_transaksi`, `kode_produk`, `jumlah`, `pembeli`, `penjual`) VALUES
(16, '2022111010183410', '202211020813452', 3, '201', 'Admin'),
(17, '2022111010183410', '202211020808112', 14, '201', 'Admin'),
(18, '2022111013215610', '202211020815142', 1, '201', 'Admin'),
(19, '2022111013215610', '202211020808112', 1, '201', 'Admin'),
(20, '2022111113550610', '202211020815142', 5, '201', '101'),
(21, '2022111113550610', '202211020808112', 1, '201', '101');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `namafile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `kode_produk`, `namafile`) VALUES
(18, '202210180359545', '20221018090004.jpg'),
(19, '202210180359545', '20221018090010.jpg'),
(20, '202210180441455', '20221018094507.jpg'),
(22, '202210190904232', '20221019140844.jpg'),
(23, '202210190904232', '20221019140850.jpg'),
(27, '202210210353132', '20221021085337.jpg'),
(29, '202210210353132', '20221021085350.jpg'),
(30, '202210210355532', '20221021085621.jpg'),
(31, '202210210354392', '20221021085629.jpg'),
(32, '202210210356432', '20221021085708.jpg'),
(33, '202210210356182', '20221021085731.jpg'),
(35, '202210210359112', '20221021085933.jpg'),
(36, '202210210358292', '20221021085935.jpg'),
(37, '202210210359442', '20221021085957.jpg'),
(38, '202210210359112', '20221021090105.jpg'),
(40, '202210210400432', '20221021090134.jpg'),
(41, '202210210401452', '20221021090211.jpg'),
(42, '202210210401452', '20221021090219.jpg'),
(43, '202210210402302', '20221021090317.jpg'),
(44, '202210210402092', '20221021090648.jpg'),
(47, '202211020805362', '20221102140627.jpg'),
(48, '202211020808112', '20221102140827.jpg'),
(49, '202211020809412', '20221102141013.jpg'),
(50, '202211020813452', '20221102141425.jpg'),
(51, '202211020815142', '20221102141523.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `active`) VALUES
(6, 'Food', 0),
(7, 'Kecantikan', 0),
(8, 'Kerajinan dan Aksesoris', 0),
(9, 'Perlengkapan Rumah', 0),
(10, 'Fashion', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(80) NOT NULL,
  `favicon` varchar(80) NOT NULL,
  `logo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama_website`, `favicon`, `logo`) VALUES
(1, 'Bismart Tefa', 'fav.ico', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `active` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama`, `deskripsi`, `id_kategori`, `active`, `tanggal`, `harga`, `stok`, `username`) VALUES
(27, '202211020805362', 'ABC Sardines Chili', '', '6', 1, '2022-11-02 08:05:36', '7355', 50, 'root'),
(28, '202211020808112', 'Agarasa Coklat', '', '6', 1, '2022-11-02 08:08:11', '4400', 49, 'root'),
(29, '202211020809412', 'Agarasa Melon', '', '6', 1, '2022-11-02 08:09:41', '3500', 50, 'root'),
(30, '202211020813452', 'Aqua 1500 Ml', '', '6', 1, '2022-11-02 08:13:45', '4600', 50, 'root'),
(31, '202211020815142', 'Aqua 330 Ml', '', '6', 1, '2022-11-02 08:15:14', '1700', 49, 'root');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `id_temp_cart` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `penjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(70) NOT NULL,
  `tanggal_beli` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `penjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `tanggal_beli`, `tanggal_selesai`, `pembayaran`, `status`, `pembeli`, `penjual`) VALUES
(3, '2022111010183410', '2022-11-10 10:18:34', '0000-00-00 00:00:00', 'Tunai', 0, '201', 'root'),
(4, '2022111013215610', '2022-11-10 13:21:56', '0000-00-00 00:00:00', 'Tunai', 3, '201', 'root'),
(5, '2022111113550610', '2022-11-11 13:55:06', '0000-00-00 00:00:00', 'Transfer', 0, '201', '101');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pembeli','Siswa') NOT NULL,
  `nama` varchar(70) NOT NULL,
  `store` varchar(70) DEFAULT NULL,
  `tempat_lahir` varchar(40) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `store`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kelas`, `tahun_ajaran`, `email`, `no_hp`, `foto`, `active`, `last_login`) VALUES
(2, 'root', '$2y$05$vNyScV3/zLsCS2FFkMdtrufbXzrQIVdGAe34Z8pE7VxvoO9QMCsEu', 'Admin', 'Muryanti, S.Kom, M.Kom', '', 'Boyolali', '1996-09-02', 'Karanganyar RT 02 RW 01, Bejen, Bejen, Karanganyar, 57444', '', '', 'muryanti@gmail.com', '896733333181', 'root.jpg', 1, '2022-10-27 13:08:46'),
(5, 'K3514003', '$2y$05$E6cvam62HaVPMszZTjWMoe48UBVmQMov05GvIkBg5Cjp2GWT7E9/e', 'Siswa', 'Afif Nuruddin Maisaroh', '', 'Sukoharjo', '1996-06-08', 'Suruh RT 02 RW 01, Kayuapak, Polokarto, Sukoharjo, 57555', 'XI RB', '2011', 'afifnuruddinmaisaroh@gmail.com', '089673333318', 'K3514003.jpg', 1, '2022-10-30 12:44:59'),
(6, '101', '$2y$05$2MSOn7kuG2a.v9RkqAP/Z.wDSpw2Nr3YYhYR8zs8eP.FQCzKL987S', 'Siswa', 'Sutarmadi', NULL, 'asasd', '2022-09-27', 'asdasd', 'XRA', '2010', '101@asdas.com', '1231231', '101.jpg', 1, '2022-10-31 09:27:41'),
(8, '102', '$2y$05$C462u/qPNgxInqHKCxEh9.UKRdRQ021oIwnsWT0lvnduThi.bZfzS', 'Siswa', 'Sumanto', NULL, '', '0000-00-00', '', '', '', '', '', '102.jpg', 1, '2022-10-31 09:27:49'),
(10, '201', '$2y$05$vAbwICeFZfOjy2JTxtBJG.L00d.hhjHAtwjEYI/Dkao9NTFq7vQoO', 'Pembeli', 'Nuruddin', NULL, '', '0000-00-00', 'Suruh Kayuapak RT 02/01', '', '', 'afifnuruddinmaisaroh@gmail.com', '6289673333318', '201jpg', 1, '2022-11-10 14:14:38'),
(11, '202', '$2y$05$xjqtH8B0UDZyYQeBysLfDegCESdKPszH/B.XEPDEPI6rrLWfz0GF6', 'Pembeli', 'Andi Windu', NULL, '', '0000-00-00', 'Karanganyar', '', '', '-', '', '202jpg', 1, '2022-11-07 13:31:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliasi`
--
ALTER TABLE `affiliasi`
  ADD PRIMARY KEY (`id_affiliasi`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`id_temp_cart`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliasi`
--
ALTER TABLE `affiliasi`
  MODIFY `id_affiliasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `id_temp_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
