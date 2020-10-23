<?php
$nbProducts = $pdo->query('SELECT count(id_product) AS numbersProducts FROM `tbl_products`');
$q2 = $nbProducts->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="../image/logoSite.gif" type="image/gif">
    
    <title>Resto</title>
</head>
<body>
    <header>
        <h1><a href="./index2.php">Restaurantus</a></h1>
        <nav>
            <ul>
                <li> <a href="./products.php">Produits (<?php echo $q2['numbersProducts']?>)</a> </li>
                <li> <a href="./booking.php">Booking</a> </li>
                <li> <a href="./panier.php">Panier</a> </li>
                <li> <a href="./contact.php">Contact</a> </li>
            </ul>
        </nav>
    </header>
    <main>
<?php
require_once './search.php';

?>

    
