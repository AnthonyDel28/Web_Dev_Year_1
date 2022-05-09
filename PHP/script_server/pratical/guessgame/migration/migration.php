<?php
/**
 * Gestionnaire de migration SQL
 */

// nécessaire car ce script utilise une connexion à la DB
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../lib/db.php';

// On récupère les paramètres de la commande
$args = $_SERVER['argv'];
// Si le nombre de paramètres ne correspond pas ou si le paramètre est de type "aide", on affiche l'aide de la commande
$help = ['--help', '-help', '-h', '-?', 'h', 'help', '?'];
if ($_SERVER['argc'] != 2 || in_array($args[1], $help)) {
    echo "Cette commande comporte un paramètre indiquant le fichier SQL à exécuter (le paramètre ne contient pas l'extension du fichier).\n 
    Ce fichier doit être présent dans le dossier migration\n
    Exemple de commande : php migration.php user\n
    Cette commande exécutera le code SQL présent dans le fichier user.sql du dossier migration";
    die;
}
// Construction du path du fichier à migrer
$file = $args[1] . '.sql';
$file_path = getcwd() . '/' . $file;
// On vérifie si le fichier existe
if (file_exists($file_path)) {
    echo "Le fichier $file va être migré\n";
    // On exécute la fonction de migration. Le contenu du fichier SQL est directement lu et passé en paramètre de la fonction
    migrate(file_get_contents($file_path));
    echo "Le fichier $file a été migré avec succès\n";
} else {
    echo "Ce fichier de migration n'existe pas!";
}

/**
 * @param string $migration
 * @return void
 */
function migrate(string $migration):void {
    // connexion à la DB et exécution du code SQL contenu dans le fichier SQL de migration
    $dbh = connect();
    $dbh->query($migration);
}
