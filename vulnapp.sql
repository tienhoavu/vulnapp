-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2020 lúc 11:48 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vulnapp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `username`, `password`, `permission`) VALUES
(0, 'admin@gmail.com', 'admin', 'admin', '$2y$10$yzjIBIahSWMZh.P0pvfXXOQxi2uwCx3BRWTbzBQtpO6KAFT3SU3Aa', 0),
(1, 'user1@email.com', 'mot', 'user1', '$2y$10$eSGc3g.8.3EaBFieEccS5.u/TXnx80OBSYWV1orUDoxgxUKTryu1u', 1),
(2, 'user2@gmail.com', 'hai', 'user2', '$2y$10$4Z/ADgIVgKXipnR12FVb6OJTZ2L88TZWx1Idz9JH6m8M6YV5mHh..', 1),
(3, 'user3@gmail.com', 'ba', 'user3', '$2y$10$yApa56IZFwZhes2VHhDWEOeCFBzGKYsU2KSpsOsXFBfVo7ZUTt0Ti', 1),
(34, 'user4@gmail.com', 'bon', 'user4', '$2y$10$V0BoacQ1XsQzmKSpiYN00uolwzHbHOaP69xTQgt2DsXyGbduB/UIm', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
