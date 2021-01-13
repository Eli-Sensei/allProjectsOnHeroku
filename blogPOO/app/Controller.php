<?php

abstract class Controller 
{

    public function loadModel(string $model)
    {
        // on va chercher le fichier corespondant au modèle souhaité
        require_once(ROOT . "models/" . $model . ".php");
        // Crée une instance de ce modèle
        $this->$model = new $model();
    }

    public function render(string $fichier, array $data = [])
    {
        // récupère les données et les extrait sous forme de variables
        extract($data);

        ob_start();
        
        // créer le chemin et inclut le fichier
        require_once(ROOT . "views/" . strtolower(get_class($this)) . '/' . $fichier . ".php");

        $content = ob_get_clean();

        require_once(ROOT . "views/layout/default.php");
    }
}
