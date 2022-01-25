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
/*
 2.    Liste des personnes classées par ordre alphabétique : id, nom, prénom, pays d’origine
 id           nom          prénom        pays d'origine
 BISAL        Bistrot      Alonzo        ESP
 DHEAL        DHEUX        Albert        BEL
 …            …            …             …
 FATFE        Tation       Félicie       FRA
 */
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
/*
 4.    Liste des villes classées par ordre alphabétique : code, ville, pays (nom complet)
 code       ville        pays
 AMS        Amsterdam    Pays-Bas
 ANR        Anvers       Belgique
 …        …        …
 ZRH        Zurich       Suisse
 */
/*
 5.    Pour chaque tournée : date, description, pays (nom complet), villes visitées (nom complet), représentant (nom et prénom)
 date          description                    pays        ville        représentant
 2021-01-01    Meilleurs voeux                Belgique    Anvers       Bistrot, Alonzo
 2021-01-01    Meilleurs voeux                Belgique    Bruxelles    DHEUX, Albert
 …        …                    …        …        …
 2021-03-21    Présentation produits 2021     Allemagne   Hambourg     Einstein, Frank
 */
/*
 6.    Pour chaque tournée : date, description, pays (nom complet), nombre de villes
 date          description                    pays        nombre de villes
 2021-01-01    Meilleurs voeux                Belgique    4
 2021-01-02    Bonne année à nos voisins      France      5
 …        …                    …        …
 2021-03-21    Présentation produits 2021     Allemagne   3
 */
/*
 7.    Liste des pays n’ayant fait l’objet d’aucune tournée: codePays, nom
 codePays   nom
 AUT        Autriche
 CHE        Suisse
 NLD        Pays-Bas
 */
/*
 8.    Le représentant travaillant le plus (le plus de visites)
 id        nom        prénom
 EINFR     Einstein   Frank
 ou
 id        nom        prénom
 OPOFI     Opost      Fidèle
 */
/*
 9.    Liste des visites du jour (aujourd'hui): ville, nom, prénom
 ville        nom        prénom
 Barcelone    Porée      Eva
 Bilbao       Egretel    Hansel
 Madrid       Einstein   Frank
 */
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
/*
 11.    Ajoutez un nouveau pays: la Wallonie (code WAL)
 */
/*
 12.    Changement de nationalité: tous les représentants belges deviennent wallons
 */