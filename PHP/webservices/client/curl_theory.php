<?php

// CURL exécutera une requête HTTP vers une URL

$url = 'https://www.iepscf-namur.be/';

// création de la ressource curl. Le paramètre 'url' est facultatif. S'il est omis, il doit être précisé en option plus tard.
$ch = curl_init($url);

// option pour définir l'url, si omise dans la création de ressource
// curl_setopt($ch, CURLOPT_URL, $url);

// définir une option (individuelle)
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// définir un tableau d'options
$options = [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
];
curl_setopt_array($ch, $options);

// exécuter une session curl et récupérer la réponse dans une variable
// la réponse sera TRUE (en cas de succès) ou FALSE (en cas d'échec)
// Si l'option CURLOPT_RETURNTRANSFER est définie à TRUE, le résultat sera retourné sous forme de string en cas de succès
$output = curl_exec($ch);

// fermeture de la ressource curl
curl_close($ch);

// Par défaut, curl exécute la requête HTTP avec la méthode GET
// Si la requête GET nécessite des paramètres, ils seront ajoutés à l'url, comme dans la barre d'adresse d'un navigateur web
// Les navigateurs web convertissent (encodent) automatiquement les paramètres. Dans le cas de l'utilisation de curl, vous devez le faire via votre code avec la fonction http_build_query()
// Cette fonction accepte un paramètre de type array ou object, vous devez donc construire vos paramètres comme ceci :

// array
$params = [
    'id' => 1,
    'token' => 'test1234'
];
// object
$params = new stdClass();
$params->id = 1;
$params->token = 'test1234';

// Dans une url, les paramètres sont toujours précédés d'un ?
$url .= '?' . http_build_query($params);

// Au delà de la méthode GET, il est possible de définir une autre méthode. Exemple avec delete :
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

// Les méthodes POST et PUT possèdent leur propre paramètre.
curl_setopt($ch, CURLOPT_PUT, 1);
curl_setopt($ch, CURLOPT_POST, 1);

// Si vous devez passer un paramètre en BODY (et non dans l'url), comme par exemple lors d'une requête POST, vous devez faire comme ceci :
$params = [
    'name' => 'toto',
    'email' => 'toto@toto.com',
    'token' => 'test1234'
];
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

// Vous pouvez toujours passer les différents paramètres dans un tableau plutôt qu'individuellement
$options = [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $params,
    CURLOPT_HEADER => 'Content-Type: application/json'
];
curl_setopt_array($ch, $options);

// curl effectuant une requête HTTP, un code HTTP est renvoyé lors de l'exécution. Il peut être récupéré comme ceci :
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// curl peut également retourner une erreur, récupérée comme ceci :
curl_error($ch); // Le message d'erreur
curl_errno($ch); // Le code d'erreur