<?php
/**
 * Fonction de connexion à la DB
 */

define('DB_FETCH_ALL', 1);
define('DB_FETCH_COUNT', 2);
define('DB_FETCH_IMPLODE', 3);
define('DB_FETCH_INDEX', 4);
define('DB_FETCH_MULTI', 5);
define('DB_FETCH_OBJECT', 6);
define('DB_FETCH_RESULT', 7);
define('DB_FETCH_UPDATE', 8);

define('DB_MODE_EXECUTE', 1);
define('DB_MODE_PARAM', 2);
define('DB_MODE_VALUE', 3);

/**
 * @return PDO|void
 */
function connect() {
    // variable globale. Si le script appelant la fonction connect() possède une variable nommée $dbh, alors son contenu sera récupéré ici
    global $dbh;

    // Il est inutile de créer une nouvelle connexion à la DB si elle existe déjà
    if (!$dbh) {
        // try / catch : gestion d'erreur. Si le code dans la partie "try" échoue, alors la partie "catch" s'exécute.
        try {
            require_once __DIR__ . '/../config.php';
            // La connexion PDO utilise les constantes présentes dans le script config.php
            $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASSWORD);
            $dbh->setAttribute(3, 2);
        } catch (PDOException $exception) {
            die ('Erreur: ' . $exception->getMessage());
        }
    }
    return $dbh;
}

/**
 * @param string $table
 * @param string $field
 * @param string $value
 * @param int $fetch    CONST DB_FETCH_XXX
 * @param int $mode     CONST DB_MODE_XXX
 * @return array|mixed|string
 */
function getSQL(string $table, string $field, string $value, int $fetch = DB_FETCH_RESULT, int $mode = DB_MODE_EXECUTE) {

    global $dbh;

    switch ($mode) {
        case DB_MODE_EXECUTE :
            $result = $dbh->prepare("SELECT * FROM $table WHERE $field = ?");
            $result->execute([$value]);
            break;
        case DB_MODE_PARAM :
            $result = $dbh->prepare("SELECT * FROM $table WHERE $field = :param");
            $result->bindParam('param', $value);
            $result->execute();
            break;
        case DB_MODE_VALUE :
            $result = $dbh->prepare("SELECT * FROM $table WHERE $field = ?");
            $result->bindValue($field, $value);
            $result->execute();
            break;
    }
    return fetchSQL($result, $fetch);
}

/**
 * @param PDOStatement $result
 * @param int $fetch
 * @return array|false|int|mixed|object|PDOStatement|string
 */
function fetchSQL(PDOStatement $result, int $fetch = DB_FETCH_RESULT) {

    if ($fetch == DB_FETCH_OBJECT) {
        $data = $result->fetchObject();
    } elseif ($fetch == DB_FETCH_UPDATE) {
        $data = $result->rowCount();
    } elseif ($fetch == DB_FETCH_COUNT) {
        $data = $result->fetchColumn();
    } elseif ($fetch == DB_FETCH_ALL) {
        $data = $result->fetchAll();
    } elseif ($fetch == DB_FETCH_MULTI) {
        $data = [];
        while ($data_tmp = $result->fetchObject()) {
            $data[] = $data_tmp;
        }
    } elseif ($fetch == DB_FETCH_INDEX) {
        $data = [];
        while ($data_tmp = $result->fetchObject()) {
            $data[$data_tmp->ID] = $data_tmp;
        }
    } elseif ($fetch == DB_FETCH_IMPLODE) {
        $data_implode = [];
        while ($data_tmp = $result->fetchObject()) {
            $data_implode[] = $data_tmp->ID;
        }
        $data = implode(',', $data_implode);
    } else {
        $data = $result;
    }
    return $data;
}
