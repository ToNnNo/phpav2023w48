<?php 

namespace App\Company\AddressFormatter;

use App\Company\Address;

class USAddressFormatter implements AddressFormatterInterface
{
    public static function format(Address $address): string
    {
        $format = $address->getStreet() . "<br />" .
        $address->getCity() ." ". $address->getState() . " " . $address->getZipCode(); 
        
        if( $address->getCountry() != null ) {
            $format .= "<br />" .$address->getCountry();
        }

        return $format;
    }
}