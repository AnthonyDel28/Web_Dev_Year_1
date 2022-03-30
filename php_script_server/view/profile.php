<?php 
    if(isset($_SESSION['username'])){
        ?>
        <html>
        <div class="profile-box">
            <div class="profile-field">
                <?php
                    print "<p class='profile-title'>Your account: </p>";
                    $infos = $dbh->prepare("SELECT * FROM user WHERE username = '{$_SESSION[ "username" ]}'");
                    $infos->execute();
                    $profile_infos = $infos->fetchAll();
                    foreach($profile_infos as $profile_data){
                        global $id_user;
                        $id_user = $profile_data['id'];
                        $name_user = $profile_data['username'];
                        $email_user = $profile_data['email'];
                    }
                ?>
                <div class="profile-picture">
                    <?php
                        $infos = $dbh->prepare("SELECT pic FROM user WHERE username = '{$_SESSION[ "username" ]}'");
                        $infos->execute();
                        $profile_infos = $infos->fetchAll();
                        foreach($profile_infos as $data_infos){
                            global $picture_status;
                            $picture_status = $data_infos['pic'];
                        }

                        if($picture_status == TRUE){
                            print '<img src="./uploads/profile/'.$id_user.'.jpg">';
                        } elseif(is_null($picture_status)){
                            print '<img src="./uploads/profile/default.png">';
                        }
                    ?>
                </div>
                <div class="profile-infos-row">
                    <div class="profile-infos-cell">
                    <p class="profile-infos-label">Username</p>
                        <p class="profile-infos"><?php print $name_user;?></p>
                    </div>
                    <div class="profile-infos-cell">
                    <p class="profile-infos-label">E-mail <a href="index.php?view=form/f_change_email">(Change)</a></p>
                        <p class="profile-infos"><?php print $email_user;?></p>
                    </div>
                    <div class="profile-infos-cell">
                        <p class="profile-infos-label">Password <a href="index.php?view=form/f_change_password">(Change)</a></p>
                        <p class="profile-infos">******</p>
                    </div>
                </div>
                <div class="change-picture">
                    <p class="profile-infos-label">Change your profile picture</p>
                    <form action='index.php?view=action/image' method='POST' enctype='multipart/form-data'>
                        <input type='file' name='img_upload'><br>
                        <input type='submit' name='img_submit'>
                    </form>
                </div>
		
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