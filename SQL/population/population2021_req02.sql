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
SELECT *
FROM personnes;

-- 2. Afficher le contenu de la table personne trié par nom de famille et prénom.
SELECT *
FROM personnes
ORDER BY nomP ASC, prenomP ASC;

-- 3. Afficher le nom, prénom, sexe et date de naissance de toutes les personnes de la plus âgée à la plus jeune.
SELECT  nomP AS `nom`,
        prenomP AS `prénom`, 
        sexeP AS `sexe`, 
        dnaissP AS `date de naissance`
FROM personnes
ORDER BY dnaissP ASC;

-- 4. Afficher le nom, prénom, sexe et date de naissance de toutes les personnes habitant en Allemagne de la plus âgée à la plus jeune.
--   309 lignes
SELECT  nomP AS `nom`,
        prenomP AS `prénom`, 
        sexeP AS `sexe`, 
        dnaissP AS `date de naissance`
FROM personnes 
WHERE paysP = 'Germany'
ORDER BY dnaissP ASC;

-- 5. Afficher le nom, prénom, sexe et date de naissance de toutes les femmes habitant en France de la plus âgée à la plus jeune.
--    154 lignes
SELECT  nomP AS `nom`,
        prenomP AS `prénom`, 
        sexeP AS `sexe`, 
        dnaissP AS `date de naissance`
FROM personnes 
WHERE sexeP = 'F' AND paysP = 'France'
ORDER BY dnaissP ASC;

-- 6. Afficher les 20 personnes les plus grandes (nom, prénom, pays, taille).
--    Odom 	Theodore 	Germany 	240 ... Hanson 	Drew 	Spain 	214
SELECT  nomP AS `nom`, 
        prenomP AS `prenom`,
        paysP AS `pays`,
        tailleP AS `taille`
FROM personnes
ORDER BY tailleP DESC
LIMIT 20;

-- 7. Afficher les 5 plus grandes femmes (nom, prénom, pays, taille).
--    Gargiulo 	Rebecca 	Italy 	226 ... Nieves 	Colleen 	Spain 	212
SELECT  nomP AS `nom`, 
        prenomP AS `prenom`,
        paysP AS `pays`,
        tailleP AS `taille`
FROM personnes
WHERE sexeP = 'F'
ORDER BY tailleP DESC
LIMIT 5;

-- 8. Afficher le nom, prénom et ville de la femme la plus lourde de France.
--    Nicolas 	Éloïse 	Créteil 
SELECT  nomP AS `nom`, 
        prenomP AS `prenom`,
        villeP AS `ville`
FROM personnes
WHERE sexeP = 'F' AND paysP = 'France'
ORDER BY masseP DESC
LIMIT 1;

-- 9. Calculer et afficher l'IMC de toutes les personnes, classées par IMC décroissant. IMC= masse / (taille en m)²
--    Gallo 	Arianna 	91.1458 ... 
SELECT  nomP AS `nom`, 
        prenomP AS `prenom`,
        masseP / ((tailleP * tailleP /10000)) AS `IMC`
FROM personnes
ORDER BY `IMC` DESC;


-- 10. Afficher les 5 françaises les plus anorexiques.
--    Michel 	Romane 	5.1891 ... Adam 	Sarah 	7.7745

SELECT  nomP AS `nom`, 
        prenomP AS `prenom`,
        masseP / ((tailleP * tailleP /10000)) AS `IMC`
FROM personnes
WHERE sexeP = 'F' AND paysP = 'France'
ORDER BY `IMC` ASC
LIMIT 5;
