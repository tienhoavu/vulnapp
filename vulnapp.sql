-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 10:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vulnapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `follow_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_user_id` int(11) NOT NULL,
  `follow_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`follow_id`, `user_id`, `follow_user_id`, `follow_status`, `display_status`) VALUES
(6, 2, 3, 'waiting', 'Waiting'),
(7, 2, 4, 'follow', 'UnFollow'),
(8, 2, 1, 'unfollow', 'Follow'),
(9, 2, 0, 'waiting', 'Waiting'),
(10, 35, 1, 'waiting', 'Waiting'),
(11, 2, 35, 'waiting', 'Waiting'),
(12, 35, 2, 'follow', 'UnFollow'),
(13, 3, 2, 'follow', 'UnFollow'),
(14, 4, 2, 'follow', 'UnFollow'),
(15, 4, 3, 'waiting', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `username`, `password`, `permission`) VALUES
(0, 'admin@gmail.com', 'admin', 'admin', '$2y$10$yzjIBIahSWMZh.P0pvfXXOQxi2uwCx3BRWTbzBQtpO6KAFT3SU3Aa', 0),
(1, 'user1@email.com', 'mot', 'user1', '$2y$10$eSGc3g.8.3EaBFieEccS5.u/TXnx80OBSYWV1orUDoxgxUKTryu1u', 1),
(2, 'user2@gmail.com', 'hai', 'user2', '$2y$10$4Z/ADgIVgKXipnR12FVb6OJTZ2L88TZWx1Idz9JH6m8M6YV5mHh..', 1),
(3, 'user3@gmail.com', 'ba', 'user3', '$2y$10$yApa56IZFwZhes2VHhDWEOeCFBzGKYsU2KSpsOsXFBfVo7ZUTt0Ti', 1),
(4, 'user4@gmail.com', 'bon', 'user4', '$2y$10$V0BoacQ1XsQzmKSpiYN00uolwzHbHOaP69xTQgt2DsXyGbduB/UIm', 1),
(35, 'user5@gmail.com', 'nam', 'user5', '$2y$10$CHowhwvELwmtGKpNexZYGONeLCuQcpFvYHhvinVi04qm5.p7Jcm6G', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
