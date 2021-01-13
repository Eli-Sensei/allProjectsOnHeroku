<?php

require_once './String.php';

$String = new Str;

echo $String->length("Salut");
echo '<br>';

echo $String->charAt("Salut", 2);
echo '<br>';
echo $String->indexOf("Salut algerie alo", "al");
echo '<br>';

var_dump($String->split(" ", "yo les mamout"));
echo '<br>';
echo $String->toUpperCase("ok prout upper");
echo '<br>';
echo $String->toLowerCase($String->toUpperCase("ce text va etre en minuscule"));

