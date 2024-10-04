<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255',
            'phone' => 'required',
            'password'=>'required|string|min:8'

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'İsim alanı zorunludur',
            'name.max'=>'İsim en fazla 255 karakter olabilir',

            'email.required' => 'Email adresi zorunludur.',
            'email.email' => 'Lütfen geçerli bir email adresi girin.',
            'email.max' => 'Email adresi en fazla 255 karakter olabilir.',
            'email.unique' => 'Bu email adresi zaten kayıtlı.',

            'phone.required' => 'Telefon numarası zorunludur.',


            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
        ];

    }
}
