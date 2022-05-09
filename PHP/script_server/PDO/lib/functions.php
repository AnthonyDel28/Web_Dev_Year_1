<?php
require_once __DIR__ . '/database.php';

$connect = connect();

# On récupère le prix minimul
$result1 = $connect->prepare("SELECT priceL from laptop ORDER BY priceL ASC LIMIT 1");
$result1->execute();
$data1 = $result1->fetchObject();

$lower_price = $data1->priceL;

$result2 = $connect->prepare("SELECT priceL from laptop ORDER BY priceL DESC LIMIT 1");
$result2->execute();
$data2 = $result2->fetchObject();

$higher_price = $data2->priceL;

print $higher_price . '<br>' . $lower_price;

function printPrice($a, $b) {
    $c = $a + 100;
    while($a <= $b){
        print '<option value="$a .">'. $a . '>' . $c . '</option>';
    }
}