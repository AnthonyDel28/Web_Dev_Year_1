<?php
// Quelques fonctions sur les variables
// Fonctions natives

$name = 'John Doe';
$connect = FALSE;
$val = 20;
$teachers = ['John', 'Dominique', 'Pierre'];
$childs = 4;
$price = 60;

// gettype() Retourne le type de la variable
print gettype($teachers);
print '<br>';
print gettype($val);

// settype() Modifie le type de la variable (transtyper)
// Valeurs acceptées: boolean, integer, float, string, array, null, ....
settype($childs, 'string');
print '<br>';
print gettype($childs);
print '<br>';

// Les fonctions is... 
if(is_array($teachers))
{
    print 'La variable est un array';
}

// empty() vérifiz si une variable est vide
print '<br>';
print empty($name);

print '<br>';
if($name = "John Doe")
{
   print 'Le nom est obligatoire!';
}
print '<br>Suite de la page';

// isset() Vérifie si la variable existe (définie)
print '<br>';
if(isset($price))
{
    print 'La variable a été déclarée';
}
print '<br>';

// Opérateur d'inversion (contraire)
if(!isset($price))
{
    print 'La variable n\'existe pas!';
}

// unset() Supprime une variable
unset($val);
// print $val;

// var_dump Affiche le contenu et les informations d'une variable: fonction pour débug 
var_dump($teachers);
?>