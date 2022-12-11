<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'nombre' => 'required',
            'email'=> 'required|unique:usuarios,email',
            'password' => ['required','confirmed'],
            'numero_celular'=>'required',
            'fecha_nacimiento'=>'required',
            'tipo_usuario'=>'required'
        ];
    }

    public function messages(){
        return [
            'nombre.required'=>'Indique el nombre del usuario',
            'email.required'=>'Indique el correo electronico del usuario',
            'email.unique'=>'El correo electronico ya está registrado',
            'password.required'=>'Indique la contraseña',
            'password.confirmed'=>'La contraseña no coincide',
            'numero_celular.required'=>'Indique el numero de celular',
            'fecha_nacimiento.required'=>'Indique su fecha de nacimiento',
            'tipo_usuario.required'=>'Indique el tipo de usuario que desea ser'
        ];
    }
}
