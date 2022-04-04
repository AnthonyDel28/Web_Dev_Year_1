<?php

require_once __DIR__ . '/lib/session.php';
require_once __DIR__ . '/lib/tools.php';
require __DIR__ . '/view/home.php';



$view = '';
if (isset($_GET['view'])) {
    $view = $_GET['view'];
}

require_once __DIR__ . '/content.php';
