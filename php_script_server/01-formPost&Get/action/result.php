<?php
    $your_number = $_POST['number'];
    $random_number = mt_rand(1, 100);

    if($your_number == $random_number){
        print "Félicitations vous avez gagné !<br>";
        print "Votre numéro: ".$your_number."<br>Le numéro aléatoire: ".$random_number;
    }else {
        print "Vous avez perdu !<br>";
        print "Votre numéro: ".$your_number."<br>Le numéro aléatoire: ".$random_number."<br>";
    }
?>

<a href="../index.php?view=play">Rejouer</a>

