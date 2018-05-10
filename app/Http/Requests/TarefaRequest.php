<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
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
            'titulo' => 'required|min:5|max:80',
            'descricao' => 'required|min:5|max:256',
            'data_inicio' => 'required|date',
            'data_entrega' => 'required|date',
            'user' => 'required'
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
            'titulo.required' => 'O campo Título é obrigatório.',
            'titulo.min' => 'O campo Título deve ter no mímino 5 caracteres.',
            'titulo.max' => 'O campo Título deve ter no máximo 80 caracteres.',
            
            'descricao.required' => 'O campo Descrição é obrigatório.',
            'descricao.min' => 'O campo Descrição deve ter no mímino 5 caracteres.',
            'descricao.max' => 'O campo Descrição deve ter no máximo 256 caracteres.',

            'data_inicio.required' => 'O campo Data Início é obrigatório.',
            'data_inicio.date' => 'O campo Data Início deve ter o formato de data.',

            'data_entrega.required' => 'O campo Data Entrega é obrigatório.',
            'data_entrega.date' => 'O campo Data Entrega deve ter o formato de data.',

            'user.required' => 'O campo Usuário é obrigatório.',
        ];
    }
}
