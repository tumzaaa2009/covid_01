-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.37 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for saraburi
CREATE DATABASE IF NOT EXISTS `saraburi` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `saraburi`;

-- Dumping structure for table saraburi.covid_user
CREATE TABLE IF NOT EXISTS `covid_user` (
  `covid_id` int(11) NOT NULL AUTO_INCREMENT,
  `covid_user` varchar(50) NOT NULL,
  `covid_pass` varchar(50) DEFAULT NULL,
  `covid_first` varchar(100) DEFAULT NULL,
  `covid_last` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `user_type` varchar(3) NOT NULL,
  PRIMARY KEY (`covid_id`,`covid_user`),
  KEY `ckun_id` (`covid_id`) USING BTREE,
  KEY `ckun_user` (`covid_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table saraburi.covid_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `covid_user` DISABLE KEYS */;
INSERT INTO `covid_user` (`covid_id`, `covid_user`, `covid_pass`, `covid_first`, `covid_last`, `last_login`, `status`, `user_type`) VALUES
	(1, 'dewpawat', '12345678', 'ภาวัต', 'ธนิทธิกุล', '2020-03-26 11:03:18', 'Y', '01'),
	(2, 'admin', 'a12345678', 'งานระบาดวิทยา', 'กลุ่มงานควบคุมโรค', '2020-03-24 12:43:54', 'Y', '01'),
	(3, 'ncd', 'b12345678', 'NCD', NULL, '2019-12-23 18:04:16', 'Y', '02'),
	(4, 'admin2', 'c12345678', NULL, NULL, NULL, 'Y', '01');
/*!40000 ALTER TABLE `covid_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
