<?php

namespace App\Company\AddressFormatter;

use App\Company\Address;

interface AddressFormatterInterface
{
    public static function format(Address $address): string;
}