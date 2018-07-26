-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 08:00 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ehisfleet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `staff_id`, `username`, `password`, `access`, `status`) VALUES
(5, '1', 'admin', 'admin', 'manager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `address`, `phone`, `type`) VALUES
(10, 'Unilever Nigeria Plc', 'Lagos', '070', 'Client'),
(11, 'Emeka Mech', 'Lagos', '080', 'Contractor');

-- --------------------------------------------------------

--
-- Table structure for table `fhistory`
--

CREATE TABLE IF NOT EXISTS `fhistory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `regNo` varchar(15) NOT NULL,
  `rate` double NOT NULL,
  `vat` double NOT NULL,
  `date` varchar(20) NOT NULL,
  `info` text NOT NULL,
  `trips` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=505 ;

--
-- Dumping data for table `fhistory`
--

INSERT INTO `fhistory` (`id`, `regNo`, `rate`, `vat`, `date`, `info`, `trips`) VALUES
(502, 'AQ 478 GBA', 50000, 10, '25, 07, 2018', 'NA', '10'),
(503, '', 50000, 10, '25, 07, 2018', 'NA', '10'),
(504, '', 50000, 10, '25, 07, 2018', 'NA', '10');

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

CREATE TABLE IF NOT EXISTS `fleet` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `make` varchar(50) NOT NULL,
  `identity` varchar(30) NOT NULL,
  `regno` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fleet`
--

INSERT INTO `fleet` (`id`, `make`, `identity`, `regno`, `type`, `driver`, `location`) VALUES
(9, 'Toyota', '00001', 'XW221NNW', 'Car', 'Tosin Tobi', ''),
(10, 'Mitsibushi', '0002', 'AQ 478 GBA', 'Truk', 'Shola Taiwo', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nots` int(4) NOT NULL,
  `trips` int(4) NOT NULL,
  `rate` double NOT NULL,
  `info` text NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `client` varchar(100) NOT NULL,
  `tax` double NOT NULL,
  `amount` double NOT NULL,
  `dates` varchar(50) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `pby` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `nots`, `trips`, `rate`, `info`, `cargo`, `client`, `tax`, `amount`, `dates`, `ref`, `pby`) VALUES
(21, 1, 10, 50000, 'NA', 'Sugar', '10', 50000, 550000, '25, 07, 2018', '00021', '5');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `pv` varchar(50) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `ref` varchar(60) NOT NULL,
  `accountcode` varchar(5) NOT NULL,
  `pby` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `vendor`, `pv`, `dates`, `remarks`, `ref`, `accountcode`, `pby`) VALUES
(4, 10000, 'Emeka Mech', '', '24, 07, 2018', 'maintenance for honda ', 'XW221NNW', '200', '5');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `rn` varchar(100) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `pby` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `amount`, `client_id`, `rn`, `dates`, `remarks`, `pby`) VALUES
(103, 500000, '10', '00103', '25, 07, 2018', 'Haulage payments', '5');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `coy_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `logo` blob NOT NULL,
  `exxt` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `coy_name`, `phone`, `address`, `logo`, `exxt`) VALUES
(2, 'Ehils Transports', '08077068954', 'Enugu', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) NOT NULL,
  `oname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(33) NOT NULL,
  `image` longblob NOT NULL,
  `designation` varchar(100) NOT NULL,
  `sex` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `surname`, `oname`, `address`, `phone`, `image`, `designation`, `sex`) VALUES
(15, 'Ali', 'Ehis', 'Enugu Sport Club', '080', '', 'Manager', 'Female'),
(16, 'Ali', 'JOhn', 'Enugu', '080', 0x6e6f6e65, 'Accountant', 'male'),
(17, 'Tosin', 'Tobi', 'ENugu', '080', 0x6e6f6e65, 'Driver', 'male'),
(18, 'Shola', 'Taiwo', 'Lagos', '070', 0x6e6f6e65, 'Driver', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE IF NOT EXISTS `transact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `debit` double NOT NULL DEFAULT '0',
  `credit` double NOT NULL DEFAULT '0',
  `dates` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `client_id` int(5) NOT NULL,
  `acountcode` varchar(255) NOT NULL,
  `pv` varchar(100) NOT NULL,
  `pby` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`id`, `debit`, `credit`, `dates`, `remarks`, `client_id`, `acountcode`, `pv`, `pby`) VALUES
(115, 0, 500000, '25, 07, 2018', 'Payments for haulage to awka factory from benin', 10, '400', '', '5'),
(116, 0, 500000, '25, 07, 2018', 'Haulage payments', 10, '400', '', '00103');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
