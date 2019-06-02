-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 04:12 PM
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
(2, 'Hải Hà', '1', 'Phú Thọ', 'hoadoquyenpt@gmail.com', 980806807, 1, 0, NULL, NULL, '2019-06-01 08:06:27'),
(3, 'Hương', '25d55ad283aa400af464c76d713c07ad', 'Thái Nguyên', 'hoadoquyenpt@gmail.com', 2147483647, 1, 0, NULL, NULL, '2019-06-01 08:25:46');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Thái Nguyên', 'thai_nguyen', NULL, NULL, 0, 1, '2019-05-25 09:02:23', '2019-05-25 09:04:01'),
(34, 'Tuyên Quang', NULL, NULL, NULL, 0, 1, '2019-05-30 16:16:42', '2019-05-30 16:16:42'),
(36, 'Hải Phòng', NULL, NULL, NULL, 0, 1, '2019-05-30 16:24:27', '2019-06-01 08:09:08'),
(37, 'Phú Thọ', NULL, NULL, NULL, 0, 1, '2019-06-01 09:21:17', '2019-06-01 09:21:17');

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
(10, 'Bánh nướng Bắc Giahg', 'hehe', 'banner2.jpg', '2019-06-02 10:11:50', '2019-06-02 10:12:20'),
(11, 'kaka', 'kaka', 'banner2.jpg', '2019-06-02 10:28:09', '2019-06-02 10:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` int(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
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

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `unit`, `quantity`, `status`, `thunbar`, `category_id`, `posts_id`, `content`, `head`, `view`, `hot`, `create_at`, `update_at`) VALUES
(45, 'Hưng Yên', NULL, 5, NULL, 5, 0, 'C360_2017-08-12-18-29-54-057.jpg', 2, 0, 'hi', 0, 0, 0, NULL, NULL),
(47, 'Hà Nội', NULL, 8, NULL, 8, 0, 'hoa.jpg', 36, 0, 'fightting\r\n', 0, 0, 0, NULL, NULL),
(50, 'chè búp', NULL, 999999, NULL, 999, 0, '20170302_141313.jpg', 2, 0, 'ahihihi', 0, 0, 0, NULL, '2019-06-02 09:32:39');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
