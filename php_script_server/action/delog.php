<?php
/**
 *  Script de déconnection
 */

// On vérifie si l'utilisateur est connecté. Pour ce faire, il convient de vérifier si la donnée correspondante existe en session
if (!empty($_SESSION['username'])) {
    // Si c'est le cas, on supprime les valeurs de session
    session_unset();
    // Comme le projet fonctionne avec des includes, requires et autres redirections, il convient de fermer les possibles sessions encore ouvertes dans d'autres scripts
    // session_commit est un alias de session_write_close, les deux peuvent être utilisés
    session_write_close();
    // Dans ce projet, on redirige vers une vue spécifique pour afficher le message de déconnection.
    header('Location: index.php?view=view/delog');
    // exit est un alias de die, les deux peuvent être utilisés
    die;
}
