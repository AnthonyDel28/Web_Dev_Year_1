<?php

/**
 * Todo : Cette page affichera le profil de la Compagnie dont l'utilisateur connecté est le manager
 *
 * Requête SQL pour obtenir la flotte : "SELECT a.*, ca.serial FROM airplane a, company_airplane ca WHERE ca.airplaneid = a.id AND ca.companyid = ? ORDER BY a.name"
 * Requête SQL pour obtenir les lignes aériennes : "SELECT ls.name as start, ld.name as destination, p.name as plane, ca.serial, p.passengers, a.price FROM airline a, location ls, location ld, company_airplane ca, airplane p WHERE a.startid = ls.id AND a.destinationid = ld.id AND a.airplaneid = ca.id AND ca.airplaneid = p.id AND ca.companyid = ?"
 *
 * Le coût d'un vol peut être obtenu via la fonction getFlightCost()
 *
 */

checkCompanyManager($_SESSION['userid'], $_POST['company']);

global $connect;

$infos = $connect->prepare('SELECT c.*, u.*, p.name as country FROM company c JOIN user u ON u.id = c.managerid JOIN country p ON p.id = c.countryid  WHERE c.id = ? and c.managerid = ?');
$infos->execute([$_POST['company'], $_SESSION['userid']]);
$res = $infos->fetchObject();
getLogo($_POST['company']);
print '<h2>' . $res->name .'</h2>
            <table class="table" style="max-width:600px;">
                <tr>
                    <th>Pays</th>
                    <td>' . $res->country . '</td>
                    
                </tr>
                <tr>
                    <th>Manager</th>
                    <td> ' . $res->username . '</td>
                </tr>
                <tr>
                    <th>Banque</th>
                    <td>' . number_format($res->cash, 2, '.', ',') .'€</td>
                </tr>
                </table>';

$fleet = $connect->prepare('SELECT a.*, ca.serial FROM airplane a, company_airplane ca WHERE ca.airplaneid = a.id AND ca.companyid = ? ORDER BY a.name');
$fleet->execute([$_POST['company']]);
$fleet->setFetchMode(PDO::FETCH_OBJ);

$airways = $connect->prepare('SELECT ls.name as start, ld.name as destination, p.name as plane, ca.serial, p.passengers, a.price FROM airline a, location ls, location ld, company_airplane ca, airplane p WHERE a.startid = ls.id AND a.destinationid = ld.id AND a.airplaneid = ca.id AND ca.airplaneid = p.id AND ca.companyid = ?');
$airways->execute([$_POST['company']]);
$airways->setFetchMode(PDO::FETCH_OBJ);
?>
<h3>Flotte</h3>
<a href="index.php?page=view/company/fleet">Commander un avion</a>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Avion</th>
            <th>Coût</th>
            <th>Passagers</th>
            <th>Rayon d\'action</th>
            <th>Vitesse</th>
            <th>Piste</th>
            <th>Coût km/passager<br>max dist & charge</th>
            <th>Coût km/passager<br>(40p/100km)</th>
            <th>Coût km/passager<br>(50p/500km)</th>
            <th>Coût km/passager<br>(100p/1000km)</th>
            <th>Coût km/passager<br>(100p/5000km)</th>
            <th>Coût km/passager<br>(250p/10000km)</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($fleet as $row){
            print '<tr><td> ' . $row->serial . '</td>
                    <td> ' . $row->name . '</td>
                    <td> ' . number_format($row->price, 2, '.', ',') . '€</td>
                    <td> ' . $row->passengers . '</td>
                    <td> ' . $row->range . ' km</td>
                    <td> ' . $row->cruise . ' km/h</td>
                    <td> ' . $row->takeoff . ' m</td>
                    <td> ' . round((getFlightCost($row, $row->range, $row->passengers) / $row->passengers / $row->range), 2) . '€</td>
                    <td>' . round((getFlightCost($row, 100, 50) / 50 / 100), 2) . '€</td>
                    <td>' . round((getFlightCost($row, 500, 50) / 50 / 500), 2) . '€</td>
                    <td>' . round((getFlightCost($row, 1000, 100) / 100 / 1000), 2) . '€</td>
                    <td>' . round((getFlightCost($row, 5000, 100) / 100 / 5000), 2) . '€</td>
                    <td>' . round((getFlightCost($row, 10000, 250) / 250 / 10000), 2) . '€</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
<h3>Lignes aériennes</h3>
<table class="table">
    <thead>
    <tr>
        <th>Départ</th>
        <th>Destination</th>
        <th>Avion</th>
        <th>Serial</th>
        <th>Passagers</th>
        <th>Prix</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($airways as $row){
        print '<tr><td> ' . $row->start . '</td>
                    <td> ' . $row->destination . '</td>
                    <td> ' . $row->plane . '</td>
                    <td> ' . $row->serial . '</td>
                    <td> ' . $row->passengers . '</td>
                    <td> ' . $row->price . ' €</td></tr>';
    }
    ?>
    </tbody>
</table>
<a href="index.php?page=view/company/simulation">Définir une ligne aérienne</a>
