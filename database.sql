-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2023 lúc 05:20 PM
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
(1, 'gewaegwa', 'wegaaewg', 1, '2023-09-24 12:52:35', '2023-09-24 12:52:35'),
(2, '123', '123', 1, '2023-09-24 13:12:44', '2023-09-24 13:12:44'),
(4, 'skjdlvbjsd', 'skjdlvbjsd', 1, '2023-11-12 01:24:33', '2023-11-12 01:24:33');

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
(37, 1, 10, 17, 8, '2023-10-29 18:46:45', '2023-10-29 18:46:48');

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
(14, '2023_09_25_023013_add_to_products_table', 1),
(15, '2023_09_26_024747_create_wishlists_table', 1),
(16, '2023_09_29_041357_create_carts_update_table', 1),
(17, '2023_09_29_081327_create_orders_table', 1),
(18, '2023_09_29_081335_create_order_items_table', 1),
(19, '2023_09_29_082737_add_to_order_table', 1),
(20, '2023_09_29_115137_add_id_to_orders_table', 1),
(21, '2023_10_01_054859_add_to_orders_table', 1),
(22, '2023_10_02_032715_add_to_sub_categories_table', 1),
(23, '2023_11_02_062149_create_wallets_table', 1),
(24, '2023_11_02_062731_create_transaction_table', 1),
(25, '2023_11_02_072524_add_to_transaction_table', 1),
(26, '2023_11_02_073631_add_method_to_transaction_table', 1),
(27, '2023_11_02_123246_create_blogs_table', 1),
(28, '2023_11_02_130743_create_coupons_table', 1),
(29, '2023_11_02_144609_create_detail_blogs_table', 1),
(30, '2023_11_03_013952_add_to_blogs_table', 1),
(31, '2023_11_12_125046_create_contacts_table', 1),
(32, '2023_11_13_023505_add_otp_to_users_table', 1);

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
(32, 'faweg', 'ăegaw', 'AT', 'HCM', 'gaearg', '54336', 'gaweg', 'trangiangzxc@gmail.com', '0589317493', 'confirm', 'cash', '2023-10-01 18:41:34', '2023-10-01 18:42:24', 1249.00, 1, 126149.00);

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
(1, 1, 2, 6, 9, 1499, '2023-09-28 19:30:29', '2023-09-28 19:30:29'),
(2, 1, 1, 3, 3, 523, '2023-09-28 19:30:29', '2023-09-28 19:30:29'),
(5, 3, 2, 6, 5, 1499, '2023-09-29 17:02:20', '2023-09-29 17:02:20'),
(6, 5, 2, 6, 9, 1499, '2023-09-29 17:04:20', '2023-09-29 17:04:20'),
(7, 6, 2, 6, 5, 1499, '2023-09-30 15:53:31', '2023-09-30 15:53:31'),
(8, 10, 2, 6, 5, 1499, '2023-09-30 15:57:16', '2023-09-30 15:57:16'),
(9, 11, 2, 6, 5, 1499, '2023-09-30 15:59:19', '2023-09-30 15:59:19'),
(10, 12, 2, 6, 5, 1499, '2023-09-30 15:59:44', '2023-09-30 15:59:44'),
(11, 13, 2, 6, 5, 1499, '2023-09-30 16:00:09', '2023-09-30 16:00:09'),
(12, 14, 2, 6, 1, 1499, '2023-09-30 16:01:02', '2023-09-30 16:01:02'),
(13, 15, 2, 6, 1, 1499, '2023-09-30 16:03:31', '2023-09-30 16:03:31'),
(14, 16, 2, 6, 2, 1499, '2023-09-30 16:13:36', '2023-09-30 16:13:36'),
(15, 17, 2, 6, 1, 1499, '2023-09-30 16:15:36', '2023-09-30 16:15:36'),
(16, 18, 1, 4, 4, 523, '2023-09-30 16:19:56', '2023-09-30 16:19:56'),
(17, 19, 2, 6, 5, 1499, '2023-09-30 16:40:55', '2023-09-30 16:40:55'),
(18, 20, 2, 6, 5, 1499, '2023-09-30 16:41:25', '2023-09-30 16:41:25'),
(19, 21, 2, 6, 6, 1499, '2023-09-30 16:47:30', '2023-09-30 16:47:30'),
(20, 22, 2, 6, 134, 1499, '2023-09-30 16:57:05', '2023-09-30 16:57:05'),
(21, 25, 2, 6, 21213, 1499, '2023-09-30 16:58:58', '2023-09-30 16:58:58'),
(22, 26, 2, 6, 2, 1499, '2023-09-30 17:01:21', '2023-09-30 17:01:21'),
(23, 27, 2, 6, 2, 1499, '2023-09-30 17:03:25', '2023-09-30 17:03:25'),
(24, 28, 2, 6, 3, 1499, '2023-09-30 17:21:56', '2023-09-30 17:21:56'),
(25, 29, 9, 16, 2, 599, '2023-10-01 15:43:06', '2023-10-01 15:43:06'),
(26, 30, 10, 18, 2, 599, '2023-10-01 18:35:38', '2023-10-01 18:35:38'),
(27, 31, 5, 7, 3, 1499, '2023-10-01 18:36:42', '2023-10-01 18:36:42'),
(28, 32, 8, 14, 100, 1249, '2023-10-01 18:41:34', '2023-10-01 18:41:34');

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
(1, 4, 'Anker 7-in-1 USB C Hub Adapter', 1, 'anker-7-in-1-usb-c-hub-adapter', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 59, 39, 0, 0, 'published', '02/10/2023', 'gaew', 'waeg', '2023-09-24 13:05:57', '2023-10-01 18:39:50'),
(2, 5, 'Logitech MX Anywhere 3 Wireless Mouse', 1, 'logitech-mx-anywhere-3-wireless-mouse', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 100, 99, 0, 0, 'published', '02/10/2023', 'aweg', 'wgae', '2023-09-24 13:06:53', '2023-10-01 15:09:44'),
(3, 6, 'Twelve South BookArc Vertical Laptop Stand', 2, 'twelve-south-bookarc-vertical-laptop-stand', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 523, 1499, 0, 0, 'published', '02/10/2023', 'agew', 'gewa', '2023-09-24 13:13:01', '2023-10-01 15:13:51'),
(4, 3, 'Ultra Wireless S50 Headphones S50 with Bluetooth', 1, 'awge-screwdriver-screw150', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing.', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 3524, 1499, 0, 0, 'published', '09/10/2023', 'gaew', 'aweg', '2023-09-24 13:35:18', '2023-09-24 22:46:24'),
(5, 4, 'MSI GE66 Raider', 2, 'msi-ge66-raider', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1599, 1499, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:24:40', '2023-10-01 14:25:11'),
(6, 4, 'Razer Blade 15', 2, 'razer-blade-15', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1799, 1499, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(7, 4, 'ASUS ROG Zephyrus G14', 2, 'asus-rog-zephyrus-g14', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1299, 1149, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(8, 4, 'HP Omen 15', 2, 'hp-omen-15', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1399, 1249, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:32:57', '2023-10-01 14:32:57'),
(9, 16, 'Forerunner 945 Advanced GPS Running Smartwatch', 2, 'garmin-forerunner-945-advanced-gps-running-smartwatch', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera<br />\r\n	&nbsp;</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:41:01', '2023-10-01 14:41:01'),
(10, 18, 'Fitbit Versa 3 Health & Fitness Smartwatch with GPS', 2, 'fitbit-versa-3-health-fitness-smartwatch-with-gps', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 14:59:16', '2023-10-01 14:59:16'),
(11, 17, 'Samsung Galaxy Watch4 Classic LTE', 2, 'samsung-galaxy-watch4-classic-lte', NULL, 'Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination. Please check compatibility before purchasing..', '<ul>\r\n	<li>4.5 inch HD Touch Screen (1280 x 720)</li>\r\n	<li>Android 4.4 KitKat OS</li>\r\n	<li>1.4 GHz Quad Core&trade; Processor</li>\r\n	<li>20 MP Electro and 28 megapixel CMOS rear camera</li>\r\n</ul>', 1399, 599, 0, 0, 'published', '02/10/2023', 'găega', 'gưae', '2023-10-01 15:00:20', '2023-10-01 15:00:20');

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
(3, 1, 2332, 2, '2023-09-28 15:21:44', '2023-09-28 15:21:44'),
(4, 1, 442, 4, '2023-09-28 15:21:44', '2023-09-28 15:21:44'),
(6, 2, 1853, 4, '2023-09-28 16:26:55', '2023-09-30 17:21:56'),
(7, 5, 9, 1, '2023-10-01 14:24:40', '2023-10-01 18:36:42'),
(8, 5, 21, 2, '2023-10-01 14:24:40', '2023-10-01 14:24:40'),
(9, 6, 12, 1, '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(10, 6, 100, 4, '2023-10-01 14:26:44', '2023-10-01 14:26:44'),
(11, 7, 12, 1, '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(12, 7, 100, 4, '2023-10-01 14:30:18', '2023-10-01 14:30:18'),
(13, 8, 12, 1, '2023-10-01 14:32:57', '2023-10-01 14:32:57'),
(14, 8, 0, 4, '2023-10-01 14:32:57', '2023-10-01 18:41:34'),
(15, 9, 12, 1, '2023-10-01 14:41:01', '2023-10-01 14:41:01'),
(16, 9, 98, 4, '2023-10-01 14:41:01', '2023-10-01 15:43:06'),
(17, 10, 12, 1, '2023-10-01 14:59:16', '2023-10-01 14:59:16'),
(18, 10, 98, 4, '2023-10-01 14:59:16', '2023-10-01 18:35:38'),
(19, 11, 12, 1, '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(20, 11, 100, 4, '2023-10-01 15:00:20', '2023-10-01 15:00:20'),
(21, 3, 100, 4, '2023-10-01 15:13:51', '2023-10-01 15:13:51');

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
(17, 2, 'images/M86bwsI73bxJnfxUyV2mvcJohI5bz2bZXY5Lfjmd.png', '2023-10-01 15:11:03', '2023-10-01 15:11:03'),
(18, 3, 'images/kDsrPlfll1scnAN0DyfoPFYsz8HJBMcEpAhyylGs.png', '2023-10-01 15:13:51', '2023-10-01 15:13:51'),
(19, 10, 'images/QGLLZEiRSGfUG92thuh9KrfjU719Zq5gxoSo4Mls.png', '2023-10-01 15:50:28', '2023-10-01 15:50:28'),
(20, 10, 'images/muKeNn3vpfBRE96R5kd022m9FusDqL7PiZ57uud9.png', '2023-10-01 15:50:28', '2023-10-01 15:50:28'),
(22, 10, 'images/7vvaYZPZYdU0teon6VoVzlfbnFm4ZDdTespEdK3Z.png', '2023-10-01 15:51:49', '2023-10-01 15:51:49'),
(23, 10, 'images/tjUxuv91FoWc2k287ODFYDuLlMbwmsl52GPjK8Px.png', '2023-10-01 15:53:57', '2023-10-01 15:53:57'),
(24, 1, 'images/ieQB1tmvaEvrYwee2hteBnzPqWwFP8sLVpzMPiQw.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(25, 1, 'images/pI5GYD1COW03GCfl0pZuTrtn5Zy141mxPRxPMm3Z.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(26, 1, 'images/JahAQaVjUIbyIAO8sz7NBRGbuxdQ1MdGOpd5hLGC.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(27, 1, 'images/dR6CP9DhpzWQMvyjzGIrzEzElnoqDlNLJksSrGas.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50'),
(28, 1, 'images/oZQzQq7OoaavwPV37c97949319Gu1Rk8U4HKcgeK.png', '2023-10-01 18:39:50', '2023-10-01 18:39:50');

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
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`, `otp`) VALUES
(7, 'nht', 'nht@gmail.com', '2023-11-15 09:19:20', '$2y$10$KBci.gMT4BmBM6htvl2BDuydGWpaszohzwqM8jNmYkOewX7CEIR0u', NULL, '2023-11-12 02:44:26', '2023-11-15 09:19:20', 1, 600632),
(9, 'smfnv zs,mfv', '1234@gmail.com', '2023-11-15 09:18:54', '$2y$10$TIjlFBqElPB6AAKgbNkEw.Egsb8BN1.pQ0VE08OY/4lss1ML6eGT2', NULL, '2023-11-13 01:25:18', '2023-11-15 09:18:54', 0, 379547),
(10, 'pojfa43', 'pojfa43@gmail.com', NULL, '$2y$10$o3DSN35J/L927eYc9tf7C.wf5D6nSe2il7kQ6XKnoUmwQGEVTFYk6', NULL, '2023-11-15 06:52:26', '2023-11-15 06:52:26', 0, NULL),
(11, 'giangtran', 'trangiangzxc@gmail.com', '2023-11-15 09:19:33', '$2y$10$V3HfIfmSp.hgqsC48WzSHuIE17QXesSgNI7gqxDM4wIrUbvap5IPO', NULL, '2023-11-15 06:53:33', '2023-11-15 09:19:33', 1, NULL),
(12, 'dfbsgtnr245', 'dfbsgtnr245@gmail.com', NULL, '$2y$10$o3DSN35J/L927eYc9tf7C.wf5D6nSe2il7kQ6XKnoUmwQGEVTFYk6', NULL, '2023-11-15 06:52:26', '2023-11-15 06:52:26', 0, NULL);

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
(1, 2, 0.00, '2023-11-12 00:10:29', '2023-11-12 00:10:29'),
(2, 3, 0.00, '2023-11-12 00:11:07', '2023-11-12 00:11:07'),
(3, 4, 0.00, '2023-11-12 00:11:29', '2023-11-12 00:11:29'),
(4, 5, 0.00, '2023-11-12 00:11:49', '2023-11-12 00:11:49'),
(5, 9, 4563.00, '2023-11-13 01:25:23', '2023-11-15 09:18:54'),
(7, 10, 65555555.00, '2023-11-15 08:34:02', '2023-11-15 09:14:57'),
(8, 7, 99999999.00, '2023-11-15 08:46:34', '2023-11-15 09:19:21'),
(9, 11, 99999999.00, '2023-11-15 09:01:57', '2023-11-15 09:19:33'),
(10, 12, 65432765.00, '2023-11-15 09:16:34', '2023-11-15 09:16:58');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE;

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
