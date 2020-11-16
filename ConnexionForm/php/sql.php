<?php

$hoster = ["localhost", "127.0.0.1", "[::1]"];
if(in_array($_SERVER['HTTP_HOST'], $hoster)){
    $mysqli = new mysqli("localhost", "root", "", "formulaireadb");

}