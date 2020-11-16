<?php 

require_once "../html/header.html";
require_once "./sql.php";
require_once "./functions.php";


?>

<form action="" method="post">
        <input type="text" name="email" id="email" placeholder="mail@ex.com">
        <input type="text" name="password" id="password" placeholder="password">
        <input type="submit">
</form>

<?php
echo '<br>';
if(count($_POST) > 0){
    var_dump($_POST);
    if(TrimedDataPost($_POST)){
        $sql = 'SELECT * FROM `tbl_users` WHERE `user_mail` = "'.$_POST["email"].'" AND `user_password` = "'.SHA1($_POST["password"]).'"';

        $result = $mysqli->query($sql);

        var_dump($result);
    }
}


require_once "../html/footer.html";
?>