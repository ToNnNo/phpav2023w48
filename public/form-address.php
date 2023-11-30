<?php 
use App\Company\Address;
use App\Constraint\NotBlank;
use App\Validator\Validator;

require_once dirname(__DIR__) . "/vendor/autoload.php";

// créer le formulaire pour une adresse
// tester si le formulaire a été envoyé
// créer une instance d'adresse avec les valeurs du formulaire
// valider les champs d'adresse
//  - obligatoire: street, city, zipcode

$address = new Address();
$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $address
        ->setStreet(trim($_POST['street']) ?? null)
        ->setCity(trim($_POST['city']) ?? null)
        ->setZipCode(trim($_POST['zipCode']) ?? null)
        ->setCountry(trim($_POST['country']) ?? null)
    ;

    $validations = [
        'street' => [new NotBlank()],
        'city' => [new NotBlank()],
        'zipCode' => [new NotBlank()],
    ];

    $validator = new Validator();
    $errors = $validator->validate($address, $validations);

    /*$contraint = new NotBlank();

    // $value = $address->getStreet();

    $attribute = 'street';
    $method = "get" . ucfirst($attribute);
    $value = call_user_func_array([$address, $method], []);
    if(!$contraint->validate($value)) {
        $errors[$attribute][] = $contraint->getMessage();
    }

    if(!$contraint->validate($address->getCity())) {
        $errors['city'][] = $contraint->getMessage();
    }

    if(!$contraint->validate($address->getZipCode())) {
        $errors['zipCode'][] = $contraint->getMessage();
    }*/
}

require_once dirname(__DIR__) . "/template/address/formulaire.phtml";