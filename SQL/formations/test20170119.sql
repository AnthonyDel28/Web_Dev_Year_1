NOM:
PRENOM:
PLACE:

-- ----------------------------------------------------------------------------
-- 01
-- Liste de tous les cours organis�s class�s par ordre alphab�tique
--    intitul� du cours, code du cours, nb de p�riodes 
-- ----------------------------------------------------------------------------


SELECT
    intituleC AS `intitulé du cours`, 
    idC AS `code du cours`,
    nbPerC AS `nbre de périodes`
FROM cours
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 02
-- Liste de tous les cours de 60 p�riodes ou plus
--    class�s par ordre alphab�tique
--    intitul� du cours, code du cours, nb de p�riodes
-- ----------------------------------------------------------------------------
-- => 9 cours (ACA .. MULT) 
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    idC AS `code du cours`,
    nbPerC AS `nbre de périodes`
FROM cours
WHERE nbPerC >= 60
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 03
-- Liste de tous les cours du bac en info (BINFO)
--    class�es par ordre alphab�tique
--    intitul� du cours, code du cours, nb de p�riodes
-- ----------------------------------------------------------------------------
-- => 6 cours (ACA .. STAT) 
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nbre de périodes`
FROM cours
LEFT JOIN coursform ON cours.idC = coursform.idC
WHERE coursform.idForm = 'BINFO'
ORDER BY intituleC ASC;


-- ----------------------------------------------------------------------------
-- 04
-- Liste de tous les cours
--    class�es par ordre alphab�tique
--    intitul� du cours, code du cours, nb de p�riodes 
--  + nom(s) du(des) prof(s) + prenom(s)
-- ----------------------------------------------------------------------------
-- => 14 lignes :  
-- intitul�                            code nb de p�riodes nom du prof pr�nom du prof
-- Analyse et conception d'application ACA  120            Einstein    Frank
-- Anglais niv 2                       ANGL 40             NULL        NULL
-- ...
-- Statistiques                        STAT 60             NULL        NULL
-- Tables de multiplication            MULT 80             Egretel     Hansel
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nbre de périodes`,
    nomPers AS `nom prof`, 
    prenomPers AS `prénom prof`
FROM cours
LEFT JOIN profs2016 ON cours.idC = profs2016.idC
LEFT JOIN personnes ON profs2016.idPers = personnes.idPers
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 05
-- Liste de tous les cours
--    class�es par ordre alphab�tique
--    intitul� du cours, code du cours, nb de p�riodes 
--  + nom(s) du(des) prof(s) + initiale du prenom dans une seule colonne
--     ex:  Dupont M.  
-- ----------------------------------------------------------------------------
-- => 14 lignes :  
-- intitul�                            code nb de p�riodes prof
-- Analyse et conception d'application ACA  120            Einstein F.
-- Anglais niv 2                       ANGL 40             NULL
-- ...
-- Statistiques                        STAT 60             NULL
-- Tables de multiplication            MULT 80             Egretel H.
-- ----------------------------------------------------------------------------

SELECT 
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nbre de périodes`,
    CONCAT(nomPers, ' ', LEFT(prenomPers, 1), '.') AS `nom` 
FROM cours
LEFT JOIN profs2016 ON cours.idC = profs2016.idC
LEFT JOIN personnes ON profs2016.idPers = personnes.idPers
ORDER BY intituleC ASC;

-- ----------------------------------------------------------------------------
-- 06
-- Liste des cours pour lesquels il n'y pas encore de prof
--    class�es par ordre alphab�tique
--    intitul� du cours, code du cours, nb de p�riodes 
-- ----------------------------------------------------------------------------
-- => 4 cours (ANGL .. STAT)
-- ----------------------------------------------------------------------------

SELECT
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nbre de périodes`
FROM cours
LEFT JOIN profs2016 ON cours.idC = profs2016.idC
WHERE NOT EXISTS (SELECT * FROM cours WHERE cours.idC = profs2016.idC)
ORDER BY intituleC;

