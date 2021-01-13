<form method="post">
    <input type="text" name="email" id="name" placeholder="yourmail@mail.com" value="<?php echo $_POST["email"] ?? ''?>">
    <input type="text" name="password" id="password" placeholder="yourPassWord" value="">
    <input type="submit" value="login">
</form>

<a href="?page=register">S'enregistrer</a>

<?php
require_once './php/sql.php';
require_once './php/functions.php';

$trimedData = TrimedDataPost($_POST);

// var_dump($trimedData);

$msgError = false;
if (is_array($trimedData)) {

    if (isset($trimedData["email"]) && isset($trimedData['password'])) {

        $users = 'SELECT * FROM `tbl_users` WHERE `email` = "'.$trimedData["email"].'"';
        $result = $mysqli->query($users);

        if($result->num_rows === 1){
            $user = $result->fetch_assoc();

            if ($user["password"] === $trimedData["password"]) {
                // echo $user['password'] . ' ' . $trimedData['password'];

                $_SESSION['id'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['password'];

                // var_dump($_SESSION);

            } else $msgError = "Mot de passe incorect";

        }else $msgError = 'ce mail n\'existe pas';

    }else $msgError = "Mot de passe ou mail vide";
    
}else $msgError = "champ vide";


echo '<br>' . $msgError ?? "pas d'erreur";