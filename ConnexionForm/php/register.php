<?php 

require_once "../html/header.html";
require_once "./sql.php";
require_once "./functions.php";


?>

<form action="" method="post">
        <input type="text" name="firstname" id="firstname" placeholder="prénom">
        <input type="text" name="lastname" id="lastname" placeholder="nom">
        <input type="date" name="birthday">
        <input type="text" name="email" id="email" placeholder="mail@ex.com">
        <input type="text" name="password" id="password" placeholder="password">
        <input type="text" name="password2" id="password2" placeholder="confirm password">
        <input type="submit">
</form>

<a href='./login.php'>Se connecter</a>

<?php
echo '<br>';
if(count($_POST) > 0){
    var_dump($_POST);
    if(TrimedDataPost($_POST)){
        if(isSamePassword($_POST["password"], $_POST["password2"])){

        $sql = 'INSERT INTO `tbl_users` (`user_password`, `user_mail`, `firstname`, `lastname`, `birthday`) VALUES ("'.$_POST["password"].'", `mail@mail.corr`, `nicolas`, `deba`, `04/05/2020`)';
        
        $result = $mysqli->query($sql);
        var_dump($result);
        if($result) {
            echo 'Bien enrengistré merci';
            header("Refresh:0");
        } else echo 'can\'t register you';

        }
    }
}


require_once "../html/footer.html";
?>