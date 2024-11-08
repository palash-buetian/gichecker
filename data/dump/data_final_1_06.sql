-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.36 - MySQL Community Server (GPL)
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
  `mouja_id` int(11) DEFAULT '0',
  `sa_dag` int(11) DEFAULT '0',
  `bs_dag` int(11) DEFAULT '0',
  `sa_khatian` int(11) DEFAULT '0',
  `bs_khatian` int(11) DEFAULT '0',
  `sa_land_amount` double DEFAULT '0',
  `bs_land_amount` double DEFAULT '0',
  `interest_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1380 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gichecker.dag: ~1,379 rows (approximately)
REPLACE INTO `dag` (`id`, `mouja_id`, `sa_dag`, `bs_dag`, `sa_khatian`, `bs_khatian`, `sa_land_amount`, `bs_land_amount`, `interest_id`) VALUES
	(1, 1, 10235, 0, 0, 0, 0, 0, 5),
	(2, 1, 10294, 0, 0, 0, 0, 0, 5),
	(3, 1, 10295, 0, 0, 0, 0, 0, 5),
	(4, 1, 10297, 0, 0, 0, 0, 0, 5),
	(5, 1, 10354, 0, 0, 0, 0, 0, 5),
	(6, 1, 10355, 0, 0, 0, 0, 0, 5),
	(7, 1, 10356, 0, 0, 0, 0, 0, 5),
	(8, 1, 10357, 0, 0, 0, 0, 0, 5),
	(9, 1, 10358, 0, 0, 0, 0, 0, 5),
	(10, 1, 10363, 0, 0, 0, 0, 0, 5),
	(11, 1, 10554, 0, 0, 0, 0, 0, 5),
	(12, 1, 10633, 0, 0, 0, 0, 0, 5),
	(13, 1, 10634, 0, 0, 0, 0, 0, 5),
	(14, 1, 10635, 0, 0, 0, 0, 0, 5),
	(15, 1, 10636, 0, 0, 0, 0, 0, 5),
	(16, 1, 10637, 0, 0, 0, 0, 0, 5),
	(17, 1, 10686, 0, 0, 0, 0, 0, 5),
	(18, 1, 10724, 0, 0, 0, 0, 0, 5),
	(19, 1, 10748, 0, 0, 0, 0, 0, 5),
	(20, 1, 10767, 0, 0, 0, 0, 0, 5),
	(21, 1, 10768, 0, 0, 0, 0, 0, 5),
	(22, 1, 10769, 0, 0, 0, 0, 0, 5),
	(23, 1, 10777, 0, 0, 0, 0, 0, 5),
	(24, 1, 10852, 0, 0, 0, 0, 0, 5),
	(25, 1, 11002, 0, 0, 0, 0, 0, 5),
	(26, 1, 11006, 0, 0, 0, 0, 0, 5),
	(27, 1, 11007, 0, 0, 0, 0, 0, 5),
	(28, 1, 11008, 0, 0, 0, 0, 0, 5),
	(29, 1, 11009, 0, 0, 0, 0, 0, 5),
	(30, 1, 11015, 0, 0, 0, 0, 0, 5),
	(31, 1, 11030, 0, 0, 0, 0, 0, 5),
	(32, 1, 11048, 0, 0, 0, 0, 0, 5),
	(33, 1, 11049, 0, 0, 0, 0, 0, 5),
	(34, 1, 11076, 0, 0, 0, 0, 0, 5),
	(35, 1, 11077, 0, 0, 0, 0, 0, 5),
	(36, 1, 11079, 0, 0, 0, 0, 0, 5),
	(37, 1, 11146, 0, 0, 0, 0, 0, 5),
	(38, 1, 11147, 0, 0, 0, 0, 0, 5),
	(39, 1, 11148, 0, 0, 0, 0, 0, 5),
	(40, 1, 11149, 0, 0, 0, 0, 0, 5),
	(41, 1, 11150, 0, 0, 0, 0, 0, 5),
	(42, 1, 11156, 0, 0, 0, 0, 0, 5),
	(43, 1, 11162, 0, 0, 0, 0, 0, 5),
	(44, 1, 11277, 0, 0, 0, 0, 0, 5),
	(45, 1, 1134, 0, 0, 0, 0, 0, 5),
	(46, 1, 1138, 0, 0, 0, 0, 0, 5),
	(47, 1, 1149, 0, 0, 0, 0, 0, 5),
	(48, 1, 1156, 0, 0, 0, 0, 0, 5),
	(49, 1, 1158, 0, 0, 0, 0, 0, 5),
	(50, 1, 1159, 0, 0, 0, 0, 0, 5),
	(51, 1, 1201, 0, 0, 0, 0, 0, 5),
	(52, 1, 1203, 0, 0, 0, 0, 0, 5),
	(53, 1, 1216, 0, 0, 0, 0, 0, 5),
	(54, 1, 1312, 0, 0, 0, 0, 0, 5),
	(55, 1, 1487, 0, 0, 0, 0, 0, 5),
	(56, 1, 17, 0, 0, 0, 0, 0, 5),
	(57, 1, 20, 0, 0, 0, 0, 0, 5),
	(58, 1, 21, 0, 0, 0, 0, 0, 5),
	(59, 1, 2140, 0, 0, 0, 0, 0, 5),
	(60, 1, 2299, 0, 0, 0, 0, 0, 5),
	(61, 1, 2387, 0, 0, 0, 0, 0, 5),
	(62, 1, 2413, 0, 0, 0, 0, 0, 5),
	(63, 1, 2429, 0, 0, 0, 0, 0, 5),
	(64, 1, 27, 0, 0, 0, 0, 0, 5),
	(65, 1, 28, 0, 0, 0, 0, 0, 5),
	(66, 1, 29, 0, 0, 0, 0, 0, 5),
	(67, 1, 30, 0, 0, 0, 0, 0, 5),
	(68, 1, 313, 0, 0, 0, 0, 0, 5),
	(69, 1, 3143, 0, 0, 0, 0, 0, 5),
	(70, 1, 3144, 0, 0, 0, 0, 0, 5),
	(71, 1, 3146, 0, 0, 0, 0, 0, 5),
	(72, 1, 318, 0, 0, 0, 0, 0, 5),
	(73, 1, 320, 0, 0, 0, 0, 0, 5),
	(74, 1, 3627, 0, 0, 0, 0, 0, 5),
	(75, 1, 3628, 0, 0, 0, 0, 0, 5),
	(76, 1, 3641, 0, 0, 0, 0, 0, 5),
	(77, 1, 3648, 0, 0, 0, 0, 0, 5),
	(78, 1, 3656, 0, 0, 0, 0, 0, 5),
	(79, 1, 3657, 0, 0, 0, 0, 0, 5),
	(80, 1, 3658, 0, 0, 0, 0, 0, 5),
	(81, 1, 3659, 0, 0, 0, 0, 0, 5),
	(82, 1, 3679, 0, 0, 0, 0, 0, 5),
	(83, 1, 3686, 0, 0, 0, 0, 0, 5),
	(84, 1, 3689, 0, 0, 0, 0, 0, 5),
	(85, 1, 372, 0, 0, 0, 0, 0, 5),
	(86, 1, 3842, 0, 0, 0, 0, 0, 5),
	(87, 1, 387, 0, 0, 0, 0, 0, 5),
	(88, 1, 388, 0, 0, 0, 0, 0, 5),
	(89, 1, 4086, 0, 0, 0, 0, 0, 5),
	(90, 1, 4087, 0, 0, 0, 0, 0, 5),
	(91, 1, 4088, 0, 0, 0, 0, 0, 5),
	(92, 1, 4108, 0, 0, 0, 0, 0, 5),
	(93, 1, 4110, 0, 0, 0, 0, 0, 5),
	(94, 1, 4111, 0, 0, 0, 0, 0, 5),
	(95, 1, 4113, 0, 0, 0, 0, 0, 5),
	(96, 1, 4114, 0, 0, 0, 0, 0, 5),
	(97, 1, 4155, 0, 0, 0, 0, 0, 5),
	(98, 1, 419, 0, 0, 0, 0, 0, 5),
	(99, 1, 479, 0, 0, 0, 0, 0, 5),
	(100, 1, 485, 0, 0, 0, 0, 0, 5),
	(101, 1, 486, 0, 0, 0, 0, 0, 5),
	(102, 1, 487, 0, 0, 0, 0, 0, 5),
	(103, 1, 4916, 0, 0, 0, 0, 0, 5),
	(104, 1, 4919, 0, 0, 0, 0, 0, 5),
	(105, 1, 4924, 0, 0, 0, 0, 0, 5),
	(106, 1, 4971, 0, 0, 0, 0, 0, 5),
	(107, 1, 4972, 0, 0, 0, 0, 0, 5),
	(108, 1, 5033, 0, 0, 0, 0, 0, 5),
	(109, 1, 5035, 0, 0, 0, 0, 0, 5),
	(110, 1, 5036, 0, 0, 0, 0, 0, 5),
	(111, 1, 5037, 0, 0, 0, 0, 0, 5),
	(112, 1, 5038, 0, 0, 0, 0, 0, 5),
	(113, 1, 5039, 0, 0, 0, 0, 0, 5),
	(114, 1, 5040, 0, 0, 0, 0, 0, 5),
	(115, 1, 5076, 0, 0, 0, 0, 0, 5),
	(116, 1, 5079, 0, 0, 0, 0, 0, 5),
	(117, 1, 5081, 0, 0, 0, 0, 0, 5),
	(118, 1, 5237, 0, 0, 0, 0, 0, 5),
	(119, 1, 5238, 0, 0, 0, 0, 0, 5),
	(120, 1, 5239, 0, 0, 0, 0, 0, 5),
	(121, 1, 5240, 0, 0, 0, 0, 0, 5),
	(122, 1, 5241, 0, 0, 0, 0, 0, 5),
	(123, 1, 5306, 0, 0, 0, 0, 0, 5),
	(124, 1, 5341, 0, 0, 0, 0, 0, 5),
	(125, 1, 5363, 0, 0, 0, 0, 0, 5),
	(126, 1, 5412, 0, 0, 0, 0, 0, 5),
	(127, 1, 5433, 0, 0, 0, 0, 0, 5),
	(128, 1, 5464, 0, 0, 0, 0, 0, 5),
	(129, 1, 5604, 0, 0, 0, 0, 0, 5),
	(130, 1, 5606, 0, 0, 0, 0, 0, 5),
	(131, 1, 5608, 0, 0, 0, 0, 0, 5),
	(132, 1, 5629, 0, 0, 0, 0, 0, 5),
	(133, 1, 5636, 0, 0, 0, 0, 0, 5),
	(134, 1, 5641, 0, 0, 0, 0, 0, 5),
	(135, 1, 5643, 0, 0, 0, 0, 0, 5),
	(136, 1, 5655, 0, 0, 0, 0, 0, 5),
	(137, 1, 57, 0, 0, 0, 0, 0, 5),
	(138, 1, 5760, 0, 0, 0, 0, 0, 5),
	(139, 1, 5794, 0, 0, 0, 0, 0, 5),
	(140, 1, 5904, 0, 0, 0, 0, 0, 5),
	(141, 1, 5908, 0, 0, 0, 0, 0, 5),
	(142, 1, 5943, 0, 0, 0, 0, 0, 5),
	(143, 1, 5944, 0, 0, 0, 0, 0, 5),
	(144, 1, 5945, 0, 0, 0, 0, 0, 5),
	(145, 1, 6, 0, 0, 0, 0, 0, 5),
	(146, 1, 6116, 0, 0, 0, 0, 0, 5),
	(147, 1, 6320, 0, 0, 0, 0, 0, 5),
	(148, 1, 6322, 0, 0, 0, 0, 0, 5),
	(149, 1, 6391, 0, 0, 0, 0, 0, 5),
	(150, 1, 6650, 0, 0, 0, 0, 0, 5),
	(151, 1, 6990, 0, 0, 0, 0, 0, 5),
	(152, 1, 7133, 0, 0, 0, 0, 0, 5),
	(153, 1, 7190, 0, 0, 0, 0, 0, 5),
	(154, 1, 7295, 0, 0, 0, 0, 0, 5),
	(155, 1, 7296, 0, 0, 0, 0, 0, 5),
	(156, 1, 7305, 0, 0, 0, 0, 0, 5),
	(157, 1, 7317, 0, 0, 0, 0, 0, 5),
	(158, 1, 7318, 0, 0, 0, 0, 0, 5),
	(159, 1, 7331, 0, 0, 0, 0, 0, 5),
	(160, 1, 7332, 0, 0, 0, 0, 0, 5),
	(161, 1, 7335, 0, 0, 0, 0, 0, 5),
	(162, 1, 7338, 0, 0, 0, 0, 0, 5),
	(163, 1, 7339, 0, 0, 0, 0, 0, 5),
	(164, 1, 7340, 0, 0, 0, 0, 0, 5),
	(165, 1, 7343, 0, 0, 0, 0, 0, 5),
	(166, 1, 7344, 0, 0, 0, 0, 0, 5),
	(167, 1, 7345, 0, 0, 0, 0, 0, 5),
	(168, 1, 7413, 0, 0, 0, 0, 0, 5),
	(169, 1, 7518, 0, 0, 0, 0, 0, 5),
	(170, 1, 7520, 0, 0, 0, 0, 0, 5),
	(171, 1, 7532, 0, 0, 0, 0, 0, 5),
	(172, 1, 7546, 0, 0, 0, 0, 0, 5),
	(173, 1, 7548, 0, 0, 0, 0, 0, 5),
	(174, 1, 7552, 0, 0, 0, 0, 0, 5),
	(175, 1, 7556, 0, 0, 0, 0, 0, 5),
	(176, 1, 7559, 0, 0, 0, 0, 0, 5),
	(177, 1, 7564, 0, 0, 0, 0, 0, 5),
	(178, 1, 7570, 0, 0, 0, 0, 0, 5),
	(179, 1, 7571, 0, 0, 0, 0, 0, 5),
	(180, 1, 7574, 0, 0, 0, 0, 0, 5),
	(181, 1, 7582, 0, 0, 0, 0, 0, 5),
	(182, 1, 7584, 0, 0, 0, 0, 0, 5),
	(183, 1, 7587, 0, 0, 0, 0, 0, 5),
	(184, 1, 7588, 0, 0, 0, 0, 0, 5),
	(185, 1, 7594, 0, 0, 0, 0, 0, 5),
	(186, 1, 7612, 0, 0, 0, 0, 0, 5),
	(187, 1, 7618, 0, 0, 0, 0, 0, 5),
	(188, 1, 7622, 0, 0, 0, 0, 0, 5),
	(189, 1, 7625, 0, 0, 0, 0, 0, 5),
	(190, 1, 7752, 0, 0, 0, 0, 0, 5),
	(191, 1, 7753, 0, 0, 0, 0, 0, 5),
	(192, 1, 7755, 0, 0, 0, 0, 0, 5),
	(193, 1, 796, 0, 0, 0, 0, 0, 5),
	(194, 1, 797, 0, 0, 0, 0, 0, 5),
	(195, 1, 800, 0, 0, 0, 0, 0, 5),
	(196, 1, 803, 0, 0, 0, 0, 0, 5),
	(197, 1, 8040, 0, 0, 0, 0, 0, 5),
	(198, 1, 8041, 0, 0, 0, 0, 0, 5),
	(199, 1, 8059, 0, 0, 0, 0, 0, 5),
	(200, 1, 8071, 0, 0, 0, 0, 0, 5),
	(201, 1, 808, 0, 0, 0, 0, 0, 5),
	(202, 1, 8122, 0, 0, 0, 0, 0, 5),
	(203, 1, 8152, 0, 0, 0, 0, 0, 5),
	(204, 1, 8166, 0, 0, 0, 0, 0, 5),
	(205, 1, 822, 0, 0, 0, 0, 0, 5),
	(206, 1, 832, 0, 0, 0, 0, 0, 5),
	(207, 1, 843, 0, 0, 0, 0, 0, 5),
	(208, 1, 852, 0, 0, 0, 0, 0, 5),
	(209, 1, 853, 0, 0, 0, 0, 0, 5),
	(210, 1, 859, 0, 0, 0, 0, 0, 5),
	(211, 1, 865, 0, 0, 0, 0, 0, 5),
	(212, 1, 881, 0, 0, 0, 0, 0, 5),
	(213, 1, 8812, 0, 0, 0, 0, 0, 5),
	(214, 1, 8814, 0, 0, 0, 0, 0, 5),
	(215, 1, 882, 0, 0, 0, 0, 0, 5),
	(216, 1, 883, 0, 0, 0, 0, 0, 5),
	(217, 1, 9083, 0, 0, 0, 0, 0, 5),
	(218, 1, 9084, 0, 0, 0, 0, 0, 5),
	(219, 1, 9085, 0, 0, 0, 0, 0, 5),
	(220, 1, 9089, 0, 0, 0, 0, 0, 5),
	(221, 1, 952, 0, 0, 0, 0, 0, 5),
	(222, 1, 958, 0, 0, 0, 0, 0, 5),
	(223, 1, 959, 0, 0, 0, 0, 0, 5),
	(224, 1, 831, 0, 0, 0, 0, 0, 8),
	(225, 1, 937, 0, 0, 0, 0, 0, 8),
	(226, 1, 938, 0, 0, 0, 0, 0, 8),
	(227, 1, 1003, 0, 0, 0, 0, 0, 8),
	(228, 1, 1007, 0, 0, 0, 0, 0, 8),
	(229, 1, 1219, 0, 0, 0, 0, 0, 8),
	(230, 1, 1288, 0, 0, 0, 0, 0, 8),
	(231, 1, 1304, 0, 0, 0, 0, 0, 8),
	(232, 1, 1306, 0, 0, 0, 0, 0, 8),
	(233, 1, 1313, 0, 0, 0, 0, 0, 8),
	(234, 1, 2207, 0, 0, 0, 0, 0, 8),
	(235, 1, 2217, 0, 0, 0, 0, 0, 8),
	(236, 1, 2218, 0, 0, 0, 0, 0, 8),
	(237, 1, 2219, 0, 0, 0, 0, 0, 8),
	(238, 1, 2220, 0, 0, 0, 0, 0, 8),
	(239, 1, 2221, 0, 0, 0, 0, 0, 8),
	(240, 1, 2343, 0, 0, 0, 0, 0, 8),
	(241, 1, 2344, 0, 0, 0, 0, 0, 8),
	(242, 1, 3003, 0, 0, 0, 0, 0, 8),
	(243, 1, 3004, 0, 0, 0, 0, 0, 8),
	(244, 1, 3005, 0, 0, 0, 0, 0, 8),
	(245, 1, 3006, 0, 0, 0, 0, 0, 8),
	(246, 1, 3048, 0, 0, 0, 0, 0, 8),
	(247, 1, 3049, 0, 0, 0, 0, 0, 8),
	(248, 1, 3050, 0, 0, 0, 0, 0, 8),
	(249, 1, 3074, 0, 0, 0, 0, 0, 8),
	(250, 1, 3113, 0, 0, 0, 0, 0, 8),
	(251, 1, 3133, 0, 0, 0, 0, 0, 8),
	(252, 1, 3134, 0, 0, 0, 0, 0, 8),
	(253, 1, 3135, 0, 0, 0, 0, 0, 8),
	(254, 1, 3136, 0, 0, 0, 0, 0, 8),
	(255, 1, 3137, 0, 0, 0, 0, 0, 8),
	(256, 1, 3142, 0, 0, 0, 0, 0, 8),
	(257, 1, 3148, 0, 0, 0, 0, 0, 8),
	(258, 1, 3149, 0, 0, 0, 0, 0, 8),
	(259, 1, 3153, 0, 0, 0, 0, 0, 8),
	(260, 1, 3181, 0, 0, 0, 0, 0, 8),
	(261, 1, 3219, 0, 0, 0, 0, 0, 8),
	(262, 1, 3221, 0, 0, 0, 0, 0, 8),
	(263, 1, 3229, 0, 0, 0, 0, 0, 8),
	(264, 1, 3230, 0, 0, 0, 0, 0, 8),
	(265, 1, 3234, 0, 0, 0, 0, 0, 8),
	(266, 1, 4529, 0, 0, 0, 0, 0, 8),
	(267, 1, 4533, 0, 0, 0, 0, 0, 8),
	(268, 1, 4535, 0, 0, 0, 0, 0, 8),
	(269, 1, 4536, 0, 0, 0, 0, 0, 8),
	(270, 1, 4537, 0, 0, 0, 0, 0, 8),
	(271, 1, 4538, 0, 0, 0, 0, 0, 8),
	(272, 1, 4539, 0, 0, 0, 0, 0, 8),
	(273, 1, 4540, 0, 0, 0, 0, 0, 8),
	(274, 1, 4553, 0, 0, 0, 0, 0, 8),
	(275, 1, 4580, 0, 0, 0, 0, 0, 8),
	(276, 1, 4613, 0, 0, 0, 0, 0, 8),
	(277, 1, 4614, 0, 0, 0, 0, 0, 8),
	(278, 1, 4618, 0, 0, 0, 0, 0, 8),
	(279, 1, 4625, 0, 0, 0, 0, 0, 8),
	(280, 1, 4626, 0, 0, 0, 0, 0, 8),
	(281, 1, 4667, 0, 0, 0, 0, 0, 8),
	(282, 1, 4669, 0, 0, 0, 0, 0, 8),
	(283, 1, 4687, 0, 0, 0, 0, 0, 8),
	(284, 1, 4688, 0, 0, 0, 0, 0, 8),
	(285, 1, 4689, 0, 0, 0, 0, 0, 8),
	(286, 1, 4690, 0, 0, 0, 0, 0, 8),
	(287, 1, 4691, 0, 0, 0, 0, 0, 8),
	(288, 1, 4692, 0, 0, 0, 0, 0, 8),
	(289, 1, 4693, 0, 0, 0, 0, 0, 8),
	(290, 1, 4694, 0, 0, 0, 0, 0, 8),
	(291, 1, 4750, 0, 0, 0, 0, 0, 8),
	(292, 1, 4751, 0, 0, 0, 0, 0, 8),
	(293, 1, 4752, 0, 0, 0, 0, 0, 8),
	(294, 1, 4754, 0, 0, 0, 0, 0, 8),
	(295, 1, 4763, 0, 0, 0, 0, 0, 8),
	(296, 1, 5187, 0, 0, 0, 0, 0, 8),
	(297, 1, 5188, 0, 0, 0, 0, 0, 8),
	(298, 1, 5565, 0, 0, 0, 0, 0, 8),
	(299, 1, 5715, 0, 0, 0, 0, 0, 8),
	(300, 1, 6114, 0, 0, 0, 0, 0, 8),
	(301, 1, 6115, 0, 0, 0, 0, 0, 8),
	(302, 1, 6116, 0, 0, 0, 0, 0, 8),
	(303, 1, 6320, 0, 0, 0, 0, 0, 8),
	(304, 1, 6325, 0, 0, 0, 0, 0, 8),
	(305, 1, 6489, 0, 0, 0, 0, 0, 8),
	(306, 1, 6490, 0, 0, 0, 0, 0, 8),
	(307, 1, 6491, 0, 0, 0, 0, 0, 8),
	(308, 1, 6492, 0, 0, 0, 0, 0, 8),
	(309, 1, 6542, 0, 0, 0, 0, 0, 8),
	(310, 1, 6543, 0, 0, 0, 0, 0, 8),
	(311, 1, 6556, 0, 0, 0, 0, 0, 8),
	(312, 1, 6630, 0, 0, 0, 0, 0, 8),
	(313, 1, 6633, 0, 0, 0, 0, 0, 8),
	(314, 1, 7013, 0, 0, 0, 0, 0, 8),
	(315, 1, 7025, 0, 0, 0, 0, 0, 8),
	(316, 1, 7026, 0, 0, 0, 0, 0, 8),
	(317, 1, 7027, 0, 0, 0, 0, 0, 8),
	(318, 1, 7039, 0, 0, 0, 0, 0, 8),
	(319, 1, 7040, 0, 0, 0, 0, 0, 8),
	(320, 1, 7044, 0, 0, 0, 0, 0, 8),
	(321, 1, 7045, 0, 0, 0, 0, 0, 8),
	(322, 1, 7049, 0, 0, 0, 0, 0, 8),
	(323, 1, 7050, 0, 0, 0, 0, 0, 8),
	(324, 1, 7051, 0, 0, 0, 0, 0, 8),
	(325, 1, 7053, 0, 0, 0, 0, 0, 8),
	(326, 1, 7054, 0, 0, 0, 0, 0, 8),
	(327, 1, 7056, 0, 0, 0, 0, 0, 8),
	(328, 1, 7058, 0, 0, 0, 0, 0, 8),
	(329, 1, 7059, 0, 0, 0, 0, 0, 8),
	(330, 1, 7069, 0, 0, 0, 0, 0, 8),
	(331, 1, 7076, 0, 0, 0, 0, 0, 8),
	(332, 1, 7083, 0, 0, 0, 0, 0, 8),
	(333, 1, 7107, 0, 0, 0, 0, 0, 8),
	(334, 1, 7155, 0, 0, 0, 0, 0, 8),
	(335, 1, 7156, 0, 0, 0, 0, 0, 8),
	(336, 1, 7162, 0, 0, 0, 0, 0, 8),
	(337, 1, 7175, 0, 0, 0, 0, 0, 8),
	(338, 1, 7179, 0, 0, 0, 0, 0, 8),
	(339, 1, 7180, 0, 0, 0, 0, 0, 8),
	(340, 1, 7223, 0, 0, 0, 0, 0, 8),
	(341, 1, 7224, 0, 0, 0, 0, 0, 8),
	(342, 1, 7229, 0, 0, 0, 0, 0, 8),
	(343, 1, 7256, 0, 0, 0, 0, 0, 8),
	(344, 1, 7258, 0, 0, 0, 0, 0, 8),
	(345, 1, 7259, 0, 0, 0, 0, 0, 8),
	(346, 1, 7260, 0, 0, 0, 0, 0, 8),
	(347, 1, 7354, 0, 0, 0, 0, 0, 8),
	(348, 1, 7491, 0, 0, 0, 0, 0, 8),
	(349, 1, 7493, 0, 0, 0, 0, 0, 8),
	(350, 1, 7498, 0, 0, 0, 0, 0, 8),
	(351, 1, 7499, 0, 0, 0, 0, 0, 8),
	(352, 1, 7663, 0, 0, 0, 0, 0, 8),
	(353, 1, 7664, 0, 0, 0, 0, 0, 8),
	(354, 1, 7665, 0, 0, 0, 0, 0, 8),
	(355, 1, 7666, 0, 0, 0, 0, 0, 8),
	(356, 1, 7793, 0, 0, 0, 0, 0, 8),
	(357, 1, 7795, 0, 0, 0, 0, 0, 8),
	(358, 1, 7797, 0, 0, 0, 0, 0, 8),
	(359, 1, 7798, 0, 0, 0, 0, 0, 8),
	(360, 1, 7799, 0, 0, 0, 0, 0, 8),
	(361, 1, 7800, 0, 0, 0, 0, 0, 8),
	(362, 1, 7802, 0, 0, 0, 0, 0, 8),
	(363, 1, 7803, 0, 0, 0, 0, 0, 8),
	(364, 1, 7949, 0, 0, 0, 0, 0, 8),
	(365, 1, 7950, 0, 0, 0, 0, 0, 8),
	(366, 1, 7954, 0, 0, 0, 0, 0, 8),
	(367, 1, 7959, 0, 0, 0, 0, 0, 8),
	(368, 1, 7962, 0, 0, 0, 0, 0, 8),
	(369, 1, 7966, 0, 0, 0, 0, 0, 8),
	(370, 1, 7967, 0, 0, 0, 0, 0, 8),
	(371, 1, 7970, 0, 0, 0, 0, 0, 8),
	(372, 1, 8019, 0, 0, 0, 0, 0, 8),
	(373, 1, 8419, 0, 0, 0, 0, 0, 8),
	(374, 1, 8471, 0, 0, 0, 0, 0, 8),
	(375, 1, 8472, 0, 0, 0, 0, 0, 8),
	(376, 1, 8498, 0, 0, 0, 0, 0, 8),
	(377, 1, 8499, 0, 0, 0, 0, 0, 8),
	(378, 11, 8503, 33, 0, 0, 22, 0, 8),
	(379, 6, 8506, 0, 0, 0, 0, 0, 8),
	(380, 15, 8508, 0, 0, 0, 0, 0, 8),
	(1376, 1, 11156, 0, 0, 0, 0, 0, 7),
	(1377, 1, 11160, 444, 3232, 0, 0, 0, 7),
	(1378, 1, 11161, 0, 222, 0, 0, 222, 5),
	(1379, 13, 1002, 0, 20, 0, 0, 0, 1);

-- Dumping structure for table gichecker.interest
DROP TABLE IF EXISTS `interest`;
CREATE TABLE IF NOT EXISTS `interest` (
  `interest_id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`interest_id`) USING BTREE,
  KEY `id` (`interest_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='interest list';

-- Dumping data for table gichecker.interest: 8 rows
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
REPLACE INTO `interest` (`interest_id`, `interest_name`) VALUES
	(1, 'খাস জমি (১ম খন্ড)'),
	(2, 'খাস জমি (২য় খন্ড)'),
	(3, 'খাস জমি (৩য় খন্ড)'),
	(4, 'খাস জমি (৪র্থ খন্ড)'),
	(5, 'অর্পিত সম্পত্তি (ক তালিকা)'),
	(6, 'অর্পিত সম্পত্তি (খ তালিকা)'),
	(7, 'দেবোত্তর সম্পত্তি'),
	(8, 'ওয়াকফ সম্পত্তি');
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;

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

-- Dumping data for table gichecker.mouja: 29 rows
/*!40000 ALTER TABLE `mouja` DISABLE KEYS */;
REPLACE INTO `mouja` (`id`, `name`, `sa_jl`, `bs_jl`) VALUES
	(1, 'মিউনিসিপ্যালিটি', 91, NULL),
	(2, 'বরইকান্দি', 116, 6),
	(3, 'খোজারখলা', 113, 7),
	(4, 'পিরিজপুর', 114, 9),
	(5, 'ধরাধরপুর', 115, 8),
	(6, 'গুধরাইল', 126, 10),
	(7, 'হবিনন্দী', 107, 14),
	(8, 'মনিপুর', 10, 13),
	(9, 'আলমপুর', 109, 12),
	(10, 'গোটাটিকর', 110, 11),
	(11, 'কুমারগাঁও', 80, NULL),
	(12, 'মইয়ারচর', 81, 37),
	(13, 'খুরুমখলা শাহপুর', 82, 36),
	(14, 'আখালিয়া', 88, NULL),
	(15, 'ব্রাহ্মন শাসন', 77, NULL),
	(16, 'বাগবাড়ী', 90, NULL),
	(17, 'তারাপুর টি গার্ডেন', 76, 73),
	(18, 'আম্বরখানা', 92, NULL),
	(19, 'টিলাগড়', 95, NULL),
	(20, 'দেবপুর', 96, NULL),
	(21, 'পেশনেওয়াজ', 102, 85),
	(22, 'সাদিপুর ১ম খন্ড', 93, NULL),
	(23, 'সাদিপুর ২য় খন্ড', 98, NULL),
	(24, 'টুলটিকর', 99, NULL),
	(25, 'সুলতানপুর চক', 101, 84),
	(26, 'কসবা কুইটুক', 100, 83),
	(27, 'রায়নগর', 97, NULL),
	(28, 'মোমিনখলা', 111, NULL),
	(29, 'ভার্থখলা', 112, 77);
/*!40000 ALTER TABLE `mouja` ENABLE KEYS */;

-- Dumping structure for table gichecker.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `field_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'à¦®à¦¹à¦¾à¦¨à¦—à¦° à¦°à¦¾à¦œà¦¸à§à¦¬ à¦¸à¦¾à¦°à§à¦•à§‡à¦²',
  `field_value` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'à¦®à¦¹à¦¾à¦¨à¦—à¦° à¦°à¦¾à¦œà¦¸à§à¦¬ à¦¸à¦¾à¦°à§à¦•à§‡à¦²'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gichecker.settings: 1 rows
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
REPLACE INTO `settings` (`field_name`, `field_value`) VALUES
	('office_name', 'উপজেলা ভূমি অফিস, বালাগঞ্জ, সিলেট');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

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

-- Dumping data for table gichecker.users: 1 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `password`, `email`, `officer_name`, `officer_designation`, `created_at`, `image`) VALUES
	(2, 'admin', '$2y$10$iAin4aW/BZpNNVmzJ9uaKuZzcrAynqg0HznusLZqNXB5HfQxJY.qq', NULL, 'পলাশ মন্ডল', 'সহকারী কমিশনার (ভূমি)', '2022-04-21 18:29:14', 'profile_picture.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
