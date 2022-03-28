<?php

require_once __DIR__ . '/lib/session.php';
require_once __DIR__ . '/lib/output.php';

$view = '';
if (isset($_GET['view'])) {
    $view = $_GET['view'];
}

require_once __DIR__ . '/view/header.html';
require_once __DIR__ . '/view/box.php';
require_once __DIR__ . '/view/main.php';
require_once __DIR__ . '/view/footer.html';
