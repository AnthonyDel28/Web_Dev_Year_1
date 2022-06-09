<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Modifiez le formulaire de login ci-dessous :
 *
 * La méthode du formulaire sera de type : POST
 * Le traitement du formulaire se fera dans le fichier action/login.php
 *
 * Sous le formulaire, affichez un lien HTML menant vers le formulaire de création de compte (view/signup)
 *
 * Estimation : max 15min
 */

?>

<h2>Identification</h2>
<form action="index.php?source=action/login" method="POST">
    <label for="login">Identifiant</label>
    <input type="text" class="form-control" id="login" name="login" required>
    <label for="pwd">Mot de passe</label>
    <input type="password" class="form-control" id="pwd" name="pwd" required>
    <input type="submit" class="btn btn-primary">
</form>
<a href="index.php?source=view/signup">Création de compte</a>

