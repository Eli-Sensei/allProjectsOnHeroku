<?php 

function TrimedDataPost($formdata){
    $trimedData = [];
    foreach ($formdata as $key => $value) {
        if(empty(trim($value))){
            return false;
        }
        $trimedData[$key] = $value;
    }
    return $trimedData;
}


function isSamePassword($pass1, $pass2){
    if($pass1 === $pass2){
        return true;
    }
    return false;
}