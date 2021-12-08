<?php

/* CONDITIONNELLE
1) En fonction du code iso d'un pays, affichez le texte suivant
es ou pe ou bo => Bienvenido a nuestro sitio web
en => Welcome to our website
de ou au => Willkommen auf unserer Webseite
sinon Bienvenue sur notre site Web
*/

$country = 'en';

if($country == 'es' || $country == 'pe' || $country == 'bo'){
    print 'Bienvenido a nuestro sitio web<br>';
} elseif($country == 'en'){
    print 'Welcome to our website<br>';
} elseif($country == 'de' || $country == 'au'){
    print 'Willkommen auf unserer Webseite<br>';
} else{
    print 'Bienvenue sur notre site web<br>';
} print '<hr>';

/* TABLEAUX
2) Créez un tableau associatif contenant différentes catégories de voitures et leur prix:

- Polo 17000
- Tiguan 29000
- Golf 21000
- Touran 26000
- T-Rock 23000

2.1) Affichez toutes les voitures et leur prix par odre alphabétique
2.2) Affichez le nombre de voitures
2.3) Affichez le prix total des voitures
2.4) Mettez en gras (b) toutes les voitures dont le prix est supérieur à 25000
 */

 //2.1
$tab = ['Polo' => 17000, 'Tiguan' => 29000, 'Golf' => 21000, 'Touran' => 26000, 'T-Rock' => 23000];

ksort($tab);
foreach($tab as $model => $price){
    print $model.' à '.$price.'€<br>';
} print '<hr>';

//--------------------------------------------------------------------------
//2.2

print 'Il y a '.count($tab).' modèles disponibles<br><hr>';

//--------------------------------------------------------------------------
//2.3

print 'Le montant total de notre gamme automobile s\' élève à: '.array_sum($tab).'€<hr>';

//--------------------------------------------------------------------------
//2.4 

foreach($tab as $model => $price){
    if($price > 25000)
    {
        print '<b>'.$model.' '.$price.'€</b><br>';
    } else{
        print $model.' '.$price.'€<br>';
    }
}
