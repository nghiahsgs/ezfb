-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 24, 2019 lúc 02:40 PM
-- Phiên bản máy phục vụ: 10.2.17-MariaDB
-- Phiên bản PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `u380514009_ads`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbacc`
--

CREATE TABLE `tbacc` (
  `id` int(11) NOT NULL,
  `idAds` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `currency` text COLLATE utf8_unicode_ci NOT NULL,
  `threshold` text COLLATE utf8_unicode_ci NOT NULL,
  `account_status` text COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `soFriend` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `soGroup` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `soPage` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `accfull` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `password`, `note`) VALUES
(2, 'nghiahsgs', '261997', ''),
(6, 'trongquy095', 'trongquy01', ''),
(7, 'quytest', 'quytest1', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbacc`
--
ALTER TABLE `tbacc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbacc`
--
ALTER TABLE `tbacc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12163;

--
-- AUTO_INCREMENT cho bảng `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
