<?php

/**
 * Todo : Modifiez le formulaire de création de flotte ci-dessous, comprenant les champs suivants :
 * - nom
 * - compagnie, parmi la liste des compagnies dont l'utilisateur connecté est manager, triés par ordre alphabétique (table <company>)
 * - tableau contenant la liste des avions, triés par prix croissant. Le champ "plane" contiendra l'id de l'avion (table <airplane>)
 * - bouton de validation
 *
 * Ce formulaire ne sera accessible qu'aux utilisateurs ayant le rôle de 'manager' ou 'admin'
 * La méthode du formulaire sera de type : POST
 * Le traitement du formulaire se fera dans le fichier app/company/fleet.php
 *
 * Le coût d'un vol peut être obtenu via la fonction getFlightCost()
 */

checkRole('manager');
$connect = connect();
$companies = '';

$list = $connect->prepare("SELECT * FROM company WHERE managerid = ? ORDER BY name");
$list->execute([$_SESSION['userid']]);
$list->setFetchMode(PDO::FETCH_OBJ);
foreach ($list as $item) {
    $companies .= '<option value="' . $item->id . '">' . $item->name . '</option>';
}

$table = '';
$planes = $connect->query("SELECT * FROM airplane ORDER BY price", PDO::FETCH_OBJ);
foreach ($planes as $plane) {
    $table .= '<tr>';
    $table .= '<td><input type="radio" name="plane" value="' . $plane->id . '"></td>';
    $table .= '    <td>' . $plane->name . '</td>
                        <td>' . number_format($plane->price) . '€</td>
                        <td>' . $plane->passengers . '</td>
                        <td>' . $plane->range . 'km</td>
                        <td>' . $plane->cruise . 'km/h</td>
                        <td>' . $plane->takeoff . 'm</td>
                        <td>' . round((getFlightCost($plane, $plane->range, $plane->passengers) / $plane->passengers / $plane->range), 2) . '€</td>
                        <td>' . round((getFlightCost($plane, 100, 50) / 50 / 100), 2) . '€</td>
                        <td>' . round((getFlightCost($plane, 500, 50) / 50 / 500), 2) . '€</td>
                        <td>' . round((getFlightCost($plane, 1000, 100) / 100 / 1000), 2) . '€</td>
                        <td>' . round((getFlightCost($plane, 5000, 100) / 100 / 5000), 2) . '€</td>
                        <td>' . round((getFlightCost($plane, 10000, 250) / 250 / 10000), 2) . '€</td>
                    </tr>';
}

?>
<h2>Commande d'avion</h2>
<form action="index.php?page=app/company/fleet" method="POST">
    <label for="company">Compagnie</label>
    <select name="company" id="company" class="form-control" required>
        <?=$companies?>
    </select>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Choisir</th>
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
            <?=$table?>
            </tbody>
        </table>
    </div>
    <input type="submit" value="Commander">
</form>
