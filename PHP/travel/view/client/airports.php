<?php

/**
 * Todo : Créez une page affichant la liste des aéroports dans le tableau HTML ci-dessous
 *
 * cette page ne sera accessible qu'aux utilisateurs connectés
 *
 * Requête SQL permettant de récupérer la liste des aéroports (avec leur piste la plus longue) :
    "SELECT l.name, c.name as country, (SELECT MAX(r.length) as length FROM location_runway lr, runway r WHERE lr.runwayid = r.id AND lr.locationid = l.id) as runway, l.longitude, l.latitude
    FROM location l, country c WHERE l.countryid = c.id ORDER BY name"
 */
?>

<h2>Aéroports</h2>
<table class="table">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Pays</th>
        <th>Piste</th>
        <th>Longitude</th>
        <th>Latitude</th>
    </tr>
    <?php
        foreach(getAirports() as $row){
            print '<tr><td> ' .  $row->name . ' </td>';
            print '<td>' . $row->country . '</td>';
            print '<td>' . $row->runway . '</td>';
            print '<td>' . $row->longitude . '</td>';
            print '<td>' . $row->latitude . '</td></tr>';
        }
    ?>
    </thead>
    <tbody></tbody>
</table>
