-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 09:05 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magnus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(450) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('magnus', 'magnus'),
('magnus', 'magnus');

-- --------------------------------------------------------

--
-- Table structure for table `magnus_registration`
--

CREATE TABLE `magnus_registration` (
  `serial` int(255) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` int(255) DEFAULT NULL,
  `event` text DEFAULT NULL,
  `email` varchar(450) DEFAULT NULL,
  `college` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magnus_registration`
--

INSERT INTO `magnus_registration` (`serial`, `name`, `mobile`, `event`, `email`, `college`) VALUES
(1, 'Magnus Default', 1234567890, 'pool', 'abc@gmail.com', 'jindal'),
(2, 'Maheedhar', 987654321, 'snooker', 'mahi@gmail.com', 'MVJ'),
(3, 'Maheedhar', 1234567890, 'snooker', 'mahi@gmail.com', 'MVJ'),
(4, 'Maheedhar', 789, 'snooker', 'maheedhar.k@yahoo.com', 'mvj'),
(5, 'Maheedhar', 789, 'snooker', 'maheedhar.k@yahoo.com', 'mvj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `magnus_registration`
--
ALTER TABLE `magnus_registration`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `magnus_registration`
--
ALTER TABLE `magnus_registration`
  MODIFY `serial` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
