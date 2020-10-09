-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2020 at 09:07 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bladocou_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `achivnments`
--

DROP TABLE IF EXISTS `achivnments`;
CREATE TABLE IF NOT EXISTS `achivnments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `submitted_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achivnments`
--

INSERT INTO `achivnments` (`id`, `sub_id`, `teacher_id`, `Student_id`, `homework_id`, `grade`, `img`, `submitted_date`) VALUES
(1, 2, 26, 27, 19, 'Nice', '', '2020-07-21 18:30:56'),
(2, 2, 26, 27, 19, 'good', '', '2020-07-22 12:48:31'),
(3, 3, 51, 45, 29, 'A', '1596099501.jpeg', '2020-07-30 08:58:21'),
(5, 3, 51, 45, 29, 'A', '1596099501.jpeg', '2020-07-30 08:58:21'),
(6, 3, 51, 45, 29, 'A', '1596099501.jpeg', '2020-07-30 08:58:21'),
(7, 3, 51, 45, 29, 'A', '1596099501.jpeg', '2020-07-30 08:58:21'),
(8, 3, 51, 45, 29, 'A', '1596099501.jpeg', '2020-07-30 08:58:21'),
(9, 3, 51, 45, 29, 'A', '1596099501.jpeg', '2020-07-30 08:58:21'),
(12, 13, 117, 118, 37, 'B', '1596099501.jpeg', '2020-10-08 11:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `donates`
--

DROP TABLE IF EXISTS `donates`;
CREATE TABLE IF NOT EXISTS `donates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_configurations`
--

DROP TABLE IF EXISTS `email_configurations`;
CREATE TABLE IF NOT EXISTS `email_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailFrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailFromName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_configurations`
--

INSERT INTO `email_configurations` (`id`, `host`, `port`, `username`, `password`, `emailFrom`, `emailFromName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'smtp.gmail.com', '587', 'alimughal5566@gmail.com', 'hrfdxsyzvjgtigsb', 'alimughal5566@gmail.com', 'admin', 1, '2020-09-28 04:02:31', '2020-09-28 05:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experiences_teacher_id_foreign` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `teacher_id`, `year`, `location`, `title`, `created_at`, `updated_at`) VALUES
(3, 51, '2020-07-15', NULL, 'Goverment Teacher', NULL, NULL),
(4, 51, '2020-07-03', NULL, 'Goverment Teacher  Goverment Teacher Goverment Teacher Goverment Teacher Goverment Teacher Goverment Teacher', NULL, NULL),
(5, 57, NULL, NULL, 'asdasdasd', NULL, NULL),
(6, 57, NULL, NULL, 'hii1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `for_parents`
--

DROP TABLE IF EXISTS `for_parents`;
CREATE TABLE IF NOT EXISTS `for_parents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `for_parents`
--

INSERT INTO `for_parents` (`id`, `title`, `discription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'FOR PARENTS', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50'),
(2, 'INSPIRATIONAL TEACHERS', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50'),
(3, 'LEARN AT HOME', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50'),
(4, 'Track Attainment', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50'),
(5, 'Homework Assignment', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50'),
(6, '1 : 1 Tutoring', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50'),
(7, 'REGISTER', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `for_students`
--

DROP TABLE IF EXISTS `for_students`;
CREATE TABLE IF NOT EXISTS `for_students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `for_students`
--

INSERT INTO `for_students` (`id`, `title`, `discription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'For Students', 'students', 'pic.png', '2020-07-16 08:14:50', '2020-10-02 00:38:20'),
(2, 'LEARNING SHOULD BE FUN', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50'),
(3, 'Choose your subjects', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:50', '2020-07-16 08:14:50'),
(4, 'Inspirational Teachers', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(5, 'Video Lessons', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(6, 'Ask Questions', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(7, 'Track Assignments', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(8, 'For Students', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `for_teachers`
--

DROP TABLE IF EXISTS `for_teachers`;
CREATE TABLE IF NOT EXISTS `for_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `for_teachers`
--

INSERT INTO `for_teachers` (`id`, `title`, `discription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'For Teachers', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\r\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\r\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\r\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\r\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-09-28 04:46:30'),
(2, 'Those who can, teach', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(3, 'Teach From Home', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(4, 'Video Lessons', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(5, 'Answer Questions', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(6, '1 : 1 Tutoring', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(7, 'Assign Homework', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51'),
(8, 'For Teachers', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:51', '2020-07-16 08:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

DROP TABLE IF EXISTS `homework`;
CREATE TABLE IF NOT EXISTS `homework` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sub_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `lesson_id`, `discription`, `created_at`, `updated_at`, `document`, `Sub_id`, `teacher_id`, `date`, `title`, `user_id`) VALUES
(35, 73, 'this is a homework', NULL, NULL, '1602149055.pdf', 13, 117, '2020-10-21', NULL, NULL),
(36, 73, 'test', NULL, NULL, '', 13, 117, '2020-10-21', NULL, NULL),
(37, 75, 'kldsa nlas', NULL, NULL, '1602151480.pdf', 13, 117, NULL, NULL, 118);

-- --------------------------------------------------------

--
-- Table structure for table `howitworks`
--

DROP TABLE IF EXISTS `howitworks`;
CREATE TABLE IF NOT EXISTS `howitworks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `howitworks`
--

INSERT INTO `howitworks` (`id`, `title`, `discription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'LEARNING SHOULD BE FUN', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(2, 'Search Results', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\r\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\r\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\r\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\r\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-26 08:10:09'),
(3, 'Teacher', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(4, 'Time Available', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(5, 'LEARNING SHOULD BE FUN', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-16 08:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('individual','series') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'individual',
  `level_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `frequency` enum('daily','weekly',' fortnightly','monthly') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lessons_subject_id_foreign` (`subject_id`),
  KEY `lessons_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `subject_id`, `user_id`, `title`, `description`, `type`, `level_id`, `date`, `time`, `frequency`, `document`, `link`, `thumbnail`, `created_at`, `updated_at`) VALUES
(69, 1, 57, 'asdfasdf', 'asdfasdf', 'individual', 1, '2020-07-01', '15:54:12', NULL, 'ewr', 'eqwe', 'qweqwe', '2020-07-09 10:54:49', '2020-07-09 10:54:49'),
(70, 5, 57, 'asdf', 'asdfasdf', 'individual', 1, '2020-07-03', '14:34:00', NULL, '1596195891.pdf', 'fgsdfg', '1596195891.jpeg', '2020-07-31 06:44:51', '2020-07-31 06:44:51'),
(71, 2, 66, 'Calculus I', 'xyz', 'individual', 1, '2020-09-11', '07:10:00', 'weekly', '1599487850.pdf', 'http://localhost/phpmyadmin/sql.php?server=1&db=rkix_learn&table=levels&pos=0', '1599487850.png', '2020-09-07 14:10:50', '2020-09-07 14:10:50'),
(72, 1, 115, 'This is title', 'this is description', 'individual', 1, '2020-10-08', '12:45:00', 'daily', '1601654350.pdf', 'http://127.0.0.1:8000/teacher-add-lesson', '1601654350.jpeg', '2020-10-02 10:59:10', '2020-10-02 10:59:10'),
(73, 13, 117, 'This is Title', 'fdlsk fmdslk', 'individual', 1, '2020-10-21', '13:51:00', 'daily', '1601658021.pdf', NULL, '1602053711.png', '2020-10-02 12:00:21', '2020-10-07 01:55:11'),
(74, 13, 117, 'This is title', 'this is description', 'individual', 3, '2020-10-16', '19:08:00', 'daily', '1602053611.pdf', NULL, '1602053739.png', '2020-10-03 04:08:19', '2020-10-07 01:55:39'),
(75, 13, 117, 'sdafsa', 'cs', 'individual', 1, '2020-10-12', '18:21:00', NULL, '1601717528.pdf', NULL, '1602053759.png', '2020-10-03 04:32:08', '2020-10-07 01:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Primary', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(2, 'Secondry', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(3, 'Higher', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(4, 'Other', '2020-07-16 08:14:48', '2020-07-16 08:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherId` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `teacherId`, `student_id`, `messages`, `role`) VALUES
(133, 16, 22, 'hi', 1),
(134, 16, 22, 'reply', 0),
(135, 16, 22, 'hi', 1),
(136, 46, 49, 'afasfasf', 1),
(137, 51, 45, 'hjkhjk', 0),
(138, 51, 45, 'Hi Teacher', 1),
(139, 51, 45, 'Hi teacher', 0),
(140, 51, 45, 'Hi Teacher', 1),
(141, 51, 45, 'hhhhhhi', 0),
(142, 51, 45, 'Hi Teacher', 1),
(143, 51, 45, 'yesss', 1),
(144, 51, 45, 'hhhhhhi', 0),
(145, 57, 59, 'ji', 0),
(146, 117, 118, 'Hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_06_10_092355_create_levels_table', 1),
(2, '2014_06_10_092366_create_subjects_table', 1),
(3, '2014_10_12_200000_create_users_table', 1),
(4, '2014_10_12_300000_create_password_resets_table', 1),
(5, '2019_08_19_120000_create_failed_jobs_table', 1),
(6, '2020_06_10_092557_create_teachers_table', 1),
(7, '2020_06_10_092560_create_experiences_table', 1),
(8, '2020_06_10_092729_create_students_table', 1),
(9, '2020_06_25_052157_create_shedule_page_posters_table', 1),
(10, '2020_06_25_103514_create_howitworks_table', 1),
(11, '2020_06_26_082146_create_subject_level_details_table', 1),
(12, '2020_06_26_123835_create_for_teachers_table', 1),
(13, '2020_06_26_123849_create_for_students_table', 1),
(14, '2020_06_26_123921_create_for_parents_table', 1),
(15, '2020_07_04_114440_create_lessons_table', 1),
(16, '2020_07_09_221511_create_student_lessons_table', 1),
(17, '2020_07_20_153355_create_homework_table', 2),
(18, '2020_09_28_075305_create_email_configurations_table', 3),
(19, '2020_10_01_112833_create_pages_table', 4),
(20, '2020_10_07_123301_create_donates_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` longtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `page`, `slug`, `visibility`, `created_at`, `updated_at`) VALUES
(2, 'Test Page', '<h3>This is my page it needs to be design<p><img data-filename=\"ctg-1.jpg\" style=\"width: 50%; float: right;\" class=\"note-float-right\" src=\"/pages/16016175470.png\">mldsmflds</p><p>dslkfnds nkdsf fndklsl</p><p>flkdsmfds nklfsd</p><p>&nbsp;nldkssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</p><p>&nbsp;nfldskf] nfdls</p><p>ndfskfkdjs</p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>end</p><p></p><p></p><p></p></h3>\n', 'test-page', 1, '2020-10-02 00:45:47', '2020-10-02 00:49:22'),
(3, 'Terms and Conditions', '<h2 style=\"text-align: center;\"><span style=\"font-size: 0.875rem;\"><br></span><h2 style=\"text-align: center;\"><span style=\"font-size: 0.875rem;\">This is the terms and conditions page and needs to be designed.</span></h2><h2 style=\"text-align: center;\"><span style=\"font-size: 0.875rem;\"><br></span></h2><h2 style=\"text-align: center;\"><span style=\"font-size: 0.875rem;\"><br></span></h2></h2>\n', 'terms-and-conditions', 1, '2020-10-07 00:36:29', '2020-10-07 00:37:00'),
(4, 'Privacy Policy', '<h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Montserrat, sans-serif; font-weight: 700; color: rgb(29, 32, 37); font-size: 36px; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"display: inline-block; font-size: 0.875rem;\"><br></span><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Montserrat, sans-serif; font-weight: 700; color: rgb(29, 32, 37); font-size: 36px; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"display: inline-block; font-size: 0.875rem;\"><br></span></h2><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Montserrat, sans-serif; font-weight: 700; color: rgb(29, 32, 37); font-size: 36px; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"display: inline-block; font-size: 0.875rem;\">This is the Privacy Policy page and needs to be designed.</span></h2><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Montserrat, sans-serif; font-weight: 700; color: rgb(29, 32, 37); font-size: 36px; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"display: inline-block; font-size: 0.875rem;\"><br></span></h2><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: Montserrat, sans-serif; font-weight: 700; color: rgb(29, 32, 37); font-size: 36px; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"display: inline-block; font-size: 0.875rem;\"><br></span></h2></h2>\n', 'privacy-policy', 1, '2020-10-07 00:50:56', '2020-10-07 00:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_section`
--

DROP TABLE IF EXISTS `payment_section`;
CREATE TABLE IF NOT EXISTS `payment_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_section`
--

INSERT INTO `payment_section` (`id`, `name`, `address`, `city`, `state`, `country`, `phone`, `amount`, `invoice`, `remember_token`, `created_at`, `updated_at`, `mail`) VALUES
(26, 'Hirer', 'kachora upper lake', 'Skardu Gilgit Baltistan', 'skd', 'dsfasdfasdf', '3476903476', '1000', 'O3YssddMfw', NULL, NULL, NULL, 'hirer@gmail.com'),
(27, 'Hirer', 'kachora upper lake', 'Skardu Gilgit Baltistan', 'dfh', 'dsfasdfasdf', '3476903476', '1000', '7VSQCEdZqm', NULL, NULL, NULL, 'hirer@gmail.com'),
(28, 'Hirer', 'alamdar chok near micro bank', 'Skardu Gilgit Baltistan', 'skd', 'dsfasdfasdf', '3476903476', '1000', 'iWaBqmaScr', NULL, NULL, NULL, 'hirer@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shedule_page_posters`
--

DROP TABLE IF EXISTS `shedule_page_posters`;
CREATE TABLE IF NOT EXISTS `shedule_page_posters` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shedule_page_posters`
--

INSERT INTO `shedule_page_posters` (`id`, `title`, `discription`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'SCHEDULE', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\r\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\r\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\r\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\r\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-10-01 06:19:34'),
(2, 'Search Results', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(3, 'Subject', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(4, 'Teacher', 'lorum ipsum', 'pic.png', '2020-07-16 08:14:49', '2020-10-01 06:21:03'),
(5, 'Time Available', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(6, 'REGISTER', 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum\n             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit\n             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis\n             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.\n             Nam nec tellus a odio tincidunt mauris', 'pic.png', '2020-07-16 08:14:49', '2020-07-16 08:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing_preference` tinyint(1) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_lessons`
--

DROP TABLE IF EXISTS `student_lessons`;
CREATE TABLE IF NOT EXISTS `student_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `techer_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_lessons_user_id_foreign` (`user_id`),
  KEY `student_lessons_lesson_id_foreign` (`lesson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_lessons`
--

INSERT INTO `student_lessons` (`id`, `user_id`, `lesson_id`, `techer_id`, `subjects_id`, `created_at`, `updated_at`) VALUES
(69, 59, 70, 57, 5, NULL, NULL),
(70, 59, 69, 57, 1, NULL, NULL),
(73, 118, 75, 117, 13, NULL, NULL),
(74, 118, 74, 117, 13, '2020-10-05 23:28:39', '2020-10-05 23:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'English', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(2, 'Math', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(3, 'Biology', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(4, 'Chemistry', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(5, 'Urdu', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(6, 'Physics', '2020-07-16 08:14:48', '2020-07-16 08:14:48'),
(7, 'Computer', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(8, 'Database', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(9, 'Islamic', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(10, 'S.Study', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(11, 'Programing', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(12, 'Systems', '2020-07-16 08:14:49', '2020-07-16 08:14:49'),
(13, 'Subject 1', '2020-10-02 11:22:44', '2020-10-02 11:22:44'),
(14, 'subject 2', '2020-10-02 11:22:44', '2020-10-02 11:22:44'),
(15, 'new', '2020-10-05 06:48:46', '2020-10-05 06:48:46'),
(16, 'subjecy', '2020-10-05 10:23:35', '2020-10-05 10:23:35'),
(17, 'name', '2020-10-05 10:23:35', '2020-10-05 10:23:35'),
(18, 'subjecy', '2020-10-05 10:24:27', '2020-10-05 10:24:27'),
(19, 'subjecy', '2020-10-05 10:25:00', '2020-10-05 10:25:00'),
(20, 'name', '2020-10-05 10:25:00', '2020-10-05 10:25:00'),
(21, 'subjecy', '2020-10-05 10:26:54', '2020-10-05 10:26:54'),
(22, 'name', '2020-10-05 10:26:54', '2020-10-05 10:26:54'),
(23, 'subjecy', '2020-10-05 10:28:30', '2020-10-05 10:28:30'),
(24, 'name', '2020-10-05 10:28:30', '2020-10-05 10:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `subject_level_details`
--

DROP TABLE IF EXISTS `subject_level_details`;
CREATE TABLE IF NOT EXISTS `subject_level_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `field` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_level_details_level_id_foreign` (`level_id`),
  KEY `subject_level_details_subject_id_foreign` (`subject_id`),
  KEY `subject_level_details_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=439 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_level_details`
--

INSERT INTO `subject_level_details` (`id`, `level_id`, `subject_id`, `user_id`, `created_at`, `field`, `updated_at`) VALUES
(111, 3, 5, 48, '2020-07-26 08:29:39', NULL, '2020-07-26 08:29:39'),
(112, NULL, NULL, 49, '2020-07-26 09:24:53', NULL, '2020-07-26 09:24:53'),
(113, NULL, NULL, 49, '2020-07-26 09:24:53', NULL, '2020-07-26 09:24:53'),
(114, NULL, NULL, 49, '2020-07-26 09:24:53', NULL, '2020-07-26 09:24:53'),
(115, NULL, NULL, 49, '2020-07-26 09:24:53', NULL, '2020-07-26 09:24:53'),
(116, 1, 1, 46, '2020-07-27 09:43:54', NULL, '2020-07-27 09:43:54'),
(117, 1, 9, 46, '2020-07-27 09:43:54', NULL, '2020-07-27 09:43:54'),
(118, 2, 3, 47, '2020-07-27 23:53:29', NULL, '2020-07-27 23:53:29'),
(119, 2, 7, 47, '2020-07-27 23:53:29', NULL, '2020-07-27 23:53:29'),
(120, NULL, 1, 48, '2020-07-28 00:01:12', NULL, '2020-07-28 00:01:12'),
(121, 1, 7, 48, '2020-07-28 00:01:12', NULL, '2020-07-28 00:01:12'),
(122, NULL, 1, 49, '2020-07-28 00:04:23', NULL, '2020-07-28 00:04:23'),
(123, 1, 5, 49, '2020-07-28 00:04:23', NULL, '2020-07-28 00:04:23'),
(124, NULL, 9, 49, '2020-07-28 00:04:23', NULL, '2020-07-28 00:04:23'),
(125, 1, 11, 49, '2020-07-28 00:04:23', NULL, '2020-07-28 00:04:23'),
(126, 1, 1, 51, '2020-07-28 00:13:19', NULL, '2020-07-28 00:13:19'),
(127, 1, 9, 51, '2020-07-28 00:13:19', NULL, '2020-07-28 00:13:19'),
(128, 1, 9, 53, '2020-07-29 11:34:34', 'asdfasdf', '2020-07-29 11:34:34'),
(129, 1, 11, 53, '2020-07-29 11:34:34', 'asdfasdf', '2020-07-29 11:34:34'),
(130, 1, 1, 54, '2020-07-31 04:47:26', 'dsf', '2020-07-31 04:47:26'),
(131, NULL, 1, 56, '2020-07-31 04:53:16', 'tytytytyu', '2020-07-31 04:53:16'),
(132, NULL, 1, 56, '2020-07-31 05:32:53', 'tytytytyu', '2020-07-31 05:32:53'),
(133, 1, 5, 57, '2020-07-31 05:44:33', 'asdf', '2020-07-31 05:44:33'),
(134, 1, 5, 58, '2020-07-31 06:26:55', 'asdfsadf', '2020-07-31 06:26:55'),
(135, 1, 5, 58, '2020-07-31 06:27:21', 'asdfsadf', '2020-07-31 06:27:21'),
(136, 1, 5, 58, '2020-07-31 06:27:32', 'asdfsadf', '2020-07-31 06:27:32'),
(137, 1, 5, 58, '2020-07-31 06:27:45', 'asdfsadf', '2020-07-31 06:27:45'),
(138, 1, 5, 58, '2020-07-31 06:27:57', 'asdfsadf', '2020-07-31 06:27:57'),
(139, 1, 5, 58, '2020-07-31 06:28:06', 'asdfsadf', '2020-07-31 06:28:06'),
(140, 1, 5, 58, '2020-07-31 06:28:20', 'asdfsadf', '2020-07-31 06:28:20'),
(141, 1, 5, 58, '2020-07-31 06:28:36', 'asdfsadf', '2020-07-31 06:28:36'),
(142, 1, 5, 58, '2020-07-31 06:28:43', 'asdfsadf', '2020-07-31 06:28:43'),
(143, 1, 5, 58, '2020-07-31 06:29:16', 'asdfsadf', '2020-07-31 06:29:16'),
(144, 1, 5, 58, '2020-07-31 06:29:30', 'asdfsadf', '2020-07-31 06:29:30'),
(145, 1, 5, 58, '2020-07-31 06:29:41', 'asdfsadf', '2020-07-31 06:29:41'),
(146, 1, 5, 58, '2020-07-31 06:30:28', 'asdfsadf', '2020-07-31 06:30:28'),
(147, 1, 5, 58, '2020-07-31 06:30:41', 'asdfsadf', '2020-07-31 06:30:41'),
(148, 1, 5, 58, '2020-07-31 06:30:50', 'asdfsadf', '2020-07-31 06:30:50'),
(149, 1, 5, 58, '2020-07-31 06:30:58', 'asdfsadf', '2020-07-31 06:30:58'),
(150, 1, 5, 58, '2020-07-31 06:31:10', 'asdfsadf', '2020-07-31 06:31:10'),
(151, 1, 5, 58, '2020-07-31 06:31:34', 'asdfsadf', '2020-07-31 06:31:34'),
(152, 1, 5, 58, '2020-07-31 06:31:50', 'asdfsadf', '2020-07-31 06:31:50'),
(153, 1, 5, 58, '2020-07-31 06:32:29', 'asdfsadf', '2020-07-31 06:32:29'),
(154, 1, 5, 58, '2020-07-31 06:32:58', 'asdfsadf', '2020-07-31 06:32:58'),
(155, 1, 5, 58, '2020-07-31 06:33:18', 'asdfsadf', '2020-07-31 06:33:18'),
(156, 1, 5, 58, '2020-07-31 06:33:40', 'asdfsadf', '2020-07-31 06:33:40'),
(157, 1, 5, 58, '2020-07-31 06:33:53', 'asdfsadf', '2020-07-31 06:33:53'),
(158, 1, 5, 58, '2020-07-31 06:34:16', 'asdfsadf', '2020-07-31 06:34:16'),
(159, 1, 5, 58, '2020-07-31 06:34:37', 'asdfsadf', '2020-07-31 06:34:37'),
(160, 1, 5, 58, '2020-07-31 06:35:04', 'asdfsadf', '2020-07-31 06:35:04'),
(161, 1, 5, 58, '2020-07-31 06:35:27', 'asdfsadf', '2020-07-31 06:35:27'),
(162, 1, 5, 58, '2020-07-31 06:35:43', 'asdfsadf', '2020-07-31 06:35:43'),
(163, 1, 5, 58, '2020-07-31 06:36:04', 'asdfsadf', '2020-07-31 06:36:04'),
(164, 1, 5, 58, '2020-07-31 06:36:19', 'asdfsadf', '2020-07-31 06:36:19'),
(165, 1, 5, 58, '2020-07-31 06:36:34', 'asdfsadf', '2020-07-31 06:36:34'),
(166, 1, 5, 58, '2020-07-31 06:36:55', 'asdfsadf', '2020-07-31 06:36:55'),
(167, 1, 5, 58, '2020-07-31 06:37:31', 'asdfsadf', '2020-07-31 06:37:31'),
(168, 1, 5, 58, '2020-07-31 06:37:45', 'asdfsadf', '2020-07-31 06:37:45'),
(169, 1, 5, 58, '2020-07-31 06:38:05', 'asdfsadf', '2020-07-31 06:38:05'),
(170, NULL, NULL, 59, '2020-07-31 06:50:45', NULL, '2020-07-31 06:50:45'),
(171, NULL, NULL, 59, '2020-07-31 06:50:45', NULL, '2020-07-31 06:50:45'),
(172, NULL, NULL, 59, '2020-07-31 06:51:51', NULL, '2020-07-31 06:51:51'),
(173, NULL, NULL, 59, '2020-07-31 06:51:51', NULL, '2020-07-31 06:51:51'),
(174, 1, 1, 63, '2020-08-24 06:19:18', 'sddf', '2020-08-24 06:19:18'),
(175, 3, 1, 64, '2020-09-03 12:13:08', NULL, '2020-09-03 12:13:08'),
(176, 2, 1, 65, '2020-09-03 12:36:24', 'Bio', '2020-09-03 12:36:24'),
(177, 1, 1, 66, '2020-09-07 13:45:07', '0', '2020-09-07 13:45:07'),
(178, 2, 1, 66, '2020-09-07 13:45:07', '0', '2020-09-07 13:45:07'),
(179, 1, 10, 66, '2020-09-07 13:45:07', '0', '2020-09-07 13:45:07'),
(180, 3, 10, 66, '2020-09-07 13:45:07', '0', '2020-09-07 13:45:07'),
(181, 0, 0, 66, '2020-09-07 13:45:07', 'MVC', '2020-09-07 13:45:07'),
(182, 0, 0, 66, '2020-09-07 13:45:07', 'OOP', '2020-09-07 13:45:07'),
(183, 1, 1, 66, '2020-09-07 13:51:59', '0', '2020-09-07 13:51:59'),
(184, 2, 1, 66, '2020-09-07 13:51:59', '0', '2020-09-07 13:51:59'),
(185, 1, 10, 66, '2020-09-07 13:51:59', '0', '2020-09-07 13:51:59'),
(186, 3, 10, 66, '2020-09-07 13:51:59', '0', '2020-09-07 13:51:59'),
(187, 0, 0, 66, '2020-09-07 13:51:59', 'MVC', '2020-09-07 13:51:59'),
(188, 1, 1, 67, '2020-09-08 13:38:57', '0', '2020-09-08 13:38:57'),
(189, 2, 1, 67, '2020-09-08 13:38:57', '0', '2020-09-08 13:38:57'),
(190, 1, 3, 67, '2020-09-08 13:38:57', '0', '2020-09-08 13:38:57'),
(191, 1, 8, 67, '2020-09-08 13:38:57', '0', '2020-09-08 13:38:57'),
(192, 3, 8, 67, '2020-09-08 13:38:57', '0', '2020-09-08 13:38:57'),
(193, 0, 0, 67, '2020-09-08 13:38:57', 'Music', '2020-09-08 13:38:57'),
(194, 0, 0, 67, '2020-09-08 13:38:57', NULL, '2020-09-08 13:38:57'),
(195, 0, 1, 78, '2020-09-26 05:18:28', '0', '2020-09-26 05:18:28'),
(196, 0, 1, 78, '2020-09-26 05:19:09', '0', '2020-09-26 05:19:09'),
(197, 1, 1, 79, '2020-09-26 06:13:49', '0', '2020-09-26 06:13:49'),
(198, 1, 1, 80, '2020-09-26 06:33:59', '0', '2020-09-26 06:33:59'),
(199, 0, 3, 83, '2020-09-26 06:39:21', '0', '2020-09-26 06:39:21'),
(200, 0, 5, 83, '2020-09-26 06:39:21', '0', '2020-09-26 06:39:21'),
(201, 0, 7, 83, '2020-09-26 06:39:22', '0', '2020-09-26 06:39:22'),
(202, 3, 1, 95, '2020-09-28 02:12:05', '0', '2020-09-28 02:12:05'),
(203, 3, 1, 95, '2020-09-28 02:13:17', '0', '2020-09-28 02:13:17'),
(204, 3, 1, 95, '2020-09-28 02:15:37', '0', '2020-09-28 02:15:37'),
(205, 0, 0, 95, '2020-09-28 02:15:37', 'subject 1', '2020-09-28 02:15:37'),
(206, 1, 0, 95, '2020-09-28 02:15:37', 'Subject 2', '2020-09-28 02:15:37'),
(207, 1, 1, 97, '2020-09-28 07:20:59', '0', '2020-09-28 07:20:59'),
(208, 1, 1, 97, '2020-09-28 07:21:14', '0', '2020-09-28 07:21:14'),
(209, 1, 1, 97, '2020-09-28 07:23:50', '0', '2020-09-28 07:23:50'),
(210, 1, 1, 97, '2020-09-28 07:24:33', '0', '2020-09-28 07:24:33'),
(211, 1, 1, 97, '2020-09-28 07:29:24', '0', '2020-09-28 07:29:24'),
(212, 1, 0, 98, '2020-09-28 07:44:36', 'subject', '2020-09-28 07:44:36'),
(213, 2, 0, 98, '2020-09-28 07:44:36', 'subject 2', '2020-09-28 07:44:36'),
(214, 0, 1, 99, '2020-09-29 00:15:30', '0', '2020-09-29 00:15:30'),
(215, 0, 4, 99, '2020-09-29 00:15:30', '0', '2020-09-29 00:15:30'),
(216, 0, 0, 99, '2020-09-29 00:15:30', NULL, '2020-09-29 00:15:30'),
(217, 0, 5, 101, '2020-09-29 01:22:59', '0', '2020-09-29 01:22:59'),
(218, 0, 6, 101, '2020-09-29 01:22:59', '0', '2020-09-29 01:22:59'),
(219, 0, 7, 101, '2020-09-29 01:22:59', '0', '2020-09-29 01:22:59'),
(220, 0, 8, 101, '2020-09-29 01:22:59', '0', '2020-09-29 01:22:59'),
(221, 0, 6, 102, '2020-09-29 02:02:01', '0', '2020-09-29 02:02:01'),
(222, 0, 9, 102, '2020-09-29 02:02:01', '0', '2020-09-29 02:02:01'),
(223, 0, 6, 102, '2020-09-29 02:03:26', '0', '2020-09-29 02:03:26'),
(224, 0, 9, 102, '2020-09-29 02:03:26', '0', '2020-09-29 02:03:26'),
(225, 0, 6, 102, '2020-09-29 03:19:50', '0', '2020-09-29 03:19:50'),
(226, 0, 9, 102, '2020-09-29 03:19:50', '0', '2020-09-29 03:19:50'),
(227, 0, 1, 103, '2020-09-29 03:22:05', '0', '2020-09-29 03:22:05'),
(228, 0, 3, 103, '2020-09-29 03:22:05', '0', '2020-09-29 03:22:05'),
(229, 0, 3, 104, '2020-09-29 03:24:44', '0', '2020-09-29 03:24:44'),
(230, 0, 5, 104, '2020-09-29 03:24:44', '0', '2020-09-29 03:24:44'),
(231, 0, 7, 104, '2020-09-29 03:24:44', '0', '2020-09-29 03:24:44'),
(232, 0, 5, 106, '2020-09-29 03:37:55', '0', '2020-09-29 03:37:55'),
(233, 0, 7, 106, '2020-09-29 03:37:55', '0', '2020-09-29 03:37:55'),
(234, 0, 9, 106, '2020-09-29 03:37:55', '0', '2020-09-29 03:37:55'),
(235, 0, 5, 106, '2020-09-29 03:40:18', '0', '2020-09-29 03:40:18'),
(236, 0, 7, 106, '2020-09-29 03:40:18', '0', '2020-09-29 03:40:18'),
(237, 0, 9, 106, '2020-09-29 03:40:18', '0', '2020-09-29 03:40:18'),
(238, 0, 5, 106, '2020-09-29 03:40:31', '0', '2020-09-29 03:40:31'),
(239, 0, 7, 106, '2020-09-29 03:40:31', '0', '2020-09-29 03:40:31'),
(240, 0, 9, 106, '2020-09-29 03:40:31', '0', '2020-09-29 03:40:31'),
(241, 0, 5, 106, '2020-09-29 03:41:11', '0', '2020-09-29 03:41:11'),
(242, 0, 7, 106, '2020-09-29 03:41:11', '0', '2020-09-29 03:41:11'),
(243, 0, 9, 106, '2020-09-29 03:41:11', '0', '2020-09-29 03:41:11'),
(244, 0, 5, 106, '2020-09-29 03:42:04', '0', '2020-09-29 03:42:04'),
(245, 0, 7, 106, '2020-09-29 03:42:04', '0', '2020-09-29 03:42:04'),
(246, 0, 9, 106, '2020-09-29 03:42:04', '0', '2020-09-29 03:42:04'),
(247, 0, 5, 106, '2020-09-29 03:42:45', '0', '2020-09-29 03:42:45'),
(248, 0, 7, 106, '2020-09-29 03:42:45', '0', '2020-09-29 03:42:45'),
(249, 0, 9, 106, '2020-09-29 03:42:45', '0', '2020-09-29 03:42:45'),
(250, 0, 5, 106, '2020-09-29 03:43:08', '0', '2020-09-29 03:43:08'),
(251, 0, 7, 106, '2020-09-29 03:43:09', '0', '2020-09-29 03:43:09'),
(252, 0, 9, 106, '2020-09-29 03:43:09', '0', '2020-09-29 03:43:09'),
(253, 0, 5, 106, '2020-09-29 03:44:28', '0', '2020-09-29 03:44:28'),
(254, 0, 7, 106, '2020-09-29 03:44:28', '0', '2020-09-29 03:44:28'),
(255, 0, 9, 106, '2020-09-29 03:44:28', '0', '2020-09-29 03:44:28'),
(256, 0, 5, 106, '2020-09-29 03:44:43', '0', '2020-09-29 03:44:43'),
(257, 0, 7, 106, '2020-09-29 03:44:43', '0', '2020-09-29 03:44:43'),
(258, 0, 9, 106, '2020-09-29 03:44:43', '0', '2020-09-29 03:44:43'),
(259, 0, 5, 106, '2020-09-29 03:44:58', '0', '2020-09-29 03:44:58'),
(260, 0, 7, 106, '2020-09-29 03:44:58', '0', '2020-09-29 03:44:58'),
(261, 0, 9, 106, '2020-09-29 03:44:58', '0', '2020-09-29 03:44:58'),
(262, 0, 5, 106, '2020-09-29 03:45:13', '0', '2020-09-29 03:45:13'),
(263, 0, 7, 106, '2020-09-29 03:45:13', '0', '2020-09-29 03:45:13'),
(264, 0, 9, 106, '2020-09-29 03:45:13', '0', '2020-09-29 03:45:13'),
(265, 0, 5, 106, '2020-09-29 03:45:47', '0', '2020-09-29 03:45:47'),
(266, 0, 7, 106, '2020-09-29 03:45:47', '0', '2020-09-29 03:45:47'),
(267, 0, 9, 106, '2020-09-29 03:45:47', '0', '2020-09-29 03:45:47'),
(268, 0, 5, 106, '2020-09-29 03:51:21', '0', '2020-09-29 03:51:21'),
(269, 0, 7, 106, '2020-09-29 03:51:21', '0', '2020-09-29 03:51:21'),
(270, 0, 9, 106, '2020-09-29 03:51:21', '0', '2020-09-29 03:51:21'),
(271, 1, 3, 107, '2020-10-01 00:51:30', '0', '2020-10-01 00:51:30'),
(272, 0, 3, 108, '2020-10-01 01:30:31', '0', '2020-10-01 01:30:31'),
(273, 0, 5, 108, '2020-10-01 01:30:31', '0', '2020-10-01 01:30:31'),
(274, 0, 7, 108, '2020-10-01 01:30:31', '0', '2020-10-01 01:30:31'),
(275, 0, 3, 108, '2020-10-01 01:38:09', '0', '2020-10-01 01:38:09'),
(276, 0, 5, 108, '2020-10-01 01:38:09', '0', '2020-10-01 01:38:09'),
(277, 0, 7, 108, '2020-10-01 01:38:09', '0', '2020-10-01 01:38:09'),
(278, 0, 3, 108, '2020-10-01 01:38:37', '0', '2020-10-01 01:38:37'),
(279, 0, 5, 108, '2020-10-01 01:38:37', '0', '2020-10-01 01:38:37'),
(280, 0, 7, 108, '2020-10-01 01:38:37', '0', '2020-10-01 01:38:37'),
(281, 0, 3, 108, '2020-10-01 01:38:48', '0', '2020-10-01 01:38:48'),
(282, 0, 5, 108, '2020-10-01 01:38:48', '0', '2020-10-01 01:38:48'),
(283, 0, 7, 108, '2020-10-01 01:38:48', '0', '2020-10-01 01:38:48'),
(284, 0, 3, 108, '2020-10-01 01:51:33', '0', '2020-10-01 01:51:33'),
(285, 0, 5, 108, '2020-10-01 01:51:33', '0', '2020-10-01 01:51:33'),
(286, 0, 7, 108, '2020-10-01 01:51:33', '0', '2020-10-01 01:51:33'),
(287, 0, 3, 108, '2020-10-01 01:55:39', '0', '2020-10-01 01:55:39'),
(288, 0, 5, 108, '2020-10-01 01:55:39', '0', '2020-10-01 01:55:39'),
(289, 0, 7, 108, '2020-10-01 01:55:39', '0', '2020-10-01 01:55:39'),
(290, 0, 3, 108, '2020-10-01 01:56:43', '0', '2020-10-01 01:56:43'),
(291, 0, 5, 108, '2020-10-01 01:56:43', '0', '2020-10-01 01:56:43'),
(292, 0, 7, 108, '2020-10-01 01:56:43', '0', '2020-10-01 01:56:43'),
(293, 0, 3, 108, '2020-10-01 01:58:20', '0', '2020-10-01 01:58:20'),
(294, 0, 5, 108, '2020-10-01 01:58:20', '0', '2020-10-01 01:58:20'),
(295, 0, 7, 108, '2020-10-01 01:58:20', '0', '2020-10-01 01:58:20'),
(296, 0, 3, 108, '2020-10-01 01:59:43', '0', '2020-10-01 01:59:43'),
(297, 0, 5, 108, '2020-10-01 01:59:43', '0', '2020-10-01 01:59:43'),
(298, 0, 7, 108, '2020-10-01 01:59:43', '0', '2020-10-01 01:59:43'),
(299, 0, 3, 108, '2020-10-01 02:00:21', '0', '2020-10-01 02:00:21'),
(300, 0, 5, 108, '2020-10-01 02:00:21', '0', '2020-10-01 02:00:21'),
(301, 0, 7, 108, '2020-10-01 02:00:21', '0', '2020-10-01 02:00:21'),
(302, 0, 3, 108, '2020-10-01 02:01:27', '0', '2020-10-01 02:01:27'),
(303, 0, 5, 108, '2020-10-01 02:01:27', '0', '2020-10-01 02:01:27'),
(304, 0, 7, 108, '2020-10-01 02:01:27', '0', '2020-10-01 02:01:27'),
(305, 0, 3, 108, '2020-10-01 02:02:52', '0', '2020-10-01 02:02:52'),
(306, 0, 5, 108, '2020-10-01 02:02:52', '0', '2020-10-01 02:02:52'),
(307, 0, 7, 108, '2020-10-01 02:02:52', '0', '2020-10-01 02:02:52'),
(308, 0, 3, 108, '2020-10-01 02:04:45', '0', '2020-10-01 02:04:45'),
(309, 0, 5, 108, '2020-10-01 02:04:45', '0', '2020-10-01 02:04:45'),
(310, 0, 7, 108, '2020-10-01 02:04:45', '0', '2020-10-01 02:04:45'),
(311, 0, 0, 108, '2020-10-01 02:04:45', 'subject 1', '2020-10-01 02:04:45'),
(312, 0, 3, 108, '2020-10-01 02:05:58', '0', '2020-10-01 02:05:58'),
(313, 0, 5, 108, '2020-10-01 02:05:58', '0', '2020-10-01 02:05:58'),
(314, 0, 7, 108, '2020-10-01 02:05:58', '0', '2020-10-01 02:05:58'),
(315, 0, 0, 108, '2020-10-01 02:05:58', 'subject 1', '2020-10-01 02:05:58'),
(316, 0, 3, 108, '2020-10-01 02:08:47', '0', '2020-10-01 02:08:47'),
(317, 0, 5, 108, '2020-10-01 02:08:47', '0', '2020-10-01 02:08:47'),
(318, 0, 7, 108, '2020-10-01 02:08:47', '0', '2020-10-01 02:08:47'),
(319, 0, 0, 108, '2020-10-01 02:08:47', 'subject 1', '2020-10-01 02:08:47'),
(320, 0, 3, 108, '2020-10-01 02:10:50', '0', '2020-10-01 02:10:50'),
(321, 0, 5, 108, '2020-10-01 02:10:50', '0', '2020-10-01 02:10:50'),
(322, 0, 7, 108, '2020-10-01 02:10:50', '0', '2020-10-01 02:10:50'),
(323, 0, 0, 108, '2020-10-01 02:10:50', 'subject 1', '2020-10-01 02:10:50'),
(324, 0, 3, 108, '2020-10-01 02:11:52', '0', '2020-10-01 02:11:52'),
(325, 0, 5, 108, '2020-10-01 02:11:52', '0', '2020-10-01 02:11:52'),
(326, 0, 7, 108, '2020-10-01 02:11:52', '0', '2020-10-01 02:11:52'),
(327, 0, 0, 108, '2020-10-01 02:11:52', 'subject 1', '2020-10-01 02:11:52'),
(328, 0, 3, 108, '2020-10-01 02:18:26', '0', '2020-10-01 02:18:26'),
(329, 0, 5, 108, '2020-10-01 02:18:26', '0', '2020-10-01 02:18:26'),
(330, 0, 7, 108, '2020-10-01 02:18:26', '0', '2020-10-01 02:18:26'),
(331, 0, 0, 108, '2020-10-01 02:18:26', 'subject 1', '2020-10-01 02:18:26'),
(332, 0, 3, 108, '2020-10-01 02:18:44', '0', '2020-10-01 02:18:44'),
(333, 0, 5, 108, '2020-10-01 02:18:45', '0', '2020-10-01 02:18:45'),
(334, 0, 7, 108, '2020-10-01 02:18:45', '0', '2020-10-01 02:18:45'),
(335, 0, 0, 108, '2020-10-01 02:18:45', 'subject 1', '2020-10-01 02:18:45'),
(336, 0, 3, 108, '2020-10-01 02:19:03', '0', '2020-10-01 02:19:03'),
(337, 0, 5, 108, '2020-10-01 02:19:03', '0', '2020-10-01 02:19:03'),
(338, 0, 7, 108, '2020-10-01 02:19:03', '0', '2020-10-01 02:19:03'),
(339, 0, 0, 108, '2020-10-01 02:19:03', 'subject 1', '2020-10-01 02:19:03'),
(340, 0, 3, 108, '2020-10-01 02:19:18', '0', '2020-10-01 02:19:18'),
(341, 0, 5, 108, '2020-10-01 02:19:19', '0', '2020-10-01 02:19:19'),
(342, 0, 7, 108, '2020-10-01 02:19:19', '0', '2020-10-01 02:19:19'),
(343, 0, 0, 108, '2020-10-01 02:19:19', 'subject 1', '2020-10-01 02:19:19'),
(344, 0, 3, 108, '2020-10-01 02:20:57', '0', '2020-10-01 02:20:57'),
(345, 0, 5, 108, '2020-10-01 02:20:57', '0', '2020-10-01 02:20:57'),
(346, 0, 7, 108, '2020-10-01 02:20:57', '0', '2020-10-01 02:20:57'),
(347, 0, 0, 108, '2020-10-01 02:20:57', 'subject 1', '2020-10-01 02:20:57'),
(348, 0, 3, 108, '2020-10-01 02:23:18', '0', '2020-10-01 02:23:18'),
(349, 0, 5, 108, '2020-10-01 02:23:18', '0', '2020-10-01 02:23:18'),
(350, 0, 7, 108, '2020-10-01 02:23:18', '0', '2020-10-01 02:23:18'),
(351, 0, 0, 108, '2020-10-01 02:23:18', 'subject 1', '2020-10-01 02:23:18'),
(352, 0, 3, 108, '2020-10-01 02:23:46', '0', '2020-10-01 02:23:46'),
(353, 0, 5, 108, '2020-10-01 02:23:46', '0', '2020-10-01 02:23:46'),
(354, 0, 7, 108, '2020-10-01 02:23:46', '0', '2020-10-01 02:23:46'),
(355, 0, 0, 108, '2020-10-01 02:23:47', 'subject 1', '2020-10-01 02:23:47'),
(356, 0, 3, 108, '2020-10-01 02:24:46', '0', '2020-10-01 02:24:46'),
(357, 0, 5, 108, '2020-10-01 02:24:46', '0', '2020-10-01 02:24:46'),
(358, 0, 7, 108, '2020-10-01 02:24:46', '0', '2020-10-01 02:24:46'),
(359, 0, 0, 108, '2020-10-01 02:24:46', 'subject 1', '2020-10-01 02:24:46'),
(360, 0, 3, 109, '2020-10-01 04:07:30', '0', '2020-10-01 04:07:30'),
(361, 0, 5, 109, '2020-10-01 04:07:30', '0', '2020-10-01 04:07:30'),
(362, 0, 7, 109, '2020-10-01 04:07:30', '0', '2020-10-01 04:07:30'),
(363, 0, 1, 111, '2020-10-01 04:57:51', '0', '2020-10-01 04:57:51'),
(364, 0, 3, 111, '2020-10-01 04:57:51', '0', '2020-10-01 04:57:51'),
(365, 0, 4, 111, '2020-10-01 04:57:51', '0', '2020-10-01 04:57:51'),
(366, 0, 5, 111, '2020-10-01 04:57:51', '0', '2020-10-01 04:57:51'),
(367, 0, 9, 111, '2020-10-01 04:57:52', '0', '2020-10-01 04:57:52'),
(368, 0, 10, 111, '2020-10-01 04:57:52', '0', '2020-10-01 04:57:52'),
(369, 0, 11, 111, '2020-10-01 04:57:52', '0', '2020-10-01 04:57:52'),
(370, 0, 1, 111, '2020-10-01 04:58:17', '0', '2020-10-01 04:58:17'),
(371, 0, 3, 111, '2020-10-01 04:58:17', '0', '2020-10-01 04:58:17'),
(372, 0, 4, 111, '2020-10-01 04:58:17', '0', '2020-10-01 04:58:17'),
(373, 0, 5, 111, '2020-10-01 04:58:18', '0', '2020-10-01 04:58:18'),
(374, 0, 9, 111, '2020-10-01 04:58:18', '0', '2020-10-01 04:58:18'),
(375, 0, 10, 111, '2020-10-01 04:58:18', '0', '2020-10-01 04:58:18'),
(376, 0, 11, 111, '2020-10-01 04:58:18', '0', '2020-10-01 04:58:18'),
(377, 0, 1, 111, '2020-10-01 04:58:44', '0', '2020-10-01 04:58:44'),
(378, 0, 3, 111, '2020-10-01 04:58:44', '0', '2020-10-01 04:58:44'),
(379, 0, 4, 111, '2020-10-01 04:58:44', '0', '2020-10-01 04:58:44'),
(380, 0, 5, 111, '2020-10-01 04:58:44', '0', '2020-10-01 04:58:44'),
(381, 0, 9, 111, '2020-10-01 04:58:44', '0', '2020-10-01 04:58:44'),
(382, 0, 10, 111, '2020-10-01 04:58:44', '0', '2020-10-01 04:58:44'),
(383, 0, 11, 111, '2020-10-01 04:58:44', '0', '2020-10-01 04:58:44'),
(384, 0, 2, 112, '2020-10-01 05:02:19', '0', '2020-10-01 05:02:19'),
(385, 0, 4, 112, '2020-10-01 05:02:19', '0', '2020-10-01 05:02:19'),
(386, 0, 6, 112, '2020-10-01 05:02:19', '0', '2020-10-01 05:02:19'),
(387, 0, 4, 114, '2020-10-01 05:23:34', '0', '2020-10-01 05:23:34'),
(388, 0, 6, 114, '2020-10-01 05:23:34', '0', '2020-10-01 05:23:34'),
(389, 0, 8, 114, '2020-10-01 05:23:34', '0', '2020-10-01 05:23:34'),
(390, 0, 10, 114, '2020-10-01 05:23:34', '0', '2020-10-01 05:23:34'),
(391, 1, 1, 115, '2020-10-02 08:51:19', '0', '2020-10-02 08:51:19'),
(392, 2, 1, 115, '2020-10-02 08:51:19', '0', '2020-10-02 08:51:19'),
(393, 3, 1, 115, '2020-10-02 08:51:19', '0', '2020-10-02 08:51:19'),
(394, 1, 10, 115, '2020-10-02 08:51:19', '0', '2020-10-02 08:51:19'),
(395, 2, 10, 115, '2020-10-02 08:51:19', '0', '2020-10-02 08:51:19'),
(396, 3, 10, 115, '2020-10-02 08:51:19', '0', '2020-10-02 08:51:19'),
(397, 1, 4, 116, '2020-10-02 11:31:50', '0', '2020-10-02 11:31:50'),
(398, 2, 4, 116, '2020-10-02 11:31:50', '0', '2020-10-02 11:31:50'),
(399, 3, 4, 116, '2020-10-02 11:31:50', '0', '2020-10-02 11:31:50'),
(400, 1, 1, 117, '2020-10-02 11:36:19', '0', '2020-10-02 11:36:19'),
(401, 2, 1, 117, '2020-10-02 11:36:19', '0', '2020-10-02 11:36:19'),
(402, 3, 1, 117, '2020-10-02 11:36:19', '0', '2020-10-02 11:36:19'),
(403, 1, 13, 117, '2020-10-02 11:36:19', '0', '2020-10-02 11:36:19'),
(404, 2, 13, 117, '2020-10-02 11:36:19', '0', '2020-10-02 11:36:19'),
(405, 3, 13, 117, '2020-10-02 11:36:19', '0', '2020-10-02 11:36:19'),
(406, 1, 14, 117, '2020-10-02 11:36:19', '0', '2020-10-02 11:36:19'),
(407, 2, 14, 117, '2020-10-02 11:36:19', '0', '2020-10-02 11:36:19'),
(408, 0, 13, 118, '2020-10-03 01:26:58', '0', '2020-10-03 01:26:58'),
(409, 0, 14, 118, '2020-10-03 01:26:58', '0', '2020-10-03 01:26:58'),
(410, 0, 0, 119, '2020-10-05 06:48:47', '15', '2020-10-05 06:48:47'),
(411, 0, 9, 120, '2020-10-05 10:23:35', '0', '2020-10-05 10:23:35'),
(412, 0, 11, 120, '2020-10-05 10:23:35', '0', '2020-10-05 10:23:35'),
(413, 0, 13, 120, '2020-10-05 10:23:35', '0', '2020-10-05 10:23:35'),
(414, 0, 15, 120, '2020-10-05 10:23:35', '0', '2020-10-05 10:23:35'),
(415, 0, 0, 120, '2020-10-05 10:23:35', '16', '2020-10-05 10:23:35'),
(416, 0, 0, 120, '2020-10-05 10:23:35', '17', '2020-10-05 10:23:35'),
(417, 0, 9, 120, '2020-10-05 10:24:27', '0', '2020-10-05 10:24:27'),
(418, 0, 11, 120, '2020-10-05 10:24:27', '0', '2020-10-05 10:24:27'),
(419, 0, 13, 120, '2020-10-05 10:24:27', '0', '2020-10-05 10:24:27'),
(420, 0, 15, 120, '2020-10-05 10:24:27', '0', '2020-10-05 10:24:27'),
(421, 0, 9, 120, '2020-10-05 10:25:00', '0', '2020-10-05 10:25:00'),
(422, 0, 11, 120, '2020-10-05 10:25:00', '0', '2020-10-05 10:25:00'),
(423, 0, 13, 120, '2020-10-05 10:25:00', '0', '2020-10-05 10:25:00'),
(424, 0, 15, 120, '2020-10-05 10:25:00', '0', '2020-10-05 10:25:00'),
(425, 0, 0, 120, '2020-10-05 10:25:00', '19', '2020-10-05 10:25:00'),
(426, 0, 0, 120, '2020-10-05 10:25:00', '20', '2020-10-05 10:25:00'),
(427, 0, 9, 120, '2020-10-05 10:26:54', '0', '2020-10-05 10:26:54'),
(428, 0, 11, 120, '2020-10-05 10:26:54', '0', '2020-10-05 10:26:54'),
(429, 0, 13, 120, '2020-10-05 10:26:54', '0', '2020-10-05 10:26:54'),
(430, 0, 15, 120, '2020-10-05 10:26:54', '0', '2020-10-05 10:26:54'),
(431, 0, 0, 120, '2020-10-05 10:26:54', '21', '2020-10-05 10:26:54'),
(432, 0, 0, 120, '2020-10-05 10:26:54', '22', '2020-10-05 10:26:54'),
(433, 0, 9, 120, '2020-10-05 10:28:30', '0', '2020-10-05 10:28:30'),
(434, 0, 11, 120, '2020-10-05 10:28:30', '0', '2020-10-05 10:28:30'),
(435, 0, 13, 120, '2020-10-05 10:28:30', '0', '2020-10-05 10:28:30'),
(436, 0, 15, 120, '2020-10-05 10:28:30', '0', '2020-10-05 10:28:30'),
(437, 0, 0, 120, '2020-10-05 10:28:30', '23', '2020-10-05 10:28:30'),
(438, 0, 0, 120, '2020-10-05 10:28:30', '24', '2020-10-05 10:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `Education` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taught_level` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing_preference` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favorite_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_level` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','teacher','student') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'teacher',
  `approved_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fof_session` tinyint(1) NOT NULL DEFAULT 0,
  `helpSubjects` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_favorite_subject_foreign` (`favorite_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `thumbnail`, `favorite_subject`, `email`, `email_verified_at`, `user_contact`, `description`, `educational_level`, `profession`, `experience`, `type`, `approved_at`, `password`, `country`, `city`, `fof_session`, `helpSubjects`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'admin', '1594109446.jpg', NULL, 'admin@gmail.com', '2020-07-16 08:14:49', NULL, 'Good person heaving grate knowledge', NULL, NULL, NULL, 'admin', '2020-07-16 08:14:49', '$2y$10$39thLCMkk2qNzcYDNPcX5OEb0UVv6pIOexyc56XxFvs3X4PS0bRvu', 'Pakistan', NULL, 0, NULL, NULL, '2020-07-16 08:14:49', '2020-07-16 08:14:49', 0),
(35, 'shaheryar', 'sajid', '1595418857.jpeg', '3', 'shaheryar1044@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', '2020-07-22 17:34:02', '$2y$10$UjfbVF98adtnnocjLCK2X.ql1dsqi1w68WDKadkMkHwPtbSX9p.AO', 'Germany', NULL, 1, NULL, NULL, '2020-07-22 11:53:27', '2020-07-22 17:34:02', 1),
(44, 'ghulam', 'rasool', NULL, NULL, 'sdfsdf@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$39thLCMkk2qNzcYDNPcX5OEb0UVv6pIOexyc56XxFvs3X4PS0bRvu', NULL, NULL, 0, NULL, NULL, '2020-07-25 11:48:43', '2020-07-25 11:48:43', 1),
(46, 'sdfgsdfg', 'sdfgsdfg', NULL, NULL, 'sdfgsdfgsdf@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$TS8p51wOTUVbolEtAbwLPOzt0vLLLB0tQFORsl0pPm.YPEK/WslMa', NULL, NULL, 0, NULL, NULL, '2020-07-27 09:43:35', '2020-07-27 09:43:35', NULL),
(52, 'ghulam', 'rasool', NULL, NULL, 'ghulamrasoolo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$2IxzvJzIaM4ZXYaqph00ief8FqB9hkh4iBfvkM9aHKZP.YDWJhgKi', NULL, NULL, 0, NULL, NULL, '2020-07-29 11:27:23', '2020-07-29 11:27:23', NULL),
(53, 'ghulam', 'rasool', '1596040754.jpeg', '1', 'ghulamrasooloddd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$C2TTyirfQnt5i0QQ4KKj9Op9vQYAK4./oQCyXtPDd7OFb737zDgmK', 'USA', NULL, 1, NULL, NULL, '2020-07-29 11:33:35', '2020-07-29 11:39:14', NULL),
(57, 'Rasool', 'rasooll', '1596192292.jpeg', '2', 'rasooljilaniaug2016@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', '2020-07-31 05:45:45', '$2y$10$CrTokNc8jM8yLESOjvCbN.780LbenrC./JYeg.BcHjG3g6tlFduZK', 'Germany', NULL, 1, NULL, NULL, '2020-07-31 05:44:04', '2020-07-31 05:45:45', NULL),
(58, 'sdfsadf', 'asdfasdf', NULL, NULL, 'rasod016@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$p53MkaxT8O7zVJE8HUMQwOt8N1TO4xOQqitZigWKHhVe0YlU5awWm', NULL, NULL, 0, NULL, NULL, '2020-07-31 06:26:42', '2020-07-31 06:26:42', NULL),
(59, 'ghu', 'ras', '1596196326.jpeg', '1', 'emzoid.developer20@gmail.com', NULL, NULL, '\\ASDAS', NULL, NULL, NULL, 'student', '2020-07-31 06:52:43', '$2y$10$CodEVM.zNX/gg4UAe21W/e/PvXuEwGec4aJK34DMKB7vKB6kXgzES', 'Germany', NULL, 1, NULL, NULL, '2020-07-31 06:47:16', '2020-07-31 06:52:43', NULL),
(60, 'ghj', 'm,.m', NULL, NULL, 'nmnm@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$lNeIKzpHFDPmL/n97Kd0ieX8xyVf7ERufDTCHd2ehzQw5JSeqQPPu', NULL, NULL, 0, NULL, NULL, '2020-08-18 09:42:05', '2020-08-18 09:42:05', NULL),
(61, 'Scot', 'Barlow', NULL, NULL, 'scot.barlow@hotdogsolutions.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$QhOmxAEE3HNAaQVFLPZOeeFf5r9W.o4sRYXUKVUaEkS9s3PD9T6ra', NULL, NULL, 0, NULL, NULL, '2020-08-19 09:23:03', '2020-08-19 09:23:03', NULL),
(62, 'Scot', 'Barlow', NULL, NULL, 'Scot.barlow1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$ZjCiLUKWhi72FFHFfJ.kk.VR4svW5MDLPN8/lA63Ls6U5GjZOaIcW', NULL, NULL, 0, NULL, NULL, '2020-08-19 09:31:33', '2020-08-19 09:31:33', NULL),
(63, 'jam', 'ila', '1598249989.jpeg', '2', 'jam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$86.zliGaD0VlKUFhKK8UreaxnDw2nqjZ1Mz5qTKMOT75d5pGBv6fS', 'USA', NULL, 1, NULL, NULL, '2020-08-24 06:18:00', '2020-08-24 06:19:49', NULL),
(64, 'Mal', 'Simons', NULL, NULL, 'mal.simons@hotdogsolutions.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', '2020-09-05 09:32:26', '$2y$10$hCyXK2FzVzrJnRUr43rVeuEapnUnK./mn9tSCPIdFGedHU6nsihuW', NULL, NULL, 0, NULL, NULL, '2020-09-03 12:10:49', '2020-09-05 09:32:26', NULL),
(65, 'Abdul', 'aziz', '1599136611.jpeg', '1', 'abdulazizbhatti05@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', '2020-09-03 12:54:05', '$2y$10$qfghuCWnpuz.qTX39AHuQ.9tKETmkNQVj3ZU6e/zb7UXgbQyN7/y2', 'USA', NULL, 1, NULL, NULL, '2020-09-03 12:35:32', '2020-09-03 12:54:05', NULL),
(66, 'Ali', 'Rizvi', '1599487763.jpeg', NULL, 'alirizvi139@gmail.com', NULL, NULL, 'Cillum exercitation pariatur in minim cupidatat elit enim occaecat reprehenderit ut irure consectetur duis excepteur ex ut dolore mollit ea nisi aute dolor do incididunt enim est minim ullamco dolor non exercitation laboris minim consequat.', 'Cillum exercitation pariatur in minim cupidatat elit enim occaecat reprehenderit ut irure consectetur duis excepteur ex ut dolore mollit ea nisi aute dolor do incididunt enim est minim ullamco dolor non exercitation laboris minim consequat.', 'Cillum exercitation pariatur in minim cupidatat elit enim occaecat reprehenderit ut irure consectetur duis excepteur ex ut dolore mollit ea nisi aute dolor do incididunt enim est minim ullamco dolor non exercitation laboris minim consequat.', 'Cillum exercitation pariatur in minim cupidatat elit enim occaecat reprehenderit ut irure consectetur duis excepteur ex ut dolore mollit ea nisi aute dolor do incididunt enim est minim ullamco dolor non exercitation laboris minim consequat.', 'teacher', '2020-09-07 13:55:24', '$2y$10$vc08OBq0nJYEMHiGCQgOMezrmKJGZOUEQ5w/8VL8IOtG7isr3qJt2', 'Germany', NULL, 1, NULL, NULL, '2020-09-07 13:44:44', '2020-09-07 14:09:23', NULL),
(67, 'Steve', 'Payne', '1599572424.jpeg', NULL, 'steve.payne@hotdogsolutions.com', NULL, NULL, 'Music Teacher', 'Diploma', 'Musicain', 'Loads', 'teacher', '2020-09-08 13:42:06', '$2y$10$YVzDuCX6DO7fDm35q1TqqOF98.M1S5b8JMwiZ6EvlVW1qrN/EW3Fu', 'Germany', NULL, 0, NULL, NULL, '2020-09-08 13:38:23', '2020-09-08 13:42:06', NULL),
(75, 'Haley Oliver', 'Dacey Tillman', NULL, NULL, 'tirelytuca@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$r7Rp7XYCDZfidPvBcUZHs.4UX1jUUls2m9tUOtt5gwz42mLxYHUeG', NULL, NULL, 0, NULL, NULL, '2020-09-26 04:23:05', '2020-09-26 04:23:05', NULL),
(77, 'Noel Parsons', 'Kimberley Buckley', NULL, NULL, 'wadixuc@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$yLWeRIdiGVdpvmJNd13sV.xcCaa6wSiqW/db7oJOYjaa5O3ccALUO', NULL, NULL, 0, NULL, NULL, '2020-09-26 04:35:16', '2020-09-26 04:35:16', NULL),
(86, 'Noah Vaughan', 'Gannon Johnston', NULL, NULL, 'mehisab@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$ouUmLuSwgVoESkSCuBGL/.xEFnHQPeLXeQKI6YSeLyM8/3XF1/RVi', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:06:50', '2020-09-27 23:06:50', NULL),
(87, 'Felix York', 'Norman Holland', NULL, NULL, 'judaj@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$pBWxhpIvglWPb974OCTyqexolJovGXwS5PT0aWLjxZyrLd3rIHjpK', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:07:15', '2020-09-27 23:07:15', NULL),
(88, 'Renee Walton', 'Hasad Wilkinson', NULL, NULL, 'hubumebiq@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$xEEfYoUSi/h0cx8dEWGzWede3iK79kHqR1dsyzEkJZ98ExhHcI3ti', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:14:06', '2020-09-27 23:14:06', NULL),
(89, 'Kylan Hoffman', 'Joel Kirkland', NULL, NULL, 'qesavozam@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$9wSKpYpjTv7ycsTLxlbw3O/Hd9NyhLCzQbo.LeAx5hCnYmH303sy2', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:15:21', '2020-09-27 23:15:21', NULL),
(90, 'Kasimir Dudley', 'Courtney Wilson', NULL, NULL, 'mykun@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$OCJZcs1oCaW5q8iINdVZvundeQOLwSx86OmJd4DHyu23WwZnY52Si', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:19:42', '2020-09-27 23:19:42', NULL),
(91, 'Nomlanga Herrera', 'Leroy Berg', NULL, NULL, 'satip@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$PW3tiW3.LehFIfmC96TNl.zouQQa1h.p897D4lAgze/gdniylRIuu', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:21:49', '2020-09-27 23:21:49', NULL),
(92, 'Cynthia Stephens', 'Zeph Glass', NULL, NULL, 'hehakovuxu@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$ygwbmkJKc89ODVEwKUMhWO75Cw7z.W3wNxd.Y5e7hHdmFZ092Klha', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:22:08', '2020-09-27 23:22:08', NULL),
(93, 'Tallulah Townsend', 'Graiden Graves', NULL, NULL, 'lufabilujy@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$7Jfex807ZTx6/oaKqQpAN.pbA5GD5va.lrj/a4eN2Dfxb1DhX86iC', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:36:58', '2020-09-27 23:36:58', NULL),
(94, 'Hedley Osborne', 'Cruz Stewart', NULL, NULL, 'hatuse@mailinator.com', '2020-09-27 19:00:00', NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$pA8pAKdLbOhaCq3rBq3.Mu2SbTCHoE59H4K9GzDE0YGvyY3S.mhmK', NULL, NULL, 0, NULL, NULL, '2020-09-27 23:39:41', '2020-09-27 23:39:41', NULL),
(95, 'Shana Alston', 'Dante Herman', '1601277652.png', NULL, 'favy@mailinator.com', '2020-09-27 19:00:00', NULL, 'this is description', 'Professional', 'Teacher', '4 Years', 'teacher', NULL, '$2y$10$a4BchHE9zxrEhFVmvlUvAelCQ4IRHAd7ndI7kD5Qk5NFduKhgNPy6', 'USA', NULL, 1, NULL, NULL, '2020-09-27 23:39:56', '2020-09-28 02:20:52', NULL),
(96, 'Noelle Combs', 'Hop Mccall', NULL, NULL, 'goqu@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$DxpPZiqBGYcuPFA.5RR12./AH2YhgSzd2C..Vs50Zti6TX9nTY4Um', NULL, NULL, 0, NULL, NULL, '2020-09-28 07:19:14', '2020-09-28 07:19:14', NULL),
(97, 'Gay Ferrell', 'Jennifer Ortega', NULL, NULL, 'sepokeg@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$s0oVG9NO6rS1DvTEHxcsCOgtudWm.OyG4W7wJiXvB5Saz9Oio4bC2', NULL, NULL, 0, NULL, NULL, '2020-09-28 07:20:34', '2020-09-28 07:20:34', NULL),
(98, 'Iliana Christian', 'Vivian Daniels', NULL, NULL, 'tawijixuby@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$4X8Rre/UZHKLbvCfuS120elzkEDw8rXfpmmjwIJlvjnZ93113Qz02', NULL, NULL, 0, NULL, NULL, '2020-09-28 07:38:48', '2020-09-28 07:38:48', NULL),
(99, 'Lee Baxter', 'Sophia Johnson', NULL, NULL, 'nunofyz@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$xlFRzzefCWizZNZ9BSekFuzvRXyyjxsguB0deYmp8z.apOJmzXP5q', NULL, NULL, 0, NULL, NULL, '2020-09-29 00:10:53', '2020-09-29 00:10:53', NULL),
(100, 'Lara Durham', 'Patrick Church', NULL, NULL, 'zacacypy@mailinator.com', '2020-09-28 19:00:00', NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$8wn4ogxDsOIBiSSpetm1KuYyVQWhVQifXhEC0wGieMJjltMuOKt9S', NULL, NULL, 0, NULL, NULL, '2020-09-29 01:21:55', '2020-09-29 01:21:55', NULL),
(101, 'Jessica Castro', 'Brynne Nieves', '1601360764.png', NULL, 'sixifubux@mailinator.com', '2020-09-28 19:00:00', NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$mQC5j3nRc3IVVYclWnmIB.pwBzO28cTPR4BMWN2FBLlwrx2XWLGz.', 'USA', NULL, 1, NULL, NULL, '2020-09-29 01:22:37', '2020-09-29 01:26:04', NULL),
(102, 'Regina Pratt', 'Emi Norman', '1601367627.png', NULL, 'lykica@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$hvLlkrBtyBSaOzxEGzLjQuRxqDyAjU7obZojbnL34KnASCQ.onpfi', 'USA', NULL, 1, NULL, NULL, '2020-09-29 02:01:49', '2020-09-29 03:20:27', NULL),
(103, 'Lilah Hernandez', 'Ethan Stokes', NULL, NULL, 'kodezidic@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$FsWZayNR2cgFbl2MEucLz.rmO64jlnubIpx3yplU396IxeGMqXtA.', NULL, NULL, 0, NULL, NULL, '2020-09-29 03:21:46', '2020-09-29 03:21:46', NULL),
(104, 'Emily Petersen', 'Rigel Carter', '1601620080.jpeg', NULL, 'shahzadwaris81@gmail.com', '2020-09-29 03:25:19', NULL, NULL, 'Secondry', NULL, NULL, 'student', NULL, '$2y$10$aifaSlpoMWQQwUV7c/T9W.kjbKSV/ETEsluneXm16BeMJt/NMBzwu', 'Germany', NULL, 1, NULL, NULL, '2020-09-29 03:24:31', '2020-10-02 01:28:00', NULL),
(105, 'Walter Chase', 'Aretha Vaughn', '1601646072.png', NULL, 'balenahet@mailinator.com', '2020-09-28 19:00:00', NULL, 'This is description', 'BS', 'Teacher', '5 Years', 'teacher', NULL, '$2y$10$p3S2m8ofLBnXKLmJ25Yqq.WGzjIJ4v0tFrPoqkbD1GabKtXM1bOXi', 'Germany', NULL, 1, NULL, NULL, '2020-09-29 03:37:11', '2020-10-02 08:41:12', NULL),
(106, 'Hanna Mooney', 'Destiny Frost', '1601369555.png', NULL, 'lijit@mailinator.com', '2020-09-28 19:00:00', NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$cu8ooBBT9WR9lncTThADguCsy7YPoMlK7OrtmIqUBni1.EbOQYiKK', 'USA', NULL, 1, '2020-09-01', NULL, '2020-09-29 03:37:35', '2020-09-29 03:52:35', NULL),
(107, 'Shahzad', 'Waris', NULL, NULL, 'shahzadwaris8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$RUIWnLv8fuPgptRtsy60Ae2FDyTEwSnO8kItXQOulAHJPxyrcc9eK', NULL, NULL, 0, NULL, NULL, '2020-10-01 00:51:10', '2020-10-01 00:51:10', NULL),
(108, 'Jin Strong', 'Vladimir Puckett', '1601541434.png', 'Chemistry,Urdu', 'huza@mailinator.com', '2020-09-30 19:00:00', NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$EeSuW7ZhAgiz7xK5zJBogu/0CUmE59/cnmFzq9Mln0QDXc37R5GYO', 'USA', NULL, 0, '2020-09-29', NULL, '2020-10-01 01:30:09', '2020-10-01 03:37:14', NULL),
(109, 'Zachary Gross', 'Stacey Dawson', '1601543398.png', 'Math,Chemistry,Urdu,shahzad', 'holafag@mailinator.com', '2020-09-30 19:00:00', NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$TskfgWgQkwHU/tt3bDU3GO.OUpWzwsfE5rfbNLod13FTQPDuarMyW', 'USA', NULL, 1, '2020-09-30', NULL, '2020-10-01 04:07:17', '2020-10-01 04:09:58', NULL),
(110, 'Christian Erickson', 'Kato Hebert', NULL, NULL, 'xosujyd@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$bX4cCDDkysvSq.VdEpMxGOKC0K0iswRedjauMe/HnkRWoRt1aJCAW', NULL, NULL, 0, NULL, NULL, '2020-10-01 04:48:35', '2020-10-01 04:48:35', NULL),
(111, 'Beck Sandoval', 'Meredith Morales', NULL, NULL, 'borilovoba@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$lqVshAydvEgRK.2rFHUhpO69qccTraCeI1weSCaKlpyIouQqAiJh.', NULL, NULL, 0, NULL, NULL, '2020-10-01 04:57:37', '2020-10-01 04:57:37', NULL),
(112, 'Jillian Hensley', 'Harrison Potts', '1601546593.png', 'Biology', 'liqakucep@mailinator.com', '2020-09-30 19:00:00', NULL, NULL, NULL, NULL, NULL, 'student', NULL, '$2y$10$Kp3WVMjsSXXIIvg7sAKv8e2e3SPmT2t8ImK3w2vHvf.Lm8Xmi70HO', 'USA', NULL, 1, 'Math', NULL, '2020-10-01 05:02:00', '2020-10-01 05:03:13', NULL),
(113, 'Kirk Vargas', 'Hiroko Day', NULL, NULL, 'bybepa@mailinator.com', NULL, NULL, NULL, '3', NULL, NULL, 'student', NULL, '$2y$10$AytxeYCAmn88motOE8pOfOWVKqo/8vOFCFxEFAU/W7JYn3AKDkEnS', NULL, NULL, 0, NULL, NULL, '2020-10-01 05:11:01', '2020-10-01 05:18:34', NULL),
(114, 'Iona Dominguez', 'Desirae Dennis', '1601548483.png', 'Biology,Chemistry', 'gira@mailinator.com', '2020-09-30 19:00:00', NULL, NULL, 'Secondry', NULL, NULL, 'student', NULL, '$2y$10$ADklFgeuhLqOhJruwiMGG.Jwej1HleBuyLTENquKVDMIuqLeo.6dO', 'USA', NULL, 1, 'Biology,Chemistry', NULL, '2020-10-01 05:18:58', '2020-10-01 05:34:43', NULL),
(115, 'Jermaine Black', 'Adria Schwartz', '1601646707.png', NULL, 'rykyraw@mailinator.com', '2020-10-01 19:00:00', NULL, 'This is descriptiion', 'BS', 'Teacher', '5 Years', 'teacher', NULL, '$2y$10$U/6g7xHPAuGO2ISMmIdI9uwhBeodgMzpdugIfmfSsaWuj1xGyihdi', 'USA', NULL, 1, NULL, NULL, '2020-10-02 08:50:23', '2020-10-02 08:51:47', NULL),
(116, 'Ralph Goodwin', 'Vielka Pruitt', NULL, NULL, 'karunu@mailinator.com', '2020-10-01 19:00:00', NULL, NULL, NULL, NULL, NULL, 'teacher', NULL, '$2y$10$oCXdq847Fi.vLsntVoQ4kuj6pgJrTZ1e3PrSed7jD/Zol1pZJOUXG', NULL, NULL, 0, NULL, NULL, '2020-10-02 11:11:31', '2020-10-02 11:11:31', NULL),
(117, 'Maxine Baldwin', 'Alexandra Huffman', '1594906778.jpeg', NULL, 'remequb@mailinator.com', '2020-10-01 19:00:00', NULL, 'description', 'education', 'Teacher', '4 Years', 'teacher', NULL, '$2y$10$mtmCYD5WSmzRg5BDSWJ2k.6Tx6eb.Dxl4eXfDIZtQ3wnkOkfB5dXG', 'USA', NULL, 1, NULL, NULL, '2020-10-02 11:35:58', '2020-10-02 11:36:44', NULL),
(118, 'Gregory Mcguire', 'Shelby Nguyen', '1601706464.png', 'Subject 1,subject 2', 'qujuporo@mailinator.com', '2020-10-02 19:00:00', NULL, NULL, 'Primary', NULL, NULL, 'student', NULL, '$2y$10$/12nVYiqtqpwgbjiDKIXtuulYjG750ROJQlUXkzdjLgF47w.qBGVS', 'Germany', NULL, 1, 'Subject 1,subject 2', NULL, '2020-10-03 01:26:36', '2020-10-03 01:27:44', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
