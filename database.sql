-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2023 lúc 07:03 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `electro_3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `short_description` mediumtext NOT NULL,
  `long_description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `tag`, `date_time`, `short_description`, `long_description`, `image`, `slug`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'Robot Wars', 'Design', '2023-11-02 13:54:53', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.', 'https://transvelo.github.io/electro-html/2.0/assets/img/1500X730/img1.jpg', 'robot-wars', NULL, NULL, 1),
(3, 'Robot Wars 1', 'Games', '2023-11-02 13:54:53', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.', 'https://transvelo.github.io/electro-html/2.0/assets/img/1500X730/img7.jpg', 'robot-wars-1', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Apple', 'apple', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(7, 'Samsung', 'samsung', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(8, 'Sony', 'sony', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(9, 'LG', 'lg', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(10, 'Panasonic', 'panasonic', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(11, 'Philips', 'philips', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(12, 'Microsoft', 'microsoft', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(13, 'Dell', 'dell', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(14, 'HP (Hewlett-Packard)', 'hp', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(15, 'Lenovo', 'lenovo', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(16, 'IBM', 'ibm', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(17, 'Toshiba', 'toshiba', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(18, 'Acer', 'acer', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(19, 'Asus', 'asus', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(20, 'Nokia', 'nokia', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(21, 'Motorola', 'motorola', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(22, 'Huawei', 'huawei', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(23, 'Xiaomi', 'xiaomi', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(24, 'Oppo', 'oppo', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11'),
(25, 'Vivo', 'vivo', 1, '2023-11-03 02:33:11', '2023-11-03 02:33:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(62, 11, 9, 15, 1, '2023-11-12 05:39:17', '2023-11-12 05:39:17'),
(63, 25, 10, 17, 1, '2023-11-13 00:14:55', '2023-11-13 00:14:55'),
(64, 26, 10, 17, 3, '2023-11-15 00:13:04', '2023-11-16 05:32:33'),
(65, 26, 6, 9, 1, '2023-11-15 00:51:19', '2023-11-15 00:51:19'),
(66, 1, 11, 20, 1, '2023-11-15 02:02:26', '2023-11-15 02:02:26'),
(67, 26, 10, 18, 1, '2023-11-16 06:11:41', '2023-11-16 06:11:41'),
(68, 26, 11, 20, 1, '2023-11-16 06:28:43', '2023-11-16 06:28:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'hidden' COMMENT ' hidden, published, scheduled',
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `seo_description` mediumtext NOT NULL,
  `publish_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `image`, `slug`, `title`, `description`, `seo_description`, `publish_date`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'published', 'images/nCInFxWuM3KvIce0akNGeFxVz1ZjbRv5QJ9Wgo6M.png', 'laptop', 'ewa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'gae', '30/09/2023', '2023-09-21 17:04:27', '2023-09-29 18:13:34'),
(4, 'Cameras', 'published', NULL, 'cameras', 'aewg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'aewg', '22/09/2023', '2023-09-21 08:14:15', '2023-09-21 08:14:15'),
(6, 'smartphones', 'published', NULL, 'smartphones', 'agwe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'ăge', '22/09/2023', '2023-09-21 08:15:19', '2023-09-21 08:15:19'),
(7, 'drone', 'published', NULL, 'drone', 'geaw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'gaew', '22/09/2023', '2023-09-21 08:16:09', '2023-09-21 08:16:09'),
(8, 'headphones', 'published', NULL, 'headphones', 'aegw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'ăeg', '22/09/2023', '2023-09-21 08:16:41', '2023-09-21 08:16:41'),
(9, 'tvs', 'published', NULL, 'tvs', 'agew', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'gưea', '22/09/2023', '2023-09-21 08:16:58', '2023-09-21 08:16:58'),
(10, 'speaker', 'published', NULL, 'speaker', 'agew', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'ưaeg', '22/09/2023', '2023-09-21 08:17:16', '2023-09-21 08:17:16'),
(11, 'gamepad', 'published', NULL, 'gamepad', 'eawg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'ưage', '22/09/2023', '2023-09-21 08:17:45', '2023-09-21 08:17:45'),
(12, 'smartwatch', 'published', NULL, 'smartwatch', 'aewg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare, mi in ornare elementum, libero nibh lacinia urna, quis convallis lorem erat at purus. Maecenas eu varius nisi.', 'agwe', '22/09/2023', '2023-09-21 08:18:18', '2023-09-21 08:18:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'ff0000', 1, '2023-09-24 22:58:40', '2023-09-24 22:58:47'),
(2, 'Pink', 'ee82ee', 1, '2023-09-24 22:58:53', '2023-09-24 22:58:53'),
(4, 'Purple', '6a5acd', 1, '2023-09-24 22:59:08', '2023-09-24 22:59:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ffsdtdhdth', 'dfbgdnd', 'dntszdzgn', 'tjndgtn', '2023-11-13 01:28:16', '2023-11-13 01:28:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `is_active`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'ff0000', 12, 1, '2023-11-15 07:05:09', '2023-11-02 06:37:00', '2023-11-02 07:05:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_blogs`
--

CREATE TABLE `detail_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_histories`
--

CREATE TABLE `login_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `login_time` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_15_021909_create_brands_table', 1),
(6, '2023_09_16_231405_add_details_to_users_table', 1),
(7, '2023_09_17_003526_create_categories_table', 1),
(8, '2023_09_19_023916_create_sub_categories_table', 1),
(9, '2023_09_19_075123_create_products_table', 1),
(10, '2023_09_19_114346_create_product_images_table', 1),
(11, '2023_09_21_075538_create_colors_table', 1),
(12, '2023_09_21_075605_create_product_colors_table', 1),
(13, '2023_09_22_055403_create_sliders_table', 1),
(14, '2023_09_25_023013_add_to_products_table', 2),
(15, '2023_09_26_024747_create_wishlists_table', 2),
(16, '2023_09_29_041357_create_carts_table', 3),
(17, '2023_09_29_041357_create_carts_update_table', 4),
(18, '2023_09_29_081327_create_orders_table', 5),
(19, '2023_09_29_081335_create_order_items_table', 6),
(20, '2023_09_29_082737_add_to_order_table', 7),
(21, '2023_09_29_115137_add_id_to_orders_table', 8),
(22, '2023_10_01_054859_add_to_orders_table', 9),
(23, '2023_10_02_032715_add_to_sub_categories_table', 10),
(24, '2023_11_02_062149_create_wallets_table', 11),
(25, '2023_11_02_062731_create_transaction_table', 12),
(26, '2023_11_02_072524_add_to_transaction_table', 13),
(27, '2023_11_02_073631_add_method_to_transaction_table', 14),
(28, '2023_11_02_130743_create_coupons_table', 15),
(29, '2023_11_02_123246_create_blogs_table', 16),
(30, '2023_11_02_144609_create_detail_blogs_table', 16),
(31, '2023_11_03_013952_add_to_blogs_table', 17),
(32, '2023_11_12_125046_create_contacts_table', 18),
(33, '2023_11_12_142548_create_customers_table', 19),
(34, '2023_11_13_023503_add_otp_to_users_table', 20),
(35, '2023_11_13_023504_add_otp_to_users_table', 21),
(36, '2023_11_13_023505_add_otp_to_users_table', 22),
(37, '2023_11_16_093119_create_login_histories_table', 23),
(38, '2023_11_16_122339_create_product_comments_table', 23),
(39, '2023_11_16_164426_add_info_account_to_users_table', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT 'individual',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `payment_mode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `firstname`, `lastname`, `country`, `address`, `city`, `zipcode`, `company`, `email`, `phone`, `status`, `payment_mode`, `created_at`, `updated_at`, `shipping_price`, `user_id`, `total_amount`) VALUES
(21, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'unpaid', 'bank', '2023-09-30 16:47:30', '2023-09-30 16:47:34', 90.00, 1, 9083.94),
(26, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'pending', 'cash', '2023-09-30 17:01:21', '2023-09-30 17:01:21', 29.98, 1, 3027.98),
(27, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'unpaid', 'bank', '2023-09-30 17:03:25', '2023-09-30 17:03:34', 29.98, 1, 3027.98),
(28, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'unpaid', 'bank', '2023-09-30 17:21:56', '2023-09-30 17:22:03', 44.97, 1, 4541.97),
(29, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'unpaid', 'bank', '2023-10-01 15:43:06', '2023-10-01 15:43:11', 11.98, 1, 1209.98),
(30, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'pending', 'cash', '2023-10-01 18:35:38', '2023-10-01 18:35:38', 11.98, 1, 1209.98),
(31, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'paid', 'bank', '2023-10-01 18:36:42', '2023-10-01 18:37:23', 44.97, 1, 4541.97),
(32, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'confirm', 'cash', '2023-10-01 18:41:34', '2023-10-01 18:42:24', 1249.00, 1, 126149.00),
(66, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'pending', 'cash', '2023-11-02 08:21:53', '2023-11-02 08:21:53', 3.96, 11, 351.96),
(67, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'pending', 'cash', '2023-11-02 08:24:03', '2023-11-02 08:24:03', 1.17, 11, 103.99),
(68, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'pending', 'cash', '2023-11-03 01:04:26', '2023-11-03 01:04:26', 5.99, 11, 532.39),
(69, 'dfbdfb', 'gvsrg', 'AQ', 'rfgnfdgnsd', 'ẻdbfdfrn', '352463', 'drgnfgfn', 'tester@gmail.com', '435634574357', 'paid', 'wallet', '2023-11-17 10:27:46', '2023-11-17 10:27:46', 104.93, 41, 10597.93),
(70, 'tai', 'nguyen', 'VN', '34634rgrdsgs', 'dryngfvc', '675567', 'nht', 'nht4646@gmail.com', '0545235634', 'paid', 'wallet', '2023-11-17 11:00:31', '2023-11-17 11:00:31', 1.17, 42, 118.17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 6, 9, 1499, '2023-09-29 02:30:29', '2023-09-29 02:30:29'),
(2, 1, 1, 3, 3, 523, '2023-09-29 02:30:29', '2023-09-29 02:30:29'),
(5, 3, 2, 6, 5, 1499, '2023-09-30 00:02:20', '2023-09-30 00:02:20'),
(6, 5, 2, 6, 9, 1499, '2023-09-30 00:04:20', '2023-09-30 00:04:20'),
(7, 6, 2, 6, 5, 1499, '2023-09-30 22:53:31', '2023-09-30 22:53:31'),
(8, 10, 2, 6, 5, 1499, '2023-09-30 22:57:16', '2023-09-30 22:57:16'),
(9, 11, 2, 6, 5, 1499, '2023-09-30 22:59:19', '2023-09-30 22:59:19'),
(10, 12, 2, 6, 5, 1499, '2023-09-30 22:59:44', '2023-09-30 22:59:44'),
(11, 13, 2, 6, 5, 1499, '2023-09-30 23:00:09', '2023-09-30 23:00:09'),
(12, 14, 2, 6, 1, 1499, '2023-09-30 23:01:02', '2023-09-30 23:01:02'),
(13, 15, 2, 6, 1, 1499, '2023-09-30 23:03:31', '2023-09-30 23:03:31'),
(14, 16, 2, 6, 2, 1499, '2023-09-30 23:13:36', '2023-09-30 23:13:36'),
(15, 17, 2, 6, 1, 1499, '2023-09-30 23:15:36', '2023-09-30 23:15:36'),
(16, 18, 1, 4, 4, 523, '2023-09-30 23:19:56', '2023-09-30 23:19:56'),
(17, 19, 2, 6, 5, 1499, '2023-09-30 23:40:55', '2023-09-30 23:40:55'),
(18, 20, 2, 6, 5, 1499, '2023-09-30 23:41:25', '2023-09-30 23:41:25'),
(19, 21, 2, 6, 6, 1499, '2023-09-30 23:47:30', '2023-09-30 23:47:30'),
(20, 22, 2, 6, 134, 1499, '2023-09-30 23:57:05', '2023-09-30 23:57:05'),
(21, 25, 2, 6, 21213, 1499, '2023-09-30 23:58:58', '2023-09-30 23:58:58'),
(22, 26, 2, 6, 2, 1499, '2023-10-01 00:01:21', '2023-10-01 00:01:21'),
(23, 27, 2, 6, 2, 1499, '2023-10-01 00:03:25', '2023-10-01 00:03:25'),
(24, 28, 2, 6, 3, 1499, '2023-10-01 00:21:56', '2023-10-01 00:21:56'),
(25, 29, 9, 16, 2, 599, '2023-10-01 22:43:06', '2023-10-01 22:43:06'),
(26, 30, 10, 18, 2, 599, '2023-10-02 01:35:38', '2023-10-02 01:35:38'),
(27, 31, 5, 7, 3, 1499, '2023-10-02 01:36:42', '2023-10-02 01:36:42'),
(28, 32, 8, 14, 100, 1249, '2023-10-02 01:41:34', '2023-10-02 01:41:34'),
(29, 33, 2, 6, 1, 99, '2023-11-02 00:54:09', '2023-11-02 00:54:09'),
(30, 34, 1, 3, 1, 39, '2023-11-02 00:59:55', '2023-11-02 00:59:55'),
(31, 35, 1, 3, 1, 39, '2023-11-02 01:37:58', '2023-11-02 01:37:58'),
(32, 36, 1, 3, 1, 39, '2023-11-02 01:39:23', '2023-11-02 01:39:23'),
(33, 37, 10, 17, 1, 599, '2023-11-02 07:31:04', '2023-11-02 07:31:04'),
(34, 38, 1, 3, 1, 39, '2023-11-02 07:33:16', '2023-11-02 07:33:16'),
(35, 38, 2, 6, 1, 99, '2023-11-02 07:33:16', '2023-11-02 07:33:16'),
(36, 39, 2, 6, 4, 99, '2023-11-02 08:00:42', '2023-11-02 08:00:42'),
(37, 40, 3, 21, 1, 1499, '2023-11-02 08:01:26', '2023-11-02 08:01:26'),
(38, 41, 1, 3, 1, 39, '2023-11-02 08:04:28', '2023-11-02 08:04:28'),
(39, 41, 2, 6, 2, 99, '2023-11-02 08:04:28', '2023-11-02 08:04:28'),
(40, 42, 2, 6, 2, 99, '2023-11-02 08:05:44', '2023-11-02 08:05:44'),
(41, 43, 1, 3, 1, 39, '2023-11-02 08:07:01', '2023-11-02 08:07:01'),
(42, 51, 1, 3, 2, 39, '2023-11-02 08:11:36', '2023-11-02 08:11:36'),
(43, 58, 1, 3, 2, 39, '2023-11-02 08:14:05', '2023-11-02 08:14:05'),
(44, 60, 1, 3, 3, 39, '2023-11-02 08:14:59', '2023-11-02 08:14:59'),
(45, 61, 1, 3, 3, 39, '2023-11-02 08:15:25', '2023-11-02 08:15:25'),
(46, 62, 1, 3, 3, 39, '2023-11-02 08:15:28', '2023-11-02 08:15:28'),
(47, 63, 1, 3, 3, 39, '2023-11-02 08:16:26', '2023-11-02 08:16:26'),
(48, 64, 1, 3, 3, 39, '2023-11-02 08:16:55', '2023-11-02 08:16:55'),
(49, 65, 1, 3, 8, 39, '2023-11-02 08:17:27', '2023-11-02 08:17:27'),
(50, 66, 2, 6, 4, 99, '2023-11-02 08:21:53', '2023-11-02 08:21:53'),
(51, 67, 1, 3, 3, 39, '2023-11-02 08:24:03', '2023-11-02 08:24:03'),
(52, 68, 10, 17, 1, 599, '2023-11-03 01:04:26', '2023-11-03 01:04:26'),
(53, 69, 5, 7, 4, 1499, '2023-11-17 10:27:46', '2023-11-17 10:27:46'),
(54, 69, 6, 9, 3, 1499, '2023-11-17 10:27:46', '2023-11-17 10:27:46'),
(55, 70, 1, 3, 3, 39, '2023-11-17 11:00:31', '2023-11-17 11:00:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `promotion_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `hot` tinyint(4) NOT NULL,
  `status` varchar(255) NOT NULL,
  `publish_date` varchar(255) DEFAULT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sub_category_id`, `name`, `brand_id`, `slug`, `brand`, `small_description`, `description`, `price`, `promotion_price`, `quantity`, `hot`, `status`, `publish_date`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 4, 'Anker 7-in-1 USB C Hub Adapter', 6, 'anker-7-in-1-usb-c-hub-adapter', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 59, 39, 0, 0, 'published', '02/10/2023', 'gaew', 'waeg', '2023-09-24 13:05:57', '2023-10-01 18:39:50'),
(5, 4, 'MSI GE66 Raider', 7, 'msi-ge66-raider', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1599, 1499, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:24:40', '2023-10-01 14:25:11'),
(6, 4, 'Razer Blade 15', 7, 'razer-blade-15', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1799, 1499, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(7, 4, 'ASUS ROG Zephyrus G14', 7, 'asus-rog-zephyrus-g14', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1299, 1149, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(8, 4, 'HP Omen 15', 7, 'hp-omen-15', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1399, 1249, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:32:57', '2023-10-01 14:32:57'),
(9, 16, 'Forerunner 945 Advanced GPS Running Smartwatch', 7, 'garmin-forerunner-945-advanced-gps-running-smartwatch', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:41:01', '2023-10-01 14:41:01'),
(10, 18, 'Fitbit Versa 3 Health & Fitness Smartwatch with GPS', 7, 'fitbit-versa-3-health-fitness-smartwatch-with-gps', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:59:16', '2023-10-01 14:59:16'),
(11, 17, 'Samsung Galaxy Watch4 Classic LTE', 7, 'samsung-galaxy-watch4-classic-lte', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(12, 13, 'OUKITEL WP20', 7, 'oukitel-wp20', NULL, 'Dung lượng lưu trữ\r\n32GB\r\nTình trạng\r\nKhác\r\nRAM\r\n4GB', '<p>🥇【Cost-effective Rugged Mobile Phone - OUKITEL WP20】Ang Pinakabagong Rugged Phone ng OUKITEL sa 2022! Naglalayong sa kahinaan ng &quot;mabigat na mobile phone&quot; ng mga katulad na produkto ng Rugged, ang aming laki ay sadyang dinisenyo upang maging laki ng palad, ang timbang ay portable at praktikal para sa iyong buhay at panlabas na mga gawain. OUKITEL WP20 murang telepono ay dumating sa tatlong kulay: Kalmado Black, Tropical Orange at Eco Green.</p>', 1200, 1000, 0, 0, 'published', '16/11/2023', 'Điện thoại cầm tay chắc chắn', 'Điện thoại cầm tay chắc chắn', '2023-11-16 08:21:55', '2023-11-16 08:21:55'),
(13, 13, 'Samsung Galaxy S21', 7, 'samsung-galaxy-s21', NULL, 'Dung lượng lưu trữ\r\n128GB\r\nTình trạng\r\nMới 100%\r\nRAM\r\n8GB', '<p>The Samsung Galaxy S21 is the latest flagship smartphone from Samsung. It features a stunning display, powerful performance, and a versatile camera system. With its sleek design and premium build quality, the Galaxy S21 is a top choice for smartphone enthusiasts.</p>', 1500, 1300, 0, 0, 'published', '16/11/2023', 'Samsung, Galaxy S21, smartphone', 'The Samsung Galaxy S21 is a high-end smartphone with a powerful camera and advanced features.', '2023-11-16 01:21:55', '2023-11-16 01:21:55'),
(14, 13, 'iPhone 13 Pro', 7, 'iphone-13-pro', NULL, 'Dung lượng lưu trữ\r\n256GB\r\nTình trạng\r\nMới 100%\r\nRAM\r\n8GB', '<p>The iPhone 13 Pro is Apple\'s latest flagship smartphone. It features a stunning Super Retina XDR display, a powerful A15 Bionic chip, and an advanced camera system. With its sleek design and premium build quality, the iPhone 13 Pro is a top choice for iPhone fans.</p>', 1800, 1700, 0, 0, 'published', '16/11/2023', 'Apple, iPhone 13 Pro, smartphone', 'The iPhone 13 Pro is a high-end smartphone with advanced features and a powerful camera.', '2023-11-16 01:21:55', '2023-11-16 01:21:55'),
(16, 13, 'OUKITEL WP20', 7, 'oukitel-wp20', NULL, 'Dung lượng lưu trữ\r\n32GB\r\nTình trạng\r\nKhác\r\nRAM\r\n4GB', '<p>🥇【Cost-effective Rugged Mobile Phone - OUKITEL WP20】Ang Pinakabagong Rugged Phone ng OUKITEL sa 2022! Naglalayong sa kahinaan ng &quot;mabigat na mobile phone&quot; ng mga katulad na produkto ng Rugged, ang aming laki ay sadyang dinisenyo upang maging laki ng palad, ang timbang ay portable at praktikal para sa iyong buhay at panlabas na mga gawain. OUKITEL WP20 murang telepono ay dumating sa tatlong kulay: Kalmado Black, Tropical Orange at Eco Green.</p>', 1200, 1000, 0, 0, 'published', '16/11/2023', 'Điện thoại cầm tay chắc chắn', 'Điện thoại cầm tay chắc chắn', '2023-11-16 01:21:55', '2023-11-16 01:21:55'),
(19, 13, 'Xiaomi Redmi Note 10', 9, 'xiaomi-redmi-note-10', NULL, 'Dung lượng lưu trữ\r\n128GB\r\nTình trạng\r\nMới 100%\r\nRAM\r\n6GB', '<p>The Xiaomi Redmi Note 10 is a budget-friendly smartphone with impressive features. It boasts a large display, powerful processor, and a high-resolution camera. With its affordable price tag, the Redmi Note 10 is a popular choice among budget-conscious consumers.</p>', 800, 700, 0, 0, 'published', '16/11/2023', 'Xiaomi, Redmi Note 10, smartphone', 'The Xiaomi Redmi Note 10 is a budget-friendly smartphone with a large display and powerful performance.', '2023-11-16 01:21:55', '2023-11-16 01:21:55'),
(20, 14, 'Sony PlayStation 5', 10, 'sony-playstation-5', NULL, 'Dung lượng lưu trữ\r\n825GB\r\nTình trạng\r\nMới 100%', '<p>The Sony PlayStation 5 is the latest gaming console from Sony. It offers stunning graphics, fast load times, and a wide range of games. With its innovative features and powerful hardware, the PlayStation 5 delivers an immersive gaming experience.</p>', 1500, 1400, 0, 0, 'published', '16/11/2023', 'Sony, PlayStation 5, gaming console', 'The Sony PlayStation 5 is a high-end gaming console with advanced graphics and innovative features.', '2023-11-16 01:21:55', '2023-11-16 01:21:55'),
(21, 15, 'Dell XPS 15', 11, 'dell-xps-15', NULL, 'Dung lượng lưu trữ\r\n1TB\r\nTình trạng\r\nMới 100%\r\nRAM\r\n16GB', '<p>The Dell XPS 15 is a high-performance laptop with a stunning display and powerful hardware. It features a sleek design, excellent build quality, and long battery life. Whether youre a professional or a casual user, the Dell XPS 15 offers a great computing experience.</p>', 2000, 1900, 0, 0, 'published', '16/11/2023', 'Dell, XPS 15, laptop', 'The Dell XPS 15 is a high-performance laptop with a stunning display and powerful hardware.', '2023-11-16 01:21:55', '2023-11-16 01:21:55'),
(29, 15, 'Samsung Galaxy S21', 0, 'samsung-galaxy-s21', 'Samsung', '', 'The Samsung Galaxy S21 is a flagship Android smartphone with a powerful processor and a stunning display. It features a high-resolution camera, fast charging capabilities, and a sleek design.', 999, NULL, 50, 0, 'published', NULL, '', '', '2023-11-16 15:37:08', '2023-11-16 15:37:08'),
(30, 15, 'Google Pixel 6', 6, 'google-pixel-6', 'Google', 'aaa', '<p>The Google Pixel 6 is an Android smartphone that offers a pure Android experience with fast performance and regular software updates. It comes with a top-of-the-line camera, a vibrant OLED display, and a long-lasting battery.1</p>', 799, 111, 30, 0, 'published', '16/11/2023', '11', '111', '2023-11-16 15:37:08', '2023-11-16 09:49:58'),
(31, 15, 'OnePlus 9 Pro', 0, 'oneplus-9-pro', 'OnePlus', '', 'The OnePlus 9 Pro is a premium Android smartphone with a high-refresh-rate display and a powerful Snapdragon processor. It boasts a versatile camera system, fast charging capabilities, and a sleek design.', 899, NULL, 20, 0, 'published', NULL, '', '', '2023-11-16 15:37:08', '2023-11-16 15:37:08'),
(32, 15, 'Xiaomi Mi 11', 0, 'xiaomi-mi-11', 'Xiaomi', '', 'The Xiaomi Mi 11 is a feature-packed Android smartphone with a high-resolution display and a powerful processor. It offers a versatile camera system, fast charging capabilities, and an affordable price.', 699, NULL, 40, 0, 'published', NULL, '', '', '2023-11-16 15:37:08', '2023-11-16 15:37:08'),
(35, 15, 'Samsung Galaxy S20', 0, 'samsung-galaxy-s20', 'Samsung', 'Powerful Android smartphone', 'The Samsung Galaxy S20 is a powerful Android smartphone with a stunning display and advanced camera features.', 799, NULL, 50, 0, 'published', '2023-11-16 22:41:53', 'Samsung Galaxy S20, Android smartphone', 'The Samsung Galaxy S20 is a powerful Android smartphone with a stunning display and advanced camera features.', '2023-11-16 15:41:53', '2023-11-16 15:41:53'),
(36, 15, 'Google Pixel 5', 6, 'google-pixel-5', 'Google', 'Pure Android experience', '<p>The Google Pixel 5 offers a pure Android experience with fast performance and regular software updates.</p>', 699, 599, 30, 0, 'published', '16/11/2023', 'Google Pixel 5, Android smartphone', 'The Google Pixel 5 offers a pure Android experience with fast performance and regular software updates.', '2023-11-16 15:41:53', '2023-11-16 09:45:35'),
(37, 15, 'OnePlus 8 Pro', 0, 'oneplus-8-pro', 'OnePlus', 'Flagship Android smartphone', 'The OnePlus 8 Pro is a flagship Android smartphone with a high-refresh-rate display and a powerful processor.', 899, NULL, 20, 0, 'published', '2023-11-16 22:41:53', 'OnePlus 8 Pro, Android smartphone', 'The OnePlus 8 Pro is a flagship Android smartphone with a high-refresh-rate display and a powerful processor.', '2023-11-16 15:41:53', '2023-11-16 15:41:53'),
(38, 15, 'Xiaomi Redmi Note 10', 0, 'xiaomi-redmi-note-10', 'Xiaomi', 'Affordable Android smartphone', 'The Xiaomi Redmi Note 10 is an affordable Android smartphone with a large display and a long-lasting battery.', 299, NULL, 40, 0, 'published', '2023-11-16 22:41:53', 'Xiaomi Redmi Note 10, Android smartphone', 'The Xiaomi Redmi Note 10 is an affordable Android smartphone with a large display and a long-lasting battery.', '2023-11-16 15:41:53', '2023-11-16 15:41:53'),
(39, 14, 'iPhone 12 Pro', 0, 'iphone-12-pro', 'Apple', 'Flagship iPhone', 'The iPhone 12 Pro is a flagship iPhone with a powerful A14 Bionic chip and advanced camera system.', 999, NULL, 50, 0, 'published', '2023-11-16 22:44:32', 'iPhone 12 Pro, Apple smartphone', 'The iPhone 12 Pro is a flagship iPhone with a powerful A14 Bionic chip and advanced camera system.', '2023-11-16 15:44:32', '2023-11-16 15:44:32'),
(40, 14, 'iPhone 11', 0, 'iphone-11', 'Apple', 'Powerful iPhone', 'The iPhone 11 features a powerful A13 Bionic chip, a dual-camera system, and a liquid Retina display.', 699, NULL, 30, 0, 'published', '2023-11-16 22:44:32', 'iPhone 11, Apple smartphone', 'The iPhone 11 features a powerful A13 Bionic chip, a dual-camera system, and a liquid Retina display.', '2023-11-16 15:44:32', '2023-11-16 15:44:32'),
(41, 14, 'iPhone SE', 0, 'iphone-se', 'Apple', 'Compact iPhone', 'The iPhone SE is a compact iPhone with a powerful A14 Bionic chip and a single-camera system.', 399, NULL, 20, 0, 'published', '2023-11-16 22:44:32', 'iPhone SE, Apple smartphone', 'The iPhone SE is a compact iPhone with a powerful A14 Bionic chip and a single-camera system.', '2023-11-16 15:44:32', '2023-11-16 15:44:32'),
(42, 14, 'iPad Air', 0, 'ipad-air', 'Apple', 'Powerful iPad', 'The iPad Air features a powerful A14 Bionic chip, a large display, and support for Apple Pencil.', 599, NULL, 40, 0, 'published', '2023-11-16 22:44:32', 'iPad Air, Apple tablet', 'The iPad Air features a powerful A14 Bionic chip, a large display, and support for Apple Pencil.', '2023-11-16 15:44:32', '2023-11-16 15:44:32'),
(43, 5, 'Chuột không dây Logitech MX Master 3', 6, 'chuot-khong-day-logitech-mx-master-3', 'Logitech', 'Chuột không dây cao cấp', '<p>Chuột kh&ocirc;ng d&acirc;y Logitech MX Master 3 l&agrave; một chuột cao cấp với thiết kế tiện dụng v&agrave; t&iacute;nh năng đa nhiệm.</p>', 149, 139, 50, 0, 'published', '16/11/2023', 'Chuột không dây, Logitech MX Master 3', 'Chuột không dây Logitech MX Master 3 là một chuột cao cấp với thiết kế tiện dụng và tính năng đa nhiệm.', '2023-11-16 15:47:10', '2023-11-16 09:36:26'),
(44, 5, 'Chuột không dây Microsoft Surface Arc', 6, 'chuot-khong-day-microsoft-surface-arc', 'Microsoft', 'Chuột không dây mỏng nhẹ', '<p>Chuột kh&ocirc;ng d&acirc;y Microsoft Surface Arc c&oacute; thiết kế mỏng nhẹ v&agrave; linh hoạt, ph&ugrave; hợp với người d&ugrave;ng di chuyển.</p>', 79, 69, 30, 0, 'published', '16/11/2023', 'Chuột không dây, Microsoft Surface Arc', 'Chuột không dây Microsoft Surface Arc có thiết kế mỏng nhẹ và linh hoạt, phù hợp với người dùng di chuyển.', '2023-11-16 15:47:10', '2023-11-16 09:37:06'),
(45, 5, 'Chuột không dây HP X3000', 6, 'chuot-khong-day-hp-x3000', 'HP', 'Chuột không dây giá rẻ', '<p>Chuột kh&ocirc;ng d&acirc;y HP X3000 l&agrave; một lựa chọn phổ biến với gi&aacute; cả phải chăng v&agrave; t&iacute;nh năng đơn giản.</p>', 19, 17, 20, 0, 'published', '16/11/2023', 'Chuột không dây, HP X3000', 'Chuột không dây HP X3000 là một lựa chọn phổ biến với giá cả phải chăng và tính năng đơn giản.', '2023-11-16 15:47:10', '2023-11-16 09:35:38'),
(46, 5, 'Chuột không dây Dell WM126', 6, 'chuot-khong-day-dell-wm126', 'Dell', 'Chuột không dây tiện dụng', '<p>Chuột kh&ocirc;ng d&acirc;y Dell WM126 c&oacute; thiết kế tiện dụng v&agrave; hoạt động đ&aacute;ng tin cậy.</p>', 29, 19, 40, 0, 'published', '16/11/2023', 'Chuột không dây, Dell WM126', 'Chuột không dây Dell WM126 có thiết kế tiện dụng và hoạt động đáng tin cậy.', '2023-11-16 15:47:10', '2023-11-16 09:35:03'),
(47, 6, 'Baseus Adjustable Laptop Stand', 6, 'baseus-adjustable-laptop-stand', 'Baseus', 'Adjustable Laptop Stand', '<p>The Baseus Adjustable Laptop Stand is a versatile stand that provides ergonomic viewing angles for your laptop.</p>', 50, 49, 50, 0, 'published', '16/11/2023', 'Laptop Stand, Adjustable Stand, Baseus', 'The Baseus Adjustable Laptop Stand is a versatile stand that provides ergonomic viewing angles for your laptop.', '2023-11-16 15:50:07', '2023-11-16 09:30:29'),
(48, 6, 'Anker Vertical Laptop Stand', 6, 'anker-vertical-laptop-stand', 'Anker', 'Vertical Laptop Stand', '<p>The Anker Vertical Laptop Stand is a space-saving stand that holds your laptop in a vertical position.</p>', 30, 100, 30, 0, 'published', '16/11/2023', 'Laptop Stand, Vertical Stand, Anker', 'The Anker Vertical Laptop Stand is a space-saving stand that holds your laptop in a vertical position.', '2023-11-16 15:50:07', '2023-11-16 09:17:49'),
(49, 6, 'Rain Design mStand Laptop Stand', 6, 'rain-design-mstand-laptop-stand', 'Rain Design', 'Aluminum Laptop Stand', '<p>The Rain Design mStand Laptop Stand is a stylish stand made of aluminum that elevates your laptop for better airflow and ergonomics.</p>', 60, 50, 20, 0, 'published', '16/11/2023', 'Laptop Stand, Aluminum Stand, Rain Design', 'The Rain Design mStand Laptop Stand is a stylish stand made of aluminum that elevates your laptop for better airflow and ergonomics.', '2023-11-16 15:50:07', '2023-11-16 09:55:27'),
(50, 6, 'Twelve South BookArc Vertical Stand', 6, 'twelve-south-bookarc-vertical-stand', 'Twelve South', 'Vertical Stand for MacBook', '<p>The Twelve South BookArc Vertical Stand is specifically designed for MacBook and allows you to dock your MacBook in a vertical position.</p>', 40, 30, 40, 0, 'published', '16/11/2023', 'Vertical Stand, MacBook Stand, Twelve South', 'The Twelve South BookArc Vertical Stand is specifically designed for MacBook and allows you to dock your MacBook in a vertical position.', '2023-11-16 15:50:07', '2023-11-16 09:56:18'),
(51, 2, 'Dell XPS 13', 6, 'dell-xps-13', 'Dell', 'Powerful Ultrabook', '<p>The Dell XPS 13 is a powerful ultrabook with a sleek design and high-performance specifications.</p>', 1299, 1199, 50, 0, 'published', '16/11/2023', 'Ultrabook, Dell XPS 13', 'The Dell XPS 13 is a powerful ultrabook with a sleek design and high-performance specifications.', '2023-11-16 15:52:51', '2023-11-16 09:37:54'),
(52, 2, 'HP Spectre x360', 6, 'hp-spectre-x360', 'HP', 'Convertible Ultrabook', '<p>The HP Spectre x360 is a convertible ultrabook that combines the power of a laptop with the flexibility of a tablet.</p>', 1199, 1099, 30, 0, 'published', '16/11/2023', 'Ultrabook, Convertible, HP Spectre x360', 'The HP Spectre x360 is a convertible ultrabook that combines the power of a laptop with the flexibility of a tablet.', '2023-11-16 15:52:51', '2023-11-16 09:50:43'),
(53, 2, 'Lenovo ThinkPad X1 Carbon', 6, 'lenovo-thinkpad-x1-carbon', 'Lenovo', 'Business Ultrabook', '<p>The Lenovo ThinkPad X1 Carbon is a business ultrabook known for its durability and performance.</p>', 1499, 1399, 20, 0, 'published', '16/11/2023', 'Ultrabook, Business Laptop, Lenovo ThinkPad X1 Carbon', 'The Lenovo ThinkPad X1 Carbon is a business ultrabook known for its durability and performance.', '2023-11-16 15:52:51', '2023-11-16 09:53:04'),
(54, 2, 'Asus ZenBook 14', 6, 'asus-zenbook-14', 'Asus', 'Compact Ultrabook', '<p>The Asus ZenBook 14 is a compact ultrabook with a lightweight design and powerful specifications.</p>', 999, 899, 40, 0, 'published', '16/11/2023', 'Ultrabook, Compact Laptop, Asus ZenBook 14', 'The Asus ZenBook 14 is a compact ultrabook with a lightweight design and powerful specifications.', '2023-11-16 15:52:51', '2023-11-16 09:29:52'),
(55, 7, 'Canon EOS Rebel T7', 6, 'canon-eos-rebel-t7', 'Canon', 'Entry-level DSLR Camera', '<p>The Canon EOS Rebel T7 is an entry-level DSLR camera that offers high-quality image capture and easy-to-use features.</p>', 499, 489, 50, 0, 'published', '16/11/2023', 'Digital Camera, DSLR, Canon EOS Rebel T7', 'The Canon EOS Rebel T7 is an entry-level DSLR camera that offers high-quality image capture and easy-to-use features.', '2023-11-16 15:54:25', '2023-11-16 09:34:20'),
(56, 7, 'Nikon D5600', 0, 'nikon-d5600', 'Nikon', 'Mid-range DSLR Camera', 'The Nikon D5600 is a mid-range DSLR camera with advanced features and excellent image quality.', 799, NULL, 30, 0, 'published', '2023-11-16 22:54:25', 'Digital Camera, DSLR, Nikon D5600', 'The Nikon D5600 is a mid-range DSLR camera with advanced features and excellent image quality.', '2023-11-16 15:54:25', '2023-11-16 15:54:25'),
(57, 7, 'Sony Alpha a6000', 0, 'sony-alpha-a6000', 'Sony', 'Mirrorless Camera', 'The Sony Alpha a6000 is a compact mirrorless camera that delivers exceptional image quality and fast autofocus performance.', 649, NULL, 20, 0, 'published', '2023-11-16 22:54:25', 'Digital Camera, Mirrorless, Sony Alpha a6000', 'The Sony Alpha a6000 is a compact mirrorless camera that delivers exceptional image quality and fast autofocus performance.', '2023-11-16 15:54:25', '2023-11-16 15:54:25'),
(58, 7, 'Fujifilm X-T4', 6, 'fujifilm-x-t4', 'Fujifilm', 'Professional Mirrorless Camera', '<p>The Fujifilm X-T4 is a professional-grade mirrorless camera with advanced features and outstanding image stabilization.</p>', 1699, 1599, 40, 0, 'published', '16/11/2023', 'Digital Camera, Mirrorless, Fujifilm X-T4', 'The Fujifilm X-T4 is a professional-grade mirrorless camera with advanced features and outstanding image stabilization.', '2023-11-16 15:54:25', '2023-11-16 09:43:35'),
(59, 8, 'GoPro Hero9 Black', 0, 'gopro-hero9-black', 'GoPro', '4K Action Camera', 'The GoPro Hero9 Black is a powerful 4K action camera that captures stunning footage and comes with advanced features for outdoor adventures.', 399, NULL, 50, 1, 'published', '2023-11-16 22:55:43', 'Action Camera, GoPro Hero9 Black', 'The GoPro Hero9 Black is a powerful 4K action camera that captures stunning footage and comes with advanced features for outdoor adventures.', '2023-11-16 15:55:43', '2023-11-16 15:55:43'),
(60, 8, 'DJI Osmo Action', 6, 'dji-osmo-action', 'DJI', '4K Action Camera', '<p>The DJI Osmo Action is a versatile 4K action camera that offers smooth, stable footage and is perfect for capturing your adventures.</p>', 299, 289, 30, 0, 'published', '16/11/2023', 'Action Camera, DJI Osmo Action', 'The DJI Osmo Action is a versatile 4K action camera that offers smooth, stable footage and is perfect for capturing your adventures.', '2023-11-16 15:55:43', '2023-11-16 09:39:41'),
(61, 8, 'Sony RX0 II', 0, 'sony-rx0-ii', 'Sony', 'Ultra-Compact Action Camera', 'The Sony RX0 II is an ultra-compact action camera that delivers high-quality images and is waterproof, shockproof, and crushproof.', 699, NULL, 20, 0, 'published', '2023-11-16 22:55:43', 'Action Camera, Sony RX0 II', 'The Sony RX0 II is an ultra-compact action camera that delivers high-quality images and is waterproof, shockproof, and crushproof.', '2023-11-16 15:55:43', '2023-11-16 15:55:43'),
(62, 8, 'Insta360 ONE R', 0, 'insta360-one-r', 'Insta360', 'Modular Action Camera', 'The Insta360 ONE R is a modular action camera that allows you to switch between different lens modules to capture different perspectives.', 499, NULL, 40, 0, 'published', '2023-11-16 22:55:43', 'Action Camera, Insta360 ONE R', 'The Insta360 ONE R is a modular action camera that allows you to switch between different lens modules to capture different perspectives.', '2023-11-16 15:55:43', '2023-11-16 15:55:43'),
(63, 9, 'Polaroid OneStep 2', 0, 'polaroid-onestep-2', 'Polaroid', 'Analog Instant Camera', 'The Polaroid OneStep 2 is an analog instant camera that captures nostalgic, vintage-style photos with its classic design.', 99, NULL, 30, 0, 'published', '2023-11-16 22:57:19', 'Instant Camera, Polaroid OneStep 2', 'The Polaroid OneStep 2 is an analog instant camera that captures nostalgic, vintage-style photos with its classic design.', '2023-11-16 15:57:19', '2023-11-16 15:57:19'),
(64, 9, 'Leica Sofort', 0, 'leica-sofort', 'Leica', 'Premium Instant Camera', 'The Leica Sofort is a premium instant camera that combines classic design with modern features, producing high-quality instant prints.', 299, NULL, 20, 0, 'published', '2023-11-16 22:57:19', 'Instant Camera, Leica Sofort', 'The Leica Sofort is a premium instant camera that combines classic design with modern features, producing high-quality instant prints.', '2023-11-16 15:57:19', '2023-11-16 15:57:19'),
(65, 9, 'Kodak Printomatic', 0, 'kodak-printomatic', 'Kodak', 'Digital Instant Print Camera', 'The Kodak Printomatic is a digital instant print camera that captures and prints photos in an instant, giving you physical copies to share and enjoy.', 79, NULL, 40, 0, 'published', '2023-11-16 22:57:19', 'Instant Camera, Kodak Printomatic', 'The Kodak Printomatic is a digital instant print camera that captures and prints photos in an instant, giving you physical copies to share and enjoy.', '2023-11-16 15:57:19', '2023-11-16 15:57:19'),
(67, 9, 'Fujifilm Instax Mini 9', 6, 'fujifilm-instax-mini-9', 'Fujifilm', 'Instant Film Camera', '<p>The Fujifilm Instax Mini 9 is a fun and easy-to-use instant film camera that prints credit card-sized photos instantly.</p>', 69, 59, 50, 0, 'published', '16/11/2023', 'Instant Camera, Fujifilm Instax Mini 9', 'The Fujifilm Instax Mini 9 is a fun and easy-to-use instant film camera that prints credit card-sized photos instantly.', '2023-11-16 15:57:19', '2023-11-16 09:42:58'),
(68, 10, 'SanDisk Memory Card', 0, 'sandisk-memory-card', 'SanDisk', 'High-Speed Memory Card', 'The SanDisk Memory Card is a high-speed memory card that offers ample storage space and fast data transfer for capturing and storing your precious moments.', 49, NULL, 30, 0, 'published', '2023-11-16 22:58:15', 'Camera Accessories, SanDisk Memory Card', 'The SanDisk Memory Card is a high-speed memory card that offers ample storage space and fast data transfer for capturing and storing your precious moments.', '2023-11-16 15:58:15', '2023-11-16 15:58:15'),
(69, 10, 'Lowepro Camera Bag', 0, 'lowepro-camera-bag', 'Lowepro', 'Camera Backpack', 'The Lowepro Camera Bag is a durable and spacious camera backpack that provides excellent protection and organization for your camera gear during travel and outdoor adventures.', 79, NULL, 20, 0, 'published', '2023-11-16 22:58:15', 'Camera Accessories, Lowepro Camera Bag', 'The Lowepro Camera Bag is a durable and spacious camera backpack that provides excellent protection and organization for your camera gear during travel and outdoor adventures.', '2023-11-16 15:58:15', '2023-11-16 15:58:15'),
(70, 10, 'Rode VideoMic', 0, 'rode-videomic', 'Rode', 'Camera Microphone', 'The Rode VideoMic is a high-quality camera microphone that enhances the audio recording of your videos, capturing clear and professional sound.', 129, NULL, 40, 0, 'published', '2023-11-16 22:58:15', 'Camera Accessories, Rode VideoMic', 'The Rode VideoMic is a high-quality camera microphone that enhances the audio recording of your videos, capturing clear and professional sound.', '2023-11-16 15:58:15', '2023-11-16 15:58:15'),
(71, 10, 'Manfrotto Tripod', 0, 'manfrotto-tripod', 'Manfrotto', 'Professional Camera Tripod', 'The Manfrotto Tripod is a professional-grade camera tripod that provides stability and flexibility for capturing high-quality photos and videos.', 149, NULL, 50, 1, 'published', '2023-11-16 22:58:15', 'Camera Accessories, Manfrotto Tripod', 'The Manfrotto Tripod is a professional-grade camera tripod that provides stability and flexibility for capturing high-quality photos and videos.', '2023-11-16 15:58:15', '2023-11-16 15:58:15'),
(72, 11, 'JBL Flip 5', 0, 'jbl-flip-5', 'JBL', 'Portable Bluetooth Speaker', 'The JBL Flip 5 is a portable Bluetooth speaker that delivers powerful and immersive sound in a compact and rugged design, making it perfect for outdoor adventures and parties.', 99, NULL, 50, 1, 'published', '2023-11-16 22:59:29', 'Bluetooth Speakers, JBL Flip 5', 'The JBL Flip 5 is a portable Bluetooth speaker that delivers powerful and immersive sound in a compact and rugged design, making it perfect for outdoor adventures and parties.', '2023-11-16 15:59:29', '2023-11-16 15:59:29'),
(73, 11, 'Sony XB33', 0, 'sony-xb33', 'Sony', 'Waterproof Bluetooth Speaker', 'The Sony XB33 is a waterproof Bluetooth speaker that combines deep, punchy bass with clear and dynamic sound, making it ideal for pool parties and beach outings.', 149, NULL, 30, 0, 'published', '2023-11-16 22:59:29', 'Bluetooth Speakers, Sony XB33', 'The Sony XB33 is a waterproof Bluetooth speaker that combines deep, punchy bass with clear and dynamic sound, making it ideal for pool parties and beach outings.', '2023-11-16 15:59:29', '2023-11-16 15:59:29'),
(74, 11, 'UE Boom 3', 0, 'ue-boom-3', 'UE', 'Portable Wireless Speaker', 'The UE Boom 3 is a portable wireless speaker that delivers 360-degree sound with deep bass and stunning clarity, creating an immersive listening experience anywhere you go.', 129, NULL, 20, 0, 'published', '2023-11-16 22:59:29', 'Bluetooth Speakers, UE Boom 3', 'The UE Boom 3 is a portable wireless speaker that delivers 360-degree sound with deep bass and stunning clarity, creating an immersive listening experience anywhere you go.', '2023-11-16 15:59:29', '2023-11-16 15:59:29'),
(75, 11, 'Bose SoundLink Revolve', 6, 'bose-soundlink-revolve', 'Bose', '360-Degree Bluetooth Speaker', '<p>The Bose SoundLink Revolve is a 360-degree Bluetooth speaker that offers true 360-degree sound for consistent, uniform coverage, ensuring a great listening experience from every angle.</p>', 199, 189, 40, 0, 'published', '16/11/2023', 'Bluetooth Speakers, Bose SoundLink Revolve', 'The Bose SoundLink Revolve is a 360-degree Bluetooth speaker that offers true 360-degree sound for consistent, uniform coverage, ensuring a great listening experience from every angle.', '2023-11-16 15:59:29', '2023-11-16 09:31:17'),
(77, 12, 'Logitech Z623', 0, 'logitech-z623', 'Logitech', '2.1 Speaker System', 'The Logitech Z623 is a powerful 2.1 speaker system that delivers rich and immersive sound for your desktop or computer setup, enhancing your audio experience while gaming, watching movies, or listening to music.', 149, NULL, 50, 1, 'published', '2023-11-16 23:00:29', 'Desktop Speakers, Logitech Z623', 'The Logitech Z623 is a powerful 2.1 speaker system that delivers rich and immersive sound for your desktop or computer setup, enhancing your audio experience while gaming, watching movies, or listening to music.', '2023-11-16 16:00:29', '2023-11-16 16:00:29'),
(78, 12, 'Edifier R1280T', 6, 'edifier-r1280t', 'Edifier', 'Active Bookshelf Speakers', '<p>The Edifier R1280T is a pair of active bookshelf speakers that produce clear and balanced audio with rich bass, making them ideal for desktop use or as a compact stereo system.</p>', 99, 89, 30, 0, 'published', '16/11/2023', 'Desktop Speakers, Edifier R1280T', 'The Edifier R1280T is a pair of active bookshelf speakers that produce clear and balanced audio with rich bass, making them ideal for desktop use or as a compact stereo system.', '2023-11-16 16:00:29', '2023-11-16 09:40:14'),
(79, 12, 'Harman Kardon SoundSticks III', 0, 'harman-kardon-soundsticks-iii', 'Harman Kardon', '3-Piece Speaker System', 'The Harman Kardon SoundSticks III is a visually stunning 3-piece speaker system with a transparent design and exceptional sound quality, perfect for enhancing your desktop audio experience.', 199, NULL, 20, 0, 'published', '2023-11-16 23:00:29', 'Desktop Speakers, Harman Kardon SoundSticks III', 'The Harman Kardon SoundSticks III is a visually stunning 3-piece speaker system with a transparent design and exceptional sound quality, perfect for enhancing your desktop audio experience.', '2023-11-16 16:00:29', '2023-11-16 16:00:29'),
(80, 12, 'Bose Companion 2 Series III', 6, 'bose-companion-2-series-iii', 'Bose', 'Multimedia Speaker System', '<p>The Bose Companion 2 Series III is a multimedia speaker system that delivers clear and balanced audio for your computer or laptop, providing an immersive sound experience for your music, movies, and games.</p>', 99, 89, 40, 0, 'published', '16/11/2023', 'Desktop Speakers, Bose Companion 2 Series III', 'The Bose Companion 2 Series III is a multimedia speaker system that delivers clear and balanced audio for your computer or laptop, providing an immersive sound experience for your music, movies, and games.', '2023-11-16 16:00:29', '2023-11-16 09:32:10'),
(82, 16, 'Fitbit Versa 3', 6, 'fitbit-versa-3', 'Fitbit', 'Advanced Fitness Smartwatch', '<p>The Fitbit Versa 3 is an advanced fitness smartwatch that tracks your workouts, monitors your heart rate, and provides personalized insights to help you reach your fitness goals. With built-in GPS and a long battery life, its the perfect companion for your active lifestyle.</p>', 229, 219, 50, 0, 'published', '16/11/2023', 'Fitness Smartwatches, Fitbit Versa 3', 'The Fitbit Versa 3 is an advanced fitness smartwatch that tracks your workouts, monitors your heart rate, and provides personalized insights to help you reach your fitness goals. With built-in GPS and a long battery life, its the perfect companion for your active lifestyle.', '2023-11-16 16:01:52', '2023-11-16 09:41:12'),
(83, 16, 'Apple Watch Series 7', 6, 'apple-watch-series-7', 'Apple', 'High-End Fitness Smartwatch', '<p>The Apple Watch Series 7 is a high-end fitness smartwatch that features a larger display, advanced health tracking capabilities, and seamless integration with your iPhone. With its sleek design and powerful features, its the ultimate smartwatch for fitness enthusiasts.</p>', 399, 150, 30, 0, 'published', '16/11/2023', 'Fitness Smartwatches, Apple Watch Series 7', 'The Apple Watch Series 7 is a high-end fitness smartwatch that features a larger display, advanced health tracking capabilities, and seamless integration with your iPhone. With its sleek design and powerful features, its the ultimate smartwatch for fitness enthusiasts.', '2023-11-16 16:01:52', '2023-11-16 09:29:09'),
(84, 16, 'Samsung Galaxy Watch4', 0, 'samsung-galaxy-watch4', 'Samsung', 'Versatile Fitness Smartwatch', 'The Samsung Galaxy Watch4 is a versatile fitness smartwatch that combines stylish design with advanced health and fitness tracking features. With its comprehensive set of sensors and intuitive interface, it helps you stay motivated and achieve your fitness goals.', 299, NULL, 20, 0, 'published', '2023-11-16 23:01:52', 'Fitness Smartwatches, Samsung Galaxy Watch4', 'The Samsung Galaxy Watch4 is a versatile fitness smartwatch that combines stylish design with advanced health and fitness tracking features. With its comprehensive set of sensors and intuitive interface, it helps you stay motivated and achieve your fitness goals.', '2023-11-16 16:01:52', '2023-11-16 16:01:52'),
(85, 16, 'Garmin Forerunner 945', 6, 'garmin-forerunner-945', 'Garmin', 'Advanced GPS Smartwatch', '<p>The Garmin Forerunner 945 is an advanced GPS smartwatch designed for serious athletes. It offers comprehensive activity tracking, built-in maps, and advanced performance metrics to help you train smarter and achieve new personal records.</p>', 599, 499, 40, 0, 'published', '16/11/2023', 'Fitness Smartwatches, Garmin Forerunner 945', 'The Garmin Forerunner 945 is an advanced GPS smartwatch designed for serious athletes. It offers comprehensive activity tracking, built-in maps, and advanced performance metrics to help you train smarter and achieve new personal records.', '2023-11-16 16:01:52', '2023-11-16 09:44:49'),
(87, 17, 'Apple Watch SE', 6, 'apple-watch-se', 'Apple', 'Stylish Fashion Smartwatch', '<p>The Apple Watch SE is a stylish fashion smartwatch that combines advanced features with an affordable price. With its sleek design, customizable watch faces, and seamless integration with your iPhone, its the perfect accessory to complement your fashion-forward lifestyle.</p>', 279, 100, 50, 0, 'published', '16/11/2023', 'Fashion Smartwatches, Apple Watch SE', 'The Apple Watch SE is a stylish fashion smartwatch that combines advanced features with an affordable price. With its sleek design, customizable watch faces, and seamless integration with your iPhone, its the perfect accessory to complement your fashion-forward lifestyle.', '2023-11-16 16:02:46', '2023-11-16 09:28:30'),
(88, 17, 'Samsung Galaxy Watch Active 2', 0, 'samsung-galaxy-watch-active-2', 'Samsung', 'Sleek Fashion Smartwatch', 'The Samsung Galaxy Watch Active 2 is a sleek fashion smartwatch that offers a perfect blend of style and functionality. With its slim design, vibrant display, and comprehensive health tracking features, it s a versatile accessory for any fashion-conscious individual.', 249, NULL, 30, 0, 'published', '2023-11-16 23:02:46', 'Fashion Smartwatches, Samsung Galaxy Watch Active 2', 'The Samsung Galaxy Watch Active 2 is a sleek fashion smartwatch that offers a perfect blend of style and functionality. With its slim design, vibrant display, and comprehensive health tracking features, it s a versatile accessory for any fashion-conscious individual.', '2023-11-16 16:02:46', '2023-11-16 16:02:46'),
(89, 17, 'Fossil Gen 5', 6, 'fossil-gen-5', 'Fossil', 'Premium Fashion Smartwatch', '<p>The Fossil Gen 5 is a premium fashion smartwatch that combines classic design with modern technology. With its stainless steel case, customizable dials, and advanced features like heart rate monitoring and GPS, it s a stylish and functional accessory for the fashion-forward individual.</p>', 299, 289, 20, 0, 'published', '16/11/2023', 'Fashion Smartwatches, Fossil Gen 5', 'The Fossil Gen 5 is a premium fashion smartwatch that combines classic design with modern technology. With its stainless steel case, customizable dials, and advanced features like heart rate monitoring and GPS, it s a stylish and functional accessory for the fashion-forward individual.', '2023-11-16 16:02:46', '2023-11-16 09:42:29'),
(90, 17, 'Michael Kors Access Bradshaw 2', 0, 'michael-kors-access-bradshaw-2', 'Michael Kors', 'Luxury Fashion Smartwatch', 'The Michael Kors Access Bradshaw 2 is a luxury fashion smartwatch that exudes sophistication and style. With its stainless steel construction, elegant design, and a wide range of customizable features, it s the perfect accessory to elevate your fashion game.', 399, NULL, 40, 0, 'published', '2023-11-16 23:02:46', 'Fashion Smartwatches, Michael Kors Access Bradshaw 2', 'The Michael Kors Access Bradshaw 2 is a luxury fashion smartwatch that exudes sophistication and style. With its stainless steel construction, elegant design, and a wide range of customizable features, it s the perfect accessory to elevate your fashion game.', '2023-11-16 16:02:46', '2023-11-16 16:02:46'),
(92, 18, 'TAG Heuer Connected', 0, 'tag-heuer-connected', 'TAG Heuer', 'Elegant Luxury Smartwatch', 'The TAG Heuer Connected is an elegant luxury smartwatch that seamlessly combines traditional Swiss watchmaking with advanced technology. With its premium materials, customizable dials, and a wide range of smart features, it a statement piece for the discerning individual.', 1999, NULL, 50, 1, 'published', '2023-11-16 23:05:35', 'Luxury Smartwatches, TAG Heuer Connected', 'The TAG Heuer Connected is an elegant luxury smartwatch that seamlessly combines traditional Swiss watchmaking with advanced technology. With its premium materials, customizable dials, and a wide range of smart features, its a statement piece for the discerning individual.', '2023-11-16 16:05:35', '2023-11-16 16:05:35'),
(93, 18, 'Omega Seamaster Aqua Terra', 0, 'omega-seamaster-aqua-terra', 'Omega', 'Sophisticated Luxury Smartwatch', 'The Omega Seamaster Aqua Terra is a sophisticated luxury smartwatch that embodies the spirit of the iconic Seamaster collection. With its refined design, precision movement, and smart features, its a timepiece that combines elegance and innovation.', 3999, NULL, 30, 0, 'published', '2023-11-16 23:05:35', 'Luxury Smartwatches, Omega Seamaster Aqua Terra', 'The Omega Seamaster Aqua Terra is a sophisticated luxury smartwatch that embodies the spirit of the iconic Seamaster collection. With its refined design, precision movement, and smart features, its a timepiece that combines elegance and innovation.', '2023-11-16 16:05:35', '2023-11-16 16:05:35'),
(94, 18, 'Breitling Exospace B55', 6, 'breitling-exospace-b55', 'Breitling', 'Aviation-inspired Luxury Smartwatch', '<p>The Breitling Exospace B55 is an aviation-inspired luxury smartwatch that offers a perfect blend of style and functionality. With its robust construction, COSC-certified movement, and advanced connectivity features, its a timepiece for the modern aviator.</p>', 4999, 4889, 20, 0, 'published', '16/11/2023', 'Luxury Smartwatches, Breitling Exospace B55', 'The Breitling Exospace B55 is an aviation-inspired luxury smartwatch that offers a perfect blend of style and functionality. With its robust construction, COSC-certified movement, and advanced connectivity features, its a timepiece for the modern aviator.', '2023-11-16 16:05:35', '2023-11-16 09:33:11'),
(95, 18, 'Rolex Oyster Perpetual', 0, 'rolex-oyster-perpetual', 'Rolex', 'Iconic Luxury Smartwatch', 'The Rolex Oyster Perpetual is an iconic luxury smartwatch that represents the epitome of timeless elegance. With its legendary design, precise movement, and exceptional craftsmanship, its a symbol of status and sophistication.', 7999, NULL, 40, 0, 'published', '2023-11-16 23:05:35', 'Luxury Smartwatches, Rolex Oyster Perpetual', 'The Rolex Oyster Perpetual is an iconic luxury smartwatch that represents the epitome of timeless elegance. With its legendary design, precise movement, and exceptional craftsmanship, its a symbol of status and sophistication.', '2023-11-16 16:05:35', '2023-11-16 16:05:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `quantity`, `color_id`, `created_at`, `updated_at`) VALUES
(3, 1, 2329, 2, '2023-09-28 15:21:44', '2023-11-17 11:00:31'),
(4, 1, 442, 4, '2023-09-28 15:21:44', '2023-09-28 15:21:44'),
(7, 5, 5, 1, '2023-10-01 14:24:40', '2023-11-17 10:27:46'),
(8, 5, 21, 2, '2023-10-01 14:24:40', '2023-10-01 14:24:40'),
(9, 6, 9, 1, '2023-10-01 14:26:44', '2023-11-17 10:27:46'),
(10, 6, 100, 4, '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(11, 7, 12, 1, '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(12, 7, 100, 4, '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(13, 8, 12, 1, '2023-10-01 14:32:57', '2023-10-01 14:32:57'),
(14, 8, 0, 4, '2023-10-01 14:32:57', '2023-10-01 18:41:34'),
(15, 9, 12, 1, '2023-10-01 14:41:01', '2023-10-01 14:41:01'),
(16, 9, 98, 4, '2023-10-01 14:41:01', '2023-10-01 15:43:06'),
(17, 10, 11, 1, '2023-10-01 14:59:16', '2023-11-03 01:04:26'),
(18, 10, 98, 4, '2023-10-01 14:59:16', '2023-10-01 18:35:38'),
(19, 11, 12, 1, '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(20, 11, 100, 4, '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(22, 12, 100, 1, '2023-11-16 08:21:55', '2023-11-16 08:21:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `rating`, `content`, `created_at`, `updated_at`) VALUES
(1, 10, 26, 4, 'Good product!', '2023-11-16 06:01:24', '2023-11-16 06:01:24'),
(2, 10, 26, 4, 'Good product!', '2023-11-16 06:04:47', '2023-11-16 06:04:47'),
(3, 10, 26, 3, 'aa', '2023-11-16 06:20:58', '2023-11-16 06:20:58'),
(4, 11, 26, 2, 'faewf', '2023-11-16 06:28:55', '2023-11-16 06:28:55'),
(5, 10, 26, 5, 'ffeaf', '2023-11-16 06:32:10', '2023-11-16 06:32:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(8, 5, 'images/PONNN6GA7sykRq3dhZC8U1JEbPR5H0a1nL3PHHlo.png', '2023-10-01 14:24:40', '2023-10-01 14:24:40'),
(9, 6, 'images/8FsDXAildhz1K6ngdTvUsrWDstqBVvSMPqOJDjWJ.png', '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(10, 7, 'images/6qgkeqgJ829QP4RJPUIEFAHf460BONNkKtIGt5R5.png', '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(11, 8, 'images/DnnlNAQ04Tl8cd6zPLAlOc4KwY6xUMINRaU3Jitm.png', '2023-10-01 14:32:57', '2023-10-01 14:32:57'),
(12, 9, 'images/ZO2qqcyltklt2I2WO5NqQkAUvOgZ3HuX72PFZovf.png', '2023-10-01 14:41:01', '2023-10-01 14:41:01'),
(13, 10, 'images/Y41WvOnMK4MO98daphb0PiPEhcOa7B7eMV0MG5dK.png', '2023-10-01 14:59:16', '2023-10-01 14:59:16'),
(14, 11, 'images/pler2PtjxM3xm1vJokEOEyxAFPtYHl7Fl6BPYQuh.png', '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(15, 1, 'images/1ovpwpx4Q3tJC2tpIq2ZMUTAlaTJAfwjILZqY3z8.png', '2023-10-01 15:07:26', '2023-10-01 15:07:26'),
(19, 10, 'images/QGLLZEiRSGfUG92thuh9KrfjU719Zq5gxoSo4Mls.png', '2023-10-01 15:50:28', '2023-10-01 15:50:28'),
(20, 10, 'images/muKeNn3vpfBRE96R5kd022m9FusDqL7PiZ57uud9.png', '2023-10-01 15:50:28', '2023-10-01 15:50:28'),
(22, 10, 'images/7vvaYZPZYdU0teon6VoVzlfbnFm4ZDdTespEdK3Z.png', '2023-10-01 15:51:49', '2023-10-01 15:51:49'),
(23, 10, 'images/tjUxuv91FoWc2k287ODFYDuLlMbwmsl52GPjK8Px.png', '2023-10-01 15:53:57', '2023-10-01 15:53:57'),
(24, 1, 'images/ieQB1tmvaEvrYwee2hteBnzPqWwFP8sLVpzMPiQw.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(25, 1, 'images/pI5GYD1COW03GCfl0pZuTrtn5Zy141mxPRxPMm3Z.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(26, 1, 'images/JahAQaVjUIbyIAO8sz7NBRGbuxdQ1MdGOpd5hLGC.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(27, 1, 'images/dR6CP9DhpzWQMvyjzGIrzEzElnoqDlNLJksSrGas.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(28, 1, 'images/oZQzQq7OoaavwPV37c97949319Gu1Rk8U4HKcgeK.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(34, 48, 'images/AMI4nwZ8rzrRVHVLD3THTwninU87uH97qMFEzoky.png', '2023-11-16 09:26:21', '2023-11-16 09:26:21'),
(35, 87, 'images/QAyvo5GuYh03KJKqoNM6qS3LKHu46mHVHI9mRd5V.png', '2023-11-16 09:28:30', '2023-11-16 09:28:30'),
(36, 83, 'images/O4xihhmmyLQypEycIfRED3JCT2XXeHZF11vMfFKk.png', '2023-11-16 09:29:09', '2023-11-16 09:29:09'),
(37, 54, 'images/Hd3u1qUo77yCwZ5Sy3iGH6t89RpweLJscad4uDsT.png', '2023-11-16 09:29:52', '2023-11-16 09:29:52'),
(38, 47, 'images/pHdmFS70eeSOADVI8Lo980bc1aCFgdnJC1OaDk4Y.png', '2023-11-16 09:30:29', '2023-11-16 09:30:29'),
(39, 75, 'images/weraXWny2fR65dBJ1j2LeLHSqjOabRKlGHwZhV09.png', '2023-11-16 09:31:17', '2023-11-16 09:31:17'),
(40, 80, 'images/hrJ67Tw4RFKcaWwhkRDB9sKXTSImYta9whvRMw7q.jpg', '2023-11-16 09:32:10', '2023-11-16 09:32:10'),
(41, 94, 'images/rZGgyESbCu3dSr7Zzy5y46aHNtn4uQrEMju2ORQA.jpg', '2023-11-16 09:33:11', '2023-11-16 09:33:11'),
(42, 55, 'images/M2vXhKxQAgR73ZJytmPCQqdqmx5SLj3MJkXPVs9u.png', '2023-11-16 09:34:20', '2023-11-16 09:34:20'),
(43, 46, 'images/TsOkQqirDbunxep1VtL5FLpWgY7XNQAlVZE6ZqNV.png', '2023-11-16 09:35:03', '2023-11-16 09:35:03'),
(44, 45, 'images/qgjI8Hg3OV0Wh9yliSuBFY11y1FwBlLZkfjWLVgD.png', '2023-11-16 09:35:38', '2023-11-16 09:35:38'),
(45, 43, 'images/WRXJbd81iIifrNqw2CddU1a33sjAtsbhVrGROW6e.png', '2023-11-16 09:36:26', '2023-11-16 09:36:26'),
(46, 44, 'images/NdHihMmn0FXK4M9VHwwkFOLvNfNfpEvbFMB20UXX.png', '2023-11-16 09:37:06', '2023-11-16 09:37:06'),
(47, 51, 'images/zom6aXOXGACUt6AN0fF8USg4QHcbvpw6yxMR76DV.png', '2023-11-16 09:37:54', '2023-11-16 09:37:54'),
(48, 21, 'images/6blRGKlcAvzh3XHdMlZWyFlkdmrQt9QPche37Kc1.png', '2023-11-16 09:38:37', '2023-11-16 09:38:37'),
(49, 60, 'images/wg6sWHCTq6lPA2vQVqDHU9k1iCLymHA0RaDg6lSD.png', '2023-11-16 09:39:41', '2023-11-16 09:39:41'),
(50, 78, 'images/BBhzC7fkW028RsqU7HMoftqwv9Rk2FHCZQ0d3wX1.png', '2023-11-16 09:40:14', '2023-11-16 09:40:14'),
(51, 82, 'images/3lyfC5KQfcyYTH6trviMvdK56q0Hs3kuOVdAqRTy.png', '2023-11-16 09:41:12', '2023-11-16 09:41:12'),
(52, 89, 'images/cn7VuKqO0BSI1QHeDPvX7KlzHeFbiM0mks5wnevb.png', '2023-11-16 09:42:29', '2023-11-16 09:42:29'),
(53, 67, 'images/cXqz0rYciFPtKxZw8XcVjqJbKkt424TXs2GivYF2.png', '2023-11-16 09:42:58', '2023-11-16 09:42:58'),
(54, 58, 'images/hXKmAZmZumz5yRQvgtjFXWlmwjLQ5VPhDSBJy5iT.png', '2023-11-16 09:43:35', '2023-11-16 09:43:35'),
(55, 85, 'images/CVyqWvk1D5tKBaDwv6EAHRITKolYJtevweuWAwZS.png', '2023-11-16 09:44:49', '2023-11-16 09:44:49'),
(56, 36, 'images/lyXoxXBmJs4Jk62V4vWPhIL7PqaMti9qOZ11W5yF.png', '2023-11-16 09:45:35', '2023-11-16 09:45:35'),
(57, 30, 'images/TXAltGToCmJHGKffloraPccVd6CBAYVhM0KpStCX.png', '2023-11-16 09:49:58', '2023-11-16 09:49:58'),
(58, 52, 'images/ajWeX9Et7nc2O4eMCoWqAzAL7zmoRLqjbvexEV5E.png', '2023-11-16 09:50:43', '2023-11-16 09:50:43'),
(59, 53, 'images/6jOTUbDsDxZ2mAhyW0GPa1CPc28cldDH2F6n1m9H.png', '2023-11-16 09:53:04', '2023-11-16 09:53:04'),
(60, 49, 'images/FC2gb3txMz3UmMyGZ055v595SMVLRQKvCcU5AapQ.png', '2023-11-16 09:55:27', '2023-11-16 09:55:27'),
(61, 50, 'images/SpT91xBWbovk4JRNBG87WHqUGosYK9ehIq0UmeZL.png', '2023-11-16 09:56:18', '2023-11-16 09:56:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gaming Monitors 65', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/FDtRtsSoY8j2bWAx5jx2zLPrpc36hKmDaTKmolJi.png', 1, '2023-09-24 21:18:08', '2023-10-01 15:58:12'),
(2, 'Smartphones Sale', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/NfGlYbs8rOk7TECxTPeCTwH7tDWgQWIxQAXsUvZP.png', 1, '2023-09-30 00:27:48', '2023-10-01 15:59:07'),
(3, 'End Season Sale', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', NULL, 1, '2023-09-30 00:40:33', '2023-09-30 00:40:33'),
(4, 'Laptops Arrivals', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/gg6DgBvUp9Jy0UZze1hBi2eJWsXfgkg5L8Zj1BZa.png', 1, '2023-09-30 00:41:40', '2023-09-30 00:41:40'),
(5, 'Earphones - 25%', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/NrR3RjRW4S9EzA65qLa6l9z9y2S97NlKmiyLEYDp.png', 1, '2023-09-30 00:47:24', '2023-10-01 16:04:08'),
(6, 'Tablets 10 inch Sale', '<h1><strong>END SEASONS</strong><br />\r\nMARTPHONES</h1>\r\n\r\n<p>LAST CALL FOR UP TO $250OFF!</p>', 'images/H0OPNNofiLfO6aLgvxIjl8ZTw0wjpJ39Szz2ZK2v.png', 1, '2023-09-30 00:49:22', '2023-09-30 00:49:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `status`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Ultrabooks', 'accessories', 1, 1, '2023-09-22 05:31:16', '2023-10-01 13:50:04', 'images/XNf0rI3D7MJT8O6Bo6Xo1oi6hVrtmCKxllL0bcLt.png'),
(3, 'Laptop Accessories', 'laptop-accessories', 1, 1, '2023-09-24 13:10:45', '2023-10-01 13:53:54', 'images/ryVSykpsD8wc0hjgEOS9MjcWYK3l0d2SeK9X3Sxs.png'),
(4, 'Gaming Laptops', 'gaming-laptop', 1, 1, '2023-10-01 13:36:05', '2023-10-01 13:43:15', 'images/uIbM7Rzj0g1DHbEa5Kzl0hCSxsbIu9Ijn41Ec5jl.png'),
(5, 'Laptop Mice', 'laptop-mice', 1, 1, '2023-10-01 13:56:53', '2023-10-01 13:56:53', 'images/sfE5FMXAtePkxW4kDgw5GX77bQ1HlKffZJtgwGSR.png'),
(6, 'Stands and Docking Stations', 'stands-and-docking-stations', 1, 1, '2023-10-01 13:57:54', '2023-10-01 13:58:19', 'images/jkAxQPMYQ3iAkdXtvozuJUqTEvnTo9L2sy1YHfHJ.png'),
(7, 'Digital Cameras', 'digital-camera', 4, 1, '2023-10-01 14:00:30', '2023-10-01 14:00:30', 'images/5jqlPZOw12JlhyHfzMjtzJxsMQxnRAhPPCzpj38o.png'),
(8, 'Action Cameras', 'action-cameras', 4, 1, '2023-10-01 14:01:19', '2023-10-01 14:01:19', 'images/BgmZhMOPILEbuhldFPZ7bUewFgqPHOMDJvaDywB9.png'),
(9, 'Instant Cameras', 'instant-cameras', 4, 1, '2023-10-01 14:02:07', '2023-10-01 14:02:07', 'images/6oonNDRSRvpqJ9c7FG0MR7wB2wXmODaYYrSq7H2e.png'),
(10, 'Camera Accessories', 'camera-accessories', 4, 1, '2023-10-01 14:03:11', '2023-10-01 14:03:11', 'images/7v1w6WXSJgFDzfGeOUH9VCHYEtXMQfndCqBW2D0p.png'),
(11, 'Bluetooth Speakers', 'bluetooth-speakers', 10, 1, '2023-10-01 14:05:10', '2023-10-01 14:05:10', 'images/azNnOGdQwWeqcJZZuszXSlUNFKwPFGZ9WIRxH4hx.png'),
(12, 'Desktop Speakers', 'desktop-speakers', 10, 1, '2023-10-01 14:06:02', '2023-10-01 14:06:02', 'images/MdQa0IhTcGUoXwVOusWpdiB37gpOGAEJHuXA6AZq.png'),
(13, 'Android Phones', 'android-phones', 6, 1, '2023-10-01 14:09:09', '2023-10-01 14:09:09', 'images/NITxf1qCCM2KvyRfprTQdNBvjGqSkIDWvgHV1uB1.png'),
(14, 'iPhone', 'iphone', 6, 1, '2023-10-01 14:09:37', '2023-10-01 14:09:37', 'images/A1uNb0oSPjzIsP0h1ZRPyK0IO9uv9TzpYnN1jmKA.png'),
(15, 'Budget Phones', 'budget-phone', 6, 1, '2023-10-01 14:10:44', '2023-10-01 14:12:45', 'images/xRkfHjjF88HEn1cs6BI3cms5B1uXQkhT14EWvl1T.png'),
(16, 'Fitness Smartwatches', 'fitness-smartwatches', 12, 1, '2023-10-01 14:14:26', '2023-10-01 14:14:26', 'images/8AapsvOoFc1OM79MmXvA4BB8yju4dP7v5IUlmHuc.png'),
(17, 'Fashion Smartwatches', 'fashion-smartwatches', 12, 1, '2023-10-01 14:15:04', '2023-10-01 14:15:04', 'images/sU0FfJ4yNxZ5GiWLen92Bpnnk0uwzenEQoroMKQa.png'),
(18, 'Luxury Smartwatches', 'luxury-smartwatches', 12, 1, '2023-10-01 14:16:03', '2023-10-01 14:16:03', 'images/WcOAhMCwcc0lWU6d1rvsI7aXLbat2A59RJdV9hkZ.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'cancle',
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `wallet_id`, `amount`, `type`, `created_at`, `updated_at`, `status`, `method`) VALUES
(1, 5, 1000.00, 'deposit', '2023-11-15 09:44:00', '2023-11-15 09:44:00', 'cancle', 'vn_pay'),
(2, 20, -10597.93, 'withdraw', '2023-11-17 10:27:46', '2023-11-17 10:27:46', 'complete', 'shopping'),
(3, 21, -118.17, 'withdraw', '2023-11-17 11:00:31', '2023-11-17 11:00:31', 'complete', 'shopping');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 as user, 1 as admin',
  `otp` int(11) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`, `otp`, `lastname`, `firstname`, `companyname`, `country`, `address`, `zipcode`, `phone`) VALUES
(1, 'giang 123', 'trangiangzxc@gmail.com', '2023-11-13 10:03:47', '$2y$10$cTNRwOh0VEMdB7eDJ5UJjOKKvDWRIEgPRC3UiAI8RwoZwc8h71o8u', NULL, '2023-09-21 23:40:03', '2023-11-17 01:20:43', 1, 439771, 'dfhdg', 'ghjmghf', 'dsjkfhvb', 'china', 'jmdbflaikeed', '3456', 45373547),
(10, 'Violon', 'fawefa@gaegwg', NULL, '$2y$10$u2Znp2zZv158IA6KkqPAeOlArCX3w5iMf3DHEVyhodU9ptsmmApzS', NULL, '2023-11-02 03:53:34', '2023-11-02 03:53:34', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Violon', '1@1', '2023-11-16 11:02:26', '$2y$10$QNG.ESAu5apfxVnH.bs3EeZC49SBIEWDGeVJPJfnp8y/HxCdoZo6q', NULL, '2023-11-02 07:05:47', '2023-11-13 00:14:04', 1, 738193, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Violon', 'trangiangzxcz@gmail.com', '2023-11-13 10:03:21', '$2y$10$71rmRnxc/ysIWVcmD5Fl.u6vlw8fFduDnOqKRX3ClDcUDVmH.EtQq', NULL, '2023-11-12 19:19:02', '2023-11-12 19:19:02', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'awegaw', '2508roaablox@gmail.com', NULL, '$2y$10$8aBwfNZE1eCkJdR2ywma4OyEnlh.3NGfrdzL1GvpXuARKY6zRvbT6', NULL, '2023-11-12 19:39:25', '2023-11-12 19:39:25', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'awegaw', '250aaa8roaablox@gmail.com', NULL, '$2y$10$83erwsYnjzfUR9D4KIb4nOV5dI2uccUACbJJb.JHbM7dE1UnZEeuK', NULL, '2023-11-12 19:41:20', '2023-11-12 19:41:20', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'rweawg', 'admaerain1@gaegwg', NULL, '$2y$10$vkzzqEFMgtXHOir2dbLu9.HDVOdW309c2sKATrVqoNintUHPW1RBK', NULL, '2023-11-12 19:42:52', '2023-11-12 19:42:52', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'gaewg', 'tranaagangzxc@gmail.com', NULL, '$2y$10$tvm/qMK6PlTUcPBB2BGXEul6ruCSlvbk3WDZf65T6G.qzTgohmHHq', NULL, '2023-11-12 19:44:29', '2023-11-12 19:44:29', 0, 731217, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Violon', 'giangtlhps26818@fpt.edu.vn', '2023-11-09 08:26:09', '$2y$10$e7gNOWviCwsTYJRAKtd4i.UrA41SGrb5Uw6QsdEH1rSq/qP8L0s7u', NULL, '2023-11-13 00:29:53', '2023-11-16 05:11:54', 0, 717375, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'fafwe', 'ruw20367@zbock.com', NULL, '$2y$10$Rv64nQOrDAAaLF3KDz7FkONeWkffKUSNjKJrCM7un3sudR.D71ua6', NULL, '2023-11-13 01:04:45', '2023-11-13 01:04:45', 0, 628142, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'fafwe', 'aqo91086@omeie.com', '2023-11-13 01:07:49', '$2y$10$z6G/a2nz6Ld3VHjv0bd.peJa17lNwUH1VUtHNw1La2e8fkkficNyS', NULL, '2023-11-13 01:05:40', '2023-11-13 01:07:49', 0, 459861, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Giang Trần', 'sks40695@omeie.com', '2023-11-13 01:11:39', '$2y$10$gGX4eqtsdpah/vRQH1WVEebLyi59LibJ6nbjpp606D6wYA1NBOkja', NULL, '2023-11-13 01:08:19', '2023-11-13 01:11:39', 0, 958119, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'kfg00672', 'kfg00672@omeie.com', '2023-11-13 01:42:24', '$2y$10$WHPJsH2L0fIKuCqTNiF0CuKSGFZHtzjiv0Phj5YIFPhbJyrFZR3/6', NULL, '2023-11-13 01:40:25', '2023-11-13 01:42:24', 0, 594667, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'fawef', 'adminaa1@gaegwg', NULL, '$2y$10$O7H/gaWkqeD9XoQ8S7GU4.BdaEgIuFMMEX5fyn38bOq1sRBScsvo2', NULL, '2023-11-14 04:25:27', '2023-11-14 04:25:27', 0, 288550, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'giang', 'wqg21278@nezid.com', NULL, '$2y$10$ybplFtfIDEcBX3Y5Yep4guOa4.TIRcfBVsfYqs0kkHP3qw0hUclSy', NULL, '2023-11-15 00:32:53', '2023-11-15 00:32:53', 0, 585090, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'giang', 'fojovav244@jucatyo.com', NULL, '$2y$10$kYgYgCbezxUUbHKhR2bKPeU3vnwyjBpkSiCFubL6Pt3Fi.z76uDX2', NULL, '2023-11-15 00:34:13', '2023-11-15 00:35:37', 0, 524118, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'giang', 'epf00196@omeie.com', NULL, '$2y$10$wm3Z0DKp1ebQyVBVVD6.j.ijfG2EMAR8y0WAghZv.LAdkKR3Vu2da', NULL, '2023-11-15 00:56:42', '2023-11-15 00:56:42', 0, 140192, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'giang', 'bwa91296@nezid.com', NULL, '$2y$10$AaMppZ3PSv8LN9eh0.hd3uwQTZgbYOPqGy9xh1XiOtika7SYIAtsm', NULL, '2023-11-15 01:00:28', '2023-11-15 01:00:28', 0, 434190, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Giang Tran', 'jnw61761@nezid.com', NULL, '$2y$10$bUi57Cm7gqMBFEEOyz0etu/qgsaGTF/Y4gW5DVSv05Fzybk5ak5WW', NULL, '2023-11-15 01:56:37', '2023-11-15 01:56:37', 0, 646743, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Violon', 'trangiangzx111c@gmail.com', NULL, '$2y$10$7D44LR3UFh9uj4ahzXp42uV7uYU2NSjas4iHbTQLXRi4lnF2sLuaa', NULL, '2023-11-15 06:07:44', '2023-11-15 06:07:44', 0, 627760, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Violon', '2509roblox@gmail.com', NULL, '$2y$10$FfA3eB13CLKl1WW6Hvx0POWYzt9r6jFGaOOHPIgJEhtTYLsRaNU0q', NULL, '2023-11-16 05:10:27', '2023-11-16 05:10:42', 0, 153603, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Tester', 'tester@gmail.com', '2023-11-17 10:47:15', '$2y$10$c1jRxIxFEKFHswBuzSlQueYaRO8N/UpZ7zi1aOBsxf8CLK/3Nr7.C', NULL, '2023-11-17 02:41:02', '2023-11-17 10:47:15', 0, NULL, 'Test2', 'Test1', 'Electro', 'china', 'Jend', '70000', 93512425),
(42, 'Tai Nguyen', 'nht4646@gmail.com', '2023-11-17 10:58:27', '$2y$10$HyVVGi3I1QDv0u62x05LBe7H05tRVTmT3Wna9hYReQ9Ac2OQADxXC', NULL, '2023-11-17 10:57:40', '2023-11-17 10:58:27', 1, NULL, 'Nguyễn', 'Tài', 'nht', 'vietnam', '34634rgrdsgs', '675567', 545235634);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 4, 143.22, '2023-11-01 23:38:52', '2023-11-02 01:39:23'),
(2, 10, 0.00, '2023-11-02 03:53:34', '2023-11-02 03:53:51'),
(3, 11, 111.00, '2023-11-02 07:05:47', '2023-11-12 05:43:55'),
(4, 12, 0.00, '2023-11-12 19:19:02', '2023-11-12 19:19:02'),
(5, 26, 0.00, '2023-11-13 00:30:07', '2023-11-16 08:09:59'),
(6, 27, 0.00, '2023-11-13 01:05:01', '2023-11-13 01:05:01'),
(7, 28, 0.00, '2023-11-13 01:06:40', '2023-11-13 01:06:40'),
(8, 29, 0.00, '2023-11-13 01:08:22', '2023-11-13 01:13:14'),
(9, 30, 0.00, '2023-11-13 01:40:44', '2023-11-13 01:43:00'),
(10, 31, 0.00, '2023-11-14 04:25:33', '2023-11-14 04:25:33'),
(11, 32, 0.00, '2023-11-15 00:33:13', '2023-11-15 00:33:13'),
(12, 33, 0.00, '2023-11-15 00:34:23', '2023-11-15 00:34:23'),
(13, 34, 0.00, '2023-11-15 00:48:52', '2023-11-15 00:48:52'),
(14, 35, 0.00, '2023-11-15 00:56:45', '2023-11-15 00:56:45'),
(15, 36, 0.00, '2023-11-15 01:00:33', '2023-11-15 01:00:33'),
(16, 37, 0.00, '2023-11-15 01:01:13', '2023-11-15 01:01:13'),
(17, 38, 0.00, '2023-11-15 01:56:43', '2023-11-15 01:56:43'),
(18, 39, 0.00, '2023-11-15 06:07:49', '2023-11-15 06:07:49'),
(19, 40, 0.00, '2023-11-16 05:10:31', '2023-11-16 05:10:31'),
(20, 41, 12000.00, '2023-11-17 02:42:01', '2023-11-17 10:47:15'),
(21, 42, -118.17, '2023-11-17 10:58:27', '2023-11-17 11:00:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 51, 41, '2023-11-17 02:46:45', '2023-11-17 02:46:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_color_id_foreign` (`product_color_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `detail_blogs`
--
ALTER TABLE `detail_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_histories_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD KEY `product_comments_product_id_foreign` (`product_id`),
  ADD KEY `product_comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `detail_blogs`
--
ALTER TABLE `detail_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `login_histories`
--
ALTER TABLE `login_histories`
  ADD CONSTRAINT `login_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
