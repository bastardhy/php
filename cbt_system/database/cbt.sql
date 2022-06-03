-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jan 2017 pada 17.51
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_soal` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `jawaban` enum('A','B','C','D') NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_user` int(5) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `id_user` int(5) NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `id_user`, `aktif`) VALUES
(1, 'Bahasa Indonesia', 2, 'Y'),
(2, 'Matematika', 3, 'Y'),
(3, 'Bahasa Inggris', 5, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mainmenu`
--

CREATE TABLE `mainmenu` (
  `id_main` int(5) NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `levelmenu` enum('A','G','S') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mainmenu`
--

INSERT INTO `mainmenu` (`id_main`, `nama_menu`, `link`, `aktif`, `levelmenu`) VALUES
(2, 'Setting Menu', '', 'Y', 'A'),
(8, 'Menu Admin', '', 'N', 'S'),
(13, 'Soal - Soal Ujian', '?module=pertanyaan', 'Y', 'G'),
(11, 'Setting Aplikasi', '', 'Y', 'A'),
(14, 'Daftar Test', '?module=daftar_test', 'Y', 'S'),
(15, 'Hasil Test', '?module=hasiltest', 'Y', 'G');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_sub` int(5) NOT NULL,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_main`, `aktif`) VALUES
(3, 'Menu Utama', '?module=menuutama', 2, 'Y'),
(2, 'Sub Menu', '?module=submenu', 2, 'Y'),
(13, 'Kategori Test', '?module=kategori', 11, 'Y'),
(15, 'Reset Aplikasi', '?module=reset', 11, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_soal`
--

CREATE TABLE `tabel_soal` (
  `id_soal` int(4) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_a` varchar(100) NOT NULL,
  `pilihan_b` varchar(100) NOT NULL,
  `pilihan_c` varchar(100) NOT NULL,
  `pilihan_d` varchar(100) NOT NULL,
  `jawaban_benar` enum('A','B','C','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_soal`
--

INSERT INTO `tabel_soal` (`id_soal`, `id_kategori`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban_benar`) VALUES
(27, 1, ' Penggunaan tanda seru yang benar terdapat pada kalimat.................\n', 'Tempat perlombaan kurang baik!', ' Lomba itu dilaksanakan pada hari senin!', 'Persiapkan dirimu untuk menghadapi lomba itu!', 'Kapan lomba itu dilaksanakan!', 'C'),
(28, 1, ' Penulisan kalimat langsung yang benar adalah....................', 'Ibu berkata "Jangan bermain dekat sungai".', 'Ibu berkata, "Jangan bermain dekat sungai".', 'Ibu berkata, Jangan bermain dekat sungai.', 'Ibu berkata: "Jangan bermain dekat sungai".', 'C'),
(29, 1, 'Kau memang yang terbaik dari semua sahabatku Bil!\nTanda koma (,) tepat diletakkan di antara  kata.......', 'kamu dan memang', 'memang dan yang', 'semua dan sahabatku', 'sahabatku dan Bil', 'D'),
(30, 1, 'Dibawah ini kalimat yang mengandung unsur keterangan alat adalah................', 'Bu Sulastri membuat kue bolu kukus', 'Pak Harun menebang pohon dengan gergaji besi', 'Perahu nelayan sedang melaut', 'Ibu menjahit baju baru', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `id_user` int(5) NOT NULL,
  `level` enum('admin','guru','siswa') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_session`, `username`, `password`, `nama_lengkap`, `jabatan`, `email`, `id_user`, `level`) VALUES
('3eprkarobpg9db6sjh05r4qjq2', 'siswa1', '21232f297a57a5a743894a0e4a801fc3', 'Yusuf Achsanul Azzam', 'Murid Kelas XI A', 'pnpm_slahung@yahoo.co.id', 4, 'siswa'),
('pgi4nm0fbife4avdfcs5nesre3', 'guru2', '21232f297a57a5a743894a0e4a801fc3', 'Novi Kumalasari', 'Guru Matematika', 'aprintgoes82@gmail.com', 3, 'guru'),
('4be9diqolbhb9rk4t8d17kie60', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Agus Hariyanto', 'Administrator', 'agus_pacitan@yahoo.co.id', 1, 'admin'),
('qm0nf6s8nogjj62a3b4kpce111', 'guru1', '21232f297a57a5a743894a0e4a801fc3', 'Wiwik Cendraningsih', 'Guru Bahasa Indonesia', 'imagomedia82@gmail.com', 2, 'guru'),
('gtt4orr4nt2c74tmhphapi5vg6', 'siswa2', '21232f297a57a5a743894a0e4a801fc3', 'Nama Siswa', 'Siswa Kelas XII', 'a_printgoes@yahoo.com', 6, 'siswa'),
('g1ehooiifit1s6b8kieph3j0p3', 'guru3', '21232f297a57a5a743894a0e4a801fc3', 'Lilek Indrawati', 'Guru Bahasa Inggris', '', 5, 'guru'),
('fhriso15cbkl26tclk6nbd5ia7', 'arumi', '21232f297a57a5a743894a0e4a801fc3', 'Ratna Rahmawati', 'Siswa Kelas X', 'arumi_mizano@yahoo.co.id', 7, 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`id_main`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tabel_soal`
--
ALTER TABLE `tabel_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `id_main` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_sub` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tabel_soal`
--
ALTER TABLE `tabel_soal`
  MODIFY `id_soal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
