<?=
'<nav id="articles-modif">
    <ul>
        <li><a href="crt_article.php">Create article</a></li>
    </ul>
</nav>'
?>
<?php
require_once 'inc/mysql.php';
$sql = 'SELECT *
        FROM `tbl_article`
        JOIN tbl_authors
        USING (id_author)
        ORDER BY `tbl_article`.`created_at` DESC';
$result = $mysqli->query($sql);
$article = $result->fetch_All(MYSQLI_ASSOC);
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
    echo '
        <div class="articles">
            <ul>
                <li><a href="pagePost.php?id=' . $k['id_art'] . '">' . $k['title'] . '</a></li>
                <li>' . $newtext . '</a></li>
                <li>Rédigé par ' . $k['name_author'] . ' il y a ' . $tmc . '</li>
            </ul>

            <a href="edit_article.php?id=' . $k['id_art'] . '" class="delete-articles"><i class="fas fa-pen"></i></a>
            <a href="deletePost.php?id=' . $k['id_art'] . '" class="delete-articles"><i class="fas fa-trash"></i></a>
        </div>
        ';
}
echo '</div>';
?>