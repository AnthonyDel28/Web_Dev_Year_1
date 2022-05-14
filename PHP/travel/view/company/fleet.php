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

$connect = connect();
$select = $connect->prepare('SELECT * FROM company WHERE managerid = ?');
$select->execute([$_SESSION['userid']]);
$select->setFetchMode(PDO::FETCH_OBJ);




?>
<h2>Commande d'avion</h2>
<form action="index.php?page=app/company/fleet" method="POST">
    <label for="company">Compagnie</label>
    <select name="company" id="company" class="form-control" required>
        <?php
        foreach ($select as $row) {
            print '<option value='. $row->name . '>' . $row->name . '</option>';
        }
        ?>
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
            <?php
                $avions = $connect->prepare('SELECT * FROM airplane');
                $avions->execute();
                $avions->setFetchMode(PDO::FETCH_OBJ);
            ?>
            <tr>
                <?php
                    foreach($avions as $row){
                        print '<tr><td><input type="radio" name="plane" value=""></td>
                                <td>'. $row->name . '</td>
                                <td>'. $row->price . '€</td>
                                <td>'. $row->passengers . '</td>
                                <td>'. $row->range . '</td>
                                <td>'. $row->cruise . 'Km/h</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td></tr>';
                    }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
    <input type="submit" value="Commander">
</form>
