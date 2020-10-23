<?php session_start();
if (count($_SESSION) === 0) {
    header('Location: backOffice.php');
    exit();
}
if (isset($_GET['do']) && $_GET['do'] === 'logout') {
    echo 'click logout';
    foreach ($_SESSION as $key => $value) {
        unset($_SESSION[$key]);
    }
}
?>
<?php require_once 'inc/header.php' ?>
<?php
if (count($_SESSION) > 0) {
    echo '<marquee>Vous avez été logué avec succès, voici le contenu de votre session</marquee>';
    echo '<br><a href="success.php?do=logout">logout(' . $_SESSION['email'] . ')</a>';
    if ($_SESSION['email'] === 'jack.lecomtes@gmail.com' || $_SESSION['email'] === 'admin@admin.com') {
        require_once 'inc/main_admin.php';
    } else {
        require_once 'inc/article.php';
    }
} //var_dump($_SESSION);
else if (isset($_GET) === 'error') {
    echo '<h1>Error delete impossible </h1>';
}
?>

<?php require_once 'inc/footer.html' ?>