<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            background-color: gray;            
        }

    </style>
</head>
<body>  
    <form action="" method="post">

        <label for="mail">Votre Mail :</label>
        <input type="email" name="mail" id="mail">

        <label for="password">Votre mot de passe :</label>
        <input type="password" name="password" id="password">

    </form>
    <?php

        $mysql = new mysqli("localhost", "root", "", "blog");
        var_dump($mysql);


    ?>
</body>
</html>