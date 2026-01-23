<?php

namespace App\Http\Requests\Validators\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileValidator extends FormRequest
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
            'birthDate' => 'nullable|string',
            'birthPlace' => 'nullable|string',
            'address'=> 'nullable|string',
            'residence'=> 'nullable|string',
            'gender' => 'nullable|string'
        ];
    }
}
