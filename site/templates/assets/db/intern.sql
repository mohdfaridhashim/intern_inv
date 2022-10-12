-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
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

-- Dumping structure for table intern_inv.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table intern_inv.admins: ~2 rows (approximately)
INSERT IGNORE INTO `admins` (`admin_id`, `username`, `password`) VALUES
	(2, 'izzaty', '88a0d1956671a3c23e960861bc03c6e7'),
	(3, 'admin', 'd00f5d5217896fb7fd601412cb890830');

-- Dumping structure for table intern_inv.application
CREATE TABLE IF NOT EXISTS `application` (
  `app_id` int(255) NOT NULL AUTO_INCREMENT,
  `inv_id` int(255) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_contact` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `return_date` date NOT NULL,
  `app_qty` int(255) NOT NULL,
  `app_purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table intern_inv.application: ~2 rows (approximately)
INSERT IGNORE INTO `application` (`app_id`, `inv_id`, `staff_name`, `staff_contact`, `start_date`, `return_date`, `app_qty`, `app_purpose`) VALUES
	(1, 1, 'Izzaty', '01114434084', '2022-09-21', '2022-09-23', 2, 'Referencing'),
	(2, 1, 'Amirah', '0172696454', '2022-09-11', '2022-09-21', 5, 'Referencing');

-- Dumping structure for table intern_inv.inventory
CREATE TABLE IF NOT EXISTS `inventory` (
  `inv_id` int(255) NOT NULL AUTO_INCREMENT,
  `inv_img` blob NOT NULL,
  `inv_name` varchar(255) NOT NULL,
  `inv_qty` int(255) NOT NULL,
  `inv_active` int(11) NOT NULL,
  `inv_status` int(11) NOT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table intern_inv.inventory: ~1 rows (approximately)
INSERT IGNORE INTO `inventory` (`inv_id`, `inv_img`, `inv_name`, `inv_qty`, `inv_active`, `inv_status`) VALUES
	(1, _binary '', 'laptop', 10, 1, 1);

-- Dumping structure for table intern_inv.returns
CREATE TABLE IF NOT EXISTS `returns` (
  `return_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table intern_inv.returns: ~0 rows (approximately)

-- Dumping structure for table intern_inv.staffs
CREATE TABLE IF NOT EXISTS `staffs` (
  `staff_id` int(255) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) NOT NULL,
  `staff_username` varchar(255) NOT NULL,
  `staff_pass` varchar(255) NOT NULL,
  `staff_contact` varchar(255) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table intern_inv.staffs: ~4 rows (approximately)
INSERT IGNORE INTO `staffs` (`staff_id`, `staff_name`, `staff_username`, `staff_pass`, `staff_contact`) VALUES
	(1, 'Amirah', 'amirah', '275cfb362ea96abcaabedb75aa8b6e8a', '0123456789'),
	(23, 'Izzaty', 'izzaty', '88a0d1956671a3c23e960861bc03c6e7', '0333241566'),
	(24, 'Haikal', 'haikal', 'a847b53f9999fc735ca2b6f1419c93d0', '01122334455'),
	(25, 'Hamzah', 'hamzah', 'd7fa34a9a47ee0f5fd620de7a326ef4a', '0126549852');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
