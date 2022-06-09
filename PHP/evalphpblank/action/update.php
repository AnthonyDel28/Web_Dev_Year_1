<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez un script de traitement du formulaire de mise à jour (view/update.php)
 * Seuls les utilisateurs connectés peuvent mettre à jour leur profil
 * L'email devra être un email valide
 * Le mot de passe devra contenir au moins 12 caractères
 * La photo, si elle est définie, sera un fichier de maximum 2Mo au format jpg ou png. Le fichier sera enregistré dans le dossier image/photo/<id> où <id> sera l'identifiant de l'utilisateur. Le lien de l'image sera stocké dans le champ <image> de la table <user>.
 * Si une photo existe déjà pour cet utilisateur, l'ancien fichier sera supprimé sur le serveur.
 * Si un paramètre est manquant ou erroné, redirigez l'utilisateur vers la page de profil en affichant le message "Paramètre manquant ou erroné, veuillez recommencer"
 * Si la mise à jour échoue, redirigez l'utilisateur vers la page de profil en affichant le message "Echec de la mise à jour"
 *
 *  Estimation : +/-60min
 */

/**
 * CORRECTION
 * 13/17
 *
 * C'est vraiment bien, juste quelques petites choses à améliorer, la présence du var_dump, la suppression d'image qui ne fonctionne pas.
 * Le fait que tu effectues une requête SQL par paramètre au lieu d'une seule requête SQL construite, c'est du degré de maîtrise, donc ça c'est ok.
 *
 */

checkAccess();
if(!empty($_POST['email']) || !empty($_POST['pwd']) || !empty($_POST['country']) || !empty($_FILES['photo']['name'])){
    global $connect;
    if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $update = $connect->prepare('UPDATE user SET email = ? WHERE id = ?');
        $update->execute([$_POST['email'], $_SESSION['userid']]);
    }
    if(!empty($_POST['pwd'])){
        if(strlen($_POST['pwd']) >= 12){
            $update = $connect->prepare('UPDATE user SET pwd = ? WHERE id = ?');
            $update->execute([password_hash($_POST['pwd'], PASSWORD_DEFAULT), $_SESSION['userid']]);
        } else {
            $_SESSION['alert'] = 'Le mot de passe doit être d\'au moins 12 caractères!';
            $_SESSION['alert_level'] = 'danger';
            header('Location: index.php?source=view/profile');
            die;
        }
    }
    if(!empty($_FILES)){
        if ($_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == 'image/jpeg') {
            $img_name = $_FILES['photo']['name'];
            $tmp_img_name = $_FILES['photo']['tmp_name'];
            $folder_name = "images/photo/";
            if (!is_dir($folder_name)) {
                mkdir($folder_name, 0755, true);
            }
            $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $image = $connect->prepare('SELECT * FROM user WHERE id = ?');
            $image->execute([$_SESSION['userid']]);
            $res = $image->fetchObject();
            if($image->rowCount()){
                unlink($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/'.$folder_name . $res->image);
            }
            move_uploaded_file($tmp_img_name, $folder_name . $_SESSION['userid'] . '.' . $extension);
            $photo_url = $_SESSION['userid'] . '.' .$extension;
            $insert_url = $connect->prepare('UPDATE user SET image = ? WHERE id = ?');
            $insert_url->execute([$photo_url, $_SESSION['userid']]);
        }
    }
    $_SESSION['alert'] = 'Vos données ont été modifiées avec succès!';
    $_SESSION['alert_level'] = 'success';
    header('Location: index.php?source=view/profile');
    die;
} else {
    $_SESSION['alert'] = 'Paramètre manquant ou erroné, veuillez recommencer';
    $_SESSION['alert_level'] = 'danger';
    header('Location: index.php?source=view/profile');
    die;
}
