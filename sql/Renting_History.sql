-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2023 at 12:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Renting_History`
--

CREATE TABLE `Renting_History` (
  `id` int(255) NOT NULL,
  `user_email` text NOT NULL,
  `rent_date` date NOT NULL,
  `bond_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Renting_History`
--

INSERT INTO `Renting_History` (`id`, `user_email`, `rent_date`, `bond_amount`) VALUES
(1, 'asds@yahoo.com', '2022-06-01', 200),
(20, 'askdjhk@yahoo.com', '2023-06-04', 200),
(21, 'asdas@yahoo.com', '2023-06-04', 200),
(22, 'aaaaa@yahoo.com', '2023-06-04', 200),
(23, 'aaaaa@yahoo.com', '2023-06-04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Renting_History`
--
ALTER TABLE `Renting_History`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Renting_History`
--
ALTER TABLE `Renting_History`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
