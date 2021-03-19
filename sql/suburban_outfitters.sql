-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2021 at 10:15 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `suburban_outfitters`
--
CREATE DATABASE IF NOT EXISTS `suburban_outfitters` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `suburban_outfitters`;

-- --------------------------------------------------------

--
-- Table structure for table `cartItem`
--

DROP TABLE IF EXISTS `cartItem`;
CREATE TABLE IF NOT EXISTS `cartItem` (
    `cartItemID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `userID` int(11) NOT NULL,
    `productID` int(11) NOT NULL,
    `cartQty` int(11) NOT NULL,
    PRIMARY KEY (`cartItemID`),
    UNIQUE KEY `cartItemID` (`cartItemID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
    `inventoryID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `productID` int(11) NOT NULL,
    `storeID` int(11) NOT NULL,
    `orderDate` date NOT NULL,
    `quantity` int(11) NOT NULL,
    `size` varchar(50) NOT NULL,
    `sellPrice` int(11) NOT NULL,
    PRIMARY KEY (`inventoryID`),
    UNIQUE KEY `inventoryID` (`inventoryID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderlines`
--

DROP TABLE IF EXISTS `orderlines`;
CREATE TABLE IF NOT EXISTS `orderlines` (
    `lineID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `productID` int(11) NOT NULL,
    `orderID` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `sellPrice` int(11) NOT NULL,
    PRIMARY KEY (`lineID`),
    UNIQUE KEY `lineID` (`lineID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlines`
--

INSERT INTO `orderlines` (`lineID`, `productID`, `orderID`, `quantity`, `sellPrice`) VALUES
(14, 5, 8, 1, 75),
(13, 3, 8, 1, 50),
(12, 2, 7, 2, 25),
(11, 4, 7, 5, 50),
(10, 2, 6, 2, 25),
(9, 4, 6, 5, 50),
(15, 1, 8, 2, 25),
(16, 6, 9, 2, 75),
(17, 2, 9, 5, 25),
(18, 5, 10, 1, 75),
(19, 4, 10, 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
    `orderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `userID` int(11) NOT NULL,
    `storeID` int(11) DEFAULT NULL,
    `orderDate` date NOT NULL,
    `totalPrice` int(11) NOT NULL,
    PRIMARY KEY (`orderID`),
    UNIQUE KEY `orderID` (`orderID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `storeID`, `orderDate`, `totalPrice`) VALUES
(10, 1, 1, '2021-03-19', 183),
(9, 1, 1, '2021-03-19', 288),
(8, 1, 1, '2021-03-19', 183);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
    `paymentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `userID` int(11) NOT NULL,
    `orderID` int(11) NOT NULL,
    `address1` varchar(128) DEFAULT NULL,
    `address2` varchar(128) DEFAULT NULL,
    `city` varchar(128) DEFAULT NULL,
    `state` varchar(2) DEFAULT NULL,
    `zipCode` varchar(25) DEFAULT NULL,
    `creditCard` char(16) DEFAULT NULL,
    `cvv` char(4) DEFAULT NULL,
    `expMonth` char(2) NOT NULL,
    `expYear` char(2) NOT NULL,
    `paymentDate` date NOT NULL,
    `paymentStatus` varchar(256) NOT NULL,
    PRIMARY KEY (`paymentID`),
    UNIQUE KEY `paymentID` (`paymentID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `userID`, `orderID`, `address1`, `address2`, `city`, `state`, `zipCode`, `creditCard`, `cvv`, `expMonth`, `expYear`, `paymentDate`, `paymentStatus`) VALUES
(4, 1, 8, '123 S. Easy Street', '', 'Salt Lake City', 'Ut', '84111', '1234123412341234', '123', '11', '11', '2021-03-19', ''),
(5, 1, 9, '321 S. Tough Street', '', 'Salt Lake City', 'Ut', '84111', '1111222233334444', '444', '11', '33', '2021-03-19', ''),
(6, 1, 10, '555 My Grandmas Street', '', 'Salt Lake City', 'Ut', '84111', '2222333344445555', '333', '12', '21', '2021-03-19', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
    `productID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `productName` varchar(65) NOT NULL,
    `sellPrice` int(11) NOT NULL,
    `productDescription` varchar(256) NOT NULL,
    `sku` int(11) NOT NULL,
    `category` varchar(128) NOT NULL,
    `tags` varchar(128) NOT NULL,
    `imgName` varchar(128) NOT NULL,
    `imgThumbnail` varchar(128) NOT NULL,
    PRIMARY KEY (`productID`),
    UNIQUE KEY `productID` (`productID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `sellPrice`, `productDescription`, `sku`, `category`, `tags`, `imgName`, `imgThumbnail`) VALUES
(1, 'Red Shirt', 25, 'Soft t-shirt in a deep-red made with 100% cotton', 123123, 'Shirts', 'Casual', 'redshirt.png', 'redshirtdetail1.png'),
(2, 'Blue Shirt', 25, 'Soft t-shirt in a deep-blue made with 100% cotton', 234234, 'Shirts', 'Casual', 'blueshirt.png', 'blueshirt.png'),
(3, 'Purple Pants', 50, 'Professional chinos in a vibrant purple', 345345, 'Pants', 'Professional', 'purplepants.png', 'purplepants.png'),
(4, 'Green Pants', 50, 'Professional chinos in a classic green', 456456, 'Pants', 'Professional', 'greenpants.png', 'greenpants.png'),
(5, 'Brown Shoes', 75, 'Comfortable and stylish shoes in brown leather', 567567, 'Shoes', 'Casual', 'brownshoes.png', 'brownshoes.png'),
(6, 'Pink Shoes', 75, 'Comfortable and stylish tennis shoes in soft pink', 678678, 'Shoes', 'Athletic', 'pinkshoes.jpg', 'pinkshoes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
    `shippingID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `paymentID` int(11) NOT NULL,
    `tracking` varchar(75) NOT NULL,
    `deliveryDate` date DEFAULT NULL,
    `status` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`shippingID`),
    UNIQUE KEY `shippingID` (`shippingID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingID`, `paymentID`, `tracking`, `deliveryDate`, `status`) VALUES
(2, 4, 'UPS00000012345', '2021-03-31', 'Shipped'),
(3, 5, 'Pending', NULL, 'Order Pending'),
(4, 6, 'pending', NULL, 'Order Processing');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
    `storeID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `storeName` varchar(50) NOT NULL,
    `storeLocation` varchar(50) NOT NULL,
    `city` varchar(20) NOT NULL,
    `state` char(2) NOT NULL,
    `zip` varchar(20) NOT NULL,
    PRIMARY KEY (`storeID`),
    UNIQUE KEY `storeID` (`storeID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeID`, `storeName`, `storeLocation`, `city`, `state`, `zip`) VALUES
(1, 'Online', 'Online', 'n/a', 'n/', 'n/a'),
(2, 'SLC Downtown', 'City Creek Mall', 'Salt Lake City', 'UT', '84000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
    `userID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `firstName` varchar(35) NOT NULL,
    `lastName` varchar(50) NOT NULL,
    `email` varchar(128) NOT NULL,
    `password` varchar(128) NOT NULL,
    `phoneNumber` varchar(25) DEFAULT NULL,
    `imgPath` varchar(128) NOT NULL,
    `role` varchar(50) DEFAULT NULL,
    `storeID` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`userID`),
    UNIQUE KEY `customerID` (`userID`),
    UNIQUE KEY `email` (`email`)
    ) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `imgPath`, `role`, `storeID`) VALUES
(1, 'Britt', 'Calvimonte', 'bcalvi@xyz.com', 'cust123', '(801)555-4444', '', 'customer', NULL),
(2, 'Jane', 'Doe', 'jane@abc.com', 'cust456', '(435)111-2222', '', 'customer', NULL),
(3, 'Troy', 'Shields', 'tls@email.com', 'cust789', '(858)585-8585', '', 'customer', NULL),
(4, 'Lindsay', 'Shields', 'linds.aln@gmail.com', 'pass123', NULL, '', 'admin', '1'),
(5, 'Cristina', 'Cendejas', 'ccendejas@xyz.com', 'pass456', NULL, '', 'admin', '1');