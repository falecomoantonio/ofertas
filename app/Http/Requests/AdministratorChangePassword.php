<?php

namespace App\Http\Requests;

use App\Rules\PasswordCurrentlyRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdministratorChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password'=>['required', new PasswordCurrentlyRule()],
            'password'=>['required', 'string', 'min:8', 'confirmed']
        ];
    }

    public function messages()
    {
        return [
            'current_password.required'=>'Informe sua senha atual',
            'password.required'=>'Informe a nova senha',
            'password.min'=>'Senha curta (Mín 8 caracteres)',
            'password.string'=>'Senha inválida',
            'password.confirmed'=>'As senhas não conferem'
        ];
    }
}
