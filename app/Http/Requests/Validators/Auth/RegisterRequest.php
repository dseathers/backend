<?php

namespace App\Http\Requests\Validators\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:100',
            'email'    => 'required|string|email|max:100|unique:users',
            'phone'    => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ];
    }
}
