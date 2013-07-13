-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2013 at 07:12 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
