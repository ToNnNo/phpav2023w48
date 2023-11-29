<?php

namespace App\Entity;
use App\Security\UserInterface;

class AdminUser implements UserInterface
{
    public function getUserIdentifier(): ?string
    {
        return "admin";
    }

    public function getPassword(): ?string
    {
        return "P4ssw0rdTr3s5ecr3t";
    }
}