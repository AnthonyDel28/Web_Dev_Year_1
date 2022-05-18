<?php
/**
 * Todo : Créez un script de traitement du formulaire de création de flotte (view/company/fleet.php)
 *
 * Les champs du formulaire doivent correspondre aux types de données requises en base de données (table <company_airplane>).
 * Cette page ne sera accessible qu'aux managers. Un manager ne pourra ajouter un avion qu'à une compagnie dont il est manager
 * Le numéro de série de l'avion (<serial>) sera obtenu via la fonction createAirplaneSerial()
 * Si la création échoue, affichez un message d'erreur approprié
 */

checkRole('manager');
checkCompanyManager($_SESSION['userid'], $_POST['company']);

global $connect;

$checkPlane = $connect->prepare('SELECT * FROM airplane WHERE id = ?');
$checkPlane->execute([$_POST['plane']]);
if(!$checkPlane->rowCount()) {
    $_SESSION['alert'] = 'Les données d\'avion ne correspondent pas!';
    $_SESSION['alert_level'] = 'danger';
    header ('Location: index.php?page=view/main');
    die;
}

if(checkCash($_POST['company'], $_POST['plane']) == TRUE) {
    $companyCash = $connect->prepare('SELECT * FROM company WHERE id = ?');
    $companyCash->execute([$_POST['company']]);
    $company = $companyCash->fetchObject();

    $planePrice = $connect->prepare('SELECT * FROM airplane WHERE id = ?');
    $planePrice->execute([$_POST['plane']]);
    $plane = $planePrice->fetchObject();

    $update = $connect->prepare('UPDATE company SET cash = ? - ? WHERE id = ?');
    $update->execute([$company->cash, $plane->price, $_POST['company']]);
    if(!$update->rowCount()){
        print "Vous ne disposez pas du cash nécéssaire !";
    }
    $fleet = $connect->prepare('INSERT INTO company_airplane (companyid, airplaneid, serial, created) VALUES (?, ?, ?, NOW())');
    $fleet->execute([$_POST['company'], $_POST['plane'], createAirplaneSerial($_POST['company'], $_POST['plane'])]);
    if($fleet->rowCount()){
        print "L'avion a été commandé avec succès!";
    } else {
        print "Une erreur est survenue lors de la commande!";
    }
}




