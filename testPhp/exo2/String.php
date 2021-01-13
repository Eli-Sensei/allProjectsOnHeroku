<?php

class Str{

    // les méthodes
    public function length($string)
    {
        return strlen($string);
    }

    public function charAt($string, $index)
    {
        return substr($string, $index);
    }

    public function indexOf($string, $needle){
        return strrpos($string, $needle);
    }

    public function substring($string, $start, $length)
    {
        return substr($string, $start, $length);
    }

    public function split($delimeter, $string, $limit = -1)
    {
        return explode($delimeter, $string, $limit);
    }

    public function toLowerCase($string)
    {
        return strtolower($string);
    }

    public function toUpperCase($string)
    {
        return strtoupper($string);
    }
}