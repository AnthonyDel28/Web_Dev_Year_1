-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Janvier 2017 à 09:55
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formations2016`
--
CREATE DATABASE IF NOT EXISTS `formations2016` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `formations2016`;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idC` char(4) NOT NULL,
  `intituleC` varchar(50) NOT NULL,
  `nbPerC` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`idC`, `intituleC`, `nbPerC`) VALUES
('ACA', 'Analyse et conception d''application', 120),
('ANGL', 'Anglais niv 2', 40),
('CLAV', 'Etude du clavier AZERTY', 120),
('CPTA', 'Comptabilité générale', 80),
('GEST', 'Gestion des entreprises', 40),
('JARD', 'Jardinage', 60),
('LGFL', 'Langage des fleurs', 120),
('MAFL', 'Mathématiques appliquée aux fleurs', 40),
('MAIN', 'Mathématiques appliquées à l''informatique', 60),
('MULT', 'Tables de multiplication', 80),
('POO', 'Programmation orientée objet', 120),
('STAT', 'Statistiques', 60);

-- --------------------------------------------------------

--
-- Structure de la table `coursform`
--

CREATE TABLE `coursform` (
  `idForm` char(6) NOT NULL,
  `idC` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `coursform`
--

INSERT INTO `coursform` (`idForm`, `idC`) VALUES
('BCPTA', 'ANGL'),
('BCPTA', 'CPTA'),
('BCPTA', 'MULT'),
('BCPTA', 'STAT'),
('BINFO', 'ACA'),
('BINFO', 'ANGL'),
('BINFO', 'CLAV'),
('BINFO', 'MAIN'),
('BINFO', 'POO'),
('BINFO', 'STAT'),
('FLEUR', 'JARD'),
('FLEUR', 'LGFL'),
('FLEUR', 'MAFL'),
('FLEUR', 'MULT');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `idForm` char(6) NOT NULL,
  `intituleForm` varchar(50) NOT NULL,
  `nbPerForm` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`idForm`, `intituleForm`, `nbPerForm`) VALUES
('BCPTA', 'Bachelier en comptabilité', 2200),
('BINFO', 'Bachelier en informatique', 2400),
('FLEUR', 'Art floral', 240);

-- --------------------------------------------------------

--
-- Structure de la table `inscr2016`
--

CREATE TABLE `inscr2016` (
  `idC` char(4) NOT NULL,
  `idPers` int(10) UNSIGNED NOT NULL,
  `resultat` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inscr2016`
--

INSERT INTO `inscr2016` (`idC`, `idPers`, `resultat`) VALUES
('ACA', 10, NULL),
('ACA', 11, NULL),
('ACA', 12, NULL),
('CLAV', 1, NULL),
('CLAV', 2, NULL),
('CLAV', 3, NULL),
('JARD', 1, NULL),
('JARD', 2, NULL),
('JARD', 3, NULL),
('JARD', 4, NULL),
('MAFL', 6, NULL),
('MAFL', 7, NULL),
('MAFL', 8, NULL),
('MAFL', 9, NULL),
('MULT', 1, NULL),
('MULT', 2, NULL),
('MULT', 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `idPers` int(10) UNSIGNED NOT NULL,
  `nomPers` varchar(30) NOT NULL,
  `prenomPers` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`idPers`, `nomPers`, `prenomPers`) VALUES
(1, 'Leroy', 'Albert'),
(2, 'Leprince', 'Laurent'),
(3, 'Dheux', 'Albert'),
(4, 'Léroy', 'Philippe'),
(5, 'Legrand', 'Alexandre'),
(6, 'Lequin', 'Charles'),
(7, 'Lagaffe', 'Gaston'),
(8, 'Bistrot', 'Alonzo'),
(9, 'Dubois', 'Luc'),
(10, 'Dupont', 'Marc'),
(11, 'Dupont', 'Pierre'),
(12, 'Egretel', 'Hansel'),
(13, 'Einstein', 'Frank'),
(14, 'Tation', 'Félicie'),
(15, 'Opost', 'Fidèle'),
(16, 'Pairay', 'Inès'),
(17, 'Porée', 'Eva');

-- --------------------------------------------------------

--
-- Structure de la table `profs2016`
--

CREATE TABLE `profs2016` (
  `idC` char(4) NOT NULL,
  `idPers` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `profs2016`
--

INSERT INTO `profs2016` (`idC`, `idPers`) VALUES
('ACA', 13),
('CLAV', 6),
('CLAV', 7),
('JARD', 1),
('LGFL', 4),
('MAFL', 3),
('MAIN', 13),
('MULT', 12),
('POO', 16),
('POO', 17);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idC`);

--
-- Index pour la table `coursform`
--
ALTER TABLE `coursform`
  ADD PRIMARY KEY (`idForm`,`idC`),
  ADD KEY `refC` (`idC`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`idForm`);

--
-- Index pour la table `inscr2016`
--
ALTER TABLE `inscr2016`
  ADD PRIMARY KEY (`idC`,`idPers`),
  ADD KEY `idPers` (`idPers`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`idPers`),
  ADD KEY `idCli` (`idPers`);

--
-- Index pour la table `profs2016`
--
ALTER TABLE `profs2016`
  ADD PRIMARY KEY (`idC`,`idPers`),
  ADD KEY `idPers` (`idPers`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `idPers` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `coursform`
--
ALTER TABLE `coursform`
  ADD CONSTRAINT `coursform_ibfk_1` FOREIGN KEY (`idForm`) REFERENCES `formations` (`idForm`) ON UPDATE CASCADE,
  ADD CONSTRAINT `coursform_ibfk_2` FOREIGN KEY (`idC`) REFERENCES `cours` (`idC`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscr2016`
--
ALTER TABLE `inscr2016`
  ADD CONSTRAINT `inscr2016_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `cours` (`idC`),
  ADD CONSTRAINT `inscr2016_ibfk_2` FOREIGN KEY (`idPers`) REFERENCES `personnes` (`idPers`);

--
-- Contraintes pour la table `profs2016`
--
ALTER TABLE `profs2016`
  ADD CONSTRAINT `profs2016_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `cours` (`idC`),
  ADD CONSTRAINT `profs2016_ibfk_2` FOREIGN KEY (`idPers`) REFERENCES `personnes` (`idPers`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
