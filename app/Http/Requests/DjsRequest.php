<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DjsRequest extends FormRequest
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
            //
            'nombre'=>['required','unique:djs,nombre'],
            'email'=>['required', 'unique:djs,email'],
            'numero_celular'=>['required']
        ];
    }

    public function messages(){
        return[
            'nombre.required'=>'Debe ingresar su nombre de Dj',
            'nombre.unique'=>'El nombre de Dj ya existe',
            'email.required'=>'El correo electronico debe ser ingresado',
            'email.unique'=>'El correo ya aparece como contacto de otro Dj',
            'numero_celular.required'=>'El numero de celular es requerido'
        ];
    }
}
