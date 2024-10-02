-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 02:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osil`
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
(1, 'bakung.1012315', '123456', '1012315');

-- --------------------------------------------------------

--
-- Table structure for table `bakteriologi`
--

CREATE TABLE `bakteriologi` (
  `id_bakteriologi` int(11) NOT NULL,
  `gonorhae` varchar(50) NOT NULL,
  `pmm` varchar(50) NOT NULL,
  `malaria` varchar(50) NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bakteriologi`
--

INSERT INTO `bakteriologi` (`id_bakteriologi`, `gonorhae`, `pmm`, `malaria`, `id_hasil`) VALUES
(1, 'Negatif', 'Negatif', 'Negatif', 4),
(2, 'Negatif', 'Negatif', 'Positif', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(10) NOT NULL,
  `tgl_hasil` date DEFAULT NULL,
  `no_rm` int(10) NOT NULL,
  `kode_lab` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tgl_hasil`, `no_rm`, `kode_lab`) VALUES
(1, '2021-12-12', 1, '1012315'),
(2, '2021-12-12', 1, '1012315'),
(3, '2021-12-13', 1, '1012315'),
(4, '2021-12-13', 2112, '1012315'),
(5, '2021-12-13', 1, '1012315'),
(6, '2021-12-13', 2032, '1012315');

-- --------------------------------------------------------

--
-- Table structure for table `hematologi`
--

CREATE TABLE `hematologi` (
  `id_hematologi` int(11) NOT NULL,
  `haemoglobin` float NOT NULL,
  `hematokrit` float NOT NULL,
  `eritrosit_h` float NOT NULL,
  `leukosit_h` float NOT NULL,
  `trombosit` float NOT NULL,
  `laju_endap` float NOT NULL,
  `basofil` float NOT NULL,
  `eosinofil` float NOT NULL,
  `staf` float NOT NULL,
  `segmen` float NOT NULL,
  `limfosit` float NOT NULL,
  `monosit` float NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hematologi`
--

INSERT INTO `hematologi` (`id_hematologi`, `haemoglobin`, `hematokrit`, `eritrosit_h`, `leukosit_h`, `trombosit`, `laju_endap`, `basofil`, `eosinofil`, `staf`, `segmen`, `limfosit`, `monosit`, `id_hasil`) VALUES
(1, 1, 2, 3, 4, 6, 6, 7, 8, 9, 12, 11, 6, 1),
(2, 6, 12, 1, 4, 3, 6, 0, 6, 0, 12, 0, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kimia_darah`
--

CREATE TABLE `kimia_darah` (
  `id_kd` int(11) NOT NULL,
  `gl_puasa` float NOT NULL,
  `gl_pp` float NOT NULL,
  `gl_sewaktu` float NOT NULL,
  `cholesterol` float NOT NULL,
  `asam_urat` int(11) NOT NULL,
  `trigliserida` float NOT NULL,
  `ureum` float NOT NULL,
  `creatinin` float NOT NULL,
  `sgot` float NOT NULL,
  `sgpt` float NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kimia_darah`
--

INSERT INTO `kimia_darah` (`id_kd`, `gl_puasa`, `gl_pp`, `gl_sewaktu`, `cholesterol`, `asam_urat`, `trigliserida`, `ureum`, `creatinin`, `sgot`, `sgpt`, `id_hasil`) VALUES
(1, 48, 49, 0, 0, 0, 0, 55, 0, 0, 0, 4);

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
(1, 'Jaja Raharja', '1998-11-26', 'Laki-laki', 'Jl. Minak Sangaji No.1, Kec. Kemiling 35153', 'P2KM', 'Umum', 'dr. Slavina Morina, S.Ked., M.SP.', '1012315'),
(2032, 'Sunaryo Eman', '1972-11-05', 'Laki-laki', 'BKP Kemiling', 'Umum', 'Umum', 'dr. Slavina Morina, S.Ked., M.SP.', '1012315'),
(2112, 'Melani Ricardo Sinaga', '1997-12-08', 'Perempuan', 'Jl. Minak Sangaji No.1, Kec. Kemiling 35153', 'BPJS', 'Umum', 'dr. Nagita Slavina, S.Ked., M.Sp', '1012315');

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
(2, 'bara.1012315', '234567', '1012315', 'Kumbara Basudara');

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
(1, 'UPT PUSKESMAS BAKUNG', 'Jl. Kamboja No 1 Kel Bakung Teluk betung barat', 35238, '082278744911', '-', '-', '-', '1012315');

-- --------------------------------------------------------

--
-- Table structure for table `serologi`
--

CREATE TABLE `serologi` (
  `id_serologi` int(11) NOT NULL,
  `tes_kehamilan` char(20) NOT NULL,
  `ig_g` char(20) NOT NULL,
  `ig_m` char(20) NOT NULL,
  `hbsag` char(20) NOT NULL,
  `hiv` char(20) NOT NULL,
  `rdt_syphilis` char(20) NOT NULL,
  `rpr` char(20) NOT NULL,
  `hcv` char(20) NOT NULL,
  `gol_darah` char(20) NOT NULL,
  `s_thiphi_o` char(20) NOT NULL,
  `s_parathipy_ao` char(20) NOT NULL,
  `s_parathipy_bo` char(20) NOT NULL,
  `s_thiphi_h` char(20) NOT NULL,
  `igg` char(20) NOT NULL,
  `igm` char(20) NOT NULL,
  `agcovid` char(20) NOT NULL,
  `tifoid` char(20) NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serologi`
--

INSERT INTO `serologi` (`id_serologi`, `tes_kehamilan`, `ig_g`, `ig_m`, `hbsag`, `hiv`, `rdt_syphilis`, `rpr`, `hcv`, `gol_darah`, `s_thiphi_o`, `s_parathipy_ao`, `s_parathipy_bo`, `s_thiphi_h`, `igg`, `igm`, `agcovid`, `tifoid`, `id_hasil`) VALUES
(1, 'Positif', 'Negatif', 'Negatif', 'Negatif', 'Non Reaktif', 'Negatif', 'Negatif', 'Negatif', 'A', 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Reaktif', 'Non Reaktif', 'Non Reaktif', 'Negatif', 4),
(2, 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Non Reaktif', 'Negatif', 'Negatif', 'Negatif', 'AB', 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Non Reaktif', 'Non Reaktif', 'Non Reaktif', 'Negatif', 6);

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
  `berat_jenis` int(11) NOT NULL,
  `ph` int(11) NOT NULL,
  `leukosit_s` int(11) NOT NULL,
  `eritrosit_s` int(11) NOT NULL,
  `epitel` int(11) NOT NULL,
  `id_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urinalisa`
--

INSERT INTO `urinalisa` (`id_urinalisa`, `warna`, `kejernihan`, `leukosit_u`, `keton`, `nitrit`, `urobilinogen`, `bilirubin`, `protein`, `glukosa_r`, `berat_jenis`, `ph`, `leukosit_s`, `eritrosit_s`, `epitel`, `id_hasil`) VALUES
(1, 'Kuning', 'Jernih', 'Positif', 'Negatif', 'Positif', 'Negatif', 'Negatif', 'Negatif', 'Positif', 22, 6, 25, 26, 27, 2),
(2, 'Tidak Kuning', 'Jernih', 'Positif', 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif', 'Negatif', 24, 7, 26, 6, 3, 4);

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
-- Indexes for table `kimia_darah`
--
ALTER TABLE `kimia_darah`
  ADD PRIMARY KEY (`id_kd`);

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
-- Indexes for table `serologi`
--
ALTER TABLE `serologi`
  ADD PRIMARY KEY (`id_serologi`);

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
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bakteriologi`
--
ALTER TABLE `bakteriologi`
  MODIFY `id_bakteriologi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hematologi`
--
ALTER TABLE `hematologi`
  MODIFY `id_hematologi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kimia_darah`
--
ALTER TABLE `kimia_darah`
  MODIFY `id_kd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `serologi`
--
ALTER TABLE `serologi`
  MODIFY `id_serologi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `urinalisa`
--
ALTER TABLE `urinalisa`
  MODIFY `id_urinalisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
