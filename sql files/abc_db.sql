-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 03:39 PM
-- Server version: 5.1.36-community
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Electronics'),
(2, 'Home and Garden'),
(3, 'Clothing and Fashion'),
(4, 'Beauty and Personal Care'),
(5, 'Sports and Outdoors'),
(6, 'Automotive'),
(7, 'Toys and Games'),
(8, 'Books and Media'),
(9, 'Health and Wellness'),
(10, 'Jewelry and Accessories'),
(11, 'Pet Supplies'),
(12, 'Home Appliances'),
(13, 'Food and Grocery'),
(14, 'Furniture and Decor'),
(15, 'Office Supplies'),
(16, 'Fitness and Exercise'),
(17, 'Baby and Kids'),
(18, 'Travel and Luggage'),
(19, 'Art and Craft Supplies'),
(20, 'Computers and Software');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `pcat` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `pcat`, `quantity`, `price`) VALUES
(1, 'Smartphone', 'Electronics', 100, 599.99),
(2, 'LED TV', 'Electronics', 50, 799.99),
(3, 'Laptop', 'Electronics', 30, 999.99),
(4, 'Garden Tools Set', 'Home and Garden', 75, 49.99),
(5, 'Outdoor Furniture', 'Home and Garden', 45, 199.99),
(6, 'Sundress', 'Clothing and Fashion', 200, 29.99),
(7, 'Running Shoes', 'Clothing and Fashion', 150, 79.99),
(8, 'Shampoo', 'Beauty and Personal Care', 300, 14.99),
(9, 'Sunscreen', 'Beauty and Personal Care', 250, 9.99),
(10, 'Tennis Racket', 'Sports and Outdoors', 40, 39.99),
(11, 'Basketball', 'Sports and Outdoors', 60, 19.99),
(12, 'Car Battery', 'Automotive', 20, 79.99),
(13, 'Toy Train Set', 'Toys and Games', 90, 59.99),
(14, 'Adventure Novel', 'Books and Media', 70, 12.99),
(15, 'Health Supplements', 'Health and Wellness', 120, 24.99),
(16, 'Silver Necklace', 'Jewelry and Accessories', 50, 99.99),
(17, 'Dog Food', 'Pet Supplies', 150, 29.99),
(18, 'Refrigerator', 'Home Appliances', 25, 799.99),
(19, 'Canned Soup', 'Food and Grocery', 400, 1.99),
(20, 'Sofa', 'Furniture and Decor', 10, 399.99),
(21, 'Printer Paper', 'Office Supplies', 200, 5.99),
(22, 'Treadmill', 'Fitness and Exercise', 15, 499.99),
(23, 'Baby Stroller', 'Baby and Kids', 70, 69.99),
(24, 'Luggage Set', 'Travel and Luggage', 35, 149.99),
(25, 'Oil Paint Set', 'Art and Craft Supplies', 80, 19.99),
(26, 'Antivirus Software', 'Computers and Software', 100, 49.99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(1, 'user', '$2a$08$Z3A0VnN1OGNqYlBFRHhleOH60w9gwVOZCbU1jWy9yAZU5bgYP.abG', 'My name');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
