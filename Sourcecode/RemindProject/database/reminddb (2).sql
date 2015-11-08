-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2015 at 11:20 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reminddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `MessageId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `toUserId` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `ClassId` int(11) NOT NULL,
  `TeacherId` varchar(50) NOT NULL,
  `Code` text NOT NULL,
  `allowChat` tinyint(1) NOT NULL,
  `messageChildren` tinyint(1) NOT NULL,
  `GradeLevel` varchar(50) NOT NULL,
  `ClassName` text NOT NULL,
  `ClassImage` text NOT NULL,
  `allowFind` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `TeacherId`, `Code`, `allowChat`, `messageChildren`, `GradeLevel`, `ClassName`, `ClassImage`, `allowFind`) VALUES
(1, 'aab', 'sci', 1, 1, '1', '0', '', 0),
(2, 'aab', 'Math2dada', 1, 1, '1', 'Mathehdsds', '', 0),
(3, 'aab', '123', 1, 1, '1', 'Mathdsa123', '', 0),
(4, 'aab', 'sciences', 1, 1, '6', 'science', 'classes/images/default.png', 0),
(5, 'aab', 'math', 1, 1, '1', 'Math', 'classes/images/default.png', 0),
(6, 'aab', 'adsad', 1, 1, 'Preschool', 'class', 'classes/images/default.png', 0),
(7, 'aab', 'haha', 1, 1, 'Preschool', 'haha', 'classes/images/default.png', 0),
(8, 'aab', 'artistadsa', 1, 1, '1', 'artist', 'classes/images/default.png', 0),
(9, 'aab', 'dsds', 1, 1, '1', 'lalalads', 'classes/images/default.png', 0),
(10, 'aab', 'tesst', 1, 1, 'Kindergarten', 'tesst', 'classes/images/default.png', 0),
(11, 'aab', 'dlsakdsa', 1, 0, 'Preschool', 'dlsakdsa', 'classes/images/default.png', 0),
(12, 'aab', 'lalaladsa', 1, 0, 'Preschool', 'lalaladsa', 'classes/images/default.png', 0),
(13, 'aab', 'troll', 1, 1, 'Preschool', 'troll', 'classes/images/default.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `Code` varchar(10) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `ChatboxId` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
  `Date` date NOT NULL,
  `ClassId` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `PartnerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `TitleId` int(11) NOT NULL,
  `TitleName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`TitleId`, `TitleName`) VALUES
(1, 'Mr.'),
(2, 'Mrs.'),
(3, 'Ms.'),
(4, 'Miss.'),
(5, 'Dr.'),
(6, 'Coach'),
(7, 'Prof.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `CountryCode` varchar(10) NOT NULL,
  `isConfirmation` tinyint(1) NOT NULL,
  `RegistationDate` date NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Role` int(11) NOT NULL,
  `BirthDate` date NOT NULL,
  `isReceiveMessage` tinyint(1) NOT NULL,
  `Title` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Email`, `Password`, `CountryCode`, `isConfirmation`, `RegistationDate`, `FirstName`, `LastName`, `Role`, `BirthDate`, `isReceiveMessage`, `Title`) VALUES
(1, 'tester@gmail.com', 'test', 'VN', 0, '2015-11-02', 'Luan', 'Huynh', 1, '0000-00-00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thai', 'thai@thai.com', '$2y$10$pJA0FFQm0G8KqPFWOnLjau2Uow6D1vslQ8hXRis09Zao65GvjGKta', '36xDQptxu868OAEX1susdaMF0QhAKLhYB302dLZbjV3o6hbXXHMEPBZZfdB4', '2015-10-16 07:17:26', '2015-10-16 11:40:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`TitleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
