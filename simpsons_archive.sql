-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 07:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpsons_archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `voiced_by` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `audio_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `first_name`, `last_name`, `age`, `occupation`, `voiced_by`, `image_url`, `audio_url`) VALUES
(1, 'Homer', 'Simpson', 40, 'Nuclear Safety Inspector', 'Dan Castellaneta', './images/homer.png', './audio/homer.wav'),
(2, 'Marge', 'Simpson', 40, 'Homemaker', 'Julie Kavner', './images/marge.png', './audio/marge.wav'),
(3, 'Bart', 'Simpson', 10, 'Student', 'Nancy Cartwright', './images/bart.png', './audio/bart.wav'),
(4, 'Lisa', 'Simpson', 8, 'Student', 'Yeardley Smith', './images/lisa.png', './audio/lisa.wav'),
(5, 'Maggie', 'Simpson', 8, NULL, NULL, './images/maggie.png', './audio/maggie.wav'),
(6, 'Moe', 'Szyslak', 55, 'Bartender', NULL, './images/moe.png', './audio/moe.wav');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
