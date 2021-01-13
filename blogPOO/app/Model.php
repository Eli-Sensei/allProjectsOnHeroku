<?php

abstract class Model  
{

    // information de la bdd
    private $host = "localhost";
    private $db_name = "blog";
    private $username = "root";
    private $password = "";
    //Propriéte qui contiendra l'instance de la connexion
    protected $_connexion;
    // Propriéte permettant de personnaliser les requetes
    public $table;
    public $id;

    /**
     * Fonction de connexion à la bdd
     */
    public function getConnection()
    {
        // On supprime la connection précédente
        $this->_connexion = null;
        // on essaie de se connecter à la bdd
        try{
            $this->_connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connexion->exec("set names utf8");

        } catch (PDOException $e){ 
            echo "Erreur de connexion: " . $e->getMessage();
        }
    }
    

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     */
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    /**
     * Méthode permettant d'obtenir un enregistrement de la table choisi en fonction de id 
     */
    public function getOne()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id_art = " . $this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();

        var_dump($query);
        $art = $query->fetch(PDO::FETCH_ASSOC);
        $this->id = $art['id_art'];
        return $art;
    }

    /**
     * Méthode pour suprmimer un article en fonctuion de l'id choisi
     */

     public function deleteOne()
     {
        $sql = "DELETE * FROM " . $this->table . " WHERE id = " . $this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();

        return $query->fetch();
     }

     public function updateOne(array $form)
     {
        // $up_article = $form["id"];
        /*
        $sql =
        'UPDATE `tp_accounts` SET 
        `username`="'.$_POST['editUsername'].'", 
        `email`="'.$_POST['editEmail'].'", 
        `password`="'.$_POST['editPassword'].'"
        WHERE `id_account` = '.$_GET['edit'].'';
        */

        $sql = 
        "UPDATE " . $this->table . " SET 
        'title' = '" . $form["title"] . "'
        'slug' = '" . $form['slug'] . "'
        'content_text' = '" . $form['content_text'] . "'
        WHERE 'id_art' = '" . $this->id . "'";

        $query = $this->_connexion->prepare($sql);
        $query->execute();

        return $query->fetch();
     }

     public function createOne($newForm)
     {
         /*
            $majSql =
            'INSERT INTO `tp_travels` VALUES ( NULL,
            "'.$trimedPost['editName'].'", 
            "'.$trimedPost['editDescription'].'", 
            "'.$trimedPost['editImageLink'].'", 
            "'.$trimedPost['editNbPerson'].'", 
            "'.$trimedPost['editNbWeek'].'", 
            "'.$trimedPost['editPrice'].'" )';
          */


     }
}