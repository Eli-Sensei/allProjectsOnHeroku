<?php
require_once "model.php";

$lion = new Animal('Arthur', "brown", 180, "lion");
$cat = new Animal('Tom', "blue", 12, "chat");
$mouse = new Animal('Jerry', "yellow", 0.7, "souris");
$toucan = new Animal('Jack', "orange", 1, "toucan");


$lion->eat($cat);

$mouse->move();
$lion->move();
$toucan->move();

$nemours = new Ville("Namours", "Il de France");
$paris = new Ville("Paris", "Il de France");
$fremainville = new Ville('Fremainville', "Valdoise");

echo "<br>";

$nemours->displayInfo();
$paris->displayInfo();
$fremainville->displayInfo();

echo "<br>";

$jean = new Person("Jean", "Philipe", "");

$jean->setAdress(" 6 rue malvomi(malsherbe) 342545");

$jean->getPersonne();

echo "<br>";

$puma = new Felin("Adidas", "pink", 120, "puma");

echo $puma->getName() . " est un " . $puma->getBreed() . " de " . $puma->getWeight() . "kg <br>";
$puma->move();

$puma->eat($cat);

echo "<br>";

$voiture = new Vehicule("voiture", "nissan", "gazoil", 5, 4);

$avion = new Avion("avion", "airbus", "kerozen", 2, 6, true);

$bateau = new Bateau("bateau", "lagoon", "fioul soute", 970, 0, true);

$voiture->roll();
$avion->roll();
$bateau->roll();




echo "<br>";