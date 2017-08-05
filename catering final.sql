-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2017 at 03:00 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `attach_id` int(11) NOT NULL AUTO_INCREMENT,
  `attach` varchar(500) NOT NULL,
  `attach_date` datetime NOT NULL,
  `reserve_id` int(11) NOT NULL,
  PRIMARY KEY (`attach_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`attach_id`, `attach`, `attach_date`, `reserve_id`) VALUES
(1, 't0025667.jpg', '2017-03-26 13:30:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, 'Chicken'),
(7, 'Pasta'),
(9, 'Dessert'),
(10, 'Rice'),
(11, 'Pork'),
(12, 'Beef'),
(13, 'Soup'),
(14, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `cat_id` int(30) NOT NULL,
  `menu_desc` varchar(100) NOT NULL,
  `menu_price` decimal(10,2) NOT NULL,
  `menu_pic` varchar(100) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `cat_id`, `menu_desc`, `menu_price`, `menu_pic`) VALUES
(1, 'Chicken Curry', 6, 'Chicken Curry', 180.00, 'Catering.jpg'),
(2, 'Pork Spareribs', 11, 'Pork Spareribs', 220.00, 'Beef tenderloin with rosemary.jpg'),
(3, 'Coke 500mL', 14, 'Coke 500mL', 20.00, 'cola-cola.jpg'),
(4, 'Mushroom Soup', 13, 'Mushroom Soup', 45.00, 'Butternut Squash soup.jpg'),
(5, 'Carbonara', 7, 'Carbonara', 150.00, 's,lasagna.jpg'),
(6, 'Java Rice', 10, 'Java Rice', 20.00, 'Chicken Macaroni.jpg'),
(7, 'Beef Salpicao', 12, 'Beef Salpicao', 220.00, 'b,Beef Salpicao.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occasion`
--

CREATE TABLE IF NOT EXISTS `occasion` (
  `occasion_id` int(11) NOT NULL AUTO_INCREMENT,
  `occasion` varchar(50) NOT NULL,
  PRIMARY KEY (`occasion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `occasion`
--

INSERT INTO `occasion` (`occasion_id`, `occasion`) VALUES
(1, 'Christening'),
(2, 'Birthday'),
(3, 'Anniversary');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(100) NOT NULL,
  `package_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_price`) VALUES
(1, 'Package 1', 180.00),
(2, 'Package 2', 250.00),
(3, 'Package 3', 220.00);

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE IF NOT EXISTS `package_details` (
  `package_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`package_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`package_details_id`, `package_id`, `group_id`, `cat_id`) VALUES
(1, 1, 1, 12),
(2, 1, 2, 10),
(3, 1, 3, 14),
(4, 2, 1, 12),
(5, 2, 2, 6),
(6, 2, 3, 7),
(7, 2, 4, 9),
(8, 2, 5, 10),
(9, 2, 6, 14),
(10, 3, 1, 6),
(11, 3, 2, 12),
(12, 3, 3, 10),
(13, 3, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `reserve_id`, `payment_date`, `payment_method`) VALUES
(1, 2600, 1, '2017-03-26', 'Walk in Cash');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_date` date NOT NULL,
  `reserve_time` time NOT NULL,
  `reserve_last` varchar(30) NOT NULL,
  `reserve_first` varchar(30) NOT NULL,
  `reserve_contact` varchar(30) NOT NULL,
  `reserve_email` varchar(50) NOT NULL,
  `reserve_address` varchar(100) NOT NULL,
  `reserve_type` varchar(30) NOT NULL,
  `reserve_event` varchar(50) NOT NULL,
  `reserve_motif` varchar(30) NOT NULL,
  `reserve_venue` varchar(100) NOT NULL,
  `payable` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `reserve_status` varchar(10) NOT NULL,
  `date_reserved` date NOT NULL,
  `reserve_code` varchar(10) NOT NULL,
  `pax` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`reserve_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `reserve_date`, `reserve_time`, `reserve_last`, `reserve_first`, `reserve_contact`, `reserve_email`, `reserve_address`, `reserve_type`, `reserve_event`, `reserve_motif`, `reserve_venue`, `payable`, `balance`, `reserve_status`, `date_reserved`, `reserve_code`, `pax`, `package_id`, `price`) VALUES
(1, '2017-03-30', '02:30:00', 'Bantinoy', 'Chat', '639051914070', 'chat@gmail.com', 'Brgy. Mambulac, Silay CIty', 'Buffet', 'Birthday', 'Pink', 'Brgy. Mambulac, Silay CIty', 3600.00, 1000.00, 'Approved', '2017-03-26', 'CB170330', 20, 1, 180.00);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE IF NOT EXISTS `reservation_details` (
  `reserve_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`reserve_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reservation_details`
--

INSERT INTO `reservation_details` (`reserve_details_id`, `reserve_id`, `menu_id`) VALUES
(1, 1, 7),
(2, 1, 6),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `last` varchar(50) NOT NULL,
  `first` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `last`, `first`, `username`, `password`, `status`) VALUES
(1, 'Bantinoy', 'Chat', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
