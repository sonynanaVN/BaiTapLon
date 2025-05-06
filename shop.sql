-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 04:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(39, 'samsamsam0905@gmail.com', '412@gmail.com', '2', '2025-04-29 11:59:55'),
(40, '1', 'sonynanaVN1@gmail.com', '1', '2025-04-29 12:04:00'),
(41, 'ngovan15121977@gmail.com', 'sonynanaVN12@gmail.com', '23', '2025-04-29 12:04:44'),
(42, 'ngovan15121977@gmail.com', 'ngovan15121977@gmail.com', '1', '2025-04-29 12:45:53'),
(43, 'ngovan15121977@gmail.com', 'ngovan1512197127@gmail.com', '1', '2025-04-29 14:14:19'),
(44, 'samsamsam0905@gmail.com', 'samsamsam0905122@gmail.com', '1', '2025-04-29 14:24:30'),
(45, 'samsamsam0905@gmail.com', 'ngovan15121972132137@gmail.com', '1', '2025-05-01 11:28:39'),
(46, 'samsamsam0905@gmail.com', 'ngovan151219721321374@gmail.com', '23', '2025-05-01 11:33:18'),
(47, '12', '12@gmail.com', '$2y$10$AlKmz4LSP/cJJYanrLVO4uze.bjFbij5u.wQCVFxLF7y9Kdnqfk5a', '2025-05-01 11:34:26'),
(48, '1', '1231@gmail.com', '1', '2025-05-01 11:35:51'),
(49, '1', 'sonynanaVN112@gmail.com', '12', '2025-05-01 11:37:09'),
(50, '12', 'sonynanaVN1122121@gmail.com', '12', '2025-05-01 11:39:41'),
(51, '12', 'sonynanaVN1122122221@gmail.com', '12', '2025-05-01 11:40:48'),
(52, '12', '3@gmail.com', '123', '2025-05-01 11:41:05'),
(53, 'admin', 'admin@gmail.com', 'admin123', '2025-05-01 11:44:00'),
(54, 'admin', 'admin1222223@gmail.com', '1', '2025-05-01 13:11:01'),
(55, 'vanteo', '1@gmail.com', '1', '2025-05-01 13:12:05'),
(56, '2', '2@gmail.com', '2', '2025-05-02 01:32:13'),
(57, '221', '23@gmail.com', '23', '2025-05-02 06:25:31'),
(58, 'ngovan15121977@gmail.com', '212231@gmail.com', '1', '2025-05-02 06:26:01'),
(59, 'AnhHaoDepTrai23CT2', 'TanHao123@gmail.com', '1234', '2025-05-03 13:56:08'),
(60, 'PhucLo', 'Phuc123@gmail.com', '1', '2025-05-06 13:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `content`, `created_at`) VALUES
(1, 'ads', '2025-05-02 14:13:47'),
(2, '45454545', '2025-05-02 14:16:13'),
(3, 'kkkk', '2025-05-02 14:17:10'),
(4, '45454545', '2025-05-02 14:25:38'),
(5, 'aád', '2025-05-02 14:51:30'),
(6, 'đấ', '2025-05-03 11:58:08'),
(7, 'Sản phẩm tệk', '2025-05-03 13:57:04'),
(8, 'Trung nguu', '2025-05-03 14:04:44'),
(9, 'tệ', '2025-05-06 12:39:58'),
(10, 'tệ', '2025-05-06 12:40:02'),
(11, 'Nhu cc', '2025-05-06 13:17:22'),
(12, 'trang web main nhu cc tao', '2025-05-06 13:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `image`) VALUES
(36, 'Phuc Lo', 123, '0123', '../main/uploads681a0ccd1df36_BannerMilk.jpg'),
(37, 'ngovan15121977@gmail.com', 123, '0123', '../main/uploads681a10359c2b5_ChatGPT Image Apr 30, 2025, 10_25_05 AM.png'),
(38, 'ngovan15121977@gmail.com', 123, '0123', '../main/uploads681a10b9a5ecf_ChatGPT Image Apr 30, 2025, 10_25_05 AM.png'),
(39, 'ngovan15121977@gmail.com', 123, '0123', '../main/uploads681a111cbbdad_ChatGPT Image Apr 30, 2025, 10_25_05 AM.png'),
(40, 'ngovan15121977@gmail.com', 123, '0123', '../main/uploads681a123730865_ChatGPT Image Apr 30, 2025, 10_25_05 AM.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
