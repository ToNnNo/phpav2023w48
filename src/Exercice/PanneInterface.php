<?php 

namespace App\Exercice;

interface PanneInterface
{
    public function reparer(): void;
    public function identifierPanne(): string;
}