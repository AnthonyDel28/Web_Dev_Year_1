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

 foreach($tab as $country => $code){
	 print "<a href='?page=$code'> $country </a>";
 }

 if(!isset($_GET['page'])){
	 $_GET['page'] = 'home';
 }

 if($_GET['page'] == 'fr' || $_GET['page'] == 'be' || $_GET['page'] == 'de'){
	 print '<h1>'.$_GET['page'].' est une extension européenné<br>';
 }elseif($_GET['page'] == 'cn'){
	 print '<h1>'.$_GET['page'].' est une extension asiatique<br>';
 }elseif($_GET['page'] == 'ke' || $_GET['page'] == 'eg'){
	 print '<h1>'.$_GET['page'].' est une extension asiatique<br>';
 }elseif($_GET['page'] == 'home'){
	 print '<h1>Sélectionnez votre pays!';
 }else{
	 print '<h1>'.$_GET['page'].' est une extension non répretoriée';
 }