<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao',
        'tipo',
        'paciente_id',
        'user_id'
    ];

    public function enfermeiro()
    {
        return $this->belongsTo(User::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
