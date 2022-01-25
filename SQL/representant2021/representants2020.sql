-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 27 jan. 2021 à 15:52
-- Version du serveur :  5.7.29
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `representants2020`
--
CREATE DATABASE IF NOT EXISTS `representants2020` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `representants2020`;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `codePays` char(3) NOT NULL,
  `nomPays` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`codePays`, `nomPays`) VALUES
('AUT', 'Autriche'),
('BEL', 'Belgique'),
('CHE', 'Suisse'),
('DEU', 'Allemagne'),
('ESP', 'Espagne'),
('FRA', 'France'),
('ITA', 'Italie'),
('LUX', 'Luxembourg'),
('NLD', 'Pays-Bas'),
('PRT', 'Portugal');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `idPers` char(5) NOT NULL,
  `nomPers` varchar(30) NOT NULL,
  `prenomPers` varchar(30) NOT NULL,
  `nationPers` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPers`, `nomPers`, `prenomPers`, `nationPers`) VALUES
('BISAL', 'Bistrot', 'Alonzo', 'ESP'),
('DHEAL', 'Dheux', 'Albert', 'BEL'),
('DUBLU', 'Dubois', 'Luc', 'FRA'),
('DUPMA', 'Dupont', 'Marc', 'BEL'),
('DUPPI', 'Dupont', 'Pierre', 'BEL'),
('EGRHA', 'Egretel', 'Hansel', 'DEU'),
('EINFR', 'Einstein', 'Frank', 'DEU'),
('FATFE', 'Tation', 'Félicie', 'FRA'),
('LERAL', 'Leroy', 'Albert', 'BEL'),
('LERPH', 'Leroy', 'Philippe', 'BEL'),
('OPOFI', 'Opost', 'Fidèle', 'LUX'),
('PERIN', 'Pere', 'Inès', 'ESP'),
('POREV', 'Porée', 'Eva', 'BEL');

-- --------------------------------------------------------

--
-- Structure de la table `tournee`
--

CREATE TABLE `tournee` (
  `dateT` date NOT NULL,
  `paysT` char(3) NOT NULL,
  `descT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tournee`
--

INSERT INTO `tournee` (`dateT`, `paysT`, `descT`) VALUES
('2021-01-01', 'BEL', 'Meilleurs voeux'),
('2021-01-02', 'FRA', 'Bonne année à nos voisins'),
('2021-01-04', 'DEU', 'DEU 01 Présentation collection 2021'),
('2021-01-05', 'LUX', 'Visite de courtoisie'),
('2021-01-07', 'BEL', 'BEL Tournée 01'),
('2021-01-08', 'ITA', 'ITA Tournée 01'),
('2021-01-12', 'PRT', 'Présentation produits 2021'),
('2021-01-19', 'BEL', 'BEL Présentation nouveaux tarifs'),
('2021-01-25', 'BEL', 'Examen'),
('2021-01-28', 'ESP', 'Présentation produits 2021'),
('2021-01-30', 'BEL', 'Récuppération commandes janvier'),
('2021-02-03', 'DEU', 'DEU Tournée 02');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `codeV` char(3) NOT NULL,
  `nomV` varchar(30) NOT NULL,
  `paysV` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`codeV`, `nomV`, `paysV`) VALUES
('AMS', 'Amsterdam', 'NLD'),
('ANR', 'Anvers', 'BEL'),
('BCN', 'Barcelone', 'ESP'),
('BIO', 'Bilbao', 'ESP'),
('BOD', 'Bordeaux', 'FRA'),
('BRU', 'Bruxelles', 'BEL'),
('BSL', 'Bâle', 'CHE'),
('CGN', 'Cologne', 'DEU'),
('CRL', 'Charleroi', 'BEL'),
('FRA', 'Franckfurt', 'DEU'),
('GRX', 'Grenade', 'ESP'),
('GVA', 'Genève', 'CHE'),
('HAM', 'Hambourg', 'DEU'),
('INN', 'Innsbruck', 'AUT'),
('LGG', 'Liège', 'BEL'),
('LIS', 'Lisbonne', 'PRT'),
('LUX', 'Luxembourg ville', 'LUX'),
('LYN', 'Lyon', 'FRA'),
('MAD', 'Madrid', 'ESP'),
('MPL', 'Montpellier', 'FRA'),
('MST', 'Maastricht', 'NLD'),
('MUC', 'Munich', 'DEU'),
('NAP', 'Naples', 'ITA'),
('NCE', 'Nice', 'FRA'),
('OPO', 'Porto', 'PRT'),
('PAR', 'Paris', 'FRA'),
('PSA', 'Pise', 'ITA'),
('RTM', 'Rotterdam', 'NLD'),
('TRN', 'Turin', 'ITA'),
('UDN', 'Udine', 'ITA'),
('VIE', 'Vienne', 'AUT'),
('ZRH', 'Zurich', 'CHE');

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

CREATE TABLE `visites` (
  `tourneeVis` date NOT NULL,
  `villeVis` char(3) NOT NULL,
  `representantVis` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visites`
