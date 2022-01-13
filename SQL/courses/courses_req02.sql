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
  nomC AS `nom`,
  descC AS `description`,
  dateC AS `date`,
  pays.nomP AS `nom du pays`
FROM course
  LEFT JOIN pays ON course.lieuC = pays.codeP

-- 02 pour toutes les courses
  --    nom, description, date, nom du pays, nombre de participants
SELECT
  nomC AS `nom`,
  descC AS `description`,
  dateC AS `date`,
  pays.nomP AS `nom du pays`,
  COUNT(idA) AS `nbre de participants`
FROM course
  LEFT JOIN pays ON course.lieuC = pays.codeP
  LEFT JOIN resultat ON course.idC = resultat.idC
GROUP BY course.idc;

-- 03 pour toutes les courses
  --    nom, description, date, nom du pays, nombre d'espèces représentées
SELECT
  nomC AS `nom`,
  descC AS `description`,
  dateC AS `date`,
  pays.nomP AS `nom du pays`,
  COUNT(DISTINCT espA) as `nbre d'espèces représentées`
FROM course
  LEFT JOIN pays ON lieuC = codeP
  LEFT JOIN resultat ON course.idC = resultat.idC
  LEFT JOIN animal ON resultat.idA = animal.idA
GROUP BY course.idC;

-- 04 pour toutes les courses
  --    nom, description, date, nom du pays, nombre total de pattes

-- 05a liste des animaux + NOM DU PAYS + courses auxquelles ils ont participé + NOM DU PAYS de la course (difficile)

-- 05b liste des animaux ayant participé à une course dans leur propre pays

-- --------------------------------------------------------------------------------------
  -- --------------------------------------------------------------------------------------