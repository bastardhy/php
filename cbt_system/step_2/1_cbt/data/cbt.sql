-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Sep 2016 pada 13.05
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

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_soal`, `id_kategori`, `jawaban`, `id_session`, `id_user`, `hari`, `tanggal`) VALUES
(2, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(3, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(5, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(6, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(9, 1, 'A', '', 4, 'Minggu', '2016-09-04'),
(8, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(1, 2, 'C', '', 6, 'Minggu', '2015-11-15'),
(4, 2, 'D', '', 6, 'Minggu', '2015-11-15'),
(7, 2, 'A', '', 6, 'Minggu', '2015-11-15'),
(10, 2, 'C', '', 6, 'Minggu', '2015-11-15'),
(2, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(3, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(5, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(6, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(8, 1, 'B', '', 4, 'Minggu', '2016-09-04'),
(11, 3, 'A', '', 4, 'Minggu', '2016-09-04'),
(12, 3, 'B', '', 4, 'Minggu', '2016-09-04'),
(13, 3, 'B', '', 7, 'Senin', '2015-11-16'),
(14, 3, 'C', '', 7, 'Senin', '2015-11-16'),
(15, 3, 'B', '', 7, 'Senin', '2015-11-16'),
(16, 3, 'D', '', 7, 'Senin', '2015-11-16'),
(17, 3, 'C', '', 7, 'Senin', '2015-11-16'),
(18, 3, 'A', '', 7, 'Senin', '2015-11-16'),
(19, 3, 'A', '', 7, 'Senin', '2015-11-16'),
(20, 3, 'D', '', 7, 'Senin', '2015-11-16'),
(1, 2, 'C', '', 7, 'Senin', '2015-11-16'),
(4, 2, 'D', '', 7, 'Senin', '2015-11-16'),
(7, 2, 'A', '', 7, 'Senin', '2015-11-16'),
(10, 2, 'C', '', 7, 'Senin', '2015-11-16'),
(21, 2, 'C', '', 6, 'Senin', '2015-11-16'),
(9, 1, 'A', '', 4, 'Minggu', '2016-09-04'),
(12, 3, 'B', '', 4, 'Minggu', '2016-09-04'),
(13, 3, 'D', '', 4, 'Sabtu', '2016-09-03'),
(14, 3, 'D', '', 4, 'Sabtu', '2016-09-03'),
(15, 3, 'D', '', 4, 'Sabtu', '2016-09-03'),
(11, 3, 'A', '', 4, 'Minggu', '2016-09-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `id_user`) VALUES
(1, 'Bahasa Indonesia', 2),
(2, 'Matematika', 3),
(3, 'Bahasa Inggris', 5);

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
(1, 'Setting Menu', '', 'Y', 'A'),
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
(2, 'Menu Utama', '?module=menuutama', 1, 'Y'),
(1, 'Sub Menu', '?module=submenu', 1, 'Y'),
(13, 'Kategori Test', '?module=kategori', 11, 'Y');

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
(1, 2, 'Berapakah 1 + 5', '2', '16', '6', '61', 'C'),
(2, 1, 'Ibukota Republik Indonesia Adalah', 'Jakarta', 'Surabaya', 'Semarang', 'Jogjakarta', 'A'),
(3, 1, 'Darimanakah Team Real Madrid Berasal', 'Perancis', 'Pacitan', 'Jepang', 'Spanyol', 'D'),
(4, 2, 'Berapakah jumlah apel yang dimilki Budi, Siti, Joko jika satu orang memiliki 2 buah apel', '2', '4', '8', '6', 'D'),
(5, 1, 'Dibawah ini manakah makanan yang tidak mengandung Mie', 'Mie Ayam', 'Sate', 'Bakso', 'Mie Goreng', 'B'),
(6, 1, 'Siapakah Presiden RI Ke 6', 'Susilo Bambang Yudhoyono', 'Megawati', 'Jokowi', 'BJ. Habibie', 'A'),
(7, 2, 'Berapakah hasil perkalian 5 X 5 ?', '25', '20', '30', '24', 'A'),
(8, 1, 'Ibukota Provinsi Jawa Timur Adalah', 'Jakarta', 'Bali', 'Surabaya', 'Semarang', 'C'),
(9, 1, 'Buku yang disimpan dalam bentuk elektronik dan tidak menggunakan media kertas disebut?', 'PDF', 'E-Book', 'Buku Pintar', 'E-Mail', 'D'),
(10, 2, 'Bidang dengan memiliki tiga bidang sisi yang sama disebut', 'Segi Empat', 'Kubus', 'Segitiga Sama Sisi', 'Trapesium', 'C'),
(11, 3, 'Read the notice.\r\nSMOKING AREA\r\nThis notice means &hellip;...\r\n', 'This place is for those who do not smoke', 'This place is special for non-smokers', 'Smoking in this room is allowed', 'Smoking in this place is forbidden', 'B'),
(12, 3, '<p>\r\nListening To This Conversation;&nbsp;\r\n</p>\r\n<p>\r\nMr. Heru : It was such a good presentation. Who is she? \r\n</p>\r\n<p>\r\nMr. Budi  : That is my new secretary. \r\n</p>\r\n<p>\r\nMr. Heru : Tell me more about her. \r\n</p>\r\n<p>\r\nMr. Budi :  Well, she is not only smart but also &hellip; languages very well.\r\n</p>\r\n', 'Will speak', 'Has spoken', 'Can Speak', 'Is Speaking', 'C'),
(13, 3, 'Mother  : What are you looking for? \r\nLina      : Some food. I am starving. \r\nMother  : It is in the fridge. \r\nLina      : â€¦nothing left, mom.', 'There are', 'There is', 'There is not', 'There are not', 'A'),
(14, 3, 'Thera are many â€¦.. in the class', 'Student ', 'a Student', 'Students', 'Some Students', 'C'),
(15, 3, 'Dini   : How much, water do you need to water the flowers? \r\nPutra : Only someâ€¦My garden is not as large as yours.', 'glasses', 'pails', 'spoonfuls', 'pools', 'B'),
(16, 3, '<p>\r\nThis is Mr. Burhan&#39;s house. It is big, clean and comfortable. There is a garden in front of the house. There are some plants and flowers in the garden! There is a living room, a dining room, three bathrooms, a kitchen, two bedrooms and a garage. Mr. Burhan has some pets; a dog, a cat, and a parrot. Mr. Burhan take care of the pets very carefully\r\nIt is big, clean and <strong><u>comfortable. </u></strong>\r\n</p>\r\n<p>\r\nThe underlined word means&hellip;\r\n</p>\r\n', 'beautiful', 'unattractive', 'uninteresting', 'enjoyable', 'D'),
(17, 3, 'Mr. Burhan has some pets; a dog, a cat, and a parrot.\r\nThe word "pets" meansâ€¦......', 'tame animals', 'beautiful animals', 'favorite animals kept at home', 'tame animas kept at the zoo', 'C'),
(18, 3, '<p>\r\nSon     : Father, I have a sore throat. I cannot swallow the food.\r\n</p>\r\n<p>\r\nFather : Have you taken medicine?\r\n</p>\r\n<p>\r\nSon     : Yes but it doesn&#39;t get better.\r\n</p>\r\n<p>\r\nFather : Now you should go to a doctor.\r\n</p>\r\n<p>\r\nSon     : No, I am afraid of a doctor.\r\nFather : But why?\r\n</p>\r\n<p>\r\nSon     : I don&#39;t want to be injected.\r\n</p>\r\n<p>\r\nFather : But you have to.\r\nNow, ask Mother to take you to doctor.\r\n</p>\r\n<p>\r\nWhy can&#39;t the boy swallow the food?\r\n</p>\r\n', 'He has a sore throat.', 'His throat is bleeding.', 'He has a stomachache.', 'His Throat is closed.', 'A'),
(19, 3, 'Mr. Karno  : Do you ever come to school late?. \r\nAndri         : No, Sir. I never come to school late. \r\nMr. Karno  : That''s good. But how come? \r\nAndri         : Because I â€¦........... Go to school early.', 'always.', 'really.', 'seldom.', 'sometimes', 'A'),
(20, 3, 'It belongs to reptile; it uses its tail as weapon when it fights. It is originally from one of the island of the Indonesian Archipelago. People call its name the same as its place of origin. What animal is it?', 'Crocodile', 'Alligator', 'Python', 'Komodo', 'D'),
(21, 2, '<p>\r\n<img src="http://localhost./ppdb_online/user/editor/gambar/Image/icon-dollar-1.png" alt=" " width="219" height="219" />\r\n</p>\r\n<p>\r\nPerhatikan Gambar Di atas. Gambar tersebut merupakan ?&nbsp;\r\n</p>\r\n', 'Logo', 'Simbol', 'Icon', 'Mata Uang', 'D'),
(23, 1, '<p>\r\n<img src="http://localhost./ppdb_online/user/editor/gambar/Image/images.jpg" alt=" " width="312" height="161" />\r\n</p>\r\n<p>\r\nIni adalah Logo dari&nbsp;\r\n</p>\r\n', 'Apache', 'MySql', 'PBB', 'ASEAN', 'B');

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
('bkf2vjjk312dijlhkqetlaoib1', 'siswa1', 'e10adc3949ba59abbe56e057f20f883e', 'Yusuf Achsanul Azzam', 'Murid Kelas XI A', 'pnpm_slahung@yahoo.co.id', 4, 'siswa'),
('pgi4nm0fbife4avdfcs5nesre3', 'guru2', 'ee11cbb19052e40b07aac0ca060c23ee', 'Novi Kumalasari', 'Guru Matematika', 'aprintgoes82@gmail.com', 3, 'guru'),
('reo392mesu0e1r0oqtccom09h4', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Agus Hariyanto', 'Administrator', 'agus_pacitan@yahoo.co.id', 1, 'admin'),
('9ts86vj6phjhmb8af4s2fr52k1', 'guru1', 'e10adc3949ba59abbe56e057f20f883e', 'Wiwik Cendraningsih', 'Guru Bahasa Indonesia', 'imagomedia82@gmail.com', 2, 'guru'),
('23uldrjhic9l1005en1m3punt1', 'siswa2', 'ee11cbb19052e40b07aac0ca060c23ee', 'Nama Siswa', 'Siswa Kelas XII', 'a_printgoes@yahoo.com', 6, 'siswa'),
('g1ehooiifit1s6b8kieph3j0p3', 'guru3', 'ee11cbb19052e40b07aac0ca060c23ee', 'Lilek Indrawati', 'Guru Bahasa Inggris', '', 5, 'guru'),
('fhriso15cbkl26tclk6nbd5ia7', 'arumi', 'e10adc3949ba59abbe56e057f20f883e', 'Arumi Mizano', 'Siswa Kelas X', 'arumi_mizano@yahoo.co.id', 7, 'siswa');

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
  MODIFY `id_main` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_sub` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tabel_soal`
--
ALTER TABLE `tabel_soal`
  MODIFY `id_soal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
