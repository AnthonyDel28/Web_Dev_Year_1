<?php

///////////////// Tableaux indexés //////////////////////
// Variable de type string

$string = 'printemps, été, automne, hiver';

// Variable de type array (tableau)

$array = ['printemps', 'été', 'automne', 'hiver']; 
$arr = ['PHP', 'HTML', 'CSS'];

// Affichage des valeurs du tableau par leur index

print $array[0];
print '<br>';
print $array[1];
print '<br>';
print $array[2];
print '<br>';
print $array[3];
print '<br><hr>';

// Affichage des valeurs du tableau avec la fonction "foreach"

// foreach(array as value)
//          Instruction;
// }
foreach($array as $seasons){
    print $seasons.'<br>';

} print '<hr>';

// Modifier le format de sortie

foreach($array as $seasons){
    print '<a href="https://google.com">'.$seasons.'</a><br>';
} print '<hr>';

// Trier le tableau
// sort() ordre croissant
// rsort() ordre décroissant

sort($array);
foreach($array as $count){
    print $count.'<br>';
}

// Comptez le nombre d'éléments du tableau
// Affichez le texte suivant: Vous donnez n cours

print '<hr>Il existe '.count($array).' saisons.<br>';

// Vérifier la présence d'un élément dazns un tableau
// in_array(array)

$needle = 'C++';
if(!in_array($needle, $arr)){
    print 'Le cours de '.$needle.' ne se donne pas cette année!<br>';
}

// Ajouter un élément au tableau
// fonction native: array_push()

print '<hr>';
$array[] = 'bonjour';

foreach($array as $count){
    print $count.'<br>';
}

/////////////////////////////  Tableaux Assiociatifs /////////////////////////////////
// Principe du couple clé => valeur
// Syntaxe
// $array = [clé => valeur, clé => valeur, ....]
// Syntaxe du foreach
/* foreach(array as key => value){
    Instruction
}
*/
print '<hr>';
$courses = ['HTML' => 120, 'CSS' => 80, 'PHP' => 160, 'Python' => 100, 'Javascript' => 60];

/*
print 'CSS '.$courses['CSS'].' périodes.';

print '<br>';
foreach($courses as $courses => $time){
    print $courses.' '.$time.' péridoes.<br>';
}print '<hr>';
*/
// EX: Afficher les cours et les périodes ave une numérotation 

$i = 1;
foreach($courses as $course => $time){
    print $i++ .' '.$course.' '.$time.' périodes';
} print '<hr>';

// Trier les tableaux assiociatifs
// ksort() trie sur les clés par ordre alphabétique
// krsort() trie sur les clés par ordre inverse
// asort() trie sur les valeurs par ordre alphabétique
// arsort() trie sur les valeurs par ordre inverse

arsort($courses);
foreach($courses as $course => $time){
    print $course.' '.$time.' périodes<br>';
} print '<hr>';

// nomnbre de cours:
// somme des périodes:
// moyenne des périodes
// Afficher les périodes les plus petites
// Afficher les périodes les plus élevées



print 'Nombre de cours: '.count($courses);
print '<br>Somme des périodes: '.array_sum($courses);
print '<br> Moyenne des périodes: '.array_sum($courses) / count($courses).'';
print '<br> La plus petite période est: '.min($courses).'.';
print '<br> La plus petite période est: '.max($courses).'.<br>';

// Ajouter un couple (cours) au tableau et boucles les données

$courses['XML'] = 20;
foreach($courses as $course => $time){
    print $course.' '.$time.'<br>';
}print '<hr>';

// Vérifier la présence d'une clé dans un tableau associatif
// soit key_exist
// Si le cours Dotnet n'est pas dans la liste, affichez 'Le cours ne se donne pas cette année'

if(!array_key_exists('Dotnet', $courses)){
    print 'Le cours ne se donne pas cette année!';
}

