-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 09:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerdata`
--

CREATE TABLE `customerdata` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerdata`
--

INSERT INTO `customerdata` (`id`, `username`, `email`, `password`) VALUES
(8, 'Anupk1', 'anup@gmail.com', '$2y$10$t/yI5qs2oKYoYpZClXH8N.GWMv0nAcC8oPjNf2C0k4ARXolRdhKpe'),
(9, 'anup1', 'koturwar1@gmail.com', '$2y$10$EMzeOSXPneM4OQmjQnxV/uhE2.Hg2SAJNt3mkqEzmWXCoA8dw4c76'),
(11, 'anup2', '2s@ggs.com', '$2y$10$aQGv2.fEcknIR8CUNn63LePdpdxhR9WbNjoL6Hhza.4NJvV7MDcbm'),
(12, '. m.m', 'koturwAar@gmail.com', '$2y$10$7dh4DeR0uu6WUsLmQW4aPOzt563sdzSYe0Vwc7awYiexIQ98DSThq'),
(13, 'anupk', 'akoturwar@gmail.com', '$2y$10$Kvl.V82D3FIGkVp6qLSKxOmkVITVk9VXaQi1cEKJB55L/RMxZbnt2'),
(14, 'anup02', 'koturwar@gmail.com', '$2y$10$RRyFJSTk5RltPkXNySIJS.ZM8zl7aJiKLBPtSvoWh1VyvaB7Ef6/u'),
(15, 'prem', 'prem@gmail.com', '$2y$10$WGpbev9l7oHmbVAxIXPSUufDY573Caos8/PJUFC1MS2kVHkfTG0Yy'),
(16, 'anup28', 'anup1@gmail.com', '$2y$10$YzvINzqXSLYUYzkS6kEE7exAblMjA1KkAcrm/.1QdG/zg1bq0eWGW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerdata`
--
ALTER TABLE `customerdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerdata`
--
ALTER TABLE `customerdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
