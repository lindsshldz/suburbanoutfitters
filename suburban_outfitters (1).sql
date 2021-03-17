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
CREATE DATABASE IF NOT EXISTS `suburban outfitters` DEFAULT CHARACTER SET utf8mb4;
USE `suburban outfitters`;

-- --------------------------------------------------------

--
-- Table structure for table `admin account`
--

DROP TABLE IF EXISTS `admin account`;
CREATE TABLE IF NOT EXISTS `admin account` (
  `Admin ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first name` varchar(35) NOT NULL,
  `last name` varchar(50) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `Img Path` varchar(128) NOT NULL,
  PRIMARY KEY (`Admin ID`),
  UNIQUE KEY `Admin ID` (`Admin ID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer account`
--

DROP TABLE IF EXISTS `customer account`;
CREATE TABLE IF NOT EXISTS `customer account` (
  `Customer ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `First Name` varchar(35) NOT NULL,
  `Last Name` varchar(50) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Phone Number` varchar(25) DEFAULT NULL,
  `Img Path` varchar(128) NOT NULL,
  PRIMARY KEY (`Customer ID`),
  UNIQUE KEY `Customer ID` (`Customer ID`),
  UNIQUE KEY `username` (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Inventory ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Product ID` int NOT NULL,
  `Store ID` int NOT NULL,
  `Order Date` date NOT NULL,
  `Quantity` int NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Sell Price` int NOT NULL,
  PRIMARY KEY (`Inventory ID`),
  UNIQUE KEY `Inventory ID` (`Inventory ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderlines`
--

DROP TABLE IF EXISTS `orderlines`;
CREATE TABLE IF NOT EXISTS `orderlines` (
  `Line ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Product ID` int NOT NULL,
  `Order ID` int NOT NULL,
  `Quantity` int NOT NULL,
  `Sell Price` int NOT NULL,
  PRIMARY KEY (`Line ID`),
  UNIQUE KEY `Line ID` (`Line ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Customer ID` int NOT NULL,
  `Store ID` int DEFAULT NULL,
  `Order Date` date NOT NULL,
  `Total Price` int NOT NULL,
  PRIMARY KEY (`Order ID`),
  UNIQUE KEY `Order ID` (`Order ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `Payment ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Customer ID` int NOT NULL,
  `Order ID` int NOT NULL,
  `Address 1` varchar(128) DEFAULT NULL,
  `Address 2`varchar(128) DEFAULT NULL,
  `City`varchar(128) DEFAULT NULL,
  `State`varchar(2) DEFAULT NULL,
  `Zip Code`varchar(25) DEFAULT NULL,
  `Credit Card #` char(16) DEFAULT NULL,
  `CVV` char(4) DEFAULT NULL,
  `Expiration Date` varchar(5) DEFAULT NULL,
  `Payment Date` date NOT NULL,
  `Date` date NOT NULL,
  `Payment Status` varchar(256) NOT NULL,
  PRIMARY KEY (`Payment ID`),
  UNIQUE KEY `Payment ID` (`Payment ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product details`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Product ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Product Name` varchar(65) NOT NULL,
  `Sell Price` int NOT NULL,
  `Product Description` varchar(256) NOT NULL,
  `Product Quantity` int NOT NULL,
  `SKU` int NOT NULL,
  `Product Type` varchar(128) NOT NULL,
  `Tags` varchar(128) NOT NULL,
  `Img Path` varchar(128) NOT NULL,
  PRIMARY KEY (`Product ID`),
  UNIQUE KEY `Product ID` (`Product ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `Shipping ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Payment Date` date NOT NULL,
  `Delivery Date` date NOT NULL,
  `Price` int NOT NULL,
  PRIMARY KEY (`Shipping ID`),
  UNIQUE KEY `Shipping ID` (`Shipping ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `Store ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Store Name` varchar(50) NOT NULL,
  `Store Location` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` char(2) NOT NULL,
  `Zip` varchar(20) NOT NULL,
  PRIMARY KEY (`Store ID`),
  UNIQUE KEY `Store ID` (`Store ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
