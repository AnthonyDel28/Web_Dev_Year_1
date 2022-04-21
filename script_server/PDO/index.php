<?php


$dbh = new PDO('mysql:host=localhost;dbname=Mediarnaque', 'root', 'root');


$result = $dbh->query("SELECT * FROM laptop WHERE idL = 10");
$data = $result->fetch(PDO::FETCH_ASSOC);
foreach($data as $key => $value){
    print $key . ' ' . $value . '<br>';
}
?>