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


-- Dumping database structure for r4
CREATE DATABASE IF NOT EXISTS `r4` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `r4`;

-- Dumping structure for table r4.covid_information_detail_r4
CREATE TABLE IF NOT EXISTS `covid_information_detail_r4` (
  `covid_inf_detail_id` int(11) DEFAULT NULL,
  `covid_inf_detail_name` varchar(255) DEFAULT NULL,
  `covid_inf_detail_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table r4.covid_information_detail_r4: ~0 rows (approximately)
/*!40000 ALTER TABLE `covid_information_detail_r4` DISABLE KEYS */;
/*!40000 ALTER TABLE `covid_information_detail_r4` ENABLE KEYS */;

-- Dumping structure for table r4.covid_information_head_r4
CREATE TABLE IF NOT EXISTS `covid_information_head_r4` (
  `covid_inf_head_id` int(11) NOT NULL,
  `covid_inf_head_date` date DEFAULT NULL,
  PRIMARY KEY (`covid_inf_head_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table r4.covid_information_head_r4: ~0 rows (approximately)
/*!40000 ALTER TABLE `covid_information_head_r4` DISABLE KEYS */;
/*!40000 ALTER TABLE `covid_information_head_r4` ENABLE KEYS */;

-- Dumping structure for table r4.covid_information_type_r4
CREATE TABLE IF NOT EXISTS `covid_information_type_r4` (
  `covid_information_type_id` int(11) NOT NULL,
  `covid_information_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`covid_information_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table r4.covid_information_type_r4: ~2 rows (approximately)
/*!40000 ALTER TABLE `covid_information_type_r4` DISABLE KEYS */;
INSERT INTO `covid_information_type_r4` (`covid_information_type_id`, `covid_information_type_name`) VALUES
	(1, 'InforGraphic'),
	(2, 'ข่าวประชาสัมพันธ์');
/*!40000 ALTER TABLE `covid_information_type_r4` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
