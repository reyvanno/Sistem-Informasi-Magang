<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'regex:/^[0-9]+$/'],
            'password' => ['required', 'regex:/^[0-9]+$/'],
        ];
    }

    public function authenticate(): void
    {
        if (! Auth::attempt(
            $this->only('username', 'password'),
            $this->boolean('remember')
        )) {
            throw ValidationException::withMessages([
                'username' => 'Username atau password salah.',
            ]);
        }
    }
}
