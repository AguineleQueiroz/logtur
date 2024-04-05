<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateClientRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:250|string',
            'identity' => 'min:9|max:9|string|unique:client',
            'age' => 'required|min:1|max:3|numeric',
            'address' => 'required|min:3|max:250|string',
            'city' => 'required|min:3|max:250|string',
            'phone' => 'required|min:11|max:12|numeric'
        ];
    }
}
