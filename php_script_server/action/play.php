<?php

if (isset($_POST['num'])) {
    $rand = mt_rand(0, 100);
    if ($_POST['num'] == $rand) {
        echo 'Vous avez gagné! Le nombre était bien ' . $rand;
    } else {
        echo 'Désolé, le nombre était ' . $rand;
    }
    echo '<br><a href="index.php?view=view/play">Rejouer</a>';
} else {
    header('Location: index.php?view=view/play');
}