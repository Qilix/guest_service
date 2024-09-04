<?php

namespace App\Http\Guest\Helpers;
use App\Http\Guest\DTOs\GuestCreateDTO;
use App\Http\Guest\DTOs\GuestUpdateDTO;

class CountryHelper
{
    static function getCountry(GuestUpdateDTO|GuestCreateDTO $dto)
    {
        if($dto->getCountry()){
            return $dto->getCountry();
        }else{
           return PhoneHelper::getCountryByPhone($dto->getPhone());
        }
    }
}
