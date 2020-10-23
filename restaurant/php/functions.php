<?php 

function trimDatasPost(array $post, $keepIndexes = true)
{
    $data = [];
    foreach ($post as $k => $v):
        $trimedValue = trim($v);
        if (empty($trimedValue)) {
            return false;
        }
        
        $keepIndexes ? $data[$k] = htmlentities($trimedValue, ENT_QUOTES) : $data[] = htmlentities($trimedValue, ENT_QUOTES);
    endforeach;
    return $data;
}