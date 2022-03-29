<?php

namespace App\Http\Requests\Despesa;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DataFutura;
use App\Rules\DespesaExiste;

class UpdateDespesasRequest extends FormRequest
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
            'valor' => 'required|numeric|min:0',
            'despesa_id' => ['required', 'numeric', new DespesaExiste]
        ];
    }
}
