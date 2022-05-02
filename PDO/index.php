<?php

define('DB_NAME', 'mediarnaque');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

function connect() {
    // variable globale. Si le script appelant la fonction connect() possède une variable nommée $dbh, alors son contenu sera récupéré ici
    global $dbh;

    // Il est inutile de créer une nouvelle connexion à la DB si elle existe déjà
    if (!$dbh) {
        // try / catch : gestion d'erreur. Si le code dans la partie "try" échoue, alors la partie "catch" s'exécute.
        try {
            // La connexion PDO utilise les constantes présentes dans le script config.php
            $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASSWORD);
            // On spécifie le mode d'erreur de PDO via la méthode setAttribute et les constantes de PDO
            // Avant PHP 8.0 il est nécessaire de le préciser, car ce n'est pas le mode par défaut
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // On affiche l'erreur
            die ('Erreur: ' . $exception->getMessage());
        }
    }
    return $dbh;
}


$connect = connect();

$color = 'violet';


$res = $connect->prepare("INSERT INTO color (nameC) VALUES (?)");
$res->execute([$color]);

$res->setFetchMode(PDO::FETCH_OBJ);

$res2 = $connect->prepare("SELECT * FROM color");
$res2->execute();
$res2->setFetchMode(PDO::FETCH_OBJ);
foreach($res2 as $row){
        print $row->idC . ' -> ' . $row->nameC . '<br>';
    }


