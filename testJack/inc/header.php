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
            <li>|</li>
            <li>
                <?php
                require_once 'mysql.php';

                $sql = 'SELECT * FROM `tbl_article`';
                $result = $mysqli->query($sql);
                $article = $result->fetch_All(MYSQLI_ASSOC);

                require_once 'inc/search.php';
                ?>

                <form method="post" action="searchPage.php">
                    <input name="searchbar" list="searchlist" type="search" id="searchbar" minlength="3">
                    <datalist id="searchlist">
                        <?php foreach ($article as $v) {
                            echo '<option value="'.$v['title'].'">';
                        } ?>
                    </datalist>
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </li>
        </ul>
    </nav>
</header>
<main>
    <div id="article-container">