-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 10:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbtbsphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `booked_amount` int(100) NOT NULL,
  `booking_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `userID`, `eventID`, `university`, `booked_amount`, `booking_created`) VALUES
(68, 4, '61', '1', 30, '2022-10-19 09:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(100) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `ticketPrice` decimal(9,2) NOT NULL,
  `university` int(11) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `ticketAvailable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventName`, `ticketPrice`, `university`, `eventDate`, `eventTime`, `date_created`, `ticketAvailable`) VALUES
(61, 'Freshers', '30.00', 1, '2022-10-28', '16:00:00', '2022-10-19 09:08:43', 500);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `uniID` int(11) NOT NULL,
  `uniName` varchar(50) NOT NULL,
  `abbr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uniID`, `uniName`, `abbr`) VALUES
(1, 'Tshwane University of Technology', 'TUT'),
(2, 'University of Pretoria', 'UP'),
(3, 'Walter Sisulu University', 'WSU'),
(4, 'Nelson Mandela University', 'NMU'),
(5, 'University of Johannesburg', 'UJ'),
(6, 'University of Mpumalanga', 'UMP'),
(8, 'University of  Fort Hare', 'UFH'),
(9, 'University of Cape Town', 'UCT'),
(10, 'Cape Penisula University of Technology', 'CPUT'),
(11, 'VAAL UNIVERSITY OF TECHNOLOGY', 'VUT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `studentno` varchar(9) NOT NULL,
  `University` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `studentno`, `University`, `user_name`, `user_password`, `role`, `user_created`) VALUES
(3, 'Simon mike', '216258987', '1', 'admin', '$2y$10$5bfeescV2B4ktIWz4LlPQuzrsDU04B6GkBl2W.dx8DXegZeODHrqu', 'Admin', '2022-10-19 03:47:06'),
(4, 'sihle mikeN', '218654225', '1', 'sihle', '$2y$10$GiL.Ds3BneyD4EaAG8S5cuaX3fRGNCIRkHkt6TJeyq/ywgLhmUlmu', 'Student', '2022-10-19 09:16:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uniID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `uniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
