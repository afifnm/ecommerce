-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2022 pada 14.35
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `affiliasi`
--

CREATE TABLE `affiliasi` (
  `id_affiliasi` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `affiliasi`
--

INSERT INTO `affiliasi` (`id_affiliasi`, `kode_produk`, `username`) VALUES
(4, '202210210359112', 'K3514003'),
(5, '202210210356432', 'K3514003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `namafile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
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
(44, '202210210402092', '20221021090648.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `active`) VALUES
(6, 'Food', 0),
(7, 'Kecantikan', 0),
(8, 'Kerajinan dan Aksesoris', 0),
(9, 'Perlengkapan Rumah', 0),
(10, 'Fashion', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(80) NOT NULL,
  `favicon` varchar(80) NOT NULL,
  `logo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama_website`, `favicon`, `logo`) VALUES
(1, 'Bismart Tefa', 'fav.ico', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama`, `deskripsi`, `id_kategori`, `active`, `tanggal`, `harga`, `stok`, `username`) VALUES
(13, '202210210356182', 'Es Boba', '<p><em><strong><span style=\"font-size: 14pt;\">Es yang sempat viral di Indonesia karena menyegarkan di kala kamu haus, wehehehehe.</span></strong></em></p>', '6', 1, '2022-10-21 03:56:18', '10000', 15, 'root'),
(14, '202210210356432', 'BAKSO ACI(BACI)', '', '6', 1, '2022-10-21 03:56:43', '12000', 100, 'root'),
(16, '202210210359112', 'klepon ijo', '<p>klepon ijo</p>\r\n<p>klepon ijo</p>\r\n<p>klepon ijo</p>\r\n<p>klepon ijo</p>\r\n<p>klepon ijo</p>\r\n<p>klepon ijo</p>', '6', 1, '2022-10-21 03:59:11', '10000', 50, 'root'),
(19, '202210210401452', 'udang keju', '<p>udang keju</p>\r\n<p>udang keju</p>\r\n<p>udang keju</p>\r\n<p>udang keju</p>\r\n<p>udang keju</p>\r\n<p>&nbsp;</p>', '6', 1, '2022-10-21 04:01:45', '8000', 1, 'root');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Konsumen','Siswa') NOT NULL,
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `store`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kelas`, `tahun_ajaran`, `email`, `no_hp`, `foto`, `active`, `last_login`) VALUES
(2, 'root', '$2y$05$vNyScV3/zLsCS2FFkMdtrufbXzrQIVdGAe34Z8pE7VxvoO9QMCsEu', 'Admin', 'Muryanti, S.Kom, M.Kom', '', 'Boyolali', '1996-09-02', 'Karanganyar RT 02 RW 01, Bejen, Bejen, Karanganyar, 57444', '', '', 'muryanti@gmail.com', '896733333181', 'root.jpg', 1, '2022-10-27 13:08:46'),
(5, 'K3514003', '$2y$05$E6cvam62HaVPMszZTjWMoe48UBVmQMov05GvIkBg5Cjp2GWT7E9/e', 'Siswa', 'Afif Nuruddin Maisaroh', '', 'Sukoharjo', '1996-06-08', 'Suruh RT 02 RW 01, Kayuapak, Polokarto, Sukoharjo, 57555', 'XI RB', '2011', 'afifnuruddinmaisaroh@gmail.com', '089673333318', 'K3514003.jpg', 1, '2022-10-30 12:44:59'),
(6, '101', '$2y$05$2MSOn7kuG2a.v9RkqAP/Z.wDSpw2Nr3YYhYR8zs8eP.FQCzKL987S', 'Siswa', 'Sutarmadi', NULL, 'asasd', '2022-09-27', 'asdasd', 'XRA', '2010', '101@asdas.com', '1231231', '', 1, '2022-10-30 20:33:25'),
(7, '001', '$2y$05$6kQs0a7dqU1btvxWjhjxeeIpYveMx59.UCp4VF7jtiG2NkR.9sWGG', 'Siswa', 'Sutarmadi', NULL, '', '0000-00-00', '', '', '', '', '', '', 1, '2022-10-30 20:33:06'),
(8, '102', '$2y$05$C462u/qPNgxInqHKCxEh9.UKRdRQ021oIwnsWT0lvnduThi.bZfzS', 'Siswa', 'Sumanto', NULL, '', '0000-00-00', '', '', '', '', '', '', 1, '2022-10-30 20:34:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `affiliasi`
--
ALTER TABLE `affiliasi`
  ADD PRIMARY KEY (`id_affiliasi`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `affiliasi`
--
ALTER TABLE `affiliasi`
  MODIFY `id_affiliasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
