-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for gichecker
DROP DATABASE IF EXISTS `gichecker`;
CREATE DATABASE IF NOT EXISTS `gichecker` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `gichecker`;

-- Dumping structure for table gichecker.dag
DROP TABLE IF EXISTS `dag`;
CREATE TABLE IF NOT EXISTS `dag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mouja_id` int(11) NOT NULL DEFAULT '0',
  `sa_dag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bs_dag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_khatian` int(11) DEFAULT '0',
  `bs_khatian` int(11) DEFAULT '0',
  `sa_land_amount` double DEFAULT '0',
  `bs_land_amount` double DEFAULT '0',
  `interest_id` int(11) NOT NULL DEFAULT '0',
  `comments` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `Unique` (`mouja_id`,`sa_dag`,`bs_dag`,`interest_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1429 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gichecker.dag: ~0 rows (approximately)
DELETE FROM `dag`;

-- Dumping structure for table gichecker.interest
DROP TABLE IF EXISTS `interest`;
CREATE TABLE IF NOT EXISTS `interest` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`interest_id`) USING BTREE,
  KEY `id` (`interest_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='interest list';

-- Dumping data for table gichecker.interest: 9 rows
DELETE FROM `interest`;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` (`interest_id`, `interest_name`) VALUES
	(1, 'খাস জমি (১ম খন্ড)'),
	(2, 'খাস জমি (২য় খন্ড)'),
	(3, 'খাস জমি (৩য় খন্ড)'),
	(4, 'খাস জমি (৪র্থ খন্ড)'),
	(5, 'অর্পিত সম্পত্তি (ক তালিকা)'),
	(6, 'অর্পিত সম্পত্তি (খ তালিকা)'),
	(7, 'দেবোত্তর সম্পত্তি'),
	(8, 'ওয়াকফ সম্পত্তি'),
	(9, 'সার্টিফিকেট মামলা');
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;

-- Dumping structure for table gichecker.mouja
DROP TABLE IF EXISTS `mouja`;
CREATE TABLE IF NOT EXISTS `mouja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_jl` int(11) DEFAULT NULL,
  `bs_jl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `sa_jl` (`sa_jl`),
  UNIQUE KEY `bs_jl` (`bs_jl`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='jl list ';

-- Dumping data for table gichecker.mouja: 29 rows
DELETE FROM `mouja`;
/*!40000 ALTER TABLE `mouja` DISABLE KEYS */;
/*!40000 ALTER TABLE `mouja` ENABLE KEYS */;

-- Dumping structure for table gichecker.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `office_name` varchar(50) DEFAULT NULL,
  `officer_name` varchar(150) DEFAULT NULL,
  `officer_designation` varchar(150) DEFAULT NULL,
  `active` binary(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(50) DEFAULT 'profile_picture.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table gichecker.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `office_name`, `officer_name`, `officer_designation`, `active`, `created_at`, `image`) VALUES
	(2, 'admin', '$2y$10$/JpA1xGAn1x.4SQbgonrc.fIezaoNv4u3pKAVEWcTAa5xKxFrzs..', NULL, 'আপনার অফিসের নাম', 'কর্মকর্তার নাম', 'কর্মকর্তার পদবী', NULL, '2022-04-21 18:29:14', 'admin.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
