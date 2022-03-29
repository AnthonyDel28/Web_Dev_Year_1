<?php

if(isset($_SESSION['username'])){
    require_once __DIR__ . '/../form/f_play.php';
} else {
    ?>
        <html>
        <div class="profile-box">
            <div class="profile-field">
            <p class='profile-title'>You need to be connected ! </p>
            <button>
                <a href="index.php?view=form/f_login" class="connect-button">Connect</a>
            </button>
            </div>
        </div>
<?php
}
?>

