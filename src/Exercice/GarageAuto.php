<?php

namespace App\Exercice;

class GarageAuto
{

    public function repare(PanneInterface $voiture): void
    {
        echo "Panne identifiée: " . $voiture->identifierPanne()."<br />";
        echo "Le garagiste répare la voiture<br />";
        $voiture->reparer();
    }

}