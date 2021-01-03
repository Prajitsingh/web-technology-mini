-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 03:41 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `es`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` char(5) NOT NULL,
  `FNAME` varchar(30) DEFAULT NULL,
  `PSW` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `FNAME`, `PSW`, `EMAIL`, `PHONE`) VALUES
('1', 'AJAY', 'ADMIN', 'AJAY@GMAIL.COM', 2147483647),
('2', 'A', 'A', 'A', 11),
('3', 'Bhunesh Singh', 'ADMIN', 'bnsingh298@gmail.com', 9620835644);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_ID` char(5) NOT NULL,
  `FNAME` varchar(30) DEFAULT NULL,
  `PSW` varchar(100) DEFAULT NULL,
  `PHONE` int(10) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `PRESENT` tinyint(1) DEFAULT NULL,
  `SVC_ID` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_ID`, `FNAME`, `PSW`, `PHONE`, `EMAIL`, `ADDRESS`, `PRESENT`, `SVC_ID`) VALUES
('EI001', 'JOHN', 'ADMIN', 2147483647, 'SAMKITH123@GMAIL.COM', 'JAYNAGAR', 1, 'SVC01'),
('EI002', 'SHAAM', 'ADMIN', 2147483647, 'JOHN@ICLOUD.COM', 'MALLESHWARAM', 1, 'SVC01'),
('EI003', 'REESE', 'ADMIN', 2147483647, 'REESE@ICLOUD.COM', 'RT NAGAR', 1, 'SVC01'),
('EI004', 'FINCH', 'ADMIN', 2147483647, 'FINCH@ICLOUD.COM', 'RAJAJINAGAR', 1, 'SVC01'),
('EI005', 'MANOJ', 'ADMIN', 2147483647, 'MANOJ@ICLOUD.COM', 'MALLESHWARAM', 1, 'SVC01'),
('EI006', 'HARDY', 'ADMIN', 2147483647, 'HARDY@ICLOUD.COM', 'MALLESHWARAM', 1, 'SVC01'),
('EI007', 'MURRAY', 'ADMIN', 2147483647, 'MURRAY@ICLOUD.COM', 'HEBBAL', 1, 'SVC01'),
('EI008', 'FEZ', 'ADMIN', 2147483647, 'FEZ@ICLOUD.COM', 'RAJAJINAGAR', 1, 'SVC01');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `MODEL_NO` char(6) NOT NULL,
  `P_ID` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`MODEL_NO`, `P_ID`) VALUES
('AC0001', 'PI001'),
('AC0002', 'PI001'),
('TE0001', 'PI002'),
('TE0002', 'PI002'),
('RE0001', 'PI003'),
('RE0002', 'PI003'),
('WP0001', 'PI004'),
('WP0002', 'PI004'),
('MO0001', 'PI005'),
('MO0002', 'PI005'),
('WM0001', 'PI006'),
('WM0002', 'PI006'),
('MI0001', 'PI007'),
('MI0002', 'PI007'),
('GR0001', 'PI008'),
('GR0002', 'PI008'),
('CO0001', 'PI009'),
('CO0002', 'PI009');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_ID` char(5) NOT NULL,
  `P_TYPE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `P_TYPE`) VALUES
('PI001', 'AIR CONDITIONER'),
('PI002', 'TELEVISION'),
('PI003', 'REFRIGERATOR'),
('PI004', 'WATER PURIFIER'),
('PI005', 'MONITORS'),
('PI006', 'WASHING MACHINE'),
('PI007', 'MIXER'),
('PI008', 'GRINDER'),
('PI009', 'COOLERS');

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `E_ID` char(5) NOT NULL,
  `P_ID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`E_ID`, `P_ID`) VALUES
