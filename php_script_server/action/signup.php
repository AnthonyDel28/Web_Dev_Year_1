<?php

// Evolution : si l'utilisateur est déjà connecté, on redirige vers la page de profil [session]
if (!empty($_SESSION['username'])) {
    header('Location: index.php?view=view/profile');
    die;
}

// On vérifie si tous les champs du formulaire ont été remplis
if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pwd'])) {
    // Certains serveurs SQL n'acceptent pas NOW() pour un champ datetime, il convient donc de construire la date comme ceci :
    $now = date('Y-m-d H:i:s');
    // Evolution : on insère les données en base de données [pdo]
    $result = $dbh->prepare("INSERT INTO user (username, `password`, email, created, lastlogin) VALUES (?,?,?,?,?)");
    // En DB les mots de passe ne doivent pas apparaitre en clair, on utilisera alors une fonction de cryptage
    $result->execute([$_POST['username'], password_hash($_POST['pwd'], PASSWORD_DEFAULT), $_POST['email'], $now, $now]);
    // on récupère l'id de la dernière ligne insérée, afin de vérifier que l'insert s'est bien exécuté
    $return = $dbh->lastInsertId();
    if ($return) {
        echo "Utilisateur id " . $return;
    } else {
        echo "Erreur!";
    }
    die;
} else {
    // Sinon, on redirige vers le formulaire
    header('Location: index.php?view=view/signup');
    die;
}