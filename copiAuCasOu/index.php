<?php
require_once './php/header.php';
require_once './php/sql.php';



if(count($_GET) > 0){
    if(isset($_GET["page"])){
        if($_GET['page'] === "accueil"){
            require_once './php/accueil.php';
        }else echo '<link rel="stylesheet" href="./assets/css/style-header.css">';

        // if (count($_SESSION) !== 4) {
        //     $_GET['page'] = "login";
        // }

        if ($_GET['page'] === "catalogue" || $_GET['page'] === "reservation" || $_GET['page'] === "confirmation" || $_GET['page'] === "login" || $_GET['page'] === "logout" || $_GET['page'] === "register") {
            
            require_once "./php/".$_GET['page'].".php";
        }

        // if(){
        //     require_once './php/catalogue.php';
        // }
        // if($_GET['page'] === ""){
        //     require_once './php/reservation.php';
        // }
        // if($_GET['page'] === ""){
        //     require_once './php/confirmation.php';
        // }
        // if($_GET['page'] === "login"){
        //     require_once './php/login.php';
        // }
        // if($_GET['page'] === "logout"){
        //     require_once './php/logout.php';
        // }
        // if(){
        //     require_once './php/register.php';
        // }
        
    }else{
        require_once './php/accueil.php';
    }
}else{
    require_once './php/accueil.php';
}
require_once './php/footer.php';
