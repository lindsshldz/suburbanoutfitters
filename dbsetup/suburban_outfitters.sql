-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2021 at 10:37 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `suburban_outfitters`
--

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
