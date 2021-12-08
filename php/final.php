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

echo "Si J'additionne le ".$nb1." et le ".$nb2." ensemble, ça donnera comme résultat ".($nb1 + $nb2);

echo '<hr>';
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------

2) Voici de nouveau deux variables correspondant à des nombres ainsi qu'une autre variable correspondant à l'opération utilisée(+, -, X ou /), 
cette fois vous devez faire en sorte que votre code teste quelle est l'opération mathématique à effectuer. Par exemple: Si $sign est égal à '+', alors vous devrez afficher
l'addition de ces deux variables, si $sign est égal à '-' alors vous devrez en effectuer la soustraction, ect....  
Outils utilisés:  opérateurs arithmétiques,   if, elseif, else. */

$nb3 = 7;
$nb4 = 9;

$sign = '+';

if($sign == '+') {
	echo "Le résultat est ".($nb3 + $nb4);
} elseif($sign == '-') {
	echo "Le résultat est ".($nb3 - $nb4);
} elseif($sign == '*') {
	echo "Le resultat est ".($nb3 * $nb4);
} else {
	echo "Erreur de calcul";
}

echo '<hr>';

/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
3) Testez si ces deux variables sont de même type, si c'est le cas alors affichez "Elles sont identiques!", sinon affichez "Elles sont différentes". 
Détruisez ensuite ces deux variables ! */


$var1 = 15;
$var2 = 17;

echo gettype($var1);
echo '<br>';
echo gettype($var2);

echo '<br>';

if($var1 === $var2){
	echo "Elles sont identiques";
} else {
	echo "Elles sont differentes";
}

echo '<hr>';
/* -------------------------------------------------------------------------------------------------------------------------------------------------------------
4) Affichez le type de la variable suivante, changez ensuite ce type en type 'string' ensuite affichez de nouveau son type pour vous assurer que ce dernier a bien changé. */
        
$var = 12;

echo gettype($var);

echo '<br>';

echo settype($var,'string');

echo '<br>';

echo gettype($var);

echo '<hr>';

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------

5) Voici une variable, elle contient la valeur 12 et est de type int. Affichez cette variable ainsi que son type, changez ensuite son type en nombre à virgule et affichez ensuite
son type à nouveau pour vous assurer que le changement de type a bien été fait. Et finalement, changez le contenu de cette variable en lui assignant la valeur: 16,76. */

$nbr = 12;

echo gettype($nbr);

echo '<br>';

settype($nbr, 'float');
$nbr = 16.76;
echo $nbr;

echo '<hr>';
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

for($a = 1 ; $a <= 9 ; $a++){
	echo "<br>".$a." X ".$nombre." = ".$a * $nombre;
}

echo '<hr>';



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

$car = ['BMW Serie 1' => 23000, 'Opel C' => 7000,'Renault Mégane' => 5000,'Mercedes CLA' => 40000,'Tesla Model X' => 110000];


?> 
<p>Nombre de voitures: <?php echo count($car) ?></p>
<p>Le total des montants: <?php echo array_sum($car) ?></p>
<p>Le prix moyen: <?php echo array_sum($car) / count($car) ?></p>
<p>La voiture la plus cher: <?php echo max($car) ?></p>
<p>La voiture la moins cher: <?php echo min($car) ?></p>

<?php

ksort($car);


$car['Audi A5'] = 35000;

foreach($car as $name => $price) {
	if($price >= 30000 && $price >= 11000) {
		echo $name.' : '.$price.'<br>';
	}
}	

echo '<hr>';

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


 $shop = ['IKEA' => 'ik', 'FNAC' => 'fn', 'Carrefour' => 'cr', 'Quick' => 'qk', 'Inno' => 'in', 'Optic 2000' => 'op'];

foreach($shop as $names => $iso) {
	echo '<a href="?iso=' .$iso.'">' .$names.'<br></a>';
}

if(isset($_GET['iso'])) {
	if($_GET['iso'] == 'ik') {
		echo $_GET['iso']." IKEA est un magasin de meubles";
	} elseif($_GET['iso'] == 'fn') {
		echo $_GET['iso']." La FNAC est un magasin multimédia";
	} elseif($_GET['iso'] == 'cr') {
		echo $_GET['iso']." Carrefour Market est un magasin d'alimentation";
	} elseif($_GET['iso'] == 'qk') {
		echo $_GET['iso']." Quick est un fast food";
	} elseif($_GET['iso'] == 'in') {
		echo $_GET['iso']." L'inno est un magasin de vêtements";
	} elseif($_GET['iso'] == 'op') {
		echo $_GET['iso']." Optic 2000 est un magasin de lunettes";
	} else {
		echo "Ce n'est pas un magasin existant !";
	}
} else {
	echo 'Bienvenue à Rive Gauche !';
}




