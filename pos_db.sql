-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2026 at 11:46 PM
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
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Juan Dela Cruz', 'juan@gmail.com', '09123456789', '2026-09-21 18:27:49'),
(2, 'Maria Santos', 'maria@gmail.com', '09234567890', '2026-09-21 18:27:49'),
(3, 'Pedro Reyes', 'pedro@gmail.com', '09345678901', '2026-09-21 18:27:49'),
(4, 'Ana Garcia', 'ana@gmail.com', '09456789012', '2026-09-21 18:27:49'),
(5, 'Carlo Mendoza', 'carlo@gmail.com', '09567890123', '2026-09-21 18:27:49'),
(6, 'Test User', 'testuser@gmail.com', '0671234567', '2026-09-28 10:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'admin', '$2y$10$lQCNDQu4d3sdPDmroNIfKe8mSWMMgF.iuNOAnsXUDiBjDgOUiyfXC', 'John Smith', NULL, '2026-09-21 18:28:16'),
(2, 'cashier1', '$2y$10$HZIyuK1R9B1ETIVVK2F0MOjesW2w3Ozo8XgW9HYBKa80Dr.u7cJRO', 'Jane Cruz', NULL, '2026-09-21 18:28:16'),
(3, 'cashier2', '$2y$10$Mj3ebiEA1JgBLMahnMcjQ.Jms8ODlNHz3bWjWMp7Qs7qfLpC7.ZYu', 'Mark Santos', NULL, '2026-09-21 18:28:16'),
(4, 'staff1', '$2y$10$NpizNNXmOhGd6im3o8H3Zupfh0xoDUTY5UdNTGfYTSfmMvC999h3q', 'Anna Reyes', NULL, '2026-09-21 18:28:16'),
(5, 'manager', '$2y$10$ns5D3N6obBwgpzpbEYB/oOHab6c8GmU8XeCzD5XXbEUbCQlAvieai', 'Paul Garcia', NULL, '2026-09-21 18:28:16'),
(6, 'Test User', '$2y$10$Ga5zbVDQDf4yDKTtf9H57ORU8CTOco3on8GegFSpf9ojBPGXgEY4a', 'Test User', NULL, '2026-09-28 10:01:51'),
(7, 'testlogin', '$2y$10$Et3PgzI7MiO7I1VbzY.bgueR4agwDK8UoKUvut2Po2bnsHtzxv/AG', 'Test Login', NULL, '2026-10-03 21:37:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
