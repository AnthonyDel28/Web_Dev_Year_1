<?php
// Lorsqu'un utilisateur veut se connecter, il est impératif de supprimer toute valeur de session existante avant de connecter l'utilisateur [session]
session_unset();
/**
 * Il convient ensuite de démarrer la nouvelle session. Pour ce faire, nous pourrions :
 *
 * 1) Appeler la fonction php de démarrage de session :
 *      session_start();
 * 2) Inclure notre script contenant ce code (afin d'éviter la redondance) :
 *      require_once __DIR__ . '/../lib/session.php';
 * 3) Appeler ce script depuis la page index qui contient déjà le require du script de démarrage de session
 *      Dans ce 3e cas, aucun code ici n'est nécessaire !
*/
// Il convient ensuite de vérifier que les données de connexion de l'utilisateur correspondent à des données existantes
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
    $valid = false;
    // Une constante de configuration (dans le config.php) permet de spéficier si l'authentification de l'utilisateur doit se faire via la base de données ou via le fichier de configuration
    if (APP_MODE == 'PDO') {
        $user = userGet('username', $_POST['username'], DB_FETCH_OBJECT);
        // On vérifie la validité du mot de passe. Comme le mot de passe est crypté en DB, on utilise une fonction spécifique.
        if (password_verify($_POST['pwd'], $user->password??null)) {
            $valid = true;
        }
    } else {
        if ($_POST['username'] == admin_user && $_POST['pwd'] == admin_pwd) {
            $valid = true;
        }
    }
    if ($valid) {
        // Une fois les données validées, on assigne la ou les valeur(s) voulue(s) à la session [session]
        $_SESSION['username'] = $_POST['username'];
        // [Facultatif] Dans cet exercice, on redirige ensuite vers la page de profil
        header('Location: index.php?view=view/profile');
        die;
    }
}
header('Location: index.php?view=view/error');
die;
