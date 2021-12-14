<?php

/* EXERCICES CONDITIONS IMBRIQUEES & TABLEAUX

En faisant l'inventaire de ma brasserie, j'ai noté quelques boissons qui se vendaient rapidement pour quelques statistiques.
J'ai donc noté ces produits ainsi que le nombre qu'il m'en restait en stock dans la réserve.



*/
/* 01) En tenant compte de ces quantités, affichez une phrase affichant son nom de produit ainsi que sa quantité en stock
Si le stock d'un article est supérieur à 50 unités, alors en plus d'afficher la quantité vous devrez également signaler qu'il ne faut plus en commander pour l'instant,
et si le stock d'un article est inférieur à 10 unités alors vous devrez signaler qu'il faut en commander rapidement. */

$stock = ['Eau' => 14, 'Bière' => 21, 'Charbon' => 5, 'Cigarettes' => 74, 'Coca-Cola' => 0];

foreach($stock as $drink => $quantity){
    print 'Produit: '.$drink.' ---> Quantité: '.$quantity.'<br>';
} print '<hr>';
foreach($stock as $drink => $quantity){
    if($quantity > 50){
        print 'Il y a encore '.$quantity.' '.$drink.', vous ne devez pas en commander!<br>';
    }else if($quantity < 50){
        print 'Il ne reste plus que '.$quantity.' '.$drink.', il faut en commander rapidement!<br>';
    }
}






/*02) Créez un petit jeu permettant en fonction de deux variables (deux dés) données de déterminer un gagnant comme suit:
Si je lance les dés et que leur somme est un nombre paire, alors vous devrez afficher un message pour le gagnant, 
en revanche si les dés affichent un résultat impair alors vous devrez afficher un message pour le perdant.
Attention, vous devez tenir compte du fait que nos dés ne peuvent afficher que des nombres de 1 à 6 ! Et ne peuvent pas afficher 0 évidemment !
Il faudra donc gérer ce genre d'erreur dans votre code!
*/

$one = 2;
$two = 3;
if((($one + $two) <= 12 && $one != 0 && $two != 0)){
    if(($one + $two) % 2){
        print '<hr>Bravo, vous avez gagné!';
    }else{
        print '<hr>Désolé, vous avez perdu!';
    }
}print '<hr>';




/*03) Pour l'émission "Les douze coups de midi" nous devons réaliser des statistiques en fonction des candidats gagnants...
Créez donc un tableau associatif reprenant les noms et les gains de nos 5 grands candidats: 
    Rufus -> 5000€,     Albert -> 74000€,      Patrick -> 14000€,       Adrien  56000€,     Anthony 19000€

3.1) Affichez tous les candidats et leurs gains les uns après les autres
3.2) Affichez combien il y a de candidats au total dans l'émission
3.3) Affichez les candidats par ordre alphabétique
3.4) Affichez les candidats et leurs gains par ordre croissant de gains
3.5) Faites une moyenne des gains qui ont été obtenus dans cette émission*/

$winners = ['Rufus' => 5000, 'Albert' => 74000, 'Patrick' => 14000, 'Adrien' => 56000, 'Anthony' => 19000];

foreach($winners as $name => $gain){
    print 'Le joueur '.$name.' a gagné '.$gain.'€.<br>';
}print '<hr>';

print 'Il y a '.count($winners).' gagnants dans cette émission.<hr>';

ksort($winners);
foreach($winners as $name => $gain){
    print $name.'<br>';
}print '<hr>';

asort($winners);
print '<b>Classement:<br>';
foreach($winners as $name => $gain){
    print 'Le joueur '.$name.' a gagné '.$gain.'€.<br>';
}print '<hr>';


print 'En moyenne nos joueurs ont gagné: '.array_sum($winners) / count($winners).'€.<br>';




