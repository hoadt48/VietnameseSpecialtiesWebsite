-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 04:49 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dacsanmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` int(16) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `address`, `email`, `phone`, `status`, `level`, `avatar`, `created_at`, `update_at`) VALUES
(1, 'hoa', '1', 'Phú Thọ', 'fdoquyenpt@gmail.com', 964499835, 1, 0, NULL, NULL, '2019-06-02 02:42:24'),
(4, 'Đỗ Thị Hoa', '2a38a4a9316c49e5a833517c45d31070', 'Phú Thọ', 'hoadoquyenpt@gmail.com', 964499835, 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Thái Nguyên', 'thai_nguyen', NULL, NULL, 1, 1, '2019-05-25 09:02:23', '2019-06-14 14:29:20'),
(38, 'Bắc Giang', NULL, NULL, NULL, 1, 1, '2019-06-05 16:52:19', '2019-06-14 14:35:17'),
(39, 'Hà Nội', NULL, NULL, NULL, 1, 1, '2019-06-05 16:52:36', '2019-06-14 14:35:17'),
(40, 'Hưng Hà', 'hung-yen', NULL, NULL, 1, 1, '2019-06-14 12:50:40', '2019-06-14 14:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 50, 1, 85500, '2019-06-13 16:28:03', '2019-06-13 16:28:03'),
(2, 3, 52, 2, 50000, '2019-06-13 16:28:03', '2019-06-13 16:28:03'),
(3, 3, 45, 1, 4, '2019-06-13 16:28:03', '2019-06-13 16:28:03'),
(4, 3, 47, 2, 76000, '2019-06-13 16:28:03', '2019-06-13 16:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `thunbar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `thunbar`, `created_at`, `updated_at`) VALUES
(10, 'Bánh nướng Bắc Giahg', 'hehe', 'banner2.jpg', '2019-06-02 10:11:50', '2019-06-02 10:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` int(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale_price` int(100) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `posts_id` int(11) NOT NULL,
  `content` text,
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `hot` tinyint(4) DEFAULT '0',
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale_price`, `unit`, `quantity`, `status`, `thunbar`, `category_id`, `posts_id`, `content`, `head`, `view`, `hot`, `create_at`, `update_at`) VALUES
(45, 'Cốm', NULL, 5, 20, NULL, 5, 0, 'sach.jpg', 38, 0, 'hi', 0, 0, 0, NULL, '2019-06-08 11:02:27'),
(47, 'Chè búp', NULL, 80000, 5, NULL, 8, 0, 'banner2.jpg', 2, 0, 'fightting\r\n', 0, 0, 0, NULL, '2019-06-07 15:30:40'),
(50, 'chè búp', NULL, 90000, 5, NULL, 9, 0, 'logo.jpg', 2, 0, 'ahihihi', 0, 0, 0, NULL, '2019-06-07 15:28:03'),
(51, 'Cốm làng vòng', NULL, 50000, NULL, NULL, 8, 0, 'banner1.jpg', 39, 0, 'ngon tuyệt', 0, 0, 0, NULL, NULL),
(52, 'bánh tai', NULL, 50000, NULL, NULL, 2, 0, 'sach.jpg', 2, 0, 'ngon', 0, 0, 0, NULL, NULL),
(56, 'Bánh Nướng', NULL, 50000, 10, NULL, 10, 0, 'com.jpg', 38, 0, 'Ngon như nhà làm\r\n', 0, 0, 0, NULL, NULL),
(57, 'bánh giò', NULL, 90000, 5, NULL, 1, 0, 'logo.jpg', 2, 0, 'ngon ngon', 0, 0, 0, NULL, NULL),
(58, 'chè thái', NULL, 800000, 0, NULL, 10, 0, 'banner2.jpg', 2, 0, 'ngon', 11, 11, 11, NULL, NULL),
(59, 'Bánh đa', NULL, 1111, 11, NULL, 1, 0, 'dac-san-23.jpg', 39, 0, 'okie', 0, 0, 0, NULL, '2019-06-14 14:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '0',
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 287654, 10, 0, 'Giao đến KeangNam, đường Phạm Hùng', '2019-06-13 15:56:05', NULL),
(2, 287654, 10, 0, 'Giao đến KeangNam, đường Phạm Hùng', '2019-06-13 15:56:24', NULL),
(3, 371254, 10, 0, '', '2019-06-13 16:28:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(16) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` int(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `update_at`) VALUES
(2, 'Đỗ Thị Hoa', 'hoadoquyenpt@gmail.com', '0964499835', 'Phú Thọ', 'c9f0f895fb98ab9159f51fd0297e236d', NULL, 1, NULL, NULL, NULL),
(5, 'Đỗ Thị Lan Anh', 'lananh@gmail.com', '04945858', 'Hưng Yên', '45c48cce2e2d7fbdea1afc51c7c6ad26', NULL, 1, NULL, NULL, NULL),
(6, 'Trương Thị Hà Trang', 'trang@gmail.com', '09878465543', 'Thanh Hóa', 'c9f0f895fb98ab9159f51fd0297e236d', NULL, 1, NULL, NULL, NULL),
(7, 'Đỗ Thị Thu Lan', 'lan@gmail.com', '09975864667', 'Phú Thọ', '45c48cce2e2d7fbdea1afc51c7c6ad26', NULL, 1, NULL, NULL, NULL),
(8, 'Đỗ Thị Trà My', 'my@gmail.com.vn', '096897574', 'Phú Thọ', '45c48cce2e2d7fbdea1afc51c7c6ad26', NULL, 1, NULL, NULL, NULL),
(9, 'Đỗ Hải Anh', 'haianh@gmail.com.vn', '099854574', 'Phú Thọ', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, NULL, NULL, NULL),
(10, 'Đỗ Thị Lan Anh', 'lananh2@gmail.com', '0958767657', 'Hưng Yên', 'c81e728d9d4c2f636f067f89cc14862c', NULL, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
