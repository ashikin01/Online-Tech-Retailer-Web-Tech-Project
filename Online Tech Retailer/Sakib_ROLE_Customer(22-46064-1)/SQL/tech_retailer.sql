-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 07:32 AM
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
-- Database: `tech retailer`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` int(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `Username`, `Full_Name`, `Email`, `Phone`, `Password`) VALUES
(1, 'sakib', 'Sakibul Alam', 'sakibulalam557@gmail.com', '01866188084', '1234'),
(3, 'arif', 'Arif Mainuddin', 'arif@gmail.com', '01456677455', '12345'),
(5, 'rakib', 'Rakib Hasan', 'rakib55@gmail.com', '01734567892', '12345'),
(7, 'abid', 'Al Abid', 'alabid@gmail.com', '01734567845', '12'),
(8, 'samiur', 'Samiur Rahman', 'samiur@gmail.com', '01456677555', '1234'),
(9, 'Imtiaz', 'Imtiaz Islam', 'imtiaz@gmail.com', '01866188088', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `Order_Id` int(100) NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Unit_Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Total_Price` int(100) NOT NULL,
  `Payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`Order_Id`, `Customer_Name`, `Item_Name`, `Unit_Price`, `Quantity`, `Total_Price`, `Payment`) VALUES
(14, '', 'MacBook Pro M3 Pro', 395000, 1, 0, ''),
(14, '', 'Lenovo Legion Pro 7', 95000, 1, 0, ''),
(15, '', 'MacBook Pro M3 Pro', 395000, 2, 0, ''),
(15, '', 'Lenovo Legion Pro 7', 95000, 3, 0, ''),
(18, 'sakib', 'Asus ROG Zephyrus G16', 225000, 1, 0, ''),
(19, 'sakib', 'MacBook Pro M3 Pro', 395000, 1, 0, ''),
(19, 'sakib', 'Lenovo Legion Pro 7', 95000, 1, 0, ''),
(20, 'rakib', 'MacBook Pro M3 Pro', 395000, 1, 0, ''),
(20, 'rakib', 'ESET Internet Security', 5000, 1, 0, ''),
(21, 'sakib', 'MacBook Pro M3 Pro', 395000, 1, 0, ''),
(22, 'sakib', 'Intel Core i7 14700K', 395000, 1, 0, ''),
(23, 'arif', 'Lenovo Legion Pro 7', 95000, 1, 0, ''),
(23, 'arif', 'Asus ROG Zephyrus G16', 225000, 1, 0, ''),
(24, 'arif', 'Asus ROG Zephyrus G16', 225000, 1, 0, ''),
(25, 'samiur', 'AMD Ryzen 7 7800X', 30000, 6, 0, ''),
(25, 'samiur', 'ESET Internet Security', 5000, 3, 0, ''),
(26, 'sakib', 'MacBook Pro M3 Pro', 395000, 1, 0, ''),
(26, 'sakib', 'Lenovo Legion Pro 7', 95000, 1, 0, ''),
(28, 'sakib', 'MacBook Pro M3 Pro', 395000, 1, 0, ''),
(29, 'abid', 'Dell', 1000, 3, 0, ''),
(30, 'abid', 'Dell', 1000, 3, 0, ''),
(31, 'abid', 'Xiaomi Pad 6', 40000, 3, 0, ''),
(32, 'samiur', 'Dell', 1000, 1, 0, ''),
(33, 'samiur', 'Dell', 1000, 1, 0, ''),
(34, 'samiur', 'Dell', 1000, 1, 0, ''),
(35, 'rakib', 'Dell', 1000, 4, 0, ''),
(36, 'rakib', 'Dell', 1000, 4, 0, ''),
(37, 'sakib', 'ASUS ROG Swift', 150000, 1, 0, ''),
(38, 'samiur', 'ASUS ROG Swift', 150000, 2, 0, ''),
(39, 'samiur', 'MSI MPG 321URX 31.5', 140000, 3, 0, ''),
(40, 'samiur', 'LG 27GR95QE-B 27-Inch', 14000, 2, 0, ''),
(41, 'arif', 'Asus ROG Zephyrus G16', 1000, 4, 0, ''),
(42, 'rakib', 'Asus ROG Zephyrus G16', 1000, 10, 0, ''),
(43, 'rakib', 'Lenovo Legion Pro 7', 100, 1, 0, ''),
(44, 'rakib', 'Asus ROG Zephyrus G16', 1000, 1, 0, 'Cash on delivery'),
(45, 'rakib', 'Microsoft Surface 4', 200000, 1, 0, 'None'),
(46, 'abid', 'MSI MPG 321URX 31.5', 140000, 1, 0, 'Bkash'),
(47, 'sakib', 'Samsung S24 Ultra', 131950, 1, 131950, 'Cash on delivery'),
(48, 'sakib', '18W PD USB C Wall Charger', 600, 9, 5400, 'Visa card'),
(50, 'arif', 'Baseus Power Bank ', 1960, 4, 7840, 'Visa card'),
(51, 'arif', 'Baseus Power Bank ', 1960, 4, 7840, 'Visa card'),
(52, 'arif', 'Samsung S24 Ultra', 131950, 2, 263900, 'Cash on delivery'),
(53, 'abid', 'Samsung S24 Ultra', 131950, 2, 263900, 'Master card'),
(54, 'abid', '18W PD USB C Wall Charger', 600, 3, 1800, 'Visa card'),
(55, 'abid', '18W PD USB C Wall Charger', 600, 3, 1800, 'Cash on delivery'),
(56, 'Imtiaz', 'Samsung S24 Ultra', 131950, 2, 263900, 'Cash on delivery'),
(57, 'samiur', 'Iphone 14 Max', 126000, 1, 126000, 'Cash on delivery'),
(58, 'samiur', '18W PD USB C Wall Charger', 600, 4, 2400, 'Visa card'),
(59, 'abid', '18W PD USB C Wall Charger', 600, 3, 1800, 'Bkash'),
(60, 'rakib', 'iFanze Smart Watch', 3750, 1, 3750, 'Cash on delivery'),
(61, 'rakib', '18W PD USB C Wall Charger', 600, 3, 1800, 'Nagad'),
(62, 'sakib', 'Iphone 14 Max', 126000, 1, 126000, 'Master card'),
(63, 'samiur', '18W PD USB C Wall Charger', 600, 4, 2400, 'Visa card'),
(64, 'samiur', '18W PD USB C Wall Charger', 600, 4, 2400, 'Visa card'),
(65, 'samiur', 'Baseus Power Bank ', 1960, 3, 5880, 'Cash on delivery'),
(68, 'abid', 'Iphone 14 Max', 126000, 1, 126000, 'Nagad'),
(69, 'abid', 'Iphone 14 Max', 126000, 1, 126000, 'Cash on delivery'),
(70, 'rakib', 'Iphone 14 Max', 126000, 2, 252000, 'Visa card'),
(71, 'abid', '18W PD USB C Wall Charger', 600, 3, 1800, 'Cash on delivery'),
(72, 'abid', '18W PD USB C Wall Charger', 600, 3, 1800, 'Cash on delivery'),
(73, 'abid', '18W PD USB C Wall Charger', 600, 3, 1800, 'Cash on delivery'),
(74, 'rakib', 'Iphone 14 Max', 126000, 2, 252000, 'Nagad'),
(75, 'sakib', '18W PD USB C Wall Charger', 600, 13, 7800, 'Cash on delivery'),
(78, 'Imtiaz', 'iFanze Smart Watch', 3750, 3, 11250, 'Master card'),
(78, 'Imtiaz', 'Samsung S24 Ultra', 131950, 2, 263900, 'Master card'),
(79, 'arif', 'Iphone 14 Max', 126000, 2, 252000, 'Bkash'),
(79, 'arif', 'iFanze Smart Watch', 3750, 3, 11250, 'Bkash');

-- --------------------------------------------------------

--
-- Table structure for table `customer_question`
--

CREATE TABLE `customer_question` (
  `Question_Id` int(100) NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `Question` varchar(100) NOT NULL,
  `Answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_question`
--

INSERT INTO `customer_question` (`Question_Id`, `Customer_Name`, `Question`, `Answer`) VALUES
(1, 'sakib', 'Samsung S24 Ultra is available?', 'Yes available. You can buy it in our website now. Thank you for the question.'),
(2, 'sakib', 'Is iFanze Smart Watch compatible with both iPhone and Android?', 'Yes sir. iFanze smartwatch is supported in all the device.');

-- --------------------------------------------------------

--
-- Table structure for table `customer_report`
--

CREATE TABLE `customer_report` (
  `Order_Id` int(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Report_Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_report`
