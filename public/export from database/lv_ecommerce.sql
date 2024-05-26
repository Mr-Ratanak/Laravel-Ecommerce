-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 11:48 AM
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
-- Database: `lv_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_tbl`
--

INSERT INTO `brand_tbl` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Toyotal', 'toyo', 0, '2023-08-18 10:13:16', '2023-09-01 08:31:32', 2),
(2, 'Apple', 'app', 0, '2023-08-18 10:15:57', '2023-12-03 02:02:58', 8),
(3, 'Luxis', 'car', 0, '2023-08-18 10:17:28', '2023-09-01 09:41:18', 6),
(4, 'Desktop', 'laptop', 0, '2023-08-18 10:34:16', '2023-09-01 09:41:00', 9),
(5, 'MD-Phone', 'oppo', 0, '2023-08-18 10:44:21', '2023-12-03 02:04:17', 4),
(7, 'Luxury', 'luxurious', 0, '2023-08-18 10:45:56', '2024-01-03 03:34:49', 8),
(8, 'Rolex', 'rolex', 0, '2023-08-20 10:52:44', '2024-01-03 04:38:59', 10),
(9, 'Clothes', 'clothes', 0, '2023-08-23 11:10:21', '2023-09-01 08:30:12', 7),
(10, 'throuser', 'none-brand', 0, '2023-08-31 11:05:51', '2023-11-17 09:43:35', 7);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, '2', '8', NULL, 2, '2023-12-02 12:17:19', '2024-01-02 10:26:14'),
(22, '2', '7', '1', 3, '2023-12-19 09:30:27', '2023-12-29 08:22:27'),
(23, '2', '14', NULL, 1, '2023-12-19 09:33:49', '2023-12-29 08:22:37'),
(35, '4', '21', NULL, 2, '2024-01-03 05:02:47', '2024-01-03 05:02:47'),
(36, '4', '20', '6', 2, '2024-01-03 06:51:32', '2024-01-03 09:22:13'),
(52, '4', '17', NULL, 1, '2024-01-03 09:12:58', '2024-01-03 09:12:58'),
(61, '7', '8', NULL, 2, '2024-01-05 10:27:15', '2024-01-05 10:49:42'),
(62, '8', '8', NULL, 1, '2024-01-06 10:52:18', '2024-01-06 10:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Duk M.', 'duk-m', 'This is Moto cheapest in the world.', '1691512609.jpg', 'Duk M.', 'Duk M.', 'Duk M.', 0, '2023-08-08 09:36:49', '2023-08-31 10:16:09'),
(2, 'MSX moto', 'this-is-module-template', 'This is module template', '1691513846.jpg', 'This is module template', 'This is module template', 'This is module template', 0, '2023-08-08 09:57:26', '2023-08-22 10:51:16'),
(4, 'Iphone', 'iphone', 'New phone made in Cambodia', '1693328320.png', 'iphone mac pro', 'iphone mac pro', 'iphone mac pro', 0, '2023-08-09 08:33:46', '2023-08-31 10:11:51'),
(6, 'Labogini', 'labogini', 'about car model', '1704277414.jpg', 'Labogini', 'Labogini', 'Labogini', 0, '2023-08-17 09:48:10', '2024-01-03 03:23:34'),
(7, 'Clothes', 'clothes', 'A sexual act in which a man penetrates a woman in the asshole, performing anal sex. One the man cums he whipes his jizz and her shit on a t shirt.', '1693328246.jpg', 'A sexual act in which a man penetrates a woman in the asshole, performing anal sex. One the man cums he whipes his jizz and her shit on a t shirt.', 'A sexual act in which a man penetrates a woman in the asshole, performing anal sex. One the man cums he whipes his jizz and her shit on a t shirt.', 'shirt\r\nthrouser\r\nshort\r\njeans\r\ncost\r\nhat...', 0, '2023-08-23 11:09:23', '2023-09-01 11:08:16'),
(8, 'Watches', 'watches', 'new comming up with special discount 90%', '1693418314.png', 'new watch', 'new watch', 'new watch', 0, '2023-08-30 10:55:25', '2023-08-30 10:58:34'),
(9, 'Desktop', 'desktop', 'HP All-in-One AMD Ryzen 3. ...\r\nHP All-in-One PC 12th Gen Intel Core i5. ...\r\nLenovo IdeaCentre 3 Desktop. ...\r\nLenovo IdeaCentre AIO 3 12th Gen. ...\r\nApple 2021 iMac. 256GB. ...\r\nApple 2023 Mac Mini Desktop Computer. 512 GB. ...\r\nLenovo ThinkStation P360 Workstation. 128GB. ...\r\nSKULLSAINTS Rudra Mini PC. 512 GB.', '1704277576.jpg', 'HP All-in-One AMD', 'HP All-in-One AMD', 'HP All-in-One AMD', 0, '2023-09-01 09:39:28', '2024-01-03 03:26:16'),
(10, 'General Items', 'general', 'all general product item and everything you need', '1701594649.jpg', 'General Items', 'General Items', 'search for general product you want!', 0, '2023-12-03 02:08:23', '2024-01-03 03:28:36'),
(11, 'WINE', 'wine', 'LUXURY WINE SHOP', '1704279888.webp', 'explore our top wines', 'wine', 'wine for rich people, Special Offer’s and Discount', 0, '2024-01-03 03:54:12', '2024-01-03 04:04:48'),
(12, 'Jewellery', 'jewellery', 'how to become beauti person.', '1704279799.webp', 'jewellery', 'jewellery', 'jewellery', 0, '2024-01-03 03:55:44', '2024-01-03 04:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `color_tbl`
--

CREATE TABLE `color_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_tbl`
--

INSERT INTO `color_tbl` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'red', 'red', 0, '2023-08-25 10:12:30', '2023-08-25 10:12:30'),
(2, 'blue', 'blue', 1, '2023-08-25 10:12:43', '2023-08-26 04:15:45'),
(4, 'Purple', '#F305FF', 0, '2023-08-26 03:45:21', '2023-12-24 00:47:20'),
(5, 'Orange', 'oranges', 0, '2023-08-26 04:20:47', '2023-08-26 04:20:47'),
(6, 'Black', 'black', 0, '2023-08-26 09:13:50', '2023-08-26 09:13:50'),
(7, 'White', 'white', 0, '2023-08-26 09:14:02', '2023-08-26 09:14:02');

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
-- Table structure for table `images_tbl`
--

