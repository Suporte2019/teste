<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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

        'name.required'=>'Preencha campo nome!',
        'email.required'=>'Preencha o campo email!',
        'email.unique'=>'Já existe esse email cadastrado!',
        'password.required'=>'Preencha campo senha!',
        'password.min'=>'Preencha com no mínimo 6 digitos!',
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

            'name'=>'required|max:30',
            'password'=>'required|min:4|max:10',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->request->get('id'))
            ],
             
        ];
    }
}
