-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 08:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashback`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(250) NOT NULL,
  `brand_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_image`) VALUES
(1, 'Amazon', 'OIP.jpg'),
(2, 'Flipkart', 'flipkart.jpg'),
(3, 'Myntra', 'myntra.jpg'),
(4, 'Meesho', 'th.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `brand_id` int(50) NOT NULL,
  `category_title` varchar(250) NOT NULL,
  `category_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `brand_id`, `category_title`, `category_image`) VALUES
(1, 1, 'Amazon cat', 'OIP.jpg'),
(2, 2, 'flipkart cat', 'flipkart.jpg'),
(3, 3, 'myntra cat', 'myntra.jpg'),
(4, 1, 'Amazoncat2', 'OIP.jpg'),
(5, 2, 'BOOKS', 'myntra.jpg'),
(6, 2, 'games', 'jewelry.svg'),
(7, 4, 'Cloths', 'perfume.svg'),
(8, 2, 'Electronics', 'procat2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `click_banners`
--

CREATE TABLE `click_banners` (
  `click_banner_is` int(11) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `banner_id` int(100) NOT NULL,
  `bate_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `click_banners`
--

INSERT INTO `click_banners` (`click_banner_is`, `user_ip`, `banner_id`, `bate_time`) VALUES
(1, '::1', 3, '2024-02-11 06:53:56'),
(2, '::1', 3, '2024-02-11 07:05:54'),
(3, '::1', 4, '2024-02-11 07:08:03'),
(4, '::1', 4, '2024-02-20 14:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `click_products`
--

CREATE TABLE `click_products` (
  `chick_item_id` int(11) NOT NULL,
  `user_ip` varchar(200) NOT NULL,
  `product_id` int(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `click_products`
--

INSERT INTO `click_products` (`chick_item_id`, `user_ip`, `product_id`, `date_time`) VALUES
(1, '::1', 9, '2024-02-11 06:51:55'),
(2, '::1', 6, '2024-02-11 06:52:53'),
(3, '::1', 7, '2024-02-11 07:08:32'),
(4, '::1', 10, '2024-02-14 08:56:11'),
(5, '::1', 10, '2024-02-14 08:57:32'),
(6, '::1', 5, '2024-12-03 15:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `main_banner`
--

CREATE TABLE `main_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(200) NOT NULL,
  `banner_sub_title` varchar(200) NOT NULL,
  `affilate_link` varchar(250) NOT NULL,
  `banner_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_banner`
--

INSERT INTO `main_banner` (`banner_id`, `banner_title`, `banner_sub_title`, `affilate_link`, `banner_image`) VALUES
(2, 'LETEST DRESS', 'WOMENS SHIRT AND PANTS AND OTHER', '', 'blog-2.jpg'),
(3, 'BOSS SHIRT', 'BOY TOY BOYS BAOOK', 'http://amazon.com', 'blog-4.jpg'),
(4, 'HELLO BUDDY', 'IM PAVAN CEO OF CASHBACK.COM', 'http://amazon.com', 'banner-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `sub_cat_id` int(100) NOT NULL,
  `product_title` varchar(250) NOT NULL,
  `product_desription` varchar(250) NOT NULL,
  `product_keywords` varchar(250) NOT NULL,
  `product_discount` varchar(50) NOT NULL,
  `product_image1` varchar(250) NOT NULL,
  `product_image2` varchar(250) NOT NULL,
  `affilate` varchar(100) NOT NULL,
  `display_category` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `brand_id`, `category_id`, `sub_cat_id`, `product_title`, `product_desription`, `product_keywords`, `product_discount`, `product_image1`, `product_image2`, `affilate`, `display_category`, `date_time`) VALUES
(1, 1, 1, 1, 'jhgufhka', 'ggrggththgdsdeeeeeeeeeee', 'dg', '4334', '1.jpg', 'sports-6.jpg', '', 1, '2024-01-31 17:34:11'),
(3, 1, 1, 1, 'Vice city', 'vhgjhbkjhjjhhhv', 'dg', '25rs', 'clothes-3.jpg', 'clothes-4.jpg', '', 1, '2024-01-31 17:34:22'),
(4, 1, 1, 1, 'gh khj', 'jkllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkknj', 'j', '77', 'shirt-1.jpg', 'shirt-2.jpg', '', 2, '2024-01-31 18:58:37'),
(5, 1, 1, 0, 'ear buds', 'ghdjgdetjhegdetdgbxhndghe', 'vice city, rope hero', '457', 'jewellery-1.jpg', 'jewellery-3.jpg', '', 2, '2024-01-31 18:58:42'),
(6, 1, 4, 5, 'ear buds', 'ggrggththgdsdeeeeeeeeeee', ' hhvhjghjhjliio', '50rs doio', 'watch-3.jpg', 'watch-4.jpg', '', 3, '2024-01-31 19:01:00'),
(7, 1, 4, 5, 'hi guru', 'ggrggththgdsdeeeeeeeeeee', ' hhvhjghjhjliio', 'ggdfegduefdy', '2.jpg', '3.jpg', '', 0, '2024-01-17 08:02:25'),
(8, 1, 4, 5, 'laptop', 'vhgjhbkjhjjhhhv', 'phone', '4334', 'clothes-4.jpg', 'clothes-4.jpg', 'hii', 0, '2024-01-17 08:38:11'),
(9, 1, 1, 0, 'phoneh', 'phone is good product', 'hgxsgiyxuggggggggggggggggggg', 'amaxonhi', 'clothes-3.jpg', 'clothes-4.jpg', 'amaxonhi', 0, '2024-01-17 08:46:15'),
(10, 2, 5, 9, 'ghh', 'hhuu', 'hghuu', '25rs', '4.jpg', 'belt.jpg', '25rs', 0, '2024-01-17 09:03:20'),
(11, 2, 5, 9, 'Vice city', 'ghdjgdetjhegdetdgbxhndghe', 'phone', '4334', 'belt.jpg', '4.jpg', 'link', 0, '2024-01-17 15:37:38'),
(12, 2, 5, 9, 'ear buds', 'ghdjgdetjhegdetdgbxhndghehgsh', 'dg', '50rs doio', 'shorts-2.jpg', 'shorts-1.jpg', 'amazon.in', 0, '2024-01-17 17:08:00'),
(13, 4, 7, 14, 'laptop', 'vice city is good game', 'vice city, rope hero', '25rs', 'jewellery-2.jpg', 'clothes-3.jpg', 'http://amazon.in', 0, '2024-01-17 18:04:21'),
(14, 2, 6, 13, 'Vice city', 'vice city is good game', 'phone', 'get 25rs', 'watch-1.jpg', 'watch-2.jpg', 'http://amazon.in', 4, '2024-01-20 03:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CodeV` varchar(255) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `wallet` tinyint(4) NOT NULL,
  `verification` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `Username`, `email`, `Password`, `CodeV`, `user_ip`, `wallet`, `verification`) VALUES
(1, 'pavan', 'mrpavankumar484@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '7b85380544704fe244f9604adf10d6f7', '', 0, 0),
(3, 'kl', 'dcdf@rrxt', '202cb962ac59075b964b07152d234b70', 'a778070ac0c4d86506f400b924bc6c19', '::1', 0, 0),
(4, 'pavan kumar g s', 'gspavankumar0@gmail.com', '202cb962ac59075b964b07152d234b70', 'f32278ad7ec79f62708ae65b0a69ab26', '::1', 45, 0),
(5, 'kishan', 'ganeshpavan2004@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '8e0102e8c5db574d3f56e011f0564516', '::1', 0, 0),
(6, 'Hemanth', 'palegar9902@gmail.com', '202cb962ac59075b964b07152d234b70', '79424b1ba9340772019fc7bd7766206b', '::1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `brand_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `sub_cat_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `brand_id`, `category_id`, `sub_cat_title`) VALUES
(1, 1, 1, 'amazonSubCat'),
(2, 2, 2, 'flipkartSubCat'),
(3, 3, 3, 'mynthraSunCat'),
(4, 1, 4, 'amazonSubCat2'),
(5, 1, 4, 'amazonSubCat2a3'),
(6, 3, 3, 'myntra 2'),
(7, 3, 3, '  myntra3'),
(8, 2, 2, 'flipkartSubCat2'),
(9, 2, 5, 'note book'),
(10, 2, 5, 'long book'),
(11, 2, 6, 'free fire'),
(12, 2, 6, 'pubg'),
(13, 2, 6, '3d game'),
(14, 4, 7, 'Mens'),
(15, 2, 5, 'King size book'),
(16, 2, 8, 'Hear buds'),
(17, 2, 8, 'mobiles'),
(18, 2, 8, 'Laptop'),
(19, 4, 7, 'womean');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `click_banners`
--
ALTER TABLE `click_banners`
  ADD PRIMARY KEY (`click_banner_is`);

--
-- Indexes for table `click_products`
--
ALTER TABLE `click_products`
  ADD PRIMARY KEY (`chick_item_id`);

--
-- Indexes for table `main_banner`
--
ALTER TABLE `main_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `click_banners`
--
ALTER TABLE `click_banners`
  MODIFY `click_banner_is` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `click_products`
--
ALTER TABLE `click_products`
  MODIFY `chick_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `main_banner`
--
ALTER TABLE `main_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
