<?php
// Todo : Modifiez ce script afin qu'il permette d'afficher le résultat de la recherche
// Privilégiez l'utilisation des fonctions du projet
// Inspirez vous de https://gitlab.com/jf-exercices/pdo/-/blob/master/index.php pour la requête et l'affichage du tableau de résultat

// [le théorie des 2e et 3e n'a pas encore été vue, mais vous pouvez essayer si vous avez déjà réalisé la 1e partie]
// 2e partie : ajoutez un bouton permettant de télécharger le résultat de la recherche au format json
// 3e partie : ajoutez un bouton permettant d'exporter le résultat de la recherche dans un fichier au format csv. Le fichier pourra être téléchargé, mais il sera également créé dans le dossier 'reports' du projet


// Initialisation de la connexion à la BDD
$connect = connect();

foreach($_POST as $array => $sub){
    foreach($sub as $key => $value){
        $data[] = $value;
    }
}
$weight1 = substr($data[6], 0, 4);
$weight2 = substr($data[6], 5);
unset($data[6]);
$data[] = $weight1;
$data[] = $weight2;
$data_string = implode(", ", $data);
$sql = "SELECT brand.nameB as `Marque`,
       color.nameC as `Couleur`,
       cpu.modelCpu as `Processeur`,
       laptop.ramL as `Ram`,
       laptop.screenL as `Taille d'écran`,
       vcard.modelV as `Carte graphique`,
       laptop.weightL as `Poids`,
       laptop.priceL as `Prix`
FROM laptop
         JOIN brand ON laptop.brandL = brand.idB
         JOIN vcard ON laptop.vcardL = vcard.idV
         JOIN color ON laptop.colorL = color.idC
         JOIN cpu ON laptop.cpuL = cpu.idCpu
WHERE laptop.brandL = ? AND laptop.colorL = ? AND laptop.cpuL = ? AND laptop.ramL = ? AND laptop.screenL = ? AND laptop.vcardL = ? AND laptop.priceL < ? AND laptop.weightL BETWEEN ?  AND ?";


$stmt = $connect->prepare($sql);
$stmt->execute([$data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[7], $data[8], $data[9]]);
$stmt->setFetchMode(PDO::FETCH_OBJ);

foreach ($stmt as $row) {
    var_dump($row);
}

