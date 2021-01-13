<?php 
require_once './object.php';

$user = new User("Pet", "coco", "haha");
$user->setEmail("Abdoulaye");
// var_dump($user);

$user2 = new User("prout", "pet", "ok");
$user8 = new User("prout", "pet", "ok");
// var_dump($user2);

//function static appelé
$user::func();

echo "Nombre de User crée : " . User::getCounter();