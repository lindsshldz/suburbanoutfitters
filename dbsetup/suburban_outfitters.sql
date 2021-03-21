-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 21, 2021 at 08:28 AM
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
    ) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
    `inventoryID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `productID` int(11) NOT NULL,
    `storeID` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `invSize` varchar(50) NOT NULL,
    `cost` int(11) NOT NULL,
    PRIMARY KEY (`inventoryID`),
    UNIQUE KEY `inventoryID` (`inventoryID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryID`, `productID`, `storeID`, `quantity`, `invSize`, `cost`) VALUES
(1, 1, 1, 1000, 'Small', 8),
(2, 1, 1, 1000, 'Large', 12),
(3, 3, 1, 1000, 'One Size', 15),
(4, 4, 1, 1000, 'One Size', 15),
(5, 5, 1, 1000, 'One Size', 15),
(6, 2, 1, 1000, 'One Size', 20),
(9, 8, 1, 99, 'Small', 1000),
(10, 7, 2, 5, 'One Size', 5),
(11, 9, 2, 7, 'One Size', 100),
(12, 10, 1, 8, 'Small', 10),
(13, 11, 1, 6, 'asdf', 1);

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
    ) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

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
(19, 4, 10, 2, 50),
(20, 1, 11, 3, 25),
(21, 6, 12, 2, 75),
(22, 1, 12, 3, 25),
(23, 3, 13, 1, 50),
(24, 5, 13, 1, 75),
(25, 2, 13, 1, 25),
(26, 4, 14, 5, 50),
(27, 1, 15, 2, 25),
(28, 2, 16, 2, 25),
(29, 1, 17, 2, 25),
(30, 3, 18, 1, 50),
(31, 5, 19, 1, 75),
(32, 7, 20, 3, 55),
(33, 4, 21, 2, 50),
(34, 8, 22, 1, 100),
(35, 3, 23, 1, 50),
(36, 8, 24, 2, 100),
(37, 1, 24, 3, 25);

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
    `totalPrice` float NOT NULL,
    `promoID` int(11) NOT NULL,
    `admin_userID` int(11) NOT NULL,
    PRIMARY KEY (`orderID`),
    UNIQUE KEY `orderID` (`orderID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `storeID`, `orderDate`, `totalPrice`, `promoID`, `admin_userID`) VALUES
(19, 15, 2, '2021-01-20', 62.82, 0, 15),
(18, 15, 2, '2021-01-20', 41.88, 1, 15),
(17, 15, 1, '2021-02-20', 41.88, 1, 16),
(16, 14, 1, '2021-02-19', 52.35, 0, 15),
(20, 12, 1, '2021-02-20', 155.47, 0, 16),
(21, 13, 1, '2021-03-02', 104.7, 0, 0),
(22, 15, 1, '2021-03-12', 52.35, 0, 15),
(23, 15, 1, '2021-03-20', 26.18, 3, 0),
(24, 12, 2, '2021-03-20', 259.14, 2, 0);

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
    PRIMARY KEY (`paymentID`),
    UNIQUE KEY `paymentID` (`paymentID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `userID`, `orderID`, `address1`, `address2`, `city`, `state`, `zipCode`, `creditCard`, `cvv`, `expMonth`, `expYear`, `paymentDate`) VALUES
(15, 15, 19, '123 S. Easy Street', '', 'Salt Lake City', 'Ut', '84111', '1111222233334444', '345', '12', '21', '2021-03-20'),
(14, 15, 18, '321 S. Tough Street', '', 'Salt Lake City', 'Ut', '84111', '1111111111111111', '234', '12', '21', '2021-03-20'),
(13, 15, 17, '123 S. Easy Street', '', 'Salt Lake City', 'Ut', '84111', '0000999988887777', '567', '09', '23', '2021-03-20'),
(12, 14, 16, '555 My Grandmas Street', '', 'Salt Lake City', 'Ut', '84111', '1111222233334444', '123', '12', '21', '2021-03-19'),
(16, 12, 20, '321 S. Tough Street', '123', 'Salt Lake City', 'Ut', '84111', '4444555566667777', '345', '12', '21', '2021-03-20'),
(17, 13, 21, '5000 Test Lane', '', 'Salt Lake City', 'Ut', '84111', '4444333355558888', '123', '12', '21', '2021-03-20'),
(18, 15, 22, '123 S. Easy Street', '', 'Salt Lake City', 'Ut', '84111', '1111222244447777', '456', '12', '21', '2021-03-20'),
(19, 15, 23, '123 S. Easy Street', '', 'Salt Lake City', 'Ut', '84111', '1111222233334444', '123', '12', '21', '2021-03-21'),
(20, 12, 24, '123 S. Easy Street', '', 'Salt Lake City', 'Ut', '84111', '5555111122223333', '234', '12', '21', '2021-03-21');

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
    ) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `sellPrice`, `productDescription`, `sku`, `category`, `tags`, `imgName`, `imgThumbnail`) VALUES
(1, 'Red Shirt', 25, 'VERY COOL RED SHIRT I LOVE IT BUY IT NOW', 123000, 'Shirts', 'Casual', 'redshirt.png', 'redshirtdetail1.png'),
(2, 'Blue Shirt', 25, 'Soft t-shirt in a deep-blue made with 100% cotton', 234234, 'Shirts', 'Casual', 'blueshirt.png', 'blueshirt.png'),
(3, 'Purple Pants', 50, 'Professional chinos in a vibrant purple', 345345, 'Pants', 'Professional', 'purplepants.png', 'purplepants.png'),
(4, 'Green Pants', 50, 'Professional chinos in a classic green', 456456, 'Pants', 'Professional', 'greenpants.png', 'greenpants.png'),
(5, 'Brown Shoes', 75, 'Comfortable and stylish shoes in brown leather', 567567, 'Shoes', 'Casual', 'brownshoes.png', 'brownshoes.png'),
(6, 'Pink Shoes', 75, 'Comfortable and stylish tennis shoes in soft pink', 678678, 'Shoes', 'Athletic', 'pinkshoes.jpg', 'pinkshoes.jpg'),
(7, 'NEW Shirt', 55, 'Very cool new shirt! ', 2384987, 'Shirt', 'Just in', 'SUlogo.png', 'SUlogo.png'),
(8, 'NEW ITEM', 100, 'Very exclusive new item. purchase to find out what it is ;).', 2147483647, '', 'Just in', 'SUlogo.png', 'SUlogo.png'),
(9, 'NEW COOL THING', 100000, 'who cares', 0, 'shirts', 'Just in', 'SUlogo.png', 'SUlogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

DROP TABLE IF EXISTS `promos`;
CREATE TABLE IF NOT EXISTS `promos` (
    `promoID` bigint(20) NOT NULL AUTO_INCREMENT,
    `storeID` int(20) NOT NULL,
    `promoCode` varchar(50) NOT NULL,
    `discount` float NOT NULL,
    PRIMARY KEY (`promoID`),
    UNIQUE KEY `promoID` (`promoID`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`promoID`, `storeID`, `promoCode`, `discount`) VALUES
(1, 1, 'winter20', 0.2),
(2, 1, 'friend10', 0.1),
(3, 1, 'employee50', 0.5),
(4, 2, 'newcustomer15', 0.15),
(5, 2, 'onsite25', 0.25);

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
    ) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingID`, `paymentID`, `tracking`, `deliveryDate`, `status`) VALUES
