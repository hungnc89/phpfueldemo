-- --------------------------------------------------------
-- Host:                         127.127.126.53
-- Server version:               11.2.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table defuel.defuel_customers: ~9 rows (approximately)
INSERT INTO `defuel_customers` (`id`, `name`, `email`, `address`, `phone`, `sex`, `created_at`, `updated_at`) VALUES
	(9, 'Nguyen Cong Hung', 'hungnc89@gmail.com', 'L2011 xuan mai complex', '0967977248', 1, 1739154718, 1739154718),
	(48, 'Nguyen Cong Hung', 'hungnc891@gmail.com', 'L2011 xuan mai complex', '0967977248', 1, 1739163329, 1739163329),
	(49, 'Nguyen Cong Hung', 'hungnc893333@gmail.com', 'L2011 xuan mai complex', '0967977248', 1, 1739163699, 1739163699),
	(50, 'Nguyen Cong Hung', 'hungnc894444444@gmail.com', 'L2011 xuan mai complex', '0967977248', 1, 1739166895, 1739166895),
	(52, 'Nguyen Cong Hung', 'hungnc8945345345@gmail.com', 'L2011 xuan mai complex', '0967977248', 1, 1739168806, 1739168806),
	(53, 'Nguyen Cong Hung', 'hungnc8923123123123123@gmail.com', 'L2011 xuan mai complex', '0967977248', 1, 1739169194, 1739169194),
	(54, 'Nguyen Cong Hung', 'hungnc@gmail.com', 'L2011 xuan mai complex', '0967977248', 1, 1739169228, 1739179511),
	(55, 'Nguyen Cong Hung', 'hungnc892222222@gmail.com', 'L2011 xuan mai complex', '0967977248', 0, 1739169414, 1739180620),
	(57, 'Nguyen Cong Hung', 'hungnc8s9@gmail.com', 'L2011 xuan mai complex', '0967977248', 1, 1739175021, 1739180593);

-- Dumping data for table defuel.defuel_migration: ~12 rows (approximately)
INSERT INTO `defuel_migration` (`type`, `name`, `migration`) VALUES
	('package', 'auth', '001_auth_create_usertables'),
	('package', 'auth', '002_auth_create_grouptables'),
	('package', 'auth', '003_auth_create_roletables'),
	('package', 'auth', '004_auth_create_permissiontables'),
	('package', 'auth', '005_auth_create_authdefaults'),
	('package', 'auth', '006_auth_add_authactions'),
	('package', 'auth', '007_auth_add_permissionsfilter'),
	('package', 'auth', '008_auth_create_providers'),
	('package', 'auth', '009_auth_create_oauth2tables'),
	('package', 'auth', '010_auth_fix_jointables'),
	('package', 'auth', '011_auth_group_optional'),
	('app', 'default', '001_create_customers');

-- Dumping data for table defuel.defuel_users: ~1 rows (approximately)
INSERT INTO `defuel_users` (`id`, `username`, `password`, `group`, `email`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`) VALUES
	(4, 'hungnc89', 'VP1StYx4xqQkCg+QLS8pBmWcZeZx0ajt7pw3AQ3X4W8=', 1, 'hungnc89@gmail.com', '1739181141', 'ed3d5537355b5774c5a7cd88463d7632ce3c0944', 'a:0:{}', 1738895676, 0);

-- Dumping data for table defuel.defuel_users_clients: ~0 rows (approximately)

-- Dumping data for table defuel.defuel_users_providers: ~0 rows (approximately)

-- Dumping data for table defuel.defuel_users_scopes: ~0 rows (approximately)

-- Dumping data for table defuel.defuel_users_sessions: ~0 rows (approximately)

-- Dumping data for table defuel.defuel_users_sessionscopes: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
