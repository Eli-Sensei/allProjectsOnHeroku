<?php session_start();
if (count($_SESSION) === 0) {header('location: backOffice.php');}
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

$sql = 'SELECT TIMESTAMPDIFF(MINUTE,`created_at`, current_timestamp) tmc FROM `tbl_article` WHERE `id_art` = ' . $_GET['id'];
$result = $mysqli->query($sql);
$sqlTime = $result->fetch_assoc();
$tmc = intval($sqlTime["tmc"]);
$tmc = $tmc . " minute(s)";
if ($tmc >= 60) {
    $tmc = intval($tmc);
    $tmc = round($tmc / 60);
    $tmc = $tmc . " heure(s)";
    if ($tmc >= 24) {
        $tmc = intval($tmc);
        $tmc = round($tmc / 24);
        $tmc = $tmc . " jour(s)";
    }
}

$sql = 'SELECT * 
        FROM `tbl_article`
        JOIN (`tbl_authors`,`tbl_category`) 
        USING (`id_author`, `id_cat`)
        WHERE `id_art` = ' . $_GET['id'];
$result = $mysqli->query($sql);
$article = $result->fetch_assoc();
$string = $article['content'];
$idart = $_GET['id'] ?? $_POST['id_article'];

// list of author's
$sql = 'SELECT * FROM `tbl_authors` ORDER BY `tbl_authors`.`id_author`';
$result = $mysqli->query($sql);
$sqlAuthor = $result->fetch_All(MYSQLI_ASSOC);

// list of category's
$sql = 'SELECT * FROM `tbl_category` ORDER BY `tbl_category`.`id_cat`';
$result = $mysqli->query($sql);
$sqlCat = $result->fetch_All(MYSQLI_ASSOC);

// Form send

if (count($_POST) > 0) {
    $trimTitle = trim($_POST['title']);
    $trimContent = trim($_POST['content']);
    if (!empty($trimTitle)) {
        require_once 'inc/functions.php';
        $tdp = trimDatasPost($_POST);
        if (is_array($tdp)) {
            $sql = 'UPDATE `tbl_article` SET `id_cat` = "'.$_POST['category'].'", `title` = "'.$tdp['title'].'", `content` = "'.$tdp['content'].'", `id_author` = "'.$_POST['author'].'" WHERE `tbl_article`.`id_art` = '.$_GET['id'];
            //var_dump('sql : ' . $sql);
            $result = $mysqli->query($sql);
            //var_dump($result);
        } else {
            echo 'Tous les champs sont obligatoires';
        }
    }
}
?>

    <div id="article" class="crt_article">
        <a href="success.php">Go back</a>
        <form method="POST">
            <label for="category">
                <select name="category" id="">
                    <?php foreach ($sqlCat as $v) {
                        if ($article['id_cat'] === $v['id_cat']){
                            echo '<option  value="' . $v['id_cat'] . '" selected>' . $v['name_cat'] . '</option>';
                        } else {
                            echo '<option  value="' . $v['id_cat'] . '">' . $v['name_cat'] . '</option>';
                        }
                    } ?>
                </select>
            </label>
            <label for="title">
                <input type="text" name="title" placeholder="title" value="<?= $article['title'] ?>">
            </label>
            <label for="author">
                <select name="author" id="">
                    <?php foreach ($sqlAuthor as $v) {
                        if ($article['id_author'] === $v['id_author']){
                            echo '<option value="' . $v['id_author'] . '" selected>' . $v['name_author'] . '</option>';
                        } else {
                            echo '<option value="' . $v['id_author'] . '">' . $v['name_author'] . '</option>';
                        }
                    } ?>
                </select>
            </label>
            <label for="content">
            <textarea name="content" id="content" placeholder="content"><?= $article['content'] ?></textarea>
            </label>
            <input type="submit">
        </form>
    </div>

<?php require_once 'inc/footer.html'; ?>