CREATE TABLE `images_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_tbl_id` bigint(20) UNSIGNED DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images_tbl`
--

INSERT INTO `images_tbl` (`id`, `products_tbl_id`, `images`, `created_at`, `updated_at`) VALUES
(4, 2, '16928929250.png', '2023-08-24 09:02:05', '2023-08-24 09:02:05'),
(26, 2, '16929388570.png', '2023-08-24 21:47:37', '2023-08-24 21:47:37'),
(27, 2, '16929388571.png', '2023-08-24 21:47:37', '2023-08-24 21:47:37'),
(39, 6, '16929782841.jpg', '2023-08-25 08:44:44', '2023-08-25 08:44:44'),
(40, 6, '16929783270.jpg', '2023-08-25 08:45:27', '2023-08-25 08:45:27'),
(41, 7, '16931232380.png', '2023-08-27 01:00:38', '2023-08-27 01:00:38'),
(42, 7, '16931232381.png', '2023-08-27 01:00:38', '2023-08-27 01:00:38'),
(43, 7, '16931232382.png', '2023-08-27 01:00:38', '2023-08-27 01:00:38'),
(46, 9, '16934140150.png', '2023-08-30 09:46:55', '2023-08-30 09:46:55'),
(47, 10, '16934161460.jpg', '2023-08-30 10:22:26', '2023-08-30 10:22:26'),
(48, 10, '16934161461.jpg', '2023-08-30 10:22:26', '2023-08-30 10:22:26'),
(49, 11, '16934173600.png', '2023-08-30 10:42:40', '2023-08-30 10:42:40'),
(50, 8, '16934176590.jpg', '2023-08-30 10:47:39', '2023-08-30 10:47:39'),
(51, 8, '16934176591.jfif', '2023-08-30 10:47:39', '2023-08-30 10:47:39'),
(52, 12, '16936767490.png', '2023-09-02 10:45:49', '2023-09-02 10:45:49'),
(53, 13, '17000631090.jpg', '2023-11-15 08:45:09', '2023-11-15 08:45:09'),
(54, 13, '17000631091.jpg', '2023-11-15 08:45:09', '2023-11-15 08:45:09'),
(55, 13, '17000631092.jpg', '2023-11-15 08:45:09', '2023-11-15 08:45:09'),
(56, 14, '17000731080.jpg', '2023-11-15 11:31:48', '2023-11-15 11:31:48'),
(57, 14, '17000731081.jpg', '2023-11-15 11:31:48', '2023-11-15 11:31:48'),
(58, 14, '17000731082.jpg', '2023-11-15 11:31:48', '2023-11-15 11:31:48'),
(59, 15, '17002447620.png', '2023-11-17 11:12:42', '2023-11-17 11:12:42'),
(60, 16, '17006666980.jpg', '2023-11-22 08:24:58', '2023-11-22 08:24:58'),
(61, 15, '17007641190.webp', '2023-11-23 11:28:39', '2023-11-23 11:28:39'),
(63, 16, '17008463860.webp', '2023-11-24 10:19:46', '2023-11-24 10:19:46'),
(64, 17, '17015936460.png', '2023-12-03 01:54:06', '2023-12-03 01:54:06'),
(65, 17, '17015936461.png', '2023-12-03 01:54:06', '2023-12-03 01:54:06'),
(66, 17, '17015936462.png', '2023-12-03 01:54:06', '2023-12-03 01:54:06'),
(67, 18, '17015949240.jpg', '2023-12-03 02:15:24', '2023-12-03 02:15:24'),
(68, 18, '17015949241.jpg', '2023-12-03 02:15:24', '2023-12-03 02:15:24'),
(69, 18, '17015949242.jpg', '2023-12-03 02:15:24', '2023-12-03 02:15:24'),
(70, 18, '17015949243.jpg', '2023-12-03 02:15:24', '2023-12-03 02:15:24'),
(71, 19, '17031770950.jfif', '2023-12-21 09:44:55', '2023-12-21 09:44:55'),
(72, 19, '17031770951.png', '2023-12-21 09:44:55', '2023-12-21 09:44:55'),
(73, 19, '17031770952.png', '2023-12-21 09:44:55', '2023-12-21 09:44:55'),
(74, 19, '17031770953.png', '2023-12-21 09:44:55', '2023-12-21 09:44:55'),
(75, 19, '17031770954.png', '2023-12-21 09:44:55', '2023-12-21 09:44:55'),
(76, 20, '17042779930.webp', '2024-01-03 03:33:13', '2024-01-03 03:33:13'),
(77, 20, '17042779931.webp', '2024-01-03 03:33:13', '2024-01-03 03:33:13'),
(78, 20, '17042779932.webp', '2024-01-03 03:33:13', '2024-01-03 03:33:13'),
(79, 21, '17042811590.webp', '2024-01-03 04:25:59', '2024-01-03 04:25:59'),
(80, 21, '17042811591.webp', '2024-01-03 04:25:59', '2024-01-03 04:25:59'),
(81, 22, '17042820790.webp', '2024-01-03 04:41:19', '2024-01-03 04:41:19'),
(82, 22, '17042820791.webp', '2024-01-03 04:41:19', '2024-01-03 04:41:19'),
(83, 22, '17042820792.webp', '2024-01-03 04:41:19', '2024-01-03 04:41:19'),
(84, 23, '17042821700.webp', '2024-01-03 04:42:50', '2024-01-03 04:42:50'),
(85, 23, '17042821701.webp', '2024-01-03 04:42:50', '2024-01-03 04:42:50'),
(86, 24, '17042825050.webp', '2024-01-03 04:48:25', '2024-01-03 04:48:25');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_07_125847_add_details_to_users_tbl', 2),
(7, '2023_08_07_154340_create_category_tbl', 3),
(8, '2023_08_17_171845_create_brand_tbl', 4),
(9, '2023_08_21_154512_create_products_tbl', 5),
(10, '2023_08_21_160706_create_images_tbl', 5),
(11, '2023_08_25_160656_create_color_tbl', 6),
(12, '2023_08_25_171149_create_color_tbl', 7),
(13, '2023_08_26_163700_create_products_color_tbl', 8),
(14, '2023_08_27_131433_create_slide_tbl', 9),
(15, '2023_08_27_152725_create_slide_tbl', 10),
(16, '2023_08_31_173548_add_category_id_to_brand_tbl', 11),
(17, '2023_11_24_175740_create_wishlists_tbl', 12),
(18, '2023_11_28_170630_create_carts_table', 13),
(19, '2023_12_06_163051_create_orders_table', 14),
(20, '2023_12_06_163113_create_order_item_table', 14),
(21, '2023_12_23_183019_create_setting_table', 15),
(24, '2023_12_28_170359_create_user_details_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 'Ron Ratanak', 'Ratanak123@gmail.com', '0967162577', '2222', 'Phnom Penh city', 'pending', 'Cash on Delivery Mode', NULL, 1777, '2023-12-06 11:59:42', '2023-12-25 11:01:16'),
(2, 3, NULL, 'Tester', 'testinggpt@gmail.com', '0999333', '09009', 'poipet', 'completed', 'Cash on Delivery Mode', NULL, 464, '2023-12-12 10:59:47', '2023-12-25 07:23:00'),
(3, 4, NULL, 'Unknow', 'Unknow123@gmail.com', '0998833', '1919', 'Kandal', 'cancelled', 'Cash on Delivery Mode', NULL, 0, '2023-12-14 08:49:58', '2024-01-01 10:51:58'),
(4, 7, NULL, 'Seyha', 'SeyhaBlinking$123@gmail.com', '077111213', '405', 'Sterngmeanchey phnom penh, Cambododian', 'completed', 'Cash on Delivery Mode', NULL, 452091, '2023-12-25 09:23:46', '2023-12-25 10:52:40'),
(5, 8, NULL, 'Ron Ratanak', 'ron.ratanakPTM@gmail.com', '0967162577', '11112222', 'Preaktakong village, Preaktamak commune, Skhachkandal district, Kandal province.', 'completed', 'Cash on Delivery Mode', NULL, 7107, '2023-12-29 11:27:16', '2023-12-29 11:30:24'),
(6, 8, NULL, 'Mr.Ratanak', 'ron.ratanakPTM@gmail.com', '0999333444', '504', 'Kandal', 'In progress', 'Cash on Delivery Mode', NULL, 1753, '2024-01-04 08:11:55', '2024-01-04 08:11:55'),
(7, 7, NULL, 'Seyha', 'SeyhaBlinking$123@gmail.com', '0999333444', '5454', 'Poipet', 'In progress', 'Cash on Delivery Mode', NULL, 1943, '2024-01-05 09:34:44', '2024-01-05 09:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '17', '1', 2, 444, '2023-12-06 11:59:42', '2023-12-06 11:59:42'),
(2, 1, '16', '2', 2, 444, '2023-12-06 11:59:42', '2023-12-06 11:59:42'),
(3, 1, '18', NULL, 1, 1, '2023-12-06 11:59:42', '2023-12-06 11:59:42'),
(4, 2, '7', '6', 2, 32, '2023-12-12 10:59:47', '2023-12-12 10:59:47'),
(5, 2, '14', NULL, 1, 400, '2023-12-12 10:59:48', '2023-12-12 10:59:48'),
(6, 3, '16', '2', 1, 444, '2023-12-14 08:49:58', '2023-12-14 08:49:58'),
(7, 3, '18', NULL, 3, 1, '2023-12-14 08:49:58', '2023-12-14 08:49:58'),
(8, 4, '14', NULL, 3, 400, '2023-12-25 09:23:46', '2023-12-25 09:23:46'),
(9, 4, '17', '1', 2, 444, '2023-12-25 09:23:46', '2023-12-25 09:23:46'),
(10, 4, '8', NULL, 1, 3, '2023-12-25 09:23:46', '2023-12-25 09:23:46'),
(11, 4, '19', '1', 1, 450000, '2023-12-25 09:23:46', '2023-12-25 09:23:46'),
(12, 5, '7', '1', 2, 32, '2023-12-29 11:27:16', '2023-12-29 11:27:16'),
(13, 5, '14', NULL, 4, 400, '2023-12-29 11:27:16', '2023-12-29 11:27:16'),
(14, 5, '11', NULL, 1, 4999, '2023-12-29 11:27:16', '2023-12-29 11:27:16'),
(15, 5, '17', '6', 1, 444, '2023-12-29 11:27:16', '2023-12-29 11:27:16'),
(16, 6, '14', NULL, 2, 400, '2024-01-04 08:11:55', '2024-01-04 08:11:55'),
(17, 6, '23', NULL, 1, 454, '2024-01-04 08:11:55', '2024-01-04 08:11:55'),
(18, 6, '24', NULL, 1, 55, '2024-01-04 08:11:55', '2024-01-04 08:11:55'),
(19, 6, '16', NULL, 1, 444, '2024-01-04 08:11:55', '2024-01-04 08:11:55'),
(20, 7, '22', NULL, 1, 55, '2024-01-05 09:34:44', '2024-01-05 09:34:44'),
(21, 7, '17', NULL, 2, 444, '2024-01-05 09:34:44', '2024-01-05 09:34:44'),
(22, 7, '20', NULL, 1, 1000, '2024-01-05 09:34:44', '2024-01-05 09:34:44');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('Administration001@gmail.gov.kh', '$2y$10$N/myDXA5Awo/m58wlA7.NuLFrp/Y3r1tFELfr8LvfGR3YRePtQSDO', '2023-11-15 08:26:10'),
('Ratanak123@gmail.com', '$2y$10$wbk/WQRv.7QZaUdmEuxruOySSI1VawkB/yfNB.KCG5NWfSY9Qax0m', '2023-08-06 08:45:16'),
('Unknow123@gmail.com', '$2y$10$Dz9eKYNl/N/tPaj1ICVSjuErFWn44lpBZj3fECs1cyB0T6Pb.atrC', '2023-12-14 08:46:43');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_color_tbl`
--

