<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequestForm extends FormRequest
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
        'requestTitle'=>'required|string|max:255',
        'requestDescription'=>'required|string',
        'fileUpload'=>'mimes:png,jpg,jpeg,gif,svg|max:2048'

        ];
    }

    public function messages():array
    {
        return[
            'name.required'=>'İsim alanını doldurmak zorunludur',
            'name.string'=>'İsim sadece metin içermelidir',
            'name.max'=>'İsim 255 karakterden uzun olamaz',


            'email.required'=>'Email alanını doldurmak zorunludur',
            'email.string'=>'E-posta sadece metin içermelidir',
            'email.email'=>'Geçerli bir e-posta adresi giriniz',
            'email.max'=>'E-posta 255 karakterden uzun olamaz',

            'phone.required'=>'Telefon numarası gereklidir',
            'phone.regex'=>'Telefon numarası 10 haneli bir sayı olmalıdır',

            'requestTitle.required'=>'Talep başlığı gereklidir',
            'requestTitle.string'=>'Talep başlığı sadec metin içermelidir',
            'requestTitle.max' => 'Talep başlığı 255 karakterden uzun olamaz.',

            'requestDescription.required' => 'Talep açıklaması gereklidir.',
            'requestDescription.string' => 'Talep açıklaması sadece metin içermelidir.',

            'fileUpload.mimes'=>'İzin verilmeyen dosya biçimi',
            'fileUpload.max'=>'Dosya boyutu en fazla 2mb olabilir.'



        ];

    }
}
