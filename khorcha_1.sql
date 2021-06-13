-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 02:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khorcha_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `expences`
--

CREATE TABLE `expences` (
  `expence_id` bigint(20) UNSIGNED NOT NULL,
  `expence_cretegory_id` int(11) NOT NULL,
  `expence_details` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expence_amount` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expence_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expence_creator` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expence_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expence_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expences`
--

INSERT INTO `expences` (`expence_id`, `expence_cretegory_id`, `expence_details`, `expence_amount`, `expence_date`, `expence_creator`, `expence_slug`, `expence_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'salary', '555', '2021-01-15', 'Abu Bokkor', '1611939663salary', 0, '2021-01-29 17:01:03', '2021-02-04 10:06:24'),
(2, 2, 'Get Admission', '12000', '2021-01-28', 'Abu Bokkor', '1611945217get-admission', 1, '2021-01-29 17:18:27', '2021-01-29 18:33:37'),
(3, 1, 'Utility bill', '555', '2021-02-02', 'Nazmul Khan', '1612254855utility-bill', 1, '2021-02-02 08:34:15', NULL),
(4, 4, 'Buy t-Shirt', '300', '2021-02-01', 'Abu Bokkor', '1612274951buy-t-shirt', 1, '2021-02-02 14:09:11', '2021-02-04 09:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `expence_categories`
--

CREATE TABLE `expence_categories` (
  `expence_cretegory_id` bigint(20) UNSIGNED NOT NULL,
  `expence_cretegory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expence_cretegory_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expence_cretegory_creator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expence_cretegory_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expence_categories`
--

INSERT INTO `expence_categories` (`expence_cretegory_id`, `expence_cretegory_name`, `expence_cretegory_remark`, `expence_cretegory_creator`, `expence_cretegory_status`, `created_at`, `updated_at`) VALUES
(1, 'House Rent', 'nothing', 'Abu Bokkor', 1, '2021-01-29 16:12:37', NULL),
(2, 'Tution Fee', 'nothing', 'Abu Bokkor', 1, '2021-01-29 16:13:12', NULL),
(3, 'Admission', NULL, 'Abu Bokkor', 1, '2021-01-29 17:54:59', NULL),
(4, 'Shopping', NULL, 'Abu Bokkor', 1, '2021-02-02 14:08:20', NULL);

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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `income_id` bigint(20) UNSIGNED NOT NULL,
  `income_details` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_amount` int(11) DEFAULT NULL,
  `income_cate_id` int(11) DEFAULT NULL,
  `income_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_status` int(11) NOT NULL DEFAULT 1,
  `income_creator` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`income_id`, `income_details`, `income_amount`, `income_cate_id`, `income_date`, `income_slug`, `income_status`, `income_creator`, `created_at`, `updated_at`) VALUES
(1, 'Get Salary of December', 11000, 1, '2021-01-22', '1611944928-get-salary-of-december', 1, 'Abu Bokkor', '2021-01-29 14:29:43', '2021-01-29 18:28:48'),
(3, 'salary', 1000, 1, '2021-02-03', '1612337483-salary', 1, 'Abu Bokkor', '2021-02-03 07:31:23', '2021-02-04 14:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `inome_categories`
--

CREATE TABLE `inome_categories` (
  `income_cretegory_id` bigint(20) UNSIGNED NOT NULL,
  `income_cretegory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_cretegory_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_cretegory_creator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_cretegory_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inome_categories`
--

INSERT INTO `inome_categories` (`income_cretegory_id`, `income_cretegory_name`, `income_cretegory_remark`, `income_cretegory_creator`, `income_cretegory_status`, `created_at`, `updated_at`) VALUES
(1, 'Salary', 'nothing', 'Abu Bokkor', 1, '2021-01-29 14:01:56', NULL),
(2, 'House Rent', 'nothing', 'Abu Bokkor', 1, '2021-01-29 14:06:47', '2021-01-30 14:50:36'),
(3, 'Pocket Money', NULL, 'Abu Bokkor', 1, '2021-01-31 09:07:08', NULL);

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
(4, '2021_01_25_160704_create_incomes_table', 1),
(5, '2021_01_26_142439_create_expences_table', 1),
(6, '2021_01_26_230649_create_inome_categories_table', 1),
(7, '2021_01_26_230758_create_expence_categories_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1,
  `user_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `user_status`, `user_slug`, `user_phone`, `user_image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abu Bokkor', 'farhanbokkor@gmail.com', NULL, 1, '1611754677abu-bokkor', '01868362878', 'Profile_1611754677-1-jpg', '$2y$12$zREOcNI68.N2cFwHnioZ9.JnWlfe6yIaaz8BrouzCX7CdckL.FOXy', NULL, '2021-01-13 13:35:13', '2021-01-27 13:37:59'),
(2, 'Nazmul Khan', 'nazmul@gmail.com', NULL, 1, '1612174736nazmul-khan', '01758484364', 'Profile_1612174690-2-jpeg', '$2y$10$jtseP/wJ0MItVAfoKzkPrOw8SoRhsvlEtcy2foVAlruT0pXOB07hm', NULL, '2021-02-01 10:17:01', '2021-02-01 10:18:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expences`
--
ALTER TABLE `expences`
  ADD PRIMARY KEY (`expence_id`);

--
-- Indexes for table `expence_categories`
--
ALTER TABLE `expence_categories`
  ADD PRIMARY KEY (`expence_cretegory_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `inome_categories`
--
ALTER TABLE `inome_categories`
  ADD PRIMARY KEY (`income_cretegory_id`),
  ADD UNIQUE KEY `income_cretegory_name` (`income_cretegory_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `expences`
--
ALTER TABLE `expences`
  MODIFY `expence_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expence_categories`
--
ALTER TABLE `expence_categories`
  MODIFY `expence_cretegory_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `income_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inome_categories`
--
ALTER TABLE `inome_categories`
  MODIFY `income_cretegory_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
