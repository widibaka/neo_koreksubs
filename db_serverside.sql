-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Agu 2017 pada 10.25
-- Versi Server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_serverside`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(40) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_email`, `user_alamat`) VALUES
(1, 'User ke-1', 'email@gmail.com', 'Alamat ke-1'),
(2, 'User ke-2', 'email@gmail.com', 'Alamat ke-2'),
(3, 'User ke-3', 'email@gmail.com', 'Alamat ke-3'),
(4, 'User ke-4', 'email@gmail.com', 'Alamat ke-4'),
(5, 'User ke-5', 'email@gmail.com', 'Alamat ke-5'),
(6, 'User ke-6', 'email@gmail.com', 'Alamat ke-6'),
(7, 'User ke-7', 'email@gmail.com', 'Alamat ke-7'),
(8, 'User ke-8', 'email@gmail.com', 'Alamat ke-8'),
(9, 'User ke-9', 'email@gmail.com', 'Alamat ke-9'),
(10, 'User ke-10', 'email@gmail.com', 'Alamat ke-10'),
(11, 'User ke-11', 'email@gmail.com', 'Alamat ke-11'),
(12, 'User ke-12', 'email@gmail.com', 'Alamat ke-12'),
(13, 'User ke-13', 'email@gmail.com', 'Alamat ke-13'),
(14, 'User ke-14', 'email@gmail.com', 'Alamat ke-14'),
(15, 'User ke-15', 'email@gmail.com', 'Alamat ke-15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
