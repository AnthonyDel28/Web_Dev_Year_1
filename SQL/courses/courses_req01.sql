-- 01 List des animaux classés par ordre alphabétique

SELECT nomA, espA
FROM animal
ORDER BY nomA ASC;

-- 02 Liste des chiens ('CHIEN') classés par ordre alphabétique

SELECT nomA, espA
FROM animal
WHERE espA="CHIEN"
ORDER BY nomA ASC;

-- 03 Liste des chiens ('CHIEN') belges ('BE') classés par ordre alphabétique

SELECT nomA, espA, nationA
FROM animal
WHERE espA="CHIEN" AND nationA="BE"
ORDER BY nomA ASC;

-- 04 Liste des animaux sans nationnalité: nom, description et espèce

SELECT nomA, descA, espA, nationA
FROM animal 
WHERE nationA IS NULL;

-- 05 Liste des animaux dont le nom contient au moins un 'A': nom, description, espèce

SELECT nomA, descA, espA
FROM animal
WHERE nomA LIKE '%A%';

-- 06 Liste des animaux: nom en majuscule, nombre de lettres du nom

SELECT LEN('nomA')
FROM animal;

-- 07 Liste des animaux dont le nom commence par une voyelle: nom, description, espèce

SELECT nomA, descA, espA
FROM animal
WHERE nomA LIKE '[aeiou]%' OR nomA LIKE '[AEIOUY]%;