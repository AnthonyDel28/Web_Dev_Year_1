<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/partials/header.php';
?>

<a href="?page=home">Home</a> <a href="?page=about">About Us</a> <a href="?page=gallery">Gallery</a> <a href="?page=contact">Contact Us</a>







<?php

// Tester l'existence du paramètre
// Lors du premier accès le param 'page' n'existe pas alors qu'il est testé dans le code => erreur PHP
if(!isset($_GET['page'])){
    $_GET['page'] = 'home';
}

if($_GET['page'] == 'about'){
    print '<hr><h2>A Propos de Nous';
} elseif($_GET['page'] == 'gallery'){
    print '<hr><h2>Notre gallerie';
} elseif($_GET['page'] == 'contact'){
    print '<hr><h2>Nous contacter';
} else {
    print '<hr><h1>Page d\'acceuil';
}

require_once '/Applications/XAMPP/xamppfiles/htdocs/partials/footer.php';
