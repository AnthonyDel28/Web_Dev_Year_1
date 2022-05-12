<?php

/**
 * Todo : Créez une page affichant la liste des lignes aériennes possibles au départ et à destination des aéroports définis dans le formulaire view/client/travel
 *
 * Les aéroports devront être des destinations valides
 * La page devra respecter le tri en fonction du mode défini dans le formulaire ou l'url et également permettre de trier les résultats par prix du billet (mode eco), consommation de carburant (mode green) ou durée du voyage (mode speed)
 *
 * La consommation peut être obtenue via la fonction getConsByDistanceWithPassengers()
 * Le prix du billet peut être obtenu via la fonction getTicketPrice()
 * La durée du vol peut être obtenue via la fonction getFlightDuration()
 *
 * La colonne "réservation" contiendra un lien ou un formulaire créant une réservation pour l'utilisateur, dont le résultat sera géré dans le fichier app/client/reservation. Cette action nécessitera d'être connecté et d'avoir le rôle de client.
 *
 * La requête SQL permettant de récupérer la liste des lignes aériennes :
 */

$sql = "SELECT CONCAT(id, '-0') as flightid,id as plane,`name`,`range`,fuel,cruise,passengers,landing,takeoff,cons_by_seat,pilots,engines,0 as price FROM airplane 
        UNION
        SELECT a.id as flightid,p.id as plane,CONCAT(p.name, ' (', c.name,' ', ca.serial,')') as `name`,p.range,p.fuel,p.cruise,p.passengers,p.landing,p.takeoff,p.cons_by_seat,p.pilots,p.engines,a.price 
        FROM airline a, location ls, location ld, company_airplane ca, airplane p, company c 
        WHERE a.startid = ls.id AND a.destinationid = ld.id AND a.airplaneid = ca.id AND ca.airplaneid = p.id AND ca.companyid = c.id AND a.startid = ? AND a.destinationid = ?";

?>
<h2>Vol</h2>
De ... à ...
Distance ... km
Mode : ...
<table class="table">
    <thead>
    <tr>
        <th>Avion</th>
        <th>Prix</th>
        <th>Durée</th>
        <th>Escales</th>
        <th>Conso</th>
        <th>Réservation</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>