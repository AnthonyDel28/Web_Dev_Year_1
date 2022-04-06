<?php

require_once __DIR__ . '/lib/session.php';
require_once __DIR__ . '/lib/tools.php';

$view = '';
if (isset($_GET['view'])) {
    $view = $_GET['view'];
}

require_once __DIR__ . '/view/header.html';
require_once __DIR__ . '/view/main.php';

