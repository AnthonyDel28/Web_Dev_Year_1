<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez un script de traitement du formulaire de login (view/login.php)
 * L'identifiant et le mot de passe du formulaire doivent correspondre à un identifiant et un mot de passe d'utilisateur valide en base de données (table <user>), validant la connexion
 * Si un paramètre est manquant ou si l'identification échoue, affichez le message suivant : "Echec à l'authentification, veuillez recommencer", ainsi qu'un lien HTML permettant de revenir au formulaire de login
 * Si la connexion est validée, la date de la dernière connexion <lastlogin> de l'utilisateur sera mise à jour avec la date et l'heure courante, et l'utilisateur sera connecté (session), lui donnant accès aux pages réservées de l'app.
 *
 *  Estimation : +/-30min
 *
 * === BONUS (degré de maîtrise) ===
 *
 * L'utilisateur sera redirigé vers la page de profil en cas de succès à la connexion avec le message "Bienvenue <login>", sinon vers le formulaire de login avec le message d'échec précisé plus haut.
 *
 */

/**
 * CORRECTION
 * 8/11
 *
 * C'est bien, mais il manque des choses.
 *
 * - Le <lastlogin> n'est pas mis à jour
 *
 * - Attention que si je tente de me connecter avec un identifiant qui n'existe pas en DB, j'ai cette erreur :
 *
 * ( ! ) Warning: Attempt to read property "pwd" on bool in D:\wamp64\www\phpblank\action\login.php on line 34
 *
 * Tu dois vérifier que l'utilisateur existe bien : (is_object($data)) dans ton cas, pour éviter cette erreur.
 *
 *
 * ( ! ) Deprecated: password_verify(): Passing null to parameter #2 ($hash) of type string is deprecated in D:\wamp64\www\phpblank\action\login.php on line 34
 *
 * Attention aussi aux paramètres de fonctions (degré de maîtrise)
 *
 */

if (!empty($_POST['login']) && !empty($_POST['pwd'])) {

    $connect = connect();
    $request = $connect->prepare('SELECT * FROM user WHERE login = ?');
    $request->execute([$_POST['login']]);
    $user = $request->fetchObject();
    if (password_verify($_POST['pwd'], $user->pwd)) {
        $update = $connect->prepare('UPDATE user SET lastlogin = NOW() WHERE id = ?');
        $update->execute([$user->id]);
        $_SESSION['userid'] = $user->id;
        $_SESSION['alert'] = 'Bienvenue ' . $user->login . '!';
        $_SESSION['alert_level'] = 'success';
        header('Location: index.php?source=view/profile');
        die;
    } else {
        $_SESSION['alert'] = 'Echec à l\'authentification, veuillez recommencer';
        $_SESSION['alert_level'] = 'danger';
        header('Location: index.php?source=view/login');
    }
}
