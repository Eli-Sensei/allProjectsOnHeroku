<?php require_once 'inc/header.php';

require_once 'inc/search.php';

if (!empty($tdp)){
    require_once 'inc/mysql.php';
    $sql = 'SELECT * 
        FROM `tbl_article`
        WHERE `published` AND `title` LIKE "%'.$mysqli->real_escape_string($tdp).'%" or `content`
        LIKE "%'.$mysqli->real_escape_string($tdp).'%"';
    $result = $mysqli->query($sql);
    $sqlArticle = $result->fetch_All(MYSQLI_ASSOC);
    $searchNmb = 0;
    $HTMLtitle = '';
    $HTMLcontent = '';
    $articles = '';

    foreach ($sqlArticle as $v){
        preg_match_all("/".$tdp."/i", $v['title'], $matchesTitle);
        preg_match_all("/".$tdp."/i", $v['content'], $matchesContent);

        $HTMLtitle = '';
        $HTMLcontent = '';

        foreach ($matchesTitle as $item) {
            foreach ($item as $i){
                $searchNmb++;
                $HTMLtitle = str_ireplace($tdp, "<span style='color: red;font-weight: bold;'>".$i."</span>", $v['title']);
            }
        }
        if (empty($HTMLtitle)){
            $HTMLtitle = $v['title'];
        }

        foreach ($matchesContent as $item) {
            foreach ($item as $i){
                $searchNmb++;
                $HTMLcontent = str_ireplace($tdp, "<span style='color: red;font-weight: bold;'>".$i."</span>", $v['content']);
                //var_dump($i);
                //preg_replace("/".$tdp."/i", "<span style='color: red'>".$i."</span>", $item);
            }
        }
        if (empty($HTMLcontent)){
            $HTMLcontent = $v['content'];
        }

        $articles .= '
            <div class="articles">
                <ul>
                    <li><a href="pagePost.php?id=' . $v['id_art'] . '" class="articles-a">' . $HTMLtitle . '</a></li>
                    <li class="articles-li">' . $HTMLcontent . '</a></li>
                </ul>
            </div>
            ';
    }
    echo 'Nous avons trouvé ',$searchNmb,' résultat(s)';
    echo $articles;
}

require_once 'inc/footer.html';
?>