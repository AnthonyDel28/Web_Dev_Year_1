<?php

require_once __DIR__ . '/../lib/db.php';

if (empty($_GET['id']) || empty($_GET['token'])) {
    header('HTTP/1.1 400');
    die;
}

if ($_GET['token'] == 'test1234') {
    $dbh = connect();
    $user = $dbh->prepare("SELECT * FROM user WHERE idU = ?");
    $user->execute([$_GET['id']]);
    $data = $user->fetchObject();
    echo json_encode($data);
}