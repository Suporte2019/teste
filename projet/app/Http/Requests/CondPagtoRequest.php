<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CondPagtoRequest extends FormRequest
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

        'idcond_pag.required'=>'Preencha o campo código!',
        'nome.required'=>'Preencha o campo nome!',
        

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

            'id_cond_pag'=>'required|max:10',
            'nome'=>'required|max:45',
            
        ];
    }
}
