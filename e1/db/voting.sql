-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 11:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `aname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`, `aname`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(2, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `rollno` bigint(30) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `approve_status` int(11) DEFAULT 0 COMMENT '0 for pending , 1 for approve 2 for reject'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`name`, `email`, `branch`, `rollno`, `pname`, `approve_status`) VALUES
('smitha', 'smitha@gmail.com', 'CSE', 87, 'vice president', 1),
('daivik', 'daivik@gmail.com', 'CSE', 56, 'President', 1),
('sheshadri', 'shesha@gmail.com', 'CSE', 88, 'vice president', 1),
('nidhi', 'nidhi@gmail.com', 'CSE', 77, 'President', 1),
('gulaisha', 'gulaishakalam@gmail.com', 'CSE', 70, 'President', 1),
('chiraksha', 'chiraksha@gmail.com', 'CSE', 10, 'vice president', 1),
('eod', 'eod@gmail.com', 'CSE', 63, 'secretary', 1),
('dhanush', 'dhanush@gmail.com', 'CSE', 58, 'secretary', 1),
('anusha', 'anusha@gmail.com', 'CSE', 12, 'President', 2),
('daniel', 'daniel@gmail.com', 'CSE', 49, 'secretary', 1),
('piya', 'piya@gmail.com', 'CSE', 89, 'President', 2),
('ajay', 'ajay@gmail.com', 'CSE', 164, 'secretary', 1),
('sushma', 'sushma@gmail.com', 'CSE', 167, 'secretary', 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pid` int(10) UNSIGNED NOT NULL,
  `pname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pid`, `pname`) VALUES
(1001, 'President'),
(1002, 'vice president'),
(1003, 'secretary');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `usn` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `branch` text NOT NULL,
  `password` text NOT NULL,
  `email_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`usn`, `name`, `branch`, `password`, `email_id`) VALUES
(10, 'chiraksha', 'CSE', 'chiraksha@10', 'chiraksha@gmail.com'),
(11, 'anvesha', 'CSE', 'anvesha@11', 'anvesha@gmail.com'),
(12, 'anusha', 'CSE', 'anusha@12', 'anusha@gmail.com'),
(15, 'akrithi', 'CSE', 'akrithi@15', 'akrithi@gmail.com'),
(49, 'daniel', 'CSE', '4nm19cs049', 'daniel@gmail.com'),
(56, 'daivik', 'CSE', '4nm19cs056', 'daivik@gmail.com'),
(58, 'dhanush', 'CSE', '4nm19cs058', 'dhanush@gmail.com'),
(63, 'eod', 'CSE', '4nm19cs063@gmail.com', 'eod@gmail.com'),
(70, 'gulaisha', 'CSE', '4nm19cs070', 'gulaisha@gmail.com'),
(77, 'nidhi', 'CSE', '4nm19cs077', 'nidhi@gmail.com'),
(85, 'dinesh', 'CSE', '4nm19cs085', 'dinesh@gmail.com'),
(87, 'smitha', 'CSE', 'smitha@87', 'smitha@gmail.com'),
(88, 'shesha', 'CSE', 'shesha@88', 'shesha@gmail.com'),
(100, 'Raju', 'cse', 'hero', 'nidhi@gmail.com'),
(164, 'ajay', 'cse', '4567', 'ajay@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `Branch` text DEFAULT NULL,
  `candidate` varchar(60) NOT NULL,
  `rollno` int(10) NOT NULL,
  `pname` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `Branch`, `candidate`, `rollno`, `pname`) VALUES
('daniel', 'daniel@gmail.com', 'CSE', 'gulaisha', 49, 'President'),
('daniel', 'daniel@gmail.com', 'CSE', 'dhanush', 49, 'secretary'),
('daniel', 'daniel@gmail.com', 'CSE', 'chiraksha', 49, 'vice president'),
('nidhi', 'nidhi@gmail.com', 'CSE', 'gulaisha', 77, 'President'),
('nidhi', 'nidhi@gmail.com', 'CSE', 'eod', 77, 'secretary'),
('nidhi', 'nidhi@gmail.com', 'CSE', 'chiraksha', 77, 'vice president'),
('dinesh', 'dinesh@gmail.com', 'CSE', 'daivik', 85, 'President'),
('dinesh', 'dinesh@gmail.com', 'CSE', 'dhanush', 85, 'secretary'),
('dinesh', 'dinesh@gmail.com', 'CSE', 'sheshadri', 85, 'vice president'),
('sheshadri', 'shesha@gmail.com', 'CSE', 'nidhi', 88, 'President'),
('sheshadri', 'shesha@gmail.com', 'CSE', 'dhanush', 88, 'secretary'),
('sheshadri', 'shesha@gmail.com', 'CSE', 'smitha', 88, 'vice president'),
('Raju', 'nidhi@gmail.com', 'CSE', 'daivik', 100, 'President'),
('ajay', 'ajay@gmail.com', 'cse', 'gulaisha', 164, 'President'),
('sushma', 'sushma@gmail.com', 'CSE', 'daivik', 167, 'President');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`rollno`,`pname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
