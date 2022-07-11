<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|min:3',
            'phone' => 'required|min:10',
            'cpf' => 'required|min:11',
            'rg' => 'required|min:10',
            'rgPhoto' => 'max:2048',
            'cpfPhoto' => 'max:2048',
            'confirmAddressPhoto' => 'max:2048',
        ];
    }
}
