-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 02:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct275_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_day` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `added_day`, `updated_day`) VALUES
(36, 14, '2022-11-13 07:21:44', '2022-11-13 07:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(18, 'Adidas'),
(19, 'New Balance'),
(20, 'Converse');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `sdt`, `email`, `description`) VALUES
(1, 'Huỳnh Văn Định', '0375751606', 'dinhb1910364@student.ctu.edu.vn', 'Tôi cần hỗ trợ từ Shop'),
(2, 'Nguyễn Văn A', '0375751606', 'a@gmail.com', 'Tôi không thể đăng nhập được vào tài khoản');

-- --------------------------------------------------------

--
-- Table structure for table `detail_cart`
--

CREATE TABLE `detail_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_cart`
--

INSERT INTO `detail_cart` (`cart_id`, `product_id`, `quantity`) VALUES
(36, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `total_price` int(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_day` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `cart_id`, `total_price`, `status`, `created_day`) VALUES
(8, 14, 28, 73500000, 1, '2022-11-10 01:17:46'),
(9, 13, 30, 15500000, 1, '2022-11-10 06:02:39'),
(10, 14, 29, 15500000, 1, '2022-11-10 13:52:20'),
(11, 14, 31, 13500000, 1, '2022-11-10 16:27:19'),
(12, 14, 33, 15950000, 2, '2022-11-11 06:44:29'),
(13, 14, 34, 13500000, 1, '2022-11-12 06:13:01'),
(14, 14, 34, 450000, 0, '2022-11-12 06:25:56'),
(15, 15, 32, 7450000, 2, '2022-11-12 06:26:53'),
(16, 14, 35, 450000, 0, '2022-11-12 09:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_day` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `category_id`, `image`, `created_day`, `updated_day`) VALUES
(43, 'Giày Adidas Yeezy Boost 350 V2 ‘Bred’ CP9652', 15500000, 'Giày Adidas Yeezy Boost 350 V2 ‘Bred’ là một sản phẩm được ra mắt vào năm 2020. Sản phẩm này được các bạn trẻ vô cùng yêu thích với chất lượng cao cấp, thiết kế riêng biệt, dễ nhận diện', 18, 'Array', '2022-11-10 03:33:35', '2022-11-10 03:33:35'),
(45, 'Giày New Balance 550 ‘Sea Salt Yellow’ BB550SSC', 3500000, 'Mua Giày New Balance 550 ‘Sea Salt Yellow’ BB550SSC chính hãng 100% tại Censor.vn. Trả góp 0%. Bảo hành 3 tháng, đổi trả 15 ngày. Freeship', 19, 'Array', '2022-11-10 16:13:24', '2022-11-10 16:13:24'),
(46, 'Giày Converse Comme des Garçons x Chuck 70 Ox ‘Play’ 150207C', 450000, 'Giày Converse Comme des Garçons x Chuck 70 Ox ‘Play’ là một đôi giày thể thao độc đáo phá cách của thương hiệu giày thể thao nổi tiếng của Mỹ.', 20, 'Array', '2022-11-10 16:21:13', '2022-11-10 16:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `admin` int(1) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_day` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `admin`, `fullname`, `username`, `password`, `address`, `created_day`, `updated_day`) VALUES
(3, 0, 'Tran Van B', 'B1910146', '12345678', '', '2022-10-26 00:17:47', '2022-10-26 00:17:47'),
(13, 1, 'Huỳnh Văn Định', 'Dinh', '12345', 'Cần Thơ', '2022-11-09 09:43:42', '2022-11-09 09:43:42'),
(14, 0, 'Huỳnh Văn Định', 'UserDinh', '12345678', 'Cần Thơ', '2022-11-09 09:51:21', '2022-11-09 09:51:21'),
(15, 0, 'Nguyễn Văn A', 'UserA', '12345678', 'Hậu Giang', '2022-11-11 03:18:23', '2022-11-11 03:18:23'),
(16, 2, 'Nguyễn Văn An', 'AnShipper', '12345678', 'Tiền Giang', '2022-11-11 16:06:41', '2022-11-11 16:06:41'),
(17, 0, 'Nguyễn Văn Tèo Em', 'TeoEm', '11111111', 'Cần thơ', '2022-11-12 05:49:45', '2022-11-12 05:49:45'),
(18, 0, 'Nguyễn Đăng', 'Đăng', '12345678', 'Cần thơ', '2022-11-12 05:53:01', '2022-11-12 05:53:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD PRIMARY KEY (`cart_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD CONSTRAINT `detail_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `detail_cart_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
