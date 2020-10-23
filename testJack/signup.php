<?php
$successMsg = '';
$errorMsg = '';
if (count($_POST) > 0) {
    $trimEmail = trim($_POST['email']);
    if (!empty($trimEmail)) {
        require_once 'inc/mysql.php';
        $sql = 'INSERT INTO tbl_users
        VALUES (NULL, "' . $mysqli->real_escape_string($trimEmail) . '", SHA1("' . $_POST['password'] . '"), 1, CURRENT_TIMESTAMP, "http://www.google.com")';
        $result = $mysqli->query($sql);
        if (!$result) {
            if ($mysqli->sqlstate === '23000') {
                $errorMsg = 'the following email ' . $trimEmail . ' is already existing in db';
            } else $errorMsg = 'Unknown error :  Cannot signup';

        } else $successMsg = 'You are successfully registered! Click <a href="index.php">here</a> to sign in!';

    } else $errorMsg = 'You must fill an email and a password';
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
        <h1>Sign up</h1>
        <form method="post" action="backOffice.php">
            <input type="email" placeholder="email" name="email"
                   value="<?= $_POST['email'] ?? '' ?>"><br>

            <input type="password" name="password"
                   value="<?= $_POST['password'] ?? '' ?>"><br>

            <input type="submit">
        </form>
        <p><?= $errorMsg ?? $successMsg ?></p>
    </div>

<?php require_once 'inc/footer.html' ?>