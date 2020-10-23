<?php
require_once("./sql.php");
require_once("./const.php");
require_once("./functions.php");
require_once("../html/header.php");

if(count($_POST) > 0){
    $sanitizedPosts = trimDatasPost($_POST, false);
    if(is_array($sanitizedPosts)){
        $q = $pdo->prepare('SELECT * FROM tbl_customers WHERE email_customer=? AND password_customer = SHA1(?)');
        //if($q){
            $q->execute($sanitizedPosts);
            $r = $q->fetch();

            //var_dump($r);

            if (is_array($r)) {
                if($q->rowCount() === 1){
                    session_start();
                    $_SESSION = $r;
                    header('Location: ../index.php');
                }else $error = "deux utilisatuer identique";
            }else $error = "identifiant non reconnus";
        //}else echo $q->errorInfo();
    }else $error = "champs vides";
}


?>

<form action="" method="post">
    <input type="email" name="mail" id="f_mail" placeholder="mail@ex.com">
    <input type="text" name="password" id="f_password" placeholder="motDePasse123">
    <input type="submit" value="Send">
</form>

<?php
require_once("../html/footer.html");
?>