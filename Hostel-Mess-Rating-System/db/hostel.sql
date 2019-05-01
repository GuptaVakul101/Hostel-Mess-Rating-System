-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 07:42 PM
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
  `apass` varchar(50) NOT NULL,
  `Current_Month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `auser`, `apass`, `Current_Month`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `Keyword` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Rating` int(11) NOT NULL,
  `is_Rejected` tinyint(1) NOT NULL,
  `is_Keyword` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`Keyword`, `Rating`, `is_Rejected`, `is_Keyword`) VALUES
('are', 0, 1, 0),
('bad', 0, 1, 0),
('extremely', 0, 1, 0),
('future', 0, 1, 0),
('happy', 2, 0, 1),
('in', 0, 1, 0),
('is', 0, 1, 0),
('mess', 0, 1, 0),
('nice', 9, 0, 1),
('of', 0, 1, 0),
('poor', 1, 0, 1),
('the', 0, 1, 0),
('upcoming', 7, 0, 1),
('yummy', 10, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

CREATE TABLE `mess` (
  `messName` varchar(50) CHARACTER SET latin1 NOT NULL,
  `managerUsername` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` bigint(50) NOT NULL,
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

INSERT INTO `mess` (`messName`, `managerUsername`, `Password`, `email`, `contact`, `Feedback_1`, `Feedback_2`, `Feedback_3`, `Feedback_4`, `Feedback_5`, `Feedback_6`, `Feedback_7`, `Feedback_8`, `Feedback_9`, `Feedback_10`, `Feedback_11`, `Feedback_12`) VALUES
('Kameng', 'Hardik', '21232f297a57a5a743894a0e4a801fc3', 'hardik45@gmail.com', 9000000000, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 0, 0),
('Kapili', 'Utkarsh', '21232f297a57a5a743894a0e4a801fc3', 'utkarshjain1508@gmail.com', 9038581508, 0, 0, 0, 0, 0, 9.25, 0, 0, 0, 0, 0, 0),
('Lohit', 'Vakul', '21232f297a57a5a743894a0e4a801fc3', 'utkarshjain1508@gmail.com', 1023456789, 4.5, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0),
('Siang', 'Ayush', 'c3284d0f94606de1fd2af172aba15bf3', 'ayus34h@gmail.com', 3473876, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Notifications`
--

CREATE TABLE `Notifications` (
  `ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Destination` varchar(200) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Priority` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `Notifications`
--

INSERT INTO `Notifications` (`ID`, `Title`, `Description`, `Destination`, `Timestamp`, `Priority`) VALUES
(8, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Hardik', '2019-05-01 12:02:52', 'High'),
(9, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Utkarsh', '2019-05-01 12:02:52', 'High'),
(10, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Vakul', '2019-05-01 12:02:52', 'High'),
(11, 'TESTING PURPOSES', '', 'Hardik', '2019-05-01 16:57:56', 'High'),
(13, 'TESTING PURPOSES', '', 'Hardik', '2019-05-01 16:58:07', 'Low'),
(15, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Hardik', '2019-05-01 17:39:15', 'High'),
(16, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Utkarsh', '2019-05-01 17:39:15', 'High'),
(17, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Vakul', '2019-05-01 17:39:16', 'High'),
(18, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Ayush', '2019-05-01 17:39:16', 'High'),
(19, 'STUDENT MESS CHANGE', 'THE STUDENT 645 CHANGED MESS FROM Kameng TO Kameng', 'Hardik', '2019-05-01 17:39:16', 'Low'),
(20, 'STUDENT MESS CHANGE', 'THE STUDENT 645 CHANGED MESS FROM Kameng TO Kameng', 'Hardik', '2019-05-01 17:39:16', 'Low'),
(21, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Hardik', '2019-05-01 17:40:13', 'High'),
(22, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Utkarsh', '2019-05-01 17:40:13', 'High'),
(23, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Vakul', '2019-05-01 17:40:13', 'High'),
(24, 'POOR MESS RATING', 'YOUR MESS RATING FOR THE CURRENT MONTH IS 0', 'Ayush', '2019-05-01 17:40:13', 'High');

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
  `Feedback_1` varchar(200) NOT NULL,
  `Feedback_2` varchar(200) NOT NULL,
  `Feedback_3` varchar(200) NOT NULL,
  `Feedback_7` varchar(200) NOT NULL,
  `Feedback_8` varchar(200) NOT NULL,
  `Feedback_9` varchar(200) NOT NULL,
  `Feedback_10` varchar(200) NOT NULL,
  `Feedback_11` varchar(200) NOT NULL,
  `Feedback_12` varchar(200) NOT NULL,
  `Feedback_4` varchar(200) NOT NULL,
  `Feedback_5` varchar(200) NOT NULL,
  `Feedback_6` varchar(200) NOT NULL,
  `Hostel_Mess` varchar(50) NOT NULL,
  `Mess_Request` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`roll_no`, `password`, `email`, `gender`, `mob`, `Hostel_Res`, `Feedback_1`, `Feedback_2`, `Feedback_3`, `Feedback_7`, `Feedback_8`, `Feedback_9`, `Feedback_10`, `Feedback_11`, `Feedback_12`, `Feedback_4`, `Feedback_5`, `Feedback_6`, `Hostel_Mess`, `Mess_Request`) VALUES
(645, '21232f297a57a5a743894a0e4a801fc3', 'bndsj@bdasub', 'm', 23468756, 'Kapli', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'mess    food extreme', 'Kameng', ''),
(1234, '21232f297a57a5a743894a0e4a801fc3', 'ikbn@cuj', 'm', 213213123, 'Kapli', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'bad food disgusting', 'Lohit', ''),
(3123, '21232f297a57a5a743894a0e4a801fc3', 'asd@gmail.com', 'm', 12312312313, 'Kapli', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'Kameng', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`Keyword`);

--
-- Indexes for table `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`messName`);

--
-- Indexes for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`ID`);

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

--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
