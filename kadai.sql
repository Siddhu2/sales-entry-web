-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 01:21 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kadai`
--

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE IF NOT EXISTS `itemlist` (
  `ino` int(11) NOT NULL AUTO_INCREMENT,
  `iname` varchar(50) NOT NULL,
  PRIMARY KEY (`ino`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`ino`, `iname`) VALUES
(1, 'box'),
(6, 'Stainless Steel'),
(7, 'aluminium'),
(8, 'eversilver');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `pno` int(20) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  PRIMARY KEY (`pno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`pno`, `pname`) VALUES
(1, 'Siddharth'),
(2, 'murugan');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `pid` int(20) NOT NULL,
  `date` date NOT NULL,
  `ino` int(20) NOT NULL,
  `pno` int(20) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pid`, `date`, `ino`, `pno`, `amount`) VALUES
(170703000, '2017-07-03', 1, 1, 232),
(170703000, '2017-07-03', 6, 2, 44),
(170703000, '2017-07-03', 8, 1, 77777),
(170704001, '2017-07-04', 6, 1, 1222);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `salesnum` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `ino` int(10) NOT NULL,
  `amount` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesnum`, `date`, `ino`, `amount`) VALUES
('170623000', '2017-06-23', 1, 12),
('170623001', '2017-06-23', 0, 9),
('170623002', '2017-06-23', 0, 0),
('170623003', '2017-06-23', 0, 0),
('170623003', '2017-06-23', 0, 0),
('170623003', '2017-06-23', 0, 0),
('170624004', '2017-06-24', 6, 22),
('170624004', '2017-06-24', 7, 221),
('170624005', '2017-06-24', 6, 11),
('170624006', '2017-06-24', 1, 1009),
('170624007', '2017-06-24', 6, 1010),
('170624007', '2017-06-24', 1, 109),
('170624007', '2017-06-24', 7, 1008),
('170624008', '2017-06-24', 0, 0),
('170624009', '2017-06-24', 7, 109),
('170624009', '2017-06-24', 6, 1000),
('170624009', '2017-06-24', 1, 2000),
('170624009', '2017-06-24', 0, 0),
('170624009', '2017-06-24', 0, 0),
('170624009', '2017-06-24', 0, 0),
('170624009', '2017-06-24', 0, 0),
('170624009', '2017-06-24', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
