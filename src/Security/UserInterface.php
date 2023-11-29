<?php 

namespace App\Security;

interface UserInterface
{
    public function getUserIdentifier(): ?string;

    // public function getPassword(): ?string;
}