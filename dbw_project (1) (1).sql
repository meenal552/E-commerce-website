-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 06:36 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbw_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `cust_id` int(11) DEFAULT NULL,
  `prod_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginpage`
--

CREATE TABLE `loginpage` (
  `cust_id` int(11) NOT NULL COMMENT '100',
  `cust_name` varchar(40) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginpage`
--

INSERT INTO `loginpage` (`cust_id`, `cust_name`, `mobile_no`, `address`, `email`, `password`) VALUES
(105, 'meenal', 9654910068, 'ghaziabad', 'meenal20000@gmail.com', 'dd'),
(107, 'nisha', 1234567890, 'noida', 'nisha1234@gmail.com', 'nisha'),
(108, 'meenal', 9654910068, 'rajnagar', 'meenal1900g@gmail.com', 'meenal'),
(109, 'raj', 9563214875, 'delhi', 'raj11@hjm.com', 'raj'),
(111, 'kk', 8863224875, 'delhi ncr', 'kki11@hjm.com', 'nm'),
(112, 'mudit', 123698547, 'muzzafarnagar', 'mudit@jain.com', 'mudit');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `prod_id` int(5) NOT NULL,
  `prod_name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `count` int(11) DEFAULT NULL,
  `seller_company` varchar(20) NOT NULL,
  `imgsrc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`prod_id`, `prod_name`, `price`, `description`, `count`, `seller_company`, `imgsrc`) VALUES
(181001, 'embroidery lehenga', 10000, 'We provides you Lehenga Choli which is a traditional Indian wear also known as Chaniya Choli or Ghagra Choli for Women. This lehenga bear a sophisticated look and enhance the beauty of the women which can be worn for functions, festivals, parties and even wedding also. You will be a centre of attraction in the event once you ware it. This Lehnga Choli is comes with unstitched material so it can be stitched according to your taste, preference and style also', 10, 'drashti villa', 'Blue-Color-Velvet-Designer-Heavy-Embroidered-Bridal-Lehenga.jpg\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `loginpage`
--
ALTER TABLE `loginpage`
  ADD PRIMARY KEY (`cust_id`,`mobile_no`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`prod_id`,`prod_name`,`seller_company`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginpage`
--
ALTER TABLE `loginpage`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '100', AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181003;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product_details` (`prod_id`),
  ADD CONSTRAINT `customer_orders_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `loginpage` (`cust_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_orders_ibfk_3` FOREIGN KEY (`prod_id`) REFERENCES `product_details` (`prod_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
