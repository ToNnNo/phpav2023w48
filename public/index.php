<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Animal\Baleine;
use App\Animal\Chat;
use App\Animal\Dragon;
use App\Entity\User;
use App\Runner\AnimalRunner;
use App\Security\Authenticator\UserAuthenticator;

$chat = new Chat();
$baleine = new Baleine();
$dragon = new Dragon();

/*echo __FILE__;
echo "<br />";
echo __DIR__;
echo "<br />";
echo $chat->seDeplacer();
echo "<br />";
echo $dragon->seDeplacer();
echo "<br />";
echo $baleine->seDeplacer();*/

echo "<h2>Classe Abstraite</h2>";

(new AnimalRunner())
    ->run($chat)
    ->run($baleine)
    ->run($dragon);
/*$runner = new AnimalRunner();
$runner
    ->run($chat)
    ->run($baleine)
    ->run($dragon);*/

echo "<hr />";

echo "<h2>Interface</h2>";

// Récupère les valeurs d'un formulaire
$user = new User();
$user->setUsername("toto");
$user->setPassword("P4ssW0rd");

$authenticator = new UserAuthenticator();
if(!$authenticator->supports($user)) {
    throw new \Exception("Bad Authenticator system");
}

try {
    $user = $authenticator->authenticate($user);
    // mettre l'utilisateur en session
    // redirection vers une page spéciale
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}