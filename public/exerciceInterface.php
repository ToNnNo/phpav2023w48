<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Exercice\GarageAuto;
use App\Exercice\Voiture;

// Créer une classe Voiture (marque, modele)
// Une Voiture peut fonctionner correctement ou être en panne

// Quand une Voiture est en panne, la panne doit être affichable, et peut être réparée dans un GarageAuto 

// Une Voiture ne peut être déposé dans un GarageAuto que si le GarageAuto peut identifier la panne

// Après être sorti du GarageAuto, nous devons plus voir la panne

$voiture = new Voiture("Citroen", "DS3");
$garage = new GarageAuto();
// roule ... 
echo "La voiture roule<br />";
$voiture->setPanne("Pneu crevé");
echo "La voiture est en panne: (".$voiture->identifierPanne().")<br />";

echo "La voiture va au garage<br />";
$garage->repare($voiture);

echo "La voiture est réparé !<br />";
echo $voiture->identifierPanne();