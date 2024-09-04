<?php

namespace App\Http\Guest\Helpers;
use libphonenumber\NumberParseException;

class PhoneHelper
{
    static function getCountryByPhone($phone)
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        try {
            $number = $phoneUtil->parse($phone, null);
            return $phoneUtil->getRegionCodeForNumber($number);
        } catch (NumberParseException $e) {
            throw new \Exception( "Unknown country by phone");
        }
    }
}
