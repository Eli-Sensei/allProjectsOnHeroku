<?php

class User {
    // attribut
    // Toutes les autres classes peuvent voir et accèder a cette attribut (variables) ou méthode(fontion)
    public $name;
    // Seul la classe et ses sous-classes peuvent voir et accèder a cette attribut (variables) ou méthode(fontion)
    protected $email;
    // Seul la classe peut voir et accèder a cette attribut (variables) ou méthode(fontion)
    private $pwd;

    const PROUT = 'date("Ymd")';
    // $this::PROUT; pour appeller la fonction

    // attribut en static
    private static $counter = 0;

    public function __construct($name, $email, $pwd)
    {
        echo 'Appel du constructor <br>';
        $this->name = $name;
        $this->email = $email;
        $this->pwd = $pwd;

        self::$counter += 1;
    }

    // Accesseurs

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getName(){
        return $this->name;
    }
    
    public function setNAme($name){
        $this->name = $name;
    }

    public function getPwd(){
        return $this->pwd;
    }
    
    public function setPwd($pwd){
        $this->pwd = $pwd;
    }


    // function static function
    public static function func(){
        echo 'FUNCTION STATIC <br>';
    }

    public static function getCounter(){
        return self::$counter;
    }


    // méthodes
    function se_connecter(){

    }
    function se_deconnecter(){

    }
    function modifier_profil(){

    }
}

