-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2015 at 09:57 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mini_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_soal` int(5) NOT NULL,
  `jawaban` enum('A','B','C','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_soal`, `jawaban`) VALUES
(1, 'C'),
(2, 'A'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_soal`
--

CREATE TABLE IF NOT EXISTS `tabel_soal` (
  `id_soal` int(4) NOT NULL AUTO_INCREMENT,
  `id_test` int(5) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `pilihan_a` varchar(100) NOT NULL,
  `pilihan_b` varchar(100) NOT NULL,
  `pilihan_c` varchar(100) NOT NULL,
  `pilihan_d` varchar(100) NOT NULL,
  `jawaban_benar` enum('A','B','C','D') NOT NULL,
  `publish` enum('yes','no') NOT NULL,
  `tipe` int(2) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tabel_soal`
--

INSERT INTO `tabel_soal` (`id_soal`, `id_test`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban_benar`, `publish`, `tipe`) VALUES
(1, 1, 'Berapakah 1 + 5', '2', '20', '6', '7', 'C', 'yes', 1),
(2, 1, 'Ibukota Republik Indonesia Adalah', 'Jakarta', 'Surabaya', 'Semarang', 'Jogjakarta', 'A', 'yes', 1),
(3, 1, 'Darimanakah Team Real Madrid Berasal', 'Perancis', 'Pacitan', 'Jepang', 'Spanyol', 'D', 'yes', 1),
(4, 1, 'Dibawah ini Manakah Yang Termasuk Hewan Karnivora', 'Ayam', 'Harimau', 'Kelinci', 'Kodok', 'B', 'yes', 1),
(5, 1, 'Dibawah ini manakah makanan yang tidak mengandung Mie', 'Mie Ayam', 'Sate', 'Bakso', 'Mie Goreng', 'B', 'yes', 1),
(6, 1, 'Siapakah Presiden RI Ke 6', 'Susiolo Bambang Yudhoyono', 'Megawati', 'Jokowi', 'BJ. Habibie', 'A', 'yes', 1),
(7, 1, 'Alat Musik dibawah ini Bisa Dimainkan Tanpa Listrik', 'Organ', 'Gitar Listrik', 'Drum', 'Siera', 'C', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(5) NOT NULL AUTO_INCREMENT,
  `nama_test` varchar(200) NOT NULL,
  `tgl_test` date NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_test`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `nama_test`, `tgl_test`, `status`) VALUES
(1, 'Bahasa Indonesia Semester 1', '2015-10-31', 'Y'),
(2, 'Matematika Aljabar', '2015-10-31', 'Y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
