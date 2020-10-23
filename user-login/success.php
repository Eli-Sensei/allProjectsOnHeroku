<?php session_start();
if(isset($_GET['do']) && $_GET['do'] === 'signout') {
    foreach ($_SESSION as $k => $v) unset($_SESSION[$k]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if(count($_SESSION) > 0) {
    echo '<h1>Vous avez été logué avec succés, voici le contenu de votre session</h1>';
    echo '<p><a href="success.php?do=signout">cliquez ici pour supprimer la session</a> </p>';
}else echo '<h1>Session vide</h1>';
var_dump($_SESSION);
?>
</body>
</html>