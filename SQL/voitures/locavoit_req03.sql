-- locavoit2020 (categories, voitures, locations, clients)
-- exercices sur plusieurs tables
-- --------------------------------------------------------
-- 01 liste des voitures encore en service + infos catégorie (desc, portes, places, prix...)
SELECT
  idVoit AS `plaque`,
  modVoit AS `modèle`,
  catVoit AS `catégorie`,
  descCat AS `description`,
  nbPortesCat AS `nb de portes`,
  nbPlacesCat AS `nb de places`
FROM
  voitures
  LEFT JOIN categories ON catVoit = idCat
WHERE
  dFinVoit IS NULL;
-- 02 liste des voitures encore en service de 5 places au minimum + infos catégorie (desc, portes, places, prix...)
SELECT
  idVoit AS `plaque`,
  modVoit AS `modèle`,
  catVoit AS `catégorie`,
  descCat AS `description`,
  nbPortesCat AS `nb de portes`,
  nbPlacesCat AS `nb de places`
FROM
  voitures
  LEFT JOIN categories ON catVoit = idCat
WHERE
  dFinVoit IS NULL
  AND nbPlacesCat >= 5;
-- 03 liste des clients + nombre de locations effectuées (terminées ou en cours)
SELECT
  idCli,
  nomCli AS `nom`,
  prenomCli AS `prénom`,
  COUNT(idLoc) AS `nb de locations`
FROM
  clients
  LEFT JOIN locations ON idCli = clientLoc
GROUP BY
  idCli;
--  idem + nb locations en cours
SELECT
  idCli,
  nomCli AS `nom`,
  prenomCli AS `prénom`,
  COUNT(idLoc) AS `nb total de locations`,
  COUNT(dDebLoc) - COUNT(dFinLoc) AS `nb de locations en cours`
FROM
  clients
  LEFT JOIN locations ON idCli = clientLoc
GROUP BY
  idCli;
-- 04 liste des clients + nombre de km parcourus
SELECT
  idCli,
  nomCli AS `nom`,
  prenomCli AS `prénom`,
  SUM(kmFinLoc - kmDebLoc) AS `km parcourus`
FROM
  clients
  LEFT JOIN locations ON idCli = clientLoc
GROUP BY
  idCli;
-- 05 liste des clients + les catégories de véhicules loués par ces clients
SELECT
  DISTINCT idCli,
  nomCli AS `nom`,
  prenomCli AS `prénom`,
  catVoit AS `catégorie`
FROM
  clients
  LEFT JOIN locations ON idCli = clientLoc
  LEFT JOIN voitures ON idVoit = voitureLoc;
--
SELECT
  idCli,
  nomCli AS `nom`,
  prenomCli AS `prénom`,
  GROUP_CONCAT(DISTINCT catVoit SEPARATOR '') AS `catégories`
FROM
  clients
  LEFT JOIN locations ON idCli = clientLoc
  LEFT JOIN voitures ON idVoit = voitureLoc
GROUP BY
  idCli;
-- 06 pour chaque catégorie de véhicule : nbre de locations + nbre de clients différents
SELECT
  idCat,
  descCat AS `description`,
  COUNT(idLoc) AS `nb de locations`,
  COUNT(DISTINCT clientLoc) AS `nb de clients différents`
FROM
  categories
  LEFT JOIN voitures ON categories.idCat = voitures.catVoit
  LEFT JOIN locations ON voitures.idVoit = locations.voitureLoc
GROUP BY
  idCat;
-- 07 quelle est la catégorie qui rencontre le plus de succès (le plus de locations) ?
SELECT
... (125 lignes restantes)
Réduire
locavoit_sol02.sql
6 Ko
-- locavoit2020 (categories, voitures, locations, clients)
-- exercices INSERT, UPDATE, DELETE
-- --------------------------------------------------------
/*
  INSERT INTO ... VALUES
*/
-- ajouter un nouveau client
INSERT INTO
  clients(idCli, nomCli, prenomCli)
VALUES(NULL, "Terrieur", "Alex");
--
  -- risqué
INSERT INTO
  clients
VALUES(NULL, "Terrieur", "Alain");
--
INSERT INTO
  clients(idCli, prenomCli, nomCli)
VALUES(NULL, "Pierre", "Detaille");
--
INSERT INTO
  clients(prenomCli, nomCli)
VALUES("Pierre", "Tombal");
-- louer le 13/01/2022 le véhicule 1-BBB001 (170 km au compteur) au client 7.
INSERT INTO
  `locations` (
    `voitureLoc`,
    `clientLoc`,
    `dDebLoc`,
    `kmDebLoc`,
  )
VALUES
  (
    '1-BBB001',
    '7',
    '2022-01-13',
    '170'
  );
--
  /*
        ! attention --> WHERE
        DELETE FROM ... WHERE
    */
DELETE FROM
  clients
WHERE
  nomCli = "Terrieur";
  /*
        ! attention --> WHERE
        UPDATE ... SET ... WHERE
        */
  -- augmenter de 10% les prix au k et le prix journalier de la catégorie Z
UPDATE
  categories
SET
  pxKmCat = pxKmCat * 1.10,
  pxJourCat = pxJourCat * 1.10
WHERE
  idCat = 'Z';
-- retour de la location  19 => date de retour 13/01/2022, km retour = 170, remarque = voiture à déclasser, prix lox = 25000
UPDATE
  locations
SET
  dFinLoc = "2022-01-13",
  kmFinLoc = 170,
  remLoc = "Voiture à déclasser",
  prixLoc = 25000
WHERE
  idLoc = 19;