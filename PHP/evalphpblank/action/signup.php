<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez un script de traitement du formulaire d'inscription (view/signup.php)
 * L'identifiant <login>, l'email <email> le mot de passe <password> du formulaire doivent correspondre aux type de données requises en base de données (table <user>).
 * Le mot de passe doit être crypté en base de données !
 * La date de création <created> contiendra la date et l'heure de la création. La date de dernière connexion <lastlogin> restera vide. Le statut <status> sera défini à sa valeur par défaut.
 * La photo, si elle est définie, sera un fichier de maximum 2Mo au format jpg ou png. Le fichier sera enregistré dans le dossier image/photo/<id> où <id> sera l'identifiant de l'utilisateur. Le lien de l'image sera stocké dans le champ <image> de la table <user>.
 * Si un paramètre est manquant ou erroné, redirigez l'utilisateur vers le formulaire d'inscription en affichant le message "Paramètre manquant ou erroné, veuillez recommencer"
 * Si la création échoue, affichez le message suivant : "Echec à la création", ainsi qu'un lien HTML permettant de revenir au formulaire d'inscription
 *
 *  Estimation : +/-60min
 *
 */

/**
 * CORRECTION
 * 14/17
 *
 * C'est très bien, mis à part quelques détails.
 *
 * Attention car tu n'as pas vérifié si l'utilisateur existait déjà. Le champ <login> étant unique en DB, il est nécessaire de le faire pour éviter une erreur d'intégrité référentielle (clé étrangère unique) en DB
 * Tu ne vérifies pas non plus si le pays est un pays valide, mais ça c'était normalement du degré de maîtrise car le champ est facultatif, mais comme tu utilises !empty($_POST['country']) qui le rend obligatoire, ça ne va pas :-)
 *
 */

if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['country'])){
    $_POST['login'] = trim($_POST['login']);
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && uniqueLogin($_POST['login']) && validCountry($_POST['country'])) {
        global $connect;
        $insert = $connect->prepare('INSERT INTO user (login, email, pwd, country, created) VALUES  (?, ?, ?, ?, NOW())');
        $insert->execute([$_POST['login'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['country']]);
        if($insert->rowCount()){
            $userid = $connect->lastInsertId();
            if(!empty($_FILES)){
                if ($_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == 'image/jpeg') {
                    $img_name = $_FILES['photo']['name'];
                    $tmp_img_name = $_FILES['photo']['tmp_name'];
                    $folder_name = "images/photo/";
                    if (!is_dir($folder_name)) {
                        mkdir($folder_name, 0755, true);
                    }
                    $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($tmp_img_name, $folder_name . $userid . '.' . $extension);
                    $photo_url = $userid . '.' .$extension;
                    $insert_url = $connect->prepare('UPDATE user SET image = ? WHERE id = ?');
                    $insert_url->execute([$photo_url, $userid]);
                }
            }
            print "Inscription réalisée avec succès!";
        } else {
            print "Echec à la création!<br>" ;
            print "<a href='index.php?source=view/signup'>Recommencer</a>";
        }
    }
} else {
    header('Location: index.php?source=view/signup');
}
