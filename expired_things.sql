-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 26 Feb 2018 pada 10.17
-- Versi Server: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expired_things`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_expired`
--

CREATE TABLE `data_expired` (
  `id` int(11) NOT NULL,
  `id_item` text NOT NULL,
  `ex_date` date NOT NULL,
  `qty` int(4) NOT NULL,
  `buy_date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_expired`
--

INSERT INTO `data_expired` (`id`, `id_item`, `ex_date`, `qty`, `buy_date`, `location`, `created_at`, `updated_at`) VALUES
(22, '10', '2018-01-23', 6, '2018-01-19', 'qwe', '2018-01-19 07:49:45', '2018-01-19 07:49:45'),
(23, '13', '2018-01-25', 4, '2018-01-19', 'sdbsjbfjhsd', '2018-01-19 07:50:14', '2018-01-19 07:50:14'),
(24, '12', '2018-01-25', 5, '2018-01-19', 'jklX', '2018-01-19 07:50:38', '2018-01-19 07:50:38'),
(25, '10', '2018-01-25', 3, '2018-01-19', 'aschk', '2018-01-19 07:50:55', '2018-01-19 07:50:55'),
(26, '12', '2018-01-30', 9, '2018-05-18', ',', '2018-02-01 10:05:07', '2018-02-01 10:05:07'),
(27, '12', '2018-02-07', 34, '2018-02-01', 'fds', '2018-02-24 20:22:41', '2018-02-24 20:22:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(10, 'Susu Ultra Milk', 'ultra_milk_chocolate_200ml_x_24_pcs-_copy_1.jpg', '2017-12-22 12:29:02', '2017-12-22 12:29:02'),
(12, 'QRCode', '1513945777_QR_Code_Dudi_Iskandar.png', '2017-12-22 05:29:37', '2017-12-22 05:29:37'),
(13, 'ThingsOfGirl', '1516371797_Screenshot from 2018-01-08 10-22-06.png', '2018-01-19 07:23:17', '2018-01-19 07:23:17'),
(14, 'qwe', '1517504675_Screenshot from 2018-01-22 12-24-55.png', '2018-02-01 10:04:35', '2018-02-01 10:04:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_expired`
--
ALTER TABLE `data_expired`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_expired`
--
ALTER TABLE `data_expired`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
