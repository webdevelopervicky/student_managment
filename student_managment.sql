-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 05:15 AM
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
-- Database: `student_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `prime_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`prime_id`, `user_name`, `user_password`, `date`) VALUES
(1, 'vicky', '112789', '2024-10-05 04:32:21.000000');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `serialno` int(10) NOT NULL,
  `student_key` int(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `contect` varchar(15) NOT NULL,
  `totalfees` varchar(20) NOT NULL,
  `balance` varchar(20) NOT NULL,
  `paid` varchar(20) NOT NULL,
  `paid_date` varchar(15) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`serialno`, `student_key`, `student_name`, `contect`, `totalfees`, `balance`, `paid`, `paid_date`, `remark`) VALUES
(274, 5041, 'vickykumar', '8940680540', '40000', '20000', '5000', '2024-10-17', 'paid'),
(275, 5042, 'dinesh', '8940680540', '40000', '20000', '10000', '2024-10-16', 'gbay'),
(276, 5043, 'tamil', '8940680540', '40000', '25000', '5000', '2024-10-24', 'gbay'),
(277, 5042, 'dinesh', '8940680540', '40000', '10000', '10000', '2024-10-16', 'paid'),
(278, 5043, 'tamil', '8940680540', '40000', '20000', '5000', '2024-10-17', 'gbay');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `primekey` int(10) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `details` varchar(150) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`primekey`, `grade`, `details`, `date`) VALUES
(1, 'Full Stack Developer - B1', 'HTML/CSS/JavaScript/Jquery/Bootstrap/ React Js/Github/AI concept/', 0),
(2, 'Full Stack Developer - B2', 'HTML/CSS/JavaScript/Jquery/Bootstrap/ React Js/Github/AI concept/', 0),
(3, 'Full Stack Developer - B3', 'HTML/CSS/JavaScript/Jquery/Bootstrap/ React Js/Github/AI concept/', 0),
(4, 'Full Stack Developer - B4', 'HTML/CSS/JavaScript/Jquery/Bootstrap/ React Js/Github/AI concept/', 0),
(5, 'Full Stack Developer - B5', '	HTML/CSS/JavaScript/Jquery/Bootstrap/ React Js/Github/AI concept/', 0),
(21, 'Full Stack Developer - B6', 'htmlcss', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students_managment`
--

CREATE TABLE `students_managment` (
  `register_no` int(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `ParentContact` varchar(15) NOT NULL,
  `Aadhar` varchar(20) NOT NULL,
  `Grade` varchar(20) NOT NULL,
  `joindate` varchar(20) NOT NULL,
  `TotalFees` varchar(10) NOT NULL,
  `AdvanceFee` varchar(10) NOT NULL,
  `Balance` varchar(15) NOT NULL,
  `FeeRemark` varchar(20) NOT NULL,
  `AboutStudent` varchar(100) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students_managment`
--

INSERT INTO `students_managment` (`register_no`, `fullname`, `Contact`, `ParentContact`, `Aadhar`, `Grade`, `joindate`, `TotalFees`, `AdvanceFee`, `Balance`, `FeeRemark`, `AboutStudent`, `EmailId`, `status`) VALUES
(5041, 'vickykumar', '8940680540', '9003582583', '456789009876', '5', '2024-10-15', '40000', '15000', '25000', 'gbay', 'good', 'vk@gmail.com', 'delet'),
(5042, 'dinesh', '8940680540', '9003582583', '456789009876', '4', '2024-10-15', '40000', '10000', '30000', 'cassh', 'good', 'dhinesh@123', 'inactive'),
(5043, 'tamil', '8940680540', '9003582583', '456789009876', '5', '2024-10-15', '40000', '10000', '30000', 'gbay', 'good', 'tamil@gmail.com', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`prime_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`serialno`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`primekey`);

--
-- Indexes for table `students_managment`
--
ALTER TABLE `students_managment`
  ADD PRIMARY KEY (`register_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `prime_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `serialno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `primekey` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `students_managment`
--
ALTER TABLE `students_managment`
  MODIFY `register_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5044;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
