-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 10:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce-project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_banners`
--

CREATE TABLE `about_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'banner_default_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_banners`
--

INSERT INTO `about_banners` (`id`, `short_title`, `long_title`, `banner_photo`, `created_at`, `updated_at`) VALUES
(1, 'About us', 'Our company', 'evm2Q9S.jpg', NULL, '2022-07-28 07:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `about_client_items`
--

CREATE TABLE `about_client_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_client_items`
--

INSERT INTO `about_client_items` (`id`, `client_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 't5sOHdl.jpg', '2022-05-28 10:29:16', '2022-05-28 10:29:41', NULL),
(8, 'ErDMGsr.jpg', '2022-05-28 10:29:25', '2022-06-06 05:41:49', NULL),
(9, 'HEGSDaV.jpg', '2022-06-06 23:42:17', NULL, NULL),
(10, '2piv1bk.jpg', '2022-06-06 23:42:35', NULL, NULL),
(11, 'm2xajfo.png', '2022-07-27 13:03:06', NULL, NULL),
(12, 'C8oi5Zw.jpg', '2022-07-27 13:03:29', NULL, NULL),
(13, 'ubxfa1i.png', '2022-07-27 13:03:36', NULL, NULL),
(14, 'Bbh7HXU.jpg', '2022-07-27 13:03:49', NULL, NULL),
(15, 'J1JXOop.jpg', '2022-07-27 13:04:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_features`
--

CREATE TABLE `about_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `small_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_features`
--

INSERT INTO `about_features` (`id`, `small_title`, `long_description`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'consectetur adipisicing elit.', 'dolor sit amet consectetur adipisicing elit. Maxime mollitia,', 'FVWLKHm.webp', '2022-05-26 06:15:31', '2022-05-27 23:44:45', NULL),
(3, 'consectetur adipisicing .', 'reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'z8dL9wb.jpg', '2022-05-28 10:34:15', '2022-06-06 23:01:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_feature_social_icons`
--

CREATE TABLE `about_feature_social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_feature_social_icons`
--

INSERT INTO `about_feature_social_icons` (`id`, `social_icon`, `social_icon_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fa-facebook', 'https://www.facebook.com/', '2022-08-01 06:54:33', '2022-08-01 07:14:33', NULL),
(2, 'fa-twitter', 'https://twitter.com/', '2022-08-01 07:41:45', NULL, NULL),
(3, 'fa-linkedin', 'https://www.instagram.com/', '2022-08-01 07:42:53', NULL, NULL),
(4, 'fa-behance', 'https://www.behance.net/', '2022-08-01 07:45:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_services`
--

CREATE TABLE `about_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_services`
--

INSERT INTO `about_services` (`id`, `icon`, `title`, `short_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'fa-gear', 'Customer Relations', 'dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.', '2022-05-28 04:24:40', '2022-06-07 23:39:31', NULL),
(3, 'fa-cog', 'Global Collection', 'ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat.', '2022-05-28 10:30:48', '2022-06-07 23:39:14', NULL),
(4, 'fa-gear', 'Laborum provident c', 'Animi nisi officia dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat., consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat., consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat..', '2022-06-06 23:27:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_service_background_photos`
--

CREATE TABLE `about_service_background_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'service_bg_default_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_service_background_photos`
--

INSERT INTO `about_service_background_photos` (`id`, `background_photo`, `created_at`, `updated_at`) VALUES
(1, 'AkDB3Xw.jpg', NULL, '2022-06-08 01:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `about_teams`
--

CREATE TABLE `about_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_teams`
--

INSERT INTO `about_teams` (`id`, `name`, `designation`, `short_description`, `thumbnail_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'George Walker', 'Product Photographer', 'psum dolor sit amet, consectetur adipisicing itaque corporis .', 'GYJebVb.jpg', '2022-05-27 23:47:48', '2022-05-28 08:14:40', NULL),
(3, 'Mary Cool', 'Product Specialist', 'Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.', 'a843R5Q.png', '2022-05-27 23:57:07', '2022-05-28 08:15:43', NULL),
(4, 'Karry Pitcher', 'Product Expert', 'sit amet, consectetur adipisicing itaque corporis nulla.', 'TFuH0oF.png', '2022-05-28 10:33:04', '2022-05-28 10:33:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_team_social_icons`
--

CREATE TABLE `about_team_social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_team_social_icons`
--

INSERT INTO `about_team_social_icons` (`id`, `social_icon`, `social_icon_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fa-facebook', 'https://www.facebook.com/', '2022-08-01 07:23:26', '2022-08-01 07:23:54', NULL),
(2, 'fa-twitter', 'https://twitter.com/', '2022-08-01 07:45:26', NULL, NULL),
(3, 'fa-linkedin', 'https://www.instagram.com/', '2022-08-01 07:45:33', NULL, NULL),
(4, 'fa-behance', 'https://www.behance.net/', '2022-08-01 07:45:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_current_price` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `cart_to_amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_current_price`, `color_id`, `size_id`, `cart_to_amount`, `user_id`, `created_at`, `updated_at`) VALUES
(73, 14, 2500, 10, 10, 1, 8, '2023-03-30 10:07:06', '2023-03-30 10:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Shoes', '2022-06-02 08:58:27', '2022-06-02 09:18:08', NULL),
(3, 'women\'s fashion', '2022-06-02 09:13:02', '2022-06-02 09:25:01', NULL),
(4, 'watch', '2022-07-27 11:27:14', NULL, NULL),
(5, 'Mobile', '2022-07-27 11:27:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_variations`
--

CREATE TABLE `color_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_variations`
--

INSERT INTO `color_variations` (`id`, `color_name`, `color_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Red', '#dc0909', '2022-06-08 03:29:53', NULL, NULL),
(3, 'Green', '#0ec411', '2022-06-08 03:41:57', '2022-06-08 03:59:18', NULL),
(5, 'Black', '#000000', '2022-06-08 03:59:03', NULL, NULL),
(6, 'Blue', '#0d28af', '2022-06-08 03:59:14', '2022-06-08 03:59:25', '2022-06-08 03:59:25'),
(7, 'Olib', '#71be13', '2022-06-09 00:06:41', NULL, NULL),
(8, 'pink', '#f02475', '2022-06-09 00:42:33', NULL, NULL),
(10, 'DarkKhaki', '#9b7203', '2022-07-27 12:12:06', NULL, NULL),
(11, 'Pantone', '#087252', '2022-07-27 12:14:49', NULL, NULL),
(12, 'sky blue', '#449fab', '2022-07-27 12:28:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 'Shakib', 'shakib@gmail.com', 196548721, 'corporis ipsa voluptate corrupti elite.', '2022-06-01 23:51:43', NULL, NULL),
(21, 'Piper Mccray', 'gabezig@mailinator.com', 196548721, 'Sit et dolore cumque', '2022-06-01 23:52:02', NULL, NULL),
(23, 'Ahosan Habib', 'habib@gmail.com', 1698754874, 'Hello,', '2023-04-05 14:03:39', NULL, NULL),
(24, 'Hridoy', 'hridoy@gmail.com', 1968754215, 'hello', '2023-04-05 14:04:28', NULL, NULL),
(25, 'Montana Farley', 'dovetyg@gmail.com', 1968754215, 'Dolorem omnis perspi', '2023-04-05 14:13:31', '2023-04-05 14:49:20', '2023-04-05 14:49:20'),
(26, 'Montana Farley', 'dovetyg@gmail.com', 1968754215, 'Dolorem omnis perspi', '2023-04-05 14:18:24', '2023-04-05 14:49:13', '2023-04-05 14:49:13'),
(27, 'Lillian Fletcher', 'cuxafi@gmail.com', 1968754215, 'Ut ut est assumenda', '2023-04-05 14:50:14', '2023-04-05 14:50:23', '2023-04-05 14:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_banners`
--

CREATE TABLE `contact_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'banner_default_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_banners`
--

INSERT INTO `contact_banners` (`id`, `short_title`, `long_title`, `banner_photo`, `created_at`, `updated_at`) VALUES
(1, 'Contact us', 'Let\'s get in touch', 'xzlwnhX.jpg', NULL, '2022-07-28 08:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `contact_customers`
--

CREATE TABLE `contact_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_customers`
--

INSERT INTO `contact_customers` (`id`, `customer_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'rnDLdFl.jpg', '2022-06-01 00:12:27', '2022-07-27 13:00:35', '2022-07-27 13:00:35'),
(5, 'zX9ElVc.jpg', '2022-06-01 00:21:19', '2022-07-27 13:00:33', '2022-07-27 13:00:33'),
(6, 'CAL8JE1.jpg', '2022-07-27 13:00:52', NULL, NULL),
(7, '3JWwXVT.png', '2022-07-27 13:01:02', NULL, NULL),
(8, 'azz724X.jpg', '2022-07-27 13:01:39', NULL, NULL),
(9, 'hKe5zFk.jpg', '2022-07-27 13:01:52', NULL, NULL),
(10, 'tzkft6R.jpg', '2022-07-27 13:02:09', NULL, NULL),
(11, 'UYVCRNu.png', '2022-07-27 13:02:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_describes`
--

CREATE TABLE `contact_describes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_describes`
--

INSERT INTO `contact_describes` (`id`, `title`, `short_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Accordion Title One', 'Dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite', '2022-05-31 22:59:52', '2022-05-31 23:32:55', NULL),
(6, 'Accordion Title Three', 'Consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.', '2022-05-31 23:00:23', '2022-05-31 23:33:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_map_links`
--

CREATE TABLE `contact_map_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `embed_map_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_map_links`
--

INSERT INTO `contact_map_links` (`id`, `embed_map_link`, `created_at`, `updated_at`) VALUES
(1, 'https://maps.google.com/maps?q=24.017604796019416,%2090.41500042500104&t=&z=13&ie=UTF8&iwloc=&output=embed', NULL, '2022-07-26 10:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact_office_details`
--

CREATE TABLE `contact_office_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_office_details`
--

INSERT INTO `contact_office_details` (`id`, `title`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 'About our office', 'Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.', NULL, '2022-06-06 23:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `contact_social_icons`
--

CREATE TABLE `contact_social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_social_icons`
--

INSERT INTO `contact_social_icons` (`id`, `social_icon`, `social_icon_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fa-facebook', 'https://www.facebook.com/', '2022-08-01 07:32:01', '2022-08-01 07:32:17', NULL),
(2, 'fa-twitter', 'https://twitter.com/', '2022-08-01 07:45:55', NULL, NULL),
(3, 'fa-linkedin', 'https://www.instagram.com/', '2022-08-01 07:46:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Åland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia, Plurinational State of'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'CV', 'Cape Verde'),
(42, 'KY', 'Cayman Islands'),
(43, 'CF', 'Central African Republic'),
(44, 'TD', 'Chad'),
(45, 'CL', 'Chile'),
(46, 'CN', 'China'),
(47, 'CX', 'Christmas Island'),
(48, 'CC', 'Cocos (Keeling) Islands'),
(49, 'CO', 'Colombia'),
(50, 'KM', 'Comoros'),
(51, 'CG', 'Congo'),
(52, 'CD', 'Congo, the Democratic Republic of the'),
(53, 'CK', 'Cook Islands'),
(54, 'CR', 'Costa Rica'),
(55, 'CI', 'Côte d\'Ivoire'),
(56, 'HR', 'Croatia'),
(57, 'CU', 'Cuba'),
(58, 'CW', 'Curaçao'),
(59, 'CY', 'Cyprus'),
(60, 'CZ', 'Czech Republic'),
(61, 'DK', 'Denmark'),
(62, 'DJ', 'Djibouti'),
(63, 'DM', 'Dominica'),
(64, 'DO', 'Dominican Republic'),
(65, 'EC', 'Ecuador'),
(66, 'EG', 'Egypt'),
(67, 'SV', 'El Salvador'),
(68, 'GQ', 'Equatorial Guinea'),
(69, 'ER', 'Eritrea'),
(70, 'EE', 'Estonia'),
(71, 'ET', 'Ethiopia'),
(72, 'FK', 'Falkland Islands (Malvinas)'),
(73, 'FO', 'Faroe Islands'),
(74, 'FJ', 'Fiji'),
(75, 'FI', 'Finland'),
(76, 'FR', 'France'),
(77, 'GF', 'French Guiana'),
(78, 'PF', 'French Polynesia'),
(79, 'TF', 'French Southern Territories'),
(80, 'GA', 'Gabon'),
(81, 'GM', 'Gambia'),
(82, 'GE', 'Georgia'),
(83, 'DE', 'Germany'),
(84, 'GH', 'Ghana'),
(85, 'GI', 'Gibraltar'),
(86, 'GR', 'Greece'),
(87, 'GL', 'Greenland'),
(88, 'GD', 'Grenada'),
(89, 'GP', 'Guadeloupe'),
(90, 'GU', 'Guam'),
(91, 'GT', 'Guatemala'),
(92, 'GG', 'Guernsey'),
(93, 'GN', 'Guinea'),
(94, 'GW', 'Guinea-Bissau'),
(95, 'GY', 'Guyana'),
(96, 'HT', 'Haiti'),
(97, 'HM', 'Heard Island and McDonald Mcdonald Islands'),
(98, 'VA', 'Holy See (Vatican City State)'),
(99, 'HN', 'Honduras'),
(100, 'HK', 'Hong Kong'),
(101, 'HU', 'Hungary'),
(102, 'IS', 'Iceland'),
(103, 'IN', 'India'),
(104, 'ID', 'Indonesia'),
(105, 'IR', 'Iran, Islamic Republic of'),
(106, 'IQ', 'Iraq'),
(107, 'IE', 'Ireland'),
(108, 'IM', 'Isle of Man'),
(109, 'IL', 'Israel'),
(110, 'IT', 'Italy'),
(111, 'JM', 'Jamaica'),
(112, 'JP', 'Japan'),
(113, 'JE', 'Jersey'),
(114, 'JO', 'Jordan'),
(115, 'KZ', 'Kazakhstan'),
(116, 'KE', 'Kenya'),
(117, 'KI', 'Kiribati'),
(118, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 'KR', 'Korea, Republic of'),
(120, 'KW', 'Kuwait'),
(121, 'KG', 'Kyrgyzstan'),
(122, 'LA', 'Lao People\'s Democratic Republic'),
(123, 'LV', 'Latvia'),
(124, 'LB', 'Lebanon'),
(125, 'LS', 'Lesotho'),
(126, 'LR', 'Liberia'),
(127, 'LY', 'Libya'),
(128, 'LI', 'Liechtenstein'),
(129, 'LT', 'Lithuania'),
(130, 'LU', 'Luxembourg'),
(131, 'MO', 'Macao'),
(132, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(133, 'MG', 'Madagascar'),
(134, 'MW', 'Malawi'),
(135, 'MY', 'Malaysia'),
(136, 'MV', 'Maldives'),
(137, 'ML', 'Mali'),
(138, 'MT', 'Malta'),
(139, 'MH', 'Marshall Islands'),
(140, 'MQ', 'Martinique'),
(141, 'MR', 'Mauritania'),
(142, 'MU', 'Mauritius'),
(143, 'YT', 'Mayotte'),
(144, 'MX', 'Mexico'),
(145, 'FM', 'Micronesia, Federated States of'),
(146, 'MD', 'Moldova, Republic of'),
(147, 'MC', 'Monaco'),
(148, 'MN', 'Mongolia'),
(149, 'ME', 'Montenegro'),
(150, 'MS', 'Montserrat'),
(151, 'MA', 'Morocco'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NL', 'Netherlands'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine, State of'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Réunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'BL', 'Saint Barthélemy'),
(186, 'SH', 'Saint Helena, Ascension and Tristan da Cunha'),
(187, 'KN', 'Saint Kitts and Nevis'),
(188, 'LC', 'Saint Lucia'),
(189, 'MF', 'Saint Martin (French part)'),
(190, 'PM', 'Saint Pierre and Miquelon'),
(191, 'VC', 'Saint Vincent and the Grenadines'),
(192, 'WS', 'Samoa'),
(193, 'SM', 'San Marino'),
(194, 'ST', 'Sao Tome and Principe'),
(195, 'SA', 'Saudi Arabia'),
(196, 'SN', 'Senegal'),
(197, 'RS', 'Serbia'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leone'),
(200, 'SG', 'Singapore'),
(201, 'SX', 'Sint Maarten (Dutch part)'),
(202, 'SK', 'Slovakia'),
(203, 'SI', 'Slovenia'),
(204, 'SB', 'Solomon Islands'),
(205, 'SO', 'Somalia'),
(206, 'ZA', 'South Africa'),
(207, 'GS', 'South Georgia and the South Sandwich Islands'),
(208, 'SS', 'South Sudan'),
(209, 'ES', 'Spain'),
(210, 'LK', 'Sri Lanka'),
(211, 'SD', 'Sudan'),
(212, 'SR', 'Suriname'),
(213, 'SJ', 'Svalbard and Jan Mayen'),
(214, 'SZ', 'Swaziland'),
(215, 'SE', 'Sweden'),
(216, 'CH', 'Switzerland'),
(217, 'SY', 'Syrian Arab Republic'),
(218, 'TW', 'Taiwan'),
(219, 'TJ', 'Tajikistan'),
(220, 'TZ', 'Tanzania, United Republic of'),
(221, 'TH', 'Thailand'),
(222, 'TL', 'Timor-Leste'),
(223, 'TG', 'Togo'),
(224, 'TK', 'Tokelau'),
(225, 'TO', 'Tonga'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TN', 'Tunisia'),
(228, 'TR', 'Turkey'),
(229, 'TM', 'Turkmenistan'),
(230, 'TC', 'Turks and Caicos Islands'),
(231, 'TV', 'Tuvalu'),
(232, 'UG', 'Uganda'),
(233, 'UA', 'Ukraine'),
(234, 'AE', 'United Arab Emirates'),
(235, 'GB', 'United Kingdom'),
(236, 'US', 'United States'),
(237, 'UM', 'United States Minor Outlying Islands'),
(238, 'UY', 'Uruguay'),
(239, 'UZ', 'Uzbekistan'),
(240, 'VU', 'Vanuatu'),
(241, 'VE', 'Venezuela, Bolivarian Republic of'),
(242, 'VN', 'Viet Nam'),
(243, 'VG', 'Virgin Islands, British'),
(244, 'VI', 'Virgin Islands, U.S.'),
(245, 'WF', 'Wallis and Futuna'),
(246, 'EH', 'Western Sahara'),
(247, 'YE', 'Yemen'),
(248, 'ZM', 'Zambia'),
(249, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favicon_updates`
--

CREATE TABLE `favicon_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_favicon.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favicon_updates`
--

INSERT INTO `favicon_updates` (`id`, `favicon_photo`, `created_at`, `updated_at`) VALUES
(2, 'FtD7EvI.png', NULL, '2022-07-28 06:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `short_title`, `long_title`, `banner_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Best offers', 'New  Arrivals on sale', 'NZQGDgd.jpg', '2022-05-24 05:58:39', '2022-06-24 00:40:01', NULL),
(4, 'Flash Deals', 'Get your best product', 'ohGQlW5.jpg', '2022-06-02 10:47:23', NULL, NULL),
(5, 'last minute', 'Grab last minute deals', 'k18s3oP.jpg', '2022-06-02 10:53:38', '2022-06-02 11:04:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_features`
--

CREATE TABLE `home_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_features`
--

INSERT INTO `home_features` (`id`, `title`, `small_description`, `feature_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Laborum numquam blanditiis', 'repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium', 'BbiUGHW.jpg', '2022-05-24 09:24:36', '2022-05-24 09:52:09', NULL),
(4, 'Consequuntur voluptatum laborum', 'Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia', 'B1RYxQU.jpg', '2022-05-24 09:57:04', '2022-06-06 04:16:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_feature_heads`
--

CREATE TABLE `home_feature_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_feature_heads`
--

INSERT INTO `home_feature_heads` (`id`, `feature_title`, `created_at`, `updated_at`) VALUES
(1, 'About Products Clothing', NULL, '2022-06-02 11:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `home_feature_lists`
--

CREATE TABLE `home_feature_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_feature_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_feature_lists`
--

INSERT INTO `home_feature_lists` (`id`, `short_feature_list`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Lorem ipsum dolor sit amet', '2022-05-24 11:20:32', '2022-05-24 11:21:33', '2022-05-24 11:21:33'),
(3, 'Consectetur an adipisicing elit', '2022-05-24 11:20:52', NULL, NULL),
(4, 'It aquecorporis nulla aspernatur', '2022-05-24 11:21:01', NULL, NULL),
(5, 'Corporis, omnis doloremque', '2022-05-24 11:21:11', NULL, NULL),
(6, 'Non cum id reprehenderit', '2022-05-24 11:21:23', NULL, NULL),
(7, 'Non cum id reprehenderit', '2022-06-04 21:57:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logo_favicons`
--

CREATE TABLE `logo_favicons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_logo_photo.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo_favicons`
--

INSERT INTO `logo_favicons` (`id`, `logo_photo`, `created_at`, `updated_at`) VALUES
(2, 'sw5cPGS.png', NULL, '2022-07-28 06:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2022_05_23_132626_create_home_banners_table', 3),
(9, '2022_05_24_133250_create_home_features_table', 4),
(10, '2022_05_24_155525_create_home_feature_heads_table', 5),
(12, '2022_05_24_163314_create_home_feature_lists_table', 6),
(15, '2022_05_25_085055_create_about_banners_table', 8),
(16, '2022_05_26_074448_create_about_features_table', 9),
(18, '2022_05_28_045822_create_about_teams_table', 11),
(20, '2022_05_28_094855_create_about_services_table', 13),
(21, '2022_05_28_113423_create_about_service_background_photos_table', 14),
(23, '2022_05_28_135138_create_about_client_items_table', 15),
(26, '2022_05_29_232146_create_contact_banners_table', 17),
(29, '2022_05_31_121015_create_contact_office_details_table', 18),
(32, '2022_05_31_160105_create_contacts_table', 20),
(33, '2022_06_01_043416_create_contact_describes_table', 21),
(34, '2022_06_01_053645_create_contact_customers_table', 22),
(35, '2022_06_02_082534_create_our_product_banners_table', 23),
(36, '2022_06_02_140340_create_category_products_table', 24),
(37, '2022_06_03_085747_create_subcategory_products_table', 25),
(38, '2022_06_04_051839_create_product_items_table', 26),
(39, '2022_06_08_091602_create_color_variations_table', 27),
(40, '2022_06_08_092524_create_color_variations_table', 28),
(41, '2022_06_08_100546_create_size_variations_table', 29),
(42, '2022_06_08_123621_create_product_feature_photos_table', 30),
(46, '2022_06_09_060911_create_product_inventories_table', 31),
(48, '2022_06_19_054725_create_customers_table', 32),
(49, '2022_06_19_060017_add_field_to_user_table', 32),
(50, '2022_06_23_101621_create_carts_table', 33),
(51, '2022_06_25_063552_create_countries_table', 34),
(53, '2022_06_25_091027_create_shoppings_table', 35),
(55, '2022_06_27_094642_create_order_summaries_table', 36),
(57, '2022_06_27_103049_create_order_details_table', 37),
(58, '2022_07_26_045519_create_reviews_table', 38),
(59, '2022_07_26_161840_create_contact_map_links_table', 39),
(61, '2022_05_22_053128_add_fields_at_users_table', 40),
(68, '2022_07_28_115834_create_logo_favicons_table', 41),
(69, '2022_07_28_122116_create_favicon_updates_table', 42),
(70, '2022_05_27_140906_create_about_feature_social_icons_table', 43),
(71, '2022_05_28_061241_create_about_team_social_icons_table', 44),
(72, '2022_05_31_132340_create_contact_social_icons_table', 45);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(11, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 450, 'Customer Address', 'Processing', '62bc1a36d66a7', 'BDT'),
(12, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 280, 'Customer Address', 'Processing', '62bc2e3ecb916', 'BDT'),
(13, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 800, 'Customer Address', 'Pending', '62d42609306df', 'BDT'),
(14, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 800, 'Customer Address', 'Pending', '62d426340bcc9', 'BDT'),
(15, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 800, 'Customer Address', 'Pending', '62d4268358b4e', 'BDT'),
(16, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 800, 'Customer Address', 'Pending', '62d4274cd4093', 'BDT'),
(17, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 200, 'Customer Address', 'Pending', '62d4277a93230', 'BDT'),
(18, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 200, 'Customer Address', 'Pending', '62d4284c6148d', 'BDT'),
(19, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 80, 'Customer Address', 'Pending', '62d42893cd2ee', 'BDT'),
(20, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 80, 'Customer Address', 'Pending', '62d428c07fcca', 'BDT'),
(21, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 200, 'Customer Address', 'Pending', '62d428da91212', 'BDT'),
(22, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 430, 'Customer Address', 'Processing', '62d4293292d1e', 'BDT'),
(23, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 430, 'Customer Address', 'Processing', '62dea298dff5d', 'BDT'),
(24, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 900, 'Customer Address', 'Failed', '62dec9e8a299c', 'BDT'),
(25, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 900, 'Customer Address', 'Processing', '62deca4c0efd2', 'BDT'),
(26, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 280, 'Customer Address', 'Pending', '62df8334bcf9f', 'BDT'),
(27, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 280, 'Customer Address', 'Pending', '62df847e3b32a', 'BDT'),
(28, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 280, 'Customer Address', 'Pending', '62df849ce500d', 'BDT'),
(29, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 280, 'Customer Address', 'Pending', '62df84ab8b641', 'BDT'),
(30, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 500, 'Customer Address', 'Pending', '62df84f9335b6', 'BDT'),
(31, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 500, 'Customer Address', 'Pending', '62df8504a1f0e', 'BDT'),
(32, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 500, 'Customer Address', 'Pending', '62df8514080c3', 'BDT'),
(33, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 500, 'Customer Address', 'Pending', '62df8520c409a', 'BDT'),
(34, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 500, 'Customer Address', 'Pending', '62df8536ab802', 'BDT'),
(35, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 280, 'Customer Address', 'Pending', '62df85a59484b', 'BDT'),
(36, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 500, 'Customer Address', 'Processing', '62df85afd67a1', 'BDT'),
(37, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 400, 'Customer Address', 'Processing', '62dfd39ea1198', 'BDT'),
(38, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 2580, 'Customer Address', 'Processing', '62e7c90302407', 'BDT'),
(39, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 5880, 'Customer Address', 'Processing', '635dc3bf0ab38', 'BDT'),
(40, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 5080, 'Customer Address', 'Processing', '6363ee5a102b4', 'BDT'),
(41, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 3000, 'Customer Address', 'Pending', '642ddfb10e746', 'BDT'),
(42, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 3000, 'Customer Address', 'Processing', '642de00ba619b', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_summary_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_current_price` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_summary_id`, `product_id`, `product_current_price`, `color_id`, `size_id`, `amount`, `created_at`, `updated_at`) VALUES
(31, 29, 6, 350, 7, 3, 1, '2022-06-29 03:24:06', NULL),
(32, 30, 4, 200, 5, 5, 1, '2022-06-29 03:27:06', NULL),
(33, 31, 4, 200, 5, 5, 1, '2022-06-29 04:49:34', NULL),
(34, 32, 6, 350, 1, 1, 2, '2022-07-17 09:08:56', NULL),
(35, 42, 6, 350, 1, 1, 1, '2022-07-17 09:22:26', NULL),
(36, 43, 6, 350, 1, 1, 1, '2022-07-25 08:03:04', NULL),
(37, 44, 6, 350, 7, 3, 2, '2022-07-25 10:50:48', NULL),
(38, 45, 6, 350, 8, 4, 2, '2022-07-25 10:52:27', NULL),
(39, 46, 4, 200, 5, 5, 1, '2022-07-26 00:01:24', NULL),
(40, 47, 4, 200, 5, 3, 2, '2022-07-26 00:08:56', NULL),
(41, 48, 6, 350, 7, 3, 1, '2022-07-26 03:38:22', NULL),
(42, 49, 6, 350, 7, 3, 1, '2022-07-26 03:52:29', NULL),
(43, 49, 4, 200, 5, 5, 1, '2022-07-26 03:52:29', NULL),
(44, 50, 6, 350, 8, 4, 1, '2022-07-26 04:30:18', NULL),
(45, 51, 4, 200, 5, 5, 1, '2022-07-26 05:44:30', NULL),
(46, 52, 14, 2500, 5, 9, 1, '2022-08-01 06:37:22', NULL),
(47, 53, 13, 2900, 5, 10, 2, '2022-10-29 18:22:22', NULL),
(48, 54, 8, 5000, 5, 4, 1, '2022-11-03 10:37:45', NULL),
(49, 55, 15, 25000, 12, 4, 5, '2022-12-22 01:18:44', NULL),
(50, 56, 14, 2500, 5, 10, 2, '2023-04-05 14:52:08', NULL),
(51, 57, 13, 2900, 5, 10, 1, '2023-04-05 14:53:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_summaries`
--

CREATE TABLE `order_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_order_notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `shipping_charge` double(8,2) NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_summaries`
--

INSERT INTO `order_summaries` (`id`, `user_id`, `customer_name`, `customer_email`, `customer_country_id`, `customer_city_name`, `customer_address`, `customer_number`, `customer_order_notes`, `payment_method`, `sub_total`, `shipping_charge`, `grand_total`, `payment_status`, `order_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 2, 'Habib', 'habib@gmail.com', '19', 'Ctg', 'Id officia assumenda', '01326598754', 'asdf', 'online', 350.00, 100.00, 450.00, 'paid', 'delivered', '2022-06-29 03:24:06', '2023-04-05 14:55:19', '2023-04-05 14:55:19'),
(31, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'Commodi ab aliquam n', '01326598754', 'asdf', 'online', 200.00, 80.00, 280.00, 'paid', 'delivered', '2022-06-29 04:49:34', '2023-04-05 14:55:12', '2023-04-05 14:55:12'),
(32, 2, 'Habib', 'habib@gmail.com', '19', 'Ctg', 'Qui inventore consec', '01326598754', 'mnbv', 'online', 700.00, 100.00, 800.00, 'unpaid', 'processing', '2022-07-17 09:08:56', '2022-07-25 08:03:44', '2022-07-25 08:03:44'),
(33, 2, 'Habib', 'habib@gmail.com', '19', 'Ctg', 'Qui inventore consec', '01326598754', 'mnbv', 'online', 700.00, 100.00, 800.00, 'unpaid', 'processing', '2022-07-17 09:09:39', '2022-07-17 09:24:28', '2022-07-17 09:24:28'),
(34, 2, 'Habib', 'habib@gmail.com', '19', 'Ctg', 'Qui inventore consec', '01326598754', 'mnbv', 'cod', 700.00, 100.00, 800.00, 'unpaid', 'processing', '2022-07-17 09:10:27', '2022-07-17 09:24:22', '2022-07-17 09:24:22'),
(35, 2, 'Habib', 'habib@gmail.com', '19', 'Ctg', 'Qui inventore consec', '01326598754', 'mnbv', 'online', 700.00, 100.00, 800.00, 'unpaid', 'processing', '2022-07-17 09:10:59', '2022-07-17 09:24:14', '2022-07-17 09:24:14'),
(36, 2, 'Habib', 'habib@gmail.com', '19', 'Ctg', 'Qui inventore consec', '01326598754', 'mnbv', 'online', 700.00, 100.00, 800.00, 'unpaid', 'processing', '2022-07-17 09:14:20', '2022-07-17 09:24:06', '2022-07-17 09:24:06'),
(37, 2, 'Habib', 'habib@gmail.com', '103', 'kolkata', 'Qui inventore consec', '01326598754', 'xvvsds', 'online', 0.00, 200.00, 200.00, 'unpaid', 'processing', '2022-07-17 09:15:06', '2022-07-17 09:23:59', '2022-07-17 09:23:59'),
(38, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'Id officia assumenda', '01326598754', 'fghs', 'online', 0.00, 80.00, 80.00, 'unpaid', 'processing', '2022-07-17 09:19:32', '2022-07-17 09:23:48', '2022-07-17 09:23:48'),
(39, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'Id officia assumenda', '01326598754', 'fghs', 'online', 0.00, 80.00, 80.00, 'unpaid', 'processing', '2022-07-17 09:19:47', '2022-07-17 09:23:34', '2022-07-17 09:23:34'),
(40, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'Id officia assumenda', '01326598754', 'fghs', 'online', 0.00, 80.00, 80.00, 'unpaid', 'processing', '2022-07-17 09:20:32', '2022-07-17 09:23:20', '2022-07-17 09:23:20'),
(41, 2, 'Habib', 'habib@gmail.com', '103', 'kolkata', 'Id officia assumenda', '01326598754', 'dgfhsf', 'online', 0.00, 200.00, 200.00, 'unpaid', 'processing', '2022-07-17 09:20:58', '2022-07-17 09:23:08', '2022-07-17 09:23:08'),
(42, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'Id officia assumenda', '01326598754', 'dfg', 'online', 350.00, 80.00, 430.00, 'paid', 'processing', '2022-07-17 09:22:26', '2022-07-25 08:03:56', '2022-07-25 08:03:56'),
(43, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'Id officia assumenda', '01326598754', 'same note', 'online', 350.00, 80.00, 430.00, 'paid', 'delivered', '2022-07-25 08:03:04', '2022-07-28 11:06:30', NULL),
(44, 2, 'Justin Mcclure', 'merarusugo@mailinator.com', '103', 'kolkata', 'Sit quia velit aliq', '01326598754', 'Sit quo necessitatib', 'online', 700.00, 200.00, 900.00, 'unpaid', 'processing', '2022-07-25 10:50:48', '2022-07-25 10:52:55', '2022-07-25 10:52:55'),
(45, 2, 'Lael Hobbs', 'qelygi@mailinator.com', '103', 'kolkata', 'Eum ut expedita unde', '968', 'Cumque minus exceptu', 'online', 700.00, 200.00, 900.00, 'paid', 'processing', '2022-07-25 10:52:27', '2022-07-25 10:52:50', '2022-07-25 10:52:50'),
(46, 2, 'Cade Rosa', 'xylec@mailinator.com', '19', 'Dhaka', 'Fugiat in dolorum de', '01326598754', 'Consectetur volupta', 'online', 200.00, 80.00, 280.00, 'unpaid', 'on the way', '2022-07-26 00:01:24', '2022-07-28 11:06:38', NULL),
(47, 2, 'Simone Avila', 'syxyq@mailinator.com', '19', 'Ctg', 'Quisquam commodi ape', '01326598754', 'Et voluptate ut ipsa', 'online', 400.00, 100.00, 500.00, 'paid', 'processing', '2022-07-26 00:08:56', '2022-07-28 11:06:16', '2022-07-28 11:06:16'),
(48, 2, 'Hedwig Barr', 'zoxylyt@mailinator.com', '19', 'Dhaka', 'Laudantium porro mo', '01326598754', 'Dolores consequatur', 'cod', 350.00, 80.00, 430.00, 'paid', 'delivered', '2022-07-26 03:38:22', '2022-07-26 03:39:25', NULL),
(49, 2, 'Martina Mcknight', 'garosany@mailinator.com', '19', 'Ctg', 'Enim error qui duis', '01326598754', 'Voluptate est minus', 'cod', 550.00, 100.00, 650.00, 'paid', 'delivered', '2022-07-26 03:52:29', '2022-07-28 11:07:15', '2022-07-28 11:07:15'),
(50, 2, 'Sybill Carson', 'rywuhidyle@mailinator.com', '19', 'Dhaka', 'Facere corrupti nec', '01326598754', 'Sunt ea laudantium', 'cod', 350.00, 80.00, 430.00, 'paid', 'delivered', '2022-07-26 04:30:18', '2022-07-26 04:30:48', NULL),
(51, 5, 'sabibr', 'sabibr@gmail.com', '103', 'kolkata', 'Id officia assumenda', '01326598754', 'asdf', 'online', 200.00, 200.00, 400.00, 'paid', 'delivered', '2022-07-26 05:44:30', '2022-07-26 05:45:21', NULL),
(52, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'dsfsda', '01698578457', 'asdf', 'online', 2500.00, 80.00, 2580.00, 'paid', 'delivered', '2022-08-01 06:37:22', '2022-08-01 06:38:10', NULL),
(53, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'Dunmondi,Rod no 17', '01326598754', 'dunmondi', 'online', 5800.00, 80.00, 5880.00, 'paid', 'processing', '2022-10-29 18:22:22', '2022-10-29 18:22:42', NULL),
(54, 1, 'Sajidul islam', 'sajid@gmail.com', '19', 'Dhaka', 'Id officia assumenda', '01326598754', 'sadfds', 'online', 5000.00, 80.00, 5080.00, 'paid', 'processing', '2022-11-03 10:37:45', '2022-11-03 10:38:25', NULL),
(55, 7, 'Rofik', 'rofi@gmail.com', '19', 'Dhaka', 'Commodi ab aliquam n', '01365987548', 'sadgs', 'cod', 125000.00, 80.00, 125080.00, 'paid', 'delivered', '2022-12-22 01:18:44', '2022-12-22 01:22:49', NULL),
(56, 2, 'Habib', 'habib@gmail.com', '19', 'Dhaka', 'Dhaka', '01965875648', 'Dhaka', 'cod', 5000.00, 80.00, 5080.00, 'unpaid', 'processing', '2023-04-05 14:52:08', NULL, NULL),
(57, 2, 'Quynn Bryan', 'qufit@gmail.com', '19', 'Ctg', 'Suscipit est et iste', '01365978457', 'Harum aut sint velit', 'online', 2900.00, 100.00, 3000.00, 'paid', 'delivered', '2023-04-05 14:53:04', '2023-04-05 14:55:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `our_product_banners`
--

CREATE TABLE `our_product_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'banner_default_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_product_banners`
--

INSERT INTO `our_product_banners` (`id`, `short_title`, `long_title`, `banner_photo`, `created_at`, `updated_at`) VALUES
(3, 'NEW ARRIVALS', 'SIXTEEN PRODUCTS', 'CLawrAO.jpg', NULL, '2022-07-28 07:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_feature_photos`
--

CREATE TABLE `product_feature_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `feature_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_feature_photos`
--

INSERT INTO `product_feature_photos` (`id`, `product_id`, `feature_photo`, `created_at`, `updated_at`) VALUES
(25, 6, 'G4zm3NG.jpg', '2022-06-08 11:39:31', NULL),
(26, 6, 'fLM41UB.jpg', '2022-06-08 11:39:31', NULL),
(27, 6, 'ZGNHegJ.jpg', '2022-06-08 11:39:31', NULL),
(28, 4, 'rBDKtmV.jpg', '2022-06-08 11:40:16', NULL),
(29, 4, '2mnUgcI.jpg', '2022-06-08 11:40:16', NULL),
(30, 4, 's2Q1Bor.jpg', '2022-06-08 11:40:16', NULL),
(31, 4, 'wUXghrv.jpg', '2022-06-08 11:40:16', NULL),
(32, 14, 'piHeXML.jpg', '2022-07-27 12:17:48', NULL),
(33, 14, 'qbj5cYQ.jpg', '2022-07-27 12:17:48', NULL),
(34, 14, 'DErF92B.jpg', '2022-07-27 12:17:48', NULL),
(35, 13, 'OzIcYTK.jpg', '2022-07-27 12:19:33', NULL),
(36, 13, 'u2v2094.jpg', '2022-07-27 12:19:33', NULL),
(37, 13, 'ZPDChO5.jpg', '2022-07-27 12:19:33', NULL),
(38, 12, 'i1oRq2T.jpg', '2022-07-27 12:21:42', NULL),
(39, 12, '3rGEZ6Q.jpg', '2022-07-27 12:21:43', NULL),
(40, 11, 'ZTbvGOv.jpg', '2022-07-27 12:30:07', NULL),
(41, 11, 'G74TNND.jpg', '2022-07-27 12:30:07', NULL),
(42, 11, 'z29av8v.jpg', '2022-07-27 12:30:07', NULL),
(43, 11, '75BoJkz.jpg', '2022-07-27 12:30:07', NULL),
(45, 10, 'WVCusld.jpg', '2022-07-27 12:31:26', NULL),
(46, 10, 'QllYK3Y.jpg', '2022-07-27 12:31:26', NULL),
(47, 10, '6FiHrqG.jpg', '2022-07-27 12:31:26', NULL),
(48, 9, 'GWvIBKt.png', '2022-07-27 12:33:55', NULL),
(49, 9, 'TWKE7V1.jpg', '2022-07-27 12:33:55', NULL),
(50, 9, 'KACnAFD.jpg', '2022-07-27 12:33:55', NULL),
(51, 8, 'I0irYpm.jpg', '2022-07-27 12:36:57', NULL),
(52, 8, 'qHpCP9D.jpg', '2022-07-27 12:36:57', NULL),
(53, 8, 'EdhPTES.jpg', '2022-07-27 12:36:57', NULL),
(54, 7, 'TOJLGO0.jpg', '2022-07-27 12:38:05', NULL),
(55, 7, '01UItF3.jpg', '2022-07-27 12:38:05', NULL),
(56, 7, 'C90Fpor.jpg', '2022-07-27 12:38:05', NULL),
(57, 7, 'cg5j7nj.jpg', '2022-07-27 12:38:06', NULL),
(58, 15, 'VfDXv0o.jpg', '2022-08-03 10:01:12', NULL),
(59, 15, 'a69KztM.jpg', '2022-08-03 10:01:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_inventories`
--

INSERT INTO `product_inventories` (`id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 6, 8, 4, 11, '2022-06-29 02:01:43', '2022-07-26 04:30:18'),
(8, 6, 7, 3, 11, '2022-06-29 02:01:52', '2022-07-26 03:52:29'),
(9, 6, 1, 1, 15, '2022-06-29 02:02:04', '2022-07-25 08:03:04'),
(11, 4, 5, 3, 13, '2022-06-29 02:03:12', '2022-07-26 00:08:56'),
(12, 4, 5, 1, 25, '2022-06-29 02:03:20', NULL),
(14, 14, 5, 10, 8, '2022-07-27 12:16:24', '2023-04-05 14:52:08'),
(15, 14, 5, 9, 4, '2022-07-27 12:16:33', '2022-08-01 06:37:22'),
(16, 14, 10, 10, 10, '2022-07-27 12:16:42', NULL),
(17, 14, 10, 6, 5, '2022-07-27 12:16:53', NULL),
(18, 13, 5, 10, 7, '2022-07-27 12:18:11', '2023-04-05 14:53:04'),
(19, 13, 5, 9, 10, '2022-07-27 12:18:19', NULL),
(20, 13, 10, 10, 5, '2022-07-27 12:18:27', NULL),
(21, 13, 5, 6, 5, '2022-07-27 12:18:35', NULL),
(22, 12, 8, 4, 5, '2022-07-27 12:19:52', NULL),
(23, 12, 11, 3, 10, '2022-07-27 12:20:02', NULL),
(24, 12, 7, 1, 2, '2022-07-27 12:20:18', NULL),
(25, 12, 8, 3, 10, '2022-07-27 12:20:30', NULL),
(26, 12, 1, 5, 5, '2022-07-27 12:20:42', NULL),
(27, 12, 1, 4, 5, '2022-07-27 12:20:49', NULL),
(28, 11, 1, 3, 15, '2022-07-27 12:22:16', NULL),
(29, 11, 5, 1, 5, '2022-07-27 12:22:30', NULL),
(30, 11, 12, 1, 15, '2022-07-27 12:28:56', NULL),
(31, 10, 5, 1, 10, '2022-07-27 12:30:36', NULL),
(32, 10, 12, 3, 12, '2022-07-27 12:30:48', NULL),
(33, 9, 12, 5, 21, '2022-07-27 12:32:15', NULL),
(34, 9, 5, 6, 10, '2022-07-27 12:32:29', NULL),
(35, 4, 1, 9, 10, '2022-07-27 12:35:42', NULL),
(36, 4, 10, 7, 5, '2022-07-27 12:35:51', NULL),
(37, 8, 5, 4, 9, '2022-07-27 12:36:12', '2022-11-03 10:37:45'),
(38, 8, 12, 3, 10, '2022-07-27 12:36:21', NULL),
(39, 7, 12, 3, 12, '2022-07-27 12:37:22', NULL),
(40, 7, 8, 1, 12, '2022-07-27 12:37:30', NULL),
(41, 7, 1, 3, 10, '2022-07-27 12:37:37', NULL),
(42, 15, 5, 4, 25, '2022-08-03 09:57:07', NULL),
(43, 15, 12, 4, 15, '2022-08-03 09:57:17', '2022-12-22 01:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail_photo` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_product_thumbnail_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`id`, `product_name`, `current_price`, `category_id`, `subcategory_id`, `slug`, `short_description`, `product_thumbnail_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Nike shose', 200, 2, 1, 'black-shose', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,', '4gjeaT6.jpg', '2022-06-05 11:03:00', '2022-07-27 12:35:04', NULL),
(6, 'LIpistic', 350, 3, 3, 'lipistic', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution', 'jJwMClw.jpg', '2022-06-06 05:30:06', '2022-06-08 11:37:24', NULL),
(7, 'Mobile', 18000, 5, 6, 'mobile', 'Guangdong Oppo Mobile Telecommunications Corp., Ltd, doing business as OPPO, is a Chinese consumer electronics and mobile communications company headquartered in Dongguan, Guangdong. Its major product lines include smartphones, smart devices,', '94JtqPR.jpg', '2022-07-27 11:39:37', '2022-07-27 12:06:42', NULL),
(8, 'rolax', 5000, 4, 9, 'rolax', 'Rolex SA (/ˈroʊlɛks/) is a British-founded Swiss watch designer and manufacturer based in Geneva, Switzerland Founded in 1905 as Wilsdorf and Davis by Hans Wilsdorf and Alfred Davis in London, England', 'I0gJqEy.jpg', '2022-07-27 11:52:55', NULL, NULL),
(9, 'casso', 2000, 4, 10, 'casso', 'Definition of casso in the Definitions.net dictionary. ... Casso (Cas in local dialect, Sćjas in Friulan) is an Italian village, frazione of Erto e Casso,', 'CbvTShB.jpg', '2022-07-27 11:55:25', NULL, NULL),
(10, 'redmi', 18000, 5, 7, 'redmi', 'Redeem is wider in its application than ransom, and means to buy back, regain possession of, or exchange for money, goods, etc.: to redeem one\'s property. To ...', 'lG42cKu.jpg', '2022-07-27 11:58:05', NULL, NULL),
(11, 'realme', 21000, 5, 8, 'realme', 'Realme is a Chinese smartphone company established on May 4, 2018 (National Youth Day of China), by former Oppo vice-president and head of overseas business department,', 'kCiEAgw.jpg', '2022-07-27 11:59:14', NULL, NULL),
(12, 'dress', 3000, 3, 5, 'dress', 'dress smartphone company established on May 4, 2018 (National Youth Day of China), by former Oppo vice-president and head of overseas business department,', 'mWEkLKi.jpg', '2022-07-27 12:01:02', NULL, NULL),
(13, 'bata', 2900, 2, 11, 'bata', 'Bata India is the largest retailer and leading manufacturer of footwear in India and is a part of the Bata Shoe Organization. Incorporated as Bata Shoe Company Private Limited in', 'f3K0fez.jpg', '2022-07-27 12:02:02', NULL, NULL),
(14, 'apex', 2500, 2, 12, 'apex', 'Apex is a proprietary language developed by the Salesforce.com. As per the official definition, Apex is a strongly typed, object-oriented programming languag ...', '05FNpvc.jpg', '2022-07-27 12:04:02', '2022-07-28 10:09:04', NULL),
(15, 'samsung', 25000, 5, 13, 'samsung', 'Add Grepper Answer (a)\r\nSamsung, South Korean company that is one of the world\'s largest producers of electronic devices. Samsung specializes in the production of a wide variety of consumer and industry electronics, including appliances, digital media devices, semiconductors, memory chips, and integrated systems.', 'pjJETAg.jpg', '2022-08-03 09:56:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_details_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_details_id`, `product_id`, `color_id`, `size_id`, `user_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 31, 6, 7, 3, 2, 'valo', 2, '2022-07-25 23:30:47', NULL),
(2, 33, 4, 5, 5, 2, 'it\'s good Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto', 2, '2022-07-25 23:58:37', NULL),
(3, 41, 6, 7, 3, 2, 'valo', 4, '2022-07-26 03:39:50', NULL),
(4, 42, 6, 7, 3, 2, 'it\'s good Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto', 3, '2022-07-26 03:53:16', NULL),
(5, 43, 4, 5, 5, 2, 'valo', 2, '2022-07-26 03:53:25', NULL),
(6, 44, 6, 8, 4, 2, 'wow', 4, '2022-07-26 04:31:08', NULL),
(7, 45, 4, 5, 5, 5, 'very very good', 5, '2022-07-26 05:45:48', NULL),
(8, 46, 14, 5, 9, 2, 'good', 4, '2022-08-01 06:38:39', NULL),
(9, 49, 15, 12, 4, 7, 'valo', 3, '2022-12-22 01:24:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppings`
--

CREATE TABLE `shoppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopping_charge` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppings`
--

INSERT INTO `shoppings` (`id`, `country_id`, `city_name`, `shopping_charge`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 19, 'Dhaka', 80.00, NULL, '2022-06-26 05:10:13', NULL),
(3, 103, 'kolkata', 200.00, NULL, NULL, NULL),
(4, 19, 'Ctg', 100.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size_variations`
--

CREATE TABLE `size_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_variations`
--

INSERT INTO `size_variations` (`id`, `size_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'M', '2022-06-08 04:12:07', NULL, NULL),
(3, 'S', '2022-06-08 04:19:03', '2022-06-08 04:20:03', NULL),
(4, 'L', '2022-06-08 04:19:10', '2022-06-29 04:48:32', NULL),
(5, 'XL', '2022-06-08 04:20:22', NULL, NULL),
(6, '38', '2022-07-27 12:15:40', NULL, NULL),
(7, '40', '2022-07-27 12:15:45', NULL, NULL),
(8, '41', '2022-07-27 12:15:57', NULL, NULL),
(9, '42', '2022-07-27 12:16:02', NULL, NULL),
(10, '43', '2022-07-27 12:16:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_products`
--

CREATE TABLE `subcategory_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategory_products`
--

INSERT INTO `subcategory_products` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Nike shoes', '2022-06-03 03:34:46', '2022-06-03 03:56:54', NULL),
(3, 3, 'Cosmetics', '2022-06-03 03:36:12', '2022-06-03 04:59:02', NULL),
(4, 2, 'Adidas shoes', '2022-06-03 03:57:14', NULL, NULL),
(5, 3, 'Dress', '2022-06-05 11:11:35', NULL, NULL),
(6, 5, 'Oppo', '2022-07-27 11:32:10', NULL, NULL),
(7, 5, 'redmi', '2022-07-27 11:32:42', NULL, NULL),
(8, 5, 'realme', '2022-07-27 11:33:14', NULL, NULL),
(9, 4, 'rolex', '2022-07-27 11:33:51', NULL, NULL),
(10, 4, 'casso', '2022-07-27 11:34:41', NULL, NULL),
(11, 2, 'Bata', '2022-07-27 11:36:37', NULL, NULL),
(12, 2, 'apex', '2022-07-27 11:37:09', NULL, NULL),
(13, 5, 'samsung', '2022-08-03 09:53:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_profile_photo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `phone_number`, `address`, `profile_photo`) VALUES
(1, 'Sajidul islam', 'sajid@gmail.com', NULL, '$2y$10$Weemsdj/nKWovSJUJBQdPuXIAGceEzB18cqGeTi2keSGyT3bT7bQ.', NULL, '2022-05-21 17:59:45', '2022-11-03 10:29:31', 'Admin', '01969440721', 'Norsingdi', 'prwAf7a.jpg'),
(2, 'Habib', 'habib@gmail.com', NULL, '$2y$10$9XR8027jGwGMhMCTdSvnFeDNeiLM/41jKgJnobu12/.UeftBL2NY.', NULL, '2022-06-19 00:24:52', NULL, 'Customer', NULL, NULL, 'default_profile_photo.jpg'),
(4, 'Shakib', 'shakib@gmail.com', NULL, '$2y$10$WeabVNI74JEoBnmusUWaAOuKTtDGIp7NdX7Hgm9gDDkBqOuYHduSe', NULL, '2022-06-29 21:20:00', '2022-12-12 09:13:56', 'Admin', '01968754215', 'Bhairab', 'HaoB0gd.jpg'),
(5, 'sabibr', 'sabibr@gmail.com', NULL, '$2y$10$n3OWkNxTwIGgrmruZ6MXX.YVeLD7tsOpfwzrwVpUIZfJAI1K5qtF6', NULL, '2022-07-26 05:43:25', NULL, 'Customer', NULL, NULL, 'default_profile_photo.jpg'),
(6, 'Shakib', 'shakibb@gmail.com', NULL, '$2y$10$5dPKDAH4zxcyHM.aLefU3uy9EhqPuKpeEByYz1OIZncX5Px3jOjeK', NULL, '2022-07-26 23:03:50', NULL, 'Customer', NULL, NULL, 'default_profile_photo.jpg'),
(7, 'Rofik', 'rofi@gmail.com', NULL, '$2y$10$G3pIcEZ.9D64KcRLkW408OzaKAd/I6Xz3pzgQyYFouXX4HdzwPVqm', NULL, '2022-12-22 01:16:32', NULL, 'Customer', '01235468974', 'Gazipur', 'default_profile_photo.jpg'),
(8, 'Test1', 'test1@gmail.com', NULL, '$2y$10$s4F8AeGz4kaZAQKups0DaeWUlUdbmtdudvv30a8ilWoo3Cv0t6mkm', NULL, '2023-03-30 10:03:30', NULL, 'Customer', '01356487594', 'Gazipur', 'default_profile_photo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_banners`
--
ALTER TABLE `about_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_client_items`
--
ALTER TABLE `about_client_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_features`
--
ALTER TABLE `about_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_feature_social_icons`
--
ALTER TABLE `about_feature_social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_services`
--
ALTER TABLE `about_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_service_background_photos`
--
ALTER TABLE `about_service_background_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_teams`
--
ALTER TABLE `about_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_team_social_icons`
--
ALTER TABLE `about_team_social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_variations`
--
ALTER TABLE `color_variations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `color_variations_color_name_unique` (`color_name`),
  ADD UNIQUE KEY `color_variations_color_code_unique` (`color_code`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_banners`
--
ALTER TABLE `contact_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_customers`
--
ALTER TABLE `contact_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_describes`
--
ALTER TABLE `contact_describes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_map_links`
--
ALTER TABLE `contact_map_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_office_details`
--
ALTER TABLE `contact_office_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_social_icons`
--
ALTER TABLE `contact_social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_code_index` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favicon_updates`
--
ALTER TABLE `favicon_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_features`
--
ALTER TABLE `home_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_feature_heads`
--
ALTER TABLE `home_feature_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_feature_lists`
--
ALTER TABLE `home_feature_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_favicons`
--
ALTER TABLE `logo_favicons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_summaries`
--
ALTER TABLE `order_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_product_banners`
--
ALTER TABLE `our_product_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_feature_photos`
--
ALTER TABLE `product_feature_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_items_slug_unique` (`slug`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppings`
--
ALTER TABLE `shoppings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_variations`
--
ALTER TABLE `size_variations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size_variations_size_name_unique` (`size_name`);

--
-- Indexes for table `subcategory_products`
--
ALTER TABLE `subcategory_products`
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
-- AUTO_INCREMENT for table `about_banners`
--
ALTER TABLE `about_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_client_items`
--
ALTER TABLE `about_client_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `about_features`
--
ALTER TABLE `about_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `about_feature_social_icons`
--
ALTER TABLE `about_feature_social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_services`
--
ALTER TABLE `about_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_service_background_photos`
--
ALTER TABLE `about_service_background_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_teams`
--
ALTER TABLE `about_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_team_social_icons`
--
ALTER TABLE `about_team_social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `color_variations`
--
ALTER TABLE `color_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact_banners`
--
ALTER TABLE `contact_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_customers`
--
ALTER TABLE `contact_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_describes`
--
ALTER TABLE `contact_describes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_map_links`
--
ALTER TABLE `contact_map_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_office_details`
--
ALTER TABLE `contact_office_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_social_icons`
--
ALTER TABLE `contact_social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favicon_updates`
--
ALTER TABLE `favicon_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_features`
--
ALTER TABLE `home_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_feature_heads`
--
ALTER TABLE `home_feature_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_feature_lists`
--
ALTER TABLE `home_feature_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logo_favicons`
--
ALTER TABLE `logo_favicons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `order_summaries`
--
ALTER TABLE `order_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `our_product_banners`
--
ALTER TABLE `our_product_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_feature_photos`
--
ALTER TABLE `product_feature_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shoppings`
--
ALTER TABLE `shoppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `size_variations`
--
ALTER TABLE `size_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategory_products`
--
ALTER TABLE `subcategory_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
