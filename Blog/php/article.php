<?php 
require_once('../html/header.html'); 
require_once('./sql.php');





if(isset($_GET["id"])){
    $theArticle = 'SELECT * FROM `table_article` JOIN (`table_authors`, `table_category`) USING (`id_author`, `id_cat`)  WHERE `id_art` = '.$_GET["id"].' AND `published`';
    if ($result = $mysqli->query($theArticle)) {
        if($result->num_rows === 1) {
            
             $article = $result->fetch_assoc();
                $art_Title = $article["title"];
                $art_Author = $article["name_author"];
                $art_contentText = $article["content_text"];
                $art_category = $article["name_cat"];
    
                echo '
                <div class="articles">
                    <h2>'.$article['title'].'</h2>
                    <p>'.$art_contentText.'</p>
                    <small>Rédigé par '.$article['name_author'].' le '.$article['created_at'].'</small>
                </div>
                </main>
                ';
        } else echo 'ERROR, EMPTY ARTICLE OR NOT PUBLISHED';
    }else echo "ERROR, ARTICLE NOT EXISTING";
    $allComments = 'SELECT * FROM `table_comments` JOIN `table_article` USING (`id_art`) WHERE `id_art` = '.$_GET['id'].'';

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

}else echo "ERROR ID NULL";

?>

<form action="" method="post">

    <Label for="pseudo">Pseudo :</Label>
    <input type="text" name="pseudo" id="pseudo">

    <Label for="commant">Commentaire :</Label>
    <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Votre commentaire :"></textarea>
    <input type="submit" value="Envoyer">
</form>

<?php
$CanSendCom = false;
if(count($_POST) > 0){
    //var_dump($_POST);
    foreach ($_POST as $key => $value) {
        # code...
        if(trim($value) === ""){
            $CanSendCom = false;
            break;
        }else {
            # code...
            echo $key . '< key, value >' . $value . '<br>';
            $CanSendCom = true;
        }
    }
    if($CanSendCom){
        echo 'Can send is true <br>';
        $sql = 'INSERT INTO `table_comments` (`id_comment`, `id_art`, `pseudo`, `text`, `created_at`) 
        VALUES (NULL, '.$mysqli->real_escape_string($_GET['id']).', "'.$mysqli->real_escape_string($_POST['pseudo']).'", "'.$mysqli->real_escape_string($_POST['comment']).'", current_timestamp())';
        
        $result = $mysqli->query($sql);
        if($result) {
            echo 'LE COM SEST BIEN AJOUTé';
        } else echo 'CAN NOT ADD COMMENT';
    }
}


?>

<?php require_once('../html/footer.html'); ?>