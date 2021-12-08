<?php
require 'partials/settings.php';
$price = 100;

// Utilisation des constantes
print 'Nom de la base de données: ' .DB_CLIENT;
print '<br>';
print 'Réduction : '.$price * DISCOUNT.'€';



define ('DISCOUNT', 0.20);

// Une constante ne peut jamais être redéfinie
// define('DISCOUNT', 0.20); // Warning: Constant DISCOUNT already defined

print 'La constante DISCOUNT est de type' .gettype(DISCOUNT);
// Les fonctions sur les variables peuvent aussi être utilisées sur les constantes sauf 
// settype() bien évidemment

?>