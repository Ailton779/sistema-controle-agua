<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consumidor extends Model
{
    use SoftDeletes;

    protected $table = 'consumidores';

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
