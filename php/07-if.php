<?php

/*
if(condition) {
    Instruction 01
    Instruction 02
    Instruction 03...
} 
---------------------------------------------------------------------
Schéma en double condition:

if(condition){
    Instruction 01
    ...
} else {
    Instruction 02
}
---------------------------------------------------------------------
Schéma en conditions multiples

if(condition 01){
    Instruction 01
} else if(condition 02){
    Instruction 02
} else if(condition 03){
    Instruction 03
} else{
    Instruction 04
}
---------------------------------------------------------------------
*/

$age = 18;
if($age <= 18)
{
    print 'Vous pouvez jouer !';
} else
{
    print 'Vous ne pouvez pas jouer !';
}
print '<br>';

// 01 :  Si l'utilisateur a le rôle Admin, affichez: "Partie Administration" 
//              Sinon affichez "Partie publique".

$role = 'Admin';

if($role == "Admin")
{
    print 'Partie Administration';
} else
{
    print 'Partie publique';
}
print '<br>';
print '<br>';


// 02 Affichez une catégorie en fonction d'une tranche d'age
// Age >= 60 : Senior, >= 40: Vétéran, >= 18: Jeune adulte, sinon Junior

$age = 79;

if($age >= 60){
    print 'Senior';
} else if($age >= 40){
    print 'Vétéran';
} else if($age >= 18){
    print 'Jeune Adulte';
} else{
    print 'Junior';
}

print '<br>';
print '<br>';

/* 03 En fonction du montant des achats calculez une remise conditionnelle
Si MA > 1000 = 30% 
Si MA > 700 = 20%
Si MA > 500 = 10%
Sinon 5%  */

$cost = 3436;

if($cost > 1000){
    print 'La remise est de '.$cost * 0.3. '€.';
} else if($cost > 700){
    print 'La remise est de ' .$cost * 0.2. '€.';
} else if($cost > 500){
    print 'La remise est de ' .$cost * 0.1. '€.';
} else{
    print 'La remise est de ' .$cost * 0.05. '€.';
}

// Version optimisée 
// Le taux de la remise est enregistré pour chaque condition dans la même variable

if($cost > 1000){
    $discount = 0.3;
}else if($cost > 700){
    $discount = 0.2;
}else if($cost > 500){
    $discount = 0.1;
}else{
    $discount = 0.05;
}print '<br>La remise est de '.$cost * $discount.'€.';

/* 04 Le visiteurs aura accès au site si son âge est supérieur ou égal à 18 et s'il est
authentifié. */ 

$age = 18;
$connect = TRUE;

if($age >= 18 && $connect == TRUE){
    print '<br>Vous êtes connecté à notre site !';
}else{
    print '<br>Vous devez avoir au moins 18 ans et devez être authentifié pour accéder à ce contenu !';
}

// On peut simplifier le test sur un BOOLEAN en indiquant uniquement son nom


/* 5) En fonction des présences de l'étudiant (>= 10) affichez le grade obtenu
point >= 80  PGD
point >= 70  GD
point >= 60  D
point >= 50  S
Sinon:     Refusé  */

$points = 89;
$presence = 11;
$rank;

if($presence >= 10){
    if($points >= 80){
        $rank = 'PGD';
    }else if($points >= 70){
        $rank = 'GD';
    }else if($points >= 60){
        $rank = 'D';
    }else if($points >= 50){
        $rank = 'S';
    }else{
        $rank = 'Réfusé';
    }
    print '<br>Votre grade est: '.$rank.'.<br>';
}else if($presence < 10){
    print '<br>Vous êtes réfusé!<br>';
}
