<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez ici une fonction de connexion à la base de données (utilisez PDO)
 * Cette fonction devra être utilisée partout dans l'app lorsqu'une connexion à la DB sera nécessaire
 *
 * Estimation : max 5min
 *
 * === BONUS (degré de maîtrise) ===
 *
 * Les paramètres de connexion seront inclus dans un fichier de configuration qui sera ignoré de git
 */

/**
 * CORRECTION
 * 5/5
 *
 * C'est top, avec le bonus !
 *
 */


/**
 * @return bool|PDO|void
 */

function connect()
{
    global $connect;

    if (!$connect) {
        try {
            $connect = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASSWORD);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die ('Erreur: ' . $exception->getMessage());
        }
    }
    return $connect;
}

