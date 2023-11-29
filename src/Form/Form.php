<?php

namespace App\Form;

class Form {

    private mixed $data;

    private array $formData = [];

    private array $constraints;

    private array $errors = [];

    public function __construct(mixed $data = null, array $constraints = [])
    {
        if(is_array($data) || is_object($data)) {
            $this->data = $data;
        }

        if($data == null){
            $this->data = [];
        }

        $this->constraints = $constraints;
    }

    public function handleRequest(array $transformer = []): void
    {
        if($this->isSubmitted()) {
            $this->formData = $_POST;

            if(is_array($this->data)) {
                $this->data = $this->formData;
                return;
            }

            if(is_object($this->data)) {
                foreach($this->formData as $field => $value) {
                    if(array_key_exists($field, $transformer)) {
                        $transformer = new $transformer[$field]();
                        $value = $transformer->transform($value);
                    }

                    $setter = "set". ucfirst($field);
                    if(method_exists($this->data, $setter)) {
                        call_user_func_array([$this->data, $setter], [$value]); 
                    }
                }
            }

            $this->validateForm();
        }
    }

    public function validateForm(): void
    {
        foreach($this->constraints as $field => $constraints) {
            $getter = "get". ucfirst($field);
            $value = call_user_func([$this->data, $getter]);

            foreach($constraints as $constraint) {
                if(!$constraint->validate($value)) {
                    $this->errors[$field][] = $constraint->getMessage();
                }
            }
        }
    }

    public function isSubmitted(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public function isValid(): bool
    {
        return count($this->errors) == 0;
    }

    public function getDatas(): mixed
    {
        return $this->data;
    }

    public function getData(string $field): ?string
    {
        return $this->formData[$field] ?? null;
    }

    public function hasError(string $field): bool 
    {    
        return array_key_exists($field, $this->errors) && count($this->errors[$field]) > 0; 
    }

    public function getErrors(string $field): ?array
    {
        if($this->hasError($field)) {
            return $this->errors[$field];
        }

        return null;
    }
}