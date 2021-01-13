<?php

class Ville{

    private $name;
    private $department;

    public function __construct($name, $department)
    {
        $this->name = $name;
        $this->department = $department;
    }

    // les méthodes
    public function displayInfo(){
        echo "La ville " . $this->name . " est dans le département " . $this->department . "<br>";
    }
}


class Person{
    
    private $firstname;
    private $lastname;
    private $adress;

    public function __construct($firstname, $lastname, $adress)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->adress = $adress;
    }

    // méthodes

    public function getPersonne(){
        echo $this->firstname . " " . $this->lastname . " /// " . $this->adress . "<br>";
    }
    public function setAdress($adress){
        $this->adress = $adress;
    }



    public function __destruct()
    {
        echo 'DESTRUCTION ! de ' . $this->firstname . ' (je savais pas que le destruc s\'appelait a chaque new :sueur:)';
    }

}


/////////////////////////////-----ANIMAL----/////////////////////////////////////////

class Animal {
    private $name;
    private $color;
    private $weight;
    private $breed;

    public function __construct($name, $color, $weight, $breed)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
        $this->breed = $breed;
    }

    // accecseur
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function setWeight($weight){
        $this->weight = $weight;
    }

    public function getBreed(){
        return $this->breed;
    }

    public function setBreed($breed){
        $this->breed = $breed;
    }


    // les méthodes

    public function move(){
        echo "le(la) " . $this->breed . ' ' . $this->name . " se déplace ! <br>";
    }

    public function eat($what){

        if($this->weight > $what->getWeight()){
            echo "le(la) " . $this->breed . ' ' . $this->name . " a mangé le(la) " . $what->getBreed() . ' ' . $what->getName() . "<br>";
            $this->weight += $what->getWeight();

            $what->death($what);

        }else {
            echo "le(la) " . $this->breed . ' ' . $this->name . " n'a pas pu manger le(la) " . $what->getBreed() . ' ' . $what->getName() . "<br>";
        }
    }

    public function death($what){
        echo "le(la) " . $what->getBreed() . ' ' . $what->getName() . " est mort ! <br>";
    }
}

class Felin extends Animal
{
    private $vivant_jungle;

    // accecseur

    public function getVivantJungle()
    {
        
        if ($this->vivant_jungle === true) {
            echo "vivant dans la jungle <br>";

        }elseif ($this->vivant_jungle === false) {
            echo "Ne vivant pas dans la jungle <br>";

        }
        return $this->vivant_jungle;
    }

    public function setVivantJungle($bool)
    {
        $this->vivant_jungle = $bool;
    }

    // substitution
    public function eat($what){
        parent::eat($what);
        echo "Trkl chui juste la substitution de la function eat de Animal <br>";
        
    }
}


/////////////////////////////////////---------- VEHICULE ---------- //////////////////////

class Vehicule{
    private $type;
    private $mark;
    protected $motor;
    private $door;
    private $wheel;

    public function __construct($type, $mark, $motor, $door, $wheel)
    {
        $this->type = $type;
        $this->mark = $mark;
        $this->motor = $motor;
        $this->door = $door;
        $this->wheel = $wheel;
    }

    // acceseur 

    //     GET

    public function getType()
    {
        return $this->type;
    }

    public function getMark()
    {
        return $this->mark;
    }

    public function getMotor()
    {
        return $this->motor;
    }

    public function getDoor()
    {
        return $this->door;
    }

    public function getWheel()
    {
        return $this->wheel;
    }

    //     SET

    public function setType($value)
    {
        $this->type = $value;
    }

    public function setMark($value)
    {
        $this->mark = $value;
    }

    public function setMotor($value)
    {
        $this->motor = $value;
    }

    public function setDoor($value)
    {
        $this->door = $value;
    }

    public function setWheel($value)
    {
        $this->wheel = $value;
    }


    // méthodes

    public function roll()
    {
        if($this->wheel > 0){
            echo "Le " . $this->type . ' ' . $this->mark . " commence à rouler <br>";
            
        }else {
            echo "Le véhicule " . $this->type . ' ' . $this->mark . " ne peut pas rouler car il n'a pas de roue :( <br>";
        }
    }
}

class Avion extends Vehicule
{
    private $can_fly;

    
    // La substitution
    public function __construct($type, $mark, $motor, $door, $wheel, $can_fly)
    {
        parent::__construct($type, $mark, $motor, $door, $wheel);
        $this->can_fly = $can_fly;
    }

    // accesseur

    public function getCanFly()
    {
        return $this->can_fly;
    }

    public function setCanFly($bool)
    {
        $this->can_fly = $bool;
    }
}

class Bateau extends Vehicule
{
    private $can_navigate;
    
    // La substitution
    public function __construct($type, $mark, $motor, $door, $wheel, $can_navigate)
    {
        parent::__construct($type, $mark, $motor, $door, $wheel);
        $this->can_navigate = $can_navigate;

    }

    // accesseur

    public function getCanNavigate()
    {
        return $this->can_navigate;
    }

    public function setCanNavigate($bool)
    {
        $this->can_navigate = $bool;
    }
}



///             EXO      //////

