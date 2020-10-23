<?php
if(count($_POST) > 0) {

    if(!empty($trimEmail)) {
        require_once 'sql.php';
        $sql = 'SELECT `id_user`,`email`
                FROM `table_users`
                 WHERE `email` = "'.$mysqli->real_escape_string($trimEmail).'"
                AND `password` = SHA1("'.$_POST['password'].'")';

        if ($result = $mysqli->query($sql)) {
            if($result->num_rows === 1) {
                session_start();
                $_SESSION = $result->fetch_assoc();
                header('Location: success.php');
            } else $errorMsg = 'Either this user does not exist OR there are several users with same credentials';
        }
    }else $errorMsg = 'You must fill an email and a password!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signin</title>
</head>
<body>
<h1>Sign in</h1>
<form method="post">
    <input type="email" placeholder="email" name="email" value="<?= $trimEmail ?? '' ?>"><br>
    <input type="password" name="password" value="<?= $trimPasswd ?? '' ?>"><br>
    <input type="submit">
</form>
<p><?= $errorMsg ?? $successMsg ?></p>
</body>
</html>