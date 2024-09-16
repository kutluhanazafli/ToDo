-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: bzoighyemc4n1alzqpup-mysql.services.clever-cloud.com:3306
-- Generation Time: Sep 16, 2024 at 07:58 PM
-- Server version: 8.0.22-13
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bzoighyemc4n1alzqpup`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category_created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_created_date`, `category_updated_date`, `user_id`) VALUES
(10, 'Lessons', '2024-07-08 23:30:03', '2024-07-08 23:30:03', 1),
(11, 'UAV', '2024-07-09 18:52:26', '2024-07-09 18:52:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `todo_id` int NOT NULL,
  `todo_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `todo_description` tinytext COLLATE utf8mb4_general_ci,
  `todo_color` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `todo_end_date` datetime DEFAULT NULL,
  `todo_start_date` datetime DEFAULT NULL,
  `todo_created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `todo_updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `todo_progress` tinyint NOT NULL,
  `todo_status` enum('a','p','c') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`todo_id`, `todo_title`, `todo_description`, `todo_color`, `todo_end_date`, `todo_start_date`, `todo_created_date`, `todo_updated_date`, `user_id`, `category_id`, `todo_progress`, `todo_status`) VALUES
(1, 'qwd', 'qwd', '#007bff', '2024-07-08 23:34:21', '2024-07-08 23:34:21', '2024-07-08 23:34:22', '2024-07-08 23:34:22', 1, 0, 0, 'a'),
(2, 'CCNA', 'ccna lesson', '#ff0000', '2024-07-20 12:58:00', '2024-07-10 22:00:00', '2024-07-09 18:53:07', '2024-07-10 20:00:59', 1, 10, 7, 'a'),
(3, 'Jackal', 'jackal uav', '#d64000', '2024-07-09 18:57:30', '2024-07-09 18:57:30', '2024-07-09 18:57:30', '2024-07-09 18:57:30', 1, 11, 93, 'p'),
(4, 'CCNA', 'ccna lesson', '#4dff82', '2024-07-16 14:02:00', '2024-07-15 13:01:00', '2024-07-10 00:00:58', '2024-07-10 00:04:46', 1, 10, 71, 'a'),
(5, 'It continues', 'continue', '#00ffbf', '2024-07-10 21:14:00', '2024-07-10 21:14:00', '2024-07-10 21:14:14', '2024-07-10 21:41:56', 1, 11, 27, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_surname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_last_move` datetime NOT NULL,
  `user_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `user_email`, `user_password`, `user_last_move`, `user_created_date`, `user_updated_date`) VALUES
(1, 'Kutluhan', 'Azaflı', 'kutluhan@kutluhan.com', 'fa624f5183720353a9cccee54e91a4bbb3d282964a547e5755f09fd5660bb145bbca25020180cde5c68d41da569d016926b6424d23138a27f19cf1c6fd8e9e3c', '2024-06-23 11:45:54', '2024-06-23 11:46:08', '2024-07-11 13:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `todo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
