<?php 
    if(isset($_SESSION['username'])){
        ?>
        <html>
        <div class="profile-box">
            <div class="profile-field">
                <?php
                    print "<p class='profile-title'>Your account: <p class='profile-sub-title'>".$_SESSION['username']."</p></p>";
                    $infos = $dbh->prepare("SELECT * FROM user WHERE username = '{$_SESSION[ "username" ]}'");
                    $infos->execute();
                    $profile_infos = $infos->fetchAll();
                    foreach($profile_infos as $data_infos){
                        print $data_infos['id'];
                        print $data_infos['email'];
                    }
                ?>
            </div>
        </div>
        <?php
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