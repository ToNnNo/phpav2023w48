<?php 

namespace App\Security;

interface UserPasswordInterface
{
    public function getPassword(): ?string;
}