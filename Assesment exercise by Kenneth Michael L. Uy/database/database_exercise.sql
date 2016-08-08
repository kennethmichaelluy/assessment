-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2016 at 08:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database_exercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'offline',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `first_name`, `last_name`, `type`, `status`) VALUES
(6, 'ken', '123', 'kenneth', 'michael', 'BillingStaff', 'offline'),
(15, 'User', '123', 'Kenneth', 'Michael', 'Cashier', 'offline'),
(16, 'kenneth', '123', 'kenneth', 'uy', 'Admin', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(45) NOT NULL,
  `owner_name` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'pending',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `owner_name`, `status`, `date`) VALUES
(1, 'Encode', 'Admin', 'pending', '2016-08-03 17:23:04'),
(2, 'Design', 'BillingStaff', 'pending', '2016-08-03 17:23:04'),
(3, 'Count stocks', 'Cashier', 'pending', '2016-08-08 17:26:20'),
(4, 'Count Money', 'Cashier', 'pending', '2016-08-03 17:26:20'),
(5, 'get the bill', 'BillingStaff', 'pending', '2016-08-08 17:28:12'),
(6, 'Monitor stuffs', 'Admin', 'pending', '2016-08-08 17:28:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