-- ----------------------------------------------------------------------------
-- 07
-- Liste de tous les cours
--    class�es par ordre alphab�tique
--    nom du cours, code du cours, nb de p�riodes 
--  + nombre d'inscrits
-- ----------------------------------------------------------------------------
-- => 12 lignes (ACA 3, ANGL 0 ... STAT 0, MULT 3)
-- ----------------------------------------------------------------------------


SELECT
    intituleC AS `intitulé du cours`, 
    cours.idC AS `code du cours`,
    nbPerC AS `nbre de périodes`,
    COUNT(DISTINCT inscr2016.idPers) AS `nbre d'inscrits`
FROM cours
LEFT JOIN inscr2016 ON cours.idC = inscr2016.idC
GROUP BY cours.idC
ORDER BY intituleC ASC;


-- ----------------------------------------------------------------------------
-- 08
-- Liste des "autodidactes" : profs qui suivent leur propre cours
--    idPers, nom, pr�nom, idC, intitul�
-- ----------------------------------------------------------------------------
-- => 1 Leroy Albert JARD Jardinage
-- ----------------------------------------------------------------------------

SELECT
    personnes.idPers,
    nomPers AS `nom`,
    prenomPers AS `prenom`,
    cours.idC,
    intituleC AS `intitulé`
FROM personnes
LEFT JOIN inscr2016 ON personnes.idPers = inscr2016.idPers
LEFT JOIN cours ON inscr2016.idC = cours.idC
LEFT JOIN profs2016 ON personnes.idPers = profs2016.idPers
WHERE profs2016.idPers = inscr2016.idPers AND profs2016.idC = inscr2016.idC;

-- ----------------------------------------------------------------------------
-- 09
-- Liste des "regroupements" : m�mes cours organis�s dans plusieurs formations
--    idC, intitul�, nb de formations regroup�es
-- ----------------------------------------------------------------------------
-- => 3 cours (ANGL organis� 2 fois, MULT organis� 2 fois, STAT organis� 2 fois)
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
-- pour chaque formation: id, intitul�, nb de p�riodes
--    + nbre de cours organis�s
--    + nbre de p�riodes organis�es
-- ----------------------------------------------------------------------------
-- => 3 lignes 
--  idForm intituleForm              nbPerForm nb cours organis�s nb p�riodes organis�s
--  BCPTA  Bachelier en comptabilit� 2200      4                  260
--  BINFO  Bachelier en informatique 2400      6                  520
--  FLEUR  Art floral                240       4                  300
-- ----------------------------------------------------------------------------

SELECT
    formations.idForm AS `id`,
    intituleForm AS `intitulé`,
    nbPerForm AS `nb de périodes`,
    COUNT(coursform.idC) AS `nbre de cours organisés`,
    SUM(nbPerC) AS `nbre de périodes organisées`
FROM formations
LEFT JOIN coursform ON formations.idForm = coursform.idForm
LEFT JOIN cours ON coursform.idC = cours.idC
GROUP BY formations.idForm;

-- ----------------------------------------------------------------------------
-- 11
-- ajouter une nouvelle personne: vous m�me (votre nom et pr�nom)
-- ----------------------------------------------------------------------------

INSERT INTO personnes(nomPers, prenomPers)
VALUES ('Delmeire', 'Anthony');

-- ----------------------------------------------------------------------------
-- 12
-- diminuer de 100 p�riodes le total de p�riodes du bac en info (BINFO)
-- ----------------------------------------------------------------------------

UPDATE formations
SET nbPerForm = nbPerForm - 100
WHERE idForm = 'BINFO';

-- ----------------------------------------------------------------------------
-- 13
-- augmenter de 10% le nombre de p�riodes
--    de tous les cours organis�s en art floral (FLEUR)
-- ----------------------------------------------------------------------------
  
UPDATE cours
LEFT JOIN coursform ON cours.idC = coursform.idC
SET nbPerC = nbPerC * 1.10
WHERE coursform.idForm = 'FLEUR';