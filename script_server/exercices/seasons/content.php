<?php

$exts = ['html', 'php'];

if (!empty($view)) {

    // manage path
    foreach ($exts as $ext) {
        $complete_path = $view . '.' . $ext;
        if (file_exists($complete_path)) {
            include_once $complete_path;
            die;
        }
    }
}
header('Location: index.php?view=form/f_date');