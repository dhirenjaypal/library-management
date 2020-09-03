-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2020 at 02:21 PM
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
  `openingDate` date DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `members_id` int(11) NOT NULL,
  `plans_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `openingDate`, `status`, `members_id`, `plans_id`) VALUES
(9, '2020-08-31', 'INACTIVE', 7, 22),
(8, '2020-08-31', 'ACTIVE', 14, 21),
(4, '2020-08-31', 'ACTIVE', 3, 10),
(7, '2020-08-31', 'ACTIVE', 1, 10),
(10, '2020-08-31', 'INACTIVE', 9, 7),
(11, '2020-08-31', 'ACTIVE', 15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `isbn` bigint(16) DEFAULT NULL,
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
(18, 'Dynamic Web Page Development', 64686464887, 'Prof. Mayur Taunk', 100, 150, '20', 'TEXTBOOK', 2018, 20, '2nd'),
(17, 'Weekly Jump', 64659896764, 'Dhiren Jaypal', 99, 300, 'Jaypal Publication', 'MAGAZINE', 2020, 20, '989th'),
(15, 'Learning Web Design', 1491960205, 'Jennifer Niederst Robbins', 500, 808, 'O\'Reilly Media', 'TEXTBOOK', 2018, 4, '5th Edition');

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

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `dateOfIssue`, `status`, `accounts_id`, `books_id`) VALUES
(1, '2020-09-03', 'ACTIVE', 4, 18),
(3, '2020-08-01', 'ACTIVE', 11, 17),
(6, '2020-08-10', 'INACTIVE', 9, 17),
(7, '2020-09-03', 'INACTIVE', 8, 15),
(8, '2020-08-13', 'ACTIVE', 10, 18);

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
(3, 'Rohan', 'Kukma, Bhuj (kutch)', '8888888888', 'rohanpc@gmail.comm', 'YES'),
(7, 'Nitish', 'Ghandhidham (kutch)', '123456654', 'palnitsh@ymail.com', 'YES'),
(14, 'Rajesh', 'Gada, Bhuj (kutch)', '9988661122', 'rajeshm@yaaho.com', 'YES'),
(9, 'Harsh', 'Mekhatimbi, Rajkot', '9988776655', 'lakkadharshbr@msn.com', 'NO'),
(15, 'Smit', 'Bhuj (kutch)', '9123456789', 'smitanam@gmail.com', 'YES');

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
(20, '1 month 300 Rs', 31, 8, 300, 15, 20),
(21, '28 days 200 Rs', 28, 2, 200, 5, 50),
(22, '80 days 700 Rs', 80, 12, 700, 20, 10);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
