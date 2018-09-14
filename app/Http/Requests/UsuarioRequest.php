<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'                      => 'required',
            'email'                     => 'required|unique:users',
            'password'                  => 'required',
        ];
    }

   public function messages() {
        return [
            'name.required'                     => 'Campo nome é obrigatorio.',
            'email.required'                    => 'Campo e-mail é obrigatorio.',
            'email.unique'                      => 'Já existe um cadastro utilizando este e-mail',
            'password.required'                 => 'Campo senha é obrigatorio.',
        ];
    }
}
