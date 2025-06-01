-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 06:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kuliah`
--

CREATE TABLE `kuliah` (
  `Kode_MK` varchar(10) NOT NULL,
  `Nama_MK` varchar(30) DEFAULT NULL,
  `SKS` int(11) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuliah`
--

INSERT INTO `kuliah` (`Kode_MK`, `Nama_MK`, `SKS`, `Semester`) VALUES
('IF32101', 'Algoritma dan Pemograman II', 2, 2),
('IF32209', 'Kalkulus II', 3, 2),
('IF33217', 'Organisasi Komputer', 3, 3),
('IF33302', 'Pemograman I', 2, 3),
('IF34222', 'Struktur Data', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` int(11) NOT NULL,
  `Nama` varchar(20) DEFAULT NULL,
  `TTL` date DEFAULT NULL,
  `JK` char(1) DEFAULT NULL,
  `Alamat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `TTL`, `JK`, `Alamat`) VALUES
(10106001, 'Arya Santoso', '1983-12-01', 'L', 'Dago - Bandung'),
(10106002, 'Astrid Ardia', '1984-04-23', 'P', 'Noinden - Surabaya'),
(10106003, 'Budi Arga', '1984-10-24', 'L', 'Cicaheum - Bandung'),
(10106004, 'Dini Andari', '1983-01-23', 'P', 'Menteng - Jakarta'),
(10106005, 'Dwi Ciska', '1985-12-29', 'P', 'Merdeka - Malang'),
(10106006, 'Edi Prastowo', '1984-07-07', 'L', 'Dago - Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `NIM` int(11) DEFAULT NULL,
  `Kode_MK` varchar(10) DEFAULT NULL,
  `UTS` int(11) DEFAULT NULL,
  `UAS` int(11) DEFAULT NULL,
  `Nilai_Akhir` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`NIM`, `Kode_MK`, `UTS`, `UAS`, `Nilai_Akhir`) VALUES
(10106001, 'IF32101', 70, 80, 75),
(10106001, 'IF32209', 50, 89, 69.5),
(10106001, 'IF33217', 78, 80, 79),
(10106001, 'IF33302', 89, 78, 83.5),
(10106002, 'IF32101', 80, 90, 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kuliah`
--
ALTER TABLE `kuliah`
  ADD PRIMARY KEY (`Kode_MK`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
