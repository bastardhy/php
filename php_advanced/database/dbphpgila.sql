-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2017 at 08:28 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbphpgila`
--

-- --------------------------------------------------------

--
-- Table structure for table `as_members`
--

CREATE TABLE IF NOT EXISTS `as_members` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jk` char(1) NOT NULL,
  `biografi` text NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `as_members`
--

INSERT INTO `as_members` (`id_member`, `nama_lengkap`, `alamat`, `telepon`, `jk`, `biografi`, `email`) VALUES
(14, 'AGUS SAPUTRA', 'GTC LT. 2 NO. 7, JL. DR. CIPTO MANGUNKUSUMO NO. 1 CIREBON', '08562121141', 'L', 'AGUS SAPUTRA ADALAH CEO ASFA SOLUTION', 'takehikoboyz@gmail.com'),
(15, 'FENI AGUSTIN', 'GTC LT. 2 NO. 7, JL. DR. CIPTO MANGUNKUSUMO NO. 1 CIREBON', '089XXX', 'P', 'FENI AGUSTIN ADALAH COO ASFA SOLUTION', 'felicia.feni@gmail.com'),
(16, 'HADI SETIAWAN', 'GTC LT. 2 NO. 7, JL. DR. CIPTO MANGUNKUSUMO NO. 1 CIREBON', '081XXX', 'L', 'HADI SETIAWAN ADALAH OPR MANAGER ASFA SOLUTION', ''),
(17, 'DANIEL PUT RAHMANTO', 'GTC LT. 2 NO. 7, JL. DR. CIPTO MANGUNKUSUMO NO. 1 CIREBON', '081XXX', 'L', 'DANIEL ADALAH LEAD DESIGNER ASFA SOLUTION', ''),
(18, 'ANTHONIUS SUHARTA', 'GTC LT. 2 NO. 7, JL. DR. CIPTO MANGUNKUSUMO NO. 1 CIREBON', '089XXX', 'L', 'ANTHONIUS ADALAH QA ASFA SOLUTION', ''),
(19, 'YOHANA FR', 'GTC LT. 2 NO. 7, JL. DR. CIPTO MANGUNKUSUMO NO. 1 CIREBON', '089XXX', 'P', 'YOHANA ADALAH STAFF ASFA SOLUTION', ''),
(20, 'ASEP K', 'GTC LT. 2 NO. 7, JL. DR. CIPTO MANGUNKUSUMO NO. 1 CIREBON', '-', 'L', 'ASEP ADALAH BAG. GUDANG ASFA SOLUTION', ''),
(21, 'CHRISTIAN W', 'GTC LT. 2 NO. 7, JL. DR. CIPTO MANGUNKUSUMO NO. 1 CIREBON', '-', 'L', 'CHRISTIAN ADALAH MARKETING ASFA SOLUTION', ''),
(23, 'ANITA SESAR RIA', 'CIREBON', '-', 'P', 'ANITA SESAR RIA ADALAH PENULIS DI ASFA SOLUTION', ''),
(24, 'YENDA PURBADIAN', '-', '-', 'L', 'YENDA PURBADIAN ADALAH PENULIS DI ASFA SOLUTION', ''),
(25, 'ROHI ABDULLOH', 'TEGAL', '-', 'L', 'ROHI ABDULLOH ADALAH PENULIS DI ASFA SOLUTION', ''),
(26, 'AKHMAD DHARMA KASMAN', 'JAKARTA', '-', 'L', 'AKHMAD DHARMA KASMAN ADALAH PENULIS DI ASFA SOLUTION', ''),
(27, 'SOFYAN MAULANA', 'CIREBON', '-', 'L', 'SOFYAN MAULANA ADALAH PENULIS DI ASFA SOLUTION', ''),
(28, 'STEVE MARDIANTO', 'CIREBON', '-', 'L', 'STEVE MARDIANTO ADALAH PENULIS DI ASFA SOLUTION', ''),
(29, 'DANIEL PUTRA', 'CIREBON', '-', 'L', 'DANIEL PUTRA ADALAH PENULIS DI ASFA SOLUTION', ''),
(30, 'DONI ANDRIANSYAH', 'JAKARTA', '-', 'L', 'DONI ANDRIANSYAH ADALAH PENULIS DI ASFA SOLUTION', ''),
(31, 'HADI SETIAWAN', 'CIREBON', '-', 'L', 'HADI SETIAWAN ADALAH PENULIS DI ASFA SOLUTION', ''),
(32, 'IVAN SUSANTO', 'CIREBON', '-', 'L', 'IVAN SUSANTO ADALAH PENULIS DI ASFA SOLUTION', '');

-- --------------------------------------------------------

--
-- Table structure for table `as_payments`
--

CREATE TABLE IF NOT EXISTS `as_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `as_products`
--

CREATE TABLE IF NOT EXISTS `as_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `as_products`
--

INSERT INTO `as_products` (`id`, `name`, `image`, `price`, `status`) VALUES
(1, 'PHP Gila! Trik Dahsyat Menjadi Master PHP', '1.jpg', 73.00, 1),
(2, 'Framework Codeigniter 3; Membangun Aplikasi Penggajian untuk Panduan Skripsi', '2.jpg', 50.00, 1),
(3, 'Amazing Project; Aplikasi Ujian Online Full Ajax', '3.jpg', 55.00, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
