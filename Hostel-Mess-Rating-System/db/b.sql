-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2019 at 11:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `auser`, `apass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

CREATE TABLE `mess` (
  `messName` varchar(50) NOT NULL,
  `managerUsername` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Feedback_1` float NOT NULL,
  `Feedback_2` float NOT NULL,
  `Feedback_3` float NOT NULL,
  `Feedback_4` float NOT NULL,
  `Feedback_5` float NOT NULL,
  `Feedback_6` float NOT NULL,
  `Feedback_7` float NOT NULL,
  `Feedback_8` float NOT NULL,
  `Feedback_9` float NOT NULL,
  `Feedback_10` float NOT NULL,
  `Feedback_11` float NOT NULL,
  `Feedback_12` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `mess`
--

INSERT INTO `mess` (`messName`, `managerUsername`, `Password`, `Feedback_1`, `Feedback_2`, `Feedback_3`, `Feedback_4`, `Feedback_5`, `Feedback_6`, `Feedback_7`, `Feedback_8`, `Feedback_9`, `Feedback_10`, `Feedback_11`, `Feedback_12`) VALUES
('kapili', 'Utkarsh', '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `roll_no` int(9) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `mob` bigint(50) NOT NULL,
  `Hostel_Res` varchar(50) NOT NULL,
  `Feedback_1` varchar(50) NOT NULL,
  `Feedback_2` varchar(200) NOT NULL,
  `Feedback_3` varchar(200) NOT NULL,
  `Feedback_7` varchar(200) NOT NULL,
  `Feedback_8` varchar(200) NOT NULL,
  `Feedback_9` varchar(200) NOT NULL,
  `Feedback_10` varchar(200) NOT NULL,
  `Feedback_11` varchar(200) NOT NULL,
  `Feedback_12` varchar(200) NOT NULL,
  `Feedback_4` varchar(50) NOT NULL,
  `Feedback_5` varchar(50) NOT NULL,
  `Feedback_6` varchar(200) NOT NULL,
  `Hostel_Mess` varchar(50) NOT NULL,
  `Mess_Request` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`roll_no`, `password`, `email`, `gender`, `mob`, `Hostel_Res`, `Feedback_1`, `Feedback_2`, `Feedback_3`, `Feedback_7`, `Feedback_8`, `Feedback_9`, `Feedback_10`, `Feedback_11`, `Feedback_12`, `Feedback_4`, `Feedback_5`, `Feedback_6`, `Hostel_Mess`, `Mess_Request`) VALUES
(170101075, '21232f297a57a5a743894a0e4a801fc3', 'utkarshjain1508@gmail.com', 'm', 9038581508, 'Kapli', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'kapili', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`messName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`roll_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
