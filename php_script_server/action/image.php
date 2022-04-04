<?php
if(isset($_POST['img_submit'])){
	
	$img_name = $_FILES['img_upload']['name'];
	$tmp_img_name = $_FILES['img_upload']['tmp_name'];
    
    $infos = $dbh->prepare("SELECT id FROM user WHERE username = '{$_SESSION[ "username" ]}'");
    $infos->execute();
    $profile_infos = $infos->fetchAll();
    foreach($profile_infos as $data_infos){
        $user_id;
        $user_id = $data_infos['id'];
        $_SESSION['id'] = $data_infos['id'];
    }
    $folder_name = "uploads/profile/";
    $status = $dbh->prepare("UPDATE user SET pic = TRUE WHERE username = '{$_SESSION[ "username" ]}'");
    $status->execute();
    
	move_uploaded_file($tmp_img_name,$folder_name.$user_id.".jpg");
}else {
    header('Location: index.php?view=view/error');
}
header('Location: index.php?view=view/profile');

