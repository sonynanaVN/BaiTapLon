-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2025 lúc 05:15 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giohang_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `thoi_gian` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `ten_san_pham`, `so_luong`, `don_gia`, `tong_tien`, `thoi_gian`) VALUES
(1, 'Sữa Cô Gái Hà Lan', 5, 45000, 225000, '2025-05-10 09:05:02'),
(2, 'Sữa Cô Gái Hà Lan', 6, 45000, 270000, '2025-05-10 09:07:29'),
(3, 'Sữa Cô Gái Hà Lan', 6, 45000, 270000, '2025-05-10 09:10:35'),
(4, 'Sữa Cô Gái Hà Lan', 5, 45000, 225000, '2025-05-10 09:13:41'),
(5, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:13:41'),
(6, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:14:14'),
(7, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:14:14'),
(8, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:14:50'),
(9, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:17:20'),
(10, 'Sữa Cô Gái Hà Lan', 3, 45000, 135000, '2025-05-10 09:17:20'),
(11, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:18:03'),
(12, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:18:03'),
(13, 'Sữa Cô Gái Hà Lan', 11, 45000, 495000, '2025-05-10 09:20:09'),
(14, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:20:59'),
(15, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:20:59'),
(16, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:23:21'),
(17, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:23:21'),
(18, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:25:25'),
(19, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:25:25'),
(20, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:28:46'),
(21, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:28:46'),
(22, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:30:28'),
(23, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:30:29'),
(26, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:31:02'),
(27, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:31:02'),
(28, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:31:21'),
(29, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:31:21'),
(30, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:31:49'),
(31, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:31:49'),
(32, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:33:28'),
(33, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:33:28'),
(34, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:34:49'),
(35, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:34:49'),
(36, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:37:06'),
(37, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:37:06'),
(38, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:39:24'),
(39, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:39:24'),
(40, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:40:31'),
(41, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:40:31'),
(42, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:42:39'),
(43, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:42:39'),
(44, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:42:58'),
(45, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:42:58'),
(46, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:44:02'),
(47, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:44:02'),
(48, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:56:08'),
(49, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 09:56:08'),
(50, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 10:00:06'),
(51, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 10:00:06'),
(52, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 10:00:39'),
(53, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 10:00:39'),
(54, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 10:02:19'),
(55, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 10:02:19'),
(56, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 10:07:30'),
(57, 'Sữa Cô Gái Hà Lan', 1, 45000, 45000, '2025-05-10 10:07:30'),
(58, 'Sữa Cô Gái Hà Lan', 2, 45000, 90000, '2025-05-10 10:08:24'),
(59, 'Sữa Cô Gái Hà Lan', 5, 45000, 225000, '2025-05-10 10:09:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinngoihang`
--

CREATE TABLE `thongtinngoihang` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongtinngoihang`
--
ALTER TABLE `thongtinngoihang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `thongtinngoihang`
--
ALTER TABLE `thongtinngoihang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
