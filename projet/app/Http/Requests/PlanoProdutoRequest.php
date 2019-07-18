<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PlanoProdutoRequest extends FormRequest
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

        'nivel.required'      =>'Informe o nível do plano!',
        'nivel_nome.required' =>'Preencha o campo nome!',
        'id_it_grupo.required'=>'Informe o grupo do produto!',
        
      //  'nome.required',
       // 'nome.max'=>'Ultrapassou 10 caracteres '

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
            
            'nivel'      =>'required|max:45',
            'nivel_nome' =>'required|max:45',
            'id_it_grupo'=>'required|max:45',
            
        ];
    }
}
