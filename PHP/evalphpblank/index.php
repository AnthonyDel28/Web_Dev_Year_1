<?php

session_start();


require_once __DIR__ . '/config.php';
require_once __DIR__ . '/lib/lib.php';
require_once __DIR__ . '/lib/db.php';

$connect = connect();
include_once __DIR__ . '/view/header.php';
include_once __DIR__ . '/view/menu.php';
include_once __DIR__ . '/view/default.php';
include_once __DIR__ . '/view/footer.php';