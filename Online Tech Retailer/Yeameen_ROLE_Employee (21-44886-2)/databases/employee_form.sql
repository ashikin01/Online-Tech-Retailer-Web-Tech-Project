-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 06:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `empform`
--

CREATE TABLE `empform` (
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `ConPass` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `emaill` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empform`
--

INSERT INTO `empform` (`Fname`, `Lname`, `Password`, `ConPass`, `gender`, `emaill`, `phone`, `address`) VALUES
('Tareq', 'Aziz', 'taziz123', 'taziz123', 'male', 'tareqaziz1@gmail.com', '01844330220', 'Bashundhara, Block-A,Road-2,plot-89/90'),
('Tareq', 'Aziz', 'taziz123', 'taziz123', 'male', 'tareqaziz1@gmail.com', '01844330220', 'Bashundhara, Block-A,Road-2,plot-89/90'),
('Shahriar Ahmed', 'alam', 'sh123', 'sh123', 'male', 'shariar123@gmail.com', '012232424', 'dhaka,bangaldesh'),
('ggvg', 'frfrc', '1234', '1234', 'male', 'vgfvfdrt1@gmail.com', '097654', 'gffrd'),
('ggvg', 'frfrc', '1234', '1234', 'male', 'vgfvfdrt1@gmail.com', '097654', 'gffrd'),
('', '', '', '', 'Not selected', '', '', ''),
('MDJ', 'Jalil', '161960', '161960', 'male', 'mohammadj1@gmail.com', '01222388449', 'Dhaka,Bangladesh'),
('', '', '', '', 'Not selected', '', '', ''),
('Aziz A', 'Aziz', 'aziz1245', 'aziz1245', 'male', 'aziz1@gmail.com', '01316196029', 'Bashundhara, Block-A,Road-2,plot-89/90'),
('', '', '', '', 'Not selected', '', '', ''),
('Imtiaz', 'Alfaz', '1234', '1234', 'male', 'imtiaz1@gmail.com', '836339', 'Bashundhara, Block-A,Road-2,plot-89/90'),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', 'Not selected', '', '', ''),
('', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', ''),
('', '', '', '', '', '', '', '');

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
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `EId` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`EId`, `aid`, `date`) VALUES
(11, 11, '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `employee_dash`
--

CREATE TABLE `employee_dash` (
  `Eid` int(6) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Salary` varchar(15) NOT NULL,
  `Task` varchar(50) NOT NULL,
  `Performance` varchar(20) NOT NULL,
  `Announcement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_dash`
--

INSERT INTO `employee_dash` (`Eid`, `Username`, `Password`, `Email`, `Salary`, `Task`, `Performance`, `Announcement`) VALUES
(11, 'Mohammad Aziz', 'ma123', 'maziz101@gmail.com', '40000', 'Handle the Store shipment', '80%', 'There will be holiday tommorrow');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `tid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tid`, `uid`, `title`, `description`, `status`, `feedback`) VALUES
(1, 4, 'gaga', 'agagag', 'Not Started', ''),
(2, 4, 'ggqgew', 'qttqtqttt', 'Not Started', ''),
(20, 6, 'agag', 'aggg', 'Not Started', 'No Feedback Added Yet'),
(21, 7, 'Task 1', 'Go ahead, buy food', 'Not Started', 'No Feedback Added Yet'),
(22, 7, 'Task 2 ', 'sleep ', 'Not Started', 'No Feedback Added Yet'),
(23, 7, 'Go to market', 'buy nothing', 'Not Started', 'No Feedback Added Yet'),
(24, 9, 'test', 'ahfjaghajhgagag', 'Not Started', 'No Feedback Added Yet'),
(25, 9, 'agag', 'agagaggggsgsg', 'Not Started', 'No Feedback Added Yet'),
(26, 9, 'afagagagg', 'agaaggggggggggggggggggggggggggg', 'Not Started', 'No Feedback Added Yet'),
(27, 11, 'GO To new market', 'Buy Nothing', 'Not Started', 'No Feedback Added Yet'),
(28, 12, 'Sleep', 'Wake UP', 'Not Started', 'No Feedback Added Yet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`EId`);

--
-- Indexes for table `employee_dash`
--
ALTER TABLE `employee_dash`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `tid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
