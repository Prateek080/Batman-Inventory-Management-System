-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2015 at 05:45 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `batman`
--

-- --------------------------------------------------------

--
-- Table structure for table `gadg3t_material`
--

CREATE TABLE IF NOT EXISTS `gadg3t_material` (
  `gadget_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gadgets`
--

CREATE TABLE IF NOT EXISTS `gadgets` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(5000) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gadget_material`
--

CREATE TABLE IF NOT EXISTS `gadget_material` (
  `gadget_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE IF NOT EXISTS `idea` (
  `id` int(11) NOT NULL,
  `idea` int(11) NOT NULL,
  `detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inventory_id` varchar(26) NOT NULL,
  `name` varchar(56) DEFAULT NULL,
  `category` varchar(56) DEFAULT NULL,
  `threshold` varchar(56) DEFAULT NULL,
  `cost` int(12) DEFAULT NULL,
  `count` varchar(12) DEFAULT NULL,
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_id` (`inventory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `name`, `category`, `threshold`, `cost`, `count`, `description`, `id`) VALUES
('0', 'safaf', 'null', '10', 20, '20', 'null', 1),
('null', 'sadad', 'null', '25', 20, '20', 'null', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventry`
--

CREATE TABLE IF NOT EXISTS `inventry` (
  `id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `gadget_id` int(11) NOT NULL,
  `condition` int(11) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) NOT NULL,
  `lowest_cost` int(11) NOT NULL,
  `lowest_cost_quality` int(11) NOT NULL,
  `max_cost` int(11) NOT NULL,
  `max_cost_quality` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `detail` varchar(3000) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `detail` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(56) NOT NULL,
  `name` varchar(56) NOT NULL,
  `cost` varchar(56) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `name`, `cost`, `description`) VALUES
(1, 'null', 'sadf', '2', 'fadafdsgag');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE IF NOT EXISTS `product_inventory` (
  `product_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`product_id`, `inventory_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `safety`
--

CREATE TABLE IF NOT EXISTS `safety` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `detail` int(11) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
