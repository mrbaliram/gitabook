-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2023 at 06:40 AM
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
-- Database: `gitabook_4_dec_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Srila Prabhupada', 1, '2023-10-28 11:06:49', '2023-10-28 11:06:49'),
(2, 'None', 1, '2023-10-28 14:34:00', '2023-10-28 14:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(3, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '6950', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Journey Of Self Discovery (JOSD)', 1, '160', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:35:54'),
(8, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Raj Vidya (RV)', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Srimad Bhagavatam 1st canto (SB)', 1, '1000', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:57:19'),
(17, 'Perfect Question and Perfect Answer (PQPA)', 1, '50', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Life Come First Life (LCFL)', 1, '70', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'KROP', 1, '25', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-11-22 12:59:11'),
(25, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 8, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Bhagavad gita (Mac) - BG', 1, '350', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:19:02'),
(27, 'Krishna (hb)', 1, '300', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Beyond Birth and Death (BBD)', 1, '50', NULL, NULL, NULL, NULL, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Science Of Self Realization (SSR)', 1, '130', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:23:15'),
(30, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '6950', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Journey Of Self Discovery (JOSD)', 1, '95', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Raj Vidya (RV)', 1, '55', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:24:44'),
(38, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Easy Journey to Other Planet (EJOP)', 1, '50', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:24:10'),
(40, 'Second Chance (SC)', 1, '110', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:24:30'),
(41, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Srimad Bhagavatam 1st canto (SB)', 1, '799', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Perfect Question and Perfect Answer (PQPA)', 1, '60', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:25:47'),
(45, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Life Come First Life (LCFL)', 1, '90', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:56:16'),
(48, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 7, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Bhagavad gita (Mac) - BG', 1, '300', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:19:09'),
(54, 'Krishna (hb)', 1, '300', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Beyond Birth and Death (BBD)', 1, '40', NULL, NULL, NULL, NULL, 7, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:23:46'),
(56, 'Science Of Self Realization (SSR)', 1, '145', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:43:39'),
(57, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '6950', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
(70, 'Srimad Bhagavatam 1st canto (SB)', 1, '799', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Perfect Question and Perfect Answer (PQPA)', 1, '35', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:48:19'),
(72, 'Perfection Of Yoga (POY)', 1, '20', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:49:15'),
(73, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Life Come First Life (LCFL)', 1, '55', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:49:37'),
(75, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 6, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Bhagavad gita (Mac) - BG', 1, '300', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:31'),
(81, 'Krishna (hb)', 1, '300', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Beyond Birth and Death (BBD)', 1, '20', NULL, NULL, NULL, NULL, 6, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:45:01'),
(83, 'Science Of Self Realization (SSR)', 1, '195', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '6950', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Journey Of Self Discovery (JOSD)', 1, '95', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Raj Vidya (RV)', 1, '50', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:17:49'),
(92, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Second Chance (SC)', 1, '140', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:18:57'),
(95, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Srimad Bhagavatam 1st canto (SB)', 1, '699', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:56:50'),
(98, 'Perfect Question and Perfect Answer (PQPA)', 1, '80', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 09:16:57'),
(99, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Life Come First Life (LCFL)', 1, '110', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:56:00'),
(102, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 5, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Bhagavad gita (Mac) - BG', 1, '350', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:21'),
(108, 'Krishna (hb)', 1, '350', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:51:10'),
(109, 'Beyond Birth and Death (BBD)', 1, '45', NULL, NULL, NULL, NULL, 5, 1, 1, '0000-00-00 00:00:00', '2023-11-22 08:52:01'),
(110, 'Science Of Self Realization (SSR)', 1, '195', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '6950', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'Journey Of Self Discovery (JOSD)', 1, '95', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Raj Vidya (RV)', 1, '40', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Srimad Bhagavatam 1st canto (SB)', 1, '799', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'Perfect Question and Perfect Answer (PQPA)', 1, '50', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Life Come First Life (LCFL)', 1, '70', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 4, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Bhagavad gita (Mac) - BG', 1, '300', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:18:55'),
(135, 'Krishna (hb)', 1, '300', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'Beyond Birth and Death (BBD)', 1, '50', NULL, NULL, NULL, NULL, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'Science Of Self Realization (SSR)', 1, '195', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '6950', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Journey Of Self Discovery (JOSD)', 1, '95', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Raj Vidya (RV)', 1, '40', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'Srimad Bhagavatam 1st canto (SB)', 1, '799', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Perfect Question and Perfect Answer (PQPA)', 1, '50', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'Life Come First Life (LCFL)', 1, '70', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 3, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'Bhagavad gita (Mac) - BG', 1, '300', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:39'),
(162, 'Krishna (hb)', 1, '300', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Beyond Birth and Death (BBD)', 1, '50', NULL, NULL, NULL, NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Science Of Self Realization (SSR)', 1, '195', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '6950', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'Journey Of Self Discovery (JOSD)', 1, '95', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'Raj Vidya (RV)', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Srimad Bhagavatam 1st canto (SB)', 1, '799', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Perfect Question and Perfect Answer (PQPA)', 1, '50', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Life Come First Life (LCFL)', 1, '70', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Stories of Krishna (4 volumes)', 1, '1500', NULL, NULL, NULL, NULL, 2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Bhagavad gita (Mac) - BG', 1, '300', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:57'),
(189, 'Krishna (hb)', 1, '300', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Beyond Birth and Death (BBD)', 1, '50', NULL, NULL, NULL, NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'Science Of Self Realization (SSR)', 1, '195', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Srimad Bhagvatam set(18 vol) (SB)', 1, '6950', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'Chaitanya Charitamrita set (9 vol) (CC)', 1, '3800', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'What is the difficulty', 1, '1000', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'SP messanger of the Supreme Lord', 1, '200', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Journey Of Self Discovery (JOSD)', 1, '95', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Nector Of Devotion (NOD) (HB)', 1, '265', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Nector Of Instruction (NOI)', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Raj Vidya (RV)', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'Topmost Yoga System (TYS)', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Easy Journey to Other Planet (EJOP)', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Second Chance (SC)', 1, '100', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'On the Way To Krsna (OWTK)', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'Bhangavad Gita (Flexi Bound)', 1, '150', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'Srimad Bhagavatam 1st canto (SB)', 1, '799', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'Perfect Question and Perfect Answer (PQPA)', 1, '50', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'Perfection Of Yoga (POY)', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'Matchless Gift (MG)', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'Life Come First Life (LCFL)', 1, '70', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Introduction to Bhagavad Gita (IBG)', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'MOG', 1, '40', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'C&T', 1, '30', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'KROP', 1, '20', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Bhagavad gita (Mac) - BG', 1, '300', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '2023-11-28 18:17:47'),
(215, 'Krishna (hb)', 1, '300', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Beyond Birth and Death (BBD)', 1, '50', NULL, NULL, NULL, NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Bhagavad Gita (Regular) BG', 1, '300', NULL, NULL, NULL, NULL, 9, 1, 1, '2023-11-22 09:32:15', '2023-11-22 09:32:15'),
(218, 'Dhruva', 1, '60', NULL, NULL, NULL, NULL, 8, 2, 2, '2023-11-22 09:33:33', '2023-11-22 09:33:33'),
(219, 'Gajendra', 1, '60', NULL, NULL, NULL, NULL, 8, 2, 2, '2023-11-22 09:33:54', '2023-11-22 09:33:54'),
(220, 'Govardhana', 1, '60', NULL, NULL, NULL, NULL, 8, 2, 2, '2023-11-22 09:34:21', '2023-11-22 09:34:21'),
(221, 'Govinda Krishna', 1, '60', NULL, NULL, NULL, NULL, 8, 2, 2, '2023-11-22 09:34:43', '2023-11-22 09:34:43'),
(222, 'Krishna Lila', 1, '60', NULL, NULL, NULL, NULL, 8, 2, 2, '2023-11-22 09:35:08', '2023-11-22 09:35:08'),
(223, 'Lord Krishna Advent & Pastimes', 1, '190', NULL, NULL, NULL, NULL, 8, 2, 2, '2023-11-22 09:35:53', '2023-11-22 09:35:53'),
(224, 'Lord Krishna Dwaraka-Lila', 1, '190', NULL, NULL, NULL, NULL, 8, 2, 2, '2023-11-22 09:36:27', '2023-11-22 09:36:27'),
(225, 'Gokulananda', 1, '60', NULL, NULL, NULL, NULL, 8, 2, 2, '2023-11-22 09:38:37', '2023-11-22 09:38:37'),
(226, 'Easy Journey to Other Planet (EJOP)', 1, '45', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-11-22 12:52:02', '2023-11-29 09:41:40'),
(227, 'Raj Vidya - RV', 1, '60', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-11-22 12:55:01', '2023-12-01 15:43:07'),
(228, 'Science of Self Realization -(SSR)', 1, '220', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-11-22 12:57:17', '2023-12-01 15:42:12'),
(229, 'Perfection Of Yoga - POY', 1, '35', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-11-22 13:00:46', '2023-12-01 15:42:59'),
(230, 'Introduction to Bhagavad Gita - IBG', 1, '35', NULL, NULL, NULL, NULL, 7, 1, 1, '2023-11-22 13:04:00', '2023-12-01 15:42:01'),
(231, 'Introduction to Bhagavad Gita (IBG)', 1, '35', NULL, NULL, NULL, NULL, 8, 1, 1, '2023-11-22 16:25:08', '2023-12-01 15:41:53'),
(232, 'Science Of Self Realization (SSR)', 1, '230', NULL, NULL, NULL, NULL, 5, 1, 1, '2023-11-22 16:38:05', '2023-12-01 15:41:29');

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
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_issues`
--

