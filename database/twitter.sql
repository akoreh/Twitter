-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 06:27 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'no_avatar.png\r\n', '2017-05-19 08:12:52', '2017-05-19 08:12:52'),
(5, 'user.jpg', '2017-05-20 16:43:10', '2017-05-20 16:43:09'),
(6, 'wikileaks.png', NULL, NULL),
(7, 'independent.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_19_080414_create_images_table', 2),
('2017_05_19_080547_create_user_profile_table', 2),
('2017_05_19_083258_create_tweets_table', 3),
('2017_05_19_083759_create_user_relations_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `tweet` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `tweet`, `created_at`, `updated_at`) VALUES
(45, 10, 'RELEASE: CIA malware system Athena https://wikileaks.org/vault7/#Athena', '2017-05-20 13:55:22', '2017-05-20 13:49:22'),
(46, 10, 'NYT: CIA incompetence led to China taking out 10 to 20 CIA sources. CIA then covered it up for 6 years.\n\nhttps://www.nytimes.com/2017/05/20/world/asia/china-cia-spies-espionage.html?_r=0', '2017-05-20 13:50:20', '2017-05-20 13:50:20'),
(47, 10, 'Julian Assange\'s mother is asking Australia to help secure his release from Britain\n\nhttp://www.independent.co.uk/news/world/australasia/julian-assange-latest-mother-australian-prime-minister-malcolm-turnbull-release-ecuador-christine-a7746166.html', '2017-05-20 13:54:35', '2017-05-20 13:50:55'),
(48, 11, 'Tenerife intrigue, Catalonian farewells and one league title: La Liga set to end with a bang\n\nhttp://www.independent.co.uk/sport/football/premier-league/la-liga-real-madrid-title-barcelona-malaga-eibar-f-a7746776.html', '2017-05-20 13:52:43', '2017-05-20 13:52:43'),
(49, 11, 'This is what happens to your body if you become a cannibal\n\nhttps://www.indy100.com/article/what-happens-body-become-cannibal-science-7744436', '2017-05-20 13:52:59', '2017-05-20 13:52:59'),
(50, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi elementum rhoncus nisl, sit amet finibus elit gravida quis. Proin posuere massa ut quam ultrices, ornare porttitor felis bibendum.', '2017-05-20 13:53:52', '2017-05-20 13:53:52'),
(51, 11, 'Vestibulum imperdiet vehicula ullamcorper. Maecenas arcu nulla, condimentum non facilisis vel, vestibulum at sapien. Nulla sapien orci, efficitur sed est et, mattis eleifend ipsum. Donec eleifend, lectus nec interdum commodo.', '2017-05-20 13:54:00', '2017-05-20 13:54:00'),
(52, 9, 'Chyna', '2017-05-20 14:13:14', '2017-05-20 14:13:14'),
(55, 11, 'Incredible ways the world has changed in the past 100 years updated\n\nhttp://www.independent.co.uk/news/incredible-ways-the-world-has-changed-in-the-past-100-years-a7747331.html', '2017-05-21 09:35:16', '2017-05-21 09:35:16'),
(56, 10, 'Sweden Withdraws Arrest Warrant for Julian Assange, but He Still Faces Serious Legal Jeopardy', '2017-05-21 09:36:23', '2017-05-21 09:36:23'),
(57, 10, 'UK states it will arrest Assange regardless & refuses to confirm or deny whether it has already received an extradition request from the US.', '2017-05-21 09:36:37', '2017-05-21 09:36:37'),
(72, 11, 'Google’s AI future is so impressive it’s scary\n\nhttp://www.independent.co.uk/life-style/gadgets-and-tech/features/google-lens-ai-preview-features-so-impressive-its-scary-a7745686.html', '2017-05-20 04:35:03', '2017-05-21 04:35:03'),
(73, 11, '30 minutes to pick the team that could win your Fantasy Football championship - our tips here\n\nhttp://www.independent.co.uk/sport/football/premier-league/fantasy-football-scout-tips-gameweek-38-fpl-a7745051.html', '2017-05-20 09:34:37', '2017-05-21 09:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Donald J. Trump', 'trump@trump.com', '$2y$10$mXzESRlfduOojCaNf.8e9e6wcf448pSTcjgf3Ej3T4wqmctCJ.CbK', 'WTU4dqIKNsmiU4JCo33elD6MaaMf5i2jy6oZDHZorPmWFk5YXT28pN0rcmoY', '2017-05-20 13:42:02', '2017-05-21 09:33:25'),
(10, 'Wikileaks', 'wikileaks@user.com', '$2y$10$rTuWow7pjw2bhUIIKfxzJ.7SmsUONKfOl3J0qnJhRW1ADwRBWxIYS', '1L9Fax0iniBqdOf4iFGIbCz0OO3l8GyCnZ5XCbSerm2VqaBjzgGWXi9AoFlO', '2017-05-20 13:47:52', '2017-05-21 09:36:50'),
(11, 'The Independent', 'independent@user.com', '$2y$10$RTNXTFGVfHlyC/N3U21Z.eQZYvRiBBJRqxCmIb0KrK1Dk20iS4jGq', 'XvJ8wqr5byVa5ggaPzbKvOd30dbdj23dNpgJBGXSVpwOxtEtlwlIrmlmPcAB', '2017-05-20 13:51:56', '2017-05-21 09:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_handle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_id` int(11) NOT NULL DEFAULT '1',
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no_banner.jpg',
  `bio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `display_name`, `handle`, `url_handle`, `image_id`, `banner`, `bio`, `location`, `created_at`, `updated_at`) VALUES
(8, 9, 'Donald J. Trump', '@realDonaldTrump', 'realDonaldTrump', 5, 'realDonaldTrump.jpg', '', NULL, '2017-05-20 13:42:02', '2017-05-20 13:42:02'),
(9, 10, 'Wikileaks', '@wikileaks', 'wikileaks', 6, 'no_banner.jpg', '', NULL, '2017-05-20 13:47:52', '2017-05-20 13:47:52'),
(10, 11, 'The Independent', '@independent', 'independent', 7, 'no_banner.jpg', '', NULL, '2017-05-20 13:51:56', '2017-05-20 13:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_relations`
--

CREATE TABLE `user_relations` (
  `id` int(10) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `followed_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_relations`
--

INSERT INTO `user_relations` (`id`, `follower_id`, `followed_id`, `created_at`, `updated_at`) VALUES
(7, 9, 11, '2017-05-20 16:54:15', '2017-05-20 16:54:16'),
(31, 9, 10, '2017-05-21 06:30:01', '2017-05-21 06:30:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tweets_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_relations`
--
ALTER TABLE `user_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_relations_follower_id_foreign` (`follower_id`),
  ADD KEY `user_relations_followed_id_foreign` (`followed_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_relations`
--
ALTER TABLE `user_relations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `FK_tweets_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_relations`
--
ALTER TABLE `user_relations`
  ADD CONSTRAINT `user_relations_followed_id_foreign` FOREIGN KEY (`followed_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_relations_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
