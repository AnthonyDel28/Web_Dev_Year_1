<?php

/////// EXERCICE 01 ///////
/* 
A l'aide des trois variables, écrivez en php la ligne suivante. Utilisez un seul echo et la syntaxe des simples quotes (').
Sur les 10 produits achetés, le client en retourne 3. Il en a au final acheté 7 pour un montant de 700€
*/

$quantite = 10;
$prix = 100;
$retour = 3;

print 'Sur les '.$quantite.' produits achetés, le client en retourne '.$retour.'. Il en a au final acheté '.($quantite - $retour).' pour un montant de '.(($prix * $quantite) - ($prix * $retour)).'€.';
echo '<hr>';

/////// EXERCICE 02 ///////
/*
Si la variable n'est pas vide, modifiez son type en nombre à décimales
*/

$var = 12;
print gettype($var);
if(empty($var) == FALSE){
	settype($var, 'float');
}print ' ----> '.gettype($var);
echo '<hr>';

/////// EXERCICE 03 ///////
/* 
Testez si les deux variables sont de même type.  Dans ce cas affichez: 'les variables sont de type identique'.  Sinon affichez 'Les variables ne sont pas de même type'. 
Après l'affichage, détruisez les variables.
*/

$var1 = '12';
$var2 = 12;

if(gettype($var1) == gettype($var2)){
	print 'Les variables sont de type identique.<br>';
}else{
	print 'Les variables ne sont pas de même type.<br>';
}unset($var1, $var2);
echo '<hr>';

/////// EXERCICE 04 ///////
/*
A l'aide d'une boucle, affichez une table de multiplication dont le deuxième nombre peut être modifié dans une variable.
Ex: 
1 X 5 = 5		1 X 8 = 8
2 X 5 = 10		2 X 8 = 16
...
*/
$number = 7;

for($i = 1; $i <= 9; $i++){
	print $i.' X '.$number.' = '.$i * $number.'<br>';
}



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
<html>Il y a <?php print count($tab)?> étudiants.<br></html>
<html>Il y a <?php print array_sum($tab)?> de note totale.<br></html>
<html>La note moyenne est de <?php print array_sum($tab) / count($tab)?><br></html>
<html>La moins bonne note est de <?php print min($tab)?><br></html>
<?php
print '<hr>';
asort($tab);
foreach($tab as $name => $score){
	print $name.'  '.$score.'<br>';
}print '<hr>';

$tab['William'] = 82;

foreach($tab as $name => $score){
	if($score >= 80 && $score <= 90){
		print $name.' '.$score.'<br>';
	}
}