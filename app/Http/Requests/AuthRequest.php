<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // yetki verme
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password'=>'required|min:6'

        ];
    }

    public function messages()
    {
        return[
            'email.required' => 'Email adresi zorunludur.',
            'email.email' => 'Lütfen geçerli bir email adresi girin.',
            'email.max' => 'Email adresi en fazla 255 karakter olabilir.',

            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
        ];
    }
}
