<?php session_start();
if (count($_SESSION) === 0) {
    header('location: backOffice.php');
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

<?php
require_once 'inc/mysql.php';

// list of author's
$sql = 'SELECT * FROM `tbl_authors` ORDER BY `tbl_authors`.`id_author`';
$result = $mysqli->query($sql);
$sqlAuthor = $result->fetch_All(MYSQLI_ASSOC);

// list of category's
$sql = 'SELECT * FROM `tbl_category` ORDER BY `tbl_category`.`id_cat`';
$result = $mysqli->query($sql);
$sqlCat = $result->fetch_All(MYSQLI_ASSOC);

// Form send
// mysql com : INSERT INTO `tbl_article` (`id_art`, `id_cat`, `title`, `content`, `created_at`, `published`, `id_author`) VALUES (NULL, '2', 'C bin la musique', 'tro ienb', current_timestamp(), '1', '3');

if (count($_POST) > 0) {
        require_once 'inc/functions.php';
        $tdp = trimDatasPost($_POST);
        if (is_array($tdp)) {
            $sql = 'INSERT INTO `tbl_article` (`id_art`, `id_cat`, `title`, `content`, `created_at`, `published`, `id_author`) 
                    VALUES (NULL, "' . $tdp['category'] . '", "' . $tdp['title'] . '", "' . $tdp['content'] . '", current_timestamp(), "1", "' . $tdp['author'] . '")';
            //var_dump('sql : ' . $sql);
            $result = $mysqli->query($sql);
            //var_dump($result);
            if ($result){
                $last_id = $mysqli->insert_id;
                echo 'L\'article a bien été ajouté. Dernier ID inséré is: " '. $last_id;
            }
        } else {
            echo 'Tous les champs sont obligatoires';
        }
}
?>

<div id="article" class="crt_article">
    <a href="success.php">Go back</a>
    <form method="POST">
        <label for="category">
            <select name="category" id="">
                <?php foreach ($sqlCat as $v) {
                    echo '<option value="' . $v['id_cat'] . '">' . $v['name_cat'] . '</option>';
                } ?>
            </select>
        </label>
        <label for="title">
            <input type="text" name="title" placeholder="title">
        </label>
        <label for="author">
            <select name="author" id="">
                <?php foreach ($sqlAuthor as $v) {
                    echo '<option value="' . $v['id_author'] . '">' . $v['name_author'] . '</option>';
                } ?>
            </select>
        </label>
        <label for="content">
            <textarea name="content" id="content"
                      placeholder="content"></textarea>
        </label>
        <input type="submit">
    </form>
</div>

<?php require_once 'inc/footer.html' ?>
