-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 07:26 AM
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
-- Table structure for table `t_mataair3`
--

CREATE TABLE IF NOT EXISTS `t_mataair3` (
`ID` int(13) NOT NULL,
  `ID_IDBalaiGa` int(13) NOT NULL,
  `NoDataGa` int(13) NOT NULL,
  `nama_matair` varchar(150) NOT NULL,
  `sistem` varchar(100) NOT NULL,
  `jenis_pompa` varchar(100) NOT NULL,
  `head_pompa` int(13) NOT NULL,
  `tahun_pengadaan` varchar(100) NOT NULL,
  `listrik` int(13) NOT NULL,
  `genset` int(13) NOT NULL,
  `solar_cell` int(13) NOT NULL,
  `lain_lain` int(13) NOT NULL,
  `debit_andal` int(13) NOT NULL,
  `debit_awal` int(13) NOT NULL,
  `his_ID` int(13) NOT NULL,
  `debit_idle` int(13) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_mataair3`
--

INSERT INTO `t_mataair3` (`ID`, `ID_IDBalaiGa`, `NoDataGa`, `nama_matair`, `sistem`, `jenis_pompa`, `head_pompa`, `tahun_pengadaan`, `listrik`, `genset`, `solar_cell`, `lain_lain`, `debit_andal`, `debit_awal`, `his_ID`, `debit_idle`) VALUES
(1, 2, 1, 'Mata Air Sanih', 'Pompa', 'Sentrifugal', 0, '', 40, 40, 0, 0, 0, 10, 8, 0),
(2, 2, 0, '', 'Gravitasi', '', 0, '', 20, 20, 0, 0, 0, 20, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_mataair3`
--
ALTER TABLE `t_mataair3`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_mataair3`
--
ALTER TABLE `t_mataair3`
MODIFY `ID` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
