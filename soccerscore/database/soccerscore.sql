-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2013 at 08:01 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soccerscore`
--

-- --------------------------------------------------------

--
-- Table structure for table `dom`
--

CREATE TABLE IF NOT EXISTS `dom` (
  `id_dom` int(10) NOT NULL AUTO_INCREMENT,
  `id_team` int(4) DEFAULT NULL,
  `competition` tinytext,
  `date` date DEFAULT NULL,
  `score1` int(2) DEFAULT NULL,
  `score2` int(2) DEFAULT NULL,
  `status_tanding` int(1) DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id_dom`),
  KEY `id_team` (`id_team`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE IF NOT EXISTS `negara` (
  `id_negara` int(10) NOT NULL AUTO_INCREMENT,
  `negara` tinytext,
  PRIMARY KEY (`id_negara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id_negara`, `negara`) VALUES
(1, 'Jerman'),
(2, 'England'),
(3, 'Spanyol');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id_team` int(4) NOT NULL AUTO_INCREMENT,
  `id_negara` int(4) DEFAULT NULL,
  `team` tinytext,
  `link` text,
  PRIMARY KEY (`id_team`),
  KEY `id_negara` (`id_negara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `id_negara`, `team`, `link`) VALUES
(3, 3, 'Barcelona', 'http://id.soccerway.com/teams/spain/futbol-club-barcelona/2017/matches/'),
(4, 2, 'Manchester City', 'http://id.soccerway.com/teams/england/manchester-city-football-club/676/matches/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext,
  `password` tinytext,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'andre', '5c6eb33c0b5d91d5bfec9106022dd1f1'),
(2, 'iwak', 'a91b26f0935afd36e82a8745016f031e'),
(3, 'hakz', 'cd53c51c24c357f51f54dd291695409f');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