(3, 14, 'UPS03948720', NULL, 'Shipped'),
(2, 13, 'Pending', NULL, 'Order Processing'),
(1, 12, 'UPS00000123', '2021-03-27', 'Shipped'),
(4, 15, 'Pending', NULL, 'Order Processing'),
(5, 16, 'Pending', NULL, 'Order Processing'),
(6, 17, 'New Order', NULL, 'New Order'),
(7, 18, 'Pending', NULL, 'Order Processing'),
(8, 19, 'New Order', NULL, 'New Order'),
(9, 20, 'New Order', NULL, 'New Order');

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
    ) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `imgPath`, `role`, `storeID`) VALUES
(17, 'Smith', 'Mainoo', 'smith@test.com', '$2y$10$lmAJ8yZmCQfLVA7kE5vH.ewhFYuRlWjyjOEpfnBAEuqok2Pgn/3T2', '', '', 'admin', '2'),
(15, 'Lindsay', 'Shields', 'linds.aln@gmail.com', '$2y$10$36f6N8DxtnsczYdGgS1Meeju6t/gHZj9SrU3EHWOhkQg8JOMtm76.', '', '', 'admin', '1'),
(16, 'Cristina', 'Cendejas', 'cristina@test.com', '$2y$10$yrNf3jRaE/b85em0FNaVaOPue45atM2LLz8YMEN5mAZ9aVQwlQFlW', '', '', 'admin', '1'),
(14, 'Troy', 'Shields', 'tls@email.com', '$2y$10$ILQEKxWESzFevSC2sbTEB.Cb54ZsbiyK2/Zmst8rvfnauFZSh3XWG', '(858)585-8585', '', 'customer', ''),
(13, 'Jane', 'Doe', 'jane@abc.com', '$2y$10$orGS1U3uDV8JO1h8qcMH..zH20MAAqCnrqlO2Fv3NHJOmTpfGy40e', '(435)111-2222', '', 'customer', ''),
(12, 'Britt', 'Calvimonte', 'bcalvi@xyz.com', '$2y$10$pHKyz.35g5fb/Zt6OEXUb.uBkXcVTGHMq4Ru2ZI.X0/HQB64tLWx6', '(801)555-4444', '', 'customer', ''),
(18, 'New', 'User', 'test@test.com', '$2y$10$rsOmRqvoDQSHhP.oChfaIOPvzmGWF4dzkIHn/MTw0wv8GbEn/oXpy', '(435)512-1111', '', 'customer', NULL),
(19, 'Buddy', 'Elf', 'buddy@xmas.com', '$2y$10$qOzft8eXnXfJZdqD8wNKm.rNCh1qtueGPP4d8Ix3Lu3Up9k7VNmq.', '012-252-2525', '', 'customer', NULL);
