-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour patisseriedb
DROP DATABASE IF EXISTS `patisseriedb`;
CREATE DATABASE IF NOT EXISTS `patisseriedb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `patisseriedb`;

-- Listage de la structure de table patisseriedb. categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `order` int DEFAULT '1',
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=472 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table patisseriedb. menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `cover_img` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table patisseriedb. reviews
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `review` text NOT NULL,
  `rating` int NOT NULL,
  `menu_id` bigint unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table patisseriedb. roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table patisseriedb. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lastname` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `firstname` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(2000) DEFAULT NULL,
  `phone` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `role_id` bigint unsigned DEFAULT '3',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;



-- Listage des données de la table patisseriedb.categories : ~4 rows (environ)
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `order`, `is_active`, `created_at`, `updated_at`, `parent_id`) VALUES
	(468, 'Entremets', 'entremets', 'Catégorie des entremets', 1, 1, NULL, NULL, 1),
	(469, 'Muffins', 'muffins', 'catégorie des muffins', 1, 1, NULL, NULL, 1),
	(470, 'tartes', 'tartes', 'présentation des tartes', 1, 1, NULL, NULL, 1),
	(471, 'macarons', 'macarons', 'Présentation des macarons', 1, 1, NULL, NULL, 0);

-- Listage des données de la table patisseriedb.menus : ~7 rows (environ)
INSERT INTO `menus` (`id`, `category_id`, `name`, `slug`, `cover_img`, `description`, `price`, `created_at`, `updated_at`) VALUES
	(2, 1, 'Tempor erat elitr rebum clita. Diam dolor diam ipsum erat lorem sed stet labore lorem sit clita duo', 'tempor-erat', '2_1540303791_94_23-w768.png', ' Tempor erat elitr at rebum at at clita. Diam dolor diam ipsum et tempor sit. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet magna', 12.00, NULL, NULL),
	(3, 467, 'Entremets', 'entremets', '2_1540303791_94_23-w768.png', ' entremets à saveur irrésistible, si vous mangez vous allez vous mordre les doigts.', 12.00, NULL, NULL),
	(4, 468, 'entremet chocolat', 'entremet-chocolat', '241-2413641_all-type-of-grocery-items-available-grocery-items.png', ' entremet chocolat, fait à base de chocolat, très bon pour les repas en famille', 15.00, NULL, NULL),
	(5, 468, 'entremet au fraises', 'entremet-au-fraises', '241-2413641_all-type-of-grocery-items-available-grocery-items.png', ' Entremet fait à base de fraises, très délicieux', 16.00, NULL, NULL),
	(6, 468, 'entremets aux cerises', 'entremet-au-cerises', '2_1540303791_94_23-w768.png', '  C\'est un repas, qui se mange depuis des millénaires et est connu de tous, entremet aux cerises ', 20.00, NULL, NULL);

-- Listage des données de la table patisseriedb.reviews : ~4 rows (environ)
INSERT INTO `reviews` (`id`, `user_id`, `review`, `rating`, `menu_id`, `created_at`, `updated_at`) VALUES
	(2, 12, 'salut comment tu vas ?', 4, 5, NULL, NULL);

-- Listage des données de la table patisseriedb.roles : ~3 rows (environ)
INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', '2021-10-28 20:34:10', '2021-10-28 20:34:10'),
	(2, 'moderator', 'Moderator', '2021-10-25 09:01:26', '2021-10-25 09:01:26'),
	(3, 'user', 'Normal User', '2021-10-28 20:34:33', '2021-10-28 20:34:33');

-- Listage des données de la table patisseriedb.users : ~3 rows (environ)
INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `phone`, `role_id`, `created_at`, `updated_at`) VALUES
	(11, 'john', 'do', 'do@gmail.com', '$2y$10$XXO9rsO72rIa46JZXpZtTeXKpEgrGXVuyLFcliWq.TNHkqlfKh.uW', '3344593506', 3, NULL, NULL),
	(12, 'john', 'do', 'dos@gmail.com', '$2y$10$OufrAn0Ou2r1PLHpIzEHOuIJAEqVgicwrdsMfxGgxwPbAiGxeLVuy', '3344593506', 1, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
