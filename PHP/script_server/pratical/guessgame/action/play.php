<html>
<div class="result-box">
    <div class="result-title">Result</div>
    <?php
    if (isset($_POST['num'])) {
        $rand = mt_rand(1, 5);
        if ($_POST['num'] == $rand) {
            print '<img src="./style/img/win.png" alt="">';
            print "<p class='result-text'>Vous avez gagné! Le nombre était bien <p class='number'>$rand</p></p>";
        } else {
            print '<img src="./style/img/loose.png" alt="">';
            print "<p class='result-text'>Désolé, le nombre était <p class='number'>$rand</p></p>";
        }
        print replayLink("index.php?view=view/play", 'Rejouer', 'd-block');
    } else {
        header('Location: index.php?view=view/play');
    }

    ?>

</div>




