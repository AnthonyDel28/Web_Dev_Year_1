<?php

// Voici un exemple d'une requête cURL vers l'api user/{id}

// Une bonne pratique est de séparer le host, du endpoint et des éventuels paramètres. Cela permet de modifier facilement les requêtes lors de vos tests ou de créer une fonction cURL générique
$host = 'http://localhost/webservices/api';
$endpoint = '/api/user.php';
$params = [
    'id' => 1,
    'token' => 'test1234'
];

$url = $host . $endpoint;

// Le ? et http_build_query n'est nécessaire que si des paramètres existent
if (!empty($params)) {
    $url .= '?' . http_build_query($params);
}

// Initialisation de l'appel cURL
$ch = curl_init($url);

// Définition des options
$options = [
    CURLOPT_HEADER => 'Content-Type: application/json', // Ce header précise qu'on attend un objet JSON en retour
    CURLOPT_RETURNTRANSFER => true, // Cette option précise qu'on attend une valeur de retour
    CURLOPT_VERBOSE, // Cette option affichera le détail de la requête. Uniquement utile lors des tests.
];
curl_setopt_array($ch, $options);

// Exécution de cURL
$output = curl_exec($ch);
// Récupération du code HTTP
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// Gestion des éventuelles erreurs
if ($output === false || curl_errno($ch)) {
    echo 'Erreur Curl : ' . curl_error($ch);
} elseif ($http_code != 200) {
    header('HTTP/1.1 ' . $http_code);
    die;
} else {
    // Dans ce cas tout va bien, on affiche le résultat
    echo $output;
}
curl_close($ch);
