<center>
<?php

// Inclusion de fichier à partir de l'instruction Include
include 'partials/header.php';
// Inclusion de fichier à partir de l'instruction Require
require_once 'partials/header.php';

// Premier fichier de cours 

/*
IEPSCF Namur 
Année 2021-2022
*/

// String

print 'Initiation à la programmation';
print '<h1> Principes de base </h1>';
print "<br>";  // Saut de ligne en HTML (appelé en PHP)
print 'L\'instruction echo'; // Echappement de l'apostrophe pour éviter la fin de la chaîne
print '<br>';
print "Descartes a dit \"Je pense donc je suis\""; // Echappement des guillements 
print "<br>";

// Valeurs numériques

echo "<br>";
print 1930812;
echo "<br>";

print 20 + 2; // Opérateur mathématique (Addition)
echo "<br>";
print 33 / 3; //Opérateur mathématique (Division)
echo "<br>";
print "33 + 10 = "; 
print 43;
print '<br>';
print '<br>';


// L'instruction print permet d'afficher des contenus
print 'Introduction';
print '<br>';
print('La fonction print');
print '<br>';

$name = 'Anthony';
require 'partials/footer.php';

?>
</center>