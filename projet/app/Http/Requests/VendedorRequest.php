<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class VendedorRequest extends FormRequest
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

        'nome.required'       =>'Preencha campo nome!',
        'id_vend_tp.required' =>'Informe o tipo vendedor!',
        'id_regional.required'=>'Informe a regional!',
       
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

            
            'nome'       =>'required|max:50',
            'id_vend_tp' =>'required|max:50',
            'id_regional'=>'required|max:50',

            
        ];
    }
}
