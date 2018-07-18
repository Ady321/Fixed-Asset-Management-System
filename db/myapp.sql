-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2018 at 05:18 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Phno` bigint(10) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Date` datetime NOT NULL,
  `Role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Email`, `Username`, `Phno`, `Password`, `Date`, `Role`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', 7904126213, 'a6922c8dfa13c9f8aedfb05096b449a7c5259a45', '2018-06-26 18:37:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `assetId` int(10) NOT NULL,
  `TagId` varchar(12) NOT NULL,
  `sub_Id` int(10) NOT NULL,
  `serial_no` varchar(12) NOT NULL,
  `sup_id` int(10) NOT NULL,
  `con_id` int(10) NOT NULL,
  `loc_id` int(10) NOT NULL,
  `asset_name` varchar(100) NOT NULL,
  `quan` int(10) NOT NULL,
  `Id` int(10) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`assetId`, `TagId`, `sub_Id`, `serial_no`, `sup_id`, `con_id`, `loc_id`, `asset_name`, `quan`, `Id`, `date_added`) VALUES
(1, 'SY542xx024IR', 2, 'guIGlTtm8mzX', 1, 1, 12, 'Desktop 1', 1, 4, '2018-06-29'),
(6, 'SY371zh067MU', 2, '8uuoJ6yOgMnV', 2, 2, 16, 'Desktop 2', 1, 6, '2018-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `asset_condition`
--

CREATE TABLE `asset_condition` (
  `con_id` int(10) NOT NULL,
  `Conditions` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_condition`
--

INSERT INTO `asset_condition` (`con_id`, `Conditions`) VALUES
(2, 'Not Working'),
(1, 'Working');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_Id` int(10) NOT NULL,
  `cat_Name` varchar(50) NOT NULL,
  `Color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_Id`, `cat_Name`, `Color`) VALUES
(1, 'Desktops', '#1e3fda'),
(2, 'Keyboards', '#058e29'),
(3, 'Mouse', '#ff0000'),
(4, 'Printer', '#99ac14');

-- --------------------------------------------------------

--
-- Table structure for table `dept_teams`
--

CREATE TABLE `dept_teams` (
  `dept_Id` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `loc_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_teams`
--

INSERT INTO `dept_teams` (`dept_Id`, `Name`, `loc_id`) VALUES
(1, 'Engineering Team', 11);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `loc_id` int(10) NOT NULL,
  `Location_name` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `Location_name`) VALUES
(15, 'S17'),
(16, 'S24'),
(11, 'S3'),
(12, 'S4'),
(13, 'S6'),
(14, 'S9');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(10) NOT NULL,
  `manu_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'Microsoft'),
(4, 'HP'),
(5, 'Samsung'),
(6, 'Asus'),
(7, 'Canon'),
(8, 'Cisco'),
(9, 'Lenovo'),
(10, 'Acer'),
(11, 'Epson');

-- --------------------------------------------------------

--
-- Table structure for table `passhash`
--

CREATE TABLE `passhash` (
  `Pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passhash`
--

INSERT INTO `passhash` (`Pass`) VALUES
('a6922c8dfa13c9f8aedfb05096b449a7c5259a45');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_Id` int(10) NOT NULL,
  `category_Id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `manu_id` int(10) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Price` int(10) NOT NULL,
  `Purchase_date` date NOT NULL,
  `Supplier_date` date NOT NULL,
  `warranty_start` date NOT NULL,
  `warranty_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_Id`, `category_Id`, `Name`, `manu_id`, `Quantity`, `Price`, `Purchase_date`, `Supplier_date`, `warranty_start`, `warranty_end`) VALUES
(1, 1, 'V520 Slim Tower', 9, 1, 28350, '2018-06-19', '2018-06-20', '2018-06-20', '2019-06-21'),
(2, 1, 'Ideacenter 310', 9, 0, 28310, '2018-06-28', '2018-06-28', '2018-06-28', '2019-07-18'),
(3, 2, 'K1500', 4, 5, 399, '2018-06-28', '2018-06-28', '2018-06-28', '2019-03-21'),
(4, 2, 'C2500', 4, 4, 590, '2018-06-28', '2018-06-28', '2018-06-28', '2018-10-17'),
(5, 3, 'WM118', 2, 2, 500, '2018-06-28', '2018-06-28', '2018-06-28', '2018-08-23'),
(6, 3, 'MS116', 2, 2, 399, '2018-06-28', '2018-06-28', '2018-06-28', '2018-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sup_id` int(10) NOT NULL,
  `sup_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sup_id`, `sup_Name`) VALUES
(1, 'Amazon'),
(2, 'Bestbuy'),
(4, 'Amazon'),
(5, 'Flipkart');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(10) NOT NULL,
  `user_Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `Mob_no` bigint(10) NOT NULL,
  `dept_Id` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `user_Name`, `Email`, `job_title`, `Mob_no`, `dept_Id`, `date`) VALUES
(4, 'Aditya Gedam', 'gedamaditya@gmail.com', 'Trainee Engineer', 9751136721, 1, '2018-06-28'),
(6, 'Rajat Gedam', 'adityagedam@syscloud.com', 'Trainee Engineer', 7904126213, 1, '2018-06-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`assetId`),
  ADD UNIQUE KEY `TagId` (`TagId`),
  ADD UNIQUE KEY `serial_no` (`serial_no`),
  ADD KEY `sub_Id` (`sub_Id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `con_id` (`con_id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `loc_id` (`loc_id`);

--
-- Indexes for table `asset_condition`
--
ALTER TABLE `asset_condition`
  ADD PRIMARY KEY (`con_id`),
  ADD UNIQUE KEY `Condition` (`Conditions`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_Id`);

--
-- Indexes for table `dept_teams`
--
ALTER TABLE `dept_teams`
  ADD PRIMARY KEY (`dept_Id`),
  ADD KEY `loc_id` (`loc_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`),
  ADD UNIQUE KEY `Location_name` (`Location_name`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_Id`),
  ADD KEY `category_Id` (`category_Id`),
  ADD KEY `manu_id` (`manu_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `dept_Id` (`dept_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `assetId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dept_teams`
--
ALTER TABLE `dept_teams`
  MODIFY `dept_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset`
--
ALTER TABLE `asset`
  ADD CONSTRAINT `asset_ibfk_1` FOREIGN KEY (`sub_Id`) REFERENCES `sub_category` (`sub_Id`),
  ADD CONSTRAINT `asset_ibfk_2` FOREIGN KEY (`sup_id`) REFERENCES `suppliers` (`sup_id`),
  ADD CONSTRAINT `asset_ibfk_3` FOREIGN KEY (`con_id`) REFERENCES `asset_condition` (`con_id`),
  ADD CONSTRAINT `asset_ibfk_4` FOREIGN KEY (`Id`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `asset_ibfk_5` FOREIGN KEY (`loc_id`) REFERENCES `locations` (`loc_id`);

--
-- Constraints for table `dept_teams`
--
ALTER TABLE `dept_teams`
  ADD CONSTRAINT `dept_teams_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `locations` (`loc_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_Id`) REFERENCES `category` (`category_Id`),
  ADD CONSTRAINT `sub_category_ibfk_2` FOREIGN KEY (`manu_id`) REFERENCES `manufactures` (`manu_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`dept_Id`) REFERENCES `dept_teams` (`dept_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
