NOM:
PRENOM:
PLACE:

-- ----------------------------------------------------------------------------
-- 01
-- Liste de tous les cours organisés classés par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes 
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 02
-- Liste de tous les cours de 60 périodes ou plus
--    classés par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes
-- ----------------------------------------------------------------------------
-- => 9 cours (ACA .. MULT) 
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 03
-- Liste de tous les cours du bac en info (BINFO)
--    classées par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes
-- ----------------------------------------------------------------------------
-- => 6 cours (ACA .. STAT) 
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 04
-- Liste de tous les cours
--    classées par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes 
--  + nom(s) du(des) prof(s) + prenom(s)
-- ----------------------------------------------------------------------------
-- => 14 lignes :  
-- intitulé                            code nb de périodes nom du prof prénom du prof
-- Analyse et conception d'application ACA  120            Einstein    Frank
-- Anglais niv 2                       ANGL 40             NULL        NULL
-- ...
-- Statistiques                        STAT 60             NULL        NULL
-- Tables de multiplication            MULT 80             Egretel     Hansel
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 05
-- Liste de tous les cours
--    classées par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes 
--  + nom(s) du(des) prof(s) + initiale du prenom dans une seule colonne
--     ex:  Dupont M.  
-- ----------------------------------------------------------------------------
-- => 14 lignes :  
-- intitulé                            code nb de périodes prof
-- Analyse et conception d'application ACA  120            Einstein F.
-- Anglais niv 2                       ANGL 40             NULL
-- ...
-- Statistiques                        STAT 60             NULL
-- Tables de multiplication            MULT 80             Egretel H.
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 06
-- Liste des cours pour lesquels il n'y pas encore de prof
--    classées par ordre alphabétique
--    intitulé du cours, code du cours, nb de périodes 
-- ----------------------------------------------------------------------------
-- => 4 cours (ANGL .. STAT)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 07
-- Liste de tous les cours
--    classées par ordre alphabétique
--    nom du cours, code du cours, nb de périodes 
--  + nombre d'inscrits
-- ----------------------------------------------------------------------------
-- => 12 lignes (ACA 3, ANGL 0 ... STAT 0, MULT 3)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 08
-- Liste des "autodidactes" : profs qui suivent leur propre cours
--    idPers, nom, prénom, idC, intitulé
-- ----------------------------------------------------------------------------
-- => 1 Leroy Albert JARD Jardinage
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 09
-- Liste des "regroupements" : mêmes cours organisés dans plusieurs formations
--    idC, intitulé, nb de formations regroupées
-- ----------------------------------------------------------------------------
-- => 3 cours (ANGL organisé 2 fois, MULT organisé 2 fois, STAT organisé 2 fois)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 10
-- pour chaque formation: id, intitulé, nb de périodes
--    + nbre de cours organisés
--    + nbre de périodes organisées
-- ----------------------------------------------------------------------------
-- => 3 lignes 
--  idForm intituleForm              nbPerForm nb cours organisés nb périodes organisés
--  BCPTA  Bachelier en comptabilité 2200      4                  260
--  BINFO  Bachelier en informatique 2400      6                  520
--  FLEUR  Art floral                240       4                  300
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 11
-- ajouter une nouvelle personne: vous même (votre nom et prénom)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 12
-- diminuer de 100 périodes le total de périodes du bac en info (BINFO)
-- ----------------------------------------------------------------------------

-- ----------------------------------------------------------------------------
-- 13
-- augmenter de 10% le nombre de périodes
--    de tous les cours organisés en art floral (FLEUR)
-- ----------------------------------------------------------------------------
  