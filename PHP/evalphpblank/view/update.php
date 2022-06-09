<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Modifiez le formulaire de mise à jour ci-dessous, permettant de mettre à jour les champs suivants :
 * - email. L'adresse email de l'utilisateur à mettre à jour sera affichée par défaut
 * - mot de passe. Le mot de passe ne doit pas être affiché ici !
 * - pays, en choisissant dans la liste des pays présents en base de données, triés par ordre alphabétique. Si l'utilisateur en base de données possède un pays, ce pays sera sélectionné par défaut dans le menu déroulant.
 * - photo (image de maximum 2Mo et au format jpg ou png)
 * - bouton de validation
 *
 * La méthode du formulaire sera de type : POST
 * Le traitement du formulaire se fera dans le fichier action/update.php
 *
 * Estimation : +/-30min
 */

/**
 * CORRECTION
 * 7/8
 *
 * C'est très bien ! Le pays sélectionné par défaut apparait 2 fois dans le menu déroulant, ça c'est pas top.
 *
 */


checkAccess();
global $connect;

$infos = $connect->prepare('SELECT * FROM user where id = ?');
$infos->execute([$_SESSION['userid']]);
$user = $infos->fetchObject();

?>

<h2>Mise à jour</h2>
<form action="index.php?source=action/update" method="POST" enctype="multipart/form-data">
    <label for="u-email">Email</label>
    <input type="email" class="form-control" id="u-email" name="email" placeholder="<?=$user->email?>">
    <label for="u-pwd">Mot de passe</label>
    <input type="password" class="form-control" id="u-pwd" name="pwd" placeholder="************">
    <label for="u-country">Pays</label>
    <select name="country" class="form-control" id="u-country">
        <option value=""><?=defaultCountry();?></option>
        <?php getCountry(); ?>
    </select>
    <label for="u-photo">Photo</label>
    <input type="file" class="form-control" name="photo" id="u-photo" accept="image/png, image/jpeg">
    <input type="submit" class="btn btn-success" value="Mettre à jour">
</form>

