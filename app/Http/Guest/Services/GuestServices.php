<?php

namespace App\Http\Guest\Services;

use App\Http\Guest\DTOs\GuestCreateDTO;
use App\Http\Guest\Helpers\CountryHelper;
use App\Http\Guest\Helpers\PhoneHelper;
use App\Http\Guest\Resources\GuestIndexResource;
use App\Http\Guest\Resources\GuestResource;
use App\Models\Guest;

class GuestServices
{
    public function index()
    {
        return GuestIndexResource::collection(Guest::all());
    }

    public function store($dto)
    {
        $guest = new Guest();

        $guest->name = $dto->getName();
        $guest->second_name= $dto->getSecondName();
        $guest->phone = $dto->getPhone();
        $guest->email = $dto->getEmail();
        $guest->country = CountryHelper::getCountry($dto);

        $guest->save();

        return $guest;
    }
    public function show(Guest $guest)
    {
        return GuestResource::make($guest);
    }

    public function update($dto, $guest)
    {
        $guest->name = $dto->getName();
        $guest->second_name= $dto->getSecondName();
        $guest->phone = $dto->getPhone();
        $guest->email = $dto->getEmail();
        $guest->country = CountryHelper::getCountry($dto);

        $guest->save();

        return $guest;
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
    }
}
