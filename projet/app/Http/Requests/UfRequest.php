<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UfRequest extends FormRequest
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

    public function mensagem()

    {

        return[

        //'nome.required'=>'Preencha um nome',
        
       // 'nome.required',
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

            
            'uf'=>'required',
			//'email'=>'required|max:30',
			//'password'=>'required|min:4|max:10',
            
        ];
    }
}
