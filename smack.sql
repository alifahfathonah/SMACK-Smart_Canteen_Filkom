-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 09:34 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smack`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `stock` int(10) DEFAULT '0',
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `name`, `price`, `description`, `stock`, `photo`, `created_at`, `updated_at`) VALUES
(2, 6, 'menu 1', 15, 'ini menu 1', 21, '19.jpeg', '2018-12-02 17:47:20', '2018-12-02 10:47:20'),
(3, 6, 'menu 2', 12, 'ini menu 2', 10, '12.jpeg', '2018-12-02 12:13:21', '2018-12-02 05:13:21'),
(5, 6, 'menu 3', 10, 'ini menu 3', 15, '13.jpeg', '2018-12-02 12:16:00', '2018-12-02 05:16:00'),
(6, 6, 'menu 4', 20, 'ini menu 4', 23, '14.jpeg', '2018-12-02 12:16:05', '2018-12-02 05:16:05'),
(7, 6, 'menu 5', 23, 'ini menu 5', 23, '15.jpeg', '2018-12-02 12:16:09', '2018-12-02 05:16:09'),
(8, 6, 'menu 6', 18, 'ini menu 6', 15, '18.jpeg', '2018-12-02 12:16:14', '2018-12-02 05:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','outlet') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `photo`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$XXmXsLr66F6XzhSbDJpMIus7FjOgLi7N3hNntr8Gc7Wu1VLsiKi2O', '', 'admin', 'DnRUQkSHx0CbCMlc1kofOoPlRCDZVe4VqgGasdE0kdya9BcsDnuekbTZTCfB', NULL, NULL),
(6, 'outlet', 'outlet@outlet.com', '$2y$10$r3h7g5iNDl.Ihk5iHFxULuQIRajJbHrBxtRhYJ38MuvrlW/DyG8vW', 'Screenshot (6).png', 'outlet', 'IXj4eSaBkVtHeTAoXrjEajnVlTsPiJstoItCmqizBwTaG909Pp0LqIReoflj', NULL, '2018-12-03 12:45:19'),
(11, 'member', 'member@member.com', '$2y$10$XXmXsLr66F6XzhSbDJpMIus7FjOgLi7N3hNntr8Gc7Wu1VLsiKi2O', '', '', 'IBfyxY3kEpcdAIzpYG6cRQEVy19N8FRpGshCBfLlDMsgguqYVDnmT8DRODC4', NULL, NULL),
(12, 'outlet2', 'outlet2@outlet.com', '$2y$10$ByuwgtJq.0SQSo02f.ebqe6d/KChIE0Pa2y1fegNNjHvGXqMh3w7C', 'Screenshot (4).png', 'outlet', NULL, '2018-12-03 13:27:38', '2018-12-03 13:27:38'),
(13, 'outlet3', 'outlet3@outlet.com', '$2y$10$X6l0sMK6e6HIidC61OzzfeY3KvEkZd6eertIMVBmmWs7tWD9wY3ba', 'Screenshot (6).png', 'outlet', NULL, '2018-12-03 13:29:44', '2018-12-03 13:29:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
