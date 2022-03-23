<?php
// si tous les champs de formulaire sont remplis écrivez les données vont être ajoutées dans la DB sinon remplissez tous les champs

if(empty($_POST['name']) || empty($_POST['job']) || empty($_POST['birth'])){
    print "Veuillez remplir tous les champs !";
} else {
    print "Les données seront enregistrées dans la base de données!";
}

