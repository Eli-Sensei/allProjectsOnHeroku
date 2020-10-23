<?php require_once 'inc/header.php' ?>

<?php
if (isset($_GET['id'])) {
    require_once 'inc/mysql.php';

    if (count($_POST) > 0) {
            require_once 'inc/functions.php';
            $tdp = trimDatasPost($_POST);
            if (is_array($tdp)){
                $sql = 'INSERT INTO tbl_comments (`id_comment`, `pseudo`, `text`, `created_at`, `id_art`) 
                    VALUES (NULL, "' . $mysqli->real_escape_string($tdp['pseudo']) . '","' . $mysqli->real_escape_string($tdp['comment']) . '", current_timestamp(), "' . $mysqli->real_escape_string($tdp['id_article']) . '")';
                $result = $mysqli->query($sql);
            } else {
                echo 'Tous les champs sont obligatoires';
            }
    }

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
        WHERE `id_art` = ' . $_GET['id'] . '
        AND `published`';
    $result = $mysqli->query($sql);
    $article = $result->fetch_assoc();
    if (is_array($article)) {
        $string = $article['content'];
        $idart = $_GET['id'] ?? $_POST['id_article'];
        echo '
    <div id="article">
        <ul>
            <li>' . $article['title'] . '</a></li>
            <li>' . $string . '</a></li>
            <li>Rédigé par ' . $article['name_author'] . ' il y a ' . $tmc . '</li>
        </ul>
    </div>
    <div id="article-comment-form" class="articles-def">
        <form method="post">
            <input type="text" placeholder="PSEUDO" name="pseudo" value=""><br>
            <textarea name="comment" id="" placeholder="Votre commentaire"></textarea><br>
            <input name="id_article" type="hidden" value="' . $idart . '">
            <input type="submit">
        </form>
    </div>
    ';
        $sql2 = 'SELECT * 
                FROM `tbl_comments`
                ORDER BY `tbl_comments`.`created_at` DESC';

        $result = $mysqli->query($sql2);
        $tblComments = $result->fetch_All(MYSQLI_ASSOC);
        if (is_array($tblComments)) {
            foreach ($tblComments as $k) {
                if ($k["id_art"] === $idart) {
                    $sql = 'SELECT TIMESTAMPDIFF(MINUTE, "' . $k["created_at"] . '" , current_timestamp) tmc';
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
                    echo '
                        <div class="articles">
                            <ul>
                                <li><a href="#">' . $k['pseudo'] . '</a></li>
                                <li>' . $k['text'] . '</a></li>
                                <li>Rédigé il y a ' . $tmc . '</li>
                            </ul>
                        </div>
                   ';
                }
            }
        }
    } else {
        echo '<p id="wrongart">This article does\'nt exist</p>';
    }
} else {
    echo '<p id="wrongart">This article does\'nt exist</p>';
}
?>

<?php require_once 'inc/footer.html' ?>