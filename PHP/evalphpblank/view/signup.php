<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Modifiez le formulaire d'inscription ci-dessous, comprenant les champs suivants :
 * - identifiant
 * - email
 * - mot de passe
 * - pays, en choisissant dans la liste des pays présents en base de données, triés par ordre alphabétique
 * - photo (facultatif : image de maximum 2Mo et au format jpg ou png)
 * - bouton de validation
 *
 * La méthode du formulaire sera de type : POST
 * L'identifiant, l'email et le mot de passe sont des champs obligatoires, le pays et la photo sont facultatifs pour l'utilisateur
 * Le traitement du formulaire se fera dans le fichier action/signup.php
 *
 * Estimation : +/-30min
 */

?>

<h2>Inscription</h2>
<form action="index.php?source=action/signup" method="POST" enctype="multipart/form-data">
    <label for="login">Identifiant</label>
    <input type="text" class="form-control" id="login" name="login" required>
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" required>
    <label for="country">Pays</label>
    <select name="country" class="form-control" id="country">
        <?php getCountry(); ?>
    </select>
    <label for="photo">Photo</label>
    <input type="file" class="form-control" name="photo" id="photo" accept="image/png, image/jpeg">
    <input type="submit" class="btn btn-primary">
</form>

