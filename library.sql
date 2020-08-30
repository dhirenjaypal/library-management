-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2020 at 05:17 PM
-- Server version: 10.5.5-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `opeaningDate` date DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `members_id` int(11) NOT NULL,
  `plans_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `isbn` varchar(16) DEFAULT NULL,
  `authorName` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `publisher` varchar(45) DEFAULT NULL,
  `bookType` enum('TEXTBOOK','MAGAZINE') DEFAULT NULL,
  `publishedYear` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `edition` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `isbn`, `authorName`, `price`, `pages`, `publisher`, `bookType`, `publishedYear`, `qty`, `edition`) VALUES
(1, 'java', '1234', 'mayur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'java', '1234', 'mayur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'java', '1234', 'mayur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'java', '1234', 'mayur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'java', '1234', 'mayur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'java', '1234', 'mayur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'java', '1234', 'mayur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'java', '1234', 'mayur', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `dateOfIssue` date DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `accounts_id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `emailAddress` varchar(100) DEFAULT NULL,
  `isActive` enum('YES','NO') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `address`, `phone`, `emailAddress`, `isActive`) VALUES
(1, 'Dhiren', 'Anjar (kutch)', '9999999999', 'dhirennjaypal@gmail.com', 'YES'),
(3, 'Rohan', 'Kukma, Bhuj (kutch)', '8888888888', 'rohanpc@gmail.comm', 'NO'),
(7, 'Nitish', 'Ghandhidham (kutch)', '123456654', 'palnitsh@ymail.com', 'YES'),
(9, 'Harsh', 'Mekhatimbi, Rajkot', '9988776655', 'lakkadharshbr@msn.com', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `daysCount` int(11) DEFAULT NULL,
  `maxBooks` int(2) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `maxIssueDuration` int(3) DEFAULT NULL,
  `penalty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `daysCount`, `maxBooks`, `amount`, `maxIssueDuration`, `penalty`) VALUES
(7, '15 Days 100 Rs', 15, 2, 100, 15, 50),
(10, '30 Days 300 Rs', 30, 4, 300, 15, 30),
(11, '60 Days 600 Rs', 60, 12, 600, 30, 10),
(12, 'termux test1 update2', 3, 6, 9, 7, 10),
(16, 'new test2', 5, 4, 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(11) NOT NULL,
  `dateOfReturn` date DEFAULT NULL,
  `penaltyAmount` int(11) DEFAULT 0,
  `isDamaged` enum('YES','NO') DEFAULT 'NO',
  `issues_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `writeOff`
--

CREATE TABLE `writeOff` (
  `id` int(11) NOT NULL,
  `dateOf` date DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `books_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`,`members_id`,`plans_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`,`accounts_id`,`books_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`,`issues_id`);

--
-- Indexes for table `writeOff`
--
ALTER TABLE `writeOff`
  ADD PRIMARY KEY (`id`,`books_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `writeOff`
--
ALTER TABLE `writeOff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
