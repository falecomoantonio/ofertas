<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdministratorSaveProfileRequest extends FormRequest
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
            'name'=>'required|min:2|max:50',
            'username'=>'nullable|min:2|max:20|unique:users,username,'.$this->user()->id,
            'email'=>'required|max:120|email|unique:users,email,'.$this->user()->id
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Informe seu nome',
            'name.min'=>'Seu nome deve ter no mínimo 2 caracteres',
            'name.max'=>'Seu nome deve ter no máximo 50 caracteres',
            'username.min'=>'Seu username deve ter no mínimo 2 caracteres',
            'username.max'=>'Seu username deve ter no máximo 20 caracteres',
            'username.unique'=>'Username já registrado',
            'email.required'=>'Informe seu email',
            'email.max'=>'Email longo para o padrão',
            'email.email'=>'Email inválido',
            'email.unique'=>'Email já registrado'
        ];
    }
}
