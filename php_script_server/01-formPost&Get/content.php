<?php

$exts = ['html', 'php'];

if(!empty($view)){
    $path = __DIR__ . '/view/' . $view;
    foreach($exts as $ext){
        $complete_path = $path . '.' . $ext;
        if(file_exists($complete_path)){
            include_once $complete_path;
            die;
        }
    }
}

header('Location: index.php?view=main');