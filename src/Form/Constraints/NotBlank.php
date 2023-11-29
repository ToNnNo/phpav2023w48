<?php

namespace App\Form\Constraints;

class NotBlank {

    private string $message = "Cette valeur ne peut pas être vide";

    public function validate($value): bool {
        // return true if value is not empty
        return !empty($value) && $value != "0";
    }

    public function getMessage(): string {
        return $this->message;
    }
}