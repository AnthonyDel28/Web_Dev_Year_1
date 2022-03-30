<?php
if(!empty($_POST['email'])){
    $change_email = $dbh->prepare("UPDATE user SET email = '".$_POST['email']."' WHERE username = '{$_SESSION[ "username" ]}'");
    $change_email->execute();
    header('Location: index.php?view=view/profile');
} else {
    header('Location: index.php?view=view/error');
}

?>