-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 05:44 AM
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
-- Table structure for table `t_pegawai`
--

CREATE TABLE IF NOT EXISTS `t_pegawai` (
`ID` int(11) NOT NULL,
  `Nama` varchar(60) CHARACTER SET ascii NOT NULL,
  `NoTelp` varchar(14) CHARACTER SET ascii NOT NULL,
  `Email` varchar(60) CHARACTER SET ascii NOT NULL,
  `Alamat` text NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `Golongan` varchar(60) NOT NULL,
  `Jabatan` varchar(150) NOT NULL,
  `Bidang` varchar(150) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Dokumen` varchar(60) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`ID`, `Nama`, `NoTelp`, `Email`, `Alamat`, `NIP`, `Tanggal`, `Golongan`, `Jabatan`, `Bidang`, `Foto`, `Dokumen`) VALUES
(1, 'Novizar Mando, MKom', '088765432123', '123@123', 'where', '123456', 1502119194, '2', 'KEPALA BIDANG', 'PERENCANAAN DAN TATA USAHA', 'default_profil.png', ''),
(2, 'Fajar S, MT', '088755532123', '123@123', 'where', '235465679', 1502120152, '2', 'KEPALA BIDANG', 'KONSERVASI AIR TANAH DAN AIR BAKU', 'default_profil.png', ''),
(3, 'Ayu Indriyani, MSi', '088654232123', '123@123', 'where', 'danau', 1502120166, '2', 'KEPALA BIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH BARAT', 'default_profil.png', ''),
(4, 'Budi Handoko, MT', '12346', '123@123', 'where', '346576', 1502121180, '2', 'KEPALA BIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH TIMUR', 'default_profil.png', ''),
(5, 'Ir Muhamad Amir Hamzah, MM', '121234564568', 'adschb@ksjcbd', 'sdvdf', '195905011987031001', 1502880786, '1', 'KEPALA PUSAT', 'AIR TANAH DAN AIR BAKU', 'pakpu.jpg', ''),
(12, 'Mama', '0297398273', 'dsjdlskjd@gmail.com', 'jdshdj', '21121212', 0, '3', 'KEPALA SUBBIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH BARAT', 'default_profil.png', ''),
(13, 'Mama', '0297398273', 'dsjdlskjd@gmail.com', 'jdshdj', '21121212', 0, '3', 'KEPALA SUBBIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH BARAT', 'default_profil.png', ''),
(14, 'fgfgfgf', '236235623', 'ncnvcm@gmail.com', 'hsdkhskdjhsjd', '234w535w45', 0, '3', 'KEPALA SUBBIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH TIMUR', 'default_profil.png', ''),
(15, 'Manana', 'f', 'dsjdlskjd@gmail.com', 'ddfdf', '2323232323', 0, '3', 'KEPALA SUBBIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH TIMUR', 'default_profil.png', ''),
(16, 'Kokoromo', '23131131', 'dsjdlskjd@gmail.com', 'wddsdsds', '223232323', 0, '3', 'KEPALA SUBBIDANG', 'KONSERVASI AIR TANAH DAN AIR BAKU BARAT', 'default_profil.png', ''),
(17, 'Wsjdhsdghsd', '233232323', 'dsjdlskjd@gmail.com', 'dsdsd', '32323132323', 0, '3', 'KEPALA SUBBIDANG', 'KONSERVASI AIR TANAH DAN AIR BAKU TIMUR', 'default_profil.png', ''),
(18, 'Mamake', '231323232', 'dsjdlskjd@gmail.com', 'sdsd', '2323232323', 0, '3', 'SUBAGIAN', 'PERENCANAAN', 'default_profil.png', ''),
(19, 'Manomo', '236273652635', 'dsjdlskjd@gmail.com', 'wdsdgh', '232634256345', 0, '3', 'SUBAGIAN', 'BIMBINGAN TEKNIK', 'default_profil.png', ''),
(20, 'Kikihaaa', '223232', 'dsjdlskjd@gmail.com', 'Jalan', '232323232', 0, '3', 'SUBAGIAN', 'TATA USAHA', 'default_profil.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
