<?php
require_once '../partials/header.php';
?>

<a href="?page=home">Home</a> <a href="?page=about">About Us</a> <a href="?page=gallery">Gallery</a> <a href="?page=contact">Contact Us</a>







<?php

// Tester l'existence du paramètre
// Lors du premier accès le param 'page' n'existe pas alors qu'il est testé dans le code => erreur PHP
if(!isset($_GET['page'])){
    $_GET['page'] = 'home';
}

if($_GET['page'] == 'about'){
    require_once '../partials/about.php';
} elseif($_GET['page'] == 'gallery'){
    require_once '../partials/gallery.php';
} elseif($_GET['page'] == 'contact'){
    require_once '../partials/contact.php';
} else {
    require_once '../partials/home.php';
}

require_once '../partials/footer.php';
