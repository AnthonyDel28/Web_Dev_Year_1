<?php

if (!empty($_POST['email'])) {
    if (strpos($_POST['email'], '@') !== false) {
        mail($_POST['email'], 'coucou', 'coucou');
    }
}
