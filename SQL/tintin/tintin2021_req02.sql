-- tintin2021
-- (pays, album, personnage, juron, pays_album, pers_album, juron_album)

-- remarque : pays visité = pays concernés par un album dans lequel apparait le personnage

-- -----------------------------------------------------------------------------
-- 01.pour chaque personnage -> tous les pays visités :
--    nom, prénom, sexe, pays (nom du pays)  
--    classés par ordre alphabétique sur personnage et pays
-- -----------------------------------------------------------------------------
SELECT
    nomPers,
    prenomPers,
    sexePers,
    pays.nomPays AS `pays visité`
FROM personnage
    LEFT JOIN pers_album ON personnage.idPers = pers_album.idPers
    LEFT JOIN album ON pers_album.idAlb = album.idAlb
    LEFT JOIN pays_album ON album.idAlb = pays_album.idAlb
    LEFT JOIN pays ON pays_album.idPays = pays.idPays
GROUP BY personnage.idPers, pays.idPays;

-- -----------------------------------------------------------------------------
-- 02.pour chaque personnage méchant -> tous les pays visités :
--    nom, prénom, sexe, pays (nom du pays)  
--    classés par ordre alphabétique sur personnage et pays
-- -----------------------------------------------------------------------------
SELECT
    nomPers,
    prenomPers,
    sexePers,
    pays.nomPays AS `pays visité`
    gentilPers AS `gentil = 1`
FROM personnage
    LEFT JOIN pers_album ON personnage.idPers = pers_album.idPers
    LEFT JOIN album ON pers_album.idAlb = album.idAlb
    LEFT JOIN pays_album ON album.idAlb = pays_album.idAlb
    LEFT JOIN pays ON pays_album.idPays = pays.idPays
WHERE gentilPers = 1
GROUP BY personnage.idPers, pays.idPays
ORDER BY nomPers, pays.nomPays;

-- -----------------------------------------------------------------------------
-- 03.pour chaque personnage -> nombre de pays visités :
--    nom, prénom, sexe, nombre de pays
--    classés par nombre de pays visités (en ordre décroissant)
-- -----------------------------------------------------------------------------
SELECT
    nomPers AS `nom`, 
    prenomPers AS `prenom`,
    sexePers AS `sexe`,
    COUNT(pays.idPays) AS `nbre de pays visités`
FROM personnage
    LEFT JOIN pers_album ON personnage.idPers = pers_album.idPers
    LEFT JOIN album ON pers_album.idAlb = album.idAlb
    LEFT JOIN pays_album ON album.idAlb = pays_album.idAlb
    LEFT JOIN pays ON pays_album.idPays = pays.idPays
GROUP BY personnage.idPers;

-- -----------------------------------------------------------------------------
-- 04.liste des pays dans lesquels on ne trouve aucun personnage féminin :
--    pays (nom du pays)  
--    classés par ordre alphabétique
-- -----------------------------------------------------------------------------
SELECT
    pays.idPays,
    nomPays AS `nom du pays`
FROM pays
    LEFT JOIN pays_album ON pays.idPays = pays_album.idPays
    LEFT JOIN album ON pays_album.idAlb = album.idAlb
    LEFT JOIN pers_album ON album.idAlb = pers_album.idAlb
    LEFT JOIN personnage ON pers_album.idPers = personnage.idPers
GROUP BY pays.idPays
HAVING SUM(sexePers="F") = 0
;

-- -----------------------------------------------------------------------------
-- 05.liste des album dans lesquels on ne trouve aucun personnage féminin :
--    id, nom de l'album, année
--    classés par id
-- -----------------------------------------------------------------------------
SELECT
    album.idAlb AS `id album`,
    titreAlb AS `nom de l'album`,
    dateAlb AS `année`
FROM album
    LEFT JOIN pers_album ON album.idAlb = pers_album.idAlb
    LEFT JOIN personnage ON pers_album.idPers = personnage.idPers
GROUP BY album.idAlb
HAVING SUM(sexePers="F") = 0;

-- -----------------------------------------------------------------------------
-- 06.premier album dans lequel apparait un personnage féminin :
--    id, nom de l'album, année
--    remarque: les id sont dans l'ordre de création des album
-- -----------------------------------------------------------------------------
SELECT
    album.idAlb AS `id album`,
    titreAlb AS `nom album`,
    dateAlb AS `année`
FROM album
    LEFT JOIN pers_album ON album.idAlb = pers_album.idAlb
    LEFT JOIN personnage ON pers_album.idPers = personnage.idPers
WHERE sexePers = 'F'
ORDER BY idAlb ASC
LIMIT 1;

-- -----------------------------------------------------------------------------
-- 07.dans quel album rencontre-t-on le plus de personnages grossiers ?
--    id, nom de l'album, année
-- -----------------------------------------------------------------------------
SELECT
    album.idAlb AS `id album`,
    titreAlb AS `album`,
    dateAlb AS `année`
    COUNT(DISTINCT idPers) as `nbre de personnages`
FROM album
    LEFT JOIN juron_album ON album.idAlb = juron_album.idAlb
GROUP BY album.idAlb
ORDER BY COUNT(DISTINCT idPers) DESC
LIMIT 1;


-- -----------------------------------------------------------------------------
-- 08.personnage féminin le plus grossier
--         (qui pronnonce le plus souvent des jurons):
--    nom, prénom
-- -----------------------------------------------------------------------------
SELECT
    nomPers AS `nom`,
    prenomPers AS `prenom`
FROM personnage
    LEFT JOIN juron_album ON personnage.idPers = juron_album.idPers
WHERE sexePers = 'F'
GROUP BY personnage.idPers
ORDER BY COUNT(idJur) DESC
LIMIT 1;

-- -----------------------------------------------------------------------------
-- 09.personnage féminin qui connait le plus de jurons :
--    nom, prénom
-- -----------------------------------------------------------------------------
SELECT
    nomPers AS `nom`,
    prenomPers AS `prenom`
FROM personnage
    LEFT JOIN juron_album ON personnage.idPers = juron_album.idPers
WHERE sexePers = 'F'
ORDER BY COUNT(DISTINCT idJur) DESC
LIMIT 1;

-- -----------------------------------------------------------------------------
-- 10.noms de personnage qui apparaissent plus d'une fois :
--    ex: ALCAZAR (le général et sa femme)
--    nom, nb de personnage
-- -----------------------------------------------------------------------------
SELECT 
    nomPers AS `nom`,
    COUNT(idPers) AS `nom de personnage`
FROM personnage
GROUP BY nomPers
HAVING COUNT(idPers) > 1;

