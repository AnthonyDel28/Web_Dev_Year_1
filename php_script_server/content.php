<?php

$exts = ['html', 'php'];

if (!empty($view)) {

    // manage path
    foreach ($exts as $ext) {
        $complete_path = $view . '.' . $ext;
        if (file_exists($complete_path)) {

            // manage special cases (future function)
            if ($view == 'view/play') {
                $options = '';
                for ($i = 0; $i <= 100; $i++) {
                    $options .= '<option value="' . $i . '">' . $i . '</option>';
                }
            }

            include_once $complete_path;
            die;
        }
    }
}
header('Location: index.php?view=view/main');