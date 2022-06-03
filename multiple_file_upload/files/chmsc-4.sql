-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2016 at 06:42 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chmsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_user` varchar(30) NOT NULL,
  `admin_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_rank`
--

CREATE TABLE `tbl_academic_rank` (
  `rank_id` int(3) NOT NULL,
  `rank_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic_rank`
--

INSERT INTO `tbl_academic_rank` (`rank_id`, `rank_name`) VALUES
(1, 'Instructor I'),
(2, 'Instructor II'),
(3, 'Instructor III'),
(9, 'Assistant Professor I'),
(10, 'Assistant Professor II'),
(11, 'Assistant Professor III'),
(12, 'Assistant Professor IV'),
(13, 'Associate Professor II'),
(14, 'Associate Professor I'),
(15, 'Associate Professor III'),
(16, 'Associate Professor IV'),
(17, 'Associate Professor V'),
(18, 'Professor I'),
(19, 'Professor II'),
(20, 'Professor III'),
(21, 'Professor IV'),
(22, 'Professor V'),
(23, 'Professor VI'),
(24, 'Professor VII'),
(26, 'Professor VIII');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(3) NOT NULL,
  `dept_name` char(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `dept_name`) VALUES
(1, 'GASS'),
(2, 'College of Education'),
(3, 'School of Arts and Science'),
(4, 'College of Industrial Technology'),
(5, 'Institute of Industrial Technology'),
(6, 'College of Business Management and Accountancy'),
(7, 'College of Fisheries');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(7) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `per_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `file_name`, `per_id`) VALUES
(12, 'uploads/5.png', 37),
(13, 'uploads/profile1.png', 44),
(14, 'uploads/friendlist.png', 35),
(15, 'uploads/12.png', 31),
(16, 'uploads/add.png', 40),
(17, 'uploads/photos.png', 42),
(18, 'uploads/profile.png', 43),
(19, 'uploads/2.png', 36),
(20, 'photos.png', 31),
(21, 'Koala.jpg', 31),
(22, 'uploads/Koala.jpg', 31),
(23, 'uploads/Hydrangeas.jpg', 31),
(24, 'uploads/Chrysanthemum.jpg', 37),
(25, 'Lighthouse.jpg', 31),
(26, 'uploads/Jquery DataTable  Bootstrap Based Admin Template - Material Design (1).pdf', 31),
(27, '14081247_565851626956925_165652390_n.jpg', 42),
(28, 'FlowchartApplication 2.docx', 31),
(29, 'FlowchartApplication 2.docx', 51),
(30, '14088754_565851493623605_1363409325_n.jpg', 31),
(31, 'uploads/Default.htm', 54);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `per_id` int(6) NOT NULL,
  `per_firstname` char(20) NOT NULL,
  `per_middlename` char(20) NOT NULL,
  `per_lastname` char(20) NOT NULL,
  `per_suffix` char(2) NOT NULL,
  `pos_id` int(3) NOT NULL,
  `per_gender` char(6) NOT NULL,
  `per_status` char(8) NOT NULL,
  `per_address` varchar(150) NOT NULL,
  `per_date_of_birth` date NOT NULL,
  `per_place_of_birth` varchar(150) NOT NULL,
  `per_date_of_original_appointment` date NOT NULL,
  `per_eligibility` varchar(20) NOT NULL,
  `per_campus` char(14) NOT NULL,
  `dept_id` int(3) NOT NULL,
  `per_designation` varchar(50) NOT NULL,
  `per_tin_no` varchar(20) NOT NULL,
  `per_gsis_bp_no` varchar(15) NOT NULL,
  `per_pagibig_no` varchar(14) NOT NULL,
  `per_plantilla_no` int(25) NOT NULL,
  `promote_id` int(5) NOT NULL,
  `per_contact_no` varchar(20) NOT NULL,
  `rank_id` int(3) NOT NULL,
  `bs_name` varchar(50) NOT NULL,
  `bs_year` year(4) NOT NULL,
  `bs_school` varchar(50) NOT NULL,
  `ms_name` varchar(50) NOT NULL,
  `ms_year` year(4) NOT NULL,
  `ms_school` varchar(50) NOT NULL,
  `dr_name` varchar(50) NOT NULL,
  `dr_year` year(4) NOT NULL,
  `dr_school` varchar(50) NOT NULL,
  `other_degree` varchar(50) NOT NULL,
  `per_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_personnel`
