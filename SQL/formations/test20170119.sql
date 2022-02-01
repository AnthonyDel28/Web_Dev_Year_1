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

-- ----------------------------------------------------------------------------
-- 06
-- Liste des cours pour lesquels il n'y pas encore de prof
--    class�es par ordre alphab�tique
--    intitul� du cours, code du cours, nb de p�riodes 
-- ----------------------------------------------------------------------------
-- => 4 cours (ANGL .. STAT)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 07
-- Liste de tous les cours
--    class�es par ordre alphab�tique
--    nom du cours, code du cours, nb de p�riodes 
--  + nombre d'inscrits
-- ----------------------------------------------------------------------------
-- => 12 lignes (ACA 3, ANGL 0 ... STAT 0, MULT 3)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 08
-- Liste des "autodidactes" : profs qui suivent leur propre cours
--    idPers, nom, pr�nom, idC, intitul�
-- ----------------------------------------------------------------------------
-- => 1 Leroy Albert JARD Jardinage
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 09
-- Liste des "regroupements" : m�mes cours organis�s dans plusieurs formations
--    idC, intitul�, nb de formations regroup�es
-- ----------------------------------------------------------------------------
-- => 3 cours (ANGL organis� 2 fois, MULT organis� 2 fois, STAT organis� 2 fois)
-- ----------------------------------------------------------------------------

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

-- ----------------------------------------------------------------------------
-- 11
-- ajouter une nouvelle personne: vous m�me (votre nom et pr�nom)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 12
-- diminuer de 100 p�riodes le total de p�riodes du bac en info (BINFO)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 13
-- augmenter de 10% le nombre de p�riodes
--    de tous les cours organis�s en art floral (FLEUR)
-- ----------------------------------------------------------------------------
  