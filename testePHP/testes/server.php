<?php 
$error = null;

if(count($_GET) > 0){
    $succes = "<br> nickel ça";

    if(isset($_GET['email'], $_GET['password'])){
        echo "<br> oe, y'a email et un mot de passe";

        if(!empty(trim($_GET["email"]) && !empty(trim($_GET['password'])))){
            echo '<br> mot de passe et mail pas vide, good job :)';

            echo '<br> Votre mail est : ' . $_GET["email"] . " et votre mot de passe est : " . $_GET["password"];

        }else echo '<br> mot de passe ou mail vide :(';
    }else echo "<br> pas de mail, ressayer ou pas de password";

}else $error = '<br> oh nyoo, mank une variable URL :(';

echo $error ?? $succes;

?>