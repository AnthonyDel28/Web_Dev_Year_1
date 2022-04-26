<?php
require_once './lib/database.php';
require_once './lib/lib.php';
require_once './form/formlib.php';


$connect = connect();


$insert = $connect->query("INSERT INTO laptop (brandL, colorL, cpuL, ramL, screenL, vcardL, weightL, priceL)
VALUES ('". $_POST['brand'] ."', '". $_POST['color'] ."' , '". $_POST['cpu'] ."' , '". $_POST['ram'] . "' 
, '". $_POST['screen'] ."' , '". $_POST['vcard'] ."' , '". $_POST['weight'] ."' , '". $_POST['price'] ."')");



