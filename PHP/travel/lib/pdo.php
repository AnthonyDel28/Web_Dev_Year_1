<?php

/**
 * Todo : Créez ici une fonction de connexion à la base de données (utilisez PDO)
 * Cette fonction devra être utilisée partout dans l'app lorsqu'une connexion à la DB sera nécessaire
 */

/**
 * @return PDO|void
 */
function connect()
{
    global $connect;

    if (is_a($connect, 'PDO')) {
        return $connect;
    } else {
        try {
            $connect = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME , DB_USER,DB_PASSWORD);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die ('Erreur: ' . $exception->getMessage());
        }
        return $connect;
    }
}