<?php
// Todo : Modifiez ce script afin qu'il permette d'afficher le résultat de la recherche
// Privilégiez l'utilisation des fonctions du projet
// Inspirez vous de https://gitlab.com/jf-exercices/pdo/-/blob/master/index.php pour la requête et l'affichage du tableau de résultat

// [le théorie des 2e et 3e n'a pas encore été vue, mais vous pouvez essayer si vous avez déjà réalisé la 1e partie]
// 2e partie : ajoutez un bouton permettant de télécharger le résultat de la recherche au format json
// 3e partie : ajoutez un bouton permettant d'exporter le résultat de la recherche dans un fichier au format csv. Le fichier pourra être téléchargé, mais il sera également créé dans le dossier 'reports' du projet


// Initialisation de la connexion à la BDD
$connect = connect();

print_r($_POST);

