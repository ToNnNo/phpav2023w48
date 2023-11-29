<?php
require_once dirname(__DIR__) . "/vendor/autoload.php";

use App\Company\Customer;
use App\Form\Constraints\NotBlank;
use App\Form\Form;
use App\Form\Transformer\DateTimeTransformer;

// vérifier que le formulaire a bien été soumis

// mettre les valeurs du formulaire dans l'objet
// si dans le formulaire la valeur est vide, alors on affecte null
// $_POST['..'] ?? null

// vérifier la validité des valeurs (contrainte)

/*$customer = new Customer();
$form = new Form($customer, [
    "firstname" => [new NotBlank()],
    "lastname" => [new NotBlank()]
]);
$form->handleRequest(['birthday' => DateTimeTransformer::class]);

if ($form->isSubmitted() && $form->isValid()) {
    echo "<pre>";
    var_dump($customer);
    echo "</pre>";
}

require dirname(__DIR__) . "/template/client/formulaire.phtml";*/

/**
 * $errors = [
 *      'firstname' => [
 *          0 => 'Cette valeur ne peut pas être vide', 
 *          1 => 'Cette valeur doit comporter plus de 1 caractère'
 *      ],
 *      'lastname' => [
 *          'Cette valeur ne peut pas être vide', 
 *      ]
 * ]
 */


$client = new Customer();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $client
        ->setFirstname(trim($_POST['firstname']) ?? null)
        ->setLastname(trim($_POST['lastname']) ?? null)
        ->setEmail(trim($_POST['email']) ?? null)
        ->setPhone(trim($_POST['phone']) ?? null)
        ->setBirthday(!empty($_POST['birthday']) ? new \DateTime(trim($_POST['birthday'])) : null);

    if(empty($client->getFirstname())) {
        $errors['firstname'][] = 'Cette valeur ne peut pas être vide';
    }

    if(strlen($client->getFirstname()) <= 1) {
        $errors['firstname'][] = 'Cette valeur doit comporter plus de 1 caractère';
    }

    if(empty($client->getLastname())) {
        $errors['lastname'][] = 'Cette valeur ne peut pas être vide';
    }
}

require dirname(__DIR__) . "/template/client/edit.phtml";