-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 10:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gitabook`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Tulsidas12', 1, '2023-10-06 03:44:02', '2023-10-11 06:21:57'),
(8, 'Kabir', 0, '2023-10-06 04:03:23', '2023-10-11 02:05:53'),
(9, 'Chetan Bhagat', 1, '2023-10-06 04:05:13', '2023-10-11 02:05:04'),
(10, 'Ram Kripal', 1, '2023-10-06 04:11:04', '2023-10-11 02:05:28'),
(19, 'Prabhupada', 1, '2023-10-11 09:28:25', '2023-10-11 09:29:04'),
(20, 'kanisk  kumar', 1, '2023-10-11 10:32:52', '2023-10-11 10:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `Image_url` varchar(255) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `status`, `price`, `Image_url`, `language_id`, `category_id`, `author_id`, `created_at`, `updated_at`) VALUES
(7, 'Ramayana', 0, 111, '1697014859.gif', 1, 3, 10, '2023-10-07 04:51:41', '2023-10-11 03:31:00'),
(11, 'Krishna', 1, 22, '1696779734.png', 3, 4, 9, '2023-10-08 10:11:45', '2023-10-11 02:07:06'),
(12, 'Radha-rani', 1, 122, '1696863846.jpg', 3, 3, 8, '2023-10-09 09:34:06', '2023-10-09 09:34:06'),
(13, 'Gita', 1, 111, '1696955614.jpg', 3, 4, 13, '2023-10-09 09:35:13', '2023-10-10 11:03:34'),
(14, 'Ram charit manash', 1, 32, '1697014918.jpg', 3, 4, 8, '2023-10-09 11:46:22', '2023-10-11 03:31:58'),
(15, 'BBD', 1, 90, '1697036577.png', 1, 1, 19, '2023-10-11 09:32:57', '2023-10-11 09:33:49'),
(16, 'ase2', 1, 111, NULL, 1, 3, 8, '2023-10-12 01:12:38', '2023-10-12 01:12:38'),
(17, 'BG', 1, 300, NULL, 1, 8, 19, '2023-10-12 02:14:43', '2023-10-18 09:29:37'),
(18, 'Raj Viday', 1, 50, NULL, 5, 8, 19, '2023-10-18 09:28:01', '2023-10-18 09:28:01'),
(19, 'L C F L', 1, 30, '1697780093.jpg', 5, 8, 19, '2023-10-18 09:28:26', '2023-10-20 00:04:53'),
(20, 'Lave - Kush katha', 1, 100, '1697785607.jpg', 1, 4, 7, '2023-10-20 01:36:47', '2023-10-20 01:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `book_issues`
--

CREATE TABLE `book_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `issued_quantity` int(11) NOT NULL,
  `issued_date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_issues`
--

