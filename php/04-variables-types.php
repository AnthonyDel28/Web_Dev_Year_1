<?php
// Les types de variables
$country = 'Belgique'; // string
$population = 11658000; // integer
$growth = 1.15; // float
$eu = true; // bolean
$governement = null; // type null
$languages = ['Français', 'Allemand', 'Néerlandais', 'Anglais']; // array
$langues = 'Français, Allemand, Néerlandais, Anglais';

// Afficher certaines variables

echo $eu; // 1
echo '<br>';
echo $governement; // n'affiche rien
echo '<br>';
echo $languages[0];
echo '<br>';
echo $languages[1];
echo '<br>';
echo $langues;
echo '<br>';
echo count($languages); // la fonction count() compte le nombre d'éléments d'un tableau
echo count($langues);

?>