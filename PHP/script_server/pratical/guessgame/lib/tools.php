<?php



function validDataType(array $data) :array {
    foreach ($data as $key => $value){
        if ($key == 'email') {
            $data['email'] = filter_var($value, FILTER_VALIDATE_EMAIL);
        } else if ($key == 'pwd') {
            continue;
        } else {
            $data[$key] = strip_tags($value);
        }
    }
    return $data;
}