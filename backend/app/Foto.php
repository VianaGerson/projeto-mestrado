<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto',
        'tratamento_id',
    ];

    public function tratamento()
    {
        return $this->belongsTo(Tratamento::class);
    }
}
