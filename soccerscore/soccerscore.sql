-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2013 at 03:22 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movievanue`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(200) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `stars` text,
  `img_url` text,
  `summary` varchar(500) DEFAULT NULL,
  `id_tipe_barang` int(10) DEFAULT NULL,
  `id_negara` int(10) DEFAULT NULL COMMENT 'if movie',
  `id_quality` int(4) DEFAULT NULL COMMENT 'if movie',
  `datetime_post` datetime DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL COMMENT 'ditulis 30MB, 15GB',
  `imdb_link` tinytext,
  `youtube_link` text,
  PRIMARY KEY (`id_barang`),
  KEY `id_tipe_barang` (`id_tipe_barang`),
  KEY `id_negara` (`id_negara`),
  KEY `id_quality` (`id_quality`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `release_date`, `stars`, `img_url`, `summary`, `id_tipe_barang`, `id_negara`, `id_quality`, `datetime_post`, `size`, `imdb_link`, `youtube_link`) VALUES
(49, '12 World War Z', NULL, NULL, './storage/barang/12-World-War-Z-2013-1-1.jpg', 'United Nations employee Gerry Lane traverses the world in a race against time to stop the Zombie pandemic that is toppling armies and governments, and threatening to destroy humanity itself.', 1, 1, 1, '2013-06-21 16:11:29', '4 GB', 'http://www.imdb.com/title/tt0816711/?ref_=hm_inth_t1', 'http://www.youtube.com/embed/HcwTxRuq-uk'),
(50, 'Breakup at a Wedding', '0000-00-00', NULL, './storage/barang/Breakup-at-a-Wedding--1-1.jpg', 'A videographer captures an engaged couple''s decision to proceed with a sham wedding after the bride calls off the ceremony and decides to break up with her partner, who secretly hopes that his surprise gift will ultimately change her mind.', 1, 1, 1, '2013-06-21 19:05:01', '1 GB', 'http://www.imdb.com/title/tt1935300/', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_has_label`
--

CREATE TABLE IF NOT EXISTS `barang_has_label` (
  `id_barang_has_genre` int(10) NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) DEFAULT NULL,
  `id_label` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_barang_has_genre`),
  KEY `id_barang` (`id_barang`),
  KEY `id_genre` (`id_label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `barang_has_label`
--

INSERT INTO `barang_has_label` (`id_barang_has_genre`, `id_barang`, `id_label`) VALUES
(50, 49, 28),
(51, 49, 3),
(52, 50, 2),
(53, 50, 29);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `id_barang` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `id_teransaksi` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_keranjang`),
  KEY `id_user` (`id_user`),
  KEY `id_barang` (`id_barang`),
  KEY `id_teransaksi` (`id_teransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `id_label` int(10) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`id_label`, `label`) VALUES
(1, 'horor'),
(2, 'romance'),
(3, 'action'),
(23, 'super hero'),
(24, 'epic'),
(25, 'scify'),
(26, 'misteri'),
(27, 'triler'),
(28, '2013'),
(29, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE IF NOT EXISTS `negara` (
  `id_negara` int(10) NOT NULL AUTO_INCREMENT,
  `negara` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_negara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id_negara`, `negara`) VALUES
(1, 'USA'),
(2, 'Indonesia'),
(3, 'Japan'),
(4, 'Thai'),
(5, 'Korea'),
(6, 'China');

-- --------------------------------------------------------

--
-- Table structure for table `quality`
--

CREATE TABLE IF NOT EXISTS `quality` (
  `id_quality` int(4) NOT NULL AUTO_INCREMENT,
  `quality_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_quality`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quality`
--

INSERT INTO `quality` (`id_quality`, `quality_name`) VALUES
(1, 'Bluray 1080'),
(2, 'Bluray 720'),
(3, 'DVD RIP');

-- --------------------------------------------------------

--
-- Table structure for table `teransaksi`
--

CREATE TABLE IF NOT EXISTS `teransaksi` (
  `id_teransaksi` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT NULL,
  `jumlah bayar` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_teransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_barang`
--

CREATE TABLE IF NOT EXISTS `tipe_barang` (
  `id_tipe_barang` int(10) NOT NULL AUTO_INCREMENT,
  `nama_tipe_barang` varchar(50) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL COMMENT 'harga per biji',
  PRIMARY KEY (`id_tipe_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tipe_barang`
--

INSERT INTO `tipe_barang` (`id_tipe_barang`, `nama_tipe_barang`, `harga`) VALUES
(1, 'movie', 2500),
(2, 'softwere', 3000),
(3, 'game', 10000),
(4, 'apk', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_tipe_barang`) REFERENCES `tipe_barang` (`id_tipe_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_negara`) REFERENCES `negara` (`id_negara`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_quality`) REFERENCES `quality` (`id_quality`);

--
-- Constraints for table `barang_has_label`
--
ALTER TABLE `barang_has_label`
  ADD CONSTRAINT `barang_has_label_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `barang_has_label_ibfk_3` FOREIGN KEY (`id_label`) REFERENCES `label` (`id_label`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_teransaksi`) REFERENCES `teransaksi` (`id_teransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
