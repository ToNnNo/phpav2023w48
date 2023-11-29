<?php 

namespace App\Animal;

abstract class Animal {

    public function manger(): string
    {
        return "L'animal mange";
    }

    public function boire(): string
    {
        return "L'animal boit";
    }

    abstract public function seDeplacer(): string;
}