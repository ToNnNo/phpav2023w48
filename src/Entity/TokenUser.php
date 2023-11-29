<?php

namespace App\Entity;

use App\Security\UserInterface;

class User implements UserInterface
{
    private int $id;

    private ?string $username = null;

    public function getUserIdentifier(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

}