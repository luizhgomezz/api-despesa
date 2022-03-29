<?php

namespace App\Http\Resources\Despesa;

use Illuminate\Http\Resources\Json\JsonResource;

class DespesaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'descricao' => $this->descricao,
            'dataDespesa' => $this->data_despesa,
            'userId' => $this->user_id,
            'valor' => $this->valor,
            'usuario' => $this->user()->first()
        ];
    }
}
