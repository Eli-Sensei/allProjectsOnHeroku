<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *, html {
            padding: 0;
            margin: 0;
        }
        body{
            font-family: Verdana;
            font-size: 25px;
        }
        .code{
            margin: 0 2px;
            padding: 0 5px;
            white-space: nowrap;
            border: 1px solid #eaeaea;
            background-color: #f8f8f8;
            border-radius: 3px;
        }
        table {
            margin: 25px;
            display: table;
            border-spacing: 0;
        }
        td{
            border: 1px solid #dddddd;
            max-width: 800px;
        }
        .bg {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h1 class="code">$str = ' Je suis une chaîne de caractère ';</h1>
<?php $str = ' Je suis une chaîne de ûcaractère '; ?>
<table>
    <thead>
    <tr><td style="background-color: cornflowerblue;">Quoi?</td><td style="background-color: red;">Résultat</td></tr>
    </thead>
    <tr><td >Connaître la <b>longueur</b> de la chaîne </td><td>  <?php echo strlen($str) ?> </td></tr>
    <tr><td class="bg">Les <b>espaces</b> entourant la chaîne de caractère doivent être <b>supprimés</b></td><td class="bg"><?php echo trim($str) ?></td></tr>
    <tr><td>Mettre en <b>majuscule</b> (caractères spéciaux inclus) </td><td><?php echo mb_strtoupper($str, 'UTF-8') ?></td></tr>
    <tr><td class="bg">Afficher l'index 5 de la chaîne (donc 4 ème lettre)  </td><td class="bg"><?php echo $str[5] ?></td></tr>
    <tr><td>Mettre en majuscule la <b>première lettre</b> uniquement de tous les mots </td><td><?php echo mb_convert_case($str, MB_CASE_TITLE) ?></td></tr>
    <tr><td class="bg"><b>Extraire</b> le mot "je"</td><td class="bg"><?php echo explode("Je", $str) ?></td></tr>
    <tr><td>Récupérer <b>séparement</b> chaque <b>mot</b> dans un <b>tableau</b></td><td></td></tr>
    <tr><td class="bg"><b>Remplacer</b> les "a" par des "o"</td><td class="bg"><?php echo str_ireplace('a', "o", $str) ?></td></tr>
    <tr><td>Afficher dynamiquement (si la chaîne de départ est amenée à changer), tout ce qui est <b>avant le premier</b> "a"</td><td><?php echo strstr($str, 'a', true) ?></td></tr>
</table>
<hr/>
<a href="http://php.net/manual/fr/" target="_blank">Doc PHP officielle</a>
</body>
</html>