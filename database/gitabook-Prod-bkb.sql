-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2023 at 06:38 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.2.11

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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Srila Prabhupada', 1, '2023-10-28 11:06:49', '2023-10-28 11:06:49'),
(2, 'None', 1, '2023-10-28 14:34:00', '2023-10-28 14:34:00'),
(3, 'Hindol Sengupta', 1, '2023-12-05 07:16:54', '2023-12-05 07:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `status`, `price`, `remark`, `other1`, `other2`, `Image_url`, `language_id`, `category_id`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'Science Of Self Realization (SSR)', 1, '195', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '8000', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:27:20'),
(4, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Journey Of Self Discovery (JOSD)', 1, '160', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:35:54'),
(8, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Raj Vidya (RV)', 1, '50', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-12-05 11:48:43'),
(11, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'On the Way To Krsna (OWTK)', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:20:43'),
(15, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Srimad Bhagavatam 1st canto (SB)', 1, '1000', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:57:19'),
(17, 'Perfect Question and Perfect Answer (PQPA)', 1, '50', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Life Come First Life (LCFL)', 1, '80', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:21:10'),
(21, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'MOG', 1, '45', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:20:20'),
(23, 'C&T', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:20:02'),
(24, 'KROP', 1, '25', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-11-22 12:59:11'),
(25, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 8, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Bhagavad gita (Mac) - BG', 1, '270', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:19:02'),
(27, 'Krishna (hb)', 1, '270', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Beyond Birth and Death (BBD)', 1, '50', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Science Of Self Realization (SSR)', 1, '130', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:23:15'),
(30, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '7500', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:28:29'),
(31, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '0', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:33:18'),
(32, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Journey Of Self Discovery (JOSD)', 1, '150', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:33:18'),
(35, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Raj Vidya (RV)', 1, '60', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:32:24'),
(38, 'Topmost Yoga System (TYS)', 1, '50', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:35:35'),
(39, 'Easy Journey to Other Planet (EJOP)', 1, '50', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:24:10'),
(40, 'Second Chance (SC)', 1, '110', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:24:30'),
(41, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Srimad Bhagavatam 1st canto (SB)', 1, '799', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Perfect Question and Perfect Answer (PQPA)', 1, '60', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:25:47'),
(45, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Matchless Gift (MG)', 1, '50', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:31:32'),
(47, 'Life Come First Life (LCFL)', 1, '90', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:56:16'),
(48, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 7, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Bhagavad gita (Mac) - BG', 1, '270', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:19:09'),
(54, 'Krishna (hb)', 1, '270', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Beyond Birth and Death (BBD)', 1, '40', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:23:46'),
(56, 'Science Of Self Realization (SSR)', 1, '160', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:53:44'),
(57, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '7500', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:28:41'),
(58, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3700', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:32:13'),
(59, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Journey Of Self Discovery (JOSD)', 1, '95', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Raj Vidya (RV)', 1, '35', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:48:47'),
(65, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Easy Journey to Other Planet (EJOP)', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:00:26'),
(67, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Perfect Question and Perfect Answer (PQPA)', 1, '35', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:48:19'),
(72, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-12-05 12:02:46'),
(73, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Life Come First Life (LCFL)', 1, '55', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:49:37'),
(75, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Bhagavad gita (Mac) - BG', 1, '270', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:31'),
(81, 'Krishna (hb)', 1, '270', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Beyond Birth and Death (BBD)', 1, '20', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:45:01'),
(83, 'Science Of Self Realization (SSR)', 1, '195', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '7500', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:27:39'),
(85, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3000', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:33:43'),
(86, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Journey Of Self Discovery (JOSD)', 1, '200', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:43:39'),
(89, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Raj Vidya (RV)', 1, '70', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:42:35'),
(92, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Second Chance (SC)', 1, '130', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:47:03'),
(95, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Srimad Bhagavatam 1st canto (SB)', 1, '699', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:56:50'),
(98, 'Perfect Question and Perfect Answer (PQPA)', 1, '75', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:43:01'),
(99, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Life Come First Life (LCFL)', 1, '110', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:56:00'),
(102, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 5, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Bhagavad gita (Mac) - BG', 1, '270', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:21'),
(108, 'Krishna (hb)', 1, '270', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:51:10'),
(109, 'Beyond Birth and Death (BBD)', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:14:27'),
(164, 'Science Of Self Realization (SSR)', 1, '200', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:23:51'),
(165, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '7500', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:29:13'),
(166, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '0', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:32:38'),
(167, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'Journey Of Self Discovery (JOSD)', 1, '90', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:24:35'),
(170, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'Raj Vidya (RV)', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Easy Journey to Other Planet (EJOP)', 1, '50', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:24:53'),
(175, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Srimad Bhagavatam 1st canto (SB)', 1, '799', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Perfect Question and Perfect Answer (PQPA)', 1, '50', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Matchless Gift (MG)', 1, '65', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:24:10'),
(182, 'Life Come First Life (LCFL)', 1, '65', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:26:14'),
(183, 'Introduction to Bhagavad Gita (IBG)', 1, '45', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:26:51'),
(184, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Bhagavad gita (Mac) - BG', 1, '270', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:57'),
(189, 'Krishna (hb)', 1, '270', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Beyond Birth and Death (BBD)', 1, '45', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:26:34'),
(191, 'Science Of Self Realization (SSR)', 1, '130', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:01:13'),
(192, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '7500', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:29:27'),
(193, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '5400', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:32:57'),
(194, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Journey Of Self Discovery (JOSD)', 1, '95', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Raj Vidya (RV)', 1, '70', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '2023-12-05 07:59:13'),
(200, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'Perfect Question and Perfect Answer (PQPA)', 1, '45', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:01:56'),
(207, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'Life Come First Life (LCFL)', 1, '70', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'KROP', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '2023-12-05 08:02:52'),
(214, 'Bhagavad gita (Mac) - BG', 1, '270', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:47'),
(215, 'Krishna (hb)', 1, '270', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Beyond Birth and Death (BBD)', 1, '50', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Dhruva', 1, '60', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-11-22 09:33:33', '2023-12-18 12:08:34'),
(219, 'Gajendra', 1, '60', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-11-22 09:33:54', '2023-12-18 12:08:05'),
(220, 'Govardhana', 1, '60', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-11-22 09:34:21', '2023-12-18 12:08:19'),
(221, 'Govinda Krishna', 1, '60', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-11-22 09:34:43', '2023-12-05 12:12:12'),
(222, 'Krishna Lila', 1, '60', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-11-22 09:35:08', '2023-12-05 12:12:57'),
(223, 'Lord Krishna Advent & Pastimes', 1, '190', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-11-22 09:35:53', '2023-12-05 12:14:24'),
(224, 'Lord Krishna Dwaraka-Lila', 1, '190', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-11-22 09:36:27', '2023-12-05 12:14:34'),
(225, 'Gokulananda', 1, '60', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-11-22 09:38:37', '2023-12-05 12:11:42'),
(226, 'Easy Journey to Other Planet (EJOP)', 1, '45', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-11-22 12:52:02', '2023-11-29 09:41:40'),
(227, 'Raj Vidya - RV', 1, '60', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-11-22 12:55:01', '2023-12-01 15:43:07'),
(228, 'Science of Self Realization -(SSR)', 1, '220', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-11-22 12:57:17', '2023-12-01 15:42:12'),
(229, 'Perfection Of Yoga - POY', 1, '35', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-11-22 13:00:46', '2023-12-01 15:42:59'),
(230, 'Introduction to Bhagavad Gita - IBG', 1, '35', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-11-22 13:04:00', '2023-12-01 15:42:01'),
(231, 'Introduction to Bhagavad Gita (IBG)', 1, '35', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-11-22 16:25:08', '2023-12-01 15:41:53'),
(232, 'Science Of Self Realization (SSR)', 1, '230', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-11-22 16:38:05', '2023-12-01 15:41:29'),
(233, 'Sing Dance and Pray', 1, '499', NULL, NULL, NULL, NULL, 8, 1, 3, '2023-12-05 07:17:32', '2023-12-05 07:17:59'),
(234, 'Messagenger Of Supreme Lord', 1, '290', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-12-05 07:23:16', '2023-12-05 07:23:16'),
(235, 'Coming Back', 1, '60', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-12-05 07:32:54', '2023-12-05 07:32:54'),
(236, 'Teaching Of Queen Kunti', 1, '140', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-12-05 07:34:21', '2023-12-05 07:34:58'),
(237, 'Path Of Perfection', 1, '110', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-12-05 07:35:18', '2023-12-05 07:35:18'),
(238, 'Prabhupada', 1, '250', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-12-05 07:36:24', '2023-12-05 07:36:24'),
(239, 'Laws of Nature', 1, '250', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-12-05 07:37:05', '2023-12-05 07:37:05'),
(240, 'Teachings of Lord Chaitanya', 1, '200', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-12-05 07:38:13', '2023-12-05 07:38:13'),
(241, 'Isopanishad', 1, '60', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-12-05 07:38:52', '2023-12-05 07:38:52'),
(242, 'CB', 1, '70', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-12-05 07:41:06', '2023-12-05 07:41:06'),
(243, 'Teaching Of Queen Kunti', 1, '150', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-12-05 07:44:25', '2023-12-05 07:44:25'),
(244, 'HandBook for KC', 1, '35', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-12-05 07:46:35', '2023-12-05 07:46:35'),
(245, 'Quest For Enlightement', 1, '135', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-12-05 07:47:32', '2023-12-05 07:47:32'),
(246, 'Teachings of Prahalad Maharaj', 1, '25', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-12-05 07:48:41', '2023-12-05 07:48:41'),
(247, 'Who is lord Chaitanya', 1, '45', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-12-05 07:49:05', '2023-12-05 07:49:05'),
(248, 'Teachings of Lord Kapila', 1, '110', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-12-05 07:49:34', '2023-12-05 07:49:34'),
(249, 'Message of Godhead', 1, '65', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-12-05 07:50:22', '2023-12-05 07:50:22'),
(250, 'Nector Of Instructions', 1, '55', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-12-05 07:50:54', '2023-12-05 07:50:54'),
(251, 'Dharma', 1, '45', NULL, NULL, NULL, NULL, 6, 1, 1, '2023-12-05 07:54:45', '2023-12-05 07:54:45'),
(252, 'Chaitanaya Mahaprabhu', 1, '20', NULL, NULL, NULL, NULL, 6, 1, 1, '2023-12-05 07:55:26', '2023-12-05 07:55:26'),
(253, 'Law Of Nature', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '2023-12-05 07:56:08', '2023-12-05 07:56:08'),
(254, 'Elevation to Krsna Consciousness', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '2023-12-05 07:57:05', '2023-12-05 07:57:05'),
(255, 'Teaching Of Prahalad Maharaj', 1, '20', NULL, NULL, NULL, NULL, 1, 1, 1, '2023-12-05 08:00:20', '2023-12-05 08:00:20'),
(256, 'Path Of Perfection', 1, '100', NULL, NULL, NULL, NULL, 1, 1, 1, '2023-12-05 08:00:43', '2023-12-05 08:00:43'),
(257, 'Dharma', 1, '45', NULL, NULL, NULL, NULL, 1, 1, 1, '2023-12-05 08:01:36', '2023-12-05 08:01:36'),
(258, 'Law Of Nature', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '2023-12-05 08:02:34', '2023-12-05 08:02:34'),
(259, 'Bhagavad Gita (BG)', 1, '270', NULL, NULL, NULL, NULL, 4, 1, 1, '2023-12-05 08:11:57', '2023-12-05 08:11:57'),
(260, 'Krishna (Krsna)', 1, '270', NULL, NULL, NULL, NULL, 4, 1, 1, '2023-12-05 08:12:34', '2023-12-05 08:12:34'),
(261, 'Raj Vidya', 1, '60', NULL, NULL, NULL, NULL, 4, 1, 1, '2023-12-05 08:12:54', '2023-12-05 08:12:54'),
(262, 'Path Of Perfection', 1, '60', NULL, NULL, NULL, NULL, 4, 1, 1, '2023-12-05 08:13:15', '2023-12-05 08:13:15'),
(263, 'Isopanishad', 1, '60', NULL, NULL, NULL, NULL, 4, 1, 1, '2023-12-05 08:13:37', '2023-12-05 08:13:37'),
(264, 'Easy Journey to Other Planet (EJOP)', 1, '60', NULL, NULL, NULL, NULL, 4, 1, 1, '2023-12-05 08:14:01', '2023-12-05 08:14:01'),
(265, 'Bhagavad Gita (BG)', 1, '270', NULL, NULL, NULL, NULL, 3, 1, 1, '2023-12-05 08:14:28', '2023-12-05 08:14:28'),
(266, 'Krishana (Krsna)', 1, '270', NULL, NULL, NULL, NULL, 3, 1, 1, '2023-12-05 08:14:55', '2023-12-05 08:14:55'),
(267, 'BBD', 1, '35', NULL, NULL, NULL, NULL, 3, 1, 1, '2023-12-05 08:15:08', '2023-12-05 08:15:08'),
(268, 'Civilization of Trans.. C&T', 1, '50', NULL, NULL, NULL, NULL, 3, 1, 1, '2023-12-05 08:16:14', '2023-12-05 08:16:14'),
(269, 'Life come from life', 1, '100', NULL, NULL, NULL, NULL, 3, 1, 1, '2023-12-05 08:16:34', '2023-12-05 08:16:34'),
(270, 'Bhagavad Gita', 1, '270', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:17:22', '2023-12-05 08:17:22'),
(271, 'Krishana (Krsna)', 1, '270', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:17:45', '2023-12-05 08:17:45'),
(272, 'Coming Back', 1, '70', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:18:17', '2023-12-05 08:18:17'),
(273, 'Geeta Gyan', 1, '70', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:18:39', '2023-12-05 08:18:39'),
(274, 'Geeta Gyan', 1, '70', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:19:04', '2023-12-05 08:19:04'),
(275, 'Gita Mahatmaya', 1, '95', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:19:24', '2023-12-05 08:19:24'),
(276, 'Isopanishad', 1, '70', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:20:08', '2023-12-05 08:20:08'),
(277, 'Jiban Ase Jiban Thek', 1, '80', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:20:39', '2023-12-05 08:20:39'),
(278, 'Journey Of Self Discovery (JOSD)', 1, '160', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:21:11', '2023-12-05 08:21:11'),
(279, 'Laws of Nature', 1, '55', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:21:34', '2023-12-05 08:21:34'),
(280, 'Nector of Instructions', 1, '60', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:22:04', '2023-12-05 08:22:04'),
(281, 'Prashan Karun Uttar Paben', 1, '300', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-12-05 08:22:34', '2023-12-05 08:22:34'),
(282, 'Teachings of Lord Kapila', 1, '120', NULL, NULL, NULL, NULL, 2, 1, 1, '2023-12-05 08:25:25', '2023-12-05 08:25:25'),
(283, 'Bhakti The Art of Eternal Love', 1, '50', NULL, NULL, NULL, NULL, 2, 1, 1, '2023-12-05 08:25:52', '2023-12-05 08:25:52'),
(284, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3200', NULL, NULL, NULL, NULL, 4, 1, 1, '2023-12-05 08:35:19', '2023-12-05 08:35:19'),
(285, 'Mouse Becomes Mouse Again (MBMA)', 1, '60', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-12-18 12:10:05', '2023-12-18 12:10:05'),
(286, 'Ramayana', 1, '100', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-12-18 12:10:38', '2023-12-18 12:10:38'),
(287, '24 Lesson', 1, '100', NULL, NULL, NULL, NULL, 10, 2, 2, '2023-12-18 12:11:14', '2023-12-18 12:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `book_issues`
--

CREATE TABLE `book_issues` (
  `id` bigint UNSIGNED NOT NULL,
  `book_id` int NOT NULL,
  `volunteer_id` int NOT NULL,
  `issued_quantity` int NOT NULL,
  `issued_date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_issues`
--

INSERT INTO `book_issues` (`id`, `book_id`, `volunteer_id`, `issued_quantity`, `issued_date`, `remarks`, `other1`, `other2`, `created_at`, `updated_at`) VALUES
(1, 270, 10, 1, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:21:49', '2023-12-05 15:21:49'),
(2, 225, 10, 20, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:22:03', '2023-12-05 15:22:03'),
(3, 222, 10, 20, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:24:59', '2023-12-05 15:24:59'),
(4, 221, 10, 20, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:27:37', '2023-12-05 15:27:37'),
(5, 223, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:28:03', '2023-12-05 15:28:03'),
(6, 224, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:28:16', '2023-12-05 15:28:16'),
(7, 24, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:28:55', '2023-12-05 15:28:55'),
(8, 80, 10, 30, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:31:25', '2023-12-05 15:31:25'),
(9, 26, 10, 50, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:35:01', '2023-12-05 15:35:01'),
(10, 1, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:35:07', '2023-12-05 15:35:07'),
(11, 27, 10, 15, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:35:12', '2023-12-05 15:35:12'),
(12, 28, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:35:19', '2023-12-05 15:35:19'),
(13, 13, 10, 15, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:35:25', '2023-12-05 15:35:25'),
(14, 229, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:35:30', '2023-12-05 15:35:30'),
(16, 17, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:36:05', '2023-12-05 15:36:05'),
(17, 214, 10, 2, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:38:51', '2023-12-05 15:38:51'),
(18, 227, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:41:56', '2023-12-05 15:41:56'),
(19, 25, 10, 5, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:44:14', '2023-12-05 15:44:14'),
(20, 54, 10, 15, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:44:54', '2023-12-05 15:44:54'),
(21, 53, 10, 20, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:53:57', '2023-12-05 15:53:57'),
(22, 228, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:54:38', '2023-12-05 15:54:38'),
(23, 55, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:55:18', '2023-12-05 15:55:18'),
(24, 40, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:55:53', '2023-12-05 15:55:53'),
(26, 44, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:56:34', '2023-12-05 15:56:34'),
(27, 37, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:57:04', '2023-12-05 15:57:04'),
(28, 107, 10, 20, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:57:53', '2023-12-05 15:57:53'),
(29, 108, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:59:22', '2023-12-05 15:59:22'),
(30, 109, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:59:36', '2023-12-05 15:59:36'),
(31, 94, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 15:59:53', '2023-12-05 15:59:53'),
(32, 98, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:00:09', '2023-12-05 16:00:09'),
(33, 91, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:00:45', '2023-12-05 16:00:45'),
(34, 265, 10, 2, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:01:09', '2023-12-05 16:01:09'),
(35, 215, 10, 2, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:01:27', '2023-12-06 12:42:59'),
(36, 81, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:01:58', '2023-12-06 11:37:52'),
(37, 56, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:02:04', '2023-12-05 16:02:04'),
(38, 72, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:02:15', '2023-12-05 16:02:15'),
(39, 71, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:02:34', '2023-12-05 16:02:34'),
(40, 64, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:02:41', '2023-12-05 16:02:41'),
(41, 82, 10, 10, '2023-12-05 00:00:00', NULL, NULL, NULL, '2023-12-05 16:02:51', '2023-12-05 16:02:51'),
(42, 259, 10, 5, '2023-12-06 00:00:00', 'Issued 5 BG', NULL, NULL, '2023-12-06 11:26:56', '2023-12-06 11:26:56'),
(43, 214, 10, 3, '2023-12-17 00:00:00', NULL, NULL, NULL, '2023-12-18 12:20:08', '2023-12-18 12:20:08'),
(44, 219, 10, 9, '2023-12-17 00:00:00', NULL, NULL, NULL, '2023-12-18 12:20:23', '2023-12-18 12:20:23'),
(45, 220, 10, 7, '2023-12-17 00:00:00', NULL, NULL, NULL, '2023-12-18 12:20:30', '2023-12-18 12:20:30'),
(46, 218, 10, 5, '2023-12-17 00:00:00', NULL, NULL, NULL, '2023-12-18 12:20:45', '2023-12-18 12:20:45'),
(47, 232, 10, 3, '2023-12-17 00:00:00', NULL, NULL, NULL, '2023-12-18 12:21:00', '2023-12-18 12:21:00'),
(48, 107, 10, 15, '2023-12-17 00:00:00', 'Received through Srikant Prabhu', NULL, NULL, '2023-12-18 12:22:46', '2023-12-18 12:22:46'),
(49, 107, 10, 5, '2023-12-17 00:00:00', 'Received through Chandrashekhar Pr', NULL, NULL, '2023-12-18 12:23:04', '2023-12-18 12:23:04'),
(50, 108, 10, 5, '2023-12-17 00:00:00', 'Received through Srikant Prabhu', NULL, NULL, '2023-12-18 12:23:51', '2023-12-18 12:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `book_returns`
--

CREATE TABLE `book_returns` (
  `id` bigint UNSIGNED NOT NULL,
  `book_id` int NOT NULL,
  `volunteer_id` int NOT NULL,
  `returned_quantity` int NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returned_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_returns`
--

INSERT INTO `book_returns` (`id`, `book_id`, `volunteer_id`, `returned_quantity`, `remarks`, `other1`, `other2`, `returned_date`, `created_at`, `updated_at`) VALUES
(1, 108, 10, 10, 'Taken by Pannaga Pr.', NULL, NULL, '2023-12-06 00:00:00', '2023-12-06 11:23:21', '2023-12-06 11:23:21'),
(2, 215, 10, 1, NULL, NULL, NULL, '2023-12-06 00:00:00', '2023-12-06 12:43:27', '2023-12-06 12:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `book_sells`
--

CREATE TABLE `book_sells` (
  `id` bigint UNSIGNED NOT NULL,
  `book_id` int NOT NULL,
  `volunteer_id` int NOT NULL,
  `soled_quantity` int NOT NULL,
  `price` int DEFAULT NULL,
  `soled_price` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soled_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_sells`
--

INSERT INTO `book_sells` (`id`, `book_id`, `volunteer_id`, `soled_quantity`, `price`, `soled_price`, `name`, `phone`, `address`, `remarks`, `other1`, `other2`, `soled_date`, `created_at`, `updated_at`) VALUES
(1, 24, 10, 1, 25, 20, NULL, NULL, NULL, 'Rs. 5 Less', NULL, NULL, '2023-12-05 00:00:00', '2023-12-05 15:30:53', '2023-12-05 18:01:06'),
(2, 80, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-05 00:00:00', '2023-12-05 15:31:55', '2023-12-05 15:31:55'),
(3, 107, 10, 1, 270, 250, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 00:00:00', '2023-12-08 07:15:01', '2023-12-08 07:15:01'),
(4, 26, 10, 2, 540, 540, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 00:00:00', '2023-12-08 07:15:23', '2023-12-08 07:15:23'),
(5, 53, 10, 2, 540, 500, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 00:00:00', '2023-12-08 07:16:00', '2023-12-08 07:16:55'),
(6, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 00:00:00', '2023-12-08 07:16:29', '2023-12-08 07:16:29'),
(7, 80, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 00:00:00', '2023-12-08 07:16:44', '2023-12-15 06:13:29'),
(8, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-08 00:00:00', '2023-12-15 06:13:55', '2023-12-15 06:13:55'),
(9, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-12 00:00:00', '2023-12-15 06:14:18', '2023-12-15 06:14:18'),
(10, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-09 00:00:00', '2023-12-15 06:15:31', '2023-12-15 06:15:31'),
(11, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-09 00:00:00', '2023-12-15 06:15:51', '2023-12-15 06:15:51'),
(12, 53, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-09 00:00:00', '2023-12-15 06:16:06', '2023-12-15 06:16:06'),
(13, 27, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-09 00:00:00', '2023-12-15 06:16:34', '2023-12-15 06:16:34'),
(14, 81, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-09 00:00:00', '2023-12-15 06:16:54', '2023-12-15 06:16:54'),
(15, 107, 10, 1, 270, 290, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-12 00:00:00', '2023-12-15 06:17:32', '2023-12-15 06:17:32'),
(16, 13, 10, 1, 100, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:18:13', '2023-12-15 06:18:13'),
(17, 24, 10, 2, 50, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:19:46', '2023-12-15 06:19:46'),
(18, 227, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:20:12', '2023-12-15 06:20:12'),
(19, 229, 10, 1, 35, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:21:09', '2023-12-15 06:21:09'),
(20, 53, 10, 5, 1350, 1350, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:21:32', '2023-12-15 06:21:32'),
(21, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:21:55', '2023-12-15 06:21:55'),
(22, 270, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:22:14', '2023-12-15 06:22:14'),
(23, 214, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:22:37', '2023-12-15 06:22:37'),
(24, 53, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:23:06', '2023-12-15 06:23:06'),
(25, 225, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:23:26', '2023-12-15 06:23:26'),
(26, 98, 10, 1, 75, 75, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:23:58', '2023-12-15 06:23:58'),
(27, 91, 10, 1, 70, 70, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:24:47', '2023-12-15 06:24:47'),
(28, 109, 10, 1, 40, 40, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:25:20', '2023-12-15 06:25:20'),
(29, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-10 00:00:00', '2023-12-15 06:26:00', '2023-12-15 06:26:00'),
(30, 225, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:26:31', '2023-12-15 06:26:31'),
(31, 222, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:27:16', '2023-12-15 06:27:16'),
(32, 221, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:27:37', '2023-12-15 06:27:37'),
(33, 223, 10, 1, 190, 190, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:28:12', '2023-12-15 06:28:12'),
(34, 224, 10, 1, 190, 190, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:28:41', '2023-12-15 06:28:41'),
(35, 225, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:30:19', '2023-12-15 06:30:19'),
(36, 222, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:30:46', '2023-12-15 06:30:46'),
(37, 221, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:31:28', '2023-12-15 06:31:28'),
(38, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:31:57', '2023-12-15 06:31:57'),
(39, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:32:42', '2023-12-15 06:32:42'),
(40, 1, 10, 1, 195, 195, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:33:21', '2023-12-15 06:33:21'),
(41, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:33:53', '2023-12-15 06:33:53'),
(42, 81, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:34:18', '2023-12-15 06:34:18'),
(43, 80, 10, 2, 540, 540, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-11 00:00:00', '2023-12-15 06:34:58', '2023-12-15 06:34:58'),
(44, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-12 00:00:00', '2023-12-15 06:35:23', '2023-12-15 06:51:33'),
(45, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-14 00:00:00', '2023-12-15 06:35:55', '2023-12-15 06:35:55'),
(47, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-14 00:00:00', '2023-12-18 12:26:57', '2023-12-18 12:26:57'),
(49, 107, 10, 5, 1350, 1350, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:35:26', '2023-12-18 12:35:26'),
(50, 108, 10, 2, 540, 540, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:42:50', '2023-12-18 12:42:50'),
(51, 27, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:43:33', '2023-12-18 12:43:33'),
(52, 26, 10, 2, 540, 540, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:44:23', '2023-12-18 12:44:23'),
(53, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:45:57', '2023-12-18 12:45:57'),
(54, 222, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:46:27', '2023-12-18 12:46:27'),
(56, 220, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:48:59', '2023-12-18 12:48:59'),
(57, 64, 10, 1, 35, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:49:45', '2023-12-18 12:49:45'),
(58, 214, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:52:28', '2023-12-18 12:52:28'),
(59, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:52:56', '2023-12-18 12:52:56'),
(60, 13, 10, 1, 100, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:54:04', '2023-12-18 12:54:04'),
(61, 40, 10, 1, 110, 110, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:55:05', '2023-12-18 12:55:05'),
(62, 221, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:55:26', '2023-12-18 12:55:26'),
(63, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-18 00:00:00', '2023-12-18 12:56:34', '2023-12-18 12:56:34'),
(64, 24, 10, 1, 25, 25, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:57:02', '2023-12-18 12:57:02'),
(65, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:57:20', '2023-12-18 12:57:20'),
(66, 259, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 00:00:00', '2023-12-18 12:57:39', '2023-12-18 12:57:39'),
(67, 71, 10, 1, 35, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:58:34', '2023-12-18 12:58:34'),
(68, 64, 10, 1, 35, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:59:18', '2023-12-18 12:59:18'),
(69, 80, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 13:00:12', '2023-12-18 13:00:12'),
(70, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 13:00:36', '2023-12-18 13:00:36'),
(71, 227, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 13:01:05', '2023-12-18 13:01:05'),
(72, 24, 10, 1, 25, 25, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 13:01:33', '2023-12-18 13:01:33'),
(73, 107, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 13:01:53', '2023-12-18 13:01:53'),
(74, 26, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-18 00:00:00', '2023-12-18 13:16:35', '2023-12-18 13:16:35'),
(75, 53, 10, 1, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-18 00:00:00', '2023-12-18 13:16:53', '2023-12-18 13:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `book_stocks`
--

CREATE TABLE `book_stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `book_id` int NOT NULL,
  `invoice_id` int DEFAULT NULL,
  `received_quantity` int NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_stocks`
--

INSERT INTO `book_stocks` (`id`, `book_id`, `invoice_id`, `received_quantity`, `remarks`, `other1`, `other2`, `received_date`, `created_at`, `updated_at`) VALUES
(1, 26, 11, 50, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:45:29', '2023-12-05 11:50:40'),
(2, 27, 11, 15, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:45:58', '2023-12-05 11:45:58'),
(3, 1, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:46:15', '2023-12-05 11:46:15'),
(4, 28, 11, 10, 'Not received any books', NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:46:34', '2023-12-06 11:12:11'),
(5, 13, 11, 15, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:46:54', '2023-12-05 11:46:54'),
(6, 229, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:47:16', '2023-12-05 11:47:16'),
(7, 24, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:47:31', '2023-12-05 11:47:31'),
(8, 17, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:47:47', '2023-12-05 11:47:47'),
(9, 227, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:49:05', '2023-12-05 11:54:45'),
(10, 53, 11, 20, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:56:53', '2023-12-05 11:56:53'),
(11, 54, 11, 15, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:57:24', '2023-12-05 11:57:24'),
(12, 228, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:57:50', '2023-12-05 11:57:50'),
(13, 55, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:58:07', '2023-12-05 11:58:07'),
(14, 40, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:58:27', '2023-12-05 11:58:27'),
(15, 44, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:59:05', '2023-12-05 11:59:05'),
(16, 37, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:59:19', '2023-12-05 11:59:19'),
(17, 80, 11, 30, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 11:59:50', '2023-12-05 15:14:38'),
(18, 81, 11, 10, '8 Nos received after exchanges with Pannga Pr (7 nos)', NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:01:10', '2023-12-06 11:19:15'),
(19, 56, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:01:34', '2023-12-05 12:01:34'),
(20, 72, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:03:16', '2023-12-05 12:03:16'),
(21, 71, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:03:37', '2023-12-05 12:03:37'),
(22, 64, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:03:56', '2023-12-05 12:03:56'),
(23, 107, 11, 20, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:04:40', '2023-12-05 12:04:40'),
(24, 108, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:05:22', '2023-12-05 12:05:22'),
(25, 109, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:05:44', '2023-12-05 12:05:44'),
(26, 94, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:06:01', '2023-12-05 12:06:01'),
(27, 98, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:06:53', '2023-12-05 12:06:53'),
(28, 91, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:07:16', '2023-12-05 12:07:16'),
(29, 214, 11, 2, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:07:46', '2023-12-05 12:07:46'),
(30, 215, 11, 2, 'exchanged with uriya books', NULL, NULL, '2023-12-05 00:00:00', '2023-12-05 12:09:34', '2023-12-06 12:42:41'),
(31, 225, 11, 20, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:13:27', '2023-12-05 12:13:27'),
(32, 221, 11, 20, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:13:45', '2023-12-05 12:13:45'),
(33, 222, 11, 20, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:13:54', '2023-12-05 12:13:54'),
(34, 25, 11, 5, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:15:47', '2023-12-05 12:15:47'),
(35, 223, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:16:19', '2023-12-05 12:16:19'),
(36, 224, 11, 10, NULL, NULL, NULL, '2023-12-05 00:00:00', '2023-12-05 12:16:32', '2023-12-05 12:16:32'),
(37, 265, 11, 2, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:16:55', '2023-12-05 12:16:55'),
(38, 270, 11, 1, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 12:17:30', '2023-12-05 12:17:30'),
(39, 82, 11, 10, NULL, NULL, NULL, '2023-12-03 00:00:00', '2023-12-05 15:15:24', '2023-12-05 15:15:24'),
(40, 259, 13, 5, 'For Anil', NULL, NULL, '2023-12-06 00:00:00', '2023-12-06 11:26:26', '2023-12-06 11:26:26'),
(41, 107, 15, 5, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:06:46', '2023-12-18 12:06:46'),
(42, 214, 14, 3, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:07:17', '2023-12-18 12:07:17'),
(43, 219, 14, 9, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:12:07', '2023-12-18 12:12:07'),
(44, 220, 14, 7, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:12:45', '2023-12-18 12:12:45'),
(45, 218, 14, 5, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:13:07', '2023-12-18 12:13:07'),
(46, 232, 14, 3, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:13:30', '2023-12-18 12:13:30'),
(47, 108, 14, 5, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:13:45', '2023-12-18 12:13:45'),
(48, 107, 14, 15, NULL, NULL, NULL, '2023-12-17 00:00:00', '2023-12-18 12:14:11', '2023-12-18 12:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vedic Literature', 1, '2023-10-28 11:07:53', '2023-10-28 11:07:53'),
(2, 'Children Book', 1, '2023-10-28 11:08:26', '2023-10-28 14:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  `volunteer_id` int DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_infos`
--

CREATE TABLE `event_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_infos`
--

INSERT INTO `event_infos` (`id`, `event_name`, `start_date`, `end_date`, `city`, `state`, `address1`, `address2`, `pin_code`, `leader_name`, `leader_contact_no`, `leader_alternate_no`, `place_contact_person`, `place_contact_no`, `place_alternate_no`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Books Distribution Service at Hanuman Temple', '2023-12-05 00:00:00', '2023-12-05 00:00:00', 'Bangalore', 'Karnataka', 'Hanuman Temple', NULL, NULL, 'Anil Kumar', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-05 16:05:12', '2023-12-05 16:05:12'),
(2, 'Books Distribution at Mariyama Temple, Marathalli', '2023-12-07 00:00:00', '2023-12-07 00:00:00', 'Bangalore', 'Karnataka', 'Mariyama Temple', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-08 07:17:48', '2023-12-08 07:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `InvoiceOld`
--

CREATE TABLE `InvoiceOld` (
  `Invoice_Id` int NOT NULL,
  `Invoice_Number` varchar(50) NOT NULL,
  `Total_Amount` decimal(10,0) NOT NULL,
  `Invoice_Date` date NOT NULL,
  `Invoice_Qty` int NOT NULL,
  `ShippingAddress` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `invoice_date` timestamp NULL DEFAULT NULL,
  `shipping_addres` varchar(255) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `total_qty` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remarks` tinytext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `invoice_date`, `shipping_addres`, `total_amount`, `total_qty`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(11, 'SIG-TG-2324-0580', '2023-12-03 00:00:00', 'Anil - Marathalli', 79190, 477, 1, NULL, '2023-12-05 08:29:03', '2023-12-05 08:29:03'),
(12, 'SIG-TG-2324-0552', '2023-12-03 00:00:00', 'Bharatha - Mahadevapura', 22390, 126, 1, NULL, '2023-12-05 08:39:19', '2023-12-05 08:39:19'),
(13, 'Oriya BG- 5 Nos', '2023-12-06 00:00:00', 'Anil - Marathalli', 1350, 5, 1, NULL, '2023-12-06 11:25:12', '2023-12-06 11:25:12'),
(14, 'Delivered_By_Srikant_Prabhu', '2023-12-17 00:00:00', 'Marahtalli Zone - Anil', 8160, 52, 1, NULL, '2023-12-18 12:04:41', '2023-12-18 12:04:49'),
(15, 'KAN_5_BG_BY_CHANDRASHEKHER_PR', '2023-12-17 00:00:00', 'Marahtalli Zone - Anil', 1350, 5, 1, 'Delivered by Chandrashekher Prabhu', '2023-12-18 12:05:48', '2023-12-18 12:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tamil', 1, '2023-10-28 11:09:16', '2023-10-28 11:09:16'),
(2, 'Malyalam', 1, '2023-10-28 11:09:35', '2023-10-28 11:09:35'),
(3, 'Marathi', 1, '2023-10-28 11:09:43', '2023-10-28 11:09:43'),
(4, 'Oriya', 1, '2023-10-28 11:09:59', '2023-10-28 14:33:05'),
(5, 'Kannada', 1, '2023-10-28 11:10:23', '2023-10-28 11:10:23'),
(6, 'Telgu', 1, '2023-10-28 11:10:36', '2023-10-28 11:10:36'),
(7, 'Hindi', 1, '2023-10-28 11:10:43', '2023-10-28 11:10:43'),
(8, 'English', 1, '2023-10-28 11:10:51', '2023-10-28 11:10:51'),
(9, 'Bengali', 1, '2023-11-22 09:31:24', '2023-11-22 09:31:24'),
(10, 'CB', 1, '2023-12-05 12:10:53', '2023-12-05 12:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anil842003@gmail.com', '$2y$10$8I6uZbZdeW6fUsPE/RfrU.0zlkWESWOYh4w1Z3Ihf0nAjL4RmC8M.', '2023-12-02 08:35:33'),
('srikanth.gottapu@gmail.com', '$2y$10$3w9JKgKa.hYnHlmojBgmX.uTQb.1D9e/8qpvHPLXmYRdbzmzu7rem', '2023-11-22 12:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'volunteer',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `type`, `remark`, `other1`, `other2`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Baliram', '2222', 'baliram@gmail.com', 'admin', NULL, NULL, NULL, NULL, '$2y$10$E28onP0jUm3bPsnNZBb1XeLRnK7OJp6.3P0nMYXlyJyrBgm.DQoxe', 'jOQiWrZZPju5iNoS1bKatxzr1bhtP9cHzxhJAkumedj9M47CUtCc8xNcWfD6', '2023-10-06 00:54:15', '2023-10-20 10:09:10'),
(10, 'Anil Kumar', '9871539248, 6360541806', 'anil842003@gmail.com', 'admin', NULL, NULL, NULL, NULL, '$2y$10$/im8uMPG3kERlGqkHjjM/OyxHOSnnowxGS0bE.fLQfdGmIzNWg9LW', 'ONI3M73wwjrIlObsaBQkVJ62Y52JOjZiJY5cszSJFdYBSlDTeANpkszRdjqV', '2023-10-18 00:54:36', '2023-12-02 08:37:04'),
(14, 'Central Admin', NULL, 'admin123@gmail.com', 'admin', NULL, NULL, NULL, NULL, '$2y$10$3vET592xPIae.WAtSTeCt.CrRSmYdlP5pA9wNrcSskUVgH/Qbv2Fa', 'MHyypA1LYoPqKw0LnIPDCMFw7ILKcnQj31X1cireKENO5aW9Wq7MoHg8TJs9', '2023-11-17 05:31:07', '2023-12-02 08:40:38'),
(15, 'Srikanth Gottapu', '9663365663', 'srikanth.gottapu@gmail.com', 'admin', NULL, NULL, NULL, NULL, '$2y$10$EWK5DoHFr6Sye3v5ViWKUusU6/DhOn0dj6qTr59AuF40sAAV1pCVC', NULL, '2023-11-22 11:36:23', '2023-11-22 12:15:22'),
(16, 'Vijay Rakesh', '8884266377', 'vr.bezawada@gmail.com', 'volunteer', NULL, NULL, NULL, NULL, '$2y$10$qSQBtJ7ndSGilsSNSb8afu1GW02/fq/rbW6WoAFSWpMJoziGzbWwm', 'qw8nBXEFsXgU2SMHBy8yXMsKzEwP80akOZRbEzR9mEnyrEdtZlx4dAEy0xkP', '2023-11-22 12:19:41', '2023-12-02 08:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_payments`
--

CREATE TABLE `volunteer_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `volunteer_id` int NOT NULL,
  `amount` int DEFAULT NULL,
  `is_approved` int DEFAULT '0',
  `payment_date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer_payments`
--

INSERT INTO `volunteer_payments` (`id`, `volunteer_id`, `amount`, `is_approved`, `payment_date`, `remarks`, `other1`, `other2`, `created_at`, `updated_at`) VALUES
(1, 10, 8000, 0, '2023-12-15 00:00:00', 'Paid online using Paytm scan. Shared screenshot to Pannaga Prabhu.', NULL, NULL, '2023-12-15 14:35:28', '2023-12-15 14:36:40'),
(2, 10, 5100, 0, '2023-12-16 00:00:00', 'Paid using paytm scan code.', NULL, NULL, '2023-12-18 08:55:57', '2023-12-18 08:55:57');

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
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_infos`
--
ALTER TABLE `event_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `InvoiceOld`
--
ALTER TABLE `InvoiceOld`
  ADD PRIMARY KEY (`Invoice_Id`),
  ADD UNIQUE KEY `Unique_Invoice_Number` (`Invoice_Number`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `book_returns`
--
ALTER TABLE `book_returns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_sells`
--
ALTER TABLE `book_sells`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `book_stocks`
--
ALTER TABLE `book_stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_infos`
--
ALTER TABLE `event_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `InvoiceOld`
--
ALTER TABLE `InvoiceOld`
  MODIFY `Invoice_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `volunteer_payments`
--
ALTER TABLE `volunteer_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
