<?php
require_once './includes/header.php';


if (isset($_GET['action'])) {
    # si action existe
    if ($_GET['action'] === "resultat_1") {
        # on affiche resultat 1
        require_once './views/resultat_1.html';
    }
}else {
    require_once './views/resultat_1.html';
}


require_once './includes/footer.php';