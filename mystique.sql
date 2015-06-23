-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2015 at 12:51 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mystique`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `nick` varchar(30) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `skip` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`nick`, `level`, `score`, `skip`, `time`) VALUES
('adm_nightstalker', 5, 546, 0, '2015-03-15 13:04:16'),
('adm_nims', 1, 0, 0, '2015-03-15 11:12:53'),
('Batman', 1, 335, 1, '2015-03-15 09:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `nick` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`nick`, `level`, `answer`, `time`) VALUES
('Batman', 26, 'nawazuddinsiddiqui', '2015-03-14 20:34:42'),
('Batman', 25, 'imp', '2015-03-14 20:35:59'),
('adm_nightstalker', 1, 'mystique', '2015-03-14 21:56:55'),
('adm_nightstalker', 2, 'fairelabise', '2015-03-14 21:57:08'),
('adm_nightstalker', 3, 'nelsonmandela', '2015-03-14 21:57:15'),
('adm_nightstalker', 4, 'seanbean', '2015-03-14 21:57:19'),
('adm_nightstalker', 5, 'hitopadesha', '2015-03-14 21:57:25'),
('adm_nightstalker', 6, 'ellysealexandraperry', '2015-03-14 22:07:03'),
('adm_nightstalker', 6, '', '2015-03-14 22:17:48'),
('adm_nightstalker', 6, '', '2015-03-14 22:17:51'),
('adm_nightstalker', 6, '', '2015-03-14 22:17:52'),
('adm_nightstalker', 6, '', '2015-03-14 22:17:52'),
('adm_nightstalker', 6, '', '2015-03-14 22:17:52'),
('adm_nightstalker', 6, '', '2015-03-14 22:17:52'),
('Batman', 0, 'mystique', '2015-03-15 07:23:23'),
('Batman', 1, 'fairelabaise', '2015-03-15 07:23:41'),
('Batman', 2, 'fairelabise', '2015-03-15 07:23:50'),
('Batman', 1, 'sry', '2015-03-15 09:11:08'),
('Batman', 1, 'tdudrtu', '2015-03-15 09:11:12'),
('Batman', 1, 'sryu', '2015-03-15 09:11:35'),
('Batman', 1, 'sery', '2015-03-15 09:11:39'),
('adm_nightstalker', 1, 'mystique', '2015-03-15 09:53:13'),
('adm_nightstalker', 0, 'mystique', '2015-03-15 10:00:21'),
('adm_nightstalker', 2, 'fairelabise', '2015-03-15 10:00:34'),
('adm_nightstalker', 3, 'nelsonmandela', '2015-03-15 10:00:40'),
('adm_nightstalker', 4, 'seanbean', '2015-03-15 10:00:49'),
('adm_nightstalker', 5, 'hitopadesha', '2015-03-15 10:00:59'),
('adm_nightstalker', 6, 'ellysealexandraperry', '2015-03-15 10:01:16'),
('adm_nightstalker', 7, 'retcon', '2015-03-15 10:01:38'),
('adm_nightstalker', 8, 'lalbahadurshastri', '2015-03-15 10:02:35'),
('adm_nightstalker', 8, 'opium', '2015-03-15 10:02:42'),
('adm_nightstalker', 10, 'cripwalk', '2015-03-15 10:02:46'),
('adm_nightstalker', 10, 'krypton', '2015-03-15 10:02:54'),
('adm_nightstalker', 12, 'julesverne', '2015-03-15 10:03:07'),
('adm_nightstalker', 13, 'alanturing', '2015-03-15 10:03:13'),
('adm_nightstalker', 13, 'marcboderick', '2015-03-15 10:03:32'),
('adm_nightstalker', 13, 'marcbodrick', '2015-03-15 10:03:48'),
('adm_nightstalker', 13, 'marcbodrick', '2015-03-15 10:03:56'),
('adm_nightstalker', 14, 'marcbodnick', '2015-03-15 10:04:13'),
('adm_nightstalker', 15, 'anagram', '2015-03-15 10:05:04'),
('adm_nightstalker', 15, 'thomasthetankengine', '2015-03-15 10:05:13'),
('adm_nightstalker', 16, 'google', '2015-03-15 10:05:17'),
('adm_nightstalker', 17, 'backrub', '2015-03-15 10:05:21'),
('adm_nightstalker', 17, 'splhcb', '2015-03-15 10:05:34'),
('adm_nightstalker', 18, 'thewealthofnations', '2015-03-15 10:05:42'),
('adm_nightstalker', 19, 'escopetara', '2015-03-15 10:05:51'),
('adm_nightstalker', 20, 'escopetarra', '2015-03-15 10:06:04'),
('adm_nightstalker', 20, 'prembiharinarainraizada', '2015-03-15 10:06:23'),
('adm_nightstalker', 21, 'prembeharinarainraizada', '2015-03-15 10:06:47'),
('adm_nightstalker', 21, 'issacnewton', '2015-03-15 10:06:52'),
('adm_nightstalker', 22, 'isaacnewton', '2015-03-15 10:07:09'),
('adm_nightstalker', 23, 'mtgox', '2015-03-15 10:07:14'),
('adm_nightstalker', 24, 'thedivertinghistoryofjohngilpin', '2015-03-15 10:07:28'),
('adm_nightstalker', 24, 'imp', '2015-03-15 10:07:34'),
('adm_nightstalker', 25, 'nawazuddinsiddiqui', '2015-03-15 10:07:43'),
('adm_nightstalker', 27, 'wolfgangamadeusmozart', '2015-03-15 10:07:59'),
('adm_nightstalker', 27, 'avoirdupois', '2015-03-15 10:08:07'),
('adm_nightstalker', 29, 'venice', '2015-03-15 10:10:56'),
('adm_nightstalker', 29, 'killbillvolume1', '2015-03-15 10:11:03'),
('adm_nightstalker', 29, 'venice', '2015-03-15 10:57:17'),
('adm_nightstalker', 30, 'killbillvolume1', '2015-03-15 10:57:27'),
('adm_nims', 0, 'bakchod', '2015-03-15 11:12:35'),
('adm_nims', 0, 'Hell yea', '2015-03-15 11:12:40'),
('adm_nims', 1, 'mystique', '2015-03-15 11:12:53'),
('adm_nims', 1, 'rqr', '2015-03-15 11:13:44'),
('adm_nightstalker', 30, 'killbillvolume1', '2015-03-15 12:33:04'),
('adm_nightstalker', 1, 'mystique', '2015-03-15 12:35:15'),
('adm_nightstalker', 2, 'fairelabise', '2015-03-15 12:36:53'),
('adm_nightstalker', 3, 'nelsonmandela', '2015-03-15 12:37:13'),
('adm_nightstalker', 4, 'seanbean', '2015-03-15 12:38:07'),
('adm_nightstalker', 4, 'blah', '2015-03-15 12:38:30'),
('adm_nightstalker', 4, 'you', '2015-03-15 12:38:35'),
('adm_nightstalker', 4, 'cunt', '2015-03-15 12:38:37'),
('adm_nightstalker', 4, 'gangulycunt', '2015-03-15 12:38:43'),
('adm_nightstalker', 4, 'sdf', '2015-03-15 12:59:55'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 12:59:57'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:00:07'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:10'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:11'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:00:12'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:14'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:15'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:16'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:16'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:17'),
('adm_nightstalker', 4, 'as', '2015-03-15 13:00:18'),
('adm_nightstalker', 4, 'as', '2015-03-15 13:00:19'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:20'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:21'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:22'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:24'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:25'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:26'),
('adm_nightstalker', 4, 'asd', '2015-03-15 13:00:26'),
('adm_nightstalker', 4, 'dfsg', '2015-03-15 13:02:35'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:02:59'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:01'),
('adm_nightstalker', 4, 'sdf', '2015-03-15 13:03:41'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:44'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:45'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:46'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:47'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:48'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:49'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:51'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:52'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:53'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:54'),
('adm_nightstalker', 4, 'asdf', '2015-03-15 13:03:55'),
('adm_nightstalker', 4, 'sdfg', '2015-03-15 13:04:05'),
('adm_nightstalker', 5, 'hitopadesha', '2015-03-15 13:04:16'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:04:19'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:35'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:40'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:41'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:42'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:43'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:44'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:45'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:46'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:47'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:47'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:48'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:49'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:49'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:50'),
('adm_nightstalker', 5, 'asdf', '2015-03-15 13:07:50'),
('adm_nightstalker', 5, 'ellysealexandriaperry', '2015-03-15 13:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `level` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'null.jpg',
  `answer` varchar(100) NOT NULL,
  `hint` varchar(100) NOT NULL,
  `hint_type` int(11) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`level`, `title`, `image`, `answer`, `hint`, `hint_type`) VALUES
(0, '', 'lvl0.png', 'mystique', '', 0),
(1, '', 'lvl1.jpg', 'fairelabise', 'buccae', 1),
(2, 'Greatness', 'lvl2.jpg', 'nelsonmandela', '', 1),
(3, 'S', 'lvl3.jpg', 'seanbean', 'valar morghulis', 1),
(4, 'H', 'lvl4.png', 'hitopadesha', 'prince', 1),
(5, 'E', 'lvl5.png', 'ellysealexandraperry', '"+(111101)"', 1),
(6, 'R', 'lvl6.png', 'retcon', 'convenience', 1),
(7, 'L', 'vijay.png', 'lalbahadurshastri', '232101', 1),
(8, 'O', 'lvl8.png', 'opium', '', 0),
(9, 'C', 'lvl9.png', 'cripwalk', 'LA gang', 1),
(10, 'K', 'lvl10.png', 'krypton', '', 0),
(11, '', 'book.png', 'julesverne', 'Favet Neptunus eunti', 1),
(12, '', 'cryptography.png', 'alanturing', '', 0),
(13, '', 'lvl13.png', 'marcbodnick', 'Community & Business Team Leader', 2),
(14, '', 'lvl14.png', 'anagram', '1C8cslt', 1),
(15, '', 'lvl15.png', 'thomasthetankengine', 'LBSC', 1),
(16, '', 'lvl16.png', 'backrub', 'origins', 1),
(17, 'Babaji ki Booti', 'lvl17.png', 'splhcb', '', 0),
(18, 'Father', 'lvl18.png', 'thewealthofnations', 'MDCCLXXVI', 1),
(19, '', 'lvl19.png', 'escopetarra', 'Make music not violence', 1),
(20, '', 'hiddeninplainsight.png', 'prembeharinarainraizada', '', 0),
(21, '', 'lvl21.png', 'isaacnewton', 'malus', 1),
(22, '', 'lvl22.jpg', 'mtgox', '650000', 1),
(23, '', 'trip.png', 'thedivertinghistoryofjohngilpin', '', 0),
(24, '', 'lvl24.png', 'imp', 'Astas ''M''athchomaroon'' okeosaan naqisa anni', 1),
(25, 'Rise and Rise', 'caesar.png', 'nawazuddinsiddiqui', 'MbnPjh-RASI', 1),
(26, '', 'lvl26.png', 'wolfgangamadeusmozart', 'porta', 1),
(27, '', 'lvl27.png', 'avoirdupois', '', 0),
(28, 'Look closely', 'null.jpg', 'venice', 'http://i.imgur.com/Z952wYl.png', 2),
(29, '', 'bride.png', 'killbillvolume1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `college` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `password`, `nick`, `email`, `college`) VALUES
(7, 'Batman', '$2y$10$THi9eaXLiqfi6X0P9WbhEOIMb2.atyumkRSc0Glbk.QaStx13Xasa', 'Batman', 'batman@batcave.org', 'Batcave Institute'),
(8, 'adm_nightstalker', '$2y$10$zxY9xqrL4EsvEX75NBlS7uJwUN3PntwELklNVIb6fcctKh5Jvbj42', 'adm_nightstalker', 'kanishkaganguly2002@gmail.com', 'BIT Mesra'),
(9, 'Nimesh Ghelani', '$2y$10$eVvHP396kSporRWVknjLB.UK.UPaXF4nKmEAAttgblnb3LxV1L3zW', 'adm_nims', 'nimeshghelani@gmail.com', 'BIT Mesra');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
