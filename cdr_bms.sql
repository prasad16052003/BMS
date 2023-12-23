-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 02:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdr_bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `addedon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `addedon`) VALUES
(1, 'Liquid', '2022-02-26 16:49:02'),
(2, 'Powder', '2022-02-26 16:49:06'),
(3, 'Tablet', '2022-02-26 16:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `odid` int(11) NOT NULL,
  `ohid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `total` decimal(10,0) NOT NULL DEFAULT 0,
  `addedon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`odid`, `ohid`, `pid`, `pname`, `price`, `qty`, `total`, `addedon`) VALUES
(1, 1, 1, 'Methi', '20', 1, '20', '2022-02-26 09:41:47'),
(2, 1, 4, 'Egg', '10', 2, '20', '2022-02-26 09:41:47'),
(3, 2, 0, 'SCALCAN GOLD PLUS 1 LTR', '0', 6, '0', '2022-03-02 17:07:43'),
(4, 2, 7, 'UTRISCAN', '0', 2, '0', '2022-03-02 17:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_header`
--

CREATE TABLE `order_header` (
  `ohid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `amt` decimal(10,0) NOT NULL DEFAULT 0,
  `iostatus` int(2) NOT NULL DEFAULT 0 COMMENT '0=>Pending, 1=>Approved',
  `addedon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_header`
--

INSERT INTO `order_header` (`ohid`, `uid`, `amt`, `iostatus`, `addedon`) VALUES
(1, 2, '0', 0, '2022-02-26 14:11:47'),
(2, 2, '0', 1, '2022-03-02 21:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `pcid` int(11) DEFAULT NULL,
  `pprice` decimal(10,0) NOT NULL DEFAULT 0,
  `addedon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pcid`, `pprice`, `addedon`) VALUES
(1, 'S EROWIN POWDER 1KG', 2, '0', '2022-02-26 16:56:09'),
(2, 'S EROWIN POWDER 10KG', 2, '0', '2022-02-26 16:56:30'),
(3, 'S EROWIN POWDER 25KG', 2, '0', '2022-02-26 16:56:39'),
(4, 'SCALCAN GOLD PLUS 1 LTR', 1, '0', '2022-02-26 16:57:01'),
(5, 'SCALCAN GOLD PLUS 5 LTR', 1, '0', '2022-02-26 16:57:15'),
(6, 'SCALCAN GOLD PLUS 20 LTR', 1, '0', '2022-02-26 16:57:26'),
(7, 'UTRISCAN', 1, '0', '2022-02-26 16:57:42'),
(8, 'JFERT BOLUS', 3, '0', '2022-02-26 16:58:02'),
(9, 'SCANPAN BOLUS', 3, '0', '2022-02-26 16:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `umobile` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `addedon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `umobile`, `address`, `addedon`) VALUES
(1, 'sai bhagwat', '9527335080', 'Shirdi', '2022-01-27 11:15:19'),
(2, 'Ketan Shinde', '9988774455', 'Kopergaon', '2022-01-27 11:15:19'),
(3, 'nikhil bhagwat', '9966554488', 'Shirdi', '2022-02-20 06:21:50');

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
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`odid`);

--
-- Indexes for table `order_header`
--
ALTER TABLE `order_header`
  ADD PRIMARY KEY (`ohid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `odid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_header`
--
ALTER TABLE `order_header`
  MODIFY `ohid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
