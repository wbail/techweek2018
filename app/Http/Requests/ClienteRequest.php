<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:50',
            'email' => 'required|email',
            'documento' => [
                'required',
                'digits:11',
                Rule::unique('clientes')->ignore($this->id),
            ],
        ];
    }

    /**
     * Mensagens de erro
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.min' => 'O campo Nome deve ter no mímino 3 caracteres.',
            'nome.max' => 'O campo Nome deve ter no máximo 50 caracteres.',
            
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'Email inválido.',
            
            'documento.required' => 'O campo Documento é obrigatório.',
            'documento.digits' => 'O campo Documento deve ter 11 dígitos.',
            'documento.unique' => 'O Documento já existe',
        ];
    }
}
