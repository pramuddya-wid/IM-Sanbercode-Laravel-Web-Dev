<?php

require_once('animal.php');
require_once('ape.php');
require_once('frog.php');


$sheep = new animal("shaun");

echo "Name: " . $sheep->name . "<br>"; // "shaun"
echo "Legs: " . $sheep->legs . "<br>"; // 4
echo "Cold Blooded: " . $sheep->cold_blooded . "<br>"; // "no"

echo "<br>";

$frog = new frog("buduk");
echo "Name: " . $frog->name . "<br>";
echo "Legs: " . $frog->legs . "<br>";
echo "Cold Blooded: " . $frog->cold_blooded . "<br>";
echo "Jump: " . $frog->jump() . "<br>";

echo "<br>";

$ape = new ape("Kera Sakti");
echo "Name: " . $ape->name . "<br>";
echo "Legs: " . $ape->legs . "<br>";
echo "Cold Blooded: " . $ape->cold_blooded . "<br>";
echo "Jump: " . $ape->yell() . "<br>";





?>