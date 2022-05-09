<?php

require_once __DIR__ . '/lib/database.php';

$color = 'jaune';

// on initialise la connexion à la DB
$connect = connect();

// Insertion
$result = $connect->prepare("SELECT COUNT(*) FROM color WHERE nameC = :color");
$result->bindParam('color', $color);
$result->execute();

// fetchColumn permet de récupérer la 1e colonne du résultat de la requête
// Comme ici il s'agit d'une requête retournant une seule ligne, cette méthode peut être utilisée pour confirmer que la ligne existe ou pas
if (!$result->fetchColumn()) {
    // PDO utilise les mêmes méthodes pour les requêtes de lecture ou d'écriture. Nous utilisons donc ici "prepare" pour insérer une ligne avec paramètres.
    $res = $connect->prepare("INSERT INTO color (nameC) VALUES (?)");
    $res->execute([$color]);
    // rowCount affiche le nombre d'enregistrements affectés par le dernier appel à la méthode "execute" (ici on insert une ligne, donc il affichera : 1)
    // lastInsertId affiche l'identifiant de la dernière ligne insérée
    echo $res->rowCount() . ' ligne(s) ajoutées avec l\'id' . $connect->lastInsertId();
} else {
    echo 'La couleur ' . $color . ' existe déjà en base de données!';
}
echo '<hr>';

/**
 * Exercices
 */

// Ex 1 : Mettre à jour la dernière couleur de la table "color" et la remplacer par "cyan"
$color = 'rouge';
$result = $connect->query('SELECT idC,nameC FROM color ORDER BY idC DESC LIMIT 1');
$last = $result->fetchObject();

$update = $connect->prepare('UPDATE color SET nameC = ? WHERE idC = ?');
$update->execute([$color, $last->idC]);
if ($update->rowCount()) {
    echo 'La couleur ' . $last->nameC . ' a été mise à jour en ' . $color;
} else {
    echo 'La couleur ' . $last->nameC . ' n\'a pas été mise à jour car elle avait déjà la valeur ' . $color;
}

echo '<hr>';

// Ex 2 : Supprimer toutes les couleurs, sauf les 5 premières

$update = $connect->prepare('DELETE FROM color WHERE idC > 5');
$update->execute();
$count = $update->rowCount();
if ($count) {
    echo $count . ' couleur(s) a/ont été supprimée(s)';
} else {
    echo 'Aucune couleur n\'a été supprimée';
}

echo '<hr>';

// Ex 3 : la requête ci-dessous doit être dynamique. La couleur, le modèle de CPU et la marque doivent être variables et non fixes. Le tri sur le prix doit pouvoir se faire de manière ascendante ou descendante
// La taille de l'écran et la quantité de mémoire doivent également être un critère minimal de recherche.
// On affichera le résultat proprement dans un tableau

$tbody = '';
$color = 'rouge';
$cpu = 'celeron';
$brand = '%';
$ram = 2;
$screen = 10;
$order = 'DESC';

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
        WHERE col.nameC = ? AND c.modelCpu = ? AND b.nameB LIKE ? AND l.ramL >= ? AND l.screenL >= ?
        ORDER BY l.priceL $order
";

$stmt = $connect->prepare($sql);
$stmt->execute([$color, $cpu, $brand, $ram, $screen]);
$stmt->setFetchMode(PDO::FETCH_OBJ);
foreach ($stmt as $row) {
    $tbody .= '<tr><td><img src="img/' . $row->brandL . '_min.png" alt="' . $row->brandL . '"></td>
                    <td>' . ucfirst($row->marque) . '</td>
                    <td>' . ucfirst($row->namecpu) . '</td>
                    <td>' . ucfirst($row->brandvcard) . ' ' . $row->modelV . '</td>
                    <td>' . $row->ramL . 'Gb</td>
                    <td>' . $row->screenL . '"</td>
                    <td>' . round(($row->weightL / 1000), 1) . 'kg</td>
                    <td>' . $row->nameC . '</td>
                    <td>' . round($row->priceL * ('1.' . $row->vatL), 2) . '&euro;</td>
               </tr>';
}
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>PDO</title>
    </head>
    <body>
    <table class="table table-striped" style="max-width:400px; background-color:lightgrey;">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Marque</th>
            <th>Processeur</th>
            <th>Carte Graphique</th>
            <th>Mémoire</th>
            <th>Ecran</th>
            <th>Poids</th>
            <th>Couleur</th>
            <th>Prix TVAC</th>
        </tr>
        </thead>
        <tbody>
        <?= $tbody ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    </body>
    </html>
<?php

// Ex 4 : Le filtre (where) et le tri (order by) doit pouvoir se faire sur tous les éléments du laptop (marque, marque CPU, marque vCard, quantité de mémoire, couleur, taille d'écran, poids, prix)



// Ex 5 : Créez une fonction qui permet d'exécuter une requête SQL via PDO
// La fonction renverra les données sous un format de tableau multidimensionnel ou de tableau d'objets, les deux doivent être possible.
// Dans sa première version, la fonction ne devra gérer que les requêtes sans paramètres
