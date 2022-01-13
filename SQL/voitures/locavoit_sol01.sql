-- locavoit2020 (categories, voitures, locations, clients)
-- exercices sur une seule table
-- --------------------------------------------------------
-- 01 liste des catégories
SELECT
  *
FROM
  categories;
-- 02 liste des catégories classées du plus gros véhicule au plus petit (nbre de places, nbre de bagagges)
SELECT
  *
FROM
  categories
ORDER BY
  nbPlacesCat DESC,
  nbBagCat DESC;
-- 03 liste des catégories ayant au moins 5 places
SELECT
  *
FROM
  categories
WHERE
  nbPlacesCat >= 5;
-- 04 liste des catégories ayant au moins 5 places et 3 bagagges
SELECT
  *
FROM
  categories
WHERE
  nbPlacesCat >= 5
  AND nbBagCat >= 3;
--
  -- 05 liste des voitures encore en service
SELECT
  *
FROM
  voitures
WHERE
  dFinVoit IS NULL;
-- 06 liste des voitures hors service
SELECT
  *
FROM
  voitures
WHERE
  dFinVoit IS NOT NULL;
-- 07 liste des voitures de catégorie C et A encore en service
  -- mauvaise solution car 5 + 3 * 2 => 11 , AND=* OR=+
  -- catVoit = "A" OR catVoit="C" AND dFintVoit IS NULL
  -- catVoit = "A" +  catVoit="C"  * dFintVoit IS NULL
SELECT
  *
FROM
  voitures
WHERE
  dFinVoit IS NULL
  AND catVoit = "C"
  OR catVoit = "A";
-- solution correcte
SELECT
  *
FROM
  voitures
WHERE
  dFinVoit IS NULL
  AND (
    catVoit = "C"
    OR catVoit = "A"
  );
-- autre solution correcte
SELECT
  *
FROM
  voitures
WHERE
  dFinVoit IS NULL
  AND catVoit IN ("C", "A");
--
  -- 08 liste des locations terminées : idLoc, voitureLoc, clientLoc, durée de la location, km parcourus
SELECT
  idLoc,
  voitureLoc,
  clientLoc,
  DATEDIFF(dFinLoc, dDebLoc) + 1 AS `durée de location`,
  -- dFinLoc - dDebLoc + 1,    // mauvaise solution
  kmFinLoc - kmDebLoc AS `km parcourus`
FROM
  locations
WHERE
  dFinLoc IS NOT NULL;
-- 09 liste des location en cours : idLoc, voitureLoc, clientLoc, nbre de jours depuis début de la location
SELECT
  idLoc,
  voitureLoc,
  clientLoc,
  DATEDIFF(CURDATE(), dDebLoc) + 1 AS `nb de jours`
FROM
  locations
WHERE
  dFinLoc IS NULL;
-- 10 pour chaque voiture ayant fait l'objet d'une location : voitureLoc, nbre de locations, total km parcourus
SELECT
  voitureLoc,
  COUNT(idLoc) AS `nbre de locations`,
  SUM(kmFinLoc - kmDebLoc) AS `total des km parcourus`
FROM
  locations
GROUP BY
  voitureLoc;
--
SELECT
  voitureLoc,
  COUNT(idLoc) AS `nbre total de locations`,
  COUNT(dFinLoc) AS `nbre de locations terminées`,
  COUNT(idLoc) - COUNT(dFinLoc) AS `nbre de locations en cours`,
  SUM(kmFinLoc - kmDebLoc) AS `total des km parcourus`
FROM
  locations
GROUP BY
  voitureLoc;
-- 11 liste des voitures ayant fait l'objet de plus d'une location : voitureLoc, nbre de locations
SELECT
  voitureLoc,
  COUNT(idLoc) AS `nbre total de locations`
FROM
  locations
GROUP BY
  voitureLoc
HAVING
  COUNT(idLoc) > 1;