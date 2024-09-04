<?php

namespace App\Http\Guest\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'second_name' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'country' => 'nullable'
        ];
    }
}
