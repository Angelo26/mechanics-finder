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
-- Database: `mechanic finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `photo`) VALUES
(1, 'angel', '202cb962ac59075b964b07152d234b70', 'adminupload/19488595_1921930284690820_6385646192715394691_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'suzuki'),
(2, 'bajaj'),
(3, 'yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `chgdesc`
--

CREATE TABLE `chgdesc` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `saying` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chgdesc`
--

INSERT INTO `chgdesc` (`id`, `picture`, `name`, `saying`) VALUES
(1, '', 'angrj', 'jhgfds');

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `id` int(11) NOT NULL,
  `mfirst` varchar(256) NOT NULL,
  `mlast` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `maddress` varchar(256) NOT NULL,
  `garage` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `mstate` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `img` varchar(255) NOT NULL,
  `mstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fmessage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fname`, `email`, `fmessage`) VALUES
(1, 'angel maden', 'angelmaden333@gmail.com', 'Hey bro, your site is doing great job!!!'),
(2, 'Uten Maharjan', 'utenmaharjan333@gmail.com', 'hey wanna meet you!!! at my place at 5pm'),
(3, 'Manoj Pokhrel', 'mnj333@gmail.com', 'Wow I have never seen something like this before, Awesome site!!'),
(4, 'angel maden', 'anilgole333@gmail.com', 'I didn\'t get my mechanics at my place. Please try to reach out some of the mechanics at my place');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model`) VALUES
(1, 'Gixxer SF'),
(2, 'Pulsar'),
(3, 'fz');

-- --------------------------------------------------------

--
-- Table structure for table `newpart`
--

CREATE TABLE `newpart` (
  `id` int(11) NOT NULL,
  `newpart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newpart`
--

INSERT INTO `newpart` (`id`, `newpart`) VALUES
(1, 'battery'),
(2, 'engine');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `vec_id` int(11) NOT NULL,
  `vec_brand` varchar(255) NOT NULL,
  `vec_model` varchar(255) NOT NULL,
  `vec_part` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `pstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`vec_id`, `vec_brand`, `vec_model`, `vec_part`, `price`, `picture`, `shop`, `pstatus`) VALUES
