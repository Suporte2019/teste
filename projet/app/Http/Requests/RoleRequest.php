<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class roleRequest extends FormRequest
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
        'nome.unique'=>'Já existe esse nome cadastrado!',
        'descricao.required'=>'Preencha o campo descrição!',

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
            
            'nome' => [
                        'required',
                        Rule::unique('roles')->ignore($this->request->get('id')),
                        ],
            //'nome'=>'required|unique:roles|max:40',
			'descricao'=>'required|max:50',
            
            
        ];
    }
}
