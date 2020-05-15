-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 08:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dragon`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_description`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amazing pure Nature Huny', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin', 'public/uploads/slider/1663970778172817.jpg', 1, NULL, '2020-04-14 19:32:35'),
(3, 'Amazing Alovera Oil', 'Our Country product is very well.Alovera is Very Helpful', 'public/uploads/slider/1663980697574808.jpg', 1, '2020-04-14 19:30:12', '2020-04-14 20:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `blogcats`
--

CREATE TABLE `blogcats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcats`
--

INSERT INTO `blogcats` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Coconut Oil', 1, '2020-04-16 19:36:49', NULL),
(2, 'Honey', 1, '2020-04-16 20:44:22', NULL),
(3, 'Olive Oil', 1, '2020-04-16 20:44:37', NULL),
(4, 'Nut Oil', 1, '2020-04-16 20:44:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `comment_id`, `added_by`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '1', 'We Can Ensure Your Comfortable Life', '<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</div><div><br></div><div>typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div><div>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div><div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</div><div><br></div><div>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div>', 'public/uploads/blog/1664160637747787.jpg', 1, '2020-04-16 20:01:02', NULL),
(2, 2, NULL, '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</div><div><br></div><div>typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div><div>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div><div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</div><div><br></div><div>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div>', 'public/uploads/blog/1664163583422059.jpg', 1, '2020-04-16 20:47:48', NULL),
(3, 1, NULL, '1', 'Coconut Oil', '<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</div><div><br></div><div>typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div><div>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div><div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</div><div><br></div><div>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><div><br></div>', 'public/uploads/blog/1664234610152340.jpg', 1, '2020-04-17 15:36:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `ip_address`, `created_at`, `updated_at`) VALUES
(59, 11, 1, '127.0.0.1', '2020-04-30 05:17:10', NULL),
(60, 2, 1, '127.0.0.1', '2020-04-30 05:17:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `category_name`, `category_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 'Mens Fashion', 'public/uploads/category_photo/7ff95cedf6.jpg', '2020-04-09 12:06:46', '2020-04-09 12:06:46', NULL),
(8, 1, 'mobile', 'public/uploads/category_photo/98179d458d.png', '2020-04-09 12:41:59', '2020-04-15 06:11:25', NULL),
(12, 1, 'Smartphone', 'public/uploads/category_photo/1fb684cb4a.jpg', '2020-04-16 04:36:10', '2020-04-16 04:36:10', NULL),
(13, 1, 'coconut oil', 'public/uploads/category_photo/0af94f04f9.png', '2020-04-18 05:52:33', '2020-04-18 05:52:33', NULL),
(14, 1, 'Headphone', 'public/uploads/category_photo/252845dc3f.png', '2020-04-18 06:58:04', '2020-04-18 06:58:04', NULL),
(15, 1, 'Pure Honey', 'public/uploads/category_photo/e02b5a5216.png', '2020-04-19 08:05:34', '2020-04-19 08:05:34', NULL),
(16, 1, 'Laptop', 'public/uploads/category_photo/0eacc869b0.png', '2020-04-22 15:57:15', '2020-04-22 15:57:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'jishan', 'ss@gmail.com', 'That\'s Very Nice Product....Thanks for Quick Delivery', 1, '2020-04-17 13:26:14', '2020-04-17 14:37:28'),
(2, 2, 'sarjid islam', 'sarjid@gmail.com', 'This is a Amazing Product', 1, '2020-04-17 15:08:07', '2020-04-17 15:09:46'),
(3, 2, 'Redoy', 'redoy@gmail.com', 'Your Prouducts is very sweets and pure', 1, '2020-04-17 15:10:59', '2020-04-17 15:11:11'),
(4, 1, 'Sata Houston', 'teacher@gmail.com', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when', 1, '2020-04-19 12:27:37', '2020-04-19 15:57:43'),
(5, 1, 'Timberlake Justin', 'admin@gmail.com', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when', 1, '2020-04-19 12:28:20', '2020-04-19 15:57:37'),
(6, 3, 'Tasfiya', 'tasfiya@gmail.com', 'wow....Your BLog is very nice ...just is love your content', 0, '2020-04-20 03:00:13', NULL),
(7, 2, 'rimon', 'rimon@gmail.com', 'niceeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 1, '2020-04-20 20:09:27', '2020-04-20 20:11:15'),
(8, 3, 'sarjid islam', 'admin@gmail.com', 'YOur blog is very Nice', 1, '2020-04-23 06:06:52', '2020-04-23 06:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sarjid islam', 'sarjid777@gmail.com', 'I want to get partnership with your Business', 'Hello, Boss. iam also honey business man. iwant to business with you', '2020-04-12 17:40:00', NULL, NULL),
(2, 'jishan', 'jishan@gmail.com', 'I want to get partnership with your Business', 'Hey business man your huney quality is very good ........ i want to business with you', '2020-04-12 17:46:45', '2020-04-12 17:46:45', NULL),
(3, 'shahin', 'shahin@gmail.com', 'I want to get partnership with your Business', 'I want to get partnership with your BusinessI want to get partnership with your Business', '2020-04-12 18:01:38', NULL, NULL),
(4, 'Redoy', 'jishan@gmail.com', 'I want to get partnership with your Business', 'I want to get partnership with your BusinessI want to get partnership with your Business', '2020-04-12 18:43:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `validity_till` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount_amount`, `validity_till`, `created_at`, `updated_at`) VALUES
(2, 'VALENTINE', 14, '2020-04-14', '2020-04-25 16:34:58', NULL),
(3, 'BOISAKH', 50, '2020-04-30', '2020-04-25 16:38:25', '2020-04-25 17:00:41'),
(4, 'BD2', 2, '2020-05-01', '2020-04-27 08:36:02', '2020-04-29 22:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General Inquiries', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 1, '2020-04-17 16:49:23', NULL),
(2, 'How  to use', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 1, '2020-04-23 16:18:46', NULL),
(3, 'Shipping Delivery', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 1, '2020-04-23 16:19:14', NULL),
(4, 'Additional Information', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 1, '2020-04-23 16:19:50', NULL),
(5, 'Return Plicy ?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 1, '2020-04-23 16:20:08', NULL);

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
(6, '2020_04_05_204728_create_categories_table', 2),
(8, '2020_04_12_225824_create_contacts_table', 3),
(10, '2020_04_14_193016_create_banners_table', 4),
(12, '2020_04_15_024011_create_testimonials_table', 5),
(13, '2020_04_15_113046_create_products_table', 6),
(16, '2020_04_17_003555_create_blogs_table', 7),
(17, '2020_04_17_011107_create_blogcats_table', 7),
(18, '2020_04_17_185915_create_comments_table', 8),
(19, '2020_04_17_220521_create_faqs_table', 9),
(20, '2020_04_18_130321_create_product_multiple_photos_table', 10),
(22, '2020_04_19_180207_create_productreviews_table', 11),
(23, '2020_04_19_233835_create_carts_table', 12),
(26, '2020_04_21_093932_create_wishlists_table', 13),
(27, '2020_04_23_230856_create_coupons_table', 14),
(29, '2020_04_29_233738_create_orders_table', 15),
(30, '2020_04_30_015454_create_order_lists_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_option` int(11) NOT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `full_name`, `email`, `phone_number`, `country`, `address`, `post_code`, `city`, `notes`, `payment_option`, `sub_total`, `total`, `created_at`, `updated_at`) VALUES
(1, 8, 'Abul', 'abul@gmail.com', '0155555555', 'Bangladesh', 'sadullapur ,Gaibandha', '5710', 'Rangpur', 'Please send me a original products', 1, '6350', '3175', '2020-04-29 21:53:52', NULL),
(2, 8, 'Abul', 'abul@gmail.com', '0155555555', 'Bangladesh', 'sadullapur ,Gaibandha', '5710', 'Rangpur', 'Please send me a original products', 1, '6350', '3175', '2020-04-29 21:55:37', NULL),
(3, 8, 'Abul', 'abul@gmail.com', '0155555555', 'Bangladesh', 'sadullapur ,Gaibandha', '5710', 'Rangpur', 'Please send me a original products', 1, '6350', '3175', '2020-04-29 21:57:21', NULL),
(4, 9, 'shihab Molla', 'shihabb@gmail.com', '01722260010', 'Bangladesh', 'sadullapur ,Gaibandha', '5710', 'Rangpur', 'Please Quckly Delivery', 1, '1000', '980', '2020-04-29 22:03:15', NULL),
(5, 9, 'shihab Molla', 'shihabb@gmail.com', '01722260010', 'Bangladesh', 'sadullapur ,Gaibandha', '5710', 'Rangpur', 'Please send me quickly...........', 1, '5100', '2550', '2020-04-30 05:16:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_lists`
--

CREATE TABLE `order_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lists`
--

INSERT INTO `order_lists` (`id`, `user_id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 12, 1, '2020-04-29 21:53:52', NULL),
(2, 8, 1, 8, 3, '2020-04-29 21:53:52', NULL),
(3, 9, 4, 7, 1, '2020-04-29 22:03:15', NULL),
(4, 9, 4, 10, 1, '2020-04-29 22:03:15', NULL),
(5, 9, 5, 10, 1, '2020-04-30 05:16:27', NULL),
(6, 9, 5, 12, 1, '2020-04-30 05:16:27', NULL),
(7, 9, 5, 8, 1, '2020-04-30 05:16:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sarjid777@gmail.com', '$2y$10$W.03I1yzF9Q3lo5mHAfzY.xf1Ek.wCvluIbk8CHC7UjzJ3.ef.0S2', '2020-04-12 16:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `product_id`, `name`, `email`, `review`, `stars`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'Sata Houston', 'st@gmail.com', 'nice product ..... Thanks For Your Quick Delivery', 5, 0, '2020-04-19 12:53:54', NULL),
(2, 11, 'Redoy', 'redoy@gmail.com', 'Thanks For Your Quick Delivery', 5, 0, '2020-04-19 13:18:54', NULL),
(3, 3, 'shahin', 'shahin@gmail.com', 'wow........That\'s great product', 4, 0, '2020-04-19 17:01:30', NULL),
(4, 10, 'nasim', 'nasim@gmail.com', 'just wow', 4, 0, '2020-04-20 20:13:52', NULL),
(5, 12, 'Jishan', 'jishan@gmail.com', 'that\'s very nice product', 5, 0, '2020-04-23 05:57:40', NULL),
(6, 11, 'liza', 'tasfiya@gmail.com', 'Thanks For Your Quick Delivery', 2, 0, '2020-04-23 05:58:58', NULL),
(7, 8, 'keya', 'keya@gmail.com', 'wow.....just very nice for my husband', 5, 0, '2020-04-23 06:05:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `product_price`, `product_quantity`, `short_description`, `long_description`, `product_thambnail`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, NULL, 'iphone x-11', 7500, 150, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', 'we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.\r\n\r\nThese cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.', 'public/uploads/product/1664102945827938.png', 1, '2020-04-16 04:44:01', '2020-04-16 05:26:14', '2020-04-16 05:26:14'),
(2, 12, NULL, 'iphone x-11', 5800, 70, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', 'we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.\r\n\r\nThese cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.', 'public/uploads/product/1664690808018200.jpg', 1, '2020-04-16 05:27:30', '2020-04-22 16:27:48', NULL),
(3, 12, NULL, 'Symphoney v70', 4300, 300, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', 'we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.\r\n\r\nThese cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.', 'public/uploads/product/1664690718786615.jpg', 1, '2020-04-16 13:23:24', '2020-04-22 16:26:23', NULL),
(4, 12, NULL, 'Samsung s9', 72000, 50, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi hic amet repellendus assumenda voluptatem iste. In exercitationem aliquam eligendi sint quidem natus eum aliquid laboriosam id adipisci excepturi voluptas, eaque, doloribus corporis ducimus ut suscipit alias ad! Quidem vel sint quasi fugit officiis aliquam, provident suscipit veritatis sunt amet! Rem maxime amet quo laudantium deleniti quia ipsum delectus, nesciunt dignissimos debitis incidunt sed nisi', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi hic amet repellendus assumenda voluptatem iste. In exercitationem aliquam eligendi sint quidem natus eum aliquid laboriosam id adipisci excepturi voluptas, eaque, doloribus corporis ducimus ut suscipit alias ad! Quidem vel sint quasi fugit officiis aliquam, provident suscipit veritatis sunt amet! Rem maxime amet quo laudantium deleniti quia ipsum delectus, nesciunt dignissimos debitis incidunt sed nisi&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi hic amet repellendus assumenda voluptatem iste. In exercitationem aliquam eligendi sint quidem natus eum aliquid laboriosam id adipisci excepturi voluptas, eaque, doloribus corporis ducimus ut suscipit alias ad! Quidem vel sint quasi fugit officiis aliquam, provident suscipit veritatis sunt amet! Rem maxime amet quo laudantium deleniti quia ipsum delectus, nesciunt dignissimos debitis incidunt sed nisi', 'public/uploads/product/1664690097066644.webp', 1, '2020-04-16 17:28:26', '2020-04-22 16:16:30', NULL),
(5, 13, NULL, 'Coconut Oil', 79, 200, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', '<span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</span>', 'public/uploads/product/1664690535286742.jpg', 1, '2020-04-18 05:54:39', '2020-04-22 16:23:28', NULL),
(6, 14, NULL, 'Headphone Remax', 260, 7, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', '<span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span>', 'public/uploads/product/1664689789223201.jpg', 1, '2020-04-18 06:59:45', '2020-04-29 21:15:23', NULL),
(7, 5, NULL, 'Smart Watch-B3', 750, 199, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', '<span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided</span>', 'public/uploads/product/1664689949345200.jpg', 1, '2020-04-18 07:16:07', '2020-04-29 22:03:15', NULL),
(8, 5, NULL, 'Mens Watch-h3', 750, 196, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', '<span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided</span>', 'public/uploads/product/1664689564292803.png', 1, '2020-04-18 07:17:11', '2020-04-30 05:16:27', NULL),
(10, 5, NULL, 'T-shirt', 250, 55, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', '<span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span>', 'public/uploads/product/1664689676313265.jpeg', 1, '2020-04-18 07:21:44', '2020-04-30 05:16:27', NULL),
(11, 15, NULL, 'Pure Sweet Honey', 210, 500, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', '<span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span>', 'public/uploads/product/1664689436225337.jpg', 1, '2020-04-19 08:07:21', '2020-04-22 16:06:00', NULL),
(12, 16, NULL, 'Notebook laptop', 4100, 8, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs', '<span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span><span style=\"color: rgb(51, 51, 51); font-family: Poppins, sans-serif;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs</span>', 'public/uploads/product/1664689329421342.png', 1, '2020-04-22 15:58:55', '2020-04-30 05:16:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_multiple_photos`
--

CREATE TABLE `product_multiple_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_multiple_photos`
--

INSERT INTO `product_multiple_photos` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 10, 'public/uploads/product/1664294064932674.jpg', '2020-04-18 07:21:44', NULL),
(2, 10, 'public/uploads/product/1664294065065978.jpg', '2020-04-18 07:21:44', NULL),
(3, 10, 'public/uploads/product/1664294065347673.jpg', '2020-04-18 07:21:45', NULL),
(4, 10, 'public/uploads/product/1664294065670752.jpg', '2020-04-18 07:21:45', NULL),
(5, 11, 'public/uploads/product/1664387532278145.jpg', '2020-04-19 08:07:22', NULL),
(6, 11, 'public/uploads/product/1664387532465043.jpg', '2020-04-19 08:07:22', NULL),
(7, 11, 'public/uploads/product/1664387532847070.jpg', '2020-04-19 08:07:22', NULL),
(8, 12, 'public/uploads/product/1664688991043907.png', '2020-04-22 15:58:55', NULL),
(9, 12, 'public/uploads/product/1664688991260143.png', '2020-04-22 15:58:55', NULL),
(10, 12, 'public/uploads/product/1664688991552923.png', '2020-04-22 15:58:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `title`, `review`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sarjid islam', 'Professional Full Stack Web Developer', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin', 'public/uploads/testimonial/1663984030729208.png', '1', '2020-04-14 21:13:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sarjid islam', 'sarjid777@gmail.com', '', '2020-04-08 12:25:56', '$2y$10$Nmp87c7/Z2zn6t2Xga9x5uswQbJtSevvozQcZwDpaqo9nh5YgcC5W', 1, 'v9joNyd9IrSFM1NRaXujbsIUcSttpbWxyZOJhhEs5kCYkhdICLgh65qL6BDO', '2020-04-05 07:45:39', '2020-04-09 12:41:26'),
(2, 'Habil Mia', 'habil@gmail.com', NULL, NULL, '$2y$10$i7UPbEE9dbM35vZyS1ERZ.LQXOtqhMPL4UAjII4qZ3LX8UsfdwRNi', 1, NULL, '2020-04-05 07:46:18', '2020-04-05 07:46:18'),
(3, 'jishan', 'jihan@gmail.com', NULL, NULL, '$2y$10$kAkrvb27uF8sIl/YvpC8G.MqW5O2oFYgVSULOSO/ITFgHsYgYSeFu', 1, NULL, '2020-04-05 07:46:49', '2020-04-05 07:46:49'),
(4, 'Khan', 'khan@gmail.com', NULL, NULL, '$2y$10$o8jO/XfNUQ1Gj4cL7Xs49uBYl.9rinvL6WztSxBpHRRK3trVHIXNW', 1, NULL, '2020-04-05 07:47:20', '2020-04-05 07:47:20'),
(5, 'shihab', 'shihab@gmail.com', NULL, NULL, '$2y$10$jb1DPg.SoHMF8udJCS122e9NAGTd2Ai8AVpnog9e8S1UN8aqg6nFK', 1, NULL, '2020-04-05 08:12:06', '2020-04-05 08:12:06'),
(6, 'Kamal Raja', 'kamal@gmail.com', NULL, NULL, '$2y$10$sQD5T1D2TSS2qgYLWrri4OrxF94APKmAuQtFhc9cWjwACGRA6UaAa', 1, NULL, '2020-04-05 14:28:15', '2020-04-05 14:28:15'),
(7, 'jishan Mahmud', 'ji@gmail.com', NULL, NULL, '$2y$10$F75wYO2i/hVRZL5H32ZKL.SmhvKsV5iL4NF.UcainbTB3iof9Yhge', 1, NULL, '2020-04-08 11:14:11', '2020-04-08 11:18:55'),
(8, 'Abul', 'abul@gmail.com', NULL, '2020-04-08 12:25:56', '$2y$10$pN4YBpGWe3ULGJncdoeLLeFjZOvjRR1Uf4o1cIcricZsvBkQrFVKG', 2, NULL, '2020-04-29 16:13:42', NULL),
(9, 'shihab Molla', 'shihabb@gmail.com', NULL, '2020-04-08 12:25:56', '$2y$10$42Rnwsay5OosvlltDUUqvuDBKqSLhis5KXtlmDh2nFVMMvHFjQDaG', 2, NULL, '2020-04-29 21:59:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcats`
--
ALTER TABLE `blogcats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
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
-- Indexes for table `order_lists`
--
ALTER TABLE `order_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogcats`
--
ALTER TABLE `blogcats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_lists`
--
ALTER TABLE `order_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
