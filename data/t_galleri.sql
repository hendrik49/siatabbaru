-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 03:51 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_siatab`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_galleri`
--

CREATE TABLE IF NOT EXISTS `t_galleri` (
`ID` int(11) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `NamaGambar` varchar(255) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `t_galleri`
--

INSERT INTO `t_galleri` (`ID`, `Kategori`, `NamaGambar`, `Tanggal`, `status`, `Link`, `Deskripsi`) VALUES
(2, 'Sumur', 'Pembangunan Sumur di Bali', 1502120152, 1, '20161128_143108.jpg', '<p>Pembangunan Sumur di Bali</p>\r\n'),
(4, 'Sumur', 'Pembangunan Sumur Tahap 3', 1502121180, 1, '20161128_143121.jpg', '<p>Pembangunan Sumur Tahap 3</p>\r\n'),
(19, 'Sumur', 'Pembangunan Sumur Tahap 4', 1511499314, 0, '20161128_143121.jpg', '<p>sdsdsdsd</p>\r\n'),
(21, 'Sumur', 'Pembangunan Sumur Tahap 5', 1511503283, 0, '20161128_143121.jpg', '<p>qwqwqw</p>\r\n'),
(22, 'Air Tanah', 'Gambar 1', 1511957901, 0, '20160930_102228.jpg', '<p>Proses pengeboran air tanah</p>\r\n'),
(23, 'Air Tanah', 'Gambar 2', 1511969893, 0, 'IMG_0729.JPG', '<p>Proses pengeboran air tanah</p>\r\n'),
(24, 'Air Tanah', 'Gambar 3', 1511970025, 0, 'IMG_0748.JPG', '<p>proses [engeboran air tanah</p>\r\n'),
(25, 'Air Tanah', 'Gambar 4', 1511970151, 0, 'Canon IXUS 155131 OKE.jpg', '<p>Proses pengeboran air tanah</p>\r\n'),
(26, 'Air Tanah', 'Gambar 5', 1511970263, 0, 'DSC_1585.JPG', '<p>Pengairan dengan air tanah ke sawah</p>\r\n'),
(27, 'Air Tanah', 'Gambar 6', 1511970326, 0, 'DSCN0220.JPG', '<p>Pengairan ke ladang jagung</p>\r\n'),
(28, 'Air Tanah', 'Gambar 7', 1511970390, 0, 'BXBX.JPG', '<p>Pemanfaatan air oleh warga</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_galleri`
--
ALTER TABLE `t_galleri`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_galleri`
--
ALTER TABLE `t_galleri`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
