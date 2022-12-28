<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterpretesRequest extends FormRequest
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
            'nombreIn'=> ['unique:interpretes,nombreIn','required']
        ];
    }

    public function messages(){
        return [
            'nombreIn.required'=>'Indique el nombre del Interprete o Grupo',
            'nombreIn.unique'=>'El Interprete o Grupo ya esta registrado'
        ];
    }
}
