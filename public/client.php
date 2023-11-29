<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Company\Address;
use App\Company\Customer;
use App\Company\Order;

function formatDate(DateTimeInterface $date): string 
{
    $formatter = \IntlDateFormatter::create("fr", \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
    return $formatter->format($date);
}

function currency(float $value): string
{
    $formatter = new \NumberFormatter("fr", \NumberFormatter::CURRENCY);
    return $formatter->formatCurrency($value, "EUR");
}

// Créer un Client avec un nom, un prenom, une adresse email, un numéro de téléphone
// On peut afficher le nom complet du Client

// Ajouter une Adresse postal à la classe Client
// rue, code postal, ville, pays
// Afficher l'adresse du client !!

$customer = new Customer();
$customer
    ->setFirstname("John")
    ->setLastname("Doe")
    ->setEmail("john.doe@gmail.com")
    ->setPhone("06 118 218 00")
    ->setBirthday(new \DateTime("1990-06-15"))
;

$address = new Address();
/*$address
    ->setStreet("256 avenue de la marne")
    ->setZipCode("59800")
    ->setCity("Lille")
    ->setCountry("France")
;*/
$address
    ->setStreet("1600 Amphitheatre Parkway")
    ->setCity("Mountain View")
    ->setState("CA")
    ->setZipCode("94043")
    ->setCountry("Etats-Unis")
;

// aggregation
$customer->setAddress($address);

// définir les valeurs de la TVA (20, 10) dans des constantes
// créer une classe Commande (reference, Client, date, totalHT, TVA)
// calculer le montant TTC

$order1 = new Order();
$order1
    ->setReference("#ORDER2023-1001")
    ->setCustomer($customer)
    ->setDate(new \DateTimeImmutable())
    ->setTotalHT(100);

$order2 = new Order();
$order2
    ->setReference("#ORDER2023-1002")
    ->setCustomer($customer)
    ->setDate(new \DateTimeImmutable())
    ->setTotalHT(999.99);

$customer
    ->addOrder($order1)
    ->addOrder($order2)
;

require __DIR__ . "/../template/client/index.phtml";