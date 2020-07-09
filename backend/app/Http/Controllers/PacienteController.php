<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{
    public function listarPacientes()
    {
        return Paciente::all(); 
    }

    public function cadastrarPaciente(Request $request)
    {
        $request->validate([
            'nome'     => 'required|string',
            'cpf'      => 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/|unique:pacientes,cpf',
            'rg'       => 'required|string|unique:pacientes,rg',
            'data_nas' => 'required|date',
            'telefone' => 'required|string',
            'email'    => 'required|email|unique:pacientes,email',
            'sexo'     => 'required|string', 
            'endereco' => 'required|string', 
            'numero'   => 'required|numeric', 
            'bairro'   => 'required|string', 
            'cep'      => 'required|string|regex:/^\d{5}-\d{3}$/', 
            'cidade'   => 'required|string', 
            'estado'   => 'required|string',
        ]);

        return Paciente::create([
            'nome'     => $request->nome,
            'cpf'      => $request->cpf,
            'rg'       => $request->rg,
            'data_nas' => $request->data_nas,
            'telefone' => $request->telefone,
            'email'    => $request->email,
            'sexo'     => $request->sexo, 
            'endereco' => $request->endereco, 
            'numero'   => $request->numero, 
            'bairro'   => $request->bairro, 
            'cep'      => $request->cep, 
            'cidade'   => $request->cidade, 
            'estado'   => $request->estado
        ]);
    }

    public function detalharPacientes(int $pacienteId)
    {
        return Paciente::findOrFail($pacienteId)->with('tratamentos.fotos'); 
    }

    public function editarPaciente(Request $request, int $pacienteId)
    {
        $request->validate([
            'nome'     => 'string',
            'cpf'      => 'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/|unique:pacientes,cpf',
            'rg'       => 'string|unique:pacientes,rg',
            'data_nas' => 'date',
            'telefone' => 'string',
            'email'    => 'email|unique:pacientes,email',
            'sexo'     => 'string', 
            'endereco' => 'string', 
            'numero'   => 'numeric', 
            'bairro'   => 'string', 
            'cep'      => 'string|regex:/^\d{5}-\d{3}$/', 
            'cidade'   => 'string', 
            'estado'   => 'string',
        ]);

        $paciente = Paciente::findOrFail($pacienteId);
        
        $paciente->nome     = $request->nome     ?? $paciente->nome;
        $paciente->cpf      = $request->cpf      ?? $paciente->cpf;
        $paciente->rg       = $request->rg       ?? $paciente->rg;
        $paciente->data_nas = $request->data_nas ?? $paciente->data_nas;
        $paciente->telefone = $request->telefone ?? $paciente->telefone;
        $paciente->email    = $request->email    ?? $paciente->email;
        $paciente->sexo     = $request->sexo     ?? $paciente->sexo; 
        $paciente->endereco = $request->endereco ?? $paciente->endereco; 
        $paciente->numero   = $request->numero   ?? $paciente->numero; 
        $paciente->bairro   = $request->bairro   ?? $paciente->bairro; 
        $paciente->cep      = $request->cep      ?? $paciente->cep; 
        $paciente->cidade   = $request->cidade   ?? $paciente->cidade; 
        $paciente->estado   = $request->estado   ?? $paciente->estado;
   
        $paciente->save();
        return $paciente;
    }    

    public function excluirPacientes(int $pacienteId)
    {
        return Paciente::findOrFail($pacienteId)->delete(); 
    }
}
