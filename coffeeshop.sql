-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2025 at 04:02 PM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `revID` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`revID`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Customer 1', 'customer1@practice.test', 'Nut allergens', 'Please add any potential nut allergens on the menu'),
(2, 'Customer 2', 'customer2@practice.test', 'Gluten sensitivity', 'Are there gluten free options?');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `itemID` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `category` varchar(30) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`itemID`, `name`, `description`, `price`, `category`, `image_url`) VALUES
(28, 'Regular Coffee (Large)', '24 oz of hot coffee', 6.99, 'hot', 'uploads/681543a99ffb8_large_hot_reg_2.jpg'),
(29, 'Regular Coffee (Medium)', '16 oz of hot coffee', 4.99, 'hot', 'uploads/681543c67eebf_med_hot_reg.jpg'),
(30, 'Regular Coffee (Small)', '8 oz of hot coffee', 2.99, 'hot', 'uploads/681543de24c1e_small_hot_reg.jpg'),
(31, 'Chai Latte', 'A blend of black tea, cinnamon, cardamom, ginger, and cloves, mixed with steamed milk.', 4.99, 'hot', 'uploads/681544a1c8453_hot_chai.jpg'),
(33, 'Hot Chocolate', 'Rich cocoa blended with steamed milk and a touch of sugar. Topped with whipped cream.', 4.50, 'hot', 'uploads/681545e9a1f13_hot_choc2.jpg'),
(35, 'Iced Regular Coffee (Large)', '24 oz of cold-brewed coffee', 6.99, 'cold', 'uploads/68154bbd97e3c_large_iced_reg.jpg'),
(36, 'Iced Regular Coffee (Medium)', '16 oz of cold-brewed coffee', 4.99, 'cold', 'uploads/68154c836cf2f_med_iced_reg.jpg'),
(37, 'Iced Regular Coffee (Small)', '8 oz of cold-brewed coffee', 2.99, 'cold', 'uploads/68154e0e6f7f1_small_iced_reg.jpg'),
(38, 'Iced Matcha Latte', 'Matcha green tea blended with milk and served over ice.', 4.99, 'cold', 'uploads/68162aee1644e_iced-matcha-latte.jpg'),
(39, 'Iced Strawberry Green Tea', 'Green tea with sweetened with strawberry, served over ice.', 4.50, 'cold', 'uploads/68162b96a3b30_strawb_tea.jpg'),
(40, 'Espresso Fudge Brownie', 'Espresso-infused dark chocolate brownie', 3.00, 'bake', 'uploads/681ba642318a7_espresso-brownies-featured.jpg'),
(41, 'Lavender Lemon Bar', 'Buttery almond shortbread bar topped with lavender lemon cream.', 2.75, 'bake', 'uploads/68162d0de4822_lemon_bar.jpg'),
(42, 'Cinnamon Roll', 'Soft roll layered with cinnamon sugar, topped with vanilla frosting.', 3.00, 'bake', 'uploads/68162d9527a6a_cinnamon_roll.jpg'),
(43, 'Blueberry Muffin', 'Muffin with locally-grown blueberries and a lemon streusel topping.', 3.50, 'bake', 'uploads/68162e892d099_bloob_muffin.jpg'),
(44, 'Chocolate Chip Cookie', 'Soft baked cookie with semi-sweet chocolate chips', 1.99, 'bake', 'uploads/68162fa9e3769_choc_chip.jpg'),
(45, 'Cherry Blossom Latte', 'Espresso with steamed milk and cherry blossom syrup', 5.00, 'limited', 'uploads/681630c77eae2_cherry_blossom.jpg'),
(47, 'Honey Carrot Cake Muffin', 'Spiced carrot cake with natural honey and cream cheese glaze', 4.50, 'limited', 'uploads/681631b6a0a1f_carrot-muffins-4.jpg'),
(49, 'Easter Egg Cupcakes', 'White cake with blue buttercream and mini chocolate eggs', 3.75, 'limited', 'uploads/68163325be52a_Robins-Egg-Easter-Cupcakes.jpg');

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

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `customerID`, `date`, `time`, `staffID`) VALUES
(1, 8, '2025-05-08', '01:06:55.000000', 0),
(2, 8, '2025-05-08', '01:09:44.000000', 0),
(3, 8, '2025-05-08', '01:10:52.000000', 0),
(4, 8, '2025-05-08', '01:49:12.000000', 0),
(5, 8, '2025-05-08', '01:49:52.000000', 0),
(6, 8, '2025-05-08', '01:51:38.000000', 0),
(7, 8, '2025-05-08', '01:56:05.000000', 0),
(8, 8, '2025-05-08', '01:57:06.000000', 0),
(9, 8, '2025-05-08', '01:59:34.000000', 0),
(10, 8, '2025-05-08', '02:00:17.000000', 0),
(11, 8, '2025-05-08', '02:01:02.000000', 0),
(12, 8, '2025-05-08', '02:02:04.000000', 0),
(13, 8, '2025-05-08', '02:16:07.000000', 0),
(14, 8, '2025-05-08', '02:16:42.000000', 0),
(15, 8, '2025-05-08', '02:17:31.000000', 0),
(16, 8, '2025-05-08', '02:18:06.000000', 0),
(17, 8, '2025-05-08', '02:18:37.000000', 0),
(18, 8, '2025-05-08', '02:19:25.000000', 0),
(19, 8, '2025-05-08', '02:20:43.000000', 0),
(20, 8, '2025-05-08', '02:21:28.000000', 0),
(21, 8, '2025-05-08', '02:23:49.000000', 0),
(22, 8, '2025-05-08', '02:24:27.000000', 0),
(23, 8, '2025-05-08', '02:25:08.000000', 0),
(24, 8, '2025-05-08', '02:27:29.000000', 0),
(25, 8, '2025-05-08', '02:28:01.000000', 0),
(26, 8, '2025-05-07', '20:41:24.000000', 0),
(27, 9, '2025-05-07', '21:04:26.000000', 0),
(28, 9, '2025-05-07', '21:07:23.000000', 0),
(29, 8, '2025-05-07', '21:37:47.000000', 0);

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

