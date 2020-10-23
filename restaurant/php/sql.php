<?php

try{
    //PDO
    if(in_array($_SERVER["HTTP_HOST"], ["localhost", "127.0.0.1", "[::1]"])){
        $pdo = new PDO("mysql:host=localhost;dbname=test_resto;charset=UTF8", "root", "");
    }else{
        // $dbh = db ALWAYS DATA
        $pdo = new PDO("mysql:host=mysql-eden-ellyas.alwaysdata.net;dbname=eden-ellyas_test_resto;charset=UTF8", "213843", "@Selman1234");
    }
}catch(PDOException $e){
    var_dump($e->getMessage());
}