-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql111.epizy.com
-- Thời gian đã tạo: Th12 26, 2021 lúc 04:49 AM
-- Phiên bản máy phục vụ: 5.7.35-38
-- Phiên bản PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `epiz_29973715_j2school`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `items`
--

CREATE TABLE `items` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `size` tinyint(1) NOT NULL,
  `ice` tinyint(1) NOT NULL,
  `sugar` tinyint(1) NOT NULL,
  `price_s` float NOT NULL,
  `price_m` float NOT NULL,
  `price_l` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `description`, `size`, `ice`, `sugar`, `price_s`, `price_m`, `price_l`) VALUES
('1', 'Capuchino', './assests/img/items/capuchino.png', '', 1, 0, 0, 6, 8, 10),
('2', 'Cold brew', './assests/img/items/cold-brew.png', '', 1, 1, 0, 0, 9, 0),
('3', 'Milk shake', './assests/img/items/milk-shake.png', '', 1, 0, 1, 3, 5, 7),
('4', 'White chocolate mocha', './assests/img/items/white-chocolate-mocha.png', '', 1, 1, 1, 7, 9, 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
