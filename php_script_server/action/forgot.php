<?php
    session_start();
    if(isset($_POST['email'])){
        $to      = $_POST['email'];
        $subject = 'le sujet';
        $message = 'Voici votre mot de passe:'.$_SESSION['password'].'';
        $headers = 'From: guessthenumber@game.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
    header('Location: ../index.php?');
?>