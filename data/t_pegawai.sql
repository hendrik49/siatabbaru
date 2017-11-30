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
(1, 'Bambang Hidayah, ME', '088765432123', '123@123', 'where', '196209281998031002', 1502119194, '2', 'KEPALA BIDANG', 'PERENCANAAN DAN TATA USAHA', 'Bambang Hidayah (196209281998031002).jpg', ''),
(2, 'Ir. Arif Budhiyo, Sp.1', '088755532123', '123@123', 'where', '196009041986021001', 1502120152, '2', 'KEPALA BIDANG', 'KONSERVASI AIR TANAH DAN AIR BAKU', 'Arif Budhiyo (196009041986021001).jpg', ''),
(3, 'Alexander Leda, ST, MT', '088654232123', '123@123', 'where', '196808191998031006', 1502120166, '2', 'KEPALA BIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH BARAT', 'alexander leda.jpg', ''),
(4, 'Ir. Sigid Santoso, MM', '12346', '123@123', 'where', '196009151988111001', 1502121180, '2', 'KEPALA BIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH TIMUR', 'sigid.jpg', ''),
(5, 'Ir Muhamad Amir Hamzah, MM', '121234564568', 'adschb@ksjcbd', 'sdvdf', '195905011987031001', 1502880786, '1', 'KEPALA PUSAT', 'AIR TANAH DAN AIR BAKU', 'pakpu.jpg', ''),
(12, 'Kapi Hapidah, ST, MT', '0297398273', 'dsjdlskjd@gmail.com', 'jdshdj', '197008181998032009', 0, '3', 'KEPALA SUBBIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH BARAT', 'Kapi Hapidah (197008181998032009).jpg', ''),
(13, 'Mochamad Adhi Kurniawan, ST,M.Sc', '0297398273', 'dsjdlskjd@gmail.com', 'jdshdj', '198001302009121001', 0, '3', 'KEPALA SUBBIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH BARAT', 'Mochamad Adhi Kurniawan (198001302009121001).jpg', ''),
(14, 'I Nyoman Sabar, BE, SE', '236235623', 'ncnvcm@gmail.com', 'hsdkhskdjhsjd', '196109061985121002', 0, '3', 'KEPALA SUBBIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH TIMUR', 'I Nyoman Sabar (196109061985121002).jpg', ''),
(15, 'Eka Rahendra, SST, MSP', 'f', 'dsjdlskjd@gmail.com', 'ddfdf', '196201251983111001', 0, '3', 'KEPALA SUBBIDANG', 'AIR TANAH DAN AIR BAKU WILAYAH TIMUR', 'Eka Rahendra (196201251983111001).jpg', ''),
(16, 'Eva Purnawan, S.ST, MT', '23131131', 'dsjdlskjd@gmail.com', 'wddsdsds', '197203101998031005', 0, '3', 'KEPALA SUBBIDANG', 'KONSERVASI AIR TANAH DAN AIR BAKU BARAT', 'Eva Purnawan (197203101998031006).jpg', ''),
(17, 'Ir. Anshar, Sp.1', '233232323', 'dsjdlskjd@gmail.com', 'dsdsd', '196804221996031005', 0, '3', 'KEPALA SUBBIDANG', 'KONSERVASI AIR TANAH DAN AIR BAKU TIMUR', 'anshar.jpg', ''),
(18, 'Thomas Henk Bunarwan, ST,MT', '231323232', 'dsjdlskjd@gmail.com', 'sdsd', '198001152005021002', 0, '3', 'SUBAGIAN', 'PERENCANAAN', 'Thomas Henk Bunarwan (198001152005021002).jpg', ''),
(19, 'Novizar Adiyansyah, ST, MPSDA', '236273652635', 'dsjdlskjd@gmail.com', 'wdsdgh', '197909182005021002', 0, '3', 'SUBAGIAN', 'BIMBINGAN TEKNIK', 'Novizar Aiyansyah (197909182005021002).jpg', ''),
(20, 'Drs. Tanudji Laksono', '223232', 'dsjdlskjd@gmail.com', 'Jalan', ' 196109101988031001', 0, '3', 'SUBAGIAN', 'TATA USAHA', 'tanuji laksono.jpg', '');

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
