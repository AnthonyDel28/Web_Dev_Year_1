<?php

require_once __DIR__ . '/../lib/db.php';

// Un WS de type POST ne peut être accédé directement depuis l'adresse d'un navigateur ou sans un formulaire, car la méthode HTTP est GET
// Pour tester un WS utilisant une autre méthode que GET, vous pouvez utiliser la commande "curl" accessible depuis une console ou un terminal.
// Référez-vous à la documentation de la commande via : curl --help
// Ci-dessous une commande curl pour accéder à ce WS :
// curl "http://localhost/webservices/api/createUser.php" -d "name=test&email=test@test.com&password=test&token=token_different_volontairement" -v

if (empty($_POST['token']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
    header('HTTP/1.1 400');
    die;
}

if ($_POST['token'] == 'token_different_volontairement') {
    $dbh = connect();
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO user (nameU, passwordU, emailU, createdU) VALUES (?, ?, ?, NOW())";
        $insert = $dbh->prepare($sql);
        $insert->execute([$_POST['name'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['email']]);
        $getuser = $dbh->prepare("SELECT * FROM user WHERE idU = ?");
        $getuser->execute([$dbh->lastInsertId()]);
        echo json_encode($getuser->fetchObject());
    } else {
        return 'Echec';
    }
}
