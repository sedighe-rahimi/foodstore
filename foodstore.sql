-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 08:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodstore`
--

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
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_type_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int(11) NOT NULL,
  `waiting_time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `user_id`, `description`, `food_type_id`, `price`, `image_url`, `count`, `waiting_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'قرمه سبزی', 1, 'تاریخچه قرمه سبزی تاریخچه قرمه سبزی تاریخچه قرمه سبزی تاریخچه قرمه سبزی', 1, 10000, '\\images\\1641991623.jpg', 15, 10, '2022-01-10 11:47:05', '2022-01-13 01:57:42', NULL),
(2, 'پپرونی', 1, 'تاریخچه پپرونی تاریخچه پپرونی تاریخچه پپرونی تاریخچه پپرونی تاریخچه پپرونی تاریخچه پپرونی تاریخچه پپرونی', 2, 20000, '\\images\\1641991660.jpg', 5, 20, '2022-01-10 11:47:57', '2022-01-13 01:49:44', NULL),
(3, 'قیمه', 1, 'تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمهتاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمهتاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمهتاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمهتاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمهتاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه تاریخچه قیمه', 1, 30000, '\\images\\1641991668.jpg', 10, 30, '2022-01-10 11:48:39', '2022-01-13 15:32:16', NULL),
(4, 'طرز تهیه دوکبوکی کره ای', 1, 'تاریخچه دوکومبی کره ای تاریخچه دوکومبی کره ای تاریخچه دوکومبی کره ای تاریخچه دوکومبی کره ای تاریخچه دوکومبی کره ای تاریخچه دوکومبی کره ای', 3, 40000, '\\images\\1641991680.jpg', 2, 40, '2022-01-10 11:50:36', '2022-01-12 18:16:05', NULL),
(5, 'چیکن تیکا ماسالا', 1, 'تاریخچه چیکن تیکا ماسالا تاریخچه چیکن تیکا ماسالا تاریخچه چیکن تیکا ماسالا تاریخچه چیکن تیکا ماسالا', 3, 50000, '\\images\\1641991687.jpg', 5, 15, '2022-01-10 11:52:19', '2022-01-12 09:18:07', NULL),
(10, 'پاستا پنه با سس آلفردو', 1, 'تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو تاریخچه پاستا پنه با سس آلفردو', 3, 98000, '\\images\\1642075085.jpg', 98, 45, '2022-01-13 08:28:05', '2022-01-13 15:46:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_types`
--

CREATE TABLE `food_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_types`
--

INSERT INTO `food_types` (`id`, `title`, `active`, `created_at`, `updated_at`) VALUES
(1, 'سنتی', 1, NULL, NULL),
(2, 'فست فود', 1, NULL, NULL),
(3, 'بین المللی', 1, NULL, NULL);

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
(5, '2022_01_09_061042_create_food_types_table', 1),
(6, '2022_01_09_073515_create_foods_table', 1),
(7, '2022_01_09_073538_create_orders_table', 1),
(8, '2022_01_10_192107_create_order_details_table', 1),
(13, '2022_01_13_050442_add_delivered_status_to_order_details', 2),
(14, '2022_01_13_062030_add_softdelete_to_orders', 2),
(15, '2022_01_13_062542_add_softdelete_to_order_details', 2),
(16, '2022_01_13_181752_add_softdelete_to_foods', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `waiting_time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `waiting_time` int(11) NOT NULL,
  `delivered_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tehran test',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `email_verified_at`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sedighe', 'admin', 'rahimi@gmail.com', NULL, '$2y$10$xGjbMLTRV89UfxyA5OURpOf67WFaNDDFBH6rXanjSA8QxOU2SETsO', 'Tehran test', NULL, '2022-01-10 11:44:41', '2022-01-10 11:44:41'),
(2, 'sedighe2', 'user', 'ss@gmail.com', NULL, '$2y$10$pVuF/WBYtcYWEGZfJAkFsuQULd41/j89gErKY6dlWk0HCI1a9LYz2', 'Tehran test', NULL, '2022-01-12 11:04:43', '2022-01-12 11:04:43'),
(3, 'atsign', 'user', 'atsign@gmail.com', NULL, '$2y$10$nFn.ZvEsaOviwsqfruJo8eyqWce./SxVXC3Ic0c2Ys6jwje0WkTWu', 'Tehran test', NULL, '2022-01-13 06:37:23', '2022-01-13 06:37:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foods_user_id_foreign` (`user_id`),
  ADD KEY `foods_food_type_id_foreign` (`food_type_id`);

--
-- Indexes for table `food_types`
--
ALTER TABLE `food_types`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_food_id_foreign` (`food_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food_types`
--
ALTER TABLE `food_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_food_type_id_foreign` FOREIGN KEY (`food_type_id`) REFERENCES `food_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
