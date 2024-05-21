-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 10:15 AM
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
-- Table structure for table `kendaraan_terparkir`
--

CREATE TABLE `kendaraan_terparkir` (
  `id_parkir` int(5) NOT NULL,
  `id_kendaraan` int(3) NOT NULL,
  `plat` varchar(20) NOT NULL,
  `waktu_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `waktu_keluar` datetime DEFAULT NULL,
  `tarif_total` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan_terparkir`
--

INSERT INTO `kendaraan_terparkir` (`id_parkir`, `id_kendaraan`, `plat`, `waktu_masuk`, `waktu_keluar`, `tarif_total`) VALUES
(13, 5, 'B 1989 HQ', '2024-01-07 15:12:30', '2024-01-08 00:29:51', 120000),
(16, 8, 'D 7845 IK', '2024-01-07 15:36:43', '2024-01-08 04:40:46', 70000),
(18, 7, 'Z 3367 WK', '2024-01-07 15:49:08', NULL, -4735100000),
(19, 1, 'B 1234 CD', '0000-00-00 00:00:00', NULL, 34538882000),
(20, 2, 'B 2345 CD', '0000-00-00 00:00:00', NULL, 86347205000),
(21, 3, 'B 3456 CD', '0000-00-00 00:00:00', NULL, 17269441000),
(22, 4, 'B 4567 CD', '0000-00-00 00:00:00', NULL, 138155528000),
(23, 5, 'B 5678 CD', '0000-00-00 00:00:00', NULL, 207233292000),
(24, 6, 'B 6789 CD', '0000-00-00 00:00:00', NULL, 120886087000),
(25, 7, 'B 7890 CD', '0000-00-00 00:00:00', NULL, 172694410000),
(26, 8, 'B 8901 CD', '0000-00-00 00:00:00', NULL, 86347205000),
(27, 9, 'B 9012 CD', '0000-00-00 00:00:00', NULL, 103616646000),
(28, 3, 'L 2891 ZK', '2024-01-07 22:17:18', NULL, -473517000),
(29, 4, 'L 2289 HJ', '2024-01-08 14:40:49', '2024-01-09 14:41:48', 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan_terparkir`
--
ALTER TABLE `kendaraan_terparkir`
  ADD PRIMARY KEY (`id_parkir`),
  ADD KEY `fk-id_kendaraan` (`id_kendaraan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan_terparkir`
--
ALTER TABLE `kendaraan_terparkir`
  MODIFY `id_parkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan_terparkir`
--
ALTER TABLE `kendaraan_terparkir`
  ADD CONSTRAINT `fk-id_kendaraan` FOREIGN KEY (`id_kendaraan`) REFERENCES `tarif_kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
