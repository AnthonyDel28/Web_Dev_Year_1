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


-- liste des personnes
SELECT nomP, prenomP
FROM personnes;

-- nom, prenom, sexe ?
SELECT nomP, prenomP, sexeP
FROM personnes;

-- nom, prenom, sexe triés par ordre alphabétique
SELECT nomP, prenomP, sexeP
FROM personnes
ORDER BY nomP ASC;

-- nom, prenom, sexe des italiens triés par ordre alphabétique
SELECT nomP, prenomP, sexeP, paysP
FROM personnes
WHERE paysP = 'Italy'
ORDER BY nomP ASC;

-- nom, prenom, sexe des italiens et des français triés par ordre alphabétique
SELECT nomP, prenomP, sexeP, paysP
FROM personnes
WHERE paysP = 'Italy' OR paysP = 'France'
ORDER BY nomP ASC;

-- nom, prenom, taille des personnes de moins de 150 cm  ==> 210 résultats
SELECT nomP, prenomP, tailleP 
FROM personnes
WHERE tailleP < 150;

-- nom, prenom, taille des personnes entre 150 et 200 cm ==> 907 résultats
SELECT nomP, prenomP, tailleP
FROM personnes
WHERE tailleP BETWEEN 150 AND 200;


-- nom, prenom, taille des personnes pas entre 150 et 200 cm  ==> 293
SELECT nomP, prenomP, tailleP
FROM personnes
WHERE tailleP < 150 OR tailleP > 200; 

-- nom, prenom, taille des français de 2.20m ou plus ==> 1 seul
SELECT nomP, prenomP, tailleP, paysP
FROM personnes
WHERE paysP = 'France' AND tailleP >= 220;

-- nom, prenom, taille des personne dont le nom commence par A  ==> 43
SELECT nomP, prenomP, tailleP
FROM personnes
WHERE nomP LIKE 'a%';

-- nom, prenom, taille des personne dont le nom contient au moins un A  ==> 651
SELECT nomP, prenomP, tailleP
FROM personnes
WHERE nomP LIKE '%a%';

-- nom, prenom, taille des personne dont le nom contient au moins deux A  ==> 104
SELECT nomP, prenomP, tailleP
FROM personnes 
WHERE nomP LIKE '%a%a%';

-- nom, prenom, taille des personne dont le nom contient un seul A  ==> 547 
SELECT nomP, prenomP, tailleP
FROM personnes
WHERE nomP LIKE '%a%' AND nomP NOT LIKE '%a%a%';

-- nom, prenom, taille des personne dont la 2ème lettre du nom est un A  ==> 310
SELECT nomP, prenomP, tailleP
FROM personnes
WHERE nomP LIKE '_A%';

-- liste des pays
SELECT DISTINCT paysP
FROM personnes;

-- liste des personne + IMC (masse en kg / taille en m au carré)
SELECT  nomP, 
        prenomP,
        masseP / ((tailleP/100) * (tailleP/100)) AS `IMC`
FROM personnes
ORDER BY `IMC` DESC;

-- liste des personne en surpoids (IMC >= 50)
SELECT  nomP AS `nom`, 
        prenomP AS `prénom`,
        masseP / ((tailleP/100) * (tailleP/100)) AS `IMC`
FROM personnes
WHERE masseP / ((tailleP/100) * (tailleP/100)) >= 50
ORDER BY `IMC` DESC;