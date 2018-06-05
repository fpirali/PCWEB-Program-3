-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 12:43 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justice_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empID`, `firstName`, `lastName`, `email`, `position`, `password`) VALUES
(45, 'Faris', 'Pirali', 'pir.faris@gmail.com', 'Distant Learning Technologist', '$2y$11$dVOdlX4rx.yLK');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `empID` int(11) NOT NULL,
  `registrationCode` int(11) NOT NULL,
  `trainingCode` int(11) NOT NULL,
  `trainingName` varchar(50) NOT NULL,
  `trainingLocation` varchar(50) NOT NULL,
  `trainingDate` date NOT NULL,
  `trainingTime` time NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`empID`, `registrationCode`, `trainingCode`, `trainingName`, `trainingLocation`, `trainingDate`, `trainingTime`, `firstName`, `lastName`, `date`) VALUES
(36, 1, 3, 'Justice DOCKET', 'Lincoln', '2018-01-01', '08:30:00', 'Faris', 'Pirali', '2018-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `trainingCode` int(11) NOT NULL,
  `trainingName` varchar(50) NOT NULL,
  `trainingLocation` varchar(50) NOT NULL,
  `trainingDate` date NOT NULL,
  `trainingTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`trainingCode`, `trainingName`, `trainingLocation`, `trainingDate`, `trainingTime`) VALUES
(3, 'Justice DOCKET', 'LINCOLN', '2018-01-01', '08:00:00'),
(4, 'Justice Criminal', 'LINCOLN', '2018-03-05', '12:00:00'),
(5, 'Justice Criminal', 'Grand Island', '2018-08-01', '08:00:00'),
(9, 'District Court ', 'LINCOLN', '2018-08-25', '08:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registrationCode`),
  ADD KEY `trainingCode` (`trainingCode`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`trainingCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registrationCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `trainingCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
