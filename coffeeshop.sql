-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 04:36 PM
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
-- Database: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `itemID` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(4,0) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`itemID`, `name`, `description`, `price`, `category`) VALUES
(1, 'Decaf Coffee', '24 ounces hot coffee with no caffeine', 7, 'hot'),
(2, 'Decaf Coffee', '24 ounces hot coffee with no caffeine', 7, 'hot'),
(3, 'Decaf Coffee', '24 ounces hot coffee with no caffeine', 7, 'hot');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(255) NOT NULL,
  `customerID` int(3) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `staffID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordermenu`
--

CREATE TABLE `ordermenu` (
  `orderItemID` int(3) NOT NULL,
  `orderID` int(255) NOT NULL,
  `itemID` int(3) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(3) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `payRate` decimal(5,2) NOT NULL,
  `hireDate` date NOT NULL,
  `usertype` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `password`, `email`, `phone`, `address`, `city`, `state`, `zip`, `question`, `answer`, `payRate`, `hireDate`, `usertype`) VALUES
(6, 'Manager Main', 'manager1', '$2y$10$1jPFYrV2oc5at', 'manager1@testing.gov', '8520741963', '7411 Practice Street', 'DarkRoast', 'in', '98745', 'what is your favorite food?', 'Lasagna', 17.00, '2025-03-15', 1),
(7, 'Staff Member', 'staff1', '$2y$10$RWfVzjSUfVDLZ', 'staff1@practice.org', '0123456789', '987 Olive Avenue', 'Harvard', 'ma', '96301', 'what is your favorite color?', 'green', 15.00, '2025-03-19', 2),
(8, 'customer 1', 'customer1', 'coffee', 'customer1@coffeeshop.com', '7410852963', '123 Gemstone Drive', 'Noting', 'ga', '75342', 'beep boop?', 'yes', 0.00, '0000-00-00', 3),
(9, 'customer 2', 'customer2', '$2y$10$3IZGu12kUQFgc', 'customer2@coffeeshop.com', '9518479632', '741 Software Circle', 'Milano', 'tn', '32165', 'Favorite place?', 'new york', 0.00, '0000-00-00', 3),
(10, 'staff 2', 'staff2', '$2y$10$oaB5E3QOaPIPJ', 'staff2@coffeeshop.com', '9630852741', '863 Silver Drive', 'Athens', 'fl', '98745', 'Favorite subject?', 'foreign languages', 15.00, '2025-03-17', 2),
(11, 'manager 2', 'manager2', '$2y$10$x.iZTlf1eLwqS', 'manager2@testing.gov', '9630852741', '123 School Avenue', 'Lancaster', 'id', '74539', 'Favorite movie?', 'Aliens', 17.00, '2025-02-15', 1),
(13, 'mahadev', 'mahadev', '$2y$10$6LXrtzn9E2XzA', 'mahadev@practice.com', '9785201258', '160 practice rd', 'fitchburg', 'al', '05742', 'favorite color?', 'green', 18.00, '2025-03-20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `order_ibfk_1` (`customerID`),
  ADD KEY `order_ibfk_2` (`staffID`);

--
-- Indexes for table `ordermenu`
--
ALTER TABLE `ordermenu`
  ADD PRIMARY KEY (`orderItemID`),
  ADD KEY `orderitem_ibfk_1` (`orderID`),
  ADD KEY `orderitem_ibfk_2` (`itemID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `itemID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordermenu`
--
ALTER TABLE `ordermenu`
  MODIFY `orderItemID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordermenu`
--
ALTER TABLE `ordermenu`
  ADD CONSTRAINT `ordermenu_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `ordermenu_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `menu` (`itemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
