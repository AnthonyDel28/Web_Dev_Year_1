<?php

if(!empty($view)){
    $path = __DIR__ . '/view/' . $view .'.html';
    if(file_exists($path)){
        include_once $path;
        die;
    }
}

header('Location: index.php?view=main');