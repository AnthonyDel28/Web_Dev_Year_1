<?php
/*
EXERCICE SUR LES EXTENSIONS DES DOMAINES
A l'aide d'un tableau associatif et d'une boucle, créez un menu avec les pays suivants: Belgique (be), Chine (cn), Egypte (eg), Allemagne (de), Kenya (ke) et France (fr)
Lorsqu'on clique sur un lien du menu, un script affiche à quel continent appartient l'extension du pays (code iso).
Exemples: 
	be est une extension européenne
	ke est une extension africaine
	...
Par défaut, on affiche 'Sélectionnez votre pays'
Si l'extension ne correspond pas à un pays du menu, on affiche ... est une extension non répertoriée.
 */

 $tab = ['Belgique' => 'be', 'Chine' => 'cn', 'Egypte' => 'eg', 'Allemagne' => 'de', 'Kenya' => 'ke', 'France' => 'fr'];

foreach($tab as $key => $value){
	print "<a href='?iso=$iso'>$names</a> ";
}

if(!isset($_GET['iso'])){
	$_GET['iso'] = 'home';
}

if($_GET['iso'] == 'be' || $_GET['iso'] == 'fr' || $_GET['iso'] == 'de'){
	print '<h1>'.$_GET['iso'].' est une extension européenne<br>';
}elseif($_GET['iso'] == 'cn' ){
	print '<h1>'.$_GET['iso'].' est une extension asiatique<br>';
}elseif($_GET['iso'] == 'ke' || $_GET['iso'] == 'eg'){
	print '<h1>'.$_GET['iso'].' est une extension africaine<br>';
}elseif($_GET['iso'] == 'home'){
	print '<h1>Sélectionnez votre pays!<br>';
}else{
	print '<h1>'.$_GET['iso'].' est une extension non répertoriée!';
}