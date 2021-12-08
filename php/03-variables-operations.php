<?php

// Déclaration des variables

$a = 10;
$b = 5;
$firstName = 'John';
$lastName = 'Doe';

// Concaténation
$name = $firstName.' '.$lastName; //John Doe

print $name;
print '<br>';
print $b += $a; // Affectation combinée (on ajoute la val de $a à $b (15))
print '<br>';
print $b -= $a;