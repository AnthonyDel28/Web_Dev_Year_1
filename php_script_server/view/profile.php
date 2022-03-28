<?php 
    if(isset($_SESSION['username'])){
        ?>
        <html>
        <div class="profile-box">
            <div class="profile-field">
                <?php
                    print "<p class='profile-title'>Your account: <p class='profile-sub-title'>".$_SESSION['username']."</p></p>";
                ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <html>
        <div class="profile-box">
            <div class="profile-field">
                <?php
                    print "<p class='profile-title'>You need to be connected ! </p>";
                ?>
            </div>
        </div>
        <?php
    }

?>