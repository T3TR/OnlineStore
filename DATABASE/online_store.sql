-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2022 at 08:34 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`ID`, `userID`, `itemID`, `amount`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `price` int(11) NOT NULL,
  `originID` int(11) NOT NULL,
  `stockCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `name`, `image`, `description`, `price`, `originID`, `stockCount`) VALUES
(1, 'Ulfberht', './images/euUlfberht.png', '', 12000, 1, 15),
(2, 'Messer', './images/euMesser.png', '', 9000, 1, 25),
(3, 'Gladius', './images/euGladius.png', '', 18000, 1, 10),
(4, 'Kopis', './images/euKopis.png', '', 7000, 1, 35),
(5, 'Rapier', './images/euRapier.png', '', 28000, 1, 5),
(6, 'Leaf Blade', './images/euLeaf.png', '', 16000, 1, 15),
(7, 'Claymore', './images/euClaymore.png', '', 11000, 1, 20),
(8, 'Tanto', './images/jaTanto.png', '', 3000, 2, 25),
(9, 'Wakizashi', './images/jaWakizashi.png', '', 8000, 2, 20),
(10, 'Katana', './images/jaKatana.png', '', 14000, 2, 25),
(11, 'Dao', './images/chDao.png', '', 6000, 3, 40),
(12, 'Jian', './images/chJian.png', '', 20000, 3, 15),
(13, 'Scimitar', './images/meScimitar.png', '', 7000, 4, 20),
(14, 'Kophesh', './images/meKophesh.png', '', 13000, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`) VALUES
(1, 'Daniel', 'baba@gmail.com', '123455'),
(2, 'asda', 'oiurgboiegn@gmail.com', '1234566'),
(3, 'rhhr', 'awfeWF@gmail.com', '12344'),
(4, 'thtk', 'hbiavebgkbueaQ@gmail.com', '123455'),
(5, 'rehgtrjh', 'sergeg@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
