<?php

namespace App\Runner;

use App\Animal\Animal;

class AnimalRunner
{
    public function run(Animal $animal): self
    {
        // afficher boire()
        echo $animal->boire() . "<br />";
        // afficher manger()
        echo $animal->manger() . "<br />";
        // afficher seDeplace()
        echo $animal->seDeplacer() . "<br />";

        return $this;
    }
}