('EI003', 'PI001'),
('EI003', 'PI002'),
('EI003', 'PI003'),
('EI004', 'PI004'),
('EI004', 'PI005'),
('EI004', 'PI006'),
('EI005', 'PI007'),
('EI005', 'PI008'),
('EI005', 'PI009'),
('EI006', 'PI001'),
('EI006', 'PI002'),
('EI006', 'PI003'),
('EI007', 'PI001'),
('EI007', 'PI005'),
('EI007', 'PI006'),
('EI008', 'PI007'),
('EI008', 'PI008'),
('EI008', 'PI009');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `TRACKING_NO` int(10) NOT NULL,
  `DATE_B` timestamp NOT NULL DEFAULT current_timestamp(),
  `STATUS` varchar(10) DEFAULT 'OPEN',
  `C_ID` char(5) DEFAULT NULL,
  `E_ID` char(5) DEFAULT NULL,
  `MODEL_NO` char(6) DEFAULT NULL,
  `ADDR` varchar(100) NOT NULL,
  `PROBDESC` varchar(500) DEFAULT NULL,
  `RATING` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`TRACKING_NO`, `DATE_B`, `STATUS`, `C_ID`, `E_ID`, `MODEL_NO`, `ADDR`, `PROBDESC`, `RATING`) VALUES
(1, '2018-11-03 09:01:08', NULL, NULL, NULL, NULL, '', NULL, 0),
(2, '2018-11-17 09:48:51', 'CLOSE', '1', 'EI003', 'AC0002', 'BHIKSHU PRASTH #27 #13 OPP CENTRAL LIBRARY 2ND CROSS RRMR EXTENSION BANGALORE 27', NULL, 3),
(3, '2018-11-17 09:48:51', 'CLOSE', '1', 'EI003', 'AC0001', 'BHIKSHU PRASTH #27 #13 OPP CENTRAL LIBRARY 2ND CROSS RRMR EXTENSION BANGALORE 27', NULL, 0),
(6, '2019-11-24 12:04:11', 'CLOSE', '2', 'EI003', 'AC0001', 'A1', 'P1', 1),
(7, '2019-11-24 12:05:01', 'CLOSE', '2', 'EI003', 'AC0001', 'A1', 'P1', 1),
(8, '2019-11-24 12:05:16', 'CLOSE', '2', 'EI003', 'AC0001', 'A1', 'P1', 4),
(9, '2019-11-24 12:05:25', 'CLOSE', '2', 'EI003', 'AC0001', 'A1', 'P1', 5),
(10, '2019-11-24 12:05:33', 'CLOSE', '2', 'EI003', 'AC0001', 'A1', 'P1', 3),
(11, '2019-11-24 12:05:39', 'CLOSE', '2', 'EI003', 'AC0001', 'A1', 'P1', 5),
(12, '2019-11-24 14:40:21', 'CLOSE', '3', 'EI003', 'AC0001', 'NJDSVNSKJ', 'DFJKVBADSJK', 5);

-- --------------------------------------------------------

--
-- Table structure for table `service_center`
--

CREATE TABLE `service_center` (
  `SVC_ID` char(5) NOT NULL,
  `AREA_NAME` varchar(30) DEFAULT NULL,
  `PINCODE` int(6) DEFAULT NULL,
  `PHONE_NO` int(10) DEFAULT NULL,
  `MGR_ID` char(5) DEFAULT NULL,
  `C_COUNT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_center`
--

INSERT INTO `service_center` (`SVC_ID`, `AREA_NAME`, `PINCODE`, `PHONE_NO`, `MGR_ID`, `C_COUNT`) VALUES
('SVC01', 'MALLESHWARAM', 560003, 1008876765, 'EI001', 0),
('SVC02', 'SHANTHINAGAR', 560027, 1008876764, 'EI002', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`MODEL_NO`),
  ADD KEY `FK_M` (`P_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`E_ID`,`P_ID`),
  ADD KEY `FK2_RE` (`P_ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`TRACKING_NO`);

--
-- Indexes for table `service_center`
--
ALTER TABLE `service_center`
  ADD PRIMARY KEY (`SVC_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_EMP` FOREIGN KEY (`SVC_ID`) REFERENCES `service_center` (`SVC_ID`) ON DELETE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `FK_M` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`) ON DELETE CASCADE;

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `FK1_RE` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`E_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK2_RE` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
