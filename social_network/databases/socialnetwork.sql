-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04. Agustus 2017 jam 10:52
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `idkomentar` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tglkomentar` datetime NOT NULL,
  PRIMARY KEY (`idkomentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `iduser`, `idstatus`, `komentar`, `tglkomentar`) VALUES
(10, 7, 12, '', '2017-08-04 09:22:03'),
(11, 7, 11, 'hai juga', '2017-08-04 09:22:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `idpesan` int(11) NOT NULL AUTO_INCREMENT,
  `iduserdari` int(11) NOT NULL,
  `iduserke` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tglkirimpesan` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sudahdibaca` char(1) NOT NULL DEFAULT 'B',
  PRIMARY KEY (`idpesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `pesan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `status` text NOT NULL,
  `tglposting` datetime NOT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`idstatus`, `iduser`, `status`, `tglposting`) VALUES
(11, 6, 'hai', '2017-08-04 09:19:53'),
(12, 7, '', '2017-08-04 09:21:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `namalengkap` varchar(50) DEFAULT NULL,
  `panggilan` varchar(15) DEFAULT NULL,
  `tmplahir` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `tgllahir` date NOT NULL DEFAULT '0000-00-00',
  `jk` char(1) NOT NULL,
  `alamat` text,
  `nohp` varchar(15) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `foto` text,
  `status` varchar(30) DEFAULT NULL,
  `hobi` varchar(50) DEFAULT NULL,
  `aboutme` text,
  `tgldaftar` datetime DEFAULT '0000-00-00 00:00:00',
  `online` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `namalengkap`, `panggilan`, `tmplahir`, `email`, `tgllahir`, `jk`, `alamat`, `nohp`, `website`, `foto`, `status`, `hobi`, `aboutme`, `tgldaftar`, `online`) VALUES
(6, 'surya', 'surya', 'surya febrianto mukni', 'surya', 'pariaman', 'suryamukni7@gmail.com', '1994-02-06', 'L', 'pariaman\r\npariaman', '081261660194', 'ajopiaman.esy.es', NULL, 'Belum Menikah', 'coding', '', '2017-08-04 09:16:51', 'N'),
(7, 'mukni', 'mukni', NULL, NULL, NULL, 'mm@yahoo.com', '1995-01-01', 'P', NULL, NULL, NULL, '2474529_20140306044908.jpg', NULL, NULL, NULL, '2017-08-04 09:20:26', 'Y');
