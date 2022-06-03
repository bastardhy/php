-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2016 at 07:08 PM
-- Server version: 5.5.50-0+deb8u1
-- PHP Version: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_modul`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `teks` longtext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `teks`) VALUES
(1, 'Selamat datang di Modul 5');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`) VALUES
(1, 'Judul01 ', 'isi01'),
(2, 'Judul02', 'isi02'),
(3, 'Judul03 ', 'isi03'),
(4, 'Judul04 ', 'isi04'),
(5, 'Judul05', 'isi05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`) VALUES
(1, 'Tes Komentar');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE IF NOT EXISTS `penulis` (
`id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `f_name`, `l_name`) VALUES
(1, 'Ari ', 'Seno'),
(2, 'Fathul', 'Huda'),
(3, 'Andre', 'Giri'),
(4, 'David', 'Nurbian'),
(5, 'Selvi', 'Noviza');

-- --------------------------------------------------------

--
-- Table structure for table `table_attacker`
--

CREATE TABLE IF NOT EXISTS `table_attacker` (
`id` int(3) NOT NULL,
  `nama` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `table_attacker`
--

INSERT INTO `table_attacker` (`id`, `nama`, `tanggal`) VALUES
(1, 'EVA-00', '2017-11-25 00:00:00'),
(4, 'tomahawk', '2017-11-30 20:05:16'),
(2, 'aurel666', '2017-11-30 20:03:47'),
(3, 'pl4y312', '2017-11-30 20:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `table_berita`
--

CREATE TABLE IF NOT EXISTS `table_berita` (
`id` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `berita` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `counter` int(5) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `table_berita`
--

INSERT INTO `table_berita` (`id`, `judul`, `berita`, `tanggal`, `counter`) VALUES
(1, 'Trik Mengetik 10 Jari With Typer Shark', 'apakah anda pernah melihat film yang bertema "HACKING" seperti Track Down, Firewall , Die Hard 4 dan lain sebagainya. yang pemeran utamanya dapat mengetik super cepat tanpa melihat keyboard? apakah semua hacker wajib mengetik dengan 10 jari?\r\n\r\nMungkin bagi anda yang ingin bisa mengetik 10 jari seperti pada film yang saya sebutkan diatas, anda bisa mencoba sebuah game yang sangat membantu anda dalam mengetik 10 jari namanya "Typer Shark" game ini sangat seru sekali, teman saya sampai membanting keyboardnya karena kesal ga'' pernah menang.', '0000-00-00', 3),
(2, 'Selamat Hari Raya Idul Fitri 1428H', 'Ketika kamu lahir. semua orang tersenyum dan hanya kamu yang menangis, maka jalanilah hidup ini dengan rasa syukur dan isilah hidup mereka dengan senyum terindah mu, kelak ketika kamu meninggalkan dunia ini semua orang tidak akan menangis dan hanya kamu yang tersenyum....\r\n\r\n- MOHON MAAF LAHIR BATIN -', '0000-00-00', 2),
(3, 'Update Video October 2007', 'Sebelumnya saya mau mengucapkan "Minal Aizin Wal Faizin" Mohon maaf Lahir Batin, selamat hari raya idul fitri bagi seluruh umat islam yang menjalankan ibadah puasa semoga kita semua bisa bertemu kembali dengan bulan yang suci ini (amin).\r\n\r\nBerikut ini adalah daftar Video Metal pada awal bulan october\r\n\r\n* Foo Fighters ft. Serj Tankian - Holiday In Cambodia\r\n* Deathstar\r\n* Dimmu Borgir\r\n* Carcass - Corporal Jigsore Quandary\r\n* Grave - Unholly Terror (Live)\r\n* Moonfog - Coldness\r\n* Misery Index - Conquistaroes\r\n* Terasbetoni - Taivas lyo Tulta (live)\r\n* Mirzadeh - Tounelan Lasten Tansi\r\n* Avenged Sevenfold - Almost Easy (New Video)\r\n* Zykoln - Psyklon Aeon\r\n* Zuuln fx - Fight for the couse\r\n* Turisas - Rasputin (Live @ Metal Hammer 2007)\r\n* Suffocation - Syntetically Revived\r\n* Deicide - Scar of the Crucifix (Live)\r\n* Aborted - The Santification of Fornication (Live)\r\n* Childreen of Boddom - Everytime I Die\r\n* Megadeth - Kill the King (Live)\r\n* and more....\r\n\r\nSilahkan bermetal-metal ria...!!!', '0000-00-00', 2),
(4, 'About EVA-00', 'EVA-00 adalah seorang pecundang yang sedang mencoba mengembangkan bakat pecundangnya didunia maya ini, jadi kalau Anda pernah melihat artikel yang ia buat pada situs ini sedikit mirip dengan situs lain atau jika anda menganggap bahwa artikel murahannya ini milik orang lain, boleh - boleh aja!!! dia tidak akan rugi kok !!! \r\nJuga jika anda mengklaim bahwa artikel yang ia buat pada situs ini adalah milik anda, tidak masalah!!! dia juga tidak rugi apa-apa. Karena dia tidak butuh artikel milik siapa. yang ia inginkan artikel yang ada pada situs ini dapat dipakai secara bebas, gratis, dan terus dikembangkan thats all...<br><br>\r\n\r\n<center> keep explore your brain guys...</center>', '0000-00-00', 6),
(5, 'Awas! YouTube Palsu Sebar Virus', 'SAN FRANSISCO - Para pengguna internet kebanyakan telah mengetahui bahwa mendownload program komputer yang tidak diinginkan sangatlah diharamkan. Namun kali ini, penyebar virus menggunakan tampilan situs ternama untuk meyakinkan korbannya.\r\n\r\nDilansir melalui Associated Press, Jumat (10/10/2008), pencipta virus kali ini menggunakan replika situs YouTube, yang memiliki tampilan sama dengan aslinya, untuk meyakinkan sasarannya agar mau mengklik dan mendownload software yang ditawarkan. Langkah ini digunakan para penyebar virus agar para pengguna internet yakin bahwa software tersebut berasal dari sumber yang dipercaya.\r\n\r\nSeorang hacker berhasil membuat situs palsu YouTube tersebut dan menyebarkannya di dunia maya. Pengguna internet yang berhasil mendapatkan email tersebut akan disarankan untuk mengklik salah satu link YouTube, yang tentunya berisi sebuah konten video ''menarik''. Dari situ, saat pengguna mengklik video tersebut maka akan muncul pesan ''eror'' yang memberitahukan bahwa video tersebut tidak dapat ditampilkan karena permasalahan teknis. Untuk bisa menampilkan video tersebut maka korban disarankan untuk mendownload software dari sebuah link yang sudah terbenam oleh virus jahat.\r\n\r\nYang lebih jahat lagi, ketika komputer tersebut terinfeksi maka sang hacker dapat mengarahkan komputer korban secara jarak jauh dan otomatis untuk menampilkan video YouTube yang harus mereka lihat secara paksa.\r\n\r\n"Target korbannya sangat tepat ke sasaran dan hal ini sangat menakutkan bagi para pengguna internet karena anda dipaksa untuk melihat video yang tidak ingin anda lihat," ujar manajer riset dari perusahaan keamanan software Trend Micro Jamz Yaneza.\r\n\r\nUntuk menghindari hal semacam ini, pengguna internet dapat melihat perbedaan antara link YouTube asli dengan yang palsu. (srn)\r\n\r\nsumber : www.techno.okezone.com ', '2008-11-24', 2),
(6, 'Ubuntu Linux Hardy Heron 8.04', 'Washington, Sistem operasi Ubuntu Linux cukup populer di kalangan pemakai komputer. Selain gratis, pemakaiannya pun dinilai tak terlalu ribet.\r\n\r\nNamun kini selain pilihan download gratis di internet, konsumen yang berminat, khususnya di Amerika Serikat, bisa membeli paket box Ubuntu versi Hardy Heron 8.04 plus support, dengan banderol USD 20 di jaringan toko BestBuy. Apakah ini berarti lambat laun Ubuntu tidak akan cuma-cuma lagi?\r\n\r\nSejak pertama diluncurkan tahun 2004, Ubuntu memang bisa diunduh dan dipakai gratis. Namun seringkali konsumen kesulitan mengunduhnya, misalnya karena koneksi yang lamban. Ada juga masalah lain, contohnya saja konsumen susah mengoperasikannya.\r\n\r\nNah, alasan itulah yang dipakai Steve George, Direktur di Canonical Ltd yang mensponsori Ubuntu, untuk menjual paket Ubuntu tersebut. Konsumen yang membelinya dijanjikan akan mendapat support penuh selama 60 hari dan panduan pengoperasian.\r\n\r\n"Beberapa orang memang tahu bahwa Ubuntu gratis, namun mereka tidak punya bandwidth untuk mengunduhnya. Maka itu, penjualan ini adalah langkah mudah untuk mendapat Ubuntu," demikian tutur George seperti dikutip dari ComputerWorld, Jumat (11/7/2008).\r\n\r\nSebenarnya sejak 2006, juga sudah ada penawaran CD Ubuntu di toko online Amazon.com dengan harga USD 12. George menambahkan, mereka berencana untuk memperluas penjualan box Ubuntu ini ke jaringan toko yang lain. Semua itu dilakukan dengan alasan untuk menjangkau lebih banyak konsumen. (kilasberita.com/dtc)', '2008-11-24', 2),
(7, 'Report Pindah Hosting', 'Berhubung situs exploreyourbrain sering mengalami gangguan/tidak di bisa di akses, lambat, dll, maka kami putuskan untuk memindahkan server kami. dan alhasil sekarang kami sudah memindahkannya, imbas proses perpindahan server salah satunya ada beberapa thread/posting dari beberapa member yang hilang khususnya posting dari tanggal 6/10/2008 22:00 s/d 7/10/2008 00.00\r\n\r\nJadi jika ada beberapa member yg merasa threadnya hilang harap di post kembali. ', '2008-11-24', 3),
(9, 'Free eBook "Panduan Singkat', 'Forum adalah tempat yang bagus untuk berinteraksi, diskusi, sharing dan saling bertukar informasi. tapi bagaimanakan cara menggunakan forum??? ternyata masih banyak member forum yang belum bisa menggunakannya, bagaimana cara membuat thread? menyisipkan gambar? link? pertanyaan saya kenapa tidak di jawab? kenapa Account saya di banned? dan masih banyak lagi segundang pertanyaan lainnya. yang mungkin bisa terjawab melalui eBook ini. buat semua member exploreyourbrain.org harap baca ebook ini terlebih dahulu.', '0000-00-00', 33),
(10, 'Pendiri GNU: Jauhi Cloud', 'Menurut Richard Stallman, pendiri Free Software Foundation dan pencipta sistem operasi GNU mengatakan penggunaan aplikasi berbasis web seperti Gmail dari Google "lebih parah dari kebodohan." Cloud computing yang semakin populer dalam beberapa tahun belakangan ini adalah paradigma komputasi yang dipromosikan berbagai perusahaan teknologi besar termasuk Google, Microsoft dan Amazon.', '2008-11-24', 2),
(11, 'Merek Yang Paling Berpengaruh', 'Brand name atau nama merek paling terkenal dan memiliki nilai aset  paling tinggi biasanya terkait dengan produk populer. Tetapi pertama kali merek di dunia maya masuk dalam 10 nama merek terkenal dari 100 merek lainnya. Google salah satu perusahaan pencarian data di Internet telah masuk rangking 10. Disusul Amazon.com, eBay dan Yahoo. (Interland / obengware)', '0000-00-00', 2),
(14, 'Cara Buat Screenshoot Dari Video Menggunakan K-Lite', 'Kadang teman saya sering bertanya, "video yg ada di xyb kan ada sreenshootnya tuh, itu cara buatna gimana???'' hmmm sepertinya ini bagus jika dibuat artikel dan akhirnya di malam minggu yang ceria ini saya ada waktu untuk membuatnya. ok lets start for tutoring.\r\n<br>\r\nPertama yang harus anda butuhkan untuk membuat screenshoot adalah applikasi K-Lite Mega Codec (all version) yang bisa anda download di www.free-codecs.com jika koneksi internet anda lambat anda bisa mendownloadnya di situs www.exploreyourbrain.org yang diupload oleh faisal_malmsteen\r\n\r\nSetelah senjata tempur sudah disiapkan saatnya berperang, install applikasi tersebut setelah applikasinya tampil pilih View - Option akan tampil menu dibawah ini\r\n\r\nCapture Videos\r\n\r\nPilih Playback - Output lalu VMR7 (windowed) atau VMR9 (windowed) kenapa harus memilih menu ini?? karna VMR7/9 (windowed) mampu me-render video dalam bentuk 2D. setelah memilih menu tersebut klik OK dan buka video yang akan di ambil screenshootnya. oia videonya jangan di play biarkan dalam keadaan stop. setelah itu pilih File - Save Thumbnails akan tampil menu dibawah ini\r\n\r\nCapture Videos\r\n\r\nAkan saya jelaskan sedikit tentang apa yang harus anda setting. Thumbnails digunakan untuk menentukan berapa jumlah gambar yang akan di ambil pada gambar diatas saya men-settingnya 4 rows x 4 columns, dan ukuran yang menurut saya pas adalah 600 pixels yang tidak terlalu besar dan tidak terlalu memakan size yang banyak btw jangan lupa di klik save dan jangan heran jika videonya bergerak sendiri dan salah satu rekan saya bilang "videonya kok jadi ngelag yah..." hohoho sabar karna proses capturing sedang berlangsung dan jika sudah selesai hasilnya bisa anda lihat dibawah ini.\r\n\r\nJennifer Rostock\r\n\r\nCaranya gampang kan, hehehehhe happy capturing yah.', '0000-00-00', 5),
(15, 'About XYB..!!!', 'Kami adalah seorang pecundang yang sedang mencoba mengembangkan bakat pecundangnya didunia maya ini, jadi kalau Anda pernah melihat artikel yang ada pada situs ini sedikit mirip dengan situs lain atau jika anda menganggap bahwa artikel murahan kami ini milik orang lain, boleh - boleh aja!!! kami ga'' akan rugi kok !!! \r\n<br>\r\nJuga jika anda mengklaim bahwa artikel yang kami buat pada situs ini adalah milik anda, tidak masalah!!! kami juga tidak rugi apa-apa. Karena kami tidak butuh artikel milik siapa. yang saya inginkan artikel yang ada pada situs ini dapat dipakai secara bebas, gratis, dan terus dikembangkan thats all..', '2008-11-26', 11);

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE IF NOT EXISTS `table_user` (
  `user_id` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password_id` char(75) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `password_id`) VALUES
('admin', '202cb962ac59075b964b07152d234b70'),
('EVA-00', 'b6fbf149ce685b6bee947804f6a164d6'),
('leah_dizon', 'd41f4a8e7079772efb2ae6413451b8f6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `disabled` int(11) NOT NULL,
  `attempts` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `disabled`, `attempts`) VALUES
(1, 'west', 'test', 0, 0),
(2, 'john', 'john123', 0, 0),
(3, 'doe', 'doe123', 0, 0),
(4, 'admin', 'test', 0, 0),
(7, 'hack', 'hack', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_attacker`
--
ALTER TABLE `table_attacker`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_berita`
--
ALTER TABLE `table_berita`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `login` (`login`,`pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `table_attacker`
--
ALTER TABLE `table_attacker`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `table_berita`
--
ALTER TABLE `table_berita`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
