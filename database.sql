-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 08:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_stethoscope`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `dname` varchar(100) NOT NULL,
  `dage` date NOT NULL,
  `did` varchar(100) DEFAULT NULL,
  `demail` varchar(100) NOT NULL,
  `dnumber` varchar(50) NOT NULL,
  `dpwd` varchar(100) NOT NULL,
  `dspec` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`dname`, `dage`, `did`, `demail`, `dnumber`, `dpwd`, `dspec`) VALUES
('Ajay', '1996-06-06', 'doc1Aadhaar.png', 'ajay@doctor.com', '1234567891', 'asdf', 'Ortho'),
('Rithvik', '1985-03-01', 'doc2Aadhaar.jpg', 'rithvik@doctor.com', '1234567892', 'asdf', 'Opthal');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pname` varchar(100) NOT NULL,
  `page` date NOT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `pemail` varchar(100) NOT NULL,
  `pnum` varchar(11) NOT NULL,
  `ppassword` varchar(100) NOT NULL,
  `pblood` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pname`, `page`, `pid`, `pemail`, `pnum`, `ppassword`, `pblood`) VALUES
('Naveen ', '2003-06-04', 'pat1Aadhaar.jpg', 'naveen@patient.com', '1234567890', 'asdf', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `p_1234567890`
--

CREATE TABLE `p_1234567890` (
  `date` date DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `dnum` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_1234567890`
--

INSERT INTO `p_1234567890` (`date`, `filename`, `dname`, `dnum`) VALUES
('2022-07-25', 'pres1.png', 'Ajay', '1234567891'),
('2022-07-28', 'pres2.jpg', 'Rithvik', '1234567892');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`dnumber`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
