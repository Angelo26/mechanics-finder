-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 08:32 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mechclient`
--

-- --------------------------------------------------------

--
-- Table structure for table `angel1`
--

CREATE TABLE `angel1` (
  `id` int(11) UNSIGNED NOT NULL,
  `client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `anil2`
--

CREATE TABLE `anil2` (
  `id` int(11) UNSIGNED NOT NULL,
  `client` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `biplop4`
--

CREATE TABLE `biplop4` (
  `id` int(11) UNSIGNED NOT NULL,
  `client` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biplop4`
--

INSERT INTO `biplop4` (`id`, `client`) VALUES
(1, 'fucku@fuck.com');

-- --------------------------------------------------------

--
-- Table structure for table `jiten3`
--

CREATE TABLE `jiten3` (
  `id` int(11) UNSIGNED NOT NULL,
  `client` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jiten3`
--

INSERT INTO `jiten3` (`id`, `client`) VALUES
(1, 'angelmaden333@gmail.com'),
(2, 'niteshkc21@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `udhav5`
--

CREATE TABLE `udhav5` (
  `id` int(11) UNSIGNED NOT NULL,
  `client` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `udhav5`
--

INSERT INTO `udhav5` (`id`, `client`) VALUES
(1, 'udhavb32@gmail.com'),
(3, 'angelmaden333@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angel1`
--
ALTER TABLE `angel1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anil2`
--
ALTER TABLE `anil2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biplop4`
--
ALTER TABLE `biplop4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jiten3`
--
ALTER TABLE `jiten3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `udhav5`
--
ALTER TABLE `udhav5`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angel1`
--
ALTER TABLE `angel1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `anil2`
--
ALTER TABLE `anil2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biplop4`
--
ALTER TABLE `biplop4`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jiten3`
--
ALTER TABLE `jiten3`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `udhav5`
--
ALTER TABLE `udhav5`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
