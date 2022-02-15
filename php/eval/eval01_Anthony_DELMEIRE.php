<?php



/////// EXERCICE 01 ///////
/* 
A l'aide des trois variables, écrivez en php la ligne suivante. Utilisez un seul echo et la syntaxe des simples quotes (').
Sur les 10 produits achetés, le client en retourne 3. Il en a au final acheté 7 pour un montant de 700€
*/

$quantite = 10;
$prix = 100;
$retour = 3;

print 'Sur les '.$quantite.' produits achetés, le client en retourne '.$retour.'. Il en a au final acheté '.($quantite - $retour).' pour un montant de '.(($quantite - $retour) * $prix).'€'; 
print '<hr>';
/////// EXERCICE 02 ///////
/*
Si la variable n'est pas vide, modifiez son type en nombre à décimales
*/

$var = 12;

print gettype($var).'<br>';
if(!empty($var))
	settype($var, "float");
print gettype($var);
print '<hr>';




/////// EXERCICE 03 ///////
/* 
Testez si les deux variables sont de même type.  Dans ce cas affichez: 'les variables sont de type identique'.  Sinon affichez 'Les variables ne sont pas de même type'. 
Après l'affichage, détruisez les variables.
*/

$val01 = '12';
$val02 = 12;


if(gettype($val01) == gettype($val02))
	print "Les variables sont de type identique.";
else
	print "Les variables ne sont pas de même type.<hr>";
unset($val01, $val02);



/////// EXERCICE 04 ///////
/*
A l'aide d'une boucle, affichez une table de multiplication dont le deuxième nombre peut être modifié dans une variable.
Ex: 
1 X 5 = 5		1 X 8 = 8
2 X 5 = 10		2 X 8 = 16
...
*/
$number = 8;

for($i = 1; $i <= 9; $i++)
	print $i.' X '.$number.' = '.($i * $number).'<br>';
echo '<hr>';

/////// EXERCICE 05 ///////
/*
Créez un tableau associatif contenant des étudiants et leur pourcentage:
	- John Doe 85 
	- Alice Jennings 70
	- Steve James 40
	- Jane Doe 88
	- Laura Foller 35

En sortant du PHP et en ulisant le HTML
5.1) Affichez le nombre d'étudiants
5.2) Affichez le total des notes
5.3) Affichez la moyenne des notes
5.4) Affichez la moins bonne note

5.4) Triez le tableau sur les pourcentages du petit au plus grand et affichez toutes les données du tableau.

5.5) Ajoutez dans le script un nouvel étudiant.

5.6) Affichez une nouvelle fois le tableau mais uniquement pour les étudiants dont le pourcentage est compris entre 80 et 90%.  Le nouvel étudiant doit apparaître.
*/

$tab = ['John Doe' => 85, 'Alice Jennings' => 70, 'Steve James' => 40, 'Jane Doe' => 88, 'Laura Foller' => 35];
?>

<html>
	<p>Il y a <? print count($tab); ?> étudiants</p>
	<p>Il y a <? print array_sum($tab); ?> de note totale</p>
	<p>Il y a <? print array_sum($tab) / count($tab) ; ?> de note moyenne</p>
	<p>La moins bonne note est de <? print min($tab); ?></p>

<?php

foreach($tab as $name => $note)
	asort($tab);
print_r($tab);
print "<br>";

$tab['Max'] = 90;

print_r($tab);
print "<br>";

foreach($tab as $name => $note)
	if($note >= 80 && $note <= 90)
		print $name.' '.$note.'<br>';


?>


<!DOCTYPE html>
<html>
	<style>
		body {
			background-color: #000000;
			color: #fff;
		}
	</style>