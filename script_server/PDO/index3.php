<?php

require_once __DIR__ . '/lib/database.php';

/**
 * Script affichant la liste des laptops dans un tableau
 */

// on initialiser la variable qui contiendra le body du tableau
$tbody = '';

// on initialise la connexion à la DB
$connect = connect();

// requête SQL
$sql = 'SELECT DISTINCT *,
                b.nameB as marque, 
                CONCAT(bcpu.nameB," ",modelCpu) as namecpu, 
                bvcard.nameB as brandvcard
        FROM laptop as l, brand as b, brand as bcpu, brand as bvcard, cpu as c, vcard as v, color as col 
        WHERE b.idB=l.brandL AND c.idCpu=l.cpuL AND v.idV=l.vcardL AND bcpu.idB=c.brandCpu AND bvcard.idB=v.brandV AND col.idC=l.colorL
';

// Récupération de la ressource ($result) via la méthode PDO Query (vu qu'il n'y a pas de paramètre dans la requête)
$result = $connect->query($sql);
// Par défaut PDO utilise FetchAll (structure de tableau associatif et indexé). Nous ne spécifions donc pas de fetch ici car nous allons utiliser une structure de tableau.
foreach ($result as $data) {
    // Une ligne est ajoutée dans le tableau avec les données (tableau $data) provenant de la requête (ressource $result)
    $tbody .= '<tr><td><img src="img/' . $data['brandL'] . '_min.png" alt="'.$data['brandL'].'"></td>
                    <td>' . ucfirst($data['marque']) . '</td>
                    <td>' . ucfirst($data['namecpu']) . '</td>
                    <td>' . ucfirst($data['brandvcard']) . ' ' . $data['modelV'] . '</td>
                    <td>' . $data['ramL'] . 'Gb</td>
                    <td class="right">' . $data['screenL'] . '"</td>
                    <td>' . round(($data['weightL'] / 1000), 1) . 'kg</td>
                    <td>' . $data['nameC'] . '</td>
                    <td>' . round($data['priceL'] * ('1.' . $data['vatL']), 2) . '&euro;</td>
               </tr>';
}

/**
 * Output
 *
 * HTML dans lequel on insert la variable contenant le body du tableau : $tbody
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PDO</title>
</head>
<body>
<table class="table table-striped" style="max-width:400px; background-color:lightgrey;">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th><form action="?" method="post"><input type="hidden" name="tri" value="marque"><input type="submit" value="Marque"></form></th>
                    <th><form action="?" method="post"><input type="hidden" name="tri" value="namecpu"><input type="submit" value="Processeur"></form></th>
                    <th><form action="?" method="post"><input type="hidden" name="tri" value="brandvcard"><input type="submit" value="Carte Graphique"></form></th>
                    <th><form action="?" method="post"><input type="hidden" name="tri" value="ramL"><input type="submit" value="Mémoire"></form></th>
                    <th><form action="?" method="post"><input type="hidden" name="tri" value="screenL"><input type="submit" value="Ecran"></form></th>
                    <th><form action="?" method="post"><input type="hidden" name="tri" value="weightL"><input type="submit" value="Poids"></form></th>
                    <th><form action="?" method="post"><input type="hidden" name="tri" value="colorL"><input type="submit" value="Couleur"></form></th>
                    <th><form action="?" method="post"><input type="hidden" name="tri" value="priceL"><input type="submit" value="Prix TVAC"></form></th>
                </tr>
            </thead>
        <tbody>
            <?=$tbody?>
        </tbody>
      </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
</html>