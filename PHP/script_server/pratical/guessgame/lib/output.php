<?php
/**
 *  Librairie d'affichage
 */

// ce script contiendra les fonctions d'affichage [function]

/**
 * @param string $link
 * @param string $caption
 * @param string $class
 * @param string $target
 * @return string
 */
function signUpLink($link) :string
{
    return "<a href='$link'>Sign up here!</a>";
}

function replayLink($link) :string
{
    return "<a href='$link' class='replay'>Try again!</a>";
}

function forgotLink($link) :string 
{
    return "<a href='$link'>Click here!</a>";
}

function random_number() :string
{
        print "<p class='result-title'>Result</p>";
        if (isset($_POST['num'])) {
            $rand = mt_rand(1, 5);
            if ($_POST['num'] == $rand) {
                print '<img src="style/img/win.png">';
                return '<p class="result">Vous avez gagné! Le nombre était bien <p class="number">' . $rand . '</p></p>';
            } else {
                print '<img src="style/img/loose.png">';
                return '<p class="result">Désolé le nombre était: <p class="number">'. $rand . '</p></p>';
            }
        } else {
            header('Location: index.php?view=view/play');
        }
       
}