--

INSERT INTO `customer_report` (`Order_Id`, `Username`, `Report_Message`) VALUES
(18, 'sakib', 'Late delivery'),
(21, 'sakib', 'MacBook Pro M3 Pro\r\nKeyboard not worked'),
(20, 'rakib', 'Late delivery'),
(22, 'sakib', 'Delivery man bad behavior');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'How do I place an order?', 'Simply browse our website, add the desired items to your cart, and follow the checkout process. You\'ll be prompted to create an account (optional) and enter your shipping and payment information.'),
(2, 'What payment methods do you accept?', 'We accept all major credit cards, debit cards, and some digital wallets (see website for details).'),
(3, 'Is my payment information secure?', 'Absolutely! We use industry-standard security measures to protect your payment information.'),
(4, 'How long will it take to receive my order?', 'Delivery times vary depending on your location and chosen shipping method. You\'ll see estimated delivery times during checkout.'),
(5, 'What is your return policy?', 'We offer a 10 days money-back guarantee on most products.'),
(6, 'What happens if I receive a damaged item?', 'Please contact us immediately if you receive a damaged item. We\'ll be happy to arrange a replacement or refund.'),
(7, 'What are the benefits of having an account?', 'With an account, you can enjoy faster checkout, track your orders, manage your account information, and view past purchases.'),
(8, 'How do I contact customer service?', 'You can contact customer service by phone, email.');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_Id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_Id`, `Name`, `Phone`, `Address`) VALUES
(19, 'sakib', '01866188084', 'Dhaka'),
(20, 'rakib', '01734567892', 'Dhaka'),
(21, 'sakib', '01866188084', 'Chittagong'),
(22, 'sakib', '01866188084', 'Dhaka'),
(23, 'arif', '01456677455', 'Chittagong'),
(24, 'arif', '01456677455', 'Dhaka'),
(25, 'samiur', '01456677555', 'Chittagong'),
(26, 'sakib', '01866188084', 'Chittagong'),
(27, 'sakib', '01866188084', 'Chittagong'),
(28, 'sakib', '01866188084', 'Dhaka'),
(29, 'abid', '01734567845', 'Dhaka'),
(30, 'abid', '01734567845', 'Dhaka'),
(31, 'abid', '01734567845', 'Dhaka'),
(32, 'samiur', '01456677555', 'Chittagong'),
(33, 'samiur', '01456677555', 'Chittagong'),
(34, 'samiur', '01456677555', 'Chittagong'),
(35, 'rakib', '01734567892', 'Dhaka'),
(36, 'rakib', '01734567892', 'Dhaka'),
(37, 'sakib', '01866188084', 'Chittagong'),
(38, 'samiur', '01456677555', 'Dhaka'),
(39, 'samiur', '01456677555', 'Chittagong'),
(40, 'samiur', '01456677555', 'Chittagong'),
(41, 'arif', '01456677455', 'Chittagong'),
(42, 'rakib', '01734567892', 'Chittagong'),
(43, 'rakib', '01734567892', 'Dhaka'),
(44, 'rakib', '01734567892', 'Dhaka'),
(45, 'rakib', '01734567892', 'Dhaka'),
(46, 'abid', '01734567845', 'Chittagong'),
(47, 'sakib', '01866188084', 'Dhaka'),
(48, 'sakib', '01866188084', 'Dhaka'),
(49, 'arif', '01456677455', 'Chittagong'),
(50, 'arif', '01456677455', 'Chittagong'),
(51, 'arif', '01456677455', 'Chittagong'),
(52, 'arif', '01456677455', 'Chittagong'),
(53, 'abid', '01734567845', 'Dhaka'),
(54, 'abid', '01734567845', 'Bashundhara R\\A'),
(55, 'abid', '01734567845', 'Bashundhara R/A'),
(56, 'Imtiaz', '01866188088', 'Chittagong'),
(57, 'samiur', '01456677555', 'Bashundhara R/A'),
(58, 'samiur', '01456677555', 'Muradpur'),
(59, 'abid', '01734567845', 'Bashundhara R/A'),
(60, 'rakib', '01734567892', 'Bashundhara R/A'),
(61, 'rakib', '01734567892', 'Dhaka'),
(62, 'sakib', '01866188084', 'Bashundhara R/A'),
(63, 'samiur', '01456677555', 'Chittagong'),
(64, 'samiur', '01456677555', 'Chittagong'),
(65, 'samiur', '01456677555', 'Bashundhara R/A'),
(66, 'samiur', '01456677555', 'Dhaka'),
(67, 'samiur', '01456677555', 'Dhaka'),
(68, 'abid', '01734567845', 'Muradpur'),
(69, 'abid', '01734567845', 'Bashundhara R/A'),
(70, 'rakib', '01734567892', 'Bashundhara R\\A'),
(71, 'abid', '01734567845', 'Muradpur'),
(72, 'abid', '01734567845', 'Muradpur'),
(73, 'abid', '01734567845', 'Muradpur'),
(74, 'rakib', '01734567892', 'Bashundhara R/A'),
(75, 'sakib', '01866188084', 'Muradpur'),
(76, 'Imtiaz', '01866188088', 'Chittagong'),
(77, 'Imtiaz', '01866188088', 'Bashundhara R/A'),
(78, 'Imtiaz', '01866188088', 'Dhaka'),
(79, 'arif', '01456677455', 'Bashundhara R/A');

-- --------------------------------------------------------

--
-- Table structure for table `product_datas`
--

CREATE TABLE `product_datas` (
  `id` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `price_after_discount` int(50) NOT NULL,
  `delivery_charge` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_datas`
