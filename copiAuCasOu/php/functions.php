<?php

function TrimedDataPost($formdata){
    $trimedData = [];
    foreach ($formdata as $key => $value) {
        if(empty(trim($value))){
            return false;
        }
        $trimedData[$key] = trim($value);
    }
    return $trimedData;
}