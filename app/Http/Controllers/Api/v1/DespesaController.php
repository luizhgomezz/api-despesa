<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;

use App\Http\Requests\Despesa\StoreDespesasRequest;
use App\Http\Requests\Despesa\UpdateDespesasRequest;
use App\Http\Resources\Despesa\DespesaResource;
use Illuminate\Http\Request;

use App\Models\Despesa;
use App\Jobs\SendDespesaMailJob;

class DespesaController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despesas = Despesa::all();
        return response()->json(DespesaResource::collection($despesas));
    }

    /**
     * @param StoreDespesasRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDespesasRequest $request)
    {
        $despesa = Despesa::create($request->all());
        SendDespesaMailJob::dispatch($despesa);
        return response()->json(['mensagem' => 'Despesa criada com sucesso!']);
    }

    /**
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $despesa = Despesa::getDespesaPorUsuario($userId);
        return response()->json(DespesaResource::collection($despesa));
    }

    /**
     * @param  \App\Http\Requests\UpdateDespesasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDespesasRequest $request)
    {
        $despesa = Despesa::updateDespesa($request->all());
        return response()->json(['mensagem' => 'Despesa atualizada com sucesso!']);
    }

    /**
     * @param $despesaId
     * @return \Illuminate\Http\Response
     */
    public function delete($despesaId)
    {
        $despesa = Despesa::deleteDespesa($despesaId);
        return response()->json($despesa);
    }
}
