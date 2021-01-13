<form method="post">
    
    <input type="text" name="username" id="username" placeholder="username" value="<?php echo $_POST["username"] ?? ''?>">
    <input type="text" name="email" id="email" placeholder="yourmail@mail.com" value="<?php echo $_POST["email"] ?? ''?>">
    <input type="text" name="password" id="password" placeholder="yourPassWord" value="">
    <input type="text" name="passwordConfirm" id="passwordConfirm" placeholder="ConfirmPassword" value="">
    <input type="submit" value="register">
</form>
<a href="?page=login">Se connecter</a>

<?php
require_once './php/sql.php';
require_once './php/functions.php';

$trimedData = TrimedDataPost($_POST);

// var_dump($trimedData);

$msgError = false;
if (is_array($trimedData)) {

    if (count($trimedData) > 0) {
        
        if (isset($trimedData["email"]) && isset($trimedData['password']) && isset($trimedData["passwordConfirm"])) {
    
            $users = 'SELECT * FROM `tbl_users` WHERE `email` = "'.$trimedData["email"].'"';
            $result = $mysqli->query($users);
    
            if($result->num_rows !== 1){
                $user = $result->fetch_assoc();
    
                if ($trimedData["password"] === $trimedData["passwordConfirm"]) {
    
                    $sql = "INSERT INTO tbl_users VALUES (NULL, '".$trimedData["username"]."', '".$trimedData["email"]."', '".$trimedData["password"]."')";
    
                    if (mysqli_query($mysqli, $sql)) {
                    echo "Votre compte a bien été crée";
                    } else {
                    echo "<br>Error: <br>" . mysqli_error($mysqli);
                    }
    
                    // header('Location: ./login.php');
    
                } else $msgError = "Mot de passe ne corespondent pas";
    
            }else $msgError = 'ce mail existe déjà';
    
        }else $msgError = "Mot de passe ou mail vide";
        
    }else $msgError = "champ vide";
    
    echo '<br>' . $msgError ?? "pas d'erreur";
}