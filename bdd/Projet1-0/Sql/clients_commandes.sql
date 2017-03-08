-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 25 Janvier 2016 à 23:07
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
-- Structure de la table `clients_commandes`
--

CREATE TABLE IF NOT EXISTS `clients_commandes` (
  `ID_CLIENT` int(11) NOT NULL,
  `ID_COMMANDE` varchar(26) NOT NULL,
  `DATE_COMMANDE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CLIENT`,`ID_COMMANDE`),
  KEY `ID_COMMANDE` (`ID_COMMANDE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `clients_commandes`
--
ALTER TABLE `clients_commandes`
  ADD CONSTRAINT `clients_commandes_ibfk_1` FOREIGN KEY (`ID_CLIENT`) REFERENCES `clients` (`ID_CLIENT`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_commandes_ibfk_2` FOREIGN KEY (`ID_COMMANDE`) REFERENCES `commandes` (`ID_COMMANDE`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
