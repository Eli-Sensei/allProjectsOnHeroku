<?php

use League\Url\Components\Host;

$hoster = ["localhost", "127.0.0.1", "[::1]"];
if(in_array($_SERVER['HTTP_HOST'], $hoster)){
    $mysqli = new mysqli("localhost", "root", "", "blog");

}else{
    //$mysqli = new mysqli("mysql-eden-ellyas.alwaysdata.net", "213843", "", "eden-ellyas_db-blog");
}