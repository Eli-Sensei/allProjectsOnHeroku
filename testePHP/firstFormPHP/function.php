<?php

function TrimedDataPost($post){
    $data = [];
    foreach($post as $k => $v){
        $trimedValue = trim($v);
        $data[$k] = $trimedValue;
        if(empty($trimedValue)){return false;}
    }
    return $data;
}