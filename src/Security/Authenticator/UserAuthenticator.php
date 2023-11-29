<?php

namespace App\Security\Authenticator;

use App\Entity\User;
use App\Security\UserInterface;
use App\Security\UserPasswordInterface;

class UserAuthenticator
{
    public function supports(UserInterface $user): bool
    {
        return $user instanceof User;
    }
    
    public function authenticate(UserInterface $user): User 
    {
        // Vérifier que l'utilisateur existe en base
        $sql = "SELECT * FROM user where username = :username";
        $result = ['username' => 'user', 'password' => "..."];

        // si $result == null
        if(!$result) {
            throw new \Exception("Erreur d'authentification");
        }

        if(!$user instanceof UserPasswordInterface) {
            throw new \Exception("Method getPassword() not found");
        }

        // Vérifier si le mot de passe correspond
        if(!password_verify($user->getPassword(), $result['password'])) {
            throw new \Exception("Erreur d'authentification");
        }

        // ajoute dans la classe User nom, prenom, email, etc ...
        // et on le retourne
        return $user;
    }
}