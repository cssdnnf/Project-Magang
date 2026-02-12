-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2026 at 05:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `position` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `status` enum('Active','Inactive','Resigned') DEFAULT 'Active',
  `hire_date` date NOT NULL,
  `address` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nip`, `name`, `email`, `phone`, `position`, `division`, `status`, `hire_date`, `address`, `created_at`) VALUES
(1, '1234567890', 'Cassiel D. Ferdinand', 'cassiel@student.tau.ac.id', '085157060802', 'Software Enginer', 'IT', 'Active', '2026-02-11', 'Jln Ciledug Raya', '2026-02-11 11:06:26'),
(2, '1234567891', 'Muhammad Trihandoyo', 'trihandoyo@student.tau.ac.id', '083899934815', 'GA', 'HR', 'Active', '2025-10-02', '', '2026-02-11 11:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `budget` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` enum('Pending','Approved','Rejected','In Progress','Completed') DEFAULT 'Pending',
  `description` text,
  `progress` int(3) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `client_name`, `start_date`, `end_date`, `budget`, `status`, `description`, `progress`, `created_at`) VALUES
(1, 'Pembangunan Jembatan Puri Beta', 'Jasa Marga', '2026-02-10', '2026-06-30', '5000000000.00', 'Pending', 'Membangun Jembatan Puri Beta Yang Menghubungkan Jalan Ciledug Raya', 0, '2026-02-12 03:44:16'),
(2, 'Perbaikan Jalan Ciledug Raya', 'Waskita', '2026-02-10', '2026-08-26', '1000000000.00', 'Rejected', 'Perbaiki Jalan Yang Rusak dan Berlobang di sepanjang Jalan Ciledug Raya', 100, '2026-02-12 03:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','staff','user') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `is_active`, `created_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', '$2a$12$Ou9wjehgClJctPA5VtjKYO0zz9y6Y/FR5BPbXLWLnJ2vXV5edvnHu', 1, '2026-02-11 13:41:28'),
(2, 'user1', 'user1@gmail.com', 'user', '$2y$10$XCGL/xpmM2KCS7B7J9yXiesqgOgHYFveBlJUD0MCeLksX8lsoSBj6', 1, '2026-02-11 08:16:30'),
(3, 'user2', 'user2@gmail.com', 'user', '$2y$10$mdNXOCve85kR2dRkkHjVsuku3x6n6n/P9f7gJMSYhSwaz4omw6xhG', 1, '2026-02-11 08:28:22'),
(4, 'user3', 'user3@gmail.com', 'user', '$2y$10$yjDEDzI3cv7SHUpNbLE/P.Ij9bDbNrlSaOFxDvkithCIogrrO8bm.', 1, '2026-02-11 08:28:59'),
(5, 'user4', 'user4@gmail.com', 'user', '$2y$10$6H1.inY7Ax6OU.OGHuCLuO7eRKA8R1u99D1jZPX1ZT8x6eO8AmmLG', 1, '2026-02-11 08:29:35'),
(6, 'user5', 'user5@gmail.com', 'user', '$2y$10$lQs7qi2T9cGYb/ZuFppAvu.vx371B5BRR6wbiUE9Z4D3BebMwhI2y', 0, '2026-02-11 08:29:50'),
(7, 'user6', 'user6@gmail.com', 'user', '$2y$10$SnPA7ftmGkVs4v33Nh4oIumNfKLLP3.NT0AFshEXMkkzXQ3.gkTHO', 0, '2026-02-11 08:30:21'),
(9, 'staff1', 'staff1@gmail.com', 'staff', '$2y$10$yUhlaxsYRfFgIGqa/NL64OwwNSLVz5pNt..QN9BKCCqYTgzsY/s7K', 1, '2026-02-11 09:28:37'),
(10, 'staff2', 'staff2@gmail.com', 'staff', '$2y$10$L4f3jNIFlz0Qn31fh9YnvOOhrL/90iGfhXQBrYS.EoYMqjBGz9KMm', 1, '2026-02-11 09:28:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
