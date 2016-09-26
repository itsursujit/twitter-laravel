-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2016 at 05:24 PM
-- Server version: 5.6.31-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twitter_feed`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(0, 'Main Category', 0, '2016-09-26 09:31:09', '2016-09-26 09:31:09', 0, NULL),
(1, 'Necklace', 0, '2016-09-26 09:31:14', '2016-09-26 09:31:14', 0, NULL),
(2, 'Ring', 0, '2016-09-26 09:31:27', '2016-09-26 09:31:27', 0, NULL),
(5, 'Pauju', 0, '2016-09-26 03:42:16', '2016-09-26 03:42:16', 0, NULL),
(6, 'Gold Ring', 2, '2016-09-26 09:49:21', '2016-09-26 04:04:21', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_id` int(11) NOT NULL,
  `quantity` decimal(10,5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kaligards`
--

CREATE TABLE IF NOT EXISTS `kaligards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(70) NOT NULL,
  `middle_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nationality` varchar(70) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `id_card_type` varchar(50) NOT NULL,
  `id_card_image` varchar(255) NOT NULL,
  `joined_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `material_types`
--

CREATE TABLE IF NOT EXISTS `material_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `material_types`
--

INSERT INTO `material_types` (`id`, `title`, `description`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 'Chhapawal Gold', NULL, '2016-09-26 09:17:02', '2016-09-26 09:17:02', 0, NULL),
(2, 'Tejabi Gold', NULL, '2016-09-26 09:17:04', '2016-09-26 09:17:04', 0, NULL),
(3, 'Silver', NULL, '2016-09-26 09:17:07', '2016-09-26 09:17:07', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE IF NOT EXISTS `measurements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `weight_in_grams` decimal(10,5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `type`, `weight_in_grams`, `created_at`, `updated_at`) VALUES
(1, 'tola', 11.66400, '2016-09-26 05:10:30', '0000-00-00 00:00:00'),
(2, 'ser', 933.10000, '2016-09-26 05:10:30', '0000-00-00 00:00:00'),
(3, 'mound', 37.32400, '2016-09-26 05:10:30', '0000-00-00 00:00:00'),
(4, 'lal', 0.11664, '2016-09-26 05:10:30', '0000-00-00 00:00:00');

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
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_category` int(11) NOT NULL,
  `weight` decimal(10,5) NOT NULL,
  `additional_jarti` decimal(10,5) NOT NULL,
  `wages` decimal(10,5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `is_ready` tinyint(1) NOT NULL DEFAULT '0',
  `amount` decimal(10,5) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `material_description` varchar(500) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_transactions`
--

CREATE TABLE IF NOT EXISTS `purchase_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_id` int(11) NOT NULL,
  `purchased_date` date NOT NULL,
  `purchased_from` varchar(500) NOT NULL,
  `quantity` decimal(10,5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchase_transactions`
--

INSERT INTO `purchase_transactions` (`id`, `material_id`, `purchased_date`, `purchased_from`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, '2016-09-26', 'asdas', 4.00000, '2016-09-26 03:20:50', '2016-09-26 09:15:33', NULL),
(3, 1, '2016-09-20', 'Test Supplier', 400.00000, '2016-09-26 04:16:15', '2016-09-26 10:02:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recommended_friends`
--

CREATE TABLE IF NOT EXISTS `recommended_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `screen_name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recommended_friends`
--

INSERT INTO `recommended_friends` (`id`, `user_id`, `screen_name`) VALUES
(1, 0, 'jack'),
(2, 0, 'yukihiro_matz'),
(3, 0, 'JeffBezos');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_friends`
--

CREATE TABLE IF NOT EXISTS `twitter_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `screen_name` varchar(300) NOT NULL,
  `follow_him` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `current_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `twitter_friends`
--

INSERT INTO `twitter_friends` (`id`, `user_id`, `screen_name`, `follow_him`, `created_at`, `updated_at`, `current_user_id`) VALUES
(43, 0, 'jack', 1, '2016-09-15 02:30:12', '2016-09-15 23:52:52', 18),
(44, 0, 'yukihiro_matz', 1, '2016-09-15 02:30:12', '2016-09-15 23:52:59', 18),
(45, 0, 'JeffBezos', 1, '2016-09-15 02:30:12', '2016-09-15 23:53:04', 18),
(46, 0, 'jack', 1, '2016-09-15 02:34:18', '2016-09-15 02:39:32', 19),
(47, 0, 'yukihiro_matz', 1, '2016-09-15 02:34:18', '2016-09-16 03:13:09', 19),
(48, 0, 'JeffBezos', 1, '2016-09-15 02:34:18', '2016-09-16 03:13:13', 19),
(49, 0, 'jack', 1, '2016-09-20 21:42:57', '2016-09-20 21:43:57', 1),
(50, 0, 'yukihiro_matz', 1, '2016-09-20 21:42:57', '2016-09-20 21:44:18', 1),
(51, 0, 'JeffBezos', 1, '2016-09-20 21:42:57', '2016-09-20 21:44:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `twitter_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `twitter_id`) VALUES
(1, 'Sujit Baniya', '', '', 'X5DMYx3E9acKjVfdZCynmgDQhiSfMsZ8bAkPgNqjb7Ad2mnmbbcLT6EHtrof', '2016-09-20 21:42:57', '2016-09-20 21:45:04', '371078881'),
(2, 'Sujit Baniya', 'itsursujit@gmail.com', '$2y$10$P54EnuKfbXAFiAOs/qBmqei4ssNyPZwuS471GJy/TnUIkRPsSZUAm', '78Pu9A6tbZN4jm6bu07oOGgohB2x4dt8FWi6CMzoAfOos6f7I5qiKEaZjlp1', '2016-09-26 01:14:23', '2016-09-26 02:31:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `work_assignments`
--

CREATE TABLE IF NOT EXISTS `work_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kaligard_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kaligard_id` (`kaligard_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_assignment_details`
--

CREATE TABLE IF NOT EXISTS `work_assignment_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `quantity` decimal(10,5) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `returned_quantity` decimal(10,5) NOT NULL,
  `extra_quantity` decimal(10,5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignment_id` (`assignment_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material_types` (`id`);

--
-- Constraints for table `purchase_transactions`
--
ALTER TABLE `purchase_transactions`
  ADD CONSTRAINT `purchase_transactions_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material_types` (`id`);

--
-- Constraints for table `work_assignments`
--
ALTER TABLE `work_assignments`
  ADD CONSTRAINT `work_assignments_ibfk_1` FOREIGN KEY (`kaligard_id`) REFERENCES `kaligards` (`id`),
  ADD CONSTRAINT `work_assignments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `work_assignment_details`
--
ALTER TABLE `work_assignment_details`
  ADD CONSTRAINT `work_assignment_details_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `work_assignments` (`id`),
  ADD CONSTRAINT `work_assignment_details_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `material_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
