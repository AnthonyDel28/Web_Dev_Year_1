/*
 NOM :
 PRENOM :
 
 Ecrivez les requêtes permettant de répondre aux questions suivantes :
 
 */
/*
 1.    Liste des personnes classées par ordre alphabétique
 idPers       nomPers     prenomPers    nationPers
 BISAL        Bistrot     Alonzo        ESP
 DHEAL        DHEUX       Albert        BEL
 …            …           …             …
 FATFE        Tation      Félicie       FRA
 */

SELECT *
FROM personne
ORDER BY nomPers ASC;

/*
 2.    Liste des personnes classées par ordre alphabétique : id, nom, prénom, pays d’origine
 id           nom          prénom        pays d'origine
 BISAL        Bistrot      Alonzo        ESP
 DHEAL        DHEUX        Albert        BEL
 …            …            …             …
 FATFE        Tation       Félicie       FRA
 */

SELECT 
    idPers AS `id`,
    nomPers AS `nom`,
    prenomPers AS `prénom`,
    nationPers AS `pays d'origine`
FROM personne
ORDER BY nomPers ASC;

/*
 3.    Liste des personnes belges classées par ordre alphabétique : id, nom, prénom
 id           nom          prénom
 DHEAL        DHEUX        Albert
 DUPMA        Dupont       Marc
 DUPPI        Dupont       Pierre
 LERAL        Leroy        Albert
 LERPH        Leroy        Philippe
 POREV        Porée        Eva
 */


SELECT
    idPers AS `id`,
    nomPers AS `nom`,
    prenomPers AS `prénom`
FROM personne
WHERE nationPers = 'BEL'
ORDER BY nomPers ASC;

/*
 4.    Liste des villes classées par ordre alphabétique : code, ville, pays (nom complet)
 code       ville        pays
 AMS        Amsterdam    Pays-Bas
 ANR        Anvers       Belgique
 …        …        …
 ZRH        Zurich       Suisse
 */

SELECT
    codeV AS `code`,
    nomV AS `ville`,
    nomPays AS `pays`
FROM villes
LEFT JOIN pays ON villes.paysV = pays.codePays
ORDER BY nomV ASC;

/*
 5.    Pour chaque tournée : date, description, pays (nom complet), villes visitées (nom complet), représentant (nom et prénom)
 date          description                    pays        ville        représentant
 2021-01-01    Meilleurs voeux                Belgique    Anvers       Bistrot, Alonzo
 2021-01-01    Meilleurs voeux                Belgique    Bruxelles    DHEUX, Albert
 …        …                    …        …        …
 2021-03-21    Présentation produits 2021     Allemagne   Hambourg     Einstein, Frank
 */

SELECT
    dateT AS `date`,
    descT AS `description`,
    nomPays AS `pays`,
    nomV AS `ville`,
    CONCAT(nomPers, ' ,', prenomPers) AS `représentant`
FROM tournee
LEFT JOIN pays ON tournee.paysT = pays.codePays
LEFT JOIN visites ON tournee.dateT = visites.tourneeVis
LEFT JOIN personne ON visites.representantVis = personne.idPers
LEFT JOIN villes ON visites.villeVis = villes.codeV;

/*
 6.    Pour chaque tournée : date, description, pays (nom complet), nombre de villes
 date          description                    pays        nombre de villes
 2021-01-01    Meilleurs voeux                Belgique    4
 2021-01-02    Bonne année à nos voisins      France      5
 …        …                    …        …
 2021-03-21    Présentation produits 2021     Allemagne   3
 */

SELECT
    dateT AS `date`,
    descT AS `description`,
    nomPays AS `pays`,
    COUNT(DISTINCT codeV) AS `nbre de villes`
FROM tournee
LEFT JOIN pays ON tournee.paysT = pays.codePays
LEFT JOIN visites ON tournee.dateT = visites.tourneeVis
LEFT JOIN personne ON visites.representantVis = personne.idPers
LEFT JOIN villes ON visites.villeVis = villes.codeV
GROUP BY dateT;

/*
 7.    Liste des pays n’ayant fait l’objet d’aucune tournée: codePays, nom
 codePays   nom
 AUT        Autriche
 CHE        Suisse
 NLD        Pays-Bas
 */

SELECT
    codePays,
    nomPays AS `nom`
FROM pays
WHERE NOT EXISTS (SELECT * FROM tournee WHERE tournee.paysT = pays.codePays);

/*
 8.    Le représentant travaillant le plus (le plus de visites)
 id        nom        prénom
 EINFR     Einstein   Frank
 ou
 id        nom        prénom
 OPOFI     Opost      Fidèle
 */

SELECT
    idPers AS `id`,
    nomPers AS `nom`,
    prenomPers AS `prénom`
 FROM personne
 LEFT JOIN visites ON personne.idPers = visites.representantVis
 GROUP BY idPers
 ORDER BY COUNT(`id`) DESC
 LIMIT 1;

/*
 9.    Liste des visites du jour (aujourd'hui): ville, nom, prénom
 ville        nom        prénom
 Barcelone    Porée      Eva
 Bilbao       Egretel    Hansel
 Madrid       Einstein   Frank
 */

 SELECT
    nomV AS `ville`,
    nomPers AS `nom`,
    prenomPers AS `prenom`
 FROM visites
 LEFT JOIN villes ON visites.villeVis = villes.codeV
 LEFT JOIN personne ON visites.representantVis = personne.idPers
 WHERE tourneeVis = CURRENT_DATE;

/*
 10.Liste des représentants ayant déja visité des villes en dehors de leurs pays d'origine : id, nom, prénom
 id            nom         prénom
 BISAL         Bistrot     Alonzo
 DHEAL         Dheux       Albert
 DUBLU         Dubois      Luc
 EGRHA         Egretel     Hansel
 EINFR         Einstein    Frank
 FATFE         Tation      Félicie
 LERPH         Leroy       Philippe
 OPOFI         Opost       Fidèle
 PERIN         Pere        INès
 POREV         Porée       Eva
 */

 SELECT
    idPers AS `id`,
    nomPers AS `nom`,
    prenomPers AS `prenom`
 FROM personne
 LEFT JOIN visites ON personne.idPers = visites.representantVis
 LEFT JOIN villes ON visites.villeVis = villes.codeV
 LEFT JOIN pays ON villes.paysV = pays.codePays
 WHERE visites.villeVis NOT LIKE nationPers AND villes.paysV NOT LIKE nationPers
 GROUP BY idPers;

/*
 11.    Ajoutez un nouveau pays: la Wallonie (code WAL)
 */

INSERT INTO pays(codePays, nomPays)
VALUES ('WAL', 'Wallonie');

/*
 12.    Changement de nationalité: tous les représentants belges deviennent wallons
 */

 UPDATE personne
 SET nationPers = 'WAL'
 WHERE nationPers = 'BEL';