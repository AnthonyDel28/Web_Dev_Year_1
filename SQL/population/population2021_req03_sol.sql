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

-- 1. Afficher la liste des pays classés par ordre alphabétique
SELECT DISTINCT nomP
FROM personnes
ORDER BY nomP ASC
;

-- 2. Afficher la liste des villes françaises classées par ordre alphabétique
-- ==> 135 villes
SELECT DISTINCT villeP
FROM personnes
WHERE paysP="France"
ORDER BY villeP ASC
;

-- 3. Afficher le nom, prénom, sexe et date de naissance de toutes les personnes nées en 1990.
-- ==> 13 personnes
SELECT nomP, prenomP, sexeP, dnaissP
FROM personnes
WHERE dnaissP BETWEEN "1990-01-01" AND "1990-12-31"
;

SELECT nomP, prenomP, sexeP, dnaissP
FROM personnes
WHERE YEAR(dnaissP) = 1990
;

-- 4. Afficher le nom, prénom, sexe et date de naissance de toutes les personnes qui ont leur anniversaire aujourd'hui.
-- ==> ?? personnes
SELECT nomP, prenomP, sexeP, dnaissP
FROM personnes
WHERE MONTH(dnaissP) = MONTH(CURRENT_DATE) AND DAY(dnaissP) = DAY(CURRENT_DATE)
;


