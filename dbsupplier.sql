-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 06:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsupplier`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_logs`
--

CREATE TABLE `attendance_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_logs`
--

INSERT INTO `attendance_logs` (`id`, `user_id`, `time_in`, `time_out`, `created_at`, `updated_at`) VALUES
(2, 43, '2023-05-09 13:30:47', '2023-05-09 17:00:00', '2023-05-07 05:30:47', '2023-05-07 11:54:49'),
(3, 4, '2023-05-12 12:07:27', '2023-05-12 12:23:21', '2023-05-10 04:07:27', '2023-05-10 04:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE `audit_trails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`id`, `user_id`, `name`, `date`, `activity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '35', 'Sunny', '2023-10-18', 'Sunny Added New Category', '2023-10-17 21:50:13', '2023-10-17 21:50:13', NULL),
(2, '35', 'Sunny', '2023-10-18', 'Sunny Added New Services', '2023-10-17 21:52:34', '2023-10-17 21:52:34', NULL),
(3, '35', 'Sunny', '2023-11-08', 'Sunny Added New Services', '2023-11-07 11:19:03', '2023-11-07 11:19:03', NULL),
(4, '35', 'Sunny', '2023-11-08', 'Sunny Added New Services', '2023-11-07 11:19:03', '2023-11-07 11:19:03', NULL),
(5, '35', 'Sunny', '2023-11-08', 'Sunny Deleted A Product', '2023-11-07 11:19:12', '2023-11-07 11:19:12', NULL),
(6, '35', 'Sunny', '2023-11-12', 'Sunny Added New Services', '2023-11-11 22:59:46', '2023-11-11 22:59:46', NULL),
(7, '35', 'Sunny', '2023-11-13', 'Sunny Successfully Ordered!', '2023-11-12 11:40:57', '2023-11-12 11:40:57', NULL),
(8, '4', 'Juan', '2023-11-13', 'Juan Added New Services', '2023-11-13 05:45:33', '2023-11-13 05:45:33', NULL),
(9, '83', 'Kate', '2023-11-14', 'Kate Added New Services', '2023-11-14 02:27:26', '2023-11-14 02:27:26', NULL),
(10, '84', 'Joy', '2023-11-14', 'Joy Successfully Ordered!', '2023-11-14 06:36:34', '2023-11-14 06:36:34', NULL),
(11, '83', 'Kate', '2023-11-14', 'Kate Deleted A Product', '2023-11-14 06:40:55', '2023-11-14 06:40:55', NULL),
(12, '83', 'Kate', '2023-11-14', 'Kate Deleted A Product', '2023-11-14 06:41:09', '2023-11-14 06:41:09', NULL),
(13, '84', 'Joy', '2023-11-15', 'Joy Successfully Ordered!', '2023-11-15 07:12:45', '2023-11-15 07:12:45', NULL),
(14, '83', 'Kate', '2023-11-15', 'Kate Added New Category', '2023-11-15 07:23:26', '2023-11-15 07:23:26', NULL),
(15, '87', 'Shiela Dayapera', '2023-11-24', 'Shiela Dayapera Added New Services', '2023-11-24 14:38:08', '2023-11-24 14:38:08', NULL),
(16, '88', 'Shaina May', '2023-11-24', 'Shaina May Successfully Ordered!', '2023-11-24 14:46:05', '2023-11-24 14:46:05', NULL),
(17, '87', 'Shiela', '2023-11-24', 'Shiela Update Order', '2023-11-24 14:47:23', '2023-11-24 14:47:23', NULL),
(18, '88', 'Shaina May', '2023-11-24', 'Shaina May Successfully Ordered!', '2023-11-24 14:54:54', '2023-11-24 14:54:54', NULL),
(19, '87', 'Shiela', '2023-11-24', 'Shiela Update Order', '2023-11-24 14:55:40', '2023-11-24 14:55:40', NULL),
(20, '87', 'Shiela', '2023-11-24', 'Shiela Update Order', '2023-11-24 14:56:57', '2023-11-24 14:56:57', NULL),
(21, '89', 'shasha', '2023-11-24', 'shasha Added New Services', '2023-11-24 15:25:41', '2023-11-24 15:25:41', NULL),
(22, '88', 'Shaina May', '2023-11-24', 'Shaina May Successfully Ordered!', '2023-11-24 15:30:34', '2023-11-24 15:30:34', NULL),
(23, '88', 'Shaina May', '2023-11-25', 'Shaina May Successfully Ordered!', '2023-11-24 16:00:27', '2023-11-24 16:00:27', NULL),
(24, '89', 'shasha', '2023-11-25', 'shasha Update Order', '2023-11-24 16:01:32', '2023-11-24 16:01:32', NULL),
(25, '87', 'Shiela', '2023-11-25', 'Shiela Added New Category', '2023-11-25 14:11:39', '2023-11-25 14:11:39', NULL),
(26, '87', 'Shiela', '2023-11-25', 'Shiela Added New Services', '2023-11-25 14:15:36', '2023-11-25 14:15:36', NULL),
(27, '87', 'Shiela', '2023-11-25', 'Shiela Added New Category', '2023-11-25 14:17:05', '2023-11-25 14:17:05', NULL),
(28, '87', 'Shiela', '2023-11-25', 'Shiela Update Order', '2023-11-25 14:34:11', '2023-11-25 14:34:11', NULL),
(29, '87', 'Shiela', '2023-11-25', 'Shiela Update Order', '2023-11-25 14:35:20', '2023-11-25 14:35:20', NULL),
(30, '87', 'Shiela', '2023-11-25', 'Shiela Update Order', '2023-11-25 14:35:57', '2023-11-25 14:35:57', NULL),
(31, '87', 'Shiela', '2023-11-25', 'Shiela Update A Product', '2023-11-25 14:46:21', '2023-11-25 14:46:21', NULL),
(32, '88', 'Shaina May', '2023-11-25', 'Shaina May Successfully Ordered!', '2023-11-25 14:51:49', '2023-11-25 14:51:49', NULL),
(33, '87', 'Shiela', '2023-11-25', 'Shiela Update Order', '2023-11-25 14:54:13', '2023-11-25 14:54:13', NULL),
(34, '87', 'Shiela', '2023-11-25', 'Shiela Update Order', '2023-11-25 14:55:16', '2023-11-25 14:55:16', NULL),
(35, '87', 'Shiela', '2023-11-28', 'Shiela Added New Category', '2023-11-28 14:18:12', '2023-11-28 14:18:12', NULL),
(36, '87', 'Shiela', '2023-11-28', 'Shiela Added New Category', '2023-11-28 14:18:47', '2023-11-28 14:18:47', NULL),
(37, '87', 'Shiela', '2023-11-28', 'Shiela Added New Services', '2023-11-28 14:22:10', '2023-11-28 14:22:10', NULL),
(38, '88', 'Shaina May', '2023-11-28', 'Shaina May Successfully Ordered!', '2023-11-28 14:28:38', '2023-11-28 14:28:38', NULL),
(39, '87', 'Shiela', '2023-11-28', 'Shiela Update Order', '2023-11-28 14:29:30', '2023-11-28 14:29:30', NULL),
(40, '89', 'shasha', '2023-12-03', 'shasha Added New Services', '2023-12-03 15:57:26', '2023-12-03 15:57:26', NULL),
(41, '88', 'Shaina May', '2023-12-04', 'Shaina May Successfully Ordered!', '2023-12-03 16:05:54', '2023-12-03 16:05:54', NULL),
(42, '89', 'shasha', '2023-12-10', 'shasha Added New Category', '2023-12-10 15:48:13', '2023-12-10 15:48:13', NULL),
(43, '89', 'shasha', '2023-12-11', 'shasha Added New Services', '2023-12-10 16:24:34', '2023-12-10 16:24:34', NULL),
(44, '87', 'Shiela', '2023-12-11', 'Shiela Update Order', '2023-12-11 14:29:10', '2023-12-11 14:29:10', NULL),
(45, '87', 'Shiela', '2023-12-11', 'Shiela Update Order', '2023-12-11 14:29:39', '2023-12-11 14:29:39', NULL),
(46, '87', 'Shiela', '2023-12-11', 'Shiela Update Order', '2023-12-11 14:30:02', '2023-12-11 14:30:02', NULL),
(47, '87', 'Shiela', '2023-12-11', 'Shiela Update Order', '2023-12-11 14:30:20', '2023-12-11 14:30:20', NULL),
(48, '88', 'Shaina May', '2023-12-11', 'Shaina May Successfully Ordered!', '2023-12-11 14:36:56', '2023-12-11 14:36:56', NULL),
(49, '88', 'Shaina May', '2023-12-11', 'Shaina May Successfully Ordered!', '2023-12-11 14:40:44', '2023-12-11 14:40:44', NULL),
(50, '87', 'Shiela', '2023-12-11', 'Shiela Update A Product', '2023-12-11 14:53:32', '2023-12-11 14:53:32', NULL),
(51, '88', 'Shaina May', '2023-12-12', 'Shaina May Successfully Ordered!', '2023-12-12 08:55:18', '2023-12-12 08:55:18', NULL),
(52, '90', 'Shayne', '2023-12-23', 'Shayne Added New Category', '2023-12-23 14:26:48', '2023-12-23 14:26:48', NULL),
(53, '90', 'Shayne', '2023-12-23', 'Shayne Added New Services', '2023-12-23 14:30:36', '2023-12-23 14:30:36', NULL),
(54, '90', 'Shayne', '2023-12-23', 'Shayne Update A Product', '2023-12-23 14:31:00', '2023-12-23 14:31:00', NULL),
(55, '88', 'Shaina May', '2023-12-23', 'Shaina May Successfully Ordered!', '2023-12-23 14:49:06', '2023-12-23 14:49:06', NULL),
(56, '87', 'Shiela', '2023-12-23', 'Shiela Update Order', '2023-12-23 14:51:57', '2023-12-23 14:51:57', NULL),
(57, '87', 'Shiela', '2023-12-23', 'Shiela Update Order', '2023-12-23 14:52:43', '2023-12-23 14:52:43', NULL),
(58, '87', 'Shiela', '2023-12-23', 'Shiela Update Order', '2023-12-23 14:53:11', '2023-12-23 14:53:11', NULL),
(59, '87', 'Shiela', '2023-12-23', 'Shiela Update Order', '2023-12-23 15:36:16', '2023-12-23 15:36:16', NULL),
(60, '88', 'Shaina May', '2023-12-29', 'Shaina May Successfully Ordered!', '2023-12-29 08:55:20', '2023-12-29 08:55:20', NULL),
(61, '87', 'Shiela', '2023-12-29', 'Shiela Update Order', '2023-12-29 08:56:45', '2023-12-29 08:56:45', NULL),
(62, '35', 'Sunny', '2023-12-30', 'Sunny Successfully Ordered!', '2023-12-30 08:35:33', '2023-12-30 08:35:33', NULL),
(63, '35', 'Sunny', '2023-12-30', 'Sunny Successfully Ordered!', '2023-12-30 08:54:19', '2023-12-30 08:54:19', NULL),
(64, '35', 'Sunny', '2024-01-01', 'Sunny Successfully Ordered!', '2024-01-01 09:49:07', '2024-01-01 09:49:07', NULL),
(65, '35', 'Sunny', '2024-01-01', 'Sunny Successfully Ordered!', '2024-01-01 10:17:15', '2024-01-01 10:17:15', NULL),
(66, '87', 'Shiela', '2024-01-01', 'Shiela Update A Product', '2024-01-01 15:51:12', '2024-01-01 15:51:12', NULL),
(67, '87', 'Shiela', '2024-01-01', 'Shiela Update A Product', '2024-01-01 15:51:28', '2024-01-01 15:51:28', NULL),
(68, '88', 'Shaina May', '2024-01-02', 'Shaina May Successfully Ordered!', '2024-01-02 06:19:22', '2024-01-02 06:19:22', NULL),
(69, '96', 'Orange Studios', '2024-01-04', 'Orange Studios Added New Services', '2024-01-04 10:33:16', '2024-01-04 10:33:16', NULL),
(70, '96', 'Orange Studios', '2024-01-04', 'Orange Studios Added New Services', '2024-01-04 10:37:06', '2024-01-04 10:37:06', NULL),
(71, '96', 'Orange Studios', '2024-01-04', 'Orange Studios Added New Services', '2024-01-04 10:37:55', '2024-01-04 10:37:55', NULL),
(72, '96', 'Orange Studios', '2024-01-04', 'Orange Studios Added New Services', '2024-01-04 10:38:41', '2024-01-04 10:38:41', NULL),
(73, '96', 'Orange Studios', '2024-01-04', 'Orange Studios Added New Services', '2024-01-04 10:39:11', '2024-01-04 10:39:11', NULL),
(74, '97', 'JJ AND P FOOD SERVICES AND CATERING', '2024-01-05', 'JJ AND P FOOD SERVICES AND CATERING Added New Category', '2024-01-05 08:55:31', '2024-01-05 08:55:31', NULL),
(75, '97', 'JJ AND P FOOD SERVICES AND CATERING', '2024-01-05', 'JJ AND P FOOD SERVICES AND CATERING Added New Services', '2024-01-05 09:03:15', '2024-01-05 09:03:15', NULL),
(76, '97', 'JJ AND P FOOD SERVICES AND CATERING', '2024-01-05', 'JJ AND P FOOD SERVICES AND CATERING Added New Services', '2024-01-05 09:06:06', '2024-01-05 09:06:06', NULL),
(77, '97', 'JJ AND P FOOD SERVICES AND CATERING', '2024-01-05', 'JJ AND P FOOD SERVICES AND CATERING Added New Services', '2024-01-05 09:09:17', '2024-01-05 09:09:17', NULL),
(78, '98', 'Luisiana', '2024-01-06', 'Luisiana Added New Category', '2024-01-06 07:55:08', '2024-01-06 07:55:08', NULL),
(79, '98', 'Luisiana', '2024-01-06', 'Luisiana Added New Services', '2024-01-06 07:59:39', '2024-01-06 07:59:39', NULL),
(80, '98', 'Luisiana', '2024-01-06', 'Luisiana Update A Product', '2024-01-06 08:00:03', '2024-01-06 08:00:03', NULL),
(81, '101', 'Hayme', '2024-01-07', 'Hayme Successfully Ordered!', '2024-01-07 06:49:16', '2024-01-07 06:49:16', NULL),
(82, '87', 'Shiela', '2024-01-09', 'Shiela Added New Services', '2024-01-09 09:26:11', '2024-01-09 09:26:11', NULL),
(83, '87', 'Shiela', '2024-01-11', 'Shiela Added New Category', '2024-01-11 12:36:27', '2024-01-11 12:36:27', NULL),
(84, '35', 'Sunny', '2024-01-19', 'Sunny Added New Services', '2024-01-19 02:03:25', '2024-01-19 02:03:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selected` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofevent` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `selected`, `prod_id`, `prod_qty`, `dateofevent`, `created_at`, `updated_at`) VALUES
(15, '4', 'true', '9', '1', NULL, '2024-01-14 13:19:42', '2024-01-15 02:45:25'),
(12, '100', 'true', '17', '1', NULL, '2024-01-06 08:38:52', '2024-01-06 08:46:19'),
(11, '96', 'true', '16', '1', NULL, '2024-01-04 10:42:02', '2024-01-07 06:45:12'),
(10, '35', 'true', '6', '1', NULL, '2024-01-01 14:08:47', '2024-01-01 14:11:07'),
(14, '88', 'true', '9', '1', NULL, '2024-01-10 11:00:25', '2024-01-15 02:45:25'),
(16, '4', NULL, '12', '1', NULL, '2024-01-14 13:21:53', '2024-01-14 13:21:53'),
(17, '88', NULL, '11', '1', NULL, '2024-01-18 04:42:29', '2024-01-18 04:42:29'),
(18, '4', NULL, '11', '1', NULL, '2024-01-19 01:20:47', '2024-01-19 01:20:47'),
(19, '4', NULL, '25', '1', NULL, '2024-01-19 01:22:24', '2024-01-19 01:22:24'),
(20, '4', NULL, '3', '1', NULL, '2024-01-19 01:31:19', '2024-01-19 01:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `popular` tinyint(4) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Videography and Photography', 'Videograph and Photography', 'Videography/Photography', 0, 1, '1697132218.png', '2023-10-11 17:36:58', '2023-10-11 17:39:29'),
(2, 'Venue and Places', 'Venue', 'Venue and Places', 0, 1, '1697133101.jpg', '2023-10-11 17:51:41', '2023-10-11 17:54:10'),
(3, 'Promo Package', 'Promo Package', 'Promo', 0, 1, '1697637012.jpg', '2023-10-17 21:50:12', '2023-10-17 21:50:12'),
(5, 'Cake and Pastries', 'Cake and Pastries', 'Delicous', 0, 1, '1700921499.jpg', '2023-11-25 14:11:39', '2023-11-25 14:17:05'),
(6, 'Favors and Gifts', 'Favor and Gifts', 'Pretty K', 0, 1, '1701181092.webp', '2023-11-28 14:18:12', '2023-11-28 14:18:47'),
(7, 'karekare', 'ulam', 'Kare-kare is a Philippine stew that features a thick savory peanut sauce. It is generally made from a base of stewed oxtail, beef tripe, pork hocks, calves\' feet, pig\'s feet or trotters, various cuts of pork, beef stew meat, and occasionally offal.', 1, 0, '1702223293.jpg', '2023-12-10 15:48:13', '2023-12-10 15:48:13'),
(8, 'Photographer', 'photographer', 'maganda', 0, 0, '1703341607.avif', '2023-12-23 14:26:47', '2023-12-23 14:26:47'),
(9, 'Catering', 'Catering', 'Food Services', 0, 0, NULL, '2024-01-05 08:55:31', '2024-01-05 08:55:31'),
(10, 'Hanabishi', 'Hanabishi', 'Aircon with Wi-Fi', 1, 0, NULL, '2024-01-06 07:55:08', '2024-01-06 07:55:08'),
(11, 'hsch', 'sfj', 'szfkjs', 0, 0, NULL, '2024-01-11 12:36:26', '2024-01-11 12:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeline_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comments`, `timeline_id`, `created_at`, `updated_at`) VALUES
(1, '75', 'dsad', '3', '2023-12-02 19:10:55', '2023-12-02 19:10:55'),
(2, '89', 'panget', '2', '2023-12-03 15:16:27', '2023-12-03 15:16:27'),
(3, '88', 'pangett nyooo pooo', '4', '2023-12-03 15:53:01', '2023-12-03 15:53:01'),
(4, '88', 'umayos kaa!!!', '4', '2023-12-03 15:54:12', '2023-12-03 15:54:12'),
(5, '100', 'pahingi po 1M', '5', '2024-01-06 08:38:09', '2024-01-06 08:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `number`, `message`, `created_at`, `updated_at`) VALUES
(1, 'sadsad', 'sadsad', 'asdsad', 'asdsad', '2023-12-06 11:13:04', '2023-12-06 11:13:04'),
(2, 'wqeqwe', 'weqwe', 'qweqwe', 'qweqwe', '2023-12-06 11:13:54', '2023-12-06 11:13:54'),
(3, 'dasd', 'sadsad', 'asdsad', 'asdasdad', '2023-12-06 11:14:33', '2023-12-06 11:14:33'),
(4, 'swsa', 'afa', 'adaada', 'dfcafa', '2023-12-11 14:32:15', '2023-12-11 14:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Lname` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mname` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `placeofBirth` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnumber` int(11) DEFAULT NULL,
  `homeAdd` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouseName` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alumniID` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearGrad` int(11) DEFAULT NULL,
  `department` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(4, 'LALAMOVE', 'https://www.lalamove.com/en-ph/', '2023-06-01 09:56:30', '2023-06-01 09:56:30'),
(5, 'Mr. Borzo', 'https://borzodelivery.com/ph/', '2023-06-01 10:02:08', '2023-06-01 10:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_14_020346_create_permission_tables', 2),
(6, '2022_03_14_020520_create_blogs_table', 3),
(7, '2020_11_20_100001_create_log_table', 4),
(8, '2022_03_24_033745_create_log_activity_table', 4),
(9, '2022_03_24_090730_create_log_activities_table', 4),
(10, '2022_03_25_101909_create_bsfacilities_table', 4),
(11, '2022_04_27_015638_create_audit_trails_table', 4),
(12, '2022_04_28_065920_create_samples_table', 4),
(15, '2022_05_05_021745_create_demogs_table', 6),
(14, '2022_05_18_073344_create_sample_demogs_table', 5),
(16, '2022_06_06_234436_create_categories_table', 7),
(17, '2022_06_07_033744_create_categories_table', 8),
(18, '2022_07_13_135159_create_samples_table', 9),
(19, '2022_07_23_025549_create_catalogs_table', 9),
(20, '2022_07_24_151644_create_assets_table', 9),
(21, '2022_07_24_174015_create_audit_trails_table', 10),
(22, '2022_07_25_045730_create_categories_table', 10),
(23, '2022_09_12_180116_create_projects_table', 10),
(25, '2018_08_10_034632_create_events_table', 11),
(26, '2022_11_06_035933_create_categories_table', 12),
(28, '2022_11_11_194216_create_products_table', 13),
(29, '2022_12_07_115056_create_carts_table', 14),
(30, '2022_12_07_171241_create_orders_table', 15),
(31, '2022_12_07_171705_create_order_items_table', 16),
(32, '2022_12_12_180400_create_pos_oders_table', 17),
(33, '2023_01_17_214944_create_pos_carts_table', 18),
(34, '2023_01_21_172756_create_transaction_pos_table', 19),
(35, '2023_01_21_154415_create_pos_order_details_table', 20),
(36, '2023_01_30_212833_create_reviews_table', 21),
(37, '2023_03_28_074404_create_attendance_logs_table', 22),
(38, '2023_03_29_160934_create_payment_qrs_table', 23),
(39, '2016_06_01_000001_create_oauth_auth_codes_table', 24),
(40, '2016_06_01_000002_create_oauth_access_tokens_table', 24),
(41, '2016_06_01_000003_create_oauth_refresh_tokens_table', 24),
(42, '2016_06_01_000004_create_oauth_clients_table', 24),
(43, '2016_06_01_000005_create_oauth_personal_access_clients_table', 24),
(44, '2020_11_27_095530_create_logs_table', 25),
(45, '2022_10_19_050930_create_mission_visions_table', 25),
(46, '2022_10_21_010744_create_infos_table', 25),
(47, '2023_05_12_140913_create_stocks_table', 26),
(48, '2023_05_27_002255_create_promos_table', 27),
(49, '2023_05_27_003839_create_promos_table', 28),
(50, '2023_06_03_012124_create_links_table', 29),
(51, '2023_10_30_015618_create_timelines_table', 30),
(52, '2022_10_23_114248_create_events_table', 31),
(53, '2022_11_15_123730_create_research_table', 31),
(54, '2022_12_04_064150_create_notifications_table', 31),
(55, '2023_11_13_010352_create_suppliers_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `mission_visions`
--

CREATE TABLE `mission_visions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `missionvision` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 21),
(4, 'App\\Models\\User', 35),
(4, 'App\\Models\\User', 43),
(4, 'App\\Models\\User', 49),
(4, 'App\\Models\\User', 50),
(4, 'App\\Models\\User', 52),
(4, 'App\\Models\\User', 75),
(4, 'App\\Models\\User', 76),
(4, 'App\\Models\\User', 81),
(4, 'App\\Models\\User', 87),
(4, 'App\\Models\\User', 89),
(4, 'App\\Models\\User', 90),
(4, 'App\\Models\\User', 96),
(4, 'App\\Models\\User', 97),
(4, 'App\\Models\\User', 98),
(5, 'App\\Models\\User', 88),
(5, 'App\\Models\\User', 101);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trackingNumber` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofevent` date DEFAULT NULL,
  `timeofevent` time(6) DEFAULT NULL,
  `typeofevent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `terms`, `status`, `message`, `trackingNumber`, `total_price`, `payment_method`, `code`, `dateofevent`, `timeofevent`, `typeofevent`, `image`, `created_at`, `updated_at`) VALUES
(1, '35', 'Sunny', 'lamasa', 'eyJpdiI6Im9BM21PbGZNSVdqOUdxQzUvMjB2RVE9PSIsInZhbHVlIjoiZGptVkFITnpzck9GZEVEK1FNWGZ6eVNPSVlQdldsODh3Uzdrcko1Wk9BYz0iLCJtYWMiOiIzMWY3NjkwOTZjNjE0NzBmMzI0NTJmNWZhNDkyYWY4NTY5ZTkyYzEzYzBhNzQ1NjI0MWE2MDU5ZWEwNzdlODA1IiwidGFnIjoiIn0=', 'eyJpdiI6IkhCZjNabEZvK0FGWDl5RXE4dDhnSUE9PSIsInZhbHVlIjoiZFJxVjRiTUJ3bG45OTJGVXVUNzRFUT09IiwibWFjIjoiZmIyOGFjNjYzNDBiODgyNTczMDgwNzIxZjQ5NmQ1ZDU2Y2QzMmE1ZDUzZGVjYTllYTMxMTJhM2Q5NGUzZTUwMiIsInRhZyI6IiJ9', 'eyJpdiI6IndzdGxjQlBwdGU5MDVqN3Urak80cHc9PSIsInZhbHVlIjoibTJ6dXJvZXF3M0NyU1A2T05RNXFrQT09IiwibWFjIjoiZGEyMTdkZTk0YjI3YWE3MzZlMWZlNmViZTNiZDgzNmE1NGJjOTlhNWI5ZWRhOGQzODA0YTBmNzM5ODNlZDYwYiIsInRhZyI6IiJ9', 'eyJpdiI6InVkRmtlOEg0allhWTc2VUNXNzhzcnc9PSIsInZhbHVlIjoiRTh4SHVPb3FOVldTam9LZDczQ041UT09IiwibWFjIjoiMWIwNjVhMmNkMTVhZTQzMjQ3OWQ2OTBjMzZlZjlhYTk3ZTI1YzY1ZWUxNzQxYzQxOGMwM2JkOWVhYTZjOTA3NiIsInRhZyI6IiJ9', 'eyJpdiI6IkVPWmpTRXIrU2U5RHdLanJmT2VUM0E9PSIsInZhbHVlIjoiR3FPN2pKWWVEbDRWNjhFR21pZVczdz09IiwibWFjIjoiNTY1MDgwMDJiOTQ2NWQ5NWY5YTQ1OTNkZWMyNjUyMTVlZDY2ZTQ4NjkwNDBkNzdhNmVjZGFhMjZjNWUwNDI3YiIsInRhZyI6IiJ9', 'eyJpdiI6IjZuZnAvWm1LQ0UwMnEvaFRadW9TS1E9PSIsInZhbHVlIjoiYzZVa2pUdUpoRmhtbXljUkpoRjRyQT09IiwibWFjIjoiZTBhMGRlZTA1YzViNDdmODViOGJmZWYyZDg5ZGM1NzhkOGJjMzQ2MGRkYTFmMjc2NTRmZjU2MzQ0ZmY4ZTg2OSIsInRhZyI6IiJ9', NULL, 'eyJpdiI6InZoay90d01yRXVnSzNab1B4U05vVGc9PSIsInZhbHVlIjoiWjkrOTF6VU1IY0lhUjh1ZGkzNzZSUT09IiwibWFjIjoiZGNiYjRlNzUyYzJhNmExMDRhNzJkNjViNDNiZjFiMWRlNDUyNWI2YjAyYzBlMDdkMGUyMDJhNzYwNjkzM2Q2ZCIsInRhZyI6IiJ9', 1, 'Book Placed', NULL, 'ALIVE8993', '12000', 'GCASH', NULL, '2024-01-09', '18:00:00.000000', NULL, '1704104235.png', '2024-01-01 10:17:15', '2024-01-01 10:17:15'),
(2, '88', 'Shaina May', 'Dayapera', 'eyJpdiI6InpZVW5rRG51eXdFWi9vbHhGLzlKNVE9PSIsInZhbHVlIjoiK2RMV2NXNHVPYndEMFMzWmk1NmZpdEVraTRJM2xhMTkrL1VEeTJVWUpKYz0iLCJtYWMiOiJkNzgyNDZiMmIyMDM2OWIzZGU5YWY0NjhmNTY1ZmUxNmY1YTkxYjdkMDllMDNhMzU0NWMzYzg2ZWZmNzA0ZmVlIiwidGFnIjoiIn0=', 'eyJpdiI6IlNLZC9SbmFBVnMvT2JXbTZkSTFKeWc9PSIsInZhbHVlIjoiSUFLVDFOKzNhTGNVQS83WDh3aVlOQT09IiwibWFjIjoiYjVjMThhMWNlN2RkY2QyOTc0ZDc1M2QxZDFmZjA4MmE1Mjc3MjViMjk2NTk0NGM0MzlmMmM5YTAxOGE5YWZkMyIsInRhZyI6IiJ9', 'eyJpdiI6IlRjT1dHRG5aZDl6anpXMjdWZURvQlE9PSIsInZhbHVlIjoiZ1ZZSldGa3F3S0t3MWZ1SVAzMUZrUT09IiwibWFjIjoiYTE4ODIzMTIyYjhlMTAxMGRlNTUxZTZjY2VmMTg0OGY2MjgyMjU2ZDE2MjU3OWMxNmRiZGU1MDI5ZGEzNTEyYiIsInRhZyI6IiJ9', 'eyJpdiI6IlFpMHNKUFFmU0pRbXpMVFhWcmdqdGc9PSIsInZhbHVlIjoiRG54bjdVRGRJNFZzRkhiVjVMdUEvN0hxMTN1WU9XTFd3djFqUDNXWUQxWT0iLCJtYWMiOiJjMzVlYWFlYTE5NzU0ZmI2NzExMWI1N2FlNTJlYmJiOWZlYjJhZTk3ZDFlNmYzNmZkNzU3OWM3MmRjZWMyODlkIiwidGFnIjoiIn0=', 'eyJpdiI6ImR4T0tGbXJGVERwdjB5dU5xUUNGTnc9PSIsInZhbHVlIjoiN2pMVm1rNWkvTGpidXh1ZWNmSjAyUT09IiwibWFjIjoiYmMxMWIwNmFkYTJlZTcxZWFhMWNkMTBmOWQzN2Q5ODQ2ODMwZjQwMTgxNjI4MTI4ZmY0NWJkMjY3MWNkN2EwZCIsInRhZyI6IiJ9', 'eyJpdiI6Ilh1OWc1bUp0SDhxSGR6eDhXN1lxZVE9PSIsInZhbHVlIjoicE9wbUpyQmNpT21Sdks1cXQxbndjUT09IiwibWFjIjoiNGU2MjhlNWEyMGIxYWJkZjk5OWU1NDg1MzI3MjQyMWMyM2ViMmQ2NzA0ZTliZmQxYjRmMTQ2MjhiYzE1ZTljNyIsInRhZyI6IiJ9', NULL, 'eyJpdiI6Ikl1TGthL2ZWM3lmYnMzUFV4d0gyRkE9PSIsInZhbHVlIjoiWERiUHNadXJZT0ErVFVBQXI2OWhEUT09IiwibWFjIjoiMzRjMDAzZWVmMDEzZjQ2YTNjNjhlODU5YTZkODEyNzZhNDMxMjczY2EzZjE5M2M1NmQ2OTZkNzFkY2Q4MTk1OCIsInRhZyI6IiJ9', 0, 'Book Placed', NULL, 'ALIVE8531', '17000', 'GCASH', NULL, '2024-01-13', '19:19:00.000000', NULL, '1704176362.png', '2024-01-02 06:19:22', '2024-01-02 06:19:22'),
(3, '101', 'Hayme', 'Romulo', 'eyJpdiI6IlhFSU5wazhoYk1TVFJ0U28zVDFyM2c9PSIsInZhbHVlIjoidVNPbFZhd2lGS2dOSmI2dUJyUy9NZz09IiwibWFjIjoiZTU1NGZjMjJiODM4ODc2MjRhZGExNDk2NzNkOGM0ZWQzNDg3OTZkYzY2MWI3NGZhM2Q5ZTFlNWVmZjRkMDY3YiIsInRhZyI6IiJ9', 'eyJpdiI6ImxFMVU2NDVwUVhtSjlLRTcwL3VvY1E9PSIsInZhbHVlIjoiaFR3empBS01WemNPTDR2RU5pa1gwZz09IiwibWFjIjoiMTM3ZjdjMTc0N2M1MDNhMDk1MDJlZGQxYmZjOTM1NDJhYzk5ZWZjMmYyNGQwNmZmZTU2NDA1NDM2YTEzZDdiYiIsInRhZyI6IiJ9', 'eyJpdiI6Inhwek5zSklhckxiT2taUURiLy9KeFE9PSIsInZhbHVlIjoiYXpGbDJwQmcxNHBrM1Y4QjVMS09ZQT09IiwibWFjIjoiNjNlNzFkYjZhMGYyNTIwNWRmYjMzZTFiODcxMzhiMWI3OTY1ZDVhNGFhZGM1OTBjYTgwNGNjN2NiYWE4ZTBlYiIsInRhZyI6IiJ9', 'eyJpdiI6InFLQy9XOGZFaDBwL2dSMFZiOTJuQlE9PSIsInZhbHVlIjoiVkM1NFdtejcxRjZBL1BZUWRLTWZ6UT09IiwibWFjIjoiOGZlYzYzYTRiMzc1N2I0NmUyMzg1ZGZlZWFkYTgyY2JiNzg0ODQwZGUyMjg1NWNmMzI3YTVhZDA1MjMyY2NjNiIsInRhZyI6IiJ9', 'eyJpdiI6IkNDNlVnc2srOVVKbFNkWFgrOEpCY2c9PSIsInZhbHVlIjoiRlJjWFlmcU9WMWMxQzZYakc3NE9EZz09IiwibWFjIjoiNGViZmQ1MTc3MDg2OTI4OTEzNDFmNzFkNzhhMDUzMTdlYTlhZjNkMDFlYTc2OWRmNzUyZWFkODNjZWNlZDVkMSIsInRhZyI6IiJ9', 'eyJpdiI6IllWa2RWQjdtTmMrRWkzT05kd3JHZ3c9PSIsInZhbHVlIjoiMnQ4OStiSERkcnpKaTlhNWF6VGxaUT09IiwibWFjIjoiNmI4ZmI1NDQ2ZDE0ODJjZDIwNjM1ZmZhMjZiMTYzYmQwMzIwYjJlZTQ0YjhhZjQ5ZmFkYjYyZTg5NjYxNjkwZSIsInRhZyI6IiJ9', NULL, 'eyJpdiI6InVVS2hyMTFsdTlZcGNTeEYxUm1EaEE9PSIsInZhbHVlIjoiRzJyQlZoK2t1RXJQT3FEcmljK2h1QT09IiwibWFjIjoiOWU2ZmRkNDJiODc4ODExMmVkOTVjYzRhZGJjMTRmZWIxZGI0MDRhOGQxODI2NzU1MDBhYjAxNzZkMmJiZjJhOSIsInRhZyI6IiJ9', 0, 'Book Placed', NULL, 'ALIVE3718', '13000', 'GCASH', NULL, '2024-01-09', '14:59:00.000000', NULL, '1704610156.png', '2024-01-07 06:49:16', '2024-01-07 06:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofevent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeofevent` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `prod_qty`, `price`, `dateofevent`, `timeofevent`, `created_at`, `updated_at`) VALUES
(1, '1', '15', '2', '5000', '2024-01-09', '18:00:00', '2024-01-01 10:17:15', '2024-01-01 10:17:15'),
(2, '1', '12', '2', '1000', '2024-01-09', '18:00:00', '2024-01-01 10:17:15', '2024-01-01 10:17:15'),
(3, '2', '9', '2', '8000', '2024-01-13', '19:19:00', '2024-01-02 06:19:22', '2024-01-02 06:19:22'),
(4, '2', '12', '1', '1000', '2024-01-13', '19:19:00', '2024-01-02 06:19:22', '2024-01-02 06:19:22'),
(5, '3', '16', '1', '13000', '2024-01-09', '14:59:00', '2024-01-07 06:49:16', '2024-01-07 06:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_qrs`
--

CREATE TABLE `payment_qrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_qrs`
--

INSERT INTO `payment_qrs` (`id`, `name`, `number`, `payment_type`, `image`, `created_at`, `updated_at`) VALUES
(1, 'John Christopher Dorotan', '8679451253', 'BPI', '1704120234.png', NULL, '2024-01-01 14:43:54'),
(2, 'John Christopher Dorotan', '+639553285212', 'GCASH', '1704120216.png', NULL, '2024-01-01 14:43:36'),
(3, 'Juan Dela Cruz', '0930084720', 'BDO', '1704120224.png', '2023-03-31 22:08:10', '2024-01-01 14:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-03-08 03:51:36', '2022-03-08 03:51:36'),
(2, 'role-create', 'web', '2022-03-08 03:51:36', '2022-03-08 03:51:36'),
(3, 'role-edit', 'web', '2022-03-08 03:51:36', '2022-03-08 03:51:36'),
(4, 'role-delete', 'web', '2022-03-08 03:51:36', '2022-03-08 03:51:36'),
(9, 'permission-create', 'web', '2022-03-08 00:00:00', NULL),
(10, 'permission-edit', 'web', '2022-03-15 00:32:36', '2022-03-15 00:32:36'),
(11, 'permission-destroy', 'web', '2022-03-15 00:34:07', '2022-03-15 02:28:34'),
(18, 'users-edit', 'web', '2022-05-25 18:23:33', '2022-05-25 18:23:33'),
(19, 'ManageCategory', 'web', '2022-11-02 20:10:13', '2022-11-02 20:10:13'),
(27, 'delete-entry', 'web', '2024-01-06 07:24:35', '2024-01-06 07:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 35, 'auth_token', '2f9f28f81b808b7ed0026935bf654f9f711b1f95f913a3af923cbbc2f3215062', '[\"*\"]', NULL, '2023-05-02 04:00:27', '2023-05-02 04:00:27'),
(2, 'App\\Models\\User', 4, 'auth_token', '6b028a471587f96e54736c37e6a6fb8df63a0538756469ebb3f0a038fc96274b', '[\"*\"]', NULL, '2023-05-02 06:37:14', '2023-05-02 06:37:14'),
(3, 'App\\Models\\User', 40, 'auth_token', '3986d8c18512884ebb03e783f0eabb56d4948f24ed3f4e0a2cc6285633cd3323', '[\"*\"]', NULL, '2023-05-04 14:43:43', '2023-05-04 14:43:43'),
(4, 'App\\Models\\User', 40, 'auth_token', '7c6ef1af5a79ff387b70513e912c607707e5ad4bb0776fda9b0b9041dd11b200', '[\"*\"]', NULL, '2023-05-04 15:06:56', '2023-05-04 15:06:56'),
(5, 'App\\Models\\User', 58, 'api_token', '0e4d0f05a20992e557000d9e802dc62b04c448c60bca96e2c0cbe29faa4ad2b2', '[\"*\"]', NULL, '2023-05-04 15:20:09', '2023-05-04 15:20:09'),
(6, 'App\\Models\\User', 59, 'api_token', '486f236f7efd55d949af5d001ef2d379847476fb2d161ec5e9d25c24c76e46e7', '[\"*\"]', NULL, '2023-05-05 00:53:05', '2023-05-05 00:53:05'),
(7, 'App\\Models\\User', 59, 'auth_token', '0b886406006ac3c66909561405cd5ac037e6b70c6958ad52368afc8e38c38122', '[\"*\"]', NULL, '2023-05-05 11:11:07', '2023-05-05 11:11:07'),
(8, 'App\\Models\\User', 35, 'auth_token', 'a57f1bf13211e43a7f817d6b73375d08aa2bacc5e6ce0fef868496297b9e5512', '[\"*\"]', NULL, '2023-05-05 11:12:31', '2023-05-05 11:12:31'),
(9, 'App\\Models\\User', 35, 'auth_token', 'b54d6df677285c8603d1bce7e8f32104017a759d67fff3c80cb21e66711845cc', '[\"*\"]', NULL, '2023-05-05 11:12:33', '2023-05-05 11:12:33'),
(10, 'App\\Models\\User', 35, 'auth_token', '07bff4229910c493db0a30d88e51598ba25730b7ad86f67876f3b043e6d8bdd1', '[\"*\"]', NULL, '2023-05-05 11:12:35', '2023-05-05 11:12:35'),
(11, 'App\\Models\\User', 4, 'auth_token', '8e665d1ab1ad0327d6234fe5c87ea941a2c4c43de210eafe6c59459d6b90370e', '[\"*\"]', NULL, '2023-05-05 11:13:19', '2023-05-05 11:13:19'),
(12, 'App\\Models\\User', 4, 'auth_token', 'cd8f614ef0062acebc42b2b0a835c36f7905b6dabea870571d9969db3f0e84b9', '[\"*\"]', NULL, '2023-05-05 11:13:20', '2023-05-05 11:13:20'),
(13, 'App\\Models\\User', 4, 'auth_token', 'a96ecc3769a1fc2f80f5926e80be2e2f0081668983041c908f2dd9f1d50cffec', '[\"*\"]', NULL, '2023-05-05 11:13:21', '2023-05-05 11:13:21'),
(14, 'App\\Models\\User', 4, 'auth_token', 'f17b0ba1ea98f2900e880367345c64453255b24a090d3547ece3cc0300168aac', '[\"*\"]', NULL, '2023-05-05 11:13:23', '2023-05-05 11:13:23'),
(15, 'App\\Models\\User', 4, 'auth_token', '1ebacbfddea7dc58e0a342ee9c521dbae315464a0da0475cf042513a017f6e89', '[\"*\"]', NULL, '2023-05-05 11:13:24', '2023-05-05 11:13:24'),
(16, 'App\\Models\\User', 40, 'auth_token', 'cf86355d6c55089718f0bc494a67e4c24fe46b6045df61c850db929eb066a1dd', '[\"*\"]', NULL, '2023-05-06 04:29:38', '2023-05-06 04:29:38'),
(17, 'App\\Models\\User', 40, 'auth_token', '985f1d97cca25102b6d8016409276e73d6b307d1cb07dbc904f31cc3c3d29ffb', '[\"*\"]', NULL, '2023-05-06 04:29:42', '2023-05-06 04:29:42'),
(18, 'App\\Models\\User', 40, 'auth_token', '5b08cc56854d1ce41154eb6f057873557cbe3b250e935d99ae5db034e1d985dd', '[\"*\"]', NULL, '2023-05-06 04:30:37', '2023-05-06 04:30:37'),
(19, 'App\\Models\\User', 40, 'auth_token', '80078a52f7deda31f9f74945ac8556df307e9814734c2d5755e0d463f3cd7f1b', '[\"*\"]', NULL, '2023-05-06 04:30:40', '2023-05-06 04:30:40'),
(20, 'App\\Models\\User', 4, 'auth_token', '28e34f78e3456ec7d0b0b53eae8538a0f3c19bbc751e996d8c027ed3b1e7cb73', '[\"*\"]', NULL, '2023-05-06 04:31:28', '2023-05-06 04:31:28'),
(21, 'App\\Models\\User', 61, 'api_token', '2060ae75c04ba000cfdeb915e996721e95e7b2b0d526204134d8531aa1197f66', '[\"*\"]', NULL, '2023-05-06 04:33:56', '2023-05-06 04:33:56'),
(22, 'App\\Models\\User', 61, 'auth_token', '8cf3aceaf4444c342502264807d405669c219e79a614c04e6f22d014a8580315', '[\"*\"]', NULL, '2023-05-06 04:34:31', '2023-05-06 04:34:31'),
(23, 'App\\Models\\User', 62, 'api_token', '239ee92d017816e2ceb2550132a432a619223e0a1b34b9864876fda609e875fb', '[\"*\"]', NULL, '2023-05-06 04:35:44', '2023-05-06 04:35:44'),
(24, 'App\\Models\\User', 4, 'auth_token', '48917b0b4c627f4fde57554031f8f0044b00b6dad5a7b8300e943a006113946f', '[\"*\"]', NULL, '2023-05-06 04:36:35', '2023-05-06 04:36:35'),
(25, 'App\\Models\\User', 4, 'auth_token', '6d38996b1c68f8ff170de011785c4860cf238d3df5bfa46d9c7f1f2594c564e2', '[\"*\"]', NULL, '2023-05-06 04:37:07', '2023-05-06 04:37:07'),
(26, 'App\\Models\\User', 4, 'auth_token', 'c5050756b0fff34b96c7ce5f4e05639310d81857b4bfbc70347c1aa879113ce6', '[\"*\"]', NULL, '2023-05-06 04:42:26', '2023-05-06 04:42:26'),
(27, 'App\\Models\\User', 4, 'auth_token', '32779f5ff24fa70f1831a81afe674fac5732c5e94449950a5cbc511b8af7a406', '[\"*\"]', NULL, '2023-05-06 05:23:26', '2023-05-06 05:23:26'),
(28, 'App\\Models\\User', 4, 'auth_token', 'a232cf0c496cafc9b12abb636b4a962c4d0c4716de4a9d978f893e333a29f079', '[\"*\"]', NULL, '2023-05-06 07:23:04', '2023-05-06 07:23:04'),
(29, 'App\\Models\\User', 63, 'api_token', '52316f9c8340812f970571bdb2053c77254d99c9d7e6bfd25165ca1b8c748abd', '[\"*\"]', NULL, '2023-05-06 07:34:19', '2023-05-06 07:34:19'),
(30, 'App\\Models\\User', 4, 'auth_token', '682e7604c98846f901b663f2d7b03345ee8bcdd3f2c697140308dfd9306b9695', '[\"*\"]', NULL, '2023-05-06 07:42:23', '2023-05-06 07:42:23'),
(31, 'App\\Models\\User', 4, 'auth_token', 'f901b13d88968b4ea7be2f53d2d1771a865c40afc42708cde869d3bec3a77088', '[\"*\"]', NULL, '2023-05-06 07:54:09', '2023-05-06 07:54:09'),
(32, 'App\\Models\\User', 4, 'auth_token', 'd600a4ccdcb50d11aa1ab41e71200bc6c40e288687b74182f719a4b51cdbf3a3', '[\"*\"]', NULL, '2023-05-06 08:04:49', '2023-05-06 08:04:49'),
(33, 'App\\Models\\User', 40, 'auth_token', '9bec719efa12c623861a84f4280c17ca20b2136e5e63e35528cf392caa505126', '[\"*\"]', NULL, '2023-05-06 08:11:59', '2023-05-06 08:11:59'),
(34, 'App\\Models\\User', 40, 'auth_token', '9c743cebee9c900fc665993b4568a85466aa37d00bf302273f879d049cd53656', '[\"*\"]', NULL, '2023-05-06 08:12:15', '2023-05-06 08:12:15'),
(35, 'App\\Models\\User', 40, 'auth_token', '56b0c338f9a8d6ff4e2f94ed71aa71fcbab4680369603693c4f9e69b102d3a2f', '[\"*\"]', NULL, '2023-05-06 08:13:03', '2023-05-06 08:13:03'),
(36, 'App\\Models\\User', 40, 'auth_token', '100804b34de27f6aff4366d090fb1cd033c93532879e7d1b5f8eafef1dd7d4ec', '[\"*\"]', NULL, '2023-05-06 08:13:35', '2023-05-06 08:13:35'),
(37, 'App\\Models\\User', 40, 'auth_token', '362a4d32effcbb1a61cae586b164cf8d25e6662d1b29ea9dad7fac22e9b1e8b9', '[\"*\"]', NULL, '2023-05-06 08:16:31', '2023-05-06 08:16:31'),
(38, 'App\\Models\\User', 40, 'auth_token', '38f309fdf552314b252d3211d83af4d0ef9060ef0882e556ca4d165b87499944', '[\"*\"]', NULL, '2023-05-06 08:25:26', '2023-05-06 08:25:26'),
(39, 'App\\Models\\User', 40, 'auth_token', '304f094e9054e0c8180ee41e8d288b7ff550ebe272ff5cf1fb8317eb9f255bd3', '[\"*\"]', NULL, '2023-05-06 08:25:50', '2023-05-06 08:25:50'),
(40, 'App\\Models\\User', 40, 'auth_token', '9b1d4157ddd56ae933cd193ddc21eac395406c2a72de88827e4702553e3fac10', '[\"*\"]', NULL, '2023-05-06 08:25:52', '2023-05-06 08:25:52'),
(41, 'App\\Models\\User', 40, 'auth_token', '394b72be0bd073d851410d4a57c1aa9881ea7f18b4fc76adda0f08a07aceb756', '[\"*\"]', NULL, '2023-05-06 08:26:09', '2023-05-06 08:26:09'),
(42, 'App\\Models\\User', 40, 'auth_token', '585d08e6cee9ac4c0de2d03f194486c3da0a86bf4ae57cebebc500da037bd565', '[\"*\"]', NULL, '2023-05-06 08:27:56', '2023-05-06 08:27:56'),
(43, 'App\\Models\\User', 40, 'auth_token', 'c9dd372abf4ac5bb6cb67728cf353dcb51e52beccff3edfd2e485e1a434a4633', '[\"*\"]', NULL, '2023-05-06 08:31:56', '2023-05-06 08:31:56'),
(44, 'App\\Models\\User', 40, 'auth_token', '14506989ef4b4c9b3ffb26fc86aea76308280cb27870b65f8d9f8abcd0ae2962', '[\"*\"]', NULL, '2023-05-06 08:32:07', '2023-05-06 08:32:07'),
(45, 'App\\Models\\User', 40, 'auth_token', '69e47773fbf22daaa059ae4b01bebcd2ae5df6216a57e008ac1b8ac75e2504d1', '[\"*\"]', NULL, '2023-05-06 08:33:28', '2023-05-06 08:33:28'),
(46, 'App\\Models\\User', 40, 'auth_token', 'dbb6ac21cc0697d144c5c38786a89d0be0a40ddc26c1dc47d160463f3bf0193b', '[\"*\"]', NULL, '2023-05-06 08:34:18', '2023-05-06 08:34:18'),
(47, 'App\\Models\\User', 40, 'auth_token', '894c95087d322adcaedd05d93b89fc41323e124378034e5b2c97306053d05634', '[\"*\"]', NULL, '2023-05-06 08:35:30', '2023-05-06 08:35:30'),
(48, 'App\\Models\\User', 40, 'auth_token', 'cf411c5d2e2fe2d45245720a1b2e6c5831d56cd76ba7351f20ec9a141b69ef40', '[\"*\"]', NULL, '2023-05-06 08:38:54', '2023-05-06 08:38:54'),
(49, 'App\\Models\\User', 40, 'auth_token', '21e84961d20a2f0d28083834e5c6be4e37536b2454ecfa9527b8fb65ce67012d', '[\"*\"]', NULL, '2023-05-06 08:47:15', '2023-05-06 08:47:15'),
(50, 'App\\Models\\User', 40, 'auth_token', 'b37ee99936e17c171a1642e8bd5cb6f8c499a57b983a51bcfc88e4f3ed8b9ee6', '[\"*\"]', NULL, '2023-05-06 08:48:04', '2023-05-06 08:48:04'),
(51, 'App\\Models\\User', 40, 'auth_token', '928763f2de32968d6b002e9d3f9d9ac1a813997295289f3a2d71e0af6b600ff7', '[\"*\"]', NULL, '2023-05-06 08:49:29', '2023-05-06 08:49:29'),
(52, 'App\\Models\\User', 40, 'auth_token', '40cf432e41c4b80535a6ef33cbecd81193f552e6f22dc992a749e964dbc3cf1d', '[\"*\"]', NULL, '2023-05-06 08:50:22', '2023-05-06 08:50:22'),
(53, 'App\\Models\\User', 40, 'auth_token', '555205f1f13b922dfe9500f1c750084d72fb30271e0e34ab4a1d80a587f1942b', '[\"*\"]', NULL, '2023-05-06 08:51:29', '2023-05-06 08:51:29'),
(54, 'App\\Models\\User', 40, 'auth_token', '960fe447b61ad36eefd781b630a39d92caa1857fc124c647509c20f1e816500d', '[\"*\"]', NULL, '2023-05-06 08:52:38', '2023-05-06 08:52:38'),
(55, 'App\\Models\\User', 40, 'auth_token', 'ec3627c83936d1daadb3f52c12a1afd3da7e0463cc9e45a5288af13e5c4ddf63', '[\"*\"]', NULL, '2023-05-06 08:53:42', '2023-05-06 08:53:42'),
(56, 'App\\Models\\User', 40, 'auth_token', '0437e0a43dc2e5ed9bed9688c968679c306430b5e2cb932f9db88334a8760bcd', '[\"*\"]', NULL, '2023-05-06 08:54:38', '2023-05-06 08:54:38'),
(57, 'App\\Models\\User', 40, 'auth_token', '1e0fa241566fbd0a80223a831db75977942d532359752708955bff13d8a96c62', '[\"*\"]', NULL, '2023-05-06 08:54:48', '2023-05-06 08:54:48'),
(58, 'App\\Models\\User', 40, 'auth_token', 'e29173b81e1a23c807f3c429cf903a2eb8e0883d0f1e9f64c22b1287246710e7', '[\"*\"]', NULL, '2023-05-06 08:56:22', '2023-05-06 08:56:22'),
(59, 'App\\Models\\User', 40, 'auth_token', 'f6e511041c617a8e1a0d55e412f3d4f62322d427c16f17ddc7ee3e2eaf2ef91c', '[\"*\"]', NULL, '2023-05-06 08:59:56', '2023-05-06 08:59:56'),
(60, 'App\\Models\\User', 64, 'api_token', '35ad138a90c6d33ba2bf183cdd2b0c2b744ad9f6d46013d7e07d0e6c02caae1d', '[\"*\"]', NULL, '2023-05-06 09:10:02', '2023-05-06 09:10:02'),
(61, 'App\\Models\\User', 64, 'auth_token', 'c82d720919219b3fe17c91ba5bc23c387d12e021bafcb811e777673680d5d662', '[\"*\"]', NULL, '2023-05-06 13:09:55', '2023-05-06 13:09:55'),
(62, 'App\\Models\\User', 64, 'auth_token', 'e83470df28301b5a24d90e981db1bd3d5a62190f60b52e5a6bdf9f486841d955', '[\"*\"]', NULL, '2023-05-06 13:11:27', '2023-05-06 13:11:27'),
(63, 'App\\Models\\User', 65, 'api_token', '221a82addb3dc0441dde6046764571220bbf21d95b9e99d4feaea3312741fb39', '[\"*\"]', NULL, '2023-05-06 16:22:10', '2023-05-06 16:22:10'),
(64, 'App\\Models\\User', 65, 'auth_token', '13476992fcf8d454300f130ad66c60b8f9331137b7c4369626534d5cc2c57116', '[\"*\"]', NULL, '2023-05-06 16:23:20', '2023-05-06 16:23:20'),
(65, 'App\\Models\\User', 40, 'auth_token', '23ad2649a7aa58512cf3938c458655f43937ff5dd8e09f83443e797415aa9789', '[\"*\"]', NULL, '2023-05-07 06:00:24', '2023-05-07 06:00:24'),
(66, 'App\\Models\\User', 40, 'auth_token', '1d14566a5686cae3dcfff380e38f51f83e894f584b692b7beb8fb337adad5edd', '[\"*\"]', NULL, '2023-05-07 06:01:51', '2023-05-07 06:01:51'),
(67, 'App\\Models\\User', 40, 'auth_token', 'df084e88d9261fae01ba7ce104cf5a0debfae8ac39a08c5a85e642b6022f2f39', '[\"*\"]', NULL, '2023-05-07 07:18:11', '2023-05-07 07:18:11'),
(68, 'App\\Models\\User', 40, 'auth_token', 'accdb25b241cb61a691e254e9e01ede4e81f7316973ecdfa00378b1ca56f31fb', '[\"*\"]', NULL, '2023-05-07 07:22:08', '2023-05-07 07:22:08'),
(69, 'App\\Models\\User', 40, 'auth_token', '711f14e588b0b1d409ae1693466dd91a7cd52c2038dfd6ee4ce268a68f9a42e5', '[\"*\"]', NULL, '2023-05-07 09:13:43', '2023-05-07 09:13:43'),
(70, 'App\\Models\\User', 40, 'auth_token', '79fd7d405aaa484975fb615c92dda16f7b47bff30b30e3bc95f609740cf67b47', '[\"*\"]', NULL, '2023-05-07 09:14:45', '2023-05-07 09:14:45'),
(71, 'App\\Models\\User', 40, 'auth_token', '84d89d5261291bbaa8eb33485e0969b829950dbf5bc568230fe0af9a24dbe5da', '[\"*\"]', NULL, '2023-05-07 09:16:17', '2023-05-07 09:16:17'),
(72, 'App\\Models\\User', 40, 'auth_token', '9a808f50c4108749de9ad1dd005f9e5a9733db05fc3a9daac51c8a73a0fdfffd', '[\"*\"]', NULL, '2023-05-07 09:41:05', '2023-05-07 09:41:05'),
(73, 'App\\Models\\User', 40, 'auth_token', 'e8c622a835bc54a3c11eac66be9505713d7810344c3bab5100e1a9aa20357a92', '[\"*\"]', NULL, '2023-05-08 18:11:34', '2023-05-08 18:11:34'),
(74, 'App\\Models\\User', 40, 'auth_token', '673aad0fa56b4350a337206df13f730d5a1178fcbf868815831fdd65aabb5604', '[\"*\"]', NULL, '2023-05-08 18:13:36', '2023-05-08 18:13:36'),
(75, 'App\\Models\\User', 40, 'auth_token', '37ecbfdcaf10356ca99a5c57b73c0e1f643dc49b0f8b46927e6b2ba395237c9c', '[\"*\"]', NULL, '2023-05-08 18:23:19', '2023-05-08 18:23:19'),
(76, 'App\\Models\\User', 40, 'auth_token', 'b9b4bee432db7c6833962dd96ddaf4aaaa99fd68720a448b9a45b03ee80e6761', '[\"*\"]', NULL, '2023-05-08 18:23:58', '2023-05-08 18:23:58'),
(77, 'App\\Models\\User', 40, 'auth_token', 'a77acbdae8f8129c0d0cdb200b2426a1181ad77243edcfba8f33db77f604cea9', '[\"*\"]', NULL, '2023-05-08 18:30:13', '2023-05-08 18:30:13'),
(78, 'App\\Models\\User', 40, 'auth_token', 'ba6d361acbf0772627d117002876a7af601eea6613f6197e8ac3ca559ad5d99c', '[\"*\"]', NULL, '2023-05-09 04:47:21', '2023-05-09 04:47:21'),
(79, 'App\\Models\\User', 40, 'auth_token', 'c568cecc54f9a20c197a03f00c2a738975075dac1625270e1c7ccddf1b79d256', '[\"*\"]', NULL, '2023-05-11 19:37:55', '2023-05-11 19:37:55'),
(80, 'App\\Models\\User', 40, 'auth_token', '1cb0866460b7df0094eee33e7c4cbf16dabc3a38fbd29f06a30221316ee12c94', '[\"*\"]', NULL, '2023-05-11 21:58:37', '2023-05-11 21:58:37'),
(81, 'App\\Models\\User', 40, 'auth_token', '54f3fd2312f5038f89b924d74eded490d76cac7def9ab80c982cbec18b89672a', '[\"*\"]', NULL, '2023-05-11 23:36:55', '2023-05-11 23:36:55'),
(82, 'App\\Models\\User', 40, 'auth_token', 'e6478dff85ae4246d8900ea5ef78aa76dcf9aadcaa8fb6d7dc1d3fb6557806ef', '[\"*\"]', NULL, '2023-05-12 00:02:02', '2023-05-12 00:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `pos_carts`
--

CREATE TABLE `pos_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_code` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_qty` int(11) NOT NULL DEFAULT 1,
  `product_price` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_oders`
--

CREATE TABLE `pos_oders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerContact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_oders`
--

INSERT INTO `pos_oders` (`id`, `customerName`, `customerContact`, `created_at`, `updated_at`) VALUES
(1, 'Sunny', '09288154947', '2023-03-30 19:18:30', '2023-03-30 19:18:30'),
(2, 'Sunny', '09288154947', '2023-03-30 19:20:21', '2023-03-30 19:20:21'),
(3, 'Sunny', '09288154947', '2023-03-30 19:20:37', '2023-03-30 19:20:37'),
(4, 'Sunny', '09288154947', '2023-03-30 19:20:54', '2023-03-30 19:20:54'),
(5, 'Sunny', '09288154947', '2023-03-30 19:21:05', '2023-03-30 19:21:05'),
(6, NULL, NULL, '2023-04-01 00:21:31', '2023-04-01 00:21:31'),
(7, NULL, NULL, '2023-04-01 00:22:20', '2023-04-01 00:22:20'),
(8, NULL, NULL, '2023-04-01 00:28:25', '2023-04-01 00:28:25'),
(9, NULL, NULL, '2023-04-01 00:28:54', '2023-04-01 00:28:54'),
(10, NULL, NULL, '2023-04-01 00:48:35', '2023-04-01 00:48:35'),
(11, NULL, NULL, '2023-04-01 00:49:00', '2023-04-01 00:49:00'),
(12, NULL, NULL, '2023-04-01 00:49:40', '2023-04-01 00:49:40'),
(13, NULL, NULL, '2023-04-01 00:50:08', '2023-04-01 00:50:08'),
(14, NULL, NULL, '2023-04-01 00:59:51', '2023-04-01 00:59:51'),
(15, NULL, NULL, '2023-04-01 01:00:21', '2023-04-01 01:00:21'),
(16, NULL, NULL, '2023-04-01 01:00:39', '2023-04-01 01:00:39'),
(17, 'Sunny', NULL, '2023-04-01 01:26:12', '2023-04-01 01:26:12'),
(18, 'Sunny', '09288154947', '2023-04-01 01:28:56', '2023-04-01 01:28:56'),
(19, 'Sunny', '09288154947', '2023-04-01 02:10:10', '2023-04-01 02:10:10'),
(20, 'Sunny', '09288154947', '2023-04-01 02:19:20', '2023-04-01 02:19:20'),
(21, 'Sunny', '09288154947', '2023-04-01 02:20:32', '2023-04-01 02:20:32'),
(22, 'Sunny', '09288154947', '2023-04-01 02:21:08', '2023-04-01 02:21:08'),
(23, 'Sunny', '09288154947', '2023-04-01 02:21:31', '2023-04-01 02:21:31'),
(24, 'Sunny', '09288154947', '2023-04-01 02:40:22', '2023-04-01 02:40:22'),
(25, 'Sunny', '09288154947', '2023-04-01 04:27:52', '2023-04-01 04:27:52'),
(26, 'Sunny', '09288154947', '2023-04-01 04:30:39', '2023-04-01 04:30:39'),
(27, 'Sunny', '09288154947', '2023-04-01 04:30:39', '2023-04-01 04:30:39'),
(28, 'Sunny', '09288154947', '2023-04-01 04:38:40', '2023-04-01 04:38:40'),
(29, 'Sunny', '09288154947', '2023-04-01 04:39:13', '2023-04-01 04:39:13'),
(30, 'Sunny', '09288154947', '2023-04-01 04:39:35', '2023-04-01 04:39:35'),
(31, 'Sunny', '09288154947', '2023-04-01 04:40:32', '2023-04-01 04:40:32'),
(32, 'Sunny', '09288154947', '2023-04-01 04:44:35', '2023-04-01 04:44:35'),
(33, 'Sunny', '09288154947', '2023-04-01 04:44:54', '2023-04-01 04:44:54'),
(34, 'Sunny', '09288154947', '2023-04-01 04:45:45', '2023-04-01 04:45:45'),
(35, 'Sunny', '09288154947', '2023-04-01 04:46:06', '2023-04-01 04:46:06'),
(36, 'Sunny', '09288154947', '2023-04-01 04:56:27', '2023-04-01 04:56:27'),
(37, 'Sunny', '09288154947', '2023-04-01 04:58:27', '2023-04-01 04:58:27'),
(38, 'Sunny', '09288154947', '2023-04-01 05:01:00', '2023-04-01 05:01:00'),
(39, 'Sunny', '09288154947', '2023-04-01 05:17:20', '2023-04-01 05:17:20'),
(40, 'Sunny', '09288154947', '2023-04-01 05:23:51', '2023-04-01 05:23:51'),
(41, 'Sunny', '09288154947', '2023-04-01 05:37:34', '2023-04-01 05:37:34'),
(42, 'Sunny', '09288154947', '2023-04-01 05:42:59', '2023-04-01 05:42:59'),
(43, 'Gab', '09224755330', '2023-04-08 15:14:09', '2023-04-08 15:14:09'),
(44, 'Gab', '09746433', '2023-04-08 15:17:51', '2023-04-08 15:17:51'),
(45, 'Sunny', '09288154947', '2023-04-21 16:36:10', '2023-04-21 16:36:10'),
(46, 'John Doe', '09481248616', '2023-04-26 11:13:48', '2023-04-26 11:13:48'),
(47, 'Sunny', '09288154947', '2023-04-26 11:52:17', '2023-04-26 11:52:17'),
(48, 'Jan', '093673531254', '2023-04-26 12:49:46', '2023-04-26 12:49:46'),
(49, 'Leo Lintag', '912223465', '2023-05-02 02:29:52', '2023-05-02 02:29:52'),
(50, 'cess', '0999999999', '2023-05-05 11:11:07', '2023-05-05 11:11:07'),
(51, 'Gab Navarro', '09345674213', '2023-05-14 13:46:21', '2023-05-14 13:46:21'),
(52, 'Gab Navarro', '09345674213', '2023-05-15 18:14:02', '2023-05-15 18:14:02'),
(53, 'Gab Navarro', '09345674213', '2023-05-15 21:00:39', '2023-05-15 21:00:39'),
(54, 'gab', '09874563412', '2023-05-15 22:06:59', '2023-05-15 22:06:59'),
(55, 'gab', '09874563412', '2023-05-15 22:08:06', '2023-05-15 22:08:06'),
(56, 'Gab', '09874563412', '2023-05-16 02:11:50', '2023-05-16 02:11:50'),
(57, 'gab', 'mjk', '2023-05-16 02:32:39', '2023-05-16 02:32:39'),
(58, 'Gab', '09874563412', '2023-05-16 02:37:25', '2023-05-16 02:37:25'),
(59, 'Gabriel Navarro', '092750961', '2023-05-16 15:11:01', '2023-05-16 15:11:01'),
(60, 'wfe', 'wfew', '2023-05-26 07:13:30', '2023-05-26 07:13:30'),
(61, 'Sunny', '09288154947', '2023-06-01 10:44:00', '2023-06-01 10:44:00'),
(62, 'Mary', '09288154947', '2023-06-01 10:47:07', '2023-06-01 10:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `pos_order_details`
--

CREATE TABLE `pos_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posOrder_id` int(11) DEFAULT NULL,
  `product_id` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posQuantity` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posPrice` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posDiscount` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posTotal_amount` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_order_details`
--

INSERT INTO `pos_order_details` (`id`, `posOrder_id`, `product_id`, `product_name`, `posQuantity`, `posPrice`, `posDiscount`, `posTotal_amount`, `created_at`, `updated_at`) VALUES
(1, 62, '2', 'Optimum Nutrition CREATINE 2500Caps', '3', '500', '0', '7500', '2023-06-01 10:47:07', '2023-06-01 10:47:07'),
(2, 62, '3', 'Vinyl Dumbbells Per Pair', '3', '2500', '0', '7500', '2023-06-01 10:47:08', '2023-06-01 10:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orig_price` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `exp_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `trending` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `user_id`, `name`, `slug`, `small_description`, `description`, `orig_price`, `selling_price`, `discount`, `exp_date`, `image`, `quantity`, `tax`, `status`, `trending`, `created_at`, `updated_at`) VALUES
(1, 1, 76, 'Delacruz Media Prod', 'Delacruz Media Prod', NULL, 'Delacruz Media Prod', '25000', '23000', NULL, NULL, '1697132835.maxresdefault (2).jpg', NULL, NULL, 0, 1, '2023-10-11 17:45:35', '2023-10-11 17:47:15'),
(2, 2, 76, 'Tagaytay Places', 'Tagaytay Places', NULL, 'Tagaytay Places', '35000', '33000', NULL, NULL, '1697133143.jpg', '-1', NULL, 0, 1, '2023-10-11 17:52:23', '2023-11-12 11:40:57'),
(3, 3, 76, 'Wedding Promo Package', 'Wedding Promo Package', NULL, 'Inclussion:\r\nVideo/Photo Coverage\r\nCatering\r\nVenue', '75000', '70000', NULL, NULL, '1697637154.jpg', NULL, NULL, 0, 1, '2023-10-17 21:52:34', '2023-10-17 21:52:34'),
(15, 8, 90, 'Shaina', 'Shaina', NULL, 'Panget', NULL, '5000', 5, NULL, '1703341836.avif', '-3', NULL, 0, 1, '2023-12-23 14:30:36', '2024-01-01 10:17:15'),
(6, 1, 35, 'sad', 'asd', NULL, 'sadsadd', '10000', '10000', NULL, NULL, '1699772385.jpg', '-1', NULL, 0, 1, '2023-11-11 22:59:45', '2024-01-01 09:49:07'),
(9, 1, 87, 'asdfg', 'asdf', NULL, 'asdfgxxcvbbvcx', NULL, '8000', 5, NULL, '1700836688.jfif', '-2', NULL, 1, 0, '2023-11-24 14:38:08', '2024-01-02 06:19:22'),
(8, 2, 83, 'Garden', 'ahaha', NULL, 'green', '20000', '15000', 10, NULL, '1699928846.jpg', '-2', NULL, 0, 1, '2023-11-14 02:27:26', '2023-11-15 07:12:45'),
(11, 5, 87, 'Sweet Treats', 'Sweet Treats', NULL, 'Cake', '1000', '800', 5, NULL, '1700921736.jpg', '0', NULL, 0, 1, '2023-11-25 14:15:36', '2023-12-29 08:55:20'),
(12, 6, 87, 'Craft Creation PH', 'Craft Creation PH', NULL, 'Craft Creation PH', '8000', '1000', 50, NULL, '1701181330.webp', '0', NULL, 0, 1, '2023-11-28 14:22:10', '2024-01-02 06:19:22'),
(13, 6, 89, 'necklace', 'mikasa diamond', NULL, 'order now!!\r\n\r\npm us!', '300', '250', 20, NULL, '1701619046.jpg', '0', NULL, 1, 1, '2023-12-03 15:57:26', '2023-12-11 14:36:56'),
(14, 7, 89, 'karekare', 'ulam', NULL, 'Kare-kare is a Philippine stew that features a thick savory peanut sauce. It is generally made from a base of stewed oxtail, beef tripe, pork hocks, calves\' feet, pig\'s feet or trotters, various cuts of pork, beef stew meat, and occasionally offal.', '100', '70', 10, NULL, '1702225474.jpg', '5', NULL, 1, 0, '2023-12-10 16:24:34', '2023-12-10 16:24:34'),
(16, 1, 96, 'Orange Studios', NULL, NULL, 'Wedding Package', NULL, '13000', 20, NULL, '1704364396.jpg', '0', NULL, 0, 0, '2024-01-04 10:33:16', '2024-01-07 06:49:16'),
(17, 1, 96, 'Orange Studios', NULL, NULL, 'Wedding Packages', NULL, '20000', 30, NULL, '1704364626.jpg', '10', NULL, 0, 0, '2024-01-04 10:37:06', '2024-01-04 10:37:06'),
(18, 1, 96, 'Orange Studios', NULL, NULL, 'Wedding Packages', NULL, '27000', 30, NULL, '1704364675.jpg', '10', NULL, 0, 0, '2024-01-04 10:37:55', '2024-01-04 10:37:55'),
(19, 1, 96, 'Orange Studios', NULL, NULL, 'Add ons', NULL, '16000', NULL, NULL, '1704364721.jpg', '10', NULL, 0, 0, '2024-01-04 10:38:41', '2024-01-04 10:38:41'),
(20, 1, 96, 'Orange Studios', NULL, NULL, 'Add Ons', NULL, '95', NULL, NULL, '1704364751.jpg', '10', NULL, 0, 0, '2024-01-04 10:39:11', '2024-01-04 10:39:11'),
(21, 9, 97, 'Cordon Bleu', 'Cordon Bleu', NULL, 'You can order this by per kilo.\r\n1kl is good for 8-10 pax.', NULL, '600', 5, NULL, '1704445395.jpg', '1', NULL, 0, 0, '2024-01-05 09:03:15', '2024-01-05 09:03:15'),
(22, 9, 97, 'Hardinera', 'Hardinera', NULL, 'You can order this by piece.\r\nSmall size 120.00\r\nMedium size 175.00\r\nLarge size 225.00', NULL, '175', 5, NULL, '1704445566.jpg', '5', NULL, 0, 0, '2024-01-05 09:06:06', '2024-01-05 09:06:06'),
(23, 9, 97, 'Pancit Palabok', 'Pancit Palabok', NULL, 'You can order this by any size.\r\nLarge size good for 20-25 persons 1,250.00\r\nMedium size good for 15-20 persons 950.00\r\nSmall size good for 10-15 persons 750.00', NULL, '1250.00', 5, NULL, '1704445757.jpg', '5', NULL, 0, 0, '2024-01-05 09:09:17', '2024-01-05 09:09:17'),
(24, 10, 98, 'Electric fan', 'Test', NULL, 'Test', NULL, '10000', 10, NULL, NULL, NULL, NULL, 0, 0, '2024-01-06 07:59:39', '2024-01-06 08:00:03'),
(25, 3, 87, 'jfkadj', 'lshf', NULL, 'fsj', NULL, '1233', 2, NULL, '1704792371.png', '10', NULL, 0, 0, '2024-01-09 09:26:11', '2024-01-09 09:26:11'),
(26, 1, 35, 'sample4', 'sampl4', NULL, 'sadasd', NULL, '10', NULL, NULL, '1705629805.png', '1', NULL, 0, 0, '2024-01-19 02:03:25', '2024-01-19 02:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_returns`
--

CREATE TABLE `product_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clientName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_returns`
--

INSERT INTO `product_returns` (`id`, `product_id`, `quantity`, `reason`, `created_at`, `updated_at`, `clientName`, `price`, `totalPrice`) VALUES
(4, '1', '1', 'damage', '2023-05-30 12:19:19', '2023-05-30 12:19:19', 'sample', '450', '450');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectId` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projectName` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectDetails` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectPrice` double DEFAULT NULL,
  `user_id` varchar(192) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectStatus` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectId`, `projectName`, `projectDetails`, `projectPrice`, `user_id`, `projectStatus`, `created_at`, `updated_at`) VALUES
(1, 'Pro-2022-001', 'Renovation of Itaas Elementary School', 'From 1st floor rooms up to 5th floor rooms', 2000000, 'Mr. Ramos Sr', 'for Approval', '2022-09-11 10:07:06', '2022-09-22 00:55:50'),
(13, 'Pro-2022-005', 'Road widening', 'Candelaria Road', 2000000, 'Mr. Ramos', 'for Approval', '2022-09-19 10:42:55', '2022-09-19 10:42:55'),
(12, 'Pro-2022-004', 'Road widening', 'Sariaya Highway', 2000000, 'Mr. Ramos', 'for Approval', '2022-09-19 10:41:17', '2022-09-19 10:41:17'),
(10, 'Pro-2022-002', 'Road widening', 'HighWay', 100000, 'Mr. Ramos', 'for Approval', '2022-09-11 10:29:21', '2022-09-11 10:29:21'),
(11, 'Pro-2022-003', 'Road widening', 'Sto Nino Street', 2000000, 'Mr. Ramos Sr', 'for Approval', '2022-09-19 10:40:29', '2022-09-19 10:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` decimal(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Available',
  `percent_off` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `code`, `type`, `value`, `status`, `percent_off`, `created_at`, `updated_at`) VALUES
(7, 'PRO3123', NULL, '200.00', 'unavailable', NULL, '2023-08-17 03:06:38', '2024-01-06 08:03:46'),
(8, 'PRO5251', NULL, '100.00', 'unavailable', NULL, '2023-11-25 14:17:56', '2023-11-25 14:51:49'),
(9, 'PRO2706', NULL, '20.00', 'unavailable', NULL, '2023-11-25 14:18:25', '2023-11-28 14:28:38'),
(10, 'PRO8217', NULL, '100.00', 'unavailable', NULL, '2023-12-03 15:58:53', '2023-12-03 15:59:53'),
(11, 'PRO1273', NULL, '50.00', 'unavailable', NULL, '2023-12-03 16:04:56', '2023-12-03 16:05:54'),
(12, 'PRO8165', NULL, '50.00', 'Available', NULL, '2023-12-11 14:48:33', '2023-12-11 14:48:33'),
(13, 'PRO5518', NULL, '100.00', 'Available', NULL, '2023-12-11 14:48:55', '2023-12-11 14:48:55'),
(14, 'PRO4713', NULL, '210.00', 'Available', NULL, '2023-12-11 14:49:08', '2023-12-11 14:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `researchTitle` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `researchStatus` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `researchDescription` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `user_review`, `rating`, `created_at`, `updated_at`) VALUES
(5, '88', '11', 'delicious', '5', '2023-11-28 14:27:08', '2023-11-28 14:27:08'),
(6, '88', '12', 'Pretty K', '5', '2023-11-28 14:51:51', '2023-11-28 14:51:51'),
(7, '88', '12', 'www', '1', '2023-12-23 16:35:42', '2023-12-23 16:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-03-08 03:51:59', '2022-03-08 03:51:59'),
(2, 'User', 'web', '2022-03-08 05:28:16', '2022-03-08 05:28:16'),
(4, 'Supplier', 'web', '2023-03-22 10:03:16', '2023-10-11 17:56:20'),
(5, 'Customer', 'web', '2023-11-11 23:47:56', '2023-11-11 23:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(9, 1),
(10, 1),
(11, 1),
(18, 1),
(19, 1),
(19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

CREATE TABLE `samples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `user_id`, `product_id`, `quantity`, `remarks`, `created_at`, `updated_at`) VALUES
(10, '4', 'Optimum Nutrition Micronized Creatine Powder', '23', 'Good Condition', '2023-05-24 23:25:27', '2023-05-24 23:25:27'),
(11, '4', 'Optimum Nutrition Micronized Creatine Powder', '4', 'Good Condition', '2023-05-24 23:35:45', '2023-05-24 23:35:45'),
(12, '4', 'Vinyl Dumbbells Per Pair', '100', 'Good Condition', '2023-05-24 23:37:32', '2023-05-24 23:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buspermit` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dticert` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birpermit` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpermit` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcert` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `application`, `buspermit`, `dticert`, `birpermit`, `mpermit`, `bcert`, `valid`, `pic`, `user_id`, `membership`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(14, NULL, NULL, NULL, NULL, '1704527345.jpg', NULL, NULL, NULL, '98', NULL, '100', 'Verified', '2024-01-06 07:49:05', '2024-01-09 03:42:35'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '90', NULL, '100', 'Verified', '2023-12-23 14:22:37', '2023-12-23 14:23:56'),
(13, '1704444806.pdf', NULL, '1704444806.jpg', NULL, NULL, NULL, '1704444806.jpg', '1704444806.jpg', '97', NULL, '100', 'Verified', '2024-01-05 08:53:26', '2024-01-09 03:42:54'),
(7, '1700838537.png', '1700838537.png', '1700838537.png', '1700838537.png', '1700838537.png', '1700838537.png', '1700838537.png', '1700838537.png', '89', NULL, '100', 'Verified', '2023-11-24 15:08:57', '2023-11-24 15:11:00'),
(6, '1700830479.jfif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '87', NULL, '100', 'Verified', '2023-11-24 12:54:39', '2023-11-24 14:31:12'),
(12, '1704364009.docx', NULL, '1704364009.jpg', '1704364009.jpg', NULL, '1704364009.jpg', '1704364009.jpg', '1704364009.jpg', '96', NULL, '100', 'Verified', '2024-01-04 10:26:49', '2024-01-07 06:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_1` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_2` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_3` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `description`, `image_1`, `image_2`, `image_3`, `remarks`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'sad', '1698767912.wedding-package.jpg', '1698767912.20191205182339_wedding-package.jpg', '1698767912.387538005_851027329756164_1520710297116955097_n.png', NULL, '4', '2023-10-29 14:12:14', '2023-10-30 23:58:32'),
(2, 'venue', '1700838463.jfif', '1700838463.jfif', '1700838463.jfif', NULL, '87', '2023-11-24 15:07:43', '2023-11-24 15:07:43'),
(3, 'welcome to the event of keme hahahahahahahaaaaahghghg', '1700839035.png', '1700839035.png', '1700839035.png', NULL, '87', '2023-11-24 15:17:15', '2023-12-11 14:47:19'),
(4, 'thankyou for sharing ur wonderful wedding!!!', '1701618594.png', '1701618594.png', '1701618594.png', NULL, '89', '2023-12-03 15:49:54', '2023-12-03 15:49:54'),
(5, 'Debut Photos', '1704364877.6.jpg', '1704364877.8.jpg', '1704364877.13.jpg', NULL, '96', '2024-01-04 10:40:46', '2024-01-04 10:41:17'),
(6, 'Christian World', '1704446028.312231691_135466265908477_8660014211974526580_n.jpg', '1704446028.309896881_135466295908474_5191687370633595847_n.jpg', '1704446028.312100199_135466352575135_5426234682950375357_n.jpg', NULL, '97', '2024-01-05 09:13:07', '2024-01-05 09:13:48'),
(7, 'ayuda', '1704529338.jpg', '1704529338.jpg', '1704529338.png', NULL, '98', '2024-01-06 08:22:18', '2024-01-06 08:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_pos`
--

CREATE TABLE `transaction_pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posOrder_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_amount` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentMethod` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_pos`
--

INSERT INTO `transaction_pos` (`id`, `posOrder_id`, `payment`, `change`, `transaction_date`, `transaction_amount`, `user_id`, `paymentMethod`, `created_at`, `updated_at`) VALUES
(1, '28', '0', '0', '2023-04-03', NULL, '2', 'cash', '2023-04-01 00:59:51', '2023-04-01 00:59:51'),
(2, '30', '0', '0', '2023-04-03', NULL, '2', 'cash', '2023-04-01 01:00:21', '2023-04-01 01:00:21'),
(3, '32', '0', '0', '2023-04-03', NULL, '2', 'cash', '2023-04-01 01:00:39', '2023-04-01 01:00:39'),
(4, '34', '0', '0', '2023-04-03', NULL, '2', 'cash', '2023-04-01 01:26:12', '2023-04-01 01:26:12'),
(5, '36', '1500', '600', '2023-04-03', NULL, '2', 'cash', '2023-04-01 01:28:56', '2023-04-01 01:28:56'),
(6, '38', '0', '0', '2023-04-03', NULL, '2', 'cash', '2023-04-01 02:10:10', '2023-04-01 02:10:10'),
(7, '40', '0', '0', '2023-04-03', NULL, '2', 'cash', '2023-04-01 02:19:20', '2023-04-01 02:19:20'),
(8, '42', '1000', '100', '2023-04-03', NULL, '2', 'cash', '2023-04-01 02:40:22', '2023-04-01 02:40:22'),
(9, '43', '0', '0', '2023-04-03', NULL, '2', 'cash', '2023-04-01 04:30:39', '2023-04-01 04:30:39'),
(10, '44', '0', '0', '2023-04-03', NULL, '2', 'cash', '2023-04-01 04:30:39', '2023-04-01 04:30:39'),
(11, '48', '1500', '300', '2023-04-03', '1200', '2', 'cash', '2023-04-01 04:40:32', '2023-04-01 04:40:32'),
(12, '49', '1200', '0', '2023-04-03', '1200', '2', 'cash', '2023-04-01 04:44:35', '2023-04-01 04:44:35'),
(13, '50', '1200', '0', '2023-04-03', '1200', '2', 'cash', '2023-04-01 04:44:54', '2023-04-01 04:44:54'),
(14, '51', '1000', '500', '2023-04-03', '500', '2', 'cash', '2023-04-01 04:45:45', '2023-04-01 04:45:45'),
(15, '52', '1000', '500', '2023-04-03', '500', '2', 'cash', '2023-04-01 04:46:06', '2023-04-01 04:46:06'),
(16, '53', '600', '100', '2023-04-03', '500', '2', 'cash', '2023-04-01 04:56:27', '2023-04-01 04:56:27'),
(17, '54', '3000', '500', '2023-04-03', '2500', '2', 'cash', '2023-04-01 04:58:27', '2023-04-01 04:58:27'),
(18, '55', '400', '0', '2023-04-03', '400', '2', 'cash', '2023-04-01 05:01:00', '2023-04-01 05:01:00'),
(19, '57', '3000', '100', '2023-04-03', '2900', '2', 'cash', '2023-04-01 05:17:20', '2023-04-01 05:17:20'),
(20, '58', '3000', '500', '2023-04-03', '2500', '2', 'cash', '2023-04-01 05:23:51', '2023-04-01 05:23:51'),
(21, '59', '0', '0', '2023-04-03', '500', '2', 'cash', '2023-04-01 05:37:34', '2023-04-01 05:37:34'),
(22, '60', '500', '100', '2023-04-03', '400', '2', 'cash', '2023-04-01 05:42:59', '2023-04-01 05:42:59'),
(23, '61', '0', '0', '2023-04-10', '1600', '2', 'cash', '2023-04-08 15:14:09', '2023-04-08 15:14:09'),
(24, '62', '1500', '300', '2023-04-10', '1200', '2', 'cash', '2023-04-08 15:17:51', '2023-04-08 15:17:51'),
(25, '63', '500', '100', '2023-04-24', '400', '2', 'cash', '2023-04-21 16:36:10', '2023-04-21 16:36:10'),
(26, '64', '1200', '0', '2023-04-28', '1200', '43', 'cash', '2023-04-26 11:13:48', '2023-04-26 11:13:48'),
(27, '66', '1500', '0', '2023-04-28', '1500', '4', 'cash', '2023-04-26 11:52:17', '2023-04-26 11:52:17'),
(28, '67', '1000', '500', '2023-04-28', '500', '43', 'cash', '2023-04-26 12:49:46', '2023-04-26 12:49:46'),
(29, '68', '500', '100', '2023-05-04', '400', '43', 'cash', '2023-05-02 02:29:52', '2023-05-02 02:29:52'),
(30, '69', '800', '0', '2023-05-16', '800', '43', 'cash', '2023-05-14 13:46:21', '2023-05-14 13:46:21'),
(31, '70', '1000', '200', '2023-05-17', '800', '57', 'cash', '2023-05-15 18:14:02', '2023-05-15 18:14:02'),
(32, '71', '1000', '200', '2023-05-17', '800', '57', 'cash', '2023-05-15 21:00:39', '2023-05-15 21:00:39'),
(33, '72', '1000', '200', '2023-05-17', '800', '57', 'cash', '2023-05-15 22:06:59', '2023-05-15 22:06:59'),
(34, '73', '3000', '500', '2023-05-17', '2500', '57', 'cash', '2023-05-15 22:08:06', '2023-05-15 22:08:06'),
(35, '74', '1000', '200', '2023-05-18', '800', '57', 'cash', '2023-05-16 02:11:50', '2023-05-16 02:11:50'),
(36, '75', '1000', '200', '2023-05-18', '800', '57', 'cash', '2023-05-16 02:32:39', '2023-05-16 02:32:39'),
(37, '77', '3000', '100', '2023-05-18', '2900', '57', 'cash', '2023-05-16 02:37:25', '2023-05-16 02:37:25'),
(38, '79', '500', '20', '2023-05-18', '480', '57', 'cash', '2023-05-16 15:11:01', '2023-05-16 15:11:01'),
(39, '81', '2000', '860', '2023-06-03', '1140', '4', 'BPI', '2023-06-01 10:44:00', '2023-06-01 10:44:00'),
(40, '2', '10000', '1000', '2023-06-03', '9000', '4', 'GCASH', '2023-06-01 10:47:08', '2023-06-01 10:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` int(11) NOT NULL DEFAULT 0,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` tinyint(4) DEFAULT NULL,
  `hourly_rate` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `supplierName`, `email_verified_at`, `password`, `terms`, `lname`, `dob`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `hourly_rate`, `image`, `remember_token`, `created_at`, `updated_at`, `mstatus`) VALUES
(35, 'Sunny', 'ynnuslamasa@gmail.com', NULL, '2023-04-22 19:47:39', '$2y$10$PUz6XIFS7BjXbHKNFUkH6ekQaxulDqYPHY9i.gODBIUWXhZgw8il.', 0, 'lamasa', NULL, '09288154947', 'Blk 12 Lot 3', 'Camella 2D', 'Muntinlupa City', 'Metro Manila', NULL, '1771', 1, NULL, '', 'L96fryGnukzqr7X5EH37A8e9djrbIjys2yPN29i2Zq5qOwcUk5VBVE7IyKNx', '2023-04-22 19:47:11', '2024-01-19 05:37:20', 'Inactive'),
(4, 'Juan', 'juandelacruz@gmail.com', 'Admin', '2023-03-28 19:12:54', '$2y$10$xcKmhT7XRZU.cErJkW6Bx.nF3qzcS4uhgDtlVBODfW62vmK9zzm6y', 0, 'Dela Cruz', NULL, '09288154947', 'Blk 12 Lot 3', 'Camella 2D', 'Muntinlupa City', 'Metro Manila', NULL, '1771', 1, '500', '1703621528.Loki.jpg', 'DkvS3Xky48jgtpPUdgo9xVj1bRndfzSj401jKPOswxOVOJ2irJdu1aLIanDY', '2022-05-25 15:26:17', '2024-01-19 01:32:26', 'Active'),
(75, 'Delacruz Media Prod', 'Delacruz@gmail.com', 'Delacruz Media Prod', '2023-03-28 19:12:54', '$2y$10$P2Qpv28ghe1MFPmLH20tDeterUAIz1an0VbKB/I9SN30DZcjDNhna', 0, NULL, NULL, NULL, NULL, NULL, 'Sta. Rosa', 'Laguna', NULL, NULL, 1, NULL, '1700548499.20191205182339_wedding-package.jpg', NULL, '2023-10-17 11:37:51', '2024-01-01 15:34:10', 'Inactive'),
(76, 'Marian', 'rivera@gmail.com', 'Rivera Catering Services', '2023-03-28 19:12:54', '$2y$10$GkkfrFmIiIrQfKmZ0VEscOe6tOfDEfDyWm3DM9OMHaZd0c.9OCV8W', 0, 'Rivera', '1995-10-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '1700548797.wedding-package.jpg', NULL, '2023-10-31 02:20:51', '2024-01-04 10:11:37', 'Inactive'),
(90, 'Shayne', 'shieladayapera08@gmail.com', 'Shayne', NULL, '$2y$10$p540HAdCIl0GICwNtE7PMe/kjHy8hUJS2Mwk8ChqU900rcKAvl8Um', 0, 'Dayapera', NULL, '09300286477', 'San Buenaventura', 'Patahan', 'Laguna', 'Luisiana', NULL, '4032', 4, NULL, '1703347685.279269861_1846935235697792_983813333794626828_n.jpg', NULL, '2023-12-23 14:22:37', '2024-01-01 15:32:26', 'Active'),
(87, 'Shiela', 'dayaperashayne@gmail.com', 'Shiela', NULL, '$2y$10$xEA/.U0s4vmiy6AzIEHfrOosyHq16Fby9KFoeIxTgJ3w6B1UCcTAO', 0, 'Dayapera', NULL, '09300286477', 'San Buenaventura', 'Patahan', 'Laguna', 'Luisiana', NULL, '4032', 4, NULL, '1700925394.-6309656667402383450_121.jpg', NULL, '2023-11-24 12:54:39', '2024-01-11 14:48:57', 'Active'),
(88, 'Shaina May', 'shainamaydayapera18@gmail.com', NULL, '2023-11-24 14:20:34', '$2y$10$9kuFvWOb/YDEZHvkyD4/cujI6yJmZ1PVx5W7yYUyCvCZDNrisX.bO', 0, 'Dayapera', '20002-05-10', '09072265418', 'Purok 4', 'San Buenaventura', 'Luisiana', 'Laguna', NULL, '4032', NULL, NULL, NULL, NULL, '2023-11-24 14:16:48', '2024-01-10 07:35:44', 'Active'),
(89, 'shasha', 'sshashaaa17@gmail.com', 'shasha', '2023-11-24 15:12:24', '$2y$10$KygBeguC7MLMI2N2/eBRoeanc7B5fXKJ1NP2hTRTpnz8dgOJcWRA2', 0, 'rml', NULL, '092222222', '22 st', '22 st', 'laguna', 'haha', NULL, '4032', 4, NULL, '1700838888.ccs_logo-removebg-preview.png', 'Cko0ZiZFx1ti68qhZWuEVz3htWuYba7E4G3pGUFaakZdgiMyLmqfK66u7Xxd', '2023-11-24 15:08:57', '2023-12-03 14:29:50', NULL),
(96, 'Orange Studios', 'rapsingaj06@gmail.com', 'Orange Studios', NULL, '$2y$10$5BqcVpa7vqnFLxerEdtHouTplhPdJn3WjpyM1o.b9OY4ZEV64fbIu', 0, NULL, NULL, '09975634081', '93 Bonifacio Street', NULL, 'Laguna', 'Philippines', NULL, '4032', 4, NULL, '1704364534.368009706_268109912650657_3389033328006197796_n.jpg', NULL, '2024-01-04 10:26:49', '2024-01-04 10:35:34', 'Active'),
(97, 'Paul', 'loricopaul72.pl@gmail.com', 'JJ and P Food Services', NULL, '$2y$10$fU2/wGqf10EQHbCDMCgl2uGp7i0YkFU5uqvjtNeHnfvDpeDcIWtfS', 0, 'Lorico', NULL, '09658439700', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '1704445786.316671001_145347954920308_8765433973272609044_n.jpg', NULL, '2024-01-05 08:53:26', '2024-01-05 09:10:58', 'Active'),
(98, 'Luisiana', 'joshuasorajay@gmail.com', 'Juswa', NULL, '$2y$10$HUlD86VL668P3GqXrkHFT.d4RN7N9MVDdSjI0Zl2irFIsYSQUCDWq', 0, 'Orajay', NULL, '123456789', '1421', 'tasdfas', 'Taguig', 'Laguna`', NULL, '4032', 4, NULL, NULL, NULL, '2024-01-06 07:49:05', '2024-01-06 08:13:18', 'Active'),
(99, 'orajay', 'kulugodotkulugo@gmail.com', NULL, NULL, '$2y$10$Ogi78Iqf0JcLjHHCrI64tOmW2U/dbOm..OLraDtS6bDbMZzSmUyAW', 0, 'hjhh', '1943-10-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 08:32:49', '2024-01-06 08:32:49', NULL),
(100, 'teruwiotuweq', 'orajaysjoshua@gmail.com', NULL, NULL, '$2y$10$O.Dv7RL.NMJIDp9jUy3mzOp.gNGnumyWcWXpUwA2k2RUjjpZdB9Zy', 0, 'treiwutwoie', '1997-12-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 08:36:01', '2024-01-06 08:36:01', NULL),
(101, 'Hayme', 'zxcv@zxc.com', NULL, NULL, '$2y$10$36ctK.WGUpu83azvXbvr1ebGssWeIKvGWNyuYuSIgCkI5kOzNwsIS', 0, 'Romulo', '1997-08-19', '4112121212', '12121212', '12121', '121212', '21212', NULL, '121212', 0, NULL, NULL, NULL, '2024-01-07 06:43:51', '2024-01-09 09:17:01', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `audit_trails`
--
ALTER TABLE `audit_trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mission_visions`
--
ALTER TABLE `mission_visions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_qrs`
--
ALTER TABLE `payment_qrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pos_carts`
--
ALTER TABLE `pos_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_oders`
--
ALTER TABLE `pos_oders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_order_details`
--
ALTER TABLE `pos_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promos_code_unique` (`code`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_pos`
--
ALTER TABLE `transaction_pos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `audit_trails`
--
ALTER TABLE `audit_trails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `mission_visions`
--
ALTER TABLE `mission_visions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_qrs`
--
ALTER TABLE `payment_qrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `pos_carts`
--
ALTER TABLE `pos_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `pos_oders`
--
ALTER TABLE `pos_oders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pos_order_details`
--
ALTER TABLE `pos_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_returns`
--
ALTER TABLE `product_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction_pos`
--
ALTER TABLE `transaction_pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
