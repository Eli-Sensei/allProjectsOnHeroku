<?php
/*
 * what happen if the form contains hundred of inputs and you need to check ALL empty values?!
create a function that takes the $_POST of the form in output
that will trim all external spaces of the input values
and will return the array with the trim values
or FALSE if there were empty values
 */
function trimDatasPost(array $post)
{
    $data = [];
    foreach ($post as $k => $v):
        $trimedValue = trim($v);
        if (empty($trimedValue)) {
            return false;
        }
        $data[$k] = htmlentities($trimedValue, ENT_QUOTES);
    endforeach;
    return $data;
}