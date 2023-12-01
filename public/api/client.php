<?php

$method = $_SERVER["REQUEST_METHOD"];

$response = match($method) {
    'GET' => getListClient(),
    'POST' => insertClient(),
};

header("Content-Type: application/json");
echo $response;

function getListClient(): string { 

    // récupérer les valeurs dans la base de données
    $clients = [
        [
            "id" => 1, "firstname" => "John", "lastname" => "Doe", "email" => "john.doe@gmail.com", 
            "phone" => "06 118 218 01", "birthday" => (new DateTime("1980-06-15"))
        ],
        [
            "id" => 2, "firstname" => "Jane", "lastname" => "Doe", "email" => "jane.doe@gmail.com", 
            "phone" => "06 118 218 12", "birthday" => new DateTime("1976-01-20")
        ],
        [
            "id" => 3, "firstname" => "Eduard", "lastname" => "Doe", "email" => "eduard.doe@gmail.com", 
            "phone" => "06 118 218 99", "birthday" => new DateTime("2001-07-20")
        ],
    ];

    http_response_code(200);
    return json_encode($clients);
}

function insertClient(): string { 
    $requestBody = file_get_contents("php://input");
    $data = json_decode($requestBody, true);

    if(empty($data['firstname'])) {
        http_response_code(400);
        return json_encode(['error' => ['firstname' => "Cette valeur ne peut pas être vide"]]);
    }

    if(empty($data['lastname'])) {
        http_response_code(400);
        return json_encode(['error' => ['lastname' => "Cette valeur ne peut pas être vide"]]);
    }

    $data = array_merge(["id" => 4], $data);

    http_response_code(201);
    return json_encode($data);
}