--

INSERT INTO `tbl_personnel` (`per_id`, `per_firstname`, `per_middlename`, `per_lastname`, `per_suffix`, `pos_id`, `per_gender`, `per_status`, `per_address`, `per_date_of_birth`, `per_place_of_birth`, `per_date_of_original_appointment`, `per_eligibility`, `per_campus`, `dept_id`, `per_designation`, `per_tin_no`, `per_gsis_bp_no`, `per_pagibig_no`, `per_plantilla_no`, `promote_id`, `per_contact_no`, `rank_id`, `bs_name`, `bs_year`, `bs_school`, `ms_name`, `ms_year`, `ms_school`, `dr_name`, `dr_year`, `dr_school`, `other_degree`, `per_image`) VALUES
(31, 'Eric John', 'Pedojan', 'Dela Cruz', 'Jr', 3, 'Male', 'single', 'somewhere', '1995-07-15', 'cebu', '2015-10-05', '4321', 'Binalbagan', 7, 'Full Time', '312-312-312', '123-123-213', '131-231-231', 987, 0, '', 1, 'BS Information System', 2017, 'CHMSC', '', 0000, '', '', 0000, '', '', 'uploads/'),
(32, 'Joven', 'Celiz', 'Diojoy', '', 3, 'male', 'Widow', 'Talisay City', '1963-11-04', 'their here ', '2015-11-09', '12345', 'Alijis', 5, 'Part Time', '123-123-123', '321-311-111', '122-222-222', 123, 0, '+63 (123) 1234-56-78', 1, 'BS Information System', 0000, '', '', 0000, '', '', 0000, '', '', 'uploads/'),
(34, 'Jomar', 'Salinas', 'Artista', '', 5, 'Female', 'Married', 'Silay City', '1960-12-12', 'land of nothing', '1995-03-08', '', 'Fortune Towne', 6, 'Job Order', '123-133-123', '3213-1111-1111-', '1222-2222-2222', 123, 0, '+63 (111) 111-11-11', 2, '', 0000, '', '', 0000, '', '', 0000, '', '', 'uploads/Hydrangeas.jpg'),
(35, 'Reah', 'Lustre', 'Regalado', '', 4, 'Female', 'Married', '', '2000-01-22', '3123123', '2015-11-15', '', 'Binalbagan', 7, 'Part Time', '12312312', '321312', '3123123', 3213213, 0, '3123123', 4, '', 0000, '', '', 0000, '', '', 0000, '', '', ''),
(36, 'Clint Art', 'Articulo', 'Valenzuela', '', 1, 'Male', 'Married', 'Talisay City', '2000-03-23', '3123123', '2015-11-20', '', 'Binalbagan', 2, 'Part Time', '123-46_-___', '321-312-123', '312-312-331', 1, 0, '', 9, '', 0000, '', '', 0000, '', '', 0000, '', '', ''),
(37, 'Paul Khristian', 'Padilla', 'Diavarro', '', 15, 'Male', 'Single', 'Bacolod City', '1937-11-04', 'adaslkdsalkd', '2015-10-02', '', 'Alijis', 3, 'Full Time', '034-304-0__', '432-040-123', '340-324-032', 201303123, 0, '+12 (302) 130-23-11', 3, '', 0000, '', '', 0000, '', '', 0000, '', '', ''),
(40, 'Aira Mae', 'Curtis', 'ROjo', '', 1, 'Female', 'Married', '', '2000-03-12', 'EQEQ', '2015-11-09', '', 'Fortune Towne', 3, 'Part Time', '312-312-313', '312-321-321', '313-123-131', 12334, 0, '+13 (123) 123-13-13', 19, '', 0000, '', '', 0000, '', '', 0000, '', '', ''),
(42, 'Jake Aaron', 'Revilla', 'Cordero', '', 1, 'Male', 'Widow', 'Talisay City', '1958-06-23', 'just their', '2014-04-12', '', 'Talisay', 5, 'Staff', '212-232-232', '123-121-321', '122-222-222', 123, 0, '', 16, '', 0000, '', '', 0000, '', '', 0000, '', '', 'uploads/Penguins.jpg'),
(43, 'Katrin', 'Grajo', 'Pasco', '', 3, 'Female', 'Married', '', '2000-03-04', 'anywhere', '2015-11-21', '', 'Talisay', 6, 'Full Time', '098-763-232', '987-654-323', '987-654-434', 87654, 0, '+63 (123) 131-31-31', 17, '', 0000, '', '', 0000, '', '', 0000, '', '', ''),
(44, 'Nicole', 'Kuri', 'Vargas', '', 2, 'Female', 'Married', '', '1956-02-29', 'slkflsdkfkl', '2015-11-28', '', 'Binalbagan', 7, 'Staff', '449349', '0940430-', '992034098439', 0, 0, '9329084092', 23, '', 0000, '', '', 0000, '', '', 0000, '', '', ''),
(45, 'Amira', 'Smith', 'Demavivas', '', 1, 'Female', 'Widow', '', '1943-11-16', 'lakalskdasldk', '2015-05-16', '', 'Binalbagan', 3, 'Full Time', '094023409', '3213-1111-1111-', '1222-2222-2222', 31231, 0, '+63 (111) 111-11-11', 14, '', 0000, '', '', 0000, '', '', 0000, '', '', ''),
(46, 'Kim', 'Valiao', 'Mongcal', '', 5, 'Female', 'Widow', 'Talisay City', '1975-11-04', '', '2015-11-05', '', '', 2, '', '', '', '', 0, 0, '', 10, '', 2014, ';laS;LA', '', 0000, '', '', 0000, '', '', ''),
(47, 'Angelica', 'Gil', 'Dorado', '', 1, 'Female', 'Single', 'qrqwerqio', '1960-04-14', 'earth', '2015-11-05', '', 'Talisay', 3, 'Staff', '432033', '138319', '318923', 43824, 0, '1298012301', 13, 'test', 0000, 'sdlkjfflkj', 'lwerwi', 0000, 'lkadljad', '', 2014, 'oraporpsaopd', 'jdasdlkasld', 'uploads/'),
(48, 'Arnela Mae', 'Bosh', 'Mesa', '', 2, 'Femal', 'Married', 'test1', '1930-12-12', 'test1', '2015-06-12', '', 'Binalbagan', 3, 'Full Time', '391239', '83188', '127373', 1231209312, 0, '12392838313', 8, 'test 2', 2014, 'test1', 'test1', 2015, 'test1', 'test1', 2016, 'test1', 'test1', ''),
(49, 'Eduardo', 'Perfect', 'Lascona', '', 2, 'Male', 'Single', 'test2', '1941-11-04', 'test2', '2015-11-05', '', 'Binalbagan', 5, '6', '3123-1312_', '12312-13213-132', '923-048-320', 31231, 0, '+63 (111) 111-11-11', 5, 'test 1', 0000, 'test2', 'test2', 0000, 'test2', 'test2', 2016, 'test2', 'test2', ''),
(50, 'Kimberly', 'Soberano', 'Barbasa', '', 1, 'Female', 'Married', 'test2', '1938-01-30', 'test2', '2014-09-17', '', 'Binalbagan', 6, '6', '3123-1312_', '12312-13213-132', '923-048-320', 31231, 0, '+63 (111) 111-11-11', 11, 'test 3', 0000, 'test2', 'test2', 0000, 'test2', 'test2', 2016, 'test2', 'test2', ''),
(51, 'Cheska', 'Sorolla', 'Aposaga', '', 5, 'Female', 'Married', 'test3', '2000-01-22', 'test3', '2015-08-22', '', 'Binalbagan', 7, '6', '31231', '3213-1111-1111-', '1222-222', 31231, 0, '+32 (131) 313-13', 18, 'test 4', 2014, 'test3', 'test3', 2015, 'test3', 'test3', 2016, 'test3', 'test3', ''),
(52, 'Rasel', 'Patriarca', 'Tijing', '', 10, 'Female', 'Widow', 'Talisay City', '1950-12-23', '', '2002-12-09', '', '', 2, '', '', '', '', 0, 0, '', 26, '', 0000, '', '', 0000, '', '', 0000, '', '', ''),
(53, 'Axel', 'Reid', 'De Asis', '', 5, 'Female', 'Single', 'test4', '2000-03-03', 'anywhere', '2002-12-09', '', 'Binalbagan', 3, '6', '3123-1312-____-____', '3213-1111-1111-', '1222-2222-2222', 12, 0, '3123131', 7, 'test 5', 0000, 'Vtest4', 'lwetest4rwi', 0000, 'test4', 'test4', 2016, 'test4', 'test4', ''),
(54, 'Richmond', 'Duterte', 'Yanson', 'jr', 1, 'Male', 'Married', 'test5', '1920-12-12', 'test5', '2002-12-09', 'test5', 'Binalbagan', 3, '2', '3123-1312-____-____', '3213-1111-1111-', '1222-2222-2222', 1231209312, 0, '+32 (131) 313-13-__', 6, '', 0000, 'test5', 'test5', 0000, 'test5', 'test5', 2016, 'test5', 'test5', ''),
(55, 'Riza', 'Cardo', 'Ador', '', 5, 'Female', 'Married', 'TEST6', '1940-12-12', 'TEST6', '2002-12-09', 'TEST61', 'Alijis', 6, 'Full Time', '3123-1321-____-____', '3213-1111-1111-', '1222-2222-2222', 1231209312, 0, '+63 (111) 111-11-11', 0, 'test 7', 2012, 'TEST61', 'test7', 2019, 'TEST61', 'TEST61', 2016, 'TEST61', 'TEST61', ''),
(56, 'jade', 'Cardiente', 'Solano', '', 6, 'Male', 'Married', 'Talisay city', '1938-08-04', 'Talisay City', '2013-07-24', '2', 'Talisay', 0, 'Full time', '123-123-123', '123-1233-1232', '123-123-123', 12345, 0, '09123456789', 0, 'BS Information System', 2017, 'CHMSC', '', 0000, '', '', 0000, '', '', 'uploads/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `pos_id` int(3) NOT NULL,
  `pos_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`pos_id`, `pos_name`) VALUES
(1, 'Administrative Aide I'),
(2, 'Administrative Aide II'),
(3, 'Administrative Aide III'),
(4, 'Administrative Aide IV'),
(5, 'Administrative Aide V'),
(6, 'Administrative Aide VI'),
(7, 'Administrative Assistant I'),
(8, 'Administrative Assistant II'),
(9, 'Administrative Assistant III'),
(10, 'Administrative Assistant IV'),
(11, 'Administrative Assistant V'),
(12, 'Administrative Officer I'),
(13, 'Administrative Officer II'),
(14, 'Administrative Officer III'),
(15, 'Administrative Officer IV'),
(16, 'Administrative Officer V'),
(17, 'Chief Administrative Officer'),
(18, 'SUC President I'),
(19, 'SUC President II'),
(20, 'SUC President III'),
(21, 'SUC President IV'),
(22, 'SUC President V'),
(23, 'Guidance Counselor I'),
(24, 'Guidance Counselor II'),
(25, 'Guidance Counselor III'),
(26, 'Dentist I'),
(27, 'Dentist II'),
(28, 'Dentist III'),
(29, 'Nurse I'),
(30, 'Nurse II'),
(31, 'Nurse III'),
(32, 'Registrar I'),
(33, 'Registrar II'),
(34, 'Registrar III'),
(35, 'Registrar IV'),
(36, 'Registrar V'),
(37, 'Security Guard I'),
(38, 'Security Guard II'),
(39, 'Security Guard III'),
(40, 'Security Guard IV'),
(41, 'Administrative ewwew II');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `promote_id` int(5) NOT NULL,
  `per_id` int(6) NOT NULL,
  `rank_id` int(3) NOT NULL,
  `date_promoted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_academic_rank`
--
ALTER TABLE `tbl_academic_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`promote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_academic_rank`
--
ALTER TABLE `tbl_academic_rank`
  MODIFY `rank_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `per_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `pos_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  MODIFY `promote_id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
