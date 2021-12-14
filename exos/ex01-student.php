<?php

/*
1)
A l'aide des variables suivantes affichez en PHP le texte ci-dessous:
Vous êtes inscrit dans la section WebDev pour une durée de 1250 périodes.
Montant à payer 250€
*/

$periods = 1250;
$section = 'WebDev';
$pricePeriod = 0.20;

print 'Vous êtes inscrit dans la section '.$section.' pour une durée de '.$periods.' périodes.<br>';
print 'Montant à payer: '.$periods * $pricePeriod.'€.<br>'; 

/*
2)
A l'aide de deux variables calculez l'aire d'un rectangle
exemple:
Aire d'un rectangle de 10M sur 5M = 50M2
*/

$lenght = 10;
$width = 5;

print 'L\'aire d\'un rectangle de '.$lenght.'M sur '.$width.'M = '.$lenght * $width.'M2.<br>';
/*
3)
Sur base des deux variables faites en sorte d'ajouter à la variable b le contenu de la variable a
*/

$a = 'jours';
$b = 10;


/*
4)
Si la variable est de type string, changer son type en tableau et afficher son contenu ainsi que son nouveau type.
*/

$var = 'HTML';


/*
5)
Si la variable name est vide ou contient un espace affichez "Renseignez votre nom" sinom "Votre nom est..."
*/

$name = ' ';

/*
6)
A l'aide de deux constantes, l'une pour la tva (21%) et l'autre pour la devise (€) et d'une variable pour le prix réalisez le script suivant.  Si la devise est en euro calculez le montant de la TVA sinon affichez "Pour le calcul, la devise doit être en euro."
*/

