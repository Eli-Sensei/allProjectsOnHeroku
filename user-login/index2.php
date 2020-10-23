<?php
if(count($_POST) > 0) {
    $bddCred = 'credentials.txt';
    $lines = @file($bddCred, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $email = strstr($line, ':', true);
        $passwd = substr(strstr($line, ':'), 1);

        if (trim($_POST['email']) === $email &&  password_verify($_POST['password'], $passwd)) {
            session_start();
            $_SESSION['email'] = $email;
            header('Location: success2.php');
            exit();
        }
    }
    $errorMsg = 'no matching credentials';
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
    <input type="email" placeholder="email" name="email" value="<?php echo $_POST['email'] ?? '' ?>" required><br>
    <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"><br>
    <input type="submit">
</form>
<p><?= $errorMsg ?? '' ?></p>
</body>
</html>