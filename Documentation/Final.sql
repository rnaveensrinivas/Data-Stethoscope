-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2021 at 06:22 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
('naveen', '2021-05-12', 'Pract1.png', 'naveen@gmail.com', '9876543210', 'asdfg', 'pedia');

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
('pavan', '2021-05-20', 'Pract1.png', 'pavan@hgk.vvom', '1234567890', 'asdfg', 'A+');

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
