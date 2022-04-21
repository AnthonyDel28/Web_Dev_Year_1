-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 02 Avril 2017 à 15:29
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediarnaque`
--
CREATE DATABASE IF NOT EXISTS `mediarnaque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mediarnaque`;

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `idB` int(10) UNSIGNED NOT NULL,
  `nameB` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `brand`
--

INSERT INTO `brand` (`idB`, `nameB`) VALUES
(1, 'intel'),
(2, 'amd'),
(3, 'acer'),
(4, 'asus'),
(5, 'dell'),
(6, 'hp'),
(7, 'lenovo'),
(8, 'medion'),
(9, 'msi'),
(10, 'packard bell'),
(11, 'samsung'),
(12, 'toshiba'),
(13, 'nvidia');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `idC` int(10) UNSIGNED NOT NULL,
  `nameC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `color`
--

INSERT INTO `color` (`idC`, `nameC`) VALUES
(1, 'noir'),
(2, 'blanc'),
(3, 'gris'),
(4, 'bleu'),
(5, 'rouge');

-- --------------------------------------------------------

--
-- Structure de la table `cpu`
--

CREATE TABLE `cpu` (
  `idCpu` int(10) UNSIGNED NOT NULL,
  `brandCpu` int(10) UNSIGNED NOT NULL,
  `modelCpu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cpu`
--

INSERT INTO `cpu` (`idCpu`, `brandCpu`, `modelCpu`) VALUES
(1, 1, 'Celeron'),
(2, 1, 'Core i3'),
(3, 1, 'Core i5'),
(4, 1, 'Core i7'),
(5, 1, 'Atom'),
(6, 2, 'A4'),
(7, 2, 'A6'),
(8, 2, 'A8');

-- --------------------------------------------------------

--
-- Structure de la table `laptop`
--

CREATE TABLE `laptop` (
  `idL` int(10) UNSIGNED NOT NULL,
  `brandL` int(10) UNSIGNED NOT NULL,
  `cpuL` int(10) UNSIGNED NOT NULL,
  `vcardL` int(10) UNSIGNED NOT NULL,
  `ramL` tinyint(3) UNSIGNED NOT NULL,
  `screenL` tinyint(3) UNSIGNED NOT NULL,
  `weightL` smallint(5) UNSIGNED NOT NULL,
  `colorL` int(10) UNSIGNED NOT NULL,
  `priceL` decimal(10,0) UNSIGNED NOT NULL,
  `vatL` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `laptop`
--

INSERT INTO `laptop` (`idL`, `brandL`, `cpuL`, `vcardL`, `ramL`, `screenL`, `weightL`, `colorL`, `priceL`, `vatL`) VALUES
(1, 8, 5, 2, 13, 16, 3324, 1, '1108', 21),
(2, 9, 7, 1, 2, 14, 2649, 1, '875', 21),
(3, 9, 4, 1, 13, 13, 4477, 4, '3626', 21),
(4, 7, 1, 2, 8, 11, 4771, 2, '2901', 21),
(5, 9, 6, 2, 11, 11, 2106, 2, '457', 21),
(6, 11, 5, 2, 13, 13, 1841, 4, '3969', 21),
(7, 5, 2, 2, 6, 14, 3301, 5, '2905', 21),
(8, 6, 1, 3, 16, 12, 2172, 4, '1773', 21),
(9, 8, 3, 3, 11, 14, 3678, 4, '1819', 21),
(10, 7, 4, 2, 10, 10, 1833, 1, '3697', 21),
(11, 4, 7, 2, 3, 16, 4540, 4, '1856', 21),
(12, 7, 4, 1, 5, 13, 3776, 4, '2343', 21),
(13, 12, 8, 2, 7, 11, 2314, 1, '795', 21),
(14, 6, 7, 2, 12, 10, 1321, 4, '1050', 21),
(15, 5, 7, 1, 15, 13, 1908, 3, '2561', 21),
(16, 8, 6, 2, 10, 14, 1495, 3, '1454', 21),
(17, 7, 6, 3, 5, 15, 4216, 1, '2659', 21),
(18, 9, 1, 3, 9, 15, 915, 3, '2761', 21),
(19, 5, 6, 3, 5, 14, 2068, 3, '2183', 21),
(20, 9, 5, 1, 7, 16, 1750, 1, '2227', 21),
(21, 11, 4, 3, 9, 14, 3915, 2, '1275', 21),
(22, 6, 1, 2, 5, 10, 3049, 4, '719', 21),
(23, 4, 8, 3, 11, 16, 3640, 2, '1112', 21),
(24, 11, 3, 3, 2, 14, 4587, 2, '3447', 21),
(25, 12, 5, 1, 5, 11, 3207, 1, '2069', 21),
(26, 9, 4, 1, 16, 12, 4579, 4, '2973', 21),
(27, 9, 1, 2, 16, 13, 3542, 1, '1920', 21),
(28, 8, 5, 3, 8, 16, 3825, 5, '3206', 21),
(29, 4, 4, 1, 3, 14, 4043, 3, '1136', 21),
(30, 10, 6, 2, 8, 12, 4201, 4, '3430', 21),
(31, 8, 6, 1, 16, 15, 3815, 3, '1869', 21),
(32, 4, 5, 2, 5, 13, 1823, 5, '1277', 21),
(33, 9, 3, 2, 13, 10, 2638, 1, '1744', 21),
(34, 3, 7, 2, 12, 10, 4714, 4, '2018', 21),
(35, 11, 6, 3, 5, 13, 2435, 4, '925', 21),
(36, 5, 1, 3, 13, 16, 4887, 3, '3393', 21),
(37, 12, 3, 1, 3, 17, 2607, 1, '3877', 21),
(38, 10, 1, 3, 9, 17, 4100, 4, '544', 21),
(39, 12, 2, 3, 10, 11, 2444, 4, '1136', 21),
(40, 4, 3, 3, 15, 10, 2201, 5, '908', 21),
(41, 4, 7, 2, 15, 15, 3526, 2, '2770', 21),
(42, 11, 1, 3, 15, 11, 3265, 2, '1661', 21),
(43, 4, 6, 2, 13, 16, 1616, 4, '2738', 21),
(44, 3, 8, 3, 6, 11, 1269, 5, '2787', 21),
(45, 9, 2, 1, 4, 13, 4460, 5, '1701', 21),
(46, 4, 5, 3, 14, 15, 3730, 4, '706', 21),
(47, 4, 6, 1, 10, 12, 2785, 4, '1874', 21),
(48, 6, 4, 1, 3, 13, 1000, 4, '443', 21),
(49, 7, 1, 1, 6, 10, 1359, 5, '2533', 21),
(50, 10, 3, 1, 2, 12, 2740, 3, '3565', 21),
(51, 7, 7, 1, 10, 10, 2066, 1, '2082', 21),
(52, 5, 1, 1, 3, 13, 3381, 1, '3695', 21),
(53, 6, 5, 1, 13, 14, 1472, 3, '1657', 21),
(54, 6, 1, 1, 15, 12, 3644, 5, '2358', 21),
(55, 7, 4, 3, 12, 11, 4142, 3, '656', 21),
(56, 7, 8, 1, 15, 15, 2433, 1, '1322', 21),
(57, 5, 5, 2, 5, 15, 2753, 5, '1458', 21),
(58, 10, 2, 1, 13, 12, 4340, 4, '2057', 21),
(59, 11, 5, 2, 11, 11, 1710, 2, '2176', 21),
(60, 9, 1, 1, 8, 13, 4039, 4, '2597', 21),
(61, 11, 7, 2, 6, 10, 4454, 2, '1533', 21),
(62, 8, 2, 3, 16, 10, 1318, 2, '1216', 21),
(63, 4, 8, 3, 13, 17, 2390, 4, '1278', 21),
(64, 9, 7, 3, 12, 11, 1670, 3, '1883', 21),
(65, 8, 4, 2, 14, 14, 3225, 2, '3583', 21),
(66, 7, 6, 3, 2, 10, 4435, 4, '1054', 21),
(67, 3, 2, 2, 6, 17, 1676, 2, '1149', 21),
(68, 3, 2, 1, 5, 12, 2371, 4, '1082', 21),
(69, 7, 1, 1, 10, 16, 1917, 3, '3141', 21),
(70, 5, 1, 1, 13, 17, 2594, 4, '3370', 21),
(71, 12, 2, 3, 15, 12, 3084, 1, '2131', 21),
(72, 4, 1, 2, 15, 14, 2825, 3, '546', 21),
(73, 7, 3, 3, 11, 12, 2826, 3, '3399', 21),
(74, 5, 2, 1, 2, 10, 2562, 4, '3291', 21),
(75, 6, 2, 3, 15, 14, 3312, 1, '375', 21),
(76, 8, 2, 1, 15, 16, 4014, 4, '3109', 21),
(77, 7, 8, 2, 15, 17, 4676, 5, '3487', 21),
(78, 9, 5, 3, 14, 10, 2260, 1, '3477', 21),
(79, 8, 7, 3, 11, 17, 3353, 2, '3294', 21),
(80, 5, 7, 2, 2, 14, 1821, 4, '3114', 21),
(81, 5, 6, 1, 2, 11, 4974, 1, '2607', 21),
(82, 5, 7, 1, 6, 11, 3036, 4, '2560', 21),
(83, 9, 1, 2, 6, 15, 1158, 4, '3491', 21),
(84, 3, 1, 2, 2, 10, 2386, 5, '1904', 21),
(85, 4, 2, 3, 6, 11, 2746, 4, '3683', 21),
(86, 5, 3, 2, 13, 14, 2316, 5, '993', 21),
(87, 5, 4, 3, 16, 14, 4742, 1, '2295', 21),
(88, 10, 5, 3, 8, 13, 1722, 1, '1999', 21),
(89, 8, 7, 3, 5, 13, 2694, 3, '1567', 21),
(90, 3, 1, 2, 3, 13, 2199, 2, '2991', 21),
(91, 9, 5, 1, 7, 10, 1635, 1, '2436', 21),
(92, 3, 6, 1, 9, 13, 3305, 1, '2241', 21),
(93, 12, 3, 2, 3, 11, 2620, 2, '2270', 21),
(94, 3, 1, 3, 15, 14, 4818, 5, '1799', 21),
(95, 11, 8, 3, 2, 15, 3905, 2, '772', 21),
(96, 6, 1, 1, 3, 11, 1260, 1, '1116', 21),
(97, 8, 3, 1, 11, 13, 2978, 2, '3530', 21),
(98, 9, 2, 1, 5, 14, 3093, 1, '1023', 21),
(99, 7, 3, 2, 12, 12, 4571, 5, '2114', 21),
(100, 10, 3, 1, 15, 11, 2395, 5, '2915', 21);

-- --------------------------------------------------------

--
-- Structure de la table `vcard`
--

CREATE TABLE `vcard` (
  `idV` int(10) UNSIGNED NOT NULL,
  `brandV` int(10) UNSIGNED NOT NULL,
  `modelV` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vcard`
--

INSERT INTO `vcard` (`idV`, `brandV`, `modelV`) VALUES
(1, 1, 'HD'),
(2, 2, 'Radeon'),
(3, 13, 'GeForce');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`idB`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idC`);

--
-- Index pour la table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`idCpu`),
  ADD KEY `brandCpu` (`brandCpu`);

--
-- Index pour la table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`idL`),
  ADD KEY `brandL` (`brandL`,`cpuL`,`vcardL`,`ramL`,`screenL`,`weightL`,`colorL`) USING BTREE,
  ADD KEY `priceL` (`idL`),
  ADD KEY `colorL` (`colorL`),
  ADD KEY `cpuL` (`cpuL`),
  ADD KEY `vcardL` (`vcardL`);

--
-- Index pour la table `vcard`
--
ALTER TABLE `vcard`
  ADD PRIMARY KEY (`idV`),
  ADD KEY `brandV` (`brandV`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `idB` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `idC` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `idCpu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `idL` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `vcard`
--
ALTER TABLE `vcard`
  MODIFY `idV` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `cpu_ibfk_1` FOREIGN KEY (`brandCpu`) REFERENCES `brand` (`idB`);

--
-- Contraintes pour la table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`brandL`) REFERENCES `brand` (`idB`),
  ADD CONSTRAINT `laptop_ibfk_2` FOREIGN KEY (`colorL`) REFERENCES `color` (`idC`),
  ADD CONSTRAINT `laptop_ibfk_3` FOREIGN KEY (`cpuL`) REFERENCES `cpu` (`idCpu`),
  ADD CONSTRAINT `laptop_ibfk_4` FOREIGN KEY (`vcardL`) REFERENCES `vcard` (`idV`);

--
-- Contraintes pour la table `vcard`
--
ALTER TABLE `vcard`
  ADD CONSTRAINT `vcard_ibfk_1` FOREIGN KEY (`brandV`) REFERENCES `brand` (`idB`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
