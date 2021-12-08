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

-- 1. Pour chaque pays : le nombre de personnes
SELECT paysP, COUNT(idP) AS `population`
FROM personnes
GROUP BY paysP
;

-- 2. Pour chaque pays : le nombre de personnes
--   + tri du pays le plus peuplé vers moins peuplé
SELECT paysP, COUNT(idP) AS `population`
FROM personnes
GROUP BY paysP
ORDER BY `population` DESC
;

-- 3. Pour chaque pays : le nombre de personnes, la masse totale, la masse moyenne, la taille maximale
SELECT paysP, COUNT(idP) AS `population`,
              SUM(masseP) AS `masse totale`,
              AVG(masseP) AS `masse moyenne`,
              MAX(tailleP) AS `taille max`
FROM personnes
GROUP BY paysP
;

-- 4. Pour chaque pays : le nombre de géants (>= 2 mètres)
--     remarque: il se peut que certains pays n'apparaissent pas !!!!
SELECT paysP, COUNT(idP) AS `géants`
FROM personnes
WHERE tailleP >= 200
GROUP BY paysP
;

-- 5. Pour chaque pays : le nombre de villes différentes
SELECT paysP, COUNT(DISTINCT villeP) AS `villes`
FROM personnes
GROUP BY paysP
;

-- 6. Les 3 patronymes (nom de famille) les plus répandus : nom, qté
SELECT nomP, COUNT(idP) AS `qté`
FROM personnes
GROUP BY nomP
ORDER BY `qté` DESC
LIMIT 3
;

-- 7. Pour chaque pays : pour chaque sexe : le nombre de personnes
SELECT paysP, sexeP, COUNT(idP) AS `population`
FROM personnes
GROUP BY paysP, sexeP
;

-- 8. liste des pays de plus (>=) de 300 personnes
SELECT paysP, COUNT(idP) AS `population`
FROM personnes
GROUP BY paysP
HAVING `population` >= 300
;

-- 9. pour chaque pays : la liste des patronymes uniques
SELECT paysP, nomP, COUNT(idP) AS `qté`
FROM personnes
GROUP BY paysP, nomP
HAVING `qté` = 1
;

-- 10. Le nombre de personnes dont le patronyme commence par A, B, C...
--    remarque : toutes les lettres ne sont pas représentées
SELECT LEFT(nomP, 1) AS `lettre`, COUNT(idP)
FROM personnes
GROUP BY LEFT(nomP, 1)
;

SELECT LEFT(nomP, 1) AS `lettre`, COUNT(idP)
FROM personnes
GROUP BY `lettre`
;