-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Bulan Mei 2022 pada 05.27
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_penagihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminx`
--

CREATE TABLE `adminx` (
  `kd` varchar(50) NOT NULL,
  `usernamex` varchar(100) DEFAULT NULL,
  `passwordx` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `adminx`
--

INSERT INTO `adminx` (`kd`, `usernamex`, `passwordx`, `postdate`) VALUES
('21232f297a57a5a743894a0e4a801fc3', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-01-24 21:08:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_item`
--

CREATE TABLE `m_item` (
  `kd` varchar(50) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_item`
--

INSERT INTO `m_item` (`kd`, `kode`, `nama`, `harga`, `satuan`, `postdate`) VALUES
('99', '9', '9', '900000', 'PCS', '2022-02-03 10:16:15'),
('22', '2', '2', '200000', 'KG', '2022-02-03 10:16:08'),
('11', '1', '1', '12000', 'PCS', '2022-02-03 10:15:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_profil`
--

CREATE TABLE `m_profil` (
  `kd` varchar(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `norek` varchar(100) DEFAULT NULL,
  `wa` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_profil`
--

INSERT INTO `m_profil` (`kd`, `nama`, `alamat`, `telp`, `email`, `npwp`, `norek`, `wa`, `postdate`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'PT. BIASAWAE MAKMUR SENTOSA JAYA', 'Jl. Raya BIASAWAE...', '0818298854', 'hajirodeonxtkeongxgmail.com', '1234567890', '1234567890', '0818298854', '2022-05-18 10:08:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_satuan`
--

CREATE TABLE `m_satuan` (
  `kd` varchar(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_satuan`
--

INSERT INTO `m_satuan` (`kd`, `nama`, `postdate`) VALUES
('8e1649689de6d3d5e888bf4a49d4947c', 'Mbps', '2022-02-03 10:47:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `kd` varchar(50) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `koordinat` longtext DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `wa` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `jml_tagihan` varchar(10) DEFAULT NULL,
  `total_hutang` varchar(100) DEFAULT NULL,
  `total_lunas` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`kd`, `kode`, `nama`, `alamat`, `koordinat`, `telp`, `wa`, `postdate`, `jml_tagihan`, `total_hutang`, `total_lunas`) VALUES
('22', '2', '2', '2', '343665,223455', '2', '2', '2022-05-18 10:09:50', '1', '679420', NULL),
('11', '1', '1', '1', '12345678,345566', '1', '1', '2022-05-18 10:09:36', '3', '2015880', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_item`
--

CREATE TABLE `user_item` (
  `kd` varchar(50) NOT NULL,
  `user_kd` varchar(50) DEFAULT NULL,
  `user_kode` varchar(100) DEFAULT NULL,
  `user_nama` varchar(100) DEFAULT NULL,
  `user_alamat` varchar(100) DEFAULT NULL,
  `user_koordinat` longtext DEFAULT NULL,
  `user_telp` varchar(100) DEFAULT NULL,
  `user_wa` varchar(100) DEFAULT NULL,
  `item_kd` varchar(50) DEFAULT NULL,
  `item_kode` varchar(100) DEFAULT NULL,
  `item_nama` varchar(100) DEFAULT NULL,
  `item_satuan` varchar(100) DEFAULT NULL,
  `item_harga` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_item`
--

INSERT INTO `user_item` (`kd`, `user_kd`, `user_kode`, `user_nama`, `user_alamat`, `user_koordinat`, `user_telp`, `user_wa`, `item_kd`, `item_kode`, `item_nama`, `item_satuan`, `item_harga`, `harga`, `qty`, `subtotal`, `postdate`) VALUES
('097c450a14083fde71584598870fda9f', '22', '2', '2', '2', '343665,223455', '2', '2', '11', '1', '1', 'PCS', '12000', '12000', '2', '24000', '2022-02-03 22:23:53'),
('6bdc92e663beaff6c3a5870a7bf3921b', '22', '2', '2', '2', '343665,223455', '2', '2', '22', '2', '2', 'KG', '200000', '200000', '3', '600000', '2022-02-03 22:23:57'),
('df3e930087126b4c330ac3bd9a881245', '22', '2', '2', '2', '343665,223455', '2', '2', '11', '1', '1', 'PCS', '12000', '12000', '1', '12000', '2022-02-03 22:47:14'),
('928fc6de35dc98fe30805913caab5554', '11', '1', '1', '1', '12345678,345566', '1', '1', '11', '1', '1', 'PCS', '12000', '12000', '7', '84000', '2022-02-03 22:48:00'),
('6b956c42aa98bbbde480e52aa929126b', '11', '1', '1', '1', '12345678,345566', '1', '1', '99', '9', '9', 'PCS', '900000', '900000', '2', '1800000', '2022-02-03 22:48:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_log_entri`
--

CREATE TABLE `user_log_entri` (
  `kd` varchar(50) NOT NULL,
  `ket` longtext DEFAULT NULL,
  `dibaca` enum('true','false') NOT NULL DEFAULT 'false',
  `dibaca_postdate` datetime DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_log_entri`
--

INSERT INTO `user_log_entri` (`kd`, `ket`, `dibaca`, `dibaca_postdate`, `postdate`) VALUES
('eff037279d41c93398d07ecaac518fab', '[MENU : DashBoard ADMIN WEB].', 'true', '2022-05-18 10:09:04', '2022-02-05 00:29:25'),
('974cefd8f09d9e6d33eb5567bbcb3922', '[MENU : [MASTER] Data Satuan].', 'true', '2022-05-18 10:09:04', '2022-02-05 00:32:36'),
('789b08f19a9410a212c90829889e22ff', '[MENU : [MASTER] Data Item Produk].', 'true', '2022-05-18 10:09:04', '2022-02-05 00:32:39'),
('c7b8f970a661e5e6290c7ca88cd960d1', '[MENU : [HUTANG] Data UserxgmringxPelanggan].', 'true', '2022-05-18 10:09:04', '2022-02-05 00:32:59'),
('3f27fc350ee9f92aa6417e860a1909e7', '[MENU : [HUTANG] Data UserxgmringxPelanggan].', 'true', '2022-05-18 10:09:04', '2022-02-05 00:33:12'),
('a807ff53e48d51f3f99f8ffd530304d3', '[MENU : [HUTANG] Data UserxgmringxPelanggan].', 'true', '2022-05-18 10:09:04', '2022-02-05 00:34:00'),
('c4607a87fc6bc49b8dc3fc8e89294cf9', '[MENU : DashBoard ADMIN WEB].', 'true', '2022-05-18 10:09:04', '2022-02-05 00:34:12'),
('0d1d004dd80097e6a65e276161601dcf', '[MENU : DashBoard ADMIN WEB].', 'true', '2022-05-18 10:09:04', '2022-02-05 08:57:17'),
('0271b2c44c47bd00d3a1278b153885b5', '[MENU : [HUTANG] Data UserxgmringxPelanggan].', 'true', '2022-05-18 10:09:04', '2022-02-05 08:57:51'),
('87048d316fcd66831b2bb8140da018e4', '[MENU : [HUTANG] Data UserxgmringxPelanggan].', 'true', '2022-05-18 10:09:04', '2022-02-05 08:57:58'),
('e9795ad5aa2fbe2845edb7023bea7518', '[MENU : [USER] Data UserxgmringxPelanggan].', 'true', '2022-05-18 10:09:04', '2022-02-05 08:58:02'),
('b5b4b4de8fd3fec7aaccc8c49005b40d', '[MENU : [LAPORAN] Per Jatuh Tempo].', 'true', '2022-05-18 10:09:04', '2022-02-05 09:00:39'),
('c84c94728def3b332be0f99b20354990', '[MENU : [LAPORAN] Per Jatuh Tempo].', 'true', '2022-05-18 10:09:04', '2022-02-05 09:00:50'),
('adb0fe69378e1508d2a7dc66647a9a41', '[MENU : [MASTER] Data Item Produk].', 'true', '2022-05-18 10:09:04', '2022-02-05 09:41:13'),
('e7c38e8b6eb51d702e3cd1318b7cdfa2', '[MENU : DashBoard ADMIN WEB].', 'true', '2022-05-18 10:09:04', '2022-02-05 10:00:20'),
('c7494f64f9cc1b9b78e70434dfb26632', '[MENU : DashBoard ADMIN WEB].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:07:21'),
('48eea32adb11720a291c80508e25e9be', '[MENU : DashBoard ADMIN WEB].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:07:24'),
('56921df282413d3cbf37664a96d7d124', '[MENU : [SETTING] Ganti Password].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:07:43'),
('37eefc102d396d8f05c1ce09c0095d85', '[MENU : [SETTING] Profil].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:07:45'),
('9d44b0357d66f08718e9ba3a07361691', '[MENU : [SETTING] Profil].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:08:36'),
('15032de4be68bf4666b5750ea86e6f33', '[MENU : [SETTING] Profil].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:08:36'),
('d67cb366c137cf2eb3136ec993fd1687', '[MENU : [MASTER] Data Satuan].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:08:40'),
('c3b0a1bd3baf9fd918c689eae3794200', '[MENU : [MASTER] Data Item Produk].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:08:42'),
('781db4cd06a5272e2eda590a40793123', '[MENU : [MASTER] Data Item Produk].', 'true', '2022-05-18 10:09:04', '2022-05-18 10:08:48'),
('a212937ed005cc3e1f5f2daa268d5672', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:11'),
('d1e44178483975ec7e7c2760462a98dc', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:16'),
('3fea8a05f547c6bbf8d35d84a1b6f745', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:26'),
('9ff467d2cd1f760ca92990ce9bad9b61', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:26'),
('e098293ea0c2859ecfe6833bc64b3cbe', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:30'),
('fc79c82983c2cd55b3bb451058aa1f35', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:36'),
('5e394d65259f4e43d3900acd2de484cf', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:36'),
('18287cd9dc9e7a1bd1b78c6597fa36d0', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:37'),
('3e6f8a29a719dbe7688292fa737dd9f8', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:38'),
('18dc06f9a693928eb038c09a275b1feb', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:38'),
('5ead937932a7df60f369241105d48b63', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:42'),
('9c53ebedf2d9426a386a24f8b72afa59', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:50'),
('b28ac2f98b6dc074786d2b53cc0a260b', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:50'),
('32875a7dbb0fc831805014ab4ccc38b6', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:09:52'),
('633c69565dfd82be4155ffd78ec3ae87', '[MENU : [USER] Data Paket].', 'false', NULL, '2022-05-18 10:09:57'),
('4df20bf8255925e2b5156432dd28025e', '[MENU : [TAGIHAN] Jatuh Tempo].', 'false', NULL, '2022-05-18 10:10:47'),
('821d4086f9745de1659439721e05eff6', '[MENU : [HUTANG] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:11:04'),
('42613aa45c2bcd50c9b8b6282b7137c4', '[MENU : DashBoard ADMIN WEB].', 'false', NULL, '2022-05-18 10:11:54'),
('303677526e4bf29bcf89e81ab635dac3', '[MENU : DashBoard ADMIN WEB].', 'false', NULL, '2022-05-18 10:17:09'),
('90ac68accbccfa81d9182ffe3c5d3206', '[MENU : [MASTER] Data Item Produk].', 'false', NULL, '2022-05-18 10:18:23'),
('f1450c524b84d862dcb2044d393501a3', '[MENU : [USER] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:18:45'),
('49d3d2a4fe8e6aa1c6059ff2d36b62b5', '[MENU : [USER] Data Paket].', 'false', NULL, '2022-05-18 10:18:59'),
('79efefae56512e2734393e873bb5e0df', '[MENU : [USER] Data Paket].', 'false', NULL, '2022-05-18 10:19:11'),
('6401a3729f7e997229cc1077b9b0ed31', '[MENU : [HUTANG] Data UserxgmringxPelanggan].', 'false', NULL, '2022-05-18 10:21:13'),
('c005e848b77267fa5dd93772c7b12ccf', '[MENU : DashBoard ADMIN WEB].', 'false', NULL, '2022-05-18 10:23:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_log_login`
--

CREATE TABLE `user_log_login` (
  `kd` varchar(50) NOT NULL,
  `ipnya` varchar(100) DEFAULT NULL,
  `dibaca` enum('true','false') NOT NULL DEFAULT 'false',
  `dibaca_postdate` datetime DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_log_login`
--

INSERT INTO `user_log_login` (`kd`, `ipnya`, `dibaca`, `dibaca_postdate`, `postdate`) VALUES
('6975e3fb788d7c545cc93a9aee09b4af', '127.0.0.1', 'true', '2022-05-18 10:09:06', '2022-02-05 00:27:05'),
('0de83afdfd3d3acfc2b76a3513365d89', '127.0.0.1', 'true', '2022-05-18 10:09:06', '2022-02-05 08:57:16'),
('92f84bcbc0edc127f104bacf7097f495', '127.0.0.1', 'true', '2022-05-18 10:09:06', '2022-05-18 10:07:21'),
('9edba6ee1e949621b915dc895e7e8e82', '127.0.0.1', 'false', NULL, '2022-05-18 10:17:08'),
('bab91f9a12fd233fdba70be71709efa4', '127.0.0.1', 'false', NULL, '2022-05-18 10:23:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tagihan`
--

CREATE TABLE `user_tagihan` (
  `kd` varchar(50) NOT NULL,
  `user_kd` varchar(50) DEFAULT NULL,
  `user_kode` varchar(100) DEFAULT NULL,
  `user_nama` varchar(100) DEFAULT NULL,
  `user_alamat` varchar(100) DEFAULT NULL,
  `user_koordinat` longtext DEFAULT NULL,
  `user_telp` varchar(100) DEFAULT NULL,
  `user_wa` varchar(100) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `periode_bln` varchar(2) DEFAULT NULL,
  `periode_thn` varchar(4) DEFAULT NULL,
  `tgl_tagihan` date DEFAULT NULL,
  `tgl_expire` date DEFAULT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `ppn` varchar(100) DEFAULT NULL,
  `pajak1` varchar(100) DEFAULT NULL,
  `pajak2` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `tgl_bayar_postdate` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_tagihan`
--

INSERT INTO `user_tagihan` (`kd`, `user_kd`, `user_kode`, `user_nama`, `user_alamat`, `user_koordinat`, `user_telp`, `user_wa`, `kode`, `periode_bln`, `periode_thn`, `tgl_tagihan`, `tgl_expire`, `subtotal`, `discount`, `ppn`, `pajak1`, `pajak2`, `total`, `tgl_bayar`, `tgl_bayar_postdate`, `status`, `postdate`) VALUES
('cc347494ba11fbcc244039f8fb2a8fd8', '11', '1', '1', '1', '12345678,345566', '1', '1', '1', '1', '2022', '2022-01-15', '2022-01-20', '1884000', '0', '0', '32970', '98910', '2015880', '0000-00-00', '2022-02-04 23:59:58', '', '2022-02-04 23:47:47'),
('36c9e27debe74108491f786b597ac6cf', '11', '1', '1', '1', '12345678,345566', '1', '1', '1', '2', '2022', '2022-02-15', '2022-02-20', '1884000', '0', '0', '32970', '98910', '2015880', '2022-02-17', '2022-02-04 23:23:22', 'TERBAYAR', '2022-02-04 10:15:03'),
('c7b467eb25dfbca8bb6526266543bede', '22', '2', '2', '2', '343665,223455', '2', '2', '2', '2', '2022', '2022-02-15', '2022-02-20', '636000', '1100', '0', '11130', '33390', '679420', '0000-00-00', '2022-02-04 23:24:32', '', '2022-02-04 10:28:05'),
('4d70b19b2a2fb6b11d419a085525f055', '11', '1', '1', '1', '12345678,345566', '1', '1', '1', '5', '2022', NULL, NULL, '1884000', NULL, NULL, '32970', '98910', NULL, NULL, NULL, NULL, '2022-05-18 10:10:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tagihan_item`
--

CREATE TABLE `user_tagihan_item` (
  `kd` varchar(50) NOT NULL,
  `periode_bln` varchar(2) DEFAULT NULL,
  `periode_thn` varchar(4) DEFAULT NULL,
  `user_kd` varchar(50) DEFAULT NULL,
  `user_kode` varchar(100) DEFAULT NULL,
  `user_nama` varchar(100) DEFAULT NULL,
  `user_alamat` varchar(100) DEFAULT NULL,
  `user_koordinat` longtext DEFAULT NULL,
  `user_telp` varchar(100) DEFAULT NULL,
  `user_wa` varchar(100) DEFAULT NULL,
  `item_kd` varchar(50) DEFAULT NULL,
  `item_kode` varchar(100) DEFAULT NULL,
  `item_nama` varchar(100) DEFAULT NULL,
  `item_satuan` varchar(100) DEFAULT NULL,
  `item_harga` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_tagihan_item`
--

INSERT INTO `user_tagihan_item` (`kd`, `periode_bln`, `periode_thn`, `user_kd`, `user_kode`, `user_nama`, `user_alamat`, `user_koordinat`, `user_telp`, `user_wa`, `item_kd`, `item_kode`, `item_nama`, `item_satuan`, `item_harga`, `harga`, `qty`, `subtotal`, `postdate`) VALUES
('3412855c19c06dc6c7e3fffac61071a43', '2', '2022', '22', '2', '2', '2', '343665,223455', '2', '2', '6bdc92e663beaff6c3a5870a7bf3921b', '2', '2', 'KG', '200000', '200000', '3', '600000', '2022-02-04 10:37:22'),
('3412855c19c06dc6c7e3fffac61071a42', '2', '2022', '22', '2', '2', '2', '343665,223455', '2', '2', 'df3e930087126b4c330ac3bd9a881245', '1', '1', 'PCS', '12000', '12000', '1', '12000', '2022-02-04 10:37:22'),
('3412855c19c06dc6c7e3fffac61071a41', '2', '2022', '22', '2', '2', '2', '343665,223455', '2', '2', '097c450a14083fde71584598870fda9f', '1', '1', 'PCS', '12000', '12000', '2', '24000', '2022-02-04 10:37:22'),
('63c7a2bf1f62b89fd26ac54123adee3b1', '2', '2022', '11', '1', '1', '1', '12345678,345566', '1', '1', '928fc6de35dc98fe30805913caab5554', '1', '1', 'PCS', '12000', '12000', '7', '84000', '2022-02-04 23:16:20'),
('63c7a2bf1f62b89fd26ac54123adee3b2', '2', '2022', '11', '1', '1', '1', '12345678,345566', '1', '1', '6b956c42aa98bbbde480e52aa929126b', '9', '9', 'PCS', '900000', '900000', '2', '1800000', '2022-02-04 23:16:20'),
('b6f3d544e889b8579803cfb4c2366f792', '1', '2022', '11', '1', '1', '1', '12345678,345566', '1', '1', '6b956c42aa98bbbde480e52aa929126b', '9', '9', 'PCS', '900000', '900000', '2', '1800000', '2022-02-04 23:49:06'),
('b6f3d544e889b8579803cfb4c2366f791', '1', '2022', '11', '1', '1', '1', '12345678,345566', '1', '1', '928fc6de35dc98fe30805913caab5554', '1', '1', 'PCS', '12000', '12000', '7', '84000', '2022-02-04 23:49:06'),
('1fd09744b72d68877e5d7573949e541f2', '5', '2022', '11', '1', '1', '1', '12345678,345566', '1', '1', '6b956c42aa98bbbde480e52aa929126b', '9', '9', 'PCS', '900000', '900000', '2', '1800000', '2022-05-18 10:19:55'),
('1fd09744b72d68877e5d7573949e541f1', '5', '2022', '11', '1', '1', '1', '12345678,345566', '1', '1', '928fc6de35dc98fe30805913caab5554', '1', '1', 'PCS', '12000', '12000', '7', '84000', '2022-05-18 10:19:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adminx`
--
ALTER TABLE `adminx`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `m_profil`
--
ALTER TABLE `m_profil`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `m_satuan`
--
ALTER TABLE `m_satuan`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `user_item`
--
ALTER TABLE `user_item`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `user_log_entri`
--
ALTER TABLE `user_log_entri`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `user_log_login`
--
ALTER TABLE `user_log_login`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `user_tagihan`
--
ALTER TABLE `user_tagihan`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `user_tagihan_item`
--
ALTER TABLE `user_tagihan_item`
  ADD PRIMARY KEY (`kd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