--

INSERT INTO `visites` (`tourneeVis`, `villeVis`, `representantVis`) VALUES
('2021-01-01', 'ANR', 'BISAL'),
('2021-01-25', 'ANR', 'BISAL'),
('2021-01-30', 'ANR', 'BISAL'),
('2021-01-01', 'BRU', 'DHEAL'),
('2021-01-02', 'BOD', 'DHEAL'),
('2021-01-04', 'CGN', 'DHEAL'),
('2021-01-07', 'BRU', 'DHEAL'),
('2021-02-03', 'CGN', 'DHEAL'),
('2021-01-01', 'CRL', 'DUBLU'),
('2021-01-08', 'NAP', 'DUBLU'),
('2021-01-30', 'BRU', 'DUBLU'),
('2021-01-01', 'LGG', 'DUPMA'),
('2021-01-19', 'CRL', 'DUPMA'),
('2021-01-25', 'CRL', 'DUPMA'),
('2021-01-25', 'BRU', 'DUPPI'),
('2021-01-04', 'FRA', 'EGRHA'),
('2021-01-12', 'LIS', 'EGRHA'),
('2021-01-28', 'BIO', 'EGRHA'),
('2021-02-03', 'FRA', 'EGRHA'),
('2021-01-02', 'LYN', 'EINFR'),
('2021-01-04', 'HAM', 'EINFR'),
('2021-01-07', 'ANR', 'EINFR'),
('2021-01-12', 'OPO', 'EINFR'),
('2021-01-28', 'MAD', 'EINFR'),
('2021-02-03', 'HAM', 'EINFR'),
('2021-01-19', 'BRU', 'FATFE'),
('2021-01-30', 'CRL', 'LERAL'),
('2021-01-02', 'MPL', 'LERPH'),
('2021-01-30', 'LGG', 'LERPH'),
('2021-01-02', 'NCE', 'OPOFI'),
('2021-01-04', 'MUC', 'OPOFI'),
('2021-01-05', 'LUX', 'OPOFI'),
('2021-01-07', 'CRL', 'OPOFI'),
('2021-01-08', 'TRN', 'OPOFI'),
('2021-01-25', 'LGG', 'OPOFI'),
('2021-01-19', 'LGG', 'PERIN'),
('2021-01-02', 'PAR', 'POREV'),
('2021-01-07', 'LGG', 'POREV'),
('2021-01-19', 'ANR', 'POREV'),
('2021-01-28', 'BCN', 'POREV');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`codePays`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`idPers`),
  ADD KEY `nationPers` (`nationPers`);

--
-- Index pour la table `tournee`
--
ALTER TABLE `tournee`
  ADD PRIMARY KEY (`dateT`),
  ADD KEY `paysT` (`paysT`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`codeV`),
  ADD KEY `paysV` (`paysV`);

--
-- Index pour la table `visites`
--
ALTER TABLE `visites`
  ADD PRIMARY KEY (`tourneeVis`,`villeVis`),
  ADD KEY `villeVis` (`villeVis`),
  ADD KEY `representantVis` (`representantVis`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`nationPers`) REFERENCES `pays` (`codePays`);

--
-- Contraintes pour la table `tournee`
--
ALTER TABLE `tournee`
  ADD CONSTRAINT `tournee_ibfk_1` FOREIGN KEY (`paysT`) REFERENCES `pays` (`codePays`);

--
-- Contraintes pour la table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_ibfk_1` FOREIGN KEY (`paysV`) REFERENCES `pays` (`codePays`);

--
-- Contraintes pour la table `visites`
--
ALTER TABLE `visites`
  ADD CONSTRAINT `visites_ibfk_1` FOREIGN KEY (`tourneeVis`) REFERENCES `tournee` (`dateT`) ON UPDATE CASCADE,
  ADD CONSTRAINT `visites_ibfk_2` FOREIGN KEY (`villeVis`) REFERENCES `villes` (`codeV`),
  ADD CONSTRAINT `visites_ibfk_3` FOREIGN KEY (`representantVis`) REFERENCES `personne` (`idPers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
