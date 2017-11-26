-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 06:25 AM
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
(2, '', 'sumur', 1502120152, 1, 'sumur.png', ''),
(3, '', 'danau', 1502120166, 1, 'danau.png', ''),
(4, '', 'embung', 1502121180, 1, 'embung.png', '');

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
