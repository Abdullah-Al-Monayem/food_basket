-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 08:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_basket`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `users` (
  `user_id` int(15) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `donate`
--
CREATE TABLE `donate` (
  `donate_id` int(15) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'freash vegetables'),
(2, 'freash fruits'),
(3, 'dairy '),
(4, 'freash meat'),
(5, 'Malaysia'),
(6, 'Saudi Arabia');


CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_image`) VALUES
(1, 1, 'fresh tomato', 200, 'tomato.png'),
(2, 1, 'fresh onion', 42, 'product-2.png'),
(3, 1, 'fresh Cauliflower', 720, 'fulkopi.png'),
(4, 1, 'fresh cabbage', 50, 'product-4.png'),
(5, 1, 'fresh potato', 35, 'product-5.png'),
(6, 1, 'fresh brinjal', 30, 'brinjal-png.png'),
(7, 1, 'fresh carrot', 85, 'product-7.png'),
(8, 1, 'green lemon', 20, 'product-8.png'),
(9, 2, 'fresh apple', 200, 'apple.png'),
(10, 2, 'fresh Lychee', 45, 'Lychee.png'),
(11, 2, 'fresh grapes', 720, 'grapes.png'),
(12, 2, 'fresh mango', 50, 'mango.png'),
(13, 3, 'milk', 35, 'milk.png'),
(14, 3, 'butter', 30, 'butter.png'),
(15, 3, 'cake', 85, 'cake.png'),
(16, 3, 'gulab jamun', 20, 'gulab.png'),
(17, 4, 'chicken', 220, 'chicken.png'),
(18, 4, 'beef', 440, 'png.png'),
(19, 4, 'fish', 85, 'fish.png'),
(20, 4, 'mutton', 620, 'meat.png'),
(21, 5, 'Rambutan', 220, 'Rambutan.png'),
(22, 5, 'Mangosteen', 230, 'Mangosteen.png'),
(23, 5, 'Durian', 75, 'Durian.png'),
(24, 6, 'Mabroom Dates', 220, 'Mabroom Dates.png'),
(25, 6, 'Ajwa Dates', 300, 'Ajwa Date.png'),
(26, 6, 'Fresh Fig', 500, 'Fresh Fig.png');


-- --------------------------------------------------------


--
-- Table structure for table `product`
--
CREATE TABLE `product` (
  `product_id` int(15) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `productname` varchar(150) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `donate`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);
 
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`); 
 
 ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);
  
  ALTER TABLE `donate`
  ADD PRIMARY KEY (`donate_id`);
  ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);
  --
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);
  
 ALTER TABLE `cart`
 MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  
  
  ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
  
  
  ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
  
  ALTER TABLE `users`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
 ALTER TABLE `donate`
  MODIFY `donate_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  ALTER TABLE `product`
  MODIFY `product_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
