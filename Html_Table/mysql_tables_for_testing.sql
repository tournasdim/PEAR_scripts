-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2012 at 05:57 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee_members`
--

CREATE TABLE IF NOT EXISTS `committee_members` (
  `PLAYERNO` int(11) NOT NULL,
  `BEGIN_DATE` date NOT NULL,
  `END_DATE` date DEFAULT NULL,
  `POSITION` char(20) DEFAULT NULL,
  PRIMARY KEY (`PLAYERNO`,`BEGIN_DATE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee_members`
--

INSERT INTO `committee_members` (`PLAYERNO`, `BEGIN_DATE`, `END_DATE`, `POSITION`) VALUES
(2, '1990-01-01', '1992-12-31', 'Chairman'),
(2, '1994-01-01', NULL, 'Member'),
(6, '1990-01-01', '1990-12-31', 'Secretary'),
(6, '1991-01-01', '1992-12-31', 'Member'),
(6, '1992-01-01', '1993-12-31', 'Treasurer'),
(6, '1993-01-01', NULL, 'Chairman'),
(8, '1990-01-01', '1990-12-31', 'Treasurer'),
(8, '1991-01-01', '1991-12-31', 'Secretary'),
(8, '1993-01-01', '1993-12-31', 'Member'),
(8, '1994-01-01', NULL, 'Member'),
(27, '1990-01-01', '1990-12-31', 'Member'),
(27, '1991-01-01', '1991-12-31', 'Treasurer'),
(27, '1993-01-01', '1993-12-31', 'Treasurer'),
(57, '1992-01-01', '1992-12-31', 'Secretary'),
(95, '1994-01-01', NULL, 'Treasurer'),
(112, '1992-01-01', '1992-12-31', 'Member'),
(112, '1994-01-01', NULL, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `cust_id` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `st_address` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cust_id`),
  KEY `last_name` (`last_name`),
  KEY `country` (`country`),
  KEY `city` (`city`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `first_name`, `last_name`, `st_address`, `city`, `country`) VALUES
(1, 'Joe', 'Smith', '345 12th St.', 'Dallas', 'US'),
(2, 'Masao', 'Yasunori', '253 ichi-cho', 'Tokyo', 'Japan'),
(3, 'Hans', 'Schwartz', '947 3 St.', 'Hannover', 'Germany'),
(4, 'Alex', 'Smith', '53 Main Rd.', 'London', 'England'),
(5, 'Tom', 'Greenfield', '23 Wall St.', 'New York', 'US'),
(6, 'Jane', 'Addington', '5 Cross Rd.', 'Essex', 'England'),
(7, 'Alex', 'Jones', '634 Granville St.', 'Vancouver', 'Canada');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
