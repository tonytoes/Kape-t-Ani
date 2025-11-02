-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2025 at 12:13 PM
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
-- Table structure for table `inventory_alert`
--

CREATE TABLE `inventory_alert` (
  `id` int(100) NOT NULL,
  `rule_name` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `condition` varchar(50) NOT NULL,
  `rule_value` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `enabled` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory_alert`
--

INSERT INTO `inventory_alert` (`id`, `rule_name`, `product`, `condition`, `rule_value`, `category`, `enabled`) VALUES
(18, 'Iced Sb Mt restock', 'Iced Strawberry Matcha', '<=', 10, 'cultural', 1),
(19, 'Overload Sb MT ', 'Iced Strawberry Matcha', '>=', 9, 'cultural', 1),
(20, 'Overrule', 'Iced Strawberry Matcha', '>=', 9, 'cultural', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_alert`
--
ALTER TABLE `inventory_alert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_alert`
--
ALTER TABLE `inventory_alert`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
