<?php

/**
 * @param string $page
 * @return void
 */
function getContent(string $page) : void
{
    $exts = ['php'];
    if (!empty($page)) {
        foreach ($exts as $ext) {
            $complete_path = $page . '.' . $ext;
            if (file_exists($complete_path)) {
                include_once $complete_path;
                die;
            }
        }
    }
    header('Location: index.php?source=view/default');
    die;
}

function checkAccess() :void {
    if(empty($_SESSION['userid'])){
        $_SESSION['alert'] = 'Vous devez être connecté pour accéder à ce contenu!';
        $_SESSION['alert_level'] = 'danger';
        header('Location: index.php?source=view/login');
        die;
    }
}

/**
 * @return void
 */
function getCountry () :void {
    global $connect;

    if(!isset($connect)){
        $connect = connect();
    }

    $select = $connect->prepare('SELECT * FROM country ORDER BY name');
    $select->execute();
    $select->setFetchMode(PDO::FETCH_OBJ);
    foreach($select as $row){
        if($row->name != defaultCountry()){
            print '<option value="' . $row->id .'">' . $row->name .'</option>';
        }
    }
}


function getBrands() :void {
    global $connect;

    if(!isset($connect)){
        $connect = connect();
    }

    $select = $connect->prepare('SELECT * FROM brand ORDER BY name');
    $select->execute();
    $select->setFetchMode(PDO::FETCH_OBJ);
    foreach($select as $row){
        print '<option value="' . $row->id .'">' . $row->name .'</option>';
    }
}

/**
 * @param $id
 * @return void
 */
function getPhoto ($id) :void {
    $extension = '';
    if(glob('images/photo/' . $id .'.png')){
        $extension = 'png';
    } else if (glob('images/photo/' . $id .'.jpg')){
        $extension = 'jpg';
    }
    if(file_exists('images/photo/' . $id . '.' . $extension)){
        print '<img src="images/photo/' . $id . '.' . $extension.'" width="150px" style="border-radius:50%;" alt="">';
    }
}

/**
 * @return string
 */
function defaultCountry () :string {
    global $connect;

    $select = $connect->prepare('SELECT * FROM country JOIN user ON country.id = user.country WHERE user.id = ?');
    $select->execute([$_SESSION['userid']]);
    $res = $select->fetchObject();
    if($res->name != NULL){
        return $res->name;
    } else {
        return ' ';
    }
}

/**
 * @param $username
 * @return bool
 */
function uniqueLogin ($username) :bool {

    global $connect;

    $request = $connect->prepare('SELECT * FROM user WHERE login = ?');
    $request->execute([$username]);
    if($request->rowCount()){
        $_SESSION['alert'] = 'Cet username existe déjà, veuillez en choisir un autre!';
        $_SESSION['alert_level'] = 'danger';
        header('Location: index.php?source=view/signup');
        die;
    } else {
        return TRUE;
    }
}

/**
 * @param $country
 * @return bool
 */
function validCountry ($country) :bool {

    global $connect;

    $request = $connect->prepare('SELECT * FROM country WHERE id = ?');
    $request->execute([$country]);
    if($request->rowCount()){
        return TRUE;
    } else {
        $_SESSION['alert'] = 'Ce pays n\'est pas valide, veuillez réessayer!';
        $_SESSION['alert_level'] = 'danger';
        header('Location: index.php?source=view/signup');
        die;
    }
}