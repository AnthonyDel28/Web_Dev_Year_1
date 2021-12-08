/*
Soit la table `personnes`
`idP` int(10) UNSIGNED NOT NULL,
`nomP` varchar(50) NOT NULL,
`prenomP` varchar(50) NOT NULL,
`sexeP` enum('M','F') DEFAULT NULL,
`dnaissP` date DEFAULT NULL,
`villeP` varchar(50) DEFAULT NULL,
`paysP` varchar(50) DEFAULT NULL,
`tailleP` int(10) UNSIGNED DEFAULT NULL,
`masseP` int(10) UNSIGNED DEFAULT NULL
*/

-- 1. Afficher le contenu de la table personne.

-- 2. Afficher le contenu de la table personne trié par nom de famille et prénom.

-- 3. Afficher le nom, prénom, sexe et date de naissance de toutes les personnes de la plus âgée à la plus jeune.

-- 4. Afficher le nom, prénom, sexe et date de naissance de toutes les personnes habitant en Allemagne de la plus âgée à la plus jeune.
--   309 lignes

-- 5. Afficher le nom, prénom, sexe et date de naissance de toutes les femmes habitant en France de la plus âgée à la plus jeune.
--    154 lignes

-- 6. Afficher les 20 personnes les plus grandes (nom, prénom, pays, taille).
--    Odom 	Theodore 	Germany 	240 ... Hanson 	Drew 	Spain 	214

-- 7. Afficher les 5 plus grandes femmes (nom, prénom, pays, taille).
--    Gargiulo 	Rebecca 	Italy 	226 ... Nieves 	Colleen 	Spain 	212

-- 8. Afficher le nom, prénom et ville de la femme la plus lourde de France.
--    Nicolas 	Éloïse 	Créteil

-- 9. Calculer et afficher l'IMC de toutes les personnes, classées par IMC décroissant. IMC= masse / (taille en m)²
--    Gallo 	Arianna 	91.1458 ... 

-- 10. Afficher les 5 françaises les plus anorexiques.
--    Michel 	Romane 	5.1891 ... Adam 	Sarah 	7.7745

