<?php

// Inclusion des scripts contenant les fonctions utiles
require_once __DIR__ . '/lib/database.php';
require_once __DIR__ . '/form/formlib.php';
require_once __DIR__ . '/lib/lib.php';

// Paramètre d'url gérant les vues
$view = '';
if (isset($_GET['view'])) {
    $view = $_GET['view'];
}

// Connexion à la DB
$connect = connect();

// Inclusion des vues
include_once __DIR__ . '/view/header.php';
include_once __DIR__ . '/view/menu.php';
include_once __DIR__ . '/view/main.php';
include_once __DIR__ . '/view/footer.php';