-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Waktu pembuatan: 23. April 2012 jam 09:48
-- Versi Server: 5.0.51
-- Versi PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `bookdb`
-- 

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `biaya_kirim`
-- 

CREATE TABLE `biaya_kirim` (
  `id_kota` int(11) NOT NULL auto_increment,
  `nama_kota` varchar(30) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY  (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- Dumping data untuk tabel `biaya_kirim`
-- 

INSERT INTO `biaya_kirim` VALUES (1, 'Denpasar', 16000);
INSERT INTO `biaya_kirim` VALUES (2, 'Semarang', 12000);
INSERT INTO `biaya_kirim` VALUES (3, 'Bandung', 14000);
INSERT INTO `biaya_kirim` VALUES (4, 'Jakarta', 10000);
INSERT INTO `biaya_kirim` VALUES (6, 'Ambon', 39000);
INSERT INTO `biaya_kirim` VALUES (7, 'Jayapura', 60000);
INSERT INTO `biaya_kirim` VALUES (8, 'Medan', 21000);
INSERT INTO `biaya_kirim` VALUES (9, 'Pekan Baru', 19000);
INSERT INTO `biaya_kirim` VALUES (10, 'Malang', 9000);
INSERT INTO `biaya_kirim` VALUES (11, 'Pontianak', 20000);
INSERT INTO `biaya_kirim` VALUES (12, 'Balikpapan', 28000);
INSERT INTO `biaya_kirim` VALUES (13, 'Samarinda', 31500);
INSERT INTO `biaya_kirim` VALUES (14, 'Sumbawa', 31500);
INSERT INTO `biaya_kirim` VALUES (15, 'Surabaya', 17000);
INSERT INTO `biaya_kirim` VALUES (16, 'cilacap', 2000);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `buku`
-- 

CREATE TABLE `buku` (
  `kd_buku` varchar(6) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `kd_kategori` varchar(6) NOT NULL,
  `kd_penerbit` varchar(6) NOT NULL,
  `harga` int(11) NOT NULL,
  `cover` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY  (`kd_buku`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `buku`
-- 

INSERT INTO `buku` VALUES ('B0001', 'Pemrograman PHP untuk Pemula', 'Kasiman Peranginangin', 'K01', 'P01', 20000, 'aplikasi-web-dengan-php-mysql.', 'PHP merupakan bahasa pemrograman web yang didesain khusus untuk membuat halaman web. PHP merupakan perangkat lunak yang bersifat open source dan bisa diperoleh gratis serta didistribusikan secara bebas. PHP juga memiliki kelebihan-kelebihan dibandingkan bahasa sejenis, seperti CGI dan Perl.\r\n\r\nDalam buku ini dijelaskan pemrograman web menggunakan PHP dengan database MySQL yang dapat dijadikan referensi untuk mempelajari PHP secara umum. Penjelasan yang diberikan cukup mudah dimengerti disertai contoh-contoh script yang telah diuji-coba di lingkungan server web Windows.\r\n\r\nBuku ini ditujukan bagi Anda yang ingin mempelajari dasar pemrograman web menggunakan PHP dengan database MySQL. ');
INSERT INTO `buku` VALUES ('B0002', 'Jaringan komputer ', 'Candra', 'K04', 'P02', 100000, 'jar_kom_2008.gif', 'buku tentang jaringan komputer, membahas tentang TCP IP, Mikrotik, Cisco dan penerapannya di lapangan. Sangat cocok di pakai oleh admin jaringan atau mahasiswa ');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `customer`
-- 

CREATE TABLE `customer` (
  `kd_pemesan` varchar(20) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `kd_pos` char(5) NOT NULL,
  `No_telp` varchar(12) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kd_pesan` varchar(6) NOT NULL,
  PRIMARY KEY  (`kd_pemesan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data untuk tabel `customer`
-- 

INSERT INTO `customer` VALUES ('C001', 'candra', 'candra', '1234', '1234', 'can@gmail.com', 6, 'P001');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `det_pesan`
-- 

CREATE TABLE `det_pesan` (
  `no_det_pesan` int(4) NOT NULL auto_increment,
  `no_pesan` varchar(20) NOT NULL,
  `kd_buku` varchar(6) NOT NULL,
  `total_pesan` int(11) NOT NULL,
  PRIMARY KEY  (`no_det_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data untuk tabel `det_pesan`
-- 

INSERT INTO `det_pesan` VALUES (1, 'P001', 'B0002', 1);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `kategori`
-- 

CREATE TABLE `kategori` (
  `kd_kategori` char(4) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL,
  PRIMARY KEY  (`kd_kategori`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data untuk tabel `kategori`
-- 

INSERT INTO `kategori` VALUES ('K01', 'PHP');
INSERT INTO `kategori` VALUES ('K02', 'MySQL');
INSERT INTO `kategori` VALUES ('K03', 'Multimedia');
INSERT INTO `kategori` VALUES ('K04', 'Jaringan');
INSERT INTO `kategori` VALUES ('K05', 'Linux');
INSERT INTO `kategori` VALUES ('K06', 'Apple');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `pembayaran`
-- 

CREATE TABLE `pembayaran` (
  `no` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kd_pesan` varchar(20) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` enum('sudah','belum') NOT NULL default 'belum'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data untuk tabel `pembayaran`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `penerbit`
-- 

CREATE TABLE `penerbit` (
  `kd_penerbit` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  PRIMARY KEY  (`kd_penerbit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `penerbit`
-- 

INSERT INTO `penerbit` VALUES ('P01', 'Andi', 'Jl Beo 123', '123456', 'andi@gmail.com', 'http://www.andipublisher.com');
INSERT INTO `penerbit` VALUES ('P02', 'Lokomedia', 'Jl janti', '123434', 'asal@gmail.com', 'lokomedia.com');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `pengelola`
-- 

CREATE TABLE `pengelola` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data untuk tabel `pengelola`
-- 

INSERT INTO `pengelola` VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `pengelola` VALUES ('candra', '2614ae3c375c3095dc536283672548bd');
INSERT INTO `pengelola` VALUES ('tes', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `pesan`
-- 

CREATE TABLE `pesan` (
  `kd_pesan` varchar(30) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  PRIMARY KEY  (`kd_pesan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data untuk tabel `pesan`
-- 

INSERT INTO `pesan` VALUES ('P001', '2012-04-13 20:59:58', 100000);
