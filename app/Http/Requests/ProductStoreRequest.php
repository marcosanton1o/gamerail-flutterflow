<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'total_sales' => 'required|integer',
            'category' => 'required|string|max:100',
        ];
    }
}
