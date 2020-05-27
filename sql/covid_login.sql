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

-- Dumping structure for table saraburi.covid_login
CREATE TABLE IF NOT EXISTS `covid_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `covid_user` varchar(50) DEFAULT NULL,
  `login_date` datetime DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Dumping data for table saraburi.covid_login: ~33 rows (approximately)
/*!40000 ALTER TABLE `covid_login` DISABLE KEYS */;
INSERT INTO `covid_login` (`login_id`, `covid_user`, `login_date`, `ip`) VALUES
	(1, 'dewpawat', '2020-03-13 11:30:49', '::1'),
	(2, 'dewpawat', '2020-03-13 13:13:15', '::1'),
	(3, 'dewpawat', '2020-03-13 13:14:38', '::1'),
	(4, 'dewpawat', '2020-03-13 14:24:24', '::1'),
	(5, 'dewpawat', '2020-03-16 09:36:48', '::1'),
	(6, 'dewpawat', '2020-03-18 14:55:26', '::1'),
	(7, 'dewpawat', '2020-03-19 08:59:35', '::1'),
	(8, 'dewpawat', '2020-03-19 15:37:03', '203.157.115.86'),
	(9, 'admin', '2020-03-19 16:45:51', '134.236.251.195'),
	(10, 'dewpawat', '2020-03-20 12:39:17', '203.157.115.86'),
	(11, 'dewpawat', '2020-03-20 17:58:30', '203.157.115.86'),
	(12, 'dewpawat', '2020-03-21 15:57:10', '49.48.247.193'),
	(13, 'admin', '2020-03-22 13:59:35', '49.48.247.193'),
	(14, 'admin', '2020-03-22 16:19:15', '118.173.94.230'),
	(15, 'dewpawat', '2020-03-23 09:47:59', '::1'),
	(16, 'dewpawat', '2020-03-23 09:47:59', '::1'),
	(17, 'dewpawat', '2020-03-23 12:15:34', '::1'),
	(18, 'dewpawat', '2020-03-23 14:43:01', '::1'),
	(19, 'dewpawat', '2020-03-23 15:54:12', '203.157.115.86'),
	(20, 'dewpawat', '2020-03-23 16:09:45', '118.173.90.115'),
	(21, 'admin', '2020-03-23 16:44:56', '118.173.90.115'),
	(22, 'admin', '2020-03-23 17:22:05', '118.173.90.115'),
	(23, 'dewpawat', '2020-03-23 17:29:09', '49.48.247.193'),
	(24, 'dewpawat', '2020-03-23 23:05:17', '202.143.175.106'),
	(25, 'dewpawat', '2020-03-24 09:39:34', '::1'),
	(26, 'admin', '2020-03-24 11:50:21', '134.236.251.195'),
	(27, 'admin', '2020-03-24 12:43:54', '118.172.126.70'),
	(28, 'dewpawat', '2020-03-25 11:20:57', '::1'),
	(29, 'dewpawat', '2020-03-26 08:34:37', '::1'),
	(30, 'dewpawat', '2020-03-26 11:03:18', '::1'),
	(31, 'dewpawat', '2020-03-26 14:44:33', '::1'),
	(32, 'dewpawat', '2020-03-26 14:44:33', '::1'),
	(33, 'dewpawat', '2020-03-26 14:44:54', '::1');
/*!40000 ALTER TABLE `covid_login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