INSERT INTO `book_issues` (`id`, `book_id`, `volunteer_id`, `issued_quantity`, `issued_date`, `remarks`, `other1`, `other2`, `created_at`, `updated_at`) VALUES
(25, 16, 10, 3, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:54:10', '2023-11-22 16:54:10'),
(26, 229, 10, 2, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:55:35', '2023-11-22 16:55:35'),
(27, 24, 10, 5, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:55:56', '2023-11-22 16:55:56'),
(28, 227, 10, 5, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:56:11', '2023-11-22 16:56:11'),
(29, 231, 10, 5, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:56:23', '2023-11-22 16:56:23'),
(31, 226, 10, 5, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:56:54', '2023-11-22 16:56:54'),
(32, 1, 10, 15, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:57:08', '2023-11-22 16:57:08'),
(33, 27, 10, 15, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:57:38', '2023-11-22 16:57:38'),
(34, 26, 10, 55, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:58:15', '2023-11-22 16:58:15'),
(35, 18, 10, 18, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:58:57', '2023-11-22 16:58:57'),
(36, 10, 10, 5, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:59:14', '2023-11-22 16:59:14'),
(37, 17, 10, 3, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 16:59:34', '2023-11-22 16:59:34'),
(38, 7, 10, 2, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:01:11', '2023-11-22 17:01:11'),
(39, 12, 10, 3, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:01:25', '2023-11-22 17:01:25'),
(40, 28, 10, 5, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:01:41', '2023-11-22 17:01:41'),
(41, 220, 10, 20, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:01:54', '2023-11-22 17:01:54'),
(42, 219, 10, 15, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:02:09', '2023-11-22 17:02:09'),
(43, 218, 10, 15, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:02:22', '2023-11-22 17:02:22'),
(44, 224, 10, 20, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:02:46', '2023-11-22 17:02:46'),
(45, 223, 10, 20, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:02:59', '2023-11-22 17:02:59'),
(46, 221, 10, 30, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:03:13', '2023-11-22 17:03:13'),
(47, 225, 10, 30, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:03:27', '2023-11-22 17:03:27'),
(48, 222, 10, 30, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:03:41', '2023-11-22 17:03:41'),
(50, 25, 10, 11, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:04:52', '2023-11-22 17:04:52'),
(51, 40, 10, 8, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:09:50', '2023-11-22 17:09:50'),
(52, 230, 10, 5, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:10:14', '2023-11-22 17:10:14'),
(53, 47, 10, 6, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:10:30', '2023-11-22 17:10:30'),
(54, 228, 10, 3, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:10:50', '2023-11-22 17:10:50'),
(55, 53, 10, 25, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:11:03', '2023-11-22 17:11:03'),
(56, 48, 10, 5, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-22 17:11:28', '2023-11-22 17:11:28'),
(57, 13, 10, 17, '2023-11-24 00:00:00', NULL, NULL, NULL, '2023-11-24 05:29:04', '2023-11-24 05:29:04'),
(58, 29, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:40:46', '2023-11-28 12:40:46'),
(59, 37, 10, 5, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:41:12', '2023-11-28 12:41:12'),
(60, 39, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:41:36', '2023-11-28 12:41:36'),
(61, 44, 10, 6, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:42:07', '2023-11-28 12:42:07'),
(62, 54, 10, 5, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:42:35', '2023-11-28 12:42:35'),
(63, 55, 10, 5, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:43:21', '2023-11-28 12:43:21'),
(64, 56, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:44:01', '2023-11-28 12:44:01'),
(65, 64, 10, 5, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:44:43', '2023-11-28 12:44:43'),
(66, 66, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:45:13', '2023-11-28 12:45:13'),
(67, 71, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:46:08', '2023-11-28 12:46:08'),
(68, 72, 10, 7, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:46:21', '2023-11-28 12:46:21'),
(69, 74, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:46:46', '2023-11-28 12:46:46'),
(70, 75, 10, 5, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:47:07', '2023-11-28 12:47:07'),
(71, 80, 10, 10, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:47:41', '2023-11-28 12:47:41'),
(72, 81, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:48:05', '2023-11-28 12:48:05'),
(73, 82, 10, 5, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 12:48:34', '2023-11-28 12:48:34'),
(74, 93, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 13:00:07', '2023-11-28 13:00:07'),
(75, 91, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 13:02:59', '2023-11-28 13:02:59'),
(76, 94, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 13:03:27', '2023-11-28 13:03:27'),
(77, 97, 10, 1, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 13:03:50', '2023-11-28 13:03:50'),
(78, 98, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 13:04:18', '2023-11-28 13:04:18'),
(79, 99, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 13:04:48', '2023-11-28 13:04:48'),
(80, 101, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 13:05:11', '2023-11-28 13:05:11'),
(81, 107, 10, 25, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 13:06:34', '2023-11-28 13:06:34'),
(82, 232, 10, 2, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 14:13:00', '2023-11-28 14:13:00'),
(83, 108, 10, 5, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 14:15:28', '2023-11-28 14:15:28'),
(84, 109, 10, 3, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 14:15:54', '2023-11-28 14:15:54'),
(85, 161, 10, 2, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 14:18:02', '2023-11-28 14:18:02'),
(86, 134, 10, 7, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 14:19:15', '2023-11-28 14:19:15'),
(87, 217, 10, 1, '2023-11-28 00:00:00', NULL, NULL, NULL, '2023-11-28 14:20:01', '2023-11-28 14:20:01'),
(88, 28, 10, 2, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-01 15:20:50', '2023-12-01 15:20:50'),
(89, 28, 10, 2, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-01 15:21:04', '2023-12-01 15:21:04'),
(90, 28, 10, 2, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-01 15:21:12', '2023-12-01 15:21:12'),
(91, 23, 10, 2, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-01 15:26:48', '2023-12-01 15:26:48'),
(92, 23, 10, 5, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-01 15:28:03', '2023-12-01 15:28:03'),
(93, 28, 10, 7, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-01 15:29:04', '2023-12-01 15:29:04'),
(94, 23, 10, 5, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-01 15:29:23', '2023-12-01 15:29:23'),
(95, 217, 10, 1, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-01 15:29:45', '2023-12-01 15:29:45'),
(96, 226, 10, 3, '2023-12-02 00:00:00', NULL, NULL, NULL, '2023-12-02 08:19:16', '2023-12-02 08:19:16'),
(97, 28, 10, 4, '2023-12-02 00:00:00', NULL, NULL, NULL, '2023-12-02 08:19:25', '2023-12-02 08:19:25'),
(98, 26, 15, 5, '2023-12-02 00:00:00', NULL, NULL, NULL, '2023-12-02 08:19:43', '2023-12-02 08:19:43'),
(99, 217, 15, 2, '2023-12-02 00:00:00', NULL, NULL, NULL, '2023-12-02 08:19:53', '2023-12-02 08:19:53'),
(100, 28, 15, 3, '2023-12-01 00:00:00', NULL, NULL, NULL, '2023-12-02 08:20:46', '2023-12-02 08:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `book_returns`
--

CREATE TABLE `book_returns` (
  `id` bigint UNSIGNED NOT NULL,
  `book_id` int NOT NULL,
  `volunteer_id` int NOT NULL,
  `returned_quantity` int NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returned_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_returns`
--

INSERT INTO `book_returns` (`id`, `book_id`, `volunteer_id`, `returned_quantity`, `remarks`, `other1`, `other2`, `returned_date`, `created_at`, `updated_at`) VALUES
(8, 26, 10, 10, 'Non-Macmillan edition of English BG returned.', NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 12:27:57', '2023-11-28 12:27:57'),
(9, 25, 10, 5, 'Taken by Rakesh Prabhu', NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:03:54', '2023-11-28 15:03:54'),
(10, 26, 10, 20, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:08:52', '2023-11-28 15:08:52'),
(11, 218, 10, 9, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:09:46', '2023-11-28 15:09:46'),
(12, 224, 10, 5, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:10:25', '2023-11-30 04:51:47'),
(13, 219, 10, 7, 'Taken by Rakesh Prabhu', NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:14:01', '2023-11-28 15:14:01'),
(14, 225, 10, 12, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:14:51', '2023-11-28 15:14:51'),
(15, 220, 10, 6, 'Taken by Rakesh Prabhu', NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:15:26', '2023-11-28 15:15:26'),
(16, 27, 10, 2, 'Taken by Rakesh Prabhu', NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:16:01', '2023-11-28 15:16:01'),
(17, 222, 10, 9, 'Taken by Rakesh Prabhu', NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:16:42', '2023-11-28 15:16:42'),
(18, 13, 10, 4, 'Taken by Rakesh Prabhu', NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:17:18', '2023-11-28 15:17:18'),
(19, 53, 10, 10, 'Taken by Rakesh Prabhu', NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 15:18:05', '2023-11-28 15:18:05'),
(20, 223, 10, 6, 'For adjustment to Rakesh Prabhu', NULL, NULL, '2023-11-30 00:00:00', '2023-11-30 04:46:51', '2023-11-30 04:46:51'),
(21, 16, 10, 3, NULL, NULL, NULL, '2023-12-02 00:00:00', '2023-12-02 16:30:56', '2023-12-02 16:30:56');

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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soled_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_sells`
--

INSERT INTO `book_sells` (`id`, `book_id`, `volunteer_id`, `soled_quantity`, `price`, `soled_price`, `name`, `phone`, `address`, `remarks`, `other1`, `other2`, `soled_date`, `created_at`, `updated_at`) VALUES
(13, 25, 10, 4, 6000, 6000, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:12:31', '2023-11-28 17:12:31'),
(14, 223, 10, 9, 1710, 1710, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:14:30', '2023-11-28 17:14:30'),
(15, 28, 10, 4, 200, 200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:17:13', '2023-11-28 17:17:13'),
(17, 218, 10, 3, 180, 180, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:20:48', '2023-11-28 17:20:48'),
(18, 218, 10, 1, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:21:19', '2023-11-28 17:21:19'),
(19, 224, 10, 3, 570, 570, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:22:04', '2023-11-28 17:22:04'),
(20, 226, 10, 1, 45, 45, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:22:39', '2023-11-28 17:22:39'),
(21, 219, 10, 5, 300, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:23:08', '2023-11-28 17:23:08'),
(22, 225, 10, 16, 960, 960, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:23:52', '2023-11-28 17:23:52'),
(23, 220, 10, 7, 420, 420, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:33:38', '2023-11-28 17:33:38'),
(24, 221, 10, 13, 780, 780, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:34:08', '2023-11-28 17:34:08'),
(25, 24, 10, 1, 25, 25, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:34:41', '2023-11-28 17:34:41'),
(26, 222, 10, 16, 960, 960, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:35:31', '2023-11-28 17:35:31'),
(27, 18, 10, 5, 150, 150, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:36:20', '2023-11-28 17:36:20'),
(28, 10, 10, 4, 160, 160, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:37:12', '2023-11-28 17:37:12'),
(29, 13, 10, 8, 800, 800, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:37:37', '2023-11-28 17:37:37'),
(30, 1, 10, 8, 1560, 1560, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:38:01', '2023-11-28 17:38:01'),
(31, 55, 10, 2, 80, 80, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:39:18', '2023-11-28 17:39:18'),
(32, 53, 10, 13, 3900, 3900, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:41:26', '2023-11-28 17:41:54'),
(33, 39, 10, 3, 150, 150, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:42:26', '2023-11-28 17:42:26'),
(35, 54, 10, 1, 300, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:45:21', '2023-11-28 17:45:21'),
(36, 230, 10, 3, 105, 105, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:47:21', '2023-11-28 17:47:21'),
(37, 47, 10, 3, 270, 270, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:50:36', '2023-11-28 17:50:36'),
(38, 37, 10, 3, 165, 165, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:52:17', '2023-11-28 17:52:17'),
(39, 29, 10, 3, 390, 390, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:53:10', '2023-11-28 17:53:10'),
(40, 107, 10, 20, 7000, 7000, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:57:24', '2023-11-28 17:57:24'),
(41, 108, 10, 2, 700, 700, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 17:58:56', '2023-11-28 17:58:56'),
(42, 99, 10, 1, 30, 30, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 18:00:08', '2023-11-28 18:00:08'),
(43, 134, 10, 3, 900, 900, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 18:01:48', '2023-11-28 18:01:48'),
(44, 80, 10, 4, 1200, 1200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 18:02:32', '2023-11-28 18:02:32'),
(45, 81, 10, 1, 300, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 18:03:07', '2023-11-28 18:03:07'),
(46, 82, 10, 1, 20, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 18:03:41', '2023-11-28 18:03:41'),
(47, 64, 10, 1, 35, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 18:04:11', '2023-11-28 18:04:11'),
(48, 75, 10, 2, 60, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 18:05:32', '2023-11-28 18:05:32'),
(49, 71, 10, 1, 35, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 00:00:00', '2023-11-28 18:06:18', '2023-11-28 18:06:18'),
(50, 107, 10, 2, 700, 700, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 00:00:00', '2023-11-29 08:25:42', '2023-11-29 08:25:42'),
(51, 56, 10, 1, 145, 145, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 00:00:00', '2023-11-29 09:19:53', '2023-11-29 09:19:53'),
(52, 228, 10, 1, 220, 220, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 00:00:00', '2023-11-29 09:24:35', '2023-11-29 09:24:35'),
(53, 44, 10, 2, 120, 120, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 00:00:00', '2023-11-29 09:27:06', '2023-11-29 09:27:06'),
(54, 40, 10, 3, 330, 330, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 00:00:00', '2023-11-29 09:29:09', '2023-11-29 09:29:09'),
(55, 54, 10, 1, 300, 300, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 00:00:00', '2023-11-29 09:32:06', '2023-11-29 09:32:06'),
(56, 26, 10, 6, 2100, 2100, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 00:00:00', '2023-11-29 09:37:22', '2023-11-29 09:37:22'),
(57, 27, 10, 7, 2100, 2100, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-29 00:00:00', '2023-11-29 13:16:54', '2023-11-29 13:16:54'),
(58, 229, 10, 1, 35, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-02 00:00:00', '2023-12-02 16:33:35', '2023-12-02 16:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `book_stocks`
--

CREATE TABLE `book_stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `book_id` int NOT NULL,
  `invoice_id` int DEFAULT NULL,
  `received_quantity` int NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_stocks`
--

INSERT INTO `book_stocks` (`id`, `book_id`, `invoice_id`, `received_quantity`, `remarks`, `other1`, `other2`, `received_date`, `created_at`, `updated_at`) VALUES
(34, 26, 1, 15, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:32:41', '2023-11-22 08:32:41'),
(35, 27, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:33:00', '2023-11-22 08:33:00'),
(36, 1, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:33:18', '2023-11-22 08:33:18'),
(37, 28, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:33:40', '2023-11-22 08:33:40'),
(38, 12, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:34:04', '2023-11-22 08:34:04'),
(39, 13, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:34:39', '2023-11-22 08:34:39'),
(40, 7, 1, 2, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:35:05', '2023-11-22 08:35:05'),
(41, 17, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:36:28', '2023-11-22 08:36:28'),
(42, 25, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:36:56', '2023-11-22 08:36:56'),
(43, 10, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:37:24', '2023-11-22 08:37:24'),
(44, 18, 1, 18, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:38:17', '2023-11-22 08:38:17'),
(45, 80, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:38:52', '2023-11-22 08:38:52'),
(46, 81, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:42:28', '2023-11-22 08:42:28'),
(47, 56, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:43:02', '2023-11-22 08:43:02'),
(48, 82, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:44:30', '2023-11-22 08:44:30'),
(49, 66, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:45:29', '2023-11-22 08:45:29'),
(50, 64, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 08:45:46', '2023-11-22 08:45:46'),
(51, 72, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:02:59', '2023-11-22 09:02:59'),
(52, 74, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:04:31', '2023-11-22 09:04:31'),
(53, 75, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:07:43', '2023-11-22 09:07:43'),
(54, 71, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:08:01', '2023-11-22 09:08:01'),
(55, 107, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:09:19', '2023-11-22 09:09:19'),
(56, 108, 1, 2, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:10:35', '2023-11-22 09:10:35'),
(57, 109, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:11:44', '2023-11-22 09:11:44'),
(58, 93, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:11:58', '2023-11-22 09:51:22'),
(59, 94, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:12:18', '2023-11-22 09:12:18'),
(60, 91, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:12:49', '2023-11-22 09:12:49'),
(61, 99, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:13:07', '2023-11-22 09:13:07'),
(62, 101, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:13:27', '2023-11-22 09:13:27'),
(63, 98, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:13:47', '2023-11-22 09:13:47'),
(64, 97, 1, 1, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:14:09', '2023-11-22 09:14:09'),
(65, 53, 1, 20, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:26:20', '2023-11-22 09:26:20'),
(66, 54, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:26:40', '2023-11-22 09:26:40'),
(67, 29, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:26:58', '2023-11-22 09:26:58'),
(68, 55, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:27:22', '2023-11-22 09:27:22'),
(69, 39, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:27:41', '2023-11-22 09:27:41'),
(70, 40, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:27:59', '2023-11-22 09:27:59'),
(71, 37, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:28:22', '2023-11-22 09:28:22'),
(72, 47, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:28:57', '2023-11-22 09:28:57'),
(73, 48, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:29:14', '2023-11-22 09:29:14'),
(74, 44, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:29:29', '2023-11-22 09:29:29'),
(75, 134, 1, 3, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:30:41', '2023-11-22 09:30:41'),
(76, 217, 1, 1, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:32:40', '2023-11-22 09:32:40'),
(77, 161, 1, 2, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:33:00', '2023-11-22 09:33:00'),
(78, 219, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:37:05', '2023-11-22 09:37:05'),
(79, 220, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:37:32', '2023-11-22 09:37:32'),
(80, 225, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:38:53', '2023-11-22 09:38:53'),
(81, 221, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:39:15', '2023-11-22 09:39:15'),
(82, 222, 1, 10, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:39:34', '2023-11-22 09:39:34'),
(83, 218, 1, 5, 'PSIG/2324/00099', NULL, NULL, '2023-04-29 18:32:41', '2023-11-22 09:43:01', '2023-11-22 09:43:01'),
(84, 26, 2, 40, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:16:43', '2023-11-22 11:16:43'),
(85, 27, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:18:14', '2023-11-22 11:18:14'),
(86, 1, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:19:02', '2023-11-22 11:19:02'),
(87, 226, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:19:58', '2023-11-22 12:53:05'),
(88, 13, 2, 7, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:20:30', '2023-11-22 11:20:30'),
(89, 231, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:20:56', '2023-11-22 16:25:41'),
(90, 227, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:21:19', '2023-11-22 12:56:01'),
(91, 24, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:22:03', '2023-11-22 11:22:03'),
(92, 229, 2, 2, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:22:32', '2023-11-22 13:01:30'),
(93, 25, 2, 8, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:23:05', '2023-11-22 11:23:05'),
(94, 16, 2, 3, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:23:57', '2023-11-22 11:23:57'),
(95, 53, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:24:32', '2023-11-22 11:24:32'),
(96, 228, 2, 3, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:25:00', '2023-11-22 12:57:49'),
(98, 47, 2, 3, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:25:55', '2023-11-22 16:35:07'),
(99, 230, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:26:37', '2023-11-22 13:04:44'),
(100, 44, 2, 3, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:27:03', '2023-11-22 11:27:03'),
(101, 107, 2, 15, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:27:51', '2023-11-22 11:27:51'),
(102, 108, 2, 3, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:28:26', '2023-11-22 11:28:26'),
(103, 232, 2, 2, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:29:02', '2023-11-22 16:38:39'),
(104, 72, 2, 2, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:29:26', '2023-11-22 11:29:26'),
(105, 134, 2, 4, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:30:04', '2023-11-22 11:30:04'),
(106, 222, 2, 20, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:30:40', '2023-11-22 11:30:40'),
(107, 225, 2, 20, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:31:01', '2023-11-22 11:31:01'),
(108, 221, 2, 20, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:31:22', '2023-11-22 11:31:22'),
(109, 223, 2, 20, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:31:45', '2023-11-22 11:31:45'),
(110, 224, 2, 20, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:32:07', '2023-11-22 11:32:07'),
(111, 218, 2, 10, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:32:34', '2023-11-22 11:32:34'),
(112, 219, 2, 10, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:32:56', '2023-11-22 11:32:56'),
(113, 220, 2, 10, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 11:33:24', '2023-11-22 11:33:24'),
(114, 40, 2, 5, 'SIG-TG-2324-0371', NULL, NULL, '2023-10-13 00:00:00', '2023-11-22 16:48:31', '2023-11-22 16:48:31'),
(115, 217, 2, 11, NULL, NULL, NULL, '2023-12-01 00:00:00', '2023-12-01 12:56:14', '2023-12-01 12:56:14'),
(116, 23, 1, 22, NULL, NULL, NULL, '2023-12-01 00:00:00', '2023-12-01 13:00:08', '2023-12-01 13:00:08'),
(117, 28, 2, 10, NULL, NULL, NULL, '2023-12-01 00:00:00', '2023-12-01 13:59:36', '2023-12-01 13:59:36'),
(118, 150, 2, 334, NULL, NULL, NULL, '2023-12-01 00:00:00', '2023-12-01 14:00:32', '2023-12-01 14:00:32'),
(119, 28, 10, 50, NULL, NULL, NULL, '2023-12-01 00:00:00', '2023-12-01 15:34:09', '2023-12-01 15:34:09'),
(120, 26, 10, 150, NULL, NULL, NULL, '2023-12-01 00:00:00', '2023-12-01 15:34:33', '2023-12-01 15:34:33'),
(121, 23, 10, 100, NULL, NULL, NULL, '2023-12-02 00:00:00', '2023-12-02 08:16:53', '2023-12-02 08:16:53'),
(122, 4, 10, 10, NULL, NULL, NULL, '2023-12-02 00:00:00', '2023-12-02 08:17:09', '2023-12-02 08:17:09'),
(123, 226, 10, 10, NULL, NULL, NULL, '2023-12-02 00:00:00', '2023-12-02 08:17:20', '2023-12-02 08:17:20'),
(124, 219, 10, 10, NULL, NULL, NULL, '2023-12-02 00:00:00', '2023-12-02 08:18:28', '2023-12-02 08:18:28'),
(125, 225, 10, 10, NULL, NULL, NULL, '2023-12-02 00:00:00', '2023-12-02 08:18:32', '2023-12-02 08:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  `volunteer_id` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_infos`
--

CREATE TABLE `event_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `event_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_alternate_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_contact_person` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_alternate_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_infos`
--

INSERT INTO `event_infos` (`id`, `event_name`, `start_date`, `end_date`, `city`, `state`, `address1`, `address2`, `pin_code`, `leader_name`, `leader_contact_no`, `leader_alternate_no`, `place_contact_person`, `place_contact_no`, `place_alternate_no`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'GGMD at Pannaga Prabhu\'s House', '2023-11-01 00:00:00', '2023-11-01 00:00:00', 'Bangalore', 'Karnataka', 'HAL Township', 'HAL Police satiation', '560037', 'Pannaga Shayana Dasa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-01 11:17:44', '2023-11-02 18:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'PSIG/2324/00099', '2023-04-29 18:00:28', 'Anil-Marathalli Zone', 43129, 274, 1, 'Received directly from temple.', '2023-11-28 07:30:08', '2023-11-28 07:30:08'),
(2, 'SIG-TG-2324-0371', '2023-10-13 12:54:28', 'Anil-Marathalli Zone', 57405, 270, 1, NULL, '2023-11-28 07:30:08', '2023-11-28 07:30:08'),
(10, 'TEST_01_12_DEC', '2023-12-01 00:00:00', 'HAL ZONE', 500000, 3000, 1, NULL, '2023-12-01 15:32:49', '2023-12-01 15:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, 'Bengali', 1, '2023-11-22 09:31:24', '2023-11-22 09:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'volunteer',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `type`, `remark`, `other1`, `other2`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Baliram', '2222', 'baliram@gmail.com', 'admin', NULL, NULL, NULL, NULL, '$2y$10$E28onP0jUm3bPsnNZBb1XeLRnK7OJp6.3P0nMYXlyJyrBgm.DQoxe', 'jOQiWrZZPju5iNoS1bKatxzr1bhtP9cHzxhJAkumedj9M47CUtCc8xNcWfD6', '2023-10-06 00:54:15', '2023-10-20 10:09:10'),
(10, 'Anil Kumar', '9871539248, 6360541806', 'anil842003@gmail.com', 'admin', NULL, NULL, NULL, NULL, '$2y$10$/im8uMPG3kERlGqkHjjM/OyxHOSnnowxGS0bE.fLQfdGmIzNWg9LW', 'KgbX2Tm9kDJmIlpqkk5rJOj6i6a8CbuCxeLSsc9KK4hAAXc49QC5GgkCwWZk', '2023-10-18 00:54:36', '2023-12-02 08:37:04'),
(14, 'Central Admin', NULL, 'admin123@gmail.com', 'admin', NULL, NULL, NULL, NULL, '$2y$10$3vET592xPIae.WAtSTeCt.CrRSmYdlP5pA9wNrcSskUVgH/Qbv2Fa', NULL, '2023-11-17 05:31:07', '2023-12-02 08:40:38'),
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
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer_payments`
--

INSERT INTO `volunteer_payments` (`id`, `volunteer_id`, `amount`, `is_approved`, `payment_date`, `remarks`, `other1`, `other2`, `created_at`, `updated_at`) VALUES
(6, 10, 4965, 0, '2023-05-01 00:00:00', 'Undated payments', NULL, NULL, '2023-11-28 12:12:05', '2023-11-28 12:12:05'),
(7, 10, 2000, 0, '2023-06-29 00:00:00', NULL, NULL, NULL, '2023-11-28 12:12:32', '2023-11-28 12:12:32'),
(8, 10, 350, 0, '2023-06-29 00:00:00', NULL, NULL, NULL, '2023-11-28 12:13:10', '2023-11-28 12:13:10'),
(9, 10, 500, 0, '2023-07-29 00:00:00', NULL, NULL, NULL, '2023-11-28 12:13:35', '2023-11-28 12:13:35'),
(10, 10, 1000, 0, '2023-08-27 00:00:00', NULL, NULL, NULL, '2023-11-28 12:13:58', '2023-11-28 12:13:58'),
(11, 10, 4000, 0, '2023-09-11 00:00:00', NULL, NULL, NULL, '2023-11-28 12:14:26', '2023-11-28 12:14:26'),
(12, 10, 6880, 0, '2023-10-04 00:00:00', NULL, NULL, NULL, '2023-11-28 12:15:15', '2023-11-28 12:15:15'),
(13, 10, 2000, 0, '2023-10-08 00:00:00', NULL, NULL, NULL, '2023-11-28 12:15:46', '2023-11-28 12:15:46'),
(14, 10, 565, 0, '2023-10-10 00:00:00', 'Books taken by Pannaga Prabhu', NULL, NULL, '2023-11-28 12:16:43', '2023-11-28 12:16:43'),
(15, 10, 1255, 0, '2023-10-16 00:00:00', NULL, NULL, NULL, '2023-11-28 12:17:24', '2023-11-28 12:17:24'),
(17, 10, 3500, 0, '2023-11-05 00:00:00', '10 Kannada BG (Given to Pannaga Prabhu)', NULL, NULL, '2023-11-28 12:18:51', '2023-11-28 12:18:51'),
(18, 10, 750, 0, '2023-10-15 00:00:00', NULL, NULL, NULL, '2023-11-28 12:19:13', '2023-11-28 12:19:13'),
(19, 10, 750, 0, '2023-11-09 00:00:00', NULL, NULL, NULL, '2023-11-28 12:19:37', '2023-11-28 12:19:37'),
(20, 10, 1500, 0, '2023-11-15 00:00:00', NULL, NULL, NULL, '2023-11-28 12:20:01', '2023-11-28 12:20:01'),
(21, 10, 1500, 0, '2023-11-22 00:00:00', NULL, NULL, NULL, '2023-11-28 12:20:26', '2023-11-28 12:20:26'),
(22, 10, 385, 0, '2023-11-25 00:00:00', NULL, NULL, NULL, '2023-11-28 12:20:54', '2023-11-28 12:20:54'),
(23, 10, 2810, 0, '2023-11-26 00:00:00', NULL, NULL, NULL, '2023-11-28 12:21:30', '2023-11-28 12:21:30'),
(24, 10, 3550, 0, '2023-11-29 00:00:00', 'Online', NULL, NULL, '2023-11-29 17:05:50', '2023-11-29 17:05:50'),
(25, 10, 50, 0, '2023-11-29 00:00:00', 'online', NULL, NULL, '2023-11-29 17:06:05', '2023-11-29 17:06:05');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `book_returns`
--
ALTER TABLE `book_returns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `book_sells`
--
ALTER TABLE `book_sells`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `book_stocks`
--
ALTER TABLE `book_stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
