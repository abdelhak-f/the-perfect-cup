-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 27 juin 2020 à 22:44
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `perfectcup`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `message` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(22, 'fdd', '', ''),
(23, 'dsqff', 'cwwdfsdgd@gmail.com', 'bvfbdgdghdgdd'),
(21, '', '', ''),
(20, 'abdelhak', 'abdelhakf95@gmail.com', 'fjkfbhdfjhdjfh'),
(19, 'abdelhak', 'abdelhakf95@gmail.com', 'bdjhgldfhild'),
(18, 'youcode', 'abdelhakf95@gmail.com', 'gfoidfohuhudifgjdoif'),
(17, 'abdelhak', 'abdelhakf95@gmail.com', 'frzgteyetgrtertzrgttere');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(13, 'abdelhak', 'Faqir', 'abdelhakf95@gmail.com', '$2y$12$RzqCrc4LzKgYo/nnj90.q.TYrtfhd6O0xaVZJ9/xrSPDthJSJGNGy'),
(14, 'youcode', 'youssoufia', 'youcode@gmail.com', '$2y$12$YBdvbGG.xn15vAPO9tJ2ZOsxbC3WNu8kTSSSF5cu9eGgESc/ATYOO'),
(15, 'dawajin', 'abdo', 'ssss@kjj.com', '$2y$12$mcQRlfsEUTTVk6REeCofjepX/XKm8OR2bcA66Ex3rkCo98Ar465DK');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `pro_title` varchar(100) NOT NULL,
  `pro_images` varchar(250) NOT NULL,
  `pro_description` varchar(255) NOT NULL,
  `pro_info` varchar(250) NOT NULL,
  `pro_price` int(200) NOT NULL,
  `_Date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `pro_title`, `pro_images`, `pro_description`, `pro_info`, `pro_price`, `_Date`) VALUES
(1, 'bhekfbvkefv', 'WhatsApp Image 2020-06-26 at 01.07.30.jpeg', '                        nfdvnkejfhgejrkfgjrkern', '                        cbhsdbchjzddvhjb', 11, '2020-06-27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
