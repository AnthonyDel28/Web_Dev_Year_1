<?php

require_once __DIR__ . '/lib/database.php';

$color = 'jaune';

// on initialise la connexion à la DB
$connect = connect();
/*
$result = $connect->prepare("SELECT COUNT(*) FROM color WHERE nameC = :color");
$result->bindParam('color', $color);
$result->execute();

// fetchColumn permet de récupérer la 1e colonne du résultat de la requête
// Comme ici il s'agit d'une requête retournant une seule ligne, cette méthode peut être utilisée pour confirmer que la ligne existe ou pas
if (!$result->fetchColumn()) {
    // PDO utilise les mêmes méthodes pour les requêtes de lecture ou d'écriture. Nous utilisons donc ici "prepare" pour insérer une ligne avec paramètres.
    $res = $connect->prepare("INSERT INTO color VALUES (?, ?)");
    $res->execute([6, $color]);
    // rowCount affiche le nombre d'enregistrements affectés par le dernier appel à la méthode "execute" (ici on insert une ligne, donc il affichera : 1)
    // lastInsertId affiche l'identifiant de la dernière ligne insérée
    echo $res->rowCount() . ' ligne(s) ajoutées avec l\'id' . $connect->lastInsertId();
} else {
    echo 'La couleur ' . $color . ' existe déjà en base de données!';
}

*/

/**
 * Exercices
 */

// Ex 1 : Mettre à jour la dernière couleur de la table "color" et la remplacer par "cyan"

$new_color = 'cyan';
$update_color_query = $connect->prepare("UPDATE color SET nameC = (?) ORDER BY idC DESC LIMIT 1;");
$update_color_query->execute([$new_color]);

// Ex 2 : Supprimer toutes les couleurs, sauf les 5 premières

$delete_color_query = $connect->prepare("DELETE FROM color WHERE idC > 5;");
$delete_color_query->execute();

// Ex 3 : la requête ci-dessous doit être dynamique. La couleur, le modèle de CPU et la marque doivent être variables et non fixes. Le tri sur le prix doit pouvoir se faire de manière ascendante ou descendante

$color = "noir";
$model = "Core i7";


$sql = "SELECT DISTINCT *,
                b.nameB as marque, 
                CONCAT(bcpu.nameB,' ', modelCpu) as namecpu, 
                bvcard.nameB as brandvcard
        FROM laptop as l
        JOIN color col ON col.idC = l.colorL
        JOIN brand b ON b.idB = l.brandL
        JOIN cpu c ON c.idCpu = l.cpuL
        JOIN vcard v ON v.idV = l.vcardL
        JOIN brand bcpu ON bcpu.idB = c.brandCpu
        JOIN brand bvcard ON bvcard.idB = v.brandV
        WHERE col.nameC = $color AND c.modelCpu = $model AND b.nameB LIKE 'a%'
        ORDER BY l.priceL DESC
";

// Ex 4 : Le filtre (where) et le tri (order by) doit pouvoir se faire sur tous les éléments du laptop (marque, marque CPU, marque vCard, quantité de mémoire, couleur, taille d'écran, poids, prix)