INSERT INTO `book_issues` (`id`, `book_id`, `volunteer_id`, `issued_quantity`, `issued_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 2222, '2002-10-19 18:30:00', 'dd2', NULL, '2023-10-11 01:46:00'),
(5, 14, 2, 1211, '2023-10-10 18:30:00', 'test remarks', '2023-10-11 01:12:43', '2023-10-11 04:02:32'),
(6, 7, 1, 2, '2023-10-10 18:30:00', NULL, '2023-10-11 01:46:14', '2023-10-12 06:45:36'),
(7, 7, 1, 3, '2023-10-10 18:30:00', 'rsss', '2023-10-11 06:01:50', '2023-10-11 06:01:50'),
(8, 15, 3, 4, '2023-10-01 18:30:00', 'Test remarks', '2023-10-11 09:41:36', '2023-10-11 09:41:53'),
(9, 7, 2, 6, '2023-10-11 18:30:00', NULL, '2023-10-12 06:50:13', '2023-10-12 06:50:13'),
(11, 7, 1, 1, '2023-10-11 18:30:00', NULL, '2023-10-12 06:54:46', '2023-10-12 06:54:46'),
(12, 15, 4, 2, '2023-10-12 18:30:00', 'ss23333', '2023-10-13 08:05:47', '2023-10-14 08:08:51'),
(13, 7, 1, 91, '2023-10-16 18:30:00', NULL, '2023-10-17 09:31:51', '2023-10-17 09:31:51'),
(14, 19, 10, 5, '2023-10-17 18:30:00', NULL, '2023-10-18 09:31:05', '2023-10-18 09:31:05'),
(15, 17, 10, 10, '2023-10-17 18:30:00', NULL, '2023-10-18 09:31:23', '2023-10-18 09:31:23'),
(16, 18, 10, 20, '2023-10-17 18:30:00', NULL, '2023-10-18 09:31:40', '2023-10-18 09:31:40'),
(17, 20, 1, 10, '2023-10-10 18:30:00', NULL, '2023-10-20 01:37:33', '2023-10-20 01:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `book_returns`
--

CREATE TABLE `book_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `returned_quantity` int(11) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `returned_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_returns`
--

INSERT INTO `book_returns` (`id`, `book_id`, `volunteer_id`, `returned_quantity`, `remarks`, `returned_date`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 12, 'wwrw111111111111111111111rwer', '2022-11-10 18:30:00', NULL, '2023-10-11 01:42:42'),
(3, 14, 2, 212, 'rrrrrrrrrrrrrr-0022222222', '2021-12-31 18:30:00', '2023-10-10 07:04:10', '2023-10-11 01:41:17'),
(4, 11, 2, 122, '222222222', '2023-11-10 18:30:00', '2023-10-11 01:41:38', '2023-10-11 01:41:38'),
(5, 7, 1, 1, 'ssssssssssss', '2023-10-10 18:30:00', '2023-10-11 01:42:57', '2023-10-13 01:18:14'),
(7, 7, 1, 2, '3ss', '2023-10-12 18:30:00', '2023-10-13 06:44:53', '2023-10-13 07:41:09'),
(8, 15, 4, 1, 'ee2', '2023-10-12 18:30:00', '2023-10-13 08:09:12', '2023-10-14 08:03:37'),
(9, 17, 10, 2, NULL, '2023-10-17 18:30:00', '2023-10-18 09:36:41', '2023-10-20 01:44:22'),
(10, 18, 10, 2, NULL, '2023-10-18 18:30:00', '2023-10-19 06:29:08', '2023-10-19 06:29:08'),
(11, 18, 10, 3, NULL, '2023-10-18 18:30:00', '2023-10-19 06:29:27', '2023-10-19 06:43:54'),
(12, 19, 10, 3, NULL, '2023-10-18 18:30:00', '2023-10-19 08:53:17', '2023-10-19 08:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `book_sells`
--

CREATE TABLE `book_sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `soled_quantity` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `soled_price` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `soled_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_sells`
--

INSERT INTO `book_sells` (`id`, `book_id`, `volunteer_id`, `soled_quantity`, `price`, `soled_price`, `name`, `phone`, `address`, `remarks`, `soled_date`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 1, 211, NULL, 'mahak', '098098098', 'delhi', 'first book', '2023-10-13 08:12:57', NULL, NULL),
(2, 7, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-13 18:30:00', '2023-10-14 03:30:40', '2023-10-14 08:03:05'),
(4, 7, 2, 2, 222, NULL, NULL, NULL, NULL, NULL, '2023-10-17 18:30:00', '2023-10-18 08:47:23', '2023-10-18 08:49:16'),
(5, 17, 10, 4, 1200, NULL, 'aaa', NULL, NULL, NULL, '2023-10-17 18:30:00', '2023-10-18 09:33:28', '2023-10-18 09:33:28'),
(6, 18, 10, 5, 250, NULL, NULL, NULL, NULL, NULL, '2023-10-17 18:30:00', '2023-10-18 09:35:02', '2023-10-18 09:35:02'),
(7, 7, 1, 9, 999, NULL, NULL, NULL, NULL, NULL, '2023-10-18 18:30:00', '2023-10-19 01:26:44', '2023-10-19 03:37:25'),
(8, 17, 10, 2, 600, 700, NULL, NULL, NULL, NULL, '2023-10-18 18:30:00', '2023-10-19 07:14:24', '2023-10-19 08:49:34'),
(9, 19, 10, 2, 60, 55, NULL, NULL, NULL, NULL, '2023-10-18 18:30:00', '2023-10-19 08:16:03', '2023-10-19 08:24:48'),
(10, 15, 4, 1, 90, 90, NULL, NULL, NULL, NULL, '2023-10-19 18:30:00', '2023-10-20 01:45:24', '2023-10-20 01:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `book_stocks`
--

CREATE TABLE `book_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `received_quantity` int(11) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `received_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_stocks`
--

INSERT INTO `book_stocks` (`id`, `book_id`, `received_quantity`, `remarks`, `received_date`, `created_at`, `updated_at`) VALUES
(1, 9, 7221, 'rrrrrrrrrrrrrr-00', '2023-10-14 18:30:00', NULL, '2023-10-11 01:44:58'),
(2, 9, 2, 'ddddddddddddddd', NULL, '2023-10-09 12:48:16', '2023-10-09 12:48:16'),
(3, 9, 2, 'ddddddddddddddd', NULL, '2023-10-09 12:50:28', '2023-10-09 12:50:28'),
(4, 12, 22, 'Test remarks', '2023-10-21 18:30:00', '2023-10-09 23:36:27', '2023-10-11 03:54:23'),
(6, 8, 233, 'ssfsdfsdf', '1982-07-16 18:30:00', '2023-10-11 00:43:42', '2023-10-11 00:59:48'),
(7, 11, 123, 'remarks test 2', '2023-10-28 18:30:00', '2023-10-11 00:45:40', '2023-10-11 03:54:57'),
(8, 7, 71, 'remarks for testing', '2023-10-24 18:30:00', '2023-10-11 01:00:41', '2023-10-11 03:54:46'),
(9, 7, 29, 'asw', '2023-10-10 18:30:00', '2023-10-11 05:31:01', '2023-10-12 06:40:50'),
(10, 15, 5, '5 books received', '2023-10-01 18:30:00', '2023-10-11 09:36:38', '2023-10-11 09:36:38'),
(11, 15, 10, '10 books received', '2023-10-07 18:30:00', '2023-10-11 09:37:52', '2023-10-14 08:09:19'),
(13, 14, 2, 'ssss', '2023-10-17 18:30:00', '2023-10-18 00:20:42', '2023-10-18 00:23:27'),
(14, 15, 21, NULL, '2023-10-17 18:30:00', '2023-10-18 09:09:49', '2023-10-18 09:09:58'),
(15, 17, 20, NULL, '2023-10-17 18:30:00', '2023-10-18 09:30:11', '2023-10-18 09:30:11'),
(16, 18, 20, NULL, '2023-10-17 18:30:00', '2023-10-18 09:30:24', '2023-10-18 09:30:24'),
(17, 19, 10, NULL, '2023-10-17 18:30:00', '2023-10-18 09:30:37', '2023-10-18 09:30:37'),
(18, 20, 500, NULL, '2023-10-19 18:30:00', '2023-10-20 01:37:07', '2023-10-20 01:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Children', 1, NULL, '2023-10-12 02:11:16'),
(3, 'Mahabharta', 1, '2023-10-06 11:38:38', '2023-10-11 02:06:21'),
(4, 'Ramayan', 1, '2023-10-07 02:49:02', '2023-10-11 02:06:29'),
(5, 'Mahapuran', 0, '2023-10-08 00:35:14', '2023-10-11 02:06:40'),
(8, 'SB', 1, '2023-10-18 09:24:55', '2023-10-18 09:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hindi', 1, NULL, '2023-10-11 02:03:51'),
(3, 'English', 1, '2023-10-07 03:20:39', '2023-10-11 02:03:59'),
(5, 'Telgu', 1, '2023-10-11 10:41:00', '2023-10-18 09:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_10_06_071930_create_authors_table', 2),
(6, '2023_10_06_141551_create_categories_table', 3),
(7, '2023_10_07_082036_create_languages_table', 4),
(8, '2023_10_07_090712_create_books_table', 5),
(9, '2023_10_09_171758_create_book_stocks_table', 6),
(10, '2023_10_10_053636_create_book__issues_table', 7),
(11, '2023_10_10_062119_drop_book_issues', 8),
(12, '2023_10_10_104346_create_book_issues_table', 9),
(13, '2023_10_10_114453_create_book_returns_table', 10),
(14, '2023_10_14_073537_create_book_sells_table', 11),
(15, '2023_10_14_095521_create_volunteer_payments_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('baliram@gmail.com', '$2y$10$u6Asn5lIrZnbvIm5USlR1eZn.C2SwtjYnlvYF0lXlWLBKa9ATo6oy', '2023-10-06 00:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'volunteer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Baliram', NULL, 'baliram@gmail.com', 'admin', NULL, '$2y$10$E28onP0jUm3bPsnNZBb1XeLRnK7OJp6.3P0nMYXlyJyrBgm.DQoxe', 'pvOsFMHd2L0LRg7MzqdqCCab70Y4Bbbsxxpfw6Ecel8SgqZAqW8ZKK1s3MVp', '2023-10-06 00:54:15', '2023-10-20 10:09:10'),
(2, 'raj', NULL, 'rajkapoor0503@gmail.com', 'volunteer', NULL, '$2y$10$B/HFA7DmbIvI6IvLhNRfMuYtjVfkQYWRjjnPrjKfPTKfkDXuhapse', NULL, '2023-10-08 00:23:00', '2023-10-08 00:23:00'),
(4, 'Tooktook', NULL, 'tooktook@gmail.com', 'volunteer', NULL, '$2y$10$rEedvXUQHIY4mA6Hx9BOJOjBkhJgPaf2vgHRRoTZn08nJFvl8u846', NULL, '2023-10-13 03:43:23', '2023-10-18 00:56:43'),
(5, 'kanisk  kumar', NULL, 'kanishkapr2011@gmail.com', 'volunteer', NULL, 'kanishkapr2011@gmail.com', NULL, '2023-10-16 03:41:02', '2023-10-16 03:41:02'),
(9, 'bbc', NULL, 'bbc@gmail.com', 'volunteer', NULL, '$2y$10$Ys31zA/EKBSchrF.6UMFYOd3ej39WENgl/ps9p4tu8CmvQL7EWYnq', NULL, '2023-10-17 23:52:06', '2023-10-17 23:52:06'),
(10, 'Anil Kumar', NULL, 'anil@yahoo.comm', 'admin', NULL, '$2y$10$0TeHKWaa7UEEe2KnFP4Qxe/t4hq84GgrQX7kH8fAiU544Qk7GIV3S', NULL, '2023-10-18 00:54:36', '2023-10-18 00:56:26'),
(11, 'khushboo', NULL, 'khushboo@gmail.com', 'volunteer', NULL, '$2y$10$IiPDIqyUUy4tQ16JPvwrqeGjUJ.a.5/IH7csuXm1VQYj8k18l/Qyu', NULL, '2023-10-20 02:13:17', '2023-10-20 02:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_payments`
--

CREATE TABLE `volunteer_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `is_approved` int(11) DEFAULT 0,
  `payment_date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer_payments`
--

INSERT INTO `volunteer_payments` (`id`, `volunteer_id`, `amount`, `is_approved`, `payment_date`, `remarks`, `created_at`, `updated_at`) VALUES
(3, 4, 1111, 1, '2023-11-10 18:30:00', 'sws211', '2023-10-14 05:22:56', '2023-10-14 07:57:01'),
(4, 4, 1, 0, '2023-10-13 18:30:00', 'a', '2023-10-14 05:23:19', '2023-10-14 05:23:19'),
(5, 3, 2, 0, '2023-10-13 18:30:00', 'a2', '2023-10-14 05:23:36', '2023-10-14 08:00:00'),
(7, 3, 11, 0, '2023-10-10 18:30:00', '2', '2023-10-14 08:11:32', '2023-10-14 08:11:32'),
(8, 1, 600, 0, '2023-10-17 18:30:00', NULL, '2023-10-18 06:01:37', '2023-10-18 06:01:37'),
(9, 1, 400, 0, '2023-10-17 18:30:00', NULL, '2023-10-18 06:40:34', '2023-10-18 06:40:34'),
(10, 10, 1000, 0, '2023-10-17 18:30:00', NULL, '2023-10-18 09:37:59', '2023-10-18 09:37:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issues`
--
ALTER TABLE `book_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_returns`
--
ALTER TABLE `book_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_sells`
--
ALTER TABLE `book_sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_stocks`
--
ALTER TABLE `book_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `volunteer_payments`
--
ALTER TABLE `volunteer_payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `book_returns`
--
ALTER TABLE `book_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_sells`
--
ALTER TABLE `book_sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_stocks`
--
ALTER TABLE `book_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `volunteer_payments`
--
ALTER TABLE `volunteer_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
