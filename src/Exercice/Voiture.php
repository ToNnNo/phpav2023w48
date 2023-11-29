<?php 

namespace App\Exercice;

class Voiture implements PanneInterface
{
    private ?string $panne = null; // ?string => soit une chaine de carac., soit null

    public function __construct(
        private string $marque,
        private string $modele
    )
    {
    }

    public function getMarque(): string
    {
        return $this->marque;
    }

    public function getModele(): string
    {
        return $this->modele;
    }

    public function setPanne(string $panne): self
    {
        $this->panne = $panne;
        return $this;
    }

    public function reparer(): void
    {
        $this->panne = null;
    }

    public function identifierPanne(): string
    {
        if($this->panne != null){
            return $this->panne;
        }

        return "Aucune panne détecté";
    } 
}