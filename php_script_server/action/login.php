<?php
    session_start();

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_GET['password'];
    header('Location: ../index.php?view=view/profile');

?>