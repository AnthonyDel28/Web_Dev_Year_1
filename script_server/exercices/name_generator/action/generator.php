<section class="result">

<?php

if(isset($_POST['country']) && isset($_POST['quantity']) && isset($_POST['name_option'])) {
    // On déclare un nouveau tableau, qui nous servira pour la suite
    $tmp = array();
    // Tant que le nombre d'éléments de notre array n'est pas égal à la quantité demandée, la boucle s'exécute
    while(count($tmp) < $_POST['quantity']){
        if($_POST['name_option'] == 'Name' || $_POST['name_option'] == 'Surname'){
            if($_POST['name_option'] == 'Name'){
                // On insère un élément aléatoire du tableau $firstname dans notre tableau $tmp
                $tmp[] = $firstname[$_POST['country']][array_rand($firstname[$_POST['country']])];
                // A chaqua insertion dans notre tableau, on effectue un tri pour retirer les doublons
                $tmp = array_unique($tmp);
            } 
            elseif($_POST['name_option'] == 'Surname'){
                $tmp[] = $lastname[$_POST['country']][array_rand($lastname[$_POST['country']])];
                $tmp = array_unique($tmp);
            }
        } elseif($_POST['name_option'] == 'Name + Surname'){
            $first_name = $firstname[$_POST['country']][array_rand($firstname[$_POST['country']])];
            $last_name = $lastname[$_POST['country']][array_rand($lastname[$_POST['country']])];
            // On effectue la même opération qu'avant, mais on concatène les deux données pour le nom + prénom
            $tmp[] = $first_name .' '. $last_name;
            $tmp = array_unique($tmp);
        }
    }
    // Une fois toutes les données nécéssaires insérées dans notre tableau $tmp, on print
    foreach($tmp as $key => $value){
        print $value.'<br>';
    }
} else {    
    header('Location: ./index.php');
}

?>

</section>