<?php

/*  -> PDO
 *  Connexion
 *  -> Query
 *  -> Prepare + Execute (Params)
 *  -> Result
 *  -> Fetch?
 *  > HORS PDO (Traitement)
 */


$connect = new PDO('mysql:host=localhost;dbname=Mediarnaque', 'root', 'root');

$color = "Turquoise";
$sql = "INSERT INTO color (nameC) VALUES (?)";
$result = $connect->prepare($sql);
$result->execute([$color]);

if (!$result->fetchColumn()){

    $res = $connect->prepare("INSERT INTO color VALUES (?, ?)");
    $res->execute([6, $color]);

    print $res->rowCount() . ' lignes ajoutées avec l\'id' . $connect->lastInsertId();
} else {
    print 'La couleur ' . $color . ' existe déjà en base de données!';
}

?>

