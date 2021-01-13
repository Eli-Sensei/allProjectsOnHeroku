<?php
ini_set("display_errors", "");
ini_set("display_startup_errors", "1 ");
error_reporting(E_ALL);
// Génère une constante contenant le chemin vers la racine publique du projet 
define("ROOT", str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define("RACINE", str_replace('index.php', '', $_SERVER["SCRIPT_NAME"]));
// echo ROOT;

// appel le modèle et le controller 
require_once(ROOT . "app/Controller.php");
require_once(ROOT . "app/Model.php");

// on sépare les paramètres et on les met dans la tableau $params
$params = explode("/", $_GET['p']);

// si au moins un des parametre existe
if ($params[0] != "") {
    //sauvegarde le premier parametre dans $action s'il exsite, sinon index
    $controller = ucfirst($params[0]);
    //sauvegarde le deuxieme parametre dans $controller en mettant la 1ere lettre en majuscule
    $action = isset($params[1]) ? $params[1] : "index";
    // appel le controlleur
    require_once(ROOT . "controllers/" . $controller . ".php");
    // instancie le controlleur
    $controller = new $controller();

    if (method_exists($controller, $action)) {
        // controller = premier parametre, action egale la fonction du controller
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller, $action], $params);
        // appel la méthode
        // $controller->$action;
    }else {
        // Envoie du code réponse 404
        http_response_code(404);
        echo "La page recherchée n'éxiste pas";
    }
}else {
    // ici aucun parametre defini, on appel le controller par défaut
    require_once(ROOT . "controllers/Main.php");
    //isntancie le controlleur
    $controller = new Main();
    // appel la péthode index()
    $controller->index();
}