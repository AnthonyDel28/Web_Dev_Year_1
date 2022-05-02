<?php
require_once __DIR__ . '/../lib/lib.php';

// On vérifie que tous les éléments de notre formulaire ont bien été fournis
if (isset($_POST['brandL']) && isset($_POST['colorL']) && isset($_POST['cpuL']) && isset($_POST['ramL']) &&
    isset($_POST['screenL']) && isset($_POST['vcardL']) && isset($_POST['weightL']) && isset($_POST['priceL'])){
        $connect = connect();

        // On implode(); les différents tableaux générés par les champs de notre formulaire, pour convertir les données en string
        $listbrand = implode(", ", $_POST['brandL']);
        $listcolor = implode(", ", $_POST['colorL']);
        $listcpu = implode(", ", $_POST['cpuL']);
        $listram = implode(", ", $_POST['ramL']);
        $listscreen = implode(", ", $_POST['screenL']);
        $listvcard = implode(", ", $_POST['vcardL']);
        $listweight_get_int = implode(", ", $_POST['weightL']);
        // On utilise substr(); pour extraire le poids minimum et le poids maximum
        $listweight = substr($listweight_get_int, 0, 4) . ', ' . substr($listweight_get_int, -4);
        $listprice = implode(",", $_POST['priceL']);

        $result = $connect->prepare('SELECT brand.nameB as `Marque`,
                   laptop.brandL as `idB`, 
                   color.nameC as `Couleur`,
                   cpu.modelCpu as `Processeur`,
                   laptop.ramL as `Ram`,
                   laptop.screenL as `Ecran`,
                   vcard.modelV as `Vcard`,
                   laptop.weightL as `Poids`,
                   laptop.priceL as `Prix`,
                   laptop.vatL as `TVA`
            FROM laptop
                     JOIN brand ON laptop.brandL = brand.idB
                     JOIN vcard ON laptop.vcardL = vcard.idV
                     JOIN color ON laptop.colorL = color.idC
                     JOIN cpu ON laptop.cpuL = cpu.idCpu
            WHERE laptop.brandL IN (' . $listbrand . ') AND laptop.colorL IN (' . $listcolor . ') AND laptop.cpuL IN (' . $listcpu . ') AND laptop.ramL IN (' . $listram . ')
            AND laptop.screenL IN (' . $listscreen . ') AND laptop.vcardL IN (' . $listvcard . ')  
            AND laptop.weightL BETWEEN ' . weightCheck($_POST['weightL']) . '  AND ' . substr($listweight, -4) . ' AND laptop.priceL <  ' . $listprice . '
            ORDER BY laptop.priceL');

        $result->execute();
        $result->setFetchMode(PDO::FETCH_OBJ);
        foreach ($result as $row) {
            $tbody .= '<tr><td><img src="./img/' . $row->idB . '_min.png" alt="' . $row->Marque . '"></td>
                                <td>' . ucfirst($row->Marque) . '</td>
                                <td>' . ucfirst($row->Processeur) . '</td>
                                <td>' . ucfirst($row->Vcard) . '</td>
                                <td>' . $row->Ram . 'Gb</td>
                                <td>' . $row->Ecran . '"</td>
                                <td>' . round(($row->Poids / 1000), 1) . 'kg</td>
                                <td>' . $row->Couleur . '</td>
                                <td>' . round($row->Prix * ('1.' . $row->TVA), 2) . '&euro;</td>
                           </tr>';
        }
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
                  crossorigin="anonymous">
            <link rel="stylesheet" href="css/style.css">
            <title>PDO</title>
        </head>
        <body>
        <table class="table table-striped" style="max-width:400px; background-color:lightgrey;">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Marque</th>
                <th>Processeur</th>
                <th>Carte Graphique</th>
                <th>Mémoire</th>
                <th>Ecran</th>
                <th>Poids</th>
                <th>Couleur</th>
                <th>Prix TVAC</th>
            </tr>
            </thead>
            <tbody>
            <?= $tbody ?>
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        </body>
        </html>
    <?php
} else {
    print "Veuillez remplir tous les champs!";
}