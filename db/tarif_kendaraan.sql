-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 10:16 AM
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
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tarif_kendaraan`
--

CREATE TABLE `tarif_kendaraan` (
  `id_kendaraan` int(3) NOT NULL,
  `nama_kendaraan` varchar(30) NOT NULL,
  `tarif_per_jam` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarif_kendaraan`
--

INSERT INTO `tarif_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `tarif_per_jam`) VALUES
(1, 'Motor', 2000),
(2, 'Mobil', 5000),
(3, 'Sepeda', 1000),
(4, 'Truk Kecil', 8000),
(5, 'Truk Besar', 12000),
(6, 'Bus Sedang', 7000),
(7, 'Bus Besar', 10000),
(8, 'Motor Besar', 5000),
(9, 'Minibus', 6000),
(10, 'Van', 5500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tarif_kendaraan`
--
ALTER TABLE `tarif_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tarif_kendaraan`
--
ALTER TABLE `tarif_kendaraan`
  MODIFY `id_kendaraan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
