-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 05:45 AM
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
-- Structure for view `video`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `video` AS select `t_mataair7`.`video` AS `video` from `t_mataair7` union all select `t_hujan6`.`video` AS `video` from `t_hujan6` union all select `t_mataair7`.`video` AS `video` from `t_mataair7` union all select `t_sumur7`.`video` AS `video` from `t_sumur7` union all select `t_tampungan7`.`video` AS `video` from `t_tampungan7` union all select `t_permukaan7`.`video` AS `video` from `t_permukaan7` where ((`t_permukaan7`.`video` is not null) or (`t_permukaan7`.`video` <> ''));

--
-- VIEW  `video`
-- Data: None
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