CREATE TABLE `products_color_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_tbl_id` bigint(20) UNSIGNED DEFAULT NULL,
  `colors_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_color_tbl`
--

INSERT INTO `products_color_tbl` (`id`, `products_tbl_id`, `colors_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 16, 1, 2, '2023-11-22 08:24:58', '2023-11-23 10:52:51'),
(5, 16, 2, 8, '2023-11-23 11:26:33', '2023-11-23 11:26:33'),
(6, 16, 6, 1, '2023-11-23 11:26:33', '2023-11-24 08:04:37'),
(7, 15, 6, 1, '2023-11-23 11:28:39', '2023-11-23 11:28:39'),
(8, 15, 5, 5, '2023-11-23 11:29:13', '2023-11-23 11:29:13'),
(9, 13, 1, 4, '2023-11-24 08:26:14', '2023-11-24 08:26:14'),
(10, 13, 4, 3, '2023-11-24 08:26:14', '2023-11-24 08:26:14'),
(11, 13, 7, 3, '2023-11-24 08:26:14', '2023-11-24 08:26:41'),
(12, 7, 1, 1, '2023-11-28 09:53:28', '2023-11-28 09:53:28'),
(13, 7, 2, 2, '2023-11-28 09:53:28', '2023-11-28 09:53:48'),
(14, 7, 6, 3, '2023-11-28 09:53:28', '2023-11-28 09:53:54'),
(15, 17, 1, 1, '2023-12-03 01:54:06', '2023-12-03 01:54:06'),
(16, 17, 5, 1, '2023-12-03 01:54:06', '2023-12-03 01:54:06'),
(17, 17, 6, 1, '2023-12-03 01:54:06', '2023-12-03 01:54:06'),
(18, 19, 1, 2, '2023-12-21 09:44:55', '2023-12-21 09:44:55'),
(19, 19, 6, 4, '2023-12-21 09:44:55', '2023-12-21 09:44:55'),
(20, 20, 6, 3, '2024-01-03 03:33:13', '2024-01-03 03:33:13'),
(21, 24, 5, 3, '2024-01-03 04:48:25', '2024-01-03 04:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_tbl_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=trending,0=not-trending',
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=featured,0=not-featured\r\n',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`id`, `category_tbl_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 7, 'T-shirts', 'clothes', 'Clothes', '\'Clothes\' is a plural noun, used to refer to the garments that you wear. Trousers, shirts, dresses and socks are all clothes. \'Clothing\' is an uncountable noun that has the same meaning as \'clothes\', but it is used in more general and less personal contexts, such as business and industry.', '\'Clothes\' is a plural noun, used to refer to the garments that you wear. Trousers, shirts, dresses and socks are all clothes. \'Clothing\' is an uncountable noun that has the same meaning as \'clothes\', but it is used in more general and less personal contexts, such as business and industry.', 5, 10, 0, 1, 0, 0, 'Below are the 2023 style trends to look out for, according to the experts.', 'Below are the 2023 style trends to look out for, according to the experts.\r\n2023 Style Trend: Oversized Everything. ...\r\n2023 Style Trend: Corsets, Corsets, Corsets. ...\r\n2023 Style Trend: Sheer Fabrics. ...\r\n2023 Style Trend: Cutouts. ...\r\n2023 Style Trend: Minidresses and Skirts. ...\r\n2023 Style Trend: A Y2K Revival.', 'Below are the 2023 style trends to look out for, according to the experts.', '2023-08-24 09:02:05', '2023-09-01 11:09:27'),
(6, 10, 'Original', 'this-is-moto-rola-model', 'Toyotal', NULL, NULL, 2500, 2000, 20, 0, 0, 1, NULL, NULL, NULL, '2023-08-25 08:44:44', '2024-01-03 03:18:41'),
(7, 7, 'Shoe', 'boots-guci', 'Clothes', 'No more than one', NULL, 33, 32, 20, 0, 0, 0, NULL, NULL, NULL, '2023-08-27 01:00:38', '2023-11-21 10:54:14'),
(8, 1, 'Duk M.', 'duk-m', 'Toyotal', NULL, NULL, 2, 3, 3, 0, 0, 0, NULL, NULL, NULL, '2023-08-27 01:39:45', '2023-08-29 10:20:43'),
(9, 4, 'OPPO F9s', 'galaxy-note-9', 'Toyotal', NULL, NULL, 300, 299, 12, 1, 0, 0, NULL, NULL, NULL, '2023-08-30 09:39:39', '2023-11-21 08:25:50'),
(10, 6, 'Luxis LM', 'labogini', 'Luxis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ty', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a tyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ty', 12000, 3999, 0, 0, 0, 0, NULL, NULL, NULL, '2023-08-30 10:22:26', '2023-11-21 10:36:50'),
(11, 6, 'Spors 550cc', 'labogini-in-cambodia', 'Toyotal', 'Faster than', 'No speed no fast', 5000, 4999, 1, 0, 1, 0, NULL, NULL, NULL, '2023-08-30 10:42:40', '2023-12-21 09:38:17'),
(12, 4, 'iphone mac prox', 'iphone', 'Apple', NULL, NULL, 522, 333, 10, 0, 0, 0, NULL, NULL, NULL, '2023-09-02 10:45:49', '2023-09-02 10:47:39'),
(13, 7, 'Modern C', 'popularity-in-eropean', 'Clothes', 'free delivery in phnom penh', 'have only one in stock', 7, 10, 188, 1, 0, 0, NULL, NULL, NULL, '2023-11-15 08:45:09', '2023-12-17 02:31:01'),
(14, 7, 'New Skirt', 'specials-skirt-made-in-london', 'Base', 'No more in the world', NULL, 599, 400, 2, 1, 1, 0, NULL, NULL, NULL, '2023-11-15 11:31:48', '2023-12-21 10:01:04'),
(15, 4, 'Nokia', 'old-version-still-strong', 'Apple', NULL, NULL, 399, 299, 0, 1, 0, 0, 'mobile', 'Mobile phone', 'mobile', '2023-11-17 11:12:42', '2023-12-17 02:31:31'),
(16, 9, 'Laptop', 'model-msi', 'Desktop', NULL, NULL, 333, 444, 10, 0, 0, 0, NULL, NULL, NULL, '2023-11-22 08:24:58', '2023-11-22 08:24:58'),
(17, 8, 'Watches', 'gucci-buchanan', 'Base', 'up comming', 'up comming soon', 555, 444, 3, 0, 0, 0, 'new made in china', 'watch', 'new for product watch', '2023-12-03 01:54:06', '2023-12-03 01:54:06'),
(18, 10, 'Pringles', 'pringles', 'Toyotal', NULL, NULL, 1, 1, 1, 0, 0, 1, NULL, NULL, NULL, '2023-12-03 02:15:24', '2024-01-03 03:19:19'),
(19, 6, 'RoRoys', 'new-roroys-mix-color', 'Luxis', 'never known about new car in cambodia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod interdum lorem vitae dapibus. Aliquam ut nibh ac dui gravida molestie non ut lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam nec quam venenatis nisl scelerisque faucibus. Duis luctus in velit at tincidunt. Mauris a nulla lacus. In auctor, massa eu vestibulum efficitur, mi nisi bibendum enim, vel dictum elit quam eu magna.', 500000, 450000, 12, 0, 1, 0, 'Roroys', 'new roroys', 'Roroys', '2023-12-21 09:44:55', '2023-12-21 09:44:55'),
(20, 10, 'Camera', 'camera', 'Luxury', 'new camera man', 'new portrat and clearly with hight pixel.', 1220, 1000, 4, 1, 1, 0, 'camera', 'Nam ac egestas est. Mauris et pulvinar risus, at tincidunt lorem. Maecenas tristique sit amet odio sit amet aliquet. Quisque a pharetra quam. Sed in ultrices diam, eget sodales ligula. Sed ut tincidunt lacus.', 'camera pro', '2024-01-03 03:33:13', '2024-01-03 03:37:25'),
(21, 11, 'Wine', 'luxury-wine', 'Luxury', NULL, NULL, 29.99, 19.99, 2, 0, 0, 0, 'luxury wine', 'luxury wine', 'luxury wine', '2024-01-03 04:25:59', '2024-01-03 04:31:20'),
(22, 8, 'Rolex Watch', 'watch', 'Rolex', 'use battery charge', 'gain time for charge', 85, 55, 4, 1, 0, 0, NULL, NULL, NULL, '2024-01-03 04:41:19', '2024-01-03 04:41:19'),
(23, 12, 'Ring', 'ring', 'Luxury', NULL, NULL, 1000, 454, 33, 0, 1, 0, NULL, NULL, NULL, '2024-01-03 04:42:50', '2024-01-03 04:42:50'),
(24, 11, 'W-Wine', 'wine-water', 'Luxury', NULL, NULL, 66, 55, 1, 0, 0, 0, NULL, NULL, NULL, '2024-01-03 04:48:25', '2024-01-03 04:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_description`, `address`, `phone_one`, `phone_two`, `email_one`, `email_two`, `facebook`, `twitter`, `instagram`, `youtube`, `linkin`, `telegram`, `created_at`, `updated_at`) VALUES
(1, 'KH-Sale', 'http://localhost:8000/', 'KH-Ecom', 'KH-Ecommerce', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '#504, Phnom Penh Tmey, Sensok District, Cambodia PP city -123568', '967162577', NULL, 'ronratanak33@gmail.com', NULL, 'facebook.com', NULL, 'instagram.com', 'https://www.youtube.com/watch?v=Ff-_vjlze6U&t=492s', NULL, NULL, '2023-12-23 12:42:58', '2024-01-03 09:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `slide_tbl`
--

CREATE TABLE `slide_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide_tbl`
--

INSERT INTO `slide_tbl` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Top 10 Best clothes', 'this an ancents temple in the world!', '1693245829.jpg', 1, '2023-08-27 08:44:52', '2023-08-28 11:04:23'),
(2, 'Shopping', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Id, Architecto?', '1693157584.jpg', 0, '2023-08-27 08:54:20', '2023-08-27 10:33:04'),
(3, 'Alibaba', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, autem.', '1693157450.jpg', 0, '2023-08-27 08:58:27', '2023-08-27 10:30:50'),
(5, '<span>Best Ecommerce Solutions 1 </span>  to Boost your Brand Name &amp; Sales', 'We offer an industry-driven and successful digital marketing strategy that helps our clients\r\n                        in achieving a strong online presence and maximum company profit.', '1693245496.jpg', 0, '2023-08-27 09:00:22', '2023-08-28 10:58:16'),
(8, '<span>Top up now </span>', 'new product comming in stock, to check it out press the button to get it.', '1702805402.jpg', 0, '2023-12-17 02:30:02', '2023-12-17 02:30:02');

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
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Admin', 'Admin@gmail.com', NULL, '$2y$10$YhUbNKVYh1HVEWKnei0O.eYOfA1boI4HRep/dpMxSFizhWaix/lWm', 'wCP70XReYNrxeJvf9LAQhQ3MW1yv3Qk8k80uLXpMEAqdZErRkNPiMg90Qkh8', '2023-11-15 08:41:18', '2023-11-15 08:41:18', 1),
(2, 'User', 'User@gmail.com', NULL, '$2y$10$xPbF19cxSD/BUkD6ZQKXbu1Fuma/S73poci5gSaXWL2hOjHoXgpAS', NULL, '2023-11-15 08:58:05', '2023-12-29 09:17:01', 0),
(3, 'Ratanak', 'Ratanak123@gmail.com', NULL, '$2y$10$vW5b9X/br/VrfccyVFJ9RezsuzFmmJlwV2zLmEctr3EsVYi/tbGS.', NULL, '2023-11-15 10:33:56', '2023-11-15 10:33:56', 0),
(4, 'Unknown', 'Unknow123@gmail.com', NULL, '$2y$10$5ZDrkFL7xKrkohlIW3HalezCRG8PCrEqglD9/MHxPrn2C/xsaKxpi', NULL, '2023-12-14 08:43:06', '2023-12-14 08:43:06', 0),
(7, 'Seyha', 'SeyhaBlinking$123@gmail.com', NULL, '$2y$10$4U6b7LRI1tusjDVHITILseeTSxr9Mtcel6U0tkZRHzHYzCeZ0A8D6', NULL, '2023-12-24 11:44:05', '2024-01-03 09:26:43', 0),
(8, 'Mr.Ratanak', 'ron.ratanakPTM@gmail.com', NULL, '$2y$10$oI3wyb5Go0XkKCeoxNRseOn0ngVI3axNZIrQjbwooT0c1CDfYs6PG', NULL, '2023-12-29 11:22:13', '2023-12-29 11:22:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `username`, `phone`, `flat_no`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'User', '0967162577', '404', 'PHNOM BERNG', '2023-12-29 08:21:33', '2023-12-29 08:23:46'),
(2, 8, 'Mr.Ratanak', '0999333444', '504', 'Kandal', '2024-01-01 10:06:06', '2024-01-01 10:06:06'),
(3, 7, 'Seyha', '0999333444', '5454', 'Poipet', '2024-01-05 09:26:47', '2024-01-05 09:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists_tbl`
--

CREATE TABLE `wishlists_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists_tbl`
--

INSERT INTO `wishlists_tbl` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 3, 10, '2023-11-27 10:02:29', '2023-11-27 10:02:29'),
(6, 3, 11, '2023-11-27 10:02:38', '2023-11-27 10:02:38'),
(11, 2, 2, '2023-11-28 10:35:05', '2023-11-28 10:35:05'),
(12, 2, 7, '2023-11-28 10:35:06', '2023-11-28 10:35:06'),
(20, 7, 19, '2023-12-25 09:19:11', '2023-12-25 09:19:11'),
(22, 3, 7, '2023-12-27 08:33:11', '2023-12-27 08:33:11'),
(23, 8, 11, '2023-12-29 11:24:22', '2023-12-29 11:24:22'),
(24, 8, 16, '2023-12-30 08:49:34', '2023-12-30 08:49:34'),
(26, 4, 23, '2024-01-03 04:56:18', '2024-01-03 04:56:18'),
(27, 4, 15, '2024-01-03 08:51:32', '2024-01-03 08:51:32'),
(28, 7, 20, '2024-01-03 09:41:13', '2024-01-03 09:41:13'),
(29, 7, 22, '2024-01-03 09:41:14', '2024-01-03 09:41:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_tbl`
--
ALTER TABLE `color_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images_tbl`
--
ALTER TABLE `images_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_tbl_products_tbl_id_foreign` (`products_tbl_id`);

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
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products_color_tbl`
--
ALTER TABLE `products_color_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_color_tbl_products_id_foreign` (`products_tbl_id`),
  ADD KEY `products_color_tbl_colors_id_foreign` (`colors_id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_tbl_category_tbl_id_foreign` (`category_tbl_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_tbl`
--
ALTER TABLE `slide_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_user_id_unique` (`user_id`);

--
-- Indexes for table `wishlists_tbl`
--
ALTER TABLE `wishlists_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `color_tbl`
--
ALTER TABLE `color_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images_tbl`
--
ALTER TABLE `images_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_color_tbl`
--
ALTER TABLE `products_color_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slide_tbl`
--
ALTER TABLE `slide_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists_tbl`
--
ALTER TABLE `wishlists_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images_tbl`
--
ALTER TABLE `images_tbl`
  ADD CONSTRAINT `images_tbl_products_tbl_id_foreign` FOREIGN KEY (`products_tbl_id`) REFERENCES `products_tbl` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_color_tbl`
--
ALTER TABLE `products_color_tbl`
  ADD CONSTRAINT `products_color_tbl_colors_id_foreign` FOREIGN KEY (`colors_id`) REFERENCES `color_tbl` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_color_tbl_products_id_foreign` FOREIGN KEY (`products_tbl_id`) REFERENCES `products_tbl` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD CONSTRAINT `products_tbl_category_tbl_id_foreign` FOREIGN KEY (`category_tbl_id`) REFERENCES `category_tbl` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
