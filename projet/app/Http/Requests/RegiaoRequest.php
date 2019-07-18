<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegiaoRequest extends FormRequest
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
        'id_regional.required'=>'informe a regional!',
        
        //'nome.required',
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

            'id_regional'=>'required|max:4',
            'nome'=>'required|max:20',
            
        ];
    }
}
