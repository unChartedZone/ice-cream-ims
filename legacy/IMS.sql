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
-- Database: `IMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `currentstocks`
--

CREATE TABLE `currentstocks` (
  `productcode` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentstocks`
--

INSERT INTO `currentstocks` (`productcode`, `quantity`) VALUES
('p2', 30),
('p1', 1),
('p10', 0),
('prod1', 50),
('prod2', -10);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `customercode` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `customercode`, `fullname`, `location`, `phone`) VALUES
(2, 'cus3', 'ram', 'ktm', '331'),
(5, 'cus4', 'Lynda Koolish', 'SDSU', '7845987658'),
(6, 'cus5', 'Washington', 'SDSU', '7845987658'),
(12, 'cus10', 'Washington adfah', 'SDSU', '1234567890'),
(13, 'cus11', 'Washington adfah50', 'SDSU', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `costprice` double NOT NULL,
  `sellingprice` double NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `productcode`, `productname`, `costprice`, `sellingprice`, `brand`) VALUES
(73, 'prod3', 'qq', 3, 2, '4d'),
(72, 'prod2', 'pen', 20, 30, 'techno'),
(71, 'prod1', 'wai wai', 400, 450, 'cg'),
(74, 'prod4', 'wai wai', 400, 450, 'cg2'),
(78, 'prod5', 'Mobile', 500, 700, 'cg'),
(79, 'prod6', 'ice cream', 20, 30, 'tomanda'),
(619, 'pr0d7', 'chocolate', 20, 40, 'Schwifty');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinfo`
--

CREATE TABLE `purchaseinfo` (
  `purchaseid` int(11) NOT NULL,
  `suppliercode` varchar(200) NOT NULL,
  `productcode` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalcost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseinfo`
--

INSERT INTO `purchaseinfo` (`purchaseid`, `suppliercode`, `productcode`, `date`, `quantity`, `totalcost`) VALUES
(19, 's1', 'p2', 'Wed Jan 14 00:15:19 NPT 2015', 40, 1320),
(20, 's1', 'p1', 'Wed Jan 07 16:42:44 NPT 2015', 4, 80000),
(21, 's6', 'p10', 'Tue Jan 06 16:51:44 NPT 2015', 20, 400000),
(22, 'sup4', 'prod1', 'Thu Jan 15 15:25:45 NPT 2015', 4, 1600),
(23, 'sup5', 'prod1', 'Thu Jan 15 00:00:00 NPT 2015', 6, 2400),
(29, 'sup4', 'prod2', 'Fri Jan 16 23:09:17 NPT 2015', 5, 150),
(30, 'sup5', 'prod1', 'Thu Oct 12 23:10:34 PDT 2017', 5, 2000),
(31, 'sup9', 'prod9', '2017-11-27 22:49:11', 6969, 2.3),
(32, 'sr56', 'vanilla', '2017-11-28 06:22:50', 5, 2.3),
(34, 'sr67', 'chocolate', '2017-11-28 06:23:10', 7, 2.3),
(44, 's344', 'strawberry ', '2017-11-28 23:11:56', 420, 2.3),
(45, 'sr42', 'rocky road', '2017-11-29 03:17:49', 34, 2.3);

-- --------------------------------------------------------

--
-- Table structure for table `salesreport`
--

CREATE TABLE `salesreport` (
  `salesid` int(11) NOT NULL,
  `date` varchar(40) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `customercode` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `revenue` double NOT NULL,
  `soldby` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesreport`
--

INSERT INTO `salesreport` (`salesid`, `date`, `productcode`, `customercode`, `quantity`, `revenue`, `soldby`) VALUES
(1, 'Fri Jan 16 23:12:40 NPT 2015', 'prod2', 'cus3', 4, 120, 'user4'),
(2, 'Thu Jan 08 21:30:51 NPT 2015', 'prod1', 'cus3', 5, 2250, 'sazanrjb'),
(3, 'Thu Jan 15 21:26:47 NPT 2015', 'prod1', 'cus3', 5, 2250, 'sazanrjb'),
(4, 'Sat Jan 17 10:08:20 NPT 2015', 'prod3', 'cus3', 1, 2, 'user4');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sid` int(11) NOT NULL,
  `suppliercode` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sid`, `suppliercode`, `fullname`, `location`, `phone`) VALUES
(69, 'sup5', 'manish', 'ktm', '4123372'),
(68, 'sup4', 'sia', 'US', '11623231'),
(143, 'sup6', 'applie dafad', 'us', '656431351');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `location`, `phone`, `username`, `password`, `category`) VALUES
(58, 'chris', 'asdf', 'asdf', 'chris', '482c811da5d5b4bc6d497ffa98491e38', 'ADMINISTRATOR'),
(59, 'Elliott', 'asdf', 'sadf', 'enwave', '5f4dcc3b5aa765d61d8327deb882cf99', 'ADMINISTRATOR'),
(60, 'Tom Potato', 'san diego', '9849284991', 'tom', '0cc175b9c0f1b6a831c399e269772661', 'ADMINISTRATOR'),
(61, 'alex', 'san diego', '123141', 'alex', '0cc175b9c0f1b6a831c399e269772661', 'ADMINISTRATOR'),
(65, 'ari', '', '', 'ari', '482c811da5d5b4bc6d497ffa98491e38', 'ADMINISTRATOR'),
(66, 'Jay', 'san diego', '123456789', 'jay', '363b122c528f54df4a0446b6bab05515', 'ADMINISTRATOR'),
(80991, 'David Walz', '532 Kraft Lane', '619', 'david', '2b4ae288a819f2bcf8e290332c838148', 'NORMAL USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `salesreport`
--
ALTER TABLE `salesreport`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=620;
--
-- AUTO_INCREMENT for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `salesreport`
--
ALTER TABLE `salesreport`
  MODIFY `salesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90661;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
