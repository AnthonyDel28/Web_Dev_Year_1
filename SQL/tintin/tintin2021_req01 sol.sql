-- tintin2021
-- (pays, album, personnage, juron, pays_album, pers_album, juron_album)

-----------------------------------------------------------------------------
-- 01.liste des personnages
--    --> Nom, Prénom, Fonction, Sexe
--    classés par ordre alphabétique sur nom, prenom
---------------------------------------------------------------------------
SELECT nomPers AS `nom`,
       prenomPers AS `prénom`,
       fonctPers AS `fonction`,
       sexePers AS `sexe` 
FROM personnage
ORDER BY nomPers ASC, prenomPers ASC
;
-----------------------------------------------------------------------------
-- 02.liste des personnages féminins
--    --> Nom, Prénom, Fonction, Sexe
--    classés par ordre alphabétique sur nom, prenom
---------------------------------------------------------------------------
SELECT nomPers AS `nom`,
       prenomPers AS `prénom`,
       fonctPers AS `fonction`,
       sexePers AS `sexe` 
FROM personnage
WHERE sexePers = "F"
ORDER BY nomPers ASC, prenomPers ASC
;

-----------------------------------------------------------------------------
-- 03.liste des personnages féminins
--    --> Nom, Prénom, Fonction, Sexe
--    classés par ordre alphabétique sur nom, prenom
--    dont le nom commence par 'A' ou 'a'
---------------------------------------------------------------------------
SELECT nomPers AS `nom`,
       prenomPers AS `prénom`,
       fonctPers AS `fonction`,
       sexePers AS `sexe` 
FROM personnage
WHERE sexePers = "F" AND nomPers LIKE "A%"
ORDER BY nomPers ASC, prenomPers ASC
;

-----------------------------------------------------------------------------
-- 04.liste des personnages féminins
--    --> Nom, Prénom, Fonction
--    classés par ordre alphabétique sur nom, prenom
--    dont le nom contient 1 seule lettre 'A' ou 'a'
---------------------------------------------------------------------------
SELECT nomPers AS `nom`,
       prenomPers AS `prénom`,
       fonctPers AS `fonction`,
       sexePers AS `sexe` 
FROM personnage
WHERE sexePers = "F" AND nomPers LIKE "%A%" AND nomPers NOT LIKE "%A%A%"
ORDER BY nomPers ASC, prenomPers ASC
;

----------------------------------------------------------------------------- 
-- 05.liste des personnages féminins
--    --> Nom, Prénom, Fonction, Sexe
--    classés par ordre alphabétique sur nom, prenom
--    dont le nom commence par une voyelle (a e i o u y)
---------------------------------------------------------------------------
SELECT nomPers AS `nom`,
       prenomPers AS `prénom`,
       fonctPers AS `fonction`,
       sexePers AS `sexe` 
FROM personnage
WHERE sexePers = "F" 
        AND (nomPers LIKE "A%" OR nomPers LIKE "E%" OR nomPers LIKE "I%"
             OR nomPers LIKE "O%" OR nomPers LIKE "U%" OR nomPers LIKE "Y%")
ORDER BY nomPers ASC, prenomPers ASC
;

SELECT nomPers AS `nom`,
       prenomPers AS `prénom`,
       fonctPers AS `fonction`,
       sexePers AS `sexe` 
FROM personnage
WHERE sexePers = "F" 
        AND LEFT(nomPers,1) IN ("A", "E", "I", "O", "U", "Y")
ORDER BY nomPers ASC, prenomPers ASC
;

SELECT nomPers AS `nom`,
       prenomPers AS `prénom`,
       fonctPers AS `fonction`,
       sexePers AS `sexe` 
FROM personnage
WHERE sexePers = "F" 
        AND nomPers RLIKE "^[AEIOUY].*"
ORDER BY nomPers ASC, prenomPers ASC
;

----------------------------------------------------------------------------- 
-- 06.liste des album
--    --> idAlb, titre
--    classés par ordre alphabétique sur titre
---------------------------------------------------------------------------
SELECT idAlb, titreAlb AS `titre`
FROM album
ORDER BY titreAlb ASC
;

----------------------------------------------------------------------------- 
-- 07.pour chaque album -> tous les pays visités
--    idAlb, titre, année, pays(nom du pays)
--    classés par ordre alphabétique sur titre, puis nom du pays
---------------------------------------------------------------------------
SELECT album.idAlb,
       titreAlb AS `titre`,
       dateAlb AS `année`,
       nomPays AS `nom du pays`
