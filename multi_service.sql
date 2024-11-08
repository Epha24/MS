-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 11:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `pid` int(11) NOT NULL,
  `tno` int(20) NOT NULL,
  `model` varchar(100) NOT NULL,
  `tsno` int(11) NOT NULL,
  `from_s` varchar(300) NOT NULL,
  `to_s` varchar(300) NOT NULL,
  `fdate` varchar(100) NOT NULL,
  `ftime` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`pid`, `tno`, `model`, `tsno`, `from_s`, `to_s`, `fdate`, `ftime`, `price`, `sid`) VALUES
(1, 120545, 'Level I', 150, 'Adis Ababa', 'Arba Minch', '2024-06-29', '07:35', '2000', 7);

-- --------------------------------------------------------

--
-- Table structure for table `car_res`
--

CREATE TABLE `car_res` (
  `resid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_res`
--

INSERT INTO `car_res` (`resid`, `cid`, `sno`, `username`, `status`) VALUES
(2, 1, 13, 'epha', 'Pending'),
(3, 1, 1, 'qwe', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `cid` int(11) NOT NULL,
  `mtitle` varchar(300) NOT NULL,
  `wdate` varchar(200) NOT NULL,
  `wtime` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`cid`, `mtitle`, `wdate`, `wtime`, `price`, `sid`) VALUES
(5, 'Kungufu Panda 4', '2024-06-29', '15:07', '400 ETB', 6),
(6, 'dune2', '2024-06-27', '12:54', '300', 11);

-- --------------------------------------------------------

--
-- Table structure for table `cinema_res`
--

CREATE TABLE `cinema_res` (
  `resid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema_res`
--

INSERT INTO `cinema_res` (`resid`, `cid`, `sno`, `username`, `status`) VALUES
(4, 6, 0, 'qwe', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fname`, `lname`, `email`, `phone`, `message`) VALUES
(1, 'Ephrem', 'Ayde', 'ephremamanuel355@gmail.com', '0964074945', 'Nice dude');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`, `status`) VALUES
(2, 'Hotel', 'Active'),
(3, 'Transport', 'Active'),
(4, 'Cinema ', 'Active'),
(5, 'Tour', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `fprice` varchar(100) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `fname`, `fprice`, `sid`) VALUES
(3, 'Kitfo', '500', 5);

-- --------------------------------------------------------

--
-- Table structure for table `food_res`
--

CREATE TABLE `food_res` (
  `resid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_res`
--

INSERT INTO `food_res` (`resid`, `fid`, `username`, `status`) VALUES
(5, 3, 'epha', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `pid` int(11) NOT NULL,
  `tno` int(20) NOT NULL,
  `model` varchar(100) NOT NULL,
  `tsno` int(11) NOT NULL,
  `from_s` varchar(300) NOT NULL,
  `to_s` varchar(300) NOT NULL,
  `fdate` varchar(100) NOT NULL,
  `ftime` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`pid`, `tno`, `model`, `tsno`, `from_s`, `to_s`, `fdate`, `ftime`, `price`, `sid`) VALUES
(3, 6965, 'Boeing 737 MAX 10', 150, 'Adis Ababa', 'Arba Minch', '2024-06-29', '04:32', '4000 ETB', 7);

-- --------------------------------------------------------

--
-- Table structure for table `plane_res`
--

CREATE TABLE `plane_res` (
  `resid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `rid` int(11) NOT NULL,
  `rno` int(15) NOT NULL,
  `rtype` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `rno`, `rtype`, `price`, `sid`) VALUES
(3, 1, 'Single Room', '1200', 5),
(4, 2, 'Double Room', '3500', 5),
(5, 3, 'Twin Room', '5000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `room_res`
--

CREATE TABLE `room_res` (
  `resid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_res`
--

INSERT INTO `room_res` (`resid`, `rid`, `username`, `status`) VALUES
(4, 3, 'epha', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `sid` int(11) NOT NULL,
  `oname` varchar(200) NOT NULL,
  `scategory` int(11) NOT NULL,
  `stitle` varchar(200) NOT NULL,
  `location` varchar(150) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`sid`, `oname`, `scategory`, `stitle`, `location`, `description`, `status`, `username`) VALUES
(5, 'Gureza & Family', 2, 'Hotel and Spa', 'Bole, Adis Ababa', 'We are family ...', 'Approved', 'nahom2'),
(6, 'Sharuk Cinema', 4, 'Cinema', 'Ethiopia, Adis Ababa', 'xcyv', 'Approved', 'nahom2'),
(7, 'Yene Guzo', 3, 'Transportation', 'Ethiopia, Adis Ababa', 'xsfsgdf', 'Approved', 'nahom2'),
(10, 'AshamTech PLC', 5, 'Tour', 'Ethiopia, Adis Ababa', 'trtfiyvjhvjh', 'Approved', 'abushu'),
(11, 'gast', 4, 'Cinema', 'aa', 'sdvv', 'Approved', 'wer');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tid` int(11) NOT NULL,
  `sdate` varchar(250) NOT NULL,
  `edate` varchar(250) NOT NULL,
  `location` varchar(200) NOT NULL,
  `tguide` varchar(200) NOT NULL,
  `price` varchar(255) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tid`, `sdate`, `edate`, `location`, `tguide`, `price`, `sid`) VALUES
(2, '2024-06-10', '2024-06-27', 'Arba Minch', 'Abraham Abebe', '4000', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tour_res`
--

CREATE TABLE `tour_res` (
  `resid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_res`
--

INSERT INTO `tour_res` (`resid`, `tid`, `rid`, `fid`, `price`, `username`) VALUES
(8, 2, 4, 3, '8000', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fname`, `mname`, `lname`, `address`, `email`, `phone`, `role`, `status`) VALUES
('abushu', 'dc06698f0e2e75751545455899adccc3', 'Beamlak', 'Tesfaye', 'Gadena', 'Adis Ababa', 'abushu@gmail.com', '0916358457', 'company', 'Active'),
('aschu', 'dc06698f0e2e75751545455899adccc3', 'Aschenaki', 'Kuma', 'Kula', 'Adis Ababa', 'aschenaki@gmail.com', '0911447073', 'company', 'Active'),
('epha', 'dc06698f0e2e75751545455899adccc3', 'Ephrem', 'Amanuel', 'Ayde', 'A.A', 'ephremamanuel355@gmail.com', '0961245789', 'customer', 'Active'),
('h', 'caf1a3dfb505ffed0d024130f58c5cfa', 'h', 'h', 'h', 'Adis Ababa', 'aschenaki@gmail.com', '0911447073', 'company', 'Active'),
('nahom', 'dc06698f0e2e75751545455899adccc3', 'Nahom', 'Leka', 'Adamu', 'Addis Ababa', 'nahom@gmail.com', '0965325654', 'admin', 'Active'),
('nahom2', 'dc06698f0e2e75751545455899adccc3', 'Nahom', 'Esubalew', 'Taye', 'Adis Ababa', 'nahom2@gmail.com', '09986587458', 'company', 'Active'),
('qwe', '202cb962ac59075b964b07152d234b70', 'dzf', 'sdv', 'sdv', 'sdg', 'meseretalemu1212@gmail.com', '345', 'customer', 'Active'),
('wer', '202cb962ac59075b964b07152d234b70', 'xc', 'zxcv', 'xcv', 'A.A', 'ephremamanuel355@gmail.com', '345', 'company', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `car_res`
--
ALTER TABLE `car_res`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cinema_res`
--
ALTER TABLE `cinema_res`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `food_res`
--
ALTER TABLE `food_res`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `plane_res`
--
ALTER TABLE `plane_res`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `room_res`
--
ALTER TABLE `room_res`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tour_res`
--
ALTER TABLE `tour_res`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_res`
--
ALTER TABLE `car_res`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cinema_res`
--
ALTER TABLE `cinema_res`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_res`
--
ALTER TABLE `food_res`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plane`
--
ALTER TABLE `plane`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plane_res`
--
ALTER TABLE `plane_res`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_res`
--
ALTER TABLE `room_res`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tour_res`
--
ALTER TABLE `tour_res`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
