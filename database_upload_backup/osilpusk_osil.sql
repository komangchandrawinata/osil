-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2022 at 07:35 PM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osilpusk_osil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `kode_lab` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `kode_lab`) VALUES
(1, 'bakung.1012315', '123456', '1012315'),
(2, 'karang.2316', 'kk123as', '2316');

-- --------------------------------------------------------

--
-- Table structure for table `bakteriologi`
--

CREATE TABLE `bakteriologi` (
  `id_bakteriologi` int(11) NOT NULL,
  `m_tbc` varchar(50) NOT NULL,
  `tcm_tbc` varchar(50) NOT NULL,
  `gonorhae` varchar(50) NOT NULL,
  `malaria` varchar(50) NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bakteriologi`
--

INSERT INTO `bakteriologi` (`id_bakteriologi`, `m_tbc`, `tcm_tbc`, `gonorhae`, `malaria`, `id_hasil`) VALUES
(1, '', '', 'Negatif', 'Negatif', 4),
(2, '', '', 'Negatif', 'Positif', 5),
(3, 'a', 's', 'd', 'f', 20),
(4, 'a', 's', 'd', 'f', 22),
(5, 's', 'd', 'f', 'g', 23),
(6, 'Positif +++', '', '', '', 26),
(7, 'a', '', '', '', 31),
(8, 'a', '', '', '', 31),
(9, 'a', '', '', '', 32),
(10, 'M', 'N', 'O', 'P', 33),
(11, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 52),
(12, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 52),
(13, 'a', 'b', 'c', 'd', 74),
(14, 'a', 'b', 'c', 'd', 74),
(15, 'a', 'b', 'c', 'd', 81),
(17, 'a', '', '', '', 175),
(18, 'a', 'b', 'c', '', 211),
(19, 'A', 'B', 'C', 'D', 222),
(20, 'A', 'B', 'C', 'D', 222),
(21, 'a', 'b', 'c', 'd', 223),
(22, 'a', 'b', 'c', 'd', 228),
(23, 'a', 'b', 'c', 'd', 228),
(24, 'a', 'b', 'c', 'd', 228),
(25, 'a', 'b', 'c', 'd', 228);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(10) NOT NULL,
  `tgl_hasil` date DEFAULT NULL,
  `hematologi` char(10) NOT NULL,
  `urinalisa` char(10) NOT NULL,
  `bakteriologi` char(10) NOT NULL,
  `imunoserologi` char(10) NOT NULL,
  `kimia_klinik` char(10) NOT NULL,
  `no_rm` int(10) NOT NULL,
  `kode_lab` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tgl_hasil`, `hematologi`, `urinalisa`, `bakteriologi`, `imunoserologi`, `kimia_klinik`, `no_rm`, `kode_lab`) VALUES
