<?php
session_start();
// var_dump($_SESSION);
// if (count($_SESSION) === 4) {
//     // header("Location: ./assets/php/login.php");
//     echo 'Session ouverte';
// }else echo "Session fermé";

$hoster = ["localhost", "127.0.0.1", "[::1]"];
if(in_array($_SERVER['HTTP_HOST'], $hoster)){
    $mysqli = new mysqli("localhost", "root", "", "phoenix");

}