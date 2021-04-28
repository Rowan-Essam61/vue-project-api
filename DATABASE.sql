-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 08:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vtp`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `ID` int(11) NOT NULL,
  `Logo` text NOT NULL,
  `Cart_ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Followers` int(11) NOT NULL,
  `Likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Proudect_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Proudcr_ID` int(11) NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `Delivery_Data` datetime NOT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Quantity` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Likes` int(11) NOT NULL,
  `Dislikes` int(11) NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Colors` text NOT NULL,
  `Sizes` text NOT NULL,
  `Description` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Key` int(11) NOT NULL,
  `Brand_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `Proudcr_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Publish_Date` datetime NOT NULL,
  `Time` time NOT NULL,
  `Content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Name` varchar(50) NOT NULL,
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `Age` int(50) NOT NULL,
  `Password` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Country` text NOT NULL,
  `Address` text NOT NULL,
  `Phone` int(11) NOT NULL,
  `Gender` enum('male','female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Name`, `First_Name`, `Last_Name`, `Age`, `Password`, `Email`, `Country`, `Address`, `Phone`, `Gender`) VALUES
('amola', 'amal', 'ahokry', 40, 1254, 'amola@aana geeeeeeeeeeet.com', 'Egyptnaaaaaa', 'akakaka', 2147483647, 'female'),
('anona', 'anan', 'essam', 22, 123, 'Anona@gmail.com', 'Egypt', 'elebrahimia', 12895445, 'female'),
('doooo', 'donia', 'he', 20, 12352226, 'dsfjdkd', 'werthyuk', 'werthjnbvc', 0, 'female'),
('mamamama', 'doo', 'rerre', 40, 10322, 'qq@yahooo', 'egypt', 'cvmnf,fnbf', 234567899, 'male'),
('roo', 'rowan ', 'essam', 20, 12356, 'roo@rirjf', 'egypt', 'dfghjkl', 1234567, 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone` (`Phone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
