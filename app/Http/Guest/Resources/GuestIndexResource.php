<?php

namespace App\Http\Guest\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestIndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'second_name' => $this->second_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'country' => $this->country
        ];
    }
}
