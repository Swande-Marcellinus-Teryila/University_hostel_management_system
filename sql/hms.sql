-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 06:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `s_n` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datre_updated` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`s_n`, `email`, `password`, `datre_updated`) VALUES
(1, 'admin@gmail.com', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `s_n` int(11) NOT NULL,
  `matno` varchar(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `othernames` varchar(190) NOT NULL,
  `level` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `health_status` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`s_n`, `matno`, `surname`, `firstname`, `othernames`, `level`, `sex`, `health_status`, `dob`, `state`, `email`, `address`, `phone`, `photo`, `status`, `date_updated`) VALUES
(6, '17/4444/ue', 'Daniel', 'Mercy', 'mercy', '100', 'Female', 'Not Physically impared', '2021-05-07', 'BENUE', 'emma@gmail.com', 'UAM', '09099090900', 'student5194461agent-7.jpg', 1, '2021-05-06 03:49:16'),
(7, '17/4579489/', 'Swande', 'Teryila', 'marcellinus', '100', 'Male', 'Not Physically impared', '2021-05-21', 'CROSS RIVER', 'emma@gmail.com', 'uma', '09099090900', 'student4550340agent-6.jpg', 0, '2021-05-06 03:54:55'),
(8, '17/4579489/', 'Jiiu', 'Marc', 'marcellinus', '100', 'Male', 'Not Physically impared', '2021-05-07', 'ANAMBRA', 'emma@gmail.com', '90', '09090009768', 'student5337276agent-4.jpg', 0, '2021-05-06 03:55:41'),
(9, '17/4904/ue', 'Daniel', 'Marc', 'marcel', '100', 'Male', 'Not Physically impared', '2021-05-13', 'CROSS RIVER', 'emma@gmail.com', 'uam', '09099090900', 'student5008792agent-5.jpg', 0, '2021-05-06 03:56:27'),
(10, '17/4579489/', 'Jiiu', 'Marc', 'teryila', '300', 'Male', 'Not Physically impared', '2021-05-12', 'ANAMBRA', 'swandemarcellinus@gmail.com', 'uam', '09090009768', 'student14058358agent-4.jpg', 0, '2021-05-06 04:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(100) NOT NULL,
  `hostel_name` varchar(100) NOT NULL,
  `no_of_rooms` int(200) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `hostel_name`, `no_of_rooms`, `photo`, `gender`) VALUES
(3, 'BLOK B', 5, 'BLOK B468slide-2.jpg', 'male'),
(4, 'BLOK C', 2, 'BLOK C9789property-2.jpg', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`s_n`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`s_n`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `s_n` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `s_n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
