<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProdutoRequest extends FormRequest
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

        'nome.required'    =>'Preencha o campo nome!',
        'id_grupo.required'=>'Informe o grupo!',
       
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

            
            'nome'    =>'required|max:60',
            'id_grupo'=>'required|max:35',
           
        ];
    }
}
