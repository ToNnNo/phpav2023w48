<?php

namespace App\Entity;

use App\Security\UserInterface;
use App\Security\UserPasswordInterface;

class User implements UserInterface, UserPasswordInterface
{
    private int $id;

    private ?string $username = null;

    private ?string $password = null;

    public function getUserIdentifier(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

}