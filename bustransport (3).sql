-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2021 at 10:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bustransport`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getBus` ()  select*from buses$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBusStop` ()  select*from bus_stops$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDriver` ()  Select*from driver$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFees` ()  select*from fee$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRoute` ()  select*from route$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudent` ()  select* from  student$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `stuRoute` ()  select student.usn,student.name,student.route_number,route.bus_number from student,route where student.route_number=route.route_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL CHECK (`pwd` >= 8)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `pwd`) VALUES
('adminlogin@ymail.com', '123456yolo');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `bus_id` varchar(20) NOT NULL,
  `capacity` int(200) DEFAULT NULL,
  `D_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`bus_id`, `capacity`, `D_no`) VALUES
('1234', 60, '1'),
('1478', 55, '2'),
('4512', 60, '6'),
('7892', 60, '10'),
('7894', 70, '3'),
('8520', 60, '7');

-- --------------------------------------------------------

--
-- Table structure for table `bus_stops`
--

CREATE TABLE `bus_stops` (
  `area` varchar(50) NOT NULL,
  `route_number` int(10) DEFAULT NULL,
  `stopcode` int(10) NOT NULL,
  `stopname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_stops`
--

INSERT INTO `bus_stops` (`area`, `route_number`, `stopcode`, `stopname`) VALUES
('vv mohalla', NULL, 4, 'p circle');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `D_no` varchar(10) NOT NULL,
  `D_Name` varchar(50) NOT NULL,
  `Age` int(4) NOT NULL,
  `Salary` int(10) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`D_no`, `D_Name`, `Age`, `Salary`, `phone`) VALUES
('1', 'ashish', 40, 22000, 2147483647),
('10', 'manoj', 45, 16000, 2147483647),
('2', 'mohan', 25, 15000, 2147483647),
('3', 'ashith', 25, 15000, 2147483647),
('5', 'dude1', 45, 15000, 2147483647),
('6', 'jack', 56, 15000, 2147483647),
('7', 'john', 59, 17000, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `Transaction_ID` int(11) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `Amount` int(11) NOT NULL CHECK (`Amount` >= 15000),
  `Paydate` date NOT NULL,
  `ExpiryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `fee`
--
DELIMITER $$
CREATE TRIGGER `add_fees` BEFORE INSERT ON `fee` FOR EACH ROW set new.Amount = 15000
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(10) NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time` time NOT NULL,
  `bus_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `arrival_time`, `departure_time`, `bus_number`) VALUES
(20, '08:00:00', '16:15:00', '7894'),
(45, '08:00:00', '16:15:00', '8520'),
(85, '08:00:00', '16:15:00', '1234');

--
-- Triggers `route`
--
DELIMITER $$
CREATE TRIGGER `add_time` BEFORE INSERT ON `route` FOR EACH ROW set new.arrival_time = '08:00', new.departure_time = '16:15'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(10) NOT NULL,
  `name` char(50) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `gender` char(10) NOT NULL,
  `area` varchar(50) NOT NULL,
  `stopname` varchar(50) NOT NULL,
  `route_number` int(10) DEFAULT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `branch`, `gender`, `area`, `stopname`, `route_number`, `phone`) VALUES
('4mh18is062', 'sujfg', 'CSE', 'Male', 'vv mohalla', 'panchavati circle', 20, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bus_id`),
  ADD KEY `buses_ibfk_1` (`D_no`);

--
-- Indexes for table `bus_stops`
--
ALTER TABLE `bus_stops`
  ADD PRIMARY KEY (`stopcode`),
  ADD KEY `route_number` (`route_number`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`D_no`),
  ADD UNIQUE KEY `D_Name` (`D_Name`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`usn`),
  ADD UNIQUE KEY `Transaction_ID` (`Transaction_ID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`),
  ADD UNIQUE KEY `route_id` (`route_id`),
  ADD KEY `route_ibfk_1` (`bus_number`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`),
  ADD KEY `route_number` (`route_number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_ibfk_1` FOREIGN KEY (`D_no`) REFERENCES `driver` (`D_no`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `bus_stops`
--
ALTER TABLE `bus_stops`
  ADD CONSTRAINT `bus_stops_ibfk_1` FOREIGN KEY (`route_number`) REFERENCES `route` (`route_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`bus_number`) REFERENCES `buses` (`bus_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`route_number`) REFERENCES `route` (`route_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
