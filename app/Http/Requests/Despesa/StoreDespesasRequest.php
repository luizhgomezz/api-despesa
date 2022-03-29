<?php

namespace App\Http\Requests\Despesa;

use App\Rules\UsuarioExiste;
use App\Rules\DataFutura;

use Illuminate\Foundation\Http\FormRequest;

class StoreDespesasRequest extends FormRequest
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
            'descricao' => 'required|max:191',
            'data_despesa' => ['required', 'date', new DataFutura],
            'user_id' => ['required', 'numeric', new UsuarioExiste],
            'valor' => 'required|numeric|min:0'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute não foi preenchido.',
            'date' => 'O campo :attribute deve ser uma data.',
            'numeric' => 'O valor do campo :attribute deve ser numérico.',
            'min' => 'O campo :attribute não deve ser negativo.',
            'max' => 'Verifique a quantidade de caracteres permitidos no campo :attribute'
        ];
    }
}
