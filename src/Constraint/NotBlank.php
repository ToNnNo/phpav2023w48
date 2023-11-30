<?php 

namespace App\Constraint;

class NotBlank {

    private string $message = "Cette valeur ne peut pas être vide";

    public function __construct(string $message = null) 
    {
        if(null != $message) {
            $this->message = $message;
        }
    }

    public function validate($value): bool
    {
        if(!empty($value) && $value !== "0") {
            return true;
        }

        return false;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}