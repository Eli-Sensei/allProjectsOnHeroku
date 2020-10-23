<?php
require_once("./sql.php");
require_once("./const.php");
require_once("./functions.php");
require_once("../html/header.php");

$allProducts = 'SELECT * FROM `tbl_products` WHERE `in_stock` ORDER BY `product_name`';

$result = $pdo->query($allProducts);
//var_dump($result);
if ($result) {
    $q = $result->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($q, JSON_UNESCAPED_UNICODE);
    if (count($q) > 0) {
        foreach ($q as $value){
            // var_dump($value);
            $product_name =  ucfirst($value['product_name']);
            $product_decription = ucfirst($value['description']);
            $product_imageReference = $value['reference'];
            $product_price = $value['price_product'];
            $product_quantity = $value['quantity_product'];

            strlen($product_decription) > 50 ? $product_decriptionTronked = substr($product_decription, 0, 41).' [...]' : $product_decriptionTronked = $product_decription;

            echo "
            <div class='products'>
                <a href='./article.php?id=".$value["id_product"]."'>
                    <h3> $product_name </h3>
                    <img src='".HTTP_IPFS_ENDPOINT.$product_imageReference."'>
                </a>
                <div class='productsDecriptions'>
                    <p> $product_decriptionTronked </p>
                    <small>Quantité : $product_quantity </small>
                    <small>Prix : $product_price".CURRENCY." </small>
                </div>
            </div>
            ";
        }
    }else echo 'num-rows inferieure a 0 <br>';
}else echo "result = false";

?>

<?php
require_once("../html/footer.html");
?>