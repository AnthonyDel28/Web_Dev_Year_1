<?php

/**
 * Todo : Créez un script de traitement du formulaire de création de compagnie (view/company/create.php)
 *
 * Les champs du formulaire doivent correspondre aux types de données requises en base de données (table <company>).
 * Le managerid sera l'identifiant de l'utilisateur connecté.
 * Le cash contiendra la valeur par défaut.
 * Si la création échoue, affichez le message suivant : "Erreur dans la création de le Compagnie"
 */

if (!empty($_POST['name']) && !empty($_POST['country'] && !empty($_FILES['logo']))) {
    $_POST['name'] = trim($_POST['name']);

    global $connect;
    $request = $connect->prepare('SELECT * FROM country WHERE name = ?');
    $request->execute([$_POST['country']]);
    $res = $request->fetchObject();
    if ($request->rowCount()) {
        $insert = $connect->prepare('INSERT INTO company (name, countryid, managerid) VALUES (?, ?, ?)');
        $insert->execute([$_POST['name'], $res->id, $_SESSION['userid']]);
        $company_id = $connect->lastInsertId() . '.';
        print 'La compagnie ' . $_POST['name'] . ' a été insérée avec succès!';
        if ($_FILES['logo']['type'] == 'image/png' || $_FILES['logo']['type'] == 'image/jpeg') {
            $img_name = $_FILES['logo']['name'];
            $tmp_img_name = $_FILES['logo']['tmp_name'];
            $folder_name = "images/company/logo/";
            if (!is_dir($folder_name)) {
                mkdir($folder_name, 0755, true);
            }
            $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($tmp_img_name, $folder_name . $company_id . $extension);
        }
    } else {
        header('Location: index.php?page=view/company/create');
        $_SESSION['alert'] = 'Le pays inséré ne correspond à aucune donnée !';/**/
        $_SESSION['alert-level'] = 'danger';
        die;
    }
} else {
    header('Location: index.php?page=view/company/create');
    $_SESSION['alert'] = 'Une erreur est survenue. Veuillez vérifier les informations insérées!';
    $_SESSION['alert-level'] = 'danger';
    die;
}