-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2022 at 11:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_users`
--

CREATE TABLE `my_users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_by` int(11) DEFAULT -1,
  `is_admin` tinyint(1) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_users`
--

INSERT INTO `my_users` (`user_id`, `full_name`, `email`, `password`, `created_by`, `is_admin`, `created_on`) VALUES
(1, 'Karthik C M', 'karthikcm5329@gmail.com', '$2y$10$vloDCpzrrum2zhkXfjbYCOtVWNJoXVI/7dREvVj6PjKaQYmZyaM8i', -1, 1, '2022-01-18 15:26:24'),
(2, 'Karthik C M', 'karthikcm29@gmail.com', '$2y$10$Nhn1SeSj6xQ35JXEGQKgluVhsDgJFZct3ZD/7MUIl8OBSxC1h4RPi', 1, 0, '2022-01-18 15:26:50'),
(3, 'Ravi Shankar', 'ravishankarshivakumar1@gmail.com', '$2y$10$kuLN5aksNATGxtR88bsV0uCsH6t9ddT1JFArdLgy7iY/mvKN3xOYq', 1, 0, '2022-01-18 15:26:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_users`
--
ALTER TABLE `my_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_users`
--
ALTER TABLE `my_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
