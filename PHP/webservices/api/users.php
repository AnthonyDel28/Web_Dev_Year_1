<?php

require_once __DIR__ . '/../lib/db.php';

if (empty($_GET['token'])) {
    header('HTTP/1.1 400');
    die;
}

if ($_GET['token'] == 'test1234') {
    $users = [];
    $dbh = connect();
    $request = $dbh->query("SELECT * FROM user", PDO::FETCH_OBJ);
    foreach ($request as $user) {
        $users[] = $user;
    }
    echo json_encode($users);
}
