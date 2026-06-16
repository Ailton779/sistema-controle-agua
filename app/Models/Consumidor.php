<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consumidor extends Model
{
    protected $fillable = ['nome', 'endereco', 'numero_medidor', 'telefone'];

    public function leituras()
    {
        return $this->hasMany(Leitura::class);
    }

    public function faturas()
    {
        return $this->hasMany(Fatura::class);
    }
}
