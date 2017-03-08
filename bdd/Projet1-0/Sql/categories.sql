-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 25 Janvier 2016 à 23:01
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
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE_CATEGORIE` varchar(40) NOT NULL,
  `DESCRIPTION` varchar(150) DEFAULT NULL,
  `ORDRE` int(11) NOT NULL DEFAULT '1',
  `ID_MERE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`ID_CATEGORIE`, `TITRE_CATEGORIE`, `DESCRIPTION`, `ORDRE`, `ID_MERE`) VALUES
(1, 'BeautÃ© & Bien-Ãªtre', '', 1, NULL),
(2, 'Mode & Bijoux', '', 2, NULL),
(3, 'Nutrition & Recettes', '', 3, NULL),
(4, 'AromathÃ©rapie', 'L''aromathÃ©rapie est l''utilisation mÃ©dicale des extraits aromatiques de plantes (essences et huiles essentielles). ', 10, 1),
(5, 'Minceur', '', 12, 1),
(6, 'Soin du corps', '', 11, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
