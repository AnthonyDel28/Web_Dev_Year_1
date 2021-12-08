<?php
// Boucle for()
// for(initialisation; condition d'arrêt; incrémentation)

for($i = 1; $i <= 10; $i++){
    print $i.'<br>';
}

// 1) A l'aide d'une boucle, écrivez les 6 niveaux de titres HTML

for($i = 1; $i <= 6; $i++){
    print "<h$i> Niveau de titre</h$i>";
    print '<h'.$i.'> Niveau de titre </h'.$i.'>';
}

// 2) Ecrivez les années comprises entre 1970 et 2000
// Utilisez des variables pour les années de départ de fin

$min = 1970;
$max = 2000;
for($i = $min; $i <= $max; $i++){
    print $i.'<br>';
}
print '<br>';
// 3) Inverser l'ordre des années

for($i = $max; $i >= $min; $i--){
    print $i.'<br>';
}
print '<br>';
// 4) Reprendre l'exercice précédent et mettre en gras une année sur deux 
// (Utilisez l'opérateur Modulo et la balise <b> pour le gras)


for($i = $max; $i >= $min; $i--){
    if($i % 2){
        print '<b>'.$i.'</b><br>';
    } else {
        print $i.'<br>';
    }
}

// 5) Exemple d'une boucle pour alimenter une liste déroulante en HTML

?>

<select name="" id="">
    <option value="">2000</option> 
    <option value="">1999</option>
    <option value="">1998</option>
    <option value="">1997</option>
    <option value="">1996</option>
    <option value="">1995</option>
    <option value="">1994</option>
    <option value="">1993</option>
</select>


<select name="" id="">
<?php 
// Liste en php

for($i = $max; $i >= $min; $i--){
    print '<option value="">'.$i.'</option>';
    
}
?>
</select>

<select name="" id="">
<?php 
// Syntaxe alternative
    for($i = $max; $i >= $min; $i--) : ?>
        <option value=""><?= $i ?></option>
    <?php endfor ?>

    </select>    
<hr>
<?php
// 6) Créer une boucle permettant d'afficher le zéro non significatif de 1 à 20

for($i = 0; $i <= 20; $i++){
    if($i <= 9){
        print '0'.$i.'<br>';
    } else{
        print $i.'<br>';
    }
} print '<hr>';

// 7) Créer une boucle de 1 à 20 et mettre en gras les chiffres 5 et 15

for($i = 1; $i <= 20; $i++){
    if($i == 15 || $i == 5){
        print '<b>'.$i.'</b>';
    } else{
        print $i;
    }print '<br>';
}

print '<hr>';
// 8) Créer un carré numéroté de n lignes sur n colonnes

$rows = 56; // Lignes
$cols = 30; // Colonnes
$nbr = 1; // Compteur 
for($i = 1; $i <= $rows; $i++){ //boucle pour les lignes
    for($j = 1; $j <= $cols; $j++){ // boucle pour les colonnes
        print '*';  // Impression du caractère
        $nbr++;   // Incrémentation du compteur 
    }
    print '<br>';  // IMPORTANT !!!
}
