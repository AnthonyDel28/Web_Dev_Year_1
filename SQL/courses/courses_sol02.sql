--
-- Table course(idC, nomC, descC, dateC, lieuC)
-- Table animal(idA, nomA, descA, espA, nationA)
-- Table resultat(idC, idA, temps, statut)
-- Table espece(codeE, nomE, nbPattesE)
-- Table pays(codeP, nomP)
--
-- 01 pour toutes les courses
--    nom, description, date, nom du pays
SELECT
  nomC,
  descC,
  dateC,
  nomP
FROM
  course
  LEFT JOIN pays ON lieuC = codeP;
-- 02 pour toutes les courses
  --    nom, description, date, nom du pays, nombre de participants
SELECT
  nomC,
  descC,
  dateC,
  nomP,
  COUNT(idA) AS `nbre de participants`
FROM
  course
  LEFT JOIN pays ON lieuC = codeP
  LEFT JOIN resultat ON course.idC = resultat.idC
GROUP BY
  course.idC;
-- 03 pour toutes les courses
  --    nom, description, date, nom du pays, nombre d'espèces représentées
SELECT
  nomC,
  descC,
  dateC,
  nomP,
  COUNT(DISTINCT espA) AS `nbre d'espèces`
FROM
  course
  LEFT JOIN pays ON lieuC = codeP
  LEFT JOIN resultat ON course.idC = resultat.idC
  LEFT JOIN animal ON resultat.idA = animal.idA
GROUP BY
  course.idC;
-- 04 pour toutes les courses
  --    nom, description, date, nom du pays, nombre total de pattes
SELECT
  nomC,
  descC,
  dateC,
  nomP,
  SUM(nbPattesE) AS `nbre de pattes`
FROM
  course
  LEFT JOIN pays ON lieuC = codeP
  LEFT JOIN resultat ON course.idC = resultat.idC
  LEFT JOIN animal ON resultat.idA = animal.idA
  LEFT JOIN espece ON espA = codeE
GROUP BY
  course.idC;
-- 05a liste des animaux + NOM DU PAYS + courses auxquelles ils ont participé + NOM DU PAYS de la course (difficile)
SELECT
  nomA,
  descA,
  nationA,
  pays_A.nomP,
  nomC,
  descC,
  lieuC,
  pays_C.nomP
FROM
  animal
  LEFT JOIN pays AS pays_A ON nationA = pays_A.codeP
  LEFT JOIN resultat ON animal.idA = resultat.idA
  LEFT JOIN course ON course.idC = resultat.idC
  LEFT JOIN pays AS pays_C ON lieuC = pays_C.codeP;
-- 05b liste des animaux ayant participé à une course dans leur propre pays
SELECT
  nomA,
  descA,
  nationA,
  pays_A.nomP,
  nomC,
  descC
FROM
  animal
  LEFT JOIN pays AS pays_A ON nationA = pays_A.codeP
  LEFT JOIN resultat ON animal.idA = resultat.idA
  LEFT JOIN course ON course.idC = resultat.idC
WHERE
  lieuC = nationA;
-- --------------------------------------------------------------------------------------
  -- --------------------------------------------------------------------------------------