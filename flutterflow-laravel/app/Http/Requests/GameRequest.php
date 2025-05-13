<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
    public function rules()
{
    return [

        'title' => 'required|string|min:2|max:30|unique:games,title',
        'price' => 'required',
        'developer' => 'required',
        'total_sales' => 'required',
        'image' => 'required',
        'category' => 'required'
    ];
}
}
