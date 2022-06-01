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
  `sa_dag` int(11) NOT NULL DEFAULT '0',
  `bs_dag` int(11) DEFAULT '0',
  `sa_khatian` int(11) DEFAULT '0',
  `bs_khatian` int(11) DEFAULT '0',
  `sa_land_amount` double DEFAULT '0',
  `bs_land_amount` double DEFAULT '0',
  `interest_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `Unique` (`mouja_id`,`sa_dag`,`bs_dag`,`interest_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1392 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gichecker.interest
DROP TABLE IF EXISTS `interest`;
CREATE TABLE IF NOT EXISTS `interest` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`interest_id`) USING BTREE,
  KEY `id` (`interest_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='interest list';

-- Data exporting was unselected.

-- Dumping structure for table gichecker.mouja
DROP TABLE IF EXISTS `mouja`;
CREATE TABLE IF NOT EXISTS `mouja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_jl` int(11) DEFAULT NULL,
  `bs_jl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='jl list ';

-- Data exporting was unselected.

-- Dumping structure for table gichecker.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `field_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'à¦®à¦¹à¦¾à¦¨à¦—à¦° à¦°à¦¾à¦œà¦¸à§à¦¬ à¦¸à¦¾à¦°à§à¦•à§‡à¦²',
  `field_value` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'à¦®à¦¹à¦¾à¦¨à¦—à¦° à¦°à¦¾à¦œà¦¸à§à¦¬ à¦¸à¦¾à¦°à§à¦•à§‡à¦²'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gichecker.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `officer_name` varchar(150) DEFAULT NULL,
  `officer_designation` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(50) DEFAULT 'profile_picture.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
