<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Emp_UserRequest extends FormRequest
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

        'nome_empresa.required'=>'Selecione o campo empresa!',
        'db_database.required'=>'Preencha o campo nome do database!',
        'db_hostname.required'=>'Preencha o campo hostname do database!',
        'db_username.required'=>'Preencha o campo usuário do database!',
        'db_password.required'=>'Preencha o campo senha do database!',
        'usuario.required'=>'Selecionar o usuário!',

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

            'nome_empresa' =>'required|max:20',
            'db_database'  =>'required|max:20',
            'db_hostname'  =>'required|max:20',
            'db_username'  =>'required|max:20',
            'db_password'  =>'required|max:20',
            'usuario'  =>'required',
           // 'id_usuario'   =>'required|max:30',

        ];
    }
}
