-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Nov 20, 2017 at 06:25 AM
=======
-- Generation Time: Nov 24, 2017 at 04:23 AM
>>>>>>> 4babcd7f82c9942e0770269afdd7bdb43cd93a7a
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
-- Table structure for table `t_video`
--

CREATE TABLE IF NOT EXISTS `t_video` (
`ID` int(11) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `NamaVideo` varchar(255) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `t_video`
--

INSERT INTO `t_video` (`ID`, `Kategori`, `NamaVideo`, `Tanggal`, `status`, `Link`, `Deskripsi`) VALUES
<<<<<<< HEAD
(2, '', 'sumur', 1502120152, 1, 'sumur.png', ''),
(3, '', 'danau', 1502120166, 1, 'danau.png', ''),
(4, '', 'embung', 1502121180, 1, 'embung.png', '');
=======
(2, 'Sumur', 'Sumur Tahap 1', 1502120152, 1, '20161214_174624.mp4', '<p>Sebuah Video Tahap 1</p>\r\n'),
(3, 'Sumur', 'Sumur Tahap 2', 1502120166, 1, '20161214_174624.mp4', '<p>Sumur Tahap 2</p>\r\n'),
(4, 'Sumur', 'Sumur Tahap 3', 1502121180, 1, '20161214_174624.mp4', '<p>Sumur Tahap 3</p>\r\n');
>>>>>>> 4babcd7f82c9942e0770269afdd7bdb43cd93a7a

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_video`
--
ALTER TABLE `t_video`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_video`
--
ALTER TABLE `t_video`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
