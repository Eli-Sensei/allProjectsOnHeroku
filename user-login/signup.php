<?php
if(count($_POST) > 0) {
    $trimEmail = trim($_POST['email']);
    if(!empty($trimEmail) && !empty(trim($_POST['password']))) {
        require_once 'sql.php';
        $sql = 'INSERT INTO table_users
        VALUES (NULL, "'.$mysqli->real_escape_string($trimEmail).'", SHA1("'.$_POST['password'].'"), 1, CURRENT_TIMESTAMP, "http://www.google.fr")';
        $result = $mysqli->query($sql);
        if(!$result) {
            if ($mysqli->sqlstate === '23000') {
                $errorMsg = 'the following email '.$trimEmail.' is already existing in db';
            } else $errorMsg = 'Unknown error: Cannot signup';

        } else $successMsg = 'You are successfully registered!';

    }else $errorMsg = 'You must fill an email and a password!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
</head>
<body>
<h1>Register Form</h1>
<form method="post">
    <input type="email" placeholder="email" name="email" value="<?= $trimEmail ?? '' ?>"><br>
    <input type="password" name="password" value="<?= $trimPasswd ?? '' ?>"><br>
    <input type="submit">
</form>
<p><?= $errorMsg ?? $successMsg ?></p>
</body>
</html>