--
-- Dumping data for table `ordermenu`
--

INSERT INTO `ordermenu` (`orderItemID`, `orderID`, `itemID`, `quantity`) VALUES
(2, 7, 30, 1),
(3, 8, 30, 1),
(4, 9, 29, 1),
(5, 10, 30, 1),
(6, 11, 29, 1),
(7, 12, 31, 1),
(8, 13, 38, 1),
(9, 14, 28, 1),
(10, 15, 31, 1),
(11, 16, 30, 1),
(12, 17, 30, 1),
(13, 18, 30, 1),
(14, 19, 30, 1),
(15, 20, 29, 1),
(16, 21, 30, 1),
(17, 22, 31, 1),
(18, 23, 30, 1),
(19, 24, 31, 1),
(20, 25, 31, 1),
(21, 26, 29, 1),
(22, 27, 47, 1),
(23, 27, 29, 1),
(24, 28, 29, 1),
(25, 29, 29, 3);

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
(6, 'Manager Main', 'manager1', 'Coffee', 'manager1@testing.gov', '8520741963', '7411 Practice Street', 'DarkRoast', 'in', '98745', 'what is your favorite food?', 'Lasagna', 17.00, '2025-03-15', 1),
(7, 'Staff Member', 'staff1', 'coffeeshop', 'staff1@practice.org', '0123456789', '987 Olive Avenue', 'Harvard', 'ma', '96301', 'what is your favorite color?', 'green', 15.00, '2025-03-19', 2),
(8, 'Main Customer', 'customer1', 'coffee', 'customer1@coffeeshop.com', '7410852963', '123 Gemstone Drive', 'Nothing', 'co', '75342', 'beep boop?', 'yes', 0.00, '0000-00-00', 3),
(9, 'customer 2', 'customer2', 'CoffeeShop', 'customer2@coffeeshop.com', '9518479632', '741 Software Circle', 'Milano', 'tn', '32165', 'Favorite place?', 'new york', 0.00, '0000-00-00', 3),
(10, 'staff 2', 'staff2', 'CoffeeShop', 'staff2@coffeeshop.com', '9630852741', '863 Silver Drive', 'Athens', 'fl', '98745', 'Favorite subject?', 'foreign languages', 15.00, '2025-03-17', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`revID`);

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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `revID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `itemID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ordermenu`
--
ALTER TABLE `ordermenu`
  MODIFY `orderItemID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
