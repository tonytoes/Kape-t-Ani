-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2025 at 02:48 PM
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
-- Database: `kapetani`
--

-- --------------------------------------------------------

--
-- Table structure for table `coffee_products`
--

CREATE TABLE `coffee_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` double(100,2) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_blob` longblob NOT NULL,
  `image_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cultural_products`
--

CREATE TABLE `cultural_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` double(100,2) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_blob` longblob NOT NULL,
  `image_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewcard`
--

CREATE TABLE `reviewcard` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `review_rating` int(1) NOT NULL,
  `review_title` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviewcard`
--

INSERT INTO `reviewcard` (`id`, `first_name`, `last_name`, `review_rating`, `review_title`, `description`, `date`) VALUES
(29, 'Reuel', 'Carlos', 4, 'Meeseeks', ' Mr Meeseeks\r\n', '2025-10-25'),
(30, 'I ', 'Tried', 5, 'to', 'Give you all my love ', '2025-10-25'),
(32, 'I ', 'LOVEEEEEEEEEEEEEEEEE', 5, 'I', 'LOVEEEE EEE EEEE ', '2025-10-25'),
(33, 'Jhimmy', 'Figgins', 0, 'Heathens', 'Run ', '2025-10-25'),
(34, 'FOK', 'EEE', 0, 'LOL', ' I HATE U', '2025-10-25'),
(35, 'Anthony ', 'Balungay', 3, 'Product is awesome', ' I just love it wowowowow', '2025-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `seasonal_products`
--

CREATE TABLE `seasonal_products` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` double(100,2) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_blob` longblob NOT NULL,
  `image_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'anthony', 'qamgbalungay@tip.edu.ph', '$2y$10$g.PU/9kbPXyYalBxBHaBS.oy2jnc6HJKV/5f6uIDSPKgulcbRpuia', 'user'),
(4, 'test', 'test@gmail.com', '$2y$10$06N/lc3QqCP.HtZ4/PI5c.SIS3ZUUOiG6DEgGlJI10GeOO98zNZ46', 'user'),
(5, 'test2', 'test2@gmail.com', '$2y$10$Yy8AzwPWQ/Fs0u1LvcFrYO.dSRgWCxjDLh6wnRNDQv4j4uxxTo7V6', 'admin'),
(6, 'John', 'johnmichaelvincentmaghanayuayan@gmail.com', '$2y$10$SZq0AEhPg.E8Yv3.AJje5eiyeOD.cbNBTCYxIPBumZxarQ1k0RwA6', 'user'),
(7, 'Elaiza', 'elai@gmail.com', '$2y$10$ujnxnBq/0z.h8kf/4UnKUun4fdKxjd8F1bnlDHNqLAHRz0ELhzXBu', 'user'),
(8, 'John', 'johndoe@gmail.com', '$2y$10$AGWXFDPlQ2MK1e/mR2gOUOjW.G72c1NCtSDc63R3rhGhgL/Y2chmm', 'user'),
(9, 'Admin', 'admin@gmail.com', '$2y$10$ZjfzkJBH0v/KRg7B2E8PS.oCNALszpi4Olmqj2OVq50.cFI1zJqRy', 'admin'),
(10, 'john', 'john@gmail.com', '$2y$10$AAwVO39AnzTmYcWHVBwMKuLJUk55wctgj3lVpOk.8omwvvXadU61W', 'user'),
(11, 'jm', 'jmpogi@gmail.com', '$2y$10$FsNdUZrkhUu7j/ENReuCNO3gYcZVIDCrfL8xvtZOcvI8RZjbfe9O2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coffee_products`
--
ALTER TABLE `coffee_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cultural_products`
--
ALTER TABLE `cultural_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewcard`
--
ALTER TABLE `reviewcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasonal_products`
--
ALTER TABLE `seasonal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coffee_products`
--
ALTER TABLE `coffee_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cultural_products`
--
ALTER TABLE `cultural_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviewcard`
--
ALTER TABLE `reviewcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `seasonal_products`
--
ALTER TABLE `seasonal_products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
