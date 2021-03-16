-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 16, 2021 at 02:25 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suburban outfitters`
--
CREATE DATABASE IF NOT EXISTS `suburban outfitters` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `suburban outfitters`;

-- --------------------------------------------------------

--
-- Table structure for table `admin account`
--

DROP TABLE IF EXISTS `admin account`;
CREATE TABLE IF NOT EXISTS `admin account` (
  `first name` varchar(35) NOT NULL,
  `last name` varchar(50) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `first name` varchar(35) NOT NULL,
  `last name` varchar(50) NOT NULL,
  `Email Address` varchar(256) NOT NULL,
  `Phone Number` varchar(128) NOT NULL,
  `Shipping Address Line 1` varchar(128) NOT NULL,
  `Shipping Address Line 2` varchar(128) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` char(20) NOT NULL,
  `Zip Code` int NOT NULL,
  `Credit Card Number` char(16) DEFAULT NULL,
  `Expiration` int NOT NULL,
  `CVV` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer account`
--

DROP TABLE IF EXISTS `customer account`;
CREATE TABLE IF NOT EXISTS `customer account` (
  `First Name` varchar(35) NOT NULL,
  `Last Name` varchar(50) NOT NULL,
  `Username` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer order details`
--

DROP TABLE IF EXISTS `customer order details`;
CREATE TABLE IF NOT EXISTS `customer order details` (
  `Name` varchar(128) NOT NULL,
  `Address` varchar(128) NOT NULL,
  `Status` varchar(128) NOT NULL,
  `Tracking Number` varchar(128) NOT NULL,
  PRIMARY KEY (`Tracking Number`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer order details`
--

INSERT INTO `customer order details` (`Name`, `Address`, `Status`, `Tracking Number`) VALUES
('Jane Doe', '123 S. Easy Street, Salt Lake City, UT 84111', 'Order Received', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer order lists`
--

DROP TABLE IF EXISTS `customer order lists`;
CREATE TABLE IF NOT EXISTS `customer order lists` (
  `Order Number` int NOT NULL AUTO_INCREMENT,
  `Status` varchar(128) NOT NULL,
  `Details` varchar(128) NOT NULL,
  PRIMARY KEY (`Order Number`)
) ENGINE=InnoDB AUTO_INCREMENT=12345679 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer order lists`
--

INSERT INTO `customer order lists` (`Order Number`, `Status`, `Details`) VALUES
(12345678, 'Pending', 'Details');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Quantity` int NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Price` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product details`
--

DROP TABLE IF EXISTS `product details`;
CREATE TABLE IF NOT EXISTS `product details` (
  `Product` varchar(128) NOT NULL,
  `Sell Price` int NOT NULL,
  `Description` varchar(256) NOT NULL,
  `Quantity` int NOT NULL,
  `SKU` int NOT NULL,
  `Category` varchar(128) NOT NULL,
  `Tags` varchar(128) NOT NULL,
  KEY `Product` (`Product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product details`
--

INSERT INTO `product details` (`Product`, `Sell Price`, `Description`, `Quantity`, `SKU`, `Category`, `Tags`) VALUES
('Red T-Shirt', 25, '', 1, 1234, 'Shirts', 'Casual'),
('Blue T-Shirt', 25, '', 1, 1462, 'Shirts', 'Casual'),
('Purple Pants', 50, '', 1, 8263, 'Pants', 'Casual'),
('Green Pants', 50, '', 1, 8102, 'Pants', 'Casual'),
('Brown Shoes', 75, '', 1, 6921, 'Shoes', 'Casual'),
('Pink Shoes', 75, '', 1, 1375, 'Shoes', 'Casual');

-- --------------------------------------------------------

--
-- Table structure for table `shopping cart`
--

DROP TABLE IF EXISTS `shopping cart`;
CREATE TABLE IF NOT EXISTS `shopping cart` (
  `Product` varchar(128) NOT NULL,
  `Price` int NOT NULL,
  `Quantity` int NOT NULL,
  `Total` int NOT NULL,
  KEY `Product` (`Product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shopping cart`
--

INSERT INTO `shopping cart` (`Product`, `Price`, `Quantity`, `Total`) VALUES
('Red T-Shirt', 25, 1, 25),
('Purple Pants', 50, 1, 25);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
