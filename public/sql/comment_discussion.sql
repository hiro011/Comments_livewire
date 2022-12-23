-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 10:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment_discussion`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `image`, `user_id`, `support_ticket_id`, `created_at`, `updated_at`) VALUES
(1, 'hello', NULL, 1, 1, '2022-10-22 10:30:31', '2022-10-22 10:30:31'),
(2, 'second', 'A1fopiCEzyclJDUx.jpg', 1, 1, '2022-10-22 10:31:07', '2022-10-22 10:31:07'),
(3, 'third', NULL, 1, 1, '2022-10-24 10:22:05', '2022-10-24 10:22:05'),
(4, 'hi', NULL, 1, 2, '2022-10-24 10:25:47', '2022-10-24 10:25:47'),
(5, 'second ticket', NULL, 1, 2, '2022-10-24 10:37:00', '2022-10-24 10:37:00'),
(6, 'shoes osrs', 'CCu2ab5duPKiCWx4.jpg', 1, 2, '2022-10-24 10:37:18', '2022-10-24 10:37:18'),
(7, 'midoria wallpaper', 'KJs0W0R8PIXnc9xj.jpg', 1, 2, '2022-12-04 00:18:15', '2022-12-04 00:18:15'),
(8, 'hello', NULL, 1, 2, '2022-12-04 00:18:47', '2022-12-04 00:18:47'),
(9, 'minecraft art', 'REMxnMe5Qr5GPT3e.jpg', 1, 1, '2022-12-04 00:22:53', '2022-12-04 00:22:53'),
(11, 'refdcrd', 'K8pzPrTJvi6PfJzX.jpg', 1, 2, '2022-12-10 23:27:40', '2022-12-10 23:27:40'),
(12, 'work hard', '18M8Wr84CIBcBpIx.jpg', 15, 1, '2022-12-16 01:53:35', '2022-12-16 01:53:35'),
(13, 'zarein nur', 'VhSh4NuekrsMAMNA.jpg', 14, 2, '2022-12-16 01:54:15', '2022-12-16 01:54:15'),
(14, 'jordan petrson', 'pSoZO2m4NNIC2GPt.jpg', 1, 2, '2022-12-18 05:19:35', '2022-12-18 05:19:35'),
(15, 'elon musk', 'V4iJjbFlHNm4dJMo.jpg', 1, 1, '2022-12-18 05:21:22', '2022-12-18 05:21:22'),
(16, 'fgafds', 'I1EmhMiwfPwO2RqC.jpg', 1, 1, '2022-12-18 05:58:38', '2022-12-18 05:58:38'),
(17, 'itsnot realy a meme it kinfd of advisce its like a qoute but realy a good advise', NULL, 1, 4, '2022-12-18 06:12:57', '2022-12-18 06:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `disscussion_tickets`
--

CREATE TABLE `disscussion_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vote` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disscussion_tickets`
--

