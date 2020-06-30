-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2018 at 06:20 AM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.24-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `currentstocks`
--

CREATE TABLE `currentstocks` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentstocks`
--

INSERT INTO `currentstocks` (`product_id`, `quantity`) VALUES
(1, 514),
(2, 307),
(3, 52),
(4, 420),
(8, 500),
(10, 500);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customercode` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customercode`, `fullname`, `location`, `phone`) VALUES
(1, '34ff67', 'David Drake', 'Oceanside', '7602654435'),
(2, '0f231e', 'Bob Loblaw', 'San Diego', '9093456787'),
(7, 'a44ef0', 'Bob Ross', 'Riverside', '9518675309'),
(9, '31b88f', 'Charlie Chaplin', '532 Kraft Lane', '8675309');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `costprice` double NOT NULL,
  `sellingprice` double NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `productcode`, `productname`, `costprice`, `sellingprice`, `brand`) VALUES
(1, 'af674c', 'Cookies N Cream', 38, 56, 'Thrifty'),
(2, 'fc3409', 'Chocolate', 34, 56, 'Baskin Robbins'),
(3, 'aa345b', 'Rainbow Sherbert', 34, 56, 'Thrifty'),
(4, '40aee4', 'Vanilla', 40, 50, 'Thrifty'),
(5, '66bd2f', 'Strawberry ', 12, 20, 'Baskin Robbins'),
(8, '3569e3', 'Rocky Road', 12, 13, 'Ben and Jerry'),
(9, '45effe', 'Mint Chip', 34, 234, 'Brayers'),
(10, '2656d7', 'Chocolate Chip Cookie Dough', 34, 56, 'Generic');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinfo`
--

CREATE TABLE `purchaseinfo` (
  `purchase_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalcost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseinfo`
--

INSERT INTO `purchaseinfo` (`purchase_id`, `supplier_id`, `product_id`, `date`, `quantity`, `totalcost`) VALUES
(1, 1, 1, 'Wed Jan 14 00:15:19 NPT 2015', 40, 1320),
(2, 1, 2, 'Wed Jan 07 16:42:44 NPT 2015', 4, 80000),
(3, 1, 3, 'Wed Jan 07 16:42:44 NPT 2015', 50, 200),
(4, 1, 3, 'Wed Jan 07 16:42:44 NPT 2015', 40, 120),
(5, 1, 2, '12/03/2017 06:28:02 pm', 5, 120),
(6, 1, 4, '12/04/2017 10:41:30 am', 23, 45),
(7, 1, 5, '12/04/2017 10:42:07 am', 45, 70);

-- --------------------------------------------------------

--
-- Table structure for table `salesreport`
--

CREATE TABLE `salesreport` (
  `sales_id` int(11) NOT NULL,
  `date` varchar(40) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `revenue` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesreport`
--

INSERT INTO `salesreport` (`sales_id`, `date`, `product_id`, `customer_id`, `quantity`, `revenue`, `user_id`) VALUES
(9, 'Fri Jan 16 23:12:40 NPT 2015', 1, 1, 4, 120, 1),
(10, 'Thu Jan 08 21:30:51 NPT 2015', 1, 1, 5, 2250, 1),
(11, 'Thu Jan 15 21:26:47 NPT 2015', 3, 1, 5, 2250, 1),
(12, 'Sat Jan 17 10:08:20 NPT 2015', 2, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `suppliercode` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `suppliercode`, `fullname`, `location`, `phone`) VALUES
(1, 'sup5', 'manish', 'ktm', '4123372');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `location`, `phone`, `username`, `password`, `category`) VALUES
(1, 'Elliott Watson', 'san diego', '1234567890', 'enwave', '5f4dcc3b5aa765d61d8327deb882cf99', 'ADMINISTRATOR'),
(2, 'Christian Valdez', 'San Diego', '619', 'chris', '482c811da5d5b4bc6d497ffa98491e38', 'ADMINISTRATOR'),
(2660, 'Butters', 'South Park', '619', 'Butters', 'c3b5a8e886d47e471bc202594bcce6b0', 'NORMAL USER'),
(15390, 'Alex', 'San Diego', '619', 'alex', '0cc175b9c0f1b6a831c399e269772661', 'ADMINISTRATOR'),
(40677, 'Ari Cruz', 'San Diego', '619', 'ari', '482c811da5d5b4bc6d497ffa98491e38', 'ADMINISTRATOR'),
(55229, 'David Walz', '1234 Dairy Queen Rd', '619', 'david', '482c811da5d5b4bc6d497ffa98491e38', 'NORMAL USER'),
(73989, 'Jay ', 'San Diego', '619', 'jay', '363b122c528f54df4a0446b6bab05515', 'ADMINISTRATOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currentstocks`
--
ALTER TABLE `currentstocks`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `suppliers_supplier_id_fk` (`supplier_id`),
  ADD KEY `products_product_id_fk_pinfo` (`product_id`);

--
-- Indexes for table `salesreport`
--
ALTER TABLE `salesreport`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `customers_customer_id_fk_srep` (`customer_id`),
  ADD KEY `products_product_id_fk_srep` (`product_id`),
  ADD KEY `users_user_id_fk_srep` (`user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `salesreport`
--
ALTER TABLE `salesreport`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73990;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `currentstocks`
--
ALTER TABLE `currentstocks`
  ADD CONSTRAINT `products_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  ADD CONSTRAINT `products_product_id_fk_pinfo` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `suppliers_supplier_id_fk` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);

--
-- Constraints for table `salesreport`
--
ALTER TABLE `salesreport`
  ADD CONSTRAINT `customers_customer_id_fk_srep` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `products_product_id_fk_srep` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `users_user_id_fk_srep` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
