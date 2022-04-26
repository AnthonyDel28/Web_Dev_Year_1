<?php

require_once __DIR__ . '/../lib/form.php';
require_once __DIR__ . '/../lib/lib.php';

/**
 * @return string
 */

function getLaptopSearchForm() : string
{
    // Le contenu du formulaire est généré. Pour ce faire nous faisons appel aux fonctions génériques de la bibliothèque de fonctions (dossier lib)
    // De cette manière, il n'est plus nécessaire d'utiliser une fonction spécifique pour chaque donnée provenant de la DB
    $form = getSelect('Marque', 'brand', getOption("SELECT b.idB, b.nameB FROM laptop l JOIN brand b ON b.idB = l.brandL GROUP BY l.brandL ORDER BY nameB"))
        . getSelect('Couleur', 'color', getOption("SELECT idC, nameC FROM color ORDER BY nameC"))
        . getSelect('Processeur', 'cpu', getOption("SELECT idCpu, CONCAT (nameB, ' ', modelCpu) AS `model` FROM cpu c JOIN brand b ON b.idB = c.brandCpu ORDER BY `model`"))
        . getSelect('Mémoire', 'ram', getOption("SELECT ramL AS a, CONCAT(ramL, 'Gb') AS b FROM laptop GROUP BY ramL ORDER BY ramL"))
        . getSelect('Ecran', 'screen', getOption("SELECT screenL AS a, CONCAT(screenL, '\"') AS b FROM laptop GROUP BY screenL ORDER BY screenL"))
        . getSelect('Carte Graphique', 'vcard', getoption("SELECT idV, CONCAT (modelV,' ',nameB) AS `model` FROM vcard v JOIN brand b ON b.idB = v.brandV ORDER BY `model`"))
        . getSelect('Poids', 'weight', getRangeOption("SELECT MIN(weightL) AS min, MAX(weightL) as max FROM laptop ORDER BY weightL", 100, 'g'))
        . getRange("SELECT MIN(priceL) as min, MAX(priceL) as max FROM laptop ORDER BY priceL", 'price', 'Prix maximum', 100, '€')
    ;
    return getForm($form, 'index.php?view=action/a_laptopsearch', 'post');
}

// Todo : Créez une fonction permettant d'afficher un formulaire d'ajout de laptop dans la base de données
// Privilégiez l'utilisation des fonctions du projet
// Créez ensuite une vue (dossier view) et un script de validation de formulaire (dossier action)
// Lorsqu'un ajout de laptop sera validé en base de données, un message de confirmation devra être affiché à l'utilisateur. Dans le cas contraire, un message d'erreur devra lui afficher la raison de l'échec.


function getLaptopInsertForm($input_size, $input_and_price) :string
{
    $add = getInput('Marque', 'brand', 'text', 'form-control', 'style="width: 150px;" placeholder="Marque du PC"')
        . getInput('Couleur', 'color', 'text', 'form-control', 'style="width: 150px;" placeholder="Couleur du PC" ')
        . getInput('Processeur', 'cpu', 'text', 'form-control', 'style="width: 150px;" placeholder="Processeur"')
        . getInput('Mémoire', 'ram', 'number', 'form-control', 'style="width: 150px;" placeholder="RAM en GB" ')
        . getInput('Ecran', 'screen', 'number', 'form-control', 'style="width: 150px;" placeholder="Taille d\'écran" ')
        . getInput('Carte Graphique', 'vcard', 'text', 'form-control', 'style="width: 150px;" placeholder="Carte graphique"')
        . getInput('Poids', 'weight', 'number', 'form-control', 'style="width: 150px;" placeholder="Poids en Gr"')
        . getInput('Prix', 'price', 'number', 'form-control', 'style="width: 150px;" placeholder="Prix en €"')

    ;
    return getForm($add, 'index.php?view=action/a_laptopadd', 'post');
}
