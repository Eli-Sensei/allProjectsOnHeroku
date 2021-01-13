<?php

use League\Url\Components\Host;

$hoster = ["localhost", "127.0.0.1", "[::1]"]; // les 3 truc Local


if(in_array($_SERVER['HTTP_HOST'], $hoster)){ // si dans l'array $_SERVER y'a l'un des truc local ça veut dire qu'on est en local
    $mysqli = new mysqli($hoster, "root", "", "blog"); // la base de donné local

}else{ // sinon on se connecte a la base de donnée externe aka la, alwaysdata
    $mysqli = new mysqli("mysql-eden-ellyas.alwaysdata.net", "identifiant", "password", "db_name");
}