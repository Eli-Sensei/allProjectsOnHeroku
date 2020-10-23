<?php
if ($_SERVER['HTTP_HOST'] === 'localhost'){
    $mysqli = new mysqli("127.0.0.1", "root", "", "blog");
} else {
    $mysqli = new mysqli("mysql-toukhen.alwaysdata.net", "toukhen", "usYMaTO9fJ0A^PtqX!w", "toukhen_blog");
}