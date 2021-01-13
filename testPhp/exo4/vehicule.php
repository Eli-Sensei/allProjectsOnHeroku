<?php

abstract class Vehicule{
    private $couleur;
    private $poids;
    private $nombre_pneu_neige;
    private $longueur;

    private const SAUT_DE_LIGNE = "<br>";

    private static $nombre_changement = 0;

    public function __construct($couleur, $poids)
    {
        $this->couleur = $couleur;
        $this->poids = $poids;
    }

    // acceseur 

    //     GET

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getPoids()
    {
        return $this->poids;
    }

    public function getNombre_pneu_neige()
    {
        return $this->nombre_pneu_neige;
    }


    //     SET

    public function setCouleur($value)
    {
        $this->couleur = $value;
        self::$nombre_changement += 1;
    }

    public function setPoids($value)
    {
        if ($value > 2100) {
            # poid max 2100
            $value = 2100;
        }
        $this->poids = $value;
    }

    public function setNombre_pneu_neige($value)
    {
        $this->nombre_pneu_neige = $value;
    }



    // méthodes

    final public function rouler()
    {
        echo 'Je roule... c: <br>';
    }

    public function ajouter_personne($poids)
    {
        $this->poids += $poids;
        echo "Une personne de $poids Kg est montée, le véhicule pèse mtn $this->poids kg <br>";
    }

    public function repeindre($couleur)
    {
        echo "je change ma couleur en $couleur <br>";
        $this->couleur = $couleur;
    }

    public function mettre_essence($litre)
    {
        // 1 litre = 1kg
        $this->poids += $litre;
        echo "Je met $litre L d'essence à ma moto <br>";
    }

    public function ajouter_pneu_neige($nb_pneu)
    {
        $this->nombre_pneu_neige += $nb_pneu;
        echo "J'ajoute $nb_pneu pneu neige à mon véhicule    <br>";
    }

    public function enlever_pneu_neige($nb_pneu)
    {
        $this->nombre_pneu_neige -= $nb_pneu;
        echo "J'enleve $nb_pneu pneu neige à ma voiture <br>";
    }

    public function ajouter_remorque($longueur)
    {
        $this->longueur += $longueur;
        echo "J'ajoute une remorque de $longueur m à mon camion <br>";
    }

    public static function afficher_attribut($object){
        
        $attributs = get_object_vars($object);

        if (count($attributs) > 0) {
            # si il y'a au moins un attribut
            echo "Les attributs : " . self::SAUT_DE_LIGNE;;

            foreach ($attributs as $key => $value) {
                if (isset($value)) {
                    # si un attribut qui a une valeur 
                    echo "$key => $value " . self::SAUT_DE_LIGNE;;
                }
            }
            
            echo "nombre fois qu'une couleur a été changé : " . self::$nombre_changement;

        }else {
            # si aucun attribut a été trouvé
            echo "aucun attribut trouvé " . self::SAUT_DE_LIGNE;;
        }
        
    }
}

///////////////////////////////////////////////////////////////////////////

class Deux_roues extends Vehicule
{
    private $cylindree;

    public function __construct($couleur, $poids, $cylindree){
        parent::__construct($couleur, $poids);
        
        $this->cylindree = $cylindree;
    }

    // accesseur
    
    public function getCylindree()
    {
        return $this->cylindree;
    }

    public function setCylindree($value)
    {
        $this->cylindree = $value;
    }


    // méthodes

    public function ajouter_personne($poids)
    {
        $this->setPoids($this->getPoids() + 2);
        parent::ajouter_personne($poids);
    }

    // public function mettre_essence($litre)
    // {
    //     echo "Je met $litre L d'essence à ma moto <br>";
    // }
}



///////////////////////////////////////////////////////////////////////////


class Quatre_roues extends Vehicule
{
    private $nombre_porte;

    public function __construct($couleur, $poids, $nombre_porte){
        parent::__construct($couleur, $poids);
        
        $this->nombre_porte = $nombre_porte;
    }

    // accesseur
    
    public function getNombre_porte()
    {
        return $this->nombre_porte;
    }

    public function setNombre_porte($value)
    {
        $this->nombre_porte = $value;
    }


    // méthodes

    public function repeindre($couleur)
    {
        echo "je change ma couleur en $couleur  <br>";
        $this->couleur = $couleur;
    }

}



///////////////////////////////////////////////////////////////////////////


class Voiture extends Quatre_roues 
{
    private $nombre_pneu_neige;

    public function __construct($couleur, $poids, $nombre_porte, $nombre_pneu_neige){
        parent::__construct($couleur, $poids, $nombre_porte);
        
        $this->nombre_pneu_neige = $nombre_pneu_neige;
    }

    // accesseur
    
    public function getNombre_pneu_neige()
    {
        $this->nombre_pneu_neige;
    }

    public function setNombre_pneu_neige($value)
    {
        $this->nombre_pneu_neige = $value;
    }


    // méthodes

    public function ajouter_pneu_neige($nb_pneu)
    {
        echo "J'ajoute $nb_pneu pneu neige à ma voiture <br>";
        $this->nombre_pneu_neige += $nb_pneu;
    }

    public function enlever_pneu_neige($nb_pneu)
    {
        echo "J'enleve $nb_pneu pneu neige à ma voiture <br>";
        $this->nombre_pneu_neige -= $nb_pneu;
    }

    public function ajouter_personne($poids)
    {
        parent::ajouter_personne($poids);

        if ($this->getPoids() >= 1500 && $this->nombre_pneu_neige <= 2) {
            # si el poids est inférieurea  1500 et qu'il y moins de 2 roues
            echo "Attenion, veuillez mettre 4 pneus neige. <br>";
        }
        
    }
}


///////////////////////////////////////////////////////////////////////////

class Camion extends Quatre_roues implements Action
{
    private $longueur;

    public function __construct($couleur, $poids, $nombre_porte, $longueur){
        parent::__construct($couleur, $poids, $nombre_porte);
        
        $this->longueur = $longueur;
    }

    // accesseur
    public function getLongueur()
    {
        return $this->longueur;
    }

    public function setLongueur($value)
    {
        $this->longueur = $value;
    }


    // méthodes

    public function ajouter_remorque($longueur)
    {
        echo "J'ajoute une remorque de $longueur m à mon camion <br>";
        $this->longueur += $longueur;
    }

    public function mettre_essence($litre): void
    {
        echo "Je met $litre L d'essence à mon camion <br>";
    }
}


// EXO 17 FINI


interface Action{
    public function mettre_essence(int $nombre_litre): void;
}