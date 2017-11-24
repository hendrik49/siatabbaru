-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2017 at 05:06 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siatab`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_airbaku1`
--

CREATE TABLE `t_airbaku1` (
  `ID` int(11) NOT NULL,
  `ID_IDBalai` int(11) NOT NULL,
  `NoData` int(11) NOT NULL,
  `data_dasar` varchar(255) NOT NULL,
  `nama_objek` varchar(255) NOT NULL,
  `tahun_data` varchar(25) NOT NULL,
  `kode_kementerian` varchar(25) NOT NULL,
  `kode_bidang` varchar(25) NOT NULL,
  `kode_dasar` varchar(25) NOT NULL,
  `kode_infra` varchar(25) NOT NULL,
  `nama_ws` varchar(255) NOT NULL,
  `nama_das` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lintang_selatan` varchar(100) NOT NULL,
  `bujur_timur` varchar(255) NOT NULL,
  `elevasi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_airbaku2`
--

CREATE TABLE `t_airbaku2` (
  `ID` int(11) NOT NULL,
  `ID_IDBalaiWa` int(11) NOT NULL,
  `NoDataWa` int(11) NOT NULL,
  `Status1` int(11) NOT NULL,
  `air_baku` varchar(255) NOT NULL,
  `debit_air` varchar(255) NOT NULL,
  `status_spam` varchar(255) NOT NULL,
  `status_pedesaan` varchar(255) NOT NULL,
  `status_ikk` varchar(255) NOT NULL,
  `sumber_air` varchar(255) NOT NULL,
  `sistem` enum('Pompa','Grafitasi') NOT NULL,
  `jenis_pompa` enum('Sentrifugal','Submersible','Turbin') NOT NULL,
  `debit_rencana` varchar(255) NOT NULL,
  `debit_realisasi` varchar(255) NOT NULL,
  `debit_capacity` varchar(255) NOT NULL,
  `jenis_saluran` enum('Terbuka','Tertutup') NOT NULL,
  `panjang_saluran` varchar(255) NOT NULL,
  `panjang_pipa` varchar(255) NOT NULL,
  `jenis_pipa` varchar(255) NOT NULL,
  `dimensi_pipa` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `lebar_sungai` int(11) NOT NULL,
  `luas_dta` int(11) NOT NULL,
  `head_pompa` int(11) NOT NULL,
  `tahun_pengadaan` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_airbaku3`
--

CREATE TABLE `t_airbaku3` (
  `ID` int(11) NOT NULL,
  `bendung` varchar(255) NOT NULL,
  `reservoar` int(11) NOT NULL,
  `hidran_umum` int(100) NOT NULL,
  `sumuran` varchar(255) NOT NULL,
  `tyroller` varchar(255) NOT NULL,
  `penggerak` enum('Listrik','Solar Cell','Genset') NOT NULL,
  `luas` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `panjang_jaringan` int(11) NOT NULL,
  `tahun_pembuatan` varchar(255) NOT NULL,
  `tahun_rehab` varchar(255) NOT NULL,
  `tahun_rencana` varchar(255) NOT NULL,
  `kelembagaan` varchar(255) NOT NULL,
  `status_kelola` enum('Sudah','Belum','Dihibahkan') NOT NULL,
  `status` enum('Operasi','Tidak Operasi') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `ID_IDBalaiGa` int(11) NOT NULL,
  `NoDataGa` int(11) NOT NULL,
  `debit_awal` int(11) NOT NULL,
  `q_90` int(11) NOT NULL,
  `historis_debit` int(11) NOT NULL,
  `jenis_intake` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_airbaku4`
--

CREATE TABLE `t_airbaku4` (
  `no` int(11) NOT NULL,
  `kondisi_pompa` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL,
  `kondisi_pipa` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL,
  `kondisi_reservoar` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL,
  `kondisi_intake` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL,
  `kondisi_penggerak` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL,
  `kondisi_bangunan` enum('Baik','Rusak Ringan','Rusak Berat') NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_berita`
--

CREATE TABLE `t_berita` (
  `ID` int(11) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `NamaBerita` varchar(255) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_berita`
--

INSERT INTO `t_berita` (`ID`, `Kategori`, `NamaBerita`, `Tanggal`, `status`, `Link`, `Deskripsi`) VALUES
(1, 'News', 'mataair', 1502119194, 1, 'mataair.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(2, 'Headline', 'sumur', 1502120152, 1, 'sumur.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(3, 'News', 'danau', 1502120166, 1, 'danau.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(4, 'News', 'embung', 1502121180, 1, 'embung.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `t_galleri`
--

CREATE TABLE `t_galleri` (
  `ID` int(11) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `NamaGambar` varchar(255) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_galleri`
--

INSERT INTO `t_galleri` (`ID`, `Kategori`, `NamaGambar`, `Tanggal`, `status`, `Link`, `Deskripsi`) VALUES
(1, '', 'mataair', 1502119194, 1, 'mataair.png', ''),
(2, '', 'sumur', 1502120152, 1, 'sumur.png', ''),
(3, '', 'danau', 1502120166, 1, 'danau.png', ''),
(4, '', 'embung', 1502121180, 1, 'embung.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_kab_kota`
--

CREATE TABLE `t_kab_kota` (
  `no` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `kab` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kab_kota`
--

INSERT INTO `t_kab_kota` (`no`, `kode`, `kab`) VALUES
(222, '76', 'KOTA TEGAL'),
(221, '75', 'KOTA PEKALONGAN'),
(220, '74', 'KOTA SEMARANG'),
(219, '73', 'KOTA SALATIGA'),
(218, '72', 'KOTA SURAKARTA'),
(217, '71', 'KOTA MAGELANG'),
(216, '29', 'KAB. BREBES'),
(215, '28', 'KAB. TEGAL'),
(214, '27', 'KAB. PEMALANG'),
(213, '26', 'KAB. PEKALONGAN'),
(212, '25', 'KAB. BATANG'),
(211, '24', 'KAB. KENDAL'),
(210, '23', 'KAB. TEMANGGUNG'),
(209, '22', 'KAB. SEMARANG'),
(208, '21', 'KAB. DEMAK'),
(207, '20', 'KAB. JEPARA'),
(206, '19', 'KAB. KUDUS'),
(205, '18', 'KAB. PATI'),
(204, '17', 'KAB. REMBANG'),
(203, '16', 'KAB. BLORA'),
(202, '15', 'KAB. GROBOGAN'),
(201, '14', 'KAB. SRAGEN'),
(200, '13', 'KAB. KARANGANYAR'),
(199, '12', 'KAB. WONOGIRI'),
(198, '11', 'KAB. SUKOHARJO'),
(197, '10', 'KAB. KLATEN'),
(196, '9', 'KAB. BOYOLALI'),
(195, '8', 'KAB. MAGELANG'),
(194, '7', 'KAB. WONOSOBO'),
(193, '6', 'KAB. PURWOREJO'),
(192, '5', 'KAB. KEBUMEN'),
(191, '4', 'KAB. BANJARNEGARA'),
(190, '3', 'KAB. PURBALINGGA'),
(189, '2', 'KAB. BANYUMAS'),
(188, '1', 'KAB. CILACAP'),
(187, '79', 'KOTA BANJAR'),
(186, '78', 'KOTA TASIKMALAYA'),
(185, '77', 'KOTA CIMAHI'),
(184, '76', 'KOTA DEPOK'),
(183, '75', 'KOTA BEKASI'),
(182, '74', 'KOTA CIREBON'),
(181, '73', 'KOTA BANDUNG'),
(180, '72', 'KOTA SUKABUMI'),
(179, '71', 'KOTA BOGOR'),
(178, '18', 'KAB. PANGANDARAN'),
(177, '17', 'KAB. BANDUNG BARAT'),
(176, '16', 'KAB. BEKASI'),
(175, '15', 'KAB. KARAWANG'),
(174, '14', 'KAB. PURWAKARTA'),
(173, '13', 'KAB. SUBANG'),
(172, '12', 'KAB. INDRAMAYU'),
(171, '11', 'KAB. SUMEDANG'),
(170, '10', 'KAB. MAJALENGKA'),
(169, '09', ' KAB. CIREBON'),
(168, '08', 'KAB. KUNINGAN'),
(167, '07', 'KAB. CIAMIS'),
(166, '06', 'KAB. TASIKMALAYA'),
(165, '05', 'KAB. GARUT'),
(164, '04', 'KAB. BANDUNG'),
(163, '03', 'KAB. CIANJUR'),
(162, '02', 'KAB. SUKABUMI'),
(161, '01', 'KAB. BOGOR'),
(160, '75', 'KOTA ADM. JAKARTA TIMUR'),
(159, '74', 'KOTA ADM. JAKARTA SELATAN'),
(158, '73', 'KOTA ADM. JAKARTA BARAT'),
(157, '72', 'KOTA ADM. JAKARTA UTARA'),
(156, '71', 'KOTA ADM. JAKARTA PUSAT'),
(155, '01', 'KAB ADM KEP SERIBU'),
(154, '72', 'KOTA TANJUNG PINANG'),
(153, '71', 'KOTA BATAM'),
(152, '12', 'KAB KEPULAUAN ANAMBAS'),
(151, '11', 'KAB LINGGA'),
(150, '10', 'KAB NATUNA'),
(149, '09', 'KAB KARIMUN'),
(148, '08', 'KAB BINTAN'),
(147, '07', 'KOTA PANGKAL PINANG'),
(146, '06', 'KAB BELITUNG BARAT'),
(145, '05', 'KAB BANGKA BARAT'),
(144, '04', 'KAB BANGKA TENGAH'),
(143, '03', 'KAB BANGKA SELATAN'),
(142, '02', 'KAB BELITUNG'),
(141, '01', 'KAB BANGKA'),
(140, '72', 'KOTA METRO'),
(139, '71', 'KOTA BANDAR LAMPUNG'),
(138, '13', 'KAB PESISIR BARAT'),
(137, '12', 'KAB TULANG BAWANG BARAT'),
(136, '11', 'KAB MESUJI'),
(135, '10', 'KAB PRINGSEWU'),
(134, '09', 'KAB PESAWARAN'),
(133, '08', 'KAB WAY KANAN'),
(132, '07', 'KAB LAMPUNG TIMUR'),
(131, '06', 'KAB TANGGAMUS'),
(130, '05', 'KAB TULANG BAWANG'),
(129, '04', 'KAB LAMPUNG BARAT'),
(128, '03', 'KAB LAMPUNG UTARA'),
(127, '02', 'KAB LAMPUNG TENGAH'),
(126, '01', 'KAB LAMPUNG SELATAN'),
(125, '71', 'KOTA BENGKULU'),
(124, '09', 'KAB BENGKULU TENGAH'),
(123, '08', 'KAB KEPAHIANG'),
(122, '07', 'KAB LEBONG'),
(121, '06', 'KAB MUKO MUKO'),
(120, '05', 'KAB SELUMA'),
(119, '04', 'KAB KAUR'),
(118, '03', 'KAB BENGKULU UTARA'),
(117, '02', 'KAB REJANG LEBONG'),
(116, '01', 'KAB BENGKULU SELATAN'),
(115, '74', 'KOTA PRABUMULIH'),
(114, '73', 'KOTA LUBUK LINGGAU'),
(113, '72', 'KOTA PAGAR ALAM'),
(112, '71', 'KOTA PALEMBANG'),
(111, '13', 'KAB MUSI RAWAS UTARA'),
(110, '12', 'KAB PANUKAL ABAB LEMATANGI'),
(109, '11', 'KAB EMPAT LAWANG'),
(108, '10', 'KAB OGAN ILIR'),
(107, '09', 'KAB OGAN KOMERING ULU SELAT'),
(106, '08', 'KAB OGAN KOMERING ULU TIMU'),
(105, '07', 'KAB BANYUASIN'),
(104, '06', 'KAB MUSI BANYUASIN'),
(103, '05', 'KAB MUSI RAWAS'),
(102, '04', 'KAB LAHAT'),
(101, '03', 'KAB MUARA ENIM'),
(100, '02', 'KAB OGAN KOMERING ILIR'),
(99, '01', 'KAB OGAN KOMERING ULU'),
(98, '72', 'KOTA SUNGAI PENUH'),
(97, '71', 'KOTA JAMBI'),
(96, '09', 'KAB TEBO'),
(95, '08', 'KAB BUNGO'),
(94, '07', 'KAB TANJUNG JABUNG TIMUR'),
(93, '06', 'KAB TANJUNG JABUNG BARAT'),
(92, '05', 'KAB MUARO JAMBI'),
(91, '04', 'KAB BATANGHARI'),
(90, '03', 'KAB SAROLANGUN'),
(89, '02', 'KAB MERANGIN'),
(88, '01', 'KAB KERINCI'),
(87, '72', 'KOTA DUMAI'),
(86, '71', 'KOTA PEKANBARU'),
(85, '10', 'KAB KEPULAUAN MERANTI'),
(84, '09', 'KAB KUANTAN SINGINGI'),
(83, '08', 'KAB SIAK'),
(82, '07', 'KAB ROKAN HILIR'),
(81, '06', 'KAB ROKAN HULU'),
(80, '05', 'KAB PELALAWAN'),
(79, '04', 'KAB INDRAGIRI HILIR'),
(78, '03', 'KAB BENGKALIS'),
(77, '02', 'KAB INDRAGIRI HULU'),
(76, '01', 'KAB KAMPAR'),
(75, '77', 'KOTA PARIAMAN'),
(74, '76', 'KOTA PAYAKUMBUH'),
(73, '75', 'KOTA BUKITTINGGI'),
(72, '74', 'KOTA PADANG PANJANG'),
(71, '73', 'KOTA SAWAHLUNTO'),
(70, '72', 'KOTA SOLOK'),
(69, '71', 'KOTA PADANG'),
(68, '12', 'KAB PASAMAN BARAT'),
(67, '11', 'KAB SOLOK SELATAN'),
(66, '10', 'KAB DHARMASRAYA'),
(65, '09', 'KAB KEPULAUAN MENTAWAI'),
(64, '08', 'KAB PASAMAN'),
(63, '07', 'KAB LIMA PULUH KOTA'),
(62, '06', 'KAB AGAM'),
(61, '05', 'KAB PADANG PARIAMAN'),
(60, '04', 'KAB TANAH DATAR'),
(59, '03', 'KAB SIJUNJUNG'),
(58, '02', 'KAB SOLOK'),
(57, '01', 'KAB PESISIR SELATAN'),
(56, '78', 'KOTA GUNUNGSITOLI'),
(55, '77', 'KOTA PADANGSIDIMPUAN'),
(54, '76', 'KOTA TEBING TINGGI'),
(53, '75', 'KOTA BINJAI'),
(52, '74', 'KOTA TANJUNG BALAI'),
(51, '73', 'KOTA SIBOLGA'),
(50, '72', 'KOTA PEMATANG SIANTAR'),
(49, '71', 'KOTA MEDAN'),
(48, '25', 'KAB NIAS BARAT'),
(47, '24', 'KAB NIAS UTARA'),
(46, '23', 'KAB LABUHANBATU UTARA'),
(45, '22', 'KAB LABUHANBATU SELATAN'),
(44, '21', 'KAB PADANG LAWAS'),
(43, '20', 'KAB PADANG LAWAS UTARA'),
(42, '19', 'KAB BATU BARA'),
(41, '18', 'KAB SERDANG BEDAGAI'),
(40, '17', 'KAB SAMOSIR'),
(39, '16', 'KAB HUMBANG HASUNDUTAN'),
(38, '15', 'KAB PAKPAK BHARAT'),
(37, '14', 'KAB NIAS SELATAN'),
(36, '13', 'KAB MANDAILING NATAL'),
(35, '12', 'KAB TORA SAMOSIR'),
(34, '11', 'KAB DAIRI'),
(33, '10', 'KAB LABUHANBATU'),
(32, '09', 'KAB ASAHAN'),
(31, '08', 'KAB SIMALUNGUN'),
(30, '07', 'KAB DELI SERDANG'),
(29, '06', 'KAB KARO'),
(28, '05', 'KAB LANGKAT'),
(27, '04', 'KAB NIAS'),
(26, '03', 'KAB TAPANULI SELATAN'),
(25, '02', 'KAB TAPANULI UTARA'),
(24, '01', 'KAB TAPANULI TENGAH'),
(23, '75', 'KOTA SUBULUSSALAM'),
(22, '74', 'KOTA LANGSA'),
(21, '73', 'KOTA LHOKSEUMAWE'),
(20, '72', 'KOTA SABANG'),
(19, '71', 'KAB BANDA ACEH'),
(18, '18', 'KAB PIDIE JAYA'),
(17, '17', 'KAB BENER MERIAH'),
(16, '16', 'KAB ACEH TAMIANG'),
(15, '15', 'KAB NAGAN RAYA'),
(14, '14', 'KAB ACEH JAYA'),
(13, '13', 'KAB GAYO LUES'),
(12, '12', 'KAB ACEH BARAT DAYA'),
(11, '11', 'KAB BIREUEN'),
(10, '10', 'KAB ACEH SINGKIL'),
(9, '09', 'KAB SIMEULUE'),
(8, '08', 'KAB ACEH UTARA'),
(7, '07', 'KAB PIDIE'),
(6, '06', 'KAB ACEH BESAR'),
(5, '05', 'KAB ACEH BARAT'),
(4, '04', 'KAB ACEH TENGAH'),
(3, '03', 'KAB ACEH TIMUR'),
(2, '02', 'KAB ACEH TENGGARA'),
(1, '01', 'KAB ACEH SELATAN'),
(223, '1', 'KAB. KULON PROGO'),
(224, '2', 'KAB. BANTUL'),
(225, '3', 'KAB. GUNUNG KIDUL'),
(226, '4', 'KAB. SLEMAN'),
(227, '71', 'KOTA YOGYAKARTA'),
(228, '1', 'KAB. PACITAN'),
(229, '2', 'KAB. PONOROGO'),
(230, '3', 'KAB. TRENGGALEK'),
(231, '4', 'KAB. TULUNGAGUNG'),
(232, '5', 'KAB. BLITAR'),
(233, '6', 'KAB. KEDIRI'),
(234, '7', 'KAB. MALANG'),
(235, '8', 'KAB. LUMAJANG'),
(236, '9', 'KAB. JEMBER'),
(237, '10', 'KAB. BANYUWANGI'),
(238, '11', 'KAB. BONDOWOSO'),
(239, '12', 'KAB. SITUBONDO'),
(240, '13', 'KAB. PROBOLINGGO'),
(241, '14', 'KAB. PASURUAN'),
(242, '15', 'KAB. SIDOARJO'),
(243, '16', 'KAB. MOJOKERTO'),
(244, '17', 'KAB. JOMBANG'),
(245, '18', 'KAB. NGANJUK'),
(246, '19', 'KAB. MADIUN'),
(247, '20', 'KAB. MAGETAN'),
(248, '21', 'KAB. NGAWI'),
(249, '22', 'KAB. BOJONEGORO'),
(250, '23', 'KAB. TUBAN'),
(251, '24', 'KAB. LAMONGAN'),
(252, '25', 'KAB. GRESIK'),
(253, '26', 'KAB. BANGKALAN'),
(254, '27', 'KAB. SAMPANG'),
(255, '28', 'KAB. PAMEKASAN'),
(256, '29', 'KAB. SUMENEP'),
(257, '71', 'KOTA KEDIRI'),
(258, '72', 'KOTA BLITAR'),
(259, '73', 'KOTA MALANG'),
(260, '74', 'KOTA PROBOLINGGO'),
(261, '75', 'KOTA PASURUAN'),
(262, '76', 'KOTA MOJOKERTO'),
(263, '77', 'KOTA MADIUN'),
(264, '78', 'KOTA SURABAYA'),
(265, '79', 'KOTA BATU'),
(266, '1', 'KAB. PANDEGLANG'),
(267, '2', 'KAB. LEBAK'),
(268, '3', 'KAB. TANGERANG'),
(269, '4', 'KAB. SERANG'),
(270, '71', 'KOTA TANGERANG'),
(271, '72', 'KOTA CILEGON'),
(272, '73', 'KOTA SERANG'),
(273, '74', 'KOTA TANGERANG SELATAN'),
(274, '1', 'KAB. JEMBRANA'),
(275, '2', 'KAB. TABANAN'),
(276, '3', 'KAB. BADUNG'),
(277, '4', 'KAB. GIANYAR'),
(278, '5', 'KAB. KLUNGKUNG'),
(279, '6', 'KAB. BANGLI'),
(280, '7', 'KAB. KARANGASEM'),
(281, '8', 'KAB. BULELENG'),
(282, '71', 'KOTA DENPASAR'),
(283, '1', 'KAB. LOMBOK BARAT'),
(284, '2', 'KAB. LOMBOK TENGAH'),
(285, '3', 'KAB. LOMBOK TIMUR'),
(286, '4', 'KAB. SUMBAWA'),
(287, '5', 'KAB. DOMPU'),
(288, '6', 'KAB. BIMA'),
(289, '7', 'KAB. SUMBAWA BARAT'),
(290, '8', 'KAB. LOMBOK UTARA'),
(291, '71', 'KOTA MATARAM'),
(292, '72', 'KOTA BIMA'),
(293, '1', 'KAB. KUPANG'),
(294, '2', 'KAB TIMOR TENGAH SELATAN'),
(295, '3', 'KAB. TIMOR TENGAH UTARA'),
(296, '4', 'KAB. BELU'),
(297, '5', 'KAB. ALOR'),
(298, '6', 'KAB. FLORES TIMUR'),
(299, '7', 'KAB. SIKKA'),
(300, '8', 'KAB. ENDE'),
(301, '9', 'KAB. NGADA'),
(302, '10', 'KAB. MANGGARAI'),
(303, '11', 'KAB. SUMBA TIMUR'),
(304, '12', 'KAB. SUMBA BARAT'),
(305, '13', 'KAB. LEMBATA'),
(306, '14', 'KAB. ROTE NDAO'),
(307, '15', 'KAB. MANGGARAI BARAT'),
(308, '16', 'KAB. NAGEKEO'),
(309, '17', 'KAB. SUMBA TENGAH'),
(310, '18', 'KAB. SUMBA BARAT DAYA'),
(311, '19', 'KAB. MANGGARAI TIMUR'),
(312, '20', 'KAB. SABU RAIJUA'),
(313, '21', 'KAB. MALAKA'),
(314, '71', 'KOTA KUPANG'),
(315, '1', 'KAB. SAMBAS'),
(316, '2', 'AB. MEMPAWAH'),
(317, '3', 'KAB. SANGGAU'),
(318, '4', 'KAB. KETAPANG'),
(319, '5', 'KAB. SINTANG'),
(320, '6', 'KAB. KAPUAS HULU'),
(321, '7', 'KAB. BENGKAYANG'),
(322, '8', 'KAB. LANDAK'),
(323, '9', 'KAB. SEKADAU'),
(324, '10', 'KAB. MELAWI'),
(325, '11', 'KAB. KAYONG UTARA'),
(326, '12', 'KAB. KUBU RAYA'),
(327, '71', 'KOTA PONTIANAK'),
(328, '72', 'KOTA SINGKAWANG'),
(329, '1', 'KAB. KOTAWARINGIN BARAT'),
(330, '2', 'AB. KOTAWARINGIN TIMUR'),
(331, '3', 'KAB. KAPUAS'),
(332, '4', 'KAB. BARITO SELATAN'),
(333, '5', 'KAB. BARITO UTARA'),
(334, '6', 'KAB. KATINGAN'),
(335, '7', 'KAB. SERUYAN'),
(336, '8', 'KAB. SUKAMARA'),
(337, '9', 'KAB. LAMANDAU'),
(338, '10', 'KAB. GUNUNG MAS'),
(339, '11', 'KAB. PULANG PISAU'),
(340, '12', 'KAB. MURUNG RAYA'),
(341, '13', 'KAB. BARITO TIMUR'),
(342, '71', 'KOTA PALANGKARAYA'),
(343, '1', 'KAB. TANAH LAUT'),
(344, '2', 'KAB. KOTABARU'),
(345, '3', 'KAB. BANJAR'),
(346, '4', 'KAB. BARITO KUALA'),
(347, '5', 'KAB. TAPIN'),
(348, '6', 'KAB. HULU SUNGAI SELATAN'),
(349, '7', 'KAB. HULU SUNGAI TENGAH'),
(350, '8', 'KAB. HULU SUNGAI UTARA'),
(351, '9', 'KAB. TABALONG'),
(352, '10', 'KAB. TANAH BUMBU'),
(353, '11', 'KAB. BALANGAN'),
(354, '71', 'KOTA BANJARMASIN'),
(355, '72', 'KOTA BANJARBARU'),
(356, '1', 'KAB. PASER'),
(357, '2', 'KAB. KUTAI KARTANEGARA'),
(358, '3', 'KAB. BERAU'),
(359, '4', 'KAB. BULUNGAN'),
(360, '5', 'KAB. NUNUKAN'),
(361, '6', 'KAB. MALINAU'),
(362, '7', 'KAB. KUTAI BARAT'),
(363, '8', 'KAB. KUTAI TIMUR'),
(364, '9', 'KAB. PENAJAM PASER UTARA'),
(365, '10', 'KAB. TANA TIDUNG'),
(366, '11', 'KAB. MAHAKAM ULU'),
(367, '71', 'KOTA BALIKPAPAN'),
(368, '72', 'KOTA SAMARINDA'),
(369, '73', 'KOTA TARAKAN'),
(370, '74', 'KOTA BONTANG'),
(371, '1', 'KAB. BULUNGAN'),
(372, '2', 'KAB. MALINAU'),
(373, '3', 'KAB. NUNUKAN'),
(374, '4', 'KAB. TANA TIDUNG'),
(375, '71', 'KOTA TARAKAN'),
(376, '1', 'KAB. BOLAANG MONGONDOW'),
(377, '2', 'KAB. MINAHASA'),
(378, '3', 'KAB. KEPULAUAN SANGIHE'),
(379, '4', 'KAB. KEPULAUAN TALAUD'),
(380, '5', 'KAB. MINAHASA SELATAN'),
(381, '6', 'KAB. MINAHASA UTARA'),
(382, '7', 'KAB. MINAHASA TENGGARA'),
(383, '8', 'KAB. BOLAANG MONGONDOW UT'),
(384, '9', 'KAB. KEP. SIAU TAGULANDANG B'),
(385, '10', 'KAB. BOLAANG MONGONDOW TI'),
(386, '11', 'KAB. BOLAANG MONGONDOW SE'),
(387, '71', 'KOTA MANADO'),
(388, '72', 'KOTA BITUNG'),
(389, '73', 'KOTA TOMOHON'),
(390, '74', 'KOTA KOTAMOBAGU'),
(391, '01', 'KAB. BANGGAI'),
(392, '02', 'KAB. POSO'),
(393, '03', 'KAB. DONGGALA'),
(394, '04', 'KAB. TOLI TOLI'),
(395, '05', 'KAB. BUOL'),
(396, '06', 'KAB. MOROWALI'),
(397, '07', 'KAB. BANGGAI KEPULAUAN'),
(398, '08', 'KAB. PARIGI MOUTONG'),
(399, '09', 'KAB. TOJO UNA UNA'),
(400, '10', 'KAB. SIGI'),
(401, '11', 'KAB. BANGGAI LAUT'),
(402, '12', 'KAB. MOROWALI UTARA'),
(403, '71', 'KOTA PALU'),
(404, '01', 'KAB. KEPULAUAN SELAYAR'),
(405, '02', 'KAB. BULUKUMBA'),
(406, '03', 'KAB. BANTAENG'),
(407, '04', 'KAB. JENEPONTO'),
(408, '05', 'KAB. TAKALAR'),
(409, '06', 'KAB. GOWA'),
(410, '07', 'KAB. SINJAI'),
(411, '08', 'KAB. BONE'),
(412, '09', 'KAB. MAROS'),
(413, '10', 'KAB. PANGKAJENE KEPULAUAN'),
(414, '11', 'KAB. BARRU'),
(415, '12', 'KAB. SOPPENG'),
(416, '13', 'KAB. WAJO'),
(417, '14', 'KAB. SIDENRENG RAPPANG'),
(418, '15', 'KAB. PINRANG'),
(419, '16', 'KAB. ENREKANG'),
(420, '17', 'KAB. LUWU'),
(421, '18', 'KAB. TANA TORAJA'),
(422, '19', 'KAB. POLEWALI MAMASA'),
(423, '20', 'KAB. MAJENE'),
(424, '21', 'KAB. MAMUJU'),
(425, '22', 'KAB. LUWU UTARA'),
(426, '23', 'KAB. MAMASA'),
(427, '24', 'KAB. LUWU TIMUR'),
(428, '25', 'KAB. MAMUJU UTARA'),
(429, '26', 'KAB. TORAJA UTARA'),
(430, '71', 'KOTA MAKASSAR'),
(431, '72', 'KOTA PARE PARE'),
(432, '73', 'KOTA PALOPO'),
(433, '01', 'KAB. KOLAKA'),
(434, '02', 'KAB. KONAWE'),
(435, '03', 'KAB. MUNA'),
(436, '04', 'KAB. BUTON'),
(437, '05', 'KAB. KONAWE SELATAN'),
(438, '06', 'KAB. BOMBANA'),
(439, '07', 'KAB. WAKATOBI'),
(440, '08', 'KAB. KOLAKA UTARA'),
(441, '09', 'KAB. KONAWE UTARA'),
(442, '10', 'KAB. BUTON UTARA'),
(443, '11', 'KAB. KOLAKA TIMUR'),
(444, '12', 'KAB. KONAWE KEPULAUAN'),
(445, '13', 'KAB. MUNA BARAT'),
(446, '14', 'KAB. BUTON TENGAH'),
(447, '15', 'KAB. BUTON SELATAN'),
(448, '71', 'KOTA KENDARI'),
(449, '72', 'KOTA BAU BAU'),
(450, '01', 'KAB. GORONTALO'),
(451, '02', 'KAB. BOALEMO'),
(452, '03', 'KAB. BONE BOLANGO'),
(453, '04', 'KAB. PAHUWATO'),
(454, '05', 'KAB. GORONTALO UTARA'),
(455, '71', 'KOTA GORONTALO'),
(456, '01', 'KAB. MAMUJU UTARA'),
(457, '02', 'KAB. MAMUJU'),
(458, '03', 'KAB. MAMASA'),
(459, '04', 'KAB. POLEWALI MANDAR'),
(460, '05', 'KAB. MAJENE'),
(461, '06', 'KAB. MAMUJU TENGAH'),
(462, '01', 'KAB. MALUKU TENGAH'),
(463, '02', 'KAB. MALUKU TENGGARA'),
(464, '03', 'KAB MALUKU TENGGARA BARAT'),
(465, '04', 'KAB. BURU'),
(466, '05', 'KAB. SERAM BAGIAN TIMUR'),
(467, '06', 'KAB. SERAM BAGIAN BARAT'),
(468, '07', 'KAB. KEPULAUAN ARU'),
(469, '08', 'KAB. MALUKU BARAT DAYA'),
(470, '09', 'KAB. BURU SELATAN'),
(471, '71', 'KOTA AMBON'),
(472, '72', 'KOTA TUAL'),
(473, '01', 'KAB. HALMAHERA BARAT'),
(474, '02', 'KAB. HALMAHERA TENGAH'),
(475, '03', 'KAB. HALMAHERA UTARA'),
(476, '04', 'KAB. HALMAHERA SELATAN'),
(477, '05', 'KAB. KEPULAUAN SULA'),
(478, '06', 'KAB. HALMAHERA TIMUR'),
(479, '07', 'KAB. PULAU MOROTAI'),
(480, '08', 'KAB. PULAU TALIABU'),
(481, '71', 'KOTA TERNATE'),
(482, '72', 'KOTA TIDORE KEPULAUAN'),
(483, '01', 'KAB. MERAUKE'),
(484, '02', 'KAB. JAYAWIJAYA'),
(485, '03', 'KAB. JAYAPURA'),
(486, '04', 'KAB. NABIRE'),
(487, '05', 'KAB. KEPULAUAN YAPEN'),
(488, '06', 'KAB. BIAK NUMFOR'),
(489, '07', 'KAB. PUNCAK JAYA'),
(490, '08', 'KAB. PANIAI'),
(491, '09', 'KAB. MIMIKA'),
(492, '10', 'KAB. SARMI'),
(493, '11', 'KAB. KEEROM'),
(494, '12', 'KAB PEGUNUNGAN BINTANG'),
(495, '13', 'KAB. YAHUKIMO'),
(496, '14', 'KAB. TOLIKARA'),
(497, '15', 'KAB. WAROPEN'),
(498, '16', 'KAB. BOVEN DIGOEL'),
(499, '17', 'KAB. MAPPI'),
(500, '18', 'KAB. ASMAT'),
(501, '19', 'KAB. SUPIORI'),
(502, '20', 'KAB. MAMBERAMO RAYA'),
(503, '21', 'KAB. MAMBERAMO TENGAH'),
(504, '22', 'KAB. YALIMO'),
(505, '23', 'KAB. LANNY JAYA'),
(506, '24', 'KAB. NDUGA'),
(507, '25', 'KAB. PUNCAK'),
(508, '26', 'KAB. DOGIYAI'),
(509, '27', 'KAB. INTAN JAYA'),
(510, '28', 'KAB. DEIYAI'),
(511, '71', 'KOTA JAYAPURA'),
(512, '01', 'KAB. SORONG'),
(513, '02', 'KAB. MANOKWARI'),
(514, '03', 'KAB. FAK FAK'),
(515, '04', 'KAB. SORONG SELATAN'),
(516, '05', 'KAB. RAJA AMPAT'),
(517, '06', 'KAB. TELUK BINTUNI'),
(518, '07', 'KAB. TELUK WONDAMA'),
(519, '08', 'KAB. KAIMANA'),
(520, '09', 'KAB. TAMBRAUW'),
(521, '10', 'KAB. MAYBRAT'),
(522, '11', 'KAB. MANOKWARI SELATAN'),
(523, '12', 'KAB. PEGUNUNGAN ARFAK'),
(524, '71', 'KOTA SORONG');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(60) CHARACTER SET ascii NOT NULL,
  `NoTelp` varchar(14) CHARACTER SET ascii NOT NULL,
  `Email` varchar(60) CHARACTER SET ascii NOT NULL,
  `Alamat` text NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `Golongan` varchar(60) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Dokumen` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`ID`, `Nama`, `NoTelp`, `Email`, `Alamat`, `NIP`, `Tanggal`, `Golongan`, `Foto`, `Dokumen`) VALUES
(1, 'deni', '088765432123', '123@123', 'where', '123456', 1502119194, '1', 'default_profil.png', ''),
(2, 'fajar', '088755532123', '123@123', 'where', '235465679', 1502120152, '1', 'embung1.jpg', ''),
(3, 'rina', '088654232123', '123@123', 'where', 'danau', 1502120166, '1', 'Danau.jpg', ''),
(4, 'yuda', '12346', '123@123', 'where', '346576', 1502121180, '1', 'sumur.jpg', ''),
(5, 'ddd', '121234564568', 'adschb@ksjcbd', 'sdvdf', '123124346', 1502880786, 'sdfv', 'mataair.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_peraturan`
--

CREATE TABLE `t_peraturan` (
  `ID` int(11) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `NamaPeraturan` varchar(255) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_peraturan`
--

INSERT INTO `t_peraturan` (`ID`, `Kategori`, `NamaPeraturan`, `Tanggal`, `status`, `Link`, `Deskripsi`) VALUES
(1, '', 'SOP Penggalian', 1502119194, 1, 'mataair.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(2, '', 'SOP Penggalian Sumur', 1502120152, 1, 'sumur.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(3, '', 'SOP Penggalian danau', 1502120166, 1, 'danau.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(4, '', 'SOP Penggalian embung', 1502121180, 1, 'embung.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `t_peta`
--

CREATE TABLE `t_peta` (
  `ID` int(11) NOT NULL,
  `MetaData` varchar(5) DEFAULT '',
  `IDMetaData` int(11) DEFAULT NULL,
  `Administrator` varchar(50) NOT NULL,
  `UnitKerja` varchar(100) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `NamaPeta` varchar(255) NOT NULL,
  `Lang` varchar(255) NOT NULL,
  `Lat` varchar(255) NOT NULL,
  `FilePeta3` varchar(255) NOT NULL,
  `Jenis` varchar(20) NOT NULL,
  `Status` varchar(16) NOT NULL,
  `Url` varchar(255) DEFAULT '',
  `Keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_peta`
--

INSERT INTO `t_peta` (`ID`, `MetaData`, `IDMetaData`, `Administrator`, `UnitKerja`, `Tanggal`, `NamaPeta`, `Lang`, `Lat`, `FilePeta3`, `Jenis`, `Status`, `Url`, `Keterangan`) VALUES
(1, '', NULL, 'AdminBali', 'Balai Wilayah Sungai Bali Penida', 1396699702, 'hidrogeologi', '114.54805555555', '-8.3063888889', '', 'Poly', 'Published', '', ''),
(2, '', NULL, 'AdminBali', 'Balai Wilayah Sungai Bali Penida', 1396699724, 'Batuan', '', '', '', 'Poly', 'Published', '', ''),
(3, '', NULL, 'AdminBali', 'Balai Wilayah Sungai Bali Penida', 1396699748, 'Airtanah', '', '', '', 'Point', 'Published', '', ''),
(4, '', NULL, 'AdminBali', 'Balai Wilayah Sungai Bali Penida', 1396699770, 'airbaku', '', '', '', 'Point', 'Published', '', ''),
(5, '', NULL, 'AdminBali', 'Balai Wilayah Sungai Bali Penida', 0, 'Bangunanpelengkap', '', '', '', 'Point', 'Published', '', ''),
(6, '', NULL, 'AdminBali', 'Balai Wilayah Sungai Bali Penida', 0, 'CAT', '', '', '', 'Poly', 'Published', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_ppk`
--

CREATE TABLE `t_ppk` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(60) CHARACTER SET ascii NOT NULL,
  `NoTelp` varchar(14) CHARACTER SET ascii NOT NULL,
  `Email` varchar(60) CHARACTER SET ascii NOT NULL,
  `Alamat` text NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `Golongan` varchar(60) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Dokumen` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ppk`
--

INSERT INTO `t_ppk` (`ID`, `Nama`, `NoTelp`, `Email`, `Alamat`, `NIP`, `Tanggal`, `Golongan`, `Foto`, `Dokumen`) VALUES
(1, 'deni', '088765432123', '123@123', 'where', '123456', 1502119194, '1', 'default_profil.png', ''),
(2, 'fajar', '088755532123', '123@123', 'where', '235465679', 1502120152, '1', 'embung1.jpg', ''),
(3, 'rina', '088654232123', '123@123', 'where', 'danau', 1502120166, '1', 'Danau.jpg', ''),
(4, 'yuda', '12346', '123@123', 'where', '346576', 1502121180, '1', 'sumur.jpg', ''),
(5, 'ddd', '121234564568', 'adschb@ksjcbd', 'sdvdf', '123124346', 1502880786, 'sdfv', 'mataair.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_profil_ppk`
--

CREATE TABLE `t_profil_ppk` (
  `ID` int(10) NOT NULL,
  `Nama` int(60) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Alamat_Kantor` varchar(255) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Satker` varchar(60) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Balai` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Table structure for table `t_strukturorganisasi`
--

CREATE TABLE `t_strukturorganisasi` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `NamaJabatan` varchar(255) NOT NULL,
  `Tanggal` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_strukturorganisasi`
--

INSERT INTO `t_strukturorganisasi` (`ID`, `Nama`, `NamaJabatan`, `Tanggal`, `status`, `Link`, `Deskripsi`) VALUES
(1, 'Dr Ir Hadi', 'Direktur', 1502119194, 1, 'mataair.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(2, 'Moma ST MSi', 'Manajer', 1502120152, 1, 'sumur.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(3, 'Budi ST MSi', 'Staff', 1502120166, 1, 'danau.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum'),
(4, 'Bona SP', 'Staff', 1502121180, 1, 'embung.png', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `t_sumur1`
--

CREATE TABLE `t_sumur1` (
  `ID` int(11) NOT NULL,
  `ID_IDBalai` int(11) NOT NULL,
  `NoData` int(11) NOT NULL,
  `kode_bidang` varchar(100) NOT NULL,
  `kode_dasar` varchar(100) NOT NULL,
  `kode_infra` varchar(100) NOT NULL,
  `nama_das` varchar(100) NOT NULL,
  `nama_ws` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `lintang_selatan` varchar(100) NOT NULL,
  `bujur_timur` varchar(100) NOT NULL,
  `elevasi_sumur` varchar(100) NOT NULL,
  `airbaku_kk` varchar(100) NOT NULL,
  `airbaku_dt` varchar(100) NOT NULL,
  `irigasi` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sumur1`
--

INSERT INTO `t_sumur1` (`ID`, `ID_IDBalai`, `NoData`, `kode_bidang`, `kode_dasar`, `kode_infra`, `nama_das`, `nama_ws`, `provinsi`, `kota`, `kecamatan`, `desa`, `lintang_selatan`, `bujur_timur`, `elevasi_sumur`, `airbaku_kk`, `airbaku_dt`, `irigasi`) VALUES
(1, 2, 1, '109512740001', '1', '', '', '', 'Denpasar', '274', 'Melaya', 'Berawan Tangi', '114.54805555555', '-8.3063888889', '', '', '', '1'),
(2, 2, 2, '109512740002', '1', '', '', '', 'Denpasar', '274', 'Negara', 'Tegal Berkis / Kaliakah', '114.58588888888', '-8.342111111111', '', '', '', '1'),
(3, 2, 3, '109512740003', '1', '', '', '', 'Denpasar', '274', 'Negara', 'Pangkung Liplip / Kaliakah', '114.59258333333', '-8.336083333333', '', '', '', '2'),
(4, 2, 4, '109512820004', '1', '', '', '', 'Denpasar', '274', 'Melaya', 'Berawan Tangi / Tukad Aya', '114.55202777777', '-8.30327777777778', '', '', '', '2'),
(5, 2, 5, '109511110005', '1', '', '', '', 'Denpasar', '274', 'Melaya', 'Berawan Tangi / Tukad Aya', '114.54897222222', '-8.31055555555556', '', '', '', '2'),
(6, 2, 6, '109511120006', '1', '', '', '', 'Denpasar', '274', 'Melaya', 'Berawan Tangi / Tukad Aya', '114.54611111111', '-8.30325', '', '', '', '2'),
(7, 2, 7, '109512740007', '1', '', '', '', 'Denpasar', '274', 'Melaya', 'Berawan Tangi / Tukad Aya', '114.54316666666', '-8.3095', '', '', '', '1'),
(8, 2, 8, '109512220008', '', '', '', '', 'Denpasar', '274', 'Melaya', 'Berawan Tangi / Tukad Aya', '114.54638888888', '-8.31586111111111', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_sumur2`
--

CREATE TABLE `t_sumur2` (
  `ID` int(11) NOT NULL,
  `ID_IDBalaiWa` int(13) NOT NULL,
  `NoDataWa` int(11) NOT NULL,
  `Status1` int(11) NOT NULL,
  `kode_sumur` varchar(11) NOT NULL,
  `kedalaman_sumur` varchar(255) NOT NULL,
  `jenis_sumur` varchar(100) NOT NULL,
  `jenis_pompa` varchar(100) NOT NULL,
  `debit_pemompaan` varchar(255) NOT NULL,
  `tanah_dibebaskan` varchar(255) NOT NULL,
  `bangunan` varchar(255) NOT NULL,
  `jumlah_bangunan` int(11) NOT NULL,
  `status_asettanah` varchar(255) NOT NULL,
  `panjang_jaringan1` varchar(255) NOT NULL,
  `box_pembagi` int(11) NOT NULL,
  `panjang_jaringan2` varchar(255) NOT NULL,
  `sistem_terbuka` varchar(255) NOT NULL,
  `sistem_tertutup` varchar(100) NOT NULL,
  `jumlah_box` varchar(255) NOT NULL,
  `jumlah_splingker` varchar(255) NOT NULL,
  `tahun_pembangunan` varchar(255) NOT NULL,
  `sedang_rehab` varchar(255) NOT NULL,
  `rencana_rehab` varchar(255) NOT NULL,
  `kelembagaan` varchar(255) NOT NULL,
  `status_serahterima` enum('sudah','belum','Dihibahkan') NOT NULL,
  `status` enum('Operasi','Tidak Operasi') NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sumur2`
--

INSERT INTO `t_sumur2` (`ID`, `ID_IDBalaiWa`, `NoDataWa`, `Status1`, `kode_sumur`, `kedalaman_sumur`, `jenis_sumur`, `jenis_pompa`, `debit_pemompaan`, `tanah_dibebaskan`, `bangunan`, `jumlah_bangunan`, `status_asettanah`, `panjang_jaringan1`, `box_pembagi`, `panjang_jaringan2`, `sistem_terbuka`, `sistem_tertutup`, `jumlah_box`, `jumlah_splingker`, `tahun_pembangunan`, `sedang_rehab`, `rencana_rehab`, `kelembagaan`, `status_serahterima`, `status`, `keterangan`) VALUES
(1, 2, 1, 1, 'JTW 1', '', '', 'Sumber sible', '', '', '', 1, '', '', 0, '', '', 'Meneru', '', '', '', '', '', '', 'sudah', 'Operasi', ''),
(2, 2, 2, 1, 'JTW 2', '', '', 'Sumber sible', '', '', '', 1, '', '', 0, '', '', '', '', '', '', '', '', '', 'sudah', 'Operasi', ''),
(3, 2, 3, 1, 'JTW 3', '', '', '', '', '', '', 1, '', '', 0, '', '', '', '', '', '', '', '', '', 'sudah', 'Operasi', ''),
(4, 2, 4, 1, 'JW 4', '', '', 'Sumber sible', '', '', '', 1, '', '', 0, '', '', '', '', '', '', '', '', '', 'sudah', 'Operasi', ''),
(7, 2, 7, 0, 'JW 7', '', '', 'Sumber sible', '', '', '', 1, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 2, 5, 0, 'JW 5', '', '', 'Sumber sible', '', '', '', 1, '', '', 0, '', '', '', '', '', '', '', '', '', 'sudah', 'Operasi', ''),
(6, 2, 6, 0, 'JW 6', '', '', 'Sumber sible', '', '', '', 1, '', '', 0, '', '', '', '', '', '', '', '', '', 'sudah', 'Operasi', ''),
(8, 2, 8, 0, 'JW 8', '', '', 'Sumber sible', '', '', '', 1, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_sumur3`
--

CREATE TABLE `t_sumur3` (
  `ID` int(11) NOT NULL,
  `kondisi_sumur` varchar(100) NOT NULL,
  `kondisi_reservoar` varchar(100) NOT NULL,
  `kondisi_pompa` varchar(100) NOT NULL,
  `kondisi_rumahpompa` varchar(100) NOT NULL,
  `kondisi_boxpembagi` varchar(100) NOT NULL,
  `pipa_airbaku` varchar(255) NOT NULL,
  `pipa_airtanah` varchar(255) NOT NULL,
  `box` varchar(100) NOT NULL,
  `splingker` varchar(255) NOT NULL,
  `kondisi_tenaga` varchar(255) NOT NULL,
  `ID_IDBalaiGa` int(11) NOT NULL,
  `NoDataGa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sumur3`
--

INSERT INTO `t_sumur3` (`ID`, `kondisi_sumur`, `kondisi_reservoar`, `kondisi_pompa`, `kondisi_rumahpompa`, `kondisi_boxpembagi`, `pipa_airbaku`, `pipa_airtanah`, `box`, `splingker`, `kondisi_tenaga`, `ID_IDBalaiGa`, `NoDataGa`) VALUES
(1, '0', '0', '0', '0', '0', '', '', '0', '', 'Baik', 2, 1),
(2, '0', '0', '0', '0', '0', '', '', '0', '', 'Baik', 2, 2),
(3, '0', '0', '0', '0', '0', '', '', '0', '', 'Baik', 2, 3),
(4, '2', '0', '2', '0', '0', '', '', '0', '', 'Baik', 2, 4),
(5, '0', '0', '2', '0', '0', '', '', '0', '', 'Baik', 2, 5),
(6, '0', '0', '2', '0', '0', '', '', '0', '', 'Baik', 2, 6),
(7, '0', '0', '0', '0', '0', '', '', '0', '', 'Baik', 2, 7),
(8, '0', '0', '0', '0', '0', '', '', '0', '', 'Baik', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_sumur4`
--

CREATE TABLE `t_sumur4` (
  `no` int(11) NOT NULL,
  `baku_mutu` varchar(255) NOT NULL,
  `debit_sumur` varchar(255) NOT NULL,
  `konduktivitas` varchar(255) NOT NULL,
  `nilai_storativitas` varchar(255) NOT NULL,
  `nilai_transmisi` varchar(255) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_unitkerja`
--

CREATE TABLE `t_unitkerja` (
  `ID` int(11) NOT NULL,
  `NamaUnitKerja` varchar(255) NOT NULL,
  `ID_Admin` varchar(25) DEFAULT NULL,
  `AlamatUnitKerja` varchar(255) NOT NULL,
  `Provinsi` varchar(100) NOT NULL,
  `KodeProv` int(9) NOT NULL,
  `CakupanWilayahKerja` varchar(255) NOT NULL,
  `Lat` varchar(100) NOT NULL,
  `Lang` varchar(100) NOT NULL,
  `Gambar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_unitkerja`
--

INSERT INTO `t_unitkerja` (`ID`, `NamaUnitKerja`, `ID_Admin`, `AlamatUnitKerja`, `Provinsi`, `KodeProv`, `CakupanWilayahKerja`, `Lat`, `Lang`, `Gambar`) VALUES
(1, 'Balai Wilayah Sungai Bali Penida', '2', 'Denpasar', 'Bali', 510000000, 'WS Bali-Penida\r\n', '-8.3063888889', '114.54805555555', 'Gambar.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `ID_User` int(11) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `HakAkses` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`ID_User`, `Nama`, `Password`, `HakAkses`) VALUES
(1, 'sadmin', 'sadmin', 'Super Administrator'),
(2, 'AdminBali', 'admin01', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_airbaku1`
--
ALTER TABLE `t_airbaku1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_airbaku2`
--
ALTER TABLE `t_airbaku2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_airbaku3`
--
ALTER TABLE `t_airbaku3`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_airbaku4`
--
ALTER TABLE `t_airbaku4`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `t_berita`
--
ALTER TABLE `t_berita`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_galleri`
--
ALTER TABLE `t_galleri`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_kab_kota`
--
ALTER TABLE `t_kab_kota`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_peraturan`
--
ALTER TABLE `t_peraturan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_peta`
--
ALTER TABLE `t_peta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_ppk`
--
ALTER TABLE `t_ppk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_profil_ppk`
--
ALTER TABLE `t_profil_ppk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_strukturorganisasi`
--
ALTER TABLE `t_strukturorganisasi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_sumur1`
--
ALTER TABLE `t_sumur1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_sumur2`
--
ALTER TABLE `t_sumur2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_sumur3`
--
ALTER TABLE `t_sumur3`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_sumur4`
--
ALTER TABLE `t_sumur4`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `t_unitkerja`
--
ALTER TABLE `t_unitkerja`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NamaUnitKerja` (`NamaUnitKerja`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `Nama` (`Nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_airbaku1`
--
ALTER TABLE `t_airbaku1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_airbaku2`
--
ALTER TABLE `t_airbaku2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_airbaku3`
--
ALTER TABLE `t_airbaku3`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_airbaku4`
--
ALTER TABLE `t_airbaku4`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_berita`
--
ALTER TABLE `t_berita`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_galleri`
--
ALTER TABLE `t_galleri`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_kab_kota`
--
ALTER TABLE `t_kab_kota`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;
--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_peraturan`
--
ALTER TABLE `t_peraturan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_peta`
--
ALTER TABLE `t_peta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_ppk`
--
ALTER TABLE `t_ppk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_profil_ppk`
--
ALTER TABLE `t_profil_ppk`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_strukturorganisasi`
--
ALTER TABLE `t_strukturorganisasi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_sumur1`
--
ALTER TABLE `t_sumur1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_sumur2`
--
ALTER TABLE `t_sumur2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_sumur3`
--
ALTER TABLE `t_sumur3`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_sumur4`
--
ALTER TABLE `t_sumur4`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_unitkerja`
--
ALTER TABLE `t_unitkerja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
