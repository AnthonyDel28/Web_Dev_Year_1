NOM: DELMEIRE           PRENOM: ANTHONY

-- ----------------------------------------------------------------------------
-- 01
-- Liste de tous les cours organisés classés par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    idC AS `code du cours`,
    nbPerC AS `nb de périodes`
FROM cours
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 02
-- Liste de tous les cours de 60 périodes ou plus
--    classés par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes
-- => 9 cours (ACA..MULT)
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    idC AS `code du cours`,
    nbPerC AS `nb de périodes`
FROM cours
WHERE nbPerC >= 60
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 03
-- Liste de tous les cours du bac en info (BINFO)
--    classés par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes
-- => 6 cours (ACA..STAT)
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nb de périodes`
FROM cours
LEFT JOIN coursform ON cours.idC = coursform.idC
WHERE coursform.idForm = 'BINFO'
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 04
-- Liste de tous les cours
--    classés par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes
--  + nom(s) du(des) prof(s) + prénom(s)
-- => 14 lignes:
-- intitulé                            code nb de périodes nom du prof prénom du prof
-- Analyse et conception d'application ACA  120            Einstein    Frank
-- Anglais niv 2                       ANGL 40             NULL        NULL
-- ...
-- Statistiques                        STAT 60             NULL        NULL
-- Tables de multiplication            MULT 80             Egretel     Hansel
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nb de périodes`,
    nomPers AS `nom prof`, 
    prenomPers AS `prénom prof`
FROM cours
LEFT JOIN profs2016 ON cours.idC = profs2016.idC
LEFT JOIN personnes ON profs2016.idPers = personnes.idPers
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 05
-- Liste de tous les cours
--    classés par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes
--  + nom(s) du(des) prof(s) + initiale du prenom dans une seule colonne
--     ex:  Dupont M.
-- => 14 lignes:
-- intitulé                            code nb de périodes prof
-- Analyse et conception d'application ACA  120            Einstein F.
-- Anglais niv 2                       ANGL 40             NULL
-- ...
-- Statistiques                        STAT 60             NULL
-- Tables de multiplication            MULT 80             Egretel H.
-- ----------------------------------------------------------------------------

SELECT 
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nb de périodes`,
    CONCAT(nomPers, ' ', LEFT(prenomPers, 1), '.') AS `nom du prof` 
FROM cours
LEFT JOIN profs2016 ON cours.idC = profs2016.idC
LEFT JOIN personnes ON profs2016.idPers = personnes.idPers
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 06
-- Liste des cours pour lesquels il n'y pas encore de prof
--    classés par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes
-- => 4 cours (ANGL..STAT)
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nb de périodes`
FROM cours
LEFT JOIN profs2016 ON cours.idC = profs2016.idC
WHERE NOT EXISTS (SELECT * FROM cours WHERE cours.idC = profs2016.idC)
ORDER BY intituleC;

-- ----------------------------------------------------------------------------
-- 07
-- Liste de tous les cours
--    classés par ordre alphabétique
--    nom du cours, code du cours, nb de périodes
--  + nombre d'inscrits
-- => 12 lignes (ACA 3, ANGL 0...STAT 0, MULT 3)
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nb de périodes`,
    COUNT(DISTINCT inscr2016.idPers) AS `nombre d'inscrits`
FROM cours
LEFT JOIN inscr2016 ON cours.idC = inscr2016.idC
GROUP BY cours.idC
ORDER BY intituleC ASC;


-- ----------------------------------------------------------------------------
-- 08
-- Liste des "autodidactes" : profs qui suivent leur propre cours
--    idPers, nom, pr�nom, idC, intitulé
-- => 1 Leroy Albert JARD Jardinage
-- ----------------------------------------------------------------------------

SELECT
    personnes.idPers,
    nomPers AS `nom`,
    prenomPers AS `prenom`,
    cours.idC,
    intituleC AS `intitulé`
FROM personnes
LEFT JOIN profs2016 ON personnes.idPers = profs2016.idPers
LEFT JOIN cours ON profs2016.idC = cours.idC
LEFT JOIN inscr2016 ON cours.idC = inscr2016.idC
WHERE profs2016.idPers = inscr2016.idPers;

-- ----------------------------------------------------------------------------
-- 09
-- Liste des "regroupements" : mêmes cours organisés dans plusieurs formations
--    idC, intitulé, nb de formations regroupées
-- => 3 cours (
  ANGL organisé 2 fois,
  MULT organisé 2 fois,
  STAT organisé 2 fois )
-- ----------------------------------------------------------------------------

SELECT
    cours.idC,
    intituleC AS `intitulé`,
    COUNT(coursform.idC) AS `nb de formations regroupées`
FROM cours
LEFT JOIN coursform ON cours.idC = coursform.idC
GROUP BY cours.idC
HAVING COUNT(coursform.idC) >= 2;

-- ----------------------------------------------------------------------------
-- 10
-- pour chaque formation: id, intitulé, nb de périodes
--    + nbre de cours organisés
--    + nbre de périodes organisées
-- => 3 lignes
--  idForm intituleForm              nbPerForm nb cours organisés nb périodes organisées
--  BCPTA  Bachelier en comptabilité 2200      4                  260
--  BINFO  Bachelier en informatique 2400      6                  520
--  FLEUR  Art floral                240       4                  300
-- ----------------------------------------------------------------------------

SELECT
    formations.idForm AS `id`,
    intituleForm AS `intitulé`,
    nbPerForm AS `nb de périodes`,
    COUNT(coursform.idC) AS `nb de cours organisés`,
    SUM(nbPerC) AS `nb de périodes organisées`
FROM formations
LEFT JOIN coursform ON formations.idForm = coursform.idForm
LEFT JOIN cours ON coursform.idC = cours.idC
GROUP BY formations.idForm;

-- ----------------------------------------------------------------------------
-- 11
-- ajouter une nouvelle personne: vous m�me (votre nom et prénom)
-- ----------------------------------------------------------------------------

INSERT INTO personnes(nomPers, prenomPers)
VALUES ('Delmeire', 'Anthony');

-- ----------------------------------------------------------------------------
-- 12
-- diminuer de 100 périodes le total de périodes du bac en info (BINFO)
-- ----------------------------------------------------------------------------

UPDATE formations
SET nbPerForm = nbPerForm - 100
WHERE idForm = 'BINFO';

-- ----------------------------------------------------------------------------
-- 13
-- augmenter de 10% le nombre de périodes
--    de tous les cours organisés en art floral (FLEUR)
-- ----------------------------------------------------------------------------

UPDATE cours
LEFT JOIN coursform ON cours.idC = coursform.idC
SET nbPerC = nbPerC * 1.10
WHERE coursform.idForm = 'FLEUR';