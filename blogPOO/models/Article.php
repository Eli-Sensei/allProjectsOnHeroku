<?php

class Article extends Model 
{
    public function __construct()
    {
        // on défini la tavle par défaut de ce modèle
        $this->table = "table_article";
        // Ouvre la connecion à la bdd
        $this->getConnection();
    }

    public function findBySlug(string $slug)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE slug='" . $slug . "'";
        $query = $this->$this->_connexion->prepare($sql);
        $query->execute();

        
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
