<?php

namespace App\Form\Transformer;

class DateTimeTransformer
{
    public function transform(string $value): ?\DateTime
    {
        if(!empty($value)){
            return new \DateTime($value);
        }    
        
        return null;
    }
}