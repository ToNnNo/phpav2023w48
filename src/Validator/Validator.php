<?php 

namespace App\Validator;

class Validator 
{
    private array $errors = [];

    public function validate(mixed $object, array $validations): array
    {
        foreach ($validations as $attribute => $constraints) {
            $method = "get" . ucfirst($attribute);
            $value = call_user_func_array([$object, $method], []);

            foreach ($constraints as $constraint) {
                if(!$constraint->validate($value)) {
                    $this->errors[$attribute][] = $constraint->getMessage();
                }
            }
        }

        return $this->errors;
    }
}