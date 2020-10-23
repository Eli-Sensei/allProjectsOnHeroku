<?php
require_once 'inc/mysql.php';
const maxArticle = 6;

$sql = 'SELECT `id_art` 
        FROM `tbl_article`
        WHERE `published`
        ';
$result1 = $mysqli->query($sql);
$articleLength = count($result1->fetch_All(MYSQLI_ASSOC));

$pagination = '';
$minArticle = 0;

if ($articleLength > 6){
    for ($i = -1; ++$i < number_format($articleLength / maxArticle);) {
        $pageHTML = $i + 1;
        if (count($_GET) > 0 && $_GET['pagination'] == $i){
            $pagination .= '<option value="'.$i.'" selected>Page '.$pageHTML.'</option>';
        } else $pagination .= '<option value="'.$i.'">Page '.$pageHTML.'</option>';
    }

    if (count($_GET) > 0 && $_GET['pagination'] > 0){
        $minArticle = ($_GET['pagination'] * 6) + 1;
    }
}

$sql = 'SELECT * 
        FROM `tbl_article` 
        JOIN tbl_authors 
        USING (id_author) 
        WHERE published 
        ORDER BY `tbl_article`.`created_at` DESC
        LIMIT '.$minArticle.','.maxArticle.'
        ';
$result = $mysqli->query($sql);
$article = $result->fetch_All(MYSQLI_ASSOC);

$articleHTML = '';

if ($article > 0) {
    echo '<div id="articles-list">';
    foreach ($article as $k) {
        // Time since it's been released
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
        $string = $k['content'];
        $newtext = (strlen($string) > 100) ? substr($string, 0, 100) . '[...]' : $string;
        $articleHTML .= '
            <div class="articles">
                <ul>
                    <li><a href="pagePost.php?id=' . $k['id_art'] . '">' . $k['title'] . '</a></li>
                    <li>' . $newtext . '</a></li>
                    <li>Rédigé par ' . $k['name_author'] . ' il y a ' . $tmc . '</li>
                </ul>
            </div>
        ';
    }
    if ($articleLength > 6){
        echo '<form id="pagination">
            <select name="pagination" onchange="document.querySelector(\'#pagination\').submit()">';
    }
    echo $pagination;
    if ($articleLength > 6){
        echo '    </select>
        </form>';
    }
    echo '<div id="article-container">';
    echo $articleHTML;
    echo '</div>';
}

?>