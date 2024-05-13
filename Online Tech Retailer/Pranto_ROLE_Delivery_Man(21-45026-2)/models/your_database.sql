-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 06:52 PM
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
-- Database: `your_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Delivery Man PIN` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Salary` varchar(100) NOT NULL,
  `Bonus` varchar(100) NOT NULL,
  `Rating` varchar(100) NOT NULL,
  `Tasks` varchar(100) NOT NULL,
  `Task_Status` enum('Active','Done') NOT NULL DEFAULT 'Active',
  `Order_ID` int(11) DEFAULT NULL,
  `Order_Status` enum('Active','Done') NOT NULL DEFAULT 'Active',
  `Order_Amount` int(10) NOT NULL,
  `eligible_for_promotion` varchar(3) NOT NULL,
  `account_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_men`
--

INSERT INTO `delivery_men` (`ID`, `Name`, `Delivery Man PIN`, `Email`, `Salary`, `Bonus`, `Rating`, `Tasks`, `Task_Status`, `Order_ID`, `Order_Status`, `Order_Amount`, `eligible_for_promotion`, `account_age`) VALUES
(3, 'E', '5', 'kkkkkkk@gmail.com', '20', '4', '0', 'my tasks', 'Active', 11, 'Active', 12560, 'no', 0),
(4, 'agag', '155', 'agg@gmail.com', '252', '552', '0', '', '', NULL, 'Active', 0, '', 0),
(5, 'gag', '525', 'ag@gmail.com', '141414', '14141414', '0', '', '', NULL, 'Active', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Employee PIN` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Salary` varchar(50) NOT NULL,
  `Bonus` varchar(100) NOT NULL,
  `Rating` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `Name`, `Employee PIN`, `Email`, `Salary`, `Bonus`, `Rating`) VALUES
(11, 'Yeameen', '2234133', 'yeameen@gmail.com', '50000', '4000', '0'),
(12, 'Pranto', '2214123', 'pranto@gmail.com', '60000', '5000', '0'),
(13, 'Sakib', '231233', 'sakib@gmail.com', '23100', '1000', '0'),
(14, 'Mohammad Asheke Rabbi', '67347', 'mdashekerabbi@gmail.com', '70000', '9000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Employee PIN` varchar(255) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status` enum('Active','Done') DEFAULT 'Active',
  `Rating` int(11) NOT NULL DEFAULT 0,
  `account_age` int(11) NOT NULL DEFAULT 0,
  `eligible_for_promotion` varchar(3) NOT NULL DEFAULT 'no',
  `amount` int(10) NOT NULL,
  `Salary` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Employee PIN`, `Email`, `mobile_number`, `order_id`, `status`, `Rating`, `account_age`, `eligible_for_promotion`, `amount`, `Salary`) VALUES
(12, 'Pranto', '2214123', 'pranto@gmail.com', '01789654123', 11, 'Active', 4, 1, 'yes', 65555, 60000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
