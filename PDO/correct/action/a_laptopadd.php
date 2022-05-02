<?php
require_once './lib/database.php';
require_once './lib/lib.php';
require_once './form/formlib.php';

// Initialisation de la connexion à la BDD
$connect = connect();

// On implode le tableau $_POST avec la fonction array_keys pour n'obtenir que les clés du tableau
$key_array =  implode(", ", array_keys($_POST));

// On implode à nouveau $_POST, cette fois pour obtenir les données
$data_array = implode(", ", $_POST);

$insert = $connect->prepare('INSERT INTO laptop (' . $key_array . ', vatL) VALUES ( ' . $data_array . ', 21)');
$insert->execute();
$check = $insert->rowCount();
$insert->setFetchMode(PDO::FETCH_OBJ);
if ($check) {
    print $check . ' ligne a été ajoutée ! <br>';
} else {
    print 'Erreur lors de l\'insertion!';
}






