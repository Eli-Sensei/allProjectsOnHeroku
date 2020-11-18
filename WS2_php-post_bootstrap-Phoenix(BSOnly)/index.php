<?php
require_once './header.html';



if(count($_GET) > 0){
    if(isset($_GET["page"])){
        if($_GET['page'] === "accueil"){
            require_once './accueil.html';
        }
        if($_GET['page'] === "catalogue"){
            require_once './catalogue.html';
        }
        if($_GET['page'] === "reservation"){
            require_once './reservation.html';
        }
        if($_GET['page'] === "confirmation"){
            require_once './confirmation.html';
        }
    }else{
        require_once './accueil.html';
    }
}else{
    require_once './accueil.html';
}


require_once './footer.html';