-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 08:33 AM
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
-- Database: `mechanics`
--

-- --------------------------------------------------------

--
-- Table structure for table `angel1`
--

CREATE TABLE `angel1` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `usermessage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angel1`
--

INSERT INTO `angel1` (`id`, `username`, `contact`, `usermessage`) VALUES
(1, 'angel', '9811322484', 'I have my tyre punctured');

-- --------------------------------------------------------

--
-- Table structure for table `anil2`
--

CREATE TABLE `anil2` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `usermessage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `biplop4`
--

CREATE TABLE `biplop4` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `usermessage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biplop4`
--

INSERT INTO `biplop4` (`id`, `username`, `contact`, `usermessage`) VALUES
(1, 'mickeymickey', 'fuck mote', 'ta bhote hos\r\nta bhote hos\r\nta bhote hosta bhote hosta bhote hosta bhote hosta bhote hos');

-- --------------------------------------------------------

--
-- Table structure for table `jiten3`
--

CREATE TABLE `jiten3` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `usermessage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `udhav5`
--

CREATE TABLE `udhav5` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `usermessage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `udhav5`
--

INSERT INTO `udhav5` (`id`, `username`, `contact`, `usermessage`) VALUES
(1, 'udhav basnet', '9848216599', 'I have a problem in a car'),
(2, 'gandu', 'messenger(angel maden)', 'I have a headlight problem');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `udhav5`
--
ALTER TABLE `udhav5`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
