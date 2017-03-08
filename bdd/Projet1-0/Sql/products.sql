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
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID_PRODUCT` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE_PRODUCT` varchar(40) NOT NULL,
  `REFERENCE` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(4000) NOT NULL,
  `KEYWORDS` varchar(1000) NOT NULL,
  `VIGNETTE` varchar(40) NOT NULL,
  `IMAGE` varchar(40) NOT NULL,
  `PRIX` decimal(11,0) NOT NULL,
  PRIMARY KEY (`ID_PRODUCT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`ID_PRODUCT`, `TITRE_PRODUCT`, `REFERENCE`, `DESCRIPTION`, `KEYWORDS`, `VIGNETTE`, `IMAGE`, `PRIX`) VALUES
(1, 'Lorem Ipsum', '530044b1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'excepteur,cupidatat,deserunt', 'vig_laudantium.png', 'laudantium.png', '90'),
(2, 'Consectetur', '530044b2', 'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'mollit,pariatur,officia', 'vig_sed_do_eiusmod.png', 'sed_do_eiusmod.png', '130'),
(3, 'Sed do eiusmode', '530044c3', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.\r\n', 'laborum,culpa,proident', 'vig_ut_labore.png', 'ut_labore.png', '120'),
(4, 'Ut labore', '530044c2', 'Ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'occaecat,ipsum,adipisicing', 'vig_vig_lorem_ipsum.png', 'vig_lorem_ipsum.png', '100'),
(5, 'Dolore magna', '640044b1', 'Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eiusmod,incididunt,magna', 'vig_dolore_magna.png', 'dolore_magna.png', '110'),
(6, 'Excepteur', '640044b2', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'lorem,consectetur,aliqua', 'vig_excepteur.png', 'excepteur.png', '50'),
(7, 'Laboris', '730044a1', 'Laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', 'minim,nostrud,incididunt', 'vig_laboris.png', 'laboris.png', '45'),
(8, 'Voluptate velit', '730044a2', 'Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'labore,veniam,exercitation', 'vig_voluptate_velit.png', 'voluptate_velit.png', '65'),
(9, 'Laudantium', '830044a4', 'Laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'ullamco,aliquip,consequat', 'vig_laudantium.png', 'laudantium.png', '80'),
(24, 'Ut labore2', '530044c2', 'Ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'nostrud,commodo,reprehenderit', 'vig_', '', '100'),
(25, 'Ut labore2', '530044c2', 'Ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'cillum,voluptate,fugiat', 'vig_', '', '100'),
(49, 'Test2222', 'test', 'test', 'test', 'vig_picasso.png', 'picasso.png', '30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
