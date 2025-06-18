<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
  'price' => 'nullable|integer',
  'image' => 'nullable|string',
  'developer' => 'nullable|string',
  'total_sales' => 'nullable|integer',
  'category' => 'nullable|string',
'publisher' => 'nullable|string',
        ];
    }
}
