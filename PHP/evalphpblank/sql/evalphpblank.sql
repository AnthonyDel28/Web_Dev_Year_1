-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 mai 2022 à 06:14
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evalphpblank`
--
CREATE DATABASE IF NOT EXISTS `evalphpblank` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `evalphpblank`;

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Oral-C'),
(2, 'Lactosa'),
(3, 'Cool Brush'),
(4, 'Kate Brush'),
(5, 'Philippe'),
(6, 'Cool Gate'),
(7, 'George Brush');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Belgique'),
(2, 'France'),
(3, 'Allemagne'),
(4, 'Pays-Bas'),
(5, 'Italie'),
(6, 'Espagne'),
(7, 'Royaume-Uni'),
(8, 'Luxembourg'),
(9, 'Suisse'),
(10, 'Portugal'),
(11, 'Norvège'),
(12, 'Suède'),
(13, 'Autriche'),
(14, 'Irlande');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brand` bigint(20) UNSIGNED NOT NULL,
  `price` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `brand` (`brand`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id`, `name`, `brand`, `price`) VALUES
(1, 'brosse à dents biodégradable à poils souples', 4, 4),
(2, 'brosse à dents électrique', 1, 59),
(3, 'brosse à dents électrique de luxe', 1, 90),
(4, 'brosse à dents électrique super de luxe', 1, 149),
(5, 'brosse à dents à poils (très) durs', 7, 2),
(6, 'brosse à dents en plastique (sauf les poils)', 7, 1),
(7, 'brosse à dents électrique de luxe', 3, 79),
(8, 'brosse à dents à poils souples', 1, 4),
(9, 'brosse à dents électrique super de luxe', 3, 129),
(10, 'brosse à dents électrique super de luxe', 5, 339),
(11, 'brosse à dents à poils durs', 2, 3),
(12, 'brosse à dents électrique de luxe', 5, 99),
(13, 'brosse à dents électrique', 5, 69),
(14, 'brosse à dents à poils souples', 4, 3),
(15, 'brosse à dents à poils souples', 2, 4),
(16, 'brosse à dents à poils extra souples', 2, 4),
(17, 'brosse à dents électrique', 6, 10),
(18, 'brosse à dents en bambou', 6, 5),
(19, 'brosse à dents en bambou', 4, 6),
(20, 'brosse à dents à poils durs', 6, 1),
(21, 'brosse à dents à poils souples', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `item_user`
--

DROP TABLE IF EXISTS `item_user`;
CREATE TABLE IF NOT EXISTS `item_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `itemid` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `qty` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`itemid`) USING BTREE,
  KEY `itemid` (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lastlogin` datetime DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `country` (`country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`);

--
-- Contraintes pour la table `item_user`
--
ALTER TABLE `item_user`
  ADD CONSTRAINT `item_user_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `item_user_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
