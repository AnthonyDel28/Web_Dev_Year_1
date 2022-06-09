<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Ce script déconnectera l'utilisateur connecté
 *
 * Estimation : max 5min
 */

/**
 * CORRECTION
 * 2/2
 *
 * C'est ok. Attention que comme cela, si $_SESSION contient d'autres données, tu devras faire d'autres unset.
 * $_SESSION = []; fonctionnera alors pour supprimer toutes tes données de session, ce qui ne t'empêchera pas d'utiliser ton message d'alerte par la suite.
 *
 */

if(!empty($_SESSION['userid'])){
    unset($_SESSION['userid']);
    $_SESSION['alert'] = 'Déconnecté avec succès!';
    $_SESSION['alert_level'] = 'warning';
    header('Location: index.php');
    die;
}
