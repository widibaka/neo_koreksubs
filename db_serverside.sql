-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_serverside.tbl_file
DROP TABLE IF EXISTS `tbl_file`;
CREATE TABLE IF NOT EXISTS `tbl_file` (
  `id_file` varchar(20) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `nama_file` varchar(250) DEFAULT '-',
  `links` text DEFAULT '-',
  `waktu` datetime DEFAULT NULL,
  `episode` char(5) DEFAULT '0',
  `anime_id` varchar(50) DEFAULT '0',
  `website` varchar(50) DEFAULT '',
  `id_user` int(11) DEFAULT 0,
  PRIMARY KEY (`id_file`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_serverside.tbl_file: ~1 rows (approximately)
DELETE FROM `tbl_file`;
/*!40000 ALTER TABLE `tbl_file` DISABLE KEYS */;
INSERT INTO `tbl_file` (`id_file`, `nama_file`, `links`, `waktu`, `episode`, `anime_id`, `website`, `id_user`) VALUES
	('61630a2a5daf4', '[PendekarSubs] 86 - Eighty-Six - 01 [720p].mkv', 'GoogleDrive#pembatas2#https://animetosho.org/view/ssa-boruto-naruto-next-generations-219-480p-mkv.n1442213#pembatas1#Zippyshare#pembatas2#https://animetosho.org/view/ssa-boruto-naruto-next-generations-219-480p-mkv.n1442213#pembatas1#', '2021-10-11 00:42:22', '01', '43066', 'https://koreksoftware.tech', 4),
	('616311c161d26', '[PendekarSubs] Takt Op. Destiny - 01 [720p].mkv', 'GoogleDrive#pembatas2#https://animetosho.org/episode/mieruko-chan-2.246473#pembatas1#Mieruko#pembatas2#https://animetosho.org/episode/mieruko-chan-2.246473#pembatas1#', '2021-10-11 01:02:51', '01', '44233', '#', 4);
/*!40000 ALTER TABLE `tbl_file` ENABLE KEYS */;

-- Dumping structure for table db_serverside.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `waktu_daftar` datetime DEFAULT NULL,
  `diblokir` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_serverside.tbl_user: ~0 rows (approximately)
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_user`, `email`, `name`, `waktu_daftar`, `diblokir`) VALUES
	(4, 'widibaka55@gmail.com', 'widi baka', '2021-10-10 12:37:06', '0'),
	(5, 'widi_dwi@fikom.udb.ac.id', 'WIDI DWI NURCAHYO', '2021-10-10 22:59:44', '0');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
