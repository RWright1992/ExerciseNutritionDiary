-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2015 at 01:38 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nutritiondiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_email`, `password`) VALUES
(1, 'ryanrite@live.co.uk', 'RyanWright'),
(5, 'admin@dmin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `drinkentry`
--

CREATE TABLE IF NOT EXISTS `drinkentry` (
`drink_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `drink` text NOT NULL,
  `d_calories` int(100) NOT NULL,
  `d_fat` int(100) NOT NULL,
  `d_fatsat` int(100) NOT NULL,
  `d_carb` int(100) NOT NULL,
  `d_carbsug` int(100) NOT NULL,
  `d_protien` int(100) NOT NULL,
  `d_salt` int(100) NOT NULL,
  `entry_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinkentry`
--

INSERT INTO `drinkentry` (`drink_id`, `user_id`, `drink`, `d_calories`, `d_fat`, `d_fatsat`, `d_carb`, `d_carbsug`, `d_protien`, `d_salt`, `entry_time`) VALUES
(3, 6, 'Coca Cola - 1 can 12 fl oz', 150, 0, 0, 35, 33, 0, 0, '2015-07-09 21:05:04.554883'),
(4, 1, 'BUDWEISER - 1 fl oz', 10, 0, 0, 0, 0, 0, 0, '2015-07-09 21:44:53.993923'),
(5, 1, 'Beer - Becks', 200, 0, 0, 15, 0, 0, 0, '2015-07-10 19:39:54.851885'),
(6, 7, 'Instant Milk Tea, Cardamom Tea', 60, 1, 0, 11, 0, 2, 0, '2015-07-11 22:51:46.984308');

-- --------------------------------------------------------

--
-- Table structure for table `excerciseentry`
--

CREATE TABLE IF NOT EXISTS `excerciseentry` (
  `user_id` int(10) NOT NULL,
`ex_id` int(10) NOT NULL,
  `ex_type` varchar(10) NOT NULL,
  `ex_name` text NOT NULL,
  `ex_duration` varchar(10) NOT NULL,
  `ex_intensity` varchar(10) NOT NULL,
  `ex_notes` text NOT NULL,
  `entry_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excerciseentry`
--

INSERT INTO `excerciseentry` (`user_id`, `ex_id`, `ex_type`, `ex_name`, `ex_duration`, `ex_intensity`, `ex_notes`, `entry_time`) VALUES
(1, 1, 'endurance', 'Robbery', '15dur', 'vigorousin', '', '2015-07-10 12:41:35.187820'),
(1, 2, 'endurance', 'Running', '15dur', 'lightinten', '', '2015-07-10 12:51:50.550017'),
(6, 4, 'flexibilit', 'Hodor', '15dur', 'lightinten', '', '2015-07-10 13:36:26.660081'),
(1, 5, 'endurance', 'Running', '60dur', 'vigorousin', '', '2015-07-21 17:12:54.392964'),
(1, 6, 'endurance', 'Cycling', '75dur', 'vigorousin', '', '2015-07-25 17:17:39.930091'),
(1, 7, 'endurance', 'Running', '15dur', 'lightinten', 'Ran 1000 Miles', '2015-07-25 17:19:24.683083');

-- --------------------------------------------------------

--
-- Table structure for table `foodentry`
--

CREATE TABLE IF NOT EXISTS `foodentry` (
  `user_id` int(10) NOT NULL,
`food_id` int(10) NOT NULL,
  `food` text NOT NULL,
  `f_calories` int(100) NOT NULL,
  `f_fat` int(100) NOT NULL,
  `f_fatsat` int(100) NOT NULL,
  `f_carb` int(100) NOT NULL,
  `f_carbsug` int(100) NOT NULL,
  `f_protien` int(100) NOT NULL,
  `f_salt` int(100) NOT NULL,
  `entry_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodentry`
--

INSERT INTO `foodentry` (`user_id`, `food_id`, `food`, `f_calories`, `f_fat`, `f_fatsat`, `f_carb`, `f_carbsug`, `f_protien`, `f_salt`, `entry_time`) VALUES
(1, 1, 'Big Mac', 500, 27, 10, 47, 9, 24, 1, '2015-07-09 22:11:34.672476'),
(7, 2, 'Jaffa Cakes McVitie''s x 3', 140, 3, 2, 26, 19, 2, 90, '2015-07-11 22:53:53.400539');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `full_name`, `password`, `user_email`) VALUES
(1, 'RyanW', 'Ryan Wright', 'RyanWright', 'ryanrite@live.co.uk'),
(5, 'ReeceS', 'Reece Sharkey', 'forza', 'reece@reece.com'),
(6, 'msharkey', 'Mark Sharkey', 'forza', 'msharkey@hotmail.com'),
(7, 'ham', 'Ham McHam', 'acupoftea', 'ham@live.com'),
(8, 'Bear', 'Christopher Lamont', 'bear', 'bear@bear.bear');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `drinkentry`
--
ALTER TABLE `drinkentry`
 ADD PRIMARY KEY (`drink_id`);

--
-- Indexes for table `excerciseentry`
--
ALTER TABLE `excerciseentry`
 ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `foodentry`
--
ALTER TABLE `foodentry`
 ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `drinkentry`
--
ALTER TABLE `drinkentry`
MODIFY `drink_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `excerciseentry`
--
ALTER TABLE `excerciseentry`
MODIFY `ex_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `foodentry`
--
ALTER TABLE `foodentry`
MODIFY `food_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
