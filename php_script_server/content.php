<?php

if(!empty($view)){
    $path = __DIR__ . '/view/' . $view .'.html';
    if(file_exists($path)){
        include_once $path;
    } else {
        header('Location: index.php');
        die;
    }
}