<?php session_start();
if (count($_SESSION) > 0){header("location: success.php");}
$errorMsg = '';
if (count($_POST) > 0) {
    $trimEmail = trim($_POST['email']);
    if (!empty($trimEmail)) {
        require_once 'inc/mysql.php';
        $sql = 'SELECT `id_user`,`email` 
            FROM `tbl_users` 
            WHERE `email` = "' . $mysqli->real_escape_string($trimEmail) . '" 
            AND `password` = SHA1("' . $_POST['password'] . '")';

        if ($result = $mysqli->query($sql)) {
            if ($result->num_rows === 1) {
                session_start();
                $_SESSION = $result->fetch_assoc();
                header('Location: success.php');
            } else $errorMsg = 'Either this user does not exist OR there are several users with same credentials. Click <a href="signup.php">here</a> to sign up!';
        }
    } else $errorMsg = 'You must fill and email and a password!';
}

?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>

        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/footer.css">
        <link rel="stylesheet" href="style/login.css">
        <link rel="stylesheet" href="style/article.css">
        <link rel="stylesheet" href="style/articles-modif.css">

        <script src="https://kit.fontawesome.com/62c3447164.js" crossorigin="anonymous"></script>
    </head>
<body>
    <!-- Header for blog pages -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Blog</a></li>
                <li>|</li>
                <li><a href="backOffice.php">Back office</a></li>
            </ul>
        </nav>
    </header>
<main>
    <div id="article-container">
    <div id="login">
        <h1>Sign in</h1>
        <form method="post">
            <input type="email" placeholder="admin@admin.com" name="email"
                   value="<?= $trimEmail ?? '' ?>"><br>
            <input type="password" placeholder="password" name="password"
                   value="<?= $_POST['password'] ?? '' ?>"><br>
            <input type="submit">
        </form>
        <p><?= $errorMsg ?></p>
        <p>To go back to the home page click <a href="index.php">here</a></p>
    </div>

<?php require_once 'inc/footer.html' ?>