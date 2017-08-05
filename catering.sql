-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2017 at 03:57 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `attach_id` int(11) NOT NULL,
  `attach` varchar(500) NOT NULL,
  `attach_date` datetime NOT NULL,
  `reserve_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_last` varchar(30) NOT NULL,
  `cust_first` varchar(30) NOT NULL,
  `cust_contact` varchar(30) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_address1` varchar(100) NOT NULL,
  `cust_address2` varchar(30) NOT NULL,
  `cust_city` varchar(30) NOT NULL,
  `cust_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_last`, `cust_first`, `cust_contact`, `cust_email`, `cust_address1`, `cust_address2`, `cust_city`, `cust_password`) VALUES
(1, 'Magbanua', 'Lee', '09051914070', 'emoblazz@gmail.com', 'Prk Mabi', 'Brgy. Busay', 'Bago CIty', '123');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `cat_id` int(30) NOT NULL,
  `menu_desc` varchar(100) NOT NULL,
  `menu_price` decimal(10,2) NOT NULL,
  `menu_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `cat_id`, `menu_desc`, `menu_price`, `menu_pic`) VALUES
(1, 'Chicken Curry', 6, 'Chicken Curry', '180.00', 'Catering.jpg'),
(2, 'Pork Spareribs', 11, 'Pork Spareribs', '220.00', 'Beef tenderloin with rosemary.jpg'),
(3, 'Coke 500mL', 14, 'Coke 500mL', '20.00', 'cola-cola.jpg'),
(4, 'Mushroom Soup', 13, 'Mushroom Soup', '45.00', 'Butternut Squash soup.jpg'),
(5, 'Carbonara', 7, 'Carbonara', '150.00', 's,lasagna.jpg'),
(6, 'Java Rice', 10, 'Java Rice', '20.00', 'Chicken Macaroni.jpg'),
(7, 'Beef Salpicao', 12, 'Beef Salpicao', '220.00', 'b,Beef Salpicao.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `occasion`
--

CREATE TABLE `occasion` (
  `occasion_id` int(11) NOT NULL,
  `occasion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occasion`
--

INSERT INTO `occasion` (`occasion_id`, `occasion`) VALUES
(1, 'Christening'),
(2, 'Birthday'),
(3, 'Anniversary'),
(4, 'Burial');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `package_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_price`) VALUES
(1, 'Package 1', '180.00'),
(2, 'Package 2', '250.00'),
(3, 'Package 3', '220.00');

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `package_details_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `reserve_id`, `payment_date`, `payment_method`) VALUES
(1, 2600, 1, '2017-03-26', 'Walk in Cash');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `reserve_date` date NOT NULL,
  `reserve_time` time NOT NULL,
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
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `cust_id`, `reserve_date`, `reserve_time`, `reserve_type`, `reserve_event`, `reserve_motif`, `reserve_venue`, `payable`, `balance`, `reserve_status`, `date_reserved`, `reserve_code`, `pax`, `package_id`, `price`) VALUES
(4, 1, '2017-07-31', '16:57:00', 'Plated', 'Birthday', 'White', 'mnm', '5400.00', '5400.00', 'Approved', '2017-07-21', 'LM170722', 30, 1, '180.00');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE `reservation_details` (
  `reserve_details_id` int(11) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_details`
--

INSERT INTO `reservation_details` (`reserve_details_id`, `reserve_id`, `menu_id`) VALUES
(1, 1, 7),
(2, 1, 6),
(3, 1, 3),
(4, 1, 7),
(5, 1, 6),
(6, 1, 3),
(7, 1, 7),
(8, 1, 1),
(9, 1, 5),
(10, 1, 0),
(11, 1, 6),
(12, 1, 3),
(13, 4, 7),
(14, 4, 6),
(15, 4, 3),
(16, 4, 7),
(17, 4, 6),
(18, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `last` varchar(50) NOT NULL,
  `first` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `last`, `first`, `username`, `password`, `status`) VALUES
(1, 'Bantinoy', 'Chat', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'active'),
(2, 'Orense', 'Christian', 'christian', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `occasion`
--
ALTER TABLE `occasion`
  ADD PRIMARY KEY (`occasion_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`package_details_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `reservation_details`
--
ALTER TABLE `reservation_details`
  ADD PRIMARY KEY (`reserve_details_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attach_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `occasion`
--
ALTER TABLE `occasion`
  MODIFY `occasion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `package_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation_details`
--
ALTER TABLE `reservation_details`
  MODIFY `reserve_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
