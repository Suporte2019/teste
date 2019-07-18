<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EmpresaRequest extends FormRequest
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

    public function messages()

    {

        return[

        'nome.required'=>'Preencha o campo nome!',
        'cnpj.required'=>'Preencha o campo com um CNPJ válido!',

        ];

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   
    



    public function rules()
    {
        return [
            
            'nome'=>'required|max:40',
            'cnpj'=>'required|max:19',
        ];
    }
}
