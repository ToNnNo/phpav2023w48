<?php 

namespace App\Company\AddressFormatter;

use App\Company\Address;

class FrenchAddressFormatter implements AddressFormatterInterface
{
    public static function format(Address $address): string
    {
        $format = $address->getStreet() . "<br />" .
        $address->getZipCode() ." ". $address->getCity(); 
        
        if( $address->getCountry() != null ) {
            $format .= "<br />" .$address->getCountry();
        }

        return $format;
    }
}