--

INSERT INTO `product_datas` (`id`, `category`, `name`, `price`, `quantity`, `discount`, `price_after_discount`, `delivery_charge`, `picture`) VALUES
(35, 'Laptop', 'Macbook Air M1 Pro', '240000', '40', '10', 220000, '150', 'assets/1.png'),
(36, 'Laptop', 'Lenovo Legion Pro 7', '145000', '49', '9', 126000, '200', 'assets/2.png'),
(37, 'Desktop', 'ASUS ROG Swift', '140000', '0', '5', 125000, '100', 'assets/3.png'),
(38, 'Desktop', 'MSI MPG 321URX 31.5', '150000', '20', '0', 150000, '600', 'assets/4.png'),
(39, 'Desktop', 'LG 27GR95QE-B 27-Inch', '90000', '0', '35', 75000, '400', 'assets/5.png'),
(40, 'Processor', 'AMD Ryzen 9 7950X3D', '350000', '88', '2', 345000, '30', 'assets/6.png'),
(41, 'Processor', 'Ryzen 675X45F', '200000', '73', '0', 180000, '40', 'assets/7.png'),
(42, 'Printer', 'Epson EcoTank Printer', '20000', '20', '25', 19500, '70', 'assets/8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- Indexes for table `customer_question`
--
ALTER TABLE `customer_question`
  ADD PRIMARY KEY (`Question_Id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `product_datas`
--
ALTER TABLE `product_datas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_question`
--
ALTER TABLE `customer_question`
  MODIFY `Question_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `product_datas`
--
ALTER TABLE `product_datas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
