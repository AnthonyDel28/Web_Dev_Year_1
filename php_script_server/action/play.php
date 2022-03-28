
<div class="result-box">
    <div class="result">
    <?php
        print "<p class='result-title'>Result</p>";
        if (isset($_POST['num'])) {
            $rand = mt_rand(1, 5);
            if ($_POST['num'] == $rand) {
                print '<img src="style/img/win.png">';
                print '<p class="result">Vous avez gagné! Le nombre était bien <p class="number">' . $rand . '</p></p>';
            } else {
                print '<img src="style/img/loose.png">';
                print '<p class="result">Désolé le nombre était: <p class="number">'. $rand . '</p></p>';
            }
        } else {
            header('Location: index.php?view=view/play');
        } ?>
        <a class ="replay "href="index.php?view=view/play">Rejouer</a>
    </div>
</div>