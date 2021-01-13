<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default</title>

    <link rel="stylesheet" href="<?= RACINE ?>assets/styles/main.css">
    <link rel="stylesheet" href="<?= RACINE ?>assets/styles/update.css">
    <link rel="stylesheet" href="<?= RACINE ?>assets/styles/articles.css">

</head>
<body>
    <header>
        <h1>
            <a href="<?= RACINE ?>" id="TheBlogus">The Blogus</a>
        </h1>
        <nav>
            <ul>
                <li><a href="<?= RACINE ?>">Accueil</a></li>
                <li><a href="<?= RACINE ?>backoffice">Backoffice</a></li>
                <li><a href="<?= RACINE ?>articles">Articles</a></li>
                <li><input type="search"></li>
            </ul>
        </nav>
    </header>
    <main> <?= $content; ?> </main>
</body>
</html>