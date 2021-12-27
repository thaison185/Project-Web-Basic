-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2021 at 07:24 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_web_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `DOB` date DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `name`, `email`, `phone`, `DOB`, `address`, `hashed_password`, `gender`, `avatar`) VALUES
(0, 'noneaccountcustomer', 'None Account Customer', 'noneAccountCustomer@meaning.less', '0000000000000', '2021-12-08', 'noneAccountCustomer', '$2y$10$XsahU21WJc3qwOrtbiUAneDSUQM6iySiEQqjD/R3tYadyTDzehVRG', 0, NULL),
(1, 'customer1', 'Customer One', 'cus1@example.com', '+84123456789', '1997-12-01', '1/2/3 A street, B city', '750cca026a238a93007f65ad97b70f9a', 0, NULL),
(2, 'customer2', 'Customer Two', 'cus2@example.com', '+84123456788', '1998-12-02', '1/2/3 Z street, A city', '393b598879aa996c58e45abfca625048', 0, NULL),
(3, 'chanvuuu', 'Chan Vu', 'chanvu@gg.oo', '099999999999', '2021-12-07', '123 agloo street', '6f8da60e35d7077999f2dbd4c26ec203', 0, NULL),
(4, 'chanvuuudeptrai', 'Chan Vu Dep Trai', 'chanvudt@gg.oo', '0999999999999', '2021-12-06', '124 agloo street', '6f8da60e35d7077999f2dbd4c26ec203', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `s_price` float DEFAULT NULL,
  `m_price` float DEFAULT NULL,
  `l_price` float DEFAULT NULL,
  `description` text NOT NULL,
  `ice` tinyint(1) NOT NULL,
  `sugar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `s_price`, `m_price`, `l_price`, `description`, `ice`, `sugar`) VALUES
(1, 'Capuchino', '	\r\n./assests/img/items/capuchino.png', 6, 8, 10, '', 0, 0),
(2, 'Cold brew', '	\n./assests/img/items/cold-brew.png', 0, 9, 0, '', 1, 0),
(3, 'Milk shake', './assests/img/items/milk-shake.png', 3, 5, 7, '', 0, 1),
(4, 'White chocolate mocha', './assests/img/items/white-chocolate-mocha.png', 7, 9, 10, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  `price` float NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `date`, `description`, `price`, `status`) VALUES
(24, 0, '2021-12-26 10:36:06', '', 10, 'Pending'),
(25, 0, '2021-12-26 10:36:19', '', 14, 'Pending'),
(26, 0, '2021-12-26 10:36:45', '', 10, 'Pending'),
(27, 4, '2021-12-26 10:37:16', '', 8, 'Pending'),
(28, 4, '2021-12-26 10:37:31', '', 21, 'Pending'),
(29, 4, '2021-12-26 10:37:48', '', 70, 'Pending'),
(30, 4, '2021-12-26 10:39:43', '', 8, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `options` varchar(20) NOT NULL,
  `size` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `item_id`, `quantity`, `price`, `options`, `size`) VALUES
(25, 2, 1, 5, '100% ice', 'm'),
(25, 3, 1, 5, '100% sugar', 'm'),
(26, 4, 1, 10, '100% ice, 100% sugar', 'l'),
(27, 1, 1, 8, '', 'm'),
(28, 2, 1, 9, '100% ice', 'm'),
(28, 3, 1, 9, '100% sugar', 'm'),
(28, 4, 1, 7, 'hot, 0% sugar', 's'),
(29, 3, 10, 70, '100% sugar', 'l'),
(30, 1, 1, 8, '', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `name`, `email`, `hashed_password`, `phone`, `gender`, `role`, `avatar`) VALUES
(1, 'BigBoss', 'NguyenTS', 'assmin@qcoffee.com', '$2y$10$IRyk1M3Z2JtREnLbKCYRAu6wacWYjRlR3YIWoz0RKDcAAbosYXzEi', '+79627824127', 0, 1, './data/1/avatar.jpg'),
(2, 'Slave_1', 'Staff no.1', 'staff1@qcoffee.com', '$2y$10$guZwF2v8ALBAqJj3fnuJSutdPCEwyqBuXjBSTE3Gh/30XFaNL.CeG', '+84987654321', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`username`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`item_id`,`options`,`size`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
