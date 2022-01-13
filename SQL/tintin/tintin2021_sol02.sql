-- tintin2021
-- (pays, album, personnage, juron, pays_album, pers_album, juron_album)

-- remarque : pays visités = pays concernés par un album dans lequel apparait le personnage

-- -----------------------------------------------------------------------------
-- 01.pour chaque personnage -> tous les pays visités :
--    nom, prénom, sexe, pays (nom du pays)
--    classés par ordre alphabétique sur personnage et pays
-- -----------------------------------------------------------------------------
SELECT DISTINCT nomPers, prenomPers, sexePers, nomPays
FROM personnage AS Pers
    LEFT JOIN pers_album AS PersAlb ON PersAlb.idPers=Pers.idPers
    LEFT JOIN album AS Alb ON PersAlb.idAlb=Alb.idAlb
    LEFT JOIN pays_album AS PaysAlb ON PaysAlb.idAlb=Alb.idAlb
    LEFT JOIN pays As Pays ON PaysAlb.idPays=Pays.idPays
ORDER BY nomPers ASC, prenomPers ASC, nomPays ASC
;

-- -----------------------------------------------------------------------------
-- 02.pour chaque personnage méchant -> tous les pays visités :
--    nom, prénom, sexe, pays (nom du pays)
--    classés par ordre alphabétique sur personnage et pays
-- -----------------------------------------------------------------------------
SELECT DISTINCT nomPers, prenomPers, sexePers, nomPays
FROM personnage AS Pers
    LEFT JOIN pers_album AS PersAlb ON PersAlb.idPers=Pers.idPers
    LEFT JOIN album AS Alb ON PersAlb.idAlb=Alb.idAlb
    LEFT JOIN pays_album AS PaysAlb ON PaysAlb.idAlb=Alb.idAlb
    LEFT JOIN pays As Pays ON PaysAlb.idPays=Pays.idPays
WHERE NOT gentilPers
-- WHERE gentilPers = 0
ORDER BY nomPers ASC, prenomPers ASC, nomPays ASC
;

-- -----------------------------------------------------------------------------
-- 03.pour chaque personnage -> nombre de pays visités :
--    nom, prénom, sexe, nombre de pays
--    classés par nombre de pays visités (en ordre décroissant)
-- -----------------------------------------------------------------------------
SELECT Pers.idPers, nomPers, prenomPers, sexePers, COUNT(DISTINCT idPays) AS `nombre de pays visités`
FROM personnage AS Pers
    LEFT JOIN pers_album AS PersAlb ON PersAlb.idPers=Pers.idPers
    LEFT JOIN album AS Alb ON PersAlb.idAlb=Alb.idAlb
    LEFT JOIN pays_album AS PaysAlb ON PaysAlb.idAlb=Alb.idAlb
GROUP BY pers.idPers
ORDER BY `nombre de pays visités` DESC
;

-- -----------------------------------------------------------------------------
-- 04.liste des pays dans lesquels on ne trouve aucun personnage féminin :
--    pays (nom du pays)
--    classés par ordre alphabétique
-- -----------------------------------------------------------------------------
SELECT Pays.idPays, nomPays
FROM pays AS Pays
    LEFT JOIN pays_album AS PaysAlb ON PaysAlb.idPays=Pays.idPays
    LEFT JOIN album AS A ON PaysAlb.idAlb=A.idAlb
    LEFT JOIN pers_album AS PA ON PA.idAlb = A.idAlb
    LEFT JOIN personnage AS P ON PA.idPers = P.idPers
GROUP BY Pays.idPays
HAVING SUM(sexePers="F") = 0
;

-- -----------------------------------------------------------------------------
-- 05.liste des album dans lesquels on ne trouve aucun personnage féminin :
--    id, nom de l'album, année
--    classés par id
-- -----------------------------------------------------------------------------
SELECT A.idAlb, titreAlb, dateAlb
FROM album AS A
    LEFT JOIN pers_album AS PA ON PA.idAlb = A.idAlb
    LEFT JOIN personnage AS P ON PA.idPers = P.idPers
GROUP BY A.idAlb
HAVING SUM(sexePers="F") = 0
;

-- autre solution
--
-- liste de tous les album
SELECT idAlb
FROM album
;

-- liste des album avec des personnages féminins
SELECT DISTINCT A.idAlb
FROM album AS A
    LEFT JOIN pers_album AS PA ON PA.idAlb = A.idAlb
    LEFT JOIN personnage AS P ON PA.idPers = P.idPers
WHERE sexePers="F"
;

-- liste des album sans personnage féminin
SELECT idAlb
FROM album
WHERE idAlb NOT IN (
    SELECT A.idAlb
        FROM album AS A
            LEFT JOIN pers_album AS PA ON PA.idAlb = A.idAlb
            LEFT JOIN personnage AS P ON PA.idPers = P.idPers
        WHERE sexePers="F"
    )
;

-- -----------------------------------------------------------------------------
-- 06.premier album dans lequel apparait un personnage féminin :
--    id, nom de l'album, année
--    remarque: les id sont dans l'ordre de création des album
-- -----------------------------------------------------------------------------
SELECT  titreAlb, dateAlb, album.idalb
FROM album
    LEFT JOIN pers_album ON album.idAlb = pers_album.idAlb
    LEFT JOIN personnage ON pers_album.idPers = personnage.idPers
WHERE sexePers = "F"
ORDER BY album.idalb ASC
LIMIT 1
;

-- -----------------------------------------------------------------------------
-- 07.dans quel album rencontre-t-on le plus de personnages grossiers ?
--    id, nom de l'album, année
-- -----------------------------------------------------------------------------
SELECT album.idAlb, titreAlb, dateAlb -- ,COUNT(DISTINCT idPers)
FROM album
  LEFT JOIN juron_album ON album.idAlb = juron_album.idAlb
GROUP BY album.idAlb
ORDER BY COUNT(DISTINCT idPers) DESC
LIMIT 1
;

-- -----------------------------------------------------------------------------
-- 08.personnage féminin le plus grossier
--         (qui pronnonce le plus souvent des jurons):
--    nom, prénom
-- -----------------------------------------------------------------------------
SELECT nomPers, prenomPers -- ,COUNT(idJur)
FROM personnage
  LEFT JOIN juron_album ON personnage.idPers = juron_album.idPers
WHERE sexePers = "F"
GROUP BY personnage.idPers
ORDER BY COUNT(idJur) DESC
LIMIT 1
;

-- -----------------------------------------------------------------------------
-- 09.personnage féminin qui connait le plus de jurons :
--    nom, prénom
-- -----------------------------------------------------------------------------
SELECT nomPers, prenomPers -- ,  COUNT(DISTINCT idJur)
FROM personnage
  LEFT JOIN juron_album ON personnage.idPers = juron_album.idPers
WHERE sexePers = "F"
GROUP BY personnage.idPers
ORDER BY COUNT(DISTINCT idJur) DESC
LIMIT 1
;

-- -----------------------------------------------------------------------------
-- 10.noms de personnage qui apparaissent plus d'une fois :
--    ex: ALCAZAR (le général et sa femme)
--    nom, nb de personnage
-- -----------------------------------------------------------------------------
SELECT nomPers, COUNT(idPers) as `nb de personnage`
FROM personnage
GROUP BY nomPers
HAVING COUNT(idPers) > 1
;

