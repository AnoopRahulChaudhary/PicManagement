-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2018 at 07:42 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1124944_pic_management`
--
CREATE DATABASE IF NOT EXISTS `id1124944_pic_management` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id1124944_pic_management`;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locality` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`name`, `mobile`, `pass`, `locality`) VALUES
('anoop', '1234567890', '0000', 'locality'),
('anoop', '8601063024', '0000', 'locality');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_number` int(11) NOT NULL,
  `category_name` text,
  `emailid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_number`, `category_name`, `emailid`) VALUES
(6, 'nature', 'anooprahulchaudhary@gmail.com'),
(7, 'forest', 'anooprahulchaudhary@gmail.com'),
(8, 'river', 'anooprahulchaudhary@gmail.com'),
(9, 'scenery', 'anooprahulchaudhary@gmail.com'),
(10, 'Flower', 'anooprahulchaudhary@gmail.com'),
(11, 'Sunset', 'anooprahulchaudhary@gmail.com'),
(12, 'Baby', 'mohdaneesmca@gmail.com'),
(13, 'Sunrise', 'anooprahulchaudhary@gmail.com'),
(14, 'Holi ', 'anooprahulchaudhary@gmail.com'),
(15, 'Cars', 'anoo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `foodAvailableInformation`
--

CREATE TABLE `foodAvailableInformation` (
  `mobile` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locality` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amountOfFood` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeOfFood` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `foodAvailableInformation`
--

INSERT INTO `foodAvailableInformation` (`mobile`, `locality`, `amountOfFood`, `typeOfFood`) VALUES
('1234567890', 'durgapur', 'asdf', 'junk food'),
('1234567890', 'durgapur', 'asfg', 'jgjl'),
('1234567890', 'durgapur', 'dfk', 'sfhj'),
('1234567890', 'durgapur', 'bread,pulse,vegetable', 'veg'),
('1234567890', 'durgapur', 'gsgs', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`name`, `mobile`, `pass`) VALUES
('anoop', '1234567890', '0000'),
('anoop', '8601063024', '0000'),
('nitesh', '9122046144', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE `pic` (
  `picpath` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `useremail` varchar(100) DEFAULT NULL,
  `picid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`picpath`, `type`, `useremail`, `picid`) VALUES
('images/star.png', 'nature', 'anooprahulchaudhary@gmail.com', 6),
('images/DSC_0018.JPG', 'forest', 'anooprahulchaudhary@gmail.com', 7),
('images/20170121_091455-1.jpg', 'Flower', 'anooprahulchaudhary@gmail.com', 8),
('images/vikash nit dgp 20170212_092457.jpg', 'Flower', 'anooprahulchaudhary@gmail.com', 9),
('images/IMG-20170121-WA0008.jpg', 'Flower', 'anooprahulchaudhary@gmail.com', 10),
('images/20170121_090816-1-1.jpg', 'Flower', 'anooprahulchaudhary@gmail.com', 11),
('images/IMG-20170121-WA0007.jpg', 'Flower', 'anooprahulchaudhary@gmail.com', 12),
('images/IMG-20160713-WA0002.jpg', 'nature', 'anooprahulchaudhary@gmail.com', 13),
('images/20170308_164314.jpg', 'nature', 'anooprahulchaudhary@gmail.com', 14),
('images/IMG_20170308_172420565.jpg', 'Baby', 'mohdaneesmca@gmail.com', 15),
('images/DSC_0164.JPG', 'Holi', 'anooprahulchaudhary@gmail.com', 16),
('images/DSC_0103.JPG', 'Flower', 'anoo@gmail.com', 17),
('images/CSC_0046.JPG', 'Flower', 'anoo@gmail.com', 18),
('images/DSC_0714.JPG', 'Flower', 'anoo@gmail.com', 19),
('images/DSC_0818.JPG', 'Flower', 'anoo@gmail.com', 20),
('images/DSC_0102.JPG', 'Flower', 'anoo@gmail.com', 21),
('images/IMG-20170528-WA0000.jpg', 'Flower', 'k.deepti76@gmail.com', 22);

-- --------------------------------------------------------

--
-- Table structure for table `picuser`
--

CREATE TABLE `picuser` (
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `userpassword` varchar(10) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picuser`
--

INSERT INTO `picuser` (`email`, `username`, `userpassword`, `gender`) VALUES
('a@gmail.com', 'Anoop Chaudhary ', '1234', 'M'),
('Anees@gmail.com', 'mohd anees', '00000', 'M'),
('anoo@gmail.com', 'anoop as', '0000', 'M'),
('anooprahulchaudhary@gmail.com', 'Anoop Chaudhary', '0000', 'M'),
('deepti76@gmail.com', 'Deepti Kamal', '234567890', 'M'),
('gelobmith@gmail.com', 'Sandeep Kumar', '123456789', 'M'),
('k.deepti76@gmail.com', 'Deepti Kamal', '123456789', 'M'),
('mohdaneesmca@gmail.com', 'Mohd Aness', '0000', 'M'),
('sanjeevsharma315@gmail.com', 'Sanjeev Sharma', '0000', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`mobile`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_number`),
  ADD KEY `emailid` (`emailid`);

--
-- Indexes for table `foodAvailableInformation`
--
ALTER TABLE `foodAvailableInformation`
  ADD KEY `mobile` (`mobile`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`mobile`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`picid`),
  ADD KEY `useremail` (`useremail`);

--
-- Indexes for table `picuser`
--
ALTER TABLE `picuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pic`
--
ALTER TABLE `pic`
  MODIFY `picid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`emailid`) REFERENCES `picuser` (`email`);

--
-- Constraints for table `foodAvailableInformation`
--
ALTER TABLE `foodAvailableInformation`
  ADD CONSTRAINT `foodAvailableInformation_ibfk_1` FOREIGN KEY (`mobile`) REFERENCES `guest` (`mobile`);

--
-- Constraints for table `pic`
--
ALTER TABLE `pic`
  ADD CONSTRAINT `pic_ibfk_1` FOREIGN KEY (`useremail`) REFERENCES `picuser` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
