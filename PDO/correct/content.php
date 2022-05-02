<?php
/**
 *  Script de gestion de contenu dynamique (basic routing)
 */

// Tableau comprenant les extensions de fichiers valides (l'ordre de préséance importe. Dans le cas présent, les fichiers html auront la priorité sur le php possédant le même path)
$exts = ['html', 'php'];

if (!empty($view)) {

    // pour chaque extension valide ...
    foreach ($exts as $ext) {
        $complete_path = $view . '.' . $ext;
        // On vérifie si le fichier existe sur le serveur
        if (file_exists($complete_path)) {
            // s'il existe, on exécute son contenu
            include_once $complete_path;
            die;
        }
    }
}
header('Location: index.php?view=view/main');
die;