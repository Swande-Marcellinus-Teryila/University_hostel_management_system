-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 05:04 PM
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
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_level` int(20) NOT NULL,
  `date_updated` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`s_n`, `username`, `password`, `user_level`, `date_updated`) VALUES
(1, 'admin@gmail.com', 'admin', 0, ''),
(3, 'jostum', '$2y$10$e/HuIIu3PGZMlNB1LDMDt.oYGlY3V4TJ8HuR88q4Z/TAzvQw/RBRS', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(200) NOT NULL,
  `hostel_id` int(100) NOT NULL,
  `room_id` int(200) NOT NULL,
  `matno` varchar(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `othernames` varchar(190) NOT NULL,
  `level` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `health_status` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `next_of_kin` varchar(100) NOT NULL,
  `next_of_kin_phone` int(11) NOT NULL,
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

INSERT INTO `applicants` (`id`, `hostel_id`, `room_id`, `matno`, `surname`, `firstname`, `othernames`, `level`, `sex`, `health_status`, `dob`, `state`, `next_of_kin`, `next_of_kin_phone`, `email`, `address`, `phone`, `photo`, `status`, `date_updated`) VALUES
(6, 0, 0, '17/4444/ue', 'Daniel', 'Mercy', 'mercy', '100', 'Female', 'Not Physically impared', '2021-05-07', 'BENUE', '', 0, 'emma@gmail.com', 'UAM', '09099090900', 'student5194461agent-7.jpg', 1, '2021-05-06 03:49:16'),
(20, 6, 831, '17/44402/ue', 'Swande', 'Marcellinus', 'Teryila', '300', 'Male', 'Not Physically impared', '2021-01-21', 'EBONYI', 'Marc', 9090099, 'marc@gmail.com', 'Southcore', '09098575855', '6149e0e7d598313996058998074admin.png', 0, '2021-09-21 13:40:55'),
(21, 6, 832, '17/57678/ue', 'Swande', 'Marcellinus', 'Teryila', '700', 'Male', 'Physically impared', '2022-09-24', 'BENUE', 'Marc', 9090099, 'marc@gmail.com', 'Uanm', '09098575855', '614cf2ea21a7819175160427593admin.png', 0, '2021-09-23 21:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_blocks`
--

CREATE TABLE `hostel_blocks` (
  `id` int(100) NOT NULL,
  `hostel_name` varchar(100) NOT NULL,
  `no_of_rooms` int(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_blocks`
--

INSERT INTO `hostel_blocks` (`id`, `hostel_name`, `no_of_rooms`, `location`, `photo`, `gender`) VALUES
(6, 'Block B extension', 10, 'SouthCore', '61477c9cb490e1311583717353161477b0502ea917061649236769BLOK B164about.png', 'Male'),
(7, 'Block B', 20, 'Northcore', '61467242d37031577159020066661466fb19f3f213159916979249BLOCK A4039property-2.jpg', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_rooms`
--

CREATE TABLE `hostel_rooms` (
  `id` int(200) NOT NULL,
  `hostel_id` varchar(200) NOT NULL,
  `room_number` int(200) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_rooms`
--

INSERT INTO `hostel_rooms` (`id`, `hostel_id`, `room_number`, `status`, `date_created`) VALUES
(818, '3', 1, 1, '2021-09-18 21:57:24'),
(819, '3', 2, 1, '2021-09-18 21:57:24'),
(820, '3', 3, 1, '2021-09-18 21:57:24'),
(821, '3', 4, 1, '2021-09-18 21:57:24'),
(822, '3', 5, 1, '2021-09-18 21:57:24'),
(823, '4', 1, 1, '2021-09-18 22:10:15'),
(824, '4', 8, 1, '2021-09-18 22:12:27'),
(825, '4', 9, 1, '2021-09-18 22:12:49'),
(826, '4', 2, 1, '2021-09-18 22:12:57'),
(827, '6', 1, 1, '2021-09-20 09:44:01'),
(828, '6', 2, 1, '2021-09-20 09:44:01'),
(829, '6', 3, 1, '2021-09-20 09:44:01'),
(830, '6', 4, 1, '2021-09-20 09:44:01'),
(831, '6', 5, 1, '2021-09-20 09:44:01'),
(832, '6', 6, 1, '2021-09-20 09:44:01'),
(833, '6', 7, 1, '2021-09-20 09:44:01'),
(834, '6', 8, 1, '2021-09-20 09:44:01'),
(835, '6', 9, 1, '2021-09-20 09:44:01'),
(836, '6', 10, 1, '2021-09-20 09:44:01');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matno` (`matno`);

--
-- Indexes for table `hostel_blocks`
--
ALTER TABLE `hostel_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `s_n` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hostel_blocks`
--
ALTER TABLE `hostel_blocks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=837;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
