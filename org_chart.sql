-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2019 at 03:39 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `org_chart`
--

-- --------------------------------------------------------

--
-- Table structure for table `ym_positions`
--

DROP TABLE IF EXISTS `ym_positions`;
CREATE TABLE IF NOT EXISTS `ym_positions` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id of position and primary key ',
  `title` varchar(255) NOT NULL,
  `parent_id` int(5) NOT NULL DEFAULT '0',
  `status` int(5) NOT NULL DEFAULT '1' COMMENT '0: Inactive, 1:Active, 2: Deleted',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ym_positions`
--

INSERT INTO `ym_positions` (`user_id`, `title`, `parent_id`, `status`) VALUES
(170, 'General Manager', 0, 1),
(228, 'Cutting', 170, 1),
(233, 'Store', 170, 1),
(234, 'SCC', 228, 1),
(236, 'Fabric Store', 233, 1),
(237, 'Supervisor', 228, 1),
(238, 'telecom', 233, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ym_user_profiles`
--

DROP TABLE IF EXISTS `ym_user_profiles`;
CREATE TABLE IF NOT EXISTS `ym_user_profiles` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `en_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `kh_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ch_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_url` varchar(255) NOT NULL DEFAULT 'image.jpg',
  `status` int(5) NOT NULL DEFAULT '1' COMMENT '0: Inactive, 1:Active, 2: Deleted',
  `parent_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ym_user_profiles`
--

INSERT INTO `ym_user_profiles` (`id`, `en_name`, `kh_name`, `ch_name`, `img_url`, `status`, `parent_id`) VALUES
(170, 'Sunny', 'ážŸáž¶áž“áž¸', 'å± å¤•', 'images (3).jfif', 1, 1),
(228, 'Zhen Bin', 'ážŠáž¶ážšáž¶', 'æ—­æœ¨', 'images (1).jfif', 1, 1),
(233, 'Lan Zhi Ming', 'áž¡áž¶áž“â€‹â€‹ áž‹áž áž·â€‹ áž˜áž·áž„', 'å¸•å¼“ã€Žæˆˆ', 'images.jfif', 1, 1),
(234, 'Bai Ping', 'áž”áž·áž¶â€‹â€‹ áž•áž·áž„', 'è„‚å‹ºåœŸ', 'download (2).jfif', 1, 1),
(236, '', '', '', '', 1, 1),
(237, 'Wofi', 'ážœáŸ„ážáž·', 'å›šç¼', 'images (3).jfif', 1, 1),
(238, '', '', '', '', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