INSERT INTO `disscussion_tickets` (`id`, `question`, `image`, `user_id`, `vote`, `created_at`, `updated_at`) VALUES
(1, 'Non similique nesciunt atque consequatur et animi. Sint laboriosam veniam recusandae alias eos. Nam id nam dolor velit ab.', '', 1, 0, '2022-10-20 17:03:07', '2022-10-20 17:03:07'),
(2, 'Laboriosam quasi eum recusandae perferendis quibusdam quaerat voluptatem. Sequi quam qui veritatis.', '', 3, 0, '2022-10-20 17:03:07', '2022-10-20 17:03:07'),
(3, 'saitama qoute', 'Ybe1wwJxXzJ5pmwc.jpg', 1, 0, '2022-12-18 05:59:58', '2022-12-18 05:59:58'),
(4, 'meme your follower is not always your fan i found when serching in my files i dont realy know where i got it', 'UcGdwPI678aD8FXT.jpg', 1, 0, '2022-12-18 06:10:46', '2022-12-18 06:10:46');

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
(5, '2022_10_08_145755_create_comments_table', 1),
(9, '2022_10_21_045508_create_support_tickets_table', 2),
(10, '2022_12_18_085018_create_disscussion_tickets_table', 2);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'Gq9Fwxhd14LsIv27.jpg', 'mehamedseid002@gmail.com', NULL, '$2y$10$tV30uoyadKfsesbPdtbqgeL8fAmnGl4hJL/ZisS/y3Te5tt2SgbG.', NULL, '2022-12-10 22:18:26', '2022-12-10 22:18:26'),
(3, 'mehamed', 'A1fopiCEzyclJDUx.jpg', 'test@email.com', NULL, '$2y$10$Bt3izBhRD.NW6eZQvgbF1.N3rZxVab6cPlCvP/axaw8DPcx8wjR0m', NULL, '2022-12-10 22:19:35', '2022-12-10 22:19:35'),
(4, 'ahm', 'dTjpRw9deVtEUC9K.jpg', 'form@email.com', NULL, '$2y$10$7ttc27PttHmBlmAfGhMmeOLsY.TsugzLsoLprNesaTRh7ICIP.oOm', NULL, '2022-12-11 04:47:47', '2022-12-11 04:47:47'),
(8, 'ahm2', '41UgtqFv7GQji55A.jpg', 'ahm22@email.com', NULL, '$2y$10$oFsOdVW54PrLeplRAfSKROiyIQMnplYWt6Wo1Ht8Ohmv26ekfBMDu', NULL, '2022-12-11 05:07:31', '2022-12-11 05:07:31'),
(9, 'profile', 'QgkxulqdSRPLtDEs.jpg', 'profile@email', NULL, '$2y$10$H18P.8C30lbOjURQFtsp.ejhv4iYNRiY2pTBD/WJVS.HiMVejN5su', NULL, '2022-12-11 05:17:39', '2022-12-11 05:17:39'),
(11, 'adsdasd', 'qivgixG8uUcpz6mx.jpg', 'adf@email.com', NULL, '$2y$10$JsF6UE8aYyDREbk9bWhVIuBe72jZnDDRB7n.hCzhxpLwKBS.pUhze', NULL, '2022-12-11 05:27:02', '2022-12-11 05:27:02'),
(12, 'ahmed', 'Gq9Fwxhd14LsIv27.jpg', 'ahmd@gmail.com', NULL, '$2y$10$qXriIg8oTiOOnm2uaEPqIeWqdz1TOznjaAhyE.NwQjZoUeCi1ty3m', NULL, '2022-12-14 00:39:31', '2022-12-14 00:39:31'),
(14, 'AhmedMehamed', '1Osq0qndXhEhBxhn.jpg', 'mehamedseid001@gmail.com', NULL, '$2y$10$vTbCfVZIVtrArppvbdlyYe3ZPkT7VL2Sv0Zrluxvxkj/3BfEwgCD6', NULL, '2022-12-14 00:48:03', '2022-12-14 00:48:03'),
(15, 'ahmed', 'jfMea9g4rYxev58q.jpg', 'ahmed@gmail.com', NULL, '$2y$10$w.6/3oGkkJ12dBM4fw6Ynu9.HI1jWpiQUy2sk5cl1HVfTDK1EbnU.', NULL, '2022-12-16 01:53:03', '2022-12-16 01:53:03'),
(16, 'mrbean', 'UuuzEh8rCGtuC6ts.jpg', 'mrbean@gmail.com', NULL, '$2y$10$acsuoz.wIWGvgDg.8tEDlezJFKD57GQkxWbZF8YcyY9cfr4u.8O8.', NULL, '2022-12-18 05:36:50', '2022-12-18 05:36:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disscussion_tickets`
--
ALTER TABLE `disscussion_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `disscussion_tickets`
--
ALTER TABLE `disscussion_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
