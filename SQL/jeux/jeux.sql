-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 23 Janvier 2017 à 01:36
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeux`
--
CREATE DATABASE IF NOT EXISTS `jeux` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jeux`;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `idJ` char(10) NOT NULL,
  `nomJ` varchar(30) NOT NULL,
  `descJ` varchar(50) DEFAULT NULL,
  `plateauJ` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`idJ`, `nomJ`, `descJ`, `plateauJ`) VALUES
('damesangl', 'Dames anglaises', NULL, 'dam8'),
('damesfranc', 'Dames françaises', NULL, 'dam10'),
('echecs', 'Echecs', NULL, 'dam8'),
('soltri', 'Solitaire 1', "Solitaire triangulaire", 'plat6x5'),
('solx', 'Solitaire 2', "Solitaire en X", 'plat6x4u'),
('othello', 'Othello / Reversi', NULL, 'dam8u');

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `idPc` char(4) NOT NULL,
  `nomPc` varchar(20) NOT NULL,
  `affPc` char(4) NOT NULL,
  `coulPc` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pieces`
--

INSERT INTO `pieces` (`idPc`, `nomPc`, `affPc`, `coulPc`) VALUES
('CB', 'Cavalier blanc', 'C', 'white'),
('CN', 'Cavalier noir', 'C', 'black'),
('DB', 'Dame blanche', 'D', 'white'),
('DN', 'Dame noire', 'D', 'black'),
('FB', 'Fou blanc', 'F', 'white'),
('FN', 'Fou noir', 'F', 'black'),
('PB', 'Pion blanc', 'P', 'white'),
('PN', 'Pion noir', 'P', 'black'),
('RB', 'Roi blanc', 'R', 'white'),
('RN', 'Roi noir', 'R', 'black'),
('TB', 'Tour blanche', 'T', 'white'),
('TN', 'Tour noire', 'T', 'black');

-- --------------------------------------------------------

--
-- Structure de la table `plateaux`
--

CREATE TABLE `plateaux` (
  `idPlat` char(10) NOT NULL,
  `descPlat` varchar(50) NOT NULL,
  `nbLgPlat` tinyint(3) UNSIGNED NOT NULL,
  `nbColPlat` tinyint(3) UNSIGNED NOT NULL,
  `coul1Plat` varchar(15) DEFAULT NULL,
  `coul2Plat` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `plateaux`
--

INSERT INTO `plateaux` (`idPlat`, `descPlat`, `nbLgPlat`, `nbColPlat`, `coul1Plat`, `coul2Plat`) VALUES
('dam10', 'Damier 10x10', 10, 10, 'white', 'black'),
('plat6x5', 'Damier 6x5', 6, 5, 'white', 'black'),
('plat6x4u', 'Damier 6x4', 6, 4, 'red', NULL),
('dam8', 'Damier 8x8', 8, 8, 'white', 'black'),
('dam8u', 'Damier uni 8x8', 8, 8, 'green', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE `positions` (
  `idJPos` char(10) NOT NULL,
  `idPcPos` char(4) NOT NULL,
  `lgPos` tinyint(3) UNSIGNED NOT NULL,
  `colPos` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `positions`
--

INSERT INTO `positions` (`idJPos`, `idPcPos`, `lgPos`, `colPos`) VALUES
('echecs', 'CB', 8, 2),
('echecs', 'CB', 8, 7),
('echecs', 'CN', 1, 2),
('echecs', 'CN', 1, 7),
('echecs', 'DB', 8, 4),
('echecs', 'DN', 1, 4),
('echecs', 'FB', 8, 3),
('echecs', 'FB', 8, 6),
('echecs', 'FN', 1, 3),
('echecs', 'FN', 1, 6),
('damesfranc', 'PB', 7, 2),
('damesfranc', 'PB', 7, 4),
('damesfranc', 'PB', 7, 6),
('damesfranc', 'PB', 7, 8),
('damesfranc', 'PB', 7, 10),
('damesfranc', 'PB', 8, 1),
('damesfranc', 'PB', 8, 3),
('damesfranc', 'PB', 8, 5),
('damesfranc', 'PB', 8, 7),
('damesfranc', 'PB', 8, 9),
('damesfranc', 'PB', 9, 2),
('damesfranc', 'PB', 9, 4),
('damesfranc', 'PB', 9, 6),
('damesfranc', 'PB', 9, 8),
('damesfranc', 'PB', 9, 10),
('damesfranc', 'PB', 10, 1),
('damesfranc', 'PB', 10, 3),
('damesfranc', 'PB', 10, 5),
('damesfranc', 'PB', 10, 7),
('damesfranc', 'PB', 10, 9),
('echecs', 'PB', 7, 1),
('echecs', 'PB', 7, 2),
('echecs', 'PB', 7, 3),
('echecs', 'PB', 7, 4),
('echecs', 'PB', 7, 5),
('echecs', 'PB', 7, 6),
('echecs', 'PB', 7, 7),
('echecs', 'PB', 7, 8),
('othello', 'PB', 4, 5),
('othello', 'PB', 5, 4),
('damesangl', 'PN', 1, 2),
('damesangl', 'PN', 1, 4),
('damesangl', 'PN', 1, 6),
('damesangl', 'PN', 1, 8),
('damesangl', 'PN', 2, 1),
('damesangl', 'PN', 2, 3),
('damesangl', 'PN', 2, 5),
('damesangl', 'PN', 2, 7),
('damesangl', 'PN', 3, 2),
('damesangl', 'PN', 3, 4),
('damesangl', 'PN', 3, 6),
('damesangl', 'PN', 3, 8),
('damesangl', 'PB', 6, 1),
('damesangl', 'PB', 6, 3),
('damesangl', 'PB', 6, 5),
('damesangl', 'PB', 6, 7),
('damesangl', 'PB', 7, 2),
('damesangl', 'PB', 7, 4),
('damesangl', 'PB', 7, 6),
('damesangl', 'PB', 7, 8),
('damesangl', 'PB', 8, 1),
('damesangl', 'PB', 8, 3),
('damesangl', 'PB', 8, 5),
('damesangl', 'PB', 8, 7),
('damesfranc', 'PN', 1, 2),
('damesfranc', 'PN', 1, 4),
('damesfranc', 'PN', 1, 6),
('damesfranc', 'PN', 1, 8),
('damesfranc', 'PN', 1, 10),
('damesfranc', 'PN', 2, 1),
('damesfranc', 'PN', 2, 3),
('damesfranc', 'PN', 2, 5),
('damesfranc', 'PN', 2, 7),
('damesfranc', 'PN', 2, 9),
('damesfranc', 'PN', 3, 2),
('damesfranc', 'PN', 3, 4),
('damesfranc', 'PN', 3, 6),
('damesfranc', 'PN', 3, 8),
('damesfranc', 'PN', 3, 10),
('damesfranc', 'PN', 4, 1),
('damesfranc', 'PN', 4, 3),
('damesfranc', 'PN', 4, 5),
('damesfranc', 'PN', 4, 7),
('damesfranc', 'PN', 4, 9),
('echecs', 'PN', 2, 1),
('echecs', 'PN', 2, 2),
('echecs', 'PN', 2, 3),
('echecs', 'PN', 2, 4),
('echecs', 'PN', 2, 5),
('echecs', 'PN', 2, 6),
('echecs', 'PN', 2, 7),
('echecs', 'PN', 2, 8),
('othello', 'PN', 4, 4),
('othello', 'PN', 5, 5),
('echecs', 'RB', 8, 5),
('echecs', 'RN', 1, 5),
('echecs', 'TB', 8, 1),
('echecs', 'TB', 8, 8),
('echecs', 'TN', 1, 1),
('echecs', 'TN', 1, 8),
('soltri', 'PN', 1, 1),
('soltri', 'PN', 1, 3),
('soltri', 'PN', 1, 5),
('soltri', 'PN', 2, 2),
('soltri', 'PN', 2, 4),
('soltri', 'PN', 3, 3),
('solx', 'PB', 2, 1),
('solx', 'PB', 2, 4),
('solx', 'PB', 3, 2),
('solx', 'PB', 3, 3),
('solx', 'PB', 4, 2),
('solx', 'PB', 4, 3),
('solx', 'PB', 5, 1),
('solx', 'PB', 5, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`idJ`),
  ADD KEY `plateauJ` (`plateauJ`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`idPc`);

--
-- Index pour la table `plateaux`
--
ALTER TABLE `plateaux`
  ADD PRIMARY KEY (`idPlat`);

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
  ADD UNIQUE KEY `idJPos_2` (`idJPos`,`lgPos`,`colPos`),
  ADD KEY `idPcPos` (`idPcPos`),
  ADD KEY `idJPos` (`idJPos`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD CONSTRAINT `jeux_ibfk_1` FOREIGN KEY (`plateauJ`) REFERENCES `plateaux` (`idPlat`);

--
-- Contraintes pour la table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`idJPos`) REFERENCES `jeux` (`idJ`),
  ADD CONSTRAINT `positions_ibfk_2` FOREIGN KEY (`idPcPos`) REFERENCES `pieces` (`idPc`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
