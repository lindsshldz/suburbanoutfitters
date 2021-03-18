-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 16, 2021 at 11:52 PM
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
CREATE DATABASE IF NOT EXISTS `suburban_outfitters` DEFAULT CHARACTER SET utf8mb4;
USE `suburban_outfitters`;

-- --------------------------------------------------------

--
-- Table structure for table `admin account`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `adminID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `storeID` int NOT NULL,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `imgPath` varchar(128) NOT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `adminID` (`adminID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer account`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customerID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phoneNumber` varchar(25) DEFAULT NULL,
  `imgPath` varchar(128) NOT NULL,
  PRIMARY KEY (`customerID`),
  UNIQUE KEY `customerID` (`customerID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `inventoryID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `productID` int NOT NULL,
  `storeID` int NOT NULL,
  `orderDate` date NOT NULL,
  `quantity` int NOT NULL,
  `size` varchar(50) NOT NULL,
  `sellPrice` int NOT NULL,
  PRIMARY KEY (`inventoryID`),
  UNIQUE KEY `inventoryID` (`inventoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderlines`
--

DROP TABLE IF EXISTS `orderlines`;
CREATE TABLE IF NOT EXISTS `orderlines` (
  `lineID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `productID` int NOT NULL,
  `orderID` int NOT NULL,
  `quantity` int NOT NULL,
  `sellPrice` int NOT NULL,
  PRIMARY KEY (`lineID`),
  UNIQUE KEY `lineID` (`lineID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customerID` int NOT NULL,
  `storeID` int DEFAULT NULL,
  `orderDate` date NOT NULL,
  `totalPrice` int NOT NULL,
  PRIMARY KEY (`orderID`),
  UNIQUE KEY `orderID` (`orderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customerID` int NOT NULL,
  `orderID` int NOT NULL,
  `address1` varchar(128) DEFAULT NULL,
  `address2`varchar(128) DEFAULT NULL,
  `city`varchar(128) DEFAULT NULL,
  `state`varchar(2) DEFAULT NULL,
  `zipCode`varchar(25) DEFAULT NULL,
  `creditCard#` char(16) DEFAULT NULL,
  `cvv` char(4) DEFAULT NULL,
  `expirationDate` varchar(5) DEFAULT NULL,
  `paymentDate` date NOT NULL,
  `date` date NOT NULL,
  `paymentStatus` varchar(256) NOT NULL,
  PRIMARY KEY (`paymentID`),
  UNIQUE KEY `paymentID` (`paymentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product details`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `productName` varchar(65) NOT NULL,
  `sellPrice` int NOT NULL,
  `productDescription` varchar(256) NOT NULL,
  `sku` int NOT NULL,
  `category` varchar(128) NOT NULL,
  `tags` varchar(128) NOT NULL,
  `imgPath` varchar(128) NOT NULL,
  PRIMARY KEY (`productID`),
  UNIQUE KEY `productID` (`productID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `shippingID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `paymentID` int NOT NULL,
  `paymentDate` date NOT NULL,
  `deliveryDate` date NOT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`shippingID`),
  UNIQUE KEY `shippingID` (`shippingID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `storeID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `storeName` varchar(50) NOT NULL,
  `storeLocation` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` char(2) NOT NULL,
  `zip` varchar(20) NOT NULL,
  PRIMARY KEY (`storeID`),
  UNIQUE KEY `storeID` (`storeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
