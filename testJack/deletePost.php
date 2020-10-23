<?php
if (isset($_GET['id'])) {
    require_once 'inc/mysql.php';
    $sql = 'DELETE FROM `tbl_article` WHERE `tbl_article`.`id_art` = ' . $_GET['id'];
    $result = $mysqli->query($sql);
    if ($result) {
        header("location: success.php");
    } else {
        header("location: success.php?error=delete impossible");
    }
}
?>
