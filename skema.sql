-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table bisajoin.birthday_orders
CREATE TABLE IF NOT EXISTS `birthday_orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `template_id` int unsigned NOT NULL,
  `birthday_person_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int unsigned DEFAULT NULL,
  `birthday_date` date NOT NULL,
  `birthday_time` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `location` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT '2025-09-13 08:08:27',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `birthday_orders_template_id_foreign` (`template_id`),
  CONSTRAINT `birthday_orders_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table bisajoin.engagement_orders
CREATE TABLE IF NOT EXISTS `engagement_orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `template_id` int unsigned NOT NULL,
  `man_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `woman_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `engagement_date` date NOT NULL,
  `engagement_time` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `location` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT '2025-09-13 08:08:27',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `engagement_orders_template_id_foreign` (`template_id`),
  CONSTRAINT `engagement_orders_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table bisajoin.graduation_orders
CREATE TABLE IF NOT EXISTS `graduation_orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `template_id` int unsigned NOT NULL,
  `graduate_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `faculty` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `graduation_date` date NOT NULL,
  `graduation_time` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `location` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT '2025-09-13 08:08:27',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `graduation_orders_template_id_foreign` (`template_id`),
  CONSTRAINT `graduation_orders_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table bisajoin.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table bisajoin.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(10,2) unsigned NOT NULL,
  `method` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unpaid',
  `paid_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2025-09-13 08:08:27',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table bisajoin.telegram_logs
CREATE TABLE IF NOT EXISTS `telegram_logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT '2025-09-13 08:08:27',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table bisajoin.templates
CREATE TABLE IF NOT EXISTS `templates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `preview_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content_structure` text COLLATE utf8mb4_general_ci,
  `created_at` datetime NOT NULL DEFAULT '2025-09-13 08:08:27',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table bisajoin.wedding_orders
CREATE TABLE IF NOT EXISTS `wedding_orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `template_id` int unsigned NOT NULL,
  `id_peyment` int DEFAULT NULL,
  `groom_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bride_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `wedding_date` date NOT NULL,
  `wedding_time` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `location` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT '2025-09-13 08:08:27',
  PRIMARY KEY (`id`),
  KEY `wedding_orders_template_id_foreign` (`template_id`),
  CONSTRAINT `wedding_orders_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
