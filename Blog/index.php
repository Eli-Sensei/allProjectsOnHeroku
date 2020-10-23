<?php
    require_once('./html/header.html');
?>

<script>
    document.getElementById("TheBlogus").attributes["href"].value = "index.php";
    console.log(document.getElementById("TheBlogus").attributes["href"]);
</script>

<?php
    require_once('./php/sql.php');
    
    $allArticles = 'SELECT * 
        FROM `table_article` 
        JOIN `table_authors` 
        USING (`id_author`) 
        WHERE `published` 
        ORDER BY `created_at` 
        DESC';

    

    if ($result = $mysqli->query($allArticles)) {
        if($result->num_rows > 0) {
            $nbArticles = 0;
            foreach ($result->fetch_all(MYSQLI_ASSOC) as $value) {
                $nbArticles++;
                //if($nbArticles > 2){break;} // for limiting the number of articles displayed on the home page
                $art_Title = $value["title"];
                $art_Author = $value["name_author"];
                $art_contentText = $value["content_text"];

                $tronkedText = (strlen($art_contentText) > 100) ? substr($art_contentText, 0, 100) . '[...]' : $art_contentText;

                echo '
                <div class="articles">
                    <h2><a href="./php/article.php?id='.trim($value['id_art']).'">'.$value['title'].'</a></h2>
                    <p>'.$tronkedText.'</p>
                    <small>Rédigé par '.$value['name_author'].' le '.$value['created_at'].'</small>
                </div>
                ';
            }
        } else $errorMsg = 'There is no article';
}else "FATAL ERROR, BASE DE DONNÉES NON EXISTANTE";
    

    require_once('./html/footer.html');
    
?>
