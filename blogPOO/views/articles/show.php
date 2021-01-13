<?php 
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

?>
<h2><?= $article['title'] ?></h2>
<p><?= $article['content_text'] ?></p>
<span><?= $article['created_at'] ?></span>