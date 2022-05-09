<?php


/* CONDITIONNELLE & PARAMETRES
A) Créer un menu de pays permettant au visiteurq de choisir une traduction.
B) Utilisez les liens pour les pays suivants: Espagne, Pérou, Bolivie, Angleterre, Allemagne, Autriche, Belgique 

C) En fonction du code iso d'un pays, affichez le texte suivant
es ou pe ou bo => Bienvenido a nuestro sitio web
en => Welcome to our website
de ou au => Willkommen auf unserer Webseite
sinon Bienvenue sur notre site Web
*/ ?>

<a href="?page=es">Espagne</a> <a href="?page=pe">Pérou</a> <a href="?page=bo">Bolivie</a>
<a href="?page=en">Angleterre</a> <a href="?page=de">Allemagne</a> <a href="?page=au">Autriche</a>
<a href="?page=be">Belgique</a>
<?php
if(!isset($_GET['page'])){
    $_GET['page'] = 'NULL';
}
if($_GET['page'] == 'es' || $_GET['page'] == 'pe' || $_GET['page'] == 'bo'){
    print '<h2>Bienvenido a nuestro sitio web';
}elseif($_GET['page'] == 'en'){
    print '<h2>Welcome to our website';   
}elseif($_GET['page'] == 'de' || $_GET['page'] == 'au'){
    print '<h2>Willkommen auf unserer Webseite';
}elseif($_GET['page'] == 'NULL'){
    print '<h2> Veuillez choisir une traduction!';
}else{
    print '<h2>Bienvenue sur notre site web';
}
include '/Applications/XAMPP/xamppfiles/htdocs/partials/about.php';
?>



