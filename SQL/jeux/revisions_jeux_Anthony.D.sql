NOM:
PRENOM:
PLACE:

-- 01
-- Liste de tous les plateaux de jeu class�s par idPlat
--    idPlat, description, lignes, colonnes, coul1, coul2 

SELECT 
    idPlat AS `id`,
    descPlat AS `description`,
    nbLgPlat AS `nbre de lignes`,
    nbColPlat AS `nbre de colonnes`,
    coul1Plat AS `couleur 1`,
    coul2Plat AS `couleur 2`
FROM plateaux
ORDER BY idPlat ASC;

-- 02
-- Liste de tous les plateaux de jeu "carr�s" class�s par idPlat
--    idPlat, description, lignes, colonnes, coul1, coul2
-- ==> dam10, dam8, dam8u 

SELECT 
    idPlat AS `id`,
    descPlat AS `description`,
    nbLgPlat AS `nbre de lignes`,
    nbColPlat AS `nbre de colonnes`,
    coul1Plat AS `couleur 1`,
    coul2Plat AS `couleur 2`
FROM plateaux
WHERE nbLgPlat = nbColPlat
ORDER BY idPlat ASC;

-- 03
-- Liste de tous les plateaux de jeu
--   class�s du plus grand au plus petit (nb de cases) 
--    idPlat, description, lignes, colonnes, coul1, coul2, nb de cases 
-- ==> dam10 ... 100, dam8 ... 64, dam8u ... 64, plat6x5 ... 30, plat6x4u ... 24 

SELECT 
    idPlat AS `id`,
    descPlat AS `description`,
    nbLgPlat AS `nbre de lignes`,
    nbColPlat AS `nbre de colonnes`,
    coul1Plat AS `couleur 1`,
    coul2Plat AS `couleur 2`,
    (nbColPlat * nbLgPlat) AS `nbre de cases`
FROM plateaux
ORDER BY `nbre de cases` DESC;

-- 04
-- Liste de tous les jeux qui se jouent sur un plateau unicolore (pas de coul2)
--   class�s par ordre alphab�tique 
--    idJ, nomJ, idPlat, descPlat, couleur 
-- ==> othello ... green, solx ... red

SELECT
    idJ AS `id jeu`,
    nomJ AS `nom du jeu`,
    idPlat AS `id plateau`,
    descPlat AS `description plateau`,
    coul1Plat AS `couleur`
FROM jeux
LEFT JOIN plateaux ON jeux.plateauJ = plateaux.idPlat
WHERE coul2Plat IS NULL
ORDER BY nomJ ASC;

-- 05
-- Pour le jeu d'�chec (echecs):
--   Liste de toutes les pi�ces et leur position
--   class�es par ligne, colonne
--     ligne, colonne, nom de la pi�ce, couleur
-- ==> 32 positions (1,1,Tour noire,black .. 8,8,Tour blanche,white)

SELECT
    lgPos AS `ligne`,
    colPos AS `colonne`,
    nomPc AS `nom de la pièce`,
    coulPc AS `couleur`
FROM pieces
LEFT JOIN positions ON pieces.idPc = positions.idPcPos
LEFT JOIN jeux ON positions.idJPos = jeux.idJ
WHERE nomJ = 'Echecs'
ORDER BY lgPos, colPos ASC;

-- 06
-- pour chaque jeu:
--    nomJ, descPlat, nb total de pi�ces, nb de pi�ces diff�rentes
-- ==> Dames anglaises   Damier 8x8      24   2
--     Dames fran�aises  Damier 10x10    40   2
--     Echecs            Damier 8x8      32   12
--     Othello / Reversi Damier uni 8x8  4    2
--     Solitaire 1       Damier 6x5      6    1
--     Solitaire 2       Damier 6x4      8    1

SELECT
    nomJ AS `nom du jeu`,
    descPlat AS `description`,
    COUNT(idPc) AS `nbre total de pièces`,
    COUNT(DISTINCT idPc) AS `nbre de pièces différentes`
FROM jeux
LEFT JOIN plateaux ON jeux.plateauJ = plateaux.idPlat
LEFT JOIN positions ON jeux.idJ = positions.idJPos
LEFT JOIN pieces ON positions.idPcPos = pieces.idPc
GROUP BY nomJ;

-- 07
-- liste des jeux qui se jouent avec des pi�ces d'une seule couleur
--  idJ, nomJ
-- ==> soltri, solx

SELECT
    idJ AS `id jeu`,
    nomJ AS `nom du jeu`
FROM jeux
LEFT JOIN positions ON jeux.idJ = positions.idJPos
LEFT JOIN pieces ON positions.idPcPos = pieces.idPc
GROUP BY nomJ
HAVING COUNT(DISTINCT coulPc) = 1

-- 08
-- dans le jeu d'�chec (echecs)
--   d�placer le cavalier en position (8,2) en position (6,3)

UPDATE positions
SET lgPos = 6,
    colPos = 3
WHERE idJPos = 'Echecs' AND lgPos = 8 AND colPos = 2;

-- 09
-- changer la couleur de toutes les pi�ces noire (black) en rouge (red)

UPDATE pieces
SET coulPc = 'red'
WHERE coulPc = 'black';

-- 10
-- dans le jeu d'�chec (echecs)
--   supprimer tous les pions blanc (PB)

DELETE FROM positions
WHERE idJPos = 'echecs' AND idPcPos = 'PB';