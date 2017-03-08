-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 25 Janvier 2016 à 23:30
-- Version du serveur :  5.5.28
-- Version de PHP :  5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `methodologie-web2.0`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `ID_CLIENT` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(100) NOT NULL,
  `PRENOM` varchar(100) NOT NULL,
  `EMAIL` varchar(300) NOT NULL,
  `TEL` varchar(14) DEFAULT NULL,
  `MOB` varchar(14) DEFAULT NULL,
  `ADRESSE` varchar(300) NOT NULL,
  `CODE_POSTAL` varchar(5) NOT NULL,
  `COMMUNE` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_CLIENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
