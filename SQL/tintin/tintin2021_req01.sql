-- tintin2021
-- (pays, album, personnage, juron, pays_album, pers_album, juron_album)

-----------------------------------------------------------------------------
-- 01.liste des personnages
--    --> Nom, Prénom, Fonction, Sexe
--    classés par ordre alphabétique sur nom, prenom
---------------------------------------------------------------------------

-----------------------------------------------------------------------------
-- 02.liste des personnages féminins
--    --> Nom, Prénom, Fonction, Sexe
--    classés par ordre alphabétique sur nom, prenom
---------------------------------------------------------------------------

-----------------------------------------------------------------------------
-- 03.liste des personnages féminins
--    --> Nom, Prénom, Fonction, Sexe
--    classés par ordre alphabétique sur nom, prenom
--    dont le nom commence par 'A' ou 'a'
---------------------------------------------------------------------------

-----------------------------------------------------------------------------
-- 04.liste des personnages féminins
--    --> Nom, Prénom, Fonction
--    classés par ordre alphabétique sur nom, prenom
--    dont le nom contient 1 seule lettre 'A' ou 'a'
---------------------------------------------------------------------------

----------------------------------------------------------------------------- 
-- 05.liste des personnages féminins
--    --> Nom, Prénom, Fonction, Sexe
--    classés par ordre alphabétique sur nom, prenom
--    dont le nom commence par une voyelle (a e i o u y)
---------------------------------------------------------------------------


----------------------------------------------------------------------------- 
-- 06.liste des album
--    --> idAlb, titre
--    classés par ordre alphabétique sur titre
---------------------------------------------------------------------------


----------------------------------------------------------------------------- 
-- 07.pour chaque album -> tous les pays visités
--    idAlb, titre, année, pays(nom du pays)
--    classés par ordre alphabétique sur titre, puis nom du pays
---------------------------------------------------------------------------


----------------------------------------------------------------------------- 
-- 08.pour chaque album -> nombre de pays visités
--    idAlb, titre, année, nombre de pays
--    classés par ordre alphabétique sur titre
---------------------------------------------------------------------------


---------------------------------------------------------------------------
-- 09.pour chaque pays -> nombre d'album concernés
--    pays(nom du pays), nbre d'album
--    classés par ordre alphabétique sur nom du pays
---------------------------------------------------------------------------


-----------------------------------------------------------------------------
-- 10.tous les jurons prononcés par Tintin
--    idJur, juron (nomJur)
--    classés par ordre alphabétique sur nom du juron
---------------------------------------------------------------------------


-----------------------------------------------------------------------------
-- 11.tous les jurons DIFFERENTS prononcés par Tintin
--    idJur, juron (nomJur)
--    classés par ordre alpahbétique sur nom du juron
---------------------------------------------------------------------------

----------------------------------------------------------------------------- 
-- 12.pour chaque album, tous les jurons DIFFERENTS prononcés par Tintin
--    idAlb, titre, idJur, juron (nomJur)
--    classés par ordre alpahbétique sur titre, nom du juron
---------------------------------------------------------------------------


-----------------------------------------------------------------------------
-- 13.pour chaque album, le nombre de jurons DIFFERENTS prononcés par Tintin
--    idAlb, titre, nombre de jurons
--    classés par ordre alpahbétique sur titre
-----------------------------------------------------------------------------

-- -----------------------------------------------------------------------------
-- 14.les 5 album dans lesquels tintin prononce le plus de jurons DIFFERENTS
--    idAlb, titre, nombre de jurons
-- -----------------------------------------------------------------------------
