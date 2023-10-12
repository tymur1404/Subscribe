<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|between:0.01,99999.99',
            'available_publications' => 'sometimes|required|integer|min:1',
            'active' => 'sometimes|boolean',
        ];
    }

}
