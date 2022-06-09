<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez une page de profil affichant dans un tableau HTML les informations de l'utilisateur connecté
 * Les informations affichées seront :
 * - Identifiant : <login>
 * - Adresse e-mail : <email>
 * - Le nom du pays : <country>
 * - La photo (si elle existe)
 * - Date et heure de la dernière connexion : <lastlogin>
 *
 * Cette page ne sera accessible qu'aux utilisateurs connectés. Dans le cas contraire, l'utilisateur sera redirigé vers la page de login (view/login)
 *
 * Estimation (jusqu'ici) : +/-30min
 *
 * Sous le tableau, affichez un formulaire d'édition du profil (view/update.php), permettant de mettre à jour :
 * - l'adresse e-mail <email>
 * - le mot de passe <password>
 * - le pays <country>
 * - la photo (image de maximum 2Mo et au format jpg ou png)
 *
 * Il doit être possible de mettre à jour les 3 paramètres en une seule fois, ou seulement deux, ou seulement un seul.
 *
 * (Estimation du formulaire d'édition dans view/update.php)
 *
 */

/**
 * CORRECTION
 * 8/9
 *
 * C'est très bien !
 *
 * Attention que ta fonction checkAccess() ne demande pas de paramètre, tu ne dois donc pas lui en passer un.
 * La fonction defaultCountry() pourrait être utilisée pour récupérer l'objet user complet et t'économiser une requête SQL
 *
 */

checkAccess($_SESSION['userid']);
global $connect;

$stmt = $connect->prepare("SELECT * FROM user WHERE id = ?");
$stmt->execute([$_SESSION['userid']]);
$user = $stmt->fetchObject();

?>


    <h2>Profil</h2>
    <table class="table" style="max-width:600px;">
        <tr>
            <?php
            getPhoto($_SESSION['userid']);
            ?>
            <th>Identifiant</th>
            <td><?=$user->login?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$user->email?></td>
        </tr>
        <tr>
            <th>Pays</th>
            <td><?=defaultCountry();?></td>
        </tr>
        <tr>
            <th>Dernière connexion</th>
            <td><?=$user->lastlogin?></td>
        </tr>
    </table>

<?php

require_once __DIR__ . '/update.php';

