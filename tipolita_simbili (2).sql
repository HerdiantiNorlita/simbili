-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2023 at 01:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tipolita_simbili`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_1`
--

CREATE TABLE `home_1` (
  `home_id` int NOT NULL,
  `status_bayar` int DEFAULT '0',
  `voltage` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `current` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `power` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `energy` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_1`
--

INSERT INTO `home_1` (`home_id`, `status_bayar`, `voltage`, `current`, `power`, `energy`, `frequency`, `pf`, `created_at`, `updated_at`) VALUES
(1, 0, '227.70', '0.00', '0.00', '0.176', '50.5', '0.00', '2023-07-08 14:28:51', '2023-07-08 14:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `home_2`
--

CREATE TABLE `home_2` (
  `home_id` int NOT NULL,
  `status_bayar` int NOT NULL DEFAULT '0',
  `voltage` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `current` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `power` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `energy` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_2`
--

INSERT INTO `home_2` (`home_id`, `status_bayar`, `voltage`, `current`, `power`, `energy`, `frequency`, `pf`, `created_at`, `updated_at`) VALUES
(1, 0, '227.60', '0.40', '47.90', '0.067', '50.5', '0.53', '2023-07-08 14:28:39', '2023-07-08 14:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `pengaturan_id` int NOT NULL,
  `tarif_dasar` int NOT NULL,
  `notlp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`pengaturan_id`, `tarif_dasar`, `notlp`, `password`, `created_at`, `updated_at`) VALUES
(1, 1350, '082350292026', '$2y$10$Z8RM0UyuqyLOhIRgL1R7n.NVqO08riZPTLJxlk4PNng6GhDR.Ihoa', '2023-07-08 20:45:44', '2023-07-08 20:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int NOT NULL,
  `jumlah_energy` double NOT NULL,
  `jumlah_uang` int NOT NULL,
  `id_kamar` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `jumlah_energy`, `jumlah_uang`, `id_kamar`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, '2023-07-08 21:34:41', '2023-07-08 21:34:41'),
(2, 0, 0, 2, '2023-07-08 21:34:41', '2023-07-08 21:34:41'),
(3, 0.176, 237, 1, '2023-07-26 14:11:57', '2023-07-26 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` int NOT NULL,
  `notlp` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_kamar` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `password`, `pin`, `notlp`, `asal`, `foto`, `id_kamar`, `created_at`, `updated_at`) VALUES
(1, 'User 1', '$2y$10$gdINVmdee20U8CjzfrqNYeWOmB4gAYRMpcfpCrQBMz0qLjjBsVvC2', 8022001, '082350292026', 'Sukadana, Kayong Utara', '', 1, '2023-07-16 08:48:03', '2023-07-16 08:46:14'),
(2, 'User 2', '$2y$10$gdINVmdee20U8CjzfrqNYeWOmB4gAYRMpcfpCrQBMz0qLjjBsVvC2', 8022001, '081240515615', 'Sukadana', 'app/user/p-1689350169-3lI73.png', 2, '2023-07-26 16:26:48', '2023-07-26 15:03:22'),
(4, 'admin', '$2y$10$gdINVmdee20U8CjzfrqNYeWOmB4gAYRMpcfpCrQBMz0qLjjBsVvC2', 8022001, '081234567890', 'admin', '', 0, '2023-07-16 07:53:53', '2023-06-22 15:38:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_1`
--
ALTER TABLE `home_1`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `home_2`
--
ALTER TABLE `home_2`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`pengaturan_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_1`
--
ALTER TABLE `home_1`
  MODIFY `home_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1826;

--
-- AUTO_INCREMENT for table `home_2`
--
ALTER TABLE `home_2`
  MODIFY `home_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1828;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `pengaturan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
