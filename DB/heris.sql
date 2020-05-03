-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 05:13 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heris`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `norek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cid`, `cname`) VALUES
(1, 'Handphone'),
(2, 'Keyboard'),
(3, 'Laptop'),
(4, 'Guitar'),
(5, 'Jam Tangan'),
(6, 'Tas');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkid` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `iid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `noresi` varchar(255) NOT NULL,
  `scan` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkid`, `invoice`, `iid`, `mid`, `cid`, `qty`, `total`, `bank`, `status`, `noresi`, `scan`, `time`) VALUES
(1, '190708031833', 1, 1, 1, 1, 500000, 'BRI', '4', '', '', '2019-07-08 15:18:33'),
(2, '190708031858', 1, 1, 1, 1, 500000, 'BRI', '4', '', '', '2019-07-08 15:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `disc` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `sold` bigint(20) NOT NULL,
  `stock` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `timepost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`iid`, `name`, `cid`, `merk`, `color`, `detail`, `price`, `disc`, `qty`, `sold`, `stock`, `image`, `timepost`) VALUES
(1, 'Handphone', 1, 'Android', 'Hitam', 'Ini Detailnya', 1000000, 50, 20, 3, 18, 'hp.png', '2015-10-28 08:04:58'),
(2, 'Keyboard', 2, 'Yamaha', 'Putih', 'Ini Detailnya', 7000000, 10, 123, 35, 88, 'keyboard.png', '2015-10-29 04:10:33'),
(3, 'Laptop', 3, 'Asus', 'Merah', 'Ini Detailnya', 10000000, 20, 20, 15, 30, 'laptop.png', '2015-10-28 08:04:58'),
(4, 'Guitar', 4, 'Yamaha', 'Putih', 'Ini Detailnya', 890000, 50, 20, 3, 18, 'guitar.jpg', '2015-10-28 08:04:58'),
(5, 'Jam Tangan', 5, 'Columbia', 'Hitam', 'Ini Detailnya', 2000000, 10, 123, 35, 88, 'jam tangan.jpg', '2015-10-29 04:10:33'),
(6, 'Tas', 6, 'Joy Start', 'Abu - abu', 'Ini Detailnya', 890000, 20, 20, 15, 30, 'tas.jpg', '2015-10-28 08:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `memail` varchar(255) NOT NULL,
  `mpass` varchar(255) NOT NULL,
  `maddr` text NOT NULL,
  `mpid` int(11) NOT NULL,
  `mtel` varchar(255) NOT NULL,
  `mimg` varchar(255) NOT NULL,
  `mtimejoin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `mname`, `memail`, `mpass`, `maddr`, `mpid`, `mtel`, `mimg`, `mtimejoin`) VALUES
(1, 'heris aruan', 'aruanheriz87@gmail.com', 'c111ecb3e681bac7445e11f3fc64277b', 'cileungsi', 1, '081210937833', 'about.jpg', '2019-07-08 15:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `link`, `content`) VALUES
(1, 'Kontak Kami', 'contact', '		<p>Perusahaan : Heris Store</p>\r\n		<p>Alamat Kantor : Jl. Perumahan Duta Mekar Asri Blok R3 No.15 Cileungsi</p>\r\n		<p>Nomor Telephone : 0812 - 1093 - 7833</p>\r\n		<p>Email : aruanheriz87@gmail.com</p>\r\n		<p>Facebook : www.facebook.com/HerisAruan</p>\r\n		<p>Instagram : www.instagram.com/herisaruan</p>'),
(2, 'Tentang Kami', 'about', '<p>Heris Store adalah perusahan yang di dirikan oleh seseorang bernama Heris Aruan. perusahan ini berdiri sejak perang dunia ke 2 berlangsung. Kini perusahaan ini menjadi perusahaan nomor 1 di indonesia. </p>');

-- --------------------------------------------------------

--
-- Table structure for table `prov`
--

CREATE TABLE `prov` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prov`
--

INSERT INTO `prov` (`pid`, `pname`) VALUES
(1, 'Jawa Barat'),
(2, 'Jakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prov`
--
ALTER TABLE `prov`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prov`
--
ALTER TABLE `prov`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
