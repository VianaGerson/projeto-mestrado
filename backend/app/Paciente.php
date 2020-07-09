<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cpf',
        'foto',
        'rg',
        'data_nas',
        'telefone',
        'email',
        'sexo', 
        'endereco', 
        'numero', 
        'bairro', 
        'cep', 
        'cidade', 
        'estado'
    ];

    public function tratamentos()
    {
        return $this->hasMany(Tratamento::class);
    }
}
