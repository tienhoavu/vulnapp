-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 07, 2020 lúc 08:48 AM
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
-- Cấu trúc bảng cho bảng `follows`
--

CREATE TABLE `follows` (
  `follow_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_user_id` int(11) NOT NULL,
  `follow_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `follows`
--

INSERT INTO `follows` (`follow_id`, `user_id`, `follow_user_id`, `follow_status`, `display_status`) VALUES
(6, 2, 3, 'follow', 'UnFollow'),
(7, 2, 4, 'waiting', 'Waiting'),
(8, 2, 1, 'waiting', 'Waiting'),
(9, 2, 0, 'waiting', 'Waiting'),
(10, 35, 1, 'follow', 'UnFollow'),
(11, 2, 35, 'waiting', 'Waiting'),
(12, 35, 2, 'follow', 'UnFollow'),
(13, 3, 2, 'follow', 'UnFollow'),
(14, 4, 2, 'follow', 'UnFollow'),
(15, 4, 3, 'waiting', 'Waiting'),
(16, 1, 2, 'follow', 'UnFollow'),
(17, 1, 0, 'unfollow', 'Follow'),
(18, 1, 3, 'waiting', 'Waiting');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `like_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `post_id`, `like_status`) VALUES
(1, 2, 25, 'like'),
(2, 2, 24, 'like'),
(3, 2, 21, 'like'),
(4, 3, 21, 'like'),
(5, 3, 20, 'like'),
(6, 2, 20, 'like'),
(7, 2, 22, 'like'),
(8, 2, 23, 'like'),
(9, 2, 19, 'like'),
(10, 2, 17, 'like'),
(11, 2, 16, 'like'),
(12, 2, 18, 'like'),
(13, 3, 25, 'unlike'),
(14, 3, 24, 'like'),
(15, 3, 23, 'like'),
(16, 2, 9, 'like'),
(17, 2, 8, 'like'),
(18, 2, 7, 'like'),
(19, 2, 6, 'unlike'),
(20, 2, 5, 'like'),
(21, 2, 4, 'like'),
(22, 2, 3, 'like'),
(23, 2, 2, 'like'),
(24, 2, 10, 'like'),
(25, 2, 27, 'like'),
(26, 2, 26, 'like'),
(27, 1, 28, 'like'),
(28, 1, 27, 'like'),
(29, 1, 26, 'like'),
(30, 1, 25, 'like'),
(31, 1, 24, 'like'),
(32, 1, 23, 'like'),
(33, 1, 22, 'like'),
(34, 1, 21, 'unlike'),
(35, 1, 19, 'unlike'),
(36, 1, 20, 'unlike'),
(37, 1, 29, 'like'),
(38, 37, 29, 'like'),
(39, 37, 28, 'like');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `post_status`) VALUES
(1, 4, 'hello', 'public'),
(2, 2, 'hello user 2', 'private'),
(3, 2, 'hello user 2 day', 'private'),
(4, 2, '&lt;script&gt; alert(1); &lt;/script&gt;', 'public'),
(5, 2, '&lt;script&gt; alert(1); &lt;/script&gt;', 'public'),
(6, 2, '&lt;script&gt; alert(1); &lt;/script&gt;', 'public'),
(7, 2, '&lt;script&gt; alert(1); &lt;/script&gt;', 'public'),
(8, 2, '&lt;script&gt; alert(1); &lt;/script&gt;', 'public'),
(9, 2, '&lt;script&gt; alert(1); &lt;/script&gt;', 'public'),
(10, 2, '&lt;script&gt; alert(1); &lt;/script&gt;', 'private'),
(11, 4, 'hello bai nay private', 'private'),
(12, 4, 'hello bai nay private', 'private'),
(13, 4, 'hello private', 'private'),
(14, 4, 'hello private day', 'private'),
(15, 3, 'private day', 'private'),
(16, 2, 'hello', 'public'),
(17, 2, 'hello private by user2', 'private'),
(18, 2, 'hello', 'public'),
(19, 2, 'hello private by user2', 'public'),
(20, 2, 'hello private by user2', 'private'),
(21, 2, 'hello private by user2', 'private'),
(22, 3, 'hello private by user3', 'private'),
(23, 3, 'hello private by user3', 'public'),
(24, 3, 'hello', 'public'),
(25, 3, 'hello', 'public'),
(26, 2, '&lt;script&gt; alert(10);&lt;/script&gt;', 'public'),
(27, 2, '&lt;script&gt; alert(10);&lt;/script&gt;', 'private'),
(28, 1, 'hello', 'public'),
(29, 1, 'hello private by user2', 'public'),
(30, 1, '&lt;script&gt; alert(10);&lt;/script&gt;', 'public'),
(31, 1, 'hello private by user2', 'public'),
(32, 1, '&lt;script&gt; alert(10);&lt;/script&gt;', 'public'),
(33, 2, '&lt;script&gt; alert(10);&lt;/script&gt;', 'public');

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
  `permission` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `username`, `password`, `permission`, `avatar`) VALUES
(0, 'admin@gmail.com', 'admin', 'admin', '$2y$10$yzjIBIahSWMZh.P0pvfXXOQxi2uwCx3BRWTbzBQtpO6KAFT3SU3Aa', 0, ''),
(1, 'user1@email.com', 'mot', 'user1', '$2y$10$eSGc3g.8.3EaBFieEccS5.u/TXnx80OBSYWV1orUDoxgxUKTryu1u', 1, '1043094466.png'),
(2, 'user2@gmail.com', 'hai', 'user2', '$2y$10$4Z/ADgIVgKXipnR12FVb6OJTZ2L88TZWx1Idz9JH6m8M6YV5mHh..', 1, '1862034232.jpg'),
(3, 'user3@gmail.com', 'ba', 'user3', '$2y$10$yApa56IZFwZhes2VHhDWEOeCFBzGKYsU2KSpsOsXFBfVo7ZUTt0Ti', 1, '749505469.jpg'),
(4, 'user4@gmail.com', 'bon', 'user4', '$2y$10$V0BoacQ1XsQzmKSpiYN00uolwzHbHOaP69xTQgt2DsXyGbduB/UIm', 1, '986057445.jpg'),
(35, 'user5@gmail.com', 'nam', 'user5', '$2y$10$CHowhwvELwmtGKpNexZYGONeLCuQcpFvYHhvinVi04qm5.p7Jcm6G', 1, '427037558.jpg'),
(36, 'user6@gmail.com', 'sau', 'user6', '$2y$10$zJ5ZnCe/5W.G2icTZ6DS4.qOB1UO.pEUvGzmN4a6Yx4sRUC/5Ed7C', 1, '517224154.jpg'),
(37, 'user7@gmail.com', 'bay', 'user7', '$2y$10$x4NKzilaUIYah8.6pXh2ieXg0quhzzg8J00JpWRq5zwB0/Ww7wBji', 1, '1219029749.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`follow_id`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `follows`
--
ALTER TABLE `follows`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
