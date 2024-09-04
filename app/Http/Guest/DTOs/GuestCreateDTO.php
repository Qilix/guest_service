<?php


namespace App\Http\Guest\DTOs;

class GuestCreateDTO
{
    private string $name;
    private ?string $second_name;
    private ?string $phone;
    private ?string $email;
    private ?string $country;

    public function __construct(
        string $name,
        ?string $phone,
        ?string $second_name = '',
        ?string $email = '',
        ?string $country = ''
    ) {
        $this->name = $name;
        $this->second_name = $second_name;
        $this->phone = $phone;
        $this->email = $email;
        $this->country = $country;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getSecondName(): ?string
    {
        return $this->second_name;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getCountry(): ?string
    {
        return $this->country;
    }
}
