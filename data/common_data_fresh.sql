-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: fdb32.awardspace.net
-- Generation Time: Sep 05, 2022 at 04:08 PM
-- Server version: 5.7.20-log
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4136280_gichecker`
--

-- --------------------------------------------------------

--
-- Table structure for table `dag`
--


CREATE TABLE `dag` (
  `id` int(10) UNSIGNED NOT NULL,
  `mouja_id` int(11) NOT NULL DEFAULT '0',
  `sa_dag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bs_dag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `sa_khatian` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `bs_khatian` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `sa_land_amount` double DEFAULT '0',
  `bs_land_amount` double DEFAULT '0',
  `interest_id` int(11) NOT NULL DEFAULT '0',
  `comments` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interest_id` int(11) NOT NULL,
  `interest_name` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='interest list';

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_id`, `interest_name`) VALUES
(1, 'খাস জমি (১ম খন্ড)'),
(2, 'খাস জমি (২য় খন্ড)'),
(3, 'খাস জমি (৩য় খন্ড)'),
(4, 'খাস জমি (৪র্থ খন্ড)'),
(5, 'অর্পিত সম্পত্তি (ক তালিকা)'),
(6, 'অর্পিত সম্পত্তি (খ তালিকা)'),
(7, 'দেবোত্তর সম্পত্তি'),
(8, 'ওয়াকফ সম্পত্তি'),
(9, 'দুদক মামলা'),
(16, 'সংস্থার জমি'),
(17, 'সাধারণ জনগণের স্বার্থ '),
(19, 'পরিত্যক্ত সম্পত্তির তালিকা'),
(20, 'অধিগ্রহনকৃত সম্পত্তি');

-- --------------------------------------------------------

--
-- Table structure for table `mouja`
--

CREATE TABLE `mouja` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_jl` int(11) DEFAULT NULL,
  `bs_jl` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='jl list ';

--
-- Dumping data for table `mouja`
--



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `office_name` varchar(50) DEFAULT NULL,
  `officer_name` varchar(150) DEFAULT NULL,
  `officer_designation` varchar(150) DEFAULT NULL,
  `active` binary(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(50) DEFAULT 'profile_picture.png'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `office_name`, `officer_name`, `officer_designation`, `active`, `created_at`, `image`) VALUES
(2, 'admin', '$2y$10$/JpA1xGAn1x.4SQbgonrc.fIezaoNv4u3pKAVEWcTAa5xKxFrzs..', NULL, 'অফিস নাম', 'অফিসার নাম', 'সহকারী কমিশনার (ভূমি)', NULL, '2022-04-21 18:29:14', 'admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dag`
--
ALTER TABLE `dag`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `Unique` (`mouja_id`,`sa_dag`,`bs_dag`,`interest_id`) USING BTREE;

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interest_id`) USING BTREE,
  ADD KEY `id` (`interest_id`) USING BTREE;

--
-- Indexes for table `mouja`
--
ALTER TABLE `mouja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `sa_jl` (`sa_jl`),
  ADD UNIQUE KEY `bs_jl` (`bs_jl`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dag`
--
ALTER TABLE `dag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10568;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mouja`
--
ALTER TABLE `mouja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
