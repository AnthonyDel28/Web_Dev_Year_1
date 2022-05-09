<?php

/**
 * PDO query & prepare
 */

require_once __DIR__ . '/lib/database.php';

// on initialise la connexion à la DB
$connect = connect();

// Requête sans paramètre (variable) dans la requête : on utilise la méthode PDO "query"
$result = $connect->query("SELECT * FROM laptop WHERE idL = 10");
// Une fois la ressource obtenue ($result), on la transforme en donnée exploitable par php "FETCH"
// Par défaut PDO utilise FETCH_ALL (tableau associatif et indexé), nous utiliserons ici FETCH_ASSOC pour n'avoir que le tableau associatif
$data = $result->fetch(PDO::FETCH_ASSOC);
// affichage en écriture tableau associatif
echo $data['idL'] . '<br>';

// Requête avec un paramètre, on utilise la méthode PDO "prepare". Les paramètres sont remplacés par des "?", appelé marqueur interrogatif. (ou par un marqueur nommé, cfr plus bas)
$result = $connect->prepare("SELECT * FROM laptop WHERE idL = ?");
// Pour exécuter une requête préparée, nous devons appeler la méthode "execute"
// Si aucune méthode de Bind (cfr plus bas) n'est utilisée, les paramètres de la requête sont passés dans un tableau comme paramètre de la méthode exécute.
$result->execute([1]);
// On utilise ici FETCH_OBJ pour récupérer les données dans un format Objet
// $data = $result->fetch(PDO::FETCH_OBJ); <= est équivalent à la ligne suivante :
$data = $result->fetchObject();
// affichage en écriture objet
echo $data->idL . '<br>';

// Une requête préparée peut être exécutée plusieurs fois, notamment avec des paramètres différents. Dans ce cas on change juste le paramètre (1 devient 3)
$result->execute([3]);
$data = $result->fetchObject(); // Si on oublie cette ligne, la ligne suivante affichera 1 et non 3, car $data contient toujours le résultat du fetch précédent !
echo $data->idL . '<br>';

// Requête avec paramètre indiqué non pas par un "?" mais par un marqueur nommé (dans ce cas "param", mais on peut choisir autre chose. L'important est qu'il corresponde au param de la méthode suivante).
$result = $connect->prepare("SELECT * FROM laptop WHERE idL = :param");
// La méthode bindValue permet de lier un paramètre de requête à une VALEUR. Le nom du paramètre doit correspondre au marqueur nommé dans la requête (dans ce cas "param")
$result->bindValue('param', 3);
$result->execute();
$data = $result->fetchObject();
echo $data->idL . '<br>';

$result->bindValue('param', 4);
$result->execute();
$data = $result->fetchObject();
echo $data->idL . '<br>';

$value = 5;
// La méthode bindParam permet de lier un paramètre de requête à une REFERENCE (une variable contenant une valeur). Le reste est identique à bindValue
// Le 3e paramètre (facultatif) indique le type de variable attendu (ici un entier INT)
$result->bindParam('param', $value, PDO::PARAM_INT);
$result->execute();
$data = $result->fetchObject();
echo $data->idL . '<br>';

echo '<hr>';

echo '<h2>LISTE</h2>';

$result = $connect->query("SELECT * FROM laptop");
// Dans le cas où la requête retourne plusieurs lignes de résultats, il est nécessaire de les parcourir avec une boucle (ici un "foreach")
foreach ($result as $data) {
    // Comme aucune méthode de fetch n'a été utilisée, c'est un fetchAll et donc une structure de tableau
    echo $data['idL'] . '<br>';
}

echo '<hr>';

echo '<h2>TRI</h2>';

$order = $_GET['order'];

$white_list = ['ASC', 'DESC'];

// Si le paramètre de tri ne fait pas partie de la liste blanche, on affiche un message et on arrête le script.
if (!in_array(strtoupper($order), $white_list)) {
    echo 'Pas autorisé';
    die;
}

// Seuls les paramètres de données (contenus dans les colonnes des enregistrements en base de données) peuvent être liés.
// Une variable contenu un élément autre de la requête doit être simplement concaténé. Il est conseillé d'en vérifier la validité au préalable (white_list plus haut)
$sql = "SELECT * FROM brand ORDER BY nameB $order";

$result = $connect->query($sql);
foreach ($result as $row) {
    echo $row['nameB'] . '<br>';
}

// Version objet
$result = $connect->query($sql);
// Lorsque le résultat retourne plusieurs lignes, il est possible de fetch chaque ligne via une boucle comme ceci :
while ($data = $result->fetchObject()) {
    echo $data->nameB . '<br>';
}
