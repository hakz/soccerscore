-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2013 at 02:15 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `judibola`
--

-- --------------------------------------------------------

--
-- Table structure for table `dom`
--

CREATE TABLE IF NOT EXISTS `dom` (
  `id_dom` int(10) NOT NULL AUTO_INCREMENT,
  `id_team` int(4) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `score1` int(2) DEFAULT NULL,
  `score2` int(2) DEFAULT NULL,
  `status_tanding` int(1) DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id_dom`),
  KEY `id_team` (`id_team`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `dom`
--

INSERT INTO `dom` (`id_dom`, `id_team`, `date`, `score1`, `score2`, `status_tanding`, `time`) VALUES
(101, 1, '2013-01-05', 2, 2, 1, '00:00:00'),
(102, 1, '2013-01-13', 2, 1, 1, '00:00:00'),
(103, 1, '2013-01-16', 1, 0, 1, '00:00:00'),
(104, 1, '2013-01-20', 1, 1, 1, '00:00:00'),
(105, 1, '2013-01-26', 4, 1, 1, '00:00:00'),
(106, 1, '2013-01-30', 2, 1, 1, '00:00:00'),
(107, 1, '2013-02-02', 0, 1, 1, '00:00:00'),
(108, 1, '2013-02-10', 2, 0, 1, '00:00:00'),
(109, 1, '2013-02-13', 1, 1, 1, '00:00:00'),
(110, 1, '2013-02-18', 2, 1, 1, '00:00:00'),
(111, 1, '2013-02-23', 0, 2, 1, '00:00:00'),
(112, 1, '2013-03-02', 4, 0, 1, '00:00:00'),
(113, 1, '2013-03-05', 1, 2, 1, '00:00:00'),
(114, 1, '2013-03-10', 2, 2, 1, '00:00:00'),
(115, 1, '2013-03-16', 1, 0, 1, '00:00:00'),
(116, 1, '2013-03-30', 0, 1, 1, '00:00:00'),
(117, 1, '2013-04-01', 1, 0, 1, '00:00:00'),
(118, 1, '2013-04-08', 1, 2, 1, '00:00:00'),
(119, 1, '2013-04-14', 0, 2, 1, '00:00:00'),
(120, 1, '2013-04-17', 2, 2, 1, '00:00:00'),
(121, 1, '2013-04-22', 3, 0, 1, '00:00:00'),
(122, 1, '2013-04-28', 1, 1, 1, '00:00:00'),
(123, 1, '2013-05-05', 0, 1, 1, '00:00:00'),
(124, 1, '2013-05-12', 2, 1, 1, '00:00:00'),
(125, 1, '2013-05-19', 5, 5, 1, '00:00:00'),
(126, 1, '2013-07-23', 0, 0, 0, '12:20:00'),
(127, 1, '2013-07-26', 0, 0, 0, '12:00:00'),
(128, 1, '2013-07-29', 0, 0, 0, '14:00:00'),
(129, 1, '2013-08-06', 0, 0, 0, '19:30:00'),
(130, 1, '2013-08-09', 0, 0, 0, '20:30:00'),
(131, 1, '2013-08-11', 0, 0, 0, '15:00:00'),
(132, 1, '2013-08-17', 0, 0, 0, '18:30:00'),
(133, 1, '2013-08-26', 0, 0, 0, '21:00:00'),
(134, 1, '2013-09-01', 0, 0, 0, '14:30:00'),
(135, 1, '2013-09-14', 0, 0, 0, '13:45:00'),
(136, 1, '2013-09-22', 0, 0, 0, '17:00:00'),
(137, 1, '2013-09-28', 0, 0, 0, '16:00:00'),
(138, 1, '2013-10-05', 0, 0, 0, '18:30:00'),
(139, 1, '2013-10-19', 0, 0, 0, '16:00:00'),
(140, 1, '2013-10-26', 0, 0, 0, '16:00:00'),
(141, 1, '2013-11-02', 0, 0, 0, '16:00:00'),
(142, 1, '2013-11-10', 0, 0, 0, '17:10:00'),
(143, 1, '2013-11-24', 0, 0, 0, '17:00:00'),
(144, 1, '2013-11-30', 0, 0, 0, '13:45:00'),
(145, 1, '2013-12-03', 0, 0, 0, '20:45:00'),
(146, 1, '2013-12-07', 0, 0, 0, '16:00:00'),
(147, 1, '2013-12-14', 0, 0, 0, '16:00:00'),
(148, 1, '2013-12-21', 0, 0, 0, '16:00:00'),
(149, 1, '2013-12-26', 0, 0, 0, '16:00:00'),
(150, 1, '2013-12-28', 0, 0, 0, '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE IF NOT EXISTS `negara` (
  `id_negara` int(4) NOT NULL AUTO_INCREMENT,
  `negara` tinytext,
  PRIMARY KEY (`id_negara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id_negara`, `negara`) VALUES
(1, 'Inggris');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `id_negara`, `team`, `link`) VALUES
(1, 1, 'Manchester United', 'http://soccerway.com/teams/england/manchester-united-fc/662/matches/');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dom`
--
ALTER TABLE `dom`
  ADD CONSTRAINT `dom_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`id_negara`) REFERENCES `negara` (`id_negara`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
