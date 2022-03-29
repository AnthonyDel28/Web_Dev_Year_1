<?php

require_once __DIR__ . '/lib/session.php';
// Le fichier de configuration générale (ce fichier ne doit PAS faire partie du git. Ajoutez le au .gitignore)
require_once __DIR__ . '/config.php';
// Un fichier comprenant la connexion à la base de données [pdo]
require_once __DIR__ . '/lib/db.php';
// Un fichier comprenant des fonctions génériques [functions]
require_once __DIR__ . '/lib/output.php';
// Un fichier comprenant les fonctions liées à l'utilisateur [function + pdo]
require_once __DIR__ . '/lib/user.php';


$view = '';
if (isset($_GET['view'])) {
    $view = $_GET['view'];
}


$dbh = connect();

require_once __DIR__ . '/view/header.html';
require_once __DIR__ . '/view/box.php';
require_once __DIR__ . '/view/main.php';
require_once __DIR__ . '/view/footer.html';