(9, 'suzuki', 'Gixxer SF', 'battery', '800', 'partsupload/suzbattery.jpg', 'Maitighar Center', 'Sold'),
(10, 'suzuki', 'Gixxer SF', 'battery', '20000', 'partsupload/download.png', 'Daraz', 'Available'),
(11, 'bajaj', 'Pulsar', 'battery', '18000', 'partsupload/download1.png', 'KCC', 'Sold'),
(12, 'suzuki', 'Gixxer SF', 'battery', '24000', 'partsupload/download2.png', 'Star Mall', 'Available'),
(13, 'bajaj', 'Pulsar', 'battery', '22000', 'partsupload/download3.png', 'Avatar', 'Available'),
(14, 'suzuki', 'Gixxer SF', 'battery', '2500', 'partsupload/images.png', 'Panchkanya', 'Available'),
(16, 'suzuki', 'Gixxer SF', 'engine', '20000', 'partsupload/75603996_1720027368129168_128622841607225344_n.jpg', 'Yamaha showroom', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `realmechanics`
--

CREATE TABLE `realmechanics` (
  `mechanic_id` int(11) NOT NULL,
  `mechanic_first` varchar(256) NOT NULL,
  `mechanic_last` varchar(256) NOT NULL,
  `mechanic_email` varchar(256) NOT NULL,
  `mechanic_pwd` varchar(256) NOT NULL,
  `mechanic_address` varchar(256) NOT NULL,
  `mechanic_garage` varchar(256) NOT NULL,
  `mechanic_city` varchar(256) NOT NULL,
  `mechanic_state` varchar(256) NOT NULL,
  `mechanic_contact` varchar(256) NOT NULL,
  `mechanic_img` varchar(255) NOT NULL,
  `mechanic_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realmechanics`
--

INSERT INTO `realmechanics` (`mechanic_id`, `mechanic_first`, `mechanic_last`, `mechanic_email`, `mechanic_pwd`, `mechanic_address`, `mechanic_garage`, `mechanic_city`, `mechanic_state`, `mechanic_contact`, `mechanic_img`, `mechanic_status`) VALUES
(1, 'Angel', 'Maden', 'angelmaden333@gmail.com', '$2y$10$EKdwTBNrQEAzqadEJn61M.eFlRMlWM1DAiN0ozwcxUZq0CaKeq8vK', 'Putalisadak', 'RK motorcyle service', 'Kathmandu', 'province3', '9811322484', 'upload/logo3 (2).png', 'active'),
(2, 'anil', 'banset', 'anilbasnet@gmail.com', '$2y$10$PiFw.AzQHy.yCq8DCd3foO2KoVUc6K4V7.uC7doUf2DvVfDa50ygW', 'putalisadak', 'Janta garage', 'Kathmandu', 'province3', '9876543210', 'upload/75603996_1720027368129168_128622841607225344_n.jpg', 'active'),
(3, 'jiten', 'shestha', 'jasdas@gmail.com', '$2y$10$gZNQ3giMrOrDMW218p913uSA011y7MM4CLT98qu3SY2LdtD2mOTUu', 'bungmati', 'lobai', 'kalo', 'province3', '3213454545', 'upload/Screenshot (5).png', 'active'),
(4, 'biplop', 'lama', 'biplop@123.com', '$2y$10$fFZZtVcLBDyhlfz72auSZ.cPBx.8Tllu.PsO8gbrQA0q.oA2mP1oG', 'narayantar', 'jony sins', 'las vegas', 'province1', '9861244634', 'upload/mechanic.png', 'active'),
(5, 'Udhav', 'Basnet', 'udhavb32@gmail.com', '$2y$10$3c3fRTH.U7phqKjkqIm2Pu1DcCsw/fZA8OVaBThjcAv3C5sb4wqgK', 'Putalisadak', 'Karkado', 'Kathmandu', 'province3', '9848216599', 'upload/5783a678-8f52-45e0-b785-5aea25d5eacd_200x200.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `roadassist`
--

CREATE TABLE `roadassist` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `username`, `pwd`, `email`) VALUES
(1, 'angel', 'maden', 'angel13', '$2y$10$t8Vjsc1HMqZAOQmeiDFM/ugDSmumw.rHX64mtReJXBLBbbk/yxtPu', 'angelmaden333@gmail.com'),
(2, 'bob', 'dai', 'bobdai', '$2y$10$lMnohXa.4d9vTYm1OrpqzOD4hnBIOwSwhm4440Ul/DijqbP9QkWPS', 'bobdai@gmail.com'),
(3, 'angel', 'maden', 'angel14', '$2y$10$/VEkK9.wYAwa.K4d2mDBVOYInjGXZhxsalGElt5F3Q1ev/Or4Zopi', 'angemaden@gmail.com'),
(4, 'nitesh', 'kc', 'xnite21', '$2y$10$facMPgW4dck5Zo71i6Ekaug0AEaIfSvRDv1nIkUNVCnHBXAm9l8Nq', 'niteshkc21@gmail.com'),
(5, 'Mickey', 'Rana', 'mickeymickey', '$2y$10$I/13rR0ZFWZUsb1J7SSIs.OyzZQ4Mf4IR/2AGuu2.4EQ5QRb1abIi', 'fucku@fuck.com'),
(6, 'udhav', 'basnet', 'udhavbasnet', '$2y$10$Ihz4dED12syh36SPywHeU.9M/aZLFbmLmaTnc88cWOZCYN0hLrjGa', 'udhavb32@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chgdesc`
--
ALTER TABLE `chgdesc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newpart`
--
ALTER TABLE `newpart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`vec_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `realmechanics`
--
ALTER TABLE `realmechanics`
  ADD PRIMARY KEY (`mechanic_id`);

--
-- Indexes for table `roadassist`
--
ALTER TABLE `roadassist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chgdesc`
--
ALTER TABLE `chgdesc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newpart`
--
ALTER TABLE `newpart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `vec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realmechanics`
--
ALTER TABLE `realmechanics`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roadassist`
--
ALTER TABLE `roadassist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
