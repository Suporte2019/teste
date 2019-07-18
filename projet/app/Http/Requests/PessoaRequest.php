<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PessoaRequest extends FormRequest
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

        'nome.required'     =>'Preencha o campo nome!',
        'cidade.required'   =>'Preencha o campo cidade!',
        'uf.required'       =>'Informe o campo uf!',
        'id_vend.required'  =>'Informe o campo vendedor!',
        'id_regiao.required'=>'Informe o campo região!',
        'id_categ.required' =>'Informe o campo categoria!',
       
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

            'nome'     =>'required|max:45',
            'cidade'   =>'required|max:35',
            'uf'   =>'required|max:5',
            'id_vend'  =>'required|max:45',
            'id_regiao'=>'required|max:45',
            'id_categ' =>'required|max:45',
        ];
    }
}
