-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8 */;
--
  -- Base de données :  `locavoit`
  --
  CREATE DATABASE IF NOT EXISTS `locavoit2021` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `locavoit2021`;
-- --------------------------------------------------------
  --
  -- Structure de la table `categories`
  --
  CREATE TABLE IF NOT EXISTS `categories` (
    `idCat` char(1) NOT NULL,
    `descCat` varchar(50) NOT NULL,
    `nbPortesCat` tinyint(1) unsigned NOT NULL,
    `nbPlacesCat` tinyint(2) unsigned NOT NULL,
    `nbBagCat` tinyint(1) unsigned NOT NULL,
    `pxKmCat` decimal(5, 2) unsigned NOT NULL,
    `pxJourCat` decimal(5, 2) unsigned NOT NULL,
    PRIMARY KEY (`idCat`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Contenu de la table `categories`
  --
INSERT INTO
  `categories` (
    `idCat`,
    `descCat`,
    `nbPortesCat`,
    `nbPlacesCat`,
    `nbBagCat`,
    `pxKmCat`,
    `pxJourCat`
  )
VALUES
  (
    'A',
    'petite voiture économique 3p',
    3,
    4,
    2,
    '0.19',
    '12.50'
  ),
  (
    'B',
    'petite voiture économique 5p',
    5,
    5,
    2,
    '0.21',
    '16.50'
  ),
  (
    'C',
    'voiture compacte',
    5,
    5,
    3,
    '0.23',
    '21.15'
  ),
  ('N', 'monospace', 5, 6, 4, '0.29', '35.25'),
  ('P', 'minibus', 4, 9, 5, '0.32', '41.10');
-- --------------------------------------------------------
  --
  -- Structure de la table `clients`
  --
  CREATE TABLE IF NOT EXISTS `clients` (
    `idCli` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nomCli` varchar(30) NOT NULL,
    `prenomCli` varchar(30) NOT NULL,
    PRIMARY KEY (`idCli`),
    KEY `idCli` (`idCli`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 8;
--
  -- Contenu de la table `clients`
  --
INSERT INTO
  `clients` (`idCli`, `nomCli`, `prenomCli`)
VALUES
  (1, 'Leroy', 'Albert'),
  (2, 'Leprince', 'Laurent'),
  (3, 'Dheux', 'Albert'),
  (4, 'Léroy', 'Philippe'),
  (5, 'Legrand', 'Alexandre'),
  (6, 'Lequin', 'Charles'),
  (7, 'Lagaffe', 'Gaston');
-- --------------------------------------------------------
  --
  -- Structure de la table `locations`
  --
  CREATE TABLE IF NOT EXISTS `locations` (
    `idLoc` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `voitureLoc` char(8) NOT NULL,
    `clientLoc` int(10) unsigned NOT NULL,
    `dDebLoc` date NOT NULL,
    `dFinLoc` date DEFAULT NULL,
    `kmDebLoc` int(10) unsigned NOT NULL,
    `kmFinLoc` int(10) unsigned DEFAULT NULL,
    `prixLoc` decimal(7, 2) DEFAULT NULL,
    `remLoc` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`idLoc`),
    KEY `voitureLoc` (`voitureLoc`),
    KEY `clientLoc` (`clientLoc`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 17;
--
  -- Contenu de la table `locations`
  --
INSERT INTO
  `locations` (
    `idLoc`,
    `voitureLoc`,
    `clientLoc`,
    `dDebLoc`,
    `dFinLoc`,
    `kmDebLoc`,
    `kmFinLoc`,
    `prixLoc`,
    `remLoc`
  )
VALUES
  (
    1,
    '1-AAA001',
    1,
    '2021-10-03',
    '2021-10-07',
    50,
    750,
    '253.00',
    NULL
  ),
  (
    2,
    '1-AAA001',
    4,
    '2021-10-07',
    '2021-10-09',
    750,
    1130,
    '144.20',
    NULL
  ),
  (
    3,
    '1-AAA001',
    1,
    '2021-10-15',
    '2021-10-19',
    1130,
    2310,
    '344.20',
    NULL
  ),
  (
    4,
    '1-AAA001',
    1,
    '2021-10-21',
    '2021-10-25',
    2350,
    4560,
    '539.90',
    'griffes portière droite'
  ),
  (
    5,
    '1-AAA003',
    1,
    '2021-11-01',
    NULL,
    50,
    NULL,
    NULL,
    NULL
  ),
  (
    6,
    '1-AAA002',
    2,
    '2021-10-11',
    '2021-10-19',
    50,
    4120,
    '989.30',
    NULL
  ),
  (
    7,
    '1-CCC001',
    6,
    '2021-10-07',
    '2021-10-12',
    50,
    3020,
    '893.10',
    NULL
  ),
  (
    8,
    '1-CCC002',
    3,
    '2021-10-09',
    '2021-10-11',
    50,
    560,
    '222.30',
    NULL
  ),
  (
    9,
    '1-CCC002',
    3,
    '2021-10-13',
    '2021-10-17',
    580,
    1135,
    '302.65',
    NULL
  ),
  (
    10,
    '1-CCC002',
    5,
    '2021-10-21',
    '2021-10-26',
    1135,
    2360,
    '491.75',
    NULL
  ),
  (
    11,
    '1-NNN001',
    2,
    '2021-10-08',
    '2021-10-14',
    50,
    2560,
    '999.99',
    NULL
  ),
  (
    12,
    '1-NNN001',
    4,
    '2021-10-15',
    '2021-10-21',
    2560,
    3100,
    '471.60',
    NULL
  ),
  (
    14,
    '1-PPP001',
    6,
    '2021-11-12',
    NULL,
    50,
    NULL,
    NULL,
    NULL
  ),
  (
    15,
    '1-PPP002',
    1,
    '2021-10-28',
    '2021-11-06',
    50,
    666,
    '1245.00',
    'rétro cassé, sièges tachés'
  ),
  (
    16,
    '1-CCC001',
    7,
    '2021-11-15',
    NULL,
    3025,
    NULL,
    NULL,
    NULL
  ),
  (
    17,
    '1-AAA004',
    7,
    '2021-12-15',
    NULL,
    20,
    NULL,
    NULL,
    NULL
  ),
  (
    18,
    '1-AAA005',
    7,
    '2021-12-15',
    NULL,
    20,
    NULL,
    NULL,
    NULL
  );
-- --------------------------------------------------------
  --
  -- Structure de la table `voitures`
  --
  CREATE TABLE IF NOT EXISTS `voitures` (
    `idVoit` varchar(8) NOT NULL COMMENT 'plaque',
    `modVoit` varchar(30) NOT NULL,
    `catVoit` char(1) NOT NULL,
    `carbVoit` enum('E', 'D') NOT NULL COMMENT 'E/D',
    `kmVoit` int(10) unsigned NOT NULL,
    `dDebVoit` date NOT NULL COMMENT 'mise en service',
    `dFinVoit` date DEFAULT NULL COMMENT 'mise hors service',
    PRIMARY KEY (`idVoit`),
    KEY `catVoit` (`catVoit`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Contenu de la table `voitures`
  --
INSERT INTO
  `voitures` (
    `idVoit`,
    `modVoit`,
    `catVoit`,
    `carbVoit`,
    `kmVoit`,
    `dDebVoit`,
    `dFinVoit`
  )
VALUES
  (
    '1-AAA001',
    'VW Polo',
    'A',
    'E',
    4560,
    '2021-10-01',
    NULL
  ),
  (
    '1-AAA002',
    'VW Polo',
    'A',
    'E',
    4120,
    '2021-10-01',
    '2021-10-25'
  ),
  (
    '1-AAA003',
    'Citroen C1',
    'A',
    'E',
    50,
    '2021-10-31',
    NULL
  ),
  (
    '1-AAA004',
    'Opel Adam',
    'A',
    'E',
    20,
    '2021-11-30',
    NULL
  ),
  (
    '1-AAA005',
    'VW Up!',
    'A',
    'E',
    20,
    '2021-11-30',
    NULL
  ),
  (
    '1-BBB001',
    'VW Golf',
    'B',
    'D',
    50,
    '2021-10-01',
    NULL
  ),
  (
    '1-BBB002',
    'VW Golf',
    'B',
    'D',
    50,
    '2021-10-01',
    NULL
  ),
  (
    '1-CCC001',
    'VW Passat',
    'C',
    'D',
    3020,
    '2021-10-01',
    NULL
  ),
  (
    '1-CCC002',
    'VW Passat',
    'C',
    'D',
    2360,
    '2021-10-01',
    NULL
  ),
  (
    '1-NNN001',
    'Peugeot 807',
    'N',
    'D',
    3100,
    '2021-10-01',
    NULL
  ),
  (
    '1-NNN002',
    'Peugeot 807',
    'N',
    'D',
    50,
    '2021-10-01',
    NULL
  ),
  (
    '1-PPP001',
    'VW Transporter',
    'P',
    'D',
    50,
    '2021-10-01',
    NULL
  ),
  (
    '1-PPP002',
    'Ford Transit',
    'P',
    'D',
    50,
    '2021-10-15',
    NULL
  );
--
  -- Contraintes pour les tables exportées
  --
  --
  -- Contraintes pour la table `locations`
  --
ALTER TABLE
  `locations`
ADD
  CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`voitureLoc`) REFERENCES `voitures` (`idVoit`),
ADD
  CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`clientLoc`) REFERENCES `clients` (`idCli`);
--
  -- Contraintes pour la table `voitures`
  --
ALTER TABLE
  `voitures`
ADD
  CONSTRAINT `voitures_ibfk_1` FOREIGN KEY (`catVoit`) REFERENCES `categories` (`idCat`);
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;