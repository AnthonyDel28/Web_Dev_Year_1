-- locavoit2020 (categories, voitures, locations, clients)
-- exercices sur plusieurs tables
-- --------------------------------------------------------
-- 01 liste des voitures encore en service + infos catégorie (desc, portes, places, prix...)
SELECT
    idVoit, modVoit AS `modèle`,
    modVoit AS `modèle`,
    catVoit AS `catégorie`,
    descCat AS `description`,
    nbPortesCat AS `nbre de portes`,
    nbPlacesCat AS `nbre de places`
FROM
    voitures
    LEFT JOIN categories ON catVoit = idCat
WHERE
    dFinVoit IS NULL;

-- 02 liste des voitures encore en service de 5 places au minimum + infos catégorie (desc, portes, places, prix...)
SELECT
    idVoit, modVoit AS `modèle`,
    modVoit AS `modèle`,
    catVoit AS `catégorie`,
    descCat AS `description`,
    nbPortesCat AS `nbre de portes`,
    nbPlacesCat AS `nbre de places`
FROM
    voitures
    LEFT JOIN categories ON catVoit = idCat
WHERE
    dFinVoit IS NULL AND nbPlacesCat >= 5;

--
-- 03 liste des clients + nombre de locations effectuées (terminées ou en cours)
SELECT 
    idCli,
    nomCli AS `nom du client`,
    prenomCli AS `prenom du client`,
    COUNT(idLoc) AS `nombre de locations`
FROM clients
    LEFT JOIN locations ON idCli = clientLoc
GROUP BY idCli;

-- 04 liste des clients + nombre de km parcourus
SELECT
    idCli, 
    nomCli AS `nom du client`,
    prenomCli AS `prenom du client`,
    SUM(locations.kmFinLoc - locations.KmDebLoc) AS `kilomètres parcourus`
FROM
    clients
    LEFT JOIN locations ON idCli = clientLoc
GROUP BY idCli;

-- 05 liste des clients + les catégories de véhicules loués par ces clients
SELECT DISTINCT
    idCli, 
    nomCli AS `nom du client`,
    prenomCli AS `prenom du client`,
    catVoit AS `catégorie`
FROM clients
    LEFT JOIN locations ON idCli = clientLoc
    LEFT JOIN voitures ON voitureLoc = idVoit
;

-- 06 pour chaque catégorie de véhicule : nbre de locations + nbre de clients différents
SELECT
    idCat,
    COUNT(idLoc) AS `nbre de locations`,
    COUNT(DISTINCT clientLoc) AS `nbre de clients`
FROM categories
    LEFT JOIN voitures ON categories.idCat = voitures.catVoit
    LEFT JOIN locations ON voitures.idVoit = locations.voitureLoc
GROUP BY idCat;

-- 07 quelle est la catégorie qui rencontre le plus de succès (le plus de locations) ?
SELECT
    idCat,
    COUNT(idLoc) AS `nbre de locations`
FROM categories
    LEFT JOIN voitures ON categories.idCat = voitures.catVoit
    LEFT JOIN locations ON voitures.idVoit = locations.voitureLoc
GROUP BY idCat
ORDER BY COUNT(idLoc) DESC
LIMIT 1;

-- 08 pour chaque catégorie : nbre de locations, nbre de locations terminées, nbre de location en cours, nbre de km parcourus
SELECT
    idCat,
    COUNT(idLoc) AS `nbre de locations`,
    COUNT(dFinLoc) AS `locations terminées`,
    COUNT(idLoc) - COUNT(dFinLoc) AS `locations en cours`,
    SUM(kmFinLoc - KmDebLoc) AS `km parcourus`
FROM categories
    LEFT JOIN voitures ON categories.idCat = voitures.catVoit
    LEFT JOIN locations ON voitures.idVoit = locations.voitureLoc
GROUP by idCat;

-- 09 liste des voitures disponibles à la location (difficile)
SELECT
    idVoit,
    modVoit AS `modèle`
FROM categories
    LEFT JOIN voitures ON categories.idCat = voitures.catVoit
    LEFT JOIN locations ON voitures.idVoit = locations.voitureLoc
WHERE dFinVoit IS NULL AND dFinLoc IS NULL prixLoc IS NULL
GROUP by idVoit;

-------

SELECT
    idVoit,
    modVoit AS `modèle`,
    COUNT(dDebLoc) - COUNT(dFinLoc) AS `locations en cours`
FROM voitures
    LEFT JOIN locations ON idVoit = voitureLoc
WHERE dFinVoit IS NULL
GROUP BY idVoit
HAVING `locations en cours` = 0;

-- Quelle est la voiture qui a été louée le plus souvent +-+
SELECT 
    idVoit,
    modVoit AS `modèle`,
    COUNT(idLoc) as `nbre de locations`
FROM voitures
    LEFT JOIN locations ON idVoit = voitureLoc
GROUP BY idVoit
ORDER BY `nbre de locations` DESC
LIMIT 1;

-- 10 Quelle est la voiture qui a été louée le plus souvent par le même client (infos sur la voiture et sur le client?
SELECT
  voitureLoc,
  clientLoc,
  COUNT(idLoc)
FROM
  locations
GROUP BY
  voitureLoc,
  clientLoc
ORDER BY
  COUNT(idLoc) DESC
LIMIT
  1;
--
SELECT
  voitures.*,
  clients.*,
  COUNT(idLoc) AS `nb de locations`
FROM
  locations
  LEFT JOIN voitures ON voitureLoc = idVoit
  LEFT JOIN clients ON clientLoc = idCli
GROUP BY
  voitureLoc,
  clientLoc
ORDER BY
  COUNT(idLoc) DESC
LIMIT
  1;

