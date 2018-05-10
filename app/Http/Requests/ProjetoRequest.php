<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
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
            'nome' => 'required|min:5|max:100',
            'orcamento' => 'required|numeric|min:1',
            'data_entrega' => 'required|date',
            'cliente' => 'required',
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
            
            'orcamento.required' => 'O campo Orçamento é obrigatório.',
            'orcamento.numeric' => 'O campo Orçamento deve ser numérico.',
            'orcamento.min' => 'Orçamento deve ser maior que zero.',
            
            'data_entrega.required' => 'O campo Data Entrega é obrigatório.',
            'data_entrega.date' => 'O campo Data de Entrega deve ter o formato de data.',

            'cliente.required' => 'O campo cliente é obrigatório.',
        ];
    }
}
