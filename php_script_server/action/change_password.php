<?php
if(!empty($_POST['password']) && !empty($_POST['new_password']) ){
    $new_password = $_POST['new_password'];
    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
    /*$change_password = $dbh->prepare("UPDATE user SET password = "password_hash($_POST['new_password'], PASSWORD_DEFAULT))" WHERE username = '{$_SESSION[ "username" ]}'");*/
    $change = $dbh->prepare("UPDATE user SET password = :new_password WHERE username = '{$_SESSION[ "username" ]}'");
    $change->execute([
        ':new_password' => $hash_password,
    ]);

    header('Location: index.php?view=view/profile');
} else {
    header('Location: index.php?view=view/error');
}

?>
