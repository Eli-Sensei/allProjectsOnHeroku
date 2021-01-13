<?php foreach ($articles as $article): ?>

<div class="articles">
    <h2>
        <a href="./articles/show/<?= $article['slug'] ?>"> <?= $article['title'] ?> </a>
    </h2>
    <p><?= $article['content_text'] ?></p>
</div>


<?php endforeach; ?>
