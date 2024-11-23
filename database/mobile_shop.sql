-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 06:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '88888888');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(277, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(3, 'Xiaomi', 'Xiaomi 14T', 25990000.00, './assets/products/xiaomi_14t.png', '2024-11-09 00:00:00'),
(14, 'Xiaomi', 'Xiaomi 14 Ultra', 26999000.00, './assets/products/xiaomi-14-ultra.png', '2024-11-10 00:00:00'),
(16, 'Benco', 'Benco V91 Plus 6GB 128GB', 2990000.00, './assets/products/benco_v91_plus_xam_3_8241448b3c.jpg', '2024-11-23 00:00:00'),
(23, 'Iphone', 'Iphone 16 Pro Max 256GB', 34590000.00, './assets/products/iphone_16_pro_max_desert_titan.png', '2024-11-12 00:00:00'),
(24, 'Samsung', 'Samsung Galaxy S24 FE 5G 128GB', 16990000.00, './assets/products/samssung_galaxy_s24_fe_xanh.png', '2024-11-12 00:00:00'),
(25, 'OPPO', 'OPPO A3 6GB 128GB', 4990000.00, './assets/products/oppo_a3_den.jpg', '2024-11-12 00:00:00'),
(26, 'Samsung', 'Samsung Galaxy Z Fold6 5G 256GB', 41990000.00, './assets/products/samsung_galaxy_z_fold6_gray.png', '2024-11-12 00:00:00'),
(27, 'OPPO', 'OPPO Reno8 T 4G 8GB-256GB', 5490000.00, './assets/products/oppo-reno8-t-4g-cam-5.jpg', '2024-11-23 00:00:00'),
(28, 'Benco', 'Benco V91c 4GB 128GB', 2490000.00, './assets/products/benco_v91c_xam_1_3bdf228d6e.jpg', '2024-11-23 00:00:00'),
(29, 'Iphone', 'iPhone 15 Pro Max 256GB', 29590000.00, './assets/products/iphone-15-promax-xanh-1.jpg', '2024-11-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(6, 'Hữu Lộc', 'loc@gmail.com', '8ddcff3a80f4189ca1c9d4d902c3c909'),
(7, 'Thanh Tiền', 'thanhtien@gmail.com', '8ddcff3a80f4189ca1c9d4d902c3c909'),
(9, 'Thanh Thảo', 'thanhthao1@gmail.com', '8ddcff3a80f4189ca1c9d4d902c3c909'),
(14, 'admi', 'a@gmail.com', '8ddcff3a80f4189ca1c9d4d902c3c909'),
(15, 'đa', 'da@gmail.com', '8ddcff3a80f4189ca1c9d4d902c3c909');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`cart_id`, `user_id`, `item_id`) VALUES
(278, 1, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
