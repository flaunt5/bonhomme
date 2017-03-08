-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 25 Janvier 2016 à 23:03
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
-- Structure de la table `categories_products`
--

CREATE TABLE IF NOT EXISTS `categories_products` (
  `ID_CATEGORIE` int(11) NOT NULL,
  `ID_PRODUCT` int(11) NOT NULL,
  `ORDRE` int(11) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIE`,`ID_PRODUCT`),
  KEY `ID_PRODUCT` (`ID_PRODUCT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories_products`
--

INSERT INTO `categories_products` (`ID_CATEGORIE`, `ID_PRODUCT`, `ORDRE`) VALUES
(4, 1, 3),
(4, 2, 1),
(4, 3, 2),
(4, 4, 4),
(4, 5, 5),
(4, 7, 6),
(4, 8, 7),
(5, 2, 5),
(5, 4, 1),
(5, 6, 3),
(5, 49, 2),
(6, 1, 4),
(6, 9, 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categories_products`
--
ALTER TABLE `categories_products`
  ADD CONSTRAINT `categories_products_ibfk_1` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categories` (`ID_CATEGORIE`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_products_ibfk_2` FOREIGN KEY (`ID_PRODUCT`) REFERENCES `products` (`ID_PRODUCT`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
