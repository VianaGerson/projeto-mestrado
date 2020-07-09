<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tratamento;

class TratamentoController extends Controller
{
    public function cadastrarTratamento(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|numeric|exists:pacientes',
            'descricao'   => 'required|string',
            'tipo'        => 'required|string'
        ]);

        return Tratamento::create([
            'paciente_id' => $request->paciente_id,
            'descricao'   => $request->descricao,
            'tipo'        => $request->tipo,
            'user_id'     => auth()->user->id
        ]);
    }

    public function editarTratamento(Request $request, int $tratamentoId)
    {
        $request->validate([
            'descricao'   => 'string',
            'tipo'        => 'string'
        ]);

        $tratamento = Tratamento::findOrFail($tratamentoId);
        
        $tratamento->descricao = $request->descricao ?? $tratamento->descricao;
        $tratamento->tipo      = $request->tipo      ?? $tratamento->tipo;
   
        $tratamento->save();
        return $tratamento;
    }    

    public function excluirTratamento(int $tratmentoId)
    {
        return Tratamento::findOrFail($tratmentoId)->delete(); 
    }
}