FROM album
    LEFT JOIN pays_album ON album.idAlb = pays_album.idAlb
    LEFT JOIN pays ON pays_album.idPays = pays.idPays
ORDER BY titreAlb ASC, nomPays ASC
;

----------------------------------------------------------------------------- 
-- 08.pour chaque album -> nombre de pays visités
--    idAlb, titre, année, nombre de pays
--    classés par ordre alphabétique sur titre
---------------------------------------------------------------------------
SELECT album.idAlb AS `num album`,
       titreAlb AS `titre`,
       dateAlb AS `année`,
       COUNT(idPays) AS `nombre de pays`
FROM album
    LEFT JOIN pays_album ON album.idAlb = pays_album.idAlb
GROUP BY album.idAlb
ORDER BY titreAlb ASC
;

---------------------------------------------------------------------------
-- 09.pour chaque pays -> nombre d'album concernés
--    pays(nom du pays), nbre d'album
--    classés par ordre alphabétique sur nom du pays
---------------------------------------------------------------------------
SELECT nomPays AS `nom du pays`, COUNT(idAlb) AS `nbre d'album`
FROM pays
    LEFT JOIN pays_album ON pays.idPays = pays_album.idPays
GROUP BY pays.idPays
ORDER BY nomPays
;

-----------------------------------------------------------------------------
-- 10.tous les jurons prononcés par Tintin
--    idJur, juron (nomJur)
--    classés par ordre alphabétique sur nom du juron
---------------------------------------------------------------------------
SELECT juron.idJur, nomJur
FROM juron
    LEFT JOIN juron_album ON juron.idJur = juron_album.idJur 
    LEFT JOIN personnage ON juron_album.idPers = personnage.idPers
WHERE nomPers = "tintin"
ORDER BY nomJur ASC
; 

-----------------------------------------------------------------------------
-- 11.tous les jurons DIFFERENTS prononcés par Tintin
--    idJur, juron (nomJur)
--    classés par ordre alpahbétique sur nom du juron
---------------------------------------------------------------------------
SELECT DISTINCT J.idJur, nomJur AS `nom du juron`
FROM juron AS J
    LEFT JOIN juron_album AS JA ON J.idJur = JA.idJur 
    LEFT JOIN personnage AS P ON JA.idPers = P.idPers
WHERE nomPers = "tintin"
ORDER BY `nom du juron` ASC
; 

----------------------------------------------------------------------------- 
-- 12.pour chaque album, tous les jurons DIFFERENTS prononcés par Tintin
--    idAlb, titre, idJur, juron (nomJur)
--    classés par ordre alpahbétique sur titre, nom du juron
---------------------------------------------------------------------------
SELECT DISTINCT A.idAlb, titreAlb, J.idJur, nomJur
FROM album AS A
    LEFT JOIN juron_album AS JA ON JA.idAlb = A.idAlb 
    LEFT JOIN personnage AS P ON JA.idPers = P.idPers
    LEFT JOIN juron AS J ON JA.idJur = J.idJur
WHERE nomPers = "tintin"
ORDER BY titreAlb ASC, nomJur ASC
; 

-----------------------------------------------------------------------------
-- 13.pour chaque album, le nombre de jurons DIFFERENTS prononcés par Tintin
--    idAlb, titre, nombre de jurons
--    classés par ordre alpahbétique sur titre
-----------------------------------------------------------------------------
SELECT A.idAlb, titreAlb, COUNT(DISTINCT idJur)
FROM album AS A
    LEFT JOIN juron_album AS JA ON JA.idAlb = A.idAlb 
    LEFT JOIN personnage AS P ON JA.idPers = P.idPers
WHERE nomPers = "tintin"
GROUP BY A.idAlb
ORDER BY titreAlb ASC
; 

-- -----------------------------------------------------------------------------
-- 14.les 5 album dans lesquels tintin prononce le plus de jurons DIFFERENTS
--    idAlb, titre, nombre de jurons
-- -----------------------------------------------------------------------------
SELECT A.idAlb, titreAlb, COUNT(DISTINCT idJur)
FROM album AS A
    LEFT JOIN juron_album AS JA ON JA.idAlb = A.idAlb 
    LEFT JOIN personnage AS P ON JA.idPers = P.idPers
WHERE nomPers = "tintin"
GROUP BY A.idAlb
ORDER BY COUNT(DISTINCT idJur) DESC
LIMIT 5
; 


