-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 08:30 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DEPT_ID` varchar(2) COLLATE utf8_thai_520_w2 NOT NULL,
  `DEPT_NAME` varchar(30) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPT_ID`, `DEPT_NAME`) VALUES
('D1', 'บัญชี'),
('D2', 'ไอที');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMP_ID` tinyint(4) NOT NULL,
  `EMP_NAME` varchar(30) COLLATE utf8_thai_520_w2 NOT NULL,
  `EMP_GENDER` char(1) COLLATE utf8_thai_520_w2 NOT NULL,
  `DEPT_ID` varchar(2) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `EMP_NAME`, `EMP_GENDER`, `DEPT_ID`) VALUES
(1, 'ANT', 'M', 'D2'),
(2, 'BAT', 'M', 'D1'),
(3, 'CAT', 'F', 'D2'),
(4, 'RAT', 'F', 'D1'),
(5, 'DOG', 'M', 'D2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DEPT_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMP_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
