<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthenticationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|max:255',
            'cpf' => 'required|string|unique:users,cpf|max:14',
            'password' => 'required|string|min:8',
            'registration' => 'nullable|string|max:255|unique:users,registration',
            'function' => 'string|nullable',
            'departament' => 'string|nullable',
        ];
    }
}