(0, '2022-01-15', '1', '', '', '', '', 3, '1012315'),
(4, '2021-12-13', '', '', '', '', '', 2112, '1012315'),
(6, '2021-12-13', '', '', '', '', '', 2032, '1012315'),
(7, '2021-12-20', '', '', '', '', '', 3, '1012315'),
(8, '2021-12-20', '', '', '', '', '', 12345, '1012315'),
(11, '2021-12-20', '', '', '', '', '', 12345, '1012315'),
(14, '2021-12-20', '', '', '', '', '', 12345, '1012315'),
(16, '2021-12-20', '', '', '', '', '', 3, '1012315'),
(17, '2021-12-20', '', '', '', '', '', 3, '1012315'),
(19, '2021-12-20', '', '', '', '', '', 2032, '1012315'),
(20, '2021-12-20', '', '', '', '', '', 3, '1012315'),
(21, '2021-12-20', '', '', '', '', '', 3, '1012315'),
(22, '2021-12-20', '', '', '', '', '', 12345, '1012315'),
(23, '2021-12-20', '', '', '', '', '', 1001015, '1012315'),
(24, '2021-12-21', '', '', '', '', '', 3, '1012315'),
(25, '2021-12-21', '', '', '', '', '', 12345, '1012315'),
(26, '2021-12-21', '', '', '', '', '', 34567, '1012315'),
(29, '2021-12-21', '', '', '', '', '', 1001015, '1012315'),
(30, '2021-12-21', '', '', '', '', '', 1001015, '1012315'),
(31, '2021-12-21', '', '', '', '', '', 1001015, '1012315'),
(32, '2021-12-21', '', '', '', '', '', 2112, '1012315'),
(33, '2021-12-21', '', '', '', '', '', 10024034, '1012315'),
(34, '2021-12-21', '', '', '', '', '', 12345, '1012315'),
(36, '2021-12-24', '', '', '', '', '', 12345, '1012315'),
(44, '2022-01-09', '', '', '', '', '', 3, '1012315'),
(49, '2022-01-14', '', '', '', '', '', 3, '1012315'),
(68, '2022-01-15', '1', '1', '', '', '', 2112, '1012315'),
(70, '2022-01-15', '1', '1', '', '', '', 23, '1012315'),
(71, '2022-01-15', '1', '', '', '', '', 14057, '1012315'),
(73, '2022-01-15', '', '1', '', '', '', 1367, '1012315'),
(74, '2022-01-15', '', '', '1', '', '', 10073, '1012315'),
(75, '2022-01-15', '', '', '', '1', '', 13521, '1012315'),
(76, '2022-01-15', '', '', '', '1', '', 13521, '1012315'),
(77, '2022-01-15', '', '', '', '1', '', 13521, '1012315'),
(78, '2022-01-15', '', '', '', '', '1', 10, '1012315'),
(79, '2022-01-15', '', '1', '', '1', '', 3, '1012315'),
(80, '2022-01-15', '', '', '', '', '1', 1802, '1012315'),
(81, '2022-01-15', '1', '1', '1', '1', '1', 14056, '1012315'),
(82, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(83, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(84, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(85, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(86, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(87, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(88, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(89, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(90, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(91, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(92, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(93, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(94, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(95, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(96, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(97, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(98, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(99, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(100, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(102, '2022-01-15', '1', '1', '', '', '', 3, '1012315'),
(103, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(104, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(105, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(106, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(107, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(108, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(109, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(110, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(111, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(112, '2022-01-15', '', '', '1', '1', '1', 3, '1012315'),
(113, '2022-01-15', '1', '1', '1', '', '', 3, '1012315'),
(114, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(115, '2022-01-15', '1', '', '', '', '', 3, '1012315'),
(116, '2022-01-15', '1', '1', '', '', '', 3, '1012315'),
(117, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(118, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(119, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(120, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(121, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(122, '2022-01-15', '', '', '', '1', '1', 3, '1012315'),
(123, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(124, '2022-01-15', '1', '1', '', '', '', 3, '1012315'),
(125, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(126, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(127, '2022-01-15', '1', '1', '', '', '', 3, '1012315'),
(128, '2022-01-15', '1', '', '', '', '', 3, '1012315'),
(129, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(130, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(131, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(132, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(133, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(134, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(135, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(136, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(137, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(138, '2022-01-15', '1', '', '', '', '', 3, '1012315'),
(139, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(140, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(141, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(142, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(143, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(144, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(145, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(146, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(147, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(148, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(149, '2022-01-15', '', '1', '', '', '', 3, '1012315'),
(150, '2022-01-15', '', '1', '', '', '1', 3, '1012315'),
(151, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(152, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(153, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(154, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(155, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(156, '2022-01-15', '', '', '', '', '', 3, '1012315'),
(158, '2022-01-15', '1', '', '', '', '', 14057, '1012315'),
(159, '2022-01-15', '1', '', '', '', '', 10, '1012315'),
(175, '2022-01-17', '1', '1', '1', '1', '1', 14057, '1012315'),
(176, '2022-01-17', '1', '', '', '', '', 23, '1012315'),
(212, '2022-01-22', '', '', '', '', '', 3, '1012315'),
(213, '2022-01-22', '', '', '', '', '', 3, '1012315'),
(214, '2022-01-22', '', '', '', '', '', 3, '1012315'),
(215, '2022-01-22', '', '', '', '', '', 3, '1012315'),
(216, '2022-01-22', '1', '', '1', '', '', 3, '1012315'),
(217, '2022-01-22', '1', '', '1', '', '', 3, '1012315'),
(218, '2022-01-22', '1', '1', '1', '1', '1', 3, '1012315'),
(219, '2022-01-22', '1', '', '', '', '', 3, '1012315'),
(220, '2022-01-22', '', '1', '', '', '', 3, '1012315'),
(221, '2022-01-22', '', '1', '', '', '', 3, '1012315'),
(222, '2022-01-22', '', '', '1', '', '', 3, '1012315'),
(223, '2022-01-23', '', '', '1', '', '', 3, '1012315'),
(224, '2022-01-23', '', '', '1', '', '', 3, '1012315'),
(225, '2022-01-23', '1', '', '1', '', '', 3, '1012315'),
(226, '2022-01-23', '', '', '', '', '1', 3, '1012315'),
(227, '2022-01-23', '', '', '1', '', '', 3, '1012315'),
(228, '2022-01-23', '', '', '1', '', '', 3, '1012315'),
(229, '2022-01-23', '', '', '', '1', '', 3, '1012315'),
(230, '2022-01-23', '', '', '', '', '1', 3, '1012315'),
(231, '2022-01-23', '', '', '', '', '1', 3, '1012315'),
(232, '2022-01-23', '', '', '', '', '1', 3, '1012315'),
(233, '2022-01-26', '1', '', '', '', '', 121, '1012315'),
(234, '2022-01-27', '1', '', '', '', '', 12345, '1012315'),
(235, '2022-01-27', '', '', '', '1', '1', 680680, '1012315'),
(236, '2022-01-27', '1', '1', '1', '1', '1', 680680, '1012315'),
(237, '2022-01-27', '', '', '', '1', '', 3, '1012315'),
(238, '2022-02-02', '', '', '', '1', '', 23, '1012315');

-- --------------------------------------------------------

--
-- Table structure for table `hematologi`
--

CREATE TABLE `hematologi` (
  `id_hematologi` int(11) NOT NULL,
  `haemoglobin` char(20) NOT NULL,
  `hematokrit` char(20) NOT NULL,
  `eritrosit_h` char(20) NOT NULL,
  `leukosit_h` char(20) NOT NULL,
  `trombosit` char(20) NOT NULL,
  `laju_endap` char(20) NOT NULL,
  `basofil` char(20) NOT NULL,
  `eosinofil` char(20) NOT NULL,
  `staf` char(20) NOT NULL,
  `segmen` char(20) NOT NULL,
  `limfosit` char(20) NOT NULL,
  `monosit` char(20) NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hematologi`
--

INSERT INTO `hematologi` (`id_hematologi`, `haemoglobin`, `hematokrit`, `eritrosit_h`, `leukosit_h`, `trombosit`, `laju_endap`, `basofil`, `eosinofil`, `staf`, `segmen`, `limfosit`, `monosit`, `id_hasil`) VALUES
(2, '6.00000', '12', '1', '4', '3', '6', '0', '6', '0', '12', '0', '3', 4),
(3, '9.99999', '0', '0', '7500', '0', '0', '0', '0', '0', '0', '0', '0', 8),
(4, '9.99999', '2', '21', '0', '0', '2', '0', '0', '0', '0', '12', '0', 12),
(5, '9.99999', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 14),
(6, '9.99999', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 15),
(7, '12,5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 16),
(8, '12.000,90', '', '', '', '', '', '', '', '', '', '', '', 17),
(9, '12,5', '15,6', '1,2', '2,4', '5,2', '3,5', '2,8', '8,9', '900,9', '50,9', '7,9', '68,0', 21),
(10, '12,5', '1,2', '2,5', '4,6', '4,2', '2,1', '5,4', '4,6', '5,1', '2,2', '3,6', '2,5', 22),
(11, '12,5', '1,2', '2,5', '3,4', '2,1', '6,5', '4,7', '3,6', '4,8', '9,0', '100,8', '8,6', 23),
(12, '12,5', '', '', '7500', '', '', '', '', '', '', '', '', 25),
(13, '12,5', '1', '6', '4', '', '', '', '', '', '', '', '', 28),
(14, '12,5', '1', '6', '4', '', '', '', '', '', '', '', '', 28),
(15, '12,5', '', '', '', '', '', '', '', '', '', '', '', 29),
(16, '3', '', '', '', '', '', '', '', '', '', '', '', 30),
(17, '12,5', '', '', '', '', '', '', '', '', '', '', '', 31),
(18, '12,5', '', '', '', '', '', '', '', '', '', '', '', 32),
(19, '12,4', '32,4', '10000,800', '34,56', '67,9', '188,9', '12,78', '8,4', '19,8', '100920,56', '12,871', '123,6', 33),
(20, '12,5', '41', '5,5', '8000', '200000', '10', '0', '0', '2', '3', '40', '70', 34),
(21, '10', '20', '30', '40', '50', '60', '70', '80', '90', '101', '102', '103', 50),
(22, '10', '20', '30', '40', '50', '60', '70', '80', '90', '101', '102', '103', 50),
(23, '101', '102', '103', '104', '105', '106', '107', '108', '109', '110', '111', '112', 52),
(26, '100', '12', '12', '1003', '1004', '12', '12', '1007', '1008', '1009', '10010', '12', 70),
(27, '100', '12', '2,5', '1003', '1004', '8', '7', '10', '6', '10', '6', '13', 71),
(28, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 81),
(29, '12,5', '', '', '', '', '', '', '', '', '', '', '', 157),
(30, '11', '', '12', '', '13', '', '14', '', '15', '', '16', '', 158),
(31, '', '', '', '', '', '6', '', '', '', '', '', '', 159),
(33, '1', '', '', '', '', '', '2', '', '', '', '', '', 175),
(34, '1', '', '', '', '', '', '', '', '', '', '', '', 176),
(35, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 219),
(36, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 219),
(37, '21', '20', '32', '12', '1', '', '', '', '', '', '', '', 233),
(38, '12,5', '', '', '', '', '', '', '', '', '', '', '', 234);

-- --------------------------------------------------------

--
-- Table structure for table `imunoserologi`
--

CREATE TABLE `imunoserologi` (
  `id_serologi` int(11) NOT NULL,
  `hcg` char(20) NOT NULL,
  `igg_dengue` char(20) NOT NULL,
  `igm_dengue` char(20) NOT NULL,
  `hbsag` char(20) NOT NULL,
  `hiv` char(20) NOT NULL,
  `rdt_syphilis` char(20) NOT NULL,
  `rpr` char(20) NOT NULL,
  `hcv` char(20) NOT NULL,
  `gol_darah` char(20) NOT NULL,
  `s_thiphi_o` char(20) NOT NULL,
  `s_parathipy_ao` char(20) NOT NULL,
  `s_parathipy_bo` char(20) NOT NULL,
  `s_parathipy_co` char(20) NOT NULL,
  `s_thiphi_h` char(20) NOT NULL,
  `s_parathipy_ah` char(20) NOT NULL,
  `s_parathipy_bh` char(20) NOT NULL,
  `s_parathipy_ch` char(20) NOT NULL,
  `igg_covid` char(20) NOT NULL,
  `igm_covid` char(20) NOT NULL,
  `agcovid` char(20) NOT NULL,
  `tifoid` char(20) NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imunoserologi`
--

INSERT INTO `imunoserologi` (`id_serologi`, `hcg`, `igg_dengue`, `igm_dengue`, `hbsag`, `hiv`, `rdt_syphilis`, `rpr`, `hcv`, `gol_darah`, `s_thiphi_o`, `s_parathipy_ao`, `s_parathipy_bo`, `s_parathipy_co`, `s_thiphi_h`, `s_parathipy_ah`, `s_parathipy_bh`, `s_parathipy_ch`, `igg_covid`, `igm_covid`, `agcovid`, `tifoid`, `id_hasil`) VALUES
(1, 'Positif', 'Negatif', 'Negatif', 'Negatif', 'Non Reaktif', 'Negatif', 'Negatif', 'Negatif', 'A', 'Negatif', 'Negatif', 'Negatif', '', 'Negatif', '', '', '', 'Reaktif', 'Non Reaktif', 'Non Reaktif', 'Negatif', 4),
(2, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Non Reaktif', 'Negatif', 'Negatif', 'Negatif', 'AB', 'Negatif', 'Negatif', 'Negatif', '', 'Negatif', '', '', '', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Negatif', 6),
(3, 'Positif', 'Negatif', 'Negatif', 'Negatif', 'Non Reaktif', 'Negatif', 'Negatif', 'Negatif', 'B', 'Negatif', 'Negatif', 'Negatif', '', 'Negatif', '', '', '', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Negatif', 7),
(4, '-', 'Positif', 'Negatif', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '-', '', '', '', '-', '-', '-', '-', 8),
(5, 'Negatif', 'Negatif', 'Negatif', '-', 'Non Reaktif', 'Negatif', 'Negatif', 'Negatif', 'A', 'Negatif', 'Negatif', 'Negatif', '', 'Negatif', '', '', '', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Negatif', 23),
(6, 'Negatif', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '-', '', '', '', '-', '-', '-', '-', 31),
(7, 'Negatif', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '-', '', '', '', '-', '-', '-', '-', 31),
(8, 'Negatif', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '-', '', '', '', '-', '-', '-', '-', 31),
(9, 'Negatif', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '-', '', '', '', '-', '-', '-', '-', 31),
(10, 'Negatif', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '-', '', '', '', '-', '-', '-', '-', 32),
(11, 'Negatif', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '-', '', '', '', '-', '-', '-', '-', 32),
(12, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Non Reaktif', 'Negatif', 'Negatif', 'Negatif', 'B', 'Negatif', 'Negatif', 'Negatif', '', 'Negatif', '', '', '', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Negatif', 33),
(13, 'Negatif 1', 'Negatif 2', 'Negatif 3', 'Negatif 4', 'Negatif 5', 'Negatif 6', 'Negatif 7', 'Negatif 8', 'B', 'Negatif 9', 'Negatif 10', 'Negatif 11', '', 'Negatif 12', '', '', '', 'Negatif 13', 'Negatif 14', 'Negatif 15', 'Negatif 16', 52),
(14, 'Negatif 1', 'Negatif 2', 'Negatif 3', 'Negatif 4', 'Negatif 5', 'Negatif 6', 'Negatif 7', 'Negatif 8', 'B', 'Negatif 9', 'Negatif 10', 'Negatif 11', '', 'Negatif 12', '', '', '', 'Negatif 13', 'Negatif 14', 'Negatif 15', 'Negatif 16', 52),
(15, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', '', 'm', '', '', '', 'n', 'o', 'p', 'q', 77),
(16, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', '', 'm', '', '', '', 'n', 'o', 'p', 'q', 77),
(17, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', '', 'm', '', '', '', 'n', 'o', 'p', 'q', 77),
(18, 'q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'l', 'k', '', 'j', '', '', '', 'h', 'g', 'f', 'd', 79),
(19, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', '', 'm', '', '', '', 'n', 'o', 'p', 'q', 81),
(20, 'a', 'b', '', 'c', '', '', '', '', '', 'd', '', '', '', '', '', '', '', 'e', '', 'f', '', 174),
(21, 'a', 'b', '', 'c', '', '', '', '', '', 'd', '', '', '', '', '', '', '', 'e', '', 'f', '', 175),
(22, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 212),
(23, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 238);

-- --------------------------------------------------------

--
-- Table structure for table `kimia_klinik`
--

CREATE TABLE `kimia_klinik` (
  `id_kd` int(11) NOT NULL,
  `gl_sewaktu` char(20) NOT NULL,
  `gl_puasa` char(20) NOT NULL,
  `gl_pp` char(20) NOT NULL,
  `cholesterol` char(20) NOT NULL,
  `hdl` char(20) NOT NULL,
  `ldl` char(20) NOT NULL,
  `trigliserida` char(20) NOT NULL,
  `sgot` char(20) NOT NULL,
  `sgpt` char(20) NOT NULL,
  `ureum` char(20) NOT NULL,
  `creatinin` char(20) NOT NULL,
  `asam_urat` char(20) NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kimia_klinik`
--

INSERT INTO `kimia_klinik` (`id_kd`, `gl_sewaktu`, `gl_puasa`, `gl_pp`, `cholesterol`, `hdl`, `ldl`, `trigliserida`, `sgot`, `sgpt`, `ureum`, `creatinin`, `asam_urat`, `id_hasil`) VALUES
(1, '0', '48', '49', '0', '0', '0', '0', '0', '0', '55', '0', '0', 4),
(2, '49', '47', '48', '50', '0', '0', '52', '55', '6', '53', '54', '5', 23),
(3, '0', '47', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 31),
(4, '0', '47', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 32),
(5, '70', '100', '400', '80', '0', '0', '67', '98', '45', '77', '78', '90', 33),
(1, '0', '48', '49', '0', '0', '0', '0', '0', '0', '55', '0', '0', 4),
(2, '49', '47', '48', '50', '0', '0', '52', '55', '6', '53', '54', '5', 23),
(3, '0', '47', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 31),
(4, '0', '47', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 32),
(5, '70', '100', '400', '80', '0', '0', '67', '98', '45', '77', '78', '90', 33),
(0, '61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71', '72', 52),
(0, '61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71', '72', 52),
(0, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 80),
(0, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 80),
(0, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 81),
(0, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 174),
(0, '1', '', '', '', '', '', '', '', '', '', '', '', 175),
(0, '1', '62', '', '', '', '', '', '', '', '', '54', '', 211),
(0, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 232),
(0, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 232),
(0, '', '', '', '', '', '', '', '60', '150', '', '', '', 235);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_rm` int(10) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `j_kelamin` char(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `j_pasien` varchar(50) NOT NULL,
  `ruangan` char(50) NOT NULL,
  `dokter_rujukan` varchar(50) NOT NULL,
  `kode_lab` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tgl_lahir`, `j_kelamin`, `alamat`, `j_pasien`, `ruangan`, `dokter_rujukan`, `kode_lab`) VALUES
(3, 'Sinta Dewi Putri', '1987-01-08', 'Perempuan', 'Bandar Lampung', 'Umum', 'Umum', 'dr. Watik Anggraini, S.Ked., M.Sp.', '1012315'),
(10, 'doni lega', '2021-12-01', 'Laki-laki', 'jalan rawajitu lampung', 'BPJS', 'bunga', 'dr. boni romi', '1012315'),
(23, 'Silvan Sintia Bella Mustika Sari', '1994-08-16', 'Perempuan', 'Perum Grand Cakra Wala RT 012/ RW 054, Kel. Gedong', 'Umum', 'Poli Umum', 'dr. Marino Steven, S.Ked.', '1012315'),
(121, 'Arka denia', '2004-01-13', 'Laki-laki', 'Jalan gunung 3 rawajitu', 'BPJS', 'Anggrek', 'Dr. Parman. S.sc', '1012315'),
(1367, 'Marselina Rusmini', '1974-08-10', 'Perempuan', 'Jl. Minak Sangaji No.1, Kec. Kemiling 35153', 'Umum', 'Poli Umum', 'dr. Marino Steven, S.Ked.', '1012315'),
(1802, 'Lamastoti Ull', '1994-08-10', 'Laki-laki', 'Jl. Minak Sangaji No.1, Kec. Kemiling 35153', 'Umum', 'Poli Umum', 'dr. Marino Steven, S.Ked.', '1012315'),
(2032, 'Sunaryo Eman', '1972-11-05', 'Laki-laki', 'BKP Kemiling', 'Umum', 'Umum', 'dr. Slavina Morina, S.Ked., M.SP.', '1012315'),
(2112, 'Melani Ricardo Sinaga', '1997-12-08', 'Perempuan', 'Jl. Minak Sangaji No.1, Kec. Kemiling 35153', 'BPJS', 'Umum', 'dr. Nagita Slavina, S.Ked., M.Sp', '1012315'),
(10073, 'Kevin Joan', '1984-08-10', 'Laki-laki', 'Perum Grand Cakra Wala RT 012/ RW 054, Kel. Gedong', 'P2KM', 'Poli Umum', 'dr. Marino Steven, S.Ked.', '1012315'),
(12345, 'Ray Ozma', '1992-02-27', 'Laki-laki', 'Sukaraja', 'BPJS', 'Poli Umum', 'dr. Haris Purnama', '1012315'),
(13521, 'Dhika Permana', '2004-08-10', 'Laki-laki', 'Perum Grand Cakra Wala RT 012/ RW 054, Kel. Gedong', 'BPJS', 'Poli Anak', 'dr. Marino Steven, S.Ked.', '1012315'),
(14056, 'Archana Putra', '2021-11-10', 'Laki-laki', 'Perum Grand Cakra Wala RT 012/ RW 054, Kel. Gedong', 'BPJS', 'Poli Anak', 'dr. Marino Steven, S.Ked.', '1012315'),
(14057, 'Rasya Rivana', '2008-11-13', 'Perempuan', 'Perum Grand Cakra Wala RT 012/ RW 054, Kel. Gedong', 'Umum', 'Poli Umum', 'dr. Marino Steven, S.Ked.', '1012315'),
(34567, 'Johannes Sianturi', '1992-05-23', 'Laki-laki', 'Sukarame', 'P2KM', 'UGD', 'dr. Bilal Indrajaya', '1012315'),
(680680, 'Raden Pramuji', '1995-02-25', 'Laki-laki', 'Kedaton', 'Umum', 'Poli Umum', 'dr. Crush On You', '1012315'),
(1001015, 'Gala Sky', '2020-06-19', 'Laki-laki', 'Enggal, Teluk Betung', 'Umum', 'Umum', 'dr. Nagita Slavina, S.Ked., M.Sp', '1012315'),
(10024034, 'Sinanggar Tulo', '1982-05-06', 'Laki-laki', 'Sirampet. Teluk', 'P2KM', 'Umum', 'dr. Sunarya Eman, S.Ked.', '1012315'),
(12345555, 'Mogi', '1999-12-09', 'Perempuan', 'Duren Kelapa', 'BPJS', 'Umum', 'dr. Arba Dharma Nugraha, S.T., M.Pd., M.Ag ', '1012315');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `kode_lab` char(20) NOT NULL,
  `petugas_lab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `kode_lab`, `petugas_lab`) VALUES
(1, 'nanang.1012315', '123456', '1012315', 'Nanang Sutrisna Kusuma, S.Tr.Kes'),
(2, 'bara.1012315', '234567', '1012315', 'Kumbara Basudara'),
(3, 'iwan.1012315', '123456', '1012315', 'Iwan Sariyanto, S.ST., M.Si'),
(4, 'nurindah.1012315', '123456', '1012315', 'Nurindah Putri'),
(5, 'marlin.1012315', '123456', '1012315', 'Marlin Setianingsih');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nama_puskes` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `telp` char(20) NOT NULL,
  `email` char(50) NOT NULL,
  `fb` char(50) NOT NULL,
  `ig` char(50) NOT NULL,
  `kode_lab` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `nama_puskes`, `alamat`, `kode_pos`, `telp`, `email`, `fb`, `ig`, `kode_lab`) VALUES
(1, 'UPT PUSKESMAS BAKUNG', 'Jl. Kamboja No 1 Kel Bakung Teluk betung barat', 35238, '082278744911', '-', '-', '-', '1012315'),
(2, 'UPT PUSKESMAS RAWAT INAP KOTA KARANG', 'Jl. Teluk Ratai No.18 Kel. Kotakarang, Kec. Teluk Betung Timur', 35231, '(0721)480129', '', '', '', '2316');

-- --------------------------------------------------------

--
-- Table structure for table `urinalisa`
--

CREATE TABLE `urinalisa` (
  `id_urinalisa` int(11) NOT NULL,
  `warna` char(20) NOT NULL,
  `kejernihan` char(20) NOT NULL,
  `leukosit_u` char(20) NOT NULL,
  `keton` char(20) NOT NULL,
  `nitrit` char(20) NOT NULL,
  `urobilinogen` char(20) NOT NULL,
  `bilirubin` char(20) NOT NULL,
  `protein` char(20) NOT NULL,
  `glukosa_r` char(20) NOT NULL,
  `berat_jenis` char(20) NOT NULL,
  `ph` char(20) NOT NULL,
  `leukosit_s` char(20) NOT NULL,
  `eritrosit_s` char(20) NOT NULL,
  `epitel` char(20) NOT NULL,
  `kristal` char(20) NOT NULL,
  `silinder` char(20) NOT NULL,
  `bakteri` char(20) NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urinalisa`
--

INSERT INTO `urinalisa` (`id_urinalisa`, `warna`, `kejernihan`, `leukosit_u`, `keton`, `nitrit`, `urobilinogen`, `bilirubin`, `protein`, `glukosa_r`, `berat_jenis`, `ph`, `leukosit_s`, `eritrosit_s`, `epitel`, `kristal`, `silinder`, `bakteri`, `id_hasil`) VALUES
(1, 'Kuning', 'Jernih', 'Positif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', 'Positif', '22', '6', '25', '26', '27', '0', '0', '0', 2),
(2, 'Tidak Kuning', 'Jernih', 'Positif', 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif', '24', '7', '26', '6', '3', '0', '0', '0', 4),
(3, 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', '1', '2', '3', '4', '5', '0', '0', '0', 19),
(4, 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', '1', '2', '3', '4', '5', '6', '7', '8', 19),
(5, 'q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', '1', '2', '3', '4', '5', '6', '7', '8', 20),
(6, 'q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', '1', '2', '3', '4', '5', '6', '7', '8', 20),
(7, 'q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', '1', '2', '3', '4', '5', '6', '7', '8', 22),
(8, 'z', 'x', 'c', 'v', 'b', 'n', 'm', 'l', 'k', '0', '9', '8', '7', '6', '5', '4', '3', 23),
(9, 'p', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', 31),
(10, 'p', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', 31),
(11, 'ada', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', 32),
(12, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', '1', '2', '3', '4', '5', '6', '7', '8', 33),
(13, 'Kuning', 'Jernih', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '0', '0', '0', 52),
(14, 'Kuning', 'Jernih', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '0', '0', '0', 52),
(16, 'Kuning', 'Jernih', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '0', '0', '0', 73),
(17, 'Kuning', 'Jernih', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '0', '0', '0', 73),
(18, 'Kuning', 'Jernih', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '0', '0', '0', 73),
(19, 'm', 'n', 'b', 'v', 'c', 'x', 'z', 'a', 's', '0', '0', '0', '0', '0', '0', '0', '0', 79),
(20, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', '1', '2', '3', '4', '5', '6', '7', '8', 81),
(22, 'a', '', 'b', '', '', '', '', '', '', '', '', 'c', '', '', '', '', '', 175),
(23, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 221),
(24, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', '', '', '', 221),
(25, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', '', '', '', 221);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bakteriologi`
--
ALTER TABLE `bakteriologi`
  ADD PRIMARY KEY (`id_bakteriologi`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `hematologi`
--
ALTER TABLE `hematologi`
  ADD PRIMARY KEY (`id_hematologi`);

--
-- Indexes for table `imunoserologi`
--
ALTER TABLE `imunoserologi`
  ADD PRIMARY KEY (`id_serologi`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `urinalisa`
--
ALTER TABLE `urinalisa`
  ADD PRIMARY KEY (`id_urinalisa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bakteriologi`
--
ALTER TABLE `bakteriologi`
  MODIFY `id_bakteriologi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `hematologi`
--
ALTER TABLE `hematologi`
  MODIFY `id_hematologi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `imunoserologi`
--
ALTER TABLE `imunoserologi`
  MODIFY `id_serologi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `urinalisa`
--
ALTER TABLE `urinalisa`
  MODIFY `id_urinalisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
