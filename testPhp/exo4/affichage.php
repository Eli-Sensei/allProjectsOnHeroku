<?php

require_once './vehicule.php';

$br = "<br>";

/*
$moto = new Deux_roues("noir", 120, 50);

$voiture = new Voiture("bleu", 250, 5, 4);

$camion = new Camion("blanc", 1800, 2, 20);

$moto->mettre_essence(15);

$voiture->ajouter_pneu_neige(1);
$voiture->enlever_pneu_neige(4);
$voiture->ajouter_personne(15);

$camion->ajouter_remorque(20);
*/

/*
echo "$br Voiture noir $br";

$car_noir = new Vehicule("noir", 1500);
$car_noir->ajouter_personne(70);
echo "Le poid du véhicule est de : " . $car_noir->getPoids() . "Kg <br>";

echo "$br Voiture vert $br";

$car_vert = new Vehicule("vert", 1400);
$car_vert->ajouter_personne(65);
$car_vert->ajouter_personne(65);
echo "Le poid du véhicule est de : " . $car_vert->getPoids() . "Kg, sa couleur est : " . $car_vert->getCouleur() ." <br>";
$car_vert->setCouleur("rouge");
$car_vert->ajouter_pneu_neige(2);
echo "La couleur du véhicule est : " . $car_vert->getCouleur() .", le nombre de pneu neige est : " . $car_vert->getNombre_pneu_neige() . " <br>";

echo "$br Moto noir $br";

$moto_noir = new Deux_roues("noir", 120, 125);
$moto_noir->ajouter_personne(80);
$moto_noir->mettre_essence(20);
echo "La couleur de la moto est : " . $moto_noir->getCouleur() . ", son poid est de : " . $moto_noir->getPoids() . "kg $br";

$camion_bleu = new Camion("bleu", 10000, 2, 10);
$camion_bleu->ajouter_remorque(5);
$camion_bleu->ajouter_personne(80);
echo "La couleur du camion est : " . $camion_bleu->getCouleur() . ", son poid est de : " . $camion_bleu->getPoids() . "sa longeur est : " . $camion_bleu->getLongueur() . 'm, nombre de porte : ' . $camion_bleu->getNombre_porte();
*/

$rouge_150 = new Deux_roues("rouge", 150, 100);
$rouge_150->ajouter_personne(70);
echo "Poid de la moto rouge : " . $rouge_150->getPoids() . "kg $br";
$rouge_150->setCouleur("vert");
$rouge_150->setCylindree(1000);
Vehicule::afficher_attribut($rouge_150);

$camion_blanc = new Camion("blanc", 6000, 0, 0);
$camion_blanc->ajouter_personne(84);
$camion_blanc->setCouleur("bleu");
$camion_blanc->setNombre_porte(2);
Vehicule::afficher_attribut($camion_blanc);

echo "$br $br";

$car_vert = new Voiture("vert", 2100, 4, 0);
$car_vert->ajouter_pneu_neige(2);
$car_vert->ajouter_personne(80);
$car_vert->setCouleur("bleu");
$car_vert->enlever_pneu_neige(4);
$car_vert->repeindre('noir');
Vehicule::afficher_attribut($car_vert);

echo "$br $br";

$camion_bleu = new Camion("bleu", 10000, 2, 0);
$camion_bleu->setLongueur(10);
$camion_bleu->mettre_essence(100);
$camion_bleu->setCouleur('vert');
Vehicule::afficher_attribut($camion_bleu);

