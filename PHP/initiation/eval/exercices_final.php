<?php
//                                                              REVISIONS DEUXIEME SESSION
// -------------------------------------------------------------------------------------------------------------------------------------------------------------
/* Exercices finaux pour l'examen d'Initiation à la programmation.
Ces exercices reprennent globalement la matière vue lors du cours ainsi que toutes les notions indispensables à connaître pour 
la suite de votre apprentissage du PHP. Ces révisions commenceront avec des exercices simples pour finir par la dernière matière vue lors du cours.

Avant de commencer:  Veillez à utiliser un code propre, un code structuré qui correspond tel quel à ce qu'on a vu en classe. 
Utilisez les fonctions les mieux adaptées, DONT REPEAT YOURSELF et surtout ... N'oubliez jamais que votre ordinateur ne se trompe jamais 
quand il s'agit de code, si il y a une erreur qui apparait alors le problème vient de vous et votre code et non de votre système !!!

Bonne chance pour cette deuxième session ! 

-------------------------------------------------------------------------------------------------------------------------------------------------------------

                                                            OPERATEURS, GETTYPE, SETTYPE, UNSET, ECT....
-------------------------------------------------------------------------------------------------------------------------------------------------------------


1) Voici deux variables correspondant à des nombres, affichez une phrase qui fait l'addition de ces deux variables et affichez également le résultat obtenu. 
Outils utilisés:  opérateurs arithmétiques  */


$nb1 = 6;
$nb2 = 11;


/*-------------------------------------------------------------------------------------------------------------------------------------------------------------

2) Voici de nouveau deux variables correspondant à des nombres ainsi qu'une autre variable correspondant à l'opération utilisée(+, -, X ou /), 
cette fois vous devez faire en sorte que votre code teste quelle est l'opération mathématique à effectuer. Par exemple: Si $sign est égal à '+', alors vous devrez afficher
l'addition de ces deux variables, si $sign est égal à '-' alors vous devrez en effectuer la soustraction, ect....  
Outils utilisés:  opérateurs arithmétiques,   if, elseif, else. */

$nb3 = 7;
$nb4 = 9;

$sign = '+';

/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
3) Testez si ces deux variables sont de même type, si c'est le cas alors affichez "Elles sont identiques!", sinon affichez "Elles sont différentes". 
Détruisez ensuite ces deux variables ! */

$var1 = 15;
$var2 = '15';


/* -------------------------------------------------------------------------------------------------------------------------------------------------------------
4) Affichez le type de la variable suivante, changez ensuite ce type en type 'string' ensuite affichez de nouveau son type pour vous assurer que ce dernier a bien changé. */
        
$var = 12;


/* -------------------------------------------------------------------------------------------------------------------------------------------------------------

5) Voici une variable, elle contient la valeur 12 et est de type int. Affichez cette variable ainsi que son type, changez ensuite son type en nombre à virgule et affichez ensuite
son type à nouveau pour vous assurer que le changement de type a bien été fait. Et finalement, changez le contenu de cette variable en lui assignant la valeur: 16,76. */

$nbr = 12;

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------

6) Créez la table de multiplication d'un nombre donné, sachant évidemment qu'elle ressemblera à ceci: 
Si la variable est égale à 6 par exemple, alors votre résultat de votre code sera comme suit: 

1 x 6 = 6
2 x 6 = 12
3 x 6 = 18
4 x 6 = 24
...  
9 x 6 = 54

Veillez à optimiser votre code, et surtout la fonction de boucle élémentaire for() que nous avons vu au début du cours, n'oubliez pas non plus 
que dans une table de multiplication le premier nombre commencera toujours à 1 et ira jusque 9 ! 
La boucle for() a besoin d'une variable pour fonctionner, c'est pourquoi la variable $nombre ne sera pas la seule variable de cet exercice !

Outils utilisés:   for()    */

$nombre = 5;

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------


7) Créez un tableau associatif pour un garage de voitures(modèle et prix):
	- 'BMW Serie 1' 23000
	- 'Opel Corsa' 7000
	- 'Renault Mégane' 5000
	- 'Mercedes CLA' 40000
	- 'Tesla Model X' 110000

En sortant du PHP et en ulisant le HTML
5.1) Affichez le nombre de voitures
5.2) Affichez le total des montants 
5.3) Affichez le prix moyen
5.4) Affichez la voiture la moins chère
5.4.1) Affichez la voiture la plus chère

5.4) Triez le tableau sur les prix du petit au plus grand et affichez toutes les données du tableau.

5.5) Ajoutez dans le script une nouvelle voiture, une Audi A5 qui vaut 35000€.

5.6) Affichez une nouvelle fois le tableau mais uniquement pour les voitures dont le prix est compris entre 30000 et 200000€. 


N'oubliez pas ce que vous avez déjà vu auparavant, ainsi que la fonction foreach() qui est très importante lorsque vous manipulez un tableau ! 

-------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*                                                          CREATION DE MENU & MANIPULATION

8) A l'aide d'un tableau associatif et d'une boucle, créez un menu pour un centre commercial avec les magasins suivants: 
    IKEA (ik), Fnac (fn), Carrefour Market (cr), Quick (qk), INNO (in) et Optic 2000 (op)
Lorsqu'on clique sur un lien du menu, un script affiche de quel genre est le magasin correspondant (code iso).
Exemples: 
	Ikea est un magasin de meubles
	Quick est un fast food
	...
Par défaut, on affiche 'Bienvenue à Rive Gauche !'
Si l'extension ne correspond pas à un magasin du menu, on affiche ... n'est pas un magasin existant!.
 */






