<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Despesa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'descricao',
        'data_despesa',
        'user_id',
        'valor'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }

    public function getDespesaPorUsuario($userId)
    {
        $despesa = self::where('user_id', $userId)->get();
        $retorno = $despesa ? $despesa : 'Nenhuma despesa encontrada';
        return $retorno;
    }

    public function deleteDespesa($despesaId)
    {
        $despesa = self::find($despesaId);
        $despesa = $despesa ? $despesa->delete() : false;
        $retorno = $despesa ? 'Despesa removida com sucesso!' : 'Despesa não encontrada';
        return $retorno;
    }

    public function updateDespesa($despesaUpdate)
    {
        $despesa = self::find($despesaUpdate['despesa_id'])->update($despesaUpdate);
        return $despesa;
    }
}
