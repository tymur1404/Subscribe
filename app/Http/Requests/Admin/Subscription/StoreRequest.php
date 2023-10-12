<?php

namespace App\Http\Requests\Admin\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric|between:0.01,99999.99',
            'available_publications' => 'required|integer|min:1',
            'active' => 'boolean',
        ];
    }

}
