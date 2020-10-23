<?php
require_once("./sql.php");
require_once("./const.php");
require_once("./functions.php");
require_once("../html/header.php");

$article = 'SELECT * FROM `tbl_products` WHERE `id_product` = ? ';

$result = $pdo->prepare($article);
$result->execute(array_values($_GET));

//var_dump($result);
if ($result) {
    $q = $result->fetch(PDO::FETCH_ASSOC);
    // echo json_encode($q, JSON_UNESCAPED_UNICODE);
    if (count($q) > 0) {
        // foreach ($q as $value){
            // var_dump($value);
            $product_name = ucfirst($q['product_name']);
            $product_decription = ucfirst($q['description']);
            $product_imageReference = $q['reference'];
            $product_price = $q['price_product'];
            $product_quantity = $q['quantity_product'];

            strlen($product_decription) > 50 ? $product_decriptionTronked = substr($product_decription, 0, 41).' [...]' : $product_decriptionTronked = $product_decription;

            echo "
            <div class='article'>
                <h3> $product_name </h3>
                <img src='".HTTP_IPFS_ENDPOINT.$product_imageReference."'>
                <div class='articleDecriptions'>
                    <p> $product_decriptionTronked </p>
                    <small>Quantité : $product_quantity </small>
                    <small>Prix : $product_price".CURRENCY." </small>
                </div>
            </div>
            ";
        // }
    }else echo 'num-rows inferieure a 0 <br>';
}else echo "result = false";

?>

<?php
require_once("../html/footer.html");
?>