<?php
//Funtie: Hoodprogramma webshop fruit
// Auteur:Abdul

//initiallsatie
include_once "Fruit.php";

//Main

//Maak een object banaam op basis van de classdefinitie Fruit
$banaan = new Fruit();
$banaan->naam = "Banaan";
$banaan->setPrijs(2.0);
var_dump($banaan);
echo "<br>";

//Maak een tweede object appel opbasis van de classdefinitie Fruit
$appel = new Fruit();
$appel->naam = "Elstar";
var_dump($